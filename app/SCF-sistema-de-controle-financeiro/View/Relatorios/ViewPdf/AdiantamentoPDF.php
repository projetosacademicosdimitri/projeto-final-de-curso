<?php
include_once '../../../kint/Kint.class.php';
ob_start();
require_once '../../../Model/PDF/fpdf17/fpdf.php';
require_once '../../../Model/Database/CmdSql.php';

define('FPDF_FONTPATH','font/');



$where1 = "WHERE 1";
$where2 = "WHERE 1";
if(isset($_GET['PdfAdiantamento'])&&($_GET['PdfAdiantamento'])==TRUE)
{    

  if(isset($_GET['id']))
{  $idFunc = $_GET['id'];
   $where1.= " AND a.idFunc ='$idFunc'  ";
   $where2.= " AND f.idFunc ='$idFunc'   ";

}

if(isset($_GET['dtIni']) )
{ 
  $dataIni = $_GET['dtIni'];
  $dataIni = implode("-",array_reverse(explode("/",$dataIni))); 
  $where1.= "  AND a.DataAdiantamento >='$dataIni' ";
  $where2.= "  AND a.DataAdiantamento>='$dataIni' ";

}

if(isset($_GET['dtFim']))
{ $dataFim = $_GET['dtFim'];
  $dataFim = implode("-",array_reverse(explode("/",$dataFim))); 
  $where1.="  AND a.DataAdiantamento <='$dataFim' ";
  $where2.="  AND a.DataAdiantamento <='$dataFim'  ";

}


$sql ="SELECT f.Nome,a.DataAdiantamento as data ,a.ValorAdiantamento as vt ,";
$sql.="(SELECT count(a.idAdiantamento)FROM adiantamento ";
$sql.="a INNER JOIN funcionario f ON a.idFunc = f.idFunc $where1  )as tAdmt,";
$sql.="(SELECT SUM(a.ValorAdiantamento)FROM adiantamento ";
$sql.="a INNER JOIN funcionario f ON a.idFunc = f.idFunc $where1 )as vAdmt  ";
$sql.="FROM  adiantamento a  INNER JOIN funcionario  f  "; 
$sql.="ON a.idFunc = f.idFunc   $where2";
$sql.=" ORDER BY a.DataAdiantamento,f.Nome ASC";

//d($sql);


$pdf =  new FPDF('P','cm','A4');
$pdf->Open();
$pdf->SetDisplayMode('default');
$pdf->SetMargins(0.5,5.0,0.0);
$pdf->SetTitle(utf8_decode('Relatório de adiantamento - SCA')); // define o titulo do documento pdf
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
$pdf->Cell(20,2,utf8_decode("Relatório Adiantamentos"),1, 1,'C');    




//Head 

$pdf->SetFont('Arial','','9');
$pdf->Cell('7','0.6','Nome','1','0','C');
$pdf->Cell('6','0.6','Data do adiantamento','1','0','C');
$pdf->Cell('7','0.6','Valor','1','1','C');


//Excute  SQL PDO
$venda = new CmdSql();
$q  = $venda->query($sql);
$result =   $q->fetchAll(PDO::FETCH_OBJ);



foreach ($result as $linha)
{
    

$pdf->Cell('7','0.6',utf8_decode($linha->Nome),'1','0','L');
$data = implode("/",array_reverse(explode("-",$linha->data) ));
$pdf->Cell('6','0.6',"$data",'1','0','C');
$pdf->Cell('7','0.6',"R$ ".number_format(round($linha->vt,2), 2, ',', '.'),'1','1','L');
    
     $qAdmt = $linha->tAdmt;
     $vAdmT = $linha->vAdmt; 	
}    
//0040856445

$pdf->SetDrawColor(250,0,0);
$pdf->SetLineWidth(0.06);
$pdf->Cell('10','0.6',"Total de adiantamentos: $qAdmt",'1','0','C');
$pdf->Cell('10','0.6',"Valor total: R$ ".number_format(round($vAdmT,2), 2, ',', '.'),'1','1','C');
			
$pdf->Output();
ob_end_flush(); 	

}





?>
