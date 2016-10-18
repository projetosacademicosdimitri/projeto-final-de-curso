 <link href="../View/Front_end/bootstrap-3/dist/css/bootstrap.css" rel="stylesheet">
<?php







/*

 * To change this template, choose Tools | Templates

 * and open the template in the editor.

 */

 echo ini_set('default_charset','UTF-8');//resolveu o problema com desconfiguração  de carácteres

 include_once '../Model/DTO/Pagamento.php';

 include_once '../Model/Database/CmdSql.php';

 

 





$oPaga = new Pagamento();



$oPaga->__setDataPagamento($_POST['txtDataPagamento']);


      $source = array('.', ','); 
      $replace = array('', '.');
      $SalarioBase = str_replace($source ,$replace,$_POST['vSalarioBase']);
    
      
      $oPaga->__setSalarioBase($SalarioBase);
      
      
      $source = array('.', ','); 
      $replace = array('', '.');
      $valorDesconto = str_replace($source ,$replace,$_POST['txtDescont']);
    
      $oPaga->__setDescontos($valorDesconto);
    

      
      $source = array('.', ','); 
      $replace = array('', '.');
      $valorHoraExtra = str_replace($source ,$replace,$_POST['txtHoraExt']);
    
      $oPaga->__setHoraExtra($valorHoraExtra);

      $source = array('.', ','); 
      $replace = array('', '.');
      $valorAdiantamento = str_replace($source ,$replace,$_POST['txtAdianta']);
    
      $oPaga->__setAdiantamento($valorAdiantamento); 


      $source = array('.', ','); 
      $replace = array('', '.');
      $ValorTotalPgmto = str_replace($source ,$replace,$_POST['txtValorTot']);
    
      $oPaga->__setValorTotalPgmto($ValorTotalPgmto); 


      $source = array('.', ','); 
      $replace = array('', '.');
      $ValorLiquido = str_replace($source ,$replace,$_POST['txtValorLiqui']);
    
      $oPaga->__setValorLiquido($ValorLiquido);
      
     
$oPaga->__setIdfunc($_POST['IdFunc']);




$oPessit = new CmdSql();



if($oPessit->__insertPagamento($oPaga)){

header("Location:../View/Pagamento/CadPagamento.php?&ok"); 

}





?>

