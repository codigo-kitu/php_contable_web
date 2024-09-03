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

namespace com\bydan\contabilidad\contabilidad\cuenta\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;

use com\bydan\contabilidad\contabilidad\cuenta\presentation\session\cuenta_session;

class cuenta_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?cuenta $cuenta = null;	
	public ?array $cuentas = array();
	
	/*SESSION*/
	public ?cuenta_session $cuenta_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;

	public bool $con_tipo_cuentasFK=false;
	public array $tipo_cuentasFK=array();
	public int $idtipo_cuentaDefaultFK=-1;

	public bool $con_tipo_nivel_cuentasFK=false;
	public array $tipo_nivel_cuentasFK=array();
	public int $idtipo_nivel_cuentaDefaultFK=-1;

	public bool $con_cuentasFK=false;
	public array $cuentasFK=array();
	public int $idcuentaDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->cuentas= array();
		$this->cuenta= new cuenta();
		
		/*SESSION*/
		$this->cuenta_session=$this->Session->unserialize(cuenta_util::$STR_SESSION_NAME);

		if($this->cuenta_session==null) {
			$this->cuenta_session=new cuenta_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;

		$this->con_tipo_cuentasFK=false;
		$this->tipo_cuentasFK=array();
		$this->idtipo_cuentaDefaultFK=-1;

		$this->con_tipo_nivel_cuentasFK=false;
		$this->tipo_nivel_cuentasFK=array();
		$this->idtipo_nivel_cuentaDefaultFK=-1;

		$this->con_cuentasFK=false;
		$this->cuentasFK=array();
		$this->idcuentaDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getcuenta() : cuenta {	
		return $this->cuenta;
	}
		
	public function setcuenta(cuenta $newcuenta) {
		$this->cuenta = $newcuenta;
	}
	
	public function getcuentas() : array {		
		return $this->cuentas;
	}
	
	public function setcuentas(array $newcuentas) {
		$this->cuentas = $newcuentas;
	}
	
	/*SESSION*/
	public function getcuenta_session() : cuenta_session {	
		return $this->cuenta_session;
	}
		
	public function setcuenta_session(cuenta_session $newcuenta_session) {
		$this->cuenta_session = $newcuenta_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
