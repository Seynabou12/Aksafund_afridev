<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Sliders Controller
 *
 * @property \App\Model\Table\SlidersTable $Sliders
 *
 * @method \App\Model\Entity\Slider[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SlidersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => []
        ];
        $sliders = $this->paginate($this->Sliders);

        $this->set(compact('sliders'));
    }

    /**
     * View method
     *
     * @param string|null $id Slider id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $slider = $this->Sliders->get($id, [
            'contain' => []
        ]);

        $this->set('slider', $slider);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $slider = $this->Sliders->newEntity();
        if ($this->request->is('post')) {
            if (!empty($this->request->data['images'])) {
                $file = $this->request->getData('images');

                $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png');

                $url = $this->savePhoto($file, 'sliders');
                if ($url !== false) {
                    $this->request->data['images'] = $url;
                    $slider = $this->Sliders->patchEntity($slider, $this->request->getData());
                    if ($this->Sliders->save($slider)) {
                        $this->Flash->success(__('The slider has been saved.'));
        
                        return $this->redirect(['action' => 'index']);
                    } 
                }
            }
            $this->Flash->error(__('The slider could not be saved. Please, try again.'));
        }
        $this->set(compact('slider'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Slider id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $slider = $this->Sliders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            if (!empty($this->request->data['images'])) 
            {
                $file = $this->request->getData('images');

                $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png');

                $url = $this->savePhoto($file, 'sliders');
                if ($url !== false) 
                {
                    $this->request->data['images'] = $url;
                    $slider = $this->Sliders->patchEntity($slider, $this->request->getData());
                    if ($this->Sliders->save($slider)) 
                    {
                        $this->Flash->success(__('The slider has been saved.'));
                        return $this->redirect(['action' => 'index']);
                    }
                }
            }
            $this->Flash->error(__('The slider could not be saved. Please, try again.'));
        }
        $this->set(compact('slider'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Slider id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $slider = $this->Sliders->get($id);
        if ($this->Sliders->delete($slider)) {
            $this->Flash->success(__('The slider has been deleted.'));
        } else {
            $this->Flash->error(__('The slider could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
