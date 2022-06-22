<?php
namespace App\Controller\Porteurs;

use App\Controller\Porteurs\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function autorise($id){
        $user_id = $this->Auth->user()[0]->id;
        if($user_id == $id):
            return true;
        else:
            return false;
        endif;
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        //$users = $this->paginate($this->Users);
        $user_id = $this->Auth->user()[0]->id;
        $users = $this->Users->find('all',['conditions'=>['id'=>$user_id]]);
        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if($this->autorise($id) == false){
            return $this->redirect(['action'=>'index']);
        }
        $user = $this->Users->get($id, [
            'contain' => ['Campagnes.categorys', 'Participants', 'Roles.Profils']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if($this->autorise($id) == false){
            return $this->redirect(['action'=>'index']);
        }
        $user = $this->Users->get($id, [
            'contain' => ['Roles.Profils']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->loadModel('Profils');
        $profils = $this->Profils->find('list');
        $this->set(compact('user','profils'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        $user->status = 1;
        if ($this->Users->save($user)) {
            $this->Flash->success(__("L'utilisateur a été desactivé."));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
