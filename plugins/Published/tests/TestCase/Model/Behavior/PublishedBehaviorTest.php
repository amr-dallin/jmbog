<?php
namespace Published\Test\TestCase\Model\Behavior;

use Cake\TestSuite\TestCase;
use Published\Model\Behavior\PublishedBehavior;

/**
 * Published\Model\Behavior\PublishedBehavior Test Case
 */
class PublishedBehaviorTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Published\Model\Behavior\PublishedBehavior
     */
    public $Published;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Published = new PublishedBehavior();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Published);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
