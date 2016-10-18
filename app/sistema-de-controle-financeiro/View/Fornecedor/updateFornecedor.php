<!DOCTYPE html>
 <?php include'../../config/session.php';
 
 include_once '../../Model/Database/CmdSql.php';
 
 $oPessit =  new CmdSql();
$linhas =  $oPessit->__buscIdFornecedor($_GET['id']);

 $vNome =  $linhas['Nome']; 
$id = $linhas['idFornecedor'];
    $vTel = $linhas['Telefone']; 

    $vNomeContato = $linhas['Contato']; 
 
 ?>
    
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SCA - Atualizar dados do Fornecedor</title>
		<link rel="shortcut icon" href="../Front_end/favicon.ico">
   <link href="../Front_end/bootstrap-3/dist/css/bootstrap.css" rel="stylesheet">

    <!-- TODAS AS PÁGINAS QUE TIVEREM RODAPÉ E MENU SUPERIOR, TERÁ QUE TER ESSAS IMPORTAÇÕES. É UM CSS INDIVIDUAL. -->
    <link href="../Front_end/bootstrap-3/css_individuais/navbar-fixed-top.css" rel="stylesheet">
    <link href="../Front_end/bootstrap-3/css_individuais/sticky-footer-navbar.css" rel="stylesheet">
	
	

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
	<script src="../Front_end/js/jquery-1.8.0.min.js"></script> 
    <script src="../Front_end/js/jquery.maskedinput.js"></script> 
  <link type="text/css" rel="stylesheet" charset="UTF-8" href="http://translate.googleapis.com/translate_static/css/translateelement.css"><script type="text/javascript" charset="UTF-8" src="http://translate.googleapis.com/translate_static/js/element/main_pt-BR.js"></script><script type="text/javascript" charset="UTF-8" src="http://translate.googleapis.com/translate_static/js/element/17/element_main.js"></script></head>
</head>
  <body>

   <?php include '../MasterPages/menu1.php'; ?>
	<!-- Final do menu:Fixed navbar -->
     
     
     
     
     
     
     
     
     <div id="wrap">    
    <div class="container" style="width: 900px;">
	<script type="text/javascript">  
    
	jQuery(function($){
	       
	       $("#txtTelFor").mask("(99) 9999-9999");
          
	});
	</script>
        <form role="form" class="form-horizontal" action="../../Controller/editeFornecedor.php" method="post" >
                <legend>
                    Atualizar dados do Fornecedor
                </legend>
                    	
                    <div class="container" style="margin-left:30px; height:0 auto;">
						    <div class="form-group">
                             
							    <div class="col-md-9">
                                    <label for="txtNomFor">Nome </label>
                                    <input type="text" class="form-control" placeholder="Nome Completo"  value ="<?php  echo $vNome ?>"name="txtNomFornecedor" id="txtNomFor" required/>
							    </div>
								
								<div class="col-md-3">
		         					<label for="txtTelFor">Telefone</label>
				    			    <input type="text" class="form-control"  placeholder="Telefone"  value="<?php echo $vTel;?>" name="txtTelFornecedor" id="txtTelFor">	
					    		</div> 
								
                                                      
							   <div style="margin-top: 70px;">
							
                                <div class="col-md-9">
                                    <label for="txtContatoFor">Nome do contato</label>
                                    <input type="text" class="form-control"  placeholder="Nome do contato" value="<?php echo$vNomeContato;?>" name="txtNomeContatoFor" id="txtContatoFor">
                                </div>
								
      							
							   </div> 
							
					
                            </div>
					</div><!--/container dados do funcionário-->

                       
                                       <?php if(isset($_GET['consulta'])){ ?> 
                                        <input type="hidden" name="C_id"  value="<?php echo $id;?>" />
                                        <?php } ?>
                                        
                                       <?php if(isset($_GET['updateinativos'])){?>
                                        <input type="hidden" name="Li_id"  value="<?php echo $id;?>" />
                                       <?php } 
                                       else { ?>
                                        <input type="hidden" name="id"  value="<?php echo $id;?>" />
                                      <?php } ?>       
                                        
                          <input type="hidden" name="pagina"  value="<?php echo $_GET['pagina'];?>" />
                       

                        <div class="form-group">
                        <div class="col-md-2" style="margin-top: 10px; margin-left: 87%; margin-bottom: 20px;">
                            <button class="btn btn-primary prefix_10" name="Gravar" type="submit">Gravar</button> </div></div>
					   
	            
                        
                       
						
        </form>	 
    </div> <!-- /container -->
    </div>
<?php include '../MasterPages/footer.php';  ?>
   <script src="../Front_end/bootstrap-3/assets/js/jquery.js"></script>
    <script src="../Front_end/bootstrap-3/dist/js/bootstrap.js"></script><div id="goog-gt-tt" class="goog-tooltip skiptranslate" dir="ltr" style="visibility: hidden; left: 632px; top: 218px; display: none;"><div style="padding: 8px;"><div><div class="logo"><img src="https://www.google.com/images/icons/product/translate-32.png" width="20" height="20"></div></div></div><div class="top" style="padding: 8px; float: left; width: 100%;"><h1 class="title gray">Texto original</h1></div><div class="middle" style="padding: 8px;"><div class="original-text">This example is a quick exercise to illustrate how the default, static and fixed to top navbar work.</div></div><div class="bottom" style="padding: 8px;"><div class="activity-links"><span class="activity-link">Sugira uma tradução melhor</span><span class="activity-link"></span></div><div class="started-activity-container"><hr style="color: #CCC; background-color: #CCC; height: 1px; border: none;"><div class="activity-root"></div></div></div><div class="status-message" style="display: none; opacity: 0;"></div></div>
    <script src="../Front_end/js/jquery-1.8.0.min.js"></script> 
    <script src="../Front_end/js/jquery.maskedinput.js"></script>  
    
 </body>
</html>

