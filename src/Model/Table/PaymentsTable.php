<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Payments Model
 *
 * @property \CakeDC\Users\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Payment newEmptyEntity()
 * @method \App\Model\Entity\Payment newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Payment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Payment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Payment findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Payment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Payment[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Payment|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Payment saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Payment[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Payment[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Payment[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Payment[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PaymentsTable extends Table
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

        $this->setTable('payments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('MyUsers', [
            'foreignKey' => 'user_id',
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
            ->scalar('user_id')
            ->maxLength('user_id', 255)
            ->notEmptyString('user_id');

        $validator
            ->scalar('id_operation')
            ->maxLength('id_operation', 255)
            ->requirePresence('id_operation', 'create')
            ->notEmptyString('id_operation');

        $validator
            ->integer('filter_limit')
            ->requirePresence('filter_limit', 'create')
            ->notEmptyString('filter_limit');

        $validator
            ->integer('month_limit')
            ->requirePresence('month_limit', 'create')
            ->notEmptyString('month_limit');

        $validator
            ->scalar('operation_number')
            ->maxLength('operation_number', 50)
            ->requirePresence('operation_number', 'create')
            ->notEmptyString('operation_number')
            ->add('operation_number', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('operation_type')
            ->maxLength('operation_type', 50)
            ->requirePresence('operation_type', 'create')
            ->notEmptyString('operation_type');

        $validator
            ->scalar('operation_status')
            ->maxLength('operation_status', 50)
            ->requirePresence('operation_status', 'create')
            ->notEmptyString('operation_status');

        $validator
            ->numeric('operation_amount')
            ->requirePresence('operation_amount', 'create')
            ->notEmptyString('operation_amount');

        $validator
            ->scalar('operation_currency')
            ->maxLength('operation_currency', 10)
            ->requirePresence('operation_currency', 'create')
            ->notEmptyString('operation_currency');

        $validator
            ->numeric('operation_original_amount')
            ->requirePresence('operation_original_amount', 'create')
            ->notEmptyString('operation_original_amount');

        $validator
            ->scalar('operation_original_currency')
            ->maxLength('operation_original_currency', 10)
            ->requirePresence('operation_original_currency', 'create')
            ->notEmptyString('operation_original_currency');

        $validator
            ->dateTime('operation_datetime')
            ->requirePresence('operation_datetime', 'create')
            ->notEmptyDateTime('operation_datetime');

        $validator
            ->integer('orderId')
            ->allowEmptyString('orderId');

        $validator
            ->scalar('control')
            ->maxLength('control', 255)
            ->requirePresence('control', 'create')
            ->notEmptyString('control');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('p_info')
            ->requirePresence('p_info', 'create')
            ->notEmptyString('p_info');

        $validator
            ->scalar('p_email')
            ->maxLength('p_email', 150)
            ->requirePresence('p_email', 'create')
            ->notEmptyString('p_email');

        $validator
            ->integer('is_mail_campain')
            ->allowEmptyString('is_mail_campain');

        $validator
            ->integer('channel')
            ->allowEmptyString('channel');

        $validator
            ->scalar('signature')
            ->maxLength('signature', 255)
            ->requirePresence('signature', 'create')
            ->notEmptyString('signature');

        $validator
            ->integer('invoice_id')
            ->allowEmptyString('invoice_id');

        $validator
            ->integer('is_verify')
            ->allowEmptyString('is_verify');

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
        $rules->add($rules->isUnique(['operation_number']), ['errorField' => 'operation_number']);
        $rules->add($rules->existsIn('user_id', 'MyUsers'), ['errorField' => 'user_id']);

        return $rules;
    }
}
