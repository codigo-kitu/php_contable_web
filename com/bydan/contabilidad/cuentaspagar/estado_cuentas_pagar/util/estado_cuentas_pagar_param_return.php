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

namespace com\bydan\contabilidad\cuentaspagar\estado_cuentas_pagar\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\cuentaspagar\estado_cuentas_pagar\business\entity\estado_cuentas_pagar;


class estado_cuentas_pagar_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?estado_cuentas_pagar $estado_cuentas_pagar = null;	
	public ?array $estado_cuentas_pagars = array();
	
	/*SESSION*/
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->estado_cuentas_pagars= array();
		$this->estado_cuentas_pagar= new estado_cuentas_pagar();
		
		/*SESSION*/
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function getestado_cuentas_pagar() : estado_cuentas_pagar {	
		return $this->estado_cuentas_pagar;
	}
		
	public function setestado_cuentas_pagar(estado_cuentas_pagar $newestado_cuentas_pagar) {
		$this->estado_cuentas_pagar = $newestado_cuentas_pagar;
	}
	
	public function getestado_cuentas_pagars() : array {		
		return $this->estado_cuentas_pagars;
	}
	
	public function setestado_cuentas_pagars(array $newestado_cuentas_pagars) {
		$this->estado_cuentas_pagars = $newestado_cuentas_pagars;
	}
	

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
