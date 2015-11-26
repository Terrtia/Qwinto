<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FeuillesFixture
 *
 */
class FeuillesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'ID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'NOMBRES_ID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'NOMBRES_CROIX' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'AJOUTER' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'ORDRE' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'NUM_PARTY' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ID_USER' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'NOMBRES_ID' => ['type' => 'index', 'columns' => ['NOMBRES_ID'], 'length' => []],
            'NUM_PARTY' => ['type' => 'index', 'columns' => ['NUM_PARTY'], 'length' => []],
            'ID_USER' => ['type' => 'index', 'columns' => ['ID_USER'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['ID'], 'length' => []],
            'feuilles_ibfk_2' => ['type' => 'foreign', 'columns' => ['ID_USER'], 'references' => ['users', 'ID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'feuilles_ibfk_1' => ['type' => 'foreign', 'columns' => ['NUM_PARTY'], 'references' => ['feuilles', 'ID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'Nombres_Tableau' => ['type' => 'foreign', 'columns' => ['NOMBRES_ID'], 'references' => ['nombres', 'NOMBRES_ID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'ID' => 1,
            'NOMBRES_ID' => 1,
            'NOMBRES_CROIX' => 1,
            'AJOUTER' => 1,
            'ORDRE' => 1,
            'NUM_PARTY' => 1,
            'ID_USER' => 1
        ],
    ];
}
