<?php

ob_start();
include_once '../../../kint/Kint.class.php';
require_once '../../../Model/PDF/fpdf17/fpdf.php';
define('FPDF_FONTPATH','font/');
require_once '../../../Model/Database/CmdSql.php';


$where1 = "WHERE 1";
$where2 = "WHERE 1";
if(isset($_GET['PdfPagamento'])&&($_GET['PdfPagamento'])==TRUE)
{    

  if(isset($_GET['id']))
{  $idFunc = $_GET['id'];
   $where1.= " AND f.idfunc ='$idFunc'  ";
   $where2.= " AND f.idfunc ='$idFunc'   ";

}

if(isset($_GET['dtIni']) )
{ 
  $dataIni = $_GET['dtIni'];
  $dataIni = implode("-",array_reverse(explode("/",$dataIni))); 
  $where1.= "  AND p.DataPgmto >='$dataIni' ";
  $where2.= "  AND p.DataPgmto >='$dataIni' ";

}

if(isset($_GET['dtFim']))
{ $dataFim = $_GET['dtFim'];
  $dataFim = implode("-",array_reverse(explode("/",$dataFim))); 
  $where1.="  AND p.DataPgmto <='$dataFim' ";
  $where2.="  AND p.DataPgmto <='$dataFim' ";

}


$sql="SELECT f.Nome, f.SalarioFunc, p.DataPgmto, p.HoraExtra,";
$sql.="Adiantamento, p.Descontos, p.ValorTotal,";
$sql.="(select sum(p.HoraExtra)FROM pagamento p     "; 
$sql.="INNER JOIN funcionario f ON p.idFunc = f.idFunc  ";
$sql.= "$where1 )as TH,";
$sql.="(select sum(p.ValorTotal)FROM pagamento p    "; 
$sql.="INNER JOIN funcionario f ON p.idFunc = f.idFunc "; 
$sql.="$where1 )as VT,";
$sql.="(select count(p.idPgmto)FROM pagamento p   "; 
$sql.="INNER JOIN funcionario f ON p.idFunc = f.idFunc  "; 
$sql.="$where1 )as qPag  ";
$sql.="FROM pagamento p INNER JOIN funcionario f ON p.idFunc = f.idFunc  ";
$sql.="$where2 ";
$sql.=" ORDER BY p.DataPgmto,f.Nome ASC";


$pdf =  new FPDF('P','cm','A4');
$pdf->Open();
$pdf->SetDisplayMode('default');
$pdf->SetMargins(0.5,5.0,0.0);
$pdf->SetTitle(utf8_decode('Relatório de pagamento - SCA')); // define o titulo do documento pdf
$pdf->SetDisplayMode('real', 'default'); // Define a maneira que o arquivo deve ser mostrado pelo visualizador - real: usa o tamanho real (equivale a 100% de zoom) - default: usa o valor padrão do visualizador





//Nome do arquivo que contém a imagem.
    $img="../../../Model/PDF/imagens/SCA01.png";
//Abscissa do canto superior-esquerdo. 
    $x=5;
//Ordenada do canto superio-esquerdo.
    $y = 0.5;
//Largura da imagem na página. Se não informada ou zero, ela será calculada automaticamente.
    $w=0;
//Altura da imagem na página. Se não informada ou zero, ele será calculada automaticamente.
    $h=0;

    
    
$pdf->AddPage();
$pdf->Image($img, $x, $y, $w, $h);

//*CABEÇALHO 
$pdf->SetFont('Arial','','20');
$pdf->Cell(20,2,utf8_decode("Relatório Pagamentos"),1, 1,'C');    




//Head 

$pdf->SetFont('Arial','','8');
$pdf->Cell('5','0.6','Nome','1','0','C');
$pdf->Cell('2.3','0.6','50% Sal. base','1','0','C');
$pdf->Cell('2.4','0.6','Data pagamento','1','0','C');
$pdf->Cell('2.3','0.6','Hora extra','1','0','C');
$pdf->Cell('2.5','0.6','Adiantamento','1','0','C');
$pdf->Cell('2.5','0.6','Descontos','1','0','C');
$pdf->Cell('3','0.6','Pago','1','1','C');




$venda = new CmdSql();
$result =  $venda->query($sql)->fetchAll(PDO::FETCH_OBJ);

foreach ($result as $linha)
{
    

$pdf->Cell('5','0.6',utf8_decode($linha->Nome),'1','0','L');
$pdf->Cell('2.3','0.6',"R$ ".number_format(round($linha->SalarioFunc/2,2), 3, ',', '.'),'1','0','L');
$data = implode("/",array_reverse(explode("-",$linha->DataPgmto) ));
$pdf->Cell('2.4','0.6',"$data",'1','0','C');
$pdf->Cell('2.3','0.6',"R$ ".number_format(round($linha->HoraExtra,2), 2, ',', '.'),'1','0','L');
$pdf->Cell('2.5','0.6',"R$ ".number_format(round($linha->Adiantamento,2), 2, ',', '.'),'1','0','L');
$pdf->Cell('2.5','0.6',"R$ ".number_format(round($linha->Descontos,2), 2, ',', '.'),'1','0','L');
$pdf->Cell('3','0.6',"R$ ".number_format(round($linha->ValorTotal,2), 2, ',', '.'),'1','1','L');
    
	 $QPag = $linha->qPag;
     $TotalHExtra = $linha->TH;
     $vValorTotal = $linha->VT; 	
}    
//0040856445

$pdf->SetDrawColor(250,0,0);
$pdf->SetLineWidth(0.06);
$pdf->Cell('7','0.6',"Total de adiantamentos: $QPag",'1','0','C');
$pdf->Cell('6','0.6',"Valor total: R$ ".number_format(round($TotalHExtra,2), 2, ',', '.'),'1','0','C');
$pdf->Cell('7','0.6',"Valor total: R$ ".number_format(round($vValorTotal,2), 2, ',', '.'),'1','1','C');

			
$pdf->Output();
ob_end_flush(); 

}

?>
