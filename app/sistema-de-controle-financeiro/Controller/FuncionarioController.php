<?php

/**
 * Description of FuncionarioController
  @author dimitri.miranda
 */
//include_once '../../Model/Funcionario.php';
//include 'includes.php';
//die(__DIR__);
//include_once __DIR__.'/Model/Funcionario.php'; 

class FuncionarioController
{

    private $funcionario;

    public function __construct()
    {
        $this->funcionario = new Funcionario();
    }

    public function insertFuncionario($funcionario)
    {
        return $this->funcionario->insertFuncionario($funcionario);
    }

    public function updateFuncionario($funcionario)
    {
        return $this->funcionario->updateFuncionario($funcionario);
    }

    public function listAllFuncionarioAtivo()
    {
        return $this->funcionario->listAllFuncionario();
    }

    public function listAllFuncionario()
    {
        return $this->funcionario->listAllFuncionario();
    }

    public function buscaById($idFuncionario)
    {

        return $this->funcionario->buscaById($idFuncionario);
    }

    public function inativarFuncionario($idFuncionario)
    {
        return $this->funcionario->inativarFuncionario($idFuncionario);
    }

    public function ativarFuncionario($idFuncionario)
    {
        return $this->funcionario->ativarFuncionario($idFuncionario);
    }

    public function funcionariosPaginacao($paginacao, $status)
    {
        return $this->funcionario->funcionariosPaginacao($paginacao, $status);
    }

    public function countFuncionarios($status)
    {
        return $this->funcionario->countFuncionarios($status);
    }

    public function execulteAcao($acao = null, $funcionario = null, $idfuncionario = null, $paginacao = null)
    {

        switch ($acao) {

            case 'salvar.funcionario':
                return $this->insertFuncionario($funcionario);
                break;

            case 'editar.funcionario':
                return $this->updateFuncionario($funcionario);
                break;

            case 'inativar.funcionario':
                return $this->inativarFuncionario($idfuncionario);
                break;

            case 'ativar.funcionario':
                return $this->ativarFuncionario($idfuncionario);
                break;

            case 'buscar.funcionario':
                return $this->buscaById($idfuncionario);
                break;


            case 'paginacao.ativos.funcionario':
                return $this->funcionariosPaginacao($paginacao, 'ativo');
                break;

            case 'paginacao.inativos.funcionario':
                return $this->funcionariosPaginacao($paginacao, 'inativo');
                break;

            case 'conte.total.ativos.funcionario':
                return $this->countFuncionarios('ativo');
                break;

            case 'conte.total.inativos.funcionario':
                return $this->countFuncionarios('inativo');
                break;

            default:
                break;
        }
    }

}
