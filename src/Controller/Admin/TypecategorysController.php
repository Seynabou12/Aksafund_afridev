<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Typecategorys Controller
 *
 * @property \App\Model\Table\TypecategorysTable $Typecategorys
 *
 * @method \App\Model\Entity\Typecategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TypecategorysController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $typecategorys = $this->paginate($this->Typecategorys);
        $this->set(compact('typecategorys'));
    }
    /**
     * View method
     *
     * @param string|null $id Typecategory id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typecategory = $this->Typecategorys->get($id, [
            'contain' => []
        ]);

        $this->set('typecategory', $typecategory);
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typecategory = $this->Typecategorys->newEntity();
        if ($this->request->is('post')) {
            $typecategory = $this->Typecategorys->patchEntity($typecategory, $this->request->getData());
            if ($this->Typecategorys->save($typecategory)) {
                $this->Flash->success(__('The typecategory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The typecategory could not be saved. Please, try again.'));
        }
        $this->set(compact('typecategory'));
    }
    /**
     * Edit method
     *
     * @param string|null $id Typecategory id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typecategory = $this->Typecategorys->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typecategory = $this->Typecategorys->patchEntity($typecategory, $this->request->getData());
            if ($this->Typecategorys->save($typecategory)) {
                $this->Flash->success(__('The typecategory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The typecategory could not be saved. Please, try again.'));
        }
        $this->set(compact('typecategory'));
    }
    /**
     * Delete method
     *
     * @param string|null $id Typecategory id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typecategory = $this->Typecategorys->get($id);
        if ($this->Typecategorys->delete($typecategory)) {
            $this->Flash->success(__('The typecategory has been deleted.'));
        } else {
            $this->Flash->error(__('The typecategory could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
