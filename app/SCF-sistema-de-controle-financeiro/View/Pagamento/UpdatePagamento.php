<?php include '../../config/session.php';?>
<!DOCTYPE html>
<html lang="en" class="translated-ltr"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="./bootstrap-3/assets/ico/favicon.png">

    <title>SCA - Atualizar dados do pagamento</title>
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
$vDataPagamento = $linhas['DataPgmto'];
$vSalarioBase = number_format($linhas['SalarioFunc'], 2, ',', '.');
$vHoraExtra = number_format($linhas['HoraExtra'], 2, ',', '.');
$vValorTotal = number_format($linhas['ValorTotal'], 2, ',', '.');
$vAdiantamento = number_format($linhas['Adiantamento'], 2, ',', '.');
$vDescontos = number_format($linhas['Descontos'], 2, ',', '.');
$vValorLiquido = number_format($linhas['ValorLiquido'], 2, ',', '.');
$vIdFunc = $linhas['idFunc'];



?>

  <?php  include'../MasterPages/menu1.php';?>
	<!-- Final do menu:Fixed navbar -->
	
<div id="wrap">    
    <div class="container" style="width: 900px;">
	
		<form role="form" class="form-horizontal"    action="../../Controller/editePagamento.php"  method="post" >
                <legend>
                    Atualizar dados do pagamento
                </legend>
                    	
                    <div class="container" style="margin-left:30px; height:0 auto;">
			<div class="form-group">
                   
                            <div class="col-md-9">
                                    <label for="txtNomFunc">Funcionário</label>
                                    <input type="text" disabled value="<?php echo $vNomeFunc; ?>" class="form-control" name="txtNomFunc" id="NomeFunc">
                                   <input type="hidden" name="vIdFunc"  value="<?php echo $vIdFunc;?>" />
                                   
				 </div>
								



				<div class="col-md-3">
                                    <label for="DataVenda">Data do pagamento</label>
                                    <input type="date" value="<?php echo $vDataPagamento; ?>" class="form-control" name="txtDataPagamento" id="DataPagamento">
				</div> 
                          
                        
                            
		        <div style="margin-top: 70px;"> 
							
                               <div class="col-md-3">
		         	    <label for="txtSalarioBase">Salário Base</label>
				    <input type="text" value="<?php echo $vSalarioBase; ?>" disabled  class="form-control"  required   placeholder="Salário base" name="txtSalBase" id="txtSalarioBase" onKeyUp="moeda(this);" /> 
				    <input type="hidden" name="vSalarioBase"  value="<?php echo $vSalarioBase; ?>" />
                               </div>
                            
                             
                                <div class="col-md-3">
		         	    <label for="txtHoraExtra">Hora Extra</label>
				    <input type="text" value="<?php echo $vHoraExtra; ?>" class="form-control"    onblur="Soma();"    required   placeholder="Hora extra" name="txtHoraExt" id="txtHoraExtra" onKeyUp="moeda(this);" />
                                    
                              </div> 
                            
                       
        
        <div class="col-md-3">
                  <label for="txtValorTotal">Valor Total +</label>

           <input type="text" class="form-control" value="<?php echo $vValorTotal; ?>"  required   placeholder="Valor Total" name="txtValorTot" id="txtValorTotal" onKeyUp="moeda(this);" > 
        </div>        			
                           </div>
                            <div style="margin-top: 140px;"> 
                                
             <div class="col-md-3">
                  <label for="txtAdiantamento">Adiantamento </label>
            <input type="text" class="form-control" value="<?php echo $vAdiantamento; ?>"  required   placeholder="Adiantamento" name="txtAdianta" id="txtAdiantamento" onKeyUp="moeda(this);" > 
        </div>           
                             
           <div class="col-md-3">
                  <label for="txtDescontos">Descontos</label>
            <input type="text" class="form-control" value="<?php echo $vDescontos; ?>"   required   onblur="Sub();"  placeholder="Descontos" name="txtDescont" id="txtDescontos" onKeyUp="moeda(this);" > 
        </div>
               


               
                                <div class="col-md-3">
		         	    <label for="txtValorLiquido">Valor liquido - </label>
				    <input type="text" class="form-control" value="<?php echo $vValorLiquido; ?>"  required   placeholder="Valor Liquido" name="txtValorLiqui" id="txtValorLiquido" onKeyUp="moeda(this);" > 
				</div>
                                
                                </div>
                            
                            
			</div><!--/container dados da Venda-->

                       <?php if(isset($_GET['consulta'])){ ?> 
                                        <input type="hidden" name="C_id"  value="<?php echo $id;?>" />
                                        <?php } else {?>
                                      
                                        <input type="hidden" name="id"  value="<?php echo $id;?>" />
                                      <?php } ?>
									  
              <input type="hidden" name="pagina"  value="<?php echo $_GET['pagina'];?>" />

                        
                        
                        </div>
                    <div class="form-group">
                        <div class="col-md-2" style="margin-top: 10px; margin-left: 85%;">
                            <button class="btn btn-primary prefix_10" name="gravar" type="submit" onclick="return ValidForm();" >GRAVAR</button> 
                        </div>
                    </div>
					   
	     
						
        </form>	 
     <!-- /container -->
</div>
    </div>

 <script>
  function ValidForm()
   {
        if(document.getElementById('IdFuncionario').value  == 0 )
         {alert('Selecione o nome  do Funcionário');   
         return false;  
         }
  return true;
   }
 




	function moeda(z){  
		v = z.value;
		v=v.replace(/\D/g,"");  //permite digitar apenas n�meros
	v=v.replace(/[0-9]{12}/,"Valor muito grande");   //limita pra m�ximo 999.999.999,99
	v=v.replace(/(\d{1})(\d{8})$/,"$1.$2");  //coloca ponto antes dos �ltimos 8 digitos
	v=v.replace(/(\d{1})(\d{5})$/,"$1.$2");  //coloca ponto antes dos �ltimos 5 digitos
	v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2");	//coloca virgula antes dos �ltimos 2 digitos
		z.value = v;
	}



function moedaPorValor(v){  
		v=v.replace(/\D/g,"");  //permite digitar apenas n�meros
	v=v.replace(/[0-9]{12}/,"Valor muito grande");   //limita pra m�ximo 999.999.999,99
	v=v.replace(/(\d{1})(\d{8})$/,"$1.$2");  //coloca ponto antes dos �ltimos 8 digitos
	v=v.replace(/(\d{1})(\d{5})$/,"$1.$2");  //coloca ponto antes dos �ltimos 5 digitos
	v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2");	//coloca virgula antes dos �ltimos 2 digitos
		return  v;
	}



function Soma(){

	var   s =  window.document.getElementById("txtSalarioBase");//pegando o input como  objeto 
        var   h =  window.document.getElementById("txtHoraExtra");

          
  
 
   if(h.value==""||h.value=="null")
      h.value = 0;   
   
         
   RePonto = new RegExp("\\.","g");
   ReVirgula = new RegExp("\\,","g");

   strS = s.value;// tirando todas  as  virgulas  e  pontos 
   strS = strS.replace(RePonto,"");
   strS = strS.replace(ReVirgula,"");

   strH = h.value;// tirando todas  as  virgulas  e  pontos 
   strH = strH.replace(RePonto, "");
   strH = strH.replace(ReVirgula, "");
 
        s = parseFloat(strS); 
        h = parseFloat(strH);
              
     
 window.document.getElementById("txtValorTotal").value =( s+h );
  moeda(window.document.getElementById("txtValorTotal") );

}// FINAL   FUNCTION





function Sub(){
  var   v =  window.document.getElementById("txtValorTotal");
  var   a =  window.document.getElementById("txtAdiantamento");//pegando os inputs como  objeto 
  var   d =  window.document.getElementById("txtDescontos");
    

if(v.value ==""||v.value==null)
 v.value =0;
else if(a.value==""||a.value==null)
a.value = 0; 
else if(d.value==""||d.value==null)      
d.value =0;    

  // tirando todas  as  virgulas  e  pontos
   RePonto = new RegExp("\\.","g");
   ReVirgula = new RegExp("\\,","g");

   strV= v.value; 
   strV = strV.replace(RePonto,"");
   strV= strV.replace(ReVirgula,""); 

   strA = a.value; 
   strA = strA.replace(RePonto,"");
   strA = strA.replace(ReVirgula,"");

   strD = d.value; 
   strD = strD.replace(RePonto, "");
   strD = strD.replace(ReVirgula, "");
 
        a = parseFloat(strA); 
        d = parseFloat(strD);
        v = parseFloat(strV);
              
     

 if( (a+d)> v )
{ alert(' ERRO VALOR DO DESCONTO\nMAIOR QUE  VALOR TOTAL');     
}
else 
{
var  vl = v - (a+d);
  window.document.getElementById("txtValorLiquido").value = vl;
  moeda(window.document.getElementById("txtValorLiquido") );

}

}//Fim  function












</script>
<!-- Inicio do rodape -->
    <?php  include'../MasterPages/footer.php';?>
	<!-- Final do rodapé -->
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
     <script src="../Front_end/bootstrap-3/assets/js/jquery.js"></script>
    <script src="../Front_end/bootstrap-3/dist/js/bootstrap.js"></script><div id="goog-gt-tt" class="goog-tooltip skiptranslate" dir="ltr" style="visibility: hidden; left: 632px; top: 218px; display: none;"><div style="padding: 8px;"><div><div class="logo"><img src="https://www.google.com/images/icons/product/translate-32.png" width="20" height="20"></div></div></div><div class="top" style="padding: 8px; float: left; width: 100%;"><h1 class="title gray">Texto original</h1></div><div class="middle" style="padding: 8px;"><div class="original-text">This example is a quick exercise to illustrate how the default, static and fixed to top navbar work.</div></div><div class="bottom" style="padding: 8px;"><div class="activity-links"><span class="activity-link">Sugira uma tradução melhor</span><span class="activity-link"></span></div><div class="started-activity-container"><hr style="color: #CCC; background-color: #CCC; height: 1px; border: none;"><div class="activity-root"></div></div></div><div class="status-message" style="display: none; opacity: 0;"></div></div>
    <script>
function populaSalarioByFuncionario(){


$.get( "http://localhost/SCF/Controller/hendler_ComBo_Pag.php?id_func="+$("#IdFuncionario").val(), function( data ) {
  
//tratar aqui
data = moedaPorValor(data);


//selecionado   um novo    Funcionario  os campos   voltam  ao  estado inicial

$("#txtSalarioBase").val(data);
$("#txtValorTotal").val(""); 
$("#txtAdiantamento").val(""); 
$("#txtDescontos").val(""); 
$("#txtHoraExtra").val(""); 
$("#txtValorLiquido").val(""); 

 
});

   







}

</script>
</body></htm