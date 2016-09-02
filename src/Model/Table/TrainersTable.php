<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Trainers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsToMany $Specialties
 *
 * @method \App\Model\Entity\Trainer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Trainer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Trainer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Trainer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Trainer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Trainer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Trainer findOrCreate($search, callable $callback = null)
 */
class TrainersTable extends Table
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

        $this->table('trainers');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Specialties', [
            'foreignKey' => 'trainer_id',
            'targetForeignKey' => 'specialty_id',
            'joinTable' => 'trainers_specialties'
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
            ->integer('type_of_section')
            ->requirePresence('type_of_section', 'create')
            ->notEmpty('type_of_section');

        $validator
            ->allowEmpty('bio');


        $validator
            ->numeric('average_price')
            ->allowEmpty('average_price');

        $validator
            ->allowEmpty('CREF');


        $validator
            ->integer('years_training')
            ->requirePresence('years_training', 'create')
            ->notEmpty('years_training');

        $validator
            ->allowEmpty('url');


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
        $rules->add($rules->isUnique(['CREF']));
        $rules->add($rules->existsIn(['users_id'], 'Users'));

        return $rules;
    }
}
