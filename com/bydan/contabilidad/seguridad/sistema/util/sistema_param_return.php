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

namespace com\bydan\contabilidad\seguridad\sistema\util;

//use com\bydan\contabilidad\seguridad\sistema\util\sistema_param_return_add;

use com\bydan\contabilidad\seguridad\sistema\business\entity\sistema;

use com\bydan\contabilidad\seguridad\sistema\presentation\session\sistema_session;

class sistema_param_return extends sistema_param_return_add {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?sistema $sistema = null;	
	public ?array $sistemas = array();
	
	/*SESSION*/
	public ?sistema_session $sistema_session = null;
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->sistemas= array();
		$this->sistema= new sistema();
		
		/*SESSION*/
		$this->sistema_session=$this->Session->unserialize(sistema_util::$STR_SESSION_NAME);

		if($this->sistema_session==null) {
			$this->sistema_session=new sistema_session();
		}
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function getsistema() : sistema {	
		return $this->sistema;
	}
		
	public function setsistema(sistema $newsistema) {
		$this->sistema = $newsistema;
	}
	
	public function getsistemas() : array {		
		return $this->sistemas;
	}
	
	public function setsistemas(array $newsistemas) {
		$this->sistemas = $newsistemas;
	}
	
	/*SESSION*/
	public function getsistema_session() : sistema_session {	
		return $this->sistema_session;
	}
		
	public function setsistema_session(sistema_session $newsistema_session) {
		$this->sistema_session = $newsistema_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
