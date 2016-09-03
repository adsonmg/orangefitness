<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SocialMedias Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Trainers
 *
 * @method \App\Model\Entity\SocialMedia get($primaryKey, $options = [])
 * @method \App\Model\Entity\SocialMedia newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SocialMedia[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SocialMedia|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SocialMedia patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SocialMedia[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SocialMedia findOrCreate($search, callable $callback = null)
 */
class SocialMediasTable extends Table
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

        $this->table('social_medias');
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
            ->allowEmpty('facebook');

        $validator
            ->allowEmpty('twitter');

        $validator
            ->allowEmpty('linkedin');

        $validator
            ->allowEmpty('youtube');

        $validator
            ->email('email')
            ->allowEmpty('email');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['trainers_id']));
        $rules->add($rules->existsIn(['trainers_id'], 'Trainers'));

        return $rules;
    }
    
    /**
     * To tell whether or not the user is authorized to change stuff
     * @param type $telephoneId
     * @param type $trainerid
     * @return type
     */
    public function isOwnedBy($socialMediaId, $userId)
    {
        $trainerid = $this->Trainers->find('trainer', ['users_id' => $userId])
                            ->first()
                            ->toArray();
        return $this->exists(['id' => $socialMediaId, 'trainers_id' => $trainerid['id']]);
    }
}
