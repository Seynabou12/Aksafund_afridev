<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Themes Model
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ThemesTable extends Table
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

        $this->setTable('theme');
        $this->setDisplayField('nomTheme');
        $this->setPrimaryKey('idTheme');

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
            ->integer('idTheme')
            ->allowEmptyString('idTheme', 'create');

        $validator
            ->scalar('nomTheme')
            ->maxLength('nomTheme', 100)
            ->allowEmptyString('nomTheme');

        return $validator;
    }

}
 
