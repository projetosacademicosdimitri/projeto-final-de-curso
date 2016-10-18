<?php
/*
 *
 * @author Dimitri Miranda 21-12-2013
 * Essa classe é uma composição  com  FPDF
 * Ela é filha de PDO
 */

//require_once '../../Database/CmdSql.php';
include_once 'fpdf.php';
define('FPDF_FONTPATH','font/');

class ScaPdf {
  
//Definindo atribultos de  configurações iniciais do  documento   

   

 //Nome do arquivo que contém a imagem.
   private $img="../../../Model/PDF/imagens/SCA01.png";

//Abscissa do canto superior-esquerdo. 
   private  $x=5;

//Ordenada do canto superio-esquerdo.
    private $y = 0;

//Largura da imagem na página. Se não informada ou zero, ela será calculada automaticamente.
    private $w=0;

//Altura da imagem na página. Se não informada ou zero, ele será calculada automaticamente.
    private $h=0;
    
//Definindo o array de cabeçarios   
   
   private $head;
   
  //composição  com  a classe FPDF
  
   private $pdf;
   
 
  

public function geraPdfVenda($head,$sql)
{   
    
    foreach ($head as $key => $value)
   { 
      //$this->pdf->Cell('4','1','ea','1','0','C');        
   }  
   
  
   


}

   
   
 public function __construct() 
  {  
    $this->pdf =  new FPDF('P','cm','A4');//composição    
    $this->pdf->AddPage();
    $this->pdf->Image($this->img,$this->x,$this->y,$this->w,$this->h);
    
    $this->pdf->SetFont('Arial','','11');
    $this->pdf->Open();
    $this->pdf->SetDisplayMode('default');
    $this->pdf->SetMargins(0.5,5.0,0.0);
    $this->pdf->SetFont('Arial','','11');
    $this->pdf->Cell('4','1','Cliente Material','1','0','C');
    $this->pdf->Cell('4','1','ea','1','0','C');     
   $this->pdf->Output();    
 }
  
   
   
   }

?>
