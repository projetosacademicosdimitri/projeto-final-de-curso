
<?php

include_once '../../../kint/Kint.class.php';
require_once '../../../Model/PDF/fpdf17/fpdf.php';
define('FPDF_FONTPATH','font/');

require_once '../../../Model/Database/CmdSql.php';

$where1 = "WHERE 1";
$where2 = "WHERE 1";
if(isset($_GET['PdfDespesa'])&&($_GET['PdfDespesa'])==TRUE)
{    

  if(isset($_GET['TpDespesa']))
{  $TpDespesa = $_GET['TpDespesa'];
   $where1.= " AND Tipo = '$TpDespesa'  ";
   $where2.= " AND Tipo = '$TpDespesa'  ";

}

if(isset($_GET['dtIni']) )
{ 
  $dataIni = $_GET['dtIni'];
  $dataIni = implode("-",array_reverse(explode("/",$dataIni))); 
  $where1.= "  AND DataDespesa>='$dataIni' ";
  $where2.= "  AND DataDespesa>='$dataIni' ";

}

if(isset($_GET['dtFim']))
{ $dataFim = $_GET['dtFim'];
  $dataFim = implode("-",array_reverse(explode("/",$dataFim))); 
 $where1.="  AND DataDespesa <='$dataFim' ";
 $where2.="  AND DataDespesa <='$dataFim' ";

}


$sql ="SELECT * ,";
$sql.="(SELECT count(idDespesas) FROM despesas $where1 ) as totaldesp ,";
$sql.="(SELECT sum(Valor) FROM despesas $where1 ) as valordesp ";
$sql.="FROM despesas $where1 ";
$sql.=" ORDER BY DataDespesa ASC";


$pdf =  new FPDF('P','cm','A4');
$pdf->Open();
$pdf->SetDisplayMode('default');
$pdf->SetMargins(0.5,5.0,0.0);
$pdf->SetTitle(utf8_decode('Relatório de despesas - SCA')); // define o titulo do documento pdf
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
$pdf->Cell(20,2,utf8_decode("Relatório Despesas"),1, 1,'C');    




//Head 

$pdf->SetFont('Arial','','9');
$pdf->Cell('6','0.6',utf8_decode('Descrição'),'1','0','C');
$pdf->Cell('4','0.6','Data da despesa','1','0','C');
$pdf->Cell('4','0.6','Tipo','1','0','C');
$pdf->Cell('6','0.6','Valor','1','1','C');



$venda = new CmdSql();
$q  =  $venda->query($sql);
$result =   $q->fetchAll(PDO::FETCH_OBJ);

foreach ($result as $linha)
{
    
$pdf->Cell('6','0.6',utf8_decode($linha->Descricao),'1','0','L');
$data = implode("/",array_reverse(explode("-",$linha->DataDespesa) ));
$pdf->Cell('4','0.6',"$data",'1','0','C');
$pdf->Cell('4','0.6',"$linha->Tipo",'1','0','C');
$pdf->Cell('6','0.6',"R$ ".number_format(round($linha->Valor,2), 2, ',', '.'),'1','1','L');
    
           $tDesp =$linha->totaldesp;
           $tvalordesp = $linha->valordesp;	
}    
//0040856445

$pdf->SetDrawColor(250,0,0);
$pdf->SetLineWidth(0.06);
$pdf->Cell('10','0.6',"Total de compras: $tDesp",'1','0','C');
$pdf->Cell('10','0.6',"Valor total: R$ ".number_format(round($tvalordesp,2), 2, ',', '.'),'1','1','C');
			
$pdf->Output();

}

?>
