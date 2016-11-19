<?php

/**
 * Description of Funcionario
 *
 * @author dimitri.miranda
 */
include_once 'Database/Conexao.php';

class Funcionario extends Conexao
{

    private $idFunc;
    private $nomeFunc;
    private $cargoFunc;
    private $salarioFunc;
    private $cpfFunc;
    private $pisFunc;
    private $dataNascFunc;
    private $dataAdmFunc;
    private $endFunc;
    private $telFunc;
    private $celFunc;
    private $numeroFunc;
    private $rgFunc;
    private $ctpsFunc;
    private $serie;
    private $ufCTPS;
    private $cep;
    private $cidade;
    private $estado;
    private $bairro;
    private $status;

    /*     * ************** MÉTODOS MÁGICOS ******** */
    /*     * **************************************** */

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

    public function insertFuncionario($funcionario)
    {
        try {

            $sql = " INSERT INTO funcionario 
                  (Nome,CargoFunc,SalarioFunc,CpfFunc,PisFunc,DataNascFunc,
                   DataAdmFunc,EndFunc,TelFunc,CelFunc,NumeroFunc,RgFunc,
                   CtpsFunc,Serie,Uf,CepFunc,CidadeFunc,EstadoFunc,BairroFunc,Status)
                 VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,'Ativo')";

            $q = $this->prepare($sql);

            $q->bindParam(1, $funcionario->nomeFunc);
            $q->bindParam(2, $funcionario->cargoFunc);
            $q->bindParam(3, $funcionario->salarioFunc);
            $q->bindParam(4, $funcionario->cpfFunc);
            $q->bindParam(5, $funcionario->pisFunc);
            $q->bindParam(6, $funcionario->dataNascFunc);
            $q->bindParam(7, $funcionario->dataAdmFunc);
            $q->bindParam(8, $funcionario->endFunc);
            $q->bindParam(9, $funcionario->telFunc);
            $q->bindparam(10, $funcionario->celFunc);
            $q->bindParam(11, $funcionario->numeroFunc);
            $q->bindParam(12, $funcionario->rgFunc);
            $q->bindParam(13, $funcionario->ctpsFunc);
            $q->bindParam(14, $funcionario->serie);
            $q->bindParam(15, $funcionario->ufCTPS);
            $q->bindParam(16, $funcionario->cep);
            $q->bindParam(17, $funcionario->cidade);
            $q->bindParam(18, $funcionario->estado);
            $q->bindParam(19, $funcionario->bairro);
            $q->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }

        return FALSE;
    }

    public function updateFuncionario($funcionario)
    {
        try {
            $sql = "UPDATE  funcionario
                    SET     Nome = ?,
                            CargoFunc= ?,
                            SalarioFunc= ?,
                            CpfFunc = ?,
                            PisFunc = ?,
                            DataNascFunc= ?,
                            DataAdmFunc = ?,
                            EndFunc = ?,
                            TelFunc = ?,
                            CelFunc = ?,
                            NumeroFunc = ?,
                            RgFunc = ?,
                            CtpsFunc = ?,
                            Serie = ?,
                            Uf = ?,
                            CepFunc = ?,
                            CidadeFunc = ?,
                            EstadoFunc = ?,
                            BairroFunc = ?
                    WHERE idFunc = ?;
                  ";
            $q = $this->prepare($sql);

            $q->bindParam(1, $funcionario->nomeFunc);
            $q->bindParam(2, $funcionario->cargoFunc);
            $q->bindParam(3, $funcionario->salarioFunc);
            $q->bindParam(4, $funcionario->cpfFunc);
            $q->bindParam(5, $funcionario->pisFunc);
            $q->bindParam(6, $funcionario->dataNascFunc);
            $q->bindParam(7, $funcionario->dataAdmFunc);
            $q->bindParam(8, $funcionario->endFunc);
            $q->bindParam(9, $funcionario->telFunc);
            $q->bindparam(10, $funcionario->celFunc);
            $q->bindParam(11, $funcionario->numeroFunc);
            $q->bindParam(12, $funcionario->rgFunc);
            $q->bindParam(13, $funcionario->ctpsFunc);
            $q->bindParam(14, $funcionario->serie);
            $q->bindParam(15, $funcionario->ufCTPS);
            $q->bindParam(16, $funcionario->cep);
            $q->bindParam(17, $funcionario->cidade);
            $q->bindParam(18, $funcionario->estado);
            $q->bindParam(19, $funcionario->bairro);
            $q->bindparam(20, $funcionario->idFunc);
            //$q->execute();
            return $q->execute();
        } catch (PDOException $exc) {
            echo $exc->errorInfo();
            return false;
        }
    }

    public function listAllFuncionarioAtivo()
    {
        $q = $this->query(" SELECT * FROM funcionario WHERE Status = 'Ativo' ORDER BY Nome ASC; ");
        return $q->fetchAll(PDO::FETCH_OBJ);
    }

    public function listAllFuncionario()
    {
        $q = $this->query(" SELECT * FROM funcionario ORDER BY Nome ASC ; ");
        return $q->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscaById($idFuncionario)
    {
        try {
            $sql = "SELECT * FROM funcionario where idFunc = ?";
            $q = $this->prepare($sql);
            $q->bindParam(1, $idFuncionario);
            $q->execute();
        } catch (PDOException $e) {
            echo $e->errorInfo();
        }
        return $q->fetch(PDO::FETCH_ASSOC);
    }

    public function inativarFuncionario($idFuncionario)
    {
        try {
            $sql = "UPDATE funcionario SET Status = 'Inativo' WHERE idFunc = ? ";
            $q = $this->prepare($sql);
            $q->bindParam(1, $id);
            $q->execute();
            return true;
        } catch (PDOException $exc) {
            echo $exc->errorInfo();

            return false;
        }
    }

    public function ativarFuncionario($idFuncionario)
    {
        try {
            $sql = "UPDATE funcionario SET Status = 'Ativo' WHERE idFunc = ? ";
            $q = $this->prepare($sql);
            $q->bindParam(1, $id);
            $q->execute();
            return true;
        } catch (PDOException $exc) {
            echo $exc->errorInfo();

            return false;
        }
    }

    public function funcionariosPaginacao($paginacao, $status)
    {

        $sql = " SELECT * FROM funcionario WHERE UPPER(Status) = UPPER('$status') ORDER BY Nome ASC limit ?,? ";
        $stm = $this->prepare($sql);
        $stm->bindValue(1, (int) $paginacao->inicio, PDO::PARAM_INT);
        $stm->bindValue(2, (int) $paginacao->qtdPorPagina, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetchAll();
    }

    public function countFuncionarios($status)
    {
        $sql = "SELECT count(*) as total FROM funcionario WHERE UPPER(Status) = UPPER('$status') ";
        return $this->query($sql)->fetch(PDO::FETCH_OBJ);
    }

}
