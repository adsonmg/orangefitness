<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Trainer Entity
 *
 * @property int $id
 * @property int $users_id
 * @property int $type_of_section
 * @property string $bio
 * @property float $rating
 * @property int $rating_count_votes
 * @property float $average_price
 * @property string $CREF
 * @property int $years_training
 * @property string $url
 * @property int $number_views
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Specialty[] $specialties
 */
class Trainer extends Entity
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
