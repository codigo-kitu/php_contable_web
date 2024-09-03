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

namespace com\bydan\contabilidad\seguridad\perfil\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\seguridad\perfil\business\entity\perfil;

use com\bydan\contabilidad\seguridad\perfil\presentation\session\perfil_session;

class perfil_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?perfil $perfil = null;	
	public ?array $perfils = array();
	
	/*SESSION*/
	public ?perfil_session $perfil_session = null;
	
	/*FKs*/
	

	public bool $con_sistemasFK=false;
	public array $sistemasFK=array();
	public int $idsistemaDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->perfils= array();
		$this->perfil= new perfil();
		
		/*SESSION*/
		$this->perfil_session=$this->Session->unserialize(perfil_util::$STR_SESSION_NAME);

		if($this->perfil_session==null) {
			$this->perfil_session=new perfil_session();
		}
		
		/*FKs*/
		

		$this->con_sistemasFK=false;
		$this->sistemasFK=array();
		$this->idsistemaDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getperfil() : perfil {	
		return $this->perfil;
	}
		
	public function setperfil(perfil $newperfil) {
		$this->perfil = $newperfil;
	}
	
	public function getperfils() : array {		
		return $this->perfils;
	}
	
	public function setperfils(array $newperfils) {
		$this->perfils = $newperfils;
	}
	
	/*SESSION*/
	public function getperfil_session() : perfil_session {	
		return $this->perfil_session;
	}
		
	public function setperfil_session(perfil_session $newperfil_session) {
		$this->perfil_session = $newperfil_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
