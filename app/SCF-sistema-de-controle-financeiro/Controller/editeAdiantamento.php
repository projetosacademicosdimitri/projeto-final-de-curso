
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

echo ini_set('default_charset','UTF-8');//resolveu o problema com desconfiguração  de carácteres
 include_once '../Model/DTO/Adiantamento.php';
 include_once '../Model/Database/CmdSql.php';
 

if(isset($_POST['gravar']))
{

$oAdianta = new Adiantamento();

     $source = array('.', ','); 
      $replace = array('', '.');
      $vValorAdiantamento = str_replace($source ,$replace,$_POST['txtValorAdiantamento']);


$oAdianta->__setValorAdiantamento($vValorAdiantamento);

$oAdianta->__setDataAdiantamento($_POST['txtDataAdiantamento']);
$oAdianta->__setIdFunc($_POST['IdFunc']);













$oPessit = new CmdSql();

 if(isset($_POST['id'])){

 $oAdianta->__setIdAdiantamento($_POST['id']);
 
if($oPessit->__updateAdiantamento($oAdianta))
   {
     $pagina = $_POST['pagina']; 
  header("Location:../View/Adiantamento/ListarAdiantamento.php?pagina=$pagina&ok");
  
  }}


  
  
  if(isset($_POST['C_id'])){

    $oAdianta->__setIdAdiantamento($_POST['C_id']);
    
if($oPessit->__updateAdiantamento($oAdianta))
{
      
    header("Location:../View/Consulta/padiantamento.php?&ok");   
}}  

}
  
  
  
if(isset($_GET['delete']))
 { $oPessit = new CmdSql();
    if($oPessit->__deleteAdiantamento($_GET['delete']))
    {   $pagina = $_GET['pagina'];
    header("Location:../View/Adiantamento/ListarAdiantamento.php?pagina=$pagina&del");
    
    
    }       
 }
 
 if(isset($_GET['C_delete']))
 { $oPessit = new CmdSql();
    if($oPessit->__deleteAdiantamento($_GET['C_delete']))
    {   $pagina = $_GET['pagina'];
    header("Location:../View/Consulta/padiantamento.php?&del");
    
    
    }       
 }

?>
