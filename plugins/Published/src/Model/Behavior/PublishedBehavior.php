<?php
namespace Published\Model\Behavior;

use Cake\ORM\Query;
use Cake\ORM\Behavior;
use Cake\ORM\Table;
use ArrayObject;
use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\I18n\Time;

/**
 * Published behavior
 */
class PublishedBehavior extends Behavior
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'implementedMethods' => [
            'changePublished' => 'changePublished'
        ],
        'implementedFinders' => [
            'published' => 'findPublished',
        ]
    ];

    /**
     * Before Save Callback
     *
     * @param Cake/Event/Event $event The afterSave event that was fired.
     * @param Cake/ORM/Entity $entity The entity
     * @param ArrayObject $options Options
     * @return void
     */
    public function beforeSave(Event $event, Entity $entity, ArrayObject $options)
    {
        $entity->date_published = $entity->published ? new Time() : null;
    }

    public function changePublished($entity)
    {
        $entity->published = $entity->published ? false : true;

        return $this->getTable()->save($entity);
    }

    public function findPublished(Query $query, Array $options)
    {
        return $query
            ->where([
                $this->_table->getAlias() . '.published' => true
            ]);
    }
}
