
<?php

include_once '../../../kint/Kint.class.php';
require_once '../../../Model/PDF/fpdf17/fpdf.php';
define('FPDF_FONTPATH','font/');

require_once '../../../Model/Database/CmdSql.php';

$where1 = "WHERE 1";
$where2 = "WHERE 1";
if(isset($_GET['PdfCompra'])&&($_GET['PdfCompra'])==TRUE)
{    

  if(isset($_GET['id']))
{  $IdFornecedor = $_GET['id'];
   $where1.= " AND FornecedorId = '$IdFornecedor'  ";
   $where2.= " AND FornecedorId = '$IdFornecedor'  ";

}

if(isset($_GET['dtIni']) )
{ 
  $dataIni = $_GET['dtIni'];
  $dataIni = implode("-",array_reverse(explode("/",$dataIni))); 
  $where1.= "  AND DataCompra>='$dataIni' ";
  $where2.= "  AND DataCompra>='$dataIni' ";

}

if(isset($_GET['dtFim']))
{ $dataFim = $_GET['dtFim'];
  $dataFim = implode("-",array_reverse(explode("/",$dataFim))); 
 $where1.="  AND DataCompra <='$dataFim' ";
 $where2.="  AND DataCompra <='$dataFim' ";

}


$sql ="SELECT * ,";
$sql.="(SELECT count(idCompra) from compra INNER JOIN fornecedor f ON f.idFornecedor = FornecedorId $where1 ) as tCompras,";
$sql.="(SELECT sum(ValorTotal) from compra INNER JOIN fornecedor f ON f.idFornecedor = FornecedorId $where1) as tValorTotal FROM compra c INNER JOIN fornecedor f ON f.idFornecedor = c.FornecedorId $where2 ";
$sql.=" ORDER BY DataCompra ASC";


$pdf =  new FPDF('P','cm','A4');
$pdf->Open();
$pdf->SetDisplayMode('default');
$pdf->SetMargins(0.5,5.0,0.0);
$pdf->SetTitle(utf8_decode('Relatório de compras - SCA')); // define o titulo do documento pdf
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
$pdf->Cell(20,2,utf8_decode("Relatório Compras"),1, 1,'C');    




//Head 

$pdf->SetFont('Arial','','9');
$pdf->Cell('4.5','0.6','Material','1','0','C');
$pdf->Cell('4.5','0.6','Fornecedor','1','0','C');
$pdf->Cell('2.5','0.6','Data da compra','1','0','C');
$pdf->Cell('2','0.6','Quantidade','1','0','C');
$pdf->Cell('2.5','0.6','Valor unitario','1','0','C');
$pdf->Cell('4','0.6','Valor Total','1','1','C');



$venda = new CmdSql();
$q  =  $venda->query($sql);
$result =   $q->fetchAll(PDO::FETCH_OBJ);

foreach ($result as $linha)
{
    
$pdf->Cell('4.5','0.6',utf8_decode($linha->Material),'1','0','L');
$pdf->Cell('4.5','0.6',utf8_decode($linha->Nome),'1','0','L');
$data = implode("/",array_reverse(explode("-",$linha->DataCompra) ));
$pdf->Cell('2.5','0.6',"$data",'1','0','C');
$pdf->Cell('2','0.6',"$linha->Quantidade",'1','0','C');
$pdf->Cell('2.5','0.6',"R$ ".number_format(round($linha->ValorUnitario,2), 2, ',', '.'),'1','0','L');
$pdf->Cell('4','0.6',"R$ ".number_format(round($linha->ValorTotal,2), 2, ',', '.'),'1','1','L');
    
           $tCompras =$linha->tCompras;
           $tquantV = $linha->tValorTotal;	
}    
//0040856445

$pdf->SetDrawColor(250,0,0);
$pdf->SetLineWidth(0.06);
$pdf->Cell('10','0.6',"Total de compras: $tCompras",'1','0','C');
$pdf->Cell('10','0.6',"Valor total: R$ ".number_format(round($tquantV,2), 2, ',', '.'),'1','1','C');
			
$pdf->Output();

}

?>
