<?php

include_once '../Model/DTO/Cheque.php';
include_once '../Model/Database/CmdSql.php'; 
$obj =  new Cheque();
 
 
if(isset($_POST['Gravar'])){
 $obj->__setNome($_POST['txtNome']); 
 $obj->__setNumCheque($_POST['txtNumCheque']);
 $obj->__setDataEntrada($_POST['txtDataEntra']);
 $obj->__setDataCompens($_POST['txtDataCompens']);
 $obj->__setChequeTp($_POST['tpCheque']);
      
	  $source = array('.', ','); 
      $replace = array('', '.');
      $valorCheque = str_replace($source ,$replace,$_POST['txtValorCheque']);
    
    $obj->__setValorCheque($valorCheque);
 
 $oPessit =  new CmdSql();
if($oPessit->__insertCheque($obj))
{

   header("Location:../View/Cheque/cadCheque.php?&ok"); 

  }    

}
?>
