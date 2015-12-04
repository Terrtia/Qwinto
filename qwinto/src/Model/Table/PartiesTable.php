<?php
namespace App\Model\Table;

use App\Model\Entity\Party;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Parties Model
 *
 */
class PartiesTable extends Table
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

        $this->table('parties');
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
            ->add('TOUR', 'valid', ['rule' => 'numeric'])
            ->requirePresence('TOUR', 'create')
            ->notEmpty('TOUR');

        $validator
            ->allowEmpty('ORDRE');

        $validator
            ->add('DE_ROUGE', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('DE_ROUGE');

        $validator
            ->add('DE_JAUNE', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('DE_JAUNE');

        $validator
            ->add('DE_VIOLET', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('DE_VIOLET');

        return $validator;
    }
}
