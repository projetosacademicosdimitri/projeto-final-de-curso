<?php

include_once '../../../kint/Kint.class.php';
ob_start();
include_once '../../../Model/PDF/fpdf17/fpdf.php';
ini_set("session.auto_start", 0);
define('FPDF_FONTPATH','font/');

include_once '../../../Model/Database/CmdSql.php';

$where1 = "WHERE 1";
$where2 = "WHERE 1";
if(isset($_GET['PdfVenda'])&&($_GET['PdfVenda'])==TRUE)
{    

  if(isset($_GET['id']))
{ $idCliente = $_GET['id'];
   $where1.=" AND v.Clienteid ='$idCliente'";
   $where2.="  AND c.idCliente ='$idCliente'";

}

if(isset($_GET['dtIni']) )
{ 
  $dataIni = $_GET['dtIni'];
  $dataIni = implode("-",array_reverse(explode("/",$dataIni))); 
  $where1.= " AND v.DataVenda >='$dataIni'  ";
  $where2.= "  AND v.DataVenda >='$dataIni'  ";

}

if(isset($_GET['dtFim']))
{ $dataFim = $_GET['dtFim'];
  $dataFim = implode("-",array_reverse(explode("/",$dataFim))); 
 $where1.="   AND v.DataVenda <='$dataFim' ";
 $where2 .="  AND v.DataVenda <='$dataFim'  ";

}


$sql ="SELECT s.CorSaco, s.TamanhoSaco, v.idVenda, v.IdSaco, ";
$sql.="v.DataVenda, c.Nome, v.Quantidade, v.Micragem, v.ValorUnitario, ";
$sql.="v.ValorTotal, c.idCliente,"; 
$sql.="(SELECT SUM( v.ValorTotal )FROM venda v INNER JOIN cliente c ON v.ClienteId = c.idCliente INNER JOIN sacoplastico s ON s.IdSaco = v.IdSaco $where1 )as vTotal,";
$sql.="(SELECT SUM(Quantidade)FROM venda v INNER JOIN cliente c ON v.ClienteId = c.idCliente INNER JOIN sacoplastico s ON s.IdSaco = v.IdSaco $where1 )as tQuantP,";
$sql.="(SELECT COUNT(idVenda)FROM venda v INNER JOIN cliente c ON v.ClienteId = c.idCliente INNER JOIN sacoplastico s ON s.IdSaco = v.IdSaco $where1 )as tQuantV    ";
$sql.="FROM venda v INNER JOIN cliente c ON v.ClienteId = c.idCliente   ";
$sql.="INNER JOIN sacoplastico s ON s.IdSaco = v.IdSaco  ";
$sql.="$where2  ";
$sql.=" ORDER BY v.DataVenda,c.Nome,s.TamanhoSaco ASC";


$pdf =  new FPDF('P','cm','A4');
$pdf->Open();
$pdf->SetDisplayMode('default');
$pdf->SetMargins(0.5,5.0,0.0);
$pdf->SetTitle(utf8_decode('Relatório de vendas - SCA')); // define o titulo do documento pdf
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
$pdf->Cell(20,2,utf8_decode("Relatório Vendas"),1, 1,'C');    




//Head 

$pdf->SetFont('Arial','','9');
$pdf->Cell('4.7','0.6','Cliente','1','0','C');
$pdf->Cell('4','0.6','Material','1','0','C');
$pdf->Cell('1.8','0.6','Micragem','1','0','C');
$pdf->Cell('2','0.6','Quantidade','1','0','C');
$pdf->Cell('2.5','0.6','Data da Venda','1','0','C');
$pdf->Cell('2','0.6','Valor unitario','1','0','C');
$pdf->Cell('3','0.6','Valor Total','1','1','C');



$venda = new CmdSql();
$q  = $venda->query($sql);
$result = $q->fetchAll(PDO::FETCH_OBJ);

foreach ($result as $linha)
{
  
$pdf->Cell('4.7','0.6',utf8_decode($linha->Nome),'1','0','L');
$pdf->Cell('4','0.6',"Saco $linha->CorSaco - $linha->TamanhoSaco Litros",'1','0','L');
$pdf->Cell('1.8','0.6',"$linha->Micragem",'1','0','C');
$pdf->Cell('2','0.6',"$linha->Quantidade",'1','0','C');

$data = implode("/",array_reverse(explode("-",$linha->DataVenda) ));
$pdf->Cell('2.5','0.6',"$data",'1','0','C');
$pdf->Cell('2','0.6',"R$ ".number_format(round($linha->ValorUnitario,2), 2, ',', '.'),'1','0','L');
$pdf->Cell('3','0.6',"R$ ".number_format(round($linha->ValorTotal,2), 2, ',', '.'),'1','1','L');
    
           $tVendas =$linha->tQuantV;
           $tquantP= $linha->tQuantP; 
           $tquantV = $linha->vTotal;
		   
		   
		
}    
//0040856445


$pdf->SetDrawColor(250,0,0);
$pdf->SetLineWidth(0.06);
$pdf->Cell('7','0.6',"Total de vendas: $tVendas",'1','0','C');
$pdf->Cell('7','0.6',"Produtos vendidos: $tquantP",'1','0','C');
$pdf->Cell('6','0.6',"Valor total: R$ ".number_format(round($tquantV,2), 2, ',', '.'),'1','1','C');
			

    $pdf->Output();
	ob_end_flush(); 	   


}

?>
