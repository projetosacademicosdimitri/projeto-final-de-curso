<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Compra
 *
 * @author casa
 */

ini_set('default_charset','UTF-8');


class Compra {

    private $vIdCompra;
    private $vDataCompra;
    private $vMaterialCompra;
    private $vQuantidadeCompra;
    private $vValorUnitarioCompra;
    private $vValorTotalCompra;
    private $vIdFornecedor;
    
    
    
public function __setIdCompra($param){
    
    $this->vIdCompra = $param;
}

public function __getIdCompra(){
    
    return $this->vIdCompra;
}



public function __setIdFornecedor($param){
    
    $this->vIdFornecedor = $param;
}

public function __getIdFonecedor(){
    
    return $this->vIdFornecedor;
}








public function __setDataCompra($param){
    // converte uma data em formato brasileiro  para americano pra inserir no mysql
    $this->vDataCompra = implode("-",array_reverse(explode("/",$param)));
}

public function __getDataCompra() {
    
    return $this->vDataCompra;
}

//MaterialCompra
public function __setMaterialCompra($param){
    
    $this->vMaterialCompra = $param;
}

public function __getMaterialCompra(){
    
    return $this->vMaterialCompra;
}

//QuantidadeCompra
public function __setQuantidadeCompra($param){
    
    $this->vQuantidadeCompra = $param;
}

public function __getQuantidadeCompra(){
    
    return $this->vQuantidadeCompra;
}

//ValorUnitarioCompra
public function __setValorUnitarioCompra($param){
    
    $this->vValorUnitarioCompra = $param;
}

public function __getValorUnitarioCompra(){
    
    return $this->vValorUnitarioCompra;
}

//ValorTotalCompra
public function __setValorTotalCompra($param){
    
    $this->vValorTotalCompra = $param;
}

public function __getValorTotalCompra(){
    
    return $this->vValorTotalCompra;
}


public function ShowCompra(){
echo(
        "Material ".$this->vMaterialCompra.'<br>'.
        "Data da compra ".$this->vDataCompra.'<br>'.
        "Quantidade ".$this->vQuantidadeCompra.'<br>'.
        "Valor unitário ".$this->vValorUnitarioCompra.'<br>'.
        "Valor Total ".$this->vValorTotalCompra.'<br>'
        );    
}
        







}

?>
