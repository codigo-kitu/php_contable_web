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

namespace com\bydan\contabilidad\cuentascobrar\estado_cuentas_cobrar\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\cuentascobrar\estado_cuentas_cobrar\business\entity\estado_cuentas_cobrar;


class estado_cuentas_cobrar_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?estado_cuentas_cobrar $estado_cuentas_cobrar = null;	
	public ?array $estado_cuentas_cobrars = array();
	
	/*SESSION*/
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->estado_cuentas_cobrars= array();
		$this->estado_cuentas_cobrar= new estado_cuentas_cobrar();
		
		/*SESSION*/
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function getestado_cuentas_cobrar() : estado_cuentas_cobrar {	
		return $this->estado_cuentas_cobrar;
	}
		
	public function setestado_cuentas_cobrar(estado_cuentas_cobrar $newestado_cuentas_cobrar) {
		$this->estado_cuentas_cobrar = $newestado_cuentas_cobrar;
	}
	
	public function getestado_cuentas_cobrars() : array {		
		return $this->estado_cuentas_cobrars;
	}
	
	public function setestado_cuentas_cobrars(array $newestado_cuentas_cobrars) {
		$this->estado_cuentas_cobrars = $newestado_cuentas_cobrars;
	}
	

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
