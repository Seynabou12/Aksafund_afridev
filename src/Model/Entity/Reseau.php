<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reseau Entity
 * 
 * @property int $id
 * @property string|null $nom
 * @property string|null $logo
 * @property string|null $lien
 */
class Reseau extends Entity
{
    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $_accessible = [
        'nom'=>true,
        'logo'=>true,
        'lien'=>true,
    ];
}