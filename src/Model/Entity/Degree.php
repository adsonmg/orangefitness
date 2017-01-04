<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Degree Entity
 *
 * @property int $id
 * @property string $instituition
 * @property string $course
 * @property string $duration
 * @property string $description
 * @property int $trainers_id
 *
 * @property \App\Model\Entity\Trainer $trainer
 */
class Degree extends Entity
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
