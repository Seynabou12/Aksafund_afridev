<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Images Controller
 *
 * @property \App\Model\Table\ImagesTable $Images
 *
 */ 
class ImagesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $images = $this->Images->find('all');
        $this->set(compact('images'));
    }

    /**
     * View method
     *
     * @param string|null $id Image id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $image = $this->Images->get($id, [
            'contain' => []
        ]);
        $this->set('image', $image);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $image = $this->Images->newEntity();
        if ($this->request->is('post')) 
        {
            if (!empty($this->request->data['image'])) {
                $file = $this->request->getData('image');

                $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png');

                $url = $this->savePhoto($file, 'images');
                if ($url !== false) {
                    $this->request->data['image'] = $url;
                    $image  = $this->Images->patchEntity($image, $this->request->getData());
                    if ($this->Images->save($image)) 
                    {
                        $this->Flash->success(__('Ce image a été bien enregistré.'));
        
                        return $this->redirect(['action' => 'index']);
                    } 
                }
            }
            
            $this->Flash->error(__('Cette image n\'a pas été enregistrer. Veuillez Reprendre SVP '));
        }
        $this->set(compact('image'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Image id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $image = $this->Images->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            if (!empty($this->request->data['image'])) {
                $file = $this->request->getData('image');

                $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png');

                $url = $this->savePhoto($file, 'images');
                if ($url !== false) {
                    $this->request->data['image'] = $url;
                    $image = $this->Images->patchEntity($image, $this->request->getData());
                    if ($this->Images->save($image)) 
                    {
                        $this->Flash->success(__('L\' image a été enregistré avec succés.'));
                        return $this->redirect(['action' => 'index']);
                    }
                }
            }
            
            $this->Flash->error(__('L\'image n\' a pas été enregistré. SVP, veuillez reprendre.'));
        }
        $this->set(compact('image'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Images id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $image = $this->Images->get($id);
        if ($this->Images->delete($image)) {
            $this->Flash->success(__('Le image a été supprimer avec succés.'));
        } else {
            $this->Flash->error(__('Votre n\'a pas été supprimer. Veuillez reprendre SVP.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
