
<?php
/* @author Dimitri Miranda
 * Controla  a  requisão  vinda da pagina de cadastro funcionario 
 * Cria  o  DTO funcionario 
 * 15/08/2013*/
 
 echo ini_set('default_charset','UTF-8');//resolveu o problema com desconfiguração  de carácteres
 include_once '../Model/DTO/SacoPlastico.php';
 include_once '../Model/Database/CmdSql.php';

// if(isset($_POST['btn'])=="Cadastrar")
   $oSaco = new SacoPlastico();
   $oSaco->__setCorSaco($_POST['txtCorSac']);
   $oSaco->__setTamanhoSaco($_POST['txtTamanhoSac']);
 
  
 


 $oPessit = new CmdSql();
if($oPessit->__insertSacoPlastico($oSaco))
{ //Tente se conseguir redirecione para um novo cadastro 

header("Location:../View/SacosPlasticos/CadSacoPlastico.php?&ok"); 
}    

?>

