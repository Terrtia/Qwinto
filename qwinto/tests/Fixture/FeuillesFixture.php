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
        'USER_ID' => ['type' => 'integer', 'length' => 12, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'NUM_PARTY' => ['type' => 'index', 'columns' => ['NUM_PARTY', 'USER_ID'], 'length' => []],
            'USER_ID' => ['type' => 'index', 'columns' => ['USER_ID'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['ID'], 'length' => []],
            'feuilles_ibfk_2' => ['type' => 'foreign', 'columns' => ['USER_ID'], 'references' => ['users', 'ID'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
            'USER_ID' => 1
        ],
    ];
}
