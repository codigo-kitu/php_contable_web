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

namespace com\bydan\contabilidad\inventario\serial_producto\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\inventario\serial_producto\business\entity\serial_producto;

use com\bydan\contabilidad\inventario\serial_producto\presentation\session\serial_producto_session;

class serial_producto_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?serial_producto $serial_producto = null;	
	public ?array $serial_productos = array();
	
	/*SESSION*/
	public ?serial_producto_session $serial_producto_session = null;
	
	/*FKs*/
	

	public bool $con_productosFK=false;
	public array $productosFK=array();
	public int $idproductoDefaultFK=-1;

	public bool $con_bodegasFK=false;
	public array $bodegasFK=array();
	public int $idbodegaDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->serial_productos= array();
		$this->serial_producto= new serial_producto();
		
		/*SESSION*/
		$this->serial_producto_session=$this->Session->unserialize(serial_producto_util::$STR_SESSION_NAME);

		if($this->serial_producto_session==null) {
			$this->serial_producto_session=new serial_producto_session();
		}
		
		/*FKs*/
		

		$this->con_productosFK=false;
		$this->productosFK=array();
		$this->idproductoDefaultFK=-1;

		$this->con_bodegasFK=false;
		$this->bodegasFK=array();
		$this->idbodegaDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getserial_producto() : serial_producto {	
		return $this->serial_producto;
	}
		
	public function setserial_producto(serial_producto $newserial_producto) {
		$this->serial_producto = $newserial_producto;
	}
	
	public function getserial_productos() : array {		
		return $this->serial_productos;
	}
	
	public function setserial_productos(array $newserial_productos) {
		$this->serial_productos = $newserial_productos;
	}
	
	/*SESSION*/
	public function getserial_producto_session() : serial_producto_session {	
		return $this->serial_producto_session;
	}
		
	public function setserial_producto_session(serial_producto_session $newserial_producto_session) {
		$this->serial_producto_session = $newserial_producto_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
