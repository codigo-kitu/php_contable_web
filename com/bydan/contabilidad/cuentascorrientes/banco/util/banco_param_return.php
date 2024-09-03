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

namespace com\bydan\contabilidad\cuentascorrientes\banco\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\cuentascorrientes\banco\business\entity\banco;

use com\bydan\contabilidad\cuentascorrientes\banco\presentation\session\banco_session;

class banco_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?banco $banco = null;	
	public ?array $bancos = array();
	
	/*SESSION*/
	public ?banco_session $banco_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->bancos= array();
		$this->banco= new banco();
		
		/*SESSION*/
		$this->banco_session=$this->Session->unserialize(banco_util::$STR_SESSION_NAME);

		if($this->banco_session==null) {
			$this->banco_session=new banco_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getbanco() : banco {	
		return $this->banco;
	}
		
	public function setbanco(banco $newbanco) {
		$this->banco = $newbanco;
	}
	
	public function getbancos() : array {		
		return $this->bancos;
	}
	
	public function setbancos(array $newbancos) {
		$this->bancos = $newbancos;
	}
	
	/*SESSION*/
	public function getbanco_session() : banco_session {	
		return $this->banco_session;
	}
		
	public function setbanco_session(banco_session $newbanco_session) {
		$this->banco_session = $newbanco_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
