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

namespace com\bydan\contabilidad\seguridad\perfil_campo\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\seguridad\perfil_campo\business\entity\perfil_campo;

use com\bydan\contabilidad\seguridad\perfil_campo\presentation\session\perfil_campo_session;

class perfil_campo_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?perfil_campo $perfil_campo = null;	
	public ?array $perfil_campos = array();
	
	/*SESSION*/
	public ?perfil_campo_session $perfil_campo_session = null;
	
	/*FKs*/
	

	public bool $con_perfilsFK=false;
	public array $perfilsFK=array();
	public int $idperfilDefaultFK=-1;

	public bool $con_camposFK=false;
	public array $camposFK=array();
	public int $idcampoDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->perfil_campos= array();
		$this->perfil_campo= new perfil_campo();
		
		/*SESSION*/
		$this->perfil_campo_session=$this->Session->unserialize(perfil_campo_util::$STR_SESSION_NAME);

		if($this->perfil_campo_session==null) {
			$this->perfil_campo_session=new perfil_campo_session();
		}
		
		/*FKs*/
		

		$this->con_perfilsFK=false;
		$this->perfilsFK=array();
		$this->idperfilDefaultFK=-1;

		$this->con_camposFK=false;
		$this->camposFK=array();
		$this->idcampoDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getperfil_campo() : perfil_campo {	
		return $this->perfil_campo;
	}
		
	public function setperfil_campo(perfil_campo $newperfil_campo) {
		$this->perfil_campo = $newperfil_campo;
	}
	
	public function getperfil_campos() : array {		
		return $this->perfil_campos;
	}
	
	public function setperfil_campos(array $newperfil_campos) {
		$this->perfil_campos = $newperfil_campos;
	}
	
	/*SESSION*/
	public function getperfil_campo_session() : perfil_campo_session {	
		return $this->perfil_campo_session;
	}
		
	public function setperfil_campo_session(perfil_campo_session $newperfil_campo_session) {
		$this->perfil_campo_session = $newperfil_campo_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
