<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of testeCarga
 *
 * @author Dimitri Miranda
 */
include_once 'Conexao.php';
class testeCarga  extends Conexao{

    //put your code here

    
    public  function __CargaVenda()
    {
        $n = null;
        
        $sql= "INSERT INTO venda
          (DataVenda,IdSaco,Quantidade,ValorUnitario,ValorTotal,ClienteId,Micragem)
         VALUES(2032-12-21,3,1,3.00,30.000000,85,'2.00')";
 
        
      for($n=1;$n<=10000;$n++)
        {  $q = $this->query($sql);
           //echo"<br>Inserindo valor $n<br>";
               
        echo $q->rowCount();


          }
        
        
      
        
    }
    
    
}

$t= new testeCarga();
$t->__CargaVenda();

?>

