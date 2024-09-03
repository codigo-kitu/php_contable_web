<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\business\entity;

class ParameterDivSecciones {
	
	public bool $bitDivsEsCargarGeneralAjaxWebPart=false;	        
	public bool $bitDivEsCargarAjaxWebPart=false;	        
	public bool $bitDivsEsCargarMostrarAjaxWebPart=false;
	public bool $bitDivEsCargarMantenimientosAjaxWebPart=false; 
	public bool $bitDivEsCargarMantenimientoFilaTablaAjaxWebPart=false;
	public bool $bitDivEsCargarMensajesAjaxWebPart=false;	        
	public bool $bitDivsEsCargarMostrarBusquedasAjaxWebPart=false;	   	        
	public bool $bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart=false;	        
	public bool $bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart=false;	        
	public bool $bitDivsEsCargarReporteAuxiliarAjaxWebPart=false;	        
	public bool $bitDivsEsCargarResumenAjaxWebPart=false;	        
	public bool $bitDivsEsCargarAccionesRelacionesAjaxWebPart=false;	
	public bool $bitDivsEsCargarFKsAjaxWebPart=false;
	       

    function __construct() {			
	    $this->bitDivsEsCargarGeneralAjaxWebPart=false;
	    $this->bitDivEsCargarAjaxWebPart=false;
	    $this->bitDivsEsCargarMostrarAjaxWebPart=false;
	    $this->bitDivEsCargarMantenimientosAjaxWebPart=false;
	    $this->bitDivEsCargarMantenimientoFilaTablaAjaxWebPart=false;	           
	    $this->bitDivEsCargarMensajesAjaxWebPart=false;
	    $this->bitDivsEsCargarMostrarBusquedasAjaxWebPart=false;
	    $this->bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart=false;
	    $this->bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart=false;
	    $this->bitDivsEsCargarReporteAuxiliarAjaxWebPart=false;
	    $this->bitDivsEsCargarResumenAjaxWebPart=false;
	    $this->bitDivsEsCargarAccionesRelacionesAjaxWebPart=false;
	    $this->bitDivsEsCargarFKsAjaxWebPart=false;
	}	
	
	public function setParameterDivSecciones (
	    bool $bitDivsEsCargarGeneralAjaxWebPart=false,
	    bool $bitDivEsCargarAjaxWebPart=true,
	    bool $bitDivsEsCargarMostrarAjaxWebPart=true,
	    bool $bitDivEsCargarMantenimientosAjaxWebPart=true,
	    bool $bitDivEsCargarMensajesAjaxWebPart=true,
	    bool $bitDivsEsCargarMostrarBusquedasAjaxWebPart=true,
	    bool $bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart=true,
	    bool $bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart=true,
	    bool $bitDivsEsCargarReporteAuxiliarAjaxWebPart=false,
	    bool $bitDivsEsCargarResumenAjaxWebPart=false,
	    bool $bitDivsEsCargarAccionesRelacionesAjaxWebPart=false,
	    bool $bitDivsEsCargarFKsAjaxWebPart=false
	) {
	    $this->bitDivsEsCargarGeneralAjaxWebPart=$bitDivsEsCargarGeneralAjaxWebPart;
	    $this->bitDivEsCargarAjaxWebPart=$bitDivEsCargarAjaxWebPart;
	    $this->bitDivsEsCargarMostrarAjaxWebPart=$bitDivsEsCargarMostrarAjaxWebPart;
	    $this->bitDivEsCargarMantenimientosAjaxWebPart=$bitDivEsCargarMantenimientosAjaxWebPart;
	    $this->bitDivEsCargarMensajesAjaxWebPart=$bitDivEsCargarMensajesAjaxWebPart;
	    $this->bitDivsEsCargarMostrarBusquedasAjaxWebPart=$bitDivsEsCargarMostrarBusquedasAjaxWebPart;
	    $this->bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart=$bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart;
	    $this->bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart=$bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart;
	    $this->bitDivsEsCargarReporteAuxiliarAjaxWebPart=$bitDivsEsCargarReporteAuxiliarAjaxWebPart;
	    $this->bitDivsEsCargarResumenAjaxWebPart=$bitDivsEsCargarResumenAjaxWebPart;
	    $this->bitDivsEsCargarAccionesRelacionesAjaxWebPart=$bitDivsEsCargarAccionesRelacionesAjaxWebPart;
	    $this->bitDivsEsCargarFKsAjaxWebPart=$bitDivsEsCargarFKsAjaxWebPart;
	}
	   
    public function getBitDivsEsCargarGeneralAjaxWebPart():bool
    {
        return $this->bitDivsEsCargarGeneralAjaxWebPart;
    }
   
    public function getBitDivEsCargarAjaxWebPart():bool
    {
        return $this->bitDivEsCargarAjaxWebPart;
    }

    public function getBitDivsEsCargarMostrarAjaxWebPart():bool
    {
        return $this->bitDivsEsCargarMostrarAjaxWebPart;
    }

    public function getBitDivEsCargarMantenimientosAjaxWebPart():bool
    {
        return $this->bitDivEsCargarMantenimientosAjaxWebPart;
    }

    public function getBitDivEsCargarMensajesAjaxWebPart():bool
    {
        return $this->bitDivEsCargarMensajesAjaxWebPart;
    }

    public function getBitDivsEsCargarMostrarBusquedasAjaxWebPart():bool
    {
        return $this->bitDivsEsCargarMostrarBusquedasAjaxWebPart;
    }

    public function getBitDivsEsCargarMostrarSoloBusquedasAjaxWebPart():bool
    {
        return $this->bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart;
    }

    public function getBitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart():bool
    {
        return $this->bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart;
    }

    public function getBitDivsEsCargarReporteAuxiliarAjaxWebPart():bool
    {
        return $this->bitDivsEsCargarReporteAuxiliarAjaxWebPart;
    }

    public function getBitDivsEsCargarResumenAjaxWebPart():bool
    {
        return $this->bitDivsEsCargarResumenAjaxWebPart;
    }

    public function getBitDivsEsCargarAccionesRelacionesAjaxWebPart():bool
    {
        return $this->bitDivsEsCargarAccionesRelacionesAjaxWebPart;
    }

    public function getBitDivsEsCargarFKsAjaxWebPart():bool
    {
        return $this->bitDivsEsCargarFKsAjaxWebPart;
    }

    public function setBitDivsEsCargarGeneralAjaxWebPart(bool $bitDivsEsCargarGeneralAjaxWebPart)
    {
        $this->bitDivsEsCargarGeneralAjaxWebPart = $bitDivsEsCargarGeneralAjaxWebPart;
    }

    public function setBitDivEsCargarAjaxWebPart(bool $bitDivEsCargarAjaxWebPart)
    {
        $this->bitDivEsCargarAjaxWebPart = $bitDivEsCargarAjaxWebPart;
    }

    public function setBitDivsEsCargarMostrarAjaxWebPart(bool $bitDivsEsCargarMostrarAjaxWebPart)
    {
        $this->bitDivsEsCargarMostrarAjaxWebPart = $bitDivsEsCargarMostrarAjaxWebPart;
    }

    public function setBitDivEsCargarMantenimientosAjaxWebPart(bool $bitDivEsCargarMantenimientosAjaxWebPart)
    {
        $this->bitDivEsCargarMantenimientosAjaxWebPart = $bitDivEsCargarMantenimientosAjaxWebPart;
    }

    public function setBitDivEsCargarMensajesAjaxWebPart(bool $bitDivEsCargarMensajesAjaxWebPart)
    {
        $this->bitDivEsCargarMensajesAjaxWebPart = $bitDivEsCargarMensajesAjaxWebPart;
    }

    public function setBitDivsEsCargarMostrarBusquedasAjaxWebPart(bool $bitDivsEsCargarMostrarBusquedasAjaxWebPart)
    {
        $this->bitDivsEsCargarMostrarBusquedasAjaxWebPart = $bitDivsEsCargarMostrarBusquedasAjaxWebPart;
    }

    public function setBitDivsEsCargarMostrarSoloBusquedasAjaxWebPart(bool $bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart)
    {
        $this->bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart = $bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart;
    }

    public function setBitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart(bool $bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart)
    {
        $this->bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart = $bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart;
    }

    public function setBitDivsEsCargarReporteAuxiliarAjaxWebPart(bool $bitDivsEsCargarReporteAuxiliarAjaxWebPart)
    {
        $this->bitDivsEsCargarReporteAuxiliarAjaxWebPart = $bitDivsEsCargarReporteAuxiliarAjaxWebPart;
    }

    public function setBitDivsEsCargarResumenAjaxWebPart(bool $bitDivsEsCargarResumenAjaxWebPart)
    {
        $this->bitDivsEsCargarResumenAjaxWebPart = $bitDivsEsCargarResumenAjaxWebPart;
    }

    public function setBitDivsEsCargarAccionesRelacionesAjaxWebPart(bool $bitDivsEsCargarAccionesRelacionesAjaxWebPart)
    {
        $this->bitDivsEsCargarAccionesRelacionesAjaxWebPart = $bitDivsEsCargarAccionesRelacionesAjaxWebPart;
    }

    public function setBitDivsEsCargarFKsAjaxWebPart(bool $bitDivsEsCargarFKsAjaxWebPart)
    {
        $this->bitDivsEsCargarFKsAjaxWebPart = $bitDivsEsCargarFKsAjaxWebPart;
    }
 		
    public function getBitDivEsCargarMantenimientoFilaTablaAjaxWebPart():bool
    {
        return $this->bitDivEsCargarMantenimientoFilaTablaAjaxWebPart;
    }
    
    public function setBitDivEsCargarMantenimientoFilaTablaAjaxWebPart(bool $bitDivEsCargarMantenimientoFilaTablaAjaxWebPart)
    {
        $this->bitDivEsCargarMantenimientoFilaTablaAjaxWebPart = $bitDivEsCargarMantenimientoFilaTablaAjaxWebPart;
    }  

/*private $sMensaje='';*/
	
}

?>