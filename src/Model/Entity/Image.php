<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Image Entity
 * 
 * @property \App\Model\Entity\Section[] $section
 * @property \App\Model\Entity\Image[] $image
 * 
 * @property string|null $image
 * @property int $section_id
 */
class Image extends Entity
{
    protected $_accessible = [
        'image'=>true,
        'id_section'=>true,
        'section'=>true
    ];
}