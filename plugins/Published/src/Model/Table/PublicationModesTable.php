<?php
namespace Published\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use ArrayObject;
use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\I18n\Time;

/**
 * PublicationModes Model
 *
 * @method \Published\Model\Entity\PublicationMode get($primaryKey, $options = [])
 * @method \Published\Model\Entity\PublicationMode newEntity($data = null, array $options = [])
 * @method \Published\Model\Entity\PublicationMode[] newEntities(array $data, array $options = [])
 * @method \Published\Model\Entity\PublicationMode|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Published\Model\Entity\PublicationMode saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Published\Model\Entity\PublicationMode patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Published\Model\Entity\PublicationMode[] patchEntities($entities, array $data, array $options = [])
 * @method \Published\Model\Entity\PublicationMode findOrCreate($search, callable $callback = null, $options = [])
 */
class PublicationModesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('publication_modes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->uuid('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->boolean('mode')
            ->notEmptyString('mode');

        return $validator;
    }

    public function beforeSave(Event $event, Entity $entity, ArrayObject $options)
    {
        $entity->date = $entity->mode ? new Time() : null;
    }

    public function changePublished($entity)
    {
        $entity->mode = $entity->mode ? false : true;

        return $this->save($entity);
    }

    public function findByForeignKey(Query $query, Array $options)
    {
        return $query
            ->where(['Published.foreign_key' => $options['foreign_key']]);
    }
}
