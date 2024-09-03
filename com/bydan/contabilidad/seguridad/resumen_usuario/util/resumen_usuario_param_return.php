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

namespace com\bydan\contabilidad\seguridad\resumen_usuario\util;

//use com\bydan\contabilidad\seguridad\resumen_usuario\util\resumen_usuario_param_return_add;

use com\bydan\contabilidad\seguridad\resumen_usuario\business\entity\resumen_usuario;

use com\bydan\contabilidad\seguridad\resumen_usuario\presentation\session\resumen_usuario_session;

class resumen_usuario_param_return extends resumen_usuario_param_return_add {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?resumen_usuario $resumen_usuario = null;	
	public ?array $resumen_usuarios = array();
	
	/*SESSION*/
	public ?resumen_usuario_session $resumen_usuario_session = null;
	
	/*FKs*/
	

	public bool $con_usuariosFK=false;
	public array $usuariosFK=array();
	public int $idusuarioDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->resumen_usuarios= array();
		$this->resumen_usuario= new resumen_usuario();
		
		/*SESSION*/
		$this->resumen_usuario_session=$this->Session->unserialize(resumen_usuario_util::$STR_SESSION_NAME);

		if($this->resumen_usuario_session==null) {
			$this->resumen_usuario_session=new resumen_usuario_session();
		}
		
		/*FKs*/
		

		$this->con_usuariosFK=false;
		$this->usuariosFK=array();
		$this->idusuarioDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getresumen_usuario() : resumen_usuario {	
		return $this->resumen_usuario;
	}
		
	public function setresumen_usuario(resumen_usuario $newresumen_usuario) {
		$this->resumen_usuario = $newresumen_usuario;
	}
	
	public function getresumen_usuarios() : array {		
		return $this->resumen_usuarios;
	}
	
	public function setresumen_usuarios(array $newresumen_usuarios) {
		$this->resumen_usuarios = $newresumen_usuarios;
	}
	
	/*SESSION*/
	public function getresumen_usuario_session() : resumen_usuario_session {	
		return $this->resumen_usuario_session;
	}
		
	public function setresumen_usuario_session(resumen_usuario_session $newresumen_usuario_session) {
		$this->resumen_usuario_session = $newresumen_usuario_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
