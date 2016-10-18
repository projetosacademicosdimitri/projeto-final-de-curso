<?php
/*
 * @author Dimitri Miranda
 */
class Fornecedor {
//put your code here

    
    private $vId;
    private $vNome; 

    private $vTel;

    private $vNomeContato;
    private $vStatus;
    
    
 
    
    
     public function __getId()
    {
        return $this->vId;    
    }
    
    public function __setId($param)
    { 
        $this->vId = $param;   
    }
    
    
    
    
    
    
    
    
    
    
    public function __getNome()
    {
        return $this->vNome;    
    }
    
    public function __setNome($param)
    { 
        $this->vNome = $param;   
    }
    
    
    
public function __getTelefone()
    {
        return $this->vTel;    
    }
    
    public function __setTelefone($param)
    { 
        $this->vTel = $param;   
    }
    
    
    public function __getContato()
    {
        return $this->vNomeContato;    
    }
    
    public function __setContato($param)
    { 
        $this->vNomeContato = $param;   
    }
    
     public function __getStatus()
    {
        return $this->vStatus;    
    }
    
    public function __setStatus($param)
    { 
        $this->vStatus = $param;   
    }
    
    
}
?>
