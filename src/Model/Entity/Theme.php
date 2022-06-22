<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Theme Entity
 * 
 * @property int $idTheme
 * @property string|null $nomTheme
 */
class Theme extends Entity
{
    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $_accessible = [
        'nomTheme'=>true
    ];
}