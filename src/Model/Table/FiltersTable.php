<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Filters Model
 *
 * @property \CakeDC\Users\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\FilterDetailsTable&\Cake\ORM\Association\HasMany $FilterDetails
 *
 * @method \App\Model\Entity\Filter newEmptyEntity()
 * @method \App\Model\Entity\Filter newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Filter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Filter get($primaryKey, $options = [])
 * @method \App\Model\Entity\Filter findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Filter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Filter[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Filter|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Filter saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Filter[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Filter[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Filter[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Filter[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FiltersTable extends Table
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

        $this->setTable('filters');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('MyUsers', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('FilterDetails', [
            'foreignKey' => 'filter_id',
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
            ->scalar('user_id')
            ->maxLength('user_id', 255)
            ->notEmptyString('user_id');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->integer('notification')
            ->requirePresence('notification', 'create')
            ->notEmptyString('notification');

        $validator
            ->integer('removed')
            ->requirePresence('removed', 'create')
            ->notEmptyString('removed');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->integer('priority')
            ->requirePresence('priority', 'create')
            ->notEmptyString('priority');

        $validator
            ->integer('private_tab')
            ->requirePresence('private_tab', 'create')
            ->notEmptyString('private_tab');

        $validator
            ->scalar('link')
            ->requirePresence('link', 'create')
            ->notEmptyString('link');

        $validator
            ->dateTime('last_update')
            ->allowEmptyDateTime('last_update');

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
        $rules->add($rules->existsIn('user_id', 'MyUsers'), ['errorField' => 'user_id']);

        return $rules;
    }
}
