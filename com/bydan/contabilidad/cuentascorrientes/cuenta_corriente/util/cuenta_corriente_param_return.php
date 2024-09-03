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

namespace com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util;

//use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_param_return_add;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity\cuenta_corriente;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\presentation\session\cuenta_corriente_session;

class cuenta_corriente_param_return extends cuenta_corriente_param_return_add {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?cuenta_corriente $cuenta_corriente = null;	
	public ?array $cuenta_corrientes = array();
	
	/*SESSION*/
	public ?cuenta_corriente_session $cuenta_corriente_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;

	public bool $con_usuariosFK=false;
	public array $usuariosFK=array();
	public int $idusuarioDefaultFK=-1;

	public bool $con_bancosFK=false;
	public array $bancosFK=array();
	public int $idbancoDefaultFK=-1;

	public bool $con_cuentasFK=false;
	public array $cuentasFK=array();
	public int $idcuentaDefaultFK=-1;

	public bool $con_estado_cuentas_corrientessFK=false;
	public array $estado_cuentas_corrientessFK=array();
	public int $idestado_cuentas_corrientesDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->cuenta_corrientes= array();
		$this->cuenta_corriente= new cuenta_corriente();
		
		/*SESSION*/
		$this->cuenta_corriente_session=$this->Session->unserialize(cuenta_corriente_util::$STR_SESSION_NAME);

		if($this->cuenta_corriente_session==null) {
			$this->cuenta_corriente_session=new cuenta_corriente_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;

		$this->con_usuariosFK=false;
		$this->usuariosFK=array();
		$this->idusuarioDefaultFK=-1;

		$this->con_bancosFK=false;
		$this->bancosFK=array();
		$this->idbancoDefaultFK=-1;

		$this->con_cuentasFK=false;
		$this->cuentasFK=array();
		$this->idcuentaDefaultFK=-1;

		$this->con_estado_cuentas_corrientessFK=false;
		$this->estado_cuentas_corrientessFK=array();
		$this->idestado_cuentas_corrientesDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getcuenta_corriente() : cuenta_corriente {	
		return $this->cuenta_corriente;
	}
		
	public function setcuenta_corriente(cuenta_corriente $newcuenta_corriente) {
		$this->cuenta_corriente = $newcuenta_corriente;
	}
	
	public function getcuenta_corrientes() : array {		
		return $this->cuenta_corrientes;
	}
	
	public function setcuenta_corrientes(array $newcuenta_corrientes) {
		$this->cuenta_corrientes = $newcuenta_corrientes;
	}
	
	/*SESSION*/
	public function getcuenta_corriente_session() : cuenta_corriente_session {	
		return $this->cuenta_corriente_session;
	}
		
	public function setcuenta_corriente_session(cuenta_corriente_session $newcuenta_corriente_session) {
		$this->cuenta_corriente_session = $newcuenta_corriente_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
