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
        $nombres = array(array());
        $nombreCroix = 0;
        $ajoue = FALSE;
        $ordre = -1;
    }
    

    /* Retourne le score de la feuille */
    public function score() {
        
    }
    
    /* Indique si une feuille est achevée : 2 lignes pleines ou 4 croix */
    public function fin() {
        /* Fin du jeu si on a 4 croix */
        if($nbCroix == 4) {
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
                for($num = 2;$num < 11;$num++) {
                    if($nombres[0][$num] == 0) {
                        $estPleine = false;
                    }
                }
                break;
            case 1:
                /* deuxieme ligne */
                for($num = 1;$num < 10; $num++) {
                    if($nombres[1][$num] == 0) {
                        $estPleine = false;
                    }                   
                }
                break;
            case 2:
                /* troisieme ligne */
                for($num = 0;$num < 9; $num++) {
                    if($nombres[2][$num] == 0) {
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
    
    /* Retourne le score de la ligne numero i */
    function scoreLigne($i) {
        $score = 0;
        switch ($i) {
            case 0: 
                /* premiere ligne */
                for($num = 2;$num < 11;$num++) {
                    if($nombres[0][$num] == 0) {
                        $score = false;
                    }
                }
                break;
            case 1:
                /* deuxieme ligne */
                for($num = 1;$num < 10; $num++) {
                    if($nombres[1][$num] == 0) {
                        $score = false;
                    }                   
                }
                break;
            case 2:
                /* troisieme ligne */
                for($num = 0;$num < 9; $num++) {
                    if($nombres[2][$num] == 0) {
                        $score = false;
                    }                   
                }
                break;
            default:
                /* cas de numero de ligne incorrect */
                $score = 0;
                break;
        }
        return $score;
        
    }
    
    
}
