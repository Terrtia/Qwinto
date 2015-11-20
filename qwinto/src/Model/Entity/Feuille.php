<?php

/**
 * Feuille d'un joueur
 *
 * @author decolle2u
 */

namespace qwinto\Model\Entity;
use Cake\ORM\Entity;

class Feuille extends Entity {
    
    private $nombres;
    private $nombreCroix;
    private $aJoue;
    private $ordre;
    private $des;
    
    public function Feuille() {
        $this->nombres = array(
            array(-1,-1, 0,0,0,-1,0,0,0,0,0,0),
            array(-1,0,0,0,0,0, -1,0,0,0,0,-1),
            array(0,0,0,0,-1,0,0,0,0,0,-1,-1)
            );
        $this->des = array(0,0,0);
        $this->nombreCroix = 0;
        $this->ajoue = FALSE;
        $this->ordre = \Cake\ORM\TableRegistry::get('Feuilles');

        $this->aJoue = FALSE;
        $this->ordre = -1;

    }
    

    /* Retourne le score de la feuille */
    public function score() {
        $score = 0;
        return $score - $this->$nombreCroix * 5
                + $this->scoreLigne1() + $this->scoreLigne2() + $this->scoreLigne3()
                + $this->scoreHexagone1() + $this->scoreHexagone2() + $this->scoreHexagone3()
                + $this->scoreHexagone4() + $this->scoreHexagone5();
    }
    
    /* Indique si une feuille est achevée : 2 lignes pleines ou 4 croix */
    public function fin() {
        /* Fin du jeu si on a 4 croix */
        if($this->nombreCroix == 4) {
            return true;
        }
        /* Calcul du nombre de lignes pleines */
        $nbLignesPleines = 0;
        for($i = 0;$i < 3;$i++) {
            if(lignePleine($i)) {
                $nbLignesPleines++;
            }
        }
        /* Fin du jeu si au moins 2 lignes sont pleines */
        if($nbLignesPleines >= 2) {
            return true;
        }
        /* Jeu non fini */
        return false;
    }
    
    /* Place la valeur n aux coordonnées (i,j) */
    public function placer($i, $j, $n) {
        
    }
    
    /* Indique si c'est une case (a cause du decalage des lignes) */
    public function estCase($i, $j) {
        if($this->nombres[$i][$j] != -1){
            return TRUE;
        }
        else {
            return FALSE;
         }
    }
    
    /* Indique si le placement de n aux coordonnées (i,j) est valable */
    public function valable($i, $j, $n) {
        /* Verifications :                                     */
        /* case aux coordonnees (i,j) est vide                 */
        /* le de correspondant a la ligne a ete lance          */
        /* les valeurs de la ligne sont dans l'ordre croissant */ 
        if($this->nombres[$i][$j] == 0 && $this->des[$i] != 0) {
            
        }
    }
    
    /* Indique si la ligne numero i (en partant de 0) est pleine */
    public function lignePleine($i) {
        $estPleine = true;
        switch ($i) {
            case 0: 
                /* premiere ligne */
                for($num = 2;$num < 12;$num++) {
                    if($this->nombres[0][$num] == 0 && estCase(0, $num)) {
                        $estPleine = false;
                    }
                }
                break;
            case 1:
                /* deuxieme ligne */
                for($num = 1;$num < 11; $num++) {
                    if($this->nombres[1][$num] == 0 && estCase(1, $num)) {
                        $estPleine = false;
                    }                   
                }
                break;
            case 2:
                /* troisieme ligne */
                for($num = 0;$num < 10; $num++) {
                    if($this->nombres[2][$num] == 0 && estCase(2, $num)) {
                        $estPleine = false;
                    }                   
                }
                break;
            default:
                /* cas de numero de ligne incorrect */
                $estPleine = false;
                break;
        }
        return $estPleine;
    }
    
    /* Retourne le score de la premiere ligne */
    function scoreLigne1() {
        $score = 0;
        if(lignePleine(0)) {
            $score = $this->nombres[0][11];   
        }else {
            for($num = 2;$num < 12;$num++) {
                if(estCase(0,$num) && $this->nombres[0][$num] != 0) {
                    $score++;
                }
            }
        }
        return $score;
    }
    
    /* Retourne le score de la deuxieme ligne */
    function scoreLigne2() {
        $score = 0;
        if(lignePleine(1)) {
            $score = $this->nombres[1][10];   
        }else {
            for($num = 1;$num < 11;$num++) {
                if(estCase(1,$num) && $this->nombres[1][$num] != 0) {
                    $score++;
                }
            }
        }
        return $score;
    }
    
    /* Retourne le score de la troisieme ligne */
    function scoreLigne3() {
        $score = 0;
        if(lignePleine(2)) {
            $score = $this->nombres[2][9];   
        }else {
            for($num = 0;$num < 10;$num++) {
                if(estCase(2,$num) && $this->nombres[2][$num] != 0) {
                    $score++;
                }
            }
        }
        return $score;
    }
    
    /* Choix des des a lancer, nombre de parametres variables       */
    /* exemple : lancer le de 1 (rouge) et le de violet (3)         */
    /* lancerDes(1, 3);                                             */
    /* si erreur : verifier que la version de php est assez recente */
    function getDes(...$numDe) {
        $i = 0;
        foreach($numDe as $de) {
            $this->des[$i] = $de;
            $i++;
        }
    }
    
    function scoreHexagone1() {
        $score = 0;
        if($this->nombre[0][3] !=0 && $this->nombre[1][3] !=0 && $this->nombres[2][3] !=0){
            $score = $this->nombres[0][3];
        }
        return $score;
    }
    
    function scoreHexagone2() {
        $score = 0;
        if($this->nombre[0][7] !=0 && $this->nombre[1][7] !=0 && $this->nombres[2][7] !=0){
            $score = $this->nombres[0][7];
        }
        return $score;
    }
    
    function scoreHexagone3() {
        $score = 0;
        if($this->nombre[0][8] !=0 && $this->nombre[1][8] !=0 && $this->nombres[2][8] !=0){
            $score = $this->nombres[2][8];
        }
        return $score;
    }
    
    function scoreHexagone4() {
        $score = 0;
        if($this->nombre[0][2] !=0 && $this->nombre[1][2] !=0 && $this->nombres[2][2] !=0){
            $score = $this->nombres[2][2];
        }
        return $score;
    }
    
    function scoreHexagone5() {
        $score = 0;
        if($this->nombre[0][9] !=0 && $this->nombre[1][9] !=0 && $this->nombres[2][9] !=0){
            $score = $this->nombres[2][9];
        }
        return $score;
    }
    
}
