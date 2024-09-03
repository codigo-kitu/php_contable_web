<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\business\entity;

use com\bydan\framework\contabilidad\util\EventoGlobalTipo;
use com\bydan\framework\contabilidad\presentation\web\SessionBase;

class GeneralEntityParameterGeneral{
	
    public string $sMensaje='';
    public string $sTipo='';
	
	//PARA EVENTOS
    public string $eventoGlobalTipo='';
    public string $sDominio='';
    public string $sDominioTipo='';
	public mixed $data=null;
	public ?SessionBase $Session=null;
	
	function __construct() {

		$this->sMensaje='';
		$this->sTipo='';
		
		$this->eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;
		$this->sDominio='';
		$this->sDominioTipo='';
		$this->data=null;
		
		$this->Session=	new SessionBase();
	} 		

	public function getsMensaje() : string {
		return $this->sMensaje;
	}

	public function setsMensaje(string $sMensaje) {
		$this->sMensaje = $sMensaje;
	}
	
	public function getsTipo() : string {
		return $this->sTipo;
	}

	public function setsTipo(string $sTipo) {
		$this->sTipo = $sTipo;
	}	
	
	public function getEventoGlobalTipo() : string {
		return $this->eventoGlobalTipo;
	}

	public function setEventoGlobalTipo(string $eventoGlobalTipo) {
		$this->eventoGlobalTipo = $eventoGlobalTipo;
	}

	public function getsDominio() : string {
		return $this->sDominio;
	}

	public function setsDominio(string $sDominio) {
		$this->sDominio = $sDominio;
	}

	public function getsDominioTipo() : string {
		return $this->sDominioTipo;
	}

	public function setsDominioTipo(string $sDominioTipo) {
		$this->sDominioTipo = $sDominioTipo;
	}	
	
	public function getdata() : mixed {
		return $this->data;
	}
	
	public function setdata(mixed $data) {
		$this->data = $data;
	}
}

?>