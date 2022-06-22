<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Participant Entity
 *
 * @property int $id
 * @property string|null $status
 * @property int|null $user_id
 * @property string|null $fname
 * @property string|null $lname
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Participation[] $participations
 */
class Participant extends Entity
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
        'status' => true,
        'user_id' => true,
        'fname' => true,
        'lname' => true,
        'user' => true,
        'participations' => true
    ];
}
