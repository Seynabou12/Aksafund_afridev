<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Section Entity
 * 
 *  @property \App\Model\Entity\Theme[] $theme
 */
class Section extends Entity
{
    protected $_accessible = [
        'nomSection'=>true,
        'texte'=>true,
        'idTheme'=>true
    ];
}

