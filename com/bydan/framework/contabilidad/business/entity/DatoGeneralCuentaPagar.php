<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\business\entity;

class DatoGeneralCuentaPagar {
    
	public ?float $total_creditos=0.0;
	public ?float $total_debitos=0.0;
	public ?float $total_pagos=0.0;
	public ?float $saldo=0.0;
	
	function __construct() {	    
	    $this->total_creditos=0.0;
	    $this->total_debitos=0.0;
	    $this->total_pagos=0.0;
	    $this->saldo=0.0;
	}
	
	public function calcularSaldo() {
	    $this->saldo=$this->total_creditos - ($this->total_debitos + $this->total_pagos);
	}
}

?>