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

namespace com\bydan\contabilidad\seguridad\grupo_opcion\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\seguridad\grupo_opcion\business\entity\grupo_opcion;

use com\bydan\contabilidad\seguridad\grupo_opcion\presentation\session\grupo_opcion_session;

class grupo_opcion_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?grupo_opcion $grupo_opcion = null;	
	public ?array $grupo_opcions = array();
	
	/*SESSION*/
	public ?grupo_opcion_session $grupo_opcion_session = null;
	
	/*FKs*/
	

	public bool $con_modulosFK=false;
	public array $modulosFK=array();
	public int $idmoduloDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->grupo_opcions= array();
		$this->grupo_opcion= new grupo_opcion();
		
		/*SESSION*/
		$this->grupo_opcion_session=$this->Session->unserialize(grupo_opcion_util::$STR_SESSION_NAME);

		if($this->grupo_opcion_session==null) {
			$this->grupo_opcion_session=new grupo_opcion_session();
		}
		
		/*FKs*/
		

		$this->con_modulosFK=false;
		$this->modulosFK=array();
		$this->idmoduloDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getgrupo_opcion() : grupo_opcion {	
		return $this->grupo_opcion;
	}
		
	public function setgrupo_opcion(grupo_opcion $newgrupo_opcion) {
		$this->grupo_opcion = $newgrupo_opcion;
	}
	
	public function getgrupo_opcions() : array {		
		return $this->grupo_opcions;
	}
	
	public function setgrupo_opcions(array $newgrupo_opcions) {
		$this->grupo_opcions = $newgrupo_opcions;
	}
	
	/*SESSION*/
	public function getgrupo_opcion_session() : grupo_opcion_session {	
		return $this->grupo_opcion_session;
	}
		
	public function setgrupo_opcion_session(grupo_opcion_session $newgrupo_opcion_session) {
		$this->grupo_opcion_session = $newgrupo_opcion_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
