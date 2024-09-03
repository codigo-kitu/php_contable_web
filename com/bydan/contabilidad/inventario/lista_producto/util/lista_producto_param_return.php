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

namespace com\bydan\contabilidad\inventario\lista_producto\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\inventario\lista_producto\business\entity\lista_producto;

use com\bydan\contabilidad\inventario\lista_producto\presentation\session\lista_producto_session;

class lista_producto_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?lista_producto $lista_producto = null;	
	public ?array $lista_productos = array();
	
	/*SESSION*/
	public ?lista_producto_session $lista_producto_session = null;
	
	/*FKs*/
	

	public bool $con_productosFK=false;
	public array $productosFK=array();
	public int $idproductoDefaultFK=-1;

	public bool $con_unidad_comprasFK=false;
	public array $unidad_comprasFK=array();
	public int $idunidad_compraDefaultFK=-1;

	public bool $con_unidad_ventasFK=false;
	public array $unidad_ventasFK=array();
	public int $idunidad_ventaDefaultFK=-1;

	public bool $con_categoria_productosFK=false;
	public array $categoria_productosFK=array();
	public int $idcategoria_productoDefaultFK=-1;

	public bool $con_sub_categoria_productosFK=false;
	public array $sub_categoria_productosFK=array();
	public int $idsub_categoria_productoDefaultFK=-1;

	public bool $con_tipo_productosFK=false;
	public array $tipo_productosFK=array();
	public int $idtipo_productoDefaultFK=-1;

	public bool $con_bodegasFK=false;
	public array $bodegasFK=array();
	public int $idbodegaDefaultFK=-1;

	public bool $con_cuenta_comprasFK=false;
	public array $cuenta_comprasFK=array();
	public int $idcuenta_compraDefaultFK=-1;

	public bool $con_cuenta_ventasFK=false;
	public array $cuenta_ventasFK=array();
	public int $idcuenta_ventaDefaultFK=-1;

	public bool $con_cuenta_inventariosFK=false;
	public array $cuenta_inventariosFK=array();
	public int $idcuenta_inventarioDefaultFK=-1;

	public bool $con_otro_suplidorsFK=false;
	public array $otro_suplidorsFK=array();
	public int $idotro_suplidorDefaultFK=-1;

	public bool $con_impuestosFK=false;
	public array $impuestosFK=array();
	public int $idimpuestoDefaultFK=-1;

	public bool $con_impuesto_ventassFK=false;
	public array $impuesto_ventassFK=array();
	public int $idimpuesto_ventasDefaultFK=-1;

	public bool $con_impuesto_comprassFK=false;
	public array $impuesto_comprassFK=array();
	public int $idimpuesto_comprasDefaultFK=-1;

	public bool $con_otro_impuestosFK=false;
	public array $otro_impuestosFK=array();
	public int $idotro_impuestoDefaultFK=-1;

	public bool $con_otro_impuesto_ventassFK=false;
	public array $otro_impuesto_ventassFK=array();
	public int $idotro_impuesto_ventasDefaultFK=-1;

	public bool $con_otro_impuesto_comprassFK=false;
	public array $otro_impuesto_comprassFK=array();
	public int $idotro_impuesto_comprasDefaultFK=-1;

	public bool $con_retencionsFK=false;
	public array $retencionsFK=array();
	public int $idretencionDefaultFK=-1;

	public bool $con_retencion_ventassFK=false;
	public array $retencion_ventassFK=array();
	public int $idretencion_ventasDefaultFK=-1;

	public bool $con_retencion_comprassFK=false;
	public array $retencion_comprassFK=array();
	public int $idretencion_comprasDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->lista_productos= array();
		$this->lista_producto= new lista_producto();
		
		/*SESSION*/
		$this->lista_producto_session=$this->Session->unserialize(lista_producto_util::$STR_SESSION_NAME);

		if($this->lista_producto_session==null) {
			$this->lista_producto_session=new lista_producto_session();
		}
		
		/*FKs*/
		

		$this->con_productosFK=false;
		$this->productosFK=array();
		$this->idproductoDefaultFK=-1;

		$this->con_unidad_comprasFK=false;
		$this->unidad_comprasFK=array();
		$this->idunidad_compraDefaultFK=-1;

		$this->con_unidad_ventasFK=false;
		$this->unidad_ventasFK=array();
		$this->idunidad_ventaDefaultFK=-1;

		$this->con_categoria_productosFK=false;
		$this->categoria_productosFK=array();
		$this->idcategoria_productoDefaultFK=-1;

		$this->con_sub_categoria_productosFK=false;
		$this->sub_categoria_productosFK=array();
		$this->idsub_categoria_productoDefaultFK=-1;

		$this->con_tipo_productosFK=false;
		$this->tipo_productosFK=array();
		$this->idtipo_productoDefaultFK=-1;

		$this->con_bodegasFK=false;
		$this->bodegasFK=array();
		$this->idbodegaDefaultFK=-1;

		$this->con_cuenta_comprasFK=false;
		$this->cuenta_comprasFK=array();
		$this->idcuenta_compraDefaultFK=-1;

		$this->con_cuenta_ventasFK=false;
		$this->cuenta_ventasFK=array();
		$this->idcuenta_ventaDefaultFK=-1;

		$this->con_cuenta_inventariosFK=false;
		$this->cuenta_inventariosFK=array();
		$this->idcuenta_inventarioDefaultFK=-1;

		$this->con_otro_suplidorsFK=false;
		$this->otro_suplidorsFK=array();
		$this->idotro_suplidorDefaultFK=-1;

		$this->con_impuestosFK=false;
		$this->impuestosFK=array();
		$this->idimpuestoDefaultFK=-1;

		$this->con_impuesto_ventassFK=false;
		$this->impuesto_ventassFK=array();
		$this->idimpuesto_ventasDefaultFK=-1;

		$this->con_impuesto_comprassFK=false;
		$this->impuesto_comprassFK=array();
		$this->idimpuesto_comprasDefaultFK=-1;

		$this->con_otro_impuestosFK=false;
		$this->otro_impuestosFK=array();
		$this->idotro_impuestoDefaultFK=-1;

		$this->con_otro_impuesto_ventassFK=false;
		$this->otro_impuesto_ventassFK=array();
		$this->idotro_impuesto_ventasDefaultFK=-1;

		$this->con_otro_impuesto_comprassFK=false;
		$this->otro_impuesto_comprassFK=array();
		$this->idotro_impuesto_comprasDefaultFK=-1;

		$this->con_retencionsFK=false;
		$this->retencionsFK=array();
		$this->idretencionDefaultFK=-1;

		$this->con_retencion_ventassFK=false;
		$this->retencion_ventassFK=array();
		$this->idretencion_ventasDefaultFK=-1;

		$this->con_retencion_comprassFK=false;
		$this->retencion_comprassFK=array();
		$this->idretencion_comprasDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getlista_producto() : lista_producto {	
		return $this->lista_producto;
	}
		
	public function setlista_producto(lista_producto $newlista_producto) {
		$this->lista_producto = $newlista_producto;
	}
	
	public function getlista_productos() : array {		
		return $this->lista_productos;
	}
	
	public function setlista_productos(array $newlista_productos) {
		$this->lista_productos = $newlista_productos;
	}
	
	/*SESSION*/
	public function getlista_producto_session() : lista_producto_session {	
		return $this->lista_producto_session;
	}
		
	public function setlista_producto_session(lista_producto_session $newlista_producto_session) {
		$this->lista_producto_session = $newlista_producto_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
