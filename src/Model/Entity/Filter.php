<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Filter Entity
 *
 * @property int $id
 * @property string $user_id
 * @property string $title
 * @property int $notification
 * @property int $removed
 * @property int $status
 * @property int $priority
 * @property int $private_tab
 * @property string $link
 * @property int $interval
 * @property \Cake\I18n\FrozenTime|null $last_update
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \CakeDC\Users\Model\Entity\User $user
 * @property \App\Model\Entity\FilterDetail[] $filter_details
 */
class Filter extends Entity
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
        'title' => true,
        'notification' => true,
        'removed' => true,
        'status' => true,
        'priority' => true,
        'private_tab' => true,
        'link' => true,
        'interval' => true,
        'last_update' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'filter_details' => true,
    ];
}
