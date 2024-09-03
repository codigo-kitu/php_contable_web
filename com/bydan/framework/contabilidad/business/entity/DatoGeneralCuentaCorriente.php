<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\business\entity;

class DatoGeneralCuentaCorriente {
    
	public ?float $total_depositos=0.0;			
	public ?float $total_retiros=0.0;
	public ?float $total_cheques=0.0;
	public ?float $saldo=0.0;
	
	function __construct() {
	    $this->total_depositos=0.0;
	    $this->total_retiros=0.0;
	    $this->total_cheques=0.0;
	    $this->saldo=0.0;
	}
	
	public function calcularSaldo() {
	    $this->saldo=$this->total_depositos - ($this->total_retiros + $this->total_cheques);
	}
}

?>