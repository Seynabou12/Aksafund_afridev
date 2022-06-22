<?php
namespace App\Controller;

use App\Controller\AppController;
use PayExpress;

\Paydunya\Setup::setMasterKey("PNvCRoX6-xbSm-0Gtt-TOxq-jN9mbhgKbfU3");
\Paydunya\Setup::setPublicKey("live_public_OylxsLlsKWD4TtmlNsWR7OsQvKS");
\Paydunya\Setup::setPrivateKey("live_private_XEmZ06OYvV1BuVlYQmDVqjcSOIl");
\Paydunya\Setup::setToken("CaaEmUkrDXlSecntnd8P");
\Paydunya\Setup::setMode("live");
\Paydunya\Checkout\Store::setName("aksafund"); // Seul le nom est requis
\Paydunya\Checkout\Store::setTagline("oeuvrer pour le social");
\Paydunya\Checkout\Store::setPhoneNumber("77 462 33 52");
\Paydunya\Checkout\Store::setPostalAddress("Dakar - Sodida lot N32");
\Paydunya\Checkout\Store::setLogoUrl("https://aksafund.com/img/logo.png");
\Paydunya\Checkout\Store::setWebsiteUrl("https://aksafund.com");
\Paydunya\Checkout\Store::setReturnUrl("https://aksafund.com/campagnes/notification/?participation=1");
\Paydunya\Checkout\Store::setCallbackUrl("https://aksafund.com/campagnes/notification/?participation=1");
\Paydunya\Checkout\Store::setCancelUrl("https://aksafund.com/campagnes/notification/?participation=1");

/**
 * Campagnes Controller
 *
 * @property \App\Model\Table\CampagnesTable $Campagnes
 *
 * @method \App\Model\Entity\Campagne[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CampagnesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->loadModel('Participations');
        $this->paginate = [
            'contain' => ['Categorys', 'Users']
        ];
        $campagnes = $this->paginate($this->Campagnes);
        $this->set(compact('campagnes'));
    }

    /**
     * View method
     *
     * @param string|null $id Campagne id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function campagne($id = null)
    {
        $campagne = $this->Campagnes->get($id, [
            'contain' => ['Categorys', 'Users', 'Fichiers', 'Participations' => function ($query) {
                return $query->select(['Participations.campagne_id','somme' => $query->func()->sum('Participations.montant')])
                ->where(['etatpaiement'=>'completed'])
                ->group('Participations.campagne_id');},
                'Participations.Participants'],
            'conditions'=>['Campagnes.status !='=>0]
        ]);
        
        $participations= $campagne->participations;
        $this->set(compact('campagne','participations'));
    }

    public function categorie($id = null)
    {
        $this->loadModel('Typecategorys');
        $campagnes = $this->Campagnes->find('all',[
            'contain'=>['Categorys','Users','Fichiers','Participations' => function ($query) {
                return $query->select(['Participations.campagne_id','somme' => $query->func()->sum('Participations.montant')])->where(['etatpaiement'=>'completed'])->group('Participations.campagne_id');}],
            'conditions' => ['Categorys.typecategory_id'=>$id,'Campagnes.status !='=>0],
            'order'=>['Campagnes.id desc']
        ]);

        $types = $this->Typecategorys->find('all',['conditions'=>['id'=>$id]]);
        $type = $types->first()->name;
        $causes = $campagnes->toArray();
        $this->set(compact('causes','type'));
    }
    
    public function listContributions($id_campagne){
        $campagne = $this->Campagnes->get($id_campagne, [
            'contain' => ['Categorys', 'Users', 'Fichiers','Participations'=> function ($query) {
            return $query->select(['Participations.campagne_id',
			'Participations.prenom',
			'Participations.nom',
			'Participations.email',
			'Participations.telephone',
			'Participations.montant',
			'Participations.anonyme',
			'Participations.created',
			'Participations. status'
			
		])->where(['etatpaiement'=>'completed']);},
            'Participations.Participants'],
            'conditions'=>['Campagnes.status'=>1,'Campagnes.status'=>3]
        ]);
        
        $contributions= $campagne->participations;
	//dd($contributions);
        $this->set(compact('campagne','contributions'));
    }

    public function contribution($id = null)
    {
        $campagne = $this->Campagnes->get($id, [
            'contain' => ['Categorys', 'Users', 'Fichiers',  'Participations' => function ($query) {
                return $query->select(['Participations.campagne_id','somme' => $query->func()->sum('Participations.montant')])
                    ->where(['etatpaiement'=>'completed'])
                    ->group('Participations.campagne_id');},'Participations.Participants']
        ]);
        if ($this->request->is('post')) {
            // dd($campagne->name);
            $this->addParticipation($campagne->name);
            // $this->saveDonation($campagne->name);
        }
        $participations= $campagne->participations;
        $this->set(compact('campagne','participations'));
    }

    // Enregritrement de la contribution
    public function saveDonation($campagne){
        $this->loadModel('Participations');
        $participation = $this->Participations->newEntity();
        $participation = $this->Participations->patchEntity($participation, $this->request->getData());
        $participation->name = $campagne;
        if ($this->Participations->save($participation)) {
            $reponse = $this->sendDonation($participation);
            if($reponse['success'] == 1){
                $participation->token = $reponse['token']; 
                $this->Participations->save($participation);
                return $this->redirect($reponse['redirect_url']);
            }
            
        }
        $this->Flash->error(__("Une erreur est survenue lors de l'enregistrement de la contribution. Merci de réessayer."));
    }

    // fontion renvoyé si le paiement reussit
    public function notification($id_camp = null){
        $this->loadModel('Participations');
        $token = $_GET['token'];
        $id = $_GET['participation'];
        $invoice = new \Paydunya\Checkout\CheckoutInvoice();
        if ($invoice->confirm($token)) {
            $etatpaiement = $invoice->getStatus();
            $participation = $this->Participations->updateAll([
                'etatpaiement'=>$etatpaiement,
                'token'=>$token,
                'prenom'=>$invoice->getCustomerInfo('name'),
                'telephone'=>$invoice->getCustomerInfo('phone'),
                'email'=>$invoice->getCustomerInfo('email'),
                ],
                ['id'=>$id]);
            $id = $invoice->getCustomData('categorie');
            if($etatpaiement == "completed"){
                $this->Flash->success(__("Votre participation a été effectuée avec succès."));
            }
        }
        else{
            echo $invoice->getStatus();
            echo $invoice->response_text;
            echo $invoice->response_code;
            return $this->redirect('/');
        }
        $this->set(compact('id'));
    }

    // fontion renvoyé si le paiement echoue
    public function echouer(){

    }

    // Fonction qui retourne les infos de paiement
    public function ipn(){}

    public function addParticipation($campagne)
    {
        

        if($this->request->is('post')){
            
            // * Initialisation d'un Paiement Avec Redirection (PAR)
            // n
            // dd($invoice);
            //  Configuration de l'URL de notification instantanée de paiement sur une instance de facture
            // Cette configuration écrasera les paramètres globaux précédants si ceux-ci ont déjà été définis.
            $invoice = new \Paydunya\Checkout\CheckoutInvoice();
            
            $invoice->addItem("Essai sur le paiment", 
            1,1,1,$campagne);
            $invoice->setDescription($campagne);
            $invoice->setTotalAmount(($this->request->getData('montant')));
            $campagne_id = $this->request->getData('campagne_id');
            $invoice->addCustomData("categorie", $campagne_id);
            // dd($invoice);
            $invoice->setCallbackUrl("https://aksafund.com/campagnes/notification");
            
            //A insérer dans le fichier du code source qui doit effectuer l'action

            // Le code suivant décrit comment créer une facture de paiement au niveau de nos serveurs,
            // rediriger ensuite le client vers la page de paiement
            // et afficher ensuite son reçu de paiement en cas de succès.
            $this->loadModel('Participations');
            $participation = $this->Participations->newEntity();
            $participation = $this->Participations->patchEntity($participation, $this->request->getData());
            $participation->token = $invoice->token; 
            $participation->prenom = "anonyme";
            // dd($invoice);
            // 
            if ($this->Participations->save($participation)) {
                // $invoice->addCustomerInfo('nom','7754555','abs@gmail.com');
                $invoice->setReturnUrl("https://aksafund.com/campagnes/notification/?participation=".$participation->id."");
                if($invoice->create($this->request->getData())) {
                    
                    header("Location: ".$invoice->getInvoiceUrl());
                    die();
                    
                }else{
                    $this->Flash->error(__("Une erreur est survenue lors de l'enregistrement de la contribution. Merci de réessayer."));
                    
                    echo $invoice->response_text;
                }
            }
        }
    }

    public function validate()
    {
        try {
            //Prenez votre MasterKey, hashez la et comparez le résultat au hash reçu par IPN
            if($_POST['data']['hash'] === hash('sha512', "PNvCRoX6-xbSm-0Gtt-TOxq-jN9mbhgKbfU3")) {

            if ($_POST['data']['status'] == "completed") {
                //Faites vos traitements backoffice ici...
            }

            } else {
                die("Cette requête n'a pas été émise par PayDunya");
            }
        } catch(Exception $e) {
            die();
        }
    }


}
