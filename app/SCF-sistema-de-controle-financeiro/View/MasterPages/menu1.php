<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>SCA - Login</title>
<link href="../Front_end/bootstrap-3/dist/css/bootstrap.css" rel="stylesheet">

<!-- TODAS AS PÁGINAS QUE TIVEREM RODAPÉ E MENU SUPERIOR, TERÁ QUE TER ESSAS IMPORTAÇÕES. É UM CSS INDIVIDUAL. -->
<link href="../Front_end/bootstrap-3/css_individuais/navbar-fixed-top.css" rel="stylesheet">
<link href="../Front_end/bootstrap-3/css_individuais/sticky-footer-navbar.css" rel="stylesheet">


<link href="../Front_end/Toastr/toastr.min.css" rel="stylesheet"/>
<script src="../Front_end/Toastr/toastr.min.js"></script>


</head>
<body>

<!-- Início do menu:Fixed navbar -->

<div class="navbar navbar-default navbar-fixed-top">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="#"><font><font>SCA</font></font></a>
</div>
<div class="navbar-collapse collapse">
<ul class="nav navbar-nav">
<li class="active"><a href="../home/home.php"><font><font>Início</font></font></a></li> <!-- BOTÃO INICIO DO MENU -->

<li class="dropdown">  <!-- BOTÃO CADASTRO DO MENU -->
<a href="#" class="dropdown-toggle" data-toggle="dropdown"><font><font>Cadastro</font></font><b class="caret"></b></a>

<ul class="dropdown-menu">
<li class="dropdown-header"><font><font>Pessoal</font></font></li>

<li><a href="../Func/cadFunc.php"><font><font>Funcionário</font></font></a></li>
<li><a href="../Cliente/cadCliente.php"><font><font>Cliente</font></font></a></li>
<li><a href="../Fornecedor/cadfornecedor.php"><font><font>Fornecedor</font></font></a></li>

<li class="divider"></li>
<li class="dropdown-header"><font><font>Financeiro</font></font></li>


<li><a href="../Adiantamento/CadAdiantamento.php"><font><font>Adiantamento</font></font></a></li>
<li><a href="../Pagamento/CadPagamento.php"><font><font>Pagamento</font></font></a></li>
<li><a href="../Cheque/cadCheque.php"><font><font>Cheque</font></font></a></li>
<li><a href="../Despesas/CadDespesas.php"><font><font>Despesa</font></font></a></li>

<li class="divider"></li>
<li class="dropdown-header"><font><font>Compra e venda</font></font></li>

<li><a href="../Compra/CadCompra.php"><font><font>Compra</font></font></a></li>
<li><a href="../Vendas/CadVenda.php"><font><font>Venda</font></font></a></li>


<li><a href="../SacosPlasticos/CadSacoPlastico.php"><font><font>Saco plástico</font></font></a></li>


</ul>
</li>  <!--FINAL DO BOTÃO CADASTRO DO MENU -->




<li class="dropdown">  <!-- BOTÃO LISTAR DO MENU -->
<a href="#" class="dropdown-toggle" data-toggle="dropdown"><font>
<font>Listar</font></font><b class="caret"></b></a>
<ul class="dropdown-menu">

<li class="dropdown-header"><font><font>Pessoal</font></font></li>

<li><a href="../Func/listarFunc.php?pagina=1"><font><font>Funcionários</font></font></a></li>
<li><a href="../Cliente/listCliente.php?pagina=1"><font><font>Clientes</font></font></a></li>
<li><a href="../Fornecedor/listFornecedor.php?pagina=1"><font><font>Fornecedores</font></font></a></li>

<li class="divider"></li>
<li class="dropdown-header"><font><font>Financeiro</font></font></li>


<li><a href="../Adiantamento/ListarAdiantamento.php?pagina=1"><font><font>Adiantamentos</font></font></a></li>
<li><a href="../Pagamento/ListarPagamento.php?pagina=1"><font><font>Pagamentos</font></font></a></li>
<li><a href="../Cheque/listCheque.php?pagina=1"><font><font>Cheques</font></font></a></li>
<li><a href="../Despesas/ListarDespesa.php?pagina=1"><font><font>Despesas</font></font></a></li>


<li class="divider"></li>
<li class="dropdown-header"><font><font>Compra e venda</font></font></li>

<li><a href="../Compra/listarCompra.php?pagina=1"><font><font>Compras</font></font></a></li>
<li><a href="../Vendas/listarVenda.php?pagina=1"><font><font>Vendas</font></font></a></li>
<li><a href="../SacosPlasticos/ListarSacoPlastico.php?pagina=1"><font><font>Sacos plásticos</font></font></a></li>

</ul>
</li> 




<li class="dropdown">  <!-- BOTÃO CONSULTA DO MENU -->
<a href="#" class="dropdown-toggle" data-toggle="dropdown"><font>
<font>Consulta</font></font><b class="caret"></b></a>
<ul class="dropdown-menu">

<li class="dropdown-header"><font><font>Pessoal</font></font></li>

<li><a href="../Consulta/pfuncionario.php"><font><font>Funcionário</font></font></a></li>
<li><a href="../Consulta/pcliente.php"><font><font>Cliente</font></font></a></li>
<li><a href="../Consulta/pfornecedor.php"><font><font>Fornecedor</font></font></a></li>


<li class="divider"></li>
<li class="dropdown-header"><font><font>Financeiro</font></font></li>

<li><a href="../Consulta/padiantamento.php"><font><font>Adiantamento</font></font></a></li>
<li><a href="../Consulta/ppagamento.php"><font><font>Pagamento</font></font></a></li>	    
<li><a href="../Consulta/pcheque.php"><font><font>Cheque</font></font></a></li>
<li><a href="../Consulta/pdespesa.php"><font><font>Despesa</font></font></a></li>


<li class="divider"></li>
<li class="dropdown-header"><font><font>Compra e venda</font></font></li>

<li><a href="../Consulta/pcompra.php"><font><font>Compra</font></font></a></li>
<li><a href="../Consulta/pvenda.php"><font><font>Venda</font></font></a></li>


</ul>
</li>  <!--FINAL DO BOTÃO CADASTRO DO MENU -->








<li class="dropdown">  <!-- BOTÃO RELATORIO DO MENU -->
<a href="#" class="dropdown-toggle" data-toggle="dropdown"><font>
<font>Relatórios</font></font><b class="caret"></b></a>
<ul class="dropdown-menu">


<li class="dropdown-header"><font><font>Financeiro</font></font></li>
<li><a href="../Relatorios/AdmtFunc.php"><font><font>Adiantamentos</font></font></a></li>
<li><a href="../Relatorios/PagFunc.php"><font><font>Pagamentos</font></font></a></li>
<li><a href="../Relatorios/RelatorioCheque.php"><font><font>Cheques</font></font></a></li>				
<li><a href="../Relatorios/RelatorioDespesa.php"><font><font>Despesas</font></font></a></li>


<li class="divider"></li>
<li class="dropdown-header"><font><font>Compra e venda</font></font></li>

<li><a href="../Relatorios/RelatorioVenda.php"><font><font>Vendas</font></font></a></li>



<li><a href="../Relatorios/RelatorioCompra.php"><font><font>Compras</font></font></a></li>



</ul>
</li> 






</ul>
<ul class="nav navbar-nav navbar-right">

<li class="dropdown">
<a title="Alterar senha / Manual" href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span></a>
<ul class="dropdown-menu">
<li><a href="../Password/AlterarSenha.php"><span class="glyphicon glyphicon-wrench"></span><small style="margin-left: 5px;">Alterar senha</small></a></li>
<li><a href="../Manual/Manual_do_usuario.pdf" target="_blank" ><span class="glyphicon glyphicon-book"></span><small style="margin-left: 5px;">Manual</small></a></li>
</ul>
</li>
<li><a href="../../Controller/ServiceLogin.php?logout=true"><span class="glyphicon glyphicon-log-out"></span><font><font style="margin-left: 5px;">Sair do  Sistema</font></font></a></li>
</ul>
</div><!--/.nav-collapse -->
</div>
</div>
<!-- Final do menu:Fixed navbar -->



</body>
</html>
