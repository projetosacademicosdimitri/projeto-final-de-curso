<?php



/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 echo ini_set('default_charset','UTF-8');//resolveu o problema com desconfiguração  de carácteres
 include_once '../Model/DTO/Despesa.php';
 include_once '../Model/Database/CmdSql.php';
 
 


$oDesp = new Despesa();

$oDesp->__setDescricaoDespesa($_POST['txtDescDesp']);
$oDesp->__setDataDespesa($_POST['txtDatadespesa']);


      $source = array('.', ','); 
      $replace = array('', '.');
      $valor = str_replace($source ,$replace,$_POST['txtValorDespesa']);
      $oDesp->__setValorDespesa($valor);
      $oDesp->__setTipoDespesa($_POST['txtDespesaTipo']);


$oPessit = new CmdSql();

if($oPessit->__insertDespesa($oDesp)){
    
	header("Location:../View/Despesas/CadDespesas.php?&ok"); 
}


?>
