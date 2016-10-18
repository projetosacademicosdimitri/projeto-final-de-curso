<?php

/**
 * Description of ClienteController
 *
 * @author dimitri.miranda
 */
include_once '../Model/Cliente.php';

class ClienteController
{

    private $cliente;

    function __construct()
    {
        $this->cliente = new Cliente();
    }

    private function insertCliente($obj)
    {
        return $this->cliente->insertCliente($obj);
    }

    private function updateCliente($obj)
    {
        return $this->cliente->updateCliente($obj);
    }

    private function inativarCliente($idCliente)
    {
        return $this->cliente->inativarCliente($idCliente);
    }

    private function ativarCliente($id)
    {
        return $this->cliente->ativarCliente($idCliente);
    }

    private function listAllCliente()
    {
        return $this->cliente->listAllCliente();
    }

    private function listAllClienteAtivo()
    {
        return $this->cliente->listAllClienteAtivo();
    }

    private function buscIdCliente($idCliente)
    {
        return $this->cliente->buscIdCliente($idCliente);
    }

    public function execulteAcao($acao = null, $obj = null, $idCliente = null)
    {

        switch ($acao) {

            case 'salvar.cliente':
                return $this->insertCliente($obj);
                break;

            case 'editar.cliente':
                return $this->updateCliente($obj);
                break;

            case 'inativar.cliente':
                return $this->inativarCliente($idCliente);
                break;
            
            case 'ativar.cliente':
                return $this->ativarCliente($idCliente);
                break;


            default:
                break;
        }
    }

}
