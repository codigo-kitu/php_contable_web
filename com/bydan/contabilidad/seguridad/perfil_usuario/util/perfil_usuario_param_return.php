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

namespace com\bydan\contabilidad\seguridad\perfil_usuario\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\seguridad\perfil_usuario\business\entity\perfil_usuario;

use com\bydan\contabilidad\seguridad\perfil_usuario\presentation\session\perfil_usuario_session;

class perfil_usuario_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?perfil_usuario $perfil_usuario = null;	
	public ?array $perfil_usuarios = array();
	
	/*SESSION*/
	public ?perfil_usuario_session $perfil_usuario_session = null;
	
	/*FKs*/
	

	public bool $con_perfilsFK=false;
	public array $perfilsFK=array();
	public int $idperfilDefaultFK=-1;

	public bool $con_usuariosFK=false;
	public array $usuariosFK=array();
	public int $idusuarioDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->perfil_usuarios= array();
		$this->perfil_usuario= new perfil_usuario();
		
		/*SESSION*/
		$this->perfil_usuario_session=$this->Session->unserialize(perfil_usuario_util::$STR_SESSION_NAME);

		if($this->perfil_usuario_session==null) {
			$this->perfil_usuario_session=new perfil_usuario_session();
		}
		
		/*FKs*/
		

		$this->con_perfilsFK=false;
		$this->perfilsFK=array();
		$this->idperfilDefaultFK=-1;

		$this->con_usuariosFK=false;
		$this->usuariosFK=array();
		$this->idusuarioDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getperfil_usuario() : perfil_usuario {	
		return $this->perfil_usuario;
	}
		
	public function setperfil_usuario(perfil_usuario $newperfil_usuario) {
		$this->perfil_usuario = $newperfil_usuario;
	}
	
	public function getperfil_usuarios() : array {		
		return $this->perfil_usuarios;
	}
	
	public function setperfil_usuarios(array $newperfil_usuarios) {
		$this->perfil_usuarios = $newperfil_usuarios;
	}
	
	/*SESSION*/
	public function getperfil_usuario_session() : perfil_usuario_session {	
		return $this->perfil_usuario_session;
	}
		
	public function setperfil_usuario_session(perfil_usuario_session $newperfil_usuario_session) {
		$this->perfil_usuario_session = $newperfil_usuario_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
