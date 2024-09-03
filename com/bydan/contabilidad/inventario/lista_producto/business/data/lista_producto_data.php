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
namespace com\bydan\contabilidad\inventario\lista_producto\business\data;

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

use com\bydan\contabilidad\inventario\lista_producto\business\entity\lista_producto;

//FK


use com\bydan\contabilidad\inventario\producto\business\data\producto_data;
use com\bydan\contabilidad\inventario\producto\business\entity\producto;

use com\bydan\contabilidad\inventario\unidad\business\data\unidad_data;
use com\bydan\contabilidad\inventario\unidad\business\entity\unidad;

use com\bydan\contabilidad\inventario\categoria_producto\business\data\categoria_producto_data;
use com\bydan\contabilidad\inventario\categoria_producto\business\entity\categoria_producto;

use com\bydan\contabilidad\inventario\sub_categoria_producto\business\data\sub_categoria_producto_data;
use com\bydan\contabilidad\inventario\sub_categoria_producto\business\entity\sub_categoria_producto;

use com\bydan\contabilidad\inventario\tipo_producto\business\data\tipo_producto_data;
use com\bydan\contabilidad\inventario\tipo_producto\business\entity\tipo_producto;

use com\bydan\contabilidad\inventario\bodega\business\data\bodega_data;
use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;

use com\bydan\contabilidad\contabilidad\cuenta\business\data\cuenta_data;
use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;

use com\bydan\contabilidad\inventario\otro_suplidor\business\data\otro_suplidor_data;
use com\bydan\contabilidad\inventario\otro_suplidor\business\entity\otro_suplidor;

use com\bydan\contabilidad\facturacion\impuesto\business\data\impuesto_data;
use com\bydan\contabilidad\facturacion\impuesto\business\entity\impuesto;

use com\bydan\contabilidad\facturacion\otro_impuesto\business\data\otro_impuesto_data;
use com\bydan\contabilidad\facturacion\otro_impuesto\business\entity\otro_impuesto;

use com\bydan\contabilidad\facturacion\retencion\business\data\retencion_data;
use com\bydan\contabilidad\facturacion\retencion\business\entity\retencion;

//REL



class lista_producto_data extends GetEntitiesDataAccessHelper implements lista_producto_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='inv_';
	public static string $TABLE_NAME='inv_lista_producto';			
	public static string $TABLE_NAME_lista_producto='lista_producto';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_LISTA_PRODUCTO_INSERT(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_LISTA_PRODUCTO_UPDATE(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_LISTA_PRODUCTO_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_LISTA_PRODUCTO_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $lista_producto_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'lista_producto';
		
		lista_producto_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('INVENTARIO');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->lista_producto_DataAccessAdditional=new lista_productoDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_producto,codigo_producto,descripcion_producto,precio1,precio2,precio3,precio4,costo,id_unidad_compra,unidad_en_compra,equivalencia_en_compra,id_unidad_venta,unidad_en_venta,equivalencia_en_venta,cantidad_total,cantidad_minima,id_categoria_producto,id_sub_categoria_producto,acepta_lote,valor_inventario,imagen,incremento1,incremento2,incremento3,incremento4,codigo_fabricante,producto_fisico,situacion_producto,id_tipo_producto,tipo_producto_codigo,id_bodega,mostrar_componente,factura_sin_stock,avisa_expiracion,factura_con_precio,producto_equivalente,id_cuenta_compra,id_cuenta_venta,id_cuenta_inventario,cuenta_compra_codigo,cuenta_venta_codigo,cuenta_inventario_codigo,id_otro_suplidor,id_impuesto,id_impuesto_ventas,id_impuesto_compras,impuesto1_en_ventas,impuesto1_en_compras,ultima_venta,id_otro_impuesto,id_otro_impuesto_ventas,id_otro_impuesto_compras,otro_impuesto_ventas_codigo,otro_impuesto_compras_codigo,precio_de_compra_0,precio_actualizado,requiere_nro_serie,costo_dolar,comentario,comenta_factura,id_retencion,id_retencion_ventas,id_retencion_compras,retencion_ventas_codigo,retencion_compras_codigo,notas) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,\'%s\',\'%s\',%f,%f,%f,%f,%f,%d,%d,%f,%d,%d,%f,%f,%f,%d,%d,\'%s\',%f,\'%s\',%f,%f,%f,%f,\'%s\',%d,%d,%d,\'%s\',%d,\'%s\',\'%s\',\'%s\',%d,\'%s\',%s,%s,%s,\'%s\',\'%s\',\'%s\',%d,%d,%s,%s,\'%s\',\'%s\',\'%s\',%d,%s,%s,\'%s\',\'%s\',%f,\'%s\',\'%s\',%f,\'%s\',\'%s\',%d,%s,%s,\'%s\',\'%s\',\'%s\')';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_producto=%d,codigo_producto=\'%s\',descripcion_producto=\'%s\',precio1=%f,precio2=%f,precio3=%f,precio4=%f,costo=%f,id_unidad_compra=%d,unidad_en_compra=%d,equivalencia_en_compra=%f,id_unidad_venta=%d,unidad_en_venta=%d,equivalencia_en_venta=%f,cantidad_total=%f,cantidad_minima=%f,id_categoria_producto=%d,id_sub_categoria_producto=%d,acepta_lote=\'%s\',valor_inventario=%f,imagen=\'%s\',incremento1=%f,incremento2=%f,incremento3=%f,incremento4=%f,codigo_fabricante=\'%s\',producto_fisico=%d,situacion_producto=%d,id_tipo_producto=%d,tipo_producto_codigo=\'%s\',id_bodega=%d,mostrar_componente=\'%s\',factura_sin_stock=\'%s\',avisa_expiracion=\'%s\',factura_con_precio=%d,producto_equivalente=\'%s\',id_cuenta_compra=%s,id_cuenta_venta=%s,id_cuenta_inventario=%s,cuenta_compra_codigo=\'%s\',cuenta_venta_codigo=\'%s\',cuenta_inventario_codigo=\'%s\',id_otro_suplidor=%d,id_impuesto=%d,id_impuesto_ventas=%s,id_impuesto_compras=%s,impuesto1_en_ventas=\'%s\',impuesto1_en_compras=\'%s\',ultima_venta=\'%s\',id_otro_impuesto=%d,id_otro_impuesto_ventas=%s,id_otro_impuesto_compras=%s,otro_impuesto_ventas_codigo=\'%s\',otro_impuesto_compras_codigo=\'%s\',precio_de_compra_0=%f,precio_actualizado=\'%s\',requiere_nro_serie=\'%s\',costo_dolar=%f,comentario=\'%s\',comenta_factura=\'%s\',id_retencion=%d,id_retencion_ventas=%s,id_retencion_compras=%s,retencion_ventas_codigo=\'%s\',retencion_compras_codigo=\'%s\',notas=\'%s\' where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.precio1,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.precio2,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.precio3,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.precio4,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.costo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_unidad_compra,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.unidad_en_compra,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.equivalencia_en_compra,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_unidad_venta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.unidad_en_venta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.equivalencia_en_venta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cantidad_total,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cantidad_minima,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_categoria_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_sub_categoria_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.acepta_lote,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.valor_inventario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.imagen,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.incremento1,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.incremento2,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.incremento3,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.incremento4,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo_fabricante,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.producto_fisico,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.situacion_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_tipo_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.tipo_producto_codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_bodega,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.mostrar_componente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.factura_sin_stock,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.avisa_expiracion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.factura_con_precio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.producto_equivalente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta_compra,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta_venta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta_inventario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cuenta_compra_codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cuenta_venta_codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cuenta_inventario_codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_otro_suplidor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_impuesto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_impuesto_ventas,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_impuesto_compras,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.impuesto1_en_ventas,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.impuesto1_en_compras,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.ultima_venta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_otro_impuesto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_otro_impuesto_ventas,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_otro_impuesto_compras,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.otro_impuesto_ventas_codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.otro_impuesto_compras_codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.precio_de_compra_0,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.precio_actualizado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.requiere_nro_serie,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.costo_dolar,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.comentario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.comenta_factura,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_retencion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_retencion_ventas,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_retencion_compras,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.retencion_ventas_codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.retencion_compras_codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.notas from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(lista_producto $lista_producto,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($lista_producto->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=lista_producto_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($lista_producto->getId(),$connexion));				
				
			} else if ($lista_producto->getIsChanged()) {
				if($lista_producto->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=lista_producto_data::$QUERY_INSERT;
					
					
					
					

					//$id_cuenta_compra='null';
					//if($lista_producto->getid_cuenta_compra()!==null && $lista_producto->getid_cuenta_compra()>=0) {
						//$id_cuenta_compra=$lista_producto->getid_cuenta_compra();
					//} else {
						//$id_cuenta_compra='null';
					//}

					//$id_cuenta_venta='null';
					//if($lista_producto->getid_cuenta_venta()!==null && $lista_producto->getid_cuenta_venta()>=0) {
						//$id_cuenta_venta=$lista_producto->getid_cuenta_venta();
					//} else {
						//$id_cuenta_venta='null';
					//}

					//$id_cuenta_inventario='null';
					//if($lista_producto->getid_cuenta_inventario()!==null && $lista_producto->getid_cuenta_inventario()>=0) {
						//$id_cuenta_inventario=$lista_producto->getid_cuenta_inventario();
					//} else {
						//$id_cuenta_inventario='null';
					//}

					//$id_impuesto_ventas='null';
					//if($lista_producto->getid_impuesto_ventas()!==null && $lista_producto->getid_impuesto_ventas()>=0) {
						//$id_impuesto_ventas=$lista_producto->getid_impuesto_ventas();
					//} else {
						//$id_impuesto_ventas='null';
					//}

					//$id_impuesto_compras='null';
					//if($lista_producto->getid_impuesto_compras()!==null && $lista_producto->getid_impuesto_compras()>=0) {
						//$id_impuesto_compras=$lista_producto->getid_impuesto_compras();
					//} else {
						//$id_impuesto_compras='null';
					//}

					//$id_otro_impuesto_ventas='null';
					//if($lista_producto->getid_otro_impuesto_ventas()!==null && $lista_producto->getid_otro_impuesto_ventas()>=0) {
						//$id_otro_impuesto_ventas=$lista_producto->getid_otro_impuesto_ventas();
					//} else {
						//$id_otro_impuesto_ventas='null';
					//}

					//$id_otro_impuesto_compras='null';
					//if($lista_producto->getid_otro_impuesto_compras()!==null && $lista_producto->getid_otro_impuesto_compras()>=0) {
						//$id_otro_impuesto_compras=$lista_producto->getid_otro_impuesto_compras();
					//} else {
						//$id_otro_impuesto_compras='null';
					//}

					//$id_retencion_ventas='null';
					//if($lista_producto->getid_retencion_ventas()!==null && $lista_producto->getid_retencion_ventas()>=0) {
						//$id_retencion_ventas=$lista_producto->getid_retencion_ventas();
					//} else {
						//$id_retencion_ventas='null';
					//}

					//$id_retencion_compras='null';
					//if($lista_producto->getid_retencion_compras()!==null && $lista_producto->getid_retencion_compras()>=0) {
						//$id_retencion_compras=$lista_producto->getid_retencion_compras();
					//} else {
						//$id_retencion_compras='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$lista_producto->getid_producto(),Funciones::GetRealScapeString($lista_producto->getcodigo_producto(),$connexion),Funciones::GetRealScapeString($lista_producto->getdescripcion_producto(),$connexion),$lista_producto->getprecio1(),$lista_producto->getprecio2(),$lista_producto->getprecio3(),$lista_producto->getprecio4(),$lista_producto->getcosto(),$lista_producto->getid_unidad_compra(),$lista_producto->getunidad_en_compra(),$lista_producto->getequivalencia_en_compra(),$lista_producto->getid_unidad_venta(),$lista_producto->getunidad_en_venta(),$lista_producto->getequivalencia_en_venta(),$lista_producto->getcantidad_total(),$lista_producto->getcantidad_minima(),$lista_producto->getid_categoria_producto(),$lista_producto->getid_sub_categoria_producto(),Funciones::GetRealScapeString($lista_producto->getacepta_lote(),$connexion),$lista_producto->getvalor_inventario(),Funciones::GetRealScapeString($lista_producto->getimagen(),$connexion),$lista_producto->getincremento1(),$lista_producto->getincremento2(),$lista_producto->getincremento3(),$lista_producto->getincremento4(),Funciones::GetRealScapeString($lista_producto->getcodigo_fabricante(),$connexion),$lista_producto->getproducto_fisico(),$lista_producto->getsituacion_producto(),$lista_producto->getid_tipo_producto(),Funciones::GetRealScapeString($lista_producto->gettipo_producto_codigo(),$connexion),$lista_producto->getid_bodega(),Funciones::GetRealScapeString($lista_producto->getmostrar_componente(),$connexion),Funciones::GetRealScapeString($lista_producto->getfactura_sin_stock(),$connexion),Funciones::GetRealScapeString($lista_producto->getavisa_expiracion(),$connexion),$lista_producto->getfactura_con_precio(),Funciones::GetRealScapeString($lista_producto->getproducto_equivalente(),$connexion),$lista_producto->getid_cuenta_compra(),$lista_producto->getid_cuenta_venta(),$lista_producto->getid_cuenta_inventario(),Funciones::GetRealScapeString($lista_producto->getcuenta_compra_codigo(),$connexion),Funciones::GetRealScapeString($lista_producto->getcuenta_venta_codigo(),$connexion),Funciones::GetRealScapeString($lista_producto->getcuenta_inventario_codigo(),$connexion),$lista_producto->getid_otro_suplidor(),$lista_producto->getid_impuesto(),$lista_producto->getid_impuesto_ventas(),$lista_producto->getid_impuesto_compras(),Funciones::GetRealScapeString($lista_producto->getimpuesto1_en_ventas(),$connexion),Funciones::GetRealScapeString($lista_producto->getimpuesto1_en_compras(),$connexion),Funciones::GetRealScapeString($lista_producto->getultima_venta(),$connexion),$lista_producto->getid_otro_impuesto(),$lista_producto->getid_otro_impuesto_ventas(),$lista_producto->getid_otro_impuesto_compras(),Funciones::GetRealScapeString($lista_producto->getotro_impuesto_ventas_codigo(),$connexion),Funciones::GetRealScapeString($lista_producto->getotro_impuesto_compras_codigo(),$connexion),$lista_producto->getprecio_de_compra_0(),Funciones::GetRealScapeString($lista_producto->getprecio_actualizado(),$connexion),Funciones::GetRealScapeString($lista_producto->getrequiere_nro_serie(),$connexion),$lista_producto->getcosto_dolar(),Funciones::GetRealScapeString($lista_producto->getcomentario(),$connexion),Funciones::GetRealScapeString($lista_producto->getcomenta_factura(),$connexion),$lista_producto->getid_retencion(),$lista_producto->getid_retencion_ventas(),$lista_producto->getid_retencion_compras(),Funciones::GetRealScapeString($lista_producto->getretencion_ventas_codigo(),$connexion),Funciones::GetRealScapeString($lista_producto->getretencion_compras_codigo(),$connexion),Funciones::GetRealScapeString($lista_producto->getnotas(),$connexion) );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=lista_producto_data::$QUERY_UPDATE;			
					
					
					
					

					//$id_cuenta_compra='null';
					//if($lista_producto->getid_cuenta_compra()!==null && $lista_producto->getid_cuenta_compra()>=0) {
						//$id_cuenta_compra=$lista_producto->getid_cuenta_compra();
					//} else {
						//$id_cuenta_compra='null';
					//}

					//$id_cuenta_venta='null';
					//if($lista_producto->getid_cuenta_venta()!==null && $lista_producto->getid_cuenta_venta()>=0) {
						//$id_cuenta_venta=$lista_producto->getid_cuenta_venta();
					//} else {
						//$id_cuenta_venta='null';
					//}

					//$id_cuenta_inventario='null';
					//if($lista_producto->getid_cuenta_inventario()!==null && $lista_producto->getid_cuenta_inventario()>=0) {
						//$id_cuenta_inventario=$lista_producto->getid_cuenta_inventario();
					//} else {
						//$id_cuenta_inventario='null';
					//}

					//$id_impuesto_ventas='null';
					//if($lista_producto->getid_impuesto_ventas()!==null && $lista_producto->getid_impuesto_ventas()>=0) {
						//$id_impuesto_ventas=$lista_producto->getid_impuesto_ventas();
					//} else {
						//$id_impuesto_ventas='null';
					//}

					//$id_impuesto_compras='null';
					//if($lista_producto->getid_impuesto_compras()!==null && $lista_producto->getid_impuesto_compras()>=0) {
						//$id_impuesto_compras=$lista_producto->getid_impuesto_compras();
					//} else {
						//$id_impuesto_compras='null';
					//}

					//$id_otro_impuesto_ventas='null';
					//if($lista_producto->getid_otro_impuesto_ventas()!==null && $lista_producto->getid_otro_impuesto_ventas()>=0) {
						//$id_otro_impuesto_ventas=$lista_producto->getid_otro_impuesto_ventas();
					//} else {
						//$id_otro_impuesto_ventas='null';
					//}

					//$id_otro_impuesto_compras='null';
					//if($lista_producto->getid_otro_impuesto_compras()!==null && $lista_producto->getid_otro_impuesto_compras()>=0) {
						//$id_otro_impuesto_compras=$lista_producto->getid_otro_impuesto_compras();
					//} else {
						//$id_otro_impuesto_compras='null';
					//}

					//$id_retencion_ventas='null';
					//if($lista_producto->getid_retencion_ventas()!==null && $lista_producto->getid_retencion_ventas()>=0) {
						//$id_retencion_ventas=$lista_producto->getid_retencion_ventas();
					//} else {
						//$id_retencion_ventas='null';
					//}

					//$id_retencion_compras='null';
					//if($lista_producto->getid_retencion_compras()!==null && $lista_producto->getid_retencion_compras()>=0) {
						//$id_retencion_compras=$lista_producto->getid_retencion_compras();
					//} else {
						//$id_retencion_compras='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$lista_producto->getid_producto(),Funciones::GetRealScapeString($lista_producto->getcodigo_producto(),$connexion),Funciones::GetRealScapeString($lista_producto->getdescripcion_producto(),$connexion),$lista_producto->getprecio1(),$lista_producto->getprecio2(),$lista_producto->getprecio3(),$lista_producto->getprecio4(),$lista_producto->getcosto(),$lista_producto->getid_unidad_compra(),$lista_producto->getunidad_en_compra(),$lista_producto->getequivalencia_en_compra(),$lista_producto->getid_unidad_venta(),$lista_producto->getunidad_en_venta(),$lista_producto->getequivalencia_en_venta(),$lista_producto->getcantidad_total(),$lista_producto->getcantidad_minima(),$lista_producto->getid_categoria_producto(),$lista_producto->getid_sub_categoria_producto(),Funciones::GetRealScapeString($lista_producto->getacepta_lote(),$connexion),$lista_producto->getvalor_inventario(),Funciones::GetRealScapeString($lista_producto->getimagen(),$connexion),$lista_producto->getincremento1(),$lista_producto->getincremento2(),$lista_producto->getincremento3(),$lista_producto->getincremento4(),Funciones::GetRealScapeString($lista_producto->getcodigo_fabricante(),$connexion),$lista_producto->getproducto_fisico(),$lista_producto->getsituacion_producto(),$lista_producto->getid_tipo_producto(),Funciones::GetRealScapeString($lista_producto->gettipo_producto_codigo(),$connexion),$lista_producto->getid_bodega(),Funciones::GetRealScapeString($lista_producto->getmostrar_componente(),$connexion),Funciones::GetRealScapeString($lista_producto->getfactura_sin_stock(),$connexion),Funciones::GetRealScapeString($lista_producto->getavisa_expiracion(),$connexion),$lista_producto->getfactura_con_precio(),Funciones::GetRealScapeString($lista_producto->getproducto_equivalente(),$connexion),$lista_producto->getid_cuenta_compra(),$lista_producto->getid_cuenta_venta(),$lista_producto->getid_cuenta_inventario(),Funciones::GetRealScapeString($lista_producto->getcuenta_compra_codigo(),$connexion),Funciones::GetRealScapeString($lista_producto->getcuenta_venta_codigo(),$connexion),Funciones::GetRealScapeString($lista_producto->getcuenta_inventario_codigo(),$connexion),$lista_producto->getid_otro_suplidor(),$lista_producto->getid_impuesto(),$lista_producto->getid_impuesto_ventas(),$lista_producto->getid_impuesto_compras(),Funciones::GetRealScapeString($lista_producto->getimpuesto1_en_ventas(),$connexion),Funciones::GetRealScapeString($lista_producto->getimpuesto1_en_compras(),$connexion),Funciones::GetRealScapeString($lista_producto->getultima_venta(),$connexion),$lista_producto->getid_otro_impuesto(),$lista_producto->getid_otro_impuesto_ventas(),$lista_producto->getid_otro_impuesto_compras(),Funciones::GetRealScapeString($lista_producto->getotro_impuesto_ventas_codigo(),$connexion),Funciones::GetRealScapeString($lista_producto->getotro_impuesto_compras_codigo(),$connexion),$lista_producto->getprecio_de_compra_0(),Funciones::GetRealScapeString($lista_producto->getprecio_actualizado(),$connexion),Funciones::GetRealScapeString($lista_producto->getrequiere_nro_serie(),$connexion),$lista_producto->getcosto_dolar(),Funciones::GetRealScapeString($lista_producto->getcomentario(),$connexion),Funciones::GetRealScapeString($lista_producto->getcomenta_factura(),$connexion),$lista_producto->getid_retencion(),$lista_producto->getid_retencion_ventas(),$lista_producto->getid_retencion_compras(),Funciones::GetRealScapeString($lista_producto->getretencion_ventas_codigo(),$connexion),Funciones::GetRealScapeString($lista_producto->getretencion_compras_codigo(),$connexion),Funciones::GetRealScapeString($lista_producto->getnotas(),$connexion), Funciones::GetRealScapeString($lista_producto->getId(),$connexion), Funciones::GetRealScapeString($lista_producto->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($lista_producto, $connexion,$strQuerySaveComplete,lista_producto_data::$TABLE_NAME,lista_producto_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				lista_producto_data::savePrepared($lista_producto, $connexion,$strQuerySave,lista_producto_data::$TABLE_NAME,lista_producto_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			lista_producto_data::setlista_producto_OriginalStatic($lista_producto);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(lista_producto $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				lista_producto_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					lista_producto_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					lista_producto_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(lista_producto $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					lista_producto_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(lista_producto $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					lista_producto_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(lista_producto $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					lista_producto_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?lista_producto {		
		$entity = new lista_producto();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=lista_producto_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=lista_producto_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//Inventario.lista_producto.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setlista_producto_Original(new lista_producto());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,lista_producto_data::$IS_WITH_SCHEMA);         	    
				/*$entity=lista_producto_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setlista_producto_Original(parent::getEntityPrefijoEntityResult("",$entity->getlista_producto_Original(),$resultSet,lista_producto_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setlista_producto_Original(lista_producto_data::getEntityBaseResult("",$entity->getlista_producto_Original(),$resultSet));
				//$entity->setlista_producto_Original($this->getEntityBaseResult("",$entity->getlista_producto_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?lista_producto {
		$entity = new lista_producto();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=lista_producto_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=lista_producto_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,lista_producto_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".Inventario.lista_producto.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setlista_producto_Original(new lista_producto());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,lista_producto_data::$IS_WITH_SCHEMA);         	    
				/*$entity=lista_producto_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setlista_producto_Original(parent::getEntityPrefijoEntityResult("",$entity->getlista_producto_Original(),$resultSet,lista_producto_data::$IS_WITH_SCHEMA));         		
				////$entity->setlista_producto_Original(lista_producto_data::getEntityBaseResult("",$entity->getlista_producto_Original(),$resultSet));
				//$entity->setlista_producto_Original($this->getEntityBaseResult("",$entity->getlista_producto_Original(),$resultSet));
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
		$entity = new lista_producto();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=lista_producto_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=lista_producto_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,lista_producto_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new lista_producto();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,lista_producto_data::$IS_WITH_SCHEMA);         		
				/*$entity=lista_producto_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setlista_producto_Original( new lista_producto());
				
				//$entity->setlista_producto_Original(parent::getEntityPrefijoEntityResult("",$entity->getlista_producto_Original(),$resultSet,lista_producto_data::$IS_WITH_SCHEMA));         		
				////$entity->setlista_producto_Original(lista_producto_data::getEntityBaseResult("",$entity->getlista_producto_Original(),$resultSet));
				//$entity->setlista_producto_Original($this->getEntityBaseResult("",$entity->getlista_producto_Original(),$resultSet));
								
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
		$entity = new lista_producto();		  
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
      	    	$entity = new lista_producto();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,lista_producto_data::$IS_WITH_SCHEMA);         		
				/*$entity=lista_producto_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setlista_producto_Original( new lista_producto());
				
				//$entity->setlista_producto_Original(parent::getEntityPrefijoEntityResult("",$entity->getlista_producto_Original(),$resultSet,lista_producto_data::$IS_WITH_SCHEMA));         		
				////$entity->setlista_producto_Original(lista_producto_data::getEntityBaseResult("",$entity->getlista_producto_Original(),$resultSet));
				//$entity->setlista_producto_Original($this->getEntityBaseResult("",$entity->getlista_producto_Original(),$resultSet));
				
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
		$entity = new lista_producto();		  
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
      	    	$entity = new lista_producto();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,lista_producto_data::$IS_WITH_SCHEMA);         		
				/*$entity=lista_producto_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setlista_producto_Original( new lista_producto());				
				//$entity->setlista_producto_Original(parent::getEntityPrefijoEntityResult("",$entity->getlista_producto_Original(),$resultSet,lista_producto_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setlista_producto_Original(lista_producto_data::getEntityBaseResult("",$entity->getlista_producto_Original(),$resultSet));
				//$entity->setlista_producto_Original($this->getEntityBaseResult("",$entity->getlista_producto_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=lista_producto_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,lista_producto $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,lista_producto_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,lista_producto_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getproducto(Connexion $connexion,$rellista_producto) : ?producto{

		$producto= new producto();

		try {
			$productoDataAccess=new producto_data();
			$productoDataAccess->isForFKData=$this->isForFKDataRels;
			$producto=$productoDataAccess->getEntity($connexion,$rellista_producto->getid_producto());

		} catch(Exception $e) {
			throw $e;
		}

		return $producto;
	}


	public function  getunidad_compra(Connexion $connexion,$rellista_producto) : ?unidad{

		$unidad= new unidad();

		try {
			$unidadDataAccess=new unidad_data();
			$unidadDataAccess->isForFKData=$this->isForFKDataRels;
			$unidad=$unidadDataAccess->getEntity($connexion,$rellista_producto->getid_unidad_compra());

		} catch(Exception $e) {
			throw $e;
		}

		return $unidad;
	}


	public function  getunidad_venta(Connexion $connexion,$rellista_producto) : ?unidad{

		$unidad= new unidad();

		try {
			$unidadDataAccess=new unidad_data();
			$unidadDataAccess->isForFKData=$this->isForFKDataRels;
			$unidad=$unidadDataAccess->getEntity($connexion,$rellista_producto->getid_unidad_venta());

		} catch(Exception $e) {
			throw $e;
		}

		return $unidad;
	}


	public function  getcategoria_producto(Connexion $connexion,$rellista_producto) : ?categoria_producto{

		$categoria_producto= new categoria_producto();

		try {
			$categoria_productoDataAccess=new categoria_producto_data();
			$categoria_productoDataAccess->isForFKData=$this->isForFKDataRels;
			$categoria_producto=$categoria_productoDataAccess->getEntity($connexion,$rellista_producto->getid_categoria_producto());

		} catch(Exception $e) {
			throw $e;
		}

		return $categoria_producto;
	}


	public function  getsub_categoria_producto(Connexion $connexion,$rellista_producto) : ?sub_categoria_producto{

		$sub_categoria_producto= new sub_categoria_producto();

		try {
			$sub_categoria_productoDataAccess=new sub_categoria_producto_data();
			$sub_categoria_productoDataAccess->isForFKData=$this->isForFKDataRels;
			$sub_categoria_producto=$sub_categoria_productoDataAccess->getEntity($connexion,$rellista_producto->getid_sub_categoria_producto());

		} catch(Exception $e) {
			throw $e;
		}

		return $sub_categoria_producto;
	}


	public function  gettipo_producto(Connexion $connexion,$rellista_producto) : ?tipo_producto{

		$tipo_producto= new tipo_producto();

		try {
			$tipo_productoDataAccess=new tipo_producto_data();
			$tipo_productoDataAccess->isForFKData=$this->isForFKDataRels;
			$tipo_producto=$tipo_productoDataAccess->getEntity($connexion,$rellista_producto->getid_tipo_producto());

		} catch(Exception $e) {
			throw $e;
		}

		return $tipo_producto;
	}


	public function  getbodega(Connexion $connexion,$rellista_producto) : ?bodega{

		$bodega= new bodega();

		try {
			$bodegaDataAccess=new bodega_data();
			$bodegaDataAccess->isForFKData=$this->isForFKDataRels;
			$bodega=$bodegaDataAccess->getEntity($connexion,$rellista_producto->getid_bodega());

		} catch(Exception $e) {
			throw $e;
		}

		return $bodega;
	}


	public function  getcuenta_compra(Connexion $connexion,$rellista_producto) : ?cuenta{

		$cuenta= new cuenta();

		try {
			$cuentaDataAccess=new cuenta_data();
			$cuentaDataAccess->isForFKData=$this->isForFKDataRels;
			$cuenta=$cuentaDataAccess->getEntity($connexion,$rellista_producto->getid_cuenta_compra());

		} catch(Exception $e) {
			throw $e;
		}

		return $cuenta;
	}


	public function  getcuenta_venta(Connexion $connexion,$rellista_producto) : ?cuenta{

		$cuenta= new cuenta();

		try {
			$cuentaDataAccess=new cuenta_data();
			$cuentaDataAccess->isForFKData=$this->isForFKDataRels;
			$cuenta=$cuentaDataAccess->getEntity($connexion,$rellista_producto->getid_cuenta_venta());

		} catch(Exception $e) {
			throw $e;
		}

		return $cuenta;
	}


	public function  getcuenta_inventario(Connexion $connexion,$rellista_producto) : ?cuenta{

		$cuenta= new cuenta();

		try {
			$cuentaDataAccess=new cuenta_data();
			$cuentaDataAccess->isForFKData=$this->isForFKDataRels;
			$cuenta=$cuentaDataAccess->getEntity($connexion,$rellista_producto->getid_cuenta_inventario());

		} catch(Exception $e) {
			throw $e;
		}

		return $cuenta;
	}


	public function  getotro_suplidor(Connexion $connexion,$rellista_producto) : ?otro_suplidor{

		$otro_suplidor= new otro_suplidor();

		try {
			$otro_suplidorDataAccess=new otro_suplidor_data();
			$otro_suplidorDataAccess->isForFKData=$this->isForFKDataRels;
			$otro_suplidor=$otro_suplidorDataAccess->getEntity($connexion,$rellista_producto->getid_otro_suplidor());

		} catch(Exception $e) {
			throw $e;
		}

		return $otro_suplidor;
	}


	public function  getimpuesto(Connexion $connexion,$rellista_producto) : ?impuesto{

		$impuesto= new impuesto();

		try {
			$impuestoDataAccess=new impuesto_data();
			$impuestoDataAccess->isForFKData=$this->isForFKDataRels;
			$impuesto=$impuestoDataAccess->getEntity($connexion,$rellista_producto->getid_impuesto());

		} catch(Exception $e) {
			throw $e;
		}

		return $impuesto;
	}


	public function  getimpuesto_ventas(Connexion $connexion,$rellista_producto) : ?impuesto{

		$impuesto= new impuesto();

		try {
			$impuestoDataAccess=new impuesto_data();
			$impuestoDataAccess->isForFKData=$this->isForFKDataRels;
			$impuesto=$impuestoDataAccess->getEntity($connexion,$rellista_producto->getid_impuesto_ventas());

		} catch(Exception $e) {
			throw $e;
		}

		return $impuesto;
	}


	public function  getimpuesto_compras(Connexion $connexion,$rellista_producto) : ?impuesto{

		$impuesto= new impuesto();

		try {
			$impuestoDataAccess=new impuesto_data();
			$impuestoDataAccess->isForFKData=$this->isForFKDataRels;
			$impuesto=$impuestoDataAccess->getEntity($connexion,$rellista_producto->getid_impuesto_compras());

		} catch(Exception $e) {
			throw $e;
		}

		return $impuesto;
	}


	public function  getotro_impuesto(Connexion $connexion,$rellista_producto) : ?otro_impuesto{

		$otro_impuesto= new otro_impuesto();

		try {
			$otro_impuestoDataAccess=new otro_impuesto_data();
			$otro_impuestoDataAccess->isForFKData=$this->isForFKDataRels;
			$otro_impuesto=$otro_impuestoDataAccess->getEntity($connexion,$rellista_producto->getid_otro_impuesto());

		} catch(Exception $e) {
			throw $e;
		}

		return $otro_impuesto;
	}


	public function  getotro_impuesto_ventas(Connexion $connexion,$rellista_producto) : ?otro_impuesto{

		$otro_impuesto= new otro_impuesto();

		try {
			$otro_impuestoDataAccess=new otro_impuesto_data();
			$otro_impuestoDataAccess->isForFKData=$this->isForFKDataRels;
			$otro_impuesto=$otro_impuestoDataAccess->getEntity($connexion,$rellista_producto->getid_otro_impuesto_ventas());

		} catch(Exception $e) {
			throw $e;
		}

		return $otro_impuesto;
	}


	public function  getotro_impuesto_compras(Connexion $connexion,$rellista_producto) : ?otro_impuesto{

		$otro_impuesto= new otro_impuesto();

		try {
			$otro_impuestoDataAccess=new otro_impuesto_data();
			$otro_impuestoDataAccess->isForFKData=$this->isForFKDataRels;
			$otro_impuesto=$otro_impuestoDataAccess->getEntity($connexion,$rellista_producto->getid_otro_impuesto_compras());

		} catch(Exception $e) {
			throw $e;
		}

		return $otro_impuesto;
	}


	public function  getretencion(Connexion $connexion,$rellista_producto) : ?retencion{

		$retencion= new retencion();

		try {
			$retencionDataAccess=new retencion_data();
			$retencionDataAccess->isForFKData=$this->isForFKDataRels;
			$retencion=$retencionDataAccess->getEntity($connexion,$rellista_producto->getid_retencion());

		} catch(Exception $e) {
			throw $e;
		}

		return $retencion;
	}


	public function  getretencion_ventas(Connexion $connexion,$rellista_producto) : ?retencion{

		$retencion= new retencion();

		try {
			$retencionDataAccess=new retencion_data();
			$retencionDataAccess->isForFKData=$this->isForFKDataRels;
			$retencion=$retencionDataAccess->getEntity($connexion,$rellista_producto->getid_retencion_ventas());

		} catch(Exception $e) {
			throw $e;
		}

		return $retencion;
	}


	public function  getretencion_compras(Connexion $connexion,$rellista_producto) : ?retencion{

		$retencion= new retencion();

		try {
			$retencionDataAccess=new retencion_data();
			$retencionDataAccess->isForFKData=$this->isForFKDataRels;
			$retencion=$retencionDataAccess->getEntity($connexion,$rellista_producto->getid_retencion_compras());

		} catch(Exception $e) {
			throw $e;
		}

		return $retencion;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,lista_producto $entity,$resultSet) : lista_producto {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_producto((int)$resultSet[$strPrefijo.'id_producto']);
				$entity->setcodigo_producto(utf8_encode($resultSet[$strPrefijo.'codigo_producto']));
				$entity->setdescripcion_producto(utf8_encode($resultSet[$strPrefijo.'descripcion_producto']));
				$entity->setprecio1((float)$resultSet[$strPrefijo.'precio1']);
				$entity->setprecio2((float)$resultSet[$strPrefijo.'precio2']);
				$entity->setprecio3((float)$resultSet[$strPrefijo.'precio3']);
				$entity->setprecio4((float)$resultSet[$strPrefijo.'precio4']);
				$entity->setcosto((float)$resultSet[$strPrefijo.'costo']);
				$entity->setid_unidad_compra((int)$resultSet[$strPrefijo.'id_unidad_compra']);
				$entity->setunidad_en_compra((int)$resultSet[$strPrefijo.'unidad_en_compra']);
				$entity->setequivalencia_en_compra((float)$resultSet[$strPrefijo.'equivalencia_en_compra']);
				$entity->setid_unidad_venta((int)$resultSet[$strPrefijo.'id_unidad_venta']);
				$entity->setunidad_en_venta((int)$resultSet[$strPrefijo.'unidad_en_venta']);
				$entity->setequivalencia_en_venta((float)$resultSet[$strPrefijo.'equivalencia_en_venta']);
				$entity->setcantidad_total((float)$resultSet[$strPrefijo.'cantidad_total']);
				$entity->setcantidad_minima((float)$resultSet[$strPrefijo.'cantidad_minima']);
				$entity->setid_categoria_producto((int)$resultSet[$strPrefijo.'id_categoria_producto']);
				$entity->setid_sub_categoria_producto((int)$resultSet[$strPrefijo.'id_sub_categoria_producto']);
				$entity->setacepta_lote(utf8_encode($resultSet[$strPrefijo.'acepta_lote']));
				$entity->setvalor_inventario((float)$resultSet[$strPrefijo.'valor_inventario']);
				$entity->setimagen(utf8_encode($resultSet[$strPrefijo.'imagen']));
				$entity->setincremento1((float)$resultSet[$strPrefijo.'incremento1']);
				$entity->setincremento2((float)$resultSet[$strPrefijo.'incremento2']);
				$entity->setincremento3((float)$resultSet[$strPrefijo.'incremento3']);
				$entity->setincremento4((float)$resultSet[$strPrefijo.'incremento4']);
				$entity->setcodigo_fabricante(utf8_encode($resultSet[$strPrefijo.'codigo_fabricante']));
				$entity->setproducto_fisico((int)$resultSet[$strPrefijo.'producto_fisico']);
				$entity->setsituacion_producto((int)$resultSet[$strPrefijo.'situacion_producto']);
				$entity->setid_tipo_producto((int)$resultSet[$strPrefijo.'id_tipo_producto']);
				$entity->settipo_producto_codigo(utf8_encode($resultSet[$strPrefijo.'tipo_producto_codigo']));
				$entity->setid_bodega((int)$resultSet[$strPrefijo.'id_bodega']);
				$entity->setmostrar_componente(utf8_encode($resultSet[$strPrefijo.'mostrar_componente']));
				$entity->setfactura_sin_stock(utf8_encode($resultSet[$strPrefijo.'factura_sin_stock']));
				$entity->setavisa_expiracion(utf8_encode($resultSet[$strPrefijo.'avisa_expiracion']));
				$entity->setfactura_con_precio((int)$resultSet[$strPrefijo.'factura_con_precio']);
				$entity->setproducto_equivalente(utf8_encode($resultSet[$strPrefijo.'producto_equivalente']));
				$entity->setid_cuenta_compra((int)$resultSet[$strPrefijo.'id_cuenta_compra']);
				$entity->setid_cuenta_venta((int)$resultSet[$strPrefijo.'id_cuenta_venta']);
				$entity->setid_cuenta_inventario((int)$resultSet[$strPrefijo.'id_cuenta_inventario']);
				$entity->setcuenta_compra_codigo(utf8_encode($resultSet[$strPrefijo.'cuenta_compra_codigo']));
				$entity->setcuenta_venta_codigo(utf8_encode($resultSet[$strPrefijo.'cuenta_venta_codigo']));
				$entity->setcuenta_inventario_codigo(utf8_encode($resultSet[$strPrefijo.'cuenta_inventario_codigo']));
				$entity->setid_otro_suplidor((int)$resultSet[$strPrefijo.'id_otro_suplidor']);
				$entity->setid_impuesto((int)$resultSet[$strPrefijo.'id_impuesto']);
				$entity->setid_impuesto_ventas((int)$resultSet[$strPrefijo.'id_impuesto_ventas']);
				$entity->setid_impuesto_compras((int)$resultSet[$strPrefijo.'id_impuesto_compras']);
				$entity->setimpuesto1_en_ventas(utf8_encode($resultSet[$strPrefijo.'impuesto1_en_ventas']));
				$entity->setimpuesto1_en_compras(utf8_encode($resultSet[$strPrefijo.'impuesto1_en_compras']));
				$entity->setultima_venta($resultSet[$strPrefijo.'ultima_venta']);
				$entity->setid_otro_impuesto((int)$resultSet[$strPrefijo.'id_otro_impuesto']);
				$entity->setid_otro_impuesto_ventas((int)$resultSet[$strPrefijo.'id_otro_impuesto_ventas']);
				$entity->setid_otro_impuesto_compras((int)$resultSet[$strPrefijo.'id_otro_impuesto_compras']);
				$entity->setotro_impuesto_ventas_codigo(utf8_encode($resultSet[$strPrefijo.'otro_impuesto_ventas_codigo']));
				$entity->setotro_impuesto_compras_codigo(utf8_encode($resultSet[$strPrefijo.'otro_impuesto_compras_codigo']));
				$entity->setprecio_de_compra_0((float)$resultSet[$strPrefijo.'precio_de_compra_0']);
				$entity->setprecio_actualizado($resultSet[$strPrefijo.'precio_actualizado']);
				$entity->setrequiere_nro_serie(utf8_encode($resultSet[$strPrefijo.'requiere_nro_serie']));
				$entity->setcosto_dolar((float)$resultSet[$strPrefijo.'costo_dolar']);
				$entity->setcomentario(utf8_encode($resultSet[$strPrefijo.'comentario']));
				$entity->setcomenta_factura(utf8_encode($resultSet[$strPrefijo.'comenta_factura']));
				$entity->setid_retencion((int)$resultSet[$strPrefijo.'id_retencion']);
				$entity->setid_retencion_ventas((int)$resultSet[$strPrefijo.'id_retencion_ventas']);
				$entity->setid_retencion_compras((int)$resultSet[$strPrefijo.'id_retencion_compras']);
				$entity->setretencion_ventas_codigo(utf8_encode($resultSet[$strPrefijo.'retencion_ventas_codigo']));
				$entity->setretencion_compras_codigo(utf8_encode($resultSet[$strPrefijo.'retencion_compras_codigo']));
				$entity->setnotas(utf8_encode($resultSet[$strPrefijo.'notas']));
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,lista_producto $lista_producto,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $lista_producto->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'issdddddiidiidddiisdsddddsiiisisssisiiisssiiiisssiiissdssdssiiisss', $lista_producto->getid_producto(),$lista_producto->getcodigo_producto(),$lista_producto->getdescripcion_producto(),$lista_producto->getprecio1(),$lista_producto->getprecio2(),$lista_producto->getprecio3(),$lista_producto->getprecio4(),$lista_producto->getcosto(),$lista_producto->getid_unidad_compra(),$lista_producto->getunidad_en_compra(),$lista_producto->getequivalencia_en_compra(),$lista_producto->getid_unidad_venta(),$lista_producto->getunidad_en_venta(),$lista_producto->getequivalencia_en_venta(),$lista_producto->getcantidad_total(),$lista_producto->getcantidad_minima(),$lista_producto->getid_categoria_producto(),$lista_producto->getid_sub_categoria_producto(),$lista_producto->getacepta_lote(),$lista_producto->getvalor_inventario(),$lista_producto->getimagen(),$lista_producto->getincremento1(),$lista_producto->getincremento2(),$lista_producto->getincremento3(),$lista_producto->getincremento4(),$lista_producto->getcodigo_fabricante(),$lista_producto->getproducto_fisico(),$lista_producto->getsituacion_producto(),$lista_producto->getid_tipo_producto(),$lista_producto->gettipo_producto_codigo(),$lista_producto->getid_bodega(),$lista_producto->getmostrar_componente(),$lista_producto->getfactura_sin_stock(),$lista_producto->getavisa_expiracion(),$lista_producto->getfactura_con_precio(),$lista_producto->getproducto_equivalente(),$lista_producto->getid_cuenta_compra(),$lista_producto->getid_cuenta_venta(),$lista_producto->getid_cuenta_inventario(),$lista_producto->getcuenta_compra_codigo(),$lista_producto->getcuenta_venta_codigo(),$lista_producto->getcuenta_inventario_codigo(),$lista_producto->getid_otro_suplidor(),$lista_producto->getid_impuesto(),$lista_producto->getid_impuesto_ventas(),$lista_producto->getid_impuesto_compras(),$lista_producto->getimpuesto1_en_ventas(),$lista_producto->getimpuesto1_en_compras(),$lista_producto->getultima_venta(),$lista_producto->getid_otro_impuesto(),$lista_producto->getid_otro_impuesto_ventas(),$lista_producto->getid_otro_impuesto_compras(),$lista_producto->getotro_impuesto_ventas_codigo(),$lista_producto->getotro_impuesto_compras_codigo(),$lista_producto->getprecio_de_compra_0(),$lista_producto->getprecio_actualizado(),$lista_producto->getrequiere_nro_serie(),$lista_producto->getcosto_dolar(),$lista_producto->getcomentario(),$lista_producto->getcomenta_factura(),$lista_producto->getid_retencion(),$lista_producto->getid_retencion_ventas(),$lista_producto->getid_retencion_compras(),$lista_producto->getretencion_ventas_codigo(),$lista_producto->getretencion_compras_codigo(),$lista_producto->getnotas());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'issdddddiidiidddiisdsddddsiiisisssisiiisssiiiisssiiissdssdssiiisssis', $lista_producto->getid_producto(),$lista_producto->getcodigo_producto(),$lista_producto->getdescripcion_producto(),$lista_producto->getprecio1(),$lista_producto->getprecio2(),$lista_producto->getprecio3(),$lista_producto->getprecio4(),$lista_producto->getcosto(),$lista_producto->getid_unidad_compra(),$lista_producto->getunidad_en_compra(),$lista_producto->getequivalencia_en_compra(),$lista_producto->getid_unidad_venta(),$lista_producto->getunidad_en_venta(),$lista_producto->getequivalencia_en_venta(),$lista_producto->getcantidad_total(),$lista_producto->getcantidad_minima(),$lista_producto->getid_categoria_producto(),$lista_producto->getid_sub_categoria_producto(),$lista_producto->getacepta_lote(),$lista_producto->getvalor_inventario(),$lista_producto->getimagen(),$lista_producto->getincremento1(),$lista_producto->getincremento2(),$lista_producto->getincremento3(),$lista_producto->getincremento4(),$lista_producto->getcodigo_fabricante(),$lista_producto->getproducto_fisico(),$lista_producto->getsituacion_producto(),$lista_producto->getid_tipo_producto(),$lista_producto->gettipo_producto_codigo(),$lista_producto->getid_bodega(),$lista_producto->getmostrar_componente(),$lista_producto->getfactura_sin_stock(),$lista_producto->getavisa_expiracion(),$lista_producto->getfactura_con_precio(),$lista_producto->getproducto_equivalente(),$lista_producto->getid_cuenta_compra(),$lista_producto->getid_cuenta_venta(),$lista_producto->getid_cuenta_inventario(),$lista_producto->getcuenta_compra_codigo(),$lista_producto->getcuenta_venta_codigo(),$lista_producto->getcuenta_inventario_codigo(),$lista_producto->getid_otro_suplidor(),$lista_producto->getid_impuesto(),$lista_producto->getid_impuesto_ventas(),$lista_producto->getid_impuesto_compras(),$lista_producto->getimpuesto1_en_ventas(),$lista_producto->getimpuesto1_en_compras(),$lista_producto->getultima_venta(),$lista_producto->getid_otro_impuesto(),$lista_producto->getid_otro_impuesto_ventas(),$lista_producto->getid_otro_impuesto_compras(),$lista_producto->getotro_impuesto_ventas_codigo(),$lista_producto->getotro_impuesto_compras_codigo(),$lista_producto->getprecio_de_compra_0(),$lista_producto->getprecio_actualizado(),$lista_producto->getrequiere_nro_serie(),$lista_producto->getcosto_dolar(),$lista_producto->getcomentario(),$lista_producto->getcomenta_factura(),$lista_producto->getid_retencion(),$lista_producto->getid_retencion_ventas(),$lista_producto->getid_retencion_compras(),$lista_producto->getretencion_ventas_codigo(),$lista_producto->getretencion_compras_codigo(),$lista_producto->getnotas(), $lista_producto->getId(), Funciones::GetRealScapeString($lista_producto->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,lista_producto $lista_producto,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($lista_producto->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($lista_producto->getid_producto(),Funciones::GetRealScapeString($lista_producto->getcodigo_producto(),$connexion),Funciones::GetRealScapeString($lista_producto->getdescripcion_producto(),$connexion),$lista_producto->getprecio1(),$lista_producto->getprecio2(),$lista_producto->getprecio3(),$lista_producto->getprecio4(),$lista_producto->getcosto(),$lista_producto->getid_unidad_compra(),$lista_producto->getunidad_en_compra(),$lista_producto->getequivalencia_en_compra(),$lista_producto->getid_unidad_venta(),$lista_producto->getunidad_en_venta(),$lista_producto->getequivalencia_en_venta(),$lista_producto->getcantidad_total(),$lista_producto->getcantidad_minima(),$lista_producto->getid_categoria_producto(),$lista_producto->getid_sub_categoria_producto(),Funciones::GetRealScapeString($lista_producto->getacepta_lote(),$connexion),$lista_producto->getvalor_inventario(),Funciones::GetRealScapeString($lista_producto->getimagen(),$connexion),$lista_producto->getincremento1(),$lista_producto->getincremento2(),$lista_producto->getincremento3(),$lista_producto->getincremento4(),Funciones::GetRealScapeString($lista_producto->getcodigo_fabricante(),$connexion),$lista_producto->getproducto_fisico(),$lista_producto->getsituacion_producto(),$lista_producto->getid_tipo_producto(),Funciones::GetRealScapeString($lista_producto->gettipo_producto_codigo(),$connexion),$lista_producto->getid_bodega(),Funciones::GetRealScapeString($lista_producto->getmostrar_componente(),$connexion),Funciones::GetRealScapeString($lista_producto->getfactura_sin_stock(),$connexion),Funciones::GetRealScapeString($lista_producto->getavisa_expiracion(),$connexion),$lista_producto->getfactura_con_precio(),Funciones::GetRealScapeString($lista_producto->getproducto_equivalente(),$connexion),$lista_producto->getid_cuenta_compra(),$lista_producto->getid_cuenta_venta(),$lista_producto->getid_cuenta_inventario(),Funciones::GetRealScapeString($lista_producto->getcuenta_compra_codigo(),$connexion),Funciones::GetRealScapeString($lista_producto->getcuenta_venta_codigo(),$connexion),Funciones::GetRealScapeString($lista_producto->getcuenta_inventario_codigo(),$connexion),$lista_producto->getid_otro_suplidor(),$lista_producto->getid_impuesto(),$lista_producto->getid_impuesto_ventas(),$lista_producto->getid_impuesto_compras(),Funciones::GetRealScapeString($lista_producto->getimpuesto1_en_ventas(),$connexion),Funciones::GetRealScapeString($lista_producto->getimpuesto1_en_compras(),$connexion),Funciones::GetRealScapeString($lista_producto->getultima_venta(),$connexion),$lista_producto->getid_otro_impuesto(),$lista_producto->getid_otro_impuesto_ventas(),$lista_producto->getid_otro_impuesto_compras(),Funciones::GetRealScapeString($lista_producto->getotro_impuesto_ventas_codigo(),$connexion),Funciones::GetRealScapeString($lista_producto->getotro_impuesto_compras_codigo(),$connexion),$lista_producto->getprecio_de_compra_0(),Funciones::GetRealScapeString($lista_producto->getprecio_actualizado(),$connexion),Funciones::GetRealScapeString($lista_producto->getrequiere_nro_serie(),$connexion),$lista_producto->getcosto_dolar(),Funciones::GetRealScapeString($lista_producto->getcomentario(),$connexion),Funciones::GetRealScapeString($lista_producto->getcomenta_factura(),$connexion),$lista_producto->getid_retencion(),$lista_producto->getid_retencion_ventas(),$lista_producto->getid_retencion_compras(),Funciones::GetRealScapeString($lista_producto->getretencion_ventas_codigo(),$connexion),Funciones::GetRealScapeString($lista_producto->getretencion_compras_codigo(),$connexion),Funciones::GetRealScapeString($lista_producto->getnotas(),$connexion));
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($lista_producto->getid_producto(),Funciones::GetRealScapeString($lista_producto->getcodigo_producto(),$connexion),Funciones::GetRealScapeString($lista_producto->getdescripcion_producto(),$connexion),$lista_producto->getprecio1(),$lista_producto->getprecio2(),$lista_producto->getprecio3(),$lista_producto->getprecio4(),$lista_producto->getcosto(),$lista_producto->getid_unidad_compra(),$lista_producto->getunidad_en_compra(),$lista_producto->getequivalencia_en_compra(),$lista_producto->getid_unidad_venta(),$lista_producto->getunidad_en_venta(),$lista_producto->getequivalencia_en_venta(),$lista_producto->getcantidad_total(),$lista_producto->getcantidad_minima(),$lista_producto->getid_categoria_producto(),$lista_producto->getid_sub_categoria_producto(),Funciones::GetRealScapeString($lista_producto->getacepta_lote(),$connexion),$lista_producto->getvalor_inventario(),Funciones::GetRealScapeString($lista_producto->getimagen(),$connexion),$lista_producto->getincremento1(),$lista_producto->getincremento2(),$lista_producto->getincremento3(),$lista_producto->getincremento4(),Funciones::GetRealScapeString($lista_producto->getcodigo_fabricante(),$connexion),$lista_producto->getproducto_fisico(),$lista_producto->getsituacion_producto(),$lista_producto->getid_tipo_producto(),Funciones::GetRealScapeString($lista_producto->gettipo_producto_codigo(),$connexion),$lista_producto->getid_bodega(),Funciones::GetRealScapeString($lista_producto->getmostrar_componente(),$connexion),Funciones::GetRealScapeString($lista_producto->getfactura_sin_stock(),$connexion),Funciones::GetRealScapeString($lista_producto->getavisa_expiracion(),$connexion),$lista_producto->getfactura_con_precio(),Funciones::GetRealScapeString($lista_producto->getproducto_equivalente(),$connexion),$lista_producto->getid_cuenta_compra(),$lista_producto->getid_cuenta_venta(),$lista_producto->getid_cuenta_inventario(),Funciones::GetRealScapeString($lista_producto->getcuenta_compra_codigo(),$connexion),Funciones::GetRealScapeString($lista_producto->getcuenta_venta_codigo(),$connexion),Funciones::GetRealScapeString($lista_producto->getcuenta_inventario_codigo(),$connexion),$lista_producto->getid_otro_suplidor(),$lista_producto->getid_impuesto(),$lista_producto->getid_impuesto_ventas(),$lista_producto->getid_impuesto_compras(),Funciones::GetRealScapeString($lista_producto->getimpuesto1_en_ventas(),$connexion),Funciones::GetRealScapeString($lista_producto->getimpuesto1_en_compras(),$connexion),Funciones::GetRealScapeString($lista_producto->getultima_venta(),$connexion),$lista_producto->getid_otro_impuesto(),$lista_producto->getid_otro_impuesto_ventas(),$lista_producto->getid_otro_impuesto_compras(),Funciones::GetRealScapeString($lista_producto->getotro_impuesto_ventas_codigo(),$connexion),Funciones::GetRealScapeString($lista_producto->getotro_impuesto_compras_codigo(),$connexion),$lista_producto->getprecio_de_compra_0(),Funciones::GetRealScapeString($lista_producto->getprecio_actualizado(),$connexion),Funciones::GetRealScapeString($lista_producto->getrequiere_nro_serie(),$connexion),$lista_producto->getcosto_dolar(),Funciones::GetRealScapeString($lista_producto->getcomentario(),$connexion),Funciones::GetRealScapeString($lista_producto->getcomenta_factura(),$connexion),$lista_producto->getid_retencion(),$lista_producto->getid_retencion_ventas(),$lista_producto->getid_retencion_compras(),Funciones::GetRealScapeString($lista_producto->getretencion_ventas_codigo(),$connexion),Funciones::GetRealScapeString($lista_producto->getretencion_compras_codigo(),$connexion),Funciones::GetRealScapeString($lista_producto->getnotas(),$connexion), $lista_producto->getId(), Funciones::GetRealScapeString($lista_producto->getVersionRow(),$connexion));
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
	
	public function setlista_producto_Original(lista_producto $lista_producto) {
		$lista_producto->setlista_producto_Original(clone $lista_producto);		
	}
	
	public function setlista_productos_Original(array $lista_productos) {
		foreach($lista_productos as $lista_producto){
			$lista_producto->setlista_producto_Original(clone $lista_producto);
		}
	}
	
	public static function setlista_producto_OriginalStatic(lista_producto $lista_producto) {
		$lista_producto->setlista_producto_Original(clone $lista_producto);		
	}
	
	public static function setlista_productos_OriginalStatic(array $lista_productos) {		
		foreach($lista_productos as $lista_producto){
			$lista_producto->setlista_producto_Original(clone $lista_producto);
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
