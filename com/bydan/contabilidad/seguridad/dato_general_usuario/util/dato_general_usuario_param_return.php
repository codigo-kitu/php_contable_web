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

namespace com\bydan\contabilidad\seguridad\dato_general_usuario\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\seguridad\dato_general_usuario\business\entity\dato_general_usuario;

use com\bydan\contabilidad\seguridad\dato_general_usuario\presentation\session\dato_general_usuario_session;

class dato_general_usuario_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?dato_general_usuario $dato_general_usuario = null;	
	public ?array $dato_general_usuarios = array();
	
	/*SESSION*/
	public ?dato_general_usuario_session $dato_general_usuario_session = null;
	
	/*FKs*/
	

	public bool $con_usuariosFK=false;
	public array $usuariosFK=array();
	public int $idusuarioDefaultFK=-1;

	public bool $con_paissFK=false;
	public array $paissFK=array();
	public int $idpaisDefaultFK=-1;

	public bool $con_provinciasFK=false;
	public array $provinciasFK=array();
	public int $idprovinciaDefaultFK=-1;

	public bool $con_ciudadsFK=false;
	public array $ciudadsFK=array();
	public int $idciudadDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->dato_general_usuarios= array();
		$this->dato_general_usuario= new dato_general_usuario();
		
		/*SESSION*/
		$this->dato_general_usuario_session=$this->Session->unserialize(dato_general_usuario_util::$STR_SESSION_NAME);

		if($this->dato_general_usuario_session==null) {
			$this->dato_general_usuario_session=new dato_general_usuario_session();
		}
		
		/*FKs*/
		

		$this->con_usuariosFK=false;
		$this->usuariosFK=array();
		$this->idusuarioDefaultFK=-1;

		$this->con_paissFK=false;
		$this->paissFK=array();
		$this->idpaisDefaultFK=-1;

		$this->con_provinciasFK=false;
		$this->provinciasFK=array();
		$this->idprovinciaDefaultFK=-1;

		$this->con_ciudadsFK=false;
		$this->ciudadsFK=array();
		$this->idciudadDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getdato_general_usuario() : dato_general_usuario {	
		return $this->dato_general_usuario;
	}
		
	public function setdato_general_usuario(dato_general_usuario $newdato_general_usuario) {
		$this->dato_general_usuario = $newdato_general_usuario;
	}
	
	public function getdato_general_usuarios() : array {		
		return $this->dato_general_usuarios;
	}
	
	public function setdato_general_usuarios(array $newdato_general_usuarios) {
		$this->dato_general_usuarios = $newdato_general_usuarios;
	}
	
	/*SESSION*/
	public function getdato_general_usuario_session() : dato_general_usuario_session {	
		return $this->dato_general_usuario_session;
	}
		
	public function setdato_general_usuario_session(dato_general_usuario_session $newdato_general_usuario_session) {
		$this->dato_general_usuario_session = $newdato_general_usuario_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
