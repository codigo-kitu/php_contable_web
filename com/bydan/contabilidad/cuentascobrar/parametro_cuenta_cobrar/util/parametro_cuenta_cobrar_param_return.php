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

namespace com\bydan\contabilidad\cuentascobrar\parametro_cuenta_cobrar\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\cuentascobrar\parametro_cuenta_cobrar\business\entity\parametro_cuenta_cobrar;

use com\bydan\contabilidad\cuentascobrar\parametro_cuenta_cobrar\presentation\session\parametro_cuenta_cobrar_session;

class parametro_cuenta_cobrar_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?parametro_cuenta_cobrar $parametro_cuenta_cobrar = null;	
	public ?array $parametro_cuenta_cobrars = array();
	
	/*SESSION*/
	public ?parametro_cuenta_cobrar_session $parametro_cuenta_cobrar_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->parametro_cuenta_cobrars= array();
		$this->parametro_cuenta_cobrar= new parametro_cuenta_cobrar();
		
		/*SESSION*/
		$this->parametro_cuenta_cobrar_session=$this->Session->unserialize(parametro_cuenta_cobrar_util::$STR_SESSION_NAME);

		if($this->parametro_cuenta_cobrar_session==null) {
			$this->parametro_cuenta_cobrar_session=new parametro_cuenta_cobrar_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getparametro_cuenta_cobrar() : parametro_cuenta_cobrar {	
		return $this->parametro_cuenta_cobrar;
	}
		
	public function setparametro_cuenta_cobrar(parametro_cuenta_cobrar $newparametro_cuenta_cobrar) {
		$this->parametro_cuenta_cobrar = $newparametro_cuenta_cobrar;
	}
	
	public function getparametro_cuenta_cobrars() : array {		
		return $this->parametro_cuenta_cobrars;
	}
	
	public function setparametro_cuenta_cobrars(array $newparametro_cuenta_cobrars) {
		$this->parametro_cuenta_cobrars = $newparametro_cuenta_cobrars;
	}
	
	/*SESSION*/
	public function getparametro_cuenta_cobrar_session() : parametro_cuenta_cobrar_session {	
		return $this->parametro_cuenta_cobrar_session;
	}
		
	public function setparametro_cuenta_cobrar_session(parametro_cuenta_cobrar_session $newparametro_cuenta_cobrar_session) {
		$this->parametro_cuenta_cobrar_session = $newparametro_cuenta_cobrar_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
