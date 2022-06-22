<?php
namespace App\Controller\Porteurs;

use App\Controller\Porteurs\AppController;

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
    public function autorise($id){
        $user_id = $this->Auth->user()[0]->id;
        $auth = $this->Campagnes->find('all',['conditions'=>['Campagnes.id'=>$id,'user_id'=>$user_id]])->toArray();
        if(isset($auth) && $auth != null):
            return true;
        else:
            return false;
        endif;
    }
    public function index()
    {
        $this->loadModel('Participations');
        $user_id = $this->Auth->user()[0]->id;
        $paginate = [
            'contain' => ['Categorys', 'Users'],
            'conditions'=>['Campagnes.user_id'=>$user_id]
        ];
        $campagnes = $this->Campagnes->find('all',$paginate);
        $this->set(compact('campagnes'));
    }

    /**
     * View method
     *
     * @param string|null $id Campagne id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if($this->autorise($id) == false){
            return $this->redirect(['action'=>'index']);
        }
        $campagne = $this->Campagnes->get($id, [
            'contain' => ['Categorys', 'Users', 'Fichiers', 'Participations.Campagnes','Participations.Participants']
        ]);
        $participations= $campagne->participations;
        $this->set(compact('campagne','participations'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $campagne = $this->Campagnes->newEntity();
        $this->loadModel('Fichiers');
        if ($this->request->is('post')) {
            $campagne = $this->Campagnes->patchEntity($campagne, $this->request->getData());
            $images = ($this->request->getData('image'));
            if ($this->Campagnes->save($campagne)) {
                for ($i=0; $i < count($images); $i++) {
                    # code...
                    $fichier = $this->Fichiers->newEntity();
                    $url = $this->savePhoto($images[$i],'campagnes');
                    if($url !== false){
                        $fichier->campagne_id = $campagne->id;
                        $fichier->name = $url;

                        if($this->Fichiers->save($fichier)){

                        }
                    }
                }

                $this->Flash->success(__('The campagne has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The campagne could not be saved. Please, try again.'));
        }
        $categorys = $this->Campagnes->Categorys->find('list', ['limit' => 200]);
        $users = $this->Campagnes->Users->find('list', ['limit' => 200])->where(['id'=>$this->Auth->user()[0]->id]);
        $this->set(compact('campagne', 'categorys', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Campagne id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if($this->autorise($id) == false){
            return $this->redirect(['action'=>'index']);
        }
        $campagne = $this->Campagnes->get($id, [
            'contain' => ['Fichiers']
        ]);
        $this->loadModel('Fichiers');
        $images = ($this->request->getData('image'));
        if ($this->request->is(['patch', 'post', 'put'])) {

            $campagne = $this->Campagnes->patchEntity($campagne, $this->request->getData());
            if ($this->Campagnes->save($campagne)) {
                for ($i=0; $i < count($images); $i++) {
                    # code...
                    $fichier = $this->Fichiers->newEntity();
                    $url = $this->savePhoto($images[$i],'campagnes');
                    if($url !== false){
                        $fichier->campagne_id = $campagne->id;
                        $fichier->name = $url;

                        if($this->Fichiers->save($fichier)){

                        }
                    }
                }
                $this->Flash->success(__('La campagne a été enregistré avec succés.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The campagne could not be saved. Please, try again.'));
        }
        $categorys = $this->Campagnes->Categorys->find('list', ['limit' => 200]);

        $users = $this->Campagnes->Users->find('list', ['limit' => 200]);
        $this->set(compact('campagne', 'categorys', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Campagne id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $campagne = $this->Campagnes->get($id);
        $campagne->status = 0;
        if ($this->Campagnes->save($campagne)) {
            $this->Flash->success(__("La campagne a été supprimée avec succès"));
        } else {
            $this->Flash->error(__("La Suppression de la campagne a échouée.Réessayer."));
        }

        return $this->redirect(['action' => 'index']);
    }

}
