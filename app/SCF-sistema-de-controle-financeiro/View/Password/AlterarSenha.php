<?php 
/* testando  a autenticação  do  usuario */

include '../../config/session.php';



$login = $_SESSION['Login'];

?>



<html lang="br" class="translated-ltr"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    
    
    <title>SCA - Alterar senha</title>
<link rel="shortcut icon" href="../Front_end/favicon.ico">
    <!-- Importa o Bootstrap core CSS -->
    <link href="../Front_end/bootstrap-3/dist/css/bootstrap.css" rel="stylesheet">

    <!-- TODAS AS PÁGINAS QUE TIVEREM RODAPÉ E MENU SUPERIOR, TERÁ QUE TER ESSAS IMPORTAÇÕES. É UM CSS INDIVIDUAL. -->
    <link href="../Front_end/bootstrap-3/css_individuais/navbar-fixed-top.css" rel="stylesheet">
	<link href="../Front_end/bootstrap-3/css_individuais/sticky-footer-navbar.css" rel="stylesheet">
	<link href="../Front_end/bootstrap-3/css_individuais/signin.css" rel="stylesheet">
        
		
		<script src="../Front_end/Toastr/jquery-1.9.1.min.js"></script>
      <link href="../Front_end/Toastr/toastr.min.css" rel="stylesheet"/>
      <script src="../Front_end/Toastr/toastr.min.js"></script>
  <link type="text/css" rel="stylesheet" charset="UTF-8" href="http://translate.googleapis.com/translate_static/css/translateelement.css"><script type="text/javascript" charset="UTF-8" src="http://translate.googleapis.com/translate_static/js/element/main_pt-BR.js"></script><script type="text/javascript" charset="UTF-8" src="http://translate.googleapis.com/translate_static/js/element/17/element_main.js"></script></head>


<body >
     <?php  include'../MasterPages/menu1.php';?>

	<!-- Final do menu:Fixed navbar -->
	
        <script type="text/javascript">
            
    <?php if(isset($_GET['senhaalterada'])){ ?>
   
     toastr.success("Senha alterada.","Sucesso!"); //parametros: 1ºmensagem,2º titulo
 
   <?php } ?>
   
   <?php if(isset($_GET['naoconfere'])){ ?>
   
     toastr.warning("Nova senha não confere.","Ops!"); //parametros: 1ºmensagem,2º titulo
 
   <?php } ?>
       
     <?php if(isset($_GET['senhainvalida'])){ ?>
   
     toastr.warning("Senha inválida.","Ops!"); //parametros: 1ºmensagem,2º titulo
 
   <?php } ?>
   
   
      
    </script>
        
<div id="wrap">    
    <div class="container" style="width: auto; height: auto;">

	
	
        <form class="form-signin" action="../../Controller/AlterarSenha.php" method="post"> <!-- Inicio do formulário de login -->
          <legend style=" border-bottom-color: #0092db; "><h3 class="form-signin-heading">Alterar senha</h3></legend>
          <small style="color: #CCC;">Login</small>          
          <input disabled style="margin-bottom: 5px;" type="text" value="<?php echo $login; ?>" class="form-control" placeholder="<?php echo $login; ?>" required  name="Login"> 
          <input type="hidden" name="txtLogin" value="<?php echo $login; ?>" />
          <small style="color: #CCC;">Senha atual</small>
          <input autofocus="" style="margin-bottom: 5px;" type="password" class="form-control" placeholder="Senha Atual"  required name="txtSenhaAtual">
          <small style="color: #CCC;">Nova senha</small>
          <input style="margin-bottom: 5px;" type="password" class="form-control" placeholder="Nova senha"  required name="txtNovaSenha">
          <small style="color: #CCC;">Confirma nova senha</small>
          <input type="password" class="form-control" placeholder="Confirma nova senha"  required name="txtConfNovaSenha">
         
          
          <button style="margin-top: 10px;" class="btn btn-lg btn-primary btn-block" name="btnAlterarSenha" type="submit">Confirmar</button>
      </form>  <!-- Final do formulário de login -->

      
      <script src="View/Front_end/js/jquery-1.8.0.min.js"></script>
      <script src="View/Front_end/js/bootstrap.js"></script>
    </div> <!-- /container -->
  </div>
         


<!-- Inicio do rodapé -->
    <?php  include'../MasterPages/footer.php';?>
	<!-- Final do rodapé -->
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Colocado no final do documento para que as páginas carreguem mais rápido -->
    <script src="../Front_end/bootstrap-3/assets/js/jquery.js"></script>
    <script src="../Front_end/bootstrap-3/dist/js/bootstrap.js"></script><div id="goog-gt-tt" class="goog-tooltip skiptranslate" dir="ltr" style="visibility: hidden; left: 632px; top: 218px; display: none;"><div style="padding: 8px;"><div><div class="logo"><img src="https://www.google.com/images/icons/product/translate-32.png" width="20" height="20"></div></div></div><div class="top" style="padding: 8px; float: left; width: 100%;"><h1 class="title gray">Texto original</h1></div><div class="middle" style="padding: 8px;"><div class="original-text">This example is a quick exercise to illustrate how the default, static and fixed to top navbar work.</div></div><div class="bottom" style="padding: 8px;"><div class="activity-links"><span class="activity-link">Sugira uma tradução melhor</span><span class="activity-link"></span></div><div class="started-activity-container"><hr style="color: #CCC; background-color: #CCC; height: 1px; border: none;"><div class="activity-root"></div></div></div><div class="status-message" style="display: none; opacity: 0;"></div></div>
  
</body></html>