<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Venda
 *
 * @author Tamara
 */

ini_set('default_charset','UTF-8');
class Venda {
    
    private $vIdVenda;
    private $vDataVenda;
    private $vIdSacoVenda;
    private $vQuantVenda;
    private $vValorUnitVenda;
    private $vValorTotalVenda;
    private $vIdCliente;
	private $vMicragem;
  
    
    
    public function __setIdCliente($param){
        $this->vIdCliente  = $param;
    }
    
    public function __getIdCliente(){
        return $this->vIdCliente;
    }
    
    
    
    public function __setIdVenda($param){
        $this->vIdVenda = $param;
    }
    
    public function __getIdVenda(){
        return $this->vIdVenda;
    }
    
    
    public function __setDataVenda($param){
        $this->vDataVenda = implode("-",array_reverse(explode("/",$param)));
    }
    
    public function __getDataVenda(){
        return $this->vDataVenda;
    }
    
    
    public function __setIdSacoVenda($param){
        $this->vIdSacoVenda = $param;
    }
    
    public function __getIdSacoVenda(){
        return $this->vIdSacoVenda;
    }
    
    
    public function __setQuantVenda($param){
        $this->vQuantVenda = $param;
    }
    
    public function __getQuantVenda(){
        return $this->vQuantVenda;
    }
    
    
    public function __setValorUnitVenda($param){
        $this->vValorUnitVenda = $param;
    }
    
    public function __getValorUnitVenda(){
       return $this->vValorUnitVenda;
    }
    
    
    public function __setValorTotalVenda($param){
        $this->vValorTotalVenda = $param;
    }
    
    public function __getValorTotalVenda(){
        return $this->vValorTotalVenda;
    }
    
	 public function __setMicragem($param){
        $this->vMicragem  = $param;
    }
    
    public function __getMicragem(){
        return $this->vMicragem;
    }
    
    public function  ShowVenda(){
        echo(
                "Material ".$this->vIdSacoVenda.'<br/>'.
                "Data da venda ".$this->vDataVenda.'<br/>'.
                "Quantidade ".$this->vQuantVenda.'<br/>'.
                "Valor unitario ".$this->vValorUnitVenda.'<br/>'.
                "Valor total ".$this->vValorTotalVenda.'<br/>'
            );
        
    }

}
?>
