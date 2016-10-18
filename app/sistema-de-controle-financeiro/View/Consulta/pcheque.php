<?php 
include '../../config/session.php';
include_once '../../Model/Database/CmdSql.php';

$result = null;

if(isset($_POST['seach']))
{
  $ePesquisa = $_POST['ePesquisa'];   
    $n = $_POST['txtNomCheque'];
    $nu = $_POST['txtNumCheque'];
    $dataIni = $_POST['txtDataIni'];
    $dataFim = $_POST['txtDataFim'];
  
    
$sql="SELECT c.idCheque, c.Nome, c.Numero, c.DataEmisao FROM cheque c WHERE 1 ";
  if($n!=""){
  $sql.=" AND c.Nome like'%$n%' ";}
  if($nu!=""){
  $sql.=" AND c.Numero like'%$nu%' ";}
  if($dataIni!=""){
  $sql.=" AND c.DataEmisao >='$dataIni' ";}
  if($dataFim!=""){
  $sql.=" AND c.DataEmisao <='$dataFim' ";}
 
 
 
$sql.=" ORDER BY c.DataEmisao ASC";

 
 $oPessit = new CmdSql;
 $q = $oPessit->query($sql);
 $result = $q->fetchAll(PDO::FETCH_OBJ);
 }
?>

<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
    <title>SCA - Consulta cheque</title>
	<link rel="shortcut icon" href="../Front_end/favicon.ico">
<?php include_once '../../Model/Database/CmdSql.php';
header('Content-Type: text/html; charset=utf-8');?>
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

  <?php include '../MasterPages/menu1.php'; ?>
	<!-- Final do menu:Fixed navbar -->
	
	 <script type="text/javascript">
    <?php if(isset($_GET['ok'])){ ?>
   


     toastr.success("Cheque atualizado.","Sucesso!"); //parametros: 1ºmensagem,2º titulo
 
   <?php } ?>
      <?php if(isset($_GET['del'])){ ?>
   
     toastr.warning("Cheque deletado."); //parametros: 1ºmensagem,2º titulo
 
   <?php } ?>
    </script>
	
<div id="wrap">    
    <div class="container" style="width: 900px;">

      
<form role="form" class="form-horizontal" action="pcheque.php" method="post" >
<legend>
Pesquisa de cheque
</legend>

<div class="container" style="margin-left:30px; height:0 auto;">
                        <div class="form-group">

    <div class="col-md-3">
        <label for="txtNomChe">Nome</label>
        <input type="text" class="form-control" placeholder="Nome" name="txtNomCheque" id="txtNomChe" />
                                </div>
                            <div class="col-md-3">
        <label for="txtNumChe">Número</label>
        <input type="text" class="form-control" placeholder="Número" name="txtNumCheque" id="txtNumChe" />
                                </div>
                            
                            <div class="col-md-3">
                                    <label for="DateVenda">Data inicial</label>
                                    <input type="date" class="form-control" name="txtDataIni" id="DateVenda">
				</div>
                            <div class="col-md-3">
                                    <label for="DateVenda">Data final</label>
                                    <input type="date" class="form-control" name="txtDataFim" id="DateVenda">
				</div>

                                
                  
<input type="hidden" name="ePesquisa"  value="true" />  

<div class="form-group">
<div class="col-md-2" style="margin-top: 10px; margin-left: 82%;">
<button class="btn btn-primary prefix_10" type="submit" name="seach" value=""><span class="glyphicon glyphicon-search" style="margin-right: 5px;"></span>Pesquisar</button> </div></div>
                        </div>
     </div>
</form>	
        
    <?php  if (isset($ePesquisa)){ ?>    
        
<div class=" panel panel-primary" style="margin-top:10px; width: 870px; margin: 0 auto;">
    <div class="panel-heading">Resultado<center></center></div>            
            
    <table class="table table-striped">
        <tr class="warning">
            <td><b>Nome</b></td>
            <td><b>Numero</b></td>
            <td><b>Data de emissão</b></td>
            <td><b>Visualizar</b></td>
            <td><b>Editar</b></td>
            <td><b>Excluir</b></td>
        </tr>
        
        <?php foreach ($result as $linha){ ?>
         <tr>
        <td><?php echo $linha->Nome; ?></td>
            <td><?php echo $linha->Numero;; ?></td>
            <td><?php echo implode("/",array_reverse(explode("-",$linha->DataEmisao) ) ); ?></td>
            <td><a href="../Cheque/cheque.php?id=<?php echo $linha->idCheque; ?>&consulta&pagina=1"><span title="Visualizar" style="color: #000000; margin-left: 23%;" class="glyphicon glyphicon-search"></span></a></td>
                <td><a href="../Cheque/updateCheque.php?id=<?php echo $linha->idCheque; ?>&consulta&pagina=1"><span title="Editar" style="color: #000000; margin-left: 23%;" class="glyphicon glyphicon-edit"></span></a></td>
                <td><a onclick="return confirm('Deseja realmente excluir este registro?');" href="../../Controller/editeCheque.php?C_delete=<?php echo $linha->idCheque; ?>&pagina=1"><span title="Excluir" style="color: #ff0000; margin-left: 23%;" class="glyphicon glyphicon-remove"></span></a></td> 	
	     		
         </tr>
        <?php }?>
        
        
    </table> 
    
    
        </div>      
        <?php   } ?>  
 
    <!-- /container -->
</div>
</div>
<!-- Inicio do rodapé -->
    <?php include '../MasterPages/footer.php'; ?>
	<!-- Final do rodapé -->
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Colocado no final do documento para que as páginas carreguem mais rápido -->
    <script src="../Front_end/bootstrap-3/assets/js/jquery.js"></script>
    <script src="../Front_end/bootstrap-3/dist/js/bootstrap.js"></script><div id="goog-gt-tt" class="goog-tooltip skiptranslate" dir="ltr" style="visibility: hidden; left: 632px; top: 218px; display: none;"><div style="padding: 8px;"><div><div class="logo"><img src="https://www.google.com/images/icons/product/translate-32.png" width="20" height="20"></div></div></div><div class="top" style="padding: 8px; float: left; width: 100%;"><h1 class="title gray">Texto original</h1></div><div class="middle" style="padding: 8px;"><div class="original-text">This example is a quick exercise to illustrate how the default, static and fixed to top navbar work.</div></div><div class="bottom" style="padding: 8px;"><div class="activity-links"><span class="activity-link">Sugira uma tradução melhor</span><span class="activity-link"></span></div><div class="started-activity-container"><hr style="color: #CCC; background-color: #CCC; height: 1px; border: none;"><div class="activity-root"></div></div></div><div class="status-message" style="display: none; opacity: 0;"></div></div>
  <script src="Front_end/js/jquery-1.8.0.min.js"></script>
<script src="Front_end/js/bootstrap.js"></script>

</body>

</html>