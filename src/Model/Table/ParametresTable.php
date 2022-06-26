<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Parametres Model
 * @property \App\Model\Table\ParametresTable
 */
class ParametresTable extends Table
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

        $this->setTable('parametres_generaux');
        $this->setDisplayField('nomPlateforme');
        $this->setPrimaryKey('id');
        
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
            ->scalar('nomPlateforme')
            ->maxLength('nomPlateforme', 100)
            ->allowEmptyString('nomPlateforme');

        $validator
            ->scalar('email')
            ->maxLength('email', 255)
            ->allowEmptyString('email');
    
        $validator
            ->scalar('telephone')
            ->maxLength('telephone', 60)
            ->allowEmptyString('telephone');

        $validator
            ->scalar('adresse')
            ->maxLength('adresse', 100)
            ->allowEmptyString('adresse');
        $validator
            ->scalar('code_postal')
            ->maxLength('code_postal', 5)
            ->allowEmptyString('code_postal');
       
        $validator
            ->scalar('ville')
            ->maxLength('ville', 255)
            ->allowEmptyString('ville');

        $validator
            ->scalar('pays')
            ->maxLength('pays', 255)
            ->allowEmptyString('pays');
        
        $validator
            ->scalar('logo')
            ->maxLength('logo', 255)
            ->allowEmptyString('logo');
        

        return $validator;
    }
}
