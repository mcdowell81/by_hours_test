<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Reservations Model
 *
 * @method \App\Model\Entity\Reservation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Reservation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Reservation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Reservation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Reservation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Reservation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Reservation findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ReservationsTable extends Table
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

        $this->table('reservations');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Hotels', [
            'foreignKey' => 'idHotel',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Rooms', [
            'foreignKey' => 'idRoom',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'idUser',
            'joinType' => 'INNER'
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
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->uuid('idRoom')
            ->requirePresence('idRoom', 'create')
            ->notEmpty('idRoom');

        $validator
            ->uuid('idHotel')
            ->requirePresence('idHotel', 'create')
            ->notEmpty('idHotel');

        $validator
            ->uuid('idUser')
            ->requirePresence('idUser', 'create')
            ->notEmpty('idUser');

        $validator
            ->dateTime('checkinDate')
            ->requirePresence('checkinDate', 'create')
            ->notEmpty('checkinDate');

        $validator
            ->integer('nights')
            ->requirePresence('nights', 'create')
            ->notEmpty('nights');

        return $validator;
    }

    public function getDailySales()
    {
        $reservations = $this->find()
            ->contain([
                'Rooms'
            ])
            ->where([
                'checkinDate' => 'NOW()'
            ]);

        return $reservations;
    }

    public function getWeeklyAccumulated()
    {
        $reservations = $this->find()
            ->contain([
                'Rooms'
            ])
            ->where([
                'checkinDate' => 'BETWEEN CURDATE()- INTERVAL 1 WEEK AND CURDATE()'
            ]);

        return $reservations;
    }
}
