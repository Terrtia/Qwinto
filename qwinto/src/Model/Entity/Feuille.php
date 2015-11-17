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
    
    /* Retourne le score de la feuille */
    public function score() {
        
    }
    
    /* Indique si une feuille est achevée : 2 lignes pleines ou 4 croix */
    public function fin() {
        
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
    
    
    public function lignePleine($l) {
        
    }
    
    
}
