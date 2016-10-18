<?php
header('Content-Type: text/html; charset=utf-8');

/* testando  a autenticação  do  usuario */
include_once '../../config/session.php';
include_once '../../Model/Cliente.php';


$cliente = new Cliente();

$linhas = $cliente->buscIdCliente($_GET['id']);

$vIdCliente = $linhas['idCliente'];
$vNome = $linhas['Nome'];
$vTelefone = $linhas['Telefone'];
$vEndereco = $linhas['Endereco'];
$vTipoPessoa = $linhas['TipoPessoa'];
$vCpf = $linhas['Cpf'];
$vCnpj = $linhas['Cnpj'];
$vCodMunicipal = $linhas['CodMunicipal'];
$vContato = $linhas['Contato'];
$vBairro = $linhas['Bairro'];
$vCep = $linhas['Cep'];
$vCidade = $linhas['Cidade'];
$vEstado = $linhas['Estado'];
$vNumero = $linhas['Numero'];
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SCA - Dados do cliente</title></head>
    <link rel="shortcut icon" href="../Front_end/favicon.ico">
    <?php include '../MasterPages/menu1.php'; ?>
    <div id="wrap">    
        <div class="container" style="width: 900px;">


            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading"><center><h4>Dados do Cliente</h4></center></div>

                <!-- Table -->

                <?php
                $Label = "";
                $vValue = "";
                if ($vTipoPessoa == '1') {
                    $Label = "CPF:";
                    $vValue = $vCpf;
                } else
                if ($vTipoPessoa == '2') {
                    $Label = "CNPJ:";
                    $vValue = $vCnpj;
                }
                ?>

                <table class=" table table-condensed">
                    <tr>
                        <td class="col-md-3"><b>Nome:</b></td><td class="col-md-3"><?php echo $vNome ?></td><td class="col-md-3"><b><?php echo $Label ?></b></td><td class="col-md-3">
                            <?php echo $vValue ?></td>
                    </tr>
                    <tr>
                        <td class="col-md-3"><b>Nome do contato:</b></td><td><?php echo $vContato ?></td><td class="col-md-3"><b>Telefone:</b></td><td><?php echo $vTelefone ?></td>
                    </tr>
                    <tr>
                        <td class="col-md-3"><b>Código municipal:</b></td><td><?php echo $vCodMunicipal ?></td><td class="col-md-3"><b></b></td><td></td>
                    </tr>
                </table> 
                <div class="panel-heading"><b>Endereço</b></div>
                <table class=" table table-condensed">
                    <tr>
                        <td class="col-md-3"><b>Endereço:</b></td><td class="col-md-3"><?php echo $vEndereco ?></td><td class="col-md-3"><b>Número:</b></td><td class="col-md-3"><?php echo $vNumero ?></td>
                    </tr>
                    <tr>
                        <td class="col-md-3"><b>Bairro:</b></td><td><?php echo $vBairro ?></td><td class="col-md-3"><b>Cidade:</b></td><td><?php echo $vCidade ?></td>
                    </tr>
                    <tr>
                        <td class="col-md-3"><b>CEP:</b></td><td><?php echo $vCep ?></td><td class="col-md-3"><b>UF:</b></td><td><?php echo $vEstado ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-2" style="margin-top: 10px; margin-left: 89%; margin-bottom: 20px;">

                <script>
                    function red()
                    {
                        javascript:history.go(-1);

                    }
                </script>
                <?php
                $pagina = $_GET['pagina'];
                if (isset($_GET['consulta'])) {
                    $pg = "onclick=\"window.location.href='../Consulta/pcliente.php';\"";
                } else if (isset($_GET['inativo'])) {
                    $pg = "onclick=\"window.location.href='../Cliente/listClientesInativos.php?pagina=$pagina';\"";
                } else
                    $pg = "onclick=\"window.location.href='../Cliente/listCliente.php?pagina=$pagina';\"";
                ?>
                <button class="btn btn-primary prefix_10" type="button" name="gravar" <?php echo $pg; ?> value="" ><span class="glyphicon glyphicon-arrow-left" style="margin-right: 5px;"></span>Voltar</button> </div>
        </div>
    </div> <!-- /container -->




    <!-- Inicio do rodapé -->
    <?php include '../MasterPages/footer.php'; ?>
    <!-- Final do rodapé -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../Front_end/bootstrap-3/assets/js/jquery.js"></script>
    <script src="../Front_end/bootstrap-3/dist/js/bootstrap.js"></script><div id="goog-gt-tt" class="goog-tooltip skiptranslate" dir="ltr" style="visibility: hidden; left: 632px; top: 218px; display: none;"><div style="padding: 8px;"><div><div class="logo"><img src="https://www.google.com/images/icons/product/translate-32.png" width="20" height="20"></div></div></div><div class="top" style="padding: 8px; float: left; width: 100%;"><h1 class="title gray">Texto original</h1></div><div class="middle" style="padding: 8px;"><div class="original-text">This example is a quick exercise to illustrate how the default, static and fixed to top navbar work.</div></div><div class="bottom" style="padding: 8px;"><div class="activity-links"><span class="activity-link">Sugira uma tradução melhor</span><span class="activity-link"></span></div><div class="started-activity-container"><hr style="color: #CCC; background-color: #CCC; height: 1px; border: none;"><div class="activity-root"></div></div></div><div class="status-message" style="display: none; opacity: 0;"></div></div>


</body></html>