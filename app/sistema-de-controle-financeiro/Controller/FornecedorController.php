<?php

/**
 * Description of FornecedorController
 * @author dimitri.miranda
 */
class FornecedorController
{

    private $fornecedor;

    public function __construct()
    {
        $this->fornecedor = new Fornecedor();
    }

    public function insertfornecedor($fornecedor)
    {
        return $this->fornecedor->insertfornecedor($fornecedor);
    }

    public function updatefornecedor($fornecedor)
    {
        return $this->fornecedor->updatefornecedor($fornecedor);
    }

    public function buscaById($idfornecedor)
    {

        return $this->fornecedor->buscaById($idfornecedor);
    }

    public function inativarfornecedor($idfornecedor)
    {
        return $this->fornecedor->inativarfornecedor($idfornecedor);
    }

    public function ativarfornecedor($idfornecedor)
    {
        return $this->fornecedor->ativarfornecedor($idfornecedor);
    }

    public function fornecedoresPaginacao($paginacao, $status)
    {
        return $this->fornecedor->fornecedoresPaginacao($paginacao, $status);
    }

    public function countfornecedores($status)
    {
        return $this->fornecedor->countFornecedores($status);
    }

    public function executeAcao($acao = null, $fornecedor = null, $idfornecedor = null, $paginacao = null)
    {

        switch ($acao) {

            case 'salvar.fornecedor':
                return $this->insertfornecedor($fornecedor);
                break;

            case 'editar.fornecedor':
                return $this->updatefornecedor($fornecedor);
                break;

            case 'inativar.fornecedor':
                return $this->inativarfornecedor($idfornecedor);
                break;

            case 'ativar.fornecedor':
                return $this->ativarfornecedor($idfornecedor);
                break;

            case 'buscar.fornecedor':
                return $this->buscaById($idfornecedor);
                break;


            case 'paginacao.ativos.fornecedor':
                return $this->fornecedoresPaginacao($paginacao, 'ativo');
                break;

            case 'paginacao.inativos.fornecedor':
                return $this->fornecedoresPaginacao($paginacao, 'inativo');
                break;

            case 'conte.total.ativos.fornecedor':
                return $this->countFornecedores('ativo');
                break;

            case 'conte.total.inativos.fornecedor':
                return $this->countfornecedores('inativo');
                break;

            default:
                break;
        }
    }

}
