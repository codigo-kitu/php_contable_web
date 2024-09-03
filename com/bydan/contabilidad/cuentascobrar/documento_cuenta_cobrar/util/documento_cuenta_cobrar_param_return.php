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

namespace com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\entity\documento_cuenta_cobrar;

use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\presentation\session\documento_cuenta_cobrar_session;

class documento_cuenta_cobrar_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?documento_cuenta_cobrar $documento_cuenta_cobrar = null;	
	public ?array $documento_cuenta_cobrars = array();
	
	/*SESSION*/
	public ?documento_cuenta_cobrar_session $documento_cuenta_cobrar_session = null;
	
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

	public bool $con_clientesFK=false;
	public array $clientesFK=array();
	public int $idclienteDefaultFK=-1;

	public bool $con_forma_pago_clientesFK=false;
	public array $forma_pago_clientesFK=array();
	public int $idforma_pago_clienteDefaultFK=-1;

	public bool $con_cuenta_corrientesFK=false;
	public array $cuenta_corrientesFK=array();
	public int $idcuenta_corrienteDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->documento_cuenta_cobrars= array();
		$this->documento_cuenta_cobrar= new documento_cuenta_cobrar();
		
		/*SESSION*/
		$this->documento_cuenta_cobrar_session=$this->Session->unserialize(documento_cuenta_cobrar_util::$STR_SESSION_NAME);

		if($this->documento_cuenta_cobrar_session==null) {
			$this->documento_cuenta_cobrar_session=new documento_cuenta_cobrar_session();
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

		$this->con_clientesFK=false;
		$this->clientesFK=array();
		$this->idclienteDefaultFK=-1;

		$this->con_forma_pago_clientesFK=false;
		$this->forma_pago_clientesFK=array();
		$this->idforma_pago_clienteDefaultFK=-1;

		$this->con_cuenta_corrientesFK=false;
		$this->cuenta_corrientesFK=array();
		$this->idcuenta_corrienteDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getdocumento_cuenta_cobrar() : documento_cuenta_cobrar {	
		return $this->documento_cuenta_cobrar;
	}
		
	public function setdocumento_cuenta_cobrar(documento_cuenta_cobrar $newdocumento_cuenta_cobrar) {
		$this->documento_cuenta_cobrar = $newdocumento_cuenta_cobrar;
	}
	
	public function getdocumento_cuenta_cobrars() : array {		
		return $this->documento_cuenta_cobrars;
	}
	
	public function setdocumento_cuenta_cobrars(array $newdocumento_cuenta_cobrars) {
		$this->documento_cuenta_cobrars = $newdocumento_cuenta_cobrars;
	}
	
	/*SESSION*/
	public function getdocumento_cuenta_cobrar_session() : documento_cuenta_cobrar_session {	
		return $this->documento_cuenta_cobrar_session;
	}
		
	public function setdocumento_cuenta_cobrar_session(documento_cuenta_cobrar_session $newdocumento_cuenta_cobrar_session) {
		$this->documento_cuenta_cobrar_session = $newdocumento_cuenta_cobrar_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
