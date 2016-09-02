<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher; 
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $CPF
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $last_login
 * @property int $role
 * @property bool $blocked
 * @property int $cities_id
 * @property int $states_id
 * @property string $picture
 * @property bool $activated
 * @property int $genre
 *
 * @property \App\Model\Entity\City $city
 * @property \App\Model\Entity\State $state
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
    
    protected function _setPassword($value)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }
}
