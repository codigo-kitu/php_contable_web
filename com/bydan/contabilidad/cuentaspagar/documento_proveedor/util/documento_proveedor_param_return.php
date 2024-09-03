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

namespace com\bydan\contabilidad\cuentaspagar\documento_proveedor\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\cuentaspagar\documento_proveedor\business\entity\documento_proveedor;

use com\bydan\contabilidad\cuentaspagar\documento_proveedor\presentation\session\documento_proveedor_session;

class documento_proveedor_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?documento_proveedor $documento_proveedor = null;	
	public ?array $documento_proveedors = array();
	
	/*SESSION*/
	public ?documento_proveedor_session $documento_proveedor_session = null;
	
	/*FKs*/
	

	public bool $con_proveedorsFK=false;
	public array $proveedorsFK=array();
	public int $idproveedorDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->documento_proveedors= array();
		$this->documento_proveedor= new documento_proveedor();
		
		/*SESSION*/
		$this->documento_proveedor_session=$this->Session->unserialize(documento_proveedor_util::$STR_SESSION_NAME);

		if($this->documento_proveedor_session==null) {
			$this->documento_proveedor_session=new documento_proveedor_session();
		}
		
		/*FKs*/
		

		$this->con_proveedorsFK=false;
		$this->proveedorsFK=array();
		$this->idproveedorDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getdocumento_proveedor() : documento_proveedor {	
		return $this->documento_proveedor;
	}
		
	public function setdocumento_proveedor(documento_proveedor $newdocumento_proveedor) {
		$this->documento_proveedor = $newdocumento_proveedor;
	}
	
	public function getdocumento_proveedors() : array {		
		return $this->documento_proveedors;
	}
	
	public function setdocumento_proveedors(array $newdocumento_proveedors) {
		$this->documento_proveedors = $newdocumento_proveedors;
	}
	
	/*SESSION*/
	public function getdocumento_proveedor_session() : documento_proveedor_session {	
		return $this->documento_proveedor_session;
	}
		
	public function setdocumento_proveedor_session(documento_proveedor_session $newdocumento_proveedor_session) {
		$this->documento_proveedor_session = $newdocumento_proveedor_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
