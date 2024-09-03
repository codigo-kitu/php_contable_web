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

namespace com\bydan\contabilidad\seguridad\accion\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\seguridad\accion\business\entity\accion;

use com\bydan\contabilidad\seguridad\accion\presentation\session\accion_session;

class accion_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?accion $accion = null;	
	public ?array $accions = array();
	
	/*SESSION*/
	public ?accion_session $accion_session = null;
	
	/*FKs*/
	

	public bool $con_opcionsFK=false;
	public array $opcionsFK=array();
	public int $idopcionDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->accions= array();
		$this->accion= new accion();
		
		/*SESSION*/
		$this->accion_session=$this->Session->unserialize(accion_util::$STR_SESSION_NAME);

		if($this->accion_session==null) {
			$this->accion_session=new accion_session();
		}
		
		/*FKs*/
		

		$this->con_opcionsFK=false;
		$this->opcionsFK=array();
		$this->idopcionDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getaccion() : accion {	
		return $this->accion;
	}
		
	public function setaccion(accion $newaccion) {
		$this->accion = $newaccion;
	}
	
	public function getaccions() : array {		
		return $this->accions;
	}
	
	public function setaccions(array $newaccions) {
		$this->accions = $newaccions;
	}
	
	/*SESSION*/
	public function getaccion_session() : accion_session {	
		return $this->accion_session;
	}
		
	public function setaccion_session(accion_session $newaccion_session) {
		$this->accion_session = $newaccion_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
