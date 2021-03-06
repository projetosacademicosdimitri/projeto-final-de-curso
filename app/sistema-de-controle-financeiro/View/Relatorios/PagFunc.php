<?php 
include '../../config/session.php';
include_once '../../Model/Database/CmdSql.php';
//require '../../kint/Kint.class.php';

$result = null;

if(isset($_POST['seach'])){
    
$dataIni = $_POST['txtDataIni'];
$dataFim = $_POST['txtDataFim'];
$idFunc = $_POST['IdFunc'];
$ePesquisa = $_POST['ePesquisa'];

$where1 = "WHERE 1";
$where2 = "WHERE 1";

$pdf_param ="true";

if($idFunc !="0")
{$where1.= " AND f.idfunc ='$idFunc'  ";
 $where2.= " AND f.idfunc ='$idFunc'   ";
 $pdf_param.="&id=$idFunc ";
}

if($dataIni != "")
{ $dataIni = implode("-",array_reverse(explode("/",$dataIni))); 
  $where1.= "  AND p.DataPgmto >='$dataIni' ";
  $where2.= "  AND p.DataPgmto >='$dataIni' ";
  $pdf_param.="&dtIni=$dataIni";
  
}

if($dataFim != "")
{$dataFim = implode("-",array_reverse(explode("/",$dataFim))); 
 $where1.="  AND p.DataPgmto <='$dataFim' ";
 $where2.="  AND p.DataPgmto <='$dataFim' ";
 $pdf_param.="&dtFim=$dataFim";
}

$sql="SELECT f.Nome, f.SalarioFunc, p.DataPgmto, p.HoraExtra,";
$sql.="Adiantamento, p.Descontos, p.ValorTotal,";
$sql.="(select sum(p.HoraExtra)FROM pagamento p     "; 
$sql.="INNER JOIN funcionario f ON p.idFunc = f.idFunc  ";
$sql.= "$where1 )as TH,";
$sql.="(select sum(p.ValorTotal)FROM pagamento p    "; 
$sql.="INNER JOIN funcionario f ON p.idFunc = f.idFunc "; 
$sql.="$where1 )as VT,";
$sql.="(select count(p.idPgmto)FROM pagamento p   "; 
$sql.="INNER JOIN funcionario f ON p.idFunc = f.idFunc  "; 
$sql.="$where1 )as qPag  ";
$sql.="FROM pagamento p INNER JOIN funcionario f ON p.idFunc = f.idFunc  ";
$sql.="$where2 ";
$sql.=" ORDER BY p.DataPgmto,f.Nome ASC";




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
    

    <title>SCA -  Relatório dos pagamentos</title>
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
      

  <?php  include'../MasterPages/menu1.php';?>
      
      
	<!-- Final do menu:Fixed navbar -->
	
<div id="wrap"> 
    <div class="container" style="width: 900px;">
        
        
<div class="panel-group" id="accordion" >
  <div class="panel panel-primary" > 
    <div class="list-group">
      <h4 class="panel-title">
        <a class="list-group-item active" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          Filtro - Relatório dos pagamentos
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
          <form role="form" class="form-horizontal" action="./PagFunc.php" method="post" >
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
                            <label for="txtQuant">Nome  Do  Funcionario</label>
                              <select name="IdFunc" class="form-control" id="">
                                     <option value="0">---</option>
                                  <?php  $oPessit1= new CmdSql();
                               
                               foreach($oPessit1->__listAllFuncionario() as $linha ){?> 
                                   
                            
                               <option value="<?php echo $linha->idFunc; ?>"><?php echo $linha->Nome; ?></option> 
                              
                                    <?php }?>       
                               
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
    
<?php  if (isset($ePesquisa)){ ?>             
<div class="panel panel-primary" style="margin-top: 10px;">
  <!-- Default panel contents -->
<div class="panel-heading"><center>Resultado</center></div>
<!-- Table -->


<table class=" table table-condensed table-hover table-bordered">
  <tr class="warning">
    <td><b>Nome do Funcionário</b></td>
    <td><b>50% do Salario base</b></td>
    <td><b>Data</b></td>
    <td><b>H.Extra</b></td>
    <td><b>Adiantamento</b></td>
    <td><b>Descontos</b></td>
   <td><b>Pago</b></td>
    
    </tr>

 <?php 
   $qPag="ZERO"; 
   $TH="ZERO"; 	
   $VT="ZERO" ;	
  ?>
    
    <?php if($q->rowCount()>0){
     
       foreach($result as $linha){ 
	   
	   ?>
   
        <tr class="warning">
        <td><?php echo$linha->Nome;?></td>
        <td>R$ <?php echo number_format($linha->SalarioFunc/2, 2, ',', '.'); ?></td>
        <td><?php echo implode("/",array_reverse(explode("-",$linha->DataPgmto)));?></td>
        <td>R$ <?php echo number_format($linha->HoraExtra, 2, ',', '.'); ?></td>
        <td>R$ <?php echo number_format($linha->Adiantamento, 2, ',', '.');?></td>
        <td>R$ <?php echo number_format($linha->Descontos, 2, ',', '.');?></td>
        <td>R$ <?php echo number_format($linha->ValorTotal, 2, ',', '.');?></td>
        </tr>
 
        <?php
         $qPag=$linha->qPag;
         $TH = $linha->TH; 	
         $VT=$linha->VT;?>	 

        
<?php  } }?>
    
    
    
        
     
        
        
        
        
        
</table>

<table class=" table table-condensed">
<style>
       .red{color:#f00;} 
      </style> 
<tr class="success">
    <td  style="width: 157px;"><div style="margin-left: 5px;"><b><small>Pagamentos Realizados:</small></b></div></td>
    <td style="width: 90px;" class="red"><div style="margin-left: 0px;"><?php echo$qPag; ?><div></td>
    
	
    <td style="width: 180px;"><div align="right"><b><small>Total Hora Extra:</small></b></div></td>
     <td style="width: 130px;" class="red"><div style=" margin-left: 0px;">R$ <?php echo number_format(round($TH,2), 2, ',', '.'); ?></div></td>
     
     <td style="width: 190px;"><div style="margin-left: 110px;"><b><small><center>Total Pago:</center></small></b></div></td>
      <td style="width: 130px;" class="red"><div align="center">R$ <?php   echo number_format(round($VT,2), 2, ',', '.'); ?></div></td>
    </tr>    
</table>

                       
</div>
<div style="margin-left: 95%; margin-top: -10px; margin-bottom: 20px;">
<a title="Gerar PDF do relatório" onclick="window.open('ViewPdf/PagamentoPDF.php?PdfPagamento=<?php echo$pdf_param;?>'); "   value="" ><img src="./export_pdf.png"></a> 
</div> 
<?php   } ?>             
                 
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