<?php 
include '../../config/session.php';
include_once '../../Model/Database/CmdSql.php';
require '../../kint/Kint.class.php';

$result = null;
if(isset($_POST['seach'])){
    
$dataIni = $_POST['txtDataIni'];
$dataFim = $_POST['txtDataFim'];
$idCliente = $_POST['IdCliente'];
$ePesquisa = $_POST['ePesquisa'];

$where1 = "WHERE 1";
$where2 = "WHERE 1";

$pdf_param ="true";

if($idCliente !="0")
{ $where1.= "  AND v.Clienteid ='$idCliente'  ";
  $where2.= "  AND c.idCliente ='$idCliente'  ";
  $pdf_param.="&id=$idCliente ";
}

if($dataIni != "")
{ $dataIni = implode("-",array_reverse(explode("/",$dataIni))); 
  $where1.= " AND v.DataVenda >='$dataIni'  ";
  $where2.= "  AND v.DataVenda >='$dataIni'  ";
  $pdf_param.="&dtIni=$dataIni";
}

if($dataFim != "")
{$dataFim = implode("-",array_reverse(explode("/",$dataFim))); 
  $where1.="   AND v.DataVenda <='$dataFim' ";
  $where2 .="  AND v.DataVenda <='$dataFim'  ";
  $pdf_param.="&dtFim=$dataFim";
}



$sql ="SELECT s.CorSaco, s.TamanhoSaco, v.idVenda, v.IdSaco, ";
$sql.="v.DataVenda, c.Nome, v.Quantidade, v.Micragem, v.ValorUnitario, ";
$sql.="v.ValorTotal, c.idCliente,"; 
$sql.="(SELECT SUM( v.ValorTotal )FROM venda v INNER JOIN cliente c ON v.ClienteId = c.idCliente INNER JOIN sacoplastico s ON s.IdSaco = v.IdSaco $where1 )as vTotal,";
$sql.="(SELECT SUM(Quantidade)FROM venda v INNER JOIN cliente c ON v.ClienteId = c.idCliente INNER JOIN sacoplastico s ON s.IdSaco = v.IdSaco $where1 )as tQuantP,";
$sql.="(SELECT COUNT(idVenda)FROM venda v INNER JOIN cliente c ON v.ClienteId = c.idCliente INNER JOIN sacoplastico s ON s.IdSaco = v.IdSaco $where1 )as tQuantV    ";
$sql.="FROM venda v INNER JOIN cliente c ON v.ClienteId = c.idCliente   ";
$sql.="INNER JOIN sacoplastico s ON s.IdSaco = v.IdSaco  ";
$sql.="$where2  ";
$sql.=" ORDER BY v.DataVenda,c.Nome,s.TamanhoSaco ASC";


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
    

    <title>SCA - Relatório das Vendas</title>
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
          Filtro - Relatório das Vendas
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
          <form role="form" class="form-horizontal" action="./RelatorioVenda.php" method="post" >
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
                            <label for="txtQuant">Nome  Do  Cliente </label>
                              <select name="IdCliente" class="form-control" id="IdCliente">
                                     <option value="0">---</option>
                                  <?php  $oPessit1= new CmdSql();
                               
                               foreach($oPessit1->listAllCliente() as $linha ){?> 
                                   
                            
                               <option value="<?php echo $linha->idCliente; ?>"><?php echo $linha->Nome; ?></option> 
                              
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
    <td class="col-md-3"><b>Cliente</b></td>
    <td class="col-md-3"><b>Material</b></td>
	<td class="col-md-1"><b>Micragem</b></td>
	<td style="width: 100px;"><b>Quantidade</b></td>
    <td style="width: 100px;"><b>Data da<br/> Venda</b></td>
    <td class="col-md-2"><b>Valor unitario</b></td>
    <td class="col-md-2"><b>Valor Total</b></td>
    </tr>
   
    <?php 
           $tVendas="NENHUMA ";
           $tquantP="ZERO"; 
           $tquantV="ZERO";
    
    
    ?>
    
	
   
    <?php  if($q->rowCount()>0){ 
    foreach($result as $linha){ ?>
<?php 


$ValorUni = $linha->ValorUnitario;
$ValorTotal = $linha->ValorTotal;

//$word_limit = 2; // Limite de palavras
//$string = $linha->Nome; // String que vamos limitar
//$words = explode(' ', $string); // Fazemos um explode para ter uma array com todas as palavras
//$resultado =  implode(' ', array_slice($words, 0, $word_limit)); // Fazemos um implode do array usando o limitador

?>
	
	
    <tr class="warning">
    <td class="col-md-3"><?php echo $linha->Nome; ?></td>
    <td class="col-md-3"><?php echo"Saco ".$linha->CorSaco." - ".$linha->TamanhoSaco?> Litros</td>
	<td class="col-md-1"><?php echo$linha->Micragem;?></td>
	<td style="width: 100px;"><?php echo$linha->Quantidade;?></td>
    <td style="width: 100px;"><?php echo implode("/",array_reverse(explode("-",$linha->DataVenda) ) );?></td>
    <td class="col-md-2">R$ <?php  echo number_format(round($ValorUni,2), 2, ',', '.');  ?></td>
    <td class="col-md-2">R$ <?php  echo number_format(round($ValorTotal,2), 2, ',', '.');  ?></td>
    </tr>
    <?php  
          $tVendas =$linha->tQuantV;
           $tquantP= $linha->tQuantP; 
           $tquantV = $linha->vTotal; 
     
        ?>
    
<?php   }  }?>
    
    
</table>

<table class="table table-condensed">

 <style>
       .red{color:#f00;} 
      </style> 
    
      
       
    <tr class="success">
    <td style="width: 105px;"><b><small>Total de vendas:</small></b></td>
    <td><span class="red"><?php echo$tVendas; ?></span></td>
     
    <td class="col-md-4"><div style="margin-left: 160px;"><b><small>Produtos Vendidos:</small></b></div></td>
    <td><span class="red"><div style=" margin-left: 20px;"><?php echo$tquantP; ?></div></span></td>
     
      <td class="col-md-3"><div style=" margin-left: 140px;"><b><small>Valor total:</small></b></td>
     
      <td class="col-md-2"><div style=" margin-left: 20px;"><span class="red">R$ <?php  echo number_format(round($tquantV,2), 2, ',', '.');     //$tquantV; ?>
          
           </span></div>
      </td>
    </tr>


</table>

                    
</div>
<div style="margin-left: 95%; margin-top: -10px; margin-bottom: 20px;">
<a title="Gerar PDF do relatório" onclick="window.open('ViewPdf/VendaPDF.php?PdfVenda=<?php echo$pdf_param;?>'); "   value="" ><img src="./export_pdf.png"></a> 
</div>
</div>
    
<?php   }//final If ?>             
                 
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