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

namespace com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\business\entity\tipo_nivel_cuenta;


class tipo_nivel_cuenta_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?tipo_nivel_cuenta $tipo_nivel_cuenta = null;	
	public ?array $tipo_nivel_cuentas = array();
	
	/*SESSION*/
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->tipo_nivel_cuentas= array();
		$this->tipo_nivel_cuenta= new tipo_nivel_cuenta();
		
		/*SESSION*/
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function gettipo_nivel_cuenta() : tipo_nivel_cuenta {	
		return $this->tipo_nivel_cuenta;
	}
		
	public function settipo_nivel_cuenta(tipo_nivel_cuenta $newtipo_nivel_cuenta) {
		$this->tipo_nivel_cuenta = $newtipo_nivel_cuenta;
	}
	
	public function gettipo_nivel_cuentas() : array {		
		return $this->tipo_nivel_cuentas;
	}
	
	public function settipo_nivel_cuentas(array $newtipo_nivel_cuentas) {
		$this->tipo_nivel_cuentas = $newtipo_nivel_cuentas;
	}
	

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
