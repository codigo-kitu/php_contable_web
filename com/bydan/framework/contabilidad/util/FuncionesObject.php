<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\util;

class FuncionesObject {

    //COPIA EXACTA de Funciones pero sin ser Estatico
    public array $arrOrderBy=array();
    public bool $bitParaReporteOrderBy=false;
    
    public function existeCadenaArrayOrderBy(?string $cadenaBuscar='',?array $arrCadenasOrderBy=array(),?bool $parareporte_orderby=false) : bool {
		$existe=false;

		$existe=Funciones::existeCadenaArrayOrderBy($cadenaBuscar,$arrCadenasOrderBy,$parareporte_orderby);
		
		return $existe;
	}
	
	public function ValCol(?string $sColName,?bool $paraReporte) : bool {
	    $valido=true;
	    
	    if($paraReporte) {
	        $valido=Funciones::existeCadenaArrayOrderBy($sColName,$this->arrOrderBy,$this->bitParaReporteOrderBy);
	    }
	    
	    return $valido;
	}
	
	public function getCheckBox($value,?string $nombre,?bool $paraReporte=false) { //: string 
	    $strCheckBox='';
	    	   
	    $strCheckBox=Funciones::getCheckBoxInterno($value, false,$nombre,$paraReporte);
	    
	    //return $strCheckBox;
	    
	    //SOLO PARA TEMPLATING
	    echo($strCheckBox);
	}
	
	public function getCheckBoxEditar($value,?string $nombre,?bool $paraReporte=false) { //: string 
	    $strCheckBox='';
	    
	    $strCheckBox=Funciones::getCheckBoxInterno($value, true,$nombre,$paraReporte);
	    	    	    
	    //return $strCheckBox;
	    
	    //SOLO PARA TEMPLATING
	    echo($strCheckBox);
	}
	
	public function getComboBoxEditar(?string $descripcion,$value,?string $nombre) { //: string 
	    $strComboBox='';
	    
	    $strComboBox=Funciones::getComboBoxInterno($descripcion,$value,$nombre,true);
	    
	    //return $strComboBox;
	    
	    //SOLO PARA TEMPLATING
	    echo($strComboBox);
	}
	
	public function getOnMouseOverHtml(?string $STR_TIPO_TABLA,?int $i) : string { 
	    $onmouse='';
	    
	    $onmouse=Funciones::getOnMouseOverHtml($STR_TIPO_TABLA, $i);
	    
	    return $onmouse;
	}
	
	public function getOnMouseOverHtmlReporte(?bool $paraReporte,?string $STR_TIPO_TABLA,?int $i) : string {
	    $onmouse='';
	    
	    $onmouse=Funciones::getOnMouseOverHtmlReporte($paraReporte, $STR_TIPO_TABLA, $i);
	    
	    return $onmouse;
	}
	
	public static function getClassRowTableHtml(?int $i) : string {
	    $class='';
	    
	    $class=Funciones::getClassRowTableHtml($i);
	    
	    return $class;
	}

//PHP5.3-use com\bydan\framework\medical\business\entity\Classe;
//PHP5.3-use com\bydan\framework\medical\business\entity\LogHtmlFormatter;

/*
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\presentation\templating\Template;
use reportico;
*/

}

?>