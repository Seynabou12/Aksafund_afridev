<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sliders Model 
 *  @property \App\Model\Table\SectionsTable|\Cake\ORM\Association\BelongsTo $Section
 */
class SlidersTable extends Table
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

        $this->setTable('slider');
        $this->setDisplayField('titre');
        $this->setPrimaryKey('id');

        $this->belongsTo('Sections', [
            'foreignKey' => 'id_section',
            'joinType' => 'INNER'
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
            ->scalar('titre')
            ->maxLength('titre', 255)
            ->allowEmptyString('titre');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmptyString('description');

        $validator
            ->scalar('images')
            ->maxLength('images', 255)
            ->allowEmptyString('images');

        return $validator;
    }

      /**
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['id_section'], 'Sections'));
        return $rules;
    }
}
