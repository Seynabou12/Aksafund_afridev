<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Participations Model
 *
 * @property \App\Model\Table\ParticipantsTable&\Cake\ORM\Association\BelongsTo $Participants
 * @property \App\Model\Table\CampagnesTable&\Cake\ORM\Association\BelongsTo $Campagnes
 *
 * @method \App\Model\Entity\Participation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Participation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Participation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Participation|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Participation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Participation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Participation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Participation findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ParticipationsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('participations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Participants', [
            'foreignKey' => 'participant_id',
        ]);
        $this->belongsTo('Campagnes', [
            'foreignKey' => 'campagne_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('nom')
            ->maxLength('nom', 200)
            ->allowEmptyString('nom');

        $validator
            ->scalar('prenom')
            ->maxLength('prenom', 250)
            ->allowEmptyString('prenom');

        $validator
            ->scalar('email')
            ->maxLength('email', 250)
            ->allowEmptyString('email');

        $validator
           ->scalar('telephone')
            ->maxLength('telephone', 250)
            ->allowEmptyString('telephone'); 

        $validator
            ->scalar('etatpaiement')
            ->maxLength('etatpaiement', 105)
            ->allowEmptyString('etatpaiement');

        $validator
            ->integer('montant')
            ->allowEmptyString('montant');

        $validator
            ->boolean('status')
            ->notEmptyString('status');

        $validator
            ->boolean('anonyme')
            ->allowEmptyString('anonyme');

        $validator
            ->scalar('token')
            ->maxLength('token', 500)
            ->allowEmptyString('token');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['participant_id'], 'Participants'));
        $rules->add($rules->existsIn(['campagne_id'], 'Campagnes'));

        return $rules;
    }
}
