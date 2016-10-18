<?php 
/* testando  a autenticação  do  usuario */

include '../../config/session.php';

?>



<html lang="br" class="translated-ltr"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
 

    <!-- scripts do calendario -->
        <script src="./js/dhtmlxscheduler.js" type="text/javascript" charset="utf-8"></script>
	<script src="./js/locale_pt.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="./css/dhtmlxscheduler.css" type="text/css" title="no title" charset="utf-8">
    
        
        <script type="text/javascript" charset="utf-8">
	function init() {
		
		scheduler.config.xml_date="%Y-%m-%d %H:%i";
		scheduler.config.prevent_cache = true;
		
		scheduler.config.lightbox.sections=[	
			{name:"description", height:130, map_to:"text", type:"textarea" , focus:true},
			{name:"location", height:43, type:"textarea", map_to:"details" },
			{name:"time", height:72, type:"time", map_to:"auto"}
		]
		scheduler.config.first_hour=4;
		scheduler.locale.labels.section_location="Location";
		//scheduler.config.details_on_create=true;
		//scheduler.config.details_on_dblclick=true;


		
		scheduler.init('scheduler_here',new Date(),"month");
		scheduler.setLoadMode("month")
		scheduler.load("data/events.php");
		
		var dp = new dataProcessor("data/events.php");
		dp.init(scheduler);

	}
</script>
    <!-- fim dos scripts do calendario -->
    
    
    
    <title>SCA - Sistema de Controle Administrativo</title>
<link rel="shortcut icon" href="../Front_end/favicon.ico">
    <!-- Importa o Bootstrap core CSS -->
    <link href="../Front_end/bootstrap-3/dist/css/bootstrap.css" rel="stylesheet">

    <!-- TODAS AS PÁGINAS QUE TIVEREM RODAPÉ E MENU SUPERIOR, TERÁ QUE TER ESSAS IMPORTAÇÕES. É UM CSS INDIVIDUAL. -->
    <link href="../Front_end/bootstrap-3/css_individuais/navbar-fixed-top.css" rel="stylesheet">
	<link href="../Front_end/bootstrap-3/css_individuais/sticky-footer-navbar.css" rel="stylesheet">
	
	

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  <link type="text/css" rel="stylesheet" charset="UTF-8" href="http://translate.googleapis.com/translate_static/css/translateelement.css"><script type="text/javascript" charset="UTF-8" src="http://translate.googleapis.com/translate_static/js/element/main_pt-BR.js"></script><script type="text/javascript" charset="UTF-8" src="http://translate.googleapis.com/translate_static/js/element/17/element_main.js"></script></head>


<body onload="init();">
     <?php  include'../MasterPages/menu1.php';?>

	<!-- Final do menu:Fixed navbar -->
	
<div id="wrap">    
    <div class="container" style="width: auto; height: auto;">

      <!-- Main component for a primary marketing message or call to action -->
      
         <div id="scheduler_here" class="dhx_cal_container dhx_scheduler_month"style="width:100%; height:76%; margin-top: 0px; margin-bottom: 20px;">
		<div class="dhx_cal_navline" style="width: 1366px; height: 59px; left: 0px; top: 0px;">
			<div class="dhx_cal_prev_button">&nbsp;</div>
			<div class="dhx_cal_next_button">&nbsp;</div>
			<div class="dhx_cal_today_button">Hoje</div>
			<div class="dhx_cal_date">Mês - Ano</div>
			<!--<div class="dhx_cal_tab dhx_cal_tab_first" name="day_tab" style="right: auto; left: 14px;">Dia</div>
			<div class="dhx_cal_tab" name="week_tab" style="right: auto; left: 75px;">Semana</div>
			<div class="dhx_cal_tab dhx_cal_tab_last active" name="month_tab" style="right: auto; left: 136px;">Mês</div>-->
		</div>
		<div class="dhx_cal_header" style="width: 1366px; height: 20px; left: -1px; top: 60px;"><div class="dhx_scale_bar" style="width: 194px; height: 18px; left: 0px; top: 0px;">Segunda</div><div class="dhx_scale_bar" style="width: 194px; height: 18px; left: 195px; top: 0px;">Terça</div><div class="dhx_scale_bar" style="width: 194px; height: 18px; left: 390px; top: 0px;">Quarta</div><div class="dhx_scale_bar" style="width: 194px; height: 18px; left: 585px; top: 0px;">Quinta</div><div class="dhx_scale_bar" style="width: 194px; height: 18px; left: 780px; top: 0px;">Sexta</div><div class="dhx_scale_bar" style="width: 194px; height: 18px; left: 975px; top: 0px;">Sábado</div><div class="dhx_scale_bar" style="width: 195px; height: 18px; left: 1170px; top: 0px;">Domingo</div></div>
		<div class="dhx_cal_data" style="width: 1366px; height: 248px; left: 0px; top: 81px;"><table cellpadding="0" cellspacing="0"><tbody><tr><td class="dhx_before "><div class="dhx_month_head">26</div><div class="dhx_month_body" style="height: 24px; width: 194px;"></div></td><td class="dhx_before "><div class="dhx_month_head">27</div><div class="dhx_month_body" style="height: 24px; width: 194px;"></div></td><td class="dhx_before "><div class="dhx_month_head">28</div><div class="dhx_month_body" style="height: 24px; width: 194px;"></div></td><td class="dhx_before "><div class="dhx_month_head">29</div><div class="dhx_month_body" style="height: 24px; width: 194px;"></div></td><td class="dhx_before "><div class="dhx_month_head">30</div><div class="dhx_month_body" style="height: 24px; width: 194px;"></div></td><td class="dhx_before "><div class="dhx_month_head">31</div><div class="dhx_month_body" style="height: 24px; width: 194px;"></div></td><td class=" "><div class="dhx_month_head" style="width: 178px;">01</div><div class="dhx_month_body" style="height: 24px; width: 178px;"></div></td></tr><tr><td class=" "><div class="dhx_month_head">02</div><div class="dhx_month_body" style="height: 24px; width: 194px;"></div></td><td class=" "><div class="dhx_month_head">03</div><div class="dhx_month_body" style="height: 24px; width: 194px;"></div></td><td class=" "><div class="dhx_month_head">04</div><div class="dhx_month_body" style="height: 24px; width: 194px;"></div></td><td class=" "><div class="dhx_month_head">05</div><div class="dhx_month_body" style="height: 24px; width: 194px;"></div></td><td class=" "><div class="dhx_month_head">06</div><div class="dhx_month_body" style="height: 24px; width: 194px;"></div></td><td class=" "><div class="dhx_month_head">07</div><div class="dhx_month_body" style="height: 24px; width: 194px;"></div></td><td class=" "><div class="dhx_month_head" style="width: 178px;">08</div><div class="dhx_month_body" style="height: 24px; width: 178px;"></div></td></tr><tr><td class=" "><div class="dhx_month_head">09</div><div class="dhx_month_body" style="height: 24px; width: 194px;"></div></td><td class=" "><div class="dhx_month_head">10</div><div class="dhx_month_body" style="height: 24px; width: 194px;"></div></td><td class=" "><div class="dhx_month_head">11</div><div class="dhx_month_body" style="height: 24px; width: 194px;"></div></td><td class=" "><div class="dhx_month_head">12</div><div class="dhx_month_body" style="height: 24px; width: 194px;"></div></td><td class=" "><div class="dhx_month_head">13</div><div class="dhx_month_body" style="height: 24px; width: 194px;"></div></td><td class=" "><div class="dhx_month_head">14</div><div class="dhx_month_body" style="height: 24px; width: 194px;"></div></td><td class=" "><div class="dhx_month_head" style="width: 178px;">15</div><div class="dhx_month_body" style="height: 24px; width: 178px;"></div></td></tr><tr><td class=" "><div class="dhx_month_head">16</div><div class="dhx_month_body" style="height: 24px; width: 194px;"></div></td><td class=" "><div class="dhx_month_head">17</div><div class="dhx_month_body" style="height: 24px; width: 194px;"></div></td><td class=" "><div class="dhx_month_head">18</div><div class="dhx_month_body" style="height: 24px; width: 194px;"></div></td><td class=" "><div class="dhx_month_head">19</div><div class="dhx_month_body" style="height: 24px; width: 194px;"></div></td><td class=" "><div class="dhx_month_head">20</div><div class="dhx_month_body" style="height: 24px; width: 194px;"></div></td><td class=" "><div class="dhx_month_head">21</div><div class="dhx_month_body" style="height: 24px; width: 194px;"></div></td><td class=" "><div class="dhx_month_head" style="width: 178px;">22</div><div class="dhx_month_body" style="height: 24px; width: 178px;"></div></td></tr><tr><td class=" "><div class="dhx_month_head">23</div><div class="dhx_month_body" style="height: 48px; width: 194px;"></div></td><td class=" "><div class="dhx_month_head">24</div><div class="dhx_month_body" style="height: 48px; width: 194px;"></div></td><td class=" "><div class="dhx_month_head">25</div><div class="dhx_month_body" style="height: 48px; width: 194px;"></div></td><td class=" "><div class="dhx_month_head">26</div><div class="dhx_month_body" style="height: 48px; width: 194px;"></div></td><td class=" "><div class="dhx_month_head">27</div><div class="dhx_month_body" style="height: 48px; width: 194px;"></div></td><td class=" "><div class="dhx_month_head">28</div><div class="dhx_month_body" style="height: 48px; width: 194px;"></div></td><td class=" "><div class="dhx_month_head" style="width: 178px;">29</div><div class="dhx_month_body" style="height: 48px; width: 178px;"></div></td></tr><tr><td class=" "><div class="dhx_month_head">30</div><div class="dhx_month_body" style="height: 24px; width: 194px;"></div></td><td class="dhx_after "><div class="dhx_month_head">01</div><div class="dhx_month_body" style="height: 24px; width: 194px;"></div></td><td class="dhx_after "><div class="dhx_month_head">02</div><div class="dhx_month_body" style="height: 24px; width: 194px;"></div></td><td class="dhx_after "><div class="dhx_month_head">03</div><div class="dhx_month_body" style="height: 24px; width: 194px;"></div></td><td class="dhx_after "><div class="dhx_month_head">04</div><div class="dhx_month_body" style="height: 24px; width: 194px;"></div></td><td class="dhx_after "><div class="dhx_month_head">05</div><div class="dhx_month_body" style="height: 24px; width: 194px;"></div></td><td class="dhx_after "><div class="dhx_month_head" style="width: 178px;">06</div><div class="dhx_month_body" style="height: 24px; width: 178px;"></div></td></tr></tbody></table>
		  </div>   
			 
			 </div>
</div><!-- /container -->
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