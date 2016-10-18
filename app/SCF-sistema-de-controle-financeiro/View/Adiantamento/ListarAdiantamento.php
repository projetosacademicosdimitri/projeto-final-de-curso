<?php   
include '../../config/session.php';

?>
<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
    <title>SCA - Lista de adiantamentos</title>
	<link rel="shortcut icon" href="../Front_end/favicon.ico">
<?php include_once '../../Model/Database/CmdSql.php';
header('Content-Type: text/html; charset=utf-8');?>
    <!-- Importa o Bootstrap core CSS -->
    <link href="../Front_end/bootstrap-3/dist/css/bootstrap.css" rel="stylesheet">

    <!-- TODAS AS PÃ?GINAS QUE TIVEREM RODAPÃ‰ E MENU SUPERIOR, TERÃ? QUE TER ESSAS IMPORTAÃ‡Ã•ES. Ã‰ UM CSS INDIVIDUAL. -->
    <link href="../Front_end/bootstrap-3/css_individuais/navbar-fixed-top.css" rel="stylesheet">
	<link href="../Front_end/bootstrap-3/css_individuais/sticky-footer-navbar.css" rel="stylesheet">
	
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
   
     toastr.success("Adiantamento atualizado.","Sucesso!"); //parametros: 1ºmensagem,2º titulo
 
   <?php } ?>
   
   <?php if(isset($_GET['del'])){ ?>
   
     toastr.warning("Adiantamento deletado."); //parametros: 1ºmensagem,2º titulo
 
   <?php } ?>
      
    </script>
	
      <!-- Main component for a primary marketing message or call to action -->
	  
	  <div class="panel panel-primary"> 
  <!-- Default panel contents -->
  <div class="panel-heading"><center><h4>Lista de Adiantamentos</h4></center></div>

  <!-- Table -->
  <table class="table table-striped">
    <tr class="warning">
	<td><b>Nome</b></td>
        <td><b>Data do Adiantamento</b></td>
	<td><b>Valor</b></td>
	<td><b>Visualizar</b></td>
        <td><b>Editar</b></td>
	<td><b>Excluir</b></td>
	</tr>
	
        
        <tr>
        <?php include_once '../../Model/Database/CmdSql.php'; 
        /*.
         Essas linhas  de codigo ficam responsavÃ©is  
         pela  paginaÃ§Ã£o  vinda do  banco  de  dados 
         
         Crio um obj de acesso a camada de dados
         *  $obj = new CmdSql(); ele executarar  o  select 
         Crio uma  variavel "$ctrl" que recebe a requisiÃ§Ã£o da pagina
          $ctrl= $_GET['pagina'];
         o menor valor  numerico que essa  variavel  terÃ¡ Ã© 1 
         pois um  valor  menor  que 1  daria problema  na  logica 
         do  select  
         logo  abaixo  crio  uma  variavÃ©l chamada $por_pagina Ã© atribuida o valor 3 
         * a variavÃ©l  $por_pagina diz  no select que apenas Ã© pra vim do
          banco  3 registros  por vez graÃ§as a funÃ§Ã£o  limit  do mysql
         * depois  crio  uma  variavel  chamada init que significa inicializaÃ§Ã£o 
         * ela tmb serÃ¡  usada como parametro da  funÃ§Ã£o  limit  do mysql
         * a variavÃ©l  init Ã© inicializada dessa forma:
         * o numero da  pagina vindo via  get( - 1)*por_pagina 
         * 
       */ 
        $obj = new CmdSql();
        $ctrl= $_GET['pagina'];
        
        if($ctrl<1)
        $ctrl = 1;   
        $por_pagina = 10;
        $init = ( $ctrl-1) * $por_pagina;
        $result = $obj->query("SELECT * FROM adiantamento a INNER JOIN funcionario f ON a.IdFunc = f.idFunc ORDER BY a.DataAdiantamento ASC limit $init, $por_pagina");
	$result_total = $obj->query("SELECT count(*) as total FROM adiantamento a INNER JOIN funcionario f ON a.IdFunc = f.idFunc")->fetch(PDO::FETCH_OBJ);
			
	$num_paginas = ceil( $result_total->total /$por_pagina);
        
        ?>
            
         
         <?php   foreach($result as $linha){  ?>
             <tr>
             	<td><?php echo $linha['Nome'];?></td>
              
             
                    <?php $data = implode("/",array_reverse(explode("-",$linha['DataAdiantamento']) ) );?>
                  <td><?php echo $data; ?></td>
               
                <td>R$ <?php echo number_format($linha['ValorAdiantamento'], 2, ',', '.');   ;?> </td>
                <td><a href="Adiantamento.php?id=<?php echo $linha['IdAdiantamento']; ?>&pagina=<?php echo $_GET['pagina'];?>  "><span title="Visualizar" style="color: #000000; margin-left: 23%;" class="glyphicon glyphicon-search"></span></a></td>
                <td><a href="UpdateAdiantamento.php?id=<?php echo $linha['IdAdiantamento']; ?>&pagina=<?php echo $_GET['pagina'];?>"><span title="Editar" style="color: #000000; margin-left: 23%;" class="glyphicon glyphicon-edit"></a></td>
                <td><a onclick="return confirm('Deseja realmente excluir este registro?');" href="../../Controller/editeAdiantamento.php?delete=<?php echo $linha['IdAdiantamento']; ?>&pagina=<?php echo $_GET['pagina'];?>"><span title="Excluir" style="color: #ff0000; margin-left: 23%;" class="glyphicon glyphicon-remove"></a></td> 	
	     			 </tr>
         <?php } ?> 
       </table>
</div>
  <center>
  <ul class="pagination">
   
  <?php 
  
  if($ctrl > 1 ){
  echo '<li><a href="ListarAdiantamento.php?pagina=1" title="Primeira p&aacute;gina">&lt;&lt;</a></li>';
  echo '<li><a href="ListarAdiantamento.php?pagina='.($ctrl - 1).'" title="P&aacute;gina anterior">&lt;</a></li>';
  }
  if(($ctrl - 4) < 1)
  {
      $anterior = 1;
  }else
  {
    $anterior =  $ctrl - 4;
  }
  
  if(($ctrl + 4) > $num_paginas)
  {
      $posterior = $num_paginas;
  }else
  {
    $posterior =  $ctrl + 4;
  }
  
  for($i = $anterior ; $i <=$posterior && $i<= $num_paginas ;$i++){
      
      
          echo "<li><a href=\"ListarAdiantamento.php?pagina=$i\">$i</a></li>";
   

     }
	 if($ctrl < $num_paginas )
	 {
	 
     echo '<li><a href="ListarAdiantamento.php?pagina='.($ctrl + 1).'" title="Pr&oacute;xima p&aacute;gina">&gt;</a></li>';
     echo "<li><a href=\"ListarAdiantamento.php?pagina=$num_paginas\" title=\"Ultima p&aacute;gina\">&gt;&gt;</a></li>";
	 }
     ?>
 

  
</ul>
<center>

 
   <script src="Front_end/js/jquery-1.8.0.min.js"></script>
<script src="Front_end/js/bootstrap.js"></script>
    </div> <!-- /container -->
</div>
<!-- Inicio do rodapÃ© -->
    <?php include '../MasterPages/footer.php';?>
	<!-- Final do rodapÃ© -->
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Colocado no final do documento para que as pÃ¡ginas carreguem mais rÃ¡pido -->
    <script src="../Front_end/bootstrap-3/assets/js/jquery.js"></script>
    <script src="../Front_end/bootstrap-3/dist/js/bootstrap.js"></script><div id="goog-gt-tt" class="goog-tooltip skiptranslate" dir="ltr" style="visibility: hidden; left: 632px; top: 218px; display: none;"><div style="padding: 8px;"><div><div class="logo"><img src="https://www.google.com/images/icons/product/translate-32.png" width="20" height="20"></div></div></div><div class="top" style="padding: 8px; float: left; width: 100%;"><h1 class="title gray">Texto original</h1></div><div class="middle" style="padding: 8px;"><div class="original-text">This example is a quick exercise to illustrate how the default, static and fixed to top navbar work.</div></div><div class="bottom" style="padding: 8px;"><div class="activity-links"><span class="activity-link">Sugira uma traduÃ§Ã£o melhor</span><span class="activity-link"></span></div><div class="started-activity-container"><hr style="color: #CCC; background-color: #CCC; height: 1px; border: none;"><div class="activity-root"></div></div></div><div class="status-message" style="display: none; opacity: 0;"></div></div>
  

</body>
</html>