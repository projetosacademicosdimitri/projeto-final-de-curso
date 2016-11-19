<?php

/**
 * Description of Fornecedor
 *
 * @author dimitri.miranda
 */
include_once 'Database/Conexao.php';

class Fornecedor extends Conexao
{

    private $id;
    private $nome;
    private $tel;
    private $nomeContato;
    private $status;

    public function insertFornecedor($fornecedor)
    {
        try {
            $sql = "INSERT INTO fornecedor (Nome,Telefone,Contato,Status) VALUES(?,?,?,'Ativo')";
            $q = $this->prepare($sql);
            $q->bindParam(1, $fornecedor->nome);
            $q->bindparam(2, $fornecedor->tel);
            $q->bindParam(3, $fornecedor->nomeContato);
            $q->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->errorInfo;
        }

        return FALSE;
    }

    public function buscaById($idFornecedor)
    {
        try {
            $sql = "SELECT * FROM fornecedor WHERE idFornecedor = ? ";
            $q = $this->prepare($sql);
            $q->bindParam(1, $idFornecedor);
            $q->execute();
        } catch (PDOException $e) {
            echo $e->errorInfo();
        }

        return $q->fetch(PDO::FETCH_ASSOC);
    }

    public function updateFornecedor($fornecedor)
    {

        try {
            $sql = "UPDATE fornecedor set 
                            Nome = ?,
                            Telefone = ?,
                            Contato = ?
                            WHERE idFornecedor = ?";
            
            $q = $this->prepare($sql);
            $q->bindParam(1, $fornecedor->nome);
            $q->bindparam(2, $fornecedor->tel);
            $q->bindParam(3, $fornecedor->nomeContato);
            $q->bindParam(4, $fornecedor->id);
            $q->execute();
            return TRUE;
        } catch (PDOException $e) {
            echo $e->errorInfo();
        }
    }

    public function fornecedoresPaginacao($paginacao, $status)
    {

        $sql = " SELECT * FROM fornecedor WHERE UPPER(Status) = UPPER('$status') ORDER BY Nome ASC limit ? ,?";
        
        $stm = $this->prepare($sql);
        $stm->bindValue(1, (int) $paginacao->inicio, PDO::PARAM_INT);
        $stm->bindValue(2, (int) $paginacao->qtdPorPagina, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetchAll();
    }

    public function countFornecedores($status)
    {
        $sql = "SELECT count(*) as total FROM fornecedor WHERE UPPER(Status) = UPPER('$status') ";
        return $this->query($sql)->fetch(PDO::FETCH_OBJ);
    }

    public function InativarFornecedor($idFornecedor)
    {
        try {
            $sql = " UPDATE fornecedor SET Status = 'Inativo' WHERE idFornecedor = ? ";
            $q = $this->prepare($sql);
            $q->bindParam(1, $idFornecedor);
            $q->execute();
            return true;
        } catch (PDOException $exc) {
            echo $exc->errorInfo();
        }

        return FALSE;
    }

    public function AtivarFornecedor($idFornecedor)
    {
        try {
            $sql = " UPDATE fornecedor SET Status = 'Ativo' WHERE idFornecedor = ? ";
            $q = $this->prepare($sql);
            $q->bindParam(1, $idFornecedor);
            $q->execute();
            return true;
        } catch (PDOException $exc) {
            echo $exc->errorInfo();
        }

        return FALSE;
    }

}
