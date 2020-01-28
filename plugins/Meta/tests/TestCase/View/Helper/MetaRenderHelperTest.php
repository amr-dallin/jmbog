<?php
namespace Meta\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use Meta\View\Helper\MetaRenderHelper;

/**
 * Meta\View\Helper\MetaRenderHelper Test Case
 */
class MetaRenderHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Meta\View\Helper\MetaRenderHelper
     */
    public $MetaRender;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->MetaRender = new MetaRenderHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MetaRender);

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
