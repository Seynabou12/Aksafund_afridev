<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Reseaux Controller
 *
 * @property \App\Model\Table\ReseauxTable $Reseaux
 *
 */ 
class ReseauxController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $reseaux = $this->Reseaux->find('all');
        $this->set(compact('reseaux'));
    }

    /**
     * View method
     *
     * @param string|null $id 
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reseau = $this->Reseaux->get($id, [
            'contain' => []
        ]);
        $this->set('reseau', $reseau );
    }

   /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reseau = $this->Reseaux->newEntity();
        if ($this->request->is('post')) 
        {
            if (!empty($this->request->data['logo'])) {
                $file = $this->request->getData('logo');

                $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png');

                $url = $this->savePhoto($file, 'reseaux');
                if ($url !== false) {
                    $this->request->data['logo'] = $url;
                    $reseau  = $this->Reseaux->patchEntity($reseau, $this->request->getData());
                    if ($this->Reseaux->save($reseau)) 
                    {
                        $this->Flash->success(__('Ce reseau a été bien enregistré.'));
        
                        return $this->redirect(['action' => 'index']);
                    }
                }
            }
            
            $this->Flash->error(__('Ce réseau n\'a pas été enregistrer. Veuillez Reprendre SVP '));
        }
        $this->set(compact('reseau'));
    }

    /**
     * Edit method
     *
     * @param string|null $id .
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reseau = $this->Reseaux->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            if (!empty($this->request->data['logo'])) {
                $file = $this->request->getData('logo');

                $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png');

                $url = $this->savePhoto($file, 'reseaux');
                if ($url !== false) {
                    $this->request->data['logo'] = $url;
                    $reseau  = $this->Reseaux->patchEntity($reseau, $this->request->getData());
                    if ($this->Reseaux->save($reseau)) 
                    {
                        $this->Flash->success(__('Ce reseau a été bien enregistré.'));
        
                        return $this->redirect(['action' => 'index']);
                    }
                }
            }
            $this->Flash->error(__('Le reseau n\' a pas été enregistré. SVP, veuillez reprendre.'));
        }
        $this->set(compact('reseau'));
    }

    /**
     * Delete method
     *
     * @param string|null $id 
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reseau = $this->Reseaux->get($id);
        if ($this->Reseaux->delete($reseau)) {
            $this->Flash->success(__('Le reseau a été supprimer avec succés.'));
        } else {
            $this->Flash->error(__('Votre n\'a pas été supprimer. Veuillez reprendre SVP.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
