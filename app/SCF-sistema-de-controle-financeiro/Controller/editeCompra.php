<?php
include_once '../Model/DTO/Compra.php';
include_once '../Model/Database/CmdSql.php';
 
 
 $oPessit = new CmdSql;
 
 if(isset($_POST['gravar']))
 {
$oComp = new Compra();
$oComp->__setMaterialCompra($_POST['txtNomMaterial']);
$oComp->__setDataCompra($_POST['txtDateCompra']);
$oComp->__setQuantidadeCompra($_POST['txtQuantCompra']);


      $source = array('.', ','); 
      $replace = array('', '.');
      $valorUni = str_replace($source ,$replace,$_POST['txtValorUnitario']);

$oComp->__setValorUnitarioCompra($valorUni);

      $source = array('.', ','); 
      $replace = array('', '.');
      $valorT = str_replace($source ,$replace,$_POST['txtValorTotal']);


$oComp->__setValorTotalCompra($valorT);



$oComp->__setIdFornecedor($_POST['IdFornecedor']);
   
 if(isset($_POST['id'])){
 $oComp->__setIdCompra($_POST['id']);
   if($oPessit->__updateCompra($oComp))
   {
     $pagina = $_POST['pagina'];
    {header("Location:../View/Compra/listarCompra.php?pagina=$pagina&ok");}
       
   }}   
   

    if(isset($_POST['C_id'])){

    $oComp->__setIdCompra($_POST['C_id']);
    
if($oPessit->__updateCompra($oComp))
{
      
    header("Location:../View/Consulta/pcompra.php?&ok");   
}} 
       
   }
  
 if(isset($_GET['delete']))
 {
    if($oPessit->__deleteCompra($_GET['delete']))
        $pagina = $_GET['pagina'];
    {header("Location:../View/Compra/listarCompra.php?pagina=$pagina&del");
    }       
    
 }
 
 if(isset($_GET['C_delete']))
 {
    if($oPessit->__deleteCompra($_GET['C_delete']))
        $pagina = $_GET['pagina'];
    {header("Location:../View/Consulta/pcompra.php?&del");
    }       
    
 }
 
 ?>
