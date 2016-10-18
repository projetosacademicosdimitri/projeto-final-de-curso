<?php

include '../Model/DTO/Fornecedor.php';
include '../Model/Database/CmdSql.php';
$oPessit = new CmdSql();
if(isset($_POST['Gravar']))
{$obj = new Fornecedor();
$obj->__setId($_POST['id']);
$obj->__setNome($_POST['txtNomFornecedor']);
$obj->__setTelefone($_POST['txtTelFornecedor']);
$obj->__setContato($_POST['txtNomeContatoFor']);


 $pagina = $_GET['pagina'];
if(isset($_POST['id'])){     
   
    $obj->__setId($_POST['id']);
    
   if($oPessit->__updateFornecedor($obj))
   {
    $pagina = $_POST['pagina'];
    header("Location:../View/Fornecedor/listFornecedor.php?pagina=$pagina&ok"); 
   } }
   
   
   if(isset($_POST['Li_id'])){  
    
        $obj->__setId($_POST['Li_id']);
        
        if($oPessit->__updateFornecedor($obj))
   {$pagina = $_POST['pagina'];
        
       header("Location:../View/Fornecedor/ListarFornInativos.php?pagina=$pagina&ok");
       
   }}
   
   
   if(isset($_POST['C_id'])){  
    $pagina = $_GET['pagina'];
        $obj->__setId($_POST['C_id']);
        
        if($oPessit->__updateFornecedor($obj))
   {
        
       header("Location:../View/Consulta/pfornecedor.php?ok");
       
   }}

}
 

if(isset($_GET['inativar']))
 { $oPessit = new CmdSql();
    if($oPessit->__InativarFornecedor($_GET['inativar']))
    {  $pagina = $_GET['pagina'];
      header("Location:../View/Fornecedor/listFornecedor.php?pagina=$pagina&inat");
    
    
    
    }           
    
 }

 if(isset($_GET['ativar']))
 {
    if($oPessit->__AtivarFornecedor($_GET['ativar']))
        $pagina = $_GET['pagina'];
    header("Location:../View/Fornecedor/ListarFornInativos.php?pagina=$pagina&atv");
           
    
 }
 
 if(isset($_GET['C_inativar']))
 {
    if($oPessit->__InativarFornecedor($_GET['C_inativar']))
        $pagina = $_GET['pagina'];
    header("Location:../View/Consulta/pfornecedor.php?inat");
           
    
 }
 
 if(isset($_GET['C_ativar']))
 {
    if($oPessit->__AtivarFornecedor($_GET['C_ativar']))
        $pagina = $_GET['pagina'];
    header("Location:../View/Consulta/pfornecedor.php?atv");
           
    
 }
 
 


?>
