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

    /*public function possible($val,$nbligne,$nbcases){
        $ligne = explode("/",$this->TABLEAU);
        $lignetest = explode(',',$ligne[nbligne]);
        $possible = TRUE;
        if($lignetest[$nbcases] == -1){
                return FALSE;
        }
        for($i = 0;$i <= nbcases;i++){
                $possible = val > (int)$lignetest[$i] ;
        }
        return $possible
    }*/

     public function addValeur($noligne,$nocase,$val){
        $tab1 = $this->ligne0_explode();
        $tab2 = $this->ligne1_explode();
        $tab3 = $this->ligne2_explode();
        $string = null;

        if($noligne == 0){
            $tab1[$nocase] = $val;
            
        }else if ($noligne == 1){
            $tab2[$nocase] = $val;

        }else{
            $tab3[$nocase] = $val;
        }

        for($i = 0 ; $i<12 ; $i++){
            if($i != 11){
                $string = $string.$tab1[$i].",";
            }else{
                $string = $string.$tab1[$i]."/";
            }
        }
        for($i = 0 ; $i<12 ; $i++){
            if($i != 11){
                $string = $string.$tab2[$i].",";
            }else{
                $string = $string.$tab2[$i]."/";
            }
        }

        for($i = 0 ; $i<12 ; $i++){
            if($i != 11){
                $string = $string.$tab3[$i].",";
            }else{
                $string = $string.$tab3[$i]."/";
            }
        }
        return $string;
    }
}
