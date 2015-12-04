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
        'ID' => ['type' => 'integer', 'length' => 12, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'NOMBRES_CROIX' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'TABLEAU' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'NUM_PARTY' => ['type' => 'integer', 'length' => 12, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'LOGIN' => ['type' => 'string', 'length' => 12, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'PASSWORD' => ['type' => 'string', 'length' => 12, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'NUM_PARTY' => ['type' => 'index', 'columns' => ['NUM_PARTY'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['ID'], 'length' => []],
            'LOGIN' => ['type' => 'unique', 'columns' => ['LOGIN'], 'length' => []],
            'feuilles_ibfk_1' => ['type' => 'foreign', 'columns' => ['NUM_PARTY'], 'references' => ['parties', 'ID'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
            'NOMBRES_CROIX' => 1,
            'TABLEAU' => 'Lorem ipsum dolor sit amet',
            'NUM_PARTY' => 1,
            'LOGIN' => 'Lorem ipsu',
            'PASSWORD' => 'Lorem ipsu'
        ],
    ];
}
