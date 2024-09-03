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

namespace com\bydan\contabilidad\seguridad\usuario\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;

use com\bydan\contabilidad\seguridad\usuario\presentation\session\usuario_session;

class usuario_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?usuario $usuario = null;	
	public ?array $usuarios = array();
	
	/*SESSION*/
	public ?usuario_session $usuario_session = null;
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->usuarios= array();
		$this->usuario= new usuario();
		
		/*SESSION*/
		$this->usuario_session=$this->Session->unserialize(usuario_util::$STR_SESSION_NAME);

		if($this->usuario_session==null) {
			$this->usuario_session=new usuario_session();
		}
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function getusuario() : usuario {	
		return $this->usuario;
	}
		
	public function setusuario(usuario $newusuario) {
		$this->usuario = $newusuario;
	}
	
	public function getusuarios() : array {		
		return $this->usuarios;
	}
	
	public function setusuarios(array $newusuarios) {
		$this->usuarios = $newusuarios;
	}
	
	/*SESSION*/
	public function getusuario_session() : usuario_session {	
		return $this->usuario_session;
	}
		
	public function setusuario_session(usuario_session $newusuario_session) {
		$this->usuario_session = $newusuario_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
