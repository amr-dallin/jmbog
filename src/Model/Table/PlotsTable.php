<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Plots Model
 *
 * @property \App\Model\Table\PeopleTable&\Cake\ORM\Association\BelongsTo $People
 * @property \App\Model\Table\EventsTable&\Cake\ORM\Association\BelongsToMany $Events
 *
 * @method \App\Model\Entity\Plot get($primaryKey, $options = [])
 * @method \App\Model\Entity\Plot newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Plot[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Plot|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Plot saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Plot patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Plot[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Plot findOrCreate($search, callable $callback = null, $options = [])
 */
class PlotsTable extends Table
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

        $this->setTable('plots');
        $this->setDisplayField('number');
        $this->setPrimaryKey('id');

        $this->belongsTo('People', [
            'foreignKey' => 'person_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Events', [
            'foreignKey' => 'plot_id',
            'targetForeignKey' => 'event_id',
            'joinTable' => 'events_plots',
        ]);

        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'date_created' => 'new',
                    'date_modified' => 'always'
                ]
            ]
        ]);
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
            ->nonNegativeInteger('number')
            ->requirePresence('number', 'create')
            ->notEmptyString('number')
            ->add('number', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('notes')
            ->allowEmptyString('notes');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['number']));
        $rules->add($rules->existsIn(['person_id'], 'People'));

        return $rules;
    }

    public function beforeFind($event, $query, $options, $primary)
    {
        $order = $query->clause('order');
        if ($order === null || !count($order)) {
            $query->order([
                $this->aliasField('number') => 'ASC'
            ]);
        }
    }

}
