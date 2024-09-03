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

namespace com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\entity\cuenta_cobrar;

use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\presentation\session\cuenta_cobrar_session;

class cuenta_cobrar_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?cuenta_cobrar $cuenta_cobrar = null;	
	public ?array $cuenta_cobrars = array();
	
	/*SESSION*/
	public ?cuenta_cobrar_session $cuenta_cobrar_session = null;
	
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

	public bool $con_facturasFK=false;
	public array $facturasFK=array();
	public int $idfacturaDefaultFK=-1;

	public bool $con_clientesFK=false;
	public array $clientesFK=array();
	public int $idclienteDefaultFK=-1;

	public bool $con_termino_pago_clientesFK=false;
	public array $termino_pago_clientesFK=array();
	public int $idtermino_pago_clienteDefaultFK=-1;

	public bool $con_estado_cuentas_cobrarsFK=false;
	public array $estado_cuentas_cobrarsFK=array();
	public int $idestado_cuentas_cobrarDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->cuenta_cobrars= array();
		$this->cuenta_cobrar= new cuenta_cobrar();
		
		/*SESSION*/
		$this->cuenta_cobrar_session=$this->Session->unserialize(cuenta_cobrar_util::$STR_SESSION_NAME);

		if($this->cuenta_cobrar_session==null) {
			$this->cuenta_cobrar_session=new cuenta_cobrar_session();
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

		$this->con_facturasFK=false;
		$this->facturasFK=array();
		$this->idfacturaDefaultFK=-1;

		$this->con_clientesFK=false;
		$this->clientesFK=array();
		$this->idclienteDefaultFK=-1;

		$this->con_termino_pago_clientesFK=false;
		$this->termino_pago_clientesFK=array();
		$this->idtermino_pago_clienteDefaultFK=-1;

		$this->con_estado_cuentas_cobrarsFK=false;
		$this->estado_cuentas_cobrarsFK=array();
		$this->idestado_cuentas_cobrarDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getcuenta_cobrar() : cuenta_cobrar {	
		return $this->cuenta_cobrar;
	}
		
	public function setcuenta_cobrar(cuenta_cobrar $newcuenta_cobrar) {
		$this->cuenta_cobrar = $newcuenta_cobrar;
	}
	
	public function getcuenta_cobrars() : array {		
		return $this->cuenta_cobrars;
	}
	
	public function setcuenta_cobrars(array $newcuenta_cobrars) {
		$this->cuenta_cobrars = $newcuenta_cobrars;
	}
	
	/*SESSION*/
	public function getcuenta_cobrar_session() : cuenta_cobrar_session {	
		return $this->cuenta_cobrar_session;
	}
		
	public function setcuenta_cobrar_session(cuenta_cobrar_session $newcuenta_cobrar_session) {
		$this->cuenta_cobrar_session = $newcuenta_cobrar_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
