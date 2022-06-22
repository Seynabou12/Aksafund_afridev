<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Profils Controller
 *
 * @property \App\Model\Table\ProfilsTable $Profils
 *
 * @method \App\Model\Entity\Profil[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProfilsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $profils = $this->paginate($this->Profils);

        $this->set(compact('profils'));
    }

    /**
     * View method
     *
     * @param string|null $id Profil id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $profil = $this->Profils->get($id, [
            'contain' => ['Roles']
        ]);

        $this->set('profil', $profil);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $profil = $this->Profils->newEntity();
        if ($this->request->is('post')) {
            $profil = $this->Profils->patchEntity($profil, $this->request->getData());
            if ($this->Profils->save($profil)) {
                $this->Flash->success(__('The profil has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The profil could not be saved. Please, try again.'));
        }
        $this->set(compact('profil'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Profil id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $profil = $this->Profils->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $profil = $this->Profils->patchEntity($profil, $this->request->getData());
            if ($this->Profils->save($profil)) {
                $this->Flash->success(__('The profil has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The profil could not be saved. Please, try again.'));
        }
        $this->set(compact('profil'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Profil id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $profil = $this->Profils->get($id);
        if ($this->Profils->delete($profil)) {
            $this->Flash->success(__('The profil has been deleted.'));
        } else {
            $this->Flash->error(__('The profil could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
