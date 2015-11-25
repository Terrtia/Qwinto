<?php
namespace App\Model\Table;

use App\Model\Entity\Feuille;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Feuilles Model
 *
 */
class FeuillesTable extends Table
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

        $this->table('feuilles');
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
            ->add('NOMBRES_ID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('NOMBRES_ID', 'create')
            ->notEmpty('NOMBRES_ID');

        $validator
            ->add('NOMBRES_CROIX', 'valid', ['rule' => 'numeric'])
            ->requirePresence('NOMBRES_CROIX', 'create')
            ->notEmpty('NOMBRES_CROIX');

        $validator
            ->add('AJOUTER', 'valid', ['rule' => 'boolean'])
            ->requirePresence('AJOUTER', 'create')
            ->notEmpty('AJOUTER');

        $validator
            ->add('ORDRE', 'valid', ['rule' => 'numeric'])
            ->requirePresence('ORDRE', 'create')
            ->notEmpty('ORDRE');

        return $validator;
    }
}
