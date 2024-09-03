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

namespace com\bydan\contabilidad\inventario\precio_producto\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\inventario\precio_producto\business\entity\precio_producto;

use com\bydan\contabilidad\inventario\precio_producto\presentation\session\precio_producto_session;

class precio_producto_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?precio_producto $precio_producto = null;	
	public ?array $precio_productos = array();
	
	/*SESSION*/
	public ?precio_producto_session $precio_producto_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;

	public bool $con_bodegasFK=false;
	public array $bodegasFK=array();
	public int $idbodegaDefaultFK=-1;

	public bool $con_productosFK=false;
	public array $productosFK=array();
	public int $idproductoDefaultFK=-1;

	public bool $con_tipo_preciosFK=false;
	public array $tipo_preciosFK=array();
	public int $idtipo_precioDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->precio_productos= array();
		$this->precio_producto= new precio_producto();
		
		/*SESSION*/
		$this->precio_producto_session=$this->Session->unserialize(precio_producto_util::$STR_SESSION_NAME);

		if($this->precio_producto_session==null) {
			$this->precio_producto_session=new precio_producto_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;

		$this->con_bodegasFK=false;
		$this->bodegasFK=array();
		$this->idbodegaDefaultFK=-1;

		$this->con_productosFK=false;
		$this->productosFK=array();
		$this->idproductoDefaultFK=-1;

		$this->con_tipo_preciosFK=false;
		$this->tipo_preciosFK=array();
		$this->idtipo_precioDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getprecio_producto() : precio_producto {	
		return $this->precio_producto;
	}
		
	public function setprecio_producto(precio_producto $newprecio_producto) {
		$this->precio_producto = $newprecio_producto;
	}
	
	public function getprecio_productos() : array {		
		return $this->precio_productos;
	}
	
	public function setprecio_productos(array $newprecio_productos) {
		$this->precio_productos = $newprecio_productos;
	}
	
	/*SESSION*/
	public function getprecio_producto_session() : precio_producto_session {	
		return $this->precio_producto_session;
	}
		
	public function setprecio_producto_session(precio_producto_session $newprecio_producto_session) {
		$this->precio_producto_session = $newprecio_producto_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
