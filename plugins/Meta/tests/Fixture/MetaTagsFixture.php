<?php
namespace Meta\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MetaTagsFixture
 */
class MetaTagsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'foreign_key' => ['type' => 'integer', 'length' => 255, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'model' => ['type' => 'string', 'length' => 128, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'property' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'value' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'foreign_key__model__property__UNIQUE' => ['type' => 'unique', 'columns' => ['foreign_key', 'model', 'property'], 'length' => []],
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
                'id' => '6f3acbac-4de6-4310-9cbd-0e1678c77fcb',
                'foreign_key' => 1,
                'model' => 'Lorem ipsum dolor sit amet',
                'property' => 'Lorem ipsum dolor sit amet',
                'value' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
