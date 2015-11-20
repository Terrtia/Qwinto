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
    
    public function Feuille() {
        $this->$nombres = array(
            array(-1,-1, 0,0,0,-1,0,0,0,0,0,0),
            array(-1,0,0,0,0,0, -1,0,0,0,0,-1),
            array(0,0,0,0,-1,0,0,0,0,0,-1,-1)
            );
            $this->$nombreCroix = 0;
            $this->$aJoue = FALSE;
            $this->$ordre = -1;
    }
    

    /* Retourne le score de la feuille */
    public function score() {
        $score = 0;
        return $score - $this->$nombreCroix * 5;
    }
    
    /* Indique si une feuille est achevée : 2 lignes pleines ou 4 croix */
    public function fin() {
        /* Fin du jeu si on a 4 croix */
        if($this->$nombreCroix == 4) {
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
    
    /* Indique si c'est une case (à cause du décalage des lignes) */
    public function estCase($i, $j) {
        if($this->$nombre[i][j] != -1){
            return TRUE;
        }
        else {
            return FALSE;
         }
    }
    
    /* Indique si le placement de n aux coordonnées (i,j) est valable */
    public function valable($i, $j, $n) {
        
    }
    
    /* Indique si la ligne numero i (en partant de 0) est pleine */
    public function lignePleine($i) {
        $estPleine = true;
        switch ($i) {
            case 0: 
                /* premiere ligne */
                for($num = 2;$num < 12;$num++) {
                    if($this->$nombres[0][$num] == 0 && estCase(0, $num)) {
                        $estPleine = false;
                    }
                }
                break;
            case 1:
                /* deuxieme ligne */
                for($num = 1;$num < 11; $num++) {
                    if($this->$nombres[1][$num] == 0 && estCase(1, $num)) {
                        $estPleine = false;
                    }                   
                }
                break;
            case 2:
                /* troisieme ligne */
                for($num = 0;$num < 10; $num++) {
                    if($this->$nombres[2][$num] == 0 && estCase(2, $num)) {
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
            $score = $this->$nombres[0][11];   
        }else {
            for($num = 2;$num < 12;$num++) {
                if(estCase(0,$num) && $this->$nombres[0][$num] != 0) {
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
            $score = $this->$nombres[1][10];   
        }else {
            for($num = 1;$num < 11;$num++) {
                if(estCase(1,$num) && $this->$nombres[1][$num] != 0) {
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
            $score = $this->$nombres[2][9];   
        }else {
            for($num = 0;$num < 10;$num++) {
                if(estCase(2,$num) && $this->$nombres[2][$num] != 0) {
                    $score++;
                }
            }
        }
        return $score;
    }
    
    
    
    
}
