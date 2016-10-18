<?php

include_once '../Model/DTO/Usuario.php';
include_once '../Model/Database/CmdSql.php';

if(isset($_POST['enviar'])){
$oPessit = new CmdSql;
$linhas = $oPessit->RecuperarSenha($_POST['txtLoginEmail']);   
$login = $linhas['Login'];   
$senha = $linhas['Senha'];
$email = $linhas['email'];

if($login == $_POST['txtLoginEmail'] || $email == $_POST['txtLoginEmail']){

$mensage ="Você solicitou a recuperação de senha confira seu dados.\n";
$mensage .="Login: " . $login;
$mensage .="\n Senha: " . $senha;

$titulo = "Senha recuperada - SCA";
$headers = 'From: sistemadecontroleadministrativo@sca.com';
mail($email,$titulo, $mensage,$headers);
header("Location:../index.php?ok");


}else
{
  header("Location:../View/Password/RecuperarSenha.php?noresult");
}
    
}

?>

