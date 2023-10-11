<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UserProfilesFixture
 */
class UserProfilesFixture extends TestFixture
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
                'id' => '9cfe15b2-23ae-4553-9ecc-060701a69075',
                'user_id' => 'd37eba10-0a46-4772-94bf-b5f0292565d4',
                'company_name' => 'Lorem ipsum dolor sit amet',
                'nip' => 'Lorem ipsum dolor ',
                'regon' => 'Lorem ipsum ',
                'postal_code' => 'Lore',
                'city' => 'Lorem ipsum dolor sit amet',
                'street' => 'Lorem ipsum dolor sit amet',
                'local_number' => 1,
                'phone' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-08-09 09:30:16',
                'modified' => '2023-08-09 09:30:16',
            ],
        ];
        parent::init();
    }
}
