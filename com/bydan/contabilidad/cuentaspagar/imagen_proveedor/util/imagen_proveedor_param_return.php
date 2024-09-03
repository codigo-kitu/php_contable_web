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

namespace com\bydan\contabilidad\cuentaspagar\imagen_proveedor\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\cuentaspagar\imagen_proveedor\business\entity\imagen_proveedor;

use com\bydan\contabilidad\cuentaspagar\imagen_proveedor\presentation\session\imagen_proveedor_session;

class imagen_proveedor_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?imagen_proveedor $imagen_proveedor = null;	
	public ?array $imagen_proveedors = array();
	
	/*SESSION*/
	public ?imagen_proveedor_session $imagen_proveedor_session = null;
	
	/*FKs*/
	

	public bool $con_proveedorsFK=false;
	public array $proveedorsFK=array();
	public int $idproveedorDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->imagen_proveedors= array();
		$this->imagen_proveedor= new imagen_proveedor();
		
		/*SESSION*/
		$this->imagen_proveedor_session=$this->Session->unserialize(imagen_proveedor_util::$STR_SESSION_NAME);

		if($this->imagen_proveedor_session==null) {
			$this->imagen_proveedor_session=new imagen_proveedor_session();
		}
		
		/*FKs*/
		

		$this->con_proveedorsFK=false;
		$this->proveedorsFK=array();
		$this->idproveedorDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getimagen_proveedor() : imagen_proveedor {	
		return $this->imagen_proveedor;
	}
		
	public function setimagen_proveedor(imagen_proveedor $newimagen_proveedor) {
		$this->imagen_proveedor = $newimagen_proveedor;
	}
	
	public function getimagen_proveedors() : array {		
		return $this->imagen_proveedors;
	}
	
	public function setimagen_proveedors(array $newimagen_proveedors) {
		$this->imagen_proveedors = $newimagen_proveedors;
	}
	
	/*SESSION*/
	public function getimagen_proveedor_session() : imagen_proveedor_session {	
		return $this->imagen_proveedor_session;
	}
		
	public function setimagen_proveedor_session(imagen_proveedor_session $newimagen_proveedor_session) {
		$this->imagen_proveedor_session = $newimagen_proveedor_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
