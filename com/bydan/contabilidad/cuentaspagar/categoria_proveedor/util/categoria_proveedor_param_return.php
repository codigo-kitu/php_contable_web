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

namespace com\bydan\contabilidad\cuentaspagar\categoria_proveedor\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\business\entity\categoria_proveedor;

use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\presentation\session\categoria_proveedor_session;

class categoria_proveedor_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?categoria_proveedor $categoria_proveedor = null;	
	public ?array $categoria_proveedors = array();
	
	/*SESSION*/
	public ?categoria_proveedor_session $categoria_proveedor_session = null;
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->categoria_proveedors= array();
		$this->categoria_proveedor= new categoria_proveedor();
		
		/*SESSION*/
		$this->categoria_proveedor_session=$this->Session->unserialize(categoria_proveedor_util::$STR_SESSION_NAME);

		if($this->categoria_proveedor_session==null) {
			$this->categoria_proveedor_session=new categoria_proveedor_session();
		}
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function getcategoria_proveedor() : categoria_proveedor {	
		return $this->categoria_proveedor;
	}
		
	public function setcategoria_proveedor(categoria_proveedor $newcategoria_proveedor) {
		$this->categoria_proveedor = $newcategoria_proveedor;
	}
	
	public function getcategoria_proveedors() : array {		
		return $this->categoria_proveedors;
	}
	
	public function setcategoria_proveedors(array $newcategoria_proveedors) {
		$this->categoria_proveedors = $newcategoria_proveedors;
	}
	
	/*SESSION*/
	public function getcategoria_proveedor_session() : categoria_proveedor_session {	
		return $this->categoria_proveedor_session;
	}
		
	public function setcategoria_proveedor_session(categoria_proveedor_session $newcategoria_proveedor_session) {
		$this->categoria_proveedor_session = $newcategoria_proveedor_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
