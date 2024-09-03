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

namespace com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\business\entity\retiro_cuenta_corriente;

use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\presentation\session\retiro_cuenta_corriente_session;

class retiro_cuenta_corriente_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?retiro_cuenta_corriente $retiro_cuenta_corriente = null;	
	public ?array $retiro_cuenta_corrientes = array();
	
	/*SESSION*/
	public ?retiro_cuenta_corriente_session $retiro_cuenta_corriente_session = null;
	
	/*FKs*/
	

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

	public bool $con_usuariosFK=false;
	public array $usuariosFK=array();
	public int $idusuarioDefaultFK=-1;

	public bool $con_cuenta_corrientesFK=false;
	public array $cuenta_corrientesFK=array();
	public int $idcuenta_corrienteDefaultFK=-1;

	public bool $con_estado_deposito_retirosFK=false;
	public array $estado_deposito_retirosFK=array();
	public int $idestado_deposito_retiroDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->retiro_cuenta_corrientes= array();
		$this->retiro_cuenta_corriente= new retiro_cuenta_corriente();
		
		/*SESSION*/
		$this->retiro_cuenta_corriente_session=$this->Session->unserialize(retiro_cuenta_corriente_util::$STR_SESSION_NAME);

		if($this->retiro_cuenta_corriente_session==null) {
			$this->retiro_cuenta_corriente_session=new retiro_cuenta_corriente_session();
		}
		
		/*FKs*/
		

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

		$this->con_usuariosFK=false;
		$this->usuariosFK=array();
		$this->idusuarioDefaultFK=-1;

		$this->con_cuenta_corrientesFK=false;
		$this->cuenta_corrientesFK=array();
		$this->idcuenta_corrienteDefaultFK=-1;

		$this->con_estado_deposito_retirosFK=false;
		$this->estado_deposito_retirosFK=array();
		$this->idestado_deposito_retiroDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getretiro_cuenta_corriente() : retiro_cuenta_corriente {	
		return $this->retiro_cuenta_corriente;
	}
		
	public function setretiro_cuenta_corriente(retiro_cuenta_corriente $newretiro_cuenta_corriente) {
		$this->retiro_cuenta_corriente = $newretiro_cuenta_corriente;
	}
	
	public function getretiro_cuenta_corrientes() : array {		
		return $this->retiro_cuenta_corrientes;
	}
	
	public function setretiro_cuenta_corrientes(array $newretiro_cuenta_corrientes) {
		$this->retiro_cuenta_corrientes = $newretiro_cuenta_corrientes;
	}
	
	/*SESSION*/
	public function getretiro_cuenta_corriente_session() : retiro_cuenta_corriente_session {	
		return $this->retiro_cuenta_corriente_session;
	}
		
	public function setretiro_cuenta_corriente_session(retiro_cuenta_corriente_session $newretiro_cuenta_corriente_session) {
		$this->retiro_cuenta_corriente_session = $newretiro_cuenta_corriente_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
