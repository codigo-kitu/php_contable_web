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

namespace com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\business\entity\forma_pago_cliente;

use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\presentation\session\forma_pago_cliente_session;

class forma_pago_cliente_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?forma_pago_cliente $forma_pago_cliente = null;	
	public ?array $forma_pago_clientes = array();
	
	/*SESSION*/
	public ?forma_pago_cliente_session $forma_pago_cliente_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;

	public bool $con_tipo_forma_pagosFK=false;
	public array $tipo_forma_pagosFK=array();
	public int $idtipo_forma_pagoDefaultFK=-1;

	public bool $con_cuentasFK=false;
	public array $cuentasFK=array();
	public int $idcuentaDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->forma_pago_clientes= array();
		$this->forma_pago_cliente= new forma_pago_cliente();
		
		/*SESSION*/
		$this->forma_pago_cliente_session=$this->Session->unserialize(forma_pago_cliente_util::$STR_SESSION_NAME);

		if($this->forma_pago_cliente_session==null) {
			$this->forma_pago_cliente_session=new forma_pago_cliente_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;

		$this->con_tipo_forma_pagosFK=false;
		$this->tipo_forma_pagosFK=array();
		$this->idtipo_forma_pagoDefaultFK=-1;

		$this->con_cuentasFK=false;
		$this->cuentasFK=array();
		$this->idcuentaDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getforma_pago_cliente() : forma_pago_cliente {	
		return $this->forma_pago_cliente;
	}
		
	public function setforma_pago_cliente(forma_pago_cliente $newforma_pago_cliente) {
		$this->forma_pago_cliente = $newforma_pago_cliente;
	}
	
	public function getforma_pago_clientes() : array {		
		return $this->forma_pago_clientes;
	}
	
	public function setforma_pago_clientes(array $newforma_pago_clientes) {
		$this->forma_pago_clientes = $newforma_pago_clientes;
	}
	
	/*SESSION*/
	public function getforma_pago_cliente_session() : forma_pago_cliente_session {	
		return $this->forma_pago_cliente_session;
	}
		
	public function setforma_pago_cliente_session(forma_pago_cliente_session $newforma_pago_cliente_session) {
		$this->forma_pago_cliente_session = $newforma_pago_cliente_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
