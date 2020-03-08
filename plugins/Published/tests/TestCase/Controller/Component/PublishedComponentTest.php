<?php
namespace Published\Test\TestCase\Controller\Component;

use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;
use Published\Controller\Component\PublishedComponent;

/**
 * Published\Controller\Component\PublishedComponent Test Case
 */
class PublishedComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Published\Controller\Component\PublishedComponent
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
        $registry = new ComponentRegistry();
        $this->Published = new PublishedComponent($registry);
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
