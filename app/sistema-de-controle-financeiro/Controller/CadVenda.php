
<?php



/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 echo ini_set('default_charset','UTF-8');//resolveu o problema com desconfiguração  de carácteres
 include_once '../Model/DTO/Venda.php';
 include_once '../Model/Database/CmdSql.php';
 
 


$oVenda = new Venda();

$oVenda->__setIdSacoVenda($_POST['txtIdSaco']);
$oVenda->__setDataVenda($_POST['txtDateVenda']);
$oVenda->__setQuantVenda($_POST['txtQuantVenda']);

      $source = array('.', ','); 
      $replace = array('', '.');
      $valorUni = str_replace($source ,$replace,$_POST['txtValorUnitario']);
    
    $oVenda->__setValorUnitVenda($valorUni);

      $source = array('.', ','); 
      $replace = array('', '.');
      $valorT = str_replace($source ,$replace,$_POST['txtValorTotal']);

    $oVenda->__setValorTotalVenda($valorT);
$oVenda->__setMicragem($_POST['txtMicragem']);

$oVenda->__setIdCliente($_POST['IdCliente']);

$oPessit = new CmdSql();
if($oPessit->__insertVenda($oVenda)){
 header("Location:../View/Vendas/CadVenda.php?&ok"); 
}

?>
