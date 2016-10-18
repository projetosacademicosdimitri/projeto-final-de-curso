<?php include '../../config/session.php';?>
<!DOCTYPE html>
<html lang="en" class="translated-ltr"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="./bootstrap-3/assets/ico/favicon.png">

    <title>SCA - Atualizar dados da venda</title>
<link rel="shortcut icon" href="../Front_end/favicon.ico">
    <!-- Importa o Bootstrap core CSS -->
    <link href="../Front_end/bootstrap-3/dist/css/bootstrap.css" rel="stylesheet">

    <!-- TODAS AS PÃ?GINAS QUE TIVEREM RODAPÃ‰ E MENU SUPERIOR, TERÃ? QUE TER ESSAS IMPORTAÃ‡Ã•ES. Ã‰ UM CSS INDIVIDUAL. -->
   <link href="../Front_end/bootstrap-3/css_individuais/navbar-fixed-top.css" rel="stylesheet">
    <link href="../Front_end/bootstrap-3/css_individuais/sticky-footer-navbar.css" rel="stylesheet">
	

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
<
	<script src="../Front_end/js/jquery-1.8.0.min.js"></script> 
    <script src="../Front_end/js/jquery.maskedinput.js"></script>
  <link type="text/css" rel="stylesheet" charset="UTF-8" href="http://translate.googleapis.com/translate_static/css/translateelement.css"><script type="text/javascript" charset="UTF-8" src="http://translate.googleapis.com/translate_static/js/element/main_pt-BR.js"></script><script type="text/javascript" charset="UTF-8" src="http://translate.googleapis.com/translate_static/js/element/17/element_main.js"></script></head>

  <body>
      
      <?php
include_once '../../Model/Database/CmdSql.php';

$oPessit = new CmdSql;
$linhas = $oPessit->BuscaIdVenda($_GET['id']);   
$id = $linhas['idVenda'];

$vDataVenda = $linhas['DataVenda'];
$vQuantidade = $linhas['Quantidade'];                                
$vValorUnitario =  number_format($linhas['ValorUnitario'], 2, ',', '.');
$vValorTotal = number_format($linhas['ValorTotal'], 2, ',', '.');  
$idCliente = $linhas['idCliente'];
$cliente = $linhas['Nome'];
$vMicragem = $linhas['Micragem'];

$vCorSaco = $linhas['CorSaco'];
$vTamanhoSaco = $linhas['TamanhoSaco'];
$vIdSaco = $linhas['IdSaco'];


?>

  <?php  include'../MasterPages/menu1.php';?>
	<!-- Final do menu:Fixed navbar -->
	
<div id="wrap">    
    <div class="container" style="width: 900px;">
	
<script type="text/javascript">
	jQuery(function($){
	       
	       $("#txtMicra").mask("9,99");
           
                 
	});
	</script>
		<form role="form" class="form-horizontal" action="../../Controller/editeVenda.php" method="post" >
                <legend>
                    Atualizar dados da venda
                </legend>
                    	
                    <div class="container" style="margin-left:30px; height:0 auto;">
			<div class="form-group">
                             
				<div class="col-md-6">
                                   
                                <label >Material</label>
                                    <select name="txtIdSaco" class="form-control">
                                        		<option value="<?php  echo $vIdSaco; ?>">Saco <?php echo $vCorSaco; ?> - <?php echo $vTamanhoSaco; ?> Litros</option>
							
                                                        <?php  $oPessite = new CmdSql();
                               
                               foreach($oPessite->listAllSaco() as $linha ){?> 
                                   
                            
                               <option value="<?php echo $linha->IdSaco; ?>"><?php echo $linha->NomeSaco; ?> - Cor: <?php echo $linha->CorSaco; ?> - Litros: <?php echo $linha->TamanhoSaco; ?></option> 
                              
                                    <?php }?>
                               </select>
                                
                                </div>
					
                            
				<div class="col-md-3">
                                    <label for="DateComp">Data da Venda</label>
                                
                                    <input type="date" value="<?php echo $vDataVenda; ?>" class="form-control" name="txtDateVenda" id="DateVenda">
				</div>
                               

 <div class="col-md-3">
                            <label for="txtQuant">Nome  Do  Cliente  </label>
                              <select name="IdCliente" class="form-control" id="IdCliente">
                                  
                                  <option  value="<?php  echo $idCliente; ?>"> <?php echo $cliente; ?> </option>
                                   
                           <option value="0" >---------</option>
                                  

                                  <?php  $oPessit = new CmdSql();
                               
                               foreach($oPessit->listAllCliente() as $linha ){?> 
                                   
                            
                               <option value="<?php echo $linha->idCliente; ?>"><?php echo $linha->Nome; ?></option> 
                              
                                    <?php }?>       
                               
                              
                              </select>
                            
                            </div>							   
                                                      
		         <div style="margin-top: 70px;">
							
    
                             
                             
                             
                             
                                     
                             
                             
                             
                             <div class="col-md-2">
                                    <label for="txtMicra">Micragem</label>
                                    <input type="text"  value="<?php echo $vMicragem; ?>" class="form-control" placeholder="Micragem" name="txtMicragem" id="txtMicra">
                                </div>
                             
                             <div class="col-md-3">
                                    <label for="txtQuant">Quantidade</label>
                                    <input type="text" class="form-control" value="<?php echo $vQuantidade; ?>" placeholder="Quantidade" name="txtQuantVenda" id="txtQuant">
                                </div>
								
      			<div class="col-md-3">
		         	<label for="txtValorUni">Valor unitÃ¡rio</label>
				<input type="text" class="form-control"  onblur="mult();" onKeyUp="moeda(this)"   value="<?php echo $vValorUnitario; ?>" placeholder="Valor unitÃ¡rio" name="txtValorUnitario" id="txtValorUni">	
			</div> 
			</div> 
							
							
			<div class="col-md-3">
	        		<label for="txtValorTot">Valor Total</label>
                                <input type="text" class="form-control" value="<?php echo $vValorTotal; ?>" placeholder="Valor Total" name="txtValorTotal" id="txtValorTot">
			</div>
							
							
                        </div>
		</div><!--/container dados da compra-->

                        
                   
                   <?php if(isset($_GET['consulta'])){ ?> 
                                        <input type="hidden" name="C_id"  value="<?php echo $id;?>" />
                                        <?php } else {?>
                                      
                                        <input type="hidden" name="id"  value="<?php echo $id;?>" />
                                      <?php } ?>
									  
              <input type="hidden" name="pagina"  value="<?php echo $_GET['pagina'];?>" />
                
                

                        <div class="form-group">
                        <div class="col-md-2" style="margin-top: 10px; margin-left: 85%; margin-bottom: 20px;">
                        <button class="btn btn-primary prefix_10" name="gravar" type="submit"   onclick=" return ValidForm(); ">GRAVAR</button> </div></div>
					   
	            
                        
                       
						
        </form>	 
    </div> <!-- /container -->
</div>




<script>
  function ValidForm()
   {
        if(document.getElementById('IdCliente').value  == 0 )
         {alert('Selecione o nome  do Cliente');   
         return false;  
         }
  else
    {
        return true;
    }  
    
   }
 




	function moeda(z){  
		v = z.value;
		v=v.replace(/\D/g,"")  //permite digitar apenas números
	v=v.replace(/[0-9]{12}/,"Valor muito grande")   //limita pra máximo 999.999.999,99
	v=v.replace(/(\d{1})(\d{8})$/,"$1.$2")  //coloca ponto antes dos últimos 8 digitos
	v=v.replace(/(\d{1})(\d{5})$/,"$1.$2")  //coloca ponto antes dos últimos 5 digitos
	v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2")	//coloca virgula antes dos últimos 2 digitos
		z.value = v;
	}




function mult(){

unitario = window.document.getElementById("txtValorUni");
quant = window.document.getElementById("txtQuant");
 if(unitario.value =="" || quant.value=="")
    { alert('Preecha o  valor Unitario \n e a Quantidade'); } 
else
{  

RePonto = new RegExp("\\.","g");
ReVirgula = new RegExp("\\,","g");

strValorUnitario = unitario.value;
 strValorUnitario = strValorUnitario.replace(RePonto, "");
 strValorUnitario = strValorUnitario.replace(ReVirgula, "");


  vFinal = (quant.value * strValorUnitario); 
 
  //vFinal = (vFinal / 100);

  


window.document.getElementById("txtValorTot").value = vFinal ;

moeda(window.document.getElementById("txtValorTot"));
}






}// FINAL   FUNCTION



</script>








    

<!-- Inicio do rodapÃ© -->
   <?php include '../MasterPages/footer.php'; ?>
	<!-- Final do rodapÃ© -->
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../Front_end/bootstrap-3/assets/js/jquery.js"></script>
    <script src="../Front_end/bootstrap-3/dist/js/bootstrap.js"></script><div id="goog-gt-tt" class="goog-tooltip skiptranslate" dir="ltr" style="visibility: hidden; left: 632px; top: 218px; display: none;"><div style="padding: 8px;"><div><div class="logo"><img src="https://www.google.com/images/icons/product/translate-32.png" width="20" height="20"></div></div></div><div class="top" style="padding: 8px; float: left; width: 100%;"><h1 class="title gray">Texto original</h1></div><div class="middle" style="padding: 8px;"><div class="original-text">This example is a quick exercise to illustrate how the default, static and fixed to top navbar work.</div></div><div class="bottom" style="padding: 8px;"><div class="activity-links"><span class="activity-link">Sugira uma traduÃ§Ã£o melhor</span><span class="activity-link"></span></div><div class="started-activity-container"><hr style="color: #CCC; background-color: #CCC; height: 1px; border: none;"><div class="activity-root"></div></div></div><div class="status-message" style="display: none; opacity: 0;"></div></div>

</body></html>