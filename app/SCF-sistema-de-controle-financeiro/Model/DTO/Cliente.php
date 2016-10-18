<meta charset="utf-8" />

<?php
/*
 * Description of Cliente
  @author Dimitri Miranda
 */
header('Content-Type: text/html; charset=utf-8');
ini_set( 'default_charset', 'utf-8');

class Cliente {

 private $vIdCliente;
 private $vNome;
 private $vTelefone;
 private $vEndereco;
 private $vTipoPessoa;
 private $vCpf;
 private $vCnpj;
 private $vCodMunicipal;
 private $vContato;
 private $vBairro;
 private $vCep;
 private $vCidade;
 private $vEstado; 
 private $vNumero;   
 private $vStatus;   

 public function __defineCliente($op,$pPessoa)
 { switch ($op)
   { case 1:
     $this->vTipoPessoa = 1;  
     $this->vCpf = $pPessoa;
     $this->vCnpj = " ";  
        
     break;
    
     case 2:
     $this->vTipoPessoa = 2;     
     $this->vCnpj = $pPessoa;
     $this->vCpf = " ";  
      break;    
   
 
   }
          
 
 }


 public function __getId(){
     return $this->vIdCliente;  
 }
    
 public function __setId($param){
     $this->vIdCliente = $param;  
 }
 
 public function __getNome() {
     return $this->vNome; 
 }
 
 public function __setNome($param) {
     $this->vNome = $param; 
 
   }
 
   public function __getTelefone()
    {
       return $this->vTelefone;
       
  }
 
 
  public function __setTelefone($param) {
      $this->vTelefone = $param;
  }
 
  public function __getEnd(){
      return $this->vEndereco; 
  }
 
 
  public function __setEnd($param) {
    $this->vEndereco = $param; 
  }
 
 
  public function __getTipoPessoa(){
      return $this->vTipoPessoa;
  }
  
  public function __setTipoPessoa($param){
      $this->vTipoPessoa = $param;
  }

  
  public function __getCpf()
  {      return $this->vCpf;
       
  }
  
  
  public function __setCpf($param)
  { 
      $this->vCpf = $param;  
  }
  
  
  public function __getCnpj()
  {
      return $this->vCnpj;      
  }
  
  
  public function __setCnpj($param)
  {
      $this->vCnpj = $param;    
  }
  
  public function __getCodMunicipal()
  {      return $this->vCodMunicipal;
       
  }
  
  public function __setCodMunicipal($param)
  { 
      $this->vCodMunicipal = $param;   
  }
  
  public function __getContato()
  {      return$this->vContato;
      
  }
  
  public function __setContato($param)
  {   
      $this->vContato = $param;  
  }
  
  
  public function __getBairro()
  {
      return $this->vBairro;    
  }
  
  
  public function __setBairro($param)
  {
      $this->vBairro =  $param;
  }
  
  public function __getCep()
  {
      return$this->vCep;
  }
  
  public function __setCep($param)
  {
      $this->vCep =$param;
  }
  
  public function __getCidade()
  {      return $this->vCidade;
      
  }

  public function __setCidade($param)
  {
      $this->vCidade = $param;    
  }
  
  public function __getEstado()
  {
      return $this->vEstado;
  }
  

  public function __setEstado($param)
  {
      $this->vEstado = $param;      
  }
  
  public function __getNumero()
  {
      return $this->vNumero;
  }
  
  
  public function __setNumero($param)
  {
      $this->vNumero = $param;   
  }
 
   public function __getStatus(){
     return $this->vStatus;  
 }
    
 public function __setStatus($param){
     $this->vStatus = $param;  
 }
  
  public function __showDados()
  {
       echo 
      ( "Nome".$this->vNome."<br>"
        ."Tipo pessoa".$this->vTipoPessoa."<br/>".
        "cpf".$this->vCpf."<br>"
        ."Cnpj".$this->vCnpj."<br>"
        ."Contato".$this->vContato."<br>"
        ."Tetefone".$this->vTelefone."<br>"
        ."codigo Municipal".$this->vCodMunicipal."<br>"
        ."Endereco".$this->vEndereco."<br>"
        ."Numero".$this->vNumero."<br>"
        ."Bairro".$this->vBairro."<br>"
        ."Cidade".$this->vCidade."<br>"
        ."Cep".$this->vCep."<br>"
        ."Estado".$this->vEstado."<br>"       
       );
  
      
  }
  
  
  
  
  
}//fim   classe
?>
