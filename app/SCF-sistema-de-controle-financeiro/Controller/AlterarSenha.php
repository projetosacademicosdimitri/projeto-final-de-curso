<?php

 include_once '../Model/DTO/Usuario.php';
include_once '../Model/Database/CmdSql.php';



if(isset($_POST['btnAlterarSenha'])){
$oPessit = new CmdSql;
$linhas = $oPessit->Idlogin($_POST['txtLogin']);   
$login = $linhas['Login'];   
$senha = $linhas['Senha'];
$email = $linhas['email'];
$id = $linhas['IdFunc'];


echo $_POST['txtLogin'];
echo $_POST['txtSenhaAtual'];
echo $_POST['txtNovaSenha'];
echo $id;

if($login == $_POST['txtLogin'] AND $senha == $_POST['txtSenhaAtual']){

    if($_POST['txtNovaSenha'] == $_POST['txtConfNovaSenha']){
        $sen = $_POST['txtNovaSenha'];
        $oUser = new Usuario();
        $oUser->setSenha($sen);
        $oUser->setId($id);

       if($oPessit->__AlterarSenha($oUser))
   {
   
           $NovaSenha = $_POST['txtNovaSenha'];
           
$mensage ="Você solicitou a alteração de senha confira seu dados atualizados.\n";
$mensage .="Login: " . $login;
$mensage .="\n Senha: " . $NovaSenha;

$titulo = "Senha alterada - SCA";
$headers = 'From: sistemadecontroleadministrativo@sca.com';
mail($email,$titulo, $mensage,$headers);
           
           
  {header("Location:../View/Password/AlterarSenha.php?senhaalterada");}
  
  
    
    
            
        
   } 
       
    }else
        {
        header("Location:../View/Password/AlterarSenha.php?naoconfere");
        }
    

    }else
        {
        header("Location:../View/Password/AlterarSenha.php?senhainvalida");
        }

    
    
    
    }
    


?>
