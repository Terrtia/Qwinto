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
        $this->displayField('FEUILLE_ID');
        $this->primaryKey(['FEUILLE_ID', 'LIGNE', 'COLONNE']);

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
            ->add('FEUILLE_ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('FEUILLE_ID', 'create');

        $validator
            ->add('LIGNE', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('LIGNE', 'create');

        $validator
            ->add('COLONNE', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('COLONNE', 'create');

        $validator
            ->add('VAL', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('VAL');

        return $validator;
    }
}
