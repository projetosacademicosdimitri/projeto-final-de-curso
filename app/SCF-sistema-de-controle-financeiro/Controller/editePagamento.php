<?php
include_once '../Model/DTO/Pagamento.php';
include_once '../Model/Database/CmdSql.php';
 
 

 if(isset($_POST['gravar']))
 {
$oPaga = new Pagamento();



$oPaga->__setDataPagamento($_POST['txtDataPagamento']);


      $source = array('.', ','); 
      $replace = array('', '.');
      $SalarioBase = str_replace($source ,$replace,$_POST['vSalarioBase']);
    
      
      $oPaga->__setSalarioBase($SalarioBase);


      $source = array('.', ','); 
      $replace = array('', '.');
      $ValorDesconto = str_replace($source ,$replace,$_POST['txtDescont']);
    
      $oPaga->__setDescontos($ValorDesconto);
    

      
      $source = array('.', ','); 
      $replace = array('', '.');
      $ValorHoraExtra = str_replace($source ,$replace,$_POST['txtHoraExt']);
    
      $oPaga->__setHoraExtra($ValorHoraExtra);

      $source = array('.', ','); 
      $replace = array('', '.');
      $ValorAdiantamento = str_replace($source ,$replace,$_POST['txtAdianta']);
    
      $oPaga->__setAdiantamento($ValorAdiantamento); 


      $source = array('.', ','); 
      $replace = array('', '.');
      $ValorTotalPgmto = str_replace($source ,$replace,$_POST['txtValorTot']);
    
      $oPaga->__setValorTotalPgmto($ValorTotalPgmto); 


      $source = array('.', ','); 
      $replace = array('', '.');
      $ValorLiquido = str_replace($source ,$replace,$_POST['txtValorLiqui']);
    
      $oPaga->__setValorLiquido($ValorLiquido);
      
     
$oPaga->__setIdfunc($_POST['vIdFunc']);



$oPessit = new CmdSql;


if(isset($_POST['id'])){

$oPaga->__setIdPagamento($_POST['id']);

if($oPessit->__updatePagamento($oPaga))
   {
     $pagina = $_POST['pagina']; 
  header("Location:../View/Pagamento/ListarPagamento.php?pagina=$pagina&ok");
  
  }}
  
  if(isset($_POST['C_id'])){

    $oPaga->__setIdPagamento($_POST['C_id']);
    
if($oPessit->__updatePagamento($oPaga))
{
      
    header("Location:../View/Consulta/ppagamento.php?&ok");   
}}
  
 }
  
  
  
  
 if(isset($_GET['delete']))
 {
     $oPessit = new CmdSql;
    if($oPessit->__deletePagamento($_GET['delete']))
    {   $pagina = $_GET['pagina'];
    header("Location:../View/Pagamento/ListarPagamento.php?pagina=$pagina&del");
    
    
    }       
 }
 
  if(isset($_GET['C_delete']))
 {
     $oPessit = new CmdSql;
    if($oPessit->__deletePagamento($_GET['C_delete']))
    {   $pagina = $_GET['pagina'];
    header("Location:../View/Consulta/ppagamento.php?&del");
    
    
    }       
 }
 
 ?>
