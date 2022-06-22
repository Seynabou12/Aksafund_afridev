<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Category Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $status
 * @property string|null $icone
 * @property int $typecategorys_id
 *
 * @property \App\Model\Entity\Typecategory $typecategory
 * @property \App\Model\Entity\Campagne[] $campagnes
 */
class Category extends Entity
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
        'name' => true,
        'status' => true,
        'icone' => true,
        'typecategory_id' => true,
        'typecategory' => true,
        'campagnes' => true
    ];
}
