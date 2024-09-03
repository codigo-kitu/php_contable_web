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
namespace com\bydan\contabilidad\inventario\devolucion\business\data;

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

use com\bydan\contabilidad\inventario\devolucion\business\entity\devolucion;

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

use com\bydan\contabilidad\inventario\devolucion_detalle\business\data\devolucion_detalle_data;


class devolucion_data extends GetEntitiesDataAccessHelper implements devolucion_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='inv_';
	public static string $TABLE_NAME='inv_devolucion';			
	public static string $TABLE_NAME_devolucion='devolucion';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_DEVOLUCION_INSERT(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_DEVOLUCION_UPDATE(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_DEVOLUCION_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_DEVOLUCION_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $devolucion_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'devolucion';
		
		devolucion_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('INVENTARIO');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->devolucion_DataAccessAdditional=new devolucionDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_empresa,id_sucursal,id_ejercicio,id_periodo,id_usuario,numero,id_proveedor,id_vendedor,ruc,fecha_emision,id_termino_pago_proveedor,fecha_vence,cotizacion,id_moneda,id_estado,direccion,envia,observacion,impuesto_en_precio,sub_total,descuento_monto,descuento_porciento,iva_monto,iva_porciento,total,otro_monto,otro_porciento,factura_proveedor,pago,id_asiento,id_documento_cuenta_pagar,id_kardex) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%d,%d,%d,%d,\'%s\',%d,%d,\'%s\',\'%s\',%d,\'%s\',%f,%d,%d,\'%s\',\'%s\',\'%s\',\'%d\',%f,%f,%f,%f,%f,%f,%f,%f,\'%s\',%f,%s,%s,%s)';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_empresa=%d,id_sucursal=%d,id_ejercicio=%d,id_periodo=%d,id_usuario=%d,numero=\'%s\',id_proveedor=%d,id_vendedor=%d,ruc=\'%s\',fecha_emision=\'%s\',id_termino_pago_proveedor=%d,fecha_vence=\'%s\',cotizacion=%f,id_moneda=%d,id_estado=%d,direccion=\'%s\',envia=\'%s\',observacion=\'%s\',impuesto_en_precio=\'%d\',sub_total=%f,descuento_monto=%f,descuento_porciento=%f,iva_monto=%f,iva_porciento=%f,total=%f,otro_monto=%f,otro_porciento=%f,factura_proveedor=\'%s\',pago=%f,id_asiento=%s,id_documento_cuenta_pagar=%s,id_kardex=%s where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_sucursal,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_ejercicio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_periodo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_usuario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_vendedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.ruc,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_emision,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_termino_pago_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_vence,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cotizacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_moneda,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_estado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.direccion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.envia,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.observacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.impuesto_en_precio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.sub_total,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descuento_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descuento_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.iva_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.iva_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.total,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.otro_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.otro_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.factura_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.pago,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_asiento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_documento_cuenta_pagar,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_kardex from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(devolucion $devolucion,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($devolucion->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=devolucion_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($devolucion->getId(),$connexion));				
				
			} else if ($devolucion->getIsChanged()) {
				if($devolucion->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=devolucion_data::$QUERY_INSERT;
					
					
					
					

					//$id_asiento='null';
					//if($devolucion->getid_asiento()!==null && $devolucion->getid_asiento()>=0) {
						//$id_asiento=$devolucion->getid_asiento();
					//} else {
						//$id_asiento='null';
					//}

					//$id_documento_cuenta_pagar='null';
					//if($devolucion->getid_documento_cuenta_pagar()!==null && $devolucion->getid_documento_cuenta_pagar()>=0) {
						//$id_documento_cuenta_pagar=$devolucion->getid_documento_cuenta_pagar();
					//} else {
						//$id_documento_cuenta_pagar='null';
					//}

					//$id_kardex='null';
					//if($devolucion->getid_kardex()!==null && $devolucion->getid_kardex()>=0) {
						//$id_kardex=$devolucion->getid_kardex();
					//} else {
						//$id_kardex='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$devolucion->getid_empresa(),$devolucion->getid_sucursal(),$devolucion->getid_ejercicio(),$devolucion->getid_periodo(),$devolucion->getid_usuario(),Funciones::GetRealScapeString($devolucion->getnumero(),$connexion),$devolucion->getid_proveedor(),$devolucion->getid_vendedor(),Funciones::GetRealScapeString($devolucion->getruc(),$connexion),Funciones::GetRealScapeString($devolucion->getfecha_emision(),$connexion),$devolucion->getid_termino_pago_proveedor(),Funciones::GetRealScapeString($devolucion->getfecha_vence(),$connexion),$devolucion->getcotizacion(),$devolucion->getid_moneda(),$devolucion->getid_estado(),Funciones::GetRealScapeString($devolucion->getdireccion(),$connexion),Funciones::GetRealScapeString($devolucion->getenvia(),$connexion),Funciones::GetRealScapeString($devolucion->getobservacion(),$connexion),$devolucion->getimpuesto_en_precio(),$devolucion->getsub_total(),$devolucion->getdescuento_monto(),$devolucion->getdescuento_porciento(),$devolucion->getiva_monto(),$devolucion->getiva_porciento(),$devolucion->gettotal(),$devolucion->getotro_monto(),$devolucion->getotro_porciento(),Funciones::GetRealScapeString($devolucion->getfactura_proveedor(),$connexion),$devolucion->getpago(),Funciones::GetNullString($devolucion->getid_asiento()),Funciones::GetNullString($devolucion->getid_documento_cuenta_pagar()),Funciones::GetNullString($devolucion->getid_kardex()) );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=devolucion_data::$QUERY_UPDATE;			
					
					
					
					

					//$id_asiento='null';
					//if($devolucion->getid_asiento()!==null && $devolucion->getid_asiento()>=0) {
						//$id_asiento=$devolucion->getid_asiento();
					//} else {
						//$id_asiento='null';
					//}

					//$id_documento_cuenta_pagar='null';
					//if($devolucion->getid_documento_cuenta_pagar()!==null && $devolucion->getid_documento_cuenta_pagar()>=0) {
						//$id_documento_cuenta_pagar=$devolucion->getid_documento_cuenta_pagar();
					//} else {
						//$id_documento_cuenta_pagar='null';
					//}

					//$id_kardex='null';
					//if($devolucion->getid_kardex()!==null && $devolucion->getid_kardex()>=0) {
						//$id_kardex=$devolucion->getid_kardex();
					//} else {
						//$id_kardex='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$devolucion->getid_empresa(),$devolucion->getid_sucursal(),$devolucion->getid_ejercicio(),$devolucion->getid_periodo(),$devolucion->getid_usuario(),Funciones::GetRealScapeString($devolucion->getnumero(),$connexion),$devolucion->getid_proveedor(),$devolucion->getid_vendedor(),Funciones::GetRealScapeString($devolucion->getruc(),$connexion),Funciones::GetRealScapeString($devolucion->getfecha_emision(),$connexion),$devolucion->getid_termino_pago_proveedor(),Funciones::GetRealScapeString($devolucion->getfecha_vence(),$connexion),$devolucion->getcotizacion(),$devolucion->getid_moneda(),$devolucion->getid_estado(),Funciones::GetRealScapeString($devolucion->getdireccion(),$connexion),Funciones::GetRealScapeString($devolucion->getenvia(),$connexion),Funciones::GetRealScapeString($devolucion->getobservacion(),$connexion),$devolucion->getimpuesto_en_precio(),$devolucion->getsub_total(),$devolucion->getdescuento_monto(),$devolucion->getdescuento_porciento(),$devolucion->getiva_monto(),$devolucion->getiva_porciento(),$devolucion->gettotal(),$devolucion->getotro_monto(),$devolucion->getotro_porciento(),Funciones::GetRealScapeString($devolucion->getfactura_proveedor(),$connexion),$devolucion->getpago(),Funciones::GetNullString($devolucion->getid_asiento()),Funciones::GetNullString($devolucion->getid_documento_cuenta_pagar()),Funciones::GetNullString($devolucion->getid_kardex()), Funciones::GetRealScapeString($devolucion->getId(),$connexion), Funciones::GetRealScapeString($devolucion->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($devolucion, $connexion,$strQuerySaveComplete,devolucion_data::$TABLE_NAME,devolucion_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				devolucion_data::savePrepared($devolucion, $connexion,$strQuerySave,devolucion_data::$TABLE_NAME,devolucion_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			devolucion_data::setdevolucion_OriginalStatic($devolucion);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(devolucion $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				devolucion_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					devolucion_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					devolucion_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(devolucion $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					devolucion_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(devolucion $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					devolucion_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(devolucion $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					devolucion_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?devolucion {		
		$entity = new devolucion();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=devolucion_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=devolucion_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//Inventario.devolucion.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setdevolucion_Original(new devolucion());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,devolucion_data::$IS_WITH_SCHEMA);         	    
				/*$entity=devolucion_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setdevolucion_Original(parent::getEntityPrefijoEntityResult("",$entity->getdevolucion_Original(),$resultSet,devolucion_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setdevolucion_Original(devolucion_data::getEntityBaseResult("",$entity->getdevolucion_Original(),$resultSet));
				//$entity->setdevolucion_Original($this->getEntityBaseResult("",$entity->getdevolucion_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?devolucion {
		$entity = new devolucion();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=devolucion_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=devolucion_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,devolucion_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".Inventario.devolucion.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setdevolucion_Original(new devolucion());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,devolucion_data::$IS_WITH_SCHEMA);         	    
				/*$entity=devolucion_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setdevolucion_Original(parent::getEntityPrefijoEntityResult("",$entity->getdevolucion_Original(),$resultSet,devolucion_data::$IS_WITH_SCHEMA));         		
				////$entity->setdevolucion_Original(devolucion_data::getEntityBaseResult("",$entity->getdevolucion_Original(),$resultSet));
				//$entity->setdevolucion_Original($this->getEntityBaseResult("",$entity->getdevolucion_Original(),$resultSet));
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
		$entity = new devolucion();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=devolucion_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=devolucion_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,devolucion_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new devolucion();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,devolucion_data::$IS_WITH_SCHEMA);         		
				/*$entity=devolucion_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setdevolucion_Original( new devolucion());
				
				//$entity->setdevolucion_Original(parent::getEntityPrefijoEntityResult("",$entity->getdevolucion_Original(),$resultSet,devolucion_data::$IS_WITH_SCHEMA));         		
				////$entity->setdevolucion_Original(devolucion_data::getEntityBaseResult("",$entity->getdevolucion_Original(),$resultSet));
				//$entity->setdevolucion_Original($this->getEntityBaseResult("",$entity->getdevolucion_Original(),$resultSet));
								
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
		$entity = new devolucion();		  
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
      	    	$entity = new devolucion();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,devolucion_data::$IS_WITH_SCHEMA);         		
				/*$entity=devolucion_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setdevolucion_Original( new devolucion());
				
				//$entity->setdevolucion_Original(parent::getEntityPrefijoEntityResult("",$entity->getdevolucion_Original(),$resultSet,devolucion_data::$IS_WITH_SCHEMA));         		
				////$entity->setdevolucion_Original(devolucion_data::getEntityBaseResult("",$entity->getdevolucion_Original(),$resultSet));
				//$entity->setdevolucion_Original($this->getEntityBaseResult("",$entity->getdevolucion_Original(),$resultSet));
				
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
		$entity = new devolucion();		  
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
      	    	$entity = new devolucion();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,devolucion_data::$IS_WITH_SCHEMA);         		
				/*$entity=devolucion_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setdevolucion_Original( new devolucion());				
				//$entity->setdevolucion_Original(parent::getEntityPrefijoEntityResult("",$entity->getdevolucion_Original(),$resultSet,devolucion_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setdevolucion_Original(devolucion_data::getEntityBaseResult("",$entity->getdevolucion_Original(),$resultSet));
				//$entity->setdevolucion_Original($this->getEntityBaseResult("",$entity->getdevolucion_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=devolucion_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,devolucion $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,devolucion_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,devolucion_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getempresa(Connexion $connexion,$reldevolucion) : ?empresa{

		$empresa= new empresa();

		try {
			$empresaDataAccess=new empresa_data();
			$empresaDataAccess->isForFKData=$this->isForFKDataRels;
			$empresa=$empresaDataAccess->getEntity($connexion,$reldevolucion->getid_empresa());

		} catch(Exception $e) {
			throw $e;
		}

		return $empresa;
	}


	public function  getsucursal(Connexion $connexion,$reldevolucion) : ?sucursal{

		$sucursal= new sucursal();

		try {
			$sucursalDataAccess=new sucursal_data();
			$sucursalDataAccess->isForFKData=$this->isForFKDataRels;
			$sucursal=$sucursalDataAccess->getEntity($connexion,$reldevolucion->getid_sucursal());

		} catch(Exception $e) {
			throw $e;
		}

		return $sucursal;
	}


	public function  getejercicio(Connexion $connexion,$reldevolucion) : ?ejercicio{

		$ejercicio= new ejercicio();

		try {
			$ejercicioDataAccess=new ejercicio_data();
			$ejercicioDataAccess->isForFKData=$this->isForFKDataRels;
			$ejercicio=$ejercicioDataAccess->getEntity($connexion,$reldevolucion->getid_ejercicio());

		} catch(Exception $e) {
			throw $e;
		}

		return $ejercicio;
	}


	public function  getperiodo(Connexion $connexion,$reldevolucion) : ?periodo{

		$periodo= new periodo();

		try {
			$periodoDataAccess=new periodo_data();
			$periodoDataAccess->isForFKData=$this->isForFKDataRels;
			$periodo=$periodoDataAccess->getEntity($connexion,$reldevolucion->getid_periodo());

		} catch(Exception $e) {
			throw $e;
		}

		return $periodo;
	}


	public function  getusuario(Connexion $connexion,$reldevolucion) : ?usuario{

		$usuario= new usuario();

		try {
			$usuarioDataAccess=new usuario_data();
			$usuarioDataAccess->isForFKData=$this->isForFKDataRels;
			$usuario=$usuarioDataAccess->getEntity($connexion,$reldevolucion->getid_usuario());

		} catch(Exception $e) {
			throw $e;
		}

		return $usuario;
	}


	public function  getproveedor(Connexion $connexion,$reldevolucion) : ?proveedor{

		$proveedor= new proveedor();

		try {
			$proveedorDataAccess=new proveedor_data();
			$proveedorDataAccess->isForFKData=$this->isForFKDataRels;
			$proveedor=$proveedorDataAccess->getEntity($connexion,$reldevolucion->getid_proveedor());

		} catch(Exception $e) {
			throw $e;
		}

		return $proveedor;
	}


	public function  getvendedor(Connexion $connexion,$reldevolucion) : ?vendedor{

		$vendedor= new vendedor();

		try {
			$vendedorDataAccess=new vendedor_data();
			$vendedorDataAccess->isForFKData=$this->isForFKDataRels;
			$vendedor=$vendedorDataAccess->getEntity($connexion,$reldevolucion->getid_vendedor());

		} catch(Exception $e) {
			throw $e;
		}

		return $vendedor;
	}


	public function  gettermino_pago_proveedor(Connexion $connexion,$reldevolucion) : ?termino_pago_proveedor{

		$termino_pago_proveedor= new termino_pago_proveedor();

		try {
			$termino_pago_proveedorDataAccess=new termino_pago_proveedor_data();
			$termino_pago_proveedorDataAccess->isForFKData=$this->isForFKDataRels;
			$termino_pago_proveedor=$termino_pago_proveedorDataAccess->getEntity($connexion,$reldevolucion->getid_termino_pago_proveedor());

		} catch(Exception $e) {
			throw $e;
		}

		return $termino_pago_proveedor;
	}


	public function  getmoneda(Connexion $connexion,$reldevolucion) : ?moneda{

		$moneda= new moneda();

		try {
			$monedaDataAccess=new moneda_data();
			$monedaDataAccess->isForFKData=$this->isForFKDataRels;
			$moneda=$monedaDataAccess->getEntity($connexion,$reldevolucion->getid_moneda());

		} catch(Exception $e) {
			throw $e;
		}

		return $moneda;
	}


	public function  getestado(Connexion $connexion,$reldevolucion) : ?estado{

		$estado= new estado();

		try {
			$estadoDataAccess=new estado_data();
			$estadoDataAccess->isForFKData=$this->isForFKDataRels;
			$estado=$estadoDataAccess->getEntity($connexion,$reldevolucion->getid_estado());

		} catch(Exception $e) {
			throw $e;
		}

		return $estado;
	}


	public function  getasiento(Connexion $connexion,$reldevolucion) : ?asiento{

		$asiento= new asiento();

		try {
			$asientoDataAccess=new asiento_data();
			$asientoDataAccess->isForFKData=$this->isForFKDataRels;
			$asiento=$asientoDataAccess->getEntity($connexion,$reldevolucion->getid_asiento());

		} catch(Exception $e) {
			throw $e;
		}

		return $asiento;
	}


	public function  getdocumento_cuenta_pagar(Connexion $connexion,$reldevolucion) : ?documento_cuenta_pagar{

		$documento_cuenta_pagar= new documento_cuenta_pagar();

		try {
			$documento_cuenta_pagarDataAccess=new documento_cuenta_pagar_data();
			$documento_cuenta_pagarDataAccess->isForFKData=$this->isForFKDataRels;
			$documento_cuenta_pagar=$documento_cuenta_pagarDataAccess->getEntity($connexion,$reldevolucion->getid_documento_cuenta_pagar());

		} catch(Exception $e) {
			throw $e;
		}

		return $documento_cuenta_pagar;
	}


	public function  getkardex(Connexion $connexion,$reldevolucion) : ?kardex{

		$kardex= new kardex();

		try {
			$kardexDataAccess=new kardex_data();
			$kardexDataAccess->isForFKData=$this->isForFKDataRels;
			$kardex=$kardexDataAccess->getEntity($connexion,$reldevolucion->getid_kardex());

		} catch(Exception $e) {
			throw $e;
		}

		return $kardex;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	public function  getdevolucion_detalles(Connexion $connexion,devolucion $devolucion) : array {

		$devoluciondetalles=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.devolucion_detalle_data::$SCHEMA.".".devolucion_detalle_data::$TABLE_NAME.".id_devolucion=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$devolucion->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$devoluciondetalleDataAccess=new devolucion_detalle_data();

			$devoluciondetalles=$devoluciondetalleDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $devoluciondetalles;
	}


	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,devolucion $entity,$resultSet) : devolucion {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_empresa((int)$resultSet[$strPrefijo.'id_empresa']);
				$entity->setid_sucursal((int)$resultSet[$strPrefijo.'id_sucursal']);
				$entity->setid_ejercicio((int)$resultSet[$strPrefijo.'id_ejercicio']);
				$entity->setid_periodo((int)$resultSet[$strPrefijo.'id_periodo']);
				$entity->setid_usuario((int)$resultSet[$strPrefijo.'id_usuario']);
				$entity->setnumero(utf8_encode($resultSet[$strPrefijo.'numero']));
				$entity->setid_proveedor((int)$resultSet[$strPrefijo.'id_proveedor']);
				$entity->setid_vendedor((int)$resultSet[$strPrefijo.'id_vendedor']);
				$entity->setruc(utf8_encode($resultSet[$strPrefijo.'ruc']));
				$entity->setfecha_emision($resultSet[$strPrefijo.'fecha_emision']);
				$entity->setid_termino_pago_proveedor((int)$resultSet[$strPrefijo.'id_termino_pago_proveedor']);
				$entity->setfecha_vence($resultSet[$strPrefijo.'fecha_vence']);
				$entity->setcotizacion((float)$resultSet[$strPrefijo.'cotizacion']);
				$entity->setid_moneda((int)$resultSet[$strPrefijo.'id_moneda']);
				$entity->setid_estado((int)$resultSet[$strPrefijo.'id_estado']);
				$entity->setdireccion(utf8_encode($resultSet[$strPrefijo.'direccion']));
				$entity->setenvia(utf8_encode($resultSet[$strPrefijo.'envia']));
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
				$entity->settotal((float)$resultSet[$strPrefijo.'total']);
				$entity->setotro_monto((float)$resultSet[$strPrefijo.'otro_monto']);
				$entity->setotro_porciento((float)$resultSet[$strPrefijo.'otro_porciento']);
				$entity->setfactura_proveedor(utf8_encode($resultSet[$strPrefijo.'factura_proveedor']));
				$entity->setpago((float)$resultSet[$strPrefijo.'pago']);
				$entity->setid_asiento((int)$resultSet[$strPrefijo.'id_asiento']);
				$entity->setid_documento_cuenta_pagar((int)$resultSet[$strPrefijo.'id_documento_cuenta_pagar']);
				$entity->setid_kardex((int)$resultSet[$strPrefijo.'id_kardex']);
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,devolucion $devolucion,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $devolucion->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiisiissisdiisssiddddddddsdiii', $devolucion->getid_empresa(),$devolucion->getid_sucursal(),$devolucion->getid_ejercicio(),$devolucion->getid_periodo(),$devolucion->getid_usuario(),$devolucion->getnumero(),$devolucion->getid_proveedor(),$devolucion->getid_vendedor(),$devolucion->getruc(),$devolucion->getfecha_emision(),$devolucion->getid_termino_pago_proveedor(),$devolucion->getfecha_vence(),$devolucion->getcotizacion(),$devolucion->getid_moneda(),$devolucion->getid_estado(),$devolucion->getdireccion(),$devolucion->getenvia(),$devolucion->getobservacion(),$devolucion->getimpuesto_en_precio(),$devolucion->getsub_total(),$devolucion->getdescuento_monto(),$devolucion->getdescuento_porciento(),$devolucion->getiva_monto(),$devolucion->getiva_porciento(),$devolucion->gettotal(),$devolucion->getotro_monto(),$devolucion->getotro_porciento(),$devolucion->getfactura_proveedor(),$devolucion->getpago(),$devolucion->getid_asiento(),$devolucion->getid_documento_cuenta_pagar(),$devolucion->getid_kardex());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiisiissisdiisssiddddddddsdiiiis', $devolucion->getid_empresa(),$devolucion->getid_sucursal(),$devolucion->getid_ejercicio(),$devolucion->getid_periodo(),$devolucion->getid_usuario(),$devolucion->getnumero(),$devolucion->getid_proveedor(),$devolucion->getid_vendedor(),$devolucion->getruc(),$devolucion->getfecha_emision(),$devolucion->getid_termino_pago_proveedor(),$devolucion->getfecha_vence(),$devolucion->getcotizacion(),$devolucion->getid_moneda(),$devolucion->getid_estado(),$devolucion->getdireccion(),$devolucion->getenvia(),$devolucion->getobservacion(),$devolucion->getimpuesto_en_precio(),$devolucion->getsub_total(),$devolucion->getdescuento_monto(),$devolucion->getdescuento_porciento(),$devolucion->getiva_monto(),$devolucion->getiva_porciento(),$devolucion->gettotal(),$devolucion->getotro_monto(),$devolucion->getotro_porciento(),$devolucion->getfactura_proveedor(),$devolucion->getpago(),$devolucion->getid_asiento(),$devolucion->getid_documento_cuenta_pagar(),$devolucion->getid_kardex(), $devolucion->getId(), Funciones::GetRealScapeString($devolucion->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,devolucion $devolucion,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($devolucion->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($devolucion->getid_empresa(),$devolucion->getid_sucursal(),$devolucion->getid_ejercicio(),$devolucion->getid_periodo(),$devolucion->getid_usuario(),Funciones::GetRealScapeString($devolucion->getnumero(),$connexion),$devolucion->getid_proveedor(),$devolucion->getid_vendedor(),Funciones::GetRealScapeString($devolucion->getruc(),$connexion),Funciones::GetRealScapeString($devolucion->getfecha_emision(),$connexion),$devolucion->getid_termino_pago_proveedor(),Funciones::GetRealScapeString($devolucion->getfecha_vence(),$connexion),$devolucion->getcotizacion(),$devolucion->getid_moneda(),$devolucion->getid_estado(),Funciones::GetRealScapeString($devolucion->getdireccion(),$connexion),Funciones::GetRealScapeString($devolucion->getenvia(),$connexion),Funciones::GetRealScapeString($devolucion->getobservacion(),$connexion),$devolucion->getimpuesto_en_precio(),$devolucion->getsub_total(),$devolucion->getdescuento_monto(),$devolucion->getdescuento_porciento(),$devolucion->getiva_monto(),$devolucion->getiva_porciento(),$devolucion->gettotal(),$devolucion->getotro_monto(),$devolucion->getotro_porciento(),Funciones::GetRealScapeString($devolucion->getfactura_proveedor(),$connexion),$devolucion->getpago(),Funciones::GetNullString($devolucion->getid_asiento()),Funciones::GetNullString($devolucion->getid_documento_cuenta_pagar()),Funciones::GetNullString($devolucion->getid_kardex()));
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($devolucion->getid_empresa(),$devolucion->getid_sucursal(),$devolucion->getid_ejercicio(),$devolucion->getid_periodo(),$devolucion->getid_usuario(),Funciones::GetRealScapeString($devolucion->getnumero(),$connexion),$devolucion->getid_proveedor(),$devolucion->getid_vendedor(),Funciones::GetRealScapeString($devolucion->getruc(),$connexion),Funciones::GetRealScapeString($devolucion->getfecha_emision(),$connexion),$devolucion->getid_termino_pago_proveedor(),Funciones::GetRealScapeString($devolucion->getfecha_vence(),$connexion),$devolucion->getcotizacion(),$devolucion->getid_moneda(),$devolucion->getid_estado(),Funciones::GetRealScapeString($devolucion->getdireccion(),$connexion),Funciones::GetRealScapeString($devolucion->getenvia(),$connexion),Funciones::GetRealScapeString($devolucion->getobservacion(),$connexion),$devolucion->getimpuesto_en_precio(),$devolucion->getsub_total(),$devolucion->getdescuento_monto(),$devolucion->getdescuento_porciento(),$devolucion->getiva_monto(),$devolucion->getiva_porciento(),$devolucion->gettotal(),$devolucion->getotro_monto(),$devolucion->getotro_porciento(),Funciones::GetRealScapeString($devolucion->getfactura_proveedor(),$connexion),$devolucion->getpago(),Funciones::GetNullString($devolucion->getid_asiento()),Funciones::GetNullString($devolucion->getid_documento_cuenta_pagar()),Funciones::GetNullString($devolucion->getid_kardex()), $devolucion->getId(), Funciones::GetRealScapeString($devolucion->getVersionRow(),$connexion));
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
	
	public function setdevolucion_Original(devolucion $devolucion) {
		$devolucion->setdevolucion_Original(clone $devolucion);		
	}
	
	public function setdevolucions_Original(array $devolucions) {
		foreach($devolucions as $devolucion){
			$devolucion->setdevolucion_Original(clone $devolucion);
		}
	}
	
	public static function setdevolucion_OriginalStatic(devolucion $devolucion) {
		$devolucion->setdevolucion_Original(clone $devolucion);		
	}
	
	public static function setdevolucions_OriginalStatic(array $devolucions) {		
		foreach($devolucions as $devolucion){
			$devolucion->setdevolucion_Original(clone $devolucion);
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
