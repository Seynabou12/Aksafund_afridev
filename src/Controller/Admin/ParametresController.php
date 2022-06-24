<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Parametres Controller
 *
 * @property \App\Model\Table\ParametresTable $Parametres
 *
 */ 
class ParametresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $parametres = $this->Parametres->find('all');
        $this->set(compact('parametres'));
    }

    /**
     * View method
     *
     * @param string|null $id Parametre id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $parametre = $this->Parametres->get($id, [
            'contain' => []
        ]);
        $this->set('parametre', $parametre);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $parametre = $this->Parametres->newEntity();
        if ($this->request->is('post')) 
        {
            // dd($this->request->getData());
            $parametre  = $this->Parametres->patchEntity($parametre, $this->request->getData());
            
            if ($this->Parametres->save($parametre)) 
            {
                $this->Flash->success(__('Ces parametres ont été bien enregistré.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ces parametres n\'ont pas été enregistrer. Veuillez Reprendre SVP '));
        }
        $this->set(compact('parametre'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Parametre id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $parametre = $this->Parametres->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $parametre = $this->Parametres->patchEntity($parametre, $this->request->getData());
            if ($this->Parametres->save($parametre)) 
            {
                $this->Flash->success(__('Les parametres ont été enregistré avec succés.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Les parametres n\' ont pas été enregistré. SVP, veuillez reprendre.'));
        }
        $this->set(compact('parametre'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Parametres id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $parametre = $this->Parametres->get($id);
        if ($this->Parametres->delete($parametre)) {
            $this->Flash->success(__('Les parametres ont été supprimer avec succés.'));
        } else {
            $this->Flash->error(__('Vos parametres n\'ont pas été supprimer. Veuillez reprendre SVP.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
