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

namespace com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity\termino_pago_proveedor;

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\presentation\session\termino_pago_proveedor_session;

class termino_pago_proveedor_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?termino_pago_proveedor $termino_pago_proveedor = null;	
	public ?array $termino_pago_proveedors = array();
	
	/*SESSION*/
	public ?termino_pago_proveedor_session $termino_pago_proveedor_session = null;
	
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
		$this->termino_pago_proveedors= array();
		$this->termino_pago_proveedor= new termino_pago_proveedor();
		
		/*SESSION*/
		$this->termino_pago_proveedor_session=$this->Session->unserialize(termino_pago_proveedor_util::$STR_SESSION_NAME);

		if($this->termino_pago_proveedor_session==null) {
			$this->termino_pago_proveedor_session=new termino_pago_proveedor_session();
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
	public function gettermino_pago_proveedor() : termino_pago_proveedor {	
		return $this->termino_pago_proveedor;
	}
		
	public function settermino_pago_proveedor(termino_pago_proveedor $newtermino_pago_proveedor) {
		$this->termino_pago_proveedor = $newtermino_pago_proveedor;
	}
	
	public function gettermino_pago_proveedors() : array {		
		return $this->termino_pago_proveedors;
	}
	
	public function settermino_pago_proveedors(array $newtermino_pago_proveedors) {
		$this->termino_pago_proveedors = $newtermino_pago_proveedors;
	}
	
	/*SESSION*/
	public function gettermino_pago_proveedor_session() : termino_pago_proveedor_session {	
		return $this->termino_pago_proveedor_session;
	}
		
	public function settermino_pago_proveedor_session(termino_pago_proveedor_session $newtermino_pago_proveedor_session) {
		$this->termino_pago_proveedor_session = $newtermino_pago_proveedor_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
