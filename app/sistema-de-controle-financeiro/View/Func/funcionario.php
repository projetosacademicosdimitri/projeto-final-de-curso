<?php

include '../../includes.php';

$dto = null;

$funcionarioController = new FuncionarioController();
$linhas = $funcionarioController->execulteAcao('buscar.funcionario', $dto, $_GET['id']);

$id = $linhas['idFunc'];
$nome = $linhas['Nome'];
$cargo = $linhas['CargoFunc'];
$salario = number_format($linhas['SalarioFunc'], 2, ',', '.');
$cpfFunc = $linhas['CpfFunc'];
$pisFunc = $linhas['PisFunc'];
$dataNascFunc = implode("/", array_reverse(explode("-", $linhas['DataNascFunc'])));
$dataAdmFunc = implode("/", array_reverse(explode("-", $linhas['DataAdmFunc'])));
$endFunc = $linhas['EndFunc'];
$telFunc = $linhas['TelFunc'];
$celFunc = $linhas['CelFunc'];
$numeroFunc = $linhas['NumeroFunc'];
$rgFunc = $linhas['RgFunc'];
$ctpsFunc = $linhas['CtpsFunc'];
$serie = $linhas['Serie'];
$uf = $linhas['Uf'];
$cepFunc = $linhas['CepFunc'];
$cidadeFunc = $linhas['CidadeFunc'];
$estadoFunc = $linhas['EstadoFunc'];
$bairroFunc = $linhas['BairroFunc'];

?>


<!DOCTYPE html>
<html lang="en" class="translated-ltr"><head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="./bootstrap-3/assets/ico/favicon.png">

        <title>SCA - Dados do funcion&aacute;rio</title>
        <link rel="shortcut icon" href="../Front_end/favicon.ico">
        <!-- Importa o Bootstrap core CSS -->
        <link href="../Front_end/bootstrap-3/dist/css/bootstrap.css" rel="stylesheet">

        <!-- TODAS AS P�GINAS QUE TIVEREM RODAP� E MENU SUPERIOR, TER� QUE TER ESSAS IMPORTA��ES. � UM CSS INDIVIDUAL. -->
        <link href="../Front_end/bootstrap-3/css_individuais/navbar-fixed-top.css" rel="stylesheet">
        <link href="../Front_end/bootstrap-3/css_individuais/sticky-footer-navbar.css" rel="stylesheet">


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="../../assets/js/html5shiv.js"></script>
          <script src="../../assets/js/respond.min.js"></script>
        <![endif]-->
        <link type="text/css" rel="stylesheet" charset="UTF-8" href="http://translate.googleapis.com/translate_static/css/translateelement.css"><script type="text/javascript" charset="UTF-8" src="http://translate.googleapis.com/translate_static/js/element/main_pt-BR.js"></script><script type="text/javascript" charset="UTF-8" src="http://translate.googleapis.com/translate_static/js/element/17/element_main.js"></script></head>

    <body>

<?php include '../MasterPages/menu1.php'; ?>
        <!-- Final do menu:Fixed navbar -->

        <div id="wrap">    
            <div class="container" style="width: 900px;">

                <div class="panel panel-primary">
                    <!-- Default panel contents -->
                    <div class="panel-heading"><center><h4>Dados do Funcion&aacute;rio</h4></center></div>

                    <!-- Table -->

                    <table class=" table table-condensed">
                        <tr>
                            <td class="col-md-3"><b>Nome:</b></td><td class="col-md-3"><?php echo $nome ?></td><td class="col-md-3"><b>CPF:</b></td><td class="col-md-3"><?php echo $cpfFunc ?></td>
                        </tr>
                        <tr>
                            <td class="col-md-3"><b>RG:</b></td><td><?php echo $rgFunc ?></td><td class="col-md-3"><b>Data de nascimento:</b></td><td><?php echo $dataNascFunc ?></td>
                        </tr>
                        <tr>
                            <td class="col-md-3"><b>Telefone:</b></td><td><?php echo $telFunc ?></td><td class="col-md-3"><b>Celular:</b></td><td><?php echo $celFunc ?></td>
                        </tr>
                        <tr>
                            <td class="col-md-3"><b>Cargo:</b></td><td><?php echo $cargo ?></td><td class="col-md-3"><b></b></td><td></td>
                        </tr>
                    </table> 
                    <div class="panel-heading"><b>Endere&ccedil;o</b></div>
                    <table class=" table table-condensed">
                        <tr>
                            <td class="col-md-3"><b>Endere&ccedil;o:</b></td><td class="col-md-3"><?php echo $endFunc ?></td><td class="col-md-3"><b>N&uacute;mero:</b></td><td class="col-md-3"><?php echo $numeroFunc ?></td>
                        </tr>
                        <tr>
                            <td class="col-md-3"><b>Bairro:</b></td><td><?php echo $bairroFunc ?></td><td class="col-md-3"><b>Cidade:</b></td><td><?php echo $cidadeFunc ?></td>
                        </tr>
                        <tr>
                            <td class="col-md-3"><b>CEP:</b></td><td><?php echo $cepFunc ?></td><td class="col-md-3"><b>UF:</b></td><td><?php echo $estadoFunc ?></td>
                        </tr>
                    </table>
                    <div class="panel-heading"><b>Carteira de trabalho</b></div>
                    <table class=" table table-condensed">
                        <tr>
                            <td class="col-md-3"><b>Data de admiss&atilde;o:</b></td><td class="col-md-3"><?php echo $dataAdmFunc ?></td><td class="col-md-3"><b>N&#176; da carteira de trabalho:</b></td><td class="col-md-3"><?php echo $ctpsFunc ?></td>
                        </tr>
                        <tr>
                            <td class="col-md-3"><b>N&uacute;mero de s&eacute;rie:</b></td><td><?php echo $serie ?></td><td class="col-md-3"><b>PIS:</b></td><td><?php echo $pisFunc ?></td>
                        </tr>
                        <tr>
                            <td class="col-md-3"><b>UF:</b></td><td><?php echo $uf ?></td><td class="col-md-3"><b>Sal&aacute;rio:</b></td><td>R$ <?php echo$salario; ?></td>
                        </tr>
                    </table> 
                </div>
                <div class="col-md-2" style="margin-top: 10px; margin-left: 89%; margin-bottom: 20px;">


<?php
$pagina = $_GET['pagina'];
if (isset($_GET['consulta'])) {
    $pg = "onclick=\"window.location.href='../Consulta/pfuncionario.php';\"";
} else if (isset($_GET['inativo'])) {
    $pg = "onclick=\"window.location.href='../Func/ListarFuncInativos.php?pagina=$pagina';\"";
} else
    $pg = "onclick=\"window.location.href='../Func/listarFunc.php?pagina=$pagina';\"";
?>
                    <button class="btn btn-primary prefix_10" type="button" name="gravar" <?php echo $pg; ?> value="" ><span class="glyphicon glyphicon-arrow-left" style="margin-right: 5px;"></span>Voltar</button> </div>
            </div>
        </div> <!-- /container -->




        <!-- Inicio do rodap� -->
<?php include '../MasterPages/footer.php'; ?>
        <!-- Final do rodap� -->

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="../Front_end/bootstrap-3/assets/js/jquery.js"></script>
        <script src="../Front_end/bootstrap-3/dist/js/bootstrap.js"></script><div id="goog-gt-tt" class="goog-tooltip skiptranslate" dir="ltr" style="visibility: hidden; left: 632px; top: 218px; display: none;"><div style="padding: 8px;"><div><div class="logo"><img src="https://www.google.com/images/icons/product/translate-32.png" width="20" height="20"></div></div></div><div class="top" style="padding: 8px; float: left; width: 100%;"><h1 class="title gray">Texto original</h1></div><div class="middle" style="padding: 8px;"><div class="original-text">This example is a quick exercise to illustrate how the default, static and fixed to top navbar work.</div></div><div class="bottom" style="padding: 8px;"><div class="activity-links"><span class="activity-link">Sugira uma tradu��o melhor</span><span class="activity-link"></span></div><div class="started-activity-container"><hr style="color: #CCC; background-color: #CCC; height: 1px; border: none;"><div class="activity-root"></div></div></div><div class="status-message" style="display: none; opacity: 0;"></div></div>


    </body></html>