<?php

/**
 * Description of Fornecedor
  @author dimitri.miranda
 */
include '../includes.php';


$fornecedorController = new FornecedorController();
$dto = new stdClass();

if (isset($_POST['salvar_fornecedor'])) {

    try {
        $dto->nome = $_POST['txtNomFornecedor'];
        $dto->tel = $_POST['txtTelFornecedor'];
        $dto->nomeContato = $_POST['txtNomeContatoFor'];
        if ($fornecedorController->executeAcao('salvar.fornecedor', $dto))
            header("Location:../View/Fornecedor/cadfornecedor.php?&ok");
    } catch (ErrorException $e) {
        die('Erro ' . $e->getMessage());
    }
}

if (isset($_POST['edite_fornecedor'])) {

    try {
        $dto->id = $_POST['id'];
        $dto->nome = $_POST['txtNomFornecedor'];
        $dto->tel = $_POST['txtTelFornecedor'];
        $dto->nomeContato = $_POST['txtNomeContatoFor'];
        if ($fornecedorController->executeAcao('editar.fornecedor', $dto))
            header("Location:../View/Fornecedor/listFornecedor.php?pagina=$pagina&ok");
    } catch (ErrorException $e) {
        die('Erro ' . $e->getMessage());
    }
}

if (isset($_GET['ativar'])) {

    try {
        /* salva o numero da paginacao */
        $pagina = $_GET['pagina'];

        if ($fornecedorController->executeAcao('ativar.fornecedor', null, $_GET['ativar'])) {
            header("Location:../View/Fornecedor/ListarFornInativos.php?pagina=$pagina&atv");
        }
    } catch (ErrorException $e) {
        die('Erro ' . $e->getMessage());
    }
}

if (isset($_GET['inativar'])) {

    try {
        /* salva o numero da paginacao */
        $pagina = $_GET['pagina'];

        if ($fornecedorController->executeAcao('inativar.fornecedor', null, $_GET['inativar'])) {
            header("Location:../View/Fornecedor/listFornecedor.php?pagina=$pagina&inat");
        }
    } catch (ErrorException $e) {
        die('Erro ' . $e->getMessage());
    }
}



