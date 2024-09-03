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

namespace com\bydan\contabilidad\general\log_actividad\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\general\log_actividad\business\entity\log_actividad;

use com\bydan\contabilidad\general\log_actividad\presentation\session\log_actividad_session;

class log_actividad_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?log_actividad $log_actividad = null;	
	public ?array $log_actividads = array();
	
	/*SESSION*/
	public ?log_actividad_session $log_actividad_session = null;
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->log_actividads= array();
		$this->log_actividad= new log_actividad();
		
		/*SESSION*/
		$this->log_actividad_session=$this->Session->unserialize(log_actividad_util::$STR_SESSION_NAME);

		if($this->log_actividad_session==null) {
			$this->log_actividad_session=new log_actividad_session();
		}
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function getlog_actividad() : log_actividad {	
		return $this->log_actividad;
	}
		
	public function setlog_actividad(log_actividad $newlog_actividad) {
		$this->log_actividad = $newlog_actividad;
	}
	
	public function getlog_actividads() : array {		
		return $this->log_actividads;
	}
	
	public function setlog_actividads(array $newlog_actividads) {
		$this->log_actividads = $newlog_actividads;
	}
	
	/*SESSION*/
	public function getlog_actividad_session() : log_actividad_session {	
		return $this->log_actividad_session;
	}
		
	public function setlog_actividad_session(log_actividad_session $newlog_actividad_session) {
		$this->log_actividad_session = $newlog_actividad_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
