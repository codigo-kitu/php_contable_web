<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\business\entity;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;

class DatoGeneralDetalleCompra {
    
	public ?float $cantidad=0;			
	public ?float $costo=0.0;
	public ?float $sub_total=0.0;	
	
	public ?float $descuento_porciento=0.0;	
	public ?float $descuento_monto=0.0;
	
	public ?float $iva_porciento=0.0;
	public ?float $iva_monto=0.0;
	
	public ?float $total=0.0;
	
	
	function __construct() {
	    $this->cantidad=0.0;
	    $this->costo=0.0;
	    $this->sub_total=0.0;
	    
	    $this->descuento_porciento=0.0;
	    $this->descuento_monto=0.0;
	    
	    $this->iva_porciento=0.0;
	    $this->iva_monto=0.0;	    
	    $this->total=0.0;
	}	
	
	public function calcular_Total(){
	    $this->sub_total=($this->cantidad * $this->costo);
	    $this->sub_total=Funciones::Redondear($this->sub_total, Constantes::$PRECISION);
	    
	    $this->descuento_monto=$this->sub_total * ($this->descuento_porciento/100);
	    $this->descuento_monto=Funciones::Redondear($this->descuento_monto, Constantes::$PRECISION);
	    
	    $this->iva_monto=($this->sub_total - $this->descuento_monto) * ($this->iva_porciento/100);
	    $this->iva_monto=Funciones::Redondear($this->iva_monto, Constantes::$PRECISION);
	    
	    $this->total=($this->sub_total - $this->descuento_monto) + $this->iva_monto;
	    $this->total=Funciones::Redondear($this->total, Constantes::$PRECISION);
	}
}

?>