<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Typecategorys Model
 *
 * @method \App\Model\Entity\Typecategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\Typecategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Typecategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Typecategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Typecategory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Typecategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Typecategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Typecategory findOrCreate($search, callable $callback = null, $options = [])
 */
class TypecategorysTable extends Table
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

        $this->setTable('typecategorys');
        $this->setDisplayField('name');
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
            ->scalar('name')
            ->maxLength('name', 45)
            ->allowEmptyString('name');

        $validator
            ->scalar('texte')
            ->maxLength('texte', 255)
            ->allowEmptyString('texte');

        $validator
            ->scalar('couleur')
            ->maxLength('couleur', 100)
            ->allowEmptyString('couleur');

        return $validator;
    }
}
