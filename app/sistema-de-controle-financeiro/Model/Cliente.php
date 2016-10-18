<?php

/* Description of Cliente
  @author Dimitri Miranda
 */


include_once 'Database/Conexao.php';

class Cliente extends Conexao
{

    private $idCliente;
    private $nome;
    private $telefone;
    private $endereco;
    private $tipoPessoa;
    private $cpf;
    private $cnpj;
    private $codMunicipal;
    private $contato;
    private $bairro;
    private $cep;
    private $cidade;
    private $estado;
    private $numero;
    private $status;

    public function defineCliente($op, $pPessoa)
    {
        switch ($op) {
            case 1:
                $this->tipoPessoa = 1;
                $this->cpf = $pPessoa;
                $this->cnpj = " ";

                break;

            case 2:
                $this->tipoPessoa = 2;
                $this->cnpj = $pPessoa;
                $this->cpf = " ";
                break;
        }
    }

    /*     * ******* MÉTODOS MÁGICOS ******** */
    /*     * ******************************** */

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

    public function insertCliente($Pcliente)
    {
        try {

            $sql = "   INSERT INTO cliente(Nome,Telefone,Endereco,TipoPessoa,Cpf,Cnpj,CodMunicipal,Contato,Bairro,Cep,Cidade,Estado,Numero,Status) 
             VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,'Ativo');
        ";

            $q = $this->prepare($sql);
            $q->bindParam(1, $Pcliente->nome);
            $q->bindParam(2, $Pcliente->telefone);
            $q->bindParam(3, $Pcliente->endereco);
            $q->bindParam(4, $Pcliente->tipoPessoa);
            $q->bindParam(5, $Pcliente->cpf);
            $q->bindParam(6, $Pcliente->cnpj);
            $q->bindParam(7, $Pcliente->codMunicipal);
            $q->bindParam(8, $Pcliente->contato);
            $q->bindParam(9, $Pcliente->bairro);
            $q->bindparam(10,$Pcliente->cep);
            $q->bindparam(11,$Pcliente->cidade);
            $q->bindParam(12,$Pcliente->estado);
            $q->bindParam(13,$Pcliente->numero);
            $q->execute();
            return true;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

        return false;
    }

    public function listAllCliente()
    {
        $q = $this->query(" SELECT * FROM cliente ORDER BY Nome ASC");


        return $q->fetchAll(PDO::FETCH_OBJ);
    }

    public function listAllClienteAtivo()
    {
        $q = $this->query(" SELECT * FROM cliente WHERE Status = 'Ativo' ORDER BY Nome ASC ");


        return $q->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscIdCliente($idCliente)
    {
        try {
            $sql = "SELECT * FROM cliente where idCliente= ?";
            $q = $this->prepare($sql);
            $q->bindParam(1, $idCliente);
            $q->execute();
        } catch (PDOException $e) {
            echo $e->errorInfo();
        }

        return $q->fetch(PDO::FETCH_ASSOC);
    }

    public function updateCliente()
    {
        try {
            $sql = " UPDATE cliente  SET 
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
                     WHERE      idCliente = ? ;";

            $q = $this->prepare($sql);
            $q->bindParam(1, $this->nome);
            $q->bindParam(2, $this->telefone);
            $q->bindParam(3, $this->endereco);
            $q->bindParam(4, $this->tipoPessoa);
            $q->bindParam(5, $this->cpf);
            $q->bindParam(6, $this->cpf);
            $q->bindParam(7, $this->codMunicipal);
            $q->bindParam(8, $this->contato);
            $q->bindParam(9, $this->bairro);
            $q->bindparam(10, $this->cep);
            $q->bindparam(11, $this->cidade);
            $q->bindParam(12, $this->estado);
            $q->bindParam(13, $this->numero);
            $q->bindParam(14, $this->idCliente);

            $q->execute();

            return true;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return FALSE;
    }

    public function inativarCliente($id)
    {
        try {
            $sql = " UPDATE cliente SET Status = 'Inativo' WHERE idCliente = ? ";
            $q = $this->prepare($sql);
            $q->bindParam(1, $id);
            $q->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->errorInfo();

            return FALSE;
        }
    }

    public function ativarCliente($id)
    {
        try {
            $sql = " UPDATE cliente SET Status = 'Ativo' WHERE idCliente = ? ";
            $q = $this->prepare($sql);
            $q->bindParam(1, $id);
            $q->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->errorInfo();

            return FALSE;
        }
    }

}

?>
