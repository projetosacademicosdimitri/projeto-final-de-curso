<?php
include_once '../Model/DTO/SacoPlastico.php';
include_once '../Model/Database/CmdSql.php';
 
  $oPessit = new CmdSql;
 
 if(isset($_POST['gravar']))
  {
   $oSaco = new SacoPlastico();
   $oSaco->__setCorSaco($_POST['txtCorSac']);
   $oSaco->__setTamanhoSaco($_POST['txtTamanhoSac']);
   
   
   
   
  if(isset($_POST['id'])){     

       $oSaco->__setIdSacoPlastico($_POST['id']);
   
   if($oPessit->__updateSacoPlastico($oSaco))
   {
    $pagina = $_POST['pagina'];
    header("Location:../View/SacosPlasticos/ListarSacoPlastico.php?pagina=$pagina&ok"); 
   } }
   
   
   if(isset($_POST['Li_id'])){  
       
        $oSaco->__setIdSacoPlastico($_POST['Li_id']);
        if($oPessit->__updateSacoPlastico($oSaco))
   {
        $pagina = $_POST['pagina'];
       header("Location:../View/SacosPlasticos/ListarSacoInativo.php?pagina=$pagina&ok");
       
   }}  
       
       
   }
  
 if(isset($_GET['inativar']))
 {
    if($oPessit->__InativarSacoPlastico($_GET['inativar']))
        $pagina = $_GET['pagina'];
    header("Location:../View/SacosPlasticos/ListarSacoPlastico.php?pagina=$pagina&inat");
           
    
 }
 
 if(isset($_GET['ativar']))
 {
    if($oPessit->__AtivarSacoPlastico($_GET['ativar']))
        $pagina = $_GET['pagina'];
    header("Location:../View/SacosPlasticos/ListarSacoInativo.php?pagina=$pagina&atv");
           
    
 }
 

 ?>
