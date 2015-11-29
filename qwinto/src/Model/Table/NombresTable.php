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
        $this->displayField('ID');
        $this->primaryKey('ID');

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
            ->add('ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('ID', 'create');

        $validator
            ->add('FEUILLE_ID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('FEUILLE_ID', 'create')
            ->notEmpty('FEUILLE_ID');

        $validator
            ->add('COLONNE', 'valid', ['rule' => 'numeric'])
            ->requirePresence('COLONNE', 'create')
            ->notEmpty('COLONNE');

        $validator
            ->add('LIGNE', 'valid', ['rule' => 'numeric'])
            ->requirePresence('LIGNE', 'create')
            ->notEmpty('LIGNE');

        $validator
            ->add('VAL', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('VAL');

        return $validator;
    }
}
