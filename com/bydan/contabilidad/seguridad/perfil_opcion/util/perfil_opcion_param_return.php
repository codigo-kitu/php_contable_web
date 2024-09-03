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

namespace com\bydan\contabilidad\seguridad\perfil_opcion\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\seguridad\perfil_opcion\business\entity\perfil_opcion;

use com\bydan\contabilidad\seguridad\perfil_opcion\presentation\session\perfil_opcion_session;

class perfil_opcion_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?perfil_opcion $perfil_opcion = null;	
	public ?array $perfil_opcions = array();
	
	/*SESSION*/
	public ?perfil_opcion_session $perfil_opcion_session = null;
	
	/*FKs*/
	

	public bool $con_perfilsFK=false;
	public array $perfilsFK=array();
	public int $idperfilDefaultFK=-1;

	public bool $con_opcionsFK=false;
	public array $opcionsFK=array();
	public int $idopcionDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->perfil_opcions= array();
		$this->perfil_opcion= new perfil_opcion();
		
		/*SESSION*/
		$this->perfil_opcion_session=$this->Session->unserialize(perfil_opcion_util::$STR_SESSION_NAME);

		if($this->perfil_opcion_session==null) {
			$this->perfil_opcion_session=new perfil_opcion_session();
		}
		
		/*FKs*/
		

		$this->con_perfilsFK=false;
		$this->perfilsFK=array();
		$this->idperfilDefaultFK=-1;

		$this->con_opcionsFK=false;
		$this->opcionsFK=array();
		$this->idopcionDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getperfil_opcion() : perfil_opcion {	
		return $this->perfil_opcion;
	}
		
	public function setperfil_opcion(perfil_opcion $newperfil_opcion) {
		$this->perfil_opcion = $newperfil_opcion;
	}
	
	public function getperfil_opcions() : array {		
		return $this->perfil_opcions;
	}
	
	public function setperfil_opcions(array $newperfil_opcions) {
		$this->perfil_opcions = $newperfil_opcions;
	}
	
	/*SESSION*/
	public function getperfil_opcion_session() : perfil_opcion_session {	
		return $this->perfil_opcion_session;
	}
		
	public function setperfil_opcion_session(perfil_opcion_session $newperfil_opcion_session) {
		$this->perfil_opcion_session = $newperfil_opcion_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
