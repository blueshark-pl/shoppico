<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Subscription Entity
 *
 * @property string $id
 * @property string $name
 * @property string $users_email
 * @property float $netto
 * @property float $brutto
 * @property int $vat
 * @property int $months
 * @property int $filters_max
 * @property string|null $notes
 * @property string|null $description
 * @property bool $active
 * @property int $discount
 * @property bool $removed
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class Subscription extends Entity
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
        'name' => true,
        'users_email' => true,
        'netto' => true,
        'brutto' => true,
        'vat' => true,
        'months' => true,
        'filters_max' => true,
        'notes' => true,
        'description' => true,
        'active' => true,
        'discount' => true,
        'removed' => true,
        'created' => true,
        'modified' => true,
    ];
}
