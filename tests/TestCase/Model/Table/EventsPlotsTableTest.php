<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EventsPlotsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EventsPlotsTable Test Case
 */
class EventsPlotsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EventsPlotsTable
     */
    public $EventsPlots;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.EventsPlots',
        'app.Events',
        'app.Plots',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('EventsPlots') ? [] : ['className' => EventsPlotsTable::class];
        $this->EventsPlots = TableRegistry::getTableLocator()->get('EventsPlots', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EventsPlots);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
