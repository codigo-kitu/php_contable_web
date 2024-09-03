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
namespace com\bydan\contabilidad\inventario\producto\business\data;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\FuncionesSql;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\data\GetEntitiesDataAccessHelper;

/*use com\bydan\framework\contabilidad\business\entity\GeneralEntity;*/
use com\bydan\framework\contabilidad\business\entity\DatoGeneral;
use com\bydan\framework\contabilidad\business\entity\DatoGeneralMinimo;
use com\bydan\framework\contabilidad\business\entity\DatoGeneralMaximo;
use com\bydan\framework\contabilidad\business\logic\QueryWhereSelectParameters;
use com\bydan\framework\contabilidad\business\logic\Pagination;
use com\bydan\framework\contabilidad\business\data\DataAccessHelper;
use com\bydan\framework\contabilidad\util\Connexion;
use com\bydan\framework\contabilidad\util\ParametersType;

use com\bydan\contabilidad\inventario\producto\business\entity\producto;

//FK


use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\entity\empresa;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\data\proveedor_data;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;

use com\bydan\contabilidad\inventario\tipo_producto\business\data\tipo_producto_data;
use com\bydan\contabilidad\inventario\tipo_producto\business\entity\tipo_producto;

use com\bydan\contabilidad\facturacion\impuesto\business\data\impuesto_data;
use com\bydan\contabilidad\facturacion\impuesto\business\entity\impuesto;

use com\bydan\contabilidad\facturacion\otro_impuesto\business\data\otro_impuesto_data;
use com\bydan\contabilidad\facturacion\otro_impuesto\business\entity\otro_impuesto;

use com\bydan\contabilidad\inventario\categoria_producto\business\data\categoria_producto_data;
use com\bydan\contabilidad\inventario\categoria_producto\business\entity\categoria_producto;

use com\bydan\contabilidad\inventario\sub_categoria_producto\business\data\sub_categoria_producto_data;
use com\bydan\contabilidad\inventario\sub_categoria_producto\business\entity\sub_categoria_producto;

use com\bydan\contabilidad\inventario\bodega\business\data\bodega_data;
use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;

use com\bydan\contabilidad\inventario\unidad\business\data\unidad_data;
use com\bydan\contabilidad\inventario\unidad\business\entity\unidad;

use com\bydan\contabilidad\contabilidad\cuenta\business\data\cuenta_data;
use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;

use com\bydan\contabilidad\facturacion\retencion\business\data\retencion_data;
use com\bydan\contabilidad\facturacion\retencion\business\entity\retencion;

//REL

use com\bydan\contabilidad\inventario\lista_precio\business\data\lista_precio_data;
use com\bydan\contabilidad\inventario\producto_bodega\business\data\producto_bodega_data;
use com\bydan\contabilidad\inventario\otro_suplidor\business\data\otro_suplidor_data;
use com\bydan\contabilidad\inventario\lista_cliente\business\data\lista_cliente_data;
use com\bydan\contabilidad\inventario\imagen_producto\business\data\imagen_producto_data;
use com\bydan\contabilidad\inventario\lista_producto\business\data\lista_producto_data;


class producto_data extends GetEntitiesDataAccessHelper implements producto_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='inv_';
	public static string $TABLE_NAME='inv_producto';			
	public static string $TABLE_NAME_producto='producto';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_PRODUCTO_INSERT(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_PRODUCTO_UPDATE(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_PRODUCTO_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_PRODUCTO_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $producto_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'producto';
		
		producto_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('INVENTARIO');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->producto_DataAccessAdditional=new productoDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_empresa,id_proveedor,codigo,nombre,costo,activo,id_tipo_producto,cantidad_inicial,id_impuesto,id_otro_impuesto,impuesto_ventas,otro_impuesto_ventas,impuesto_compras,otro_impuesto_compras,id_categoria_producto,id_sub_categoria_producto,id_bodega_defecto,id_unidad_compra,equivalencia_compra,id_unidad_venta,equivalencia_venta,descripcion,imagen,observacion,comenta_factura,codigo_fabricante,cantidad,cantidad_minima,cantidad_maxima,factura_sin_stock,mostrar_componente,producto_equivalente,avisa_expiracion,requiere_serie,acepta_lote,id_cuenta_venta,id_cuenta_compra,id_cuenta_costo,valor_inventario,producto_fisico,ultima_venta,precio_actualizado,id_retencion,retencion_ventas,retencion_compras,factura_con_precio) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%d,\'%s\',\'%s\',%f,\'%d\',%d,%f,%d,%s,\'%d\',\'%d\',\'%d\',\'%d\',%d,%d,%d,%d,%f,%d,%f,\'%s\',\'%s\',\'%s\',\'%d\',\'%s\',%f,%f,%f,\'%d\',\'%d\',\'%d\',\'%d\',\'%d\',\'%d\',%s,%s,%s,%f,%d,\'%s\',\'%s\',%s,\'%d\',\'%d\',%d)';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_empresa=%d,id_proveedor=%d,codigo=\'%s\',nombre=\'%s\',costo=%f,activo=\'%d\',id_tipo_producto=%d,cantidad_inicial=%f,id_impuesto=%d,id_otro_impuesto=%s,impuesto_ventas=\'%d\',otro_impuesto_ventas=\'%d\',impuesto_compras=\'%d\',otro_impuesto_compras=\'%d\',id_categoria_producto=%d,id_sub_categoria_producto=%d,id_bodega_defecto=%d,id_unidad_compra=%d,equivalencia_compra=%f,id_unidad_venta=%d,equivalencia_venta=%f,descripcion=\'%s\',imagen=\'%s\',observacion=\'%s\',comenta_factura=\'%d\',codigo_fabricante=\'%s\',cantidad=%f,cantidad_minima=%f,cantidad_maxima=%f,factura_sin_stock=\'%d\',mostrar_componente=\'%d\',producto_equivalente=\'%d\',avisa_expiracion=\'%d\',requiere_serie=\'%d\',acepta_lote=\'%d\',id_cuenta_venta=%s,id_cuenta_compra=%s,id_cuenta_costo=%s,valor_inventario=%f,producto_fisico=%d,ultima_venta=\'%s\',precio_actualizado=\'%s\',id_retencion=%s,retencion_ventas=\'%d\',retencion_compras=\'%d\',factura_con_precio=%d where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.costo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.activo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_tipo_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cantidad_inicial,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_impuesto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_otro_impuesto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.impuesto_ventas,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.otro_impuesto_ventas,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.impuesto_compras,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.otro_impuesto_compras,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_categoria_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_sub_categoria_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_bodega_defecto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_unidad_compra,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.equivalencia_compra,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_unidad_venta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.equivalencia_venta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.imagen,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.observacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.comenta_factura,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo_fabricante,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cantidad,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cantidad_minima,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cantidad_maxima,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.factura_sin_stock,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.mostrar_componente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.producto_equivalente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.avisa_expiracion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.requiere_serie,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.acepta_lote,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta_venta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta_compra,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta_costo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.valor_inventario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.producto_fisico,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.ultima_venta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.precio_actualizado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_retencion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.retencion_ventas,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.retencion_compras,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.factura_con_precio from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(producto $producto,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($producto->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=producto_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($producto->getId(),$connexion));				
				
			} else if ($producto->getIsChanged()) {
				if($producto->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=producto_data::$QUERY_INSERT;
					
					
					
					

					//$id_otro_impuesto='null';
					//if($producto->getid_otro_impuesto()!==null && $producto->getid_otro_impuesto()>=0) {
						//$id_otro_impuesto=$producto->getid_otro_impuesto();
					//} else {
						//$id_otro_impuesto='null';
					//}

					//$id_cuenta_venta='null';
					//if($producto->getid_cuenta_venta()!==null && $producto->getid_cuenta_venta()>=0) {
						//$id_cuenta_venta=$producto->getid_cuenta_venta();
					//} else {
						//$id_cuenta_venta='null';
					//}

					//$id_cuenta_compra='null';
					//if($producto->getid_cuenta_compra()!==null && $producto->getid_cuenta_compra()>=0) {
						//$id_cuenta_compra=$producto->getid_cuenta_compra();
					//} else {
						//$id_cuenta_compra='null';
					//}

					//$id_cuenta_costo='null';
					//if($producto->getid_cuenta_costo()!==null && $producto->getid_cuenta_costo()>=0) {
						//$id_cuenta_costo=$producto->getid_cuenta_costo();
					//} else {
						//$id_cuenta_costo='null';
					//}

					//$id_retencion='null';
					//if($producto->getid_retencion()!==null && $producto->getid_retencion()>=0) {
						//$id_retencion=$producto->getid_retencion();
					//} else {
						//$id_retencion='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$producto->getid_empresa(),$producto->getid_proveedor(),Funciones::GetRealScapeString($producto->getcodigo(),$connexion),Funciones::GetRealScapeString($producto->getnombre(),$connexion),$producto->getcosto(),$producto->getactivo(),$producto->getid_tipo_producto(),$producto->getcantidad_inicial(),$producto->getid_impuesto(),Funciones::GetNullString($producto->getid_otro_impuesto()),$producto->getimpuesto_ventas(),$producto->getotro_impuesto_ventas(),$producto->getimpuesto_compras(),$producto->getotro_impuesto_compras(),$producto->getid_categoria_producto(),$producto->getid_sub_categoria_producto(),$producto->getid_bodega_defecto(),$producto->getid_unidad_compra(),$producto->getequivalencia_compra(),$producto->getid_unidad_venta(),$producto->getequivalencia_venta(),Funciones::GetRealScapeString($producto->getdescripcion(),$connexion),Funciones::GetRealScapeString($producto->getimagen(),$connexion),Funciones::GetRealScapeString($producto->getobservacion(),$connexion),$producto->getcomenta_factura(),Funciones::GetRealScapeString($producto->getcodigo_fabricante(),$connexion),$producto->getcantidad(),$producto->getcantidad_minima(),$producto->getcantidad_maxima(),$producto->getfactura_sin_stock(),$producto->getmostrar_componente(),$producto->getproducto_equivalente(),$producto->getavisa_expiracion(),$producto->getrequiere_serie(),$producto->getacepta_lote(),Funciones::GetNullString($producto->getid_cuenta_venta()),Funciones::GetNullString($producto->getid_cuenta_compra()),Funciones::GetNullString($producto->getid_cuenta_costo()),$producto->getvalor_inventario(),$producto->getproducto_fisico(),Funciones::GetRealScapeString($producto->getultima_venta(),$connexion),Funciones::GetRealScapeString($producto->getprecio_actualizado(),$connexion),Funciones::GetNullString($producto->getid_retencion()),$producto->getretencion_ventas(),$producto->getretencion_compras(),$producto->getfactura_con_precio() );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=producto_data::$QUERY_UPDATE;			
					
					
					
					

					//$id_otro_impuesto='null';
					//if($producto->getid_otro_impuesto()!==null && $producto->getid_otro_impuesto()>=0) {
						//$id_otro_impuesto=$producto->getid_otro_impuesto();
					//} else {
						//$id_otro_impuesto='null';
					//}

					//$id_cuenta_venta='null';
					//if($producto->getid_cuenta_venta()!==null && $producto->getid_cuenta_venta()>=0) {
						//$id_cuenta_venta=$producto->getid_cuenta_venta();
					//} else {
						//$id_cuenta_venta='null';
					//}

					//$id_cuenta_compra='null';
					//if($producto->getid_cuenta_compra()!==null && $producto->getid_cuenta_compra()>=0) {
						//$id_cuenta_compra=$producto->getid_cuenta_compra();
					//} else {
						//$id_cuenta_compra='null';
					//}

					//$id_cuenta_costo='null';
					//if($producto->getid_cuenta_costo()!==null && $producto->getid_cuenta_costo()>=0) {
						//$id_cuenta_costo=$producto->getid_cuenta_costo();
					//} else {
						//$id_cuenta_costo='null';
					//}

					//$id_retencion='null';
					//if($producto->getid_retencion()!==null && $producto->getid_retencion()>=0) {
						//$id_retencion=$producto->getid_retencion();
					//} else {
						//$id_retencion='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$producto->getid_empresa(),$producto->getid_proveedor(),Funciones::GetRealScapeString($producto->getcodigo(),$connexion),Funciones::GetRealScapeString($producto->getnombre(),$connexion),$producto->getcosto(),$producto->getactivo(),$producto->getid_tipo_producto(),$producto->getcantidad_inicial(),$producto->getid_impuesto(),Funciones::GetNullString($producto->getid_otro_impuesto()),$producto->getimpuesto_ventas(),$producto->getotro_impuesto_ventas(),$producto->getimpuesto_compras(),$producto->getotro_impuesto_compras(),$producto->getid_categoria_producto(),$producto->getid_sub_categoria_producto(),$producto->getid_bodega_defecto(),$producto->getid_unidad_compra(),$producto->getequivalencia_compra(),$producto->getid_unidad_venta(),$producto->getequivalencia_venta(),Funciones::GetRealScapeString($producto->getdescripcion(),$connexion),Funciones::GetRealScapeString($producto->getimagen(),$connexion),Funciones::GetRealScapeString($producto->getobservacion(),$connexion),$producto->getcomenta_factura(),Funciones::GetRealScapeString($producto->getcodigo_fabricante(),$connexion),$producto->getcantidad(),$producto->getcantidad_minima(),$producto->getcantidad_maxima(),$producto->getfactura_sin_stock(),$producto->getmostrar_componente(),$producto->getproducto_equivalente(),$producto->getavisa_expiracion(),$producto->getrequiere_serie(),$producto->getacepta_lote(),Funciones::GetNullString($producto->getid_cuenta_venta()),Funciones::GetNullString($producto->getid_cuenta_compra()),Funciones::GetNullString($producto->getid_cuenta_costo()),$producto->getvalor_inventario(),$producto->getproducto_fisico(),Funciones::GetRealScapeString($producto->getultima_venta(),$connexion),Funciones::GetRealScapeString($producto->getprecio_actualizado(),$connexion),Funciones::GetNullString($producto->getid_retencion()),$producto->getretencion_ventas(),$producto->getretencion_compras(),$producto->getfactura_con_precio(), Funciones::GetRealScapeString($producto->getId(),$connexion), Funciones::GetRealScapeString($producto->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($producto, $connexion,$strQuerySaveComplete,producto_data::$TABLE_NAME,producto_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				producto_data::savePrepared($producto, $connexion,$strQuerySave,producto_data::$TABLE_NAME,producto_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			producto_data::setproducto_OriginalStatic($producto);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(producto $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				producto_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					producto_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					producto_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(producto $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					producto_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
					mysqli_stmt_execute($prepare_statement);
											
				} else {
					/*PARA POSTGRES*/
				}
	
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$numeroRegistroModificado=mysqli_stmt_affected_rows($prepare_statement);													
					
				} else {
					/*PARA POSTGRES*/
				}
	
				if($numeroRegistroModificado<=0) {
					throw new Exception("No se actualizo los datos,intentelo nuevamente");
				}
	
				if(Constantes::$BIT_ES_POSTGRES==false) {
					if($entity->getIsWithIdentity()) {
						$id=mysqli_stmt_insert_id($prepare_statement);															
					}
					
					mysqli_stmt_close($prepare_statement);
					
				} else {
					/*PAARA POSTGRES*/
				}
					
				if($entity->getIsWithIdentity()) {
					$entity->setId($id);
				}
				
			} else {
				Funciones::writeQueryFile($sQuerySave);
			}		
	
		} catch(Exception $ex) {
			throw $ex;
		}		
	}
	
	public static function update(producto $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					producto_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
					mysqli_stmt_execute($prepare_statement);						
					
				} else {
					/*PARA POSTGRES*/
				}
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$numeroRegistroModificado=mysqli_stmt_affected_rows($prepare_statement);
								
					mysqli_stmt_close($prepare_statement);						
					
				} else {
					/*PARA POSTGRES*/
				}
					
				if($numeroRegistroModificado<=0) {
					throw new Exception('No se actualizo los datos,intentelo nuevamente');
				}
	
			} else {
				Funciones::writeQueryFile($sQuerySave);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function delete(producto $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					producto_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
					mysqli_stmt_execute($prepare_statement);						
					
				} else {
					/*PARA POSTGRES*/
				}
	
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$numeroRegistroModificado=mysqli_stmt_affected_rows($prepare_statement);
								
					mysqli_stmt_close($prepare_statement);						
					
				} else {
					/*PARA POSTGRES*/
				}
	
				if($numeroRegistroModificado<=0) {
					throw new Exception("No se actualizo los datos,intentelo nuevamente");
				}
	
			} else {
				Funciones::writeQueryFile($sQuerySave);
			}			
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	/*EJECUTAR QUERY*/
	public function executeQuery(Connexion $connexion, string $sQueryExecute) {	
        try {		
			$connexion->ejecutarQuerySimple($sQueryExecute);
			
      	} catch(Exception $e) {
			throw $e;
      	}		    	
    }
	
	public function executeQueryValor(Connexion $connexion, string $sQueryExecuteValor,string $sNombreCampo) {	
		$value=null;
			
        try {		
			
			$resultValor=null;
			$resultSetValor=null;			
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQueryExecuteValor);
        	}
						
			$resultValor = $connexion->ejecutarQuery($sQueryExecuteValor);
        	
			$resultSetValor =Connexion::getResultSet($resultValor);
					
			if($resultSetValor) {
				$value=$resultSetValor[$sNombreCampo];
			}
			Connexion::liberarResult($resultValor);	
			
      	} catch(Exception $e) {
			throw $e;
      	}
		
		return $value;
    }	
	
	/*TRAER ENTITY*/
	public function getEntity(Connexion $connexion, ?int $id) : ?producto {		
		$entity = new producto();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=producto_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=producto_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//Inventario.producto.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setproducto_Original(new producto());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,producto_data::$IS_WITH_SCHEMA);         	    
				/*$entity=producto_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setproducto_Original(parent::getEntityPrefijoEntityResult("",$entity->getproducto_Original(),$resultSet,producto_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setproducto_Original(producto_data::getEntityBaseResult("",$entity->getproducto_Original(),$resultSet));
				//$entity->setproducto_Original($this->getEntityBaseResult("",$entity->getproducto_Original(),$resultSet));
      	    } else {
				$entity =null;
			}
			
			if($entity!=null) {
				parent::setGeneralEntityIsNewFalseIsChangedFalse($entity);
			}
			
			Connexion::liberarResult($result); 

       	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?producto {
		$entity = new producto();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=producto_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=producto_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,producto_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".Inventario.producto.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setproducto_Original(new producto());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,producto_data::$IS_WITH_SCHEMA);         	    
				/*$entity=producto_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setproducto_Original(parent::getEntityPrefijoEntityResult("",$entity->getproducto_Original(),$resultSet,producto_data::$IS_WITH_SCHEMA));         		
				////$entity->setproducto_Original(producto_data::getEntityBaseResult("",$entity->getproducto_Original(),$resultSet));
				//$entity->setproducto_Original($this->getEntityBaseResult("",$entity->getproducto_Original(),$resultSet));
      	    } else {
				$entity =null;
			}
			
			if($entity !=null) {
				parent::setGeneralEntityIsNewFalseIsChangedFalse($entity);
			}
			
			Connexion::liberarResult($result); 

      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	 
	/*TRAER ENTITIES*/
	public function getEntities(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : array {
		$entities = array();
		$entity = new producto();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=producto_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=producto_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,producto_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new producto();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,producto_data::$IS_WITH_SCHEMA);         		
				/*$entity=producto_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setproducto_Original( new producto());
				
				//$entity->setproducto_Original(parent::getEntityPrefijoEntityResult("",$entity->getproducto_Original(),$resultSet,producto_data::$IS_WITH_SCHEMA));         		
				////$entity->setproducto_Original(producto_data::getEntityBaseResult("",$entity->getproducto_Original(),$resultSet));
				//$entity->setproducto_Original($this->getEntityBaseResult("",$entity->getproducto_Original(),$resultSet));
								
      	    	$entities[]=$entity;
				
				$i++;
				
				$resultSet =Connexion::getResultSet($result);
      	    }
    		
			parent::setGeneralEntitiesIsNewFalseIsChangedFalse($entities);
      	   
			Connexion::liberarResult($result);  
			
			if($queryWhereSelectParameters->getPagination()->getBlnConNumeroMaximo() && !$this->isForFKData) {
				$this->setCountSelect($queryWhereSelectParameters,$entity,$connexion);
			}
			
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entities;	
    }	
	
	public function getEntitiesConnexionQuerySelectQueryWhere(Connexion $connexion,string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) : array {
		$entities = array();
		$entity = new producto();		  
		$sQuery='';
	
        try {     	   
        	
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityQueryWhereSelect($entity,$queryWhereSelectParameters,$strQuerySelect);
				
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new producto();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,producto_data::$IS_WITH_SCHEMA);         		
				/*$entity=producto_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setproducto_Original( new producto());
				
				//$entity->setproducto_Original(parent::getEntityPrefijoEntityResult("",$entity->getproducto_Original(),$resultSet,producto_data::$IS_WITH_SCHEMA));         		
				////$entity->setproducto_Original(producto_data::getEntityBaseResult("",$entity->getproducto_Original(),$resultSet));
				//$entity->setproducto_Original($this->getEntityBaseResult("",$entity->getproducto_Original(),$resultSet));
				
      	    	$entities[]=$entity;
				
				$i++;
				
				$resultSet =Connexion::getResultSet($result);
      	    }
			
			parent::setGeneralEntitiesIsNewFalseIsChangedFalse($entities);
			
			Connexion::liberarResult($result); 
 			
			if($queryWhereSelectParameters->getPagination()->getBlnConNumeroMaximo() && !$this->isForFKData) {
				$this->setCountSelect($queryWhereSelectParameters,$entity,$connexion);
			}
			
      	} catch(Exception $e) {
			throw $e;
      	}		
    	
		return $entities;	
    }
	
	public function getEntitiesSimpleQueryBuild(Connexion $connexion,string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters) : array {
		$entities = array();
		$entity = new producto();		  
		$sQuery='';
	
        try {     	   
        					
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesSimpleQueryBuild($queryWhereSelectParameters,$strQuerySelect);
							
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new producto();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,producto_data::$IS_WITH_SCHEMA);         		
				/*$entity=producto_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setproducto_Original( new producto());				
				//$entity->setproducto_Original(parent::getEntityPrefijoEntityResult("",$entity->getproducto_Original(),$resultSet,producto_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setproducto_Original(producto_data::getEntityBaseResult("",$entity->getproducto_Original(),$resultSet));
				//$entity->setproducto_Original($this->getEntityBaseResult("",$entity->getproducto_Original(),$resultSet));
				
      	    	$entities[]=$entity;
				
				$i++;
				
				$resultSet =Connexion::getResultSet($result);
      	    }
			
			parent::setGeneralEntitiesIsNewFalseIsChangedFalse($entities);
			
			Connexion::liberarResult($result); 
			
			if($queryWhereSelectParameters->getPagination()->getBlnConNumeroMaximo() && !$this->isForFKData) {
				$this->setCountSelect($queryWhereSelectParameters,$entity,$connexion);
			}
       	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entities;	
    }
	
	/*----------------------- SELECT COUNT ------------------------*/
	
	public function getCountSelect(Connexion $connexion) : int {
		$count=0;
		
		$sQueryExecuteValor=producto_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,producto $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,producto_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,producto_data::$QUERY_SELECT_COUNT);
				
		if(Constantes::$IS_DEVELOPING_SQL)  {
            Funciones::mostrarMensajeDeveloping($sQueryCount);
        }
			
		$resultCount = $connexion->ejecutarQuery($sQueryCount);
        	
		$resultSetCount =Connexion::getResultSet($resultCount);
				
	    if($resultSetCount) {
	       	$count=$resultSetCount['value'];
	       	$paginationAux->setIntNumeroMaximo($count);
	    }
				
		$queryWhereSelectParameters->setPagination($paginationAux);
				
		Connexion::liberarResult($resultCount);				
	}
	
	/*--------------------------- TRAER FKs --------------------------*/
	
	public function  getempresa(Connexion $connexion,$relproducto) : ?empresa{

		$empresa= new empresa();

		try {
			$empresaDataAccess=new empresa_data();
			$empresaDataAccess->isForFKData=$this->isForFKDataRels;
			$empresa=$empresaDataAccess->getEntity($connexion,$relproducto->getid_empresa());

		} catch(Exception $e) {
			throw $e;
		}

		return $empresa;
	}


	public function  getproveedor(Connexion $connexion,$relproducto) : ?proveedor{

		$proveedor= new proveedor();

		try {
			$proveedorDataAccess=new proveedor_data();
			$proveedorDataAccess->isForFKData=$this->isForFKDataRels;
			$proveedor=$proveedorDataAccess->getEntity($connexion,$relproducto->getid_proveedor());

		} catch(Exception $e) {
			throw $e;
		}

		return $proveedor;
	}


	public function  gettipo_producto(Connexion $connexion,$relproducto) : ?tipo_producto{

		$tipo_producto= new tipo_producto();

		try {
			$tipo_productoDataAccess=new tipo_producto_data();
			$tipo_productoDataAccess->isForFKData=$this->isForFKDataRels;
			$tipo_producto=$tipo_productoDataAccess->getEntity($connexion,$relproducto->getid_tipo_producto());

		} catch(Exception $e) {
			throw $e;
		}

		return $tipo_producto;
	}


	public function  getimpuesto(Connexion $connexion,$relproducto) : ?impuesto{

		$impuesto= new impuesto();

		try {
			$impuestoDataAccess=new impuesto_data();
			$impuestoDataAccess->isForFKData=$this->isForFKDataRels;
			$impuesto=$impuestoDataAccess->getEntity($connexion,$relproducto->getid_impuesto());

		} catch(Exception $e) {
			throw $e;
		}

		return $impuesto;
	}


	public function  getotro_impuesto(Connexion $connexion,$relproducto) : ?otro_impuesto{

		$otro_impuesto= new otro_impuesto();

		try {
			$otro_impuestoDataAccess=new otro_impuesto_data();
			$otro_impuestoDataAccess->isForFKData=$this->isForFKDataRels;
			$otro_impuesto=$otro_impuestoDataAccess->getEntity($connexion,$relproducto->getid_otro_impuesto());

		} catch(Exception $e) {
			throw $e;
		}

		return $otro_impuesto;
	}


	public function  getcategoria_producto(Connexion $connexion,$relproducto) : ?categoria_producto{

		$categoria_producto= new categoria_producto();

		try {
			$categoria_productoDataAccess=new categoria_producto_data();
			$categoria_productoDataAccess->isForFKData=$this->isForFKDataRels;
			$categoria_producto=$categoria_productoDataAccess->getEntity($connexion,$relproducto->getid_categoria_producto());

		} catch(Exception $e) {
			throw $e;
		}

		return $categoria_producto;
	}


	public function  getsub_categoria_producto(Connexion $connexion,$relproducto) : ?sub_categoria_producto{

		$sub_categoria_producto= new sub_categoria_producto();

		try {
			$sub_categoria_productoDataAccess=new sub_categoria_producto_data();
			$sub_categoria_productoDataAccess->isForFKData=$this->isForFKDataRels;
			$sub_categoria_producto=$sub_categoria_productoDataAccess->getEntity($connexion,$relproducto->getid_sub_categoria_producto());

		} catch(Exception $e) {
			throw $e;
		}

		return $sub_categoria_producto;
	}


	public function  getbodega_defecto(Connexion $connexion,$relproducto) : ?bodega{

		$bodega= new bodega();

		try {
			$bodegaDataAccess=new bodega_data();
			$bodegaDataAccess->isForFKData=$this->isForFKDataRels;
			$bodega=$bodegaDataAccess->getEntity($connexion,$relproducto->getid_bodega_defecto());

		} catch(Exception $e) {
			throw $e;
		}

		return $bodega;
	}


	public function  getunidad_compra(Connexion $connexion,$relproducto) : ?unidad{

		$unidad= new unidad();

		try {
			$unidadDataAccess=new unidad_data();
			$unidadDataAccess->isForFKData=$this->isForFKDataRels;
			$unidad=$unidadDataAccess->getEntity($connexion,$relproducto->getid_unidad_compra());

		} catch(Exception $e) {
			throw $e;
		}

		return $unidad;
	}


	public function  getunidad_venta(Connexion $connexion,$relproducto) : ?unidad{

		$unidad= new unidad();

		try {
			$unidadDataAccess=new unidad_data();
			$unidadDataAccess->isForFKData=$this->isForFKDataRels;
			$unidad=$unidadDataAccess->getEntity($connexion,$relproducto->getid_unidad_venta());

		} catch(Exception $e) {
			throw $e;
		}

		return $unidad;
	}


	public function  getcuenta_venta(Connexion $connexion,$relproducto) : ?cuenta{

		$cuenta= new cuenta();

		try {
			$cuentaDataAccess=new cuenta_data();
			$cuentaDataAccess->isForFKData=$this->isForFKDataRels;
			$cuenta=$cuentaDataAccess->getEntity($connexion,$relproducto->getid_cuenta_venta());

		} catch(Exception $e) {
			throw $e;
		}

		return $cuenta;
	}


	public function  getcuenta_compra(Connexion $connexion,$relproducto) : ?cuenta{

		$cuenta= new cuenta();

		try {
			$cuentaDataAccess=new cuenta_data();
			$cuentaDataAccess->isForFKData=$this->isForFKDataRels;
			$cuenta=$cuentaDataAccess->getEntity($connexion,$relproducto->getid_cuenta_compra());

		} catch(Exception $e) {
			throw $e;
		}

		return $cuenta;
	}


	public function  getcuenta_costo(Connexion $connexion,$relproducto) : ?cuenta{

		$cuenta= new cuenta();

		try {
			$cuentaDataAccess=new cuenta_data();
			$cuentaDataAccess->isForFKData=$this->isForFKDataRels;
			$cuenta=$cuentaDataAccess->getEntity($connexion,$relproducto->getid_cuenta_costo());

		} catch(Exception $e) {
			throw $e;
		}

		return $cuenta;
	}


	public function  getretencion(Connexion $connexion,$relproducto) : ?retencion{

		$retencion= new retencion();

		try {
			$retencionDataAccess=new retencion_data();
			$retencionDataAccess->isForFKData=$this->isForFKDataRels;
			$retencion=$retencionDataAccess->getEntity($connexion,$relproducto->getid_retencion());

		} catch(Exception $e) {
			throw $e;
		}

		return $retencion;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	public function  getlista_precios(Connexion $connexion,producto $producto) : array {

		$listaprecios=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.lista_precio_data::$SCHEMA.".".lista_precio_data::$TABLE_NAME.".id_producto=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$producto->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$listaprecioDataAccess=new lista_precio_data();

			$listaprecios=$listaprecioDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $listaprecios;
	}


	public function  getproducto_bodegas(Connexion $connexion,producto $producto) : array {

		$productobodegas=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.producto_bodega_data::$SCHEMA.".".producto_bodega_data::$TABLE_NAME.".id_producto=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$producto->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$productobodegaDataAccess=new producto_bodega_data();

			$productobodegas=$productobodegaDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $productobodegas;
	}


	public function  getotro_suplidors(Connexion $connexion,producto $producto) : array {

		$otrosuplidors=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.otro_suplidor_data::$SCHEMA.".".otro_suplidor_data::$TABLE_NAME.".id_producto=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$producto->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$otrosuplidorDataAccess=new otro_suplidor_data();

			$otrosuplidors=$otrosuplidorDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $otrosuplidors;
	}


	public function  getlista_clientes(Connexion $connexion,producto $producto) : array {

		$listaclientes=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.lista_cliente_data::$SCHEMA.".".lista_cliente_data::$TABLE_NAME.".id_producto=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$producto->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$listaclienteDataAccess=new lista_cliente_data();

			$listaclientes=$listaclienteDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $listaclientes;
	}


	public function  getbodegas(Connexion $connexion,producto $producto) : array {

		$bodegas= array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.producto_bodega_data::$SCHEMA.".".producto_bodega_data::$TABLE_NAME." ON ".Constantes::$STR_PREFIJO_SCHEMA.producto_bodega_data::$SCHEMA.".".producto_bodega_data::$TABLE_NAME.".id_bodega=".Constantes::$STR_PREFIJO_SCHEMA.bodega_data::$SCHEMA.".".bodega_data::$TABLE_NAME.".id INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME." ON ".Constantes::$STR_PREFIJO_SCHEMA.producto_bodega_data::$SCHEMA.".".producto_bodega_data::$TABLE_NAME.".idproducto=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$producto->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$bodegaDataAccess=new bodega_data();

			$bodegas=$bodegaDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $bodegas;
	}


	public function  getimagen_productos(Connexion $connexion,producto $producto) : array {

		$imagenproductos=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.imagen_producto_data::$SCHEMA.".".imagen_producto_data::$TABLE_NAME.".id_producto=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$producto->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$imagenproductoDataAccess=new imagen_producto_data();

			$imagenproductos=$imagenproductoDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $imagenproductos;
	}


	public function  getlista_productos(Connexion $connexion,producto $producto) : array {

		$listaproductos=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.lista_producto_data::$SCHEMA.".".lista_producto_data::$TABLE_NAME.".id_producto=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$producto->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$listaproductoDataAccess=new lista_producto_data();

			$listaproductos=$listaproductoDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $listaproductos;
	}


	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,producto $entity,$resultSet) : producto {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_empresa((int)$resultSet[$strPrefijo.'id_empresa']);
				$entity->setid_proveedor((int)$resultSet[$strPrefijo.'id_proveedor']);
				$entity->setcodigo(utf8_encode($resultSet[$strPrefijo.'codigo']));
				$entity->setnombre(utf8_encode($resultSet[$strPrefijo.'nombre']));
				$entity->setcosto((float)$resultSet[$strPrefijo.'costo']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setactivo($resultSet[$strPrefijo.'activo']=='f'? false:true );
				} else {
					$entity->setactivo((bool)$resultSet[$strPrefijo.'activo']);
				}
				$entity->setid_tipo_producto((int)$resultSet[$strPrefijo.'id_tipo_producto']);
				$entity->setcantidad_inicial((float)$resultSet[$strPrefijo.'cantidad_inicial']);
				$entity->setid_impuesto((int)$resultSet[$strPrefijo.'id_impuesto']);
				$entity->setid_otro_impuesto((int)$resultSet[$strPrefijo.'id_otro_impuesto']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setimpuesto_ventas($resultSet[$strPrefijo.'impuesto_ventas']=='f'? false:true );
				} else {
					$entity->setimpuesto_ventas((bool)$resultSet[$strPrefijo.'impuesto_ventas']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setotro_impuesto_ventas($resultSet[$strPrefijo.'otro_impuesto_ventas']=='f'? false:true );
				} else {
					$entity->setotro_impuesto_ventas((bool)$resultSet[$strPrefijo.'otro_impuesto_ventas']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setimpuesto_compras($resultSet[$strPrefijo.'impuesto_compras']=='f'? false:true );
				} else {
					$entity->setimpuesto_compras((bool)$resultSet[$strPrefijo.'impuesto_compras']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setotro_impuesto_compras($resultSet[$strPrefijo.'otro_impuesto_compras']=='f'? false:true );
				} else {
					$entity->setotro_impuesto_compras((bool)$resultSet[$strPrefijo.'otro_impuesto_compras']);
				}
				$entity->setid_categoria_producto((int)$resultSet[$strPrefijo.'id_categoria_producto']);
				$entity->setid_sub_categoria_producto((int)$resultSet[$strPrefijo.'id_sub_categoria_producto']);
				$entity->setid_bodega_defecto((int)$resultSet[$strPrefijo.'id_bodega_defecto']);
				$entity->setid_unidad_compra((int)$resultSet[$strPrefijo.'id_unidad_compra']);
				$entity->setequivalencia_compra((float)$resultSet[$strPrefijo.'equivalencia_compra']);
				$entity->setid_unidad_venta((int)$resultSet[$strPrefijo.'id_unidad_venta']);
				$entity->setequivalencia_venta((float)$resultSet[$strPrefijo.'equivalencia_venta']);
				$entity->setdescripcion(utf8_encode($resultSet[$strPrefijo.'descripcion']));
				$entity->setimagen(utf8_encode($resultSet[$strPrefijo.'imagen']));
				$entity->setobservacion(utf8_encode($resultSet[$strPrefijo.'observacion']));
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setcomenta_factura($resultSet[$strPrefijo.'comenta_factura']=='f'? false:true );
				} else {
					$entity->setcomenta_factura((bool)$resultSet[$strPrefijo.'comenta_factura']);
				}
				$entity->setcodigo_fabricante(utf8_encode($resultSet[$strPrefijo.'codigo_fabricante']));
				$entity->setcantidad((float)$resultSet[$strPrefijo.'cantidad']);
				$entity->setcantidad_minima((float)$resultSet[$strPrefijo.'cantidad_minima']);
				$entity->setcantidad_maxima((float)$resultSet[$strPrefijo.'cantidad_maxima']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setfactura_sin_stock($resultSet[$strPrefijo.'factura_sin_stock']=='f'? false:true );
				} else {
					$entity->setfactura_sin_stock((bool)$resultSet[$strPrefijo.'factura_sin_stock']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setmostrar_componente($resultSet[$strPrefijo.'mostrar_componente']=='f'? false:true );
				} else {
					$entity->setmostrar_componente((bool)$resultSet[$strPrefijo.'mostrar_componente']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setproducto_equivalente($resultSet[$strPrefijo.'producto_equivalente']=='f'? false:true );
				} else {
					$entity->setproducto_equivalente((bool)$resultSet[$strPrefijo.'producto_equivalente']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setavisa_expiracion($resultSet[$strPrefijo.'avisa_expiracion']=='f'? false:true );
				} else {
					$entity->setavisa_expiracion((bool)$resultSet[$strPrefijo.'avisa_expiracion']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setrequiere_serie($resultSet[$strPrefijo.'requiere_serie']=='f'? false:true );
				} else {
					$entity->setrequiere_serie((bool)$resultSet[$strPrefijo.'requiere_serie']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setacepta_lote($resultSet[$strPrefijo.'acepta_lote']=='f'? false:true );
				} else {
					$entity->setacepta_lote((bool)$resultSet[$strPrefijo.'acepta_lote']);
				}
				$entity->setid_cuenta_venta((int)$resultSet[$strPrefijo.'id_cuenta_venta']);
				$entity->setid_cuenta_compra((int)$resultSet[$strPrefijo.'id_cuenta_compra']);
				$entity->setid_cuenta_costo((int)$resultSet[$strPrefijo.'id_cuenta_costo']);
				$entity->setvalor_inventario((float)$resultSet[$strPrefijo.'valor_inventario']);
				$entity->setproducto_fisico((int)$resultSet[$strPrefijo.'producto_fisico']);
				$entity->setultima_venta($resultSet[$strPrefijo.'ultima_venta']);
				$entity->setprecio_actualizado($resultSet[$strPrefijo.'precio_actualizado']);
				$entity->setid_retencion((int)$resultSet[$strPrefijo.'id_retencion']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setretencion_ventas($resultSet[$strPrefijo.'retencion_ventas']=='f'? false:true );
				} else {
					$entity->setretencion_ventas((bool)$resultSet[$strPrefijo.'retencion_ventas']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setretencion_compras($resultSet[$strPrefijo.'retencion_compras']=='f'? false:true );
				} else {
					$entity->setretencion_compras((bool)$resultSet[$strPrefijo.'retencion_compras']);
				}
				$entity->setfactura_con_precio((int)$resultSet[$strPrefijo.'factura_con_precio']);
			} else {
				$entity->setcodigo(utf8_encode($resultSet[$strPrefijo.'codigo']));								
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,producto $producto,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $producto->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iissdiidiiiiiiiiiididsssisdddiiiiiiiiidissiiii', $producto->getid_empresa(),$producto->getid_proveedor(),$producto->getcodigo(),$producto->getnombre(),$producto->getcosto(),$producto->getactivo(),$producto->getid_tipo_producto(),$producto->getcantidad_inicial(),$producto->getid_impuesto(),$producto->getid_otro_impuesto(),$producto->getimpuesto_ventas(),$producto->getotro_impuesto_ventas(),$producto->getimpuesto_compras(),$producto->getotro_impuesto_compras(),$producto->getid_categoria_producto(),$producto->getid_sub_categoria_producto(),$producto->getid_bodega_defecto(),$producto->getid_unidad_compra(),$producto->getequivalencia_compra(),$producto->getid_unidad_venta(),$producto->getequivalencia_venta(),$producto->getdescripcion(),$producto->getimagen(),$producto->getobservacion(),$producto->getcomenta_factura(),$producto->getcodigo_fabricante(),$producto->getcantidad(),$producto->getcantidad_minima(),$producto->getcantidad_maxima(),$producto->getfactura_sin_stock(),$producto->getmostrar_componente(),$producto->getproducto_equivalente(),$producto->getavisa_expiracion(),$producto->getrequiere_serie(),$producto->getacepta_lote(),$producto->getid_cuenta_venta(),$producto->getid_cuenta_compra(),$producto->getid_cuenta_costo(),$producto->getvalor_inventario(),$producto->getproducto_fisico(),$producto->getultima_venta(),$producto->getprecio_actualizado(),$producto->getid_retencion(),$producto->getretencion_ventas(),$producto->getretencion_compras(),$producto->getfactura_con_precio());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iissdiidiiiiiiiiiididsssisdddiiiiiiiiidissiiiiis', $producto->getid_empresa(),$producto->getid_proveedor(),$producto->getcodigo(),$producto->getnombre(),$producto->getcosto(),$producto->getactivo(),$producto->getid_tipo_producto(),$producto->getcantidad_inicial(),$producto->getid_impuesto(),$producto->getid_otro_impuesto(),$producto->getimpuesto_ventas(),$producto->getotro_impuesto_ventas(),$producto->getimpuesto_compras(),$producto->getotro_impuesto_compras(),$producto->getid_categoria_producto(),$producto->getid_sub_categoria_producto(),$producto->getid_bodega_defecto(),$producto->getid_unidad_compra(),$producto->getequivalencia_compra(),$producto->getid_unidad_venta(),$producto->getequivalencia_venta(),$producto->getdescripcion(),$producto->getimagen(),$producto->getobservacion(),$producto->getcomenta_factura(),$producto->getcodigo_fabricante(),$producto->getcantidad(),$producto->getcantidad_minima(),$producto->getcantidad_maxima(),$producto->getfactura_sin_stock(),$producto->getmostrar_componente(),$producto->getproducto_equivalente(),$producto->getavisa_expiracion(),$producto->getrequiere_serie(),$producto->getacepta_lote(),$producto->getid_cuenta_venta(),$producto->getid_cuenta_compra(),$producto->getid_cuenta_costo(),$producto->getvalor_inventario(),$producto->getproducto_fisico(),$producto->getultima_venta(),$producto->getprecio_actualizado(),$producto->getid_retencion(),$producto->getretencion_ventas(),$producto->getretencion_compras(),$producto->getfactura_con_precio(), $producto->getId(), Funciones::GetRealScapeString($producto->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,producto $producto,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($producto->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($producto->getid_empresa(),$producto->getid_proveedor(),Funciones::GetRealScapeString($producto->getcodigo(),$connexion),Funciones::GetRealScapeString($producto->getnombre(),$connexion),$producto->getcosto(),$producto->getactivo(),$producto->getid_tipo_producto(),$producto->getcantidad_inicial(),$producto->getid_impuesto(),Funciones::GetNullString($producto->getid_otro_impuesto()),$producto->getimpuesto_ventas(),$producto->getotro_impuesto_ventas(),$producto->getimpuesto_compras(),$producto->getotro_impuesto_compras(),$producto->getid_categoria_producto(),$producto->getid_sub_categoria_producto(),$producto->getid_bodega_defecto(),$producto->getid_unidad_compra(),$producto->getequivalencia_compra(),$producto->getid_unidad_venta(),$producto->getequivalencia_venta(),Funciones::GetRealScapeString($producto->getdescripcion(),$connexion),Funciones::GetRealScapeString($producto->getimagen(),$connexion),Funciones::GetRealScapeString($producto->getobservacion(),$connexion),$producto->getcomenta_factura(),Funciones::GetRealScapeString($producto->getcodigo_fabricante(),$connexion),$producto->getcantidad(),$producto->getcantidad_minima(),$producto->getcantidad_maxima(),$producto->getfactura_sin_stock(),$producto->getmostrar_componente(),$producto->getproducto_equivalente(),$producto->getavisa_expiracion(),$producto->getrequiere_serie(),$producto->getacepta_lote(),Funciones::GetNullString($producto->getid_cuenta_venta()),Funciones::GetNullString($producto->getid_cuenta_compra()),Funciones::GetNullString($producto->getid_cuenta_costo()),$producto->getvalor_inventario(),$producto->getproducto_fisico(),Funciones::GetRealScapeString($producto->getultima_venta(),$connexion),Funciones::GetRealScapeString($producto->getprecio_actualizado(),$connexion),Funciones::GetNullString($producto->getid_retencion()),$producto->getretencion_ventas(),$producto->getretencion_compras(),$producto->getfactura_con_precio());
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($producto->getid_empresa(),$producto->getid_proveedor(),Funciones::GetRealScapeString($producto->getcodigo(),$connexion),Funciones::GetRealScapeString($producto->getnombre(),$connexion),$producto->getcosto(),$producto->getactivo(),$producto->getid_tipo_producto(),$producto->getcantidad_inicial(),$producto->getid_impuesto(),Funciones::GetNullString($producto->getid_otro_impuesto()),$producto->getimpuesto_ventas(),$producto->getotro_impuesto_ventas(),$producto->getimpuesto_compras(),$producto->getotro_impuesto_compras(),$producto->getid_categoria_producto(),$producto->getid_sub_categoria_producto(),$producto->getid_bodega_defecto(),$producto->getid_unidad_compra(),$producto->getequivalencia_compra(),$producto->getid_unidad_venta(),$producto->getequivalencia_venta(),Funciones::GetRealScapeString($producto->getdescripcion(),$connexion),Funciones::GetRealScapeString($producto->getimagen(),$connexion),Funciones::GetRealScapeString($producto->getobservacion(),$connexion),$producto->getcomenta_factura(),Funciones::GetRealScapeString($producto->getcodigo_fabricante(),$connexion),$producto->getcantidad(),$producto->getcantidad_minima(),$producto->getcantidad_maxima(),$producto->getfactura_sin_stock(),$producto->getmostrar_componente(),$producto->getproducto_equivalente(),$producto->getavisa_expiracion(),$producto->getrequiere_serie(),$producto->getacepta_lote(),Funciones::GetNullString($producto->getid_cuenta_venta()),Funciones::GetNullString($producto->getid_cuenta_compra()),Funciones::GetNullString($producto->getid_cuenta_costo()),$producto->getvalor_inventario(),$producto->getproducto_fisico(),Funciones::GetRealScapeString($producto->getultima_venta(),$connexion),Funciones::GetRealScapeString($producto->getprecio_actualizado(),$connexion),Funciones::GetNullString($producto->getid_retencion()),$producto->getretencion_ventas(),$producto->getretencion_compras(),$producto->getfactura_con_precio(), $producto->getId(), Funciones::GetRealScapeString($producto->getVersionRow(),$connexion));
		}
		
		return $params;
	}
	
	public static function preparedQuery(string $sql,array $params) : string {
		for ($i=0; $i<count($params); $i++) {
			$sql = preg_replace('/\?/','\''.$params[$i].'\'',$sql,1);
		}
		
		return $sql;
	}
	
		

	public function getIsForFKData() : bool {
		return $this->isForFKData;
	}

	public function setIsForFKData(bool $isForFKData) {
		$this->isForFKData = $isForFKData;
	}
			
	public function getIsForFKDataRels() : bool {
		return $this->isForFKDataRels;
	}

	public function setIsForFKDataRels(bool $isForFKDataRels) {
		$this->isForFKDataRels = $isForFKDataRels;
	}
	
	public function setproducto_Original(producto $producto) {
		$producto->setproducto_Original(clone $producto);		
	}
	
	public function setproductos_Original(array $productos) {
		foreach($productos as $producto){
			$producto->setproducto_Original(clone $producto);
		}
	}
	
	public static function setproducto_OriginalStatic(producto $producto) {
		$producto->setproducto_Original(clone $producto);		
	}
	
	public static function setproductos_OriginalStatic(array $productos) {		
		foreach($productos as $producto){
			$producto->setproducto_Original(clone $producto);
		}
	}
	
	/*
		QUERY_INSERT,UPDATE,DELETE,SELECT
		save,savePrepared
		insert,update,delete
		getEntity,getEntityConnexionWhereSelect
		getEntities,getEntitiesConnexionQuerySelectQueryWhere
		getEntitiesSimpleQueryBuild
		executeQuery,executeQueryValor
		getCountSelect,setCountSelect
		gettabla1,gettabla2,gettablas1,gettablas2
		getEntityBaseResult,addPrepareStatementParams,getPrepareStatementParamsArray
	*/
}
?>
