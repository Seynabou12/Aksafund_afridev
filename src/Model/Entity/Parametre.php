<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Parametre Entity
 * @property int $id
 * @property string|null $nomPlateforme
 * @property string|null $email
 * @property string|null $telephone
 * @property string|null $adresse
 * @property string|null $code_postal
 * @property string|null $ville
 * @property string|null $pays
 */
class Parametre extends Entity
{
    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $_accessible = [
        'nomPlateforme'=>true,
        'email'=>true,
        'telephone'=>true,
        'adresse'=>true,
        'code_postal'=>true,
        'ville'=>true,
        'pays'=>true
    ];
}