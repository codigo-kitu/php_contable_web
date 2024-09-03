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

namespace com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\business\entity\debito_cuenta_cobrar;

use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\presentation\session\debito_cuenta_cobrar_session;

class debito_cuenta_cobrar_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?debito_cuenta_cobrar $debito_cuenta_cobrar = null;	
	public ?array $debito_cuenta_cobrars = array();
	
	/*SESSION*/
	public ?debito_cuenta_cobrar_session $debito_cuenta_cobrar_session = null;
	
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

	public bool $con_cuenta_cobrarsFK=false;
	public array $cuenta_cobrarsFK=array();
	public int $idcuenta_cobrarDefaultFK=-1;

	public bool $con_termino_pago_clientesFK=false;
	public array $termino_pago_clientesFK=array();
	public int $idtermino_pago_clienteDefaultFK=-1;

	public bool $con_estadosFK=false;
	public array $estadosFK=array();
	public int $idestadoDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->debito_cuenta_cobrars= array();
		$this->debito_cuenta_cobrar= new debito_cuenta_cobrar();
		
		/*SESSION*/
		$this->debito_cuenta_cobrar_session=$this->Session->unserialize(debito_cuenta_cobrar_util::$STR_SESSION_NAME);

		if($this->debito_cuenta_cobrar_session==null) {
			$this->debito_cuenta_cobrar_session=new debito_cuenta_cobrar_session();
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

		$this->con_cuenta_cobrarsFK=false;
		$this->cuenta_cobrarsFK=array();
		$this->idcuenta_cobrarDefaultFK=-1;

		$this->con_termino_pago_clientesFK=false;
		$this->termino_pago_clientesFK=array();
		$this->idtermino_pago_clienteDefaultFK=-1;

		$this->con_estadosFK=false;
		$this->estadosFK=array();
		$this->idestadoDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getdebito_cuenta_cobrar() : debito_cuenta_cobrar {	
		return $this->debito_cuenta_cobrar;
	}
		
	public function setdebito_cuenta_cobrar(debito_cuenta_cobrar $newdebito_cuenta_cobrar) {
		$this->debito_cuenta_cobrar = $newdebito_cuenta_cobrar;
	}
	
	public function getdebito_cuenta_cobrars() : array {		
		return $this->debito_cuenta_cobrars;
	}
	
	public function setdebito_cuenta_cobrars(array $newdebito_cuenta_cobrars) {
		$this->debito_cuenta_cobrars = $newdebito_cuenta_cobrars;
	}
	
	/*SESSION*/
	public function getdebito_cuenta_cobrar_session() : debito_cuenta_cobrar_session {	
		return $this->debito_cuenta_cobrar_session;
	}
		
	public function setdebito_cuenta_cobrar_session(debito_cuenta_cobrar_session $newdebito_cuenta_cobrar_session) {
		$this->debito_cuenta_cobrar_session = $newdebito_cuenta_cobrar_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
