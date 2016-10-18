<?php define( 'BASEPATH', getcwd() . DIRECTORY_SEPARATOR ); ?>

<html lang="en" class="translated-ltr"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Login - Sistema de Controle Administrativo</title>
<link rel="shortcut icon" href="View/Front_end/favicon.ico">
    <!-- Importa os CSS -->
    <link href="View/Front_end/bootstrap-3/dist/css/bootstrap.css" rel="stylesheet">
	
	<!-- TODAS AS P�?GINAS QUE TIVEREM RODAPÉ OU MENU SUPERIOR, TER�? QUE TER ESSAS IMPORTAÇÕES. É UM CSS INDIVIDUAL. -->
        <link href="View/Front_end/bootstrap-3/css_individuais/signin.css" rel="stylesheet"> <!-- CSS INDIVIDUAL DO FORMULARIO DE LOGIN. -->
        <link href="View/Front_end/bootstrap-3/css_individuais/sticky-footer-navbar.css" rel="stylesheet">
	
	
 <script src="View/Front_end/Toastr/jquery-1.9.1.min.js"></script>
      <link href="View/Front_end/Toastr/toastr.min.css" rel="stylesheet"/>
      <script src="View/Front_end/Toastr/toastr.min.js"></script>
  <link type="text/css" rel="stylesheet" charset="UTF-8" href="http://translate.googleapis.com/translate_static/css/translateelement.css"><script type="text/javascript" charset="UTF-8" src="http://translate.googleapis.com/translate_static/js/element/main_pt-BR.js"></script><script type="text/javascript" charset="UTF-8" src="http://translate.googleapis.com/translate_static/js/element/17/element_main.js"></script></head>

  <body>
<script type="text/javascript">
    <?php if(isset($_GET['ok'])){ ?>
   
     toastr.success("Senha enviada para o e-mail.","Sucesso!"); //parametros: 1�mensagem,2� titulo
 
   <?php } ?>
   
   
      
    </script>
  <div id="wrap">    <!-- o wrap serve para manter o rodapé sempre no fim da página -->
    <div class="container">
	<center> <div>
            <img src="View/SCA01.png" class="img-responsive" alt="Responsive image">
        </div></center>
	
	
        <form class="form-signin" action="Controller/ServiceLogin.php" method="post"> <!-- Inicio do formul�rio de login -->
          <h2 class="form-signin-heading">Login</h2>
          <input type="text" class="form-control" placeholder="Login" required  name="txtLog" autofocus=""> 
          <input type="password" class="form-control" placeholder="Senha"  required name="txtSen">
          
          <div style="margin-top: 10px;"> <a href="View/Password/RecuperarSenha.php">Esque&ccedil;eu sua senha?</a></div>
          
          <button style="margin-top: 10px;" class="btn btn-lg btn-primary btn-block" name="btnLogar" type="submit">Entrar</button>
      </form>   <!-- Final do formulário de login -->

      
      <script src="View/Front_end/js/jquery-1.8.0.min.js"></script>
      <script src="View/Front_end/js/bootstrap.js"></script>
    </div> <!-- /container -->
  </div>
<!-- Inicio do rodapé -->
    <div id="footer">
      <div class="container">
          <p class="text-muted credit" style="text-align: center;">SCF - Sistema de Controle Administrativo  <a href="">Desenvolvido pela turma de Desenvolvimento de software 35285 do SENAI - CETIND </a>.</p>
      </div>
    </div>
	<!-- Final do rodapé -->
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Colocado no final do documento para que as páginas carreguem mais rápido -->
    <script src="View/Front_end/bootstrap-3/assets/js/jquery.js"></script>
    <script src="View/Front_end/bootstrap-3/dist/js/bootstrap.js"></script><div id="goog-gt-tt" class="goog-tooltip skiptranslate" dir="ltr" style="visibility: hidden; left: 632px; top: 218px; display: none;"><div style="padding: 8px;"><div><div class="logo"><img src="https://www.google.com/images/icons/product/translate-32.png" width="20" height="20"></div></div></div><div class="top" style="padding: 8px; float: left; width: 100%;"><h1 class="title gray">Texto original</h1></div><div class="middle" style="padding: 8px;"><div class="original-text">This example is a quick exercise to illustrate how the default, static and fixed to top navbar work.</div></div><div class="bottom" style="padding: 8px;"><div class="activity-links"><span class="activity-link">Sugira uma tradução melhor</span><span class="activity-link"></span></div><div class="started-activity-container"><hr style="color: #CCC; background-color: #CCC; height: 1px; border: none;"><div class="activity-root"></div></div></div><div class="status-message" style="display: none; opacity: 0;"></div></div>
    <div id="goog-gt-tt" class="skiptranslate" dir="ltr"><div style="padding: 8px;"><div><div class="logo"><img src="https://www.google.com/images/icons/product/translate-32.png" width="20" height="20"></div></div></div><div class="top" style="padding: 8px; float: left; width: 100%;"><h1 class="title gray">Texto original</h1></div><div class="middle" style="padding: 8px;"><div class="original-text"></div></div><div class="bottom" style="padding: 8px;"><div class="activity-links"><span class="activity-link">Sugira uma tradução melhor</span><span class="activity-link"></span></div><div class="started-activity-container"><hr style="color: #CCC; background-color: #CCC; height: 1px; border: none;"><div class="activity-root"></div></div></div><div class="status-message" style="display: none;"></div></div>
  

</body></html>