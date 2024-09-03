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

namespace com\bydan\contabilidad\contabilidad\cuenta_predefinida\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\contabilidad\cuenta_predefinida\business\entity\cuenta_predefinida;

use com\bydan\contabilidad\contabilidad\cuenta_predefinida\presentation\session\cuenta_predefinida_session;

class cuenta_predefinida_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?cuenta_predefinida $cuenta_predefinida = null;	
	public ?array $cuenta_predefinidas = array();
	
	/*SESSION*/
	public ?cuenta_predefinida_session $cuenta_predefinida_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;

	public bool $con_tipo_cuenta_predefinidasFK=false;
	public array $tipo_cuenta_predefinidasFK=array();
	public int $idtipo_cuenta_predefinidaDefaultFK=-1;

	public bool $con_tipo_cuentasFK=false;
	public array $tipo_cuentasFK=array();
	public int $idtipo_cuentaDefaultFK=-1;

	public bool $con_tipo_nivel_cuentasFK=false;
	public array $tipo_nivel_cuentasFK=array();
	public int $idtipo_nivel_cuentaDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->cuenta_predefinidas= array();
		$this->cuenta_predefinida= new cuenta_predefinida();
		
		/*SESSION*/
		$this->cuenta_predefinida_session=$this->Session->unserialize(cuenta_predefinida_util::$STR_SESSION_NAME);

		if($this->cuenta_predefinida_session==null) {
			$this->cuenta_predefinida_session=new cuenta_predefinida_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;

		$this->con_tipo_cuenta_predefinidasFK=false;
		$this->tipo_cuenta_predefinidasFK=array();
		$this->idtipo_cuenta_predefinidaDefaultFK=-1;

		$this->con_tipo_cuentasFK=false;
		$this->tipo_cuentasFK=array();
		$this->idtipo_cuentaDefaultFK=-1;

		$this->con_tipo_nivel_cuentasFK=false;
		$this->tipo_nivel_cuentasFK=array();
		$this->idtipo_nivel_cuentaDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getcuenta_predefinida() : cuenta_predefinida {	
		return $this->cuenta_predefinida;
	}
		
	public function setcuenta_predefinida(cuenta_predefinida $newcuenta_predefinida) {
		$this->cuenta_predefinida = $newcuenta_predefinida;
	}
	
	public function getcuenta_predefinidas() : array {		
		return $this->cuenta_predefinidas;
	}
	
	public function setcuenta_predefinidas(array $newcuenta_predefinidas) {
		$this->cuenta_predefinidas = $newcuenta_predefinidas;
	}
	
	/*SESSION*/
	public function getcuenta_predefinida_session() : cuenta_predefinida_session {	
		return $this->cuenta_predefinida_session;
	}
		
	public function setcuenta_predefinida_session(cuenta_predefinida_session $newcuenta_predefinida_session) {
		$this->cuenta_predefinida_session = $newcuenta_predefinida_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
