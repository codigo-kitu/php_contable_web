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

namespace com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\presentation\session\termino_pago_cliente_session;

class termino_pago_cliente_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?termino_pago_cliente $termino_pago_cliente = null;	
	public ?array $termino_pago_clientes = array();
	
	/*SESSION*/
	public ?termino_pago_cliente_session $termino_pago_cliente_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;

	public bool $con_tipo_termino_pagosFK=false;
	public array $tipo_termino_pagosFK=array();
	public int $idtipo_termino_pagoDefaultFK=-1;

	public bool $con_cuentasFK=false;
	public array $cuentasFK=array();
	public int $idcuentaDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->termino_pago_clientes= array();
		$this->termino_pago_cliente= new termino_pago_cliente();
		
		/*SESSION*/
		$this->termino_pago_cliente_session=$this->Session->unserialize(termino_pago_cliente_util::$STR_SESSION_NAME);

		if($this->termino_pago_cliente_session==null) {
			$this->termino_pago_cliente_session=new termino_pago_cliente_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;

		$this->con_tipo_termino_pagosFK=false;
		$this->tipo_termino_pagosFK=array();
		$this->idtipo_termino_pagoDefaultFK=-1;

		$this->con_cuentasFK=false;
		$this->cuentasFK=array();
		$this->idcuentaDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function gettermino_pago_cliente() : termino_pago_cliente {	
		return $this->termino_pago_cliente;
	}
		
	public function settermino_pago_cliente(termino_pago_cliente $newtermino_pago_cliente) {
		$this->termino_pago_cliente = $newtermino_pago_cliente;
	}
	
	public function gettermino_pago_clientes() : array {		
		return $this->termino_pago_clientes;
	}
	
	public function settermino_pago_clientes(array $newtermino_pago_clientes) {
		$this->termino_pago_clientes = $newtermino_pago_clientes;
	}
	
	/*SESSION*/
	public function gettermino_pago_cliente_session() : termino_pago_cliente_session {	
		return $this->termino_pago_cliente_session;
	}
		
	public function settermino_pago_cliente_session(termino_pago_cliente_session $newtermino_pago_cliente_session) {
		$this->termino_pago_cliente_session = $newtermino_pago_cliente_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
