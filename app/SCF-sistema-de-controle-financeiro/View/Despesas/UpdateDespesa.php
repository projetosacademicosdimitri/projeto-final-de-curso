<?php include '../../config/session.php'; ?>
<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
 <?php ini_set('default_charset','UTF-8'); ?> 
<!DOCTYPE html>
<html>
    
 
    <title>SCA - Atualizar dados da Despesa</title>

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
  <link type="text/css" rel="stylesheet" charset="UTF-8" href="http://translate.googleapis.com/translate_static/css/translateelement.css"><script type="text/javascript" charset="UTF-8" src="http://translate.googleapis.com/translate_static/js/element/main_pt-BR.js"></script><script type="text/javascript" charset="UTF-8" src="http://translate.googleapis.com/translate_static/js/element/17/element_main.js"></script></head>

  <body>
      
       <?php
include_once '../../Model/Database/CmdSql.php';

$oPessit = new CmdSql;
$linhas = $oPessit->BuscaIdDespesa($_GET['id']);   
$id =$linhas['idDespesas'];
$vDescricao = $linhas['Descricao'];
$vDataDespesa = $linhas['DataDespesa'];

$vValorDespesa = number_format($linhas['Valor'], 2, ',', '.'); 

$vTipoDespesa = $linhas['Tipo']; 


?>
      
<?php include '../MasterPages/menu1.php'; ?>
	<!-- Final do menu:Fixed navbar -->
        
        
	
<div id="wrap">    
    <div class="container" style="width: 900px;">
	
		<form role="form" class="form-horizontal" action="../../Controller/editeDespesa.php" method="post" >
                <legend>
                    Atualizar dados da despesa
                </legend>
                    	
                    <div class="container" style="margin-left:30px; height:0 auto;">
						    <div class="form-group">
                             
							    <div class="col-md-9">
                                    <label for="txtDescDesp">DescriÃ§Ã£o</label>
                                    <input type="text" value="<?php echo $vDescricao; ?>" class="form-control" placeholder="DescriÃ§Ã£o da Despesa"name="txtDescDesp" id="DescDesp" required/>
							    </div>
                                							
                                <div class="col-md-3">
                                    
                                    <label for="txtDataDesp">Data da Despesa</label>
                                   
                             <input type="date" class="form-control"  name="txtDatadespesa"  id="DataDesp"  value="<?php echo $vDataDespesa;?>" >
                                </div>
                                                      
							   <div style="margin-top: 70px;">

								
      							<div class="col-md-3">
		         					<label for="txtValorDesp">Valor R$</label>
				    			    <input type="text" value="<?php echo $vValorDespesa; ?>"   onKeyUp="moeda(this)"   class="form-control" placeholder="Valor da Despesa" name="txtValorDespesa" id="ValorDesp">	
					    		</div> 
							   </div> 
                               							<div class="col-md-3">
							    <label >Tipo de Despesa</label>
                                                            
                                    <select name="txtDespesaTipo" class="form-control" required>
                                        <option  selected="" value="<?php echo $vTipoDespesa; ?>"><?php  echo$vTipoDespesa;?></option>
                                        <option value="">--</option>
                                        <option value="Dadai">Despesa Dadai</option>		
                                        <option  value="Ligeirinho">Despesa Ligeirinho</option>
                                        <option  value="Outras">Outras Despesa</option>
                                    </select>
							</div>
							
                                 </div>

							
							</div>
                            
					<!--/container dados do funcionÃ¡rio-->
                                      <?php if(isset($_GET['consulta'])){ ?> 
                                        <input type="hidden" name="C_id"  value="<?php echo $id;?>" />
                                        <?php } else {?>
                                      
                                        <input type="hidden" name="id"  value="<?php echo $id;?>" />
                                      <?php } ?>

                        <input type="hidden" name="pagina" value="<?php echo $_GET['pagina'];?>" />
                        
                        <div class="form-group">
                        <div class="col-md-2" style="margin-top: 10px; margin-left: 85%; margin-bottom: 20px;">
                        <button class="btn btn-primary prefix_10"  name="gravar" type="submit">Confirmar</button> </div></div>
					   
	            
                        
                       
						
      
	  </form>	 </div>
    </div> <!-- /container -->
</div>


 <script>

  
 function moeda(z){  
 v = z.value;
  v = v.replace(/\D/g,"")  //permite digitar apenas números
 v=v.replace(/[0-9]{12}/,"Valor muito grande")   //limita pra máximo 999.999.999,99
 v=v.replace(/(\d{1})(\d{8})$/,"$1.$2")  //coloca ponto antes dos últimos 8 digitos
 v=v.replace(/(\d{1})(\d{5})$/,"$1.$2")  //coloca ponto antes dos últimos 5 digitos
 v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2") //coloca virgula antes dos últimos 2 digitos
 z.value = v;
  }

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