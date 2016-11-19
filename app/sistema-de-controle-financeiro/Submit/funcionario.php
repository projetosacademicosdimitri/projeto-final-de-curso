<?php

/**
 * Description of Funcionario
  @author dimitri.miranda
 */
include '../includes.php';

/* Cliente controller */
$funcionarioController = new FuncionarioController();
/* $dto Objeto de transferencia de dados  ( data transfer object ) */
$dto = new StdClass;

$source = array('.', ',');
$replace = array('', '.');


if (isset($_POST['salvar_funcionario'])) {
      
    try {
        $dto->nomeFunc = $_POST['txtNomFunc'];
        $dto->cargoFunc = $_POST['txtCargoFunc'];
        $dto->salarioFunc = str_replace($source, $replace, $_POST['txtSal']);
        $dto->cpfFunc = $_POST['txtCpfFunc'];
        $dto->pisFunc = $_POST['txtPIS'];
        $dto->dataNascFunc = $_POST['txtDnascFunc'];
        $dto->dataAdmFunc = $_POST['txtDaa'];
        $dto->endFunc = $_POST['txtEndFunc'];
        $dto->telFunc = $_POST['txtTelFunc'];
        $dto->celFunc = $_POST['txtCelFunc'];
        $dto->numeroFunc = $_POST['txtNumFunc'];
        $dto->rgFunc = $_POST['txtRgFunc'];
        $dto->ctpsFunc = $_POST['txtNCT'];
        $dto->serie = $_POST['txtNSC'];
        $dto->ufCTPS = $_POST['txtUfCTPS'];
        $dto->cep = $_POST['txtCepFunc'];
        $dto->cidade = $_POST['txtCidFunc'];
        $dto->estado = $_POST['txtUfFunc'];
        $dto->bairro = $_POST['txtBaiFunc'];


        if ($funcionarioController->execulteAcao('salvar.funcionario', $dto))
            header("Location:../View/Func/cadFunc.php?&ok");
        
    } catch (Exception $ex) {
        echo"<script>alert('" . $ex->getMessage() . "');</script>";
    }
}

if (isset($_POST['edite_funcionario'])) {
    
    $dto->idFunc = $_POST['id'];
    $dto->nomeFunc = $_POST['txtNomFunc'];
    $dto->cargoFunc = $_POST['txtCargoFunc'];
    $dto->salarioFunc = str_replace($source, $replace, $_POST['txtSal']);
    $dto->cpfFunc = $_POST['txtCpfFunc'];
    $dto->pisFunc = $_POST['txtPIS'];
    $dto->dataNascFunc = $_POST['txtDnascFunc'];
    $dto->dataAdmFunc = $_POST['txtDaa'];
    $dto->endFunc = $_POST['txtEndFunc'];
    $dto->telFunc = $_POST['txtTelFunc'];
    $dto->celFunc = $_POST['txtCelFunc'];
    $dto->numeroFunc = $_POST['txtNumFunc'];
    $dto->rgFunc = $_POST['txtRgFunc'];
    $dto->ctpsFunc = $_POST['txtNCT'];
    $dto->serie = $_POST['txtNSC'];
    $dto->ufCTPS = $_POST['txtUfCTPS'];
    $dto->cep = $_POST['txtCepFunc'];
    $dto->cidade = $_POST['txtCidFunc'];
    $dto->estado = $_POST['txtUfFunc'];
    $dto->bairro = $_POST['txtBaiFunc'];

    $pagina = $_POST['pagina'];
    if ($funcionarioController->execulteAcao('editar.funcionario', $dto))
         header("Location:../View/Func/listarFunc.php?pagina=$pagina&ok");
}
