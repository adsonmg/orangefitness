<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Telephones Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Trainers
 *
 * @method \App\Model\Entity\Telephone get($primaryKey, $options = [])
 * @method \App\Model\Entity\Telephone newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Telephone[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Telephone|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Telephone patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Telephone[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Telephone findOrCreate($search, callable $callback = null)
 */
class TelephonesTable extends Table
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

        $this->table('telephones');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Trainers', [
            'foreignKey' => 'trainers_id',
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
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('telephone', 'create')
            ->notEmpty('telephone');

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
        $rules->add($rules->existsIn(['trainers_id'], 'Trainers'));

        return $rules;
    }
}
