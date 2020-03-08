<?php
namespace Published\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use Published\View\Helper\PublishedHelper;

/**
 * Published\View\Helper\PublishedHelper Test Case
 */
class PublishedHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Published\View\Helper\PublishedHelper
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
        $view = new View();
        $this->Published = new PublishedHelper($view);
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
