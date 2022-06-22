<?php
namespace App\Controller\Porteurs;

use App\Controller\Porteurs\AppController;

/**
 * Participations Controller
 *
 * @property \App\Model\Table\ParticipationsTable $Participations
 *
 * @method \App\Model\Entity\Participation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ParticipationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $paginate = [
            'contain' => ['Participants', 'Campagnes'],
        ];

        $participations = $this->Participations->find('all',$paginate);
        $this->set(compact('participations'));
    }

    /**
     * View method
     *
     * @param string|null $id Participation id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $participation = $this->Participations->get($id, [
            'contain' => ['Participants', 'Campagnes']
        ]);

        $this->set('participation', $participation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $participation = $this->Participations->newEntity();
        if ($this->request->is('post')) {
            $participation = $this->Participations->patchEntity($participation, $this->request->getData());
            if ($this->Participations->save($participation)) {
                $this->Flash->success(__('The participation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The participation could not be saved. Please, try again.'));
        }
        $participants = $this->Participations->Participants->find('list', ['limit' => 200]);
        $campagnes = $this->Participations->Campagnes->find('list', ['limit' => 200]);
        $this->set(compact('participation', 'participants', 'campagnes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Participation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $participation = $this->Participations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $participation = $this->Participations->patchEntity($participation, $this->request->getData());
            if ($this->Participations->save($participation)) {
                $this->Flash->success(__('The participation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The participation could not be saved. Please, try again.'));
        }
        $participants = $this->Participations->Participants->find('list', ['limit' => 200]);
        $campagnes = $this->Participations->Campagnes->find('list', ['limit' => 200]);
        $this->set(compact('participation', 'participants', 'campagnes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Participation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $participation = $this->Participations->get($id);
        if ($this->Participations->delete($participation)) {
            $this->Flash->success(__('The participation has been deleted.'));
        } else {
            $this->Flash->error(__('The participation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
