<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\business\logic;

use com\bydan\framework\contabilidad\util\DeepLoadType;

class DatosDeep { 
	
	private bool $isDeep=false;
	private string $deepLoadType='';
	private array $clases=array();
	private string $strTituloMensaje='';
	
	function __construct() {
		$this->isDeep=false;
		$this->deepLoadType = DeepLoadType::$INCLUDE;
		$this->clases=array();
		$this->strTituloMensaje='';
	}

	public function getIsDeep():bool {
		return $this->isDeep;
	}

	public function setIsDeep(bool $isDeep) {
		$this->isDeep = $isDeep;
	}

	public function getDeepLoadType():string {
		return $this->deepLoadType;
	}

	public function setDeepLoadType(string $deepLoadType) {
		$this->deepLoadType = $deepLoadType;
	}

	public function getClases() :array{
		return $this->clases;
	}

	public function setClases(array $clases) {
		$this->clases = $clases;
	}

	public function getStrTituloMensaje():string {
		return $this->strTituloMensaje;
	}

	public function setStrTituloMensaje(string $strTituloMensaje) {
		$this->strTituloMensaje = $strTituloMensaje;
	}

//include_once('com/bydan/framework/contabilidad/util/DeepLoadType.php');

}

?>
