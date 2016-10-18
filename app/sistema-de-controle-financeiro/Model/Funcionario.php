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

    public function insertFuncionario($Pfuncionario)
    {
        try {

            $sql = " INSERT INTO funcionario 
                  (Nome,CargoFunc,SalarioFunc,CpfFunc,PisFunc,DataNascFunc,
                   DataAdmFunc,EndFunc,TelFunc,CelFunc,NumeroFunc,RgFunc,
                   CtpsFunc,Serie,Uf,CepFunc,CidadeFunc,EstadoFunc,BairroFunc,Status)
                 VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,'Ativo')";

            $q = $this->prepare($sql);

            $q->bindParam(1, $Pfuncionario->nomeFunc);
            $q->bindParam(2, $Pfuncionario->cargoFunc);
            $q->bindParam(3, $Pfuncionario->salarioFunc);
            $q->bindParam(4, $Pfuncionario->cpfFunc);
            $q->bindParam(5, $Pfuncionario->pisFunc);
            $q->bindParam(6, $Pfuncionario->dataNascFunc);
            $q->bindParam(7, $Pfuncionario->dataAdmFunc);
            $q->bindParam(8, $Pfuncionario->endFunc);
            $q->bindParam(9, $Pfuncionario->telFunc);
            $q->bindparam(10, $Pfuncionario->celFunc);
            $q->bindParam(11, $Pfuncionario->numeroFunc);
            $q->bindParam(12, $Pfuncionario->rgFunc);
            $q->bindParam(13, $Pfuncionario->ctpsFunc);
            $q->bindParam(14, $Pfuncionario->serie);
            $q->bindParam(15, $Pfuncionario->ufCTPS);
            $q->bindParam(16, $Pfuncionario->cep);
            $q->bindParam(17, $Pfuncionario->cidade);
            $q->bindParam(18, $Pfuncionario->estado);
            $q->bindParam(19, $Pfuncionario->bairro);
            $q->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }

        return FALSE;
    }

    public function updateFuncionario($obj)
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

            $q->bindParam(1, $Pfuncionario->nomeFunc);
            $q->bindParam(2, $Pfuncionario->cargoFunc);
            $q->bindParam(3, $Pfuncionario->salarioFunc);
            $q->bindParam(4, $Pfuncionario->cpfFunc);
            $q->bindParam(5, $Pfuncionario->pisFunc);
            $q->bindParam(6, $Pfuncionario->dataNascFunc);
            $q->bindParam(7, $Pfuncionario->dataAdmFunc);
            $q->bindParam(8, $Pfuncionario->endFunc);
            $q->bindParam(9, $Pfuncionario->telFunc);
            $q->bindparam(10, $Pfuncionario->celFunc);
            $q->bindParam(11, $Pfuncionario->numeroFunc);
            $q->bindParam(12, $Pfuncionario->rgFunc);
            $q->bindParam(13, $Pfuncionario->ctpsFunc);
            $q->bindParam(14, $Pfuncionario->serie);
            $q->bindParam(15, $Pfuncionario->ufCTPS);
            $q->bindParam(16, $Pfuncionario->cep);
            $q->bindParam(17, $Pfuncionario->cidade);
            $q->bindParam(18, $Pfuncionario->estado);
            $q->bindParam(19, $Pfuncionario->bairro);
            $q->bindparam(20,$Pfuncionario->idFunc);
            $q->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->errorInfo();


            return false;
        }
    }

}
