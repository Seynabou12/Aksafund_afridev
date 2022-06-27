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
 * @property int $slider_id
 * @property int $image_id
 *
 * @property \App\Model\Entity\Theme $theme
 * @property \App\Model\Entity\Slider $slider
 * @property \App\Model\Entity\Image $image
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
        'theme' => true,
        'slider_id' => true,
        'slider' => true,
        'image'=>true,
        'image_id'=>true
    ];
}
