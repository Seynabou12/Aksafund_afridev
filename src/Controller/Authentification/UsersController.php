<?php
namespace App\Controller\Authentification;

use App\Controller\AppController;
use App\Model\Table\RolesTable;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    public function login(){
        $this->viewBuilder()->setLayout('auth');
        if($this->request->is('post')){
            $isActive = $this->Users->find('all',[
                'conditions'=>['email'=>$this->request->getData('email'),'status'=>0]
            ])->toArray();
            if(count($isActive) > 0){
                $this->Flash->error("Votre compte n'est actif. Veuillez contacter l'administrateur");

                return $this->redirect('/');
            }

            $user = $this->Auth->identify();
            $user = $this->Users->find('all',[
                'contain'=>['Roles.Profils'],
                'conditions'=>['Users.id'=>$user['id']]
                ])->toArray();
                // dd($user);
            if ($user) {
                $this->Auth->setUser($user);
                if($user[0]->roles[0]->profil_id == 1 && (int)$user[0]->status == 1){
                    return $this->redirect(['controller'=>'Dashboard','action'=>'index','prefix'=>'admin']);
                }
                else if ($user[0]->roles[0]->profil_id == 2 && (int)$user[0]->status == 1){
                    return $this->redirect(['controller'=>'Dashboard','action'=>'index','prefix'=>'porteurs']);
                }
                else{
                    $this->Flash->error('Votre compte est désactivé');
                }

                // return $this->redirect($this->Auth->redirectUrl());
            }
            else{
                $this->Flash->error('Votre identifiant ou votre mot de passe est incorrect.');
            }
        }

    }

    public function logout(){
        $this->Flash->success('Vous avez été déconnecté.');
        return $this->redirect($this->Auth->logout());
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
        $user = $this->Users->get($id, [
            'contain' => ['Campagnes', 'Participants', 'Roles']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function inscription()
    {
        $this->viewBuilder()->setLayout('auth');
        $user = $this->Users->newEntity();
        $this->loadModel('Roles');
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $role =  $this->Roles->newEntity();
                $role->user_id = $user->id;
                $role->profil_id = 2;
                $this->Roles->save($role);
                $this->Flash->success(__("Votre inscription a réussi."));
                return $this->redirect(['controller'=>'Users','action'=>'login','prefix'=>'authentification']);

            }
            $this->Flash->error(__("Votre inscription a échoué. Email existe déjà."));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
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
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
