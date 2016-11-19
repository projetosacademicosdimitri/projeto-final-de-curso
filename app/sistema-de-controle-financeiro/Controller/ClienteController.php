<?php

/**
 * Description of ClienteController
 *
 * @author dimitri.miranda
 */
//include_once '../Model/Cliente.php';

class ClienteController
{

    private $cliente;

    function __construct()
    {
        $this->cliente = new Cliente();
    }

    private function insertCliente($cliente)
    {
        return $this->cliente->insertCliente($cliente);
    }

    private function updateCliente($cliente)
    {
        return $this->cliente->updateCliente($cliente);
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

    private function buscaById($idCliente)
    {
        return $this->cliente->buscIdCliente($idCliente);
    }

    public function clientesPaginacao($paginacao, $status)
    {
        return $this->cliente->clientesPaginacao($paginacao, $status);
    }

    public function countClientes($status)
    {
        return $this->cliente->countClientes($status);
    }

    public function execulteAcao($acao = null, $cliente = null, $idCliente = null, $paginacao = null)
    {

        switch ($acao) {

            case 'salvar.cliente':
                return $this->insertCliente($cliente);
                break;

            case 'editar.cliente':
                return $this->updateCliente($cliente);
                break;


            case 'inativar.cliente':
                return $this->inativarCliente($idCliente);
                break;

            case 'ativar.cliente':
                return $this->ativarFuncionario($idCliente);
                break;

            case 'buscar.cliente':
                return $this->buscaById($idCliente);
                break;


            case 'paginacao.ativos.cliente':
                return $this->clientesPaginacao($paginacao, 'ativo');
                break;

            case 'paginacao.inativos.cliente':
                return $this->clientesPaginacao($paginacao, 'inativo');
                break;

            case 'conte.total.ativos.cliente':
                return $this->countClientes('ativo');
                break;

            case 'conte.total.inativos.cliente':
                return $this->countClientes('inativo');
                break;

            default:
                break;
        }
    }

}
