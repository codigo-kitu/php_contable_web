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

namespace com\bydan\contabilidad\general\archivo\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\general\archivo\business\entity\archivo;

use com\bydan\contabilidad\general\archivo\presentation\session\archivo_session;

class archivo_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?archivo $archivo = null;	
	public ?array $archivos = array();
	
	/*SESSION*/
	public ?archivo_session $archivo_session = null;
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->archivos= array();
		$this->archivo= new archivo();
		
		/*SESSION*/
		$this->archivo_session=$this->Session->unserialize(archivo_util::$STR_SESSION_NAME);

		if($this->archivo_session==null) {
			$this->archivo_session=new archivo_session();
		}
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function getarchivo() : archivo {	
		return $this->archivo;
	}
		
	public function setarchivo(archivo $newarchivo) {
		$this->archivo = $newarchivo;
	}
	
	public function getarchivos() : array {		
		return $this->archivos;
	}
	
	public function setarchivos(array $newarchivos) {
		$this->archivos = $newarchivos;
	}
	
	/*SESSION*/
	public function getarchivo_session() : archivo_session {	
		return $this->archivo_session;
	}
		
	public function setarchivo_session(archivo_session $newarchivo_session) {
		$this->archivo_session = $newarchivo_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
