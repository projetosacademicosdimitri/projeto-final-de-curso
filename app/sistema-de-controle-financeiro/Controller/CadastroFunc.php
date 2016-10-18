<?php
/* @author Dimitri Miranda
 * Controla  a  requisição  vinda da pagina de cadastro funcionário 
 * Cria  o  DTO funcionário 
 * 15/08/2013*/
//require '../kint/Kint.class.php';
 
 echo ini_set('default_charset','UTF-8');//resolveu o problema com desconfiguração  de carácteres
 include_once '../Model/DTO/Funcionario.php';
 include_once '../Model/Database/CmdSql.php';

// if(isset($_POST['btn'])=="Cadastrar")
   $oFunc = new Funcionario();
   $oFunc->__setNome($_POST['txtNomFunc']);
   $oFunc->__setCpfFunc($_POST['txtCpfFunc']);
   $oFunc->__setRgFunc($_POST['txtRgFunc']);
   $oFunc->__setDataNascFunc($_POST['txtDnascFunc']);
   $oFunc->__setTelFunc($_POST['txtTelFunc']);
   $oFunc->__setCelFunc($_POST['txtCelFunc']);
   $oFunc->__setCargoFunc($_POST['txtCargoFunc']);
   $oFunc->__setEndFunc($_POST['txtEndFunc']);
   $oFunc->__setNumeroEndFunc($_POST['txtNumFunc']);
   $oFunc->__setBairro($_POST['txtBaiFunc']);
   $oFunc->__setCidade($_POST['txtCidFunc']);
   $oFunc->__setCep($_POST['txtCepFunc']);
   $oFunc->__setEstado($_POST['txtUfFunc']);
   $oFunc->__setDataAdmFunc($_POST['txtDaa']);
   $oFunc->__setCtpsFunc($_POST['txtNCT']);
   $oFunc->__setSerie($_POST['txtNSC']);
   $oFunc->__setPisFunc($_POST['txtPIS']);
   $oFunc->__setUfCTPS($_POST['txtUfCTPS']);
  
     $source = array('.', ','); 
      $replace = array('', '.');
    $valor = str_replace($source ,$replace,  $_POST['txtSal']); //procura todas as virgulas   e substitui por pontos

	$oFunc->__setSalarioFunc($valor);

 $oPessit = new CmdSql();
//Tente se conseguir redirecione para um novo cadastro 
if($oPessit->__insertFuncionario($oFunc))
  echo "<script>location.href='../View/Func/cadFunc.php?&ok'</script>";


    


?>

