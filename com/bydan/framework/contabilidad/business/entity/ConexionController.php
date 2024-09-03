<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\business\entity;

class ConexionController {
    
	private string $strUsuario;	
	private string $strPassword;

	public function __construct() {
		$this->strUsuario='';
		$this->strPassword='';
	}
	
	public function getStrUsuario():string {
		return $this->strUsuario;
	}

	public function setStrUsuario(string $strUsuario) {
		$this->strUsuario = $strUsuario;
	}

	public function getStrPassword():string {
		return $this->strPassword;
	}

	public function setStrPassword(string $strPassword) {
		$this->strPassword = $strPassword;
	}
}

?>