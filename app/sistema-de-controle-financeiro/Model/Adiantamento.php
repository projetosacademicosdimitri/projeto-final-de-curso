<?php

/**
 * Description of Adiantamento
 *
 * @author dimitri.miranda
 */
class Adiantamento
{

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

    public function insertAdiantamento($adiantamento)
    {
        try {

            $sql = "   INSERT INTO adiantamento(Nome,Telefone,Endereco,TipoPessoa,Cpf,Cnpj,CodMunicipal,Contato,Bairro,Cep,Cidade,Estado,Numero,Status) 
             VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,'Ativo');
        ";

            $q = $this->prepare($sql);
            $q->bindParam(1, $adiantamento->nome);
            $q->bindParam(2, $adiantamento->telefone);
            $q->bindParam(3, $adiantamento->endereco);
            $q->bindParam(4, $adiantamento->tipoPessoa);
            $q->bindParam(5, $adiantamento->cpf);
            $q->bindParam(6, $adiantamento->cnpj);
            $q->bindParam(7, $adiantamento->codMunicipal);
            $q->bindParam(8, $adiantamento->contato);
            $q->bindParam(9, $adiantamento->bairro);
            $q->bindparam(10, $adiantamento->cep);
            $q->bindparam(11, $adiantamento->cidade);
            $q->bindParam(12, $adiantamento->estado);
            $q->bindParam(13, $adiantamento->numero);
            $q->execute();
            return true;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

        return false;
    }

   
    public function buscIdAdiantamento($idadiantamento)
    {
        try {
            $sql = "SELECT * FROM adiantamento where idadiantamento= ?";
            $q = $this->prepare($sql);
            $q->bindParam(1, $idadiantamento);
            $q->execute();
        } catch (PDOException $e) {
            echo $e->errorInfo();
        }

        return $q->fetch(PDO::FETCH_ASSOC);
    }

    public function updateAdiantamento($adiantamento)
    {
        try {
            $sql = " UPDATE adiantamento  SET 
                                    Nome = ?,
                                    Telefone = ?,
                                    Endereco = ?,
                                    TipoPessoa = ?,
                                    Cpf = ?,
                                    Cnpj = ?,
                                    CodMunicipal = ?,
                                    Contato = ?,
                                    Bairro = ?,
                                    Cep = ?,
                                    Cidade = ?,
                                    Estado = ?,
                                    Numero  = ?
                     WHERE      idadiantamento = ? ;";

            $q = $this->prepare($sql);
            $q->bindParam(1, $adiantamento->nome);
            $q->bindParam(2, $adiantamento->telefone);
            $q->bindParam(3, $adiantamento->endereco);
            $q->bindParam(4, $adiantamento->tipoPessoa);
            $q->bindParam(5, $adiantamento->cpf);
            $q->bindParam(6, $adiantamento->cpf);
            $q->bindParam(7, $adiantamento->codMunicipal);
            $q->bindParam(8, $adiantamento->contato);
            $q->bindParam(9, $adiantamento->bairro);
            $q->bindparam(10, $adiantamento->cep);
            $q->bindparam(11, $adiantamento->cidade);
            $q->bindParam(12, $adiantamento->estado);
            $q->bindParam(13, $adiantamento->numero);
            $q->bindParam(14, $adiantamento->idadiantamento);

            $q->execute();

            return true;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return FALSE;
    }

    public function inativarAdiantamento($id)
    {
        try {
            $sql = " UPDATE adiantamento SET Status = 'Inativo' WHERE idadiantamento = ? ";
            $q = $this->prepare($sql);
            $q->bindParam(1, $id);
            $q->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->errorInfo();

            return FALSE;
        }
    }

    public function ativarAdiantamento($id)
    {
        try {
            $sql = " UPDATE adiantamento SET Status = 'Ativo' WHERE idadiantamento = ? ";
            $q = $this->prepare($sql);
            $q->bindParam(1, $id);
            $q->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->errorInfo();

            return FALSE;
        }
    }

    public function adiantamentosPaginacao($paginacao, $status)
    {

        $sql = " SELECT * FROM adiantamento WHERE UPPER(Status) = UPPER('$status') ORDER BY Nome ASC limit ? ,?";

        $stm = $this->prepare($sql);
        $stm->bindValue(1, (int) $paginacao->inicio, PDO::PARAM_INT);
        $stm->bindValue(2, (int) $paginacao->qtdPorPagina, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetchAll();
    }

    public function countAdiantamentos($status)
    {
        $sql = "SELECT count(*) as total FROM adiantamento WHERE UPPER(Status) = UPPER('$status') ";
        return $this->query($sql)->fetch(PDO::FETCH_OBJ);
    }

}
