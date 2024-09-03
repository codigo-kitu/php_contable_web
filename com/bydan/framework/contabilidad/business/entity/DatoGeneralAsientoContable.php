<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\business\entity;

class DatoGeneralAsientoContable {
    
    public ?float  $total_debitos=0.0;			
	public ?float $total_creditos=0.0;
	public ?float $saldo_deudor=0.0;
	public ?float $saldo_acreedor=0.0;
	public ?float $diferencia=0.0;
	
	function __construct() {
	    $this->total_debitos=0.0;
	    $this->total_creditos=0.0;
	    $this->saldo_deudor=0.0;
	    $this->saldo_acreedor=0.0;
	    $this->diferencia=0.0;
	}
	
	public function calcularTotales() {
	    
	    if($this->total_debitos!=$this->total_creditos) {
	        
	        if($this->total_debitos > $this->total_creditos) {
	            $this->diferencia = $this->total_debitos - $this->total_creditos;
	            $this->saldo_deudor=$this->diferencia;
	        } else {
	            $this->diferencia = $this->total_creditos - $this->total_debitos;
	            $this->saldo_acreedor=$this->diferencia;
	        }
	    }
	}
}

?>