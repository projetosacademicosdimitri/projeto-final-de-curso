<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Dimitri Miranda
 */

class Usuario {
    
    private $vId;
    private $vLogin;
    private $vSenha;
    private $vEmail;
    

    
    
    public function getId(){
        return $this->vId;     
    }
    
     
    
    public function setId($param){
      $this->vId = $param;     
    }
    
    
     public function getLogin(){
        return $this->vLogin;     
    }
    
     
    
    public function setLogin($param){
      $this->vLogin = $param;     
    }
    
    
     public function getSenha(){
        return $this->vSenha;     
    }
    
     
    
    public function setSenha($param){
      $this->vSenha = $param;     
    }
    
     public function getEmail(){
        return $this->vEmail;     
    }
    
     
    
    public function setEmail($param){
      $this->vEmail = $param;     
    }
    
    
    
public function __construct($Plogin,$Psenha) {
    $this->vLogin = $Plogin;
    $this->vSenha = $Psenha;
   }
     
}
?>
