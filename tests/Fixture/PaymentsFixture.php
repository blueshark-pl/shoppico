<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PaymentsFixture
 */
class PaymentsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => '6d8b25ba-f878-4f9d-b67a-b8935e135a33',
                'user_id' => 'Lorem ipsum dolor sit amet',
                'id_operation' => 'Lorem ipsum dolor sit amet',
                'filter_limit' => 1,
                'month_limit' => 1,
                'operation_number' => 'Lorem ipsum dolor sit amet',
                'operation_type' => 'Lorem ipsum dolor sit amet',
                'operation_status' => 'Lorem ipsum dolor sit amet',
                'operation_amount' => 1,
                'operation_currency' => 'Lorem ip',
                'operation_original_amount' => 1,
                'operation_original_currency' => 'Lorem ip',
                'operation_datetime' => '2023-08-08 22:52:24',
                'orderId' => 1,
                'control' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'p_info' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'p_email' => 'Lorem ipsum dolor sit amet',
                'is_mail_campain' => 1,
                'channel' => 1,
                'signature' => 'Lorem ipsum dolor sit amet',
                'invoice_id' => 1,
                'is_verify' => 1,
                'created' => '2023-08-08 22:52:24',
                'modified' => '2023-08-08 22:52:24',
            ],
        ];
        parent::init();
    }
}
