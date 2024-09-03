<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\business\entity;

class Reporte {

	public string $sCodigo='';	
	public string $sDescripcion='';

	function __construct() {
			
	}
	
	public static function NewReporte(string $sCodigo,string $sDescripcion):Reporte {
		$reporte = new self();
		
		$reporte->sCodigo = $sCodigo;
		$reporte->sDescripcion = $sDescripcion;
		
		return $reporte;
	}

	public function getsCodigo():string {
		return $this->sCodigo;
	}

	public function setsCodigo(string $sCodigo) {
		$this->sCodigo =$sCodigo;
	}

	public function getsDescripcion():string {
		return $this->sDescripcion;
	}

	public function setsDescripcion(string $sDescripcion) {
		$this->sDescripcion =$sDescripcion;
	}	
}

?>