<?php

    // src/Model/Entity/Article.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ParamGeneraux Entity
 * 
 * @property \App\Model\Entity\Theme[] $theme
 */

class ParamGeneraux extends Entity
{
    protected $_accessible = [
        'nomPlateforme' => true,
        'logoPlateforme'=>true,
        'telephonePlateforme'=>true,
        'adressePlateforme'=>true,
        'emailPlateforme'=>true,
        'code_postal'=>true,
        'ville'=>true,
        'pays'=>true,
        
    ];
}

?>