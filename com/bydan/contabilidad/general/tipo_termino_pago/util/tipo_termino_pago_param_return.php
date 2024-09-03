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

namespace com\bydan\contabilidad\general\tipo_termino_pago\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\general\tipo_termino_pago\business\entity\tipo_termino_pago;

use com\bydan\contabilidad\general\tipo_termino_pago\presentation\session\tipo_termino_pago_session;

class tipo_termino_pago_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?tipo_termino_pago $tipo_termino_pago = null;	
	public ?array $tipo_termino_pagos = array();
	
	/*SESSION*/
	public ?tipo_termino_pago_session $tipo_termino_pago_session = null;
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->tipo_termino_pagos= array();
		$this->tipo_termino_pago= new tipo_termino_pago();
		
		/*SESSION*/
		$this->tipo_termino_pago_session=$this->Session->unserialize(tipo_termino_pago_util::$STR_SESSION_NAME);

		if($this->tipo_termino_pago_session==null) {
			$this->tipo_termino_pago_session=new tipo_termino_pago_session();
		}
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function gettipo_termino_pago() : tipo_termino_pago {	
		return $this->tipo_termino_pago;
	}
		
	public function settipo_termino_pago(tipo_termino_pago $newtipo_termino_pago) {
		$this->tipo_termino_pago = $newtipo_termino_pago;
	}
	
	public function gettipo_termino_pagos() : array {		
		return $this->tipo_termino_pagos;
	}
	
	public function settipo_termino_pagos(array $newtipo_termino_pagos) {
		$this->tipo_termino_pagos = $newtipo_termino_pagos;
	}
	
	/*SESSION*/
	public function gettipo_termino_pago_session() : tipo_termino_pago_session {	
		return $this->tipo_termino_pago_session;
	}
		
	public function settipo_termino_pago_session(tipo_termino_pago_session $newtipo_termino_pago_session) {
		$this->tipo_termino_pago_session = $newtipo_termino_pago_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
