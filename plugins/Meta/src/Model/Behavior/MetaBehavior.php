<?php
namespace Meta\Model\Behavior;

use ArrayObject;
use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

/**
 * Meta behavior
 */
class MetaBehavior extends Behavior
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     * Initialize method
     *
     * @param array $config Configuration options
     * @return void
     */
    public function initialize(array $config)
    {
        $this->_table->hasMany('MetaTags', [
            'className' => 'Meta.MetaTags',
            'foreignKey' => 'foreign_key',
            'conditions' => [
                'MetaTags.model' => $this->_table->getAlias()
            ],
            'cascadeCallbacks' => true,
            'dependent' => true
        ]);
    }

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
        if (!empty($entity->meta_tags)) {
            foreach ($entity->meta_tags as $key => $metaTags) {
                $entity->meta_tags[$key]->set('model', $this->_table->getAlias());
            }
        }
    }
}
