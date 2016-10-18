<?php
 /**
 * Description of Cheque
 *
 * @author Dimitri Miranda
 */
class Cheque
{
    private $vId;
    private $vNome;
    private $vNumCheque;
    private $vDataEntra;
    private $vDataCompens;
    private $vChequeTp;
	private $vValorCheque;

    
    

    
    
   public function __getId(){
     return $this->vId;  
 }
    
 public function __setId($param){
     $this->vId = $param;  
 }    
    
    
    
    
    
    
 public function __getNome(){
     return $this->vNome;  
 }
    
 public function __setNome($param){
     $this->vNome = $param;  
 }    
    
    
 public function __getNumCheque(){
     return $this->vNumCheque;  
 }
    
 public function __setNumCheque($param){
     $this->vNumCheque = $param;  
 }     
  
 
  public function __getDataEntrada(){
     return $this->vDataEntra;  
 }
    
 public function __setDataEntrada($param){
     $this->vDataEntra = $param;  
 }
 
 
 public function __getDataCompens(){
     return $this->vDataCompens;  
 }
    
 public function __setDataCompens($param){
     $this->vDataCompens = $param;  
 }
 
  public function __getChequeTp(){
     return $this->vChequeTp;  
 }
    
 public function __setChequeTp($param){
     
     $this->vChequeTp = $param;
}
 

public function __getValorCheque(){
     return $this->vValorCheque;  
 }
    
 public function __setValorCheque($param){
     $this->vValorCheque = $param;  
 }    

}
?>
