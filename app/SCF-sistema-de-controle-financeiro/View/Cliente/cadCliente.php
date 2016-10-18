<?php
header('Content-Type: text/html; charset=utf-8');

/* testando  a autenticação  do  usuario */

include '../../config/session.php';
?>

<html lang="en" class="translated-ltr"><head>
        <?php ini_set('default_charset', 'UTF-8'); ?>  

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../Front_end/bootstrap-3/assets/ico/favicon.png">
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <title>SCA - Cadastro de Cliente</title>
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
        <script src="../Front_end/Toastr/jquery-1.9.1.min.js"></script>
        <link href="../Front_end/Toastr/toastr.min.css" rel="stylesheet"/>
        <script src="../Front_end/Toastr/toastr.min.js"></script>

        <script src="../Front_end/js/jquery-1.8.0.min.js"></script> 
        <script src="../Front_end/js/jquery.maskedinput.js"></script>
        <link type="text/css" rel="stylesheet" charset="UTF-8" href="http://translate.googleapis.com/translate_static/css/translateelement.css"><script type="text/javascript" charset="UTF-8" src="http://translate.googleapis.com/translate_static/js/element/main_pt-BR.js"></script><script type="text/javascript" charset="UTF-8" src="http://translate.googleapis.com/translate_static/js/element/17/element_main.js"></script></head>

    <body>
        <script type="text/javascript">
<?php if (isset($_GET['ok'])) { ?>
                toastr.success("Cliente cadastrado.", "Sucesso!"); //parametros: 1ºmensagem,2º titulo

<?php } ?>

        </script>

        <?php include '../MasterPages/menu1.php'; ?> 
        <!-- Final do menu:Fixed navbar -->
        <div id="wrap">    
            <div class="container" style="width: 900px;">
                <script type="text/javascript">

                    jQuery(function ($) {

                        $("#txtTelCli").mask("(99) 9999-9999");
                        $("#txtCepEndCli").mask("99999-999");


                    });
                </script>
                <form role="form" class="form-horizontal" action="../../Submit/cliente.php" method="post" >
                    <legend>
                        Cadastro Cliente
                    </legend>

                    <div class="container" style="margin-left:30px; height:0 auto;">
                        <div class="form-group">

                            <div class="col-md-9">
                                <label for="txtNomCli">Nome </label>
                                <input type="text" class="form-control" placeholder="Nome Completo" name="txtNomCliente" id="NomCli" required/>
                            </div>

                            <div class="col-md-3">

                                <script>
                                    function typePessoa(op)
                                    {
                                        var mask_ = '';

                                        mask_ = (op == 1 ? '999.999.999-99' : '99.999.999/9999-99');
                                        $("#txtPessoa").unmask();
                                        $("#txtPessoa").mask(mask_);

                                        document.getElementById('campo').style.display = 'block';

                                    }
                                </script>


                                <label for="txtCpfCnpjCli">CPF</label>
                                <input type="radio" value="1" name="rdoPessoa"  onclick="typePessoa(1);"id="rdoPessoa"/>   

                                <label for="txtCpfCnpjCli">CNPJ</label>
                                <input type="radio" value="2"name="rdoPessoa"id="rdoPessoa" onclick="typePessoa(2);"/>  

                                <div id="campo" style="display:none;">
                                    <input type="text" class="form-control"  name="txtPessoa" id="txtPessoa">
                                </div>

                            </div> 

                            <div style="margin-top: 70px;">

                                <div class="col-md-3">
                                    <label for="txtContatoCli">Nome do contato</label>
                                    <input type="text" class="form-control" placeholder="Nome do contato" name="txtNomeContato" id="txtContatoCli">
                                </div>

                                <div class="col-md-3">
                                    <label for="txtTelCli">Telefone</label>
                                    <input type="text" class="form-control" placeholder="Telefone" name="txtTelCliente" id="txtTelCli">	
                                </div> 
                            </div> 


                            <div class="col-md-3">
                                <label for="txtCodMuni">Código municipal</label>
                                <input type="text" class="form-control" placeholder="Código municipal" name="txtCodMunicipal" id="txtCodMuni">
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
                                <input type="text" class="form-control" placeholder="Endereço" name="txtEndCliente" id="txtEndCli">
                            </div>

                            <div class="col-md-3">
                                <label for="txtNumEndCli">N&uacute;mero</label>
                                <input type="text" class="form-control" placeholder="000" name="txtNumEndCliente" id="txtNumEndCli">
                            </div> 

                            <div style="margin-top: 70px;">

                                <div class="col-md-3">
                                    <label for="txtEndBaiCli">Bairro</label>
                                    <input type="text" class="form-control" placeholder="Bairro" name="txtBaiEndCliente" id="txtEndBaiCli">
                                </div> 

                                <div class="col-md-3">
                                    <label for="txtCidEndCli">Cidade</label>
                                    <input type="text" class="form-control" placeholder="Cidade" name="txtCidEndCliente" id="txtCidEndCli">
                                </div> 

                                <div class="col-md-3">
                                    <label for="txtCepEndCli">CEP</label>
                                    <input type="text" class="form-control" placeholder="xxxxxx-xxx" name="txtCepEndCliente" id="txtCepEndCli" >
                                </div>
                                <div class="col-md-3">
                                    <label >UF</label>
                                    <select name="txtUfEndCliente" class="form-control">
                                        <option value="">--</option>
                                        <option value="Acre">AC</option>		
                                        <option  value="Alagoas">AL</option>
                                        <option value="Amapá">AP</option>
                                        <option value="Amazonas">AM</option>
                                        <option value="Bahia">BA</option>
                                        <option value="Ceará">CE</option>
                                        <option value="Distrito Federal">DF</option>                                                           
                                        <option value="Espírito Santo">ES</option>
                                        <option value="Goiás">GO</option>
                                        <option value="Maranhão">MA</option>
                                        <option value="Mato Grosso">MT</option>
                                        <option value="Mato Grosso do Sul">MS</option>
                                        <option value="Minas Gerais">MG</option>
                                        <option value="Pará">PA</option>
                                        <option value="Paraíba">PB</option>
                                        <option value="Paraná">PR</option>
                                        <option value="Pernambuco">PE</option>
                                        <option value="Piauí">PI</option>
                                        <option value="Rio de Janeiro">RJ</option>
                                        <option value="Rio Grande do Norte">RN</option>
                                        <option value="Rio Grande do Sul">RS</option>
                                        <option value="Rondônia">RO</option>
                                        <option value="Roraima">RR</option>
                                        <option value="Santa Catarina">SC</option>
                                        <option value="São Paulo">SP</option>
                                        <option value="Sergipe">SE</option>
                                        <option value="Tocantins">TO</option>
                                    </select>
                                </div>
                            </div>
                        </div> 
                    </div>  <!--/container endereço do Cliente-->


                    <div class="form-group">
                        <div class="col-md-2" style="margin-top: 10px; margin-left: 85%; margin-bottom: 20px;">
                            <button class="btn btn-primary prefix_10"  name="salvar_cliente" type="submit">Confirmar</button> </div></div>
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
        <script src="../Front_end/bootstrap-3/dist/js/bootstrap.js"></script><div id="goog-gt-tt" class="goog-tooltip skiptranslate" dir="ltr" style="visibility: hidden; left: 632px; top: 218px; display: none;"><div style="padding: 8px;"><div><div class="logo"><img src="https://www.google.com/images/icons/product/translate-32.png" width="20" height="20"></div></div></div><div class="top" style="padding: 8px; float: left; width: 100%;"><h1 class="title gray">Texto original</h1></div><div class="middle" style="padding: 8px;"><div class="original-text">This example is a quick exercise to illustrate how the default, static and fixed to top navbar work.</div></div><div class="bottom" style="padding: 8px;"><div class="activity-links"><span class="activity-link">Sugira uma tradução melhor</span><span class="activity-link"></span></div><div class="started-activity-container"><hr style="color: #CCC; background-color: #CCC; height: 1px; border: none;"><div class="activity-root"></div></div></div><div class="status-message" style="display: none; opacity: 0;"></div></div>
        <script src="../Front_end/js/jquery-1.8.0.min.js"></script> 
        <script src="../Front_end/js/jquery.maskedinput.js"></script>

    </body></html>
