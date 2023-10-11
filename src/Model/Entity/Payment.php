<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Payment Entity
 *
 * @property string $id
 * @property string $user_id
 * @property string $id_operation
 * @property int $filter_limit
 * @property int $month_limit
 * @property string $operation_number
 * @property string $operation_type
 * @property string $operation_status
 * @property float $operation_amount
 * @property string $operation_currency
 * @property float $operation_original_amount
 * @property string $operation_original_currency
 * @property \Cake\I18n\FrozenTime $operation_datetime
 * @property int|null $orderId
 * @property string $control
 * @property string $description
 * @property string $email
 * @property string $p_info
 * @property string $p_email
 * @property int|null $is_mail_campain
 * @property int|null $channel
 * @property string $signature
 * @property int|null $invoice_id
 * @property int|null $is_verify
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \CakeDC\Users\Model\Entity\User $user
 */
class Payment extends Entity
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
        'id_operation' => true,
        'filter_limit' => true,
        'month_limit' => true,
        'operation_number' => true,
        'operation_type' => true,
        'operation_status' => true,
        'operation_amount' => true,
        'operation_currency' => true,
        'operation_original_amount' => true,
        'operation_original_currency' => true,
        'operation_datetime' => true,
        'orderId' => true,
        'control' => true,
        'description' => true,
        'email' => true,
        'p_info' => true,
        'p_email' => true,
        'is_mail_campain' => true,
        'channel' => true,
        'signature' => true,
        'invoice_id' => true,
        'is_verify' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
    ];
}
