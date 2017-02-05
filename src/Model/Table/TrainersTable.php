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

        //A trainer profile belongs to an user
        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER'
        ]);
        
        //Many trainers can have many specialties
        $this->belongsToMany('Specialties', [
            'foreignKey' => 'trainer_id',
            'targetForeignKey' => 'specialty_id',
            'joinTable' => 'trainers_specialties'
        ]);
        
        //A trainer has one group of social medias
        $this->hasOne('SocialMedias', [
            'foreignKey' => 'trainers_id',
            'dependent' => true
        ]);
        
        
        //A trainer has many telephones
        $this->hasMany('Telephones', [
            'foreignKey' => 'trainers_id',
            'dependent' => true
        ]);
        
        //A trainer has many certificates
        $this->hasMany('Certificates', [
            'foreignKey' => 'trainers_id',
            'dependent' => true
        ]);
        
        //A trainer can have many articles
        $this->hasMany('Articles', [
            'foreignKey' => 'trainers_id',
            'dependent' => true
        ]);
        
        //A trainer can have many articles
        $this->hasMany('Degrees', [
            'foreignKey' => 'trainers_id',
            'dependent' => true
        ]);
        
        //A trainer can have many articles
        $this->hasMany('Locations', [
            'foreignKey' => 'trainers_id',
            'dependent' => true
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
    
    /**
     * Custom method to find a trainer by its user_id
     * @param Query $query
     * @param array $options
     * @return type
     */
    public function findTrainer(Query $query, array $options)
    {
        $userId = $options['users_id'];
        return $query->where(['users_id' => $userId]);
    }
    
    /**
     * findTrainer Method
     * 
     * The $query argument is a query builder instance
     * The $options array will contain the 'tags' option we passed
     * to find('trainer') in our controller action
     */
    public function findTrainers(Query $query, array $options)
    {
        //debug($options['specialty_id']);
        return $this->find('all')
                    ->contain(['Users','Specialties'])
                    ->innerJoinWith('Specialties', function ($q) use ($options) {
                        return $q->where([
                                    //We can use IN clause to replace many OR conditions
                                    'Specialties.id IN' => $options['specialty_id']
                                ]);
                    });
    }
}
