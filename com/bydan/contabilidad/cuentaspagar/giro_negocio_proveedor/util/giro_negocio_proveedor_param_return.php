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

namespace com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\business\entity\giro_negocio_proveedor;

use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\presentation\session\giro_negocio_proveedor_session;

class giro_negocio_proveedor_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?giro_negocio_proveedor $giro_negocio_proveedor = null;	
	public ?array $giro_negocio_proveedors = array();
	
	/*SESSION*/
	public ?giro_negocio_proveedor_session $giro_negocio_proveedor_session = null;
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->giro_negocio_proveedors= array();
		$this->giro_negocio_proveedor= new giro_negocio_proveedor();
		
		/*SESSION*/
		$this->giro_negocio_proveedor_session=$this->Session->unserialize(giro_negocio_proveedor_util::$STR_SESSION_NAME);

		if($this->giro_negocio_proveedor_session==null) {
			$this->giro_negocio_proveedor_session=new giro_negocio_proveedor_session();
		}
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function getgiro_negocio_proveedor() : giro_negocio_proveedor {	
		return $this->giro_negocio_proveedor;
	}
		
	public function setgiro_negocio_proveedor(giro_negocio_proveedor $newgiro_negocio_proveedor) {
		$this->giro_negocio_proveedor = $newgiro_negocio_proveedor;
	}
	
	public function getgiro_negocio_proveedors() : array {		
		return $this->giro_negocio_proveedors;
	}
	
	public function setgiro_negocio_proveedors(array $newgiro_negocio_proveedors) {
		$this->giro_negocio_proveedors = $newgiro_negocio_proveedors;
	}
	
	/*SESSION*/
	public function getgiro_negocio_proveedor_session() : giro_negocio_proveedor_session {	
		return $this->giro_negocio_proveedor_session;
	}
		
	public function setgiro_negocio_proveedor_session(giro_negocio_proveedor_session $newgiro_negocio_proveedor_session) {
		$this->giro_negocio_proveedor_session = $newgiro_negocio_proveedor_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
