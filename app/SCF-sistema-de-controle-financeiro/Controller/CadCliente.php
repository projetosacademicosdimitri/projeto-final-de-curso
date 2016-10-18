
<?php

include_once '../Model/Cliente.php';

if (isset($_POST['btnCad'])) {

    try {
    
        $cliente = new Cliente();
        $cliente->nome = $_POST['txtNomCliente'];
        $cliente->defineCliente($_POST['rdoPessoa'], $_POST['txtPessoa']);
        $cliente->contato = $_POST['txtNomeContato'];
        $cliente->telefone = $_POST['txtTelCliente'];
        $cliente->codMunicipal = $_POST['txtCodMunicipal'];
        $cliente->endereco = $_POST['txtEndCliente'];
        $cliente->numero = $_POST['txtNumEndCliente'];
        $cliente->bairro = $_POST['txtBaiEndCliente'];
        $cliente->cidade = $_POST['txtCidEndCliente'];
        $cliente->cep = $_POST['txtCepEndCliente'];
        $cliente->estado = $_POST['txtUfEndCliente'];

        if ($cliente->insertCliente()) {
            header("Location:../View/Cliente/cadCliente.php?&ok");
        }
    } catch (Exception $ex) {

        echo"<script>alert('" . $ex->getMessage() . "');</script>";
    }
} else {
    echo"<script>alert('Solicite Uma Requisicao Ao Servidor.');</script>";
}
?>
