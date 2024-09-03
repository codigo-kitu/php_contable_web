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

namespace com\bydan\contabilidad\contabilidad\saldo_cuenta\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\contabilidad\saldo_cuenta\business\entity\saldo_cuenta;

use com\bydan\contabilidad\contabilidad\saldo_cuenta\presentation\session\saldo_cuenta_session;

class saldo_cuenta_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?saldo_cuenta $saldo_cuenta = null;	
	public ?array $saldo_cuentas = array();
	
	/*SESSION*/
	public ?saldo_cuenta_session $saldo_cuenta_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;

	public bool $con_ejerciciosFK=false;
	public array $ejerciciosFK=array();
	public int $idejercicioDefaultFK=-1;

	public bool $con_periodosFK=false;
	public array $periodosFK=array();
	public int $idperiodoDefaultFK=-1;

	public bool $con_tipo_cuentasFK=false;
	public array $tipo_cuentasFK=array();
	public int $idtipo_cuentaDefaultFK=-1;

	public bool $con_cuentasFK=false;
	public array $cuentasFK=array();
	public int $idcuentaDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->saldo_cuentas= array();
		$this->saldo_cuenta= new saldo_cuenta();
		
		/*SESSION*/
		$this->saldo_cuenta_session=$this->Session->unserialize(saldo_cuenta_util::$STR_SESSION_NAME);

		if($this->saldo_cuenta_session==null) {
			$this->saldo_cuenta_session=new saldo_cuenta_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;

		$this->con_ejerciciosFK=false;
		$this->ejerciciosFK=array();
		$this->idejercicioDefaultFK=-1;

		$this->con_periodosFK=false;
		$this->periodosFK=array();
		$this->idperiodoDefaultFK=-1;

		$this->con_tipo_cuentasFK=false;
		$this->tipo_cuentasFK=array();
		$this->idtipo_cuentaDefaultFK=-1;

		$this->con_cuentasFK=false;
		$this->cuentasFK=array();
		$this->idcuentaDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getsaldo_cuenta() : saldo_cuenta {	
		return $this->saldo_cuenta;
	}
		
	public function setsaldo_cuenta(saldo_cuenta $newsaldo_cuenta) {
		$this->saldo_cuenta = $newsaldo_cuenta;
	}
	
	public function getsaldo_cuentas() : array {		
		return $this->saldo_cuentas;
	}
	
	public function setsaldo_cuentas(array $newsaldo_cuentas) {
		$this->saldo_cuentas = $newsaldo_cuentas;
	}
	
	/*SESSION*/
	public function getsaldo_cuenta_session() : saldo_cuenta_session {	
		return $this->saldo_cuenta_session;
	}
		
	public function setsaldo_cuenta_session(saldo_cuenta_session $newsaldo_cuenta_session) {
		$this->saldo_cuenta_session = $newsaldo_cuenta_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
