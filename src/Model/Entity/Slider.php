<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Slider Entity
 * 
 *  @property \App\Model\Entity\Section[] $section
 */
class Slider extends Entity
{
    protected $_accessible = [
        'titre'=>true,
        'images'=>true,
        'idSection'=>true
    ];
}

?>