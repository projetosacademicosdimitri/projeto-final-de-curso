<?php

/*  Autor  Dimitri  Miranda 
  13/09/2013
  Essa classe é responsável consultar no banco de dados .
  Fazer a validação do usuário e abrir uma sessão redirecionando   para as  paginas do sistema
  ela  recebe como parâmetro um objeto usuário e  valida esse  objeto como  valido ou  não


 */
include_once '../Model/Database/Conexao.php';

class Login extends Conexao
{

    public function __validUser($user)
    {

        $sql = "SELECT idFunc,Login,Senha FROM user ";
        $sql .= "WHERE Login =? AND Senha =? ; ";
        $q = $this->prepare($sql);
        $q->bindParam(1, $user->getLogin());
        $q->bindParam(2, $user->getSenha());
        $q->execute();

        if ($q->rowCount() > 0) {
            $result = $q->fetch(PDO::FETCH_ASSOC);
            session_start("USER");
            $_SESSION['Login'] = $result['Login'];
            echo"<script>location.href='../View/home/home.php'</script>";
        } else {
            echo"<script>alert('Usuario sem permissão');location.href='../index.php';</script>";
        }
    }

    public static function __logout()
    {
        session_start("USER");
        $_SESSION['Login'] = NULL;
        unset($_SESSION['Login']);
        echo "<script> alert('Desconectado com  sucesso'); location.href='../index.php'</script>";
    }

}

?>
