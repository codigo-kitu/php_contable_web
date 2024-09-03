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

namespace com\bydan\contabilidad\cuentascorrientes\estado_cuentas_corrientes\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\cuentascorrientes\estado_cuentas_corrientes\business\entity\estado_cuentas_corrientes;


class estado_cuentas_corrientes_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?estado_cuentas_corrientes $estado_cuentas_corrientes = null;	
	public ?array $estado_cuentas_corrientess = array();
	
	/*SESSION*/
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->estado_cuentas_corrientess= array();
		$this->estado_cuentas_corrientes= new estado_cuentas_corrientes();
		
		/*SESSION*/
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function getestado_cuentas_corrientes() : estado_cuentas_corrientes {	
		return $this->estado_cuentas_corrientes;
	}
		
	public function setestado_cuentas_corrientes(estado_cuentas_corrientes $newestado_cuentas_corrientes) {
		$this->estado_cuentas_corrientes = $newestado_cuentas_corrientes;
	}
	
	public function getestado_cuentas_corrientess() : array {		
		return $this->estado_cuentas_corrientess;
	}
	
	public function setestado_cuentas_corrientess(array $newestado_cuentas_corrientess) {
		$this->estado_cuentas_corrientess = $newestado_cuentas_corrientess;
	}
	

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
