<?php 
include '../../config/session.php';
include_once '../../Model/Database/CmdSql.php';
//require '../../kint/Kint.class.php';

$result = null;

if(isset($_POST['seach']))
{
  $ePesquisa = $_POST['ePesquisa'];   
    $n = $_POST['txtNomFunc'];
    $c = $_POST['txtCpfFunc'];
    $r =  $_POST['txtRgFunc'];
  
    
$sql="SELECT f.idFunc, f.Nome, f.CpfFunc, f.RgFunc,f.TelFunc, f.Status FROM funcionario f WHERE 1 ";
 if($n!=""){
  $sql.=" AND f.Nome like'%$n%'  ";}
 if($c!=""){
  $sql.=" AND f.CpfFunc ='$c' ";}
 if($r!=""){
 $sql.="AND f.RgFunc = '$r' "; }
 $sql.="ORDER BY f.Nome ASC "; 
 
 $oPessit = new CmdSql;
 $q = $oPessit->query($sql);
 $result = $q->fetchAll(PDO::FETCH_OBJ);
   

 //d($result);
 
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
        
    <title>SCA - Consulta funcionario</title>
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
   
     toastr.success("Cadastro de funcionário atualizado.","Sucesso!"); //parametros: 1ºmensagem,2º titulo
 
   <?php } ?>
      <?php if(isset($_GET['atv'])){ ?>
   
     toastr.success("Funcionário ativado."); //parametros: 1ºmensagem,2º titulo
 
   <?php } ?>
   <?php if(isset($_GET['inat'])){ ?>
   
     toastr.success("Funcionário inativado."); //parametros: 1ºmensagem,2º titulo
 
   <?php } ?> 
    </script>
	
<div id="wrap">    
    <div class="container" style="width: 900px;">

      
<form role="form" class="form-horizontal" action="pfuncionario.php" method="post" >
<legend>
Pesquisa de funcionario
</legend>

<div class="container" style="margin-left:30px; height:0 auto;">
                        <div class="form-group">

    <div class="col-md-6">
        <label for="txtNomF">Nome </label>
        <input type="text" class="form-control" placeholder="Nome Completo" name="txtNomFunc" id="txtNomF" />
                                </div>

                                <div class="col-md-3">
        <label for="txtCpfF">CPF</label>
        <input type="text" class="form-control"  placeholder="CPF" name="txtCpfFunc" id="txtCpfF">
    </div> 

    <div class="col-md-3">
        <label for="txtRgF">RG</label>
        <input type="text" class="form-control" placeholder="RG" name="txtRgFunc" id="txtRgF" >
    </div> </div></div>

                                
                  
<input type="hidden" name="ePesquisa"  value="true" />  

<div class="form-group">
<div class="col-md-2" style="margin-top: 10px; margin-left: 82%;">
<button class="btn btn-primary prefix_10" type="submit" name="seach" value=""><span class="glyphicon glyphicon-search" style="margin-right: 5px;"></span>Pesquisar</button> </div></div>
                   
</form>	
        
    <?php  if (isset($ePesquisa)){ ?>    
        
<div class=" panel panel-primary" style="margin-top:10px; width: 870px; margin: 0 auto;">
    <div class="panel-heading">Resultado<center></center></div>            
            
    <table class="table table-striped">
        <tr class="warning">
            <td style="width: 60px;"><b>Status</b></td>
            <td><b>Nome</b></td>
            <td><b>CPF</b></td>
            <td><b>Telefone</b></td>
            <td><b>Visualizar</b></td>
            <td><b>Editar</b></td>
            <td style="width: 100px;"><center><b><small>Ativar/Inativar</small></b></center></td>
        </tr>
        
        <?php foreach ($result as $linha){ ?>
        
         <tr>
             <td><?php $vStatus = $linha->Status; 
                 if($vStatus == "Ativo"){
                 echo '<img title="Ativo" src="../Front_end/available.png">';
                 $Status = '<span title="Inativar" style="color: #ff0000; margin-left: 42%;" class="glyphicon glyphicon-off"></span>'; 
                 $funcEdite = 'C_inativar';
                 }
                 else{
                 echo '<img title="Inativo" src="../Front_end/away.png">';
                 $Status = '<span title="Ativar" style="color: #00CD00; margin-left: 42%;" class="glyphicon glyphicon-off"></span>';
                 $funcEdite = 'C_ativar';
                 }
            ?></td>
        <td><?php echo $linha->Nome; ?></td>
            <td><?php echo $linha->CpfFunc; ?></td>
            <td><?php echo $linha->RgFunc; ?></td>
            
            
       
            
           <td><a href="../Func/funcionario.php?id=<?php echo $linha->idFunc; ?>&consulta&pagina=1"<span title="Visualizar" style="color: #000000; margin-left: 23%;" class="glyphicon glyphicon-search"></span></a></td>
        <td><a href="../Func/updateFunc.php?id=<?php echo $linha->idFunc?>&consulta=&pagina=1"><span title="Editar" style="color: #000000; margin-left: 23%;" class="glyphicon glyphicon-edit"></a></td>
        <td><a href="../../Controller/editeFunc.php?<?php echo $funcEdite ;?>=<?php echo $linha->idFunc; ?>&pagina=1"><?php echo $Status; ?></a></td> 	
         		
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