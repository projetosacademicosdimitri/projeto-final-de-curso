<?php

/* @author Dimitri Miranda
 * Essa classe  é responsável  por  
 * transações com a  base de dados 
 * 15/08/2013
 */

include_once 'Conexao.php';
ini_set('default_charset', 'UTF-8');

class CmdSql extends Conexao
{
    /* public function __insertFuncionario($o)
     * recebe um objFuncionario como parâmetro
     * o metodo tem  localmente uma Srting sql       
     * responsável  pelo insert. 
      utiliza  o procedimento de segurança  prepare do seu Avô PDO
      através do prepare  informamos que iremos passar
      variáveis,e setamos essas  variáveis  com o
      bindParam(); essas  variáveis  estão  sendo  chamadas
     * pelo  Obj -> " $o "
     * @author Dimitri  Miranda 16/08/2013
     */

    public function RecuperarSenha($param)
    {
        try {
            $sql = "SELECT Login,Senha,email FROM user where Login=? OR email=?";
            $q = $this->prepare($sql);
            $q->bindParam(1, $param);
            $q->bindParam(2, $param);
            $q->execute();
        } catch (PDOException $e) {
            echo $e->errorInfo();
        }
        /* retorna somente a primeira linha da consulta  utilizado o fetch()
         * pois  so possuimos um id por  entidade.
         */
        return $q->fetch(PDO::FETCH_ASSOC);
    }

    public function Idlogin($param)
    {
        try {
            $sql = "SELECT IdFunc,Login,Senha,email FROM user where Login=?";
            $q = $this->prepare($sql);
            $q->bindParam(1, $param);
            $q->execute();
        } catch (PDOException $e) {
            echo $e->errorInfo();
        }
        /* retorna somente a primeira linha da consulta  utilizado o fetch()
         * pois  so possuimos um id por  entidade.
         */
        return $q->fetch(PDO::FETCH_ASSOC);
    }

    public function __AlterarSenha($oUser)
    {
        try {
            $sql = "UPDATE user SET 
 Senha = ?
WHERE IdFunc = ?;
";
            $q = $this->prepare($sql);
            $q->bindParam(1, $oUser->getSenha());
            $q->bindParam(2, $oUser->getId());
            $q->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->errorInfo();

            return false;
        }
    }

    public function __insertFuncionario($o)
    {
        try {

            $sql = ("INSERT INTO funcionario 
 (Nome,CargoFunc,SalarioFunc,CpfFunc,PisFunc,DataNascFunc,
  DataAdmFunc,EndFunc,TelFunc,CelFunc,NumeroFunc,RgFunc,
  CtpsFunc,Serie,Uf,CepFunc,CidadeFunc,EstadoFunc,BairroFunc,Status)
  VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,'Ativo')
  ");

            $q = $this->prepare($sql);

            $q->bindParam(1, $o->__getNome());
            $q->bindParam(2, $o->__getCargoFunc());
            $q->bindParam(3, $o->__getSalarioFunc());
            $q->bindParam(4, $o->__getCpfFunc());
            $q->bindParam(5, $o->__getPisFunc());
            $q->bindParam(6, $o->__getDataNascFunc());
            $q->bindParam(7, $o->__getDataAdmFunc());
            $q->bindParam(8, $o->__getEndFunc());
            $q->bindParam(9, $o->__getTelFunc());
            $q->bindparam(10, $o->__getCelFunc());
            $q->bindParam(11, $o->__getNumeroEndFunc());
            $q->bindParam(12, $o->__getRgFunc());
            $q->bindParam(13, $o->__getCtpsFunc());
            $q->bindParam(14, $o->__getSerie());
            $q->bindParam(15, $o->__getUfCTPS());
            $q->bindParam(16, $o->__getCep());
            $q->bindParam(17, $o->__getCidade());
            $q->bindParam(18, $o->__getEstado());
            $q->bindParam(19, $o->__getBairro());
            $q->execute();


            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }

        return FALSE;
    }

////Fim insert funcionario




    /* __listAllNomes() lista  todos  os  Nomes ele é invocado nas paginas de visão */
    /* public function __listAllFunc($param)
      {
      $paginacao = array();
      $por_pagina = 10;
      $init = ( $param - 1) * $por_pagina;
      $q = $this->query("select * from funcionario limit $init, $por_pagina ;");
      $paginacao[0] = $q->fetchAll(PDO::FETCH_OBJ);
      $result_total = $this->query("SELECT count(*) as total FROM usuarios")->fetch(PDO::FETCH_OBJ);
      $num_paginas = ceil( $result_total->total / $por_pagina);
      $paginacao[1]= $num_paginas;

      return $paginacao;

      } */


    public function __nPaginas($nTable, $por_pagina)
    {
        $result_total = $this->query("SELECT count(*) as total FROM $nTable")->fetch(PDO::FETCH_OBJ);
        $num_paginas = ceil($result_total->total / $por_pagina);
        return $num_paginas;
    }

    public function __updateFunc($obj)
    {
        try {
            $sql = "UPDATE funcionario SET 
 Nome = ?,
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
            $q->bindParam(1, $obj->__getNome());
            $q->bindParam(2, $obj->__getCargoFunc());
            $q->bindParam(3, $obj->__getSalarioFunc());
            $q->bindParam(4, $obj->__getCpfFunc());
            $q->bindParam(5, $obj->__getPisFunc());
            $q->bindParam(6, $obj->__getDataNascFunc());
            $q->bindParam(7, $obj->__getDataAdmFunc());
            $q->bindParam(8, $obj->__getEndFunc());
            $q->bindParam(9, $obj->__getTelFunc());
            $q->bindparam(10, $obj->__getCelFunc());
            $q->bindParam(11, $obj->__getNumeroEndFunc());
            $q->bindParam(12, $obj->__getRgFunc());
            $q->bindParam(13, $obj->__getCtpsFunc());
            $q->bindParam(14, $obj->__getSerie());
            $q->bindParam(15, $obj->__getUfCTPS());
            $q->bindParam(16, $obj->__getCep());
            $q->bindParam(17, $obj->__getCidade());
            $q->bindParam(18, $obj->__getEstado());
            $q->bindParam(19, $obj->__getBairro());
            $q->bindparam(20, $obj->__getId());
            $q->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->errorInfo();


            return false;
        }
    }

    public function __listAllFuncionarioAtivo()
    {
        $q = $this->query(" SELECT * FROM funcionario WHERE Status = 'Ativo' ORDER BY Nome ASC; ");

        return $q->fetchAll(PDO::FETCH_OBJ);
    }

    public function __listAllFuncionario()
    {
        $q = $this->query(" SELECT * FROM funcionario ORDER BY Nome ASC ; ");

        return $q->fetchAll(PDO::FETCH_OBJ);
    }

    public function BuscaById($param)
    {
        try {
            $sql = "SELECT * FROM funcionario where idFunc=?";
            $q = $this->prepare($sql);
            $q->bindParam(1, $param);
            $q->execute();
        } catch (PDOException $e) {
            echo $e->errorInfo();
        }
        /* retorna somente a primeira linha da consulta  utilizado o fetch()
         * pois  so possuimos um id por  entidade.
         */
        return $q->fetch(PDO::FETCH_ASSOC);
    }

    public function __InativarFunc($id)
    {
        try {
            $sql = "UPDATE funcionario SET Status = 'Inativo' WHERE idFunc = ? ";
            $q = $this->prepare($sql);
            $q->bindParam(1, $id);
            $q->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->errorInfo();

            return FALSE;
        }
    }

    public function __AtivarFunc($id)
    {
        try {
            $sql = "UPDATE funcionario SET Status = 'Ativo' WHERE idFunc = ? ";
            $q = $this->prepare($sql);
            $q->bindParam(1, $id);
            $q->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->errorInfo();

            return FALSE;
        }
    }

//Fim de procedimentos  com  a entidade Funcionario ;







    public function __insertCliente($o)
    {
        try {
            $sql = "INSERT INTO cliente(Nome,Telefone,Endereco,TipoPessoa,
 Cpf,Cnpj,CodMunicipal,Contato,
 Bairro,Cep,Cidade,Estado,Numero,Status) 
 VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,'Ativo');";

            $q = $this->prepare($sql);
            $q->bindParam(1, $o->__getNome());
            $q->bindParam(2, $o->__getTelefone());
            $q->bindParam(3, $o->__getEnd());
            $q->bindParam(4, $o->__getTipoPessoa());
            $q->bindParam(5, $o->__getCpf());
            $q->bindParam(6, $o->__getCnpj());
            $q->bindParam(7, $o->__getCodMunicipal());
            $q->bindParam(8, $o->__getContato());
            $q->bindParam(9, $o->__getBairro());
            $q->bindparam(10, $o->__getCep());
            $q->bindparam(11, $o->__getCidade());
            $q->bindParam(12, $o->__getEstado());
            $q->bindParam(13, $o->__getNumero());
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

    public function __buscIdCliente($param)
    {
        try {
            $sql = "SELECT * FROM cliente where idCliente=?";
            $q = $this->prepare($sql);
            $q->bindParam(1, $param);
            $q->execute();
        } catch (PDOException $e) {
            echo $e->errorInfo();
        }
        /* retorna somente a primeira linha da consulta  utilizado o fetch()
         * pois  so possuimos um id por  entidade.
         */
        return $q->fetch(PDO::FETCH_ASSOC);
    }

    public function __updateCliente($o)
    {
        try {
            $sql = "UPDATE cliente SET 
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
    where idCliente = ?;";
            $q = $this->prepare($sql);
            $q->bindParam(1, $o->__getNome());
            $q->bindParam(2, $o->__getTelefone());
            $q->bindParam(3, $o->__getEnd());
            $q->bindParam(4, $o->__getTipoPessoa());
            $q->bindParam(5, $o->__getCpf());
            $q->bindParam(6, $o->__getCnpj());
            $q->bindParam(7, $o->__getCodMunicipal());
            $q->bindParam(8, $o->__getContato());
            $q->bindParam(9, $o->__getBairro());
            $q->bindparam(10, $o->__getCep());
            $q->bindparam(11, $o->__getCidade());
            $q->bindParam(12, $o->__getEstado());
            $q->bindParam(13, $o->__getNumero());
            $q->bindParam(14, $o->__getId());
            $q->execute();

            return true;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return FALSE;
    }

    public function __InativarCliente($id)
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

    public function __AtivarCliente($id)
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

//fim dos metodos  clientes 


    public function __insertFornecedor($obj)
    {
        try {
            $sql = "INSERT INTO fornecedor (Nome,Telefone,Contato,Status)
     VALUES(?,?,?,'Ativo')";
            $q = $this->prepare($sql);
            $q->bindParam(1, $obj->__getNome());
            $q->bindparam(2, $obj->__getTelefone());
            $q->bindParam(3, $obj->__getContato());
            $q->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->errorInfo;
        }

        return FALSE;
    }

    public function __buscIdFornecedor($id)
    {
        try {
            $sql = "SELECT * FROM fornecedor where idFornecedor =?";
            $q = $this->prepare($sql);
            $q->bindParam(1, $id);
            $q->execute();
        } catch (PDOException $e) {
            echo $e->errorInfo();
        }
        /* retorna somente a primeira linha da consulta  utilizado o fetch()
         * pois  so possuimos um id por  entidade.
         */
        return $q->fetch(PDO::FETCH_ASSOC);
    }

    public function __updateFornecedor($obj)
    {

        try {
            $sql = "UPDATE fornecedor set 
       Nome = ?,
       Telefone = ?,
       Contato = ?
       WHERE idFornecedor = ?
    ";
            $q = $this->prepare($sql);
            $q->bindParam(1, $obj->__getNome());
            $q->bindparam(2, $obj->__getTelefone());
            $q->bindParam(3, $obj->__getContato());
            $q->bindParam(4, $obj->__getId());
            $q->execute();
            return TRUE;
        } catch (PDOException $e) {
            echo $e->errorInfo();
        }
    }

    public function __listAllFornecedor()
    {
        $q = $this->query(" SELECT * FROM fornecedor WHERE Status = 'Ativo' ORDER BY Nome ASC;");


        return $q->fetchAll(PDO::FETCH_OBJ);
    }

    public function __listAllFornecedorAtivo()
    {
        $q = $this->query(" SELECT * FROM fornecedor WHERE Status = 'Ativo' ORDER BY Nome ASC;");


        return $q->fetchAll(PDO::FETCH_OBJ);
    }

    public function __InativarFornecedor($id)
    {
        try {
            $sql = " UPDATE fornecedor SET Status = 'Inativo' WHERE idFornecedor = ? ";
            $q = $this->prepare($sql);
            $q->bindParam(1, $id);
            $q->execute();
            return true;
        } catch (PDOException $exc) {
            echo $exc->errorInfo();
        }

        return FALSE;
    }

    public function __AtivarFornecedor($id)
    {
        try {
            $sql = " UPDATE fornecedor SET Status = 'Ativo' WHERE idFornecedor = ? ";
            $q = $this->prepare($sql);
            $q->bindParam(1, $id);
            $q->execute();
            return true;
        } catch (PDOException $exc) {
            echo $exc->errorInfo();
        }

        return FALSE;
    }

//fim  Fornecedor


    public function __insertCheque($obj)
    {
        $sql = "INSERT INTO cheque(Nome,Numero,DataEmisao,DataCompesacao,Tipo,ValorCheque)
           VALUES(?,?,?,?,?,?)";

        try {
            $q = $this->prepare($sql);
            $q->bindParam(1, $obj->__getNome());
            $q->bindParam(2, $obj->__getNumCheque());
            $q->bindParam(3, $obj->__getDataEntrada());
            $q->bindParam(4, $obj->__getDataCompens());
            $q->bindParam(5, $obj->__getChequeTp());
            $q->bindParam(6, $obj->__getValorCheque());
            $q->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->errorInfo();
        }
    }

    public function __buscIdCheque($id)
    {
        try {
            $sql = "SELECT * FROM cheque where idCheque =?";
            $q = $this->prepare($sql);
            $q->bindParam(1, $id);
            $q->execute();
        } catch (PDOException $e) {
            echo $e->errorInfo();
        }
        /* retorna somente a primeira linha da consulta  utilizado o fetch()
         * pois  so possuimos um id por  entidade.
         */
        return $q->fetch(PDO::FETCH_ASSOC);
    }

    public function __updateCheque($obj)
    {

        try {
            $sql = "UPDATE cheque set 
     Nome = ?,
     Numero = ?,
     DataEmisao =? ,
     DataCompesacao =? ,Tipo =?,
	 ValorCheque = ?
     where idCheque =?
    ";
            $q = $this->prepare($sql);
            $q->bindParam(1, $obj->__getNome());
            $q->bindParam(2, $obj->__getNumCheque());
            $q->bindParam(3, $obj->__getDataEntrada());
            $q->bindParam(4, $obj->__getDataCompens());
            $q->bindParam(5, $obj->__getChequeTp());
            $q->bindParam(6, $obj->__getValorCheque());
            $q->bindParam(7, $obj->__getId());
            $q->execute();
            return TRUE;
        } catch (PDOException $e) {
            echo $e->errorInfo();
        }
    }

    public function __deleteCheque($id)
    {
        try {
            $sql = "DELETE from cheque WHERE idCheque =? ";
            $q = $this->prepare($sql);
            $q->bindParam(1, $id);
            $q->execute();
            return true;
        } catch (PDOException $exc) {
            echo $exc->errorInfo();
        }

        return FALSE;
    }

    // ***********************************INSERT DE COMPRA***********
    public function __insertCompra($oComp)
    {
        $sql = "INSERT INTO compra
       (FornecedorId,
        DataCompra,
        Material, 
        Quantidade,
        ValorUnitario,
        ValorTotal
        )
       VALUES(?,?,?,?,?,?)";
        try {
            $q = $this->prepare($sql);
            $q->bindParam(1, $oComp->__getIdFonecedor());
            $q->bindParam(2, $oComp->__getDataCompra());
            $q->bindParam(3, $oComp->__getMaterialCompra());
            $q->bindParam(4, $oComp->__getQuantidadeCompra());
            $q->bindParam(5, $oComp->__getValorUnitarioCompra());
            $q->bindParam(6, $oComp->__getValorTotalCompra());
            $q->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();

            return FALSE;
        }
    }

    // ***********************************DELETE DE COMPRA***********
    public function __deleteCompra($id)
    {

        try {
            $sql = "DELETE from compra WHERE idCompra =? ";

            $q = $this->prepare($sql);
            $q->bindParam(1, $id);
            $q->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->errorInfo();
        }
    }

// ***********************************BUSCAR ID DE COMPRA***********


    public function BuscaIdCompra($param)
    {
        try {
            $sql = "
SELECT c.idCompra,c.Material, c.DataCompra, c.Quantidade,
c.ValorUnitario,c.ValorTotal,c.FornecedorId,f.Nome
FROM compra c
INNER JOIN fornecedor f ON c.FornecedorId = f.idFornecedor
WHERE idCompra = ? ";

            $q = $this->prepare($sql);
            $q->bindParam(1, $param);
            $q->execute();
        } catch (PDOException $exc) {
            echo $exc->errorInfo();
        }

        /* retorna somente a primeira linha da consulta  utilizado o fetch()
         * pois  so possuimos um id por  entidade.
         */

        return $q->fetch(PDO::FETCH_ASSOC);
    }

// ***********************************UPDATE DE COMPRA***********
    public function __updateCompra($oComp)
    {
        try {
            $sql = "UPDATE compra SET 
 FornecedorId = ?,
 Material = ?,
 DataCompra= ?,
 Quantidade= ?,
 ValorUnitario = ?,
 ValorTotal = ? 
WHERE idCompra = ?;
";
            $q = $this->prepare($sql);
            $q->bindParam(1, $oComp->__getIdFonecedor());
            $q->bindParam(2, $oComp->__getMaterialCompra());
            $q->bindParam(3, $oComp->__getDataCompra());
            $q->bindParam(4, $oComp->__getQuantidadeCompra());
            $q->bindParam(5, $oComp->__getValorUnitarioCompra());
            $q->bindParam(6, $oComp->__getValorTotalCompra());
            $q->bindparam(7, $oComp->__getIdCompra());
            $q->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->errorInfo();

            return false;
        }
    }

    //<------------------------------ FIM DO CMDSQL DE COMPRA ------------------------------------------->
    // ***********************************INSERT DE VENDA***********
    public function __insertVenda($oVenda)
    {
        $sql = "INSERT INTO venda
        (DataVenda,IdSaco,Quantidade,ValorUnitario,ValorTotal,ClienteId,Micragem)
         VALUES(?,?,?,?,?,?,?)";
        try {
            $q = $this->prepare($sql);

            ;
            $q->bindParam(1, $oVenda->__getDataVenda());
            $q->bindParam(2, $oVenda->__getIdSacoVenda());
            $q->bindParam(3, $oVenda->__getQuantVenda());
            $q->bindParam(4, $oVenda->__getValorUnitVenda());
            $q->bindParam(5, $oVenda->__getValorTotalVenda());
            $q->bindParam(6, $oVenda->__getIdCliente());
            $q->bindParam(7, $oVenda->__getMicragem());
            $q->execute();
            return true;
        } catch (PDOException $exc) {
            echo $exc->getMessage();

            return FALSE;
        }
    }

    //***********************************DELETE DE VENDA***********
    public function __deleteVenda($id)
    {

        try {
            $sql = "DELETE from venda WHERE idVenda =? ";

            $q = $this->prepare($sql);
            $q->bindParam(1, $id);
            $q->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->errorInfo();
        }
    }

    //***********************************BUSCAR ID DE VENDA***********




    public function BuscaIdVenda($param)
    {
        try {
            $sql = "
SELECT s.CorSaco, s.TamanhoSaco, v.idVenda, v.IdSaco, v.DataVenda, c.Nome, v.Quantidade, v.ValorUnitario, v.Micragem,v.ValorTotal,c.idCliente
FROM venda v
INNER JOIN cliente c ON v.ClienteId = c.idCliente INNER JOIN sacoplastico s
ON s.IdSaco = v.IdSaco WHERE v.idVenda = ? ";

            $q = $this->prepare($sql);
            $q->bindParam(1, $param);


            $q->execute();
        } catch (PDOException $e) {
            echo $e->errorInfo();
        }

        /* retorna somente a primeira linha da consulta  utilizado o fetch()
         * pois  so possuimos um id por  entidade. */

        return $q->fetch(PDO::FETCH_ASSOC);
    }

    //***********************************UPDATE DE VENDA***********

    public function __updateVenda($oVenda)
    {

        try {
            $sql = "UPDATE venda SET 
 IdSaco = ?,
 DataVenda= ?,
 Quantidade= ?,
 ValorUnitario = ?,
 ValorTotal = ?,
 ClienteId = ?,
 Micragem = ?
WHERE idVenda = ?;";

            $q = $this->prepare($sql);
            $q->bindParam(1, $oVenda->__getIdSacoVenda());
            $q->bindParam(2, $oVenda->__getDataVenda());
            $q->bindParam(3, $oVenda->__getQuantVenda());
            $q->bindParam(4, $oVenda->__getValorUnitVenda());
            $q->bindParam(5, $oVenda->__getValorTotalVenda());
            $q->bindParam(6, $oVenda->__getIdCliente());
            $q->bindParam(7, $oVenda->__getMicragem());
            $q->bindparam(8, $oVenda->__getIdVenda());

            $q->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->errorInfo();

            return false;
        }
    }

    //<---------------------------- FIM DO CDMSQL DE VENDA ---------------------------------------------> 
    // ***********************************INSERT DE DESPESA***********
    public function __insertDespesa($oDesp)
    {


        $sql = "INSERT INTO despesas
       (DataDespesa,
        Valor, 
        Descricao,
        Tipo
        )
         VALUES(?,?,?,?)";
        try {
            $q = $this->prepare($sql);


            $q->bindParam(1, $oDesp->__getDataDespesa());
            $q->bindParam(2, $oDesp->__getValorDespesa());
            $q->bindParam(3, $oDesp->__getDescricaoDespesa());
            $q->bindParam(4, $oDesp->__getTipoDespesa());
            $q->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();

            return FALSE;
        }
    }

    // ***********************************DELETE DE DESPESA***********
    public function __deleteDespesa($id)
    {

        try {
            $sql = "DELETE from despesas WHERE idDespesas =? ";

            $q = $this->prepare($sql);
            $q->bindParam(1, $id);
            $q->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->errorInfo();
        }
    }

// ***********************************BUSCAR ID DE DESPESA***********
    public function BuscaIdDespesa($param)
    {
        try {
            $sql = "SELECT * FROM despesas where idDespesas=?";
            $q = $this->prepare($sql);
            $q->bindParam(1, $param);
            $q->execute();
        } catch (PDOException $exc) {
            echo $exc->errorInfo();
        }
        /* retorna somente a primeira linha da consulta  utilizado o fetch()
         * pois  so possuimos um id por  entidade.
         */
        return $q->fetch(PDO::FETCH_ASSOC);
    }

// ***********************************UPDATE DE DESPESA***********
    public function __updateDespesa($oDesp)
    {
        try {
            /* $sql=
              "UPDATE despesas SET
              Descricao = ?,
              DataDespesa = ?,
              Valor = ?,
              Tipo = ?
              WHERE idDespesas = ?;
              "; */
            $sql = "UPDATE despesas SET
 DataDespesa = ?,
 Valor = ?,
 Descricao = ?,
 Tipo = ?
 WHERE idDespesas = ? ;
  ";

            $q = $this->prepare($sql);
            $q->bindParam(1, $oDesp->__getDataDespesa());
            $q->bindParam(2, $oDesp->__getValorDespesa());
            $q->bindParam(3, $oDesp->__getDescricaoDespesa());
            $q->bindParam(4, $oDesp->__getTipoDespesa());
            $q->bindparam(5, $oDesp->__getIdDespesa());
            $q->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->errorInfo;
        }
        return false;
    }

    //<------------------------------ FIM DO CMDSQL DE DESPESA ------------------------------------------->
    //<------------------------------ INICIO DO CMDSQL DE SACO PLASTICO ------------------------------------------->
    //
  // ***********************************INSERT DE SACO PLASTICO***********

    public function __insertSacoPlastico($oSaco)
    {
        $sql = "INSERT INTO sacoplastico
        (CorSaco,TamanhoSaco,Status)
         VALUES(?,?,'Ativo')";
        try {
            $q = $this->prepare($sql);


            $q->bindParam(1, $oSaco->__getCorSaco());
            $q->bindParam(2, $oSaco->__getTamanhoSaco());

            $q->execute();
            return true;
        } catch (PDOException $exc) {
            echo $exc->getMessage();

            return FALSE;
        }
    }

    // ***********************************UPDATE DE SACO PLASTICO***********
    public function __updateSacoPlastico($oSaco)
    {
        try {
            $sql = "UPDATE sacoplastico SET 
 CorSaco = ?,
 TamanhoSaco = ?
WHERE IdSaco = ?;
";
            $q = $this->prepare($sql);
            $q->bindParam(1, $oSaco->__getCorSaco());
            $q->bindParam(2, $oSaco->__getTamanhoSaco());
            $q->bindparam(3, $oSaco->__getIdSacoPlastico());
            $q->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->errorInfo();

            return false;
        }
    }

    //***********************************INATIVAR E ATIVAR DE SACO***********
    public function __InativarSacoPlastico($id)
    {

        try {
            $sql = "UPDATE sacoplastico SET Status = 'Inativo' WHERE IdSaco = ? ";

            $q = $this->prepare($sql);
            $q->bindParam(1, $id);
            $q->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->errorInfo();
        }
    }

    public function __AtivarSacoPlastico($id)
    {

        try {
            $sql = "UPDATE sacoplastico SET Status = 'Ativo' WHERE IdSaco = ? ";

            $q = $this->prepare($sql);
            $q->bindParam(1, $id);
            $q->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->errorInfo();
        }
    }

    //***********************************BUSCAR ID DE SACO***********
    public function BuscaIdSacoPlastico($param)
    {
        try {
            $sql = "SELECT * FROM sacoplastico where IdSaco=?";
            $q = $this->prepare($sql);
            $q->bindParam(1, $param);
            $q->execute();
        } catch (PDOException $exc) {
            echo $exc->errorInfo();
        }
        /* retorna somente a primeira linha da consulta  utilizado o fetch()
         * pois  so possuimos um id por  entidade.
         */
        return $q->fetch(PDO::FETCH_ASSOC);
    }

    //***********************************LIST ALL SACO***********
    public function listAllSaco()
    {
        $q = $this->query(" SELECT * FROM sacoplastico WHERE Status = 'Ativo' ORDER BY CorSaco ASC,  TamanhoSaco ASC ");


        return $q->fetchAll(PDO::FETCH_OBJ);
    }

    //<------------------------------ FIM DO CMDSQL DE SACO PLASTICO ------------------------------------------->
    // ***********************************INSERT DE SACO P***********

    public function __insertPagamento($oPaga)
    {
        $sql = "INSERT INTO pagamento
        (HoraExtra,Descontos,DataPgmto,ValorLiquido,Adiantamento,ValorTotal,idFunc,SalarioBase)
         VALUES(?,?,?,?,?,?,?,?)";
        try {
            $q = $this->prepare($sql);



            $q->bindParam(1, $oPaga->__getHoraExtra());
            $q->bindParam(2, $oPaga->__getDescontos());
            $q->bindParam(3, $oPaga->__getDataPagamento());
            $q->bindParam(4, $oPaga->__getValorLiquido());
            $q->bindParam(5, $oPaga->__getAdiantamento());
            $q->bindParam(6, $oPaga->__getValorTotalPgmto());
            $q->bindParam(7, $oPaga->__getIdfunc());
            $q->bindParam(8, $oPaga->__getSalarioBase());




            $q->execute();
            return true;
        } catch (PDOException $exc) {
            echo $exc->getMessage();

            return FALSE;
        }
    }

    //******************************Update Pagamento**********************

    public function __updatePagamento($oPaga)
    {


        try {
            $sql = "UPDATE pagamento SET 
 HoraExtra = ?,
 Descontos = ?,
 DataPgmto = ?,
 ValorLiquido = ?,
 Adiantamento = ?,
 ValorTotal = ?,
 idFunc = ?,
 SalarioBase = ?
 WHERE idPgmto = ?;
";

            $q = $this->prepare($sql);
            $q->bindParam(1, $oPaga->__getHoraExtra());
            $q->bindParam(2, $oPaga->__getDescontos());
            $q->bindParam(3, $oPaga->__getDataPagamento());
            $q->bindParam(4, $oPaga->__getValorLiquido());
            $q->bindParam(5, $oPaga->__getAdiantamento());
            $q->bindParam(6, $oPaga->__getValorTotalPgmto());
            $q->bindParam(7, $oPaga->__getIdfunc());
            $q->bindParam(8, $oPaga->__getSalarioBase());
            $q->bindParam(9, $oPaga->__getIdPagamento());

            $q->execute();


            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->errorInfo();

            return false;
        }
    }

    //***********************************DELETE DE PAGAMENTO***********
    public function __deletePagamento($id)
    {

        try {
            $sql = "DELETE from pagamento WHERE idPgmto =? ";

            $q = $this->prepare($sql);
            $q->bindParam(1, $id);
            $q->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->errorInfo();
        }
    }

    //***********************************BUSCAR ID DE PAGAMENTO***********
    public function BuscaIdPagamento($param)
    {
        try {
            $sql = "SELECT * FROM pagamento p INNER JOIN funcionario f ON p.idFunc = f.idFunc where idPgmto=?";
            $q = $this->prepare($sql);
            $q->bindParam(1, $param);
            $q->execute();
        } catch (PDOException $exc) {
            echo $exc->errorInfo();
        }
        /* retorna somente a primeira linha da consulta  utilizado o fetch()
         * pois  so possuimos um id por  entidade.
         */
        return $q->fetch(PDO::FETCH_ASSOC);
    }

    public function listAllPagamento()
    {
        $q = $this->query(" SELECT * FROM pagamento p INNER JOIN funcionario f ON p.idFunc = f.idFunc");


        return $q->fetchAll(PDO::FETCH_OBJ);
    }

    //######################FIM DO PAGAMENTO#################################
    //
 // 
    //   //***********************************INICIO DO ADIANTAMENTO***********


    public function __insertAdiantamento($oAdianta)
    {
        $sql = "INSERT INTO adiantamento
        (DataAdiantamento,ValorAdiantamento,IdFunc)
         VALUES(?,?,?)";
        try {
            $q = $this->prepare($sql);

            $q->bindParam(1, $oAdianta->__getDataAdiantamento());
            $q->bindParam(2, $oAdianta->__getValorAdiantamento());
            $q->bindParam(3, $oAdianta->__getIdFunc());


            $q->execute();
            return true;
        } catch (PDOException $exc) {
            echo $exc->getMessage();

            return FALSE;
        }
    }

    //**********************UPDATE ADIANTAMENTO****************************
    public function __updateAdiantamento($oAdianta)
    {


        try {
            $sql = "UPDATE adiantamento SET 
 DataAdiantamento = ?,
 ValorAdiantamento = ?,
 IdFunc = ?
 WHERE IdAdiantamento = ?;
";

            $q = $this->prepare($sql);

            $q->bindParam(1, $oAdianta->__getDataAdiantamento());
            $q->bindParam(2, $oAdianta->__getValorAdiantamento());
            $q->bindParam(3, $oAdianta->__getIdFunc());
            $q->bindParam(4, $oAdianta->__getIdAdiantamento());

            $q->execute();


            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->errorInfo();

            return false;
        }
    }

    //***********************************DELETE DE Adiantamento***********
    public function __deleteAdiantamento($id)
    {

        try {
            $sql = "DELETE from adiantamento WHERE IdAdiantamento =? ";

            $q = $this->prepare($sql);
            $q->bindParam(1, $id);
            $q->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->errorInfo();
        }
    }

    //***********************************BUSCAR ID DE ADIANTAMENTO***********
    public function BuscaIdAdiantamento($param)
    {
        try {
            $sql = "SELECT * FROM adiantamento a INNER JOIN funcionario f ON a.IdFunc = f.idFunc where a.IdAdiantamento=?";
            $q = $this->prepare($sql);
            $q->bindParam(1, $param);
            $q->execute();
        } catch (PDOException $exc) {
            echo $exc->errorInfo();
        }
        /* retorna somente a primeira linha da consulta  utilizado o fetch()
         * pois  so possuimos um id por  entidade.
         */
        return $q->fetch(PDO::FETCH_ASSOC);
    }

    public function listAllAdiantamento()
    {
        $q = $this->query(" SELECT * FROM adiantamento a INNER JOIN funcionario f ON a.IdFunc = f.idFunc");


        return $q->fetchAll(PDO::FETCH_OBJ);
    }

}

//Fim  Classe.
?>
