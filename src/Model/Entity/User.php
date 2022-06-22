<?php
namespace App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string|null $email
 * @property string|null $password
 * @property string|null $fname
 * @property string|null $lname
 * @property string|null $status
 * @property \Cake\I18n\FrozenTime|null $created
 * @property string|null $adresse
 * @property string|null $telephone
 *
 * @property \App\Model\Entity\Campagne[] $campagnes
 * @property \App\Model\Entity\Participant[] $participants
 * @property \App\Model\Entity\Role[] $roles
 */
class User extends Entity
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
        'email' => true,
        'password' => true,
        'fname' => true,
        'lname' => true,
        'status' => true,
        'created' => true,
        'adresse' => true,
        'telephone' => true,
        'campagnes' => true,
        'participants' => true,
        'roles' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
    protected function _getNomComplet()
    {
        return
            $this->_properties['fname'] .
            ' ' .
            $this->_properties['lname'];

    }
    protected function _setPassword($value)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }
}
