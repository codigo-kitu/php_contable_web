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

namespace com\bydan\contabilidad\inventario\kit_producto\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\inventario\kit_producto\business\entity\kit_producto;

use com\bydan\contabilidad\inventario\kit_producto\presentation\session\kit_producto_session;

class kit_producto_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?kit_producto $kit_producto = null;	
	public ?array $kit_productos = array();
	
	/*SESSION*/
	public ?kit_producto_session $kit_producto_session = null;
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->kit_productos= array();
		$this->kit_producto= new kit_producto();
		
		/*SESSION*/
		$this->kit_producto_session=$this->Session->unserialize(kit_producto_util::$STR_SESSION_NAME);

		if($this->kit_producto_session==null) {
			$this->kit_producto_session=new kit_producto_session();
		}
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function getkit_producto() : kit_producto {	
		return $this->kit_producto;
	}
		
	public function setkit_producto(kit_producto $newkit_producto) {
		$this->kit_producto = $newkit_producto;
	}
	
	public function getkit_productos() : array {		
		return $this->kit_productos;
	}
	
	public function setkit_productos(array $newkit_productos) {
		$this->kit_productos = $newkit_productos;
	}
	
	/*SESSION*/
	public function getkit_producto_session() : kit_producto_session {	
		return $this->kit_producto_session;
	}
		
	public function setkit_producto_session(kit_producto_session $newkit_producto_session) {
		$this->kit_producto_session = $newkit_producto_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
