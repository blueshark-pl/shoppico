<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FiltersFixture
 */
class FiltersFixture extends TestFixture
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
                'id' => 1,
                'user_id' => 'Lorem ipsum dolor sit amet',
                'title' => 'Lorem ipsum dolor sit amet',
                'notification' => 1,
                'removed' => 1,
                'status' => 1,
                'priority' => 1,
                'private_tab' => 1,
                'link' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'interval' => 1,
                'last_update' => '2023-08-04 14:33:05',
                'created' => '2023-08-04 14:33:05',
                'modified' => '2023-08-04 14:33:05',
            ],
        ];
        parent::init();
    }
}
