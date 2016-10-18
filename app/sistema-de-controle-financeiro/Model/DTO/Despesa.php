<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Despesa
 *
 * @author casa
 */

ini_set('default_charset','UTF-8');

class Despesa {
    
    private $vIdDespesa;
    private $vDataDespesa;
    private $vValorDespesa;
    private $vDescricaoDespesa;
    private $vTipoDespesa;
    
    
    
    
public function __setIdDespesa($param){
    
    $this->vIdDespesa = $param;
}

public function __getIdDespesa(){
    
    return $this->vIdDespesa;
}



public function __setDataDespesa($param){
    
    $this->vDataDespesa = implode("-",array_reverse(explode("/",$param)));
}

public function __getDataDespesa(){
    
    return $this->vDataDespesa;
}


public function __setValorDespesa($param){
    
    $this->vValorDespesa = $param;
}

public function __getValorDespesa(){
    
    return $this->vValorDespesa;
}

//QuantidadeCompra
public function __setDescricaoDespesa($param){
    
    $this->vDescricaoDespesa = $param;
}

public function __getDescricaoDespesa(){
    
    return $this->vDescricaoDespesa;
}

//ValorUnitarioCompra
public function __setTipoDespesa($param){
    
    $this->vTipoDespesa = $param;
}

public function __getTipoDespesa(){
    
    return $this->vTipoDespesa;
}




public function ShowDespesa(){
echo(
        "Descrição ".$this->vDescricaoDespesa.'<br>'.
        "Data ".$this->vDataDespesa.'<br>'.
        "Tipo  ".$this->vTipoDespesa.'<br>'.
        "Valor ".$this->vValorDespesa.'<br>'
        );    
}
        







}

?>