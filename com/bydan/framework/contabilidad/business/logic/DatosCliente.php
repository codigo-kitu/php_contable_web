<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\business\logic;

class DatosCliente { 
	
	private int $idUsuario=0;
	private string $strUsuarioPC='';
	private string $strNamePC='';
	private string $strIPPC='';
	private string $strTipoProceso='';
	private bool $isConDeep=false;
	protected ?DatosDeep $datosDeep=null;

	function __construct() {
		$this->idUsuario=0;
		$this->strUsuarioPC='';
		$this->strNamePC='';
		$this->strIPPC='';
		$this->strTipoProceso='';
		$this->isConDeep=false;

		$this->datosDeep=new DatosDeep();
	}

	public function getIdUsuario() : int {
		return $this->idUsuario;
	}

	public function setIdUsuario(int $idUsuario) {
		$this->idUsuario = $idUsuario;
	}

	public function getstrUsuarioPC() : string {
		return $this->strUsuarioPC;
	}

	public function setstrUsuarioPC(string $strUsuarioPC) {
		$this->strUsuarioPC = $strUsuarioPC;
	}

	public function getstrNamePC() : string {
		return $this->strNamePC;
	}

	public function setstrNamePC(string $strNamePC) {
		$this->strNamePC = $strNamePC;
	}

	public function getstrIPPC() : string {
		return $this->strIPPC;
	}

	public function setstrIPPC(string $strIPPC) {
		$this->strIPPC = $strIPPC;
	}
	
	public function getstrTipoProceso() : string {
		return $this->strTipoProceso;
	}
	
	public function setstrTipoProceso(string $strTipoProceso) {
		$this->strTipoProceso = $strTipoProceso;
	}

	public function getIsConDeep() {
		return $this->isConDeep;
	}
	
	public function setIsConDeep(string $isConDeep) {
		$this->isConDeep = $isConDeep;
	}

	public function getDatosDeep() {
		return $this->datosDeep;
	}
	
	public function setDatosDeep(string $datosDeep) {
		$this->datosDeep = $datosDeep;
	}
}

?>
