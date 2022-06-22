<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Participation Entity
 *
 * @property int $id
 * @property string|null $nom
 * @property string|null $prenom
 * @property string|null $adresse
 * @property int|null $telephone
 * @property string|null $etatpaiement
 * @property int|null $montant
 * @property bool $status
 * @property bool|null $anonyme
 * @property int|null $participant_id
 * @property int $campagne_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property string|null $token
 *
 * @property \App\Model\Entity\Participant $participant
 * @property \App\Model\Entity\Campagne $campagne
 */
class Participation extends Entity
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
        'nom' => true,
        'prenom' => true,
        'email' => true,
        'telephone' => true,
        'etatpaiement' => true,
        'montant' => true,
        'status' => true,
        'anonyme' => true,
        'participant_id' => true,
        'campagne_id' => true,
        'created' => true,
        'token' => true,
        'participant' => true,
        'campagne' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'token',
    ];
}
