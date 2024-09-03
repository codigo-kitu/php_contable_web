<?php 
namespace com\bydan\framework\contabilidad\util\excel;

use PhpOffice\PhpSpreadsheet\Calculation\Calculation;
use PhpOffice\PhpSpreadsheet\Calculation\Category;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Settings;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Html;
use PhpOffice\PhpSpreadsheet\Writer\Pdf;

class ExcelHelper /*extends AppHelper*/ {
    
    public $xls;
    public $sheet;
    public $title;
    public $header;
    public $data;
    public $blacklist = array();
    
    function __construct() {
        $this->xls = new Spreadsheet();
        $this->sheet = $this->xls->getActiveSheet();        
        $this->sheet->getParent()->getDefaultStyle()->getFont()->setName('Verdana');//Verdana
        
       
    }
                 
    function generate($header,&$data, $title = 'Report',$strTipo='PDF',$webroot='') {
    	 $this->title = $title;
         $this->header = $header;
    	 $this->data =& $data;
         $this->_title();               
         $this->_headers();
         $this->_rows();
         $this->_output($webroot,$strTipo);
         //$this->test();
         return true;
    }
    
    function _title() {
    	
        $this->sheet->setCellValue('A1', $this->title);
        
        $this->sheet->getStyle('A1')->getFont()->setSize(14);
        $this->sheet->getStyle('A1')->getFont()->setBold(true);    
        $this->sheet->getStyle('A1')->getFont()->getColor()->setRGB('0000ff');    
        $this->sheet->getRowDimension('2')->setRowHeight(23);
        
    }

    function _headers() {
    	/*
        $i=0;
        foreach ($this->data[0] as $field => $value) {
            if (!in_array($field,$this->blacklist)) {
                $columnName = Inflector::humanize($field);
                $this->sheet->setCellValueByColumnAndRow($i++, 4, $columnName);
            }
        }
        $this->sheet->getStyle('A4')->getFont()->setBold(true);
        $this->sheet->getStyle('A4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $this->sheet->getStyle('A4')->getFill()->getStartColor()->setRGB('969696');
        $this->sheet->duplicateStyle( $this->sheet->getStyle('A4'), 'B4:'.$this->sheet->getHighestColumn().'4');
        for ($j=1; $j<$i; $j++) {
            $this->sheet->getColumnDimension(PHPExcel_Cell::stringFromColumnIndex($j))->setAutoSize(true);
        }
        */
    	/*
    	$this->sheet->setCellValueByColumnAndRow(1,1 ,'ID');
    	$this->sheet->setCellValueByColumnAndRow(2,1 ,'CODIGO');
    	$this->sheet->setCellValueByColumnAndRow(3,1 ,'NOMBRE');
    	
    	$this->sheet->getColumnDimension(PHPExcel_Cell::stringFromColumnIndex(1))->setAutoSize(true);
    	$this->sheet->getColumnDimension(PHPExcel_Cell::stringFromColumnIndex(2))->setAutoSize(true);
    	$this->sheet->getColumnDimension(PHPExcel_Cell::stringFromColumnIndex(3))->setAutoSize(true);
    	*/
    	
    	$i=0;
    	foreach($this->header as $head) {
            if (!in_array($head->getstrText(),$this->blacklist)) {
                $columnName = $head->getstrText();//Inflector::humanize($head->getstrText());
                $this->sheet->setCellValueByColumnAndRow($i++, 4, $columnName);
            }
        }
        
        $this->sheet->getStyle('A4')->getFont()->setSize(13);
        $this->sheet->getStyle('A4')->getFont()->setBold(true);
        $this->sheet->getStyle('A4')->getFill()->setFillType(Fill::FILL_SOLID);
        $this->sheet->getStyle('A4')->getFill()->getStartColor()->setRGB('C0C0C0');//969696,E8E8E8,C0C0C0

        $this->sheet->duplicateStyle( $this->sheet->getStyle('A4'), 'A4:'.$this->sheet->getHighestColumn().'4');
        
        for ($j=1; $j<$i; $j++) {
            //$this->sheet->getColumnDimension(PHPExcel_Cell::stringFromColumnIndex($j))->setAutoSize(true);
        }
    }
        
    function _rows() {
        $i=5;
        $tiene_fill=false;
        
        /*
        foreach ($this->data as $row) {
            $j=0;
            foreach ($row as $field => $value) {
                if(!in_array($field,$this->blacklist)) {
                    $this->sheet->setCellValueByColumnAndRow($j++,$i, $value);
                }
            }
            $i++;
        }
        */
        
        /*
        $k=2;
        
        foreach($this->data as $dato) {
	        $this->sheet->setCellValueByColumnAndRow(1,$k, $dato->getId());
	        $this->sheet->setCellValueByColumnAndRow(2,$k, $dato->getField_strCodigo());
	        $this->sheet->setCellValueByColumnAndRow(3,$k, $dato->getField_strNombre());
        	
	        $k++;
        }
        */
                
        
     	foreach($this->data as $row) {
     		$j=0;
     		$tiene_fill=false;
     		 
     		foreach($row as $cell) {
            	if(!in_array($cell->getstrText(),$this->blacklist)) {            		            		
            		 
                    $this->sheet->setCellValueByColumnAndRow($j++,$i, $cell->getstrText());
                    
		            if($cell->getblnFill()) {
		            	$j_ant=$j-1;
		            	
		            	$this->sheet->getStyleByColumnAndRow($j_ant,$i);

		            	$this->sheet->getStyleByColumnAndRow($j_ant,$i)->getFont()->setSize(13);
		            	$this->sheet->getStyleByColumnAndRow($j_ant,$i)->getFont()->setBold(true);
			        	$this->sheet->getStyleByColumnAndRow($j_ant,$i)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
			        	$this->sheet->getStyleByColumnAndRow($j_ant,$i)->getFill()->getStartColor()->setRGB('C0C0C0');
			        	
			        	if($cell->getintColSpan()>0) {
			        		//$j_ant_fin=$j_ant + $cell->getintColSpan();
			        		
			        		$this->sheet->mergeCellsByColumnAndRow(0,$i,$cell->getintColSpan(),$i);
			        	}
			        	
			        	if(!$tiene_fill) {
			        		$tiene_fill=true;
			        	}
		            }
                }
            }        
            
            if(!$tiene_fill) {
	     		if ($i % 2 == 0) { 
	     			$this->sheet->getStyle('A'.$i)->getFont()->setSize(11);
	     			$this->sheet->getStyle('A'.$i)->getFill()->setFillType(Fill::FILL_SOLID);
		        	$this->sheet->getStyle('A'.$i)->getFill()->getStartColor()->setRGB('E8E8E8');//C0C0C0
		         	
		        	$this->sheet->duplicateStyle($this->sheet->getStyle('A'.$i), 'A'.$i.':'.$this->sheet->getHighestColumn().$i);
	            }
            }		
           
            
            $i++;   
        }
    }
            
    public function _output($webroot,$strTipo) {   	
    	$strHeaderType='';              			
    	$strHeaderExtension='';
    	//$strTipo='excel2007';
    	$isExcell=false;
    	
    	 ob_end_clean();
    	 
        if($strTipo=='pdf' || $strTipo=='pdf2') {
            $rendererName = Settings::PDF_RENDERER_TCPDF;
			$rendererLibrary = 'tcpdf_6_0_093';
			$rendererLibraryPath = 'vendors/' . $rendererLibrary;
			
			if (!PHPExcel_Settings::setPdfRenderer(
			    $rendererName,
			    $rendererLibraryPath
			    )) {
			    die(
			        'Please set the $rendererName and $rendererLibraryPath values' .
			        PHP_EOL .
			        ' as appropriate for your directory structure'
			    );
			}

			$this->sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);//ORIENTATION_LANDSCAPE,ORIENTATION_PORTRAIT
			
        	//$objWriter = new PHPExcel_Writer_PDF($this->xls);
        	$objWriter = PHPExcel_IOFactory::createWriter($this->xls, 'Dompdf');
        	$strHeaderType='pdf';              			
    		$strHeaderExtension='pdf';
        	
        } else if($strTipo=='excel') {
        	//$objWriter = new PHPExcel_Writer_Excel5($this->xls);
            $objWriter = IOFactory::createWriter($this->xls, 'Xls');
        	$strHeaderType='xls';              			
    		$strHeaderExtension='xls';
    		$isExcell=true;
        
        } else if($strTipo=='csv') {
        	//$objWriter = new PHPExcel_Writer_CSV($this->xls);
            $objWriter = IOFactory::createWriter($this->xls, 'Csv');
        	$strHeaderType='csv';              			
    		$strHeaderExtension='csv';
        
        } else if($strTipo=='excel2007') {
        	//$objWriter = new PHPExcel_Writer_Excel2007($this->xls);
            $objWriter = IOFactory::createWriter($this->xls, 'Xlsx');
        	$strHeaderType='xlsx';              			
    		$strHeaderExtension='xlsx';
    		$isExcell=true;
        
        } else if($strTipo=='html') {
        	//$objWriter = new PHPExcel_Writer_HTML($this->xls);
            $objWriter = IOFactory::createWriter($this->xls, 'Html');
        	$strHeaderType='html';              			
    		$strHeaderExtension='html';
    		
        } else {
        	//$objWriter = new PHPExcel_Writer_PDF($this->xls);
            $objWriter = IOFactory::createWriter($this->xls, 'Dompdf');
        	$strHeaderType='pdf';              			
    		$strHeaderExtension='pdf';
        }           
        
        /*
        header('Content-type: application/'.$strHeaderType.''); 
        header('Content-Disposition: attachment;filename="'.$this->title.'.'.$strHeaderExtension.'"');
        header('Cache-Control: max-age=0'); 
        */
        
        //$path=realpath($webroot);
        //$objWriter->save(str_replace('.php', '.xls', __FILE__)); 
        //$objWriter->save($webroot.$this->_title.'.xls');

        //$objWriter->setTempDir(TMP);               
        //$objWriter->save('php://output');
        
        //$this->exportFormats();
       
        /*
        'Excel2007','Excel5','Excel2003XML','OOCalc',
        'SYLK',Serialized','CSV',            
        */
        
        //ob_end_clean();
        
        //$strHeaderExtension='pdf';
        
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: application/'.$strHeaderType);
        header('Content-Disposition: attachment;filename="'.$this->title.'.'.$strHeaderExtension.'"');
        
         
        if($isExcell==true) {
        	if (ob_get_contents()) {
        		ob_end_clean();
        	}
        }
         
        $objWriter->save('php://output');
        
        if($isExcell==true) {
        	$this->xls->disconnectWorksheets();
        }
        
        unset($this->xls);
    }
    
    function exportFormats() {
    	$objWriter = new PHPExcel_Writer_CSV($this->xls);
        $objWriter->save(str_replace('.php', '.csv', __FILE__)); 
        
        $objWriter = new PHPExcel_Writer_Excel2007($this->xls);
        $objWriter->save(str_replace('.php', '.xlsx', __FILE__)); 
        
        $objWriter = new PHPExcel_Writer_HTML($this->xls);
        $objWriter->save(str_replace('.php', '.html', __FILE__));

        $objWriter = new PHPExcel_Writer_PDF($this->xls);
        $objWriter->save(str_replace('.php', '.pdf', __FILE__)); 
        
    }
    function test() {
		    // Create new PHPExcel object
		$objPHPExcel = new PHPExcel();
		
		// Set properties
		$objPHPExcel->getProperties()->setCreator("Maarten Balliauw");
		$objPHPExcel->getProperties()->setLastModifiedBy("Maarten Balliauw");
		$objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
		$objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
		$objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.");
		
		
		// Add some data
		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Hello');
		$objPHPExcel->getActiveSheet()->SetCellValue('B2', 'world!');
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Hello');
		$objPHPExcel->getActiveSheet()->SetCellValue('D2', 'world!');
		
		// Rename sheet
		$objPHPExcel->getActiveSheet()->setTitle('Simple');
		
		// Save Excel 2007 file
		//PHPExcel_Writer_Excel2007
		
		header("Content-type: application/vnd.ms-excel"); 
        header('Content-Disposition: attachment;filename="temp.xls"');
        header('Cache-Control: max-age=0');
        
		
		$objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
		//$objWriter->setTempDir(TMP);
        $objWriter->save('php://output');
		//$objWriter->save(str_replace('.php', '.xls', __FILE__)); 
    }
    
 	function generateVertical($header,&$data, $title = 'Report',$strTipo='PDF',$webroot='') {
    	 $this->title = $title;
         $this->header = $header;
    	 $this->data =& $data;
         $this->_title();               
         //$this->_headersVertical();
         $this->_rowsVertical();
         $this->_output($webroot,$strTipo);
         //$this->test();
         return true;
    }     	
    
	function _rowsVertical() {
        $i=5;
        
        //MANUAL        
        //$this->sheet->getColumnDimension('A')->setWidth(35);
        //$this->sheet->getColumnDimension('B')->setWidth(70);      
        
        //SI SE QUIERE AUTOMATICO
        $this->sheet->getColumnDimension(PHPExcel_Cell::stringFromColumnIndex(0))->setAutoSize(true);
        $this->sheet->getColumnDimension(PHPExcel_Cell::stringFromColumnIndex(1))->setAutoSize(true);
               
        
     	foreach($this->data as $row) {
     		$j=0;
     		
            foreach($row as $cell) {
            	if(!in_array($cell->getstrText(),$this->blacklist)) {            		            		

            		if($cell->getblnEsTituloGrupo()) {
            			
            			$this->sheet->mergeCells('A'.$i.':B'.$i);
            			$this->sheet->getStyle('A'.$i)->getFont()->setSize(13);
            			$this->sheet->getStyle('A'.$i)->getFont()->setBold(true);
			        	$this->sheet->getStyle('A'.$i)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
			        	$this->sheet->getStyle('A'.$i)->getFill()->getStartColor()->setRGB('C0C0C0');//C0C0C0
			        	
			         	//$this->sheet->duplicateStyle($this->sheet->getStyle('A'.$i), 'A'.$i.'B:'.$i);//.$this->sheet->getHighestColumn().$i);
			         	
			         				         	
            		} else {
	            		if ($j % 2 == 0) { 
			     			$this->sheet->getStyle('A'.$i)->getFont()->setSize(11);
				        	$this->sheet->getStyle('A'.$i)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
				        	$this->sheet->getStyle('A'.$i)->getFill()->getStartColor()->setRGB('E8E8E8');//C0C0C0
				         	//$this->sheet->duplicateStyle($this->sheet->getStyle('A'.$i), 'A'.$i.':'.$this->sheet->getHighestColumn().$i);
			            }
            		}
            		
                    $this->sheet->setCellValueByColumnAndRow($j++,$i, $cell->getstrText());
                }
            }        
            
            /*
            $this->sheet->getStyle('A4')->getFont()->setSize(13);
	        $this->sheet->getStyle('A4')->getFont()->setBold(true);
	        $this->sheet->getStyle('A4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
	        $this->sheet->getStyle('A4')->getFill()->getStartColor()->setRGB('C0C0C0');//969696,E8E8E8,C0C0C0	 
            */
            
            /*
     		if ($i % 2 == 0) { 
     			$this->sheet->getStyle('A'.$i)->getFont()->setSize(11);
	        	$this->sheet->getStyle('A'.$i)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
	        	$this->sheet->getStyle('A'.$i)->getFill()->getStartColor()->setRGB('E8E8E8');//C0C0C0
	         	$this->sheet->duplicateStyle($this->sheet->getStyle('A'.$i), 'A'.$i.':'.$this->sheet->getHighestColumn().$i);
            }
            */
            		
            $i++;   
        }
    }

/*
App::import('Vendor','IOFactory',array('file' => 'excel/PHPExcel/IOFactory.php'));
App::import('Vendor','PHPExcel',array('file' => 'excel/PHPExcel.php'));
App::import('Vendor','PHPExcelWriter',array('file' => 'excel/PHPExcel/Writer/Excel5.php'));
App::import('Vendor','PHPHtmlWriter',array('file' => 'excel/PHPExcel/Writer/HTML.php'));
App::import('Vendor','PHPPdfWriter',array('file' => 'excel/PHPExcel/Writer/PDF.php'));
App::import('Vendor','PHPCsvWriter',array('file' => 'excel/PHPExcel/Writer/CSV.php'));
App::import('Vendor','PHPExcel2007Writer',array('file' => 'excel/PHPExcel/Writer/Excel2007.php'));
*/

//include_once('vendor/autoload.php');
/*
include_once('vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Spreadsheet.php');
include_once('vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Calculation/Calculation.php');
include_once('vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Calculation/Category.php');
include_once('vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Calculation/Engine/CyclicReferenceStack.php');
include_once('vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Calculation/Engine/Logger.php');
include_once('vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/ReferenceHelper.php');
include_once('vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Worksheet/Worksheet.php');
include_once('vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/IOFactory.php');
include_once('vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/IWriter.php');
include_once('vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/BaseWriter.php');
include_once('vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Xls.php');
include_once('vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Html.php');
include_once('vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Pdf.php');
include_once('vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Csv.php');
include_once('vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Xlsx.php');
*/
/*
use PHPExcel;
use PHPExcel_Cell;
use PHPExcel_Style_Fill;
use PHPExcel_Settings;
use PHPExcel_Worksheet_PageSetup;
use PHPExcel_IOFactory;
use PHPExcel_Writer_CSV;
use PHPExcel_Writer_Excel5;
use PHPExcel_Writer_HTML;
use PHPExcel_Writer_PDF;
use PHPExcel_Writer_Excel2007;
*/

}
?>