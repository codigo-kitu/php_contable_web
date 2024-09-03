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

namespace com\bydan\contabilidad\inventario\lote_producto\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\inventario\lote_producto\business\entity\lote_producto;

use com\bydan\contabilidad\inventario\lote_producto\presentation\session\lote_producto_session;

class lote_producto_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?lote_producto $lote_producto = null;	
	public ?array $lote_productos = array();
	
	/*SESSION*/
	public ?lote_producto_session $lote_producto_session = null;
	
	/*FKs*/
	

	public bool $con_productosFK=false;
	public array $productosFK=array();
	public int $idproductoDefaultFK=-1;

	public bool $con_bodegasFK=false;
	public array $bodegasFK=array();
	public int $idbodegaDefaultFK=-1;

	public bool $con_proveedorsFK=false;
	public array $proveedorsFK=array();
	public int $idproveedorDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->lote_productos= array();
		$this->lote_producto= new lote_producto();
		
		/*SESSION*/
		$this->lote_producto_session=$this->Session->unserialize(lote_producto_util::$STR_SESSION_NAME);

		if($this->lote_producto_session==null) {
			$this->lote_producto_session=new lote_producto_session();
		}
		
		/*FKs*/
		

		$this->con_productosFK=false;
		$this->productosFK=array();
		$this->idproductoDefaultFK=-1;

		$this->con_bodegasFK=false;
		$this->bodegasFK=array();
		$this->idbodegaDefaultFK=-1;

		$this->con_proveedorsFK=false;
		$this->proveedorsFK=array();
		$this->idproveedorDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getlote_producto() : lote_producto {	
		return $this->lote_producto;
	}
		
	public function setlote_producto(lote_producto $newlote_producto) {
		$this->lote_producto = $newlote_producto;
	}
	
	public function getlote_productos() : array {		
		return $this->lote_productos;
	}
	
	public function setlote_productos(array $newlote_productos) {
		$this->lote_productos = $newlote_productos;
	}
	
	/*SESSION*/
	public function getlote_producto_session() : lote_producto_session {	
		return $this->lote_producto_session;
	}
		
	public function setlote_producto_session(lote_producto_session $newlote_producto_session) {
		$this->lote_producto_session = $newlote_producto_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
