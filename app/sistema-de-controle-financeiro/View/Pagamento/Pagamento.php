<?php include '../../config/session.php';?>
<!DOCTYPE html>
<html lang="en" class="translated-ltr"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="./bootstrap-3/assets/ico/favicon.png">

    <title>SCA - Dados do pagamento</title>
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
      
      <?php
include_once '../../Model/Database/CmdSql.php';

$oPessit = new CmdSql;
$linhas = $oPessit->BuscaIdPagamento($_GET['id']);   
$id =$linhas['idPgmto'];
$vNomeFunc = $linhas['Nome']; 
$vDataPagamento = implode("/",array_reverse(explode("-",$linhas['DataPgmto']) ) );
$vSalarioBase = number_format($linhas['SalarioBase'], 2, ',', '.');
$vHoraExtra = number_format($linhas['HoraExtra'], 2, ',', '.');
$vValorTotal = number_format($linhas['ValorTotal'], 2, ',', '.');
$vAdiantamento = number_format($linhas['Adiantamento'], 2, ',', '.');
$vDescontos = number_format($linhas['Descontos'], 2, ',', '.');
$vValorLiquido = number_format($linhas['ValorLiquido'], 2, ',', '.');


 

?>

  <?php  include'../MasterPages/menu1.php';?>
	<!-- Final do menu:Fixed navbar -->
	
<div id="wrap">    
    <div class="container" style="width: 900px;">
	
		 <div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading"><center><h4>Dados do pagamento</h4></center></div>

  <!-- Table -->
  
  <table class=" table table-condensed">
       <tr>
	<td class="col-md-3"><b>Nome:</b></td><td class="col-md-3"><?php echo $vNomeFunc; ?></td>
        <td class="col-md-3"><b>Data do pagamento:</b></td><td class="col-md-3"><?php echo $vDataPagamento; ?></td>
	</tr>
	
       
        
     <tr>
    <td class="col-md-3"><b>Salario Base:</b></td><td>R$ <?php echo $vSalarioBase;?></td>   
    <td class="col-md-3"><b>Hora extra</b></td><td>R$ <?php echo $vHoraExtra;?></td>
     </tr>
       
  <tr>
    <td class="col-md-3"><b>Adiantamento:</b></td> <td>R$ <?php echo $vAdiantamento;?></td>   
    <td class="col-md-3"><b>Descontos</b></td><td>R$ <?php echo $vDescontos;?></td>
     </tr>
     
     <tr>
    <td class="col-md-3"><b>Valor Bruto:</b></td> <td>R$ <?php echo $vValorTotal;?></td>   
    <td class="col-md-3"><b>Valor Liquido</b></td><td>R$ <?php echo $vValorLiquido;?></td>
     </tr>
	  
       </table>
 
                       
</div>
        <div class="col-md-2" style="margin-top: 10px; margin-left: 87%;">
                            
                        <script>
                        function red()
                       {
                         javascript:history.go(-1);   
                           
                       } 
                       </script>
                             <?php $pagina = $_GET['pagina'];
							if(isset($_GET['consulta'])){$pg = "onclick=\"window.location.href='../Consulta/ppagamento.php';\"";} else $pg = "onclick=\"window.location.href='../Pagamento/ListarPagamento.php?pagina=$pagina';\"";   ?>
            <button class="btn btn-primary prefix_10" type="button" name="gravar" <?php echo $pg;?> value="" ><span class="glyphicon glyphicon-arrow-left" style="margin-right: 5px;"></span>Voltar</button> </div>
     </div> <!-- /container -->
</div>

    

<!-- Inicio do rodapé -->
    <?php  include'../MasterPages/footer.php';?>
	<!-- Final do rodapé -->
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   <script src="../Front_end/bootstrap-3/assets/js/jquery.js"></script>
    <script src="../Front_end/bootstrap-3/dist/js/bootstrap.js"></script><div id="goog-gt-tt" class="goog-tooltip skiptranslate" dir="ltr" style="visibility: hidden; left: 632px; top: 218px; display: none;"><div style="padding: 8px;"><div><div class="logo"><img src="https://www.google.com/images/icons/product/translate-32.png" width="20" height="20"></div></div></div><div class="top" style="padding: 8px; float: left; width: 100%;"><h1 class="title gray">Texto original</h1></div><div class="middle" style="padding: 8px;"><div class="original-text">This example is a quick exercise to illustrate how the default, static and fixed to top navbar work.</div></div><div class="bottom" style="padding: 8px;"><div class="activity-links"><span class="activity-link">Sugira uma tradução melhor</span><span class="activity-link"></span></div><div class="started-activity-container"><hr style="color: #CCC; background-color: #CCC; height: 1px; border: none;"><div class="activity-root"></div></div></div><div class="status-message" style="display: none; opacity: 0;"></div></div>
  

</body></html>