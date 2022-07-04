<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;


/**
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ReseauxTable extends Table
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

        $this->setTable('reseaux');
        $this->setDisplayField('logo');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        
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
            ->scalar('nom')
            ->maxLength('nom', 100)
            ->allowEmptyString('nom');
        $validator
            ->scalar('logo')
            ->maxLength('logo', 100)
            ->allowEmptyString('logo');

        return $validator;
    }
}
 
