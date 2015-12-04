<?php

namespace App\Model\Table;
use Cake\ORM\Table;

class PartiesTable extends Table
{
    var $tour;
    
    public function initialize(array $config)
    {
    }
    
    public function fin(){
     return false;   
    }
    
    public function gagnant(){
        return 0;
    }
    
    public function ajoutJoueur(Utilisateur utilisateur){
        
    }
    
}