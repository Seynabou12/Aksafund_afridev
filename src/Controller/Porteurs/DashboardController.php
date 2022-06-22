<?php
namespace App\Controller\Porteurs;

use App\Controller\Porteurs\AppController;
use Cake\I18n\Time;
use Cake\Collection\Collection;

class DashboardController extends AppController
{
    public function index(){
        $this->loadModel('Users');
        $this->loadModel('Campagnes');
        $this->loadModel('Participations');
        $user_id = $this->Auth->user()[0]->id;
        $user = $this->Users->find('all',['conditions'=>['id'=>$user_id]])->toArray();
        $campagne = $this->Campagnes->find('all',[
            'contain'=>['Participations'=> function ($query) {
                return $query->select(['Participations.campagne_id','somme' => $query->func()->sum('Participations.montant')])
                ->where(['etatpaiement'=>'completed'])
                ->group('Participations.campagne_id');}],
            'conditions'=>['status'=>1,'user_id'=>$user_id]
            ])->toArray();
        $campagne_cloturee = $this->Campagnes->find('all',['conditions'=>['status'=>0,'user_id'=>$user_id]])->toArray();
        $participants = $this->Participations->find('all',['contain'=>'Campagnes','conditions'=>['Campagnes.user_id'=>$user_id]])->toArray();
        $participants_completed = $this->Participations->find('all',['contain'=>'Campagnes','conditions'=>['etatpaiement'=>'completed','Campagnes.user_id'=>$user_id]])->toArray();
        $campagne_json = json_encode($campagne);
        $this->set(compact('user','campagne','campagne_cloturee','campagne_json','participants','participants_completed'));
    }
}
