<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FilterDetailsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FilterDetailsTable Test Case
 */
class FilterDetailsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FilterDetailsTable
     */
    protected $FilterDetails;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.FilterDetails',
        'app.Filters',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('FilterDetails') ? [] : ['className' => FilterDetailsTable::class];
        $this->FilterDetails = $this->getTableLocator()->get('FilterDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->FilterDetails);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\FilterDetailsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\FilterDetailsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
