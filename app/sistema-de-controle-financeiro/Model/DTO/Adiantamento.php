<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Adiantamento
 *
 * @author casa
 */
class Adiantamento {
    //put your code here
    
    private $vIdAdiantamento;
    private $vDataAdiantamento;
    private $vIdFunc;
    private $vValorAdiantamento;
    
    
    
    public function __setIdAdiantamento($param){
    
    $this->vIdAdiantamento = $param;
}

public function __getIdAdiantamento(){
    
    return $this->vIdAdiantamento;
}
    
public function __setDataAdiantamento($param){
    
    $this->vDataAdiantamento = $param;
}

public function __getDataAdiantamento(){
    
    return $this->vDataAdiantamento;
}

public function __setIdFunc($param){
    
    $this->vIdFunc = $param;
}

public function __getIdFunc(){
    
    return $this->vIdFunc;
}

public function __setValorAdiantamento($param){
    
    $this->vValorAdiantamento = $param;
}

public function __getValorAdiantamento(){
    
    return $this->vValorAdiantamento;
}

    
}

?>
