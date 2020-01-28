<?php
namespace ControlPanel\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use ControlPanel\View\Helper\FilesHelper;

/**
 * ControlPanel\View\Helper\FilesHelper Test Case
 */
class FilesHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \ControlPanel\View\Helper\FilesHelper
     */
    public $Files;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Files = new FilesHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Files);

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
