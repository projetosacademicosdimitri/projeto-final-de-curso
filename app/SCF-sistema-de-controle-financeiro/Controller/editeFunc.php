<?php
include_once '../Model/DTO/Funcionario.php';
include_once '../Model/Database/CmdSql.php';
 
  $oPessit = new CmdSql;
 
 if(isset($_POST['gravar']))
  {
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

   if(isset($_POST['id'])){     
        
   $oFunc->__setId($_POST['id']);
   
   if($oPessit->__updateFunc($oFunc))
   {
    $pagina = $_POST['pagina'];
    header("Location:../View/Func/listarFunc.php?pagina=$pagina&ok"); 
   } }
   
   if(isset($_POST['Li_id'])){  
        $oFunc->__setId($_POST['Li_id']);
        
        if($oPessit->__updateFunc($oFunc))
   { $pagina = $_POST['pagina'];
        
       header("Location:../View/Func/ListarFuncInativos.php?pagina=$pagina&ok");
       
   }}
   
   if(isset($_POST['C_id'])){  
        $oFunc->__setId($_POST['C_id']);
        
        if($oPessit->__updateFunc($oFunc))
   {
        
       header("Location:../View/Consulta/pfuncionario.php?&ok");
       
   }}  
       
   }
   
 if(isset($_GET['inativar']))
 {
    if($oPessit->__InativarFunc($_GET['inativar']))
        $pagina = $_GET['pagina'];
    header("Location:../View/Func/listarFunc.php?pagina=$pagina&inat");
           
    
 }
 
 if(isset($_GET['ativar']))
 {
    if($oPessit->__AtivarFunc($_GET['ativar']))
       $pagina = $_GET['pagina'];
    header("Location:../View/Func/ListarFuncInativos.php?pagina=$pagina&atv");
	
           
    
 }
 
 if(isset($_GET['C_inativar']))
 {
    if($oPessit->__InativarFunc($_GET['C_inativar']))
      
    header("Location:../View/Consulta/pfuncionario.php?&inat");
           
    
 }
 
 if(isset($_GET['C_ativar']))
 {
    if($oPessit->__AtivarFunc($_GET['C_ativar']))
     
    header("Location:../View/Consulta/pfuncionario.php?&atv");
           
    
 }
 ?>
