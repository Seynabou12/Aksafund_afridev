<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Section Entity
 *
 * @property int $id
 * @property string|null $nom
 * @property string|null $texte
 * @property int $theme_id
 *
 * @property \App\Model\Entity\Theme $theme
 */
class Section extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'nom' => true,
        'texte' => true,
        'theme_id' => true,
        'theme' => true
    ];
}
