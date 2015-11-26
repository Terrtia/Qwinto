<?php
namespace App\Model\Table;

use App\Model\Entity\Nombre;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Nombres Model
 *
 */
class NombresTable extends Table
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

        $this->table('nombres');
        $this->displayField('NOMBRES_ID');
        $this->primaryKey('NOMBRES_ID');

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
            ->add('NOMBRES_ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('NOMBRES_ID', 'create');

        $validator
            ->add('LIGNE', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('LIGNE');

        $validator
            ->add('COLONE', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('COLONE');

        $validator
            ->add('VAL', 'valid', ['rule' => 'numeric'])
            ->requirePresence('VAL', 'create')
            ->notEmpty('VAL');

        return $validator;
    }
}
