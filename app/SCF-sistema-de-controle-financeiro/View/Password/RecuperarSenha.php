<html lang="en" class="translated-ltr"><head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">


        <title>SCA - Recuperar senha</title>
        <link rel="shortcut icon" href="../Front_end/favicon.ico">
        <!-- Importa os CSS -->
        <link href="../Front_end/bootstrap-3/dist/css/bootstrap.css" rel="stylesheet">

        <!-- TODAS AS P�?GINAS QUE TIVEREM RODAPÉ OU MENU SUPERIOR, TER�? QUE TER ESSAS IMPORTAÇÕES. É UM CSS INDIVIDUAL. -->
        <link href="../Front_end/bootstrap-3/css_individuais/signin.css" rel="stylesheet"> <!-- CSS INDIVIDUAL DO FORMULARIO DE LOGIN. -->
        <link href="../Front_end/bootstrap-3/css_individuais/sticky-footer-navbar.css" rel="stylesheet">



       <script src="../Front_end/Toastr/jquery-1.9.1.min.js"></script>
      <link href="../Front_end/Toastr/toastr.min.css" rel="stylesheet"/>
      <script src="../Front_end/Toastr/toastr.min.js"></script>
        <link type="text/css" rel="stylesheet" charset="UTF-8" href="http://translate.googleapis.com/translate_static/css/translateelement.css"><script type="text/javascript" charset="UTF-8" src="http://translate.googleapis.com/translate_static/js/element/main_pt-BR.js"></script><script type="text/javascript" charset="UTF-8" src="http://translate.googleapis.com/translate_static/js/element/17/element_main.js"></script></head>

    <body>
<script type="text/javascript">
    <?php if(isset($_GET['noresult'])){ ?>
   
     toastr.warning("Login ou E-mail incorretos.","Ops!"); //parametros: 1ºmensagem,2º titulo
 
   <?php } ?>
   
   
      
    </script>
        <div id="wrap">    <!-- o wrap serve para manter o rodapé sempre no fim da página -->
            <div class="container">
                <center> <div>
                        <img src="../SCA01.png" class="img-responsive" alt="Responsive image">
                    </div></center>


                <form class="form-signin" action="../../Controller/RecuperarSenha.php" method="post"> <!-- Inicio do formulário de login -->
                   
                    <legend style=" border-bottom-color: #0092db; "><h3 class="form-signin-heading">Recuperar senha</h3></legend>
                    <small style="color: #CCC;">Login ou E-mail</small>
                    <input style="margin-top: 5px;" type="text" class="form-control" placeholder="Login / E-mail" required  name="txtLoginEmail" autofocus=""> 
                    </label>
                    <center>  <button style="width: 148px; margin-top: 10px;" onclick="window.location.href='../../index.php';" type="button" class="btn btn-default">Cancelar</button> 
                        <button style="width: 148px; margin-top: 10px;"  name="enviar" class="btn btn-primary" type="submit">Enviar</button>
                    </center>
                </form>  <!-- Final do formulário de login -->


                <script src="../Front_end/js/jquery-1.8.0.min.js"></script>
                <script src="../Front_end/js/bootstrap.js"></script>
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
        <script src="../Front_end/bootstrap-3/assets/js/jquery.js"></script>
        <script src="../Front_end/bootstrap-3/dist/js/bootstrap.js"></script><div id="goog-gt-tt" class="goog-tooltip skiptranslate" dir="ltr" style="visibility: hidden; left: 632px; top: 218px; display: none;"><div style="padding: 8px;"><div><div class="logo"><img src="https://www.google.com/images/icons/product/translate-32.png" width="20" height="20"></div></div></div><div class="top" style="padding: 8px; float: left; width: 100%;"><h1 class="title gray">Texto original</h1></div><div class="middle" style="padding: 8px;"><div class="original-text">This example is a quick exercise to illustrate how the default, static and fixed to top navbar work.</div></div><div class="bottom" style="padding: 8px;"><div class="activity-links"><span class="activity-link">Sugira uma tradução melhor</span><span class="activity-link"></span></div><div class="started-activity-container"><hr style="color: #CCC; background-color: #CCC; height: 1px; border: none;"><div class="activity-root"></div></div></div><div class="status-message" style="display: none; opacity: 0;"></div></div>
        <div id="goog-gt-tt" class="skiptranslate" dir="ltr"><div style="padding: 8px;"><div><div class="logo"><img src="https://www.google.com/images/icons/product/translate-32.png" width="20" height="20"></div></div></div><div class="top" style="padding: 8px; float: left; width: 100%;"><h1 class="title gray">Texto original</h1></div><div class="middle" style="padding: 8px;"><div class="original-text"></div></div><div class="bottom" style="padding: 8px;"><div class="activity-links"><span class="activity-link">Sugira uma tradução melhor</span><span class="activity-link"></span></div><div class="started-activity-container"><hr style="color: #CCC; background-color: #CCC; height: 1px; border: none;"><div class="activity-root"></div></div></div><div class="status-message" style="display: none;"></div></div>


    </body></html>