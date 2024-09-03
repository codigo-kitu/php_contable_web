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

namespace com\bydan\contabilidad\inventario\lista_producto\presentation\session;

//use Exception;
//use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntitySessionBean;
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_util;

class lista_producto_session extends GeneralEntitySessionBean {
	
	
	
	//ADDITIONAL
	//public $lista_producto_sessionAdditional=null;
	
	/*BUSQUEDA*/
	
	public ?bool $bitBusquedaDesdeFKSesionproducto=null;
	public ?int $bigidproductoActual=null;
	public ?string $bigidproductoActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionunidad_compra=null;
	public ?int $bigidunidad_compraActual=null;
	public ?string $bigidunidad_compraActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionunidad_venta=null;
	public ?int $bigidunidad_ventaActual=null;
	public ?string $bigidunidad_ventaActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesioncategoria_producto=null;
	public ?int $bigidcategoria_productoActual=null;
	public ?string $bigidcategoria_productoActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionsub_categoria_producto=null;
	public ?int $bigidsub_categoria_productoActual=null;
	public ?string $bigidsub_categoria_productoActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesiontipo_producto=null;
	public ?int $bigidtipo_productoActual=null;
	public ?string $bigidtipo_productoActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionbodega=null;
	public ?int $bigidbodegaActual=null;
	public ?string $bigidbodegaActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesioncuenta_compra=null;
	public ?int $bigidcuenta_compraActual=null;
	public ?string $bigidcuenta_compraActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesioncuenta_venta=null;
	public ?int $bigidcuenta_ventaActual=null;
	public ?string $bigidcuenta_ventaActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesioncuenta_inventario=null;
	public ?int $bigidcuenta_inventarioActual=null;
	public ?string $bigidcuenta_inventarioActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionotro_suplidor=null;
	public ?int $bigidotro_suplidorActual=null;
	public ?string $bigidotro_suplidorActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionimpuesto=null;
	public ?int $bigidimpuestoActual=null;
	public ?string $bigidimpuestoActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionimpuesto_ventas=null;
	public ?int $bigidimpuesto_ventasActual=null;
	public ?string $bigidimpuesto_ventasActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionimpuesto_compras=null;
	public ?int $bigidimpuesto_comprasActual=null;
	public ?string $bigidimpuesto_comprasActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionotro_impuesto=null;
	public ?int $bigidotro_impuestoActual=null;
	public ?string $bigidotro_impuestoActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionotro_impuesto_ventas=null;
	public ?int $bigidotro_impuesto_ventasActual=null;
	public ?string $bigidotro_impuesto_ventasActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionotro_impuesto_compras=null;
	public ?int $bigidotro_impuesto_comprasActual=null;
	public ?string $bigidotro_impuesto_comprasActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionretencion=null;
	public ?int $bigidretencionActual=null;
	public ?string $bigidretencionActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionretencion_ventas=null;
	public ?int $bigidretencion_ventasActual=null;
	public ?string $bigidretencion_ventasActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionretencion_compras=null;
	public ?int $bigidretencion_comprasActual=null;
	public ?string $bigidretencion_comprasActualDescripcion=null;
	
	/*BUSQUEDA PARAMETROS*/
	public int $id=0;
	public int $id_producto=-1;
	public int $id_unidad_compra=-1;
	public int $id_unidad_venta=-1;
	public int $id_categoria_producto=-1;
	public int $id_sub_categoria_producto=-1;
	public int $id_tipo_producto=-1;
	public int $id_bodega=-1;
	public int $id_cuenta_compra=-1;
	public int $id_cuenta_venta=-1;
	public int $id_cuenta_inventario=-1;
	public int $id_otro_suplidor=-1;
	public int $id_impuesto=-1;
	public int $id_impuesto_ventas=-1;
	public int $id_impuesto_compras=-1;
	public int $id_otro_impuesto=-1;
	public int $id_otro_impuesto_ventas=-1;
	public int $id_otro_impuesto_compras=-1;
	public int $id_retencion=-1;
	public int $id_retencion_ventas=-1;
	public int $id_retencion_compras=-1;
		
	function __construct () {	
		
		parent::__construct();
		
		$this->intNumeroPaginacion = lista_producto_util::$INT_NUMERO_PAGINACION;
		
		$this->strPermiteRecargarInformacion = 'display:none';
		
		
		
		$this->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';
		$this->strStyleDivContent='width:93%;height:100%';
		$this->strStyleDivOpcionesBanner='display:none';
		$this->strStyleDivExpandirColapsar='display:none';
		$this->bitPaginaPopup=true;		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->lista_producto_sessionAdditional=new lista_producto_sessionAdditional();
		*/
		
		
		
		/*DEFAULT BUSQUEDA FKs PARAMETROS*/
		
		$this->bitBusquedaDesdeFKSesionproducto=false;
		$this->bigidproductoActual=0;
		$this->bigidproductoActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionunidad_compra=false;
		$this->bigidunidad_compraActual=0;
		$this->bigidunidad_compraActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionunidad_venta=false;
		$this->bigidunidad_ventaActual=0;
		$this->bigidunidad_ventaActualDescripcion='';
		$this->bitBusquedaDesdeFKSesioncategoria_producto=false;
		$this->bigidcategoria_productoActual=0;
		$this->bigidcategoria_productoActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionsub_categoria_producto=false;
		$this->bigidsub_categoria_productoActual=0;
		$this->bigidsub_categoria_productoActualDescripcion='';
		$this->bitBusquedaDesdeFKSesiontipo_producto=false;
		$this->bigidtipo_productoActual=0;
		$this->bigidtipo_productoActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionbodega=false;
		$this->bigidbodegaActual=0;
		$this->bigidbodegaActualDescripcion='';
		$this->bitBusquedaDesdeFKSesioncuenta_compra=false;
		$this->bigidcuenta_compraActual=0;
		$this->bigidcuenta_compraActualDescripcion='';
		$this->bitBusquedaDesdeFKSesioncuenta_venta=false;
		$this->bigidcuenta_ventaActual=0;
		$this->bigidcuenta_ventaActualDescripcion='';
		$this->bitBusquedaDesdeFKSesioncuenta_inventario=false;
		$this->bigidcuenta_inventarioActual=0;
		$this->bigidcuenta_inventarioActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionotro_suplidor=false;
		$this->bigidotro_suplidorActual=0;
		$this->bigidotro_suplidorActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionimpuesto=false;
		$this->bigidimpuestoActual=0;
		$this->bigidimpuestoActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionimpuesto_ventas=false;
		$this->bigidimpuesto_ventasActual=0;
		$this->bigidimpuesto_ventasActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionimpuesto_compras=false;
		$this->bigidimpuesto_comprasActual=0;
		$this->bigidimpuesto_comprasActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionotro_impuesto=false;
		$this->bigidotro_impuestoActual=0;
		$this->bigidotro_impuestoActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionotro_impuesto_ventas=false;
		$this->bigidotro_impuesto_ventasActual=0;
		$this->bigidotro_impuesto_ventasActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionotro_impuesto_compras=false;
		$this->bigidotro_impuesto_comprasActual=0;
		$this->bigidotro_impuesto_comprasActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionretencion=false;
		$this->bigidretencionActual=0;
		$this->bigidretencionActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionretencion_ventas=false;
		$this->bigidretencion_ventasActual=0;
		$this->bigidretencion_ventasActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionretencion_compras=false;
		$this->bigidretencion_comprasActual=0;
		$this->bigidretencion_comprasActualDescripcion=''; 
		
		/*DEFAULT PK ACTUAL FKs*/
		
		
		/*DEFAULT BUSQUEDA PARAMETROS*/
 		$this->id_producto=-1;
 		$this->id_unidad_compra=-1;
 		$this->id_unidad_venta=-1;
 		$this->id_categoria_producto=-1;
 		$this->id_sub_categoria_producto=-1;
 		$this->id_tipo_producto=-1;
 		$this->id_bodega=-1;
 		$this->id_cuenta_compra=-1;
 		$this->id_cuenta_venta=-1;
 		$this->id_cuenta_inventario=-1;
 		$this->id_otro_suplidor=-1;
 		$this->id_impuesto=-1;
 		$this->id_impuesto_ventas=-1;
 		$this->id_impuesto_compras=-1;
 		$this->id_otro_impuesto=-1;
 		$this->id_otro_impuesto_ventas=-1;
 		$this->id_otro_impuesto_compras=-1;
 		$this->id_retencion=-1;
 		$this->id_retencion_ventas=-1;
 		$this->id_retencion_compras=-1;
    }
}
?>
