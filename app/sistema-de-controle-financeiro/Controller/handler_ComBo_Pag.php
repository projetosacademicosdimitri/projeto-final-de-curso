<?php
include_once '../Model/Database/CmdSql.php';
//require '../kint/Kint.class.php';
$oPessit = new CmdSql();
	$q = $oPessit->prepare("select salarioFunc from funcionario where Status = 'Ativo' AND idFunc = ? ");
	$param= $_GET['id_func'];
	$q->bindParam(1,$param);
	$q->execute();
	$linha  =  $q->fetchAll(PDO::FETCH_OBJ);
echo number_format($linha[0]->salarioFunc / 2, 2, ',', '.');

?>