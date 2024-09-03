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

namespace com\bydan\contabilidad\seguridad\tipo_fondo\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\seguridad\tipo_fondo\business\entity\tipo_fondo;

use com\bydan\contabilidad\seguridad\tipo_fondo\presentation\session\tipo_fondo_session;

class tipo_fondo_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?tipo_fondo $tipo_fondo = null;	
	public ?array $tipo_fondos = array();
	
	/*SESSION*/
	public ?tipo_fondo_session $tipo_fondo_session = null;
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->tipo_fondos= array();
		$this->tipo_fondo= new tipo_fondo();
		
		/*SESSION*/
		$this->tipo_fondo_session=$this->Session->unserialize(tipo_fondo_util::$STR_SESSION_NAME);

		if($this->tipo_fondo_session==null) {
			$this->tipo_fondo_session=new tipo_fondo_session();
		}
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function gettipo_fondo() : tipo_fondo {	
		return $this->tipo_fondo;
	}
		
	public function settipo_fondo(tipo_fondo $newtipo_fondo) {
		$this->tipo_fondo = $newtipo_fondo;
	}
	
	public function gettipo_fondos() : array {		
		return $this->tipo_fondos;
	}
	
	public function settipo_fondos(array $newtipo_fondos) {
		$this->tipo_fondos = $newtipo_fondos;
	}
	
	/*SESSION*/
	public function gettipo_fondo_session() : tipo_fondo_session {	
		return $this->tipo_fondo_session;
	}
		
	public function settipo_fondo_session(tipo_fondo_session $newtipo_fondo_session) {
		$this->tipo_fondo_session = $newtipo_fondo_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
