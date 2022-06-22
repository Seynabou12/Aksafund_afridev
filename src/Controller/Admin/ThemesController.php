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
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $themes = $this->Themes->find('all');
        $this->set(compact('themes'));
    }

    /**
     * View method
     *
     * @param string|null $id Theme id.
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
        if ($this->request->is('post')) {
            // dd($this->request->getData());
            $theme  = $this->Themes->patchEntity($theme, $this->request->getData());
            if ($this->Themes->save($theme)) {
                $this->Flash->success(__('Ce theme a été bien enregistré.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ce théme n\'a pas été enregistrer. Veiullez Reprendre SVP '));
        }
        $this->set(compact('theme'));
    }

}
