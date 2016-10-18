<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SacoPlastico
 *
 * @author casa
 */
class SacoPlastico {
    //put your code here
    
    private $vIdSacoPlastico;
    private $vCorSaco;
    private $vTamanhoSaco;
    private $vStatus;




    public function __setIdSacoPlastico($param){
        $this->vIdSacoPlastico  = $param;
    }
    
    public function __getIdSacoPlastico(){
        return $this->vIdSacoPlastico;
    }
 
    
     public function __setCorSaco($param){
        $this->vCorSaco  = $param;
    }
    
    public function __getCorSaco(){
        return $this->vCorSaco;
    }
    
     public function __setTamanhoSaco($param){
        $this->vTamanhoSaco  = $param;
    }
    
    public function __getTamanhoSaco(){
        return $this->vTamanhoSaco;
    }
    
     public function __setStatus($param){
        $this->vStatus  = $param;
    }
    
    public function __getStatus(){
        return $this->vStatus;
    }
    
    
}

?>
