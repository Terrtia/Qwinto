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
      

        $deRouge = $de1;
        $deJaune = $de2;
        $deViolet = $de3;

	$res = 0;
        $coul = 0;
        $ligne0 = $this->ligne0_explode();
        $ligne1 = $this->ligne1_explode();
        $ligne2 = $this->ligne2_explode();

        if($ligne == "0"){
            $templigne = $ligne0;
            if($deRouge != 0){
                $coul = 1;
            }
        }
        if($ligne == "1"){
            $templigne = $ligne1;
            if($deJaune != 0){
                $coul = 1;
            }
        }
        if($ligne == "2"){
            $templigne = $ligne2;
            if($deViolet != 0){
                $coul = 1;
            }
        }

        if ( $coul == 1){
            if($templigne[intval($colonne)] == "0" or $templigne[intval($colonne)] == "-2"){
                  //recherche valeur precedente
		$i = intval($colonne);
		$min = 0;
                //for($i=0; $i<intval($colonne); $i++){
		while($min == 0 and $i > 0 ){
                    if($templigne[$i] != "0" and $templigne[$i] != "-1" and$templigne[$i] != "-2" ){
                        $min = intval($templigne[$i]);
                    }
			$i--;
                 }
                 //recherche valeur suivante
		$j = intval($colonne);
		$max = 0;
                //for($i=intval($colonne); $i<12; $i++){
		while($max == 0 and $j < 12){
                    if($templigne[$j] != "0" and $templigne[$j]!="-1" and $templigne[$j]!="-2"){
                        $max = intval($templigne[$j]);
                    }
			$j++;
                }

                //if( (($min < $val)and($max > $val)) or (($max==0)and($min==0)) or (($min<$val)and($max==0)) or (($min==0)and($max>$val))){
		if($min < $val){
			if(($max > $val) or($max == 0)){                   
		 		$res = 1;
			}
		}
              //  }
	    }
	}

        return $res;
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
            $score = "";
            
            /* score ligne 1 */
            if($this->remplie(0)) $scoreLigne0 = $this->getValeur(0, 11);
            else $scoreLigne0 = $this->getNbValeurs($ligne);

            /* ligne 2 */
            if($this->remplie(1)) $scoreLigne1 = $this->getValeur(1, 10);
            else $scoreLigne1 = $this->getNbValeurs($ligne);

            /* ligne 3 */
            if($this->remplie(2)) $scoreLigne2 = $this->getValeur(2, 9);
            else $scoreLigne2 = $this->getNbValeurs($ligne);
            
            /* score pentagones */
            if($this->remplieColonne(3)) $scorePent0 = $this->getValeur (0, 3);
            if($this->remplieColonne(8)) $scorePent1 = $this->getValeur (1, 8);
            if($this->remplieColonne(2)) $scorePent2 = $this->getValeur (2, 2);
            if($this->remplieColonne(9)) $scorePent3 = $this->getValeur (2, 9);
            
            return $score;
        }

    public function getValeur($ligne, $colonne) {
        if($ligne == 0) $tab = $this->ligne0_explode();
        else if($ligne == 1) $tab = $this->ligne1_explode();
        else $tab = $this->ligne2_explode();
        
        return $tab[$colonne];
    }
    
    public function getNbValeurs($ligne) {
        $nbVal = 0;
        for($i = 0;$i < 12;$i++) {
            if(getValeur($ligne,$i) > 0) {
                $nbVal++;
            }
        }
        return $nbVal;
    }

    public function remplie($ligne){
            if($ligne == 0){
                    $tab = $this->ligne0_explode();
                    $i=2;
                    while($i<12){
                            if($tab[$i] == "0"){
                                    return 0;
                            }
                            $i++;
                    }
            }else if($ligne == 1){
                    $tab = $this->ligne1_explode();
                    $i=1;
                    while($i<11){
                            if($tab1[$i] == "0"){
                                    return 0;
                            }
                            $i++;
                    }
            }else{
                    $tab = $this->ligne2_explode();
                    $i=0;
                    while($i<10){
                            if($tab[$i] == "0"){
                                    return 0;
                            }
                            $i++;
                    }
            }
            return 1;
    }

	public function rempliecol($col){
		$tab1 = $this->ligne0_explode();
	        $tab2 = $this->ligne1_explode();
       		$tab3 = $this->ligne2_explode();
		if($tab1[$col] == "0" or $tab2[$col] == "0" or $tab3[$col] == "0"){
			return 0;
		}
		return 1;
	}


}
