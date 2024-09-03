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

namespace com\bydan\contabilidad\seguridad\perfil_accion\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\seguridad\perfil_accion\business\entity\perfil_accion;

use com\bydan\contabilidad\seguridad\perfil_accion\presentation\session\perfil_accion_session;

class perfil_accion_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?perfil_accion $perfil_accion = null;	
	public ?array $perfil_accions = array();
	
	/*SESSION*/
	public ?perfil_accion_session $perfil_accion_session = null;
	
	/*FKs*/
	

	public bool $con_perfilsFK=false;
	public array $perfilsFK=array();
	public int $idperfilDefaultFK=-1;

	public bool $con_accionsFK=false;
	public array $accionsFK=array();
	public int $idaccionDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->perfil_accions= array();
		$this->perfil_accion= new perfil_accion();
		
		/*SESSION*/
		$this->perfil_accion_session=$this->Session->unserialize(perfil_accion_util::$STR_SESSION_NAME);

		if($this->perfil_accion_session==null) {
			$this->perfil_accion_session=new perfil_accion_session();
		}
		
		/*FKs*/
		

		$this->con_perfilsFK=false;
		$this->perfilsFK=array();
		$this->idperfilDefaultFK=-1;

		$this->con_accionsFK=false;
		$this->accionsFK=array();
		$this->idaccionDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getperfil_accion() : perfil_accion {	
		return $this->perfil_accion;
	}
		
	public function setperfil_accion(perfil_accion $newperfil_accion) {
		$this->perfil_accion = $newperfil_accion;
	}
	
	public function getperfil_accions() : array {		
		return $this->perfil_accions;
	}
	
	public function setperfil_accions(array $newperfil_accions) {
		$this->perfil_accions = $newperfil_accions;
	}
	
	/*SESSION*/
	public function getperfil_accion_session() : perfil_accion_session {	
		return $this->perfil_accion_session;
	}
		
	public function setperfil_accion_session(perfil_accion_session $newperfil_accion_session) {
		$this->perfil_accion_session = $newperfil_accion_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
