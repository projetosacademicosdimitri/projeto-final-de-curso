<?php include '../../config/session.php'; ?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="./bootstrap-3/assets/ico/favicon.png">

    <title>SCA - Cadastro de Cheques</title>
    <link rel="shortcut icon" href="../Front_end/favicon.ico">
    <!-- Importa o Bootstrap core CSS -->
    <link href="../Front_end/bootstrap-3/dist/css/bootstrap.css" rel="stylesheet">

    <!-- TODAS AS PÁGINAS QUE TIVEREM RODAPÉ E MENU SUPERIOR, TERÁ QUE TER ESSAS IMPORTAÇÕES. É UM CSS INDIVIDUAL. -->
    <link href="../Front_end/bootstrap-3/css_individuais/navbar-fixed-top.css" rel="stylesheet">
	<link href="../Front_end/bootstrap-3/css_individuais/sticky-footer-navbar.css" rel="stylesheet">
	
	<script src="../Front_end/Toastr/jquery-1.9.1.min.js"></script>
    <link href="../Front_end/Toastr/toastr.min.css" rel="stylesheet"/>
    <script src="../Front_end/Toastr/toastr.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
	<script src="../Front_end/js/jquery-1.8.0.min.js"></script> 
    <script src="../Front_end/js/jquery.maskedinput.js"></script>
  <link type="text/css" rel="stylesheet" charset="UTF-8" href="http://translate.googleapis.com/translate_static/css/translateelement.css"><script type="text/javascript" charset="UTF-8" src="http://translate.googleapis.com/translate_static/js/element/main_pt-BR.js"></script><script type="text/javascript" charset="UTF-8" src="http://translate.googleapis.com/translate_static/js/element/17/element_main.js"></script></head>

  <body>

  <script type="text/javascript">
    <?php if(isset($_GET['ok'])){ ?>
   


     toastr.success("Cheque cadastrado.","Sucesso!"); //parametros: 1ºmensagem,2º titulo
 
   <?php } ?>
      
    </script>
  
 <?php include '../MasterPages/menu1.php';  ?>
	<!-- Final do menu:Fixed navbar -->
	
<div id="wrap">    
    <div class="container" style="width: 900px;">
	<script type="text/javascript">  
    
	jQuery(function($){
	       
	       $("#NumCheque").mask("999999");
           
                 
          
	});
	</script>
        <form role="form" class="form-horizontal" action="../../Controller/cadCheque.php" method="post" >
                <legend>
                    Cadastro Cheque
                </legend>
                    	
                    <div class="container" style="margin-left:30px; height:0 auto;">
						    <div class="form-group">
                             
							    <div class="col-md-9">
                                    <label for="txtNomecheque">Nome </label>
                                    <input type="text" class="form-control" placeholder="Nome Completo" name="txtNome" id="NomeCheque" required/>
							    </div>
								
							    <div class="col-md-3">
                                    <label for="txtNumeroCheque">Número</label>
                                    <input type="text" class="form-control" placeholder="Numero do cheque" name="txtNumCheque" id="NumCheque" required>
                                </div> 
                                                      
							   <div style="margin-top: 70px;">
							
                                <div class="col-md-3">
                                    <label for="txtDataEntrada">Data de Entrada</label>
                                    <input type="date" class="form-control" name="txtDataEntra" id="DataEntrada">
                                </div>
								
      							<div class="col-md-3">
		         					<label for="txtDataCompenssacao">Data de Compensação</label>
				    			    <input type="date" class="form-control" name="txtDataCompens" id="txtDataCompenssacao">	
					    		</div> 
							   </div> 
							
							
							    <div class="col-md-3">
	        					
                                                                
                                                                <label for="txtChequeTipo">Tipo</label>
                                                                <select required name="tpCheque" class="form-control">
                                                              
                                                              <option value="">Selecione</option>     
                                                              <option value="1">Cheque ao portador</option>		
                                                              <option  value="2">Cheque nominal</option>
                                                              <option value="3">Cheque cruzado</option>
                                                               <option value="4">Cheque pré-datado</option>
                                                               <option value="5">Cheque especial</option> 
                                                               <option value="6">Cheque administrativo</option>
                                                               <option value="7">OUTROS</option>  
                                                                </select>
					    		
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            </div>
															
															<div class="col-md-3">
                                    <label for="txtValorChe">Valor</label>
                                    <input type="text" class="form-control" placeholder="Numero do cheque" name="txtValorCheque" id="txtValorChe" onKeyUp="moeda(this)" required>
                                </div>
							
							
                            </div>
					</div><!--/container dados do funcionário-->

                       

                        <div class="form-group">
                        <div class="col-md-2" style="margin-top: 10px; margin-left: 85%; margin-bottom: 20px;">
                        <button class="btn btn-primary prefix_10" type="submit" name='Gravar'>Confirmar</button> </div></div>
					   
	            
                        
                       
						
        </form>	 
    </div> <!-- /container -->
</div>

    

<!-- Inicio do rodapé -->
   
	<!-- Final do rodapé -->
	

<?php include '../MasterPages/footer.php'; ?>
  
<script src="../Front_end/bootstrap-3/assets/js/jquery.js"></script>
    <script src="../Front_end/bootstrap-3/dist/js/bootstrap.js"></script><div id="goog-gt-tt" class="goog-tooltip skiptranslate" dir="ltr" style="visibility: hidden; left: 632px; top: 218px; display: none;"><div style="padding: 8px;"><div><div class="logo"><img src="https://www.google.com/images/icons/product/translate-32.png" width="20" height="20"></div></div></div><div class="top" style="padding: 8px; float: left; width: 100%;"><h1 class="title gray">Texto original</h1></div><div class="middle" style="padding: 8px;"><div class="original-text">This example is a quick exercise to illustrate how the default, static and fixed to top navbar work.</div></div><div class="bottom" style="padding: 8px;"><div class="activity-links"><span class="activity-link">Sugira uma tradução melhor</span><span class="activity-link"></span></div><div class="started-activity-container"><hr style="color: #CCC; background-color: #CCC; height: 1px; border: none;"><div class="activity-root"></div></div></div><div class="status-message" style="display: none; opacity: 0;"></div></div>
        <script>
		
		function moeda(z){  
		v = z.value;
		v=v.replace(/\D/g,"")  //permite digitar apenas números
	v=v.replace(/[0-9]{12}/,"Valor muito grande")   //limita pra máximo 999.999.999,99
	v=v.replace(/(\d{1})(\d{8})$/,"$1.$2")  //coloca ponto antes dos últimos 8 digitos
	v=v.replace(/(\d{1})(\d{5})$/,"$1.$2")  //coloca ponto antes dos últimos 5 digitos
	v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2")	//coloca virgula antes dos últimos 2 digitos
		z.value = v;
	}
		
		</script>
        
        
</body></html>