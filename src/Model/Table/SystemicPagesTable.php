<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SystemicPages Model
 *
 * @method \App\Model\Entity\SystemicPage get($primaryKey, $options = [])
 * @method \App\Model\Entity\SystemicPage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SystemicPage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SystemicPage|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SystemicPage saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SystemicPage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SystemicPage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SystemicPage findOrCreate($search, callable $callback = null, $options = [])
 */
class SystemicPagesTable extends Table
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

        $this->setTable('systemic_pages');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'date_created' => 'new',
                    'date_modified' => 'always'
                ]
            ]
        ]);
        $this->addBehavior('Meta.Meta');
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
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('body')
            ->allowEmptyString('body');

        return $validator;
    }

    public function findWithoutAssociations(Query $query, array $options)
    {
        return $query
            ->where([
                'SystemicPages.foreign_key IS' => null,
                'SystemicPages.model IS' => null
            ]);
    }
}
