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

namespace com\bydan\contabilidad\contabilidad\ejercicio\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;

use com\bydan\contabilidad\contabilidad\ejercicio\presentation\session\ejercicio_session;

class ejercicio_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?ejercicio $ejercicio = null;	
	public ?array $ejercicios = array();
	
	/*SESSION*/
	public ?ejercicio_session $ejercicio_session = null;
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->ejercicios= array();
		$this->ejercicio= new ejercicio();
		
		/*SESSION*/
		$this->ejercicio_session=$this->Session->unserialize(ejercicio_util::$STR_SESSION_NAME);

		if($this->ejercicio_session==null) {
			$this->ejercicio_session=new ejercicio_session();
		}
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function getejercicio() : ejercicio {	
		return $this->ejercicio;
	}
		
	public function setejercicio(ejercicio $newejercicio) {
		$this->ejercicio = $newejercicio;
	}
	
	public function getejercicios() : array {		
		return $this->ejercicios;
	}
	
	public function setejercicios(array $newejercicios) {
		$this->ejercicios = $newejercicios;
	}
	
	/*SESSION*/
	public function getejercicio_session() : ejercicio_session {	
		return $this->ejercicio_session;
	}
		
	public function setejercicio_session(ejercicio_session $newejercicio_session) {
		$this->ejercicio_session = $newejercicio_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
