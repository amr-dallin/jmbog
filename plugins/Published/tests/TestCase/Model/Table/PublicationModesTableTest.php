<?php
namespace Published\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Published\Model\Table\PublicationModesTable;

/**
 * Published\Model\Table\PublicationModesTable Test Case
 */
class PublicationModesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Published\Model\Table\PublicationModesTable
     */
    public $PublicationModes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.Published.PublicationModes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PublicationModes') ? [] : ['className' => PublicationModesTable::class];
        $this->PublicationModes = TableRegistry::getTableLocator()->get('PublicationModes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PublicationModes);

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
