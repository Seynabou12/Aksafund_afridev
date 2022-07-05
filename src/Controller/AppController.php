<?php

namespace App\Controller;
use PayExpresse;
use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        // Code existant code

        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            // La ligne suivante a été ajoutée
            'authorize'=> 'Controller',
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login',
                'prefix' => 'authentification',
            ],
            // Si pas autorisé, on renvoit sur la page précédente
            'unauthorizedRedirect' => 'users/login',
            'authError' => 'Vous devez d\'abord vous connecter !'
        ]);

        // Permet à l'action "display" de notre PagesController de continuer
        // à fonctionner. Autorise également les actions "read-only".
        $this->Auth->allow(['display', 'view', 'logout','login','campagne','categorie','contribution','notification','listContributions','inscription','payment']);

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }
    public function beforeFilter(Event $event)
    {
        $current = $this->Auth->user()[0];
        $this->loadModel('Typecategorys');
        $types = $this->Typecategorys->find('all',[
            
        ])->toArray();
        $this->set(compact('types','current'));
        // dd($types);
 
    }
    

    public function isAuthorized($user)
    {
        return true;
    }

    public function sendDonation($item){
        $jsonResponse = (new PayExpresse(_apikey, _apisecret))->setQuery([
                'item_name' => $item->name,
                'item_price' => $item->montant,
                'command_name' => "Paiement {$item->name} Gold via PayExpresse",
            ])->setCustomeField([
                'item_id' => $item->id,
                'time_command' => time(),
                'ip_user' => $_SERVER['REMOTE_ADDR'],
                'lang' => $_SERVER['HTTP_ACCEPT_LANGUAGE']
            ])
                ->setTestMode(true)
                ->setCurrency('XOF')
                ->setRefCommand(uniqid())
                ->setNotificationUrl([
                     'ipn_url' => BASE_URL.'/ipn.php', //only https
                     'success_url' => BASE_URL.'/campagnes/campagne/'.$item->id.'?state=success&id=',
                     'cancel_url' => BASE_URL.'/campagnes/campagne/'.$item->id.'?state=cancel&id='
                ])
                ->send();
        return $jsonResponse;
                
    }
}
