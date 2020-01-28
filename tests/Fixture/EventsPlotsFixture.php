<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EventsPlotsFixture
 */
class EventsPlotsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'event_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'plot_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'event_id__INDEX' => ['type' => 'index', 'columns' => ['event_id'], 'length' => []],
            'plot_id__INDEX' => ['type' => 'index', 'columns' => ['plot_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'event_id__plot_id__UNIQUE' => ['type' => 'unique', 'columns' => ['event_id', 'plot_id'], 'length' => []],
            'fk_events__id____events_plots__event_id' => ['type' => 'foreign', 'columns' => ['event_id'], 'references' => ['events', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_plots__id____events_plots__plot_id' => ['type' => 'foreign', 'columns' => ['plot_id'], 'references' => ['plots', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'event_id' => 1,
                'plot_id' => 1,
            ],
        ];
        parent::init();
    }
}
