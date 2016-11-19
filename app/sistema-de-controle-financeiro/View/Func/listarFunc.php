<?php include '../../config/session.php'; ?>
<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SCA - Lista de Funcionários</title>
        <link rel="shortcut icon" href="../Front_end/favicon.ico">
        <?php
        include_once '../../Model/Database/CmdSql.php';
        header('Content-Type: text/html; charset=utf-8');
        ?>
        <!-- Importa o Bootstrap core CSS -->
        <link href="../Front_end/bootstrap-3/dist/css/bootstrap.css" rel="stylesheet">

        <!-- TODAS AS PÁGINAS QUE TIVEREM RODAPÉ E MENU SUPERIOR, TERÁ QUE TER ESSAS IMPORTAÇÕES. É UM CSS INDIVIDUAL. -->
        <link href="../Front_end/bootstrap-3/css_individuais/navbar-fixed-top.css" rel="stylesheet">
        <link href="../Front_end/bootstrap-3/css_individuais/sticky-footer-navbar.css" rel="stylesheet">

        <script src="../Front_end/Toastr/jquery-1.9.1.min.js"></script>
        <link href="../Front_end/Toastr/toastr.min.css" rel="stylesheet"/>
        <script src="../Front_end/Toastr/toastr.min.js"></script>
        <link type="text/css" rel="stylesheet" charset="UTF-8" href="http://translate.googleapis.com/translate_static/css/translateelement.css"><script type="text/javascript" charset="UTF-8" src="http://translate.googleapis.com/translate_static/js/element/main_pt-BR.js"></script><script type="text/javascript" charset="UTF-8" src="http://translate.googleapis.com/translate_static/js/element/17/element_main.js"></script></head>

    <body>

        <?php include'../MasterPages/menu1.php'; ?>
        <!-- Final do menu:Fixed navbar -->

        <script type="text/javascript">
<?php if (isset($_GET['ok'])) { ?>

                toastr.success("Cadastro de funcionário atualizado.", "Sucesso!"); //parametros: 1ºmensagem,2º titulo

<?php } ?>

<?php if (isset($_GET['inat'])) { ?>

                toastr.success("Funcionário inativado."); //parametros: 1ºmensagem,2º titulo

<?php } ?>
        </script>

        <div id="wrap">    
            <div class="container" style="width: 900px;">

                <!-- Main component for a primary marketing message or call to action -->

                <div class="panel panel-primary">
                    <!-- Default panel contents -->
                    <div class="panel-heading"><center><h4>Lista de Funcionários</h4></center></div>

                    <!-- Table -->
                    <table class="table table-striped">
                        <tr class="warning">
                            <td><b>Nome</b></td>
                            <td><b>CPF</b></td>
                            <td><b>Telefone</b></td>
                            <td><b>Visualizar</b></td>
                            <td><b>Editar</b></td>
                            <td><b>Inativar</b></td>
                        </tr>
                        <tr>
                            <?php
                            include '../../includes.php';

                            $funcionarioController = new FuncionarioController();

                            $paginacao = new StdClass();

                            $paginacao->inicio = ( $_GET['pagina'] < 1 ) ? 1 : $_GET['pagina'];
                            $paginacao->qtdPorPagina = 10;
                            $result = $funcionarioController->execulteAcao('paginacao.ativos.funcionario', $funcionario = null, $idfuncionario = null, $paginacao);
                            $result_total = $funcionarioController->execulteAcao('conte.total.ativos.funcionario');
                            $num_paginas = ceil($result_total->total / $paginacao->qtdPorPagina);
                            ?>

                            <?php foreach ($result as $linha) { ?>
                            <tr>
                                <td><?php echo $linha['Nome'] ?></td>
                                <td><?php echo $linha['CpfFunc']; ?> </td>
                                <td><?php echo $linha['TelFunc']; ?> </td>
                                <td><a href="funcionario.php?id=<?php echo $linha['idFunc']; ?>&pagina=<?php echo $_GET['pagina']; ?>  "><span title="Visualizar" style="color: #000000; margin-left: 23%;" class="glyphicon glyphicon-search"></span></a></td>
                                <td><a href="updateFunc.php?id=<?php echo $linha['idFunc']; ?>&pagina=<?php echo $_GET['pagina']; ?>  "><span title="Editar" style="color: #000000; margin-left: 23%;" class="glyphicon glyphicon-edit"></a></td>
                                <td><a href="../../Controller/editeFunc.php?inativar=<?php echo $linha['idFunc']; ?>&pagina=<?php echo$_GET['pagina']; ?>"><span title="Inativar" style="color: #ff0000; margin-left: 23%;" class="glyphicon glyphicon-off"></span></a></td> 	
                            </tr>
<?php } ?> 
                    </table>
                </div>
                <div><a href="ListarFuncInativos.php?pagina=1"><small>Funcionários inativos</small></a></div>   
                <center>
                    <ul class="pagination">


<?php
if ($paginacao->inicio > 1) {
    echo '<li><a href="listarFunc.php?pagina=1" title="Primeira p&aacute;gina">&lt;&lt;</a></li>';
    echo '<li><a href="listarFunc.php?pagina=' . ($ctrl - 1) . '" title="P&aacute;gina anterior">&lt;</a></li>';
}
if (($paginacao->inicio - 4) < 1) {
    $anterior = 1;
} else {
    $anterior = $ctrl - 4;
}

if (($paginacao->inicio + 4) > $num_paginas) {
    $posterior = $num_paginas;
} else {
    $posterior = $paginacao->inicio + 4;
}

for ($i = $anterior; $i <= $posterior && $i <= $num_paginas; $i++) {


    echo "<li><a href=\"listarFunc.php?pagina=$i\">$i</a></li>";
}
if ($paginacao->inicio < $num_paginas) {
    echo '<li><a href="listarFunc.php?pagina=' . ($paginacao->inicio + 1) . '" title="Pr&oacute;xima p&aacute;gina">&gt;</a></li>';
    echo "<li><a href=\"listarFunc.php?pagina=$num_paginas\" title=\"Ultima p&aacute;gina\">&gt;&gt;</a></li>";
}
?>

                    </ul>
                    <center>


                        <script src="Front_end/js/jquery-1.8.0.min.js"></script>
                        <script src="Front_end/js/bootstrap.js"></script>
                        </div> <!-- /container -->
                        </div>
                        <!-- Inicio do rodapé -->
<?php include'../MasterPages/footer.php'; ?>
                        <!-- Final do rodapé -->

                        <!-- Bootstrap core JavaScript
                        ================================================== -->
                        <!-- Colocado no final do documento para que as páginas carreguem mais rápido -->
                        <script src="../Front_end/bootstrap-3/assets/js/jquery.js"></script>
                        <script src="../Front_end/bootstrap-3/dist/js/bootstrap.js"></script><div id="goog-gt-tt" class="goog-tooltip skiptranslate" dir="ltr" style="visibility: hidden; left: 632px; top: 218px; display: none;"><div style="padding: 8px;"><div><div class="logo"><img src="https://www.google.com/images/icons/product/translate-32.png" width="20" height="20"></div></div></div><div class="top" style="padding: 8px; float: left; width: 100%;"><h1 class="title gray">Texto original</h1></div><div class="middle" style="padding: 8px;"><div class="original-text">This example is a quick exercise to illustrate how the default, static and fixed to top navbar work.</div></div><div class="bottom" style="padding: 8px;"><div class="activity-links"><span class="activity-link">Sugira uma tradução melhor</span><span class="activity-link"></span></div><div class="started-activity-container"><hr style="color: #CCC; background-color: #CCC; height: 1px; border: none;"><div class="activity-root"></div></div></div><div class="status-message" style="display: none; opacity: 0;"></div></div>


                        </body>
                        </html>