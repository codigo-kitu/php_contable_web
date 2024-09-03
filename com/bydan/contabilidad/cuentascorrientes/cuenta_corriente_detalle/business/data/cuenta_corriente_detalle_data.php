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
namespace com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\business\data;

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

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\business\entity\cuenta_corriente_detalle;

//FK


use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\entity\empresa;

use com\bydan\contabilidad\contabilidad\ejercicio\business\data\ejercicio_data;
use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;

use com\bydan\contabilidad\contabilidad\periodo\business\data\periodo_data;
use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;

use com\bydan\contabilidad\seguridad\usuario\business\data\usuario_data;
use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\data\cuenta_corriente_data;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity\cuenta_corriente;

use com\bydan\contabilidad\cuentascobrar\cliente\business\data\cliente_data;
use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\data\proveedor_data;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;

use com\bydan\contabilidad\general\tabla\business\data\tabla_data;
use com\bydan\contabilidad\general\tabla\business\entity\tabla;

use com\bydan\contabilidad\general\estado\business\data\estado_data;
use com\bydan\contabilidad\general\estado\business\entity\estado;

use com\bydan\contabilidad\contabilidad\asiento\business\data\asiento_data;
use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;

use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\data\cuenta_pagar_data;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\entity\cuenta_pagar;

use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\data\cuenta_cobrar_data;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\entity\cuenta_cobrar;

//REL

use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\business\data\clasificacion_cheque_data;


class cuenta_corriente_detalle_data extends GetEntitiesDataAccessHelper implements cuenta_corriente_detalle_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='cco_';
	public static string $TABLE_NAME='cco_cuenta_corriente_detalle';			
	public static string $TABLE_NAME_cuenta_corriente_detalle='cuenta_corriente_detalle';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_CUENTA_CORRIENTE_DETALLE_INSERT(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_CUENTA_CORRIENTE_DETALLE_UPDATE(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_CUENTA_CORRIENTE_DETALLE_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_CUENTA_CORRIENTE_DETALLE_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $cuenta_corriente_detalle_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'cuenta_corriente_detalle';
		
		cuenta_corriente_detalle_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('CUENTASCORRIENTES');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cuenta_corriente_detalle_DataAccessAdditional=new cuenta_corriente_detalleDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_empresa,id_ejercicio,id_periodo,id_usuario,id_cuenta_corriente,es_balance_inicial,es_cheque,es_deposito,es_retiro,numero_cheque,fecha_emision,id_cliente,id_proveedor,monto,debito,credito,balance,fecha_hora,id_tabla,id_origen,descripcion,id_estado,id_asiento,id_cuenta_pagar,id_cuenta_cobrar,tabla_origen,origen_empresa,motivo_anulacion,origen_dato,computador_origen) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%d,%d,%d,%d,\'%d\',\'%d\',\'%d\',\'%d\',\'%s\',\'%s\',%s,%s,%f,%f,%f,%f,\'%s\',%d,%d,\'%s\',%d,%s,%s,%s,\'%s\',\'%s\',\'%s\',\'%s\',\'%s\')';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_empresa=%d,id_ejercicio=%d,id_periodo=%d,id_usuario=%d,id_cuenta_corriente=%d,es_balance_inicial=\'%d\',es_cheque=\'%d\',es_deposito=\'%d\',es_retiro=\'%d\',numero_cheque=\'%s\',fecha_emision=\'%s\',id_cliente=%s,id_proveedor=%s,monto=%f,debito=%f,credito=%f,balance=%f,fecha_hora=\'%s\',id_tabla=%d,id_origen=%d,descripcion=\'%s\',id_estado=%d,id_asiento=%s,id_cuenta_pagar=%s,id_cuenta_cobrar=%s,tabla_origen=\'%s\',origen_empresa=\'%s\',motivo_anulacion=\'%s\',origen_dato=\'%s\',computador_origen=\'%s\' where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_ejercicio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_periodo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_usuario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta_corriente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.es_balance_inicial,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.es_cheque,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.es_deposito,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.es_retiro,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_cheque,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_emision,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cliente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.debito,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.credito,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.balance,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_hora,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_tabla,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_origen,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_estado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_asiento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta_pagar,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta_cobrar,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.tabla_origen,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.origen_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.motivo_anulacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.origen_dato,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.computador_origen from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(cuenta_corriente_detalle $cuenta_corriente_detalle,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($cuenta_corriente_detalle->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=cuenta_corriente_detalle_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($cuenta_corriente_detalle->getId(),$connexion));				
				
			} else if ($cuenta_corriente_detalle->getIsChanged()) {
				if($cuenta_corriente_detalle->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=cuenta_corriente_detalle_data::$QUERY_INSERT;
					
					
					
					

					//$id_cliente='null';
					//if($cuenta_corriente_detalle->getid_cliente()!==null && $cuenta_corriente_detalle->getid_cliente()>=0) {
						//$id_cliente=$cuenta_corriente_detalle->getid_cliente();
					//} else {
						//$id_cliente='null';
					//}

					//$id_proveedor='null';
					//if($cuenta_corriente_detalle->getid_proveedor()!==null && $cuenta_corriente_detalle->getid_proveedor()>=0) {
						//$id_proveedor=$cuenta_corriente_detalle->getid_proveedor();
					//} else {
						//$id_proveedor='null';
					//}

					//$id_asiento='null';
					//if($cuenta_corriente_detalle->getid_asiento()!==null && $cuenta_corriente_detalle->getid_asiento()>=0) {
						//$id_asiento=$cuenta_corriente_detalle->getid_asiento();
					//} else {
						//$id_asiento='null';
					//}

					//$id_cuenta_pagar='null';
					//if($cuenta_corriente_detalle->getid_cuenta_pagar()!==null && $cuenta_corriente_detalle->getid_cuenta_pagar()>=0) {
						//$id_cuenta_pagar=$cuenta_corriente_detalle->getid_cuenta_pagar();
					//} else {
						//$id_cuenta_pagar='null';
					//}

					//$id_cuenta_cobrar='null';
					//if($cuenta_corriente_detalle->getid_cuenta_cobrar()!==null && $cuenta_corriente_detalle->getid_cuenta_cobrar()>=0) {
						//$id_cuenta_cobrar=$cuenta_corriente_detalle->getid_cuenta_cobrar();
					//} else {
						//$id_cuenta_cobrar='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$cuenta_corriente_detalle->getid_empresa(),$cuenta_corriente_detalle->getid_ejercicio(),$cuenta_corriente_detalle->getid_periodo(),$cuenta_corriente_detalle->getid_usuario(),$cuenta_corriente_detalle->getid_cuenta_corriente(),$cuenta_corriente_detalle->getes_balance_inicial(),$cuenta_corriente_detalle->getes_cheque(),$cuenta_corriente_detalle->getes_deposito(),$cuenta_corriente_detalle->getes_retiro(),Funciones::GetRealScapeString($cuenta_corriente_detalle->getnumero_cheque(),$connexion),Funciones::GetRealScapeString($cuenta_corriente_detalle->getfecha_emision(),$connexion),Funciones::GetNullString($cuenta_corriente_detalle->getid_cliente()),Funciones::GetNullString($cuenta_corriente_detalle->getid_proveedor()),$cuenta_corriente_detalle->getmonto(),$cuenta_corriente_detalle->getdebito(),$cuenta_corriente_detalle->getcredito(),$cuenta_corriente_detalle->getbalance(),Funciones::GetRealScapeString($cuenta_corriente_detalle->getfecha_hora(),$connexion),$cuenta_corriente_detalle->getid_tabla(),$cuenta_corriente_detalle->getid_origen(),Funciones::GetRealScapeString($cuenta_corriente_detalle->getdescripcion(),$connexion),$cuenta_corriente_detalle->getid_estado(),Funciones::GetNullString($cuenta_corriente_detalle->getid_asiento()),Funciones::GetNullString($cuenta_corriente_detalle->getid_cuenta_pagar()),Funciones::GetNullString($cuenta_corriente_detalle->getid_cuenta_cobrar()),Funciones::GetRealScapeString($cuenta_corriente_detalle->gettabla_origen(),$connexion),Funciones::GetRealScapeString($cuenta_corriente_detalle->getorigen_empresa(),$connexion),Funciones::GetRealScapeString($cuenta_corriente_detalle->getmotivo_anulacion(),$connexion),Funciones::GetRealScapeString($cuenta_corriente_detalle->getorigen_dato(),$connexion),Funciones::GetRealScapeString($cuenta_corriente_detalle->getcomputador_origen(),$connexion) );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=cuenta_corriente_detalle_data::$QUERY_UPDATE;			
					
					
					
					

					//$id_cliente='null';
					//if($cuenta_corriente_detalle->getid_cliente()!==null && $cuenta_corriente_detalle->getid_cliente()>=0) {
						//$id_cliente=$cuenta_corriente_detalle->getid_cliente();
					//} else {
						//$id_cliente='null';
					//}

					//$id_proveedor='null';
					//if($cuenta_corriente_detalle->getid_proveedor()!==null && $cuenta_corriente_detalle->getid_proveedor()>=0) {
						//$id_proveedor=$cuenta_corriente_detalle->getid_proveedor();
					//} else {
						//$id_proveedor='null';
					//}

					//$id_asiento='null';
					//if($cuenta_corriente_detalle->getid_asiento()!==null && $cuenta_corriente_detalle->getid_asiento()>=0) {
						//$id_asiento=$cuenta_corriente_detalle->getid_asiento();
					//} else {
						//$id_asiento='null';
					//}

					//$id_cuenta_pagar='null';
					//if($cuenta_corriente_detalle->getid_cuenta_pagar()!==null && $cuenta_corriente_detalle->getid_cuenta_pagar()>=0) {
						//$id_cuenta_pagar=$cuenta_corriente_detalle->getid_cuenta_pagar();
					//} else {
						//$id_cuenta_pagar='null';
					//}

					//$id_cuenta_cobrar='null';
					//if($cuenta_corriente_detalle->getid_cuenta_cobrar()!==null && $cuenta_corriente_detalle->getid_cuenta_cobrar()>=0) {
						//$id_cuenta_cobrar=$cuenta_corriente_detalle->getid_cuenta_cobrar();
					//} else {
						//$id_cuenta_cobrar='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$cuenta_corriente_detalle->getid_empresa(),$cuenta_corriente_detalle->getid_ejercicio(),$cuenta_corriente_detalle->getid_periodo(),$cuenta_corriente_detalle->getid_usuario(),$cuenta_corriente_detalle->getid_cuenta_corriente(),$cuenta_corriente_detalle->getes_balance_inicial(),$cuenta_corriente_detalle->getes_cheque(),$cuenta_corriente_detalle->getes_deposito(),$cuenta_corriente_detalle->getes_retiro(),Funciones::GetRealScapeString($cuenta_corriente_detalle->getnumero_cheque(),$connexion),Funciones::GetRealScapeString($cuenta_corriente_detalle->getfecha_emision(),$connexion),Funciones::GetNullString($cuenta_corriente_detalle->getid_cliente()),Funciones::GetNullString($cuenta_corriente_detalle->getid_proveedor()),$cuenta_corriente_detalle->getmonto(),$cuenta_corriente_detalle->getdebito(),$cuenta_corriente_detalle->getcredito(),$cuenta_corriente_detalle->getbalance(),Funciones::GetRealScapeString($cuenta_corriente_detalle->getfecha_hora(),$connexion),$cuenta_corriente_detalle->getid_tabla(),$cuenta_corriente_detalle->getid_origen(),Funciones::GetRealScapeString($cuenta_corriente_detalle->getdescripcion(),$connexion),$cuenta_corriente_detalle->getid_estado(),Funciones::GetNullString($cuenta_corriente_detalle->getid_asiento()),Funciones::GetNullString($cuenta_corriente_detalle->getid_cuenta_pagar()),Funciones::GetNullString($cuenta_corriente_detalle->getid_cuenta_cobrar()),Funciones::GetRealScapeString($cuenta_corriente_detalle->gettabla_origen(),$connexion),Funciones::GetRealScapeString($cuenta_corriente_detalle->getorigen_empresa(),$connexion),Funciones::GetRealScapeString($cuenta_corriente_detalle->getmotivo_anulacion(),$connexion),Funciones::GetRealScapeString($cuenta_corriente_detalle->getorigen_dato(),$connexion),Funciones::GetRealScapeString($cuenta_corriente_detalle->getcomputador_origen(),$connexion), Funciones::GetRealScapeString($cuenta_corriente_detalle->getId(),$connexion), Funciones::GetRealScapeString($cuenta_corriente_detalle->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($cuenta_corriente_detalle, $connexion,$strQuerySaveComplete,cuenta_corriente_detalle_data::$TABLE_NAME,cuenta_corriente_detalle_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				cuenta_corriente_detalle_data::savePrepared($cuenta_corriente_detalle, $connexion,$strQuerySave,cuenta_corriente_detalle_data::$TABLE_NAME,cuenta_corriente_detalle_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			cuenta_corriente_detalle_data::setcuenta_corriente_detalle_OriginalStatic($cuenta_corriente_detalle);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(cuenta_corriente_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				cuenta_corriente_detalle_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					cuenta_corriente_detalle_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					cuenta_corriente_detalle_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(cuenta_corriente_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					cuenta_corriente_detalle_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(cuenta_corriente_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					cuenta_corriente_detalle_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(cuenta_corriente_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					cuenta_corriente_detalle_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?cuenta_corriente_detalle {		
		$entity = new cuenta_corriente_detalle();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=cuenta_corriente_detalle_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=cuenta_corriente_detalle_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//CuentasCorrientes.cuenta_corriente_detalle.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setcuenta_corriente_detalle_Original(new cuenta_corriente_detalle());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cuenta_corriente_detalle_data::$IS_WITH_SCHEMA);         	    
				/*$entity=cuenta_corriente_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setcuenta_corriente_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getcuenta_corriente_detalle_Original(),$resultSet,cuenta_corriente_detalle_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setcuenta_corriente_detalle_Original(cuenta_corriente_detalle_data::getEntityBaseResult("",$entity->getcuenta_corriente_detalle_Original(),$resultSet));
				//$entity->setcuenta_corriente_detalle_Original($this->getEntityBaseResult("",$entity->getcuenta_corriente_detalle_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?cuenta_corriente_detalle {
		$entity = new cuenta_corriente_detalle();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=cuenta_corriente_detalle_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=cuenta_corriente_detalle_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,cuenta_corriente_detalle_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".CuentasCorrientes.cuenta_corriente_detalle.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setcuenta_corriente_detalle_Original(new cuenta_corriente_detalle());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cuenta_corriente_detalle_data::$IS_WITH_SCHEMA);         	    
				/*$entity=cuenta_corriente_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setcuenta_corriente_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getcuenta_corriente_detalle_Original(),$resultSet,cuenta_corriente_detalle_data::$IS_WITH_SCHEMA));         		
				////$entity->setcuenta_corriente_detalle_Original(cuenta_corriente_detalle_data::getEntityBaseResult("",$entity->getcuenta_corriente_detalle_Original(),$resultSet));
				//$entity->setcuenta_corriente_detalle_Original($this->getEntityBaseResult("",$entity->getcuenta_corriente_detalle_Original(),$resultSet));
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
		$entity = new cuenta_corriente_detalle();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=cuenta_corriente_detalle_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=cuenta_corriente_detalle_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,cuenta_corriente_detalle_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new cuenta_corriente_detalle();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cuenta_corriente_detalle_data::$IS_WITH_SCHEMA);         		
				/*$entity=cuenta_corriente_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setcuenta_corriente_detalle_Original( new cuenta_corriente_detalle());
				
				//$entity->setcuenta_corriente_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getcuenta_corriente_detalle_Original(),$resultSet,cuenta_corriente_detalle_data::$IS_WITH_SCHEMA));         		
				////$entity->setcuenta_corriente_detalle_Original(cuenta_corriente_detalle_data::getEntityBaseResult("",$entity->getcuenta_corriente_detalle_Original(),$resultSet));
				//$entity->setcuenta_corriente_detalle_Original($this->getEntityBaseResult("",$entity->getcuenta_corriente_detalle_Original(),$resultSet));
								
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
		$entity = new cuenta_corriente_detalle();		  
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
      	    	$entity = new cuenta_corriente_detalle();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cuenta_corriente_detalle_data::$IS_WITH_SCHEMA);         		
				/*$entity=cuenta_corriente_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setcuenta_corriente_detalle_Original( new cuenta_corriente_detalle());
				
				//$entity->setcuenta_corriente_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getcuenta_corriente_detalle_Original(),$resultSet,cuenta_corriente_detalle_data::$IS_WITH_SCHEMA));         		
				////$entity->setcuenta_corriente_detalle_Original(cuenta_corriente_detalle_data::getEntityBaseResult("",$entity->getcuenta_corriente_detalle_Original(),$resultSet));
				//$entity->setcuenta_corriente_detalle_Original($this->getEntityBaseResult("",$entity->getcuenta_corriente_detalle_Original(),$resultSet));
				
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
		$entity = new cuenta_corriente_detalle();		  
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
      	    	$entity = new cuenta_corriente_detalle();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cuenta_corriente_detalle_data::$IS_WITH_SCHEMA);         		
				/*$entity=cuenta_corriente_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setcuenta_corriente_detalle_Original( new cuenta_corriente_detalle());				
				//$entity->setcuenta_corriente_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getcuenta_corriente_detalle_Original(),$resultSet,cuenta_corriente_detalle_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setcuenta_corriente_detalle_Original(cuenta_corriente_detalle_data::getEntityBaseResult("",$entity->getcuenta_corriente_detalle_Original(),$resultSet));
				//$entity->setcuenta_corriente_detalle_Original($this->getEntityBaseResult("",$entity->getcuenta_corriente_detalle_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=cuenta_corriente_detalle_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,cuenta_corriente_detalle $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,cuenta_corriente_detalle_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,cuenta_corriente_detalle_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getempresa(Connexion $connexion,$relcuenta_corriente_detalle) : ?empresa{

		$empresa= new empresa();

		try {
			$empresaDataAccess=new empresa_data();
			$empresaDataAccess->isForFKData=$this->isForFKDataRels;
			$empresa=$empresaDataAccess->getEntity($connexion,$relcuenta_corriente_detalle->getid_empresa());

		} catch(Exception $e) {
			throw $e;
		}

		return $empresa;
	}


	public function  getejercicio(Connexion $connexion,$relcuenta_corriente_detalle) : ?ejercicio{

		$ejercicio= new ejercicio();

		try {
			$ejercicioDataAccess=new ejercicio_data();
			$ejercicioDataAccess->isForFKData=$this->isForFKDataRels;
			$ejercicio=$ejercicioDataAccess->getEntity($connexion,$relcuenta_corriente_detalle->getid_ejercicio());

		} catch(Exception $e) {
			throw $e;
		}

		return $ejercicio;
	}


	public function  getperiodo(Connexion $connexion,$relcuenta_corriente_detalle) : ?periodo{

		$periodo= new periodo();

		try {
			$periodoDataAccess=new periodo_data();
			$periodoDataAccess->isForFKData=$this->isForFKDataRels;
			$periodo=$periodoDataAccess->getEntity($connexion,$relcuenta_corriente_detalle->getid_periodo());

		} catch(Exception $e) {
			throw $e;
		}

		return $periodo;
	}


	public function  getusuario(Connexion $connexion,$relcuenta_corriente_detalle) : ?usuario{

		$usuario= new usuario();

		try {
			$usuarioDataAccess=new usuario_data();
			$usuarioDataAccess->isForFKData=$this->isForFKDataRels;
			$usuario=$usuarioDataAccess->getEntity($connexion,$relcuenta_corriente_detalle->getid_usuario());

		} catch(Exception $e) {
			throw $e;
		}

		return $usuario;
	}


	public function  getcuenta_corriente(Connexion $connexion,$relcuenta_corriente_detalle) : ?cuenta_corriente{

		$cuenta_corriente= new cuenta_corriente();

		try {
			$cuenta_corrienteDataAccess=new cuenta_corriente_data();
			$cuenta_corrienteDataAccess->isForFKData=$this->isForFKDataRels;
			$cuenta_corriente=$cuenta_corrienteDataAccess->getEntity($connexion,$relcuenta_corriente_detalle->getid_cuenta_corriente());

		} catch(Exception $e) {
			throw $e;
		}

		return $cuenta_corriente;
	}


	public function  getcliente(Connexion $connexion,$relcuenta_corriente_detalle) : ?cliente{

		$cliente= new cliente();

		try {
			$clienteDataAccess=new cliente_data();
			$clienteDataAccess->isForFKData=$this->isForFKDataRels;
			$cliente=$clienteDataAccess->getEntity($connexion,$relcuenta_corriente_detalle->getid_cliente());

		} catch(Exception $e) {
			throw $e;
		}

		return $cliente;
	}


	public function  getproveedor(Connexion $connexion,$relcuenta_corriente_detalle) : ?proveedor{

		$proveedor= new proveedor();

		try {
			$proveedorDataAccess=new proveedor_data();
			$proveedorDataAccess->isForFKData=$this->isForFKDataRels;
			$proveedor=$proveedorDataAccess->getEntity($connexion,$relcuenta_corriente_detalle->getid_proveedor());

		} catch(Exception $e) {
			throw $e;
		}

		return $proveedor;
	}


	public function  gettabla(Connexion $connexion,$relcuenta_corriente_detalle) : ?tabla{

		$tabla= new tabla();

		try {
			$tablaDataAccess=new tabla_data();
			$tablaDataAccess->isForFKData=$this->isForFKDataRels;
			$tabla=$tablaDataAccess->getEntity($connexion,$relcuenta_corriente_detalle->getid_tabla());

		} catch(Exception $e) {
			throw $e;
		}

		return $tabla;
	}


	public function  getestado(Connexion $connexion,$relcuenta_corriente_detalle) : ?estado{

		$estado= new estado();

		try {
			$estadoDataAccess=new estado_data();
			$estadoDataAccess->isForFKData=$this->isForFKDataRels;
			$estado=$estadoDataAccess->getEntity($connexion,$relcuenta_corriente_detalle->getid_estado());

		} catch(Exception $e) {
			throw $e;
		}

		return $estado;
	}


	public function  getasiento(Connexion $connexion,$relcuenta_corriente_detalle) : ?asiento{

		$asiento= new asiento();

		try {
			$asientoDataAccess=new asiento_data();
			$asientoDataAccess->isForFKData=$this->isForFKDataRels;
			$asiento=$asientoDataAccess->getEntity($connexion,$relcuenta_corriente_detalle->getid_asiento());

		} catch(Exception $e) {
			throw $e;
		}

		return $asiento;
	}


	public function  getcuenta_pagar(Connexion $connexion,$relcuenta_corriente_detalle) : ?cuenta_pagar{

		$cuenta_pagar= new cuenta_pagar();

		try {
			$cuenta_pagarDataAccess=new cuenta_pagar_data();
			$cuenta_pagarDataAccess->isForFKData=$this->isForFKDataRels;
			$cuenta_pagar=$cuenta_pagarDataAccess->getEntity($connexion,$relcuenta_corriente_detalle->getid_cuenta_pagar());

		} catch(Exception $e) {
			throw $e;
		}

		return $cuenta_pagar;
	}


	public function  getcuenta_cobrar(Connexion $connexion,$relcuenta_corriente_detalle) : ?cuenta_cobrar{

		$cuenta_cobrar= new cuenta_cobrar();

		try {
			$cuenta_cobrarDataAccess=new cuenta_cobrar_data();
			$cuenta_cobrarDataAccess->isForFKData=$this->isForFKDataRels;
			$cuenta_cobrar=$cuenta_cobrarDataAccess->getEntity($connexion,$relcuenta_corriente_detalle->getid_cuenta_cobrar());

		} catch(Exception $e) {
			throw $e;
		}

		return $cuenta_cobrar;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	public function  getclasificacion_cheques(Connexion $connexion,cuenta_corriente_detalle $cuenta_corriente_detalle) : array {

		$clasificacioncheques=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.clasificacion_cheque_data::$SCHEMA.".".clasificacion_cheque_data::$TABLE_NAME.".id_cuenta_corriente_detalle=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$cuenta_corriente_detalle->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$clasificacionchequeDataAccess=new clasificacion_cheque_data();

			$clasificacioncheques=$clasificacionchequeDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $clasificacioncheques;
	}


	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,cuenta_corriente_detalle $entity,$resultSet) : cuenta_corriente_detalle {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_empresa((int)$resultSet[$strPrefijo.'id_empresa']);
				$entity->setid_ejercicio((int)$resultSet[$strPrefijo.'id_ejercicio']);
				$entity->setid_periodo((int)$resultSet[$strPrefijo.'id_periodo']);
				$entity->setid_usuario((int)$resultSet[$strPrefijo.'id_usuario']);
				$entity->setid_cuenta_corriente((int)$resultSet[$strPrefijo.'id_cuenta_corriente']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setes_balance_inicial($resultSet[$strPrefijo.'es_balance_inicial']=='f'? false:true );
				} else {
					$entity->setes_balance_inicial((bool)$resultSet[$strPrefijo.'es_balance_inicial']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setes_cheque($resultSet[$strPrefijo.'es_cheque']=='f'? false:true );
				} else {
					$entity->setes_cheque((bool)$resultSet[$strPrefijo.'es_cheque']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setes_deposito($resultSet[$strPrefijo.'es_deposito']=='f'? false:true );
				} else {
					$entity->setes_deposito((bool)$resultSet[$strPrefijo.'es_deposito']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setes_retiro($resultSet[$strPrefijo.'es_retiro']=='f'? false:true );
				} else {
					$entity->setes_retiro((bool)$resultSet[$strPrefijo.'es_retiro']);
				}
				$entity->setnumero_cheque(utf8_encode($resultSet[$strPrefijo.'numero_cheque']));
				$entity->setfecha_emision($resultSet[$strPrefijo.'fecha_emision']);
				$entity->setid_cliente((int)$resultSet[$strPrefijo.'id_cliente']);
				$entity->setid_proveedor((int)$resultSet[$strPrefijo.'id_proveedor']);
				$entity->setmonto((float)$resultSet[$strPrefijo.'monto']);
				$entity->setdebito((float)$resultSet[$strPrefijo.'debito']);
				$entity->setcredito((float)$resultSet[$strPrefijo.'credito']);
				$entity->setbalance((float)$resultSet[$strPrefijo.'balance']);
				$entity->setfecha_hora($resultSet[$strPrefijo.'fecha_hora']);
				$entity->setid_tabla((int)$resultSet[$strPrefijo.'id_tabla']);
				$entity->setid_origen((int)$resultSet[$strPrefijo.'id_origen']);
				$entity->setdescripcion(utf8_encode($resultSet[$strPrefijo.'descripcion']));
				$entity->setid_estado((int)$resultSet[$strPrefijo.'id_estado']);
				$entity->setid_asiento((int)$resultSet[$strPrefijo.'id_asiento']);
				$entity->setid_cuenta_pagar((int)$resultSet[$strPrefijo.'id_cuenta_pagar']);
				$entity->setid_cuenta_cobrar((int)$resultSet[$strPrefijo.'id_cuenta_cobrar']);
				$entity->settabla_origen(utf8_encode($resultSet[$strPrefijo.'tabla_origen']));
				$entity->setorigen_empresa(utf8_encode($resultSet[$strPrefijo.'origen_empresa']));
				$entity->setmotivo_anulacion(utf8_encode($resultSet[$strPrefijo.'motivo_anulacion']));
				$entity->setorigen_dato(utf8_encode($resultSet[$strPrefijo.'origen_dato']));
				$entity->setcomputador_origen(utf8_encode($resultSet[$strPrefijo.'computador_origen']));
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,cuenta_corriente_detalle $cuenta_corriente_detalle,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $cuenta_corriente_detalle->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiiiiiissiiddddsiisiiiisssss', $cuenta_corriente_detalle->getid_empresa(),$cuenta_corriente_detalle->getid_ejercicio(),$cuenta_corriente_detalle->getid_periodo(),$cuenta_corriente_detalle->getid_usuario(),$cuenta_corriente_detalle->getid_cuenta_corriente(),$cuenta_corriente_detalle->getes_balance_inicial(),$cuenta_corriente_detalle->getes_cheque(),$cuenta_corriente_detalle->getes_deposito(),$cuenta_corriente_detalle->getes_retiro(),$cuenta_corriente_detalle->getnumero_cheque(),$cuenta_corriente_detalle->getfecha_emision(),$cuenta_corriente_detalle->getid_cliente(),$cuenta_corriente_detalle->getid_proveedor(),$cuenta_corriente_detalle->getmonto(),$cuenta_corriente_detalle->getdebito(),$cuenta_corriente_detalle->getcredito(),$cuenta_corriente_detalle->getbalance(),$cuenta_corriente_detalle->getfecha_hora(),$cuenta_corriente_detalle->getid_tabla(),$cuenta_corriente_detalle->getid_origen(),$cuenta_corriente_detalle->getdescripcion(),$cuenta_corriente_detalle->getid_estado(),$cuenta_corriente_detalle->getid_asiento(),$cuenta_corriente_detalle->getid_cuenta_pagar(),$cuenta_corriente_detalle->getid_cuenta_cobrar(),$cuenta_corriente_detalle->gettabla_origen(),$cuenta_corriente_detalle->getorigen_empresa(),$cuenta_corriente_detalle->getmotivo_anulacion(),$cuenta_corriente_detalle->getorigen_dato(),$cuenta_corriente_detalle->getcomputador_origen());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiiiiiissiiddddsiisiiiisssssis', $cuenta_corriente_detalle->getid_empresa(),$cuenta_corriente_detalle->getid_ejercicio(),$cuenta_corriente_detalle->getid_periodo(),$cuenta_corriente_detalle->getid_usuario(),$cuenta_corriente_detalle->getid_cuenta_corriente(),$cuenta_corriente_detalle->getes_balance_inicial(),$cuenta_corriente_detalle->getes_cheque(),$cuenta_corriente_detalle->getes_deposito(),$cuenta_corriente_detalle->getes_retiro(),$cuenta_corriente_detalle->getnumero_cheque(),$cuenta_corriente_detalle->getfecha_emision(),$cuenta_corriente_detalle->getid_cliente(),$cuenta_corriente_detalle->getid_proveedor(),$cuenta_corriente_detalle->getmonto(),$cuenta_corriente_detalle->getdebito(),$cuenta_corriente_detalle->getcredito(),$cuenta_corriente_detalle->getbalance(),$cuenta_corriente_detalle->getfecha_hora(),$cuenta_corriente_detalle->getid_tabla(),$cuenta_corriente_detalle->getid_origen(),$cuenta_corriente_detalle->getdescripcion(),$cuenta_corriente_detalle->getid_estado(),$cuenta_corriente_detalle->getid_asiento(),$cuenta_corriente_detalle->getid_cuenta_pagar(),$cuenta_corriente_detalle->getid_cuenta_cobrar(),$cuenta_corriente_detalle->gettabla_origen(),$cuenta_corriente_detalle->getorigen_empresa(),$cuenta_corriente_detalle->getmotivo_anulacion(),$cuenta_corriente_detalle->getorigen_dato(),$cuenta_corriente_detalle->getcomputador_origen(), $cuenta_corriente_detalle->getId(), Funciones::GetRealScapeString($cuenta_corriente_detalle->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,cuenta_corriente_detalle $cuenta_corriente_detalle,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($cuenta_corriente_detalle->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($cuenta_corriente_detalle->getid_empresa(),$cuenta_corriente_detalle->getid_ejercicio(),$cuenta_corriente_detalle->getid_periodo(),$cuenta_corriente_detalle->getid_usuario(),$cuenta_corriente_detalle->getid_cuenta_corriente(),$cuenta_corriente_detalle->getes_balance_inicial(),$cuenta_corriente_detalle->getes_cheque(),$cuenta_corriente_detalle->getes_deposito(),$cuenta_corriente_detalle->getes_retiro(),Funciones::GetRealScapeString($cuenta_corriente_detalle->getnumero_cheque(),$connexion),Funciones::GetRealScapeString($cuenta_corriente_detalle->getfecha_emision(),$connexion),Funciones::GetNullString($cuenta_corriente_detalle->getid_cliente()),Funciones::GetNullString($cuenta_corriente_detalle->getid_proveedor()),$cuenta_corriente_detalle->getmonto(),$cuenta_corriente_detalle->getdebito(),$cuenta_corriente_detalle->getcredito(),$cuenta_corriente_detalle->getbalance(),Funciones::GetRealScapeString($cuenta_corriente_detalle->getfecha_hora(),$connexion),$cuenta_corriente_detalle->getid_tabla(),$cuenta_corriente_detalle->getid_origen(),Funciones::GetRealScapeString($cuenta_corriente_detalle->getdescripcion(),$connexion),$cuenta_corriente_detalle->getid_estado(),Funciones::GetNullString($cuenta_corriente_detalle->getid_asiento()),Funciones::GetNullString($cuenta_corriente_detalle->getid_cuenta_pagar()),Funciones::GetNullString($cuenta_corriente_detalle->getid_cuenta_cobrar()),Funciones::GetRealScapeString($cuenta_corriente_detalle->gettabla_origen(),$connexion),Funciones::GetRealScapeString($cuenta_corriente_detalle->getorigen_empresa(),$connexion),Funciones::GetRealScapeString($cuenta_corriente_detalle->getmotivo_anulacion(),$connexion),Funciones::GetRealScapeString($cuenta_corriente_detalle->getorigen_dato(),$connexion),Funciones::GetRealScapeString($cuenta_corriente_detalle->getcomputador_origen(),$connexion));
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($cuenta_corriente_detalle->getid_empresa(),$cuenta_corriente_detalle->getid_ejercicio(),$cuenta_corriente_detalle->getid_periodo(),$cuenta_corriente_detalle->getid_usuario(),$cuenta_corriente_detalle->getid_cuenta_corriente(),$cuenta_corriente_detalle->getes_balance_inicial(),$cuenta_corriente_detalle->getes_cheque(),$cuenta_corriente_detalle->getes_deposito(),$cuenta_corriente_detalle->getes_retiro(),Funciones::GetRealScapeString($cuenta_corriente_detalle->getnumero_cheque(),$connexion),Funciones::GetRealScapeString($cuenta_corriente_detalle->getfecha_emision(),$connexion),Funciones::GetNullString($cuenta_corriente_detalle->getid_cliente()),Funciones::GetNullString($cuenta_corriente_detalle->getid_proveedor()),$cuenta_corriente_detalle->getmonto(),$cuenta_corriente_detalle->getdebito(),$cuenta_corriente_detalle->getcredito(),$cuenta_corriente_detalle->getbalance(),Funciones::GetRealScapeString($cuenta_corriente_detalle->getfecha_hora(),$connexion),$cuenta_corriente_detalle->getid_tabla(),$cuenta_corriente_detalle->getid_origen(),Funciones::GetRealScapeString($cuenta_corriente_detalle->getdescripcion(),$connexion),$cuenta_corriente_detalle->getid_estado(),Funciones::GetNullString($cuenta_corriente_detalle->getid_asiento()),Funciones::GetNullString($cuenta_corriente_detalle->getid_cuenta_pagar()),Funciones::GetNullString($cuenta_corriente_detalle->getid_cuenta_cobrar()),Funciones::GetRealScapeString($cuenta_corriente_detalle->gettabla_origen(),$connexion),Funciones::GetRealScapeString($cuenta_corriente_detalle->getorigen_empresa(),$connexion),Funciones::GetRealScapeString($cuenta_corriente_detalle->getmotivo_anulacion(),$connexion),Funciones::GetRealScapeString($cuenta_corriente_detalle->getorigen_dato(),$connexion),Funciones::GetRealScapeString($cuenta_corriente_detalle->getcomputador_origen(),$connexion), $cuenta_corriente_detalle->getId(), Funciones::GetRealScapeString($cuenta_corriente_detalle->getVersionRow(),$connexion));
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
	
	public function setcuenta_corriente_detalle_Original(cuenta_corriente_detalle $cuenta_corriente_detalle) {
		$cuenta_corriente_detalle->setcuenta_corriente_detalle_Original(clone $cuenta_corriente_detalle);		
	}
	
	public function setcuenta_corriente_detalles_Original(array $cuenta_corriente_detalles) {
		foreach($cuenta_corriente_detalles as $cuenta_corriente_detalle){
			$cuenta_corriente_detalle->setcuenta_corriente_detalle_Original(clone $cuenta_corriente_detalle);
		}
	}
	
	public static function setcuenta_corriente_detalle_OriginalStatic(cuenta_corriente_detalle $cuenta_corriente_detalle) {
		$cuenta_corriente_detalle->setcuenta_corriente_detalle_Original(clone $cuenta_corriente_detalle);		
	}
	
	public static function setcuenta_corriente_detalles_OriginalStatic(array $cuenta_corriente_detalles) {		
		foreach($cuenta_corriente_detalles as $cuenta_corriente_detalle){
			$cuenta_corriente_detalle->setcuenta_corriente_detalle_Original(clone $cuenta_corriente_detalle);
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
