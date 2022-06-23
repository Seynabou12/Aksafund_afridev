<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Typecategorys Controller
 *
 * @property \App\Model\Table\ThemeTable $Types
 *
 */ 
class ThemesController extends AppController
{
    // /**
    //  * Index method
    //  *
    //  * @return \Cake\Http\Response|void
    //  */
    // public function index()
    // {
    //     $themes = $this->Themes->find('all');
    //     $this->set(compact('themes'));
    // }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        //  $themes = $this->paginate($this->Themes);
        $themes = $this->Themes->find('all');
        $this->set(compact('themes'));
    }

    /**
     * View method
     *
     * @param string|null $id Theme idTheme.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $theme = $this->Themes->get($id, [
            'contain' => []
        ]);
        $this->set('theme', $theme);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $theme = $this->Themes->newEntity();
        if ($this->request->is('post')) 
        {
            // dd($this->request->getData());
            $theme  = $this->Themes->patchEntity($theme, $this->request->getData());
            if ($this->Themes->save($theme)) 
            {
                $this->Flash->success(__('Ce theme a été bien enregistré.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ce théme n\'a pas été enregistrer. Veuillez Reprendre SVP '));
        }
        $this->set(compact('theme'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Theme idTheme.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $theme = $this->Themes->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $theme = $this->Themes->patchEntity($theme, $this->request->getData());
            if ($this->Themes->save($theme)) 
            {
                $this->Flash->success(__('Le théme a été enregistré avec succés.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Le theme n\' a pas été enregistré. SVP, veuillez reprendre.'));
        }
        $this->set(compact('theme'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Themes idTheme.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $theme = $this->Themes->get($id);
        if ($this->Themes->delete($theme)) {
            $this->Flash->success(__('Le theme a été supprimer avec succés.'));
        } else {
            $this->Flash->error(__('Votre n\'a pas été supprimer. Veuillez reprendre SVP.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
