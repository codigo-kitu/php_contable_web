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

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\inventario\lista_producto\business\entity\lista_producto;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\util\producto_util;
use com\bydan\contabilidad\inventario\unidad\business\entity\unidad;
use com\bydan\contabilidad\inventario\unidad\util\unidad_util;
use com\bydan\contabilidad\inventario\categoria_producto\business\entity\categoria_producto;
use com\bydan\contabilidad\inventario\categoria_producto\util\categoria_producto_util;
use com\bydan\contabilidad\inventario\sub_categoria_producto\business\entity\sub_categoria_producto;
use com\bydan\contabilidad\inventario\sub_categoria_producto\util\sub_categoria_producto_util;
use com\bydan\contabilidad\inventario\tipo_producto\business\entity\tipo_producto;
use com\bydan\contabilidad\inventario\tipo_producto\util\tipo_producto_util;
use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;
use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;
use com\bydan\contabilidad\inventario\otro_suplidor\business\entity\otro_suplidor;
use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_util;
use com\bydan\contabilidad\facturacion\impuesto\business\entity\impuesto;
use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_util;
use com\bydan\contabilidad\facturacion\otro_impuesto\business\entity\otro_impuesto;
use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_util;
use com\bydan\contabilidad\facturacion\retencion\business\entity\retencion;
use com\bydan\contabilidad\facturacion\retencion\util\retencion_util;

//REL


class lista_producto_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='lista_producto';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='inventario.lista_productos';
	/*'Mantenimientolista_producto.jsf';*/
	public static string $STR_MODULO_OPCION='inventario';
	public static string $STR_NOMBRE_CLASE='Mantenimientolista_producto.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='lista_productoPersistenceName';
	/*.lista_producto_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='lista_producto_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='lista_producto_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='lista_producto_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Lista Productoses';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='es';
	public static string $STR_CLASS_WEB_TITULO='Lista Productos';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $INVENTARIO='inventario';
	public static string $STR_PREFIJO_TABLE='inv_';
	public static string $STR_TABLE_NAME='lista_producto';
	public static string $LISTA_PRODUCTO='inv_lista_producto';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.lista_producto';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.precio1,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.precio2,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.precio3,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.precio4,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.costo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_unidad_compra,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.unidad_en_compra,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.equivalencia_en_compra,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_unidad_venta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.unidad_en_venta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.equivalencia_en_venta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cantidad_total,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cantidad_minima,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_categoria_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_sub_categoria_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.acepta_lote,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.valor_inventario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.imagen,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.incremento1,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.incremento2,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.incremento3,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.incremento4,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo_fabricante,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.producto_fisico,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.situacion_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_tipo_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.tipo_producto_codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_bodega,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.mostrar_componente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.factura_sin_stock,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.avisa_expiracion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.factura_con_precio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.producto_equivalente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta_compra,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta_venta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta_inventario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cuenta_compra_codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cuenta_venta_codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cuenta_inventario_codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_otro_suplidor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_impuesto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_impuesto_ventas,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_impuesto_compras,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.impuesto1_en_ventas,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.impuesto1_en_compras,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.ultima_venta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_otro_impuesto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_otro_impuesto_ventas,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_otro_impuesto_compras,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.otro_impuesto_ventas_codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.otro_impuesto_compras_codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.precio_de_compra_0,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.precio_actualizado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.requiere_nro_serie,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.costo_dolar,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.comentario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.comenta_factura,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_retencion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_retencion_ventas,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_retencion_compras,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.retencion_ventas_codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.retencion_compras_codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.notas from '.lista_producto_util::$SCHEMA.'.'.lista_producto_util::$TABLENAME;*/
	
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
	//public $lista_productoConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_PRODUCTO='id_producto';
    public static string $CODIGO_PRODUCTO='codigo_producto';
    public static string $DESCRIPCION_PRODUCTO='descripcion_producto';
    public static string $PRECIO1='precio1';
    public static string $PRECIO2='precio2';
    public static string $PRECIO3='precio3';
    public static string $PRECIO4='precio4';
    public static string $COSTO='costo';
    public static string $ID_UNIDAD_COMPRA='id_unidad_compra';
    public static string $UNIDAD_EN_COMPRA='unidad_en_compra';
    public static string $EQUIVALENCIA_EN_COMPRA='equivalencia_en_compra';
    public static string $ID_UNIDAD_VENTA='id_unidad_venta';
    public static string $UNIDAD_EN_VENTA='unidad_en_venta';
    public static string $EQUIVALENCIA_EN_VENTA='equivalencia_en_venta';
    public static string $CANTIDAD_TOTAL='cantidad_total';
    public static string $CANTIDAD_MINIMA='cantidad_minima';
    public static string $ID_CATEGORIA_PRODUCTO='id_categoria_producto';
    public static string $ID_SUB_CATEGORIA_PRODUCTO='id_sub_categoria_producto';
    public static string $ACEPTA_LOTE='acepta_lote';
    public static string $VALOR_INVENTARIO='valor_inventario';
    public static string $IMAGEN='imagen';
    public static string $INCREMENTO1='incremento1';
    public static string $INCREMENTO2='incremento2';
    public static string $INCREMENTO3='incremento3';
    public static string $INCREMENTO4='incremento4';
    public static string $CODIGO_FABRICANTE='codigo_fabricante';
    public static string $PRODUCTO_FISICO='producto_fisico';
    public static string $SITUACION_PRODUCTO='situacion_producto';
    public static string $ID_TIPO_PRODUCTO='id_tipo_producto';
    public static string $TIPO_PRODUCTO_CODIGO='tipo_producto_codigo';
    public static string $ID_BODEGA='id_bodega';
    public static string $MOSTRAR_COMPONENTE='mostrar_componente';
    public static string $FACTURA_SIN_STOCK='factura_sin_stock';
    public static string $AVISA_EXPIRACION='avisa_expiracion';
    public static string $FACTURA_CON_PRECIO='factura_con_precio';
    public static string $PRODUCTO_EQUIVALENTE='producto_equivalente';
    public static string $ID_CUENTA_COMPRA='id_cuenta_compra';
    public static string $ID_CUENTA_VENTA='id_cuenta_venta';
    public static string $ID_CUENTA_INVENTARIO='id_cuenta_inventario';
    public static string $CUENTA_COMPRA_CODIGO='cuenta_compra_codigo';
    public static string $CUENTA_VENTA_CODIGO='cuenta_venta_codigo';
    public static string $CUENTA_INVENTARIO_CODIGO='cuenta_inventario_codigo';
    public static string $ID_OTRO_SUPLIDOR='id_otro_suplidor';
    public static string $ID_IMPUESTO='id_impuesto';
    public static string $ID_IMPUESTO_VENTAS='id_impuesto_ventas';
    public static string $ID_IMPUESTO_COMPRAS='id_impuesto_compras';
    public static string $IMPUESTO1_EN_VENTAS='impuesto1_en_ventas';
    public static string $IMPUESTO1_EN_COMPRAS='impuesto1_en_compras';
    public static string $ULTIMA_VENTA='ultima_venta';
    public static string $ID_OTRO_IMPUESTO='id_otro_impuesto';
    public static string $ID_OTRO_IMPUESTO_VENTAS='id_otro_impuesto_ventas';
    public static string $ID_OTRO_IMPUESTO_COMPRAS='id_otro_impuesto_compras';
    public static string $OTRO_IMPUESTO_VENTAS_CODIGO='otro_impuesto_ventas_codigo';
    public static string $OTRO_IMPUESTO_COMPRAS_CODIGO='otro_impuesto_compras_codigo';
    public static string $PRECIO_DE_COMPRA_0='precio_de_compra_0';
    public static string $PRECIO_ACTUALIZADO='precio_actualizado';
    public static string $REQUIERE_NRO_SERIE='requiere_nro_serie';
    public static string $COSTO_DOLAR='costo_dolar';
    public static string $COMENTARIO='comentario';
    public static string $COMENTA_FACTURA='comenta_factura';
    public static string $ID_RETENCION='id_retencion';
    public static string $ID_RETENCION_VENTAS='id_retencion_ventas';
    public static string $ID_RETENCION_COMPRAS='id_retencion_compras';
    public static string $RETENCION_VENTAS_CODIGO='retencion_ventas_codigo';
    public static string $RETENCION_COMPRAS_CODIGO='retencion_compras_codigo';
    public static string $NOTAS='notas';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_PRODUCTO='Producto';
    public static string $LABEL_CODIGO_PRODUCTO='Codigo Producto';
    public static string $LABEL_DESCRIPCION_PRODUCTO='Descripcion Producto';
    public static string $LABEL_PRECIO1='Precio1';
    public static string $LABEL_PRECIO2='Precio2';
    public static string $LABEL_PRECIO3='Precio3';
    public static string $LABEL_PRECIO4='Precio4';
    public static string $LABEL_COSTO='Costo';
    public static string $LABEL_ID_UNIDAD_COMPRA=' Unidad Compra';
    public static string $LABEL_UNIDAD_EN_COMPRA='Unidad En Compra';
    public static string $LABEL_EQUIVALENCIA_EN_COMPRA='Equivalencia En Compra';
    public static string $LABEL_ID_UNIDAD_VENTA=' Unidad Venta';
    public static string $LABEL_UNIDAD_EN_VENTA='Unidad En Venta';
    public static string $LABEL_EQUIVALENCIA_EN_VENTA='Equivalencia En Venta';
    public static string $LABEL_CANTIDAD_TOTAL='Cantidad Total';
    public static string $LABEL_CANTIDAD_MINIMA='Cantidad Minima';
    public static string $LABEL_ID_CATEGORIA_PRODUCTO='Categoria Producto';
    public static string $LABEL_ID_SUB_CATEGORIA_PRODUCTO='Sub Categoria Producto';
    public static string $LABEL_ACEPTA_LOTE='Acepta Lote';
    public static string $LABEL_VALOR_INVENTARIO='Valor Inventario';
    public static string $LABEL_IMAGEN='Imagen';
    public static string $LABEL_INCREMENTO1='Incremento1';
    public static string $LABEL_INCREMENTO2='Incremento2';
    public static string $LABEL_INCREMENTO3='Incremento3';
    public static string $LABEL_INCREMENTO4='Incremento4';
    public static string $LABEL_CODIGO_FABRICANTE='Codigo Fabricante';
    public static string $LABEL_PRODUCTO_FISICO='Producto Fisico';
    public static string $LABEL_SITUACION_PRODUCTO='Situacion Producto';
    public static string $LABEL_ID_TIPO_PRODUCTO=' Tipo Producto';
    public static string $LABEL_TIPO_PRODUCTO_CODIGO='Tipo Producto';
    public static string $LABEL_ID_BODEGA='Bodega';
    public static string $LABEL_MOSTRAR_COMPONENTE='Mostrar Componente';
    public static string $LABEL_FACTURA_SIN_STOCK='Factura Sin Stock';
    public static string $LABEL_AVISA_EXPIRACION='Avisa Expiracion';
    public static string $LABEL_FACTURA_CON_PRECIO='Factura Con Precio';
    public static string $LABEL_PRODUCTO_EQUIVALENTE='Producto Equivalente';
    public static string $LABEL_ID_CUENTA_COMPRA=' Cuenta Compra';
    public static string $LABEL_ID_CUENTA_VENTA=' Cuenta Venta';
    public static string $LABEL_ID_CUENTA_INVENTARIO=' Cuenta Inventario';
    public static string $LABEL_CUENTA_COMPRA_CODIGO='Cuenta Compra';
    public static string $LABEL_CUENTA_VENTA_CODIGO='Cuenta Venta';
    public static string $LABEL_CUENTA_INVENTARIO_CODIGO='Cuenta Inventario';
    public static string $LABEL_ID_OTRO_SUPLIDOR='Otro Suplidor';
    public static string $LABEL_ID_IMPUESTO='Impuesto';
    public static string $LABEL_ID_IMPUESTO_VENTAS=' Impuesto Ventas';
    public static string $LABEL_ID_IMPUESTO_COMPRAS=' Impuesto Compras';
    public static string $LABEL_IMPUESTO1_EN_VENTAS='Impuesto1 En Ventas';
    public static string $LABEL_IMPUESTO1_EN_COMPRAS='Impuesto1 En Compras';
    public static string $LABEL_ULTIMA_VENTA='Ultima Venta';
    public static string $LABEL_ID_OTRO_IMPUESTO='Otro Impuesto';
    public static string $LABEL_ID_OTRO_IMPUESTO_VENTAS=' Otro Impuesto Ventas';
    public static string $LABEL_ID_OTRO_IMPUESTO_COMPRAS=' Otro Impuesto Compras';
    public static string $LABEL_OTRO_IMPUESTO_VENTAS_CODIGO='Otro Impuesto Ventas';
    public static string $LABEL_OTRO_IMPUESTO_COMPRAS_CODIGO='Otro Impuesto Compras';
    public static string $LABEL_PRECIO_DE_COMPRA_0='Precio De Compra 0';
    public static string $LABEL_PRECIO_ACTUALIZADO='Precio Actualizado';
    public static string $LABEL_REQUIERE_NRO_SERIE='Requiere Nro Serie';
    public static string $LABEL_COSTO_DOLAR='Costo Dolar';
    public static string $LABEL_COMENTARIO='Comentario';
    public static string $LABEL_COMENTA_FACTURA='Comenta Factura';
    public static string $LABEL_ID_RETENCION='Retencion';
    public static string $LABEL_ID_RETENCION_VENTAS=' Retencion Ventas';
    public static string $LABEL_ID_RETENCION_COMPRAS=' Retencion Compras';
    public static string $LABEL_RETENCION_VENTAS_CODIGO='Retencion Ventas';
    public static string $LABEL_RETENCION_COMPRAS_CODIGO='Retencion Compras';
    public static string $LABEL_NOTAS='Notas';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->lista_productoConstantesFuncionesAdditional=new $lista_productoConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $lista_productos,int $iIdNuevolista_producto) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($lista_productos as $lista_productoAux) {
			if($lista_productoAux->getId()==$iIdNuevolista_producto) {
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
	
	public static function getIndiceActual(array $lista_productos,lista_producto $lista_producto,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($lista_productos as $lista_productoAux) {
			if($lista_productoAux->getId()==$lista_producto->getId()) {
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
	public static function getlista_productoDescripcion(?lista_producto $lista_producto) : string {//lista_producto NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($lista_producto !=null) {
			/*&& lista_producto->getId()!=0*/
			
			$sDescripcion=$lista_producto->getcodigo_producto();
			
			/*lista_producto;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setlista_productoDescripcion(?lista_producto $lista_producto,string $sValor) {			
		if($lista_producto !=null) {
			$lista_producto->setcodigo_producto($sValor);
			/*lista_producto;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $lista_productos) : array {
		$lista_productosForeignKey=array();
		
		foreach ($lista_productos as $lista_productoLocal) {
			$lista_productosForeignKey[$lista_productoLocal->getId()]=lista_producto_util::getlista_productoDescripcion($lista_productoLocal);
		}
			
		return $lista_productosForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_producto() : string  { return 'Producto'; }
    public static function getColumnLabelcodigo_producto() : string  { return 'Codigo Producto'; }
    public static function getColumnLabeldescripcion_producto() : string  { return 'Descripcion Producto'; }
    public static function getColumnLabelprecio1() : string  { return 'Precio1'; }
    public static function getColumnLabelprecio2() : string  { return 'Precio2'; }
    public static function getColumnLabelprecio3() : string  { return 'Precio3'; }
    public static function getColumnLabelprecio4() : string  { return 'Precio4'; }
    public static function getColumnLabelcosto() : string  { return 'Costo'; }
    public static function getColumnLabelid_unidad_compra() : string  { return ' Unidad Compra'; }
    public static function getColumnLabelunidad_en_compra() : string  { return 'Unidad En Compra'; }
    public static function getColumnLabelequivalencia_en_compra() : string  { return 'Equivalencia En Compra'; }
    public static function getColumnLabelid_unidad_venta() : string  { return ' Unidad Venta'; }
    public static function getColumnLabelunidad_en_venta() : string  { return 'Unidad En Venta'; }
    public static function getColumnLabelequivalencia_en_venta() : string  { return 'Equivalencia En Venta'; }
    public static function getColumnLabelcantidad_total() : string  { return 'Cantidad Total'; }
    public static function getColumnLabelcantidad_minima() : string  { return 'Cantidad Minima'; }
    public static function getColumnLabelid_categoria_producto() : string  { return 'Categoria Producto'; }
    public static function getColumnLabelid_sub_categoria_producto() : string  { return 'Sub Categoria Producto'; }
    public static function getColumnLabelacepta_lote() : string  { return 'Acepta Lote'; }
    public static function getColumnLabelvalor_inventario() : string  { return 'Valor Inventario'; }
    public static function getColumnLabelimagen() : string  { return 'Imagen'; }
    public static function getColumnLabelincremento1() : string  { return 'Incremento1'; }
    public static function getColumnLabelincremento2() : string  { return 'Incremento2'; }
    public static function getColumnLabelincremento3() : string  { return 'Incremento3'; }
    public static function getColumnLabelincremento4() : string  { return 'Incremento4'; }
    public static function getColumnLabelcodigo_fabricante() : string  { return 'Codigo Fabricante'; }
    public static function getColumnLabelproducto_fisico() : string  { return 'Producto Fisico'; }
    public static function getColumnLabelsituacion_producto() : string  { return 'Situacion Producto'; }
    public static function getColumnLabelid_tipo_producto() : string  { return ' Tipo Producto'; }
    public static function getColumnLabeltipo_producto_codigo() : string  { return 'Tipo Producto'; }
    public static function getColumnLabelid_bodega() : string  { return 'Bodega'; }
    public static function getColumnLabelmostrar_componente() : string  { return 'Mostrar Componente'; }
    public static function getColumnLabelfactura_sin_stock() : string  { return 'Factura Sin Stock'; }
    public static function getColumnLabelavisa_expiracion() : string  { return 'Avisa Expiracion'; }
    public static function getColumnLabelfactura_con_precio() : string  { return 'Factura Con Precio'; }
    public static function getColumnLabelproducto_equivalente() : string  { return 'Producto Equivalente'; }
    public static function getColumnLabelid_cuenta_compra() : string  { return ' Cuenta Compra'; }
    public static function getColumnLabelid_cuenta_venta() : string  { return ' Cuenta Venta'; }
    public static function getColumnLabelid_cuenta_inventario() : string  { return ' Cuenta Inventario'; }
    public static function getColumnLabelcuenta_compra_codigo() : string  { return 'Cuenta Compra'; }
    public static function getColumnLabelcuenta_venta_codigo() : string  { return 'Cuenta Venta'; }
    public static function getColumnLabelcuenta_inventario_codigo() : string  { return 'Cuenta Inventario'; }
    public static function getColumnLabelid_otro_suplidor() : string  { return 'Otro Suplidor'; }
    public static function getColumnLabelid_impuesto() : string  { return 'Impuesto'; }
    public static function getColumnLabelid_impuesto_ventas() : string  { return ' Impuesto Ventas'; }
    public static function getColumnLabelid_impuesto_compras() : string  { return ' Impuesto Compras'; }
    public static function getColumnLabelimpuesto1_en_ventas() : string  { return 'Impuesto1 En Ventas'; }
    public static function getColumnLabelimpuesto1_en_compras() : string  { return 'Impuesto1 En Compras'; }
    public static function getColumnLabelultima_venta() : string  { return 'Ultima Venta'; }
    public static function getColumnLabelid_otro_impuesto() : string  { return 'Otro Impuesto'; }
    public static function getColumnLabelid_otro_impuesto_ventas() : string  { return ' Otro Impuesto Ventas'; }
    public static function getColumnLabelid_otro_impuesto_compras() : string  { return ' Otro Impuesto Compras'; }
    public static function getColumnLabelotro_impuesto_ventas_codigo() : string  { return 'Otro Impuesto Ventas'; }
    public static function getColumnLabelotro_impuesto_compras_codigo() : string  { return 'Otro Impuesto Compras'; }
    public static function getColumnLabelprecio_de_compra_0() : string  { return 'Precio De Compra 0'; }
    public static function getColumnLabelprecio_actualizado() : string  { return 'Precio Actualizado'; }
    public static function getColumnLabelrequiere_nro_serie() : string  { return 'Requiere Nro Serie'; }
    public static function getColumnLabelcosto_dolar() : string  { return 'Costo Dolar'; }
    public static function getColumnLabelcomentario() : string  { return 'Comentario'; }
    public static function getColumnLabelcomenta_factura() : string  { return 'Comenta Factura'; }
    public static function getColumnLabelid_retencion() : string  { return 'Retencion'; }
    public static function getColumnLabelid_retencion_ventas() : string  { return ' Retencion Ventas'; }
    public static function getColumnLabelid_retencion_compras() : string  { return ' Retencion Compras'; }
    public static function getColumnLabelretencion_ventas_codigo() : string  { return 'Retencion Ventas'; }
    public static function getColumnLabelretencion_compras_codigo() : string  { return 'Retencion Compras'; }
    public static function getColumnLabelnotas() : string  { return 'Notas'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $lista_productos) {		
		try {
			
			$lista_producto = new lista_producto();
			
			foreach($lista_productos as $lista_producto) {
				
				$lista_producto->setid_producto_Descripcion(lista_producto_util::getproductoDescripcion($lista_producto->getproducto()));
				$lista_producto->setid_unidad_compra_Descripcion(lista_producto_util::getunidad_compraDescripcion($lista_producto->getunidad_compra()));
				$lista_producto->setid_unidad_venta_Descripcion(lista_producto_util::getunidad_ventaDescripcion($lista_producto->getunidad_venta()));
				$lista_producto->setid_categoria_producto_Descripcion(lista_producto_util::getcategoria_productoDescripcion($lista_producto->getcategoria_producto()));
				$lista_producto->setid_sub_categoria_producto_Descripcion(lista_producto_util::getsub_categoria_productoDescripcion($lista_producto->getsub_categoria_producto()));
				$lista_producto->setid_tipo_producto_Descripcion(lista_producto_util::gettipo_productoDescripcion($lista_producto->gettipo_producto()));
				$lista_producto->setid_bodega_Descripcion(lista_producto_util::getbodegaDescripcion($lista_producto->getbodega()));
				$lista_producto->setid_cuenta_compra_Descripcion(lista_producto_util::getcuenta_compraDescripcion($lista_producto->getcuenta_compra()));
				$lista_producto->setid_cuenta_venta_Descripcion(lista_producto_util::getcuenta_ventaDescripcion($lista_producto->getcuenta_venta()));
				$lista_producto->setid_cuenta_inventario_Descripcion(lista_producto_util::getcuenta_inventarioDescripcion($lista_producto->getcuenta_inventario()));
				$lista_producto->setid_otro_suplidor_Descripcion(lista_producto_util::getotro_suplidorDescripcion($lista_producto->getotro_suplidor()));
				$lista_producto->setid_impuesto_Descripcion(lista_producto_util::getimpuestoDescripcion($lista_producto->getimpuesto()));
				$lista_producto->setid_impuesto_ventas_Descripcion(lista_producto_util::getimpuesto_ventasDescripcion($lista_producto->getimpuesto_ventas()));
				$lista_producto->setid_impuesto_compras_Descripcion(lista_producto_util::getimpuesto_comprasDescripcion($lista_producto->getimpuesto_compras()));
				$lista_producto->setid_otro_impuesto_Descripcion(lista_producto_util::getotro_impuestoDescripcion($lista_producto->getotro_impuesto()));
				$lista_producto->setid_otro_impuesto_ventas_Descripcion(lista_producto_util::getotro_impuesto_ventasDescripcion($lista_producto->getotro_impuesto_ventas()));
				$lista_producto->setid_otro_impuesto_compras_Descripcion(lista_producto_util::getotro_impuesto_comprasDescripcion($lista_producto->getotro_impuesto_compras()));
				$lista_producto->setid_retencion_Descripcion(lista_producto_util::getretencionDescripcion($lista_producto->getretencion()));
				$lista_producto->setid_retencion_ventas_Descripcion(lista_producto_util::getretencion_ventasDescripcion($lista_producto->getretencion_ventas()));
				$lista_producto->setid_retencion_compras_Descripcion(lista_producto_util::getretencion_comprasDescripcion($lista_producto->getretencion_compras()));
			}
			
			if($lista_producto!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(lista_producto $lista_producto) {		
		try {
			
			
				$lista_producto->setid_producto_Descripcion(lista_producto_util::getproductoDescripcion($lista_producto->getproducto()));
				$lista_producto->setid_unidad_compra_Descripcion(lista_producto_util::getunidad_compraDescripcion($lista_producto->getunidad_compra()));
				$lista_producto->setid_unidad_venta_Descripcion(lista_producto_util::getunidad_ventaDescripcion($lista_producto->getunidad_venta()));
				$lista_producto->setid_categoria_producto_Descripcion(lista_producto_util::getcategoria_productoDescripcion($lista_producto->getcategoria_producto()));
				$lista_producto->setid_sub_categoria_producto_Descripcion(lista_producto_util::getsub_categoria_productoDescripcion($lista_producto->getsub_categoria_producto()));
				$lista_producto->setid_tipo_producto_Descripcion(lista_producto_util::gettipo_productoDescripcion($lista_producto->gettipo_producto()));
				$lista_producto->setid_bodega_Descripcion(lista_producto_util::getbodegaDescripcion($lista_producto->getbodega()));
				$lista_producto->setid_cuenta_compra_Descripcion(lista_producto_util::getcuenta_compraDescripcion($lista_producto->getcuenta_compra()));
				$lista_producto->setid_cuenta_venta_Descripcion(lista_producto_util::getcuenta_ventaDescripcion($lista_producto->getcuenta_venta()));
				$lista_producto->setid_cuenta_inventario_Descripcion(lista_producto_util::getcuenta_inventarioDescripcion($lista_producto->getcuenta_inventario()));
				$lista_producto->setid_otro_suplidor_Descripcion(lista_producto_util::getotro_suplidorDescripcion($lista_producto->getotro_suplidor()));
				$lista_producto->setid_impuesto_Descripcion(lista_producto_util::getimpuestoDescripcion($lista_producto->getimpuesto()));
				$lista_producto->setid_impuesto_ventas_Descripcion(lista_producto_util::getimpuesto_ventasDescripcion($lista_producto->getimpuesto_ventas()));
				$lista_producto->setid_impuesto_compras_Descripcion(lista_producto_util::getimpuesto_comprasDescripcion($lista_producto->getimpuesto_compras()));
				$lista_producto->setid_otro_impuesto_Descripcion(lista_producto_util::getotro_impuestoDescripcion($lista_producto->getotro_impuesto()));
				$lista_producto->setid_otro_impuesto_ventas_Descripcion(lista_producto_util::getotro_impuesto_ventasDescripcion($lista_producto->getotro_impuesto_ventas()));
				$lista_producto->setid_otro_impuesto_compras_Descripcion(lista_producto_util::getotro_impuesto_comprasDescripcion($lista_producto->getotro_impuesto_compras()));
				$lista_producto->setid_retencion_Descripcion(lista_producto_util::getretencionDescripcion($lista_producto->getretencion()));
				$lista_producto->setid_retencion_ventas_Descripcion(lista_producto_util::getretencion_ventasDescripcion($lista_producto->getretencion_ventas()));
				$lista_producto->setid_retencion_compras_Descripcion(lista_producto_util::getretencion_comprasDescripcion($lista_producto->getretencion_compras()));
							
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
			$sNombreIndice='Tipo=  Por Bodega';
		} else if($sNombreIndice=='FK_Idcategoria_producto') {
			$sNombreIndice='Tipo=  Por Categoria Producto';
		} else if($sNombreIndice=='FK_Idcuenta_compra') {
			$sNombreIndice='Tipo=  Por  Cuenta Compra';
		} else if($sNombreIndice=='FK_Idcuenta_inventario') {
			$sNombreIndice='Tipo=  Por  Cuenta Inventario';
		} else if($sNombreIndice=='FK_Idcuenta_venta') {
			$sNombreIndice='Tipo=  Por  Cuenta Venta';
		} else if($sNombreIndice=='FK_Idimpuesto') {
			$sNombreIndice='Tipo=  Por Impuesto';
		} else if($sNombreIndice=='FK_Idimpuesto_compras') {
			$sNombreIndice='Tipo=  Por  Impuesto Compras';
		} else if($sNombreIndice=='FK_Idimpuesto_ventas') {
			$sNombreIndice='Tipo=  Por  Impuesto Ventas';
		} else if($sNombreIndice=='FK_Idotro_impuesto') {
			$sNombreIndice='Tipo=  Por Otro Impuesto';
		} else if($sNombreIndice=='FK_Idotro_impuesto_compras') {
			$sNombreIndice='Tipo=  Por  Otro Impuesto Compras';
		} else if($sNombreIndice=='FK_Idotro_impuesto_ventas') {
			$sNombreIndice='Tipo=  Por  Otro Impuesto Ventas';
		} else if($sNombreIndice=='FK_Idotro_suplidor') {
			$sNombreIndice='Tipo=  Por Otro Suplidor';
		} else if($sNombreIndice=='FK_Idproducto') {
			$sNombreIndice='Tipo=  Por Producto';
		} else if($sNombreIndice=='FK_Idretencion') {
			$sNombreIndice='Tipo=  Por Retencion';
		} else if($sNombreIndice=='FK_Idretencion_compras') {
			$sNombreIndice='Tipo=  Por  Retencion Compras';
		} else if($sNombreIndice=='FK_Idretencion_ventas') {
			$sNombreIndice='Tipo=  Por  Retencion Ventas';
		} else if($sNombreIndice=='FK_Idsub_categoria_producto') {
			$sNombreIndice='Tipo=  Por Sub Categoria Producto';
		} else if($sNombreIndice=='FK_Idtipo_producto') {
			$sNombreIndice='Tipo=  Por  Tipo Producto';
		} else if($sNombreIndice=='FK_Idunidad_compra') {
			$sNombreIndice='Tipo=  Por  Unidad Compra';
		} else if($sNombreIndice=='FK_Idunidad_venta') {
			$sNombreIndice='Tipo=  Por  Unidad Venta';
		}

		return $sNombreIndice;
	}
	
	/*INDICES PARAMETROS LABEL*/
	

	public static function getDetalleIndicePorId(int $id) : string 
	{
		return 'Parámetros -> Porid='.$id;
	}

	public static function getDetalleIndiceFK_Idbodega(int $id_bodega) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Bodega='+$id_bodega; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idcategoria_producto(int $id_categoria_producto) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Categoria Producto='+$id_categoria_producto; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idcuenta_compra(int $id_cuenta_compra) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Cuenta Compra='+$id_cuenta_compra; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idcuenta_inventario(int $id_cuenta_inventario) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Cuenta Inventario='+$id_cuenta_inventario; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idcuenta_venta(int $id_cuenta_venta) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Cuenta Venta='+$id_cuenta_venta; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idimpuesto(int $id_impuesto) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Impuesto='+$id_impuesto; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idimpuesto_compras(int $id_impuesto_compras) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Impuesto Compras='+$id_impuesto_compras; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idimpuesto_ventas(int $id_impuesto_ventas) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Impuesto Ventas='+$id_impuesto_ventas; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idotro_impuesto(int $id_otro_impuesto) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Otro Impuesto='+$id_otro_impuesto; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idotro_impuesto_compras(int $id_otro_impuesto_compras) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Otro Impuesto Compras='+$id_otro_impuesto_compras; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idotro_impuesto_ventas(int $id_otro_impuesto_ventas) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Otro Impuesto Ventas='+$id_otro_impuesto_ventas; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idotro_suplidor(int $id_otro_suplidor) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Otro Suplidor='+$id_otro_suplidor; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idproducto(int $id_producto) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Producto='+$id_producto; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idretencion(int $id_retencion) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Retencion='+$id_retencion; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idretencion_compras(int $id_retencion_compras) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Retencion Compras='+$id_retencion_compras; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idretencion_ventas(int $id_retencion_ventas) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Retencion Ventas='+$id_retencion_ventas; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idsub_categoria_producto(int $id_sub_categoria_producto) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Sub Categoria Producto='+$id_sub_categoria_producto; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idtipo_producto(int $id_tipo_producto) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Tipo Producto='+$id_tipo_producto; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idunidad_compra(int $id_unidad_compra) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Unidad Compra='+$id_unidad_compra; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idunidad_venta(int $id_unidad_venta) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Unidad Venta='+$id_unidad_venta; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return lista_producto_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return lista_producto_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_ID_PRODUCTO);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_ID_PRODUCTO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_CODIGO_PRODUCTO);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_CODIGO_PRODUCTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_DESCRIPCION_PRODUCTO);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_DESCRIPCION_PRODUCTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_PRECIO1);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_PRECIO1);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_PRECIO2);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_PRECIO2);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_PRECIO3);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_PRECIO3);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_PRECIO4);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_PRECIO4);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_COSTO);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_COSTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_ID_UNIDAD_COMPRA);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_ID_UNIDAD_COMPRA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_UNIDAD_EN_COMPRA);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_UNIDAD_EN_COMPRA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_EQUIVALENCIA_EN_COMPRA);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_EQUIVALENCIA_EN_COMPRA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_ID_UNIDAD_VENTA);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_ID_UNIDAD_VENTA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_UNIDAD_EN_VENTA);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_UNIDAD_EN_VENTA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_EQUIVALENCIA_EN_VENTA);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_EQUIVALENCIA_EN_VENTA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_CANTIDAD_TOTAL);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_CANTIDAD_TOTAL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_CANTIDAD_MINIMA);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_CANTIDAD_MINIMA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_ID_CATEGORIA_PRODUCTO);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_ID_CATEGORIA_PRODUCTO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_ID_SUB_CATEGORIA_PRODUCTO);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_ID_SUB_CATEGORIA_PRODUCTO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_ACEPTA_LOTE);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_ACEPTA_LOTE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_VALOR_INVENTARIO);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_VALOR_INVENTARIO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_IMAGEN);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_IMAGEN);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_INCREMENTO1);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_INCREMENTO1);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_INCREMENTO2);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_INCREMENTO2);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_INCREMENTO3);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_INCREMENTO3);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_INCREMENTO4);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_INCREMENTO4);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_CODIGO_FABRICANTE);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_CODIGO_FABRICANTE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_PRODUCTO_FISICO);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_PRODUCTO_FISICO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_SITUACION_PRODUCTO);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_SITUACION_PRODUCTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_ID_TIPO_PRODUCTO);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_ID_TIPO_PRODUCTO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_TIPO_PRODUCTO_CODIGO);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_TIPO_PRODUCTO_CODIGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_ID_BODEGA);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_ID_BODEGA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_MOSTRAR_COMPONENTE);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_MOSTRAR_COMPONENTE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_FACTURA_SIN_STOCK);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_FACTURA_SIN_STOCK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_AVISA_EXPIRACION);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_AVISA_EXPIRACION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_FACTURA_CON_PRECIO);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_FACTURA_CON_PRECIO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_PRODUCTO_EQUIVALENTE);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_PRODUCTO_EQUIVALENTE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_ID_CUENTA_COMPRA);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_ID_CUENTA_COMPRA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_ID_CUENTA_VENTA);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_ID_CUENTA_VENTA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_ID_CUENTA_INVENTARIO);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_ID_CUENTA_INVENTARIO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_CUENTA_COMPRA_CODIGO);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_CUENTA_COMPRA_CODIGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_CUENTA_VENTA_CODIGO);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_CUENTA_VENTA_CODIGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_CUENTA_INVENTARIO_CODIGO);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_CUENTA_INVENTARIO_CODIGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_ID_OTRO_SUPLIDOR);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_ID_OTRO_SUPLIDOR.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_ID_IMPUESTO);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_ID_IMPUESTO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_ID_IMPUESTO_VENTAS);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_ID_IMPUESTO_VENTAS.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_ID_IMPUESTO_COMPRAS);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_ID_IMPUESTO_COMPRAS.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_IMPUESTO1_EN_VENTAS);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_IMPUESTO1_EN_VENTAS);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_IMPUESTO1_EN_COMPRAS);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_IMPUESTO1_EN_COMPRAS);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFechaColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_ULTIMA_VENTA);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_ULTIMA_VENTA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_ID_OTRO_IMPUESTO);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_ID_OTRO_IMPUESTO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_ID_OTRO_IMPUESTO_VENTAS);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_ID_OTRO_IMPUESTO_VENTAS.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_ID_OTRO_IMPUESTO_COMPRAS);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_ID_OTRO_IMPUESTO_COMPRAS.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_OTRO_IMPUESTO_VENTAS_CODIGO);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_OTRO_IMPUESTO_VENTAS_CODIGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_OTRO_IMPUESTO_COMPRAS_CODIGO);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_OTRO_IMPUESTO_COMPRAS_CODIGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_PRECIO_DE_COMPRA_0);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_PRECIO_DE_COMPRA_0);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFechaColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_PRECIO_ACTUALIZADO);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_PRECIO_ACTUALIZADO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_REQUIERE_NRO_SERIE);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_REQUIERE_NRO_SERIE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_COSTO_DOLAR);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_COSTO_DOLAR);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_COMENTARIO);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_COMENTARIO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_COMENTA_FACTURA);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_COMENTA_FACTURA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_ID_RETENCION);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_ID_RETENCION.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_ID_RETENCION_VENTAS);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_ID_RETENCION_VENTAS.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_ID_RETENCION_COMPRAS);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_ID_RETENCION_COMPRAS.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_RETENCION_VENTAS_CODIGO);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_RETENCION_VENTAS_CODIGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_RETENCION_COMPRAS_CODIGO);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_RETENCION_COMPRAS_CODIGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(lista_producto_util::$LABEL_NOTAS);
			$reporte->setsDescripcion(lista_producto_util::$LABEL_NOTAS);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=lista_producto_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
		return $arrColumnasGlobales;
	}		
	
	public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array {
		$arrColumnasGlobales=array();
		//$noExiste=false;
		
		
		
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
				
				$classes[]=new Classe(producto::$class);
				$classes[]=new Classe(unidad::$class);
				$classes[]=new Classe(unidad::$class);
				$classes[]=new Classe(categoria_producto::$class);
				$classes[]=new Classe(sub_categoria_producto::$class);
				$classes[]=new Classe(tipo_producto::$class);
				$classes[]=new Classe(bodega::$class);
				$classes[]=new Classe(cuenta::$class);
				$classes[]=new Classe(cuenta::$class);
				$classes[]=new Classe(cuenta::$class);
				$classes[]=new Classe(otro_suplidor::$class);
				$classes[]=new Classe(impuesto::$class);
				$classes[]=new Classe(impuesto::$class);
				$classes[]=new Classe(impuesto::$class);
				$classes[]=new Classe(otro_impuesto::$class);
				$classes[]=new Classe(otro_impuesto::$class);
				$classes[]=new Classe(otro_impuesto::$class);
				$classes[]=new Classe(retencion::$class);
				$classes[]=new Classe(retencion::$class);
				$classes[]=new Classe(retencion::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==producto::$class) {
						$classes[]=new Classe(producto::$class);
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
					if($clas==tipo_producto::$class) {
						$classes[]=new Classe(tipo_producto::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==bodega::$class) {
						$classes[]=new Classe(bodega::$class);
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
					if($clas==otro_suplidor::$class) {
						$classes[]=new Classe(otro_suplidor::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==impuesto::$class) {
						$classes[]=new Classe(impuesto::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==impuesto::$class) {
						$classes[]=new Classe(impuesto::$class);
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
					if($clas==otro_impuesto::$class) {
						$classes[]=new Classe(otro_impuesto::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==otro_impuesto::$class) {
						$classes[]=new Classe(otro_impuesto::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==retencion::$class) {
						$classes[]=new Classe(retencion::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==retencion::$class) {
						$classes[]=new Classe(retencion::$class);
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
					if($clas==producto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(producto::$class);
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
					if($clas==retencion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(retencion::$class);
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
				
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_ID, lista_producto_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_ID_PRODUCTO, lista_producto_util::$ID_PRODUCTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_CODIGO_PRODUCTO, lista_producto_util::$CODIGO_PRODUCTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_DESCRIPCION_PRODUCTO, lista_producto_util::$DESCRIPCION_PRODUCTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_PRECIO1, lista_producto_util::$PRECIO1,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_PRECIO2, lista_producto_util::$PRECIO2,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_PRECIO3, lista_producto_util::$PRECIO3,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_PRECIO4, lista_producto_util::$PRECIO4,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_COSTO, lista_producto_util::$COSTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_ID_UNIDAD_COMPRA, lista_producto_util::$ID_UNIDAD_COMPRA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_UNIDAD_EN_COMPRA, lista_producto_util::$UNIDAD_EN_COMPRA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_EQUIVALENCIA_EN_COMPRA, lista_producto_util::$EQUIVALENCIA_EN_COMPRA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_ID_UNIDAD_VENTA, lista_producto_util::$ID_UNIDAD_VENTA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_UNIDAD_EN_VENTA, lista_producto_util::$UNIDAD_EN_VENTA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_EQUIVALENCIA_EN_VENTA, lista_producto_util::$EQUIVALENCIA_EN_VENTA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_CANTIDAD_TOTAL, lista_producto_util::$CANTIDAD_TOTAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_CANTIDAD_MINIMA, lista_producto_util::$CANTIDAD_MINIMA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_ID_CATEGORIA_PRODUCTO, lista_producto_util::$ID_CATEGORIA_PRODUCTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_ID_SUB_CATEGORIA_PRODUCTO, lista_producto_util::$ID_SUB_CATEGORIA_PRODUCTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_ACEPTA_LOTE, lista_producto_util::$ACEPTA_LOTE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_VALOR_INVENTARIO, lista_producto_util::$VALOR_INVENTARIO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_IMAGEN, lista_producto_util::$IMAGEN,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_INCREMENTO1, lista_producto_util::$INCREMENTO1,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_INCREMENTO2, lista_producto_util::$INCREMENTO2,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_INCREMENTO3, lista_producto_util::$INCREMENTO3,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_INCREMENTO4, lista_producto_util::$INCREMENTO4,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_CODIGO_FABRICANTE, lista_producto_util::$CODIGO_FABRICANTE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_PRODUCTO_FISICO, lista_producto_util::$PRODUCTO_FISICO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_SITUACION_PRODUCTO, lista_producto_util::$SITUACION_PRODUCTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_ID_TIPO_PRODUCTO, lista_producto_util::$ID_TIPO_PRODUCTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_TIPO_PRODUCTO_CODIGO, lista_producto_util::$TIPO_PRODUCTO_CODIGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_ID_BODEGA, lista_producto_util::$ID_BODEGA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_MOSTRAR_COMPONENTE, lista_producto_util::$MOSTRAR_COMPONENTE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_FACTURA_SIN_STOCK, lista_producto_util::$FACTURA_SIN_STOCK,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_AVISA_EXPIRACION, lista_producto_util::$AVISA_EXPIRACION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_FACTURA_CON_PRECIO, lista_producto_util::$FACTURA_CON_PRECIO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_PRODUCTO_EQUIVALENTE, lista_producto_util::$PRODUCTO_EQUIVALENTE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_ID_CUENTA_COMPRA, lista_producto_util::$ID_CUENTA_COMPRA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_ID_CUENTA_VENTA, lista_producto_util::$ID_CUENTA_VENTA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_ID_CUENTA_INVENTARIO, lista_producto_util::$ID_CUENTA_INVENTARIO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_CUENTA_COMPRA_CODIGO, lista_producto_util::$CUENTA_COMPRA_CODIGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_CUENTA_VENTA_CODIGO, lista_producto_util::$CUENTA_VENTA_CODIGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_CUENTA_INVENTARIO_CODIGO, lista_producto_util::$CUENTA_INVENTARIO_CODIGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_ID_OTRO_SUPLIDOR, lista_producto_util::$ID_OTRO_SUPLIDOR,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_ID_IMPUESTO, lista_producto_util::$ID_IMPUESTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_ID_IMPUESTO_VENTAS, lista_producto_util::$ID_IMPUESTO_VENTAS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_ID_IMPUESTO_COMPRAS, lista_producto_util::$ID_IMPUESTO_COMPRAS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_IMPUESTO1_EN_VENTAS, lista_producto_util::$IMPUESTO1_EN_VENTAS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_IMPUESTO1_EN_COMPRAS, lista_producto_util::$IMPUESTO1_EN_COMPRAS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_ULTIMA_VENTA, lista_producto_util::$ULTIMA_VENTA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_ID_OTRO_IMPUESTO, lista_producto_util::$ID_OTRO_IMPUESTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_ID_OTRO_IMPUESTO_VENTAS, lista_producto_util::$ID_OTRO_IMPUESTO_VENTAS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_ID_OTRO_IMPUESTO_COMPRAS, lista_producto_util::$ID_OTRO_IMPUESTO_COMPRAS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_OTRO_IMPUESTO_VENTAS_CODIGO, lista_producto_util::$OTRO_IMPUESTO_VENTAS_CODIGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_OTRO_IMPUESTO_COMPRAS_CODIGO, lista_producto_util::$OTRO_IMPUESTO_COMPRAS_CODIGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_PRECIO_DE_COMPRA_0, lista_producto_util::$PRECIO_DE_COMPRA_0,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_PRECIO_ACTUALIZADO, lista_producto_util::$PRECIO_ACTUALIZADO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_REQUIERE_NRO_SERIE, lista_producto_util::$REQUIERE_NRO_SERIE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_COSTO_DOLAR, lista_producto_util::$COSTO_DOLAR,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_COMENTARIO, lista_producto_util::$COMENTARIO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_COMENTA_FACTURA, lista_producto_util::$COMENTA_FACTURA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_ID_RETENCION, lista_producto_util::$ID_RETENCION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_ID_RETENCION_VENTAS, lista_producto_util::$ID_RETENCION_VENTAS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_ID_RETENCION_COMPRAS, lista_producto_util::$ID_RETENCION_COMPRAS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_RETENCION_VENTAS_CODIGO, lista_producto_util::$RETENCION_VENTAS_CODIGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_RETENCION_COMPRAS_CODIGO, lista_producto_util::$RETENCION_COMPRAS_CODIGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$LABEL_NOTAS, lista_producto_util::$NOTAS,false,""); $arrOrderBy[]=$orderBy;
		
		$arrOrderBy = OrderBy::ActualizarInformacion($arrOrderBy);
		
		return $arrOrderBy;
	}
	
	public static function getOrderByListaRel() : array {
		$arrOrderBy=array();
		$orderBy=new OrderBy();
		
		
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
		
		

		if(Funciones::existeCadenaArrayOrderBy('Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Producto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo Producto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descripcion Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descripcion Producto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Precio1',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Precio1',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Precio2',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Precio2',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Precio3',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Precio3',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Precio4',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Precio4',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Costo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Costo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Unidad Compra',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Unidad Compra',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Unidad En Compra',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Unidad En Compra',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Equivalencia En Compra',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Equivalencia En Compra',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Unidad Venta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Unidad Venta',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Unidad En Venta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Unidad En Venta',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Equivalencia En Venta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Equivalencia En Venta',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cantidad Total',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cantidad Total',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cantidad Minima',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cantidad Minima',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Categoria Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Categoria Producto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Sub Categoria Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Sub Categoria Producto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Acepta Lote',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Acepta Lote',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Valor Inventario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Valor Inventario',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Imagen',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Imagen',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Incremento1',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Incremento1',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Incremento2',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Incremento2',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Incremento3',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Incremento3',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Incremento4',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Incremento4',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo Fabricante',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo Fabricante',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Producto Fisico',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Producto Fisico',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Situacion Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Situacion Producto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Tipo Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Tipo Producto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Tipo Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Tipo Producto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Bodega',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Bodega',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Mostrar Componente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Mostrar Componente',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Factura Sin Stock',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Factura Sin Stock',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Avisa Expiracion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Avisa Expiracion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Factura Con Precio',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Factura Con Precio',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Producto Equivalente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Producto Equivalente',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Cuenta Compra',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Cuenta Compra',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Cuenta Venta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Cuenta Venta',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Cuenta Inventario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Cuenta Inventario',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cuenta Compra',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuenta Compra',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cuenta Venta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuenta Venta',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cuenta Inventario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuenta Inventario',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Otro Suplidor',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Otro Suplidor',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Impuesto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Impuesto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Impuesto Ventas',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Impuesto Ventas',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Impuesto Compras',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Impuesto Compras',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Impuesto1 En Ventas',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Impuesto1 En Ventas',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Impuesto1 En Compras',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Impuesto1 En Compras',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ultima Venta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ultima Venta',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Otro Impuesto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Otro Impuesto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Otro Impuesto Ventas',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Otro Impuesto Ventas',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Otro Impuesto Compras',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Otro Impuesto Compras',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Otro Impuesto Ventas',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Otro Impuesto Ventas',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Otro Impuesto Compras',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Otro Impuesto Compras',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Precio De Compra 0',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Precio De Compra 0',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Precio Actualizado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Precio Actualizado',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Requiere Nro Serie',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Requiere Nro Serie',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Costo Dolar',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Costo Dolar',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Comentario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Comentario',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Comenta Factura',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Comenta Factura',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Retencion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Retencion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Retencion Ventas',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Retencion Ventas',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Retencion Compras',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Retencion Compras',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Retencion Ventas',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Retencion Ventas',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Retencion Compras',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Retencion Compras',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Notas',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Notas',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',lista_producto $lista_producto,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_producto_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getcodigo_producto(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descripcion Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getdescripcion_producto(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Precio1',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getprecio1(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Precio2',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getprecio2(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Precio3',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getprecio3(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Precio4',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getprecio4(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Costo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getcosto(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Unidad Compra',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_unidad_compra_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Unidad En Compra',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getunidad_en_compra(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Equivalencia En Compra',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getequivalencia_en_compra(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Unidad Venta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_unidad_venta_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Unidad En Venta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getunidad_en_venta(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Equivalencia En Venta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getequivalencia_en_venta(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cantidad Total',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getcantidad_total(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cantidad Minima',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getcantidad_minima(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Categoria Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_categoria_producto_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Sub Categoria Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_sub_categoria_producto_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Acepta Lote',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getacepta_lote(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Valor Inventario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getvalor_inventario(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Imagen',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getimagen(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Incremento1',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getincremento1(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Incremento2',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getincremento2(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Incremento3',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getincremento3(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Incremento4',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getincremento4(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo Fabricante',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getcodigo_fabricante(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Producto Fisico',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getproducto_fisico(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Situacion Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getsituacion_producto(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Tipo Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_tipo_producto_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Tipo Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->gettipo_producto_codigo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Bodega',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_bodega_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Mostrar Componente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getmostrar_componente(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Factura Sin Stock',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getfactura_sin_stock(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Avisa Expiracion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getavisa_expiracion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Factura Con Precio',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getfactura_con_precio(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Producto Equivalente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getproducto_equivalente(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Cuenta Compra',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_cuenta_compra_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Cuenta Venta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_cuenta_venta_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Cuenta Inventario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_cuenta_inventario_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cuenta Compra',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getcuenta_compra_codigo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cuenta Venta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getcuenta_venta_codigo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cuenta Inventario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getcuenta_inventario_codigo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Otro Suplidor',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_otro_suplidor_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Impuesto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_impuesto_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Impuesto Ventas',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_impuesto_ventas_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Impuesto Compras',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_impuesto_compras_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Impuesto1 En Ventas',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getimpuesto1_en_ventas(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Impuesto1 En Compras',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getimpuesto1_en_compras(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ultima Venta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getultima_venta(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Otro Impuesto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_otro_impuesto_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Otro Impuesto Ventas',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_otro_impuesto_ventas_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Otro Impuesto Compras',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_otro_impuesto_compras_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Otro Impuesto Ventas',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getotro_impuesto_ventas_codigo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Otro Impuesto Compras',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getotro_impuesto_compras_codigo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Precio De Compra 0',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getprecio_de_compra_0(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Precio Actualizado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getprecio_actualizado(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Requiere Nro Serie',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getrequiere_nro_serie(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Costo Dolar',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getcosto_dolar(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Comentario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getcomentario(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Comenta Factura',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getcomenta_factura(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Retencion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_retencion_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Retencion Ventas',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_retencion_ventas_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Retencion Compras',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_retencion_compras_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Retencion Ventas',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getretencion_ventas_codigo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Retencion Compras',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getretencion_compras_codigo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Notas',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getnotas(),40,6,1); $row[]=$cellReport;
		}
		
		return $row;
	}		
	
	/*XML DESCRIPCION*/
	
	public static function getproductoDescripcion(?producto $producto) : string {
		$sDescripcion='none';
		if($producto!==null) {
			$sDescripcion=producto_util::getproductoDescripcion($producto);
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
	
	public static function gettipo_productoDescripcion(?tipo_producto $tipo_producto) : string {
		$sDescripcion='none';
		if($tipo_producto!==null) {
			$sDescripcion=tipo_producto_util::gettipo_productoDescripcion($tipo_producto);
		}
		return $sDescripcion;
	}	
	
	public static function getbodegaDescripcion(?bodega $bodega) : string {
		$sDescripcion='none';
		if($bodega!==null) {
			$sDescripcion=bodega_util::getbodegaDescripcion($bodega);
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
	
	public static function getcuenta_ventaDescripcion(?cuenta $cuenta) : string {
		$sDescripcion='none';
		if($cuenta!==null) {
			$sDescripcion=cuenta_util::getcuentaDescripcion($cuenta);
		}
		return $sDescripcion;
	}	
	
	public static function getcuenta_inventarioDescripcion(?cuenta $cuenta) : string {
		$sDescripcion='none';
		if($cuenta!==null) {
			$sDescripcion=cuenta_util::getcuentaDescripcion($cuenta);
		}
		return $sDescripcion;
	}	
	
	public static function getotro_suplidorDescripcion(?otro_suplidor $otro_suplidor) : string {
		$sDescripcion='none';
		if($otro_suplidor!==null) {
			$sDescripcion=otro_suplidor_util::getotro_suplidorDescripcion($otro_suplidor);
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
	
	public static function getimpuesto_ventasDescripcion(?impuesto $impuesto) : string {
		$sDescripcion='none';
		if($impuesto!==null) {
			$sDescripcion=impuesto_util::getimpuestoDescripcion($impuesto);
		}
		return $sDescripcion;
	}	
	
	public static function getimpuesto_comprasDescripcion(?impuesto $impuesto) : string {
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
	
	public static function getotro_impuesto_ventasDescripcion(?otro_impuesto $otro_impuesto) : string {
		$sDescripcion='none';
		if($otro_impuesto!==null) {
			$sDescripcion=otro_impuesto_util::getotro_impuestoDescripcion($otro_impuesto);
		}
		return $sDescripcion;
	}	
	
	public static function getotro_impuesto_comprasDescripcion(?otro_impuesto $otro_impuesto) : string {
		$sDescripcion='none';
		if($otro_impuesto!==null) {
			$sDescripcion=otro_impuesto_util::getotro_impuestoDescripcion($otro_impuesto);
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
	
	public static function getretencion_ventasDescripcion(?retencion $retencion) : string {
		$sDescripcion='none';
		if($retencion!==null) {
			$sDescripcion=retencion_util::getretencionDescripcion($retencion);
		}
		return $sDescripcion;
	}	
	
	public static function getretencion_comprasDescripcion(?retencion $retencion) : string {
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
	
	interface lista_producto_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $lista_productos,int $iIdNuevolista_producto) : int;	
		public static function getIndiceActual(array $lista_productos,lista_producto $lista_producto,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getlista_productoDescripcion(?lista_producto $lista_producto) : string {;	
		public static function setlista_productoDescripcion(?lista_producto $lista_producto,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $lista_productos) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $lista_productos);	
		public static function refrescarFKDescripcion(lista_producto $lista_producto);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',lista_producto $lista_producto,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

