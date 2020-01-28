<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MetaTags Model
 *
 * @method \App\Model\Entity\MetaTag get($primaryKey, $options = [])
 * @method \App\Model\Entity\MetaTag newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MetaTag[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MetaTag|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MetaTag saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MetaTag patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MetaTag[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MetaTag findOrCreate($search, callable $callback = null, $options = [])
 */
class MetaTagsTable extends Table
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

        $this->setTable('meta_tags');
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
            ->integer('foreign_key')
            ->requirePresence('foreign_key', 'create')
            ->notEmptyString('foreign_key');

        $validator
            ->scalar('model')
            ->maxLength('model', 128)
            ->requirePresence('model', 'create')
            ->notEmptyString('model');

        $validator
            ->scalar('property')
            ->maxLength('property', 50)
            ->requirePresence('property', 'create')
            ->notEmptyString('property');

        $validator
            ->scalar('value')
            ->maxLength('value', 255)
            ->requirePresence('value', 'create')
            ->notEmptyString('value');

        return $validator;
    }
}
