<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Campagne Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $desc_courte
 * @property string|null $desc_longue
 * @property \Cake\I18n\FrozenTime|null $created
 * @property string|null $lien
 * @property int|null $status
 * @property float|null $montant
 * @property int $category_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Fichier[] $fichiers
 * @property \App\Model\Entity\Participation[] $participations
 */
class Campagne extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'desc_courte' => true,
        'desc_longue' => true,
        'created' => true,
        'lien' => true,
        'status' => true,
        'montant' => true,
        'category_id' => true,
        'user_id' => true,
        'category' => true,
        'user' => true,
        'fichiers' => true,
        'participations' => true
    ];
}
