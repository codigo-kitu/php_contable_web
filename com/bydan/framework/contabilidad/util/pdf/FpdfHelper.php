<?php
namespace com\bydan\framework\contabilidad\util\pdf;

use FPDF;
//namespace com\bydan\framework\contabilidad\util\pdf;

//vendor('fpdf/fpdf');
//App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
include_once('vendor/setasign/fpdf/fpdf.php');


//if (!defined('PARAGRAPH_STRING')) define('PARAGRAPH_STRING', '~~~');
if (!defined('PARAGRAPH_STRING')) define('PARAGRAPH_STRING', '~~~');

class FpdfHelper extends FPDF {
    var $helpers= array(); 
	var $title;
	public $subtitle;
	
	function __construct($orientation='P',$unit='mm',$format='A4') {
		if($orientation==null) {
			$orientation='P';
		}
		
		//$this->FPDF($orientation, $unit, $format);
		
		parent::__construct($orientation, $unit, $format);
	}
	
    /**
    * Allows you to change the defaults set in the FPDF constructor
    *
    * @param string $orientation page orientation values: P, Portrait, L, or Landscape    (default is P)
    * @param string $unit values: pt (point 1/72 of an inch), mm, cm, in. Default is mm
    * @param string $format values: A3, A4, A5, Letter, Legal or a two element array with the width and height in unit given in $unit
    */
    public function setup ($orientation='P',$unit='mm',$format='A4') {
        $this->FPDF($orientation, $unit, $format); 
    }
    
    /**
    * Allows you to control how the pdf is returned to the user, most of the time in CakePHP you probably want the string
    *
    * @param string $name name of the file.
    * @param string $destination where to send the document values: I, D, F, S
    * @return string if the $destination is S
    */
    public function fpdfOutput ($name = 'page.pdf', $destination = 's') {
        // I: send the file inline to the browser. The plug-in is used if available. 
        //    The name given by name is used when one selects the "Save as" option on the link generating the PDF.
        // D: send to the browser and force a file download with the name given by name.
        // F: save to a local file with the name given by name.
        // S: return the document as a string. name is ignored.
 
    	return $this->Output($name, $destination);
    }
    
     function Header()
    {
        //Logo
        $this->Image(WWW_ROOT.DS.'img/Imagenes/Logos/LogoReporte.jpg',10,8,33);  
        // you can //PHP5.3-use jpeg or pngs see the manual for fpdf for more info
        //Arial bold 15
        $this->SetFont('Arial','B',15);
        //Move to the right
        $this->Cell(80);
        //Title
        $this->Cell(30,10,$this->title,0,0,'C');
        $this->Cell(15,30,$this->subtitle,0,0,'C');
        //Line break
        $this->Ln(60);
    }

    //Page footer
    function Footer()
    {
        //Position at 1.5 cm from bottom
        $this->SetY(-15);
        //Arial italic 8
        $this->SetFont('Arial','I',8);
        //Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    } 
    
    function basicTable($header,$data)
    {

        //Header
        foreach($header as $col) {
            $this->Cell($col->getintWidth(),$col->getintHeight(),$col->getstrText(),$col->getintBorder());
        }
        
        $this->Ln();
        //Data
        foreach($data as $row) {
            foreach($row as $col) {
                $this->Cell($col->getintWidth(),$col->getintHeight(),$col->getstrText(),$col->getintBorder());
            }
            $this->Ln();
        }
    } 
    
    function fancyTable($header, $colWidth, $data) {
        
        //Colors, line width and bold font
        $w=999;
        
        $this->SetFillColor(255,0,0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
        
        //Header        
        for($i=0;$i<count($header);$i++)
            $this->Cell($colWidth[$i],7,$header[$i],1,0,'C',1);
        
            $this->Ln();
        
        //Color and font restoration
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');
        
        //Data
        $fill=0;
        
        foreach($data as $row) {
            $i = 0;
            
            foreach($row as $col) {
                $this->Cell($colWidth[$i++],6,$col,'LR',0,'L',$fill);
            }
            
            $this->Ln();
            
            $fill=!$fill;
        }
        
        $this->Cell(array_sum($w),0,'','T');
    } 
}
?>