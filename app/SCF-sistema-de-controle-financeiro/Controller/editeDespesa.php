<?php
include_once '../Model/DTO/Despesa.php';
include_once '../Model/Database/CmdSql.php';
 
 
 $oPessit = new CmdSql;
 
 if(isset($_POST['gravar']))
 {
$oDesp = new Despesa();
$oDesp->__setDescricaoDespesa($_POST['txtDescDesp']);
$oDesp->__setDataDespesa($_POST['txtDatadespesa']);


      $source = array('.', ','); 
      $replace = array('', '.');
      $valor = str_replace($source ,$replace,$_POST['txtValorDespesa']);


$oDesp->__setValorDespesa($valor);



$oDesp->__setTipoDespesa($_POST['txtDespesaTipo']);


   
 if(isset($_POST['id'])){
 $oDesp->__setIdDespesa($_POST['id']);
  if($oPessit->__updateDespesa($oDesp))
  { $pagina = $_POST['pagina'];
   header("Location:../View/Despesas/ListarDespesa.php?pagina=$pagina&ok");
    
   } }
   

  if(isset($_POST['C_id'])){

    $oDesp->__setIdDespesa($_POST['C_id']);
    
if($oPessit->__updateDespesa($oDesp))
{
      
    header("Location:../View/Consulta/pdespesa.php?&ok");   
}}    
        
 }
  
 if(isset($_GET['delete']))
 {
    if($oPessit->__deleteDespesa($_GET['delete']))
        $pagina = $_GET['pagina'];
    {header("Location:../View/Despesas/ListarDespesa.php?pagina=$pagina&del");
    }       
    
 }
 
  if(isset($_GET['C_delete']))
 {
    if($oPessit->__deleteDespesa($_GET['C_delete']))
        $pagina = $_GET['pagina'];
    {header("Location:../View/Consulta/pdespesa.php?&del");
    }       
    
 }
 
 ?>
