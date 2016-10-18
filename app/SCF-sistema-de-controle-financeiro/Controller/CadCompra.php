<?php



/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 echo ini_set('default_charset','UTF-8');//resolveu o problema com desconfiguração  de carácteres
 include_once '../Model/DTO/Compra.php';
 include_once '../Model/Database/CmdSql.php';
 
 


$oComp = new Compra();

$oComp->__setMaterialCompra($_POST['txtNomMaterial']);
$oComp->__setDataCompra($_POST['txtDateCompra']);
$oComp->__setQuantidadeCompra($_POST['txtQuantCompra']);
$oComp->__setValorUnitarioCompra($_POST['txtValorUnitario']);

      $source = array('.', ','); 
      $replace = array('', '.');
      $valor = str_replace($source ,$replace,$_POST['txtValorTotal']);


$oComp->__setValorTotalCompra($valor);

$oComp->__setIdFornecedor($_POST['IdFornecedor']);

$oPessit = new CmdSql();

if($oPessit->__insertCompra($oComp)){
  header("Location:../View/Compra/CadCompra.php?&ok"); 
}


?>
