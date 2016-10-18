<?php
/*
 * @author Dimitri Miranda
 * Obejto  de transferencia  de dados DTO funcionario 
 * 15/08/2013
 */
ini_set('default_charset','UTF-8');

class Funcionario{
    
private $vIdFunc;
private $vNomeFunc;
private $vCargoFunc;
private $vSalarioFunc;
private $vCpfFunc;
private $vPisFunc; 
private $vDataNascFunc; 
private $vDataAdmFunc; 
private $vEndFunc;
private $vTelFunc;
private $vCelFunc;
private $vNumeroFunc;
private $vRgFunc;
private $vCtpsFunc;
private $vSerie;
private $vUfCTPS;
private $vCep;
private $vCidade;
private $vEstado;
private $vBairro;
private $vStatus;


public function __setId($param) {
 
    $this->vIdFunc = $param;
 }

 public function __getId(){
    return $this->vIdFunc;   
 }



public function __setNome($param) {
 
    $this->vNomeFunc = $param;
 }

 public function __getNome() {
    return $this->vNomeFunc;   
 }


 public function __setCargoFunc($param) {
    $this->vCargoFunc = $param;   
 }   

 public function __getCargoFunc(){
    return $this->vCargoFunc;   
 }
 
 public function __setSalarioFunc($param) {
    $this->vSalarioFunc = $param;   
 }  
 

  public function __getSalarioFunc(){
    return $this->vSalarioFunc;   
 }
 

 public function __setCpfFunc($param) {
    $this->vCpfFunc = $param;   
 }  

  public function __getCpfFunc(){
    return $this->vCpfFunc;   
 }


 public function __setPisFunc($param) {
    $this->vPisFunc = $param;   
 }

 public function __getPisFunc(){
    return $this->vPisFunc;   
 }

 public function __setDataNascFunc($param) {
// converte uma data em formato brasileiro  para americano pra inserir no mysql
 $this->vDataNascFunc = implode("-",array_reverse(explode("/",$param)));    
 
    
 }

 public function __getDataNascFunc(){
    return $this->vDataNascFunc;   
 }
 
public function __setDataAdmFunc($param) {
    // converte uma data em formato brasileiro  para americano pra inserir no mysql 
  $this->vDataAdmFunc = implode("-",array_reverse(explode("/",$param)));

}
 
 public function __getDataAdmFunc(){
    return $this->vDataAdmFunc;   
 }
 
 public function __setEndFunc($param) {
    $this->vEndFunc = $param;   
 }

public function __getEndFunc(){
    return $this->vEndFunc;   
 }
 
 public function __setTelFunc($param) {
    $this->vTelFunc = $param;   
 }

 
 public function __getTelFunc(){
    return $this->vTelFunc;   
 }
 
public function __setCelFunc($param) {
    $this->vCelFunc = $param;   
 } 
 
  
 public function __getCelFunc(){
    return $this->vCelFunc;   
 }
 
 
  

public function __setNumeroEndFunc($param) {
    $this->vNumeroFunc = $param;   
 } 
 
  public function __getNumeroEndFunc(){
    return $this->vNumeroFunc;   
 }
 

public function __setRgFunc($param) {
    $this->vRgFunc= $param;   
 } 

  public function __getRgFunc(){
    return $this->vRgFunc;   
 }

 
 
 public function __setCtpsFunc($param)
 {     $this->vCtpsFunc = $param;
     
 }


 public function __getCtpsFunc()
 {     return $this->vCtpsFunc;
     
 }


 public function __setSerie($param)
 {
     $this->vSerie = $param;     
 }

public function __getSerie()
 {
    return $this->vSerie;     
 }

public function __setUfCTPS($param)
 {
     $this->vUfCTPS= $param;     
 }

 public function __getUfCTPS()
 {
     return$this->vUfCTPS;     
 }


 public function __setBairro($param) {
    $this->vBairro= $param;   
 } 

  public function __getBairro(){
    return $this->vBairro;   
 }

 public function __setCep($param) {
    $this->vCep= $param;   
 } 

  public function __getCep(){
    return $this->vCep;   
 }
 
 public function __setCidade($param) {
    $this->vCidade= $param;   
 } 

  public function __getCidade(){
    return $this->vCidade;   
 }
 
public function __setEstado($param)
{$this->vEstado= $param;   

 } 

  public function __getEstado(){
    return $this->vEstado;   
 }
 
 public function __setStatus($param) {
 
    $this->vStatus = $param;
 }

 public function __getStatus() {
    return $this->vStatus;   
 }
 
 public function showFunc()
 {echo 
  ( "Nome ".$this->vNomeFunc.'<br>'.
   "cpf ".$this->vCpfFunc."<br>".
   "rg ".$this->vRgFunc."<br>".
   "data de nascimento ".$this->vDataNascFunc."<br>".
   "Telefone ".$this->vTelFunc."<br>".
   "Celular ".$this->vCelFunc."<br>".
   "Cargo ".$this->vCargoFunc."<br>".
   "Endereço ".$this->vEndFunc."<br>".
   "Numero casa ".$this->vNumeroFunc."<br>".
   "bairro  ".$this->vBairro."<br>".
   "Cidade  ".$this->vCidade."<br>".
   "Cep  ".$this->vCep."<br>".
   "Estado  ".$this->vEstado."<br>".
   "data de  admissão ".$this->vDataAdmFunc."<br>".
   "Numero carteira  de trabalho ".$this->vCtpsFunc."<br>".
   "Serie  ".$this->vSerie."<br>".
   "Pis  ".$this->vPisFunc."<br>".
   "estado da carteira profissional ".$this->vUfCTPS."<br>".
   "Salario ".$this->vSalarioFunc."<br>");       
         
         
         
     
 }
 



//fim Classe 
}

?>
