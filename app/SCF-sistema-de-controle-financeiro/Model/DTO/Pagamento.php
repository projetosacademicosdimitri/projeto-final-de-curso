<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pagamento
 *
 * @author casa
 */

ini_set('default_charset','UTF-8');

class Pagamento {
    private $vIdPagamento;
    private $vSalarioBase;
    private $vHoraExtra;
    private $vDescontos;
    private $vDataPagamento;
    private $vValorLiquido;
    private $vAdiantamento;
    private $vValorTotalPgmto;
    private $vIdfunc;






    public function __setIdPagamento($param){
    
    $this->vIdPagamento = $param;
}

public function __getIdPagamento(){
    
    return $this->vIdPagamento;
}

public function __setSalarioBase($param){
    
    $this->vSalarioBase = $param;
}

public function __getSalarioBase(){
    
    return $this->vSalarioBase;
}

public function __setHoraExtra($param){
    
    $this->vHoraExtra = $param;
}

public function __getHoraExtra(){
    
    return $this->vHoraExtra;
}


public function __getDescontos(){
    
    return $this->vDescontos;
}

public function __setDescontos($param){
    
    $this->vDescontos = $param;
}

public function __getDataPagamento(){
    
    return $this->vDataPagamento;
}

public function __setDataPagamento($param){
    
    $this->vDataPagamento = implode("-",array_reverse(explode("/",$param)));
}

public function __getValorLiquido(){
    
    return $this->vValorLiquido;
}

public function __setValorLiquido($param){
    
    $this->vValorLiquido = $param;
}

public function __getAdiantamento(){
    
    return $this->vAdiantamento;
}
public function __setAdiantamento($param){
    
    $this->vAdiantamento = $param;
}

public function __getValorTotalPgmto(){
    
    return $this->vValorTotalPgmto;
}
public function __setValorTotalPgmto($param){
    
    $this->vValorTotalPgmto = $param;
}

public function __getIdfunc(){
    
    return $this->vIdfunc;
}

public function __setIdfunc($param){
    
    $this->vIdfunc = $param;
}

}

?>
