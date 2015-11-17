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
    
    public function score() {
        
    }
    
    public function fin() {
        
    }
    
    public function placer($i, $j, $n) {
        
    }
    
    
}
