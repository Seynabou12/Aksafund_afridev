<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Fichiers Controller
 *
 * @property \App\Model\Table\FichiersTable $Fichiers
 *
 * @method \App\Model\Entity\Fichier[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FichiersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Campagnes']
        ];
        $fichiers = $this->paginate($this->Fichiers);

        $this->set(compact('fichiers'));
    }

    /**
     * View method
     *
     * @param string|null $id Fichier id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fichier = $this->Fichiers->get($id, [
            'contain' => ['Campagnes']
        ]);

        $this->set('fichier', $fichier);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fichier = $this->Fichiers->newEntity();
        if ($this->request->is('post')) {
            $fichier = $this->Fichiers->patchEntity($fichier, $this->request->getData());
            if ($this->Fichiers->save($fichier)) {
                $this->Flash->success(__('The fichier has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fichier could not be saved. Please, try again.'));
        }
        $campagnes = $this->Fichiers->Campagnes->find('list', ['limit' => 200]);
        $this->set(compact('fichier', 'campagnes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fichier id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fichier = $this->Fichiers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fichier = $this->Fichiers->patchEntity($fichier, $this->request->getData());
            if ($this->Fichiers->save($fichier)) {
                $this->Flash->success(__('The fichier has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fichier could not be saved. Please, try again.'));
        }
        $campagnes = $this->Fichiers->Campagnes->find('list', ['limit' => 200]);
        $this->set(compact('fichier', 'campagnes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fichier id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fichier = $this->Fichiers->get($id);
        //dd($fichier);
        if ($this->Fichiers->delete($fichier)) {
            $this->Flash->success(__('Le fichier a été supprimé avec succés.'));
            return $this->redirect(['controller'=>'campagnes','action' => 'edit',$fichier->campagne_id]);
        } else {
            $this->Flash->error(__('The fichier could not be deleted. Please, try again.'));
        }

        
    }
}
