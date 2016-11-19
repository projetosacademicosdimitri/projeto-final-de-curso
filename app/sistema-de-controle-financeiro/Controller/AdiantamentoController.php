<?php

/**
 * Description of AdiantamentoController
 *
 * @author dimitri.miranda
 */
class AdiantamentoController
{

    private $adiantamento;

    function __construct()
    {
        $this->adiantamento = new adiantamento();
    }

    private function insertAdiantamento($adiantamento)
    {
        return $this->adiantamento->insertAdiantamento($adiantamento);
    }

    private function updateAdiantamento($adiantamento)
    {
        return $this->adiantamento->updateAdiantamento($adiantamento);
    }

    private function inativarAdiantamento($idAdiantamento)
    {
        return $this->adiantamento->inativarAdiantamento($idAdiantamento);
    }

    private function ativarAdiantamento($idAdiantamento)
    {
        return $this->adiantamento->ativarAdiantamento($idAdiantamento);
    }

    private function listAlladiantamento()
    {
        return $this->adiantamento->listAlladiantamento();
    }

    private function listAlladiantamentoAtivo()
    {
        return $this->adiantamento->listAlladiantamentoAtivo();
    }

    private function buscaById($idadiantamento)
    {
        return $this->adiantamento->buscIdadiantamento($idadiantamento);
    }

    public function adiantamentosPaginacao($paginacao, $status)
    {
        return $this->adiantamento->adiantamentosPaginacao($paginacao, $status);
    }

    public function countAdiantamentos($status)
    {
        return $this->adiantamento->countadiantamentos($status);
    }

    public function execulteAcao($acao = null, $adiantamento = null, $idadiantamento = null, $paginacao = null)
    {

        switch ($acao) {

            case 'salvar.adiantamento':
                return $this->insertadiantamento($adiantamento);
                break;

            case 'editar.adiantamento':
                return $this->updateadiantamento($adiantamento);
                break;

            case 'inativar.adiantamento':
                return $this->inativaradiantamento($idadiantamento);
                break;

            case 'ativar.adiantamento':
                return $this->ativarFuncionario($idadiantamento);
                break;

            case 'buscar.adiantamento':
                return $this->buscaById($idadiantamento);
                break;


            case 'paginacao.ativos.adiantamento':
                return $this->adiantamentosPaginacao($paginacao, 'ativo');
                break;

            case 'paginacao.inativos.adiantamento':
                return $this->adiantamentosPaginacao($paginacao, 'inativo');
                break;

            case 'conte.total.ativos.adiantamento':
                return $this->countadiantamentos('ativo');
                break;

            case 'conte.total.inativos.adiantamento':
                return $this->countadiantamentos('inativo');
                break;

            default:
                break;
        }
    }

}
