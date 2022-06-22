<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ReseauxSociaux Entity
 * 
 */
class ReseauxSociaux extends Entity
{
    protected $_accessible = [
        'nomReseauxSociaux'=>true,
        'logo'=>true
    ];
}

?>