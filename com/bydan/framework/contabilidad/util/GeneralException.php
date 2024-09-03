<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\util;

use Exception;

class GeneralException extends Exception {
    
	private Exception $innerExcepcion;
	
	function __construct(Exception $excepcion) {
		$this->innerExcepcion=$excepcion;
	}

	public function getInnerExcepcion():Exception {
		return $this->innerExcepcion;
	}

	public function setInnerExcepcion(Exception $innerExcepcion) {
		$this->innerExcepcion = $innerExcepcion;
	}
}
?>