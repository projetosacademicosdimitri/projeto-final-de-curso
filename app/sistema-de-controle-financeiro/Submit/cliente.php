<?php

/*
 * @author Dimitri Miranda 
 */

//include '../Controller/ClienteController.php';

include '../includes.php';

/* Cliente controller */
$clienteController = new ClienteController();

/* Objeto de transferencia de dados ( data transfer object ) */
$dto = new StdClass;



if (isset($_POST['salvar_cliente'])) {

    try {

        $dto->nome = $_POST['txtNomCliente'];
        if ($_POST['rdoPessoa'] == 1) {
            $dto->tipoPessoa = 1;
            $dto->cpf = $_POST['txtPessoa'];
            $dto->cnpj = " ";
        } else {
            $dto->tipoPessoa = 2;
            $dto->cnpj = $_POST['txtPessoa'];
            $dto->cpf = " ";
        }

        $dto->contato = $_POST['txtNomeContato'];
        $dto->telefone = $_POST['txtTelCliente'];
        $dto->codMunicipal = $_POST['txtCodMunicipal'];
        $dto->endereco = $_POST['txtEndCliente'];
        $dto->numero = $_POST['txtNumEndCliente'];
        $dto->bairro = $_POST['txtBaiEndCliente'];
        $dto->cidade = $_POST['txtCidEndCliente'];
        $dto->cep = $_POST['txtCepEndCliente'];
        $dto->estado = $_POST['txtUfEndCliente'];

        if ($clienteController->execulteAcao('salvar.cliente', $dto)) {
            header("Location:../View/Cliente/cadCliente.php?&ok");
        } else {
            header("Location:../View/Cliente/cadCliente.php?&ok");
        }
    } catch (Exception $ex) {

        echo"<script>alert('" . $ex->getMessage() . "');</script>";
    }
}
if (isset($_POST['edite_cliente'])) {


    $dto = new stdClass();

    $dto->nome = $_POST['txtNomCliente'];
    if ($_POST['rdoPessoa'] == 1) {
        $dto->tipoPessoa = 1;
        $dto->cpf = $_POST['txtPessoa'];
        $dto->cnpj = " ";
    } else {
        $dto->tipoPessoa = 2;
        $dto->cnpj = $_POST['txtPessoa'];
        $dto->cpf = " ";
    }


    $dto->contato = $_POST['txtNomeContato'];
    $dto->telefone = $_POST['txtTelCliente'];
    $dto->codMunicipal = $_POST['txtCodMunicipal'];
    $dto->endereco = $_POST['txtEndCliente'];
    $dto->numero = $_POST['txtNumEndCliente'];
    $dto->bairro = $_POST['txtBaiEndCliente'];
    $dto->cidade = $_POST['txtCidEndCliente'];
    $dto->cep = $_POST['txtCepEndCliente'];
    $dto->estado = $_POST['txtUfEndCliente'];

    if (isset($_POST['id'])) {

        $dto->idCliente = $_POST['id'];
        if ($clienteController->execulteAcao('editar.cliente', $dto)) {
            $pagina = $_POST['pagina'];
            header("Location:../View/Cliente/listCliente.php?pagina=$pagina&ok");
        }
    }
}

if (isset($_GET['inativar'])) {
    /* salva o numero da paginacao */
    $pagina = $_GET['pagina'];

    if ($clienteController->execulteAcao('inativar.cliente', null, $_GET['inativar'])) {
        header("Location:../View/Cliente/listCliente.php?pagina=$pagina&inat");
    }
}

if (isset($_GET['ativar'])) {
    /* salva o numero da paginacao */
    $pagina = $_GET['pagina'];

    if ($clienteController->execulteAcao('ativar.cliente', null, $_GET['ativar'])) {
        header("Location:../View/Cliente/listClientesInativos.php?pagina=$pagina&atv");
    }
}
