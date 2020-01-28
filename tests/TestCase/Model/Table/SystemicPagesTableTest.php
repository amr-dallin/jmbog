<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SystemicPagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SystemicPagesTable Test Case
 */
class SystemicPagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SystemicPagesTable
     */
    public $SystemicPages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.SystemicPages',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SystemicPages') ? [] : ['className' => SystemicPagesTable::class];
        $this->SystemicPages = TableRegistry::getTableLocator()->get('SystemicPages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SystemicPages);

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
}
