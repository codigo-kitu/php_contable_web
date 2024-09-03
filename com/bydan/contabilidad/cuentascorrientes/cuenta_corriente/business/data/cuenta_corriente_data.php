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
namespace com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\data;

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

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity\cuenta_corriente;

//FK


use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\entity\empresa;

use com\bydan\contabilidad\seguridad\usuario\business\data\usuario_data;
use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;

use com\bydan\contabilidad\cuentascorrientes\banco\business\data\banco_data;
use com\bydan\contabilidad\cuentascorrientes\banco\business\entity\banco;

use com\bydan\contabilidad\contabilidad\cuenta\business\data\cuenta_data;
use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;

use com\bydan\contabilidad\cuentascorrientes\estado_cuentas_corrientes\business\data\estado_cuentas_corrientes_data;
use com\bydan\contabilidad\cuentascorrientes\estado_cuentas_corrientes\business\entity\estado_cuentas_corrientes;

//REL

use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\business\data\cheque_cuenta_corriente_data;
use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\business\data\retiro_cuenta_corriente_data;
use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\business\data\deposito_cuenta_corriente_data;


class cuenta_corriente_data extends GetEntitiesDataAccessHelper implements cuenta_corriente_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='cco_';
	public static string $TABLE_NAME='cco_cuenta_corriente';			
	public static string $TABLE_NAME_cuenta_corriente='cuenta_corriente';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_CUENTA_CORRIENTE_INSERT(??,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_CUENTA_CORRIENTE_UPDATE(??,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_CUENTA_CORRIENTE_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_CUENTA_CORRIENTE_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $cuenta_corriente_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'cuenta_corriente';
		
		cuenta_corriente_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('CUENTASCORRIENTES');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cuenta_corriente_DataAccessAdditional=new cuenta_corrienteDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_empresa,id_usuario,id_banco,numero_cuenta,balance_inicial,saldo,contador_cheque,id_cuenta,descripcion,icono,id_estado_cuentas_corrientes) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%d,%d,\'%s\',%f,%f,%d,%s,\'%s\',\'%s\',%s)';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_empresa=%d,id_usuario=%d,id_banco=%d,numero_cuenta=\'%s\',balance_inicial=%f,saldo=%f,contador_cheque=%d,id_cuenta=%s,descripcion=\'%s\',icono=\'%s\',id_estado_cuentas_corrientes=%s where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_usuario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_banco,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_cuenta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.balance_inicial,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.saldo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.contador_cheque,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.icono,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_estado_cuentas_corrientes from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(cuenta_corriente $cuenta_corriente,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($cuenta_corriente->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=cuenta_corriente_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($cuenta_corriente->getId(),$connexion));				
				
			} else if ($cuenta_corriente->getIsChanged()) {
				if($cuenta_corriente->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=cuenta_corriente_data::$QUERY_INSERT;
					
					
					
					

					//$id_cuenta='null';
					//if($cuenta_corriente->getid_cuenta()!==null && $cuenta_corriente->getid_cuenta()>=0) {
						//$id_cuenta=$cuenta_corriente->getid_cuenta();
					//} else {
						//$id_cuenta='null';
					//}

					//$id_estado_cuentas_corrientes='null';
					//if($cuenta_corriente->getid_estado_cuentas_corrientes()!==null && $cuenta_corriente->getid_estado_cuentas_corrientes()>=0) {
						//$id_estado_cuentas_corrientes=$cuenta_corriente->getid_estado_cuentas_corrientes();
					//} else {
						//$id_estado_cuentas_corrientes='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$cuenta_corriente->getid_empresa(),$cuenta_corriente->getid_usuario(),$cuenta_corriente->getid_banco(),Funciones::GetRealScapeString($cuenta_corriente->getnumero_cuenta(),$connexion),$cuenta_corriente->getbalance_inicial(),$cuenta_corriente->getsaldo(),$cuenta_corriente->getcontador_cheque(),Funciones::GetNullString($cuenta_corriente->getid_cuenta()),Funciones::GetRealScapeString($cuenta_corriente->getdescripcion(),$connexion),Funciones::GetRealScapeString($cuenta_corriente->geticono(),$connexion),$cuenta_corriente->getid_estado_cuentas_corrientes() );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=cuenta_corriente_data::$QUERY_UPDATE;			
					
					
					
					

					//$id_cuenta='null';
					//if($cuenta_corriente->getid_cuenta()!==null && $cuenta_corriente->getid_cuenta()>=0) {
						//$id_cuenta=$cuenta_corriente->getid_cuenta();
					//} else {
						//$id_cuenta='null';
					//}

					//$id_estado_cuentas_corrientes='null';
					//if($cuenta_corriente->getid_estado_cuentas_corrientes()!==null && $cuenta_corriente->getid_estado_cuentas_corrientes()>=0) {
						//$id_estado_cuentas_corrientes=$cuenta_corriente->getid_estado_cuentas_corrientes();
					//} else {
						//$id_estado_cuentas_corrientes='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$cuenta_corriente->getid_empresa(),$cuenta_corriente->getid_usuario(),$cuenta_corriente->getid_banco(),Funciones::GetRealScapeString($cuenta_corriente->getnumero_cuenta(),$connexion),$cuenta_corriente->getbalance_inicial(),$cuenta_corriente->getsaldo(),$cuenta_corriente->getcontador_cheque(),Funciones::GetNullString($cuenta_corriente->getid_cuenta()),Funciones::GetRealScapeString($cuenta_corriente->getdescripcion(),$connexion),Funciones::GetRealScapeString($cuenta_corriente->geticono(),$connexion),$cuenta_corriente->getid_estado_cuentas_corrientes(), Funciones::GetRealScapeString($cuenta_corriente->getId(),$connexion), Funciones::GetRealScapeString($cuenta_corriente->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($cuenta_corriente, $connexion,$strQuerySaveComplete,cuenta_corriente_data::$TABLE_NAME,cuenta_corriente_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				cuenta_corriente_data::savePrepared($cuenta_corriente, $connexion,$strQuerySave,cuenta_corriente_data::$TABLE_NAME,cuenta_corriente_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			cuenta_corriente_data::setcuenta_corriente_OriginalStatic($cuenta_corriente);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(cuenta_corriente $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				cuenta_corriente_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					cuenta_corriente_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					cuenta_corriente_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(cuenta_corriente $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					cuenta_corriente_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(cuenta_corriente $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					cuenta_corriente_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(cuenta_corriente $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					cuenta_corriente_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?cuenta_corriente {		
		$entity = new cuenta_corriente();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=cuenta_corriente_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=cuenta_corriente_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//CuentasCorrientes.cuenta_corriente.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setcuenta_corriente_Original(new cuenta_corriente());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cuenta_corriente_data::$IS_WITH_SCHEMA);         	    
				/*$entity=cuenta_corriente_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setcuenta_corriente_Original(parent::getEntityPrefijoEntityResult("",$entity->getcuenta_corriente_Original(),$resultSet,cuenta_corriente_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setcuenta_corriente_Original(cuenta_corriente_data::getEntityBaseResult("",$entity->getcuenta_corriente_Original(),$resultSet));
				//$entity->setcuenta_corriente_Original($this->getEntityBaseResult("",$entity->getcuenta_corriente_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?cuenta_corriente {
		$entity = new cuenta_corriente();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=cuenta_corriente_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=cuenta_corriente_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,cuenta_corriente_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".CuentasCorrientes.cuenta_corriente.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setcuenta_corriente_Original(new cuenta_corriente());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cuenta_corriente_data::$IS_WITH_SCHEMA);         	    
				/*$entity=cuenta_corriente_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setcuenta_corriente_Original(parent::getEntityPrefijoEntityResult("",$entity->getcuenta_corriente_Original(),$resultSet,cuenta_corriente_data::$IS_WITH_SCHEMA));         		
				////$entity->setcuenta_corriente_Original(cuenta_corriente_data::getEntityBaseResult("",$entity->getcuenta_corriente_Original(),$resultSet));
				//$entity->setcuenta_corriente_Original($this->getEntityBaseResult("",$entity->getcuenta_corriente_Original(),$resultSet));
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
		$entity = new cuenta_corriente();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=cuenta_corriente_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=cuenta_corriente_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,cuenta_corriente_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new cuenta_corriente();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cuenta_corriente_data::$IS_WITH_SCHEMA);         		
				/*$entity=cuenta_corriente_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setcuenta_corriente_Original( new cuenta_corriente());
				
				//$entity->setcuenta_corriente_Original(parent::getEntityPrefijoEntityResult("",$entity->getcuenta_corriente_Original(),$resultSet,cuenta_corriente_data::$IS_WITH_SCHEMA));         		
				////$entity->setcuenta_corriente_Original(cuenta_corriente_data::getEntityBaseResult("",$entity->getcuenta_corriente_Original(),$resultSet));
				//$entity->setcuenta_corriente_Original($this->getEntityBaseResult("",$entity->getcuenta_corriente_Original(),$resultSet));
								
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
		$entity = new cuenta_corriente();		  
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
      	    	$entity = new cuenta_corriente();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cuenta_corriente_data::$IS_WITH_SCHEMA);         		
				/*$entity=cuenta_corriente_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setcuenta_corriente_Original( new cuenta_corriente());
				
				//$entity->setcuenta_corriente_Original(parent::getEntityPrefijoEntityResult("",$entity->getcuenta_corriente_Original(),$resultSet,cuenta_corriente_data::$IS_WITH_SCHEMA));         		
				////$entity->setcuenta_corriente_Original(cuenta_corriente_data::getEntityBaseResult("",$entity->getcuenta_corriente_Original(),$resultSet));
				//$entity->setcuenta_corriente_Original($this->getEntityBaseResult("",$entity->getcuenta_corriente_Original(),$resultSet));
				
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
		$entity = new cuenta_corriente();		  
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
      	    	$entity = new cuenta_corriente();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cuenta_corriente_data::$IS_WITH_SCHEMA);         		
				/*$entity=cuenta_corriente_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setcuenta_corriente_Original( new cuenta_corriente());				
				//$entity->setcuenta_corriente_Original(parent::getEntityPrefijoEntityResult("",$entity->getcuenta_corriente_Original(),$resultSet,cuenta_corriente_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setcuenta_corriente_Original(cuenta_corriente_data::getEntityBaseResult("",$entity->getcuenta_corriente_Original(),$resultSet));
				//$entity->setcuenta_corriente_Original($this->getEntityBaseResult("",$entity->getcuenta_corriente_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=cuenta_corriente_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,cuenta_corriente $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,cuenta_corriente_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,cuenta_corriente_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getempresa(Connexion $connexion,$relcuenta_corriente) : ?empresa{

		$empresa= new empresa();

		try {
			$empresaDataAccess=new empresa_data();
			$empresaDataAccess->isForFKData=$this->isForFKDataRels;
			$empresa=$empresaDataAccess->getEntity($connexion,$relcuenta_corriente->getid_empresa());

		} catch(Exception $e) {
			throw $e;
		}

		return $empresa;
	}


	public function  getusuario(Connexion $connexion,$relcuenta_corriente) : ?usuario{

		$usuario= new usuario();

		try {
			$usuarioDataAccess=new usuario_data();
			$usuarioDataAccess->isForFKData=$this->isForFKDataRels;
			$usuario=$usuarioDataAccess->getEntity($connexion,$relcuenta_corriente->getid_usuario());

		} catch(Exception $e) {
			throw $e;
		}

		return $usuario;
	}


	public function  getbanco(Connexion $connexion,$relcuenta_corriente) : ?banco{

		$banco= new banco();

		try {
			$bancoDataAccess=new banco_data();
			$bancoDataAccess->isForFKData=$this->isForFKDataRels;
			$banco=$bancoDataAccess->getEntity($connexion,$relcuenta_corriente->getid_banco());

		} catch(Exception $e) {
			throw $e;
		}

		return $banco;
	}


	public function  getcuenta(Connexion $connexion,$relcuenta_corriente) : ?cuenta{

		$cuenta= new cuenta();

		try {
			$cuentaDataAccess=new cuenta_data();
			$cuentaDataAccess->isForFKData=$this->isForFKDataRels;
			$cuenta=$cuentaDataAccess->getEntity($connexion,$relcuenta_corriente->getid_cuenta());

		} catch(Exception $e) {
			throw $e;
		}

		return $cuenta;
	}


	public function  getestado_cuentas_corrientes(Connexion $connexion,$relcuenta_corriente) : ?estado_cuentas_corrientes{

		$estado_cuentas_corrientes= new estado_cuentas_corrientes();

		try {
			$estado_cuentas_corrientesDataAccess=new estado_cuentas_corrientes_data();
			$estado_cuentas_corrientesDataAccess->isForFKData=$this->isForFKDataRels;
			$estado_cuentas_corrientes=$estado_cuentas_corrientesDataAccess->getEntity($connexion,$relcuenta_corriente->getid_estado_cuentas_corrientes());

		} catch(Exception $e) {
			throw $e;
		}

		return $estado_cuentas_corrientes;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	public function  getcheque_cuenta_corrientes(Connexion $connexion,cuenta_corriente $cuenta_corriente) : array {

		$chequecuentacorrientes=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.cheque_cuenta_corriente_data::$SCHEMA.".".cheque_cuenta_corriente_data::$TABLE_NAME.".id_cuenta_corriente=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$cuenta_corriente->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$chequecuentacorrienteDataAccess=new cheque_cuenta_corriente_data();

			$chequecuentacorrientes=$chequecuentacorrienteDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $chequecuentacorrientes;
	}


	public function  getretiro_cuenta_corrientes(Connexion $connexion,cuenta_corriente $cuenta_corriente) : array {

		$retirocuentacorrientes=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.retiro_cuenta_corriente_data::$SCHEMA.".".retiro_cuenta_corriente_data::$TABLE_NAME.".id_cuenta_corriente=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$cuenta_corriente->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$retirocuentacorrienteDataAccess=new retiro_cuenta_corriente_data();

			$retirocuentacorrientes=$retirocuentacorrienteDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $retirocuentacorrientes;
	}


	public function  getdeposito_cuenta_corrientes(Connexion $connexion,cuenta_corriente $cuenta_corriente) : array {

		$depositocuentacorrientes=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.deposito_cuenta_corriente_data::$SCHEMA.".".deposito_cuenta_corriente_data::$TABLE_NAME.".id_cuenta_corriente=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$cuenta_corriente->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$depositocuentacorrienteDataAccess=new deposito_cuenta_corriente_data();

			$depositocuentacorrientes=$depositocuentacorrienteDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $depositocuentacorrientes;
	}


	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,cuenta_corriente $entity,$resultSet) : cuenta_corriente {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_empresa((int)$resultSet[$strPrefijo.'id_empresa']);
				$entity->setid_usuario((int)$resultSet[$strPrefijo.'id_usuario']);
				$entity->setid_banco((int)$resultSet[$strPrefijo.'id_banco']);
				$entity->setnumero_cuenta(utf8_encode($resultSet[$strPrefijo.'numero_cuenta']));
				$entity->setbalance_inicial((float)$resultSet[$strPrefijo.'balance_inicial']);
				$entity->setsaldo((float)$resultSet[$strPrefijo.'saldo']);
				$entity->setcontador_cheque((int)$resultSet[$strPrefijo.'contador_cheque']);
				$entity->setid_cuenta((int)$resultSet[$strPrefijo.'id_cuenta']);
				$entity->setdescripcion(utf8_encode($resultSet[$strPrefijo.'descripcion']));
				$entity->seticono(utf8_encode($resultSet[$strPrefijo.'icono']));
				$entity->setid_estado_cuentas_corrientes((int)$resultSet[$strPrefijo.'id_estado_cuentas_corrientes']);
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,cuenta_corriente $cuenta_corriente,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $cuenta_corriente->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iiisddiissi', $cuenta_corriente->getid_empresa(),$cuenta_corriente->getid_usuario(),$cuenta_corriente->getid_banco(),$cuenta_corriente->getnumero_cuenta(),$cuenta_corriente->getbalance_inicial(),$cuenta_corriente->getsaldo(),$cuenta_corriente->getcontador_cheque(),$cuenta_corriente->getid_cuenta(),$cuenta_corriente->getdescripcion(),$cuenta_corriente->geticono(),$cuenta_corriente->getid_estado_cuentas_corrientes());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iiisddiissiis', $cuenta_corriente->getid_empresa(),$cuenta_corriente->getid_usuario(),$cuenta_corriente->getid_banco(),$cuenta_corriente->getnumero_cuenta(),$cuenta_corriente->getbalance_inicial(),$cuenta_corriente->getsaldo(),$cuenta_corriente->getcontador_cheque(),$cuenta_corriente->getid_cuenta(),$cuenta_corriente->getdescripcion(),$cuenta_corriente->geticono(),$cuenta_corriente->getid_estado_cuentas_corrientes(), $cuenta_corriente->getId(), Funciones::GetRealScapeString($cuenta_corriente->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,cuenta_corriente $cuenta_corriente,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($cuenta_corriente->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($cuenta_corriente->getid_empresa(),$cuenta_corriente->getid_usuario(),$cuenta_corriente->getid_banco(),Funciones::GetRealScapeString($cuenta_corriente->getnumero_cuenta(),$connexion),$cuenta_corriente->getbalance_inicial(),$cuenta_corriente->getsaldo(),$cuenta_corriente->getcontador_cheque(),Funciones::GetNullString($cuenta_corriente->getid_cuenta()),Funciones::GetRealScapeString($cuenta_corriente->getdescripcion(),$connexion),Funciones::GetRealScapeString($cuenta_corriente->geticono(),$connexion),$cuenta_corriente->getid_estado_cuentas_corrientes());
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($cuenta_corriente->getid_empresa(),$cuenta_corriente->getid_usuario(),$cuenta_corriente->getid_banco(),Funciones::GetRealScapeString($cuenta_corriente->getnumero_cuenta(),$connexion),$cuenta_corriente->getbalance_inicial(),$cuenta_corriente->getsaldo(),$cuenta_corriente->getcontador_cheque(),Funciones::GetNullString($cuenta_corriente->getid_cuenta()),Funciones::GetRealScapeString($cuenta_corriente->getdescripcion(),$connexion),Funciones::GetRealScapeString($cuenta_corriente->geticono(),$connexion),$cuenta_corriente->getid_estado_cuentas_corrientes(), $cuenta_corriente->getId(), Funciones::GetRealScapeString($cuenta_corriente->getVersionRow(),$connexion));
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
	
	public function setcuenta_corriente_Original(cuenta_corriente $cuenta_corriente) {
		$cuenta_corriente->setcuenta_corriente_Original(clone $cuenta_corriente);		
	}
	
	public function setcuenta_corrientes_Original(array $cuenta_corrientes) {
		foreach($cuenta_corrientes as $cuenta_corriente){
			$cuenta_corriente->setcuenta_corriente_Original(clone $cuenta_corriente);
		}
	}
	
	public static function setcuenta_corriente_OriginalStatic(cuenta_corriente $cuenta_corriente) {
		$cuenta_corriente->setcuenta_corriente_Original(clone $cuenta_corriente);		
	}
	
	public static function setcuenta_corrientes_OriginalStatic(array $cuenta_corrientes) {		
		foreach($cuenta_corrientes as $cuenta_corriente){
			$cuenta_corriente->setcuenta_corriente_Original(clone $cuenta_corriente);
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
