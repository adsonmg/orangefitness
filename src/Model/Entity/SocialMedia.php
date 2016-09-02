<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SocialMedia Entity
 *
 * @property int $id
 * @property string $facebook
 * @property string $twitter
 * @property string $linkedin
 * @property string $youtube
 * @property string $email
 * @property int $trainers_id
 *
 * @property \App\Model\Entity\Trainer $trainer
 */
class SocialMedia extends Entity
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
}
