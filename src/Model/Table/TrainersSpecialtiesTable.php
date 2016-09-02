<?php
namespace App\Model\Table;

use App\Model\Entity\TrainersSpecialty;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TrainersSpecialties Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Trainers
 * @property \Cake\ORM\Association\BelongsTo $Specialties
 */
class TrainersSpecialtiesTable extends Table
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

        $this->table('trainers_specialties');
        $this->displayField('trainer_id');
        $this->primaryKey(['trainer_id', 'specialty_id']);

        $this->belongsTo('Trainers', [
            'foreignKey' => 'trainer_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Specialties', [
            'foreignKey' => 'specialty_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['trainer_id'], 'Trainers'));
        $rules->add($rules->existsIn(['specialty_id'], 'Specialties'));
        return $rules;
    }
}
