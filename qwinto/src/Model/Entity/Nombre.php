<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Nombre Entity.
 *
 * @property int $FEUILLE_ID
 * @property int $LIGNE
 * @property int $COLONNE
 * @property int $VAL
 */
class Nombre extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'FEUILLE_ID' => false,
        'LIGNE' => false,
        'COLONNE' => false,
    ];
}
