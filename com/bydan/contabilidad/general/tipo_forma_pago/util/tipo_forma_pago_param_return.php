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

namespace com\bydan\contabilidad\general\tipo_forma_pago\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\general\tipo_forma_pago\business\entity\tipo_forma_pago;

use com\bydan\contabilidad\general\tipo_forma_pago\presentation\session\tipo_forma_pago_session;

class tipo_forma_pago_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?tipo_forma_pago $tipo_forma_pago = null;	
	public ?array $tipo_forma_pagos = array();
	
	/*SESSION*/
	public ?tipo_forma_pago_session $tipo_forma_pago_session = null;
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->tipo_forma_pagos= array();
		$this->tipo_forma_pago= new tipo_forma_pago();
		
		/*SESSION*/
		$this->tipo_forma_pago_session=$this->Session->unserialize(tipo_forma_pago_util::$STR_SESSION_NAME);

		if($this->tipo_forma_pago_session==null) {
			$this->tipo_forma_pago_session=new tipo_forma_pago_session();
		}
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function gettipo_forma_pago() : tipo_forma_pago {	
		return $this->tipo_forma_pago;
	}
		
	public function settipo_forma_pago(tipo_forma_pago $newtipo_forma_pago) {
		$this->tipo_forma_pago = $newtipo_forma_pago;
	}
	
	public function gettipo_forma_pagos() : array {		
		return $this->tipo_forma_pagos;
	}
	
	public function settipo_forma_pagos(array $newtipo_forma_pagos) {
		$this->tipo_forma_pagos = $newtipo_forma_pagos;
	}
	
	/*SESSION*/
	public function gettipo_forma_pago_session() : tipo_forma_pago_session {	
		return $this->tipo_forma_pago_session;
	}
		
	public function settipo_forma_pago_session(tipo_forma_pago_session $newtipo_forma_pago_session) {
		$this->tipo_forma_pago_session = $newtipo_forma_pago_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
