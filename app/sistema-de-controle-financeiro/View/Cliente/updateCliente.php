<?php
header('Content-Type: text/html; charset=utf-8');

/* testando  a autenticação  do  usuario */
include '../../config/session.php';
include '../../includes.php';

$clienteController = new ClienteController();
$linhas = $clienteController->execulteAcao('buscar.cliente', $dto = null, $_GET['id']);


$id = $linhas['idCliente'];
$nome = $linhas['Nome'];
$telefone = $linhas['Telefone'];
$endereco = $linhas['Endereco'];
$tipoPessoa = $linhas['TipoPessoa'];
$cpf = $linhas['Cpf'];
$cnpj = $linhas['Cnpj'];
$codMunicipal = $linhas['CodMunicipal'];
$contato = $linhas['Contato'];
$bairro = $linhas['Bairro'];
$cep = $linhas['Cep'];
$cidade = $linhas['Cidade'];
$estado = $linhas['Estado'];
$numero = $linhas['Numero'];
?>

<html lang="en" class="translated-ltr"><head>
        <?php ini_set('default_charset', 'UTF-8'); ?>  

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../Front_end/bootstrap-3/assets/ico/favicon.png">
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <title>SCA - Atualizar dados do Cliente</title>
        <link rel="shortcut icon" href="../Front_end/favicon.ico">
        <!-- Importa o Bootstrap core CSS -->
        <link href="../Front_end/bootstrap-3/dist/css/bootstrap.css" rel="stylesheet">

        <!-- TODAS AS PÁGINAS QUE TIVEREM RODAPÉ E MENU SUPERIOR, TERÁ QUE TER ESSAS IMPORTAÇÕES. É UM CSS INDIVIDUAL. -->
        <link href="../Front_end/bootstrap-3/css_individuais/navbar-fixed-top.css" rel="stylesheet">
        <link href="../Front_end/bootstrap-3/css_individuais/sticky-footer-navbar.css" rel="stylesheet">



        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="../../assets/js/html5shiv.js"></script>
          <script src="../../assets/js/respond.min.js"></script>
        <![endif]-->
        <script src="../Front_end/js/jquery-1.8.0.min.js"></script> 
        <script src="../Front_end/js/jquery.maskedinput.js"></script>
        <link type="text/css" rel="stylesheet" charset="UTF-8" href="http://translate.googleapis.com/translate_static/css/translateelement.css"><script type="text/javascript" charset="UTF-8" src="http://translate.googleapis.com/translate_static/js/element/main_pt-BR.js"></script><script type="text/javascript" charset="UTF-8" src="http://translate.googleapis.com/translate_static/js/element/17/element_main.js"></script></head>

    <body >

        <?php include '../MasterPages/menu1.php'; ?>
        <!-- Final do menu:Fixed navbar -->
        <div id="wrap">    
            <div class="container" style="width: 900px;">

                <form role="form" class="form-horizontal" action="../../Submit/cliente.php" method="POST" >
                    <legend>
                        Atualizar dados do Cliente
                    </legend>

                    <div class="container" style="margin-left:30px; height:0 auto;">
                        <div class="form-group">

                            <div class="col-md-9">
                                <label for="txtNomCli">Nome </label>
                                <input type="text" value="<?php echo$linhas['Nome']; ?>"  class="form-control" placeholder="Nome Completo" name="txtNomCliente" id="NomCli" required/>
                            </div>


                            <div class="col-md-3">

                                <?php
                                if ($tipoPessoa == 1) {
                                    $checkCpf = "checked";
                                    $checkCnpj = "";
                                    $value = $cpf;
                                } else {
                                    $checkCpf = "";
                                    $checkCnpj = "checked";
                                    $value = $cnpj;
                                }
                                ?>  



                                <script>
                                    function typePessoa(op)
                                    {
                                        var mask_ = '';

                                        mask_ = (op == 1 ? '999.999.999-99' : '99.999.999/9999-99');

                                        $("#txtPessoa").val("")
                                        $("#txtPessoa").unmask();
                                        $("#txtPessoa").mask(mask_);

                                    }
                                </script>                          

                                <label for="txtCpfCnpjCli">CPF</label>
                                <?php echo"<input type='radio'value='1'  onclick='typePessoa(1);'  name='rdoPessoa'id='rdoPessoa' $checkCpf  /> ";
                                ?>

                                <label for="txtCpfCnpjCli">CNPJ</label>

                                <?php echo"<input type='radio'  onclick='typePessoa(2);'   value='2'  name='rdoPessoa'id='rdoPessoa'  $checkCnpj   /> ";
                                ?>

                                <?php echo"<input type='text' class='form-control'  name='txtPessoa' value='$value'id='txtPessoa'>"; ?>


                            </div> 

                            <div style="margin-top: 70px;">

                                <div class="col-md-3">
                                    <label for="txtContatoCli">Nome do contato</label>
                                    <input type='text'  class='form-control' placeholder='Nome do contato' name='txtNomeContato' id='txtContatoCli' value=<?php echo$contato; ?>>
                                </div>

                                <div class="col-md-3">
                                    <label for="txtTelCli">Telefone</label>
                                    <input type="text"   class="form-control"  name="txtTelCliente" id="txtTelCli" value="<?php echo $telefone; ?>">	
                                </div> 
                            </div> 


                            <div class="col-md-3">
                                <label for="txtCodMuni">Código municipal</label>
                                <input type="text" class="form-control"  placeholder="Código municipal" name="txtCodMunicipal" id="txtCodMuni" value="<?php echo$codMunicipal; ?>">
                            </div>


                        </div>
                    </div><!--/container dados do funcionário-->

                    <legend>
                        Endere&ccedil;o
                    </legend>

                    <div class="container" style="margin-left:30px; height:0 auto;">
                        <div class="form-group">

                            <div class="col-md-9">
                                <label for="txtEndCli">Endere&ccedil;o</label>
                                <input type="text"   class="form-control" placeholder="Endereço" name="txtEndCliente"  value="<?php echo$endereco; ?>" id="txtEndCli">
                            </div>

                            <div class="col-md-3">
                                <label for="txtNumEndCli">N&uacute;mero</label>
                                <input  type="text" class="form-control" placeholder="000" value="<?php echo$numero; ?>" name="txtNumEndCliente" id="txtNumEndCli">
                            </div> 

                            <div style="margin-top: 70px;">

                                <div class="col-md-3">
                                    <label for="txtEndBaiCli">Bairro</label>
                                    <input type="text"   class="form-control" placeholder="Bairro" value="<?php echo$bairro; ?>" name="txtBaiEndCliente" id="txtEndBaiCli">
                                </div> 

                                <div class="col-md-3">
                                    <label for="txtCidEndCli">Cidade</label>
                                    <input type="text"  class="form-control" placeholder="Cidade" value="<?php echo$cidade; ?>" name="txtCidEndCliente" id="txtCidEndCli">
                                </div> 
                                <div class="col-md-3">
                                    <label for="txtCepEndCli">CEP</label>
                                    <input type="text"  class="form-control" placeholder="xxxxxx-xxx" value="<?php echo$cep; ?>" name="txtCepEndCliente" id="txtCepEndCli" >
                                </div>
                                <div class="col-md-3">
                                    <label >UF</label>
                                    <select name="txtUfEndCliente" class="form-control">
                                        <option  selected="" value="<?php echo$estado; ?>"><?php echo$estado; ?></option>
                                        <option value="Acre">Acre</option>		
                                        <option  value="Alagoas">Alagoas</option>
                                        <option value="Amapá">Amapá</option>
                                        <option value="Amazonas">Amazonas</option>
                                        <option value="Bahia">Bahia</option>
                                        <option value="Ceará">Ceará</option>
                                        <option value="Distrito Federal">Distrito Federal</option>                                                           
                                        <option value="Espírito Santo">Espírito Santo</option>
                                        <option value="Goiás">Goiás</option>
                                        <option value="Maranhão">Maranhão</option>
                                        <option value="Mato Grosso">Mato Grosso</option>
                                        <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                                        <option value="Minas Gerais">Minas Gerais</option>
                                        <option value="Pará">Pará</option>
                                        <option value="Paraíba">Paraíba</option>
                                        <option value="Paraná">Paraná</option>
                                        <option value="Pernambuco">Pernambuco</option>
                                        <option value="Piauí">Piauí</option>
                                        <option value="Rio de Janeiro">Rio de Janeiro</option>
                                        <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                                        <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                                        <option value="Rondônia">Rondônia</option>
                                        <option value="Roraima">Roraima</option>
                                        <option value="Santa Catarina">Santa Catarina</option>
                                        <option value="São Paulo">São Paulo</option>
                                        <option value="Sergipe">Sergipe</option>
                                        <option value="Tocantins">Tocantins</option>
                                    </select>
                                </div>
                            </div>
                        </div> 
                    </div>  <!--/container endereço do Cliente-->

                    <?php if (isset($_GET['consulta'])) { ?> 
                        <input type="hidden" name="C_id"  value="<?php echo $id; ?>" />
                    <?php } ?>

                        <input type="hidden" name="id"  value="<?php echo $id; ?>" />
                   

                    <input type="hidden" name="pagina"  value="<?php echo $_GET['pagina']; ?>" />

                    <div class="form-group">
                        <div class="col-md-2" style="margin-top: 10px; margin-left: 87%; margin-bottom: 20px;">
                            <button class="btn btn-primary prefix_10"  name="edite_cliente"  type="submit">Gravar</button> </div></div>
                </form>	 
            </div> <!-- /container -->
        </div>
        <!-- Inicio do rodapé -->
        <?php include '../MasterPages/footer.php'; ?>
        <!-- Final do rodapé -->

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="../Front_end/bootstrap-3/assets/js/jquery.js"></script>
        <script src="../Front_end/bootstrap-3/dist/js/bootstrap.js"></script>
        <div id="goog-gt-tt" class="goog-tooltip skiptranslate" dir="ltr" style="visibility: hidden; left: 632px; top: 218px; display: none;"><div style="padding: 8px;"><div><div class="logo"><img src="https://www.google.com/images/icons/product/translate-32.png" width="20" height="20"></div></div></div><div class="top" style="padding: 8px; float: left; width: 100%;"><h1 class="title gray">Texto original</h1></div><div class="middle" style="padding: 8px;"><div class="original-text">This example is a quick exercise to illustrate how the default, static and fixed to top navbar work.</div></div><div class="bottom" style="padding: 8px;"><div class="activity-links"><span class="activity-link">Sugira uma tradução melhor</span><span class="activity-link"></span></div><div class="started-activity-container"><hr style="color: #CCC; background-color: #CCC; height: 1px; border: none;"><div class="activity-root"></div></div></div><div class="status-message" style="display: none; opacity: 0;"></div></div>
        <script src="../Front_end/js/jquery-1.8.0.min.js"></script> 
        <script src="../Front_end/js/jquery.maskedinput.js"></script>

        <script type="text/javascript">

                        jQuery(function ($) {

                           $("#txtTelCli").mask('(99)9999-9999');
                            $("#txtCepEndCli").mask("99999-999");


                        });
        </script>

    </body></html>
