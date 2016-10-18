<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include '../Model/DTO/Fornecedor.php';
include '../Model/Database/CmdSql.php';

$obj = new Fornecedor();

$obj->__setNome($_POST['txtNomFornecedor']);
$obj->__setTelefone($_POST['txtTelFornecedor']);
$obj->__setContato($_POST['txtNomeContatoFor']);

$oPessit = new CmdSql();
if($oPessit->__insertFornecedor($obj))
{  
header("Location:../View/Fornecedor/cadfornecedor.php?&ok");  


//echo"<scrit> location.href='../View/Fornecedor/cadfornecedor.php?&ok'</script>";


}    

?>
