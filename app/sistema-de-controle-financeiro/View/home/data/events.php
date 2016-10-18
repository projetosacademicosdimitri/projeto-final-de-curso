<?php
	require_once('../connector/scheduler_connector.php');
	
	$res=mysql_connect("mysql.hostinger.com.br", "u696764283_scf", "123456");
	mysql_select_db("u696764283_scf");

	$scheduler = new schedulerConnector($res);
	$scheduler->render_table("calendario","id","start_date,end_date,text");
?>