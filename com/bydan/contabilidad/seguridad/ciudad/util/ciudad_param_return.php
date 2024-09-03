<?php declare(strict_types = 1);
 /*
*AVISO LEGAL
(C) Copyright
*Este programa esta protegido por la ley de derechos de autor.
*La reproduccion o distribucion ilicita de este programa o de cualquiera de
*sus partes esta penado por la ley con severas sanciones civiles y penales,
*y seran objeto de todas las sanciones legales que correspondan.

*Su contenido no puede copiarse para fines comerciales o de otras,
*ni puede mostrarse, incluso en una version modificada, en otros sitios Web.
Solo esta permitido colocar hipervinculos al sitio web.
*/

namespace com\bydan\contabilidad\seguridad\ciudad\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\seguridad\ciudad\business\entity\ciudad;

use com\bydan\contabilidad\seguridad\ciudad\presentation\session\ciudad_session;

class ciudad_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?ciudad $ciudad = null;	
	public ?array $ciudads = array();
	
	/*SESSION*/
	public ?ciudad_session $ciudad_session = null;
	
	/*FKs*/
	

	public bool $con_provinciasFK=false;
	public array $provinciasFK=array();
	public int $idprovinciaDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->ciudads= array();
		$this->ciudad= new ciudad();
		
		/*SESSION*/
		$this->ciudad_session=$this->Session->unserialize(ciudad_util::$STR_SESSION_NAME);

		if($this->ciudad_session==null) {
			$this->ciudad_session=new ciudad_session();
		}
		
		/*FKs*/
		

		$this->con_provinciasFK=false;
		$this->provinciasFK=array();
		$this->idprovinciaDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getciudad() : ciudad {	
		return $this->ciudad;
	}
		
	public function setciudad(ciudad $newciudad) {
		$this->ciudad = $newciudad;
	}
	
	public function getciudads() : array {		
		return $this->ciudads;
	}
	
	public function setciudads(array $newciudads) {
		$this->ciudads = $newciudads;
	}
	
	/*SESSION*/
	public function getciudad_session() : ciudad_session {	
		return $this->ciudad_session;
	}
		
	public function setciudad_session(ciudad_session $newciudad_session) {
		$this->ciudad_session = $newciudad_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
