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
namespace com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\data;

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

use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\entity\cuenta_cobrar;

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

use com\bydan\contabilidad\facturacion\factura\business\data\factura_data;
use com\bydan\contabilidad\facturacion\factura\business\entity\factura;

use com\bydan\contabilidad\cuentascobrar\cliente\business\data\cliente_data;
use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\data\termino_pago_cliente_data;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;

use com\bydan\contabilidad\cuentascobrar\estado_cuentas_cobrar\business\data\estado_cuentas_cobrar_data;
use com\bydan\contabilidad\cuentascobrar\estado_cuentas_cobrar\business\entity\estado_cuentas_cobrar;

//REL

use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\business\data\debito_cuenta_cobrar_data;
use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\business\data\pago_cuenta_cobrar_data;
use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\business\data\credito_cuenta_cobrar_data;


class cuenta_cobrar_data extends GetEntitiesDataAccessHelper implements cuenta_cobrar_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='cc_';
	public static string $TABLE_NAME='cc_cuenta_cobrar';			
	public static string $TABLE_NAME_cuenta_cobrar='cuenta_cobrar';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_CUENTA_COBRAR_INSERT(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_CUENTA_COBRAR_UPDATE(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_CUENTA_COBRAR_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_CUENTA_COBRAR_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $cuenta_cobrar_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'cuenta_cobrar';
		
		cuenta_cobrar_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('CUENTASCOBRAR');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cuenta_cobrar_DataAccessAdditional=new cuenta_cobrarDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_empresa,id_sucursal,id_ejercicio,id_periodo,id_usuario,id_factura,id_cliente,numero,fecha_emision,fecha_vence,fecha_ultimo_movimiento,id_termino_pago_cliente,monto,saldo,porcentaje,descripcion,id_estado_cuentas_cobrar,referencia) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%d,%d,%d,%d,%s,%d,\'%s\',\'%s\',\'%s\',\'%s\',%d,%f,%f,%f,\'%s\',%d,\'%s\')';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_empresa=%d,id_sucursal=%d,id_ejercicio=%d,id_periodo=%d,id_usuario=%d,id_factura=%s,id_cliente=%d,numero=\'%s\',fecha_emision=\'%s\',fecha_vence=\'%s\',fecha_ultimo_movimiento=\'%s\',id_termino_pago_cliente=%d,monto=%f,saldo=%f,porcentaje=%f,descripcion=\'%s\',id_estado_cuentas_cobrar=%d,referencia=\'%s\' where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_sucursal,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_ejercicio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_periodo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_usuario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_factura,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cliente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_emision,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_vence,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_ultimo_movimiento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_termino_pago_cliente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.saldo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.porcentaje,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_estado_cuentas_cobrar,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.referencia from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(cuenta_cobrar $cuenta_cobrar,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($cuenta_cobrar->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=cuenta_cobrar_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($cuenta_cobrar->getId(),$connexion));				
				
			} else if ($cuenta_cobrar->getIsChanged()) {
				if($cuenta_cobrar->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=cuenta_cobrar_data::$QUERY_INSERT;
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$cuenta_cobrar->getid_empresa(),$cuenta_cobrar->getid_sucursal(),$cuenta_cobrar->getid_ejercicio(),$cuenta_cobrar->getid_periodo(),$cuenta_cobrar->getid_usuario(),Funciones::GetNullString($cuenta_cobrar->getid_factura()),$cuenta_cobrar->getid_cliente(),Funciones::GetRealScapeString($cuenta_cobrar->getnumero(),$connexion),Funciones::GetRealScapeString($cuenta_cobrar->getfecha_emision(),$connexion),Funciones::GetRealScapeString($cuenta_cobrar->getfecha_vence(),$connexion),Funciones::GetRealScapeString($cuenta_cobrar->getfecha_ultimo_movimiento(),$connexion),$cuenta_cobrar->getid_termino_pago_cliente(),$cuenta_cobrar->getmonto(),$cuenta_cobrar->getsaldo(),$cuenta_cobrar->getporcentaje(),Funciones::GetRealScapeString($cuenta_cobrar->getdescripcion(),$connexion),$cuenta_cobrar->getid_estado_cuentas_cobrar(),Funciones::GetRealScapeString($cuenta_cobrar->getreferencia(),$connexion) );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=cuenta_cobrar_data::$QUERY_UPDATE;			
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$cuenta_cobrar->getid_empresa(),$cuenta_cobrar->getid_sucursal(),$cuenta_cobrar->getid_ejercicio(),$cuenta_cobrar->getid_periodo(),$cuenta_cobrar->getid_usuario(),Funciones::GetNullString($cuenta_cobrar->getid_factura()),$cuenta_cobrar->getid_cliente(),Funciones::GetRealScapeString($cuenta_cobrar->getnumero(),$connexion),Funciones::GetRealScapeString($cuenta_cobrar->getfecha_emision(),$connexion),Funciones::GetRealScapeString($cuenta_cobrar->getfecha_vence(),$connexion),Funciones::GetRealScapeString($cuenta_cobrar->getfecha_ultimo_movimiento(),$connexion),$cuenta_cobrar->getid_termino_pago_cliente(),$cuenta_cobrar->getmonto(),$cuenta_cobrar->getsaldo(),$cuenta_cobrar->getporcentaje(),Funciones::GetRealScapeString($cuenta_cobrar->getdescripcion(),$connexion),$cuenta_cobrar->getid_estado_cuentas_cobrar(),Funciones::GetRealScapeString($cuenta_cobrar->getreferencia(),$connexion), Funciones::GetRealScapeString($cuenta_cobrar->getId(),$connexion), Funciones::GetRealScapeString($cuenta_cobrar->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($cuenta_cobrar, $connexion,$strQuerySaveComplete,cuenta_cobrar_data::$TABLE_NAME,cuenta_cobrar_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				cuenta_cobrar_data::savePrepared($cuenta_cobrar, $connexion,$strQuerySave,cuenta_cobrar_data::$TABLE_NAME,cuenta_cobrar_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			cuenta_cobrar_data::setcuenta_cobrar_OriginalStatic($cuenta_cobrar);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(cuenta_cobrar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				cuenta_cobrar_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					cuenta_cobrar_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					cuenta_cobrar_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(cuenta_cobrar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					cuenta_cobrar_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(cuenta_cobrar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					cuenta_cobrar_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(cuenta_cobrar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					cuenta_cobrar_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?cuenta_cobrar {		
		$entity = new cuenta_cobrar();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=cuenta_cobrar_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=cuenta_cobrar_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//CuentasCobrar.cuenta_cobrar.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setcuenta_cobrar_Original(new cuenta_cobrar());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cuenta_cobrar_data::$IS_WITH_SCHEMA);         	    
				/*$entity=cuenta_cobrar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setcuenta_cobrar_Original(parent::getEntityPrefijoEntityResult("",$entity->getcuenta_cobrar_Original(),$resultSet,cuenta_cobrar_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setcuenta_cobrar_Original(cuenta_cobrar_data::getEntityBaseResult("",$entity->getcuenta_cobrar_Original(),$resultSet));
				//$entity->setcuenta_cobrar_Original($this->getEntityBaseResult("",$entity->getcuenta_cobrar_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?cuenta_cobrar {
		$entity = new cuenta_cobrar();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=cuenta_cobrar_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=cuenta_cobrar_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,cuenta_cobrar_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".CuentasCobrar.cuenta_cobrar.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setcuenta_cobrar_Original(new cuenta_cobrar());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cuenta_cobrar_data::$IS_WITH_SCHEMA);         	    
				/*$entity=cuenta_cobrar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setcuenta_cobrar_Original(parent::getEntityPrefijoEntityResult("",$entity->getcuenta_cobrar_Original(),$resultSet,cuenta_cobrar_data::$IS_WITH_SCHEMA));         		
				////$entity->setcuenta_cobrar_Original(cuenta_cobrar_data::getEntityBaseResult("",$entity->getcuenta_cobrar_Original(),$resultSet));
				//$entity->setcuenta_cobrar_Original($this->getEntityBaseResult("",$entity->getcuenta_cobrar_Original(),$resultSet));
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
		$entity = new cuenta_cobrar();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=cuenta_cobrar_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=cuenta_cobrar_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,cuenta_cobrar_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new cuenta_cobrar();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cuenta_cobrar_data::$IS_WITH_SCHEMA);         		
				/*$entity=cuenta_cobrar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setcuenta_cobrar_Original( new cuenta_cobrar());
				
				//$entity->setcuenta_cobrar_Original(parent::getEntityPrefijoEntityResult("",$entity->getcuenta_cobrar_Original(),$resultSet,cuenta_cobrar_data::$IS_WITH_SCHEMA));         		
				////$entity->setcuenta_cobrar_Original(cuenta_cobrar_data::getEntityBaseResult("",$entity->getcuenta_cobrar_Original(),$resultSet));
				//$entity->setcuenta_cobrar_Original($this->getEntityBaseResult("",$entity->getcuenta_cobrar_Original(),$resultSet));
								
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
		$entity = new cuenta_cobrar();		  
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
      	    	$entity = new cuenta_cobrar();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cuenta_cobrar_data::$IS_WITH_SCHEMA);         		
				/*$entity=cuenta_cobrar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setcuenta_cobrar_Original( new cuenta_cobrar());
				
				//$entity->setcuenta_cobrar_Original(parent::getEntityPrefijoEntityResult("",$entity->getcuenta_cobrar_Original(),$resultSet,cuenta_cobrar_data::$IS_WITH_SCHEMA));         		
				////$entity->setcuenta_cobrar_Original(cuenta_cobrar_data::getEntityBaseResult("",$entity->getcuenta_cobrar_Original(),$resultSet));
				//$entity->setcuenta_cobrar_Original($this->getEntityBaseResult("",$entity->getcuenta_cobrar_Original(),$resultSet));
				
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
		$entity = new cuenta_cobrar();		  
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
      	    	$entity = new cuenta_cobrar();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cuenta_cobrar_data::$IS_WITH_SCHEMA);         		
				/*$entity=cuenta_cobrar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setcuenta_cobrar_Original( new cuenta_cobrar());				
				//$entity->setcuenta_cobrar_Original(parent::getEntityPrefijoEntityResult("",$entity->getcuenta_cobrar_Original(),$resultSet,cuenta_cobrar_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setcuenta_cobrar_Original(cuenta_cobrar_data::getEntityBaseResult("",$entity->getcuenta_cobrar_Original(),$resultSet));
				//$entity->setcuenta_cobrar_Original($this->getEntityBaseResult("",$entity->getcuenta_cobrar_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=cuenta_cobrar_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,cuenta_cobrar $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,cuenta_cobrar_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,cuenta_cobrar_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getempresa(Connexion $connexion,$relcuenta_cobrar) : ?empresa{

		$empresa= new empresa();

		try {
			$empresaDataAccess=new empresa_data();
			$empresaDataAccess->isForFKData=$this->isForFKDataRels;
			$empresa=$empresaDataAccess->getEntity($connexion,$relcuenta_cobrar->getid_empresa());

		} catch(Exception $e) {
			throw $e;
		}

		return $empresa;
	}


	public function  getsucursal(Connexion $connexion,$relcuenta_cobrar) : ?sucursal{

		$sucursal= new sucursal();

		try {
			$sucursalDataAccess=new sucursal_data();
			$sucursalDataAccess->isForFKData=$this->isForFKDataRels;
			$sucursal=$sucursalDataAccess->getEntity($connexion,$relcuenta_cobrar->getid_sucursal());

		} catch(Exception $e) {
			throw $e;
		}

		return $sucursal;
	}


	public function  getejercicio(Connexion $connexion,$relcuenta_cobrar) : ?ejercicio{

		$ejercicio= new ejercicio();

		try {
			$ejercicioDataAccess=new ejercicio_data();
			$ejercicioDataAccess->isForFKData=$this->isForFKDataRels;
			$ejercicio=$ejercicioDataAccess->getEntity($connexion,$relcuenta_cobrar->getid_ejercicio());

		} catch(Exception $e) {
			throw $e;
		}

		return $ejercicio;
	}


	public function  getperiodo(Connexion $connexion,$relcuenta_cobrar) : ?periodo{

		$periodo= new periodo();

		try {
			$periodoDataAccess=new periodo_data();
			$periodoDataAccess->isForFKData=$this->isForFKDataRels;
			$periodo=$periodoDataAccess->getEntity($connexion,$relcuenta_cobrar->getid_periodo());

		} catch(Exception $e) {
			throw $e;
		}

		return $periodo;
	}


	public function  getusuario(Connexion $connexion,$relcuenta_cobrar) : ?usuario{

		$usuario= new usuario();

		try {
			$usuarioDataAccess=new usuario_data();
			$usuarioDataAccess->isForFKData=$this->isForFKDataRels;
			$usuario=$usuarioDataAccess->getEntity($connexion,$relcuenta_cobrar->getid_usuario());

		} catch(Exception $e) {
			throw $e;
		}

		return $usuario;
	}


	public function  getfactura(Connexion $connexion,$relcuenta_cobrar) : ?factura{

		$factura= new factura();

		try {
			$facturaDataAccess=new factura_data();
			$facturaDataAccess->isForFKData=$this->isForFKDataRels;
			$factura=$facturaDataAccess->getEntity($connexion,$relcuenta_cobrar->getid_factura());

		} catch(Exception $e) {
			throw $e;
		}

		return $factura;
	}


	public function  getcliente(Connexion $connexion,$relcuenta_cobrar) : ?cliente{

		$cliente= new cliente();

		try {
			$clienteDataAccess=new cliente_data();
			$clienteDataAccess->isForFKData=$this->isForFKDataRels;
			$cliente=$clienteDataAccess->getEntity($connexion,$relcuenta_cobrar->getid_cliente());

		} catch(Exception $e) {
			throw $e;
		}

		return $cliente;
	}


	public function  gettermino_pago_cliente(Connexion $connexion,$relcuenta_cobrar) : ?termino_pago_cliente{

		$termino_pago_cliente= new termino_pago_cliente();

		try {
			$termino_pago_clienteDataAccess=new termino_pago_cliente_data();
			$termino_pago_clienteDataAccess->isForFKData=$this->isForFKDataRels;
			$termino_pago_cliente=$termino_pago_clienteDataAccess->getEntity($connexion,$relcuenta_cobrar->getid_termino_pago_cliente());

		} catch(Exception $e) {
			throw $e;
		}

		return $termino_pago_cliente;
	}


	public function  getestado_cuentas_cobrar(Connexion $connexion,$relcuenta_cobrar) : ?estado_cuentas_cobrar{

		$estado_cuentas_cobrar= new estado_cuentas_cobrar();

		try {
			$estado_cuentas_cobrarDataAccess=new estado_cuentas_cobrar_data();
			$estado_cuentas_cobrarDataAccess->isForFKData=$this->isForFKDataRels;
			$estado_cuentas_cobrar=$estado_cuentas_cobrarDataAccess->getEntity($connexion,$relcuenta_cobrar->getid_estado_cuentas_cobrar());

		} catch(Exception $e) {
			throw $e;
		}

		return $estado_cuentas_cobrar;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	public function  getdebito_cuenta_cobrars(Connexion $connexion,cuenta_cobrar $cuenta_cobrar) : array {

		$debitocuentacobrars=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.debito_cuenta_cobrar_data::$SCHEMA.".".debito_cuenta_cobrar_data::$TABLE_NAME.".id_cuenta_cobrar=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$cuenta_cobrar->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$debitocuentacobrarDataAccess=new debito_cuenta_cobrar_data();

			$debitocuentacobrars=$debitocuentacobrarDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $debitocuentacobrars;
	}


	public function  getpago_cuenta_cobrars(Connexion $connexion,cuenta_cobrar $cuenta_cobrar) : array {

		$pagocuentacobrars=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.pago_cuenta_cobrar_data::$SCHEMA.".".pago_cuenta_cobrar_data::$TABLE_NAME.".id_cuenta_cobrar=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$cuenta_cobrar->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$pagocuentacobrarDataAccess=new pago_cuenta_cobrar_data();

			$pagocuentacobrars=$pagocuentacobrarDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $pagocuentacobrars;
	}


	public function  getcredito_cuenta_cobrars(Connexion $connexion,cuenta_cobrar $cuenta_cobrar) : array {

		$creditocuentacobrars=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.credito_cuenta_cobrar_data::$SCHEMA.".".credito_cuenta_cobrar_data::$TABLE_NAME.".id_cuenta_cobrar=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$cuenta_cobrar->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$creditocuentacobrarDataAccess=new credito_cuenta_cobrar_data();

			$creditocuentacobrars=$creditocuentacobrarDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $creditocuentacobrars;
	}


	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,cuenta_cobrar $entity,$resultSet) : cuenta_cobrar {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_empresa((int)$resultSet[$strPrefijo.'id_empresa']);
				$entity->setid_sucursal((int)$resultSet[$strPrefijo.'id_sucursal']);
				$entity->setid_ejercicio((int)$resultSet[$strPrefijo.'id_ejercicio']);
				$entity->setid_periodo((int)$resultSet[$strPrefijo.'id_periodo']);
				$entity->setid_usuario((int)$resultSet[$strPrefijo.'id_usuario']);
				$entity->setid_factura((int)$resultSet[$strPrefijo.'id_factura']);
				$entity->setid_cliente((int)$resultSet[$strPrefijo.'id_cliente']);
				$entity->setnumero(utf8_encode($resultSet[$strPrefijo.'numero']));
				$entity->setfecha_emision($resultSet[$strPrefijo.'fecha_emision']);
				$entity->setfecha_vence($resultSet[$strPrefijo.'fecha_vence']);
				$entity->setfecha_ultimo_movimiento($resultSet[$strPrefijo.'fecha_ultimo_movimiento']);
				$entity->setid_termino_pago_cliente((int)$resultSet[$strPrefijo.'id_termino_pago_cliente']);
				$entity->setmonto((float)$resultSet[$strPrefijo.'monto']);
				$entity->setsaldo((float)$resultSet[$strPrefijo.'saldo']);
				$entity->setporcentaje((float)$resultSet[$strPrefijo.'porcentaje']);
				$entity->setdescripcion(utf8_encode($resultSet[$strPrefijo.'descripcion']));
				$entity->setid_estado_cuentas_cobrar((int)$resultSet[$strPrefijo.'id_estado_cuentas_cobrar']);
				$entity->setreferencia(utf8_encode($resultSet[$strPrefijo.'referencia']));
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,cuenta_cobrar $cuenta_cobrar,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $cuenta_cobrar->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiiiissssidddsis', $cuenta_cobrar->getid_empresa(),$cuenta_cobrar->getid_sucursal(),$cuenta_cobrar->getid_ejercicio(),$cuenta_cobrar->getid_periodo(),$cuenta_cobrar->getid_usuario(),$cuenta_cobrar->getid_factura(),$cuenta_cobrar->getid_cliente(),$cuenta_cobrar->getnumero(),$cuenta_cobrar->getfecha_emision(),$cuenta_cobrar->getfecha_vence(),$cuenta_cobrar->getfecha_ultimo_movimiento(),$cuenta_cobrar->getid_termino_pago_cliente(),$cuenta_cobrar->getmonto(),$cuenta_cobrar->getsaldo(),$cuenta_cobrar->getporcentaje(),$cuenta_cobrar->getdescripcion(),$cuenta_cobrar->getid_estado_cuentas_cobrar(),$cuenta_cobrar->getreferencia());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiiiissssidddsisis', $cuenta_cobrar->getid_empresa(),$cuenta_cobrar->getid_sucursal(),$cuenta_cobrar->getid_ejercicio(),$cuenta_cobrar->getid_periodo(),$cuenta_cobrar->getid_usuario(),$cuenta_cobrar->getid_factura(),$cuenta_cobrar->getid_cliente(),$cuenta_cobrar->getnumero(),$cuenta_cobrar->getfecha_emision(),$cuenta_cobrar->getfecha_vence(),$cuenta_cobrar->getfecha_ultimo_movimiento(),$cuenta_cobrar->getid_termino_pago_cliente(),$cuenta_cobrar->getmonto(),$cuenta_cobrar->getsaldo(),$cuenta_cobrar->getporcentaje(),$cuenta_cobrar->getdescripcion(),$cuenta_cobrar->getid_estado_cuentas_cobrar(),$cuenta_cobrar->getreferencia(), $cuenta_cobrar->getId(), Funciones::GetRealScapeString($cuenta_cobrar->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,cuenta_cobrar $cuenta_cobrar,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($cuenta_cobrar->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($cuenta_cobrar->getid_empresa(),$cuenta_cobrar->getid_sucursal(),$cuenta_cobrar->getid_ejercicio(),$cuenta_cobrar->getid_periodo(),$cuenta_cobrar->getid_usuario(),Funciones::GetNullString($cuenta_cobrar->getid_factura()),$cuenta_cobrar->getid_cliente(),Funciones::GetRealScapeString($cuenta_cobrar->getnumero(),$connexion),Funciones::GetRealScapeString($cuenta_cobrar->getfecha_emision(),$connexion),Funciones::GetRealScapeString($cuenta_cobrar->getfecha_vence(),$connexion),Funciones::GetRealScapeString($cuenta_cobrar->getfecha_ultimo_movimiento(),$connexion),$cuenta_cobrar->getid_termino_pago_cliente(),$cuenta_cobrar->getmonto(),$cuenta_cobrar->getsaldo(),$cuenta_cobrar->getporcentaje(),Funciones::GetRealScapeString($cuenta_cobrar->getdescripcion(),$connexion),$cuenta_cobrar->getid_estado_cuentas_cobrar(),Funciones::GetRealScapeString($cuenta_cobrar->getreferencia(),$connexion));
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($cuenta_cobrar->getid_empresa(),$cuenta_cobrar->getid_sucursal(),$cuenta_cobrar->getid_ejercicio(),$cuenta_cobrar->getid_periodo(),$cuenta_cobrar->getid_usuario(),Funciones::GetNullString($cuenta_cobrar->getid_factura()),$cuenta_cobrar->getid_cliente(),Funciones::GetRealScapeString($cuenta_cobrar->getnumero(),$connexion),Funciones::GetRealScapeString($cuenta_cobrar->getfecha_emision(),$connexion),Funciones::GetRealScapeString($cuenta_cobrar->getfecha_vence(),$connexion),Funciones::GetRealScapeString($cuenta_cobrar->getfecha_ultimo_movimiento(),$connexion),$cuenta_cobrar->getid_termino_pago_cliente(),$cuenta_cobrar->getmonto(),$cuenta_cobrar->getsaldo(),$cuenta_cobrar->getporcentaje(),Funciones::GetRealScapeString($cuenta_cobrar->getdescripcion(),$connexion),$cuenta_cobrar->getid_estado_cuentas_cobrar(),Funciones::GetRealScapeString($cuenta_cobrar->getreferencia(),$connexion), $cuenta_cobrar->getId(), Funciones::GetRealScapeString($cuenta_cobrar->getVersionRow(),$connexion));
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
	
	public function setcuenta_cobrar_Original(cuenta_cobrar $cuenta_cobrar) {
		$cuenta_cobrar->setcuenta_cobrar_Original(clone $cuenta_cobrar);		
	}
	
	public function setcuenta_cobrars_Original(array $cuenta_cobrars) {
		foreach($cuenta_cobrars as $cuenta_cobrar){
			$cuenta_cobrar->setcuenta_cobrar_Original(clone $cuenta_cobrar);
		}
	}
	
	public static function setcuenta_cobrar_OriginalStatic(cuenta_cobrar $cuenta_cobrar) {
		$cuenta_cobrar->setcuenta_cobrar_Original(clone $cuenta_cobrar);		
	}
	
	public static function setcuenta_cobrars_OriginalStatic(array $cuenta_cobrars) {		
		foreach($cuenta_cobrars as $cuenta_cobrar){
			$cuenta_cobrar->setcuenta_cobrar_Original(clone $cuenta_cobrar);
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
