<?php

include_once '../Model/DTO/Cheque.php';
include_once '../Model/Database/CmdSql.php'; 
  
if(isset($_POST['alterar']))
{   
 $obj =  new Cheque();
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
 
 if(isset($_POST['id'])){
  $obj->__setId($_POST['id']);
 if($oPessit->__updateCheque($obj))
 {
      $pagina = $_POST['pagina'];
      header("Location:../View/Cheque/listCheque.php?pagina=$pagina&ok");    
 }}
 
 if(isset($_POST['C_id'])){

     $obj->__setId($_POST['C_id']);
    
if($oPessit->__updateCheque($obj))
{
      
    header("Location:../View/Consulta/pcheque.php?&ok");   
}} 
 
 }    

 if(isset($_GET['delete']))
 { $oPessit =  new CmdSql();
    if($oPessit->__deleteCheque($_GET['delete']))
        $pagina = $_GET['pagina'];
    header("Location:../View/Cheque/listCheque.php?pagina=$pagina&del");  
           
    
 }
 
 if(isset($_GET['C_delete']))
 { $oPessit =  new CmdSql();
    if($oPessit->__deleteCheque($_GET['C_delete']))
        $pagina = $_GET['pagina'];
    header("Location:../View/Consulta/pcheque.php?&del");  
           
    
 }
 
 
 ?>
