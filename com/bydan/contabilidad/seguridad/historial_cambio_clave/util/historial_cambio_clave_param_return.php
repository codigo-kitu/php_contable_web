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

namespace com\bydan\contabilidad\seguridad\historial_cambio_clave\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\seguridad\historial_cambio_clave\business\entity\historial_cambio_clave;

use com\bydan\contabilidad\seguridad\historial_cambio_clave\presentation\session\historial_cambio_clave_session;

class historial_cambio_clave_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?historial_cambio_clave $historial_cambio_clave = null;	
	public ?array $historial_cambio_claves = array();
	
	/*SESSION*/
	public ?historial_cambio_clave_session $historial_cambio_clave_session = null;
	
	/*FKs*/
	

	public bool $con_usuariosFK=false;
	public array $usuariosFK=array();
	public int $idusuarioDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->historial_cambio_claves= array();
		$this->historial_cambio_clave= new historial_cambio_clave();
		
		/*SESSION*/
		$this->historial_cambio_clave_session=$this->Session->unserialize(historial_cambio_clave_util::$STR_SESSION_NAME);

		if($this->historial_cambio_clave_session==null) {
			$this->historial_cambio_clave_session=new historial_cambio_clave_session();
		}
		
		/*FKs*/
		

		$this->con_usuariosFK=false;
		$this->usuariosFK=array();
		$this->idusuarioDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function gethistorial_cambio_clave() : historial_cambio_clave {	
		return $this->historial_cambio_clave;
	}
		
	public function sethistorial_cambio_clave(historial_cambio_clave $newhistorial_cambio_clave) {
		$this->historial_cambio_clave = $newhistorial_cambio_clave;
	}
	
	public function gethistorial_cambio_claves() : array {		
		return $this->historial_cambio_claves;
	}
	
	public function sethistorial_cambio_claves(array $newhistorial_cambio_claves) {
		$this->historial_cambio_claves = $newhistorial_cambio_claves;
	}
	
	/*SESSION*/
	public function gethistorial_cambio_clave_session() : historial_cambio_clave_session {	
		return $this->historial_cambio_clave_session;
	}
		
	public function sethistorial_cambio_clave_session(historial_cambio_clave_session $newhistorial_cambio_clave_session) {
		$this->historial_cambio_clave_session = $newhistorial_cambio_clave_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
