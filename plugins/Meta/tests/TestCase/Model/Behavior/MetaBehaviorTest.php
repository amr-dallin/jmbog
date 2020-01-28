<?php
namespace Meta\Test\TestCase\Model\Behavior;

use Cake\TestSuite\TestCase;
use Meta\Model\Behavior\MetaBehavior;

/**
 * Meta\Model\Behavior\MetaBehavior Test Case
 */
class MetaBehaviorTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Meta\Model\Behavior\MetaBehavior
     */
    public $Meta;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Meta = new MetaBehavior();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Meta);

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
