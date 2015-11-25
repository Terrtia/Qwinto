<?php


/**
 * Description of Utilisateur
 *
 * @author thirion52u
 */

namespace qwinto\Model\Entity;
use Cake\ORM\Entity;

class Utilisateur {
    
    private $login;
    private $password;
    
    public function Utilisateur($log, $psw) {
        $login = $log;
        $password = $psw;
    }
    
    
    
    
}
