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

namespace com\bydan\contabilidad\inventario\imagen_producto\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\inventario\imagen_producto\business\entity\imagen_producto;

use com\bydan\contabilidad\inventario\imagen_producto\presentation\session\imagen_producto_session;

class imagen_producto_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?imagen_producto $imagen_producto = null;	
	public ?array $imagen_productos = array();
	
	/*SESSION*/
	public ?imagen_producto_session $imagen_producto_session = null;
	
	/*FKs*/
	

	public bool $con_productosFK=false;
	public array $productosFK=array();
	public int $idproductoDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->imagen_productos= array();
		$this->imagen_producto= new imagen_producto();
		
		/*SESSION*/
		$this->imagen_producto_session=$this->Session->unserialize(imagen_producto_util::$STR_SESSION_NAME);

		if($this->imagen_producto_session==null) {
			$this->imagen_producto_session=new imagen_producto_session();
		}
		
		/*FKs*/
		

		$this->con_productosFK=false;
		$this->productosFK=array();
		$this->idproductoDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getimagen_producto() : imagen_producto {	
		return $this->imagen_producto;
	}
		
	public function setimagen_producto(imagen_producto $newimagen_producto) {
		$this->imagen_producto = $newimagen_producto;
	}
	
	public function getimagen_productos() : array {		
		return $this->imagen_productos;
	}
	
	public function setimagen_productos(array $newimagen_productos) {
		$this->imagen_productos = $newimagen_productos;
	}
	
	/*SESSION*/
	public function getimagen_producto_session() : imagen_producto_session {	
		return $this->imagen_producto_session;
	}
		
	public function setimagen_producto_session(imagen_producto_session $newimagen_producto_session) {
		$this->imagen_producto_session = $newimagen_producto_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
