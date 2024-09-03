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

namespace com\bydan\contabilidad\seguridad\parametro_general_usuario\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;

use com\bydan\contabilidad\seguridad\parametro_general_usuario\presentation\session\parametro_general_usuario_session;

class parametro_general_usuario_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?parametro_general_usuario $parametro_general_usuario = null;	
	public ?array $parametro_general_usuarios = array();
	
	/*SESSION*/
	public ?parametro_general_usuario_session $parametro_general_usuario_session = null;
	
	/*FKs*/
	

	public bool $con_usuariosFK=false;
	public array $usuariosFK=array();
	public int $idusuarioDefaultFK=-1;

	public bool $con_tipo_fondosFK=false;
	public array $tipo_fondosFK=array();
	public int $idtipo_fondoDefaultFK=-1;

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;

	public bool $con_sucursalsFK=false;
	public array $sucursalsFK=array();
	public int $idsucursalDefaultFK=-1;

	public bool $con_ejerciciosFK=false;
	public array $ejerciciosFK=array();
	public int $idejercicioDefaultFK=-1;

	public bool $con_periodosFK=false;
	public array $periodosFK=array();
	public int $idperiodoDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->parametro_general_usuarios= array();
		$this->parametro_general_usuario= new parametro_general_usuario();
		
		/*SESSION*/
		$this->parametro_general_usuario_session=$this->Session->unserialize(parametro_general_usuario_util::$STR_SESSION_NAME);

		if($this->parametro_general_usuario_session==null) {
			$this->parametro_general_usuario_session=new parametro_general_usuario_session();
		}
		
		/*FKs*/
		

		$this->con_usuariosFK=false;
		$this->usuariosFK=array();
		$this->idusuarioDefaultFK=-1;

		$this->con_tipo_fondosFK=false;
		$this->tipo_fondosFK=array();
		$this->idtipo_fondoDefaultFK=-1;

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;

		$this->con_sucursalsFK=false;
		$this->sucursalsFK=array();
		$this->idsucursalDefaultFK=-1;

		$this->con_ejerciciosFK=false;
		$this->ejerciciosFK=array();
		$this->idejercicioDefaultFK=-1;

		$this->con_periodosFK=false;
		$this->periodosFK=array();
		$this->idperiodoDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getparametro_general_usuario() : parametro_general_usuario {	
		return $this->parametro_general_usuario;
	}
		
	public function setparametro_general_usuario(parametro_general_usuario $newparametro_general_usuario) {
		$this->parametro_general_usuario = $newparametro_general_usuario;
	}
	
	public function getparametro_general_usuarios() : array {		
		return $this->parametro_general_usuarios;
	}
	
	public function setparametro_general_usuarios(array $newparametro_general_usuarios) {
		$this->parametro_general_usuarios = $newparametro_general_usuarios;
	}
	
	/*SESSION*/
	public function getparametro_general_usuario_session() : parametro_general_usuario_session {	
		return $this->parametro_general_usuario_session;
	}
		
	public function setparametro_general_usuario_session(parametro_general_usuario_session $newparametro_general_usuario_session) {
		$this->parametro_general_usuario_session = $newparametro_general_usuario_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
