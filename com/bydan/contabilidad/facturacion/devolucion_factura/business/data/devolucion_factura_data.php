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
namespace com\bydan\contabilidad\facturacion\devolucion_factura\business\data;

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

use com\bydan\contabilidad\facturacion\devolucion_factura\business\entity\devolucion_factura;

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

use com\bydan\contabilidad\cuentascobrar\cliente\business\data\cliente_data;
use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;

use com\bydan\contabilidad\facturacion\vendedor\business\data\vendedor_data;
use com\bydan\contabilidad\facturacion\vendedor\business\entity\vendedor;

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\data\termino_pago_cliente_data;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;

use com\bydan\contabilidad\contabilidad\moneda\business\data\moneda_data;
use com\bydan\contabilidad\contabilidad\moneda\business\entity\moneda;

use com\bydan\contabilidad\general\estado\business\data\estado_data;
use com\bydan\contabilidad\general\estado\business\entity\estado;

use com\bydan\contabilidad\contabilidad\asiento\business\data\asiento_data;
use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;

use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\data\documento_cuenta_cobrar_data;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\entity\documento_cuenta_cobrar;

use com\bydan\contabilidad\inventario\kardex\business\data\kardex_data;
use com\bydan\contabilidad\inventario\kardex\business\entity\kardex;

//REL

use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\business\data\devolucion_factura_detalle_data;


class devolucion_factura_data extends GetEntitiesDataAccessHelper implements devolucion_factura_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='fac_';
	public static string $TABLE_NAME='fac_devolucion_factura';			
	public static string $TABLE_NAME_devolucion_factura='devolucion_factura';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_DEVOLUCION_FACTURA_INSERT(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_DEVOLUCION_FACTURA_UPDATE(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_DEVOLUCION_FACTURA_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_DEVOLUCION_FACTURA_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $devolucion_factura_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'devolucion_factura';
		
		devolucion_factura_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('FACTURACION');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->devolucion_factura_DataAccessAdditional=new devolucion_facturaDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_empresa,id_sucursal,id_ejercicio,id_periodo,id_usuario,numero,id_cliente,ruc,referencia_cliente,fecha_emision,id_vendedor,id_termino_pago_cliente,fecha_vence,id_moneda,cotizacion,id_estado,direccion,enviar_a,observacion,impuesto_en_precio,sub_total,descuento_monto,descuento_porciento,iva_monto,iva_porciento,retencion_fuente_monto,retencion_fuente_porciento,retencion_iva_monto,retencion_iva_porciento,total,otro_monto,otro_porciento,hora,retencion_ica_porciento,retencion_ica_monto,id_asiento,id_documento_cuenta_cobrar,id_kardex) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%d,%d,%d,%d,\'%s\',%d,\'%s\',\'%s\',\'%s\',%d,%d,\'%s\',%d,%f,%s,\'%s\',\'%s\',\'%s\',\'%d\',%f,%f,%f,%f,%f,%f,%f,%f,%f,%f,%f,%f,\'%s\',%f,%f,%s,%s,%s)';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_empresa=%d,id_sucursal=%d,id_ejercicio=%d,id_periodo=%d,id_usuario=%d,numero=\'%s\',id_cliente=%d,ruc=\'%s\',referencia_cliente=\'%s\',fecha_emision=\'%s\',id_vendedor=%d,id_termino_pago_cliente=%d,fecha_vence=\'%s\',id_moneda=%d,cotizacion=%f,id_estado=%s,direccion=\'%s\',enviar_a=\'%s\',observacion=\'%s\',impuesto_en_precio=\'%d\',sub_total=%f,descuento_monto=%f,descuento_porciento=%f,iva_monto=%f,iva_porciento=%f,retencion_fuente_monto=%f,retencion_fuente_porciento=%f,retencion_iva_monto=%f,retencion_iva_porciento=%f,total=%f,otro_monto=%f,otro_porciento=%f,hora=\'%s\',retencion_ica_porciento=%f,retencion_ica_monto=%f,id_asiento=%s,id_documento_cuenta_cobrar=%s,id_kardex=%s where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_sucursal,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_ejercicio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_periodo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_usuario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cliente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.ruc,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.referencia_cliente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_emision,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_vendedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_termino_pago_cliente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_vence,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_moneda,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cotizacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_estado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.direccion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.enviar_a,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.observacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.impuesto_en_precio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.sub_total,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descuento_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descuento_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.iva_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.iva_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.retencion_fuente_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.retencion_fuente_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.retencion_iva_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.retencion_iva_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.total,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.otro_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.otro_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.hora,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.retencion_ica_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.retencion_ica_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_asiento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_documento_cuenta_cobrar,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_kardex from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(devolucion_factura $devolucion_factura,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($devolucion_factura->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=devolucion_factura_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($devolucion_factura->getId(),$connexion));				
				
			} else if ($devolucion_factura->getIsChanged()) {
				if($devolucion_factura->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=devolucion_factura_data::$QUERY_INSERT;
					
					
					
					

					//$id_estado='null';
					//if($devolucion_factura->getid_estado()!==null && $devolucion_factura->getid_estado()>=0) {
						//$id_estado=$devolucion_factura->getid_estado();
					//} else {
						//$id_estado='null';
					//}

					//$id_asiento='null';
					//if($devolucion_factura->getid_asiento()!==null && $devolucion_factura->getid_asiento()>=0) {
						//$id_asiento=$devolucion_factura->getid_asiento();
					//} else {
						//$id_asiento='null';
					//}

					//$id_documento_cuenta_cobrar='null';
					//if($devolucion_factura->getid_documento_cuenta_cobrar()!==null && $devolucion_factura->getid_documento_cuenta_cobrar()>=0) {
						//$id_documento_cuenta_cobrar=$devolucion_factura->getid_documento_cuenta_cobrar();
					//} else {
						//$id_documento_cuenta_cobrar='null';
					//}

					//$id_kardex='null';
					//if($devolucion_factura->getid_kardex()!==null && $devolucion_factura->getid_kardex()>=0) {
						//$id_kardex=$devolucion_factura->getid_kardex();
					//} else {
						//$id_kardex='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$devolucion_factura->getid_empresa(),$devolucion_factura->getid_sucursal(),$devolucion_factura->getid_ejercicio(),$devolucion_factura->getid_periodo(),$devolucion_factura->getid_usuario(),Funciones::GetRealScapeString($devolucion_factura->getnumero(),$connexion),$devolucion_factura->getid_cliente(),Funciones::GetRealScapeString($devolucion_factura->getruc(),$connexion),Funciones::GetRealScapeString($devolucion_factura->getreferencia_cliente(),$connexion),Funciones::GetRealScapeString($devolucion_factura->getfecha_emision(),$connexion),$devolucion_factura->getid_vendedor(),$devolucion_factura->getid_termino_pago_cliente(),Funciones::GetRealScapeString($devolucion_factura->getfecha_vence(),$connexion),$devolucion_factura->getid_moneda(),$devolucion_factura->getcotizacion(),$devolucion_factura->getid_estado(),Funciones::GetRealScapeString($devolucion_factura->getdireccion(),$connexion),Funciones::GetRealScapeString($devolucion_factura->getenviar_a(),$connexion),Funciones::GetRealScapeString($devolucion_factura->getobservacion(),$connexion),$devolucion_factura->getimpuesto_en_precio(),$devolucion_factura->getsub_total(),$devolucion_factura->getdescuento_monto(),$devolucion_factura->getdescuento_porciento(),$devolucion_factura->getiva_monto(),$devolucion_factura->getiva_porciento(),$devolucion_factura->getretencion_fuente_monto(),$devolucion_factura->getretencion_fuente_porciento(),$devolucion_factura->getretencion_iva_monto(),$devolucion_factura->getretencion_iva_porciento(),$devolucion_factura->gettotal(),$devolucion_factura->getotro_monto(),$devolucion_factura->getotro_porciento(),Funciones::GetRealScapeString($devolucion_factura->gethora(),$connexion),$devolucion_factura->getretencion_ica_porciento(),$devolucion_factura->getretencion_ica_monto(),Funciones::GetNullString($devolucion_factura->getid_asiento()),Funciones::GetNullString($devolucion_factura->getid_documento_cuenta_cobrar()),Funciones::GetNullString($devolucion_factura->getid_kardex()) );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=devolucion_factura_data::$QUERY_UPDATE;			
					
					
					
					

					//$id_estado='null';
					//if($devolucion_factura->getid_estado()!==null && $devolucion_factura->getid_estado()>=0) {
						//$id_estado=$devolucion_factura->getid_estado();
					//} else {
						//$id_estado='null';
					//}

					//$id_asiento='null';
					//if($devolucion_factura->getid_asiento()!==null && $devolucion_factura->getid_asiento()>=0) {
						//$id_asiento=$devolucion_factura->getid_asiento();
					//} else {
						//$id_asiento='null';
					//}

					//$id_documento_cuenta_cobrar='null';
					//if($devolucion_factura->getid_documento_cuenta_cobrar()!==null && $devolucion_factura->getid_documento_cuenta_cobrar()>=0) {
						//$id_documento_cuenta_cobrar=$devolucion_factura->getid_documento_cuenta_cobrar();
					//} else {
						//$id_documento_cuenta_cobrar='null';
					//}

					//$id_kardex='null';
					//if($devolucion_factura->getid_kardex()!==null && $devolucion_factura->getid_kardex()>=0) {
						//$id_kardex=$devolucion_factura->getid_kardex();
					//} else {
						//$id_kardex='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$devolucion_factura->getid_empresa(),$devolucion_factura->getid_sucursal(),$devolucion_factura->getid_ejercicio(),$devolucion_factura->getid_periodo(),$devolucion_factura->getid_usuario(),Funciones::GetRealScapeString($devolucion_factura->getnumero(),$connexion),$devolucion_factura->getid_cliente(),Funciones::GetRealScapeString($devolucion_factura->getruc(),$connexion),Funciones::GetRealScapeString($devolucion_factura->getreferencia_cliente(),$connexion),Funciones::GetRealScapeString($devolucion_factura->getfecha_emision(),$connexion),$devolucion_factura->getid_vendedor(),$devolucion_factura->getid_termino_pago_cliente(),Funciones::GetRealScapeString($devolucion_factura->getfecha_vence(),$connexion),$devolucion_factura->getid_moneda(),$devolucion_factura->getcotizacion(),$devolucion_factura->getid_estado(),Funciones::GetRealScapeString($devolucion_factura->getdireccion(),$connexion),Funciones::GetRealScapeString($devolucion_factura->getenviar_a(),$connexion),Funciones::GetRealScapeString($devolucion_factura->getobservacion(),$connexion),$devolucion_factura->getimpuesto_en_precio(),$devolucion_factura->getsub_total(),$devolucion_factura->getdescuento_monto(),$devolucion_factura->getdescuento_porciento(),$devolucion_factura->getiva_monto(),$devolucion_factura->getiva_porciento(),$devolucion_factura->getretencion_fuente_monto(),$devolucion_factura->getretencion_fuente_porciento(),$devolucion_factura->getretencion_iva_monto(),$devolucion_factura->getretencion_iva_porciento(),$devolucion_factura->gettotal(),$devolucion_factura->getotro_monto(),$devolucion_factura->getotro_porciento(),Funciones::GetRealScapeString($devolucion_factura->gethora(),$connexion),$devolucion_factura->getretencion_ica_porciento(),$devolucion_factura->getretencion_ica_monto(),Funciones::GetNullString($devolucion_factura->getid_asiento()),Funciones::GetNullString($devolucion_factura->getid_documento_cuenta_cobrar()),Funciones::GetNullString($devolucion_factura->getid_kardex()), Funciones::GetRealScapeString($devolucion_factura->getId(),$connexion), Funciones::GetRealScapeString($devolucion_factura->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($devolucion_factura, $connexion,$strQuerySaveComplete,devolucion_factura_data::$TABLE_NAME,devolucion_factura_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				devolucion_factura_data::savePrepared($devolucion_factura, $connexion,$strQuerySave,devolucion_factura_data::$TABLE_NAME,devolucion_factura_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			devolucion_factura_data::setdevolucion_factura_OriginalStatic($devolucion_factura);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(devolucion_factura $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				devolucion_factura_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					devolucion_factura_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					devolucion_factura_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(devolucion_factura $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					devolucion_factura_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(devolucion_factura $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					devolucion_factura_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(devolucion_factura $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					devolucion_factura_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?devolucion_factura {		
		$entity = new devolucion_factura();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=devolucion_factura_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=devolucion_factura_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//Facturacion.devolucion_factura.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setdevolucion_factura_Original(new devolucion_factura());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,devolucion_factura_data::$IS_WITH_SCHEMA);         	    
				/*$entity=devolucion_factura_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setdevolucion_factura_Original(parent::getEntityPrefijoEntityResult("",$entity->getdevolucion_factura_Original(),$resultSet,devolucion_factura_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setdevolucion_factura_Original(devolucion_factura_data::getEntityBaseResult("",$entity->getdevolucion_factura_Original(),$resultSet));
				//$entity->setdevolucion_factura_Original($this->getEntityBaseResult("",$entity->getdevolucion_factura_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?devolucion_factura {
		$entity = new devolucion_factura();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=devolucion_factura_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=devolucion_factura_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,devolucion_factura_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".Facturacion.devolucion_factura.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setdevolucion_factura_Original(new devolucion_factura());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,devolucion_factura_data::$IS_WITH_SCHEMA);         	    
				/*$entity=devolucion_factura_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setdevolucion_factura_Original(parent::getEntityPrefijoEntityResult("",$entity->getdevolucion_factura_Original(),$resultSet,devolucion_factura_data::$IS_WITH_SCHEMA));         		
				////$entity->setdevolucion_factura_Original(devolucion_factura_data::getEntityBaseResult("",$entity->getdevolucion_factura_Original(),$resultSet));
				//$entity->setdevolucion_factura_Original($this->getEntityBaseResult("",$entity->getdevolucion_factura_Original(),$resultSet));
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
		$entity = new devolucion_factura();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=devolucion_factura_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=devolucion_factura_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,devolucion_factura_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new devolucion_factura();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,devolucion_factura_data::$IS_WITH_SCHEMA);         		
				/*$entity=devolucion_factura_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setdevolucion_factura_Original( new devolucion_factura());
				
				//$entity->setdevolucion_factura_Original(parent::getEntityPrefijoEntityResult("",$entity->getdevolucion_factura_Original(),$resultSet,devolucion_factura_data::$IS_WITH_SCHEMA));         		
				////$entity->setdevolucion_factura_Original(devolucion_factura_data::getEntityBaseResult("",$entity->getdevolucion_factura_Original(),$resultSet));
				//$entity->setdevolucion_factura_Original($this->getEntityBaseResult("",$entity->getdevolucion_factura_Original(),$resultSet));
								
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
		$entity = new devolucion_factura();		  
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
      	    	$entity = new devolucion_factura();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,devolucion_factura_data::$IS_WITH_SCHEMA);         		
				/*$entity=devolucion_factura_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setdevolucion_factura_Original( new devolucion_factura());
				
				//$entity->setdevolucion_factura_Original(parent::getEntityPrefijoEntityResult("",$entity->getdevolucion_factura_Original(),$resultSet,devolucion_factura_data::$IS_WITH_SCHEMA));         		
				////$entity->setdevolucion_factura_Original(devolucion_factura_data::getEntityBaseResult("",$entity->getdevolucion_factura_Original(),$resultSet));
				//$entity->setdevolucion_factura_Original($this->getEntityBaseResult("",$entity->getdevolucion_factura_Original(),$resultSet));
				
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
		$entity = new devolucion_factura();		  
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
      	    	$entity = new devolucion_factura();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,devolucion_factura_data::$IS_WITH_SCHEMA);         		
				/*$entity=devolucion_factura_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setdevolucion_factura_Original( new devolucion_factura());				
				//$entity->setdevolucion_factura_Original(parent::getEntityPrefijoEntityResult("",$entity->getdevolucion_factura_Original(),$resultSet,devolucion_factura_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setdevolucion_factura_Original(devolucion_factura_data::getEntityBaseResult("",$entity->getdevolucion_factura_Original(),$resultSet));
				//$entity->setdevolucion_factura_Original($this->getEntityBaseResult("",$entity->getdevolucion_factura_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=devolucion_factura_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,devolucion_factura $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,devolucion_factura_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,devolucion_factura_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getempresa(Connexion $connexion,$reldevolucion_factura) : ?empresa{

		$empresa= new empresa();

		try {
			$empresaDataAccess=new empresa_data();
			$empresaDataAccess->isForFKData=$this->isForFKDataRels;
			$empresa=$empresaDataAccess->getEntity($connexion,$reldevolucion_factura->getid_empresa());

		} catch(Exception $e) {
			throw $e;
		}

		return $empresa;
	}


	public function  getsucursal(Connexion $connexion,$reldevolucion_factura) : ?sucursal{

		$sucursal= new sucursal();

		try {
			$sucursalDataAccess=new sucursal_data();
			$sucursalDataAccess->isForFKData=$this->isForFKDataRels;
			$sucursal=$sucursalDataAccess->getEntity($connexion,$reldevolucion_factura->getid_sucursal());

		} catch(Exception $e) {
			throw $e;
		}

		return $sucursal;
	}


	public function  getejercicio(Connexion $connexion,$reldevolucion_factura) : ?ejercicio{

		$ejercicio= new ejercicio();

		try {
			$ejercicioDataAccess=new ejercicio_data();
			$ejercicioDataAccess->isForFKData=$this->isForFKDataRels;
			$ejercicio=$ejercicioDataAccess->getEntity($connexion,$reldevolucion_factura->getid_ejercicio());

		} catch(Exception $e) {
			throw $e;
		}

		return $ejercicio;
	}


	public function  getperiodo(Connexion $connexion,$reldevolucion_factura) : ?periodo{

		$periodo= new periodo();

		try {
			$periodoDataAccess=new periodo_data();
			$periodoDataAccess->isForFKData=$this->isForFKDataRels;
			$periodo=$periodoDataAccess->getEntity($connexion,$reldevolucion_factura->getid_periodo());

		} catch(Exception $e) {
			throw $e;
		}

		return $periodo;
	}


	public function  getusuario(Connexion $connexion,$reldevolucion_factura) : ?usuario{

		$usuario= new usuario();

		try {
			$usuarioDataAccess=new usuario_data();
			$usuarioDataAccess->isForFKData=$this->isForFKDataRels;
			$usuario=$usuarioDataAccess->getEntity($connexion,$reldevolucion_factura->getid_usuario());

		} catch(Exception $e) {
			throw $e;
		}

		return $usuario;
	}


	public function  getcliente(Connexion $connexion,$reldevolucion_factura) : ?cliente{

		$cliente= new cliente();

		try {
			$clienteDataAccess=new cliente_data();
			$clienteDataAccess->isForFKData=$this->isForFKDataRels;
			$cliente=$clienteDataAccess->getEntity($connexion,$reldevolucion_factura->getid_cliente());

		} catch(Exception $e) {
			throw $e;
		}

		return $cliente;
	}


	public function  getvendedor(Connexion $connexion,$reldevolucion_factura) : ?vendedor{

		$vendedor= new vendedor();

		try {
			$vendedorDataAccess=new vendedor_data();
			$vendedorDataAccess->isForFKData=$this->isForFKDataRels;
			$vendedor=$vendedorDataAccess->getEntity($connexion,$reldevolucion_factura->getid_vendedor());

		} catch(Exception $e) {
			throw $e;
		}

		return $vendedor;
	}


	public function  gettermino_pago_cliente(Connexion $connexion,$reldevolucion_factura) : ?termino_pago_cliente{

		$termino_pago_cliente= new termino_pago_cliente();

		try {
			$termino_pago_clienteDataAccess=new termino_pago_cliente_data();
			$termino_pago_clienteDataAccess->isForFKData=$this->isForFKDataRels;
			$termino_pago_cliente=$termino_pago_clienteDataAccess->getEntity($connexion,$reldevolucion_factura->getid_termino_pago_cliente());

		} catch(Exception $e) {
			throw $e;
		}

		return $termino_pago_cliente;
	}


	public function  getmoneda(Connexion $connexion,$reldevolucion_factura) : ?moneda{

		$moneda= new moneda();

		try {
			$monedaDataAccess=new moneda_data();
			$monedaDataAccess->isForFKData=$this->isForFKDataRels;
			$moneda=$monedaDataAccess->getEntity($connexion,$reldevolucion_factura->getid_moneda());

		} catch(Exception $e) {
			throw $e;
		}

		return $moneda;
	}


	public function  getestado(Connexion $connexion,$reldevolucion_factura) : ?estado{

		$estado= new estado();

		try {
			$estadoDataAccess=new estado_data();
			$estadoDataAccess->isForFKData=$this->isForFKDataRels;
			$estado=$estadoDataAccess->getEntity($connexion,$reldevolucion_factura->getid_estado());

		} catch(Exception $e) {
			throw $e;
		}

		return $estado;
	}


	public function  getasiento(Connexion $connexion,$reldevolucion_factura) : ?asiento{

		$asiento= new asiento();

		try {
			$asientoDataAccess=new asiento_data();
			$asientoDataAccess->isForFKData=$this->isForFKDataRels;
			$asiento=$asientoDataAccess->getEntity($connexion,$reldevolucion_factura->getid_asiento());

		} catch(Exception $e) {
			throw $e;
		}

		return $asiento;
	}


	public function  getdocumento_cuenta_cobrar(Connexion $connexion,$reldevolucion_factura) : ?documento_cuenta_cobrar{

		$documento_cuenta_cobrar= new documento_cuenta_cobrar();

		try {
			$documento_cuenta_cobrarDataAccess=new documento_cuenta_cobrar_data();
			$documento_cuenta_cobrarDataAccess->isForFKData=$this->isForFKDataRels;
			$documento_cuenta_cobrar=$documento_cuenta_cobrarDataAccess->getEntity($connexion,$reldevolucion_factura->getid_documento_cuenta_cobrar());

		} catch(Exception $e) {
			throw $e;
		}

		return $documento_cuenta_cobrar;
	}


	public function  getkardex(Connexion $connexion,$reldevolucion_factura) : ?kardex{

		$kardex= new kardex();

		try {
			$kardexDataAccess=new kardex_data();
			$kardexDataAccess->isForFKData=$this->isForFKDataRels;
			$kardex=$kardexDataAccess->getEntity($connexion,$reldevolucion_factura->getid_kardex());

		} catch(Exception $e) {
			throw $e;
		}

		return $kardex;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	public function  getdevolucion_factura_detalles(Connexion $connexion,devolucion_factura $devolucion_factura) : array {

		$devolucionfacturadetalles=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.devolucion_factura_detalle_data::$SCHEMA.".".devolucion_factura_detalle_data::$TABLE_NAME.".id_devolucion_factura=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$devolucion_factura->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$devolucionfacturadetalleDataAccess=new devolucion_factura_detalle_data();

			$devolucionfacturadetalles=$devolucionfacturadetalleDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $devolucionfacturadetalles;
	}


	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,devolucion_factura $entity,$resultSet) : devolucion_factura {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_empresa((int)$resultSet[$strPrefijo.'id_empresa']);
				$entity->setid_sucursal((int)$resultSet[$strPrefijo.'id_sucursal']);
				$entity->setid_ejercicio((int)$resultSet[$strPrefijo.'id_ejercicio']);
				$entity->setid_periodo((int)$resultSet[$strPrefijo.'id_periodo']);
				$entity->setid_usuario((int)$resultSet[$strPrefijo.'id_usuario']);
				$entity->setnumero(utf8_encode($resultSet[$strPrefijo.'numero']));
				$entity->setid_cliente((int)$resultSet[$strPrefijo.'id_cliente']);
				$entity->setruc(utf8_encode($resultSet[$strPrefijo.'ruc']));
				$entity->setreferencia_cliente(utf8_encode($resultSet[$strPrefijo.'referencia_cliente']));
				$entity->setfecha_emision($resultSet[$strPrefijo.'fecha_emision']);
				$entity->setid_vendedor((int)$resultSet[$strPrefijo.'id_vendedor']);
				$entity->setid_termino_pago_cliente((int)$resultSet[$strPrefijo.'id_termino_pago_cliente']);
				$entity->setfecha_vence($resultSet[$strPrefijo.'fecha_vence']);
				$entity->setid_moneda((int)$resultSet[$strPrefijo.'id_moneda']);
				$entity->setcotizacion((float)$resultSet[$strPrefijo.'cotizacion']);
				$entity->setid_estado((int)$resultSet[$strPrefijo.'id_estado']);
				$entity->setdireccion(utf8_encode($resultSet[$strPrefijo.'direccion']));
				$entity->setenviar_a(utf8_encode($resultSet[$strPrefijo.'enviar_a']));
				$entity->setobservacion(utf8_encode($resultSet[$strPrefijo.'observacion']));
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setimpuesto_en_precio($resultSet[$strPrefijo.'impuesto_en_precio']=='f'? false:true );
				} else {
					$entity->setimpuesto_en_precio((bool)$resultSet[$strPrefijo.'impuesto_en_precio']);
				}
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
				$entity->sethora($resultSet[$strPrefijo.'hora']);
				$entity->setretencion_ica_porciento((float)$resultSet[$strPrefijo.'retencion_ica_porciento']);
				$entity->setretencion_ica_monto((float)$resultSet[$strPrefijo.'retencion_ica_monto']);
				$entity->setid_asiento((int)$resultSet[$strPrefijo.'id_asiento']);
				$entity->setid_documento_cuenta_cobrar((int)$resultSet[$strPrefijo.'id_documento_cuenta_cobrar']);
				$entity->setid_kardex((int)$resultSet[$strPrefijo.'id_kardex']);
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,devolucion_factura $devolucion_factura,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $devolucion_factura->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiisisssiisidisssiddddddddddddsddiii', $devolucion_factura->getid_empresa(),$devolucion_factura->getid_sucursal(),$devolucion_factura->getid_ejercicio(),$devolucion_factura->getid_periodo(),$devolucion_factura->getid_usuario(),$devolucion_factura->getnumero(),$devolucion_factura->getid_cliente(),$devolucion_factura->getruc(),$devolucion_factura->getreferencia_cliente(),$devolucion_factura->getfecha_emision(),$devolucion_factura->getid_vendedor(),$devolucion_factura->getid_termino_pago_cliente(),$devolucion_factura->getfecha_vence(),$devolucion_factura->getid_moneda(),$devolucion_factura->getcotizacion(),$devolucion_factura->getid_estado(),$devolucion_factura->getdireccion(),$devolucion_factura->getenviar_a(),$devolucion_factura->getobservacion(),$devolucion_factura->getimpuesto_en_precio(),$devolucion_factura->getsub_total(),$devolucion_factura->getdescuento_monto(),$devolucion_factura->getdescuento_porciento(),$devolucion_factura->getiva_monto(),$devolucion_factura->getiva_porciento(),$devolucion_factura->getretencion_fuente_monto(),$devolucion_factura->getretencion_fuente_porciento(),$devolucion_factura->getretencion_iva_monto(),$devolucion_factura->getretencion_iva_porciento(),$devolucion_factura->gettotal(),$devolucion_factura->getotro_monto(),$devolucion_factura->getotro_porciento(),$devolucion_factura->gethora(),$devolucion_factura->getretencion_ica_porciento(),$devolucion_factura->getretencion_ica_monto(),$devolucion_factura->getid_asiento(),$devolucion_factura->getid_documento_cuenta_cobrar(),$devolucion_factura->getid_kardex());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiisisssiisidisssiddddddddddddsddiiiis', $devolucion_factura->getid_empresa(),$devolucion_factura->getid_sucursal(),$devolucion_factura->getid_ejercicio(),$devolucion_factura->getid_periodo(),$devolucion_factura->getid_usuario(),$devolucion_factura->getnumero(),$devolucion_factura->getid_cliente(),$devolucion_factura->getruc(),$devolucion_factura->getreferencia_cliente(),$devolucion_factura->getfecha_emision(),$devolucion_factura->getid_vendedor(),$devolucion_factura->getid_termino_pago_cliente(),$devolucion_factura->getfecha_vence(),$devolucion_factura->getid_moneda(),$devolucion_factura->getcotizacion(),$devolucion_factura->getid_estado(),$devolucion_factura->getdireccion(),$devolucion_factura->getenviar_a(),$devolucion_factura->getobservacion(),$devolucion_factura->getimpuesto_en_precio(),$devolucion_factura->getsub_total(),$devolucion_factura->getdescuento_monto(),$devolucion_factura->getdescuento_porciento(),$devolucion_factura->getiva_monto(),$devolucion_factura->getiva_porciento(),$devolucion_factura->getretencion_fuente_monto(),$devolucion_factura->getretencion_fuente_porciento(),$devolucion_factura->getretencion_iva_monto(),$devolucion_factura->getretencion_iva_porciento(),$devolucion_factura->gettotal(),$devolucion_factura->getotro_monto(),$devolucion_factura->getotro_porciento(),$devolucion_factura->gethora(),$devolucion_factura->getretencion_ica_porciento(),$devolucion_factura->getretencion_ica_monto(),$devolucion_factura->getid_asiento(),$devolucion_factura->getid_documento_cuenta_cobrar(),$devolucion_factura->getid_kardex(), $devolucion_factura->getId(), Funciones::GetRealScapeString($devolucion_factura->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,devolucion_factura $devolucion_factura,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($devolucion_factura->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($devolucion_factura->getid_empresa(),$devolucion_factura->getid_sucursal(),$devolucion_factura->getid_ejercicio(),$devolucion_factura->getid_periodo(),$devolucion_factura->getid_usuario(),Funciones::GetRealScapeString($devolucion_factura->getnumero(),$connexion),$devolucion_factura->getid_cliente(),Funciones::GetRealScapeString($devolucion_factura->getruc(),$connexion),Funciones::GetRealScapeString($devolucion_factura->getreferencia_cliente(),$connexion),Funciones::GetRealScapeString($devolucion_factura->getfecha_emision(),$connexion),$devolucion_factura->getid_vendedor(),$devolucion_factura->getid_termino_pago_cliente(),Funciones::GetRealScapeString($devolucion_factura->getfecha_vence(),$connexion),$devolucion_factura->getid_moneda(),$devolucion_factura->getcotizacion(),$devolucion_factura->getid_estado(),Funciones::GetRealScapeString($devolucion_factura->getdireccion(),$connexion),Funciones::GetRealScapeString($devolucion_factura->getenviar_a(),$connexion),Funciones::GetRealScapeString($devolucion_factura->getobservacion(),$connexion),$devolucion_factura->getimpuesto_en_precio(),$devolucion_factura->getsub_total(),$devolucion_factura->getdescuento_monto(),$devolucion_factura->getdescuento_porciento(),$devolucion_factura->getiva_monto(),$devolucion_factura->getiva_porciento(),$devolucion_factura->getretencion_fuente_monto(),$devolucion_factura->getretencion_fuente_porciento(),$devolucion_factura->getretencion_iva_monto(),$devolucion_factura->getretencion_iva_porciento(),$devolucion_factura->gettotal(),$devolucion_factura->getotro_monto(),$devolucion_factura->getotro_porciento(),Funciones::GetRealScapeString($devolucion_factura->gethora(),$connexion),$devolucion_factura->getretencion_ica_porciento(),$devolucion_factura->getretencion_ica_monto(),Funciones::GetNullString($devolucion_factura->getid_asiento()),Funciones::GetNullString($devolucion_factura->getid_documento_cuenta_cobrar()),Funciones::GetNullString($devolucion_factura->getid_kardex()));
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($devolucion_factura->getid_empresa(),$devolucion_factura->getid_sucursal(),$devolucion_factura->getid_ejercicio(),$devolucion_factura->getid_periodo(),$devolucion_factura->getid_usuario(),Funciones::GetRealScapeString($devolucion_factura->getnumero(),$connexion),$devolucion_factura->getid_cliente(),Funciones::GetRealScapeString($devolucion_factura->getruc(),$connexion),Funciones::GetRealScapeString($devolucion_factura->getreferencia_cliente(),$connexion),Funciones::GetRealScapeString($devolucion_factura->getfecha_emision(),$connexion),$devolucion_factura->getid_vendedor(),$devolucion_factura->getid_termino_pago_cliente(),Funciones::GetRealScapeString($devolucion_factura->getfecha_vence(),$connexion),$devolucion_factura->getid_moneda(),$devolucion_factura->getcotizacion(),$devolucion_factura->getid_estado(),Funciones::GetRealScapeString($devolucion_factura->getdireccion(),$connexion),Funciones::GetRealScapeString($devolucion_factura->getenviar_a(),$connexion),Funciones::GetRealScapeString($devolucion_factura->getobservacion(),$connexion),$devolucion_factura->getimpuesto_en_precio(),$devolucion_factura->getsub_total(),$devolucion_factura->getdescuento_monto(),$devolucion_factura->getdescuento_porciento(),$devolucion_factura->getiva_monto(),$devolucion_factura->getiva_porciento(),$devolucion_factura->getretencion_fuente_monto(),$devolucion_factura->getretencion_fuente_porciento(),$devolucion_factura->getretencion_iva_monto(),$devolucion_factura->getretencion_iva_porciento(),$devolucion_factura->gettotal(),$devolucion_factura->getotro_monto(),$devolucion_factura->getotro_porciento(),Funciones::GetRealScapeString($devolucion_factura->gethora(),$connexion),$devolucion_factura->getretencion_ica_porciento(),$devolucion_factura->getretencion_ica_monto(),Funciones::GetNullString($devolucion_factura->getid_asiento()),Funciones::GetNullString($devolucion_factura->getid_documento_cuenta_cobrar()),Funciones::GetNullString($devolucion_factura->getid_kardex()), $devolucion_factura->getId(), Funciones::GetRealScapeString($devolucion_factura->getVersionRow(),$connexion));
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
	
	public function setdevolucion_factura_Original(devolucion_factura $devolucion_factura) {
		$devolucion_factura->setdevolucion_factura_Original(clone $devolucion_factura);		
	}
	
	public function setdevolucion_facturas_Original(array $devolucion_facturas) {
		foreach($devolucion_facturas as $devolucion_factura){
			$devolucion_factura->setdevolucion_factura_Original(clone $devolucion_factura);
		}
	}
	
	public static function setdevolucion_factura_OriginalStatic(devolucion_factura $devolucion_factura) {
		$devolucion_factura->setdevolucion_factura_Original(clone $devolucion_factura);		
	}
	
	public static function setdevolucion_facturas_OriginalStatic(array $devolucion_facturas) {		
		foreach($devolucion_facturas as $devolucion_factura){
			$devolucion_factura->setdevolucion_factura_Original(clone $devolucion_factura);
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
