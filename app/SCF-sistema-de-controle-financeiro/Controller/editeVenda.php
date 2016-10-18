<?php
include_once '../Model/DTO/Venda.php';
include_once '../Model/Database/CmdSql.php';
 
 
 $oPessit = new CmdSql;
 
 if(isset($_POST['gravar']))
  {
$oVenda = new Venda();
$oVenda->__setIdSacoVenda($_POST['txtIdSaco']);
$oVenda->__setDataVenda($_POST['txtDateVenda']);
$oVenda->__setQuantVenda($_POST['txtQuantVenda']);



      $source = array('.', ','); 
      $replace = array('', '.');
      $valorUni = str_replace($source ,$replace,$_POST['txtValorUnitario']);

$oVenda->__setValorUnitVenda($valorUni);


      $source = array('.', ','); 
      $replace = array('', '.');
      $valorT = str_replace($source ,$replace,$_POST['txtValorTotal']);

$oVenda->__setValorTotalVenda($valorT);
$oVenda->__setMicragem($_POST['txtMicragem']);


$oVenda->__setIdCliente($_POST['IdCliente']);


 if(isset($_POST['id'])){
$oVenda->__setIdVenda($_POST['id']);
if($oPessit->__updateVenda($oVenda))
   {
     $pagina = $_POST['pagina']; 
  header("Location:../View/Vendas/listarVenda.php?pagina=$pagina&ok");
  
  }   }
  
  if(isset($_POST['C_id'])){

    $oVenda->__setIdVenda($_POST['C_id']);
    
if($oPessit->__updateVenda($oVenda))
{
      
    header("Location:../View/Consulta/pvenda.php?&ok");   
}}
  
  }
  
 if(isset($_GET['delete']))
 {
    if($oPessit->__deleteVenda($_GET['delete']))
    {   $pagina = $_GET['pagina'];
    header("Location:../View/Vendas/listarVenda.php?pagina=$pagina&del");
    
    
    }       
 }
 
 if(isset($_GET['C_delete']))
 {
    if($oPessit->__deleteVenda($_GET['C_delete']))
    {   $pagina = $_GET['pagina'];
    header("Location:../View/Consulta/pvenda.php?&del");
    
    
    }       
 }
 
 ?>
