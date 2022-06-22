<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Campagnes Model
 *
 * @property \App\Model\Table\CategorysTable|\Cake\ORM\Association\BelongsTo $Categorys
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\FichiersTable|\Cake\ORM\Association\HasMany $Fichiers
 * @property \App\Model\Table\ParticipationsTable|\Cake\ORM\Association\HasMany $Participations
 *
 * @method \App\Model\Entity\Campagne get($primaryKey, $options = [])
 * @method \App\Model\Entity\Campagne newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Campagne[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Campagne|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Campagne saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Campagne patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Campagne[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Campagne findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CampagnesTable extends Table
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

        $this->setTable('campagnes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Categorys', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Fichiers', [
            'foreignKey' => 'campagne_id'
        ]);
        $this->hasMany('Participations', [
            'foreignKey' => 'campagne_id'
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
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 205)
            ->allowEmptyString('name');

        $validator
            ->scalar('desc_courte')
            ->allowEmptyString('desc_courte');

        $validator
            ->scalar('desc_longue')
            ->allowEmptyString('desc_longue');

        $validator
            ->scalar('lien')
            ->maxLength('lien', 45)
            ->allowEmptyString('lien');

        $validator
            ->allowEmptyString('status');

        $validator
            ->numeric('montant')
            ->allowEmptyString('montant');

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
        $rules->add($rules->existsIn(['category_id'], 'Categorys'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
