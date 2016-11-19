<?php include '../../config/session.php'; ?>
<html lang="en" class="translated-ltr"><head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="./bootstrap-3/assets/ico/favicon.png">

        <title>SCA - Cadastro de Funcionário</title>
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

    <body>

        <?php include '../MasterPages/menu1.php'; ?>
        <!-- Final do menu:Fixed navbar -->

        <script type="text/javascript">
<?php if (isset($_GET['ok'])) { ?>

                $options = {
                    "closeButton": false,
                    "debug": false,
                    "positionClass": "toast-top-right",
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };

                toastr.success("Funcionário cadastrado.", "Sucesso!", $options); //parametros: 1ºmensagem,2º titulo,3º(opcional) as opções do alerta
                //toastr.error('I do not think that word means what you think it means.', 'Inconceivable!');
<?php } ?>

        </script>

        <div id="wrap">    
            <div class="container" style="width: 900px;">
                <script type="text/javascript">



                    jQuery(function ($) {

                        $("#txtTelF").mask("(99) 9999-9999");
                        $("#txtCelF").mask("(99) 9999-9999");
                        $("#txtRgF").mask("99999999-99");
                        $("#txtCpfF").mask("999.999.999.99");
                        $("#txtCepF").mask("99999-999");
                        $("#txtPISF").mask("999.99999.99-9");
                        $("#txtNSCF").mask("999-9");

                    });
                </script>
                <!-- A partir desse ponto ficará o conteudo da página -->


                <form role="form" class="form-horizontal" action="../../Submit/funcionario.php" method="POST" >
                    <legend>
                        Cadastro Funcion&aacute;rio
                    </legend>

                    <div class="container" style="margin-left:30px; height:0 auto;">
                        <div class="form-group">

                            <div class="col-md-6">
                                <label for="txtNomF">Nome </label>
                                <input type="text" class="form-control" placeholder="Nome Completo" name="txtNomFunc" id="txtNomF" required/>
                            </div>

                            <div class="col-md-3">
                                <label for="txtCpfF">CPF</label>
                                <input type="text" class="form-control"  placeholder="CPF" name="txtCpfFunc" id="txtCpfF" required>
                            </div> 

                            <div class="col-md-3">
                                <label for="txtRgF">RG</label>
                                <input type="text" class="form-control" placeholder="RG" name="txtRgFunc" id="txtRgF" required>
                            </div> 

                            <div style="margin-top: 70px;">

                                <div class="col-md-3">
                                    <label for="DateNascF">Data de Nascimento</label>
                                    <input type="date" class="form-control" name="txtDnascFunc" id="DateNascF">
                                </div>

                                <div class="col-md-3">
                                    <label for="txtTelF">Fone</label>
                                    <input type="text" class="form-control" placeholder="Telefone" name="txtTelFunc" id="txtTelF">	
                                </div> 

                                <div class="col-md-3">
                                    <label for="txtCelF">Celular</label>
                                    <input type="text" class="form-control" placeholder="Celular" name="txtCelFunc" id="txtCelF">
                                </div>

                                <div class="col-md-3">
                                    <label for="txtCargoF">Cargo</label>
                                    <input type="text" class="form-control" placeholder="Cargo" name="txtCargoFunc" id="txtCargoF">
                                </div>
                            </div>
                        </div>
                    </div><!--/container dados do funcionário-->

                    <legend>
                        Endere&ccedil;o
                    </legend>

                    <div class="container" style="margin-left:30px; height:0 auto;">
                        <div class="form-group">

                            <div class="col-md-9">
                                <label for="txtEnd">Endere&ccedil;o</label>
                                <input type="text" class="form-control" placeholder="Endereço" name="txtEndFunc" id="txtEndF">
                            </div>

                            <div class="col-md-3">
                                <label for="txtNumF">N&uacute;mero</label>
                                <input type="text" class="form-control" placeholder="000" name="txtNumFunc" id="txtNumF">
                            </div> 

                            <div style="margin-top: 70px;">

                                <div class="col-md-3">
                                    <label for="txtBaiF">Bairro</label>
                                    <input type="text" class="form-control" placeholder="Bairro" name="txtBaiFunc" id="txtBaiF">
                                </div> 

                                <div class="col-md-3">
                                    <label for="txtCidF">Cidade</label>
                                    <input type="text" class="form-control" placeholder="Cidade" name="txtCidFunc" id="tstCidF">
                                </div> 
                            </div> 

                            <div class="col-md-3">
                                <label for="txtCep">CEP</label>
                                <input type="text" class="form-control" placeholder="xxxxxx-xxx" name="txtCepFunc" id="txtCepF">
                            </div>


                            <div class="col-md-3">
                                <label>UF</label>
                                <select name="txtUfFunc" class="form-control">
                                    <option value="0">--</option>
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
                    </div><!--/container endereço do funcionário-->
                    <legend>
                        Carteira de Trabalho
                    </legend>

                    <div class="container" style="margin-left:30px; height:0 auto;">
                        <div class="form-group">

                            <div class="col-md-3">
                                <label for="txtDaaF">Data de Admiss&atilde;o</label>
                                <input type="date" class="form-control" name="txtDaa" id="txtDaaF">
                            </div>

                            <div class="col-md-6">
                                <label for="txtNCTF">N&uacute;mero Carteira de Trabalho</label>
                                <input type="text" class="form-control" placeholder="Numero" name="txtNCT" id="txtNCTF" >
                            </div>

                            <div class="col-md-3">
                                <label for="txtNSCF">N&uacute;mero S&eacute;rie</label>
                                <input type="text" class="form-control" placeholder="N° Serie" name="txtNSC" id="txtNSCF" >
                            </div> 

                            <div style="margin-top: 70px;" >

                                <div class="col-md-3">
                                    <label for="txtPISF">PIS</label>
                                    <input type="text" class="form-control" placeholder="PIS" name="txtPIS" id="txtPISF" >
                                </div>

                                <div class="col-md-3">
                                    <label >UF</label>
                                    <select name="txtUfCTPS" class="form-control">
                                        <option value="0">--</option>
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



                                <div class="col-md-3">
                                    <label for="txtSalF">Sal&aacute;rio</label>
                                    <input type="text" class="form-control" placeholder="Salario"    onKeyUp="moeda(this)"   name="txtSal" id="txtSalF">	
                                </div>

                            </div> 
                        </div>
                    </div><!--/container Carteira de trabalho do funcionário-->



                    <div class="form-group">
                        <div class="col-md-2" style="margin-top: 10px; margin-left: 85%; margin-bottom: 20px;">
                            <button class="btn btn-primary prefix_10" type="submit" name="salvar_funcionario" value="" >Cadastrar</button> </div></div>

                </form>	 




                <script>

                    function moeda(z) {
                        v = z.value;
                        v = v.replace(/\D/g, "")  //permite digitar apenas números
                        v = v.replace(/[0-9]{12}/, "Valor muito grande")   //limita pra máximo 999.999.999,99
                        v = v.replace(/(\d{1})(\d{8})$/, "$1.$2")  //coloca ponto antes dos últimos 8 digitos
                        v = v.replace(/(\d{1})(\d{5})$/, "$1.$2")  //coloca ponto antes dos últimos 5 digitos
                        v = v.replace(/(\d{1})(\d{1,2})$/, "$1,$2")	//coloca virgula antes dos últimos 2 digitos
                        z.value = v;
                    }

                </script>

            </div> <!-- /container -->
        </div>

        <!-- fim do conteudo da página -->

        <!-- Inicio do rodapé -->
        <?php include'../MasterPages/footer.php' ?>
        <!-- Final do rodapé -->

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->

        <script src="../Front_end/js/jquery-1.8.0.min.js"></script> 
        <script src="../Front_end/js/jquery.maskedinput.js"></script>

        <script src="../Front_end/bootstrap-3/assets/js/jquery.js"></script>
        <script src="../Front_end/bootstrap-3/dist/js/bootstrap.js"></script><div id="goog-gt-tt" class="goog-tooltip skiptranslate" dir="ltr" style="visibility: hidden; left: 632px; top: 218px; display: none;"><div style="padding: 8px;"><div><div class="logo"><img src="https://www.google.com/images/icons/product/translate-32.png" width="20" height="20"></div></div></div><div class="top" style="padding: 8px; float: left; width: 100%;"><h1 class="title gray">Texto original</h1></div><div class="middle" style="padding: 8px;"><div class="original-text">This example is a quick exercise to illustrate how the default, static and fixed to top navbar work.</div></div><div class="bottom" style="padding: 8px;"><div class="activity-links"><span class="activity-link">Sugira uma tradução melhor</span><span class="activity-link"></span></div><div class="started-activity-container"><hr style="color: #CCC; background-color: #CCC; height: 1px; border: none;"><div class="activity-root"></div></div></div><div class="status-message" style="display: none; opacity: 0;"></div></div>












    </body></html>