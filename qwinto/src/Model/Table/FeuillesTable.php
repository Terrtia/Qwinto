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

        $this->belongsTo('Parties' ,[
                'foreignKey'=>'NUM_PARTY',
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
            ->add('ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('ID', 'create');

        $validator
            ->add('NOMBRES_CROIX', 'valid', ['rule' => 'numeric'])
            ->requirePresence('NOMBRES_CROIX', 'create')
            ->notEmpty('NOMBRES_CROIX');

        $validator
            ->allowEmpty('TABLEAU');

        $validator
            ->add('NUM_PARTY', 'valid', ['rule' => 'numeric'])
            ->requirePresence('NUM_PARTY', 'create')
            ->notEmpty('NUM_PARTY');

        $validator
            ->requirePresence('LOGIN', 'create')
            ->notEmpty('LOGIN')
            ->add('LOGIN', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('PASSWORD', 'create')
            ->notEmpty('PASSWORD');

        return $validator;
    }
}
