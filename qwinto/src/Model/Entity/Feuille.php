<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Feuille Entity.
 *
 * @property int $ID
 * @property int $NOMBRES_CROIX
 * @property string $TABLEAU
 * @property int $NUM_PARTY
 * @property string $LOGIN
 * @property string $PASSWORD
 */
class Feuille extends Entity
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
        'ID' => false,
    ];
    
        
    public function ligne0_explode(){
        $ligne = explode("/", $this->TABLEAU);
        $ligne0 = explode(',', $ligne[0]);
        return $ligne0;
    }

    public function ligne1_explode(){
        $ligne = explode("/", $this->TABLEAU);
        $ligne1 = explode(',', $ligne[1]);
        return $ligne1;
    }

    public function ligne2_explode(){
        $ligne = explode("/", $this->TABLEAU);
        $ligne2 = explode(',', $ligne[2]);
        return $ligne2;
    }
}
