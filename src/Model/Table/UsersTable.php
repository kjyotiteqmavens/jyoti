<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('fname')
            ->maxLength('fname', 10)
            ->requirePresence('fname', 'create')
            ->notEmptyString('fname')
            ->add('fname', [
                'fname' => [
                    'rule' => array('custom', '/^[A-Za-z_][A-Za-z\d_]*$/'),
                    'message' => 'plaese enter Fristname in characters'
                ]
            ]);

        $validator
            ->scalar('lname')
            ->maxLength('lname', 255)
            ->requirePresence('lname', 'create')
            ->notEmptyString('lname')
            ->add('lname', [
                'lname' => [
                    'rule' => array('custom', '/^[A-Za-z_][A-Za-z\d_]*$/'),
                    'message' => 'plaese enter lastname in characters'
                ]
            ]);

        $validator
            ->scalar('phone')
            ->maxLength('phone', 255)
            ->requirePresence('phone', 'create')
            ->notEmptyString('phone')
            ->add('phone', [
                'minLength' => [
                    'rule' => ['minLength', 10],
                    'last' => true,
                    'message' => 'minimum length is 10.'
                ],
            ]);

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email')
            ->add('email', 'unique', [
                'rule' => 'validateUnique', 'provider' => 'table',
                'message' => 'Email already exist please enter another email',
            ]);

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmptyString('password')
            ->add('password', [
                'password' => [
                    'rule' => array('custom', '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]*).{8,}$/'),
                    'message' => 'Password should contain: 8 characters, 1 upper case, 1 lower case, 1 number'
                ]
            ]);

        $validator
            ->scalar('confirmpassword')
            ->maxLength('confirmpassword', 255)
            ->requirePresence('confirmpassword', 'create')
            ->notEmptyString('confirmpassword')
            ->add('confirmpassword', [
                'match' => [
                    'rule' => ['comparewith', 'password'],
                    'message' => 'Passwords do not match',
                    array('custom', '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]*).{8,}$/'),
                    'message' => 'Confirmpassword should contain: 8 characters, 1 upper case, 1 lower case, 1 number'
                ]
            ]);


        $validator
            ->scalar('gender')
            ->requirePresence('gender', 'create')
            ->notEmptyString('gender');
        // $validator
        //     ->allowEmptyFile('file');



        // $validator
        //     ->scalar('token')
        //     ->maxLength('token', 255)
        //     ->allowEmptyString('token');

        // $validator
        //     ->dateTime('create_Date')
        //     ->notEmptyDateTime('create_Date');

        // $validator
        //     ->dateTime('Modified_date')
        //     ->notEmptyDateTime('Modified_date');

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
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);

        return $rules;
    }
    public function findAuth(Query $query, array $options)
    {
        $query->where([
            'OR' => [
                'username' => $options['username'],
                'email' => $options['username']
            ]
        ], [], true);
        return $query;
    }
}
