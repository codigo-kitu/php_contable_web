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

namespace com\bydan\contabilidad\inventario\producto\presentation\session;

//use Exception;
//use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntitySessionBean;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

class producto_session extends GeneralEntitySessionBean {
	
	
	
	//ADDITIONAL
	//public $producto_sessionAdditional=null;
	
	/*BUSQUEDA*/
	
	public ?bool $bitBusquedaDesdeFKSesionempresa=null;
	public ?int $bigidempresaActual=null;
	public ?string $bigidempresaActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionproveedor=null;
	public ?int $bigidproveedorActual=null;
	public ?string $bigidproveedorActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesiontipo_producto=null;
	public ?int $bigidtipo_productoActual=null;
	public ?string $bigidtipo_productoActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionimpuesto=null;
	public ?int $bigidimpuestoActual=null;
	public ?string $bigidimpuestoActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionotro_impuesto=null;
	public ?int $bigidotro_impuestoActual=null;
	public ?string $bigidotro_impuestoActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesioncategoria_producto=null;
	public ?int $bigidcategoria_productoActual=null;
	public ?string $bigidcategoria_productoActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionsub_categoria_producto=null;
	public ?int $bigidsub_categoria_productoActual=null;
	public ?string $bigidsub_categoria_productoActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionbodega_defecto=null;
	public ?int $bigidbodega_defectoActual=null;
	public ?string $bigidbodega_defectoActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionunidad_compra=null;
	public ?int $bigidunidad_compraActual=null;
	public ?string $bigidunidad_compraActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionunidad_venta=null;
	public ?int $bigidunidad_ventaActual=null;
	public ?string $bigidunidad_ventaActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesioncuenta_venta=null;
	public ?int $bigidcuenta_ventaActual=null;
	public ?string $bigidcuenta_ventaActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesioncuenta_compra=null;
	public ?int $bigidcuenta_compraActual=null;
	public ?string $bigidcuenta_compraActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesioncuenta_costo=null;
	public ?int $bigidcuenta_costoActual=null;
	public ?string $bigidcuenta_costoActualDescripcion=null;
	public ?bool $bitBusquedaDesdeFKSesionretencion=null;
	public ?int $bigidretencionActual=null;
	public ?string $bigidretencionActualDescripcion=null;
	
	/*BUSQUEDA PARAMETROS*/
	public int $id=0;
	public int $id_empresa=-1;
	public int $id_proveedor=-1;
	public int $id_tipo_producto=-1;
	public int $id_impuesto=-1;
	public ?int $id_otro_impuesto=null;
	public int $id_categoria_producto=-1;
	public int $id_sub_categoria_producto=-1;
	public int $id_bodega_defecto=-1;
	public int $id_unidad_compra=-1;
	public int $id_unidad_venta=-1;
	public ?int $id_cuenta_venta=null;
	public ?int $id_cuenta_compra=null;
	public ?int $id_cuenta_costo=null;
	public ?int $id_retencion=null;
		
	function __construct () {	
		
		parent::__construct();
		
		$this->intNumeroPaginacion = producto_util::$INT_NUMERO_PAGINACION;
		
		$this->strPermiteRecargarInformacion = 'display:none';
		
		
		
		$this->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';
		$this->strStyleDivContent='width:93%;height:100%';
		$this->strStyleDivOpcionesBanner='display:none';
		$this->strStyleDivExpandirColapsar='display:none';
		$this->bitPaginaPopup=true;		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->producto_sessionAdditional=new producto_sessionAdditional();
		*/
		
		
		
		/*DEFAULT BUSQUEDA FKs PARAMETROS*/
		
		$this->bitBusquedaDesdeFKSesionempresa=false;
		$this->bigidempresaActual=0;
		$this->bigidempresaActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionproveedor=false;
		$this->bigidproveedorActual=0;
		$this->bigidproveedorActualDescripcion='';
		$this->bitBusquedaDesdeFKSesiontipo_producto=false;
		$this->bigidtipo_productoActual=0;
		$this->bigidtipo_productoActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionimpuesto=false;
		$this->bigidimpuestoActual=0;
		$this->bigidimpuestoActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionotro_impuesto=false;
		$this->bigidotro_impuestoActual=0;
		$this->bigidotro_impuestoActualDescripcion='';
		$this->bitBusquedaDesdeFKSesioncategoria_producto=false;
		$this->bigidcategoria_productoActual=0;
		$this->bigidcategoria_productoActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionsub_categoria_producto=false;
		$this->bigidsub_categoria_productoActual=0;
		$this->bigidsub_categoria_productoActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionbodega_defecto=false;
		$this->bigidbodega_defectoActual=0;
		$this->bigidbodega_defectoActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionunidad_compra=false;
		$this->bigidunidad_compraActual=0;
		$this->bigidunidad_compraActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionunidad_venta=false;
		$this->bigidunidad_ventaActual=0;
		$this->bigidunidad_ventaActualDescripcion='';
		$this->bitBusquedaDesdeFKSesioncuenta_venta=false;
		$this->bigidcuenta_ventaActual=0;
		$this->bigidcuenta_ventaActualDescripcion='';
		$this->bitBusquedaDesdeFKSesioncuenta_compra=false;
		$this->bigidcuenta_compraActual=0;
		$this->bigidcuenta_compraActualDescripcion='';
		$this->bitBusquedaDesdeFKSesioncuenta_costo=false;
		$this->bigidcuenta_costoActual=0;
		$this->bigidcuenta_costoActualDescripcion='';
		$this->bitBusquedaDesdeFKSesionretencion=false;
		$this->bigidretencionActual=0;
		$this->bigidretencionActualDescripcion=''; 
		
		/*DEFAULT PK ACTUAL FKs*/
		
		
		/*DEFAULT BUSQUEDA PARAMETROS*/
 		$this->id_empresa=-1;
 		$this->id_proveedor=-1;
 		$this->id_tipo_producto=-1;
 		$this->id_impuesto=-1;
 		$this->id_otro_impuesto=null;
 		$this->id_categoria_producto=-1;
 		$this->id_sub_categoria_producto=-1;
 		$this->id_bodega_defecto=-1;
 		$this->id_unidad_compra=-1;
 		$this->id_unidad_venta=-1;
 		$this->id_cuenta_venta=null;
 		$this->id_cuenta_compra=null;
 		$this->id_cuenta_costo=null;
 		$this->id_retencion=null;
    }
}
?>
