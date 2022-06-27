<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sections Model
 *
 * @property \App\Model\Table\ThemesTable|\Cake\ORM\Association\BelongsTo $Theme

 * @property \App\Model\Table\SlidersTable|\Cake\ORM\Association\BelongsTo $Sliders
 * @property \App\Model\Table\ImagesTable|\Cake\ORM\Association\BelongsTo $Images
 */
class SectionsTable extends Table
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

        $this->setTable('section');
        $this->setDisplayField('nom');
        $this->setPrimaryKey('id');

        $this->belongsTo('Themes', [
            'foreignKey' => 'theme_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Sliders', [
            'foreignKey' => 'slider_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Images', [
            'foreignKey' => 'image_id',
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
            ->scalar('nom')
            ->maxLength('nom', 255)
            ->allowEmptyString('nom');


        $validator
            ->scalar('texte')
            ->maxLength('texte', 255)
            ->allowEmptyString('texte');

        return $validator;
    }

    /**
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['theme_id'], 'Themes'));
        $rules->add($rules->existsIn(['slider_id'], 'Sliders'));
        $rules->add($rules->existsIn(['image_id'], 'Images'));
        return $rules;
    }

    
}
