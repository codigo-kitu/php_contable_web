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

namespace com\bydan\contabilidad\inventario\producto\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\inventario\producto\business\entity\producto;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\util\empresa_util;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;
use com\bydan\contabilidad\inventario\tipo_producto\business\entity\tipo_producto;
use com\bydan\contabilidad\inventario\tipo_producto\util\tipo_producto_util;
use com\bydan\contabilidad\facturacion\impuesto\business\entity\impuesto;
use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_util;
use com\bydan\contabilidad\facturacion\otro_impuesto\business\entity\otro_impuesto;
use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_util;
use com\bydan\contabilidad\inventario\categoria_producto\business\entity\categoria_producto;
use com\bydan\contabilidad\inventario\categoria_producto\util\categoria_producto_util;
use com\bydan\contabilidad\inventario\sub_categoria_producto\business\entity\sub_categoria_producto;
use com\bydan\contabilidad\inventario\sub_categoria_producto\util\sub_categoria_producto_util;
use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;
use com\bydan\contabilidad\inventario\unidad\business\entity\unidad;
use com\bydan\contabilidad\inventario\unidad\util\unidad_util;
use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;
use com\bydan\contabilidad\facturacion\retencion\business\entity\retencion;
use com\bydan\contabilidad\facturacion\retencion\util\retencion_util;

//REL

use com\bydan\contabilidad\inventario\lista_precio\business\entity\lista_precio;
use com\bydan\contabilidad\inventario\lista_precio\util\lista_precio_util;
use com\bydan\contabilidad\inventario\producto_bodega\business\entity\producto_bodega;
use com\bydan\contabilidad\inventario\producto_bodega\util\producto_bodega_util;
use com\bydan\contabilidad\inventario\otro_suplidor\business\entity\otro_suplidor;
use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_util;
use com\bydan\contabilidad\inventario\lista_cliente\business\entity\lista_cliente;
use com\bydan\contabilidad\inventario\lista_cliente\util\lista_cliente_util;
use com\bydan\contabilidad\inventario\imagen_producto\business\entity\imagen_producto;
use com\bydan\contabilidad\inventario\imagen_producto\util\imagen_producto_util;
use com\bydan\contabilidad\inventario\lista_producto\business\entity\lista_producto;
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_util;

class producto_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='producto';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='inventario.productos';
	/*'Mantenimientoproducto.jsf';*/
	public static string $STR_MODULO_OPCION='inventario';
	public static string $STR_NOMBRE_CLASE='Mantenimientoproducto.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='productoPersistenceName';
	/*.producto_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='producto_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='producto_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='producto_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Productos';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='s';
	public static string $STR_CLASS_WEB_TITULO='Producto';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $INVENTARIO='inventario';
	public static string $STR_PREFIJO_TABLE='inv_';
	public static string $STR_TABLE_NAME='producto';
	public static string $PRODUCTO='inv_producto';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.producto';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.costo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.activo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_tipo_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cantidad_inicial,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_impuesto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_otro_impuesto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.impuesto_ventas,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.otro_impuesto_ventas,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.impuesto_compras,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.otro_impuesto_compras,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_categoria_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_sub_categoria_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_bodega_defecto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_unidad_compra,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.equivalencia_compra,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_unidad_venta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.equivalencia_venta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.imagen,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.observacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.comenta_factura,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo_fabricante,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cantidad,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cantidad_minima,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cantidad_maxima,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.factura_sin_stock,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.mostrar_componente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.producto_equivalente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.avisa_expiracion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.requiere_serie,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.acepta_lote,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta_venta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta_compra,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta_costo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.valor_inventario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.producto_fisico,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.ultima_venta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.precio_actualizado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_retencion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.retencion_ventas,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.retencion_compras,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.factura_con_precio from '.producto_util::$SCHEMA.'.'.producto_util::$TABLENAME;*/
	
	/*PARAMETROS
	AUDITORIA*/
	public static bool $BIT_CON_AUDITORIA=false;	
	public static bool $BIT_CON_AUDITORIA_DETALLE=true;	
	
	/*WEB PAGINA FORMULARIO*/
	public static bool $CON_PAGINA_FORM=true;		
	
	/*GLOBAL*/
	public static string $ID='id';
	public static string $VERSIONROW='updated_at';
	
	/*AUXILIAR*/
	//public $productoConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_EMPRESA='id_empresa';
    public static string $ID_PROVEEDOR='id_proveedor';
    public static string $CODIGO='codigo';
    public static string $NOMBRE='nombre';
    public static string $COSTO='costo';
    public static string $ACTIVO='activo';
    public static string $ID_TIPO_PRODUCTO='id_tipo_producto';
    public static string $CANTIDAD_INICIAL='cantidad_inicial';
    public static string $ID_IMPUESTO='id_impuesto';
    public static string $ID_OTRO_IMPUESTO='id_otro_impuesto';
    public static string $IMPUESTO_VENTAS='impuesto_ventas';
    public static string $OTRO_IMPUESTO_VENTAS='otro_impuesto_ventas';
    public static string $IMPUESTO_COMPRAS='impuesto_compras';
    public static string $OTRO_IMPUESTO_COMPRAS='otro_impuesto_compras';
    public static string $ID_CATEGORIA_PRODUCTO='id_categoria_producto';
    public static string $ID_SUB_CATEGORIA_PRODUCTO='id_sub_categoria_producto';
    public static string $ID_BODEGA_DEFECTO='id_bodega_defecto';
    public static string $ID_UNIDAD_COMPRA='id_unidad_compra';
    public static string $EQUIVALENCIA_COMPRA='equivalencia_compra';
    public static string $ID_UNIDAD_VENTA='id_unidad_venta';
    public static string $EQUIVALENCIA_VENTA='equivalencia_venta';
    public static string $DESCRIPCION='descripcion';
    public static string $IMAGEN='imagen';
    public static string $OBSERVACION='observacion';
    public static string $COMENTA_FACTURA='comenta_factura';
    public static string $CODIGO_FABRICANTE='codigo_fabricante';
    public static string $CANTIDAD='cantidad';
    public static string $CANTIDAD_MINIMA='cantidad_minima';
    public static string $CANTIDAD_MAXIMA='cantidad_maxima';
    public static string $FACTURA_SIN_STOCK='factura_sin_stock';
    public static string $MOSTRAR_COMPONENTE='mostrar_componente';
    public static string $PRODUCTO_EQUIVALENTE='producto_equivalente';
    public static string $AVISA_EXPIRACION='avisa_expiracion';
    public static string $REQUIERE_SERIE='requiere_serie';
    public static string $ACEPTA_LOTE='acepta_lote';
    public static string $ID_CUENTA_VENTA='id_cuenta_venta';
    public static string $ID_CUENTA_COMPRA='id_cuenta_compra';
    public static string $ID_CUENTA_COSTO='id_cuenta_costo';
    public static string $VALOR_INVENTARIO='valor_inventario';
    public static string $PRODUCTO_FISICO='producto_fisico';
    public static string $ULTIMA_VENTA='ultima_venta';
    public static string $PRECIO_ACTUALIZADO='precio_actualizado';
    public static string $ID_RETENCION='id_retencion';
    public static string $RETENCION_VENTAS='retencion_ventas';
    public static string $RETENCION_COMPRAS='retencion_compras';
    public static string $FACTURA_CON_PRECIO='factura_con_precio';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_EMPRESA='Empresa';
    public static string $LABEL_ID_PROVEEDOR=' Proveedores';
    public static string $LABEL_CODIGO='Codigo';
    public static string $LABEL_NOMBRE='Nombre';
    public static string $LABEL_COSTO='Costo';
    public static string $LABEL_ACTIVO='Activo';
    public static string $LABEL_ID_TIPO_PRODUCTO='Tipo Producto';
    public static string $LABEL_CANTIDAD_INICIAL='Cantidad Inicial';
    public static string $LABEL_ID_IMPUESTO='Impuesto';
    public static string $LABEL_ID_OTRO_IMPUESTO='Otro Impuesto';
    public static string $LABEL_IMPUESTO_VENTAS='Impuesto En Ventas';
    public static string $LABEL_OTRO_IMPUESTO_VENTAS='Otro Impuesto Ventas';
    public static string $LABEL_IMPUESTO_COMPRAS='Impuesto En Compras';
    public static string $LABEL_OTRO_IMPUESTO_COMPRAS='Otro Impuesto Compras';
    public static string $LABEL_ID_CATEGORIA_PRODUCTO='Categoria Producto';
    public static string $LABEL_ID_SUB_CATEGORIA_PRODUCTO='Sub Categoria Producto';
    public static string $LABEL_ID_BODEGA_DEFECTO='Bodega Defecto';
    public static string $LABEL_ID_UNIDAD_COMPRA='Unidad Compra';
    public static string $LABEL_EQUIVALENCIA_COMPRA='Equivalencia En Compra';
    public static string $LABEL_ID_UNIDAD_VENTA='Unidad Venta';
    public static string $LABEL_EQUIVALENCIA_VENTA='Equivalencia En Venta';
    public static string $LABEL_DESCRIPCION='Descripcion';
    public static string $LABEL_IMAGEN='Imagen';
    public static string $LABEL_OBSERVACION='Observacion';
    public static string $LABEL_COMENTA_FACTURA='Comenta Factura';
    public static string $LABEL_CODIGO_FABRICANTE='Codigo Fabricante';
    public static string $LABEL_CANTIDAD='Cantidad';
    public static string $LABEL_CANTIDAD_MINIMA='Cantidad Minima';
    public static string $LABEL_CANTIDAD_MAXIMA='Cantidad Maxima';
    public static string $LABEL_FACTURA_SIN_STOCK='Factura Sin Stock';
    public static string $LABEL_MOSTRAR_COMPONENTE='Mostrar Componente';
    public static string $LABEL_PRODUCTO_EQUIVALENTE='Producto Equivalente';
    public static string $LABEL_AVISA_EXPIRACION='Avisa Expiracion';
    public static string $LABEL_REQUIERE_SERIE='Requiere No Serie';
    public static string $LABEL_ACEPTA_LOTE='Acepta Lote';
    public static string $LABEL_ID_CUENTA_VENTA='Cuenta Venta/Ingresos';
    public static string $LABEL_ID_CUENTA_COMPRA='Cuenta Compra/Activo/Inventario';
    public static string $LABEL_ID_CUENTA_COSTO='Cuenta Costo';
    public static string $LABEL_VALOR_INVENTARIO='Valor Inventario';
    public static string $LABEL_PRODUCTO_FISICO='Producto Fisico';
    public static string $LABEL_ULTIMA_VENTA='Ultima Venta';
    public static string $LABEL_PRECIO_ACTUALIZADO='Precio Actualizado';
    public static string $LABEL_ID_RETENCION='Retencione';
    public static string $LABEL_RETENCION_VENTAS='Retencion Ventas';
    public static string $LABEL_RETENCION_COMPRAS='Retencion Compras';
    public static string $LABEL_FACTURA_CON_PRECIO='Factura Con Precio';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->productoConstantesFuncionesAdditional=new $productoConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $productos,int $iIdNuevoproducto) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($productos as $productoAux) {
			if($productoAux->getId()==$iIdNuevoproducto) {
				$existe=true;
				break;
			}
				
			$iIndice++;
		}

		if(!$existe) {
			/*SI NO EXISTE TOMA LA ULTIMA FILA*/
			$iIndice=$iIndice-1;
		}
		
		return $iIndice;
	}
	
	public static function getIndiceActual(array $productos,producto $producto,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($productos as $productoAux) {
			if($productoAux->getId()==$producto->getId()) {
				$existe=true;
				break;
			}
				
			$iIndice++;
		}		
	
		if(!$existe) {
			/*SI NO EXISTE TOMA LA ULTIMA FILA*/
			$iIndice=$iIndiceActual;
		}
		
		return $iIndice;
	}
	
	/*DESCRIPCION*/
	public static function getproductoDescripcion(?producto $producto) : string {//producto NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($producto !=null) {
			/*&& producto->getId()!=0*/
			
			$sDescripcion=($producto->getcodigo());
			
			/*producto;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setproductoDescripcion(?producto $producto,string $sValor) {			
		if($producto !=null) {
			$producto->setcodigo($sValor);;
			/*producto;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $productos) : array {
		$productosForeignKey=array();
		
		foreach ($productos as $productoLocal) {
			$productosForeignKey[$productoLocal->getId()]=producto_util::getproductoDescripcion($productoLocal);
		}
			
		return $productosForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_empresa() : string  { return 'Empresa'; }
    public static function getColumnLabelid_proveedor() : string  { return ' Proveedores'; }
    public static function getColumnLabelcodigo() : string  { return 'Codigo'; }
    public static function getColumnLabelnombre() : string  { return 'Nombre'; }
    public static function getColumnLabelcosto() : string  { return 'Costo'; }
    public static function getColumnLabelactivo() : string  { return 'Activo'; }
    public static function getColumnLabelid_tipo_producto() : string  { return 'Tipo Producto'; }
    public static function getColumnLabelcantidad_inicial() : string  { return 'Cantidad Inicial'; }
    public static function getColumnLabelid_impuesto() : string  { return 'Impuesto'; }
    public static function getColumnLabelid_otro_impuesto() : string  { return 'Otro Impuesto'; }
    public static function getColumnLabelimpuesto_ventas() : string  { return 'Impuesto En Ventas'; }
    public static function getColumnLabelotro_impuesto_ventas() : string  { return 'Otro Impuesto Ventas'; }
    public static function getColumnLabelimpuesto_compras() : string  { return 'Impuesto En Compras'; }
    public static function getColumnLabelotro_impuesto_compras() : string  { return 'Otro Impuesto Compras'; }
    public static function getColumnLabelid_categoria_producto() : string  { return 'Categoria Producto'; }
    public static function getColumnLabelid_sub_categoria_producto() : string  { return 'Sub Categoria Producto'; }
    public static function getColumnLabelid_bodega_defecto() : string  { return 'Bodega Defecto'; }
    public static function getColumnLabelid_unidad_compra() : string  { return 'Unidad Compra'; }
    public static function getColumnLabelequivalencia_compra() : string  { return 'Equivalencia En Compra'; }
    public static function getColumnLabelid_unidad_venta() : string  { return 'Unidad Venta'; }
    public static function getColumnLabelequivalencia_venta() : string  { return 'Equivalencia En Venta'; }
    public static function getColumnLabeldescripcion() : string  { return 'Descripcion'; }
    public static function getColumnLabelimagen() : string  { return 'Imagen'; }
    public static function getColumnLabelobservacion() : string  { return 'Observacion'; }
    public static function getColumnLabelcomenta_factura() : string  { return 'Comenta Factura'; }
    public static function getColumnLabelcodigo_fabricante() : string  { return 'Codigo Fabricante'; }
    public static function getColumnLabelcantidad() : string  { return 'Cantidad'; }
    public static function getColumnLabelcantidad_minima() : string  { return 'Cantidad Minima'; }
    public static function getColumnLabelcantidad_maxima() : string  { return 'Cantidad Maxima'; }
    public static function getColumnLabelfactura_sin_stock() : string  { return 'Factura Sin Stock'; }
    public static function getColumnLabelmostrar_componente() : string  { return 'Mostrar Componente'; }
    public static function getColumnLabelproducto_equivalente() : string  { return 'Producto Equivalente'; }
    public static function getColumnLabelavisa_expiracion() : string  { return 'Avisa Expiracion'; }
    public static function getColumnLabelrequiere_serie() : string  { return 'Requiere No Serie'; }
    public static function getColumnLabelacepta_lote() : string  { return 'Acepta Lote'; }
    public static function getColumnLabelid_cuenta_venta() : string  { return 'Cuenta Venta/Ingresos'; }
    public static function getColumnLabelid_cuenta_compra() : string  { return 'Cuenta Compra/Activo/Inventario'; }
    public static function getColumnLabelid_cuenta_costo() : string  { return 'Cuenta Costo'; }
    public static function getColumnLabelvalor_inventario() : string  { return 'Valor Inventario'; }
    public static function getColumnLabelproducto_fisico() : string  { return 'Producto Fisico'; }
    public static function getColumnLabelultima_venta() : string  { return 'Ultima Venta'; }
    public static function getColumnLabelprecio_actualizado() : string  { return 'Precio Actualizado'; }
    public static function getColumnLabelid_retencion() : string  { return 'Retencione'; }
    public static function getColumnLabelretencion_ventas() : string  { return 'Retencion Ventas'; }
    public static function getColumnLabelretencion_compras() : string  { return 'Retencion Compras'; }
    public static function getColumnLabelfactura_con_precio() : string  { return 'Factura Con Precio'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
		
	public static function getactivoDescripcion($producto) {
		$sDescripcion='Verdadero';
		if(!$producto->getactivo()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getimpuesto_ventasDescripcion($producto) {
		$sDescripcion='Verdadero';
		if(!$producto->getimpuesto_ventas()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getotro_impuesto_ventasDescripcion($producto) {
		$sDescripcion='Verdadero';
		if(!$producto->getotro_impuesto_ventas()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getimpuesto_comprasDescripcion($producto) {
		$sDescripcion='Verdadero';
		if(!$producto->getimpuesto_compras()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getotro_impuesto_comprasDescripcion($producto) {
		$sDescripcion='Verdadero';
		if(!$producto->getotro_impuesto_compras()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getcomenta_facturaDescripcion($producto) {
		$sDescripcion='Verdadero';
		if(!$producto->getcomenta_factura()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getfactura_sin_stockDescripcion($producto) {
		$sDescripcion='Verdadero';
		if(!$producto->getfactura_sin_stock()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getmostrar_componenteDescripcion($producto) {
		$sDescripcion='Verdadero';
		if(!$producto->getmostrar_componente()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getproducto_equivalenteDescripcion($producto) {
		$sDescripcion='Verdadero';
		if(!$producto->getproducto_equivalente()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getavisa_expiracionDescripcion($producto) {
		$sDescripcion='Verdadero';
		if(!$producto->getavisa_expiracion()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getrequiere_serieDescripcion($producto) {
		$sDescripcion='Verdadero';
		if(!$producto->getrequiere_serie()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getacepta_loteDescripcion($producto) {
		$sDescripcion='Verdadero';
		if(!$producto->getacepta_lote()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getretencion_ventasDescripcion($producto) {
		$sDescripcion='Verdadero';
		if(!$producto->getretencion_ventas()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getretencion_comprasDescripcion($producto) {
		$sDescripcion='Verdadero';
		if(!$producto->getretencion_compras()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $productos) {		
		try {
			
			$producto = new producto();
			
			foreach($productos as $producto) {
				
				$producto->setid_empresa_Descripcion(producto_util::getempresaDescripcion($producto->getempresa()));
				$producto->setid_proveedor_Descripcion(producto_util::getproveedorDescripcion($producto->getproveedor()));
				$producto->setid_tipo_producto_Descripcion(producto_util::gettipo_productoDescripcion($producto->gettipo_producto()));
				$producto->setid_impuesto_Descripcion(producto_util::getimpuestoDescripcion($producto->getimpuesto()));
				$producto->setid_otro_impuesto_Descripcion(producto_util::getotro_impuestoDescripcion($producto->getotro_impuesto()));
				$producto->setid_categoria_producto_Descripcion(producto_util::getcategoria_productoDescripcion($producto->getcategoria_producto()));
				$producto->setid_sub_categoria_producto_Descripcion(producto_util::getsub_categoria_productoDescripcion($producto->getsub_categoria_producto()));
				$producto->setid_bodega_defecto_Descripcion(producto_util::getbodega_defectoDescripcion($producto->getbodega_defecto()));
				$producto->setid_unidad_compra_Descripcion(producto_util::getunidad_compraDescripcion($producto->getunidad_compra()));
				$producto->setid_unidad_venta_Descripcion(producto_util::getunidad_ventaDescripcion($producto->getunidad_venta()));
				$producto->setid_cuenta_venta_Descripcion(producto_util::getcuenta_ventaDescripcion($producto->getcuenta_venta()));
				$producto->setid_cuenta_compra_Descripcion(producto_util::getcuenta_compraDescripcion($producto->getcuenta_compra()));
				$producto->setid_cuenta_costo_Descripcion(producto_util::getcuenta_costoDescripcion($producto->getcuenta_costo()));
				$producto->setid_retencion_Descripcion(producto_util::getretencionDescripcion($producto->getretencion()));
			}
			
			if($producto!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(producto $producto) {		
		try {
			
			
				$producto->setid_empresa_Descripcion(producto_util::getempresaDescripcion($producto->getempresa()));
				$producto->setid_proveedor_Descripcion(producto_util::getproveedorDescripcion($producto->getproveedor()));
				$producto->setid_tipo_producto_Descripcion(producto_util::gettipo_productoDescripcion($producto->gettipo_producto()));
				$producto->setid_impuesto_Descripcion(producto_util::getimpuestoDescripcion($producto->getimpuesto()));
				$producto->setid_otro_impuesto_Descripcion(producto_util::getotro_impuestoDescripcion($producto->getotro_impuesto()));
				$producto->setid_categoria_producto_Descripcion(producto_util::getcategoria_productoDescripcion($producto->getcategoria_producto()));
				$producto->setid_sub_categoria_producto_Descripcion(producto_util::getsub_categoria_productoDescripcion($producto->getsub_categoria_producto()));
				$producto->setid_bodega_defecto_Descripcion(producto_util::getbodega_defectoDescripcion($producto->getbodega_defecto()));
				$producto->setid_unidad_compra_Descripcion(producto_util::getunidad_compraDescripcion($producto->getunidad_compra()));
				$producto->setid_unidad_venta_Descripcion(producto_util::getunidad_ventaDescripcion($producto->getunidad_venta()));
				$producto->setid_cuenta_venta_Descripcion(producto_util::getcuenta_ventaDescripcion($producto->getcuenta_venta()));
				$producto->setid_cuenta_compra_Descripcion(producto_util::getcuenta_compraDescripcion($producto->getcuenta_compra()));
				$producto->setid_cuenta_costo_Descripcion(producto_util::getcuenta_costoDescripcion($producto->getcuenta_costo()));
				$producto->setid_retencion_Descripcion(producto_util::getretencionDescripcion($producto->getretencion()));
							
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}		 
	
	/*FKs LISTA*/
			
	
	/*INDICES LABEL*/
	
	public static function getNombreIndice(string $sNombreIndice) : string {
		if($sNombreIndice=='Todos') {
			$sNombreIndice='Tipo=Todos';
		} else if($sNombreIndice=='PorId') {
			$sNombreIndice='Tipo=Por Id';
		} else if($sNombreIndice=='FK_Idbodega') {
			$sNombreIndice='Tipo=  Por Bodega Defecto';
		} else if($sNombreIndice=='FK_Idcategoria_producto') {
			$sNombreIndice='Tipo=  Por Categoria Producto';
		} else if($sNombreIndice=='FK_Idcuenta_compra') {
			$sNombreIndice='Tipo=  Por Cuenta Compra/Activo/Inventario';
		} else if($sNombreIndice=='FK_Idcuenta_inventario') {
			$sNombreIndice='Tipo=  Por Cuenta Costo';
		} else if($sNombreIndice=='FK_Idcuenta_venta') {
			$sNombreIndice='Tipo=  Por Cuenta Venta/Ingresos';
		} else if($sNombreIndice=='FK_Idempresa') {
			$sNombreIndice='Tipo=  Por Empresa';
		} else if($sNombreIndice=='FK_Idimpuesto') {
			$sNombreIndice='Tipo=  Por Impuesto';
		} else if($sNombreIndice=='FK_Idotro_impuesto') {
			$sNombreIndice='Tipo=  Por Otro Impuesto';
		} else if($sNombreIndice=='FK_Idproveedor') {
			$sNombreIndice='Tipo=  Por  Proveedores';
		} else if($sNombreIndice=='FK_Idretencion') {
			$sNombreIndice='Tipo=  Por Retencione';
		} else if($sNombreIndice=='FK_Idsub_categoria_producto') {
			$sNombreIndice='Tipo=  Por Sub Categoria Producto';
		} else if($sNombreIndice=='FK_Idtipo_producto') {
			$sNombreIndice='Tipo=  Por Tipo Producto';
		} else if($sNombreIndice=='FK_Idunidad_compra') {
			$sNombreIndice='Tipo=  Por Unidad Compra';
		} else if($sNombreIndice=='FK_Idunidad_venta') {
			$sNombreIndice='Tipo=  Por Unidad Venta';
		}

		return $sNombreIndice;
	}
	
	/*INDICES PARAMETROS LABEL*/
	

	public static function getDetalleIndicePorId(int $id) : string 
	{
		return 'Parámetros -> Porid='.$id;
	}

	public static function getDetalleIndiceFK_Idbodega(int $id_bodega_defecto) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Bodega Defecto='+$id_bodega_defecto; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idcategoria_producto(int $id_categoria_producto) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Categoria Producto='+$id_categoria_producto; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idcuenta_compra(?int $id_cuenta_compra) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Cuenta Compra/Activo/Inventario='+$id_cuenta_compra; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idcuenta_inventario(?int $id_cuenta_costo) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Cuenta Costo='+$id_cuenta_costo; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idcuenta_venta(?int $id_cuenta_venta) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Cuenta Venta/Ingresos='+$id_cuenta_venta; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idempresa(int $id_empresa) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Empresa='+$id_empresa; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idimpuesto(int $id_impuesto) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Impuesto='+$id_impuesto; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idotro_impuesto(?int $id_otro_impuesto) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Otro Impuesto='+$id_otro_impuesto; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idproveedor(int $id_proveedor) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Proveedores='+$id_proveedor; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idretencion(?int $id_retencion) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Retencione='+$id_retencion; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idsub_categoria_producto(int $id_sub_categoria_producto) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Sub Categoria Producto='+$id_sub_categoria_producto; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idtipo_producto(int $id_tipo_producto) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Tipo Producto='+$id_tipo_producto; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idunidad_compra(int $id_unidad_compra) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Unidad Compra='+$id_unidad_compra; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idunidad_venta(int $id_unidad_venta) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Unidad Venta='+$id_unidad_venta; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return producto_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return producto_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_ID_EMPRESA);
			$reporte->setsDescripcion(producto_util::$LABEL_ID_EMPRESA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_ID_PROVEEDOR);
			$reporte->setsDescripcion(producto_util::$LABEL_ID_PROVEEDOR.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_CODIGO);
			$reporte->setsDescripcion(producto_util::$LABEL_CODIGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_NOMBRE);
			$reporte->setsDescripcion(producto_util::$LABEL_NOMBRE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_COSTO);
			$reporte->setsDescripcion(producto_util::$LABEL_COSTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_ACTIVO);
			$reporte->setsDescripcion(producto_util::$LABEL_ACTIVO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_ID_TIPO_PRODUCTO);
			$reporte->setsDescripcion(producto_util::$LABEL_ID_TIPO_PRODUCTO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_CANTIDAD_INICIAL);
			$reporte->setsDescripcion(producto_util::$LABEL_CANTIDAD_INICIAL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_ID_IMPUESTO);
			$reporte->setsDescripcion(producto_util::$LABEL_ID_IMPUESTO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_ID_OTRO_IMPUESTO);
			$reporte->setsDescripcion(producto_util::$LABEL_ID_OTRO_IMPUESTO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_IMPUESTO_VENTAS);
			$reporte->setsDescripcion(producto_util::$LABEL_IMPUESTO_VENTAS);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_OTRO_IMPUESTO_VENTAS);
			$reporte->setsDescripcion(producto_util::$LABEL_OTRO_IMPUESTO_VENTAS);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_IMPUESTO_COMPRAS);
			$reporte->setsDescripcion(producto_util::$LABEL_IMPUESTO_COMPRAS);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_OTRO_IMPUESTO_COMPRAS);
			$reporte->setsDescripcion(producto_util::$LABEL_OTRO_IMPUESTO_COMPRAS);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_ID_CATEGORIA_PRODUCTO);
			$reporte->setsDescripcion(producto_util::$LABEL_ID_CATEGORIA_PRODUCTO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_ID_SUB_CATEGORIA_PRODUCTO);
			$reporte->setsDescripcion(producto_util::$LABEL_ID_SUB_CATEGORIA_PRODUCTO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_ID_BODEGA_DEFECTO);
			$reporte->setsDescripcion(producto_util::$LABEL_ID_BODEGA_DEFECTO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_ID_UNIDAD_COMPRA);
			$reporte->setsDescripcion(producto_util::$LABEL_ID_UNIDAD_COMPRA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_EQUIVALENCIA_COMPRA);
			$reporte->setsDescripcion(producto_util::$LABEL_EQUIVALENCIA_COMPRA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_ID_UNIDAD_VENTA);
			$reporte->setsDescripcion(producto_util::$LABEL_ID_UNIDAD_VENTA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_EQUIVALENCIA_VENTA);
			$reporte->setsDescripcion(producto_util::$LABEL_EQUIVALENCIA_VENTA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_DESCRIPCION);
			$reporte->setsDescripcion(producto_util::$LABEL_DESCRIPCION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_IMAGEN);
			$reporte->setsDescripcion(producto_util::$LABEL_IMAGEN);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_OBSERVACION);
			$reporte->setsDescripcion(producto_util::$LABEL_OBSERVACION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_COMENTA_FACTURA);
			$reporte->setsDescripcion(producto_util::$LABEL_COMENTA_FACTURA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_CODIGO_FABRICANTE);
			$reporte->setsDescripcion(producto_util::$LABEL_CODIGO_FABRICANTE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_CANTIDAD);
			$reporte->setsDescripcion(producto_util::$LABEL_CANTIDAD);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_CANTIDAD_MINIMA);
			$reporte->setsDescripcion(producto_util::$LABEL_CANTIDAD_MINIMA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_CANTIDAD_MAXIMA);
			$reporte->setsDescripcion(producto_util::$LABEL_CANTIDAD_MAXIMA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_FACTURA_SIN_STOCK);
			$reporte->setsDescripcion(producto_util::$LABEL_FACTURA_SIN_STOCK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_MOSTRAR_COMPONENTE);
			$reporte->setsDescripcion(producto_util::$LABEL_MOSTRAR_COMPONENTE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_PRODUCTO_EQUIVALENTE);
			$reporte->setsDescripcion(producto_util::$LABEL_PRODUCTO_EQUIVALENTE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_AVISA_EXPIRACION);
			$reporte->setsDescripcion(producto_util::$LABEL_AVISA_EXPIRACION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_REQUIERE_SERIE);
			$reporte->setsDescripcion(producto_util::$LABEL_REQUIERE_SERIE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_ACEPTA_LOTE);
			$reporte->setsDescripcion(producto_util::$LABEL_ACEPTA_LOTE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_ID_CUENTA_VENTA);
			$reporte->setsDescripcion(producto_util::$LABEL_ID_CUENTA_VENTA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_ID_CUENTA_COMPRA);
			$reporte->setsDescripcion(producto_util::$LABEL_ID_CUENTA_COMPRA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_ID_CUENTA_COSTO);
			$reporte->setsDescripcion(producto_util::$LABEL_ID_CUENTA_COSTO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_VALOR_INVENTARIO);
			$reporte->setsDescripcion(producto_util::$LABEL_VALOR_INVENTARIO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_PRODUCTO_FISICO);
			$reporte->setsDescripcion(producto_util::$LABEL_PRODUCTO_FISICO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFechaColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_ULTIMA_VENTA);
			$reporte->setsDescripcion(producto_util::$LABEL_ULTIMA_VENTA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFechaColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_PRECIO_ACTUALIZADO);
			$reporte->setsDescripcion(producto_util::$LABEL_PRECIO_ACTUALIZADO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_ID_RETENCION);
			$reporte->setsDescripcion(producto_util::$LABEL_ID_RETENCION.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_RETENCION_VENTAS);
			$reporte->setsDescripcion(producto_util::$LABEL_RETENCION_VENTAS);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_RETENCION_COMPRAS);
			$reporte->setsDescripcion(producto_util::$LABEL_RETENCION_COMPRAS);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_util::$LABEL_FACTURA_CON_PRECIO);
			$reporte->setsDescripcion(producto_util::$LABEL_FACTURA_CON_PRECIO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=producto_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
		return $arrColumnasGlobales;
	}		
	
	public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array {
		$arrColumnasGlobales=array();
		//$noExiste=false;
		
		

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==producto_util::$ID_EMPRESA) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=producto_util::$ID_EMPRESA;
		}
		
		return $arrColumnasGlobales;
	}
	
	public static function getArrayColumnasGlobalesNo(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		
		
		return $arrColumnasGlobales;
	}
	
	/*DEEP CLASSES*/
	public static function getClassesFKsOf(array $classesP,string $deepLoadType) : array {
		try {
			$classes=array();	
			
			if($deepLoadType==DeepLoadType::$NONE) {
				
				$classes[]=new Classe(empresa::$class);
				$classes[]=new Classe(proveedor::$class);
				$classes[]=new Classe(tipo_producto::$class);
				$classes[]=new Classe(impuesto::$class);
				$classes[]=new Classe(otro_impuesto::$class);
				$classes[]=new Classe(categoria_producto::$class);
				$classes[]=new Classe(sub_categoria_producto::$class);
				$classes[]=new Classe(bodega::$class);
				$classes[]=new Classe(unidad::$class);
				$classes[]=new Classe(unidad::$class);
				$classes[]=new Classe(cuenta::$class);
				$classes[]=new Classe(cuenta::$class);
				$classes[]=new Classe(cuenta::$class);
				$classes[]=new Classe(retencion::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==proveedor::$class) {
						$classes[]=new Classe(proveedor::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==tipo_producto::$class) {
						$classes[]=new Classe(tipo_producto::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==impuesto::$class) {
						$classes[]=new Classe(impuesto::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==otro_impuesto::$class) {
						$classes[]=new Classe(otro_impuesto::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==categoria_producto::$class) {
						$classes[]=new Classe(categoria_producto::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==sub_categoria_producto::$class) {
						$classes[]=new Classe(sub_categoria_producto::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==bodega::$class) {
						$classes[]=new Classe(bodega::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==unidad::$class) {
						$classes[]=new Classe(unidad::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==unidad::$class) {
						$classes[]=new Classe(unidad::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==cuenta::$class) {
						$classes[]=new Classe(cuenta::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==cuenta::$class) {
						$classes[]=new Classe(cuenta::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==cuenta::$class) {
						$classes[]=new Classe(cuenta::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==retencion::$class) {
						$classes[]=new Classe(retencion::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==empresa::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(empresa::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==proveedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(proveedor::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==tipo_producto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(tipo_producto::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==impuesto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(impuesto::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==otro_impuesto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(otro_impuesto::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==categoria_producto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(categoria_producto::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==sub_categoria_producto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(sub_categoria_producto::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==bodega::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(bodega::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==unidad::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(unidad::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==unidad::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(unidad::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==cuenta::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==cuenta::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==cuenta::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==retencion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(retencion::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	public static function getClassesRelsOf(array $classesP,string $deepLoadType) : array {
		try {
			$classes=array();			
			
			if($deepLoadType==DeepLoadType::$NONE) {
				
				$classes[]=new Classe(lista_precio::$class);
				$classes[]=new Classe(producto_bodega::$class);
				$classes[]=new Classe(otro_suplidor::$class);
				$classes[]=new Classe(lista_cliente::$class);
				$classes[]=new Classe(bodega::$class);
				$classes[]=new Classe(imagen_producto::$class);
				$classes[]=new Classe(lista_producto::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==lista_precio::$class) {
						$classes[]=new Classe(lista_precio::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==producto_bodega::$class) {
						$classes[]=new Classe(producto_bodega::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==otro_suplidor::$class) {
						$classes[]=new Classe(otro_suplidor::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==lista_cliente::$class) {
						$classes[]=new Classe(lista_cliente::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==bodega::$class) {
						$classes[]=new Classe(bodega::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==imagen_producto::$class) {
						$classes[]=new Classe(imagen_producto::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==lista_producto::$class) {
						$classes[]=new Classe(lista_producto::$class); break;
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==lista_precio::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(lista_precio::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==producto_bodega::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(producto_bodega::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==otro_suplidor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(otro_suplidor::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==lista_cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(lista_cliente::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==bodega::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(bodega::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==imagen_producto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(imagen_producto::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==lista_producto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(lista_producto::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	/*ORDER*/
	public static function getOrderByLista() : array {
		$arrOrderBy=array();
		$orderBy=new OrderBy();
		
		
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_ID, producto_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_ID_EMPRESA, producto_util::$ID_EMPRESA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_ID_PROVEEDOR, producto_util::$ID_PROVEEDOR,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_CODIGO, producto_util::$CODIGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_NOMBRE, producto_util::$NOMBRE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_COSTO, producto_util::$COSTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_ACTIVO, producto_util::$ACTIVO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_ID_TIPO_PRODUCTO, producto_util::$ID_TIPO_PRODUCTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_CANTIDAD_INICIAL, producto_util::$CANTIDAD_INICIAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_ID_IMPUESTO, producto_util::$ID_IMPUESTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_ID_OTRO_IMPUESTO, producto_util::$ID_OTRO_IMPUESTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_IMPUESTO_VENTAS, producto_util::$IMPUESTO_VENTAS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_OTRO_IMPUESTO_VENTAS, producto_util::$OTRO_IMPUESTO_VENTAS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_IMPUESTO_COMPRAS, producto_util::$IMPUESTO_COMPRAS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_OTRO_IMPUESTO_COMPRAS, producto_util::$OTRO_IMPUESTO_COMPRAS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_ID_CATEGORIA_PRODUCTO, producto_util::$ID_CATEGORIA_PRODUCTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_ID_SUB_CATEGORIA_PRODUCTO, producto_util::$ID_SUB_CATEGORIA_PRODUCTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_ID_BODEGA_DEFECTO, producto_util::$ID_BODEGA_DEFECTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_ID_UNIDAD_COMPRA, producto_util::$ID_UNIDAD_COMPRA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_EQUIVALENCIA_COMPRA, producto_util::$EQUIVALENCIA_COMPRA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_ID_UNIDAD_VENTA, producto_util::$ID_UNIDAD_VENTA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_EQUIVALENCIA_VENTA, producto_util::$EQUIVALENCIA_VENTA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_DESCRIPCION, producto_util::$DESCRIPCION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_IMAGEN, producto_util::$IMAGEN,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_OBSERVACION, producto_util::$OBSERVACION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_COMENTA_FACTURA, producto_util::$COMENTA_FACTURA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_CODIGO_FABRICANTE, producto_util::$CODIGO_FABRICANTE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_CANTIDAD, producto_util::$CANTIDAD,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_CANTIDAD_MINIMA, producto_util::$CANTIDAD_MINIMA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_CANTIDAD_MAXIMA, producto_util::$CANTIDAD_MAXIMA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_FACTURA_SIN_STOCK, producto_util::$FACTURA_SIN_STOCK,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_MOSTRAR_COMPONENTE, producto_util::$MOSTRAR_COMPONENTE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_PRODUCTO_EQUIVALENTE, producto_util::$PRODUCTO_EQUIVALENTE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_AVISA_EXPIRACION, producto_util::$AVISA_EXPIRACION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_REQUIERE_SERIE, producto_util::$REQUIERE_SERIE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_ACEPTA_LOTE, producto_util::$ACEPTA_LOTE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_ID_CUENTA_VENTA, producto_util::$ID_CUENTA_VENTA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_ID_CUENTA_COMPRA, producto_util::$ID_CUENTA_COMPRA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_ID_CUENTA_COSTO, producto_util::$ID_CUENTA_COSTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_VALOR_INVENTARIO, producto_util::$VALOR_INVENTARIO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_PRODUCTO_FISICO, producto_util::$PRODUCTO_FISICO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_ULTIMA_VENTA, producto_util::$ULTIMA_VENTA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_PRECIO_ACTUALIZADO, producto_util::$PRECIO_ACTUALIZADO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_ID_RETENCION, producto_util::$ID_RETENCION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_RETENCION_VENTAS, producto_util::$RETENCION_VENTAS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_RETENCION_COMPRAS, producto_util::$RETENCION_COMPRAS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$LABEL_FACTURA_CON_PRECIO, producto_util::$FACTURA_CON_PRECIO,false,""); $arrOrderBy[]=$orderBy;
		
		$arrOrderBy = OrderBy::ActualizarInformacion($arrOrderBy);
		
		return $arrOrderBy;
	}
	
	public static function getOrderByListaRel() : array {
		$arrOrderBy=array();
		$orderBy=new OrderBy();
		
		
		$orderBy=OrderBy::NewOrderBy(false,lista_precio_util::$STR_CLASS_WEB_TITULO, lista_precio_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_bodega_util::$STR_CLASS_WEB_TITULO, producto_bodega_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,otro_suplidor_util::$STR_CLASS_WEB_TITULO, otro_suplidor_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_cliente_util::$STR_CLASS_WEB_TITULO, lista_cliente_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,imagen_producto_util::$STR_CLASS_WEB_TITULO, imagen_producto_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$STR_CLASS_WEB_TITULO, lista_producto_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		
		$arrOrderBy = OrderBy::ActualizarInformacion($arrOrderBy);
		
		if($orderBy!=null);
		
		return $arrOrderBy;
	}
	
	/*REPORTES*/
		
	
	/*REPORTES CODIGO*/
	public static function getHeaderReportRow(string $tipo='NORMAL',array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$header=array();
		$cellReport=new CellReport();
		$blnFill=false;
		
		if($tipo=='RELACIONADO') {
			$blnFill=true;
			
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,7,1); $cellReport->setblnFill($blnFill); $header[]=$cellReport;			
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Empresa',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Proveedores',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Proveedores',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Costo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Costo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Activo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Activo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Tipo Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Tipo Producto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cantidad Inicial',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cantidad Inicial',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Impuesto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Impuesto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Otro Impuesto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Otro Impuesto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Impuesto En Ventas',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Impuesto En Ventas',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Otro Impuesto Ventas',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Otro Impuesto Ventas',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Impuesto En Compras',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Impuesto En Compras',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Otro Impuesto Compras',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Otro Impuesto Compras',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Categoria Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Categoria Producto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Sub Categoria Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Sub Categoria Producto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Bodega Defecto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Bodega Defecto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Unidad Compra',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Unidad Compra',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Equivalencia En Compra',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Equivalencia En Compra',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Unidad Venta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Unidad Venta',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Equivalencia En Venta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Equivalencia En Venta',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descripcion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descripcion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Imagen',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Imagen',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Observacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Observacion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Comenta Factura',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Comenta Factura',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo Fabricante',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo Fabricante',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cantidad',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cantidad',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cantidad Minima',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cantidad Minima',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cantidad Maxima',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cantidad Maxima',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Factura Sin Stock',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Factura Sin Stock',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Mostrar Componente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Mostrar Componente',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Producto Equivalente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Producto Equivalente',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Avisa Expiracion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Avisa Expiracion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Requiere No Serie',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Requiere No Serie',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Acepta Lote',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Acepta Lote',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cuenta Venta/Ingresos',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuenta Venta/Ingresos',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cuenta Compra/Activo/Inventario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuenta Compra/Activo/Inventario',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cuenta Costo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuenta Costo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Valor Inventario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Valor Inventario',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Producto Fisico',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Producto Fisico',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',producto $producto,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getid_empresa_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Proveedores',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getid_proveedor_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getcodigo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getnombre(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Costo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getcosto(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Activo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($producto->getactivo()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Tipo Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getid_tipo_producto_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cantidad Inicial',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getcantidad_inicial(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Impuesto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getid_impuesto_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Otro Impuesto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getid_otro_impuesto_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Impuesto En Ventas',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($producto->getimpuesto_ventas()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Otro Impuesto Ventas',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($producto->getotro_impuesto_ventas()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Impuesto En Compras',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($producto->getimpuesto_compras()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Otro Impuesto Compras',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($producto->getotro_impuesto_compras()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Categoria Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getid_categoria_producto_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Sub Categoria Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getid_sub_categoria_producto_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Bodega Defecto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getid_bodega_defecto_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Unidad Compra',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getid_unidad_compra_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Equivalencia En Compra',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getequivalencia_compra(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Unidad Venta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getid_unidad_venta_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Equivalencia En Venta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getequivalencia_venta(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descripcion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getdescripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Imagen',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getimagen(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Observacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getobservacion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Comenta Factura',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($producto->getcomenta_factura()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo Fabricante',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getcodigo_fabricante(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cantidad',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getcantidad(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cantidad Minima',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getcantidad_minima(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cantidad Maxima',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getcantidad_maxima(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Factura Sin Stock',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($producto->getfactura_sin_stock()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Mostrar Componente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($producto->getmostrar_componente()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Producto Equivalente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($producto->getproducto_equivalente()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Avisa Expiracion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($producto->getavisa_expiracion()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Requiere No Serie',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($producto->getrequiere_serie()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Acepta Lote',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($producto->getacepta_lote()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cuenta Venta/Ingresos',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getid_cuenta_venta_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cuenta Compra/Activo/Inventario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getid_cuenta_compra_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cuenta Costo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getid_cuenta_costo_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Valor Inventario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getvalor_inventario(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Producto Fisico',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getproducto_fisico(),40,6,1); $row[]=$cellReport;
		}
		
		return $row;
	}		
	
	/*XML DESCRIPCION*/
	
	public static function getempresaDescripcion(?empresa $empresa) : string {
		$sDescripcion='none';
		if($empresa!==null) {
			$sDescripcion=empresa_util::getempresaDescripcion($empresa);
		}
		return $sDescripcion;
	}	
	
	public static function getproveedorDescripcion(?proveedor $proveedor) : string {
		$sDescripcion='none';
		if($proveedor!==null) {
			$sDescripcion=proveedor_util::getproveedorDescripcion($proveedor);
		}
		return $sDescripcion;
	}	
	
	public static function gettipo_productoDescripcion(?tipo_producto $tipo_producto) : string {
		$sDescripcion='none';
		if($tipo_producto!==null) {
			$sDescripcion=tipo_producto_util::gettipo_productoDescripcion($tipo_producto);
		}
		return $sDescripcion;
	}	
	
	public static function getimpuestoDescripcion(?impuesto $impuesto) : string {
		$sDescripcion='none';
		if($impuesto!==null) {
			$sDescripcion=impuesto_util::getimpuestoDescripcion($impuesto);
		}
		return $sDescripcion;
	}	
	
	public static function getotro_impuestoDescripcion(?otro_impuesto $otro_impuesto) : string {
		$sDescripcion='none';
		if($otro_impuesto!==null) {
			$sDescripcion=otro_impuesto_util::getotro_impuestoDescripcion($otro_impuesto);
		}
		return $sDescripcion;
	}	
	
	public static function getcategoria_productoDescripcion(?categoria_producto $categoria_producto) : string {
		$sDescripcion='none';
		if($categoria_producto!==null) {
			$sDescripcion=categoria_producto_util::getcategoria_productoDescripcion($categoria_producto);
		}
		return $sDescripcion;
	}	
	
	public static function getsub_categoria_productoDescripcion(?sub_categoria_producto $sub_categoria_producto) : string {
		$sDescripcion='none';
		if($sub_categoria_producto!==null) {
			$sDescripcion=sub_categoria_producto_util::getsub_categoria_productoDescripcion($sub_categoria_producto);
		}
		return $sDescripcion;
	}	
	
	public static function getbodega_defectoDescripcion(?bodega $bodega) : string {
		$sDescripcion='none';
		if($bodega!==null) {
			$sDescripcion=bodega_util::getbodegaDescripcion($bodega);
		}
		return $sDescripcion;
	}	
	
	public static function getunidad_compraDescripcion(?unidad $unidad) : string {
		$sDescripcion='none';
		if($unidad!==null) {
			$sDescripcion=unidad_util::getunidadDescripcion($unidad);
		}
		return $sDescripcion;
	}	
	
	public static function getunidad_ventaDescripcion(?unidad $unidad) : string {
		$sDescripcion='none';
		if($unidad!==null) {
			$sDescripcion=unidad_util::getunidadDescripcion($unidad);
		}
		return $sDescripcion;
	}	
	
	public static function getcuenta_ventaDescripcion(?cuenta $cuenta) : string {
		$sDescripcion='none';
		if($cuenta!==null) {
			$sDescripcion=cuenta_util::getcuentaDescripcion($cuenta);
		}
		return $sDescripcion;
	}	
	
	public static function getcuenta_compraDescripcion(?cuenta $cuenta) : string {
		$sDescripcion='none';
		if($cuenta!==null) {
			$sDescripcion=cuenta_util::getcuentaDescripcion($cuenta);
		}
		return $sDescripcion;
	}	
	
	public static function getcuenta_costoDescripcion(?cuenta $cuenta) : string {
		$sDescripcion='none';
		if($cuenta!==null) {
			$sDescripcion=cuenta_util::getcuentaDescripcion($cuenta);
		}
		return $sDescripcion;
	}	
	
	public static function getretencionDescripcion(?retencion $retencion) : string {
		$sDescripcion='none';
		if($retencion!==null) {
			$sDescripcion=retencion_util::getretencionDescripcion($retencion);
		}
		return $sDescripcion;
	}	
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface producto_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $productos,int $iIdNuevoproducto) : int;	
		public static function getIndiceActual(array $productos,producto $producto,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getproductoDescripcion(?producto $producto) : string {;	
		public static function setproductoDescripcion(?producto $producto,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $productos) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $productos);	
		public static function refrescarFKDescripcion(producto $producto);
				
		//SELECCIONAR
		public static function getTiposSeleccionar(bool $conFk) : array;	
		public static function getTiposSeleccionar2() : array;	
		public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array;
		
		//GLOBAL
		public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array;	
		public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array;	
		public static function getArrayColumnasGlobalesNo(array $arrDatoGeneral) : array;
		
		//DEEP CLASSES
		public static function getClassesFKsOf(array $classesP,string $deepLoadType) : array;
		
		
		public static function getClassesRelsOf(array $classesP,string $deepLoadType) : array;
		
		
		//ORDER
		public static function getOrderByLista() : array;	
		public static function getOrderByListaRel() : array;	
		
		//REPORTES CODIGO
		public static function getHeaderReportRow(string $tipo='NORMAL',array $arrOrderBy,bool $bitParaReporteOrderBy) : array;	
		public static function getDataReportRow(string $tipo='NORMAL',producto $producto,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

