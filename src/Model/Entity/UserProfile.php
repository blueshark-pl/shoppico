<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserProfile Entity
 *
 * @property string $id
 * @property string $user_id
 * @property string|null $company_name
 * @property string|null $nip
 * @property string|null $regon
 * @property string $postal_code
 * @property string $city
 * @property string|null $street
 * @property int|null $local_number
 * @property string|null $phone
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \CakeDC\Users\Model\Entity\User $user
 */
class UserProfile extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'user_id' => true,
        'company_name' => true,
        'nip' => true,
        'regon' => true,
        'postal_code' => true,
        'city' => true,
        'street' => true,
        'local_number' => true,
        'phone' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
    ];
}
