<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FilterDetail Entity
 *
 * @property int $id
 * @property int $filter_id
 * @property string $ad_id_out
 * @property string $ad_img
 * @property string $ad_title
 * @property string $ad_link
 * @property string $ad_price
 * @property string|null $ad_city
 * @property string|null $ad_pro
 * @property string $ad_featured
 * @property int $favourite
 * @property int $removed
 * @property int $view_status
 * @property int $notification_status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Filter $filter
 */
class FilterDetail extends Entity
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
        'filter_id' => true,
        'ad_id_out' => true,
        'ad_img' => true,
        'ad_title' => true,
        'ad_link' => true,
        'ad_price' => true,
        'ad_city' => true,
        'ad_pro' => true,
        'favourite' => true,
        'removed' => true,
        'view_status' => true,
        'notification_status' => true,
        'created' => true,
        'modified' => true,
        'filter' => true,
    ];
}
