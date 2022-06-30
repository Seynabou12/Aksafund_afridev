<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Slider Entity
 * Section Entity

 * @property int $id
 * @property string|null $titre
 * @property string|null $description
 * @property string|null $images
 * @property int $section_id
 * 
 * @property \App\Model\Entity\Slider $section 
 * @property \App\Model\Entity\Section $section
 */
class Slider extends Entity
{
    protected $_accessible = [
        'titre'=>true,
        'description'=>true,
        'images'=>true,
        'id_section'=>true,
        'section'=>true
    ];
}

?>