
<?php

include_once '../../../kint/Kint.class.php';
require_once '../../../Model/PDF/fpdf17/fpdf.php';
define('FPDF_FONTPATH','font/');

require_once '../../../Model/Database/CmdSql.php';

$where1 = "WHERE 1";
$where2 = "WHERE 1";
if(isset($_GET['PdfCheque'])&&($_GET['PdfCheque'])==TRUE)
{    


if(isset($_GET['TpCheque']))
{ $TpCheque = $_GET['TpCheque'];
$where1.= " AND Tipo = $TpCheque  ";
$where2.= " AND Tipo = $TpCheque  ";
}

if(isset($_GET['dtIni']) )
{ 
  $dataIni = $_GET['dtIni'];
  $dataIni = implode("-",array_reverse(explode("/",$dataIni))); 
  $where1.= "  AND DataEmisao>='$dataIni' ";
  $where2.= "  AND DataEmisao>='$dataIni' ";

}

if(isset($_GET['dtFim']))
{ $dataFim = $_GET['dtFim'];
  $dataFim = implode("-",array_reverse(explode("/",$dataFim))); 
 $where1.="  AND DataEmisao <='$dataFim' ";
 $where2.="  AND DataEmisao <='$dataFim'  ";

}


$sql ="SELECT * ,";
$sql.="(SELECT count(idCheque) FROM cheque $where1 ) as totalcheques ,";
$sql.="(SELECT sum(ValorCheque) FROM cheque $where1 ) as valortotalche ";
$sql.="FROM cheque $where1 ";
$sql.=" ORDER BY DataEmisao ASC";


$pdf =  new FPDF('P','cm','A4');
$pdf->Open();
$pdf->SetDisplayMode('default');
$pdf->SetMargins(0.5,5.0,0.0);
$pdf->SetTitle(utf8_decode('Relatório de cheques - SCA')); // define o titulo do documento pdf
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
$pdf->Cell(20,2,utf8_decode("Relatório Cheques"),1, 1,'C');    




//Head 

$pdf->SetFont('Arial','','9');
$pdf->Cell('5.7','0.6','Nome','1','0','C');
$pdf->Cell('1.8','0.6',utf8_decode('Número'),'1','0','C');
$pdf->Cell('3','0.6',utf8_decode('Data emissão'),'1','0','C');
$pdf->Cell('3','0.6',utf8_decode('Data compensação'),'1','0','C');
$pdf->Cell('3.5','0.6','Tipo cheque','1','0','C');
$pdf->Cell('3','0.6','Valor do cheque','1','1','C');



$venda = new CmdSql();
$q  =  $venda->query($sql);
$result =   $q->fetchAll(PDO::FETCH_OBJ);



foreach ($result as $linha)
{

 $TipoCheque = "";
         $TpCheque = $linha->Tipo;
	 if($TpCheque == 1){$TipoCheque = "Cheque ao portador";}else 
         if($TpCheque == 2){$TipoCheque = "Cheque nominal";}else 
         if($TpCheque == 3){$TipoCheque = "Cheque cruzado";}else 
         if($TpCheque == 4){$TipoCheque = "Cheque pré-datado";}else 
         if($TpCheque == 5){$TipoCheque = "Cheque especial";}else 
         if($TpCheque == 6){$TipoCheque = "Cheque administrativo";}else
         if($TpCheque == 0 || $TpCheque >=7){$TipoCheque = "Outros";}
    
$pdf->Cell('5.7','0.6',utf8_decode($linha->Nome),'1','0','L');
$pdf->Cell('1.8','0.6',"$linha->Numero",'1','0','C');
$dataEmi = implode("/",array_reverse(explode("-",$linha->DataEmisao) ));
$pdf->Cell('3','0.6',"$dataEmi",'1','0','C');
$dataCom = implode("/",array_reverse(explode("-",$linha->DataCompesacao) ));
$pdf->Cell('3','0.6',"$dataCom",'1','0','C');
$pdf->Cell('3.5','0.6',utf8_decode($TipoCheque),'1','0','L');
$pdf->Cell('3','0.6',"R$ ".number_format(round($linha->ValorCheque,2), 2, ',', '.'),'1','1','L');
    
           $tCheques =$linha->totalcheques;
           $tChequesValor = $linha->valortotalche;	
}    
//0040856445

$pdf->SetDrawColor(250,0,0);
$pdf->SetLineWidth(0.06);
$pdf->Cell('10','0.6',"Total de cheques: $tCheques",'1','0','C');
$pdf->Cell('10','0.6',"Valor total: R$ ".number_format(round($tChequesValor,2), 2, ',', '.'),'1','1','C');
			
$pdf->Output();

}

?>
