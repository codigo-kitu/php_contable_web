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

namespace com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\business\entity\cheque_cuenta_corriente;

use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\presentation\session\cheque_cuenta_corriente_session;

class cheque_cuenta_corriente_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?cheque_cuenta_corriente $cheque_cuenta_corriente = null;	
	public ?array $cheque_cuenta_corrientes = array();
	
	/*SESSION*/
	public ?cheque_cuenta_corriente_session $cheque_cuenta_corriente_session = null;
	
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

	public bool $con_categoria_chequesFK=false;
	public array $categoria_chequesFK=array();
	public int $idcategoria_chequeDefaultFK=-1;

	public bool $con_clientesFK=false;
	public array $clientesFK=array();
	public int $idclienteDefaultFK=-1;

	public bool $con_proveedorsFK=false;
	public array $proveedorsFK=array();
	public int $idproveedorDefaultFK=-1;

	public bool $con_beneficiario_ocacional_chequesFK=false;
	public array $beneficiario_ocacional_chequesFK=array();
	public int $idbeneficiario_ocacional_chequeDefaultFK=-1;

	public bool $con_estado_deposito_retirosFK=false;
	public array $estado_deposito_retirosFK=array();
	public int $idestado_deposito_retiroDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->cheque_cuenta_corrientes= array();
		$this->cheque_cuenta_corriente= new cheque_cuenta_corriente();
		
		/*SESSION*/
		$this->cheque_cuenta_corriente_session=$this->Session->unserialize(cheque_cuenta_corriente_util::$STR_SESSION_NAME);

		if($this->cheque_cuenta_corriente_session==null) {
			$this->cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
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

		$this->con_categoria_chequesFK=false;
		$this->categoria_chequesFK=array();
		$this->idcategoria_chequeDefaultFK=-1;

		$this->con_clientesFK=false;
		$this->clientesFK=array();
		$this->idclienteDefaultFK=-1;

		$this->con_proveedorsFK=false;
		$this->proveedorsFK=array();
		$this->idproveedorDefaultFK=-1;

		$this->con_beneficiario_ocacional_chequesFK=false;
		$this->beneficiario_ocacional_chequesFK=array();
		$this->idbeneficiario_ocacional_chequeDefaultFK=-1;

		$this->con_estado_deposito_retirosFK=false;
		$this->estado_deposito_retirosFK=array();
		$this->idestado_deposito_retiroDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getcheque_cuenta_corriente() : cheque_cuenta_corriente {	
		return $this->cheque_cuenta_corriente;
	}
		
	public function setcheque_cuenta_corriente(cheque_cuenta_corriente $newcheque_cuenta_corriente) {
		$this->cheque_cuenta_corriente = $newcheque_cuenta_corriente;
	}
	
	public function getcheque_cuenta_corrientes() : array {		
		return $this->cheque_cuenta_corrientes;
	}
	
	public function setcheque_cuenta_corrientes(array $newcheque_cuenta_corrientes) {
		$this->cheque_cuenta_corrientes = $newcheque_cuenta_corrientes;
	}
	
	/*SESSION*/
	public function getcheque_cuenta_corriente_session() : cheque_cuenta_corriente_session {	
		return $this->cheque_cuenta_corriente_session;
	}
		
	public function setcheque_cuenta_corriente_session(cheque_cuenta_corriente_session $newcheque_cuenta_corriente_session) {
		$this->cheque_cuenta_corriente_session = $newcheque_cuenta_corriente_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
