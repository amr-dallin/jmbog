<?php
namespace Meta\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Meta\Model\Table\MetaTagsTable;

/**
 * Meta\Model\Table\MetaTagsTable Test Case
 */
class MetaTagsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Meta\Model\Table\MetaTagsTable
     */
    public $MetaTags;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.Meta.MetaTags'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MetaTags') ? [] : ['className' => MetaTagsTable::class];
        $this->MetaTags = TableRegistry::getTableLocator()->get('MetaTags', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MetaTags);

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
