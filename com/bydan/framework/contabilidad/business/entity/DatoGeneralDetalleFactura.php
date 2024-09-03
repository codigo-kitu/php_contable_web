<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\business\entity;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;

class DatoGeneralDetalleFactura {
    
	public ?float $cantidad=0;			
	public ?float $precio=0.0;
	public ?float $sub_total=0.0;	
	
	public ?float $descuento_porciento=0.0;	
	public ?float $descuento_monto=0.0;
	
	public ?float $iva_porciento=0.0;
	public ?float $iva_monto=0.0;
	
	public ?float $total=0.0;
	
	
	function __construct() {
	    $this->cantidad=0.0;
	    $this->precio=0.0;
	    $this->sub_total=0.0;
	    
	    $this->descuento_porciento=0.0;
	    $this->descuento_monto=0.0;
	    
	    $this->iva_porciento=0.0;
	    $this->iva_monto=0.0;	    
	    $this->total=0.0;
	}	
	
	public function calcular_Total(){
	    $this->sub_total=($this->cantidad * $this->precio);
	    $this->sub_total=Funciones::Redondear($this->sub_total, Constantes::$PRECISION);
	    
	    $this->descuento_monto=$this->sub_total * ($this->descuento_porciento/100);
	    $this->descuento_monto=Funciones::Redondear($this->descuento_monto, Constantes::$PRECISION);
	    
	    $this->iva_monto=($this->sub_total - $this->descuento_monto) * ($this->iva_porciento/100);
	    $this->iva_monto=Funciones::Redondear($this->iva_monto, Constantes::$PRECISION);
	    
	    $this->total=($this->sub_total - $this->descuento_monto) + $this->iva_monto;
	    $this->total=Funciones::Redondear($this->total, Constantes::$PRECISION);
	}
	
    public function getCantidad():?int {
        return $this->cantidad;
    }

    public function getPrecio():?float
    {
        return $this->precio;
    }

    public function getSub_total():?float
    {
        return $this->sub_total;
    }

    public function getDescuento_porciento():?float
    {
        return $this->descuento_porciento;
    }

    public function getDescuento_monto():?float
    {
        return $this->descuento_monto;
    }

    public function getIva_porciento():?float
    {
        return $this->iva_porciento;
    }

    public function getIva_monto():?float
    {
        return $this->iva_monto;
    }

    public function getTotal():?float
    {
        return $this->total;
    }

    public function setCantidad(?int $cantidad)
    {
        $this->cantidad = $cantidad;
    }

    public function setPrecio(?float $precio)
    {
        $this->precio = $precio;
    }

    public function setSub_total(?float $sub_total)
    {
        $this->sub_total = $sub_total;
    }

    public function setDescuento_porciento(?float $descuento_porciento)
    {
        $this->descuento_porciento = $descuento_porciento;
    }

    public function setDescuento_monto(?float $descuento_monto)
    {
        $this->descuento_monto = $descuento_monto;
    }

    public function setIva_porciento(?float $iva_porciento)
    {
        $this->iva_porciento = $iva_porciento;
    }

    public function setIva_monto(?float $iva_monto)
    {
        $this->iva_monto = $iva_monto;
    }

    public function setTotal(float $total)
    {
        $this->total = $total;
    }		
}

?>