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

namespace com\bydan\contabilidad\seguridad\opcion\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\seguridad\opcion\business\entity\opcion;

use com\bydan\contabilidad\seguridad\opcion\presentation\session\opcion_session;

class opcion_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?opcion $opcion = null;	
	public ?array $opcions = array();
	
	/*SESSION*/
	public ?opcion_session $opcion_session = null;
	
	/*FKs*/
	

	public bool $con_sistemasFK=false;
	public array $sistemasFK=array();
	public int $idsistemaDefaultFK=-1;

	public bool $con_opcionsFK=false;
	public array $opcionsFK=array();
	public int $idopcionDefaultFK=-1;

	public bool $con_grupo_opcionsFK=false;
	public array $grupo_opcionsFK=array();
	public int $idgrupo_opcionDefaultFK=-1;

	public bool $con_modulosFK=false;
	public array $modulosFK=array();
	public int $idmoduloDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->opcions= array();
		$this->opcion= new opcion();
		
		/*SESSION*/
		$this->opcion_session=$this->Session->unserialize(opcion_util::$STR_SESSION_NAME);

		if($this->opcion_session==null) {
			$this->opcion_session=new opcion_session();
		}
		
		/*FKs*/
		

		$this->con_sistemasFK=false;
		$this->sistemasFK=array();
		$this->idsistemaDefaultFK=-1;

		$this->con_opcionsFK=false;
		$this->opcionsFK=array();
		$this->idopcionDefaultFK=-1;

		$this->con_grupo_opcionsFK=false;
		$this->grupo_opcionsFK=array();
		$this->idgrupo_opcionDefaultFK=-1;

		$this->con_modulosFK=false;
		$this->modulosFK=array();
		$this->idmoduloDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getopcion() : opcion {	
		return $this->opcion;
	}
		
	public function setopcion(opcion $newopcion) {
		$this->opcion = $newopcion;
	}
	
	public function getopcions() : array {		
		return $this->opcions;
	}
	
	public function setopcions(array $newopcions) {
		$this->opcions = $newopcions;
	}
	
	/*SESSION*/
	public function getopcion_session() : opcion_session {	
		return $this->opcion_session;
	}
		
	public function setopcion_session(opcion_session $newopcion_session) {
		$this->opcion_session = $newopcion_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
