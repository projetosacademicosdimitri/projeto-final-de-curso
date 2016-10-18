<?php
/*Autor  Dimitri Miranda
 15/09/2013
 Esse  serviço é responsável  por  autenticar  e  desautenticar um usuário 
 se usuário é válido  redirecione para tela  inicial do sistema.

 Caso  existir   um  resquest de logout  a sessão  é destruída  
 e  ele é  redirecionado para a  tela de login.

 Esse   serviço  conta  com  classe Login,  para fazer  a consulta   no   banco de dados. 
 Temos  também  a classe   Usuário que é preenchida   com  os dados  de   request 
 vindos da tela  de  login. 

*/
include_once '../Model/Classes/Login.php';
include_once '../Model/DTO/Usuario.php';

if(isset($_POST['btnLogar']) )
  if(!empty($_POST['txtLog'] )&& !empty($_POST['txtSen']))
	 {
		$oUser =  new Usuario($_POST['txtLog'],$_POST['txtSen']);
		$valide = new Login();
		$valide->__validUser($oUser);
	 }

  else
    { echo "campos vazios";

    } 

if(isset($_GET['logout']))
   Login::__logout();  


 ?>
