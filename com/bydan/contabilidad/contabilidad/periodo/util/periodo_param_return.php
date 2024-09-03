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

namespace com\bydan\contabilidad\contabilidad\periodo\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;

use com\bydan\contabilidad\contabilidad\periodo\presentation\session\periodo_session;

class periodo_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?periodo $periodo = null;	
	public ?array $periodos = array();
	
	/*SESSION*/
	public ?periodo_session $periodo_session = null;
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->periodos= array();
		$this->periodo= new periodo();
		
		/*SESSION*/
		$this->periodo_session=$this->Session->unserialize(periodo_util::$STR_SESSION_NAME);

		if($this->periodo_session==null) {
			$this->periodo_session=new periodo_session();
		}
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function getperiodo() : periodo {	
		return $this->periodo;
	}
		
	public function setperiodo(periodo $newperiodo) {
		$this->periodo = $newperiodo;
	}
	
	public function getperiodos() : array {		
		return $this->periodos;
	}
	
	public function setperiodos(array $newperiodos) {
		$this->periodos = $newperiodos;
	}
	
	/*SESSION*/
	public function getperiodo_session() : periodo_session {	
		return $this->periodo_session;
	}
		
	public function setperiodo_session(periodo_session $newperiodo_session) {
		$this->periodo_session = $newperiodo_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
