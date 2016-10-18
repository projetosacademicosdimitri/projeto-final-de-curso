<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

echo ini_set('default_charset','UTF-8');//resolveu o problema com desconfiguração  de carácteres
 include_once '../Model/DTO/Adiantamento.php';
 include_once '../Model/Database/CmdSql.php';
 
 


$oAdianta = new Adiantamento();

     $source = array('.', ','); 
      $replace = array('', '.');
      $vValorAdiantamento = str_replace($source ,$replace,$_POST['txtValorAdiantamento']);


$oAdianta->__setValorAdiantamento($vValorAdiantamento);

$oAdianta->__setDataAdiantamento($_POST['txtDataAdiantamento']);
$oAdianta->__setIdFunc($_POST['IdFunc']);


$oPessit = new CmdSql();

if($oPessit->__insertAdiantamento($oAdianta)){
    
	header("Location:../View/Adiantamento/CadAdiantamento.php?&ok"); 

}



?>
