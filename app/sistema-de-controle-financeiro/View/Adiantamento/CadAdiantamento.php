<?php include '../../config/session.php';
 include_once '../../Model/Database/CmdSql.php';


?>
<!DOCTYPE html>
<html lang="en" class="translated-ltr"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="./bootstrap-3/assets/ico/favicon.png">

    <title>SCA - Cadastro de adiantamento</title>
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
	
	<script src="../Front_end/Toastr/jquery-1.9.1.min.js"></script>
    <link href="../Front_end/Toastr/toastr.min.css" rel="stylesheet"/>
    <script src="../Front_end/Toastr/toastr.min.js"></script>
  <link type="text/css" rel="stylesheet" charset="UTF-8" href="http://translate.googleapis.com/translate_static/css/translateelement.css"><script type="text/javascript" charset="UTF-8" src="http://translate.googleapis.com/translate_static/js/element/main_pt-BR.js"></script><script type="text/javascript" charset="UTF-8" src="http://translate.googleapis.com/translate_static/js/element/17/element_main.js"></script></head>

  <body>

 <?php include '../MasterPages/menu1.php'; ?>
    
	<!-- Final do menu:Fixed navbar -->
	
<div id="wrap">    
    <div class="container" style="width: 900px;">
	
	<script type="text/javascript">
    <?php if(isset($_GET['ok'])){ ?>
   
$options = {
  "closeButton": false,
  "debug": false,
  "positionClass": "toast-top-right",
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
};

     toastr.success("Adiantamento cadastrado.","Sucesso!",$options); //parametros: 1ºmensagem,2º titulo,3º(opcional) as opções do alerta
 
   <?php } ?>
      
    </script>
	
		<form role="form" class="form-horizontal" action="../../Controller/CadAdiantamento.php" method="post" >
                <legend>
                    Cadastro de adiantamento
                </legend>
                    	
                    <div class="container" style="margin-left:30px; height:0 auto;">
			<div class="form-group">
                             
				
                            
                            
                            
                            
                           <div class="col-md-6">
                                    <label for="txtNomFunc">Funcionário</label>
                                    
                                    <select name="IdFunc" class="form-control" id="IdFuncionario">
                                     <option value="0">---</option>
                                  <?php  $oPessit = new CmdSql();
                               
                               foreach($oPessit-> __listAllFuncionarioAtivo() as $linha ){?> 
                                   
                            
                               <option value="<?php echo $linha->idFunc; ?>"><?php echo $linha->Nome; ?></option> 
                              
                                    <?php }?>       
                               
                              
                              </select>
                                    
				 </div>
                            
								
				<div class="col-md-3">
                                    <label for="DateAdiantamento">Data do adiantamento</label>
                                    <input type="date" class="form-control" name="txtDataAdiantamento" id="DateAdiantamento">
				</div> 
                          
                        
                            
                           <div class="col-md-3">
		         	    <label for="txtValorLiquido">Valor do adiantamento </label>
				    <input type="text" class="form-control"  required   placeholder="Valor do adiantamento" name="txtValorAdiantamento" id="txtValorAdiantamento" onKeyUp="moeda(this);" /> 
				</div>
				
							
							
                           </div>
			</div><!--/container dados da Venda-->

                        
                       

                        <div class="form-group">
                        <div class="col-md-2" style="margin-top: 10px; margin-left: 85%;">
                            <button class="btn btn-primary prefix_10" type="submit" onclick=" return ValidForm();">Confirmar</button> 
                        </div>
                        
                        </div>
					   
	            
                        
                       
						
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
		v=v.replace(/\D/g,"")  //permite digitar apenas n�meros
	v=v.replace(/[0-9]{12}/,"Valor muito grande")   //limita pra m�ximo 999.999.999,99
	v=v.replace(/(\d{1})(\d{8})$/,"$1.$2")  //coloca ponto antes dos �ltimos 8 digitos
	v=v.replace(/(\d{1})(\d{5})$/,"$1.$2")  //coloca ponto antes dos �ltimos 5 digitos
	v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2")	//coloca virgula antes dos �ltimos 2 digitos
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
<!-- Inicio do rodapé -->
    <?php  include'../MasterPages/footer.php';?>
	<!-- Final do rodapé -->
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
     <script src="../Front_end/bootstrap-3/assets/js/jquery.js"></script>
    <script src="../Front_end/bootstrap-3/dist/js/bootstrap.js"></script><div id="goog-gt-tt" class="goog-tooltip skiptranslate" dir="ltr" style="visibility: hidden; left: 632px; top: 218px; display: none;"><div style="padding: 8px;"><div><div class="logo"><img src="https://www.google.com/images/icons/product/translate-32.png" width="20" height="20"></div></div></div><div class="top" style="padding: 8px; float: left; width: 100%;"><h1 class="title gray">Texto original</h1></div><div class="middle" style="padding: 8px;"><div class="original-text">This example is a quick exercise to illustrate how the default, static and fixed to top navbar work.</div></div><div class="bottom" style="padding: 8px;"><div class="activity-links"><span class="activity-link">Sugira uma tradução melhor</span><span class="activity-link"></span></div><div class="started-activity-container"><hr style="color: #CCC; background-color: #CCC; height: 1px; border: none;"><div class="activity-root"></div></div></div><div class="status-message" style="display: none; opacity: 0;"></div></div>

</body></html>