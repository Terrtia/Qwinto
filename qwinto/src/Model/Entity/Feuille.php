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

    public function possible($val, $ligne, $colonne, $de1, $de2, $de3) {
        $caseInterdite = -1;
        $caseVide = 0;
        $res = 0;
        $min = 0;
        $max = 0;

        $deRouge = $de1;
        $deJaune = $de2;
        $deViolet = $de3;


        $coul = 0;
        $ligne0 = $this->ligne0_explode();
        $ligne1 = $this->ligne1_explode();
        $ligne2 = $this->ligne2_explode();

        if($ligne == 0){
            $templigne = $ligne0;
            if($deRouge != 0){
                $coul = 1;
            }
        }
        if($ligne == 1){
            $templigne = $ligne1;
            if($deJaune != 0){
                $coul = 1;
            }
        }
        if($ligne == 2){
            $templigne = $ligne2;
            if($deViolet != 0){
                $coul = 1;
            }
        }

        if ( $coul == 1){
            if((int)$templigne[$colonne] != $caseInterdite && (int)$templigne[$colonne] == $caseVide){
                  //recherche valeur precedente
                for($i=0; $i<$colonne; $i++){
                    if((int)$templigne[$colonne] != $caseVide){
                        $min = (int)$templigne[$colonne];
                    }
                 }
                 //recherche valeur suivante
                for($i=$colonne; $i<12; $i++){
                    if($max == 0 && (int)$templigne[$colonne] != $caseVide){
                        $max = (int)$templigne[$colonne];
                    }
                }

                if( $min <= $val && $val <= $max){
                    $res = 1;
                }
                if( $max == 0 && $min <= $min){
                    $res = 1;
                }
                if( $min == 0 && $max == 0){
                    $res = 1;
                }
            }
        }

        return 0;
    }


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

	public function end(){
		$end = 0;
		$nb_finis = 3;
		
		$tab1 = $this->ligne0_explode();
	        $tab2 = $this->ligne1_explode();
       		$tab3 = $this->ligne2_explode();
		$i=2;
		$nfini = 1;
		while($i<12 and $nfini == 1){
			if($tab1[$i] == "0"){
				$nfini = 0;
				$nb_finis --;
			}
			$i++;
		}
		$i=1;
		$nfini = 1;
		while($i<11 and $nfini == 1){
			if($tab2[$i] == "0"){
				$nfini = 0;
				$nb_finis --;
			}
			$i++;
		}
		$i=0;
		$nfini = 1;
		while($i<10 and $nfini == 1){
			if($tab3[$i] == "0"){
				$nfini = 0;
				$nb_finis --;
			}
			$i++;
		}

		if($this->NOMBRES_CROIX > 3 or $nb_finis == 2){
			$end = 1;
		}
		return $end;

	}
        
        public function score() {
            $score = 0;
            
            /* score ligne 1 */
            if($feuille->remplie(0)) $scoreLigne0 = $feuille->getValeur($ligne, $colonne);
            else $scoreLigne1 = $feuille->getNbValeurs($ligne);

            /* ligne 2 */
            if($feuille->remplie(1)) $scoreLigne1 = $feuille->getValeur($ligne, $colonne);
            else $scoreLigne1 = $feuille->getNbValeurs($ligne);

            /* ligne 3 */
            if($feuille->remplie(2)) $scoreLigne2 = $feuille->getValeur($ligne, $colonne);
            else $scoreLigne1 = $feuille->getNbValeurs($ligne);
            
            return $score;
        }

    public function getValeur($ligne, $colonne) {
        if($ligne == 0) $tab = $this->ligne0_explode();
        else if($ligne == 1) $tab = $this->ligne1_explode();
        else $tab = $this->ligne2_explode();
        
        return $tab[$colonne];
    }
    
    public function getNbValeurs($ligne) {
        
    }


}
