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
namespace com\bydan\contabilidad\inventario\orden_compra\business\data;

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

use com\bydan\contabilidad\inventario\orden_compra\business\entity\orden_compra;

//FK


use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\entity\empresa;

use com\bydan\contabilidad\general\sucursal\business\data\sucursal_data;
use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;

use com\bydan\contabilidad\contabilidad\ejercicio\business\data\ejercicio_data;
use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;

use com\bydan\contabilidad\contabilidad\periodo\business\data\periodo_data;
use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;

use com\bydan\contabilidad\seguridad\usuario\business\data\usuario_data;
use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\data\proveedor_data;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;

use com\bydan\contabilidad\facturacion\vendedor\business\data\vendedor_data;
use com\bydan\contabilidad\facturacion\vendedor\business\entity\vendedor;

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\data\termino_pago_proveedor_data;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity\termino_pago_proveedor;

use com\bydan\contabilidad\contabilidad\moneda\business\data\moneda_data;
use com\bydan\contabilidad\contabilidad\moneda\business\entity\moneda;

use com\bydan\contabilidad\general\estado\business\data\estado_data;
use com\bydan\contabilidad\general\estado\business\entity\estado;

use com\bydan\contabilidad\contabilidad\asiento\business\data\asiento_data;
use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;

use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\business\data\documento_cuenta_pagar_data;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\business\entity\documento_cuenta_pagar;

use com\bydan\contabilidad\inventario\kardex\business\data\kardex_data;
use com\bydan\contabilidad\inventario\kardex\business\entity\kardex;

//REL

use com\bydan\contabilidad\inventario\orden_compra_detalle\business\data\orden_compra_detalle_data;


class orden_compra_data extends GetEntitiesDataAccessHelper implements orden_compra_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='inv_';
	public static string $TABLE_NAME='inv_orden_compra';			
	public static string $TABLE_NAME_orden_compra='orden_compra';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_ORDEN_COMPRA_INSERT(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_ORDEN_COMPRA_UPDATE(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_ORDEN_COMPRA_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_ORDEN_COMPRA_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $orden_compra_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'orden_compra';
		
		orden_compra_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('INVENTARIO');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->orden_compra_DataAccessAdditional=new orden_compraDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_empresa,id_sucursal,id_ejercicio,id_periodo,id_usuario,numero,id_proveedor,ruc,fecha_emision,id_vendedor,id_termino_pago_proveedor,fecha_vence,cotizacion,id_moneda,impuesto_en_precio,id_estado,direccion,enviar,observacion,sub_total,descuento_monto,descuento_porciento,iva_monto,iva_porciento,retencion_fuente_monto,retencion_fuente_porciento,retencion_iva_monto,retencion_iva_porciento,total,otro_monto,otro_porciento,retencion_ica_monto,retencion_ica_porciento,factura_proveedor,recibida,pagos,id_asiento,id_documento_cuenta_pagar,id_kardex) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%d,%d,%d,%d,\'%s\',%d,\'%s\',\'%s\',%d,%d,\'%s\',%f,%d,\'%d\',%d,\'%s\',\'%s\',\'%s\',%f,%f,%f,%f,%f,%f,%f,%f,%f,%f,%f,%f,%f,%f,\'%s\',\'%d\',%f,%s,%s,%s)';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_empresa=%d,id_sucursal=%d,id_ejercicio=%d,id_periodo=%d,id_usuario=%d,numero=\'%s\',id_proveedor=%d,ruc=\'%s\',fecha_emision=\'%s\',id_vendedor=%d,id_termino_pago_proveedor=%d,fecha_vence=\'%s\',cotizacion=%f,id_moneda=%d,impuesto_en_precio=\'%d\',id_estado=%d,direccion=\'%s\',enviar=\'%s\',observacion=\'%s\',sub_total=%f,descuento_monto=%f,descuento_porciento=%f,iva_monto=%f,iva_porciento=%f,retencion_fuente_monto=%f,retencion_fuente_porciento=%f,retencion_iva_monto=%f,retencion_iva_porciento=%f,total=%f,otro_monto=%f,otro_porciento=%f,retencion_ica_monto=%f,retencion_ica_porciento=%f,factura_proveedor=\'%s\',recibida=\'%d\',pagos=%f,id_asiento=%s,id_documento_cuenta_pagar=%s,id_kardex=%s where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_sucursal,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_ejercicio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_periodo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_usuario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.ruc,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_emision,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_vendedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_termino_pago_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_vence,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cotizacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_moneda,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.impuesto_en_precio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_estado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.direccion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.enviar,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.observacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.sub_total,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descuento_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descuento_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.iva_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.iva_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.retencion_fuente_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.retencion_fuente_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.retencion_iva_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.retencion_iva_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.total,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.otro_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.otro_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.retencion_ica_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.retencion_ica_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.factura_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.recibida,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.pagos,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_asiento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_documento_cuenta_pagar,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_kardex from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(orden_compra $orden_compra,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($orden_compra->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=orden_compra_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($orden_compra->getId(),$connexion));				
				
			} else if ($orden_compra->getIsChanged()) {
				if($orden_compra->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=orden_compra_data::$QUERY_INSERT;
					
					
					
					

					//$id_asiento='null';
					//if($orden_compra->getid_asiento()!==null && $orden_compra->getid_asiento()>=0) {
						//$id_asiento=$orden_compra->getid_asiento();
					//} else {
						//$id_asiento='null';
					//}

					//$id_documento_cuenta_pagar='null';
					//if($orden_compra->getid_documento_cuenta_pagar()!==null && $orden_compra->getid_documento_cuenta_pagar()>=0) {
						//$id_documento_cuenta_pagar=$orden_compra->getid_documento_cuenta_pagar();
					//} else {
						//$id_documento_cuenta_pagar='null';
					//}

					//$id_kardex='null';
					//if($orden_compra->getid_kardex()!==null && $orden_compra->getid_kardex()>=0) {
						//$id_kardex=$orden_compra->getid_kardex();
					//} else {
						//$id_kardex='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$orden_compra->getid_empresa(),$orden_compra->getid_sucursal(),$orden_compra->getid_ejercicio(),$orden_compra->getid_periodo(),$orden_compra->getid_usuario(),Funciones::GetRealScapeString($orden_compra->getnumero(),$connexion),$orden_compra->getid_proveedor(),Funciones::GetRealScapeString($orden_compra->getruc(),$connexion),Funciones::GetRealScapeString($orden_compra->getfecha_emision(),$connexion),$orden_compra->getid_vendedor(),$orden_compra->getid_termino_pago_proveedor(),Funciones::GetRealScapeString($orden_compra->getfecha_vence(),$connexion),$orden_compra->getcotizacion(),$orden_compra->getid_moneda(),$orden_compra->getimpuesto_en_precio(),$orden_compra->getid_estado(),Funciones::GetRealScapeString($orden_compra->getdireccion(),$connexion),Funciones::GetRealScapeString($orden_compra->getenviar(),$connexion),Funciones::GetRealScapeString($orden_compra->getobservacion(),$connexion),$orden_compra->getsub_total(),$orden_compra->getdescuento_monto(),$orden_compra->getdescuento_porciento(),$orden_compra->getiva_monto(),$orden_compra->getiva_porciento(),$orden_compra->getretencion_fuente_monto(),$orden_compra->getretencion_fuente_porciento(),$orden_compra->getretencion_iva_monto(),$orden_compra->getretencion_iva_porciento(),$orden_compra->gettotal(),$orden_compra->getotro_monto(),$orden_compra->getotro_porciento(),$orden_compra->getretencion_ica_monto(),$orden_compra->getretencion_ica_porciento(),Funciones::GetRealScapeString($orden_compra->getfactura_proveedor(),$connexion),$orden_compra->getrecibida(),$orden_compra->getpagos(),Funciones::GetNullString($orden_compra->getid_asiento()),Funciones::GetNullString($orden_compra->getid_documento_cuenta_pagar()),Funciones::GetNullString($orden_compra->getid_kardex()) );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=orden_compra_data::$QUERY_UPDATE;			
					
					
					
					

					//$id_asiento='null';
					//if($orden_compra->getid_asiento()!==null && $orden_compra->getid_asiento()>=0) {
						//$id_asiento=$orden_compra->getid_asiento();
					//} else {
						//$id_asiento='null';
					//}

					//$id_documento_cuenta_pagar='null';
					//if($orden_compra->getid_documento_cuenta_pagar()!==null && $orden_compra->getid_documento_cuenta_pagar()>=0) {
						//$id_documento_cuenta_pagar=$orden_compra->getid_documento_cuenta_pagar();
					//} else {
						//$id_documento_cuenta_pagar='null';
					//}

					//$id_kardex='null';
					//if($orden_compra->getid_kardex()!==null && $orden_compra->getid_kardex()>=0) {
						//$id_kardex=$orden_compra->getid_kardex();
					//} else {
						//$id_kardex='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$orden_compra->getid_empresa(),$orden_compra->getid_sucursal(),$orden_compra->getid_ejercicio(),$orden_compra->getid_periodo(),$orden_compra->getid_usuario(),Funciones::GetRealScapeString($orden_compra->getnumero(),$connexion),$orden_compra->getid_proveedor(),Funciones::GetRealScapeString($orden_compra->getruc(),$connexion),Funciones::GetRealScapeString($orden_compra->getfecha_emision(),$connexion),$orden_compra->getid_vendedor(),$orden_compra->getid_termino_pago_proveedor(),Funciones::GetRealScapeString($orden_compra->getfecha_vence(),$connexion),$orden_compra->getcotizacion(),$orden_compra->getid_moneda(),$orden_compra->getimpuesto_en_precio(),$orden_compra->getid_estado(),Funciones::GetRealScapeString($orden_compra->getdireccion(),$connexion),Funciones::GetRealScapeString($orden_compra->getenviar(),$connexion),Funciones::GetRealScapeString($orden_compra->getobservacion(),$connexion),$orden_compra->getsub_total(),$orden_compra->getdescuento_monto(),$orden_compra->getdescuento_porciento(),$orden_compra->getiva_monto(),$orden_compra->getiva_porciento(),$orden_compra->getretencion_fuente_monto(),$orden_compra->getretencion_fuente_porciento(),$orden_compra->getretencion_iva_monto(),$orden_compra->getretencion_iva_porciento(),$orden_compra->gettotal(),$orden_compra->getotro_monto(),$orden_compra->getotro_porciento(),$orden_compra->getretencion_ica_monto(),$orden_compra->getretencion_ica_porciento(),Funciones::GetRealScapeString($orden_compra->getfactura_proveedor(),$connexion),$orden_compra->getrecibida(),$orden_compra->getpagos(),Funciones::GetNullString($orden_compra->getid_asiento()),Funciones::GetNullString($orden_compra->getid_documento_cuenta_pagar()),Funciones::GetNullString($orden_compra->getid_kardex()), Funciones::GetRealScapeString($orden_compra->getId(),$connexion), Funciones::GetRealScapeString($orden_compra->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($orden_compra, $connexion,$strQuerySaveComplete,orden_compra_data::$TABLE_NAME,orden_compra_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				orden_compra_data::savePrepared($orden_compra, $connexion,$strQuerySave,orden_compra_data::$TABLE_NAME,orden_compra_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			orden_compra_data::setorden_compra_OriginalStatic($orden_compra);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(orden_compra $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				orden_compra_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					orden_compra_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					orden_compra_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(orden_compra $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					orden_compra_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(orden_compra $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					orden_compra_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(orden_compra $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					orden_compra_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?orden_compra {		
		$entity = new orden_compra();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=orden_compra_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=orden_compra_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//Inventario.orden_compra.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setorden_compra_Original(new orden_compra());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,orden_compra_data::$IS_WITH_SCHEMA);         	    
				/*$entity=orden_compra_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setorden_compra_Original(parent::getEntityPrefijoEntityResult("",$entity->getorden_compra_Original(),$resultSet,orden_compra_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setorden_compra_Original(orden_compra_data::getEntityBaseResult("",$entity->getorden_compra_Original(),$resultSet));
				//$entity->setorden_compra_Original($this->getEntityBaseResult("",$entity->getorden_compra_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?orden_compra {
		$entity = new orden_compra();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=orden_compra_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=orden_compra_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,orden_compra_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".Inventario.orden_compra.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setorden_compra_Original(new orden_compra());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,orden_compra_data::$IS_WITH_SCHEMA);         	    
				/*$entity=orden_compra_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setorden_compra_Original(parent::getEntityPrefijoEntityResult("",$entity->getorden_compra_Original(),$resultSet,orden_compra_data::$IS_WITH_SCHEMA));         		
				////$entity->setorden_compra_Original(orden_compra_data::getEntityBaseResult("",$entity->getorden_compra_Original(),$resultSet));
				//$entity->setorden_compra_Original($this->getEntityBaseResult("",$entity->getorden_compra_Original(),$resultSet));
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
		$entity = new orden_compra();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=orden_compra_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=orden_compra_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,orden_compra_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new orden_compra();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,orden_compra_data::$IS_WITH_SCHEMA);         		
				/*$entity=orden_compra_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setorden_compra_Original( new orden_compra());
				
				//$entity->setorden_compra_Original(parent::getEntityPrefijoEntityResult("",$entity->getorden_compra_Original(),$resultSet,orden_compra_data::$IS_WITH_SCHEMA));         		
				////$entity->setorden_compra_Original(orden_compra_data::getEntityBaseResult("",$entity->getorden_compra_Original(),$resultSet));
				//$entity->setorden_compra_Original($this->getEntityBaseResult("",$entity->getorden_compra_Original(),$resultSet));
								
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
		$entity = new orden_compra();		  
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
      	    	$entity = new orden_compra();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,orden_compra_data::$IS_WITH_SCHEMA);         		
				/*$entity=orden_compra_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setorden_compra_Original( new orden_compra());
				
				//$entity->setorden_compra_Original(parent::getEntityPrefijoEntityResult("",$entity->getorden_compra_Original(),$resultSet,orden_compra_data::$IS_WITH_SCHEMA));         		
				////$entity->setorden_compra_Original(orden_compra_data::getEntityBaseResult("",$entity->getorden_compra_Original(),$resultSet));
				//$entity->setorden_compra_Original($this->getEntityBaseResult("",$entity->getorden_compra_Original(),$resultSet));
				
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
		$entity = new orden_compra();		  
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
      	    	$entity = new orden_compra();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,orden_compra_data::$IS_WITH_SCHEMA);         		
				/*$entity=orden_compra_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setorden_compra_Original( new orden_compra());				
				//$entity->setorden_compra_Original(parent::getEntityPrefijoEntityResult("",$entity->getorden_compra_Original(),$resultSet,orden_compra_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setorden_compra_Original(orden_compra_data::getEntityBaseResult("",$entity->getorden_compra_Original(),$resultSet));
				//$entity->setorden_compra_Original($this->getEntityBaseResult("",$entity->getorden_compra_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=orden_compra_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,orden_compra $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,orden_compra_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,orden_compra_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getempresa(Connexion $connexion,$relorden_compra) : ?empresa{

		$empresa= new empresa();

		try {
			$empresaDataAccess=new empresa_data();
			$empresaDataAccess->isForFKData=$this->isForFKDataRels;
			$empresa=$empresaDataAccess->getEntity($connexion,$relorden_compra->getid_empresa());

		} catch(Exception $e) {
			throw $e;
		}

		return $empresa;
	}


	public function  getsucursal(Connexion $connexion,$relorden_compra) : ?sucursal{

		$sucursal= new sucursal();

		try {
			$sucursalDataAccess=new sucursal_data();
			$sucursalDataAccess->isForFKData=$this->isForFKDataRels;
			$sucursal=$sucursalDataAccess->getEntity($connexion,$relorden_compra->getid_sucursal());

		} catch(Exception $e) {
			throw $e;
		}

		return $sucursal;
	}


	public function  getejercicio(Connexion $connexion,$relorden_compra) : ?ejercicio{

		$ejercicio= new ejercicio();

		try {
			$ejercicioDataAccess=new ejercicio_data();
			$ejercicioDataAccess->isForFKData=$this->isForFKDataRels;
			$ejercicio=$ejercicioDataAccess->getEntity($connexion,$relorden_compra->getid_ejercicio());

		} catch(Exception $e) {
			throw $e;
		}

		return $ejercicio;
	}


	public function  getperiodo(Connexion $connexion,$relorden_compra) : ?periodo{

		$periodo= new periodo();

		try {
			$periodoDataAccess=new periodo_data();
			$periodoDataAccess->isForFKData=$this->isForFKDataRels;
			$periodo=$periodoDataAccess->getEntity($connexion,$relorden_compra->getid_periodo());

		} catch(Exception $e) {
			throw $e;
		}

		return $periodo;
	}


	public function  getusuario(Connexion $connexion,$relorden_compra) : ?usuario{

		$usuario= new usuario();

		try {
			$usuarioDataAccess=new usuario_data();
			$usuarioDataAccess->isForFKData=$this->isForFKDataRels;
			$usuario=$usuarioDataAccess->getEntity($connexion,$relorden_compra->getid_usuario());

		} catch(Exception $e) {
			throw $e;
		}

		return $usuario;
	}


	public function  getproveedor(Connexion $connexion,$relorden_compra) : ?proveedor{

		$proveedor= new proveedor();

		try {
			$proveedorDataAccess=new proveedor_data();
			$proveedorDataAccess->isForFKData=$this->isForFKDataRels;
			$proveedor=$proveedorDataAccess->getEntity($connexion,$relorden_compra->getid_proveedor());

		} catch(Exception $e) {
			throw $e;
		}

		return $proveedor;
	}


	public function  getvendedor(Connexion $connexion,$relorden_compra) : ?vendedor{

		$vendedor= new vendedor();

		try {
			$vendedorDataAccess=new vendedor_data();
			$vendedorDataAccess->isForFKData=$this->isForFKDataRels;
			$vendedor=$vendedorDataAccess->getEntity($connexion,$relorden_compra->getid_vendedor());

		} catch(Exception $e) {
			throw $e;
		}

		return $vendedor;
	}


	public function  gettermino_pago_proveedor(Connexion $connexion,$relorden_compra) : ?termino_pago_proveedor{

		$termino_pago_proveedor= new termino_pago_proveedor();

		try {
			$termino_pago_proveedorDataAccess=new termino_pago_proveedor_data();
			$termino_pago_proveedorDataAccess->isForFKData=$this->isForFKDataRels;
			$termino_pago_proveedor=$termino_pago_proveedorDataAccess->getEntity($connexion,$relorden_compra->getid_termino_pago_proveedor());

		} catch(Exception $e) {
			throw $e;
		}

		return $termino_pago_proveedor;
	}


	public function  getmoneda(Connexion $connexion,$relorden_compra) : ?moneda{

		$moneda= new moneda();

		try {
			$monedaDataAccess=new moneda_data();
			$monedaDataAccess->isForFKData=$this->isForFKDataRels;
			$moneda=$monedaDataAccess->getEntity($connexion,$relorden_compra->getid_moneda());

		} catch(Exception $e) {
			throw $e;
		}

		return $moneda;
	}


	public function  getestado(Connexion $connexion,$relorden_compra) : ?estado{

		$estado= new estado();

		try {
			$estadoDataAccess=new estado_data();
			$estadoDataAccess->isForFKData=$this->isForFKDataRels;
			$estado=$estadoDataAccess->getEntity($connexion,$relorden_compra->getid_estado());

		} catch(Exception $e) {
			throw $e;
		}

		return $estado;
	}


	public function  getasiento(Connexion $connexion,$relorden_compra) : ?asiento{

		$asiento= new asiento();

		try {
			$asientoDataAccess=new asiento_data();
			$asientoDataAccess->isForFKData=$this->isForFKDataRels;
			$asiento=$asientoDataAccess->getEntity($connexion,$relorden_compra->getid_asiento());

		} catch(Exception $e) {
			throw $e;
		}

		return $asiento;
	}


	public function  getdocumento_cuenta_pagar(Connexion $connexion,$relorden_compra) : ?documento_cuenta_pagar{

		$documento_cuenta_pagar= new documento_cuenta_pagar();

		try {
			$documento_cuenta_pagarDataAccess=new documento_cuenta_pagar_data();
			$documento_cuenta_pagarDataAccess->isForFKData=$this->isForFKDataRels;
			$documento_cuenta_pagar=$documento_cuenta_pagarDataAccess->getEntity($connexion,$relorden_compra->getid_documento_cuenta_pagar());

		} catch(Exception $e) {
			throw $e;
		}

		return $documento_cuenta_pagar;
	}


	public function  getkardex(Connexion $connexion,$relorden_compra) : ?kardex{

		$kardex= new kardex();

		try {
			$kardexDataAccess=new kardex_data();
			$kardexDataAccess->isForFKData=$this->isForFKDataRels;
			$kardex=$kardexDataAccess->getEntity($connexion,$relorden_compra->getid_kardex());

		} catch(Exception $e) {
			throw $e;
		}

		return $kardex;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	public function  getorden_compra_detalles(Connexion $connexion,orden_compra $orden_compra) : array {

		$ordencompradetalles=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.orden_compra_detalle_data::$SCHEMA.".".orden_compra_detalle_data::$TABLE_NAME.".id_orden_compra=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$orden_compra->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$ordencompradetalleDataAccess=new orden_compra_detalle_data();

			$ordencompradetalles=$ordencompradetalleDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $ordencompradetalles;
	}


	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,orden_compra $entity,$resultSet) : orden_compra {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_empresa((int)$resultSet[$strPrefijo.'id_empresa']);
				$entity->setid_sucursal((int)$resultSet[$strPrefijo.'id_sucursal']);
				$entity->setid_ejercicio((int)$resultSet[$strPrefijo.'id_ejercicio']);
				$entity->setid_periodo((int)$resultSet[$strPrefijo.'id_periodo']);
				$entity->setid_usuario((int)$resultSet[$strPrefijo.'id_usuario']);
				$entity->setnumero(utf8_encode($resultSet[$strPrefijo.'numero']));
				$entity->setid_proveedor((int)$resultSet[$strPrefijo.'id_proveedor']);
				$entity->setruc(utf8_encode($resultSet[$strPrefijo.'ruc']));
				$entity->setfecha_emision($resultSet[$strPrefijo.'fecha_emision']);
				$entity->setid_vendedor((int)$resultSet[$strPrefijo.'id_vendedor']);
				$entity->setid_termino_pago_proveedor((int)$resultSet[$strPrefijo.'id_termino_pago_proveedor']);
				$entity->setfecha_vence($resultSet[$strPrefijo.'fecha_vence']);
				$entity->setcotizacion((float)$resultSet[$strPrefijo.'cotizacion']);
				$entity->setid_moneda((int)$resultSet[$strPrefijo.'id_moneda']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setimpuesto_en_precio($resultSet[$strPrefijo.'impuesto_en_precio']=='f'? false:true );
				} else {
					$entity->setimpuesto_en_precio((bool)$resultSet[$strPrefijo.'impuesto_en_precio']);
				}
				$entity->setid_estado((int)$resultSet[$strPrefijo.'id_estado']);
				$entity->setdireccion(utf8_encode($resultSet[$strPrefijo.'direccion']));
				$entity->setenviar(utf8_encode($resultSet[$strPrefijo.'enviar']));
				$entity->setobservacion(utf8_encode($resultSet[$strPrefijo.'observacion']));
				$entity->setsub_total((float)$resultSet[$strPrefijo.'sub_total']);
				$entity->setdescuento_monto((float)$resultSet[$strPrefijo.'descuento_monto']);
				$entity->setdescuento_porciento((float)$resultSet[$strPrefijo.'descuento_porciento']);
				$entity->setiva_monto((float)$resultSet[$strPrefijo.'iva_monto']);
				$entity->setiva_porciento((float)$resultSet[$strPrefijo.'iva_porciento']);
				$entity->setretencion_fuente_monto((float)$resultSet[$strPrefijo.'retencion_fuente_monto']);
				$entity->setretencion_fuente_porciento((float)$resultSet[$strPrefijo.'retencion_fuente_porciento']);
				$entity->setretencion_iva_monto((float)$resultSet[$strPrefijo.'retencion_iva_monto']);
				$entity->setretencion_iva_porciento((float)$resultSet[$strPrefijo.'retencion_iva_porciento']);
				$entity->settotal((float)$resultSet[$strPrefijo.'total']);
				$entity->setotro_monto((float)$resultSet[$strPrefijo.'otro_monto']);
				$entity->setotro_porciento((float)$resultSet[$strPrefijo.'otro_porciento']);
				$entity->setretencion_ica_monto((float)$resultSet[$strPrefijo.'retencion_ica_monto']);
				$entity->setretencion_ica_porciento((float)$resultSet[$strPrefijo.'retencion_ica_porciento']);
				$entity->setfactura_proveedor(utf8_encode($resultSet[$strPrefijo.'factura_proveedor']));
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setrecibida($resultSet[$strPrefijo.'recibida']=='f'? false:true );
				} else {
					$entity->setrecibida((bool)$resultSet[$strPrefijo.'recibida']);
				}
				$entity->setpagos((float)$resultSet[$strPrefijo.'pagos']);
				$entity->setid_asiento((int)$resultSet[$strPrefijo.'id_asiento']);
				$entity->setid_documento_cuenta_pagar((int)$resultSet[$strPrefijo.'id_documento_cuenta_pagar']);
				$entity->setid_kardex((int)$resultSet[$strPrefijo.'id_kardex']);
			} else {
				$entity->setnumero(utf8_encode($resultSet[$strPrefijo.'numero']));								
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,orden_compra $orden_compra,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $orden_compra->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiisissiisdiiisssddddddddddddddsidiii', $orden_compra->getid_empresa(),$orden_compra->getid_sucursal(),$orden_compra->getid_ejercicio(),$orden_compra->getid_periodo(),$orden_compra->getid_usuario(),$orden_compra->getnumero(),$orden_compra->getid_proveedor(),$orden_compra->getruc(),$orden_compra->getfecha_emision(),$orden_compra->getid_vendedor(),$orden_compra->getid_termino_pago_proveedor(),$orden_compra->getfecha_vence(),$orden_compra->getcotizacion(),$orden_compra->getid_moneda(),$orden_compra->getimpuesto_en_precio(),$orden_compra->getid_estado(),$orden_compra->getdireccion(),$orden_compra->getenviar(),$orden_compra->getobservacion(),$orden_compra->getsub_total(),$orden_compra->getdescuento_monto(),$orden_compra->getdescuento_porciento(),$orden_compra->getiva_monto(),$orden_compra->getiva_porciento(),$orden_compra->getretencion_fuente_monto(),$orden_compra->getretencion_fuente_porciento(),$orden_compra->getretencion_iva_monto(),$orden_compra->getretencion_iva_porciento(),$orden_compra->gettotal(),$orden_compra->getotro_monto(),$orden_compra->getotro_porciento(),$orden_compra->getretencion_ica_monto(),$orden_compra->getretencion_ica_porciento(),$orden_compra->getfactura_proveedor(),$orden_compra->getrecibida(),$orden_compra->getpagos(),$orden_compra->getid_asiento(),$orden_compra->getid_documento_cuenta_pagar(),$orden_compra->getid_kardex());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiisissiisdiiisssddddddddddddddsidiiiis', $orden_compra->getid_empresa(),$orden_compra->getid_sucursal(),$orden_compra->getid_ejercicio(),$orden_compra->getid_periodo(),$orden_compra->getid_usuario(),$orden_compra->getnumero(),$orden_compra->getid_proveedor(),$orden_compra->getruc(),$orden_compra->getfecha_emision(),$orden_compra->getid_vendedor(),$orden_compra->getid_termino_pago_proveedor(),$orden_compra->getfecha_vence(),$orden_compra->getcotizacion(),$orden_compra->getid_moneda(),$orden_compra->getimpuesto_en_precio(),$orden_compra->getid_estado(),$orden_compra->getdireccion(),$orden_compra->getenviar(),$orden_compra->getobservacion(),$orden_compra->getsub_total(),$orden_compra->getdescuento_monto(),$orden_compra->getdescuento_porciento(),$orden_compra->getiva_monto(),$orden_compra->getiva_porciento(),$orden_compra->getretencion_fuente_monto(),$orden_compra->getretencion_fuente_porciento(),$orden_compra->getretencion_iva_monto(),$orden_compra->getretencion_iva_porciento(),$orden_compra->gettotal(),$orden_compra->getotro_monto(),$orden_compra->getotro_porciento(),$orden_compra->getretencion_ica_monto(),$orden_compra->getretencion_ica_porciento(),$orden_compra->getfactura_proveedor(),$orden_compra->getrecibida(),$orden_compra->getpagos(),$orden_compra->getid_asiento(),$orden_compra->getid_documento_cuenta_pagar(),$orden_compra->getid_kardex(), $orden_compra->getId(), Funciones::GetRealScapeString($orden_compra->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,orden_compra $orden_compra,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($orden_compra->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($orden_compra->getid_empresa(),$orden_compra->getid_sucursal(),$orden_compra->getid_ejercicio(),$orden_compra->getid_periodo(),$orden_compra->getid_usuario(),Funciones::GetRealScapeString($orden_compra->getnumero(),$connexion),$orden_compra->getid_proveedor(),Funciones::GetRealScapeString($orden_compra->getruc(),$connexion),Funciones::GetRealScapeString($orden_compra->getfecha_emision(),$connexion),$orden_compra->getid_vendedor(),$orden_compra->getid_termino_pago_proveedor(),Funciones::GetRealScapeString($orden_compra->getfecha_vence(),$connexion),$orden_compra->getcotizacion(),$orden_compra->getid_moneda(),$orden_compra->getimpuesto_en_precio(),$orden_compra->getid_estado(),Funciones::GetRealScapeString($orden_compra->getdireccion(),$connexion),Funciones::GetRealScapeString($orden_compra->getenviar(),$connexion),Funciones::GetRealScapeString($orden_compra->getobservacion(),$connexion),$orden_compra->getsub_total(),$orden_compra->getdescuento_monto(),$orden_compra->getdescuento_porciento(),$orden_compra->getiva_monto(),$orden_compra->getiva_porciento(),$orden_compra->getretencion_fuente_monto(),$orden_compra->getretencion_fuente_porciento(),$orden_compra->getretencion_iva_monto(),$orden_compra->getretencion_iva_porciento(),$orden_compra->gettotal(),$orden_compra->getotro_monto(),$orden_compra->getotro_porciento(),$orden_compra->getretencion_ica_monto(),$orden_compra->getretencion_ica_porciento(),Funciones::GetRealScapeString($orden_compra->getfactura_proveedor(),$connexion),$orden_compra->getrecibida(),$orden_compra->getpagos(),Funciones::GetNullString($orden_compra->getid_asiento()),Funciones::GetNullString($orden_compra->getid_documento_cuenta_pagar()),Funciones::GetNullString($orden_compra->getid_kardex()));
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($orden_compra->getid_empresa(),$orden_compra->getid_sucursal(),$orden_compra->getid_ejercicio(),$orden_compra->getid_periodo(),$orden_compra->getid_usuario(),Funciones::GetRealScapeString($orden_compra->getnumero(),$connexion),$orden_compra->getid_proveedor(),Funciones::GetRealScapeString($orden_compra->getruc(),$connexion),Funciones::GetRealScapeString($orden_compra->getfecha_emision(),$connexion),$orden_compra->getid_vendedor(),$orden_compra->getid_termino_pago_proveedor(),Funciones::GetRealScapeString($orden_compra->getfecha_vence(),$connexion),$orden_compra->getcotizacion(),$orden_compra->getid_moneda(),$orden_compra->getimpuesto_en_precio(),$orden_compra->getid_estado(),Funciones::GetRealScapeString($orden_compra->getdireccion(),$connexion),Funciones::GetRealScapeString($orden_compra->getenviar(),$connexion),Funciones::GetRealScapeString($orden_compra->getobservacion(),$connexion),$orden_compra->getsub_total(),$orden_compra->getdescuento_monto(),$orden_compra->getdescuento_porciento(),$orden_compra->getiva_monto(),$orden_compra->getiva_porciento(),$orden_compra->getretencion_fuente_monto(),$orden_compra->getretencion_fuente_porciento(),$orden_compra->getretencion_iva_monto(),$orden_compra->getretencion_iva_porciento(),$orden_compra->gettotal(),$orden_compra->getotro_monto(),$orden_compra->getotro_porciento(),$orden_compra->getretencion_ica_monto(),$orden_compra->getretencion_ica_porciento(),Funciones::GetRealScapeString($orden_compra->getfactura_proveedor(),$connexion),$orden_compra->getrecibida(),$orden_compra->getpagos(),Funciones::GetNullString($orden_compra->getid_asiento()),Funciones::GetNullString($orden_compra->getid_documento_cuenta_pagar()),Funciones::GetNullString($orden_compra->getid_kardex()), $orden_compra->getId(), Funciones::GetRealScapeString($orden_compra->getVersionRow(),$connexion));
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
	
	public function setorden_compra_Original(orden_compra $orden_compra) {
		$orden_compra->setorden_compra_Original(clone $orden_compra);		
	}
	
	public function setorden_compras_Original(array $orden_compras) {
		foreach($orden_compras as $orden_compra){
			$orden_compra->setorden_compra_Original(clone $orden_compra);
		}
	}
	
	public static function setorden_compra_OriginalStatic(orden_compra $orden_compra) {
		$orden_compra->setorden_compra_Original(clone $orden_compra);		
	}
	
	public static function setorden_compras_OriginalStatic(array $orden_compras) {		
		foreach($orden_compras as $orden_compra){
			$orden_compra->setorden_compra_Original(clone $orden_compra);
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
