<!DOCTYPE html>
<?php
include'../../config/session.php';
include '../../includes.php';

$fornecedorController = new FornecedorController();
$linhas = $fornecedorController->executeAcao('buscar.fornecedor', $dto = null, $_GET['id']);
$idFornecedor = $linhas['idFornecedor'];
$nome = $linhas['Nome'];
$tel = $linhas['Telefone'];
$nomeContato = $linhas['Contato'];
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SCA - Dados do fornecedor</title>
        <link rel="shortcut icon" href="../Front_end/favicon.ico">
        <link href="../Front_end/bootstrap-3/dist/css/bootstrap.css" rel="stylesheet">

        <!-- TODAS AS PÁGINAS QUE TIVEREM RODAPÉ E MENU SUPERIOR, TERÁ QUE TER ESSAS IMPORTAÇÕES. É UM CSS INDIVIDUAL. -->
        <link href="../Front_end/bootstrap-3/css_individuais/navbar-fixed-top.css" rel="stylesheet">
        <link href="../Front_end/bootstrap-3/css_individuais/sticky-footer-navbar.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="../../assets/js/html5shiv.js"></script>
          <script src="../../assets/js/respond.min.js"></script>
        <![endif]-->
        <link type="text/css" rel="stylesheet" charset="UTF-8" href="http://translate.googleapis.com/translate_static/css/translateelement.css"><script type="text/javascript" charset="UTF-8" src="http://translate.googleapis.com/translate_static/js/element/main_pt-BR.js"></script><script type="text/javascript" charset="UTF-8" src="http://translate.googleapis.com/translate_static/js/element/17/element_main.js"></script></head>
</head>
<body>
    <?php include'../MasterPages/menu1.php'; ?>
    <!-- Final do menu:Fixed navbar -->
    <div id="wrap">    
        <div class="container" style="width: 900px;">

            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading"><center><h4>Dados do fornecedor</h4></center></div>

                <!-- Table -->

                <table class=" table table-condensed">
                    <tr>
                        <td class="col-md-3"><b>Nome:</b></td><td class="col-md-3"><?php echo $nome; ?></td><td class="col-md-3"><b>Telefone:</b></td><td class="col-md-3"><?php echo $tel ?></td>
                    </tr>
                    <tr>
                        <td class="col-md-3"><b>Nome do Contato:</b></td><td><?php echo $nomeContato ?></td><td class="col-md-3"><b></b></td><td></td>
                </table>                
            </div>
            <div class="col-md-2" style="margin-top: 10px; margin-left: 89%; margin-bottom: 20px;">

                <script>
                    function red()
                    {
                        javascript:history.go(-1);

                    }
                </script>
                </script>
                <?php
                $pagina = $_GET['pagina'];
                if (isset($_GET['consulta'])) {
                    $pg = "onclick=\"window.location.href='../Consulta/pfornecedor.php';\"";
                } else if (isset($_GET['inativo'])) {
                    $pg = "onclick=\"window.location.href='../Fornecedor/ListarFornInativos.php?pagina=$pagina';\"";
                } else
                    $pg = "onclick=\"window.location.href='../Fornecedor/listFornecedor.php?pagina=$pagina';\"";
                ?>
                <button class="btn btn-primary prefix_10" type="button" name="gravar" <?php echo $pg; ?> value="" ><span class="glyphicon glyphicon-arrow-left" style="margin-right: 5px;"></span>Voltar</button> </div>
        </div> </div>
    <?php include '../MasterPages/footer.php'; ?>
    <script src="../Front_end/bootstrap-3/assets/js/jquery.js"></script>
    <script src="../Front_end/bootstrap-3/dist/js/bootstrap.js"></script><div id="goog-gt-tt" class="goog-tooltip skiptranslate" dir="ltr" style="visibility: hidden; left: 632px; top: 218px; display: none;"><div style="padding: 8px;"><div><div class="logo"><img src="https://www.google.com/images/icons/product/translate-32.png" width="20" height="20"></div></div></div><div class="top" style="padding: 8px; float: left; width: 100%;"><h1 class="title gray">Texto original</h1></div><div class="middle" style="padding: 8px;"><div class="original-text">This example is a quick exercise to illustrate how the default, static and fixed to top navbar work.</div></div><div class="bottom" style="padding: 8px;"><div class="activity-links"><span class="activity-link">Sugira uma tradução melhor</span><span class="activity-link"></span></div><div class="started-activity-container"><hr style="color: #CCC; background-color: #CCC; height: 1px; border: none;"><div class="activity-root"></div></div></div><div class="status-message" style="display: none; opacity: 0;"></div></div>
    <script src="../Front_end/js/jquery-1.8.0.min.js"></script> 
    <script src="../Front_end/js/jquery.maskedinput.js"></script>  

</body>
</html>
