<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use App\Model\Entity\Slider;
use App\Model\Table\SlidersTable;
use Cake\ORM\TableRegistry;

/**
 * Sections Controller
 *
 * @property \App\Model\Table\SectionsTable $Sections
 * @property \App\Model\Table\SlidersTable $Sliders
 *
 * @method \App\Model\Entity\Section[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SectionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Themes']
        ];
        $sections = $this->paginate($this->Sections);

        $this->set(compact('sections'));
    }

    /**
     * View method
     *
     * @param string|null $id Section id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $section = $this->Sections->get($id, [
            'contain' => ['Themes']
        ]);

        $this->set('section', $section);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $section = $this->Sections->newEntity();

        if ($this->request->is('post')) {


            $section = $this->Sections->patchEntity($section, $this->request->getData());
            $sc = $this->Sections->save($section);
            if ($sc) {
                foreach ($this->request->data() as $key => $value) {
                    $a = explode('-', $key);
                    //si l'index commence par titre
                    if ($a[0] == 'titre') {
                        $file = $this->request->getData('images-' . $a[1]);
                        $ext = substr(strtolower(strrchr($file['name'], '.')), 1);

                        $url = $this->savePhoto($file, 'sliders');
                        
                        //creation de la table
                        $sliders = TableRegistry::get('Sliders');
                        $slider = $sliders->newEntity();
                        $section = $sliders->patchEntity($slider, [
                            "titre" => $value,
                            "description" => $this->request->getData('description-' . $a[1]),
                            "images" => $url,
                            // 'id_section' => $sc->id
                        ]);
                        $sliders->save($section);
                    } elseif ($key == "images") {
                        //si ce sont des images
                        foreach ($value as $val) {
                            $file = $val;
                            $url = $this->savePhoto($file, 'sliders');

                            $images = TableRegistry::get('Images');
                            $image = $images->newEntity();
                            $section = $images->patchEntity($image, [
                                "image" => $url,
                                // 'id_section' => $sc->id
                            ]);
                            $images->save($section);
                        }
                    }
                }

                $this->Flash->success(__('The section has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The section could not be saved. Please, try again.'));
        }
        $themes = $this->Sections->Themes->find('list', ['limit' => 200]);
        $this->set(compact('section', 'themes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Section id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $section = $this->Sections->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $section = $this->Sections->patchEntity($section, $this->request->getData());
            if ($this->Sections->save($section)) {
                $this->Flash->success(__('The section has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The section could not be saved. Please, try again.'));
        }
        $themes = $this->Sections->Themes->find('list', ['limit' => 200]);
        $this->set(compact('section', 'themes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Section id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $section = $this->Sections->get($id);
        if ($this->Sections->delete($section)) {
            $this->Flash->success(__('The section has been deleted.'));
        } else {
            $this->Flash->error(__('The section could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
