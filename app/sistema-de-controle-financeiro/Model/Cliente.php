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

    public function insertCliente($cliente)
    {
        try {

            $sql = "   INSERT INTO cliente(Nome,Telefone,Endereco,TipoPessoa,Cpf,Cnpj,CodMunicipal,Contato,Bairro,Cep,Cidade,Estado,Numero,Status) 
             VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,'Ativo');
        ";

            $q = $this->prepare($sql);
            $q->bindParam(1, $cliente->nome);
            $q->bindParam(2, $cliente->telefone);
            $q->bindParam(3, $cliente->endereco);
            $q->bindParam(4, $cliente->tipoPessoa);
            $q->bindParam(5, $cliente->cpf);
            $q->bindParam(6, $cliente->cnpj);
            $q->bindParam(7, $cliente->codMunicipal);
            $q->bindParam(8, $cliente->contato);
            $q->bindParam(9, $cliente->bairro);
            $q->bindparam(10, $cliente->cep);
            $q->bindparam(11, $cliente->cidade);
            $q->bindParam(12, $cliente->estado);
            $q->bindParam(13, $cliente->numero);
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

    public function updateCliente($cliente)
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
            $q->bindParam(1, $cliente->nome);
            $q->bindParam(2, $cliente->telefone);
            $q->bindParam(3, $cliente->endereco);
            $q->bindParam(4, $cliente->tipoPessoa);
            $q->bindParam(5, $cliente->cpf);
            $q->bindParam(6, $cliente->cpf);
            $q->bindParam(7, $cliente->codMunicipal);
            $q->bindParam(8, $cliente->contato);
            $q->bindParam(9, $cliente->bairro);
            $q->bindparam(10, $cliente->cep);
            $q->bindparam(11, $cliente->cidade);
            $q->bindParam(12, $cliente->estado);
            $q->bindParam(13, $cliente->numero);
            $q->bindParam(14, $cliente->idCliente);

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

    public function clientesPaginacao($paginacao, $status)
    {

        $sql = " SELECT * FROM cliente WHERE UPPER(Status) = UPPER('$status') ORDER BY Nome ASC limit ? ,?";

        $stm = $this->prepare($sql);
        $stm->bindValue(1, (int) $paginacao->inicio, PDO::PARAM_INT);
        $stm->bindValue(2, (int) $paginacao->qtdPorPagina, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetchAll();
    }

    public function countClientes($status)
    {
        $sql = "SELECT count(*) as total FROM cliente WHERE UPPER(Status) = UPPER('$status') ";
        return $this->query($sql)->fetch(PDO::FETCH_OBJ);
    }

}

?>
