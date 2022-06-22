<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Image Entity
 * 
 * @property \App\Model\Entity\Section[] $section
 */
class Image extends Entity
{
    protected $_accessible = [
        'image'=>true,
        'idSection'=>true
    ];
}