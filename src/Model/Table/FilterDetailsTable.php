<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FilterDetails Model
 *
 * @property \App\Model\Table\FiltersTable&\Cake\ORM\Association\BelongsTo $Filters
 *
 * @method \App\Model\Entity\FilterDetail newEmptyEntity()
 * @method \App\Model\Entity\FilterDetail newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\FilterDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FilterDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\FilterDetail findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\FilterDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FilterDetail[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\FilterDetail|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FilterDetail saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FilterDetail[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\FilterDetail[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\FilterDetail[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\FilterDetail[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FilterDetailsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('filter_details');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Filters', [
            'foreignKey' => 'filter_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('filter_id')
            ->notEmptyString('filter_id');

        $validator
            ->scalar('ad_id_out')
            ->maxLength('ad_id_out', 255)
            ->requirePresence('ad_id_out', 'create')
            ->notEmptyString('ad_id_out');

        $validator
            ->scalar('ad_img')
            ->requirePresence('ad_img', 'create')
            ->notEmptyString('ad_img');

        $validator
            ->scalar('ad_title')
            ->maxLength('ad_title', 255)
            ->requirePresence('ad_title', 'create')
            ->notEmptyString('ad_title');

        $validator
            ->scalar('ad_link')
            ->requirePresence('ad_link', 'create')
            ->notEmptyString('ad_link');

        $validator
            ->decimal('ad_price')
            ->requirePresence('ad_price', 'create')
            ->notEmptyString('ad_price');

        $validator
            ->scalar('ad_city')
            ->maxLength('ad_city', 255)
            ->allowEmptyString('ad_city');

        $validator
            ->scalar('ad_pro')
            ->allowEmptyString('ad_pro');

        $validator
            ->integer('favourite')
            ->requirePresence('favourite', 'create')
            ->notEmptyString('favourite');

        $validator
            ->integer('removed')
            ->requirePresence('removed', 'create')
            ->notEmptyString('removed');

        $validator
            ->integer('view_status')
            ->requirePresence('view_status', 'create')
            ->notEmptyString('view_status');

        $validator
            ->integer('notification_status')
            ->notEmptyString('notification_status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('filter_id', 'Filters'), ['errorField' => 'filter_id']);

        return $rules;
    }
}
