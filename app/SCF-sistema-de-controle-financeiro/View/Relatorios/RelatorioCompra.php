<?php
include '../../config/session.php';
include_once '../../Model/Database/CmdSql.php';
require '../../kint/Kint.class.php';

$result = null;

if (isset($_POST['seach'])) {
    $dataIni = $_POST['txtDataIni'];
    $dataFim = $_POST['txtDataFim'];
    $IdFornecedor = $_POST['IdFornecedor'];
    $ePesquisa = $_POST['ePesquisa'];

    $where1 = "WHERE 1";
    $where2 = "WHERE 1";

    $pdf_param = "true";

    if ($IdFornecedor != "") {
        $where1.= " AND FornecedorId = '$IdFornecedor'  ";
        $where2.= " AND FornecedorId = '$IdFornecedor'  ";
        $pdf_param.="&id=$IdFornecedor ";
    }

    if ($dataIni != "") {
        $dataIni = implode("-", array_reverse(explode("/", $dataIni)));
        $where1.= "  AND DataCompra>='$dataIni' ";
        $where2.= "  AND DataCompra>='$dataIni' ";
        $pdf_param.="&dtIni=$dataIni";
    }

    if ($dataFim != "") {
        $dataFim = implode("-", array_reverse(explode("/", $dataFim)));
        $where1.="  AND DataCompra <='$dataFim' ";
        $where2.="  AND DataCompra <='$dataFim'  ";
        $pdf_param.="&dtFim=$dataFim";
    }


    $sql = "SELECT * ,";
    $sql.="(SELECT count(idCompra) from compra INNER JOIN fornecedor f ON f.idFornecedor = FornecedorId $where1 ) as tCompras,";
    $sql.="(SELECT sum(ValorTotal) from compra INNER JOIN fornecedor f ON f.idFornecedor = FornecedorId $where1) as tValorTotal FROM compra c INNER JOIN fornecedor f ON f.idFornecedor = c.FornecedorId $where2 ";
    $sql.=" ORDER BY DataCompra ASC";


    $oPessit = new CmdSql();

    $q = $oPessit->query($sql);
    $result = $q->fetchAll(PDO::FETCH_OBJ);
}
?>
<!DOCTYPE html>
<html lang="en" class="translated-ltr"><head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>SCA - Relatório das Compras</title>
        <link rel="shortcut icon" href="../Front_end/favicon.ico">
        <!-- Importa o Bootstrap core CSS -->
        <link href="../Front_end/bootstrap-3/dist/css/bootstrap.css" rel="stylesheet">
        <!-- TODAS AS P�?GINAS QUE TIVEREM RODAPÉ E MENU SUPERIOR, TER�? QUE TER ESSAS IMPORTAÇÕES. É UM CSS INDIVIDUAL. -->
        <link href="../Front_end/bootstrap-3/css_individuais/navbar-fixed-top.css" rel="stylesheet">
        <link href="../Front_end/bootstrap-3/css_individuais/sticky-footer-navbar.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="../../assets/js/html5shiv.js"></script>
          <script src="../../assets/js/respond.min.js"></script>
        <![endif]-->
        <link type="text/css" rel="stylesheet" charset="UTF-8" href="http://translate.googleapis.com/translate_static/css/translateelement.css"><script type="text/javascript" charset="UTF-8" src="http://translate.googleapis.com/translate_static/js/element/main_pt-BR.js"></script><script type="text/javascript" charset="UTF-8" src="http://translate.googleapis.com/translate_static/js/element/17/element_main.js"></script></head>
    <body>
        <?php include'../MasterPages/menu1.php'; ?>
        <!-- Final do menu:Fixed navbar -->

        <div id="wrap"> 
            <div class="container" style="width: 900px;">
                <div class="panel-group" id="accordion" >
                    <div class="panel panel-primary" > 
                        <div class="list-group">
                            <h4 class="panel-title">
                                <a class="list-group-item active" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    Filtro - Relatório das Compras
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <form role="form" class="form-horizontal" action="RelatorioCompra.php" method="post" >
                                    <input type="hidden" name="ePesquisa"  value="true" />         
                                    <div class="form-group">
                                        <small>

                                            <div class="col-md-3">
                                                <label for="DateVenda">Data inicial</label>
                                                <input type="date" class="form-control" name="txtDataIni" id="DateVenda">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="DateVenda">Data final</label>
                                                <input type="date" class="form-control" name="txtDataFim" id="DateVenda">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="txtQuant">Fornecedor</label>
                                                <select name="IdFornecedor" class="form-control" id="IdForn">
                                                    <option value="">---</option>

                                                    <?php
                                                    $oPessit = new CmdSql();
                                                    foreach ($oPessit->__listAllFornecedor() as $linha) {
                                                        ?> 
                                                        <option value="<?php echo $linha->idFornecedor; ?>"><?php echo $linha->Nome; ?></option> 

                                                    <?php } ?>   


                                                </select>
                                            </div>
                                            <div class="col-md-3" style="margin-top: 21px;">
                                                <center>
                                                    <button class="btn btn-primary prefix_10 "  type="submit" name="seach"  value="" ><span class="glyphicon glyphicon-filter" style="margin-right: 5px;"></span>Filtrar</button> </div>
                                            </center>
                                        </small>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div><!-- fim div acordeon-->

                <?php if (isset($ePesquisa)) { ?>             
                    <div class="panel panel-primary" style="margin-top: 10px;">
                        <!-- Default panel contents -->
                        <div class="panel-heading"><center>Resultado</center></div>
                        <!-- Table -->
                        <table class=" table table-condensed table-hover table-bordered">
                            <tr class="warning">
                                <td><b>Material</b></td>
                                <td><b>Fornecedor</b></td>
                                <td><b>Data da Compra</b></td>
                                <td><b>Quantidade</b></td>
                                <td><b>Valor unitário</b></td>
                                <td><b>Valor Total</b></td>

                            </tr>

                            <?php
                            $tCompras = "NENHUM";
                            $tValorTotal = "NENHUMA";
                            ?>

                            <?php
                            if ($q->rowCount() > 0) {
                                foreach ($result as $linha) {
                                    $valorTotal = $linha->ValorTotal;
                                    $valorUni = $linha->ValorUnitario;
                                    ?>

                                    <tr class="warning">
                                        <td class="col-md-2"><?php echo$linha->Material; ?></td>
                                        <td class="col-md-2"><?php echo$linha->Nome; ?></td>
                                        <td class="col-md-2"><?php echo implode("/", array_reverse(explode("-", $linha->DataCompra))); ?></td>
                                        <td class="col-md-2"><?php echo$linha->Quantidade; ?></td>
                                        <td class="col-md-2">R$ <?php echo number_format(round($valorUni, 2), 2, ',', '.'); ?></td>
                                        <td class="col-md-2">R$ <?php echo number_format(round($valorTotal, 2), 2, ',', '.'); ?></td>
                                    </tr>
                                    <?php
                                }
                                $tCompras = $linha->tCompras;
                                $tValorTotal = $linha->tValorTotal;
                            }
                            ?>

                            <style>
                                .red{color:#f00;} 
                            </style> 

                        </table>
                        <table class=" table table-condensed">

                            <tr class="success">
                                <td class="col-md-2"><div style="margin-left: 25px;"><b><small>Total  de Compras :</small></b></div></td>
                                <td class="col-md-1"><span class="red"><?php echo $tCompras; ?></span></td>
                                <td class="col-md-5"><b></b></td>
                                <td class="col-md-2"><div style="margin-left: 60px;"><b><small>Valor Total: </small></b></div></td>
                                <td class="col-md-2">
                                    <span class="red">R$ <?php echo number_format(round($tValorTotal, 2), 2, ',', '.'); ?></span>
                                </td>

                            </tr>

                        </table>
                    </div>
                    <div style="margin-left: 95%; margin-top: -10px; margin-bottom: 20px;">
                        <a title="Gerar PDF do relatório" onclick="window.open('ViewPdf/CompraPDF.php?PdfCompra=<?php echo$pdf_param; ?>');"   value="" ><img src="./export_pdf.png"></a> 
                    </div>  
                <?php }//final If  ?>             

            </div> <!-- /container -->
        </div>

        <!-- Inicio do rodapé -->
        <?php include'../MasterPages/footer.php'; ?>
        <!-- Final do rodapé -->

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="../Front_end/bootstrap-3/assets/js/jquery.js"></script>
        <script src="../Front_end/bootstrap-3/dist/js/bootstrap.js"></script><div id="goog-gt-tt" class="goog-tooltip skiptranslate" dir="ltr" style="visibility: hidden; left: 632px; top: 218px; display: none;"><div style="padding: 8px;"><div><div class="logo"><img src="https://www.google.com/images/icons/product/translate-32.png" width="20" height="20"></div></div></div><div class="top" style="padding: 8px; float: left; width: 100%;"><h1 class="title gray">Texto original</h1></div><div class="middle" style="padding: 8px;"><div class="original-text">This example is a quick exercise to illustrate how the default, static and fixed to top navbar work.</div></div><div class="bottom" style="padding: 8px;"><div class="activity-links"><span class="activity-link">Sugira uma tradução melhor</span><span class="activity-link"></span></div><div class="started-activity-container"><hr style="color: #CCC; background-color: #CCC; height: 1px; border: none;"><div class="activity-root"></div></div></div><div class="status-message" style="display: none; opacity: 0;"></div></div>
    </body></html>		
