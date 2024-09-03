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

namespace com\bydan\contabilidad\cuentascorrientes\instrumento_pago\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\business\entity\instrumento_pago;

use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\presentation\session\instrumento_pago_session;

class instrumento_pago_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?instrumento_pago $instrumento_pago = null;	
	public ?array $instrumento_pagos = array();
	
	/*SESSION*/
	public ?instrumento_pago_session $instrumento_pago_session = null;
	
	/*FKs*/
	

	public bool $con_cuenta_comprassFK=false;
	public array $cuenta_comprassFK=array();
	public int $idcuenta_comprasDefaultFK=-1;

	public bool $con_cuenta_ventassFK=false;
	public array $cuenta_ventassFK=array();
	public int $idcuenta_ventasDefaultFK=-1;

	public bool $con_cuenta_corrientesFK=false;
	public array $cuenta_corrientesFK=array();
	public int $idcuenta_corrienteDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->instrumento_pagos= array();
		$this->instrumento_pago= new instrumento_pago();
		
		/*SESSION*/
		$this->instrumento_pago_session=$this->Session->unserialize(instrumento_pago_util::$STR_SESSION_NAME);

		if($this->instrumento_pago_session==null) {
			$this->instrumento_pago_session=new instrumento_pago_session();
		}
		
		/*FKs*/
		

		$this->con_cuenta_comprassFK=false;
		$this->cuenta_comprassFK=array();
		$this->idcuenta_comprasDefaultFK=-1;

		$this->con_cuenta_ventassFK=false;
		$this->cuenta_ventassFK=array();
		$this->idcuenta_ventasDefaultFK=-1;

		$this->con_cuenta_corrientesFK=false;
		$this->cuenta_corrientesFK=array();
		$this->idcuenta_corrienteDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getinstrumento_pago() : instrumento_pago {	
		return $this->instrumento_pago;
	}
		
	public function setinstrumento_pago(instrumento_pago $newinstrumento_pago) {
		$this->instrumento_pago = $newinstrumento_pago;
	}
	
	public function getinstrumento_pagos() : array {		
		return $this->instrumento_pagos;
	}
	
	public function setinstrumento_pagos(array $newinstrumento_pagos) {
		$this->instrumento_pagos = $newinstrumento_pagos;
	}
	
	/*SESSION*/
	public function getinstrumento_pago_session() : instrumento_pago_session {	
		return $this->instrumento_pago_session;
	}
		
	public function setinstrumento_pago_session(instrumento_pago_session $newinstrumento_pago_session) {
		$this->instrumento_pago_session = $newinstrumento_pago_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
