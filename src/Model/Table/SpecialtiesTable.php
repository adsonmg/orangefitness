<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Specialties Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Trainers
 *
 * @method \App\Model\Entity\Specialty get($primaryKey, $options = [])
 * @method \App\Model\Entity\Specialty newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Specialty[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Specialty|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Specialty patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Specialty[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Specialty findOrCreate($search, callable $callback = null)
 */
class SpecialtiesTable extends Table
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

        $this->table('specialties');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsToMany('Trainers', [
            'foreignKey' => 'specialty_id',
            'targetForeignKey' => 'trainer_id',
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->allowEmpty('description');

        $validator
            ->integer('filter_category')
            ->allowEmpty('filter_category');

        return $validator;
    }
}
