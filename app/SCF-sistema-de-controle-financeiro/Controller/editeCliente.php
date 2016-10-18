<?php

include_once '../Model/DTO/Cliente.php';
include_once '../Model/Database/CmdSql.php';

$oPessit = new CmdSql;


if (isset($_POST['Gravar'])) {
    $oCliente = new Cliente();

    $oCliente->__setNome($_POST['txtNomCliente']);
    $oCliente->__defineCliente($_POST['rdoPessoa'], $_POST['txtPessoa']);
    $oCliente->__setContato($_POST['txtNomeContato']);
    $oCliente->__setTelefone($_POST['txtTelCliente']);
    $oCliente->__setCodMunicipal($_POST['txtCodMunicipal']);
    $oCliente->__setEnd($_POST['txtEndCliente']);
    $oCliente->__setNumero($_POST['txtNumEndCliente']);
    $oCliente->__setBairro($_POST['txtBaiEndCliente']);
    $oCliente->__setCidade($_POST['txtCidEndCliente']);
    $oCliente->__setCep($_POST['txtCepEndCliente']);
    $oCliente->__setEstado($_POST['txtUfEndCliente']);

    $oPessit = new CmdSql;
    
    if (isset($_POST['id'])) {

        $oCliente->__setId($_POST['id']);

        if ($oPessit->__updateCliente($oCliente)) {
            $pagina = $_POST['pagina'];

            header("Location:../View/Cliente/listCliente.php?pagina=$pagina&ok");
        }
    }

    if (isset($_POST['Li_id'])) {
        $pagina = $_POST['pagina'];
        $oCliente->__setId($_POST['Li_id']);

        if ($oPessit->__updateCliente($oCliente)) {

            header("Location:../View/CadCliente/listClientesInativos.php?pagina=$pagina&ok");
        }
    }

    if (isset($_POST['C_id'])) {

        $oCliente->__setId($_POST['C_id']);

        if ($oPessit->__updateCliente($oCliente)) {
            $pagina = $_POST['pagina'];

            header("Location:../View/Consulta/pcliente.php?&ok");
        }
    }
}

if (isset($_GET['inativar'])) {
    $pagina = $_GET['pagina'];

    if ($oPessit->__InativarCliente($_GET['inativar']))
        header("Location:../View/CadCliente/listCliente.php?pagina=$pagina&inat");
}

if (isset($_GET['ativar'])) {
    $pagina = $_GET['pagina'];

    if ($oPessit->__AtivarCliente($_GET['ativar']))
        header("Location:../View/Cliente/listClientesInativos.php?pagina=$pagina&atv");
}

if (isset($_GET['C_inativar'])) {
    if ($oPessit->__InativarCliente($_GET['C_inativar']))
        header("Location:../View/Consulta/pcliente.php?&inat");
}

if (isset($_GET['C_ativar'])) {
    if ($oPessit->__AtivarCliente($_GET['C_ativar']))
        header("Location:../View/Consulta/pcliente.php?&atv");
}
?>
