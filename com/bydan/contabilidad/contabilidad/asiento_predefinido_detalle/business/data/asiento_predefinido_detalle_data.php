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
namespace com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\business\data;

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

use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\business\entity\asiento_predefinido_detalle;

//FK


use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\data\asiento_predefinido_data;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\entity\asiento_predefinido;

use com\bydan\contabilidad\contabilidad\cuenta\business\data\cuenta_data;
use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;

use com\bydan\contabilidad\contabilidad\centro_costo\business\data\centro_costo_data;
use com\bydan\contabilidad\contabilidad\centro_costo\business\entity\centro_costo;

//REL



class asiento_predefinido_detalle_data extends GetEntitiesDataAccessHelper implements asiento_predefinido_detalle_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='con_';
	public static string $TABLE_NAME='con_asiento_predefinido_detalle';			
	public static string $TABLE_NAME_asiento_predefinido_detalle='asiento_predefinido_detalle';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_ASIENTO_PREDEFINIDO_DETALLE_INSERT(??,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_ASIENTO_PREDEFINIDO_DETALLE_UPDATE(??,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_ASIENTO_PREDEFINIDO_DETALLE_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_ASIENTO_PREDEFINIDO_DETALLE_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $asiento_predefinido_detalle_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'asiento_predefinido_detalle';
		
		asiento_predefinido_detalle_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('CONTABILIDAD');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->asiento_predefinido_detalle_DataAccessAdditional=new asiento_predefinido_detalleDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_asiento_predefinido,id_cuenta,id_centro_costo,orden,cuenta_contable) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%d,%d,%d,\'%s\')';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_asiento_predefinido=%d,id_cuenta=%d,id_centro_costo=%d,orden=%d,cuenta_contable=\'%s\' where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_asiento_predefinido,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_centro_costo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.orden,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cuenta_contable from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(asiento_predefinido_detalle $asiento_predefinido_detalle,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($asiento_predefinido_detalle->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=asiento_predefinido_detalle_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($asiento_predefinido_detalle->getId(),$connexion));				
				
			} else if ($asiento_predefinido_detalle->getIsChanged()) {
				if($asiento_predefinido_detalle->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=asiento_predefinido_detalle_data::$QUERY_INSERT;
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$asiento_predefinido_detalle->getid_asiento_predefinido(),$asiento_predefinido_detalle->getid_cuenta(),$asiento_predefinido_detalle->getid_centro_costo(),$asiento_predefinido_detalle->getorden(),Funciones::GetRealScapeString($asiento_predefinido_detalle->getcuenta_contable(),$connexion) );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=asiento_predefinido_detalle_data::$QUERY_UPDATE;			
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$asiento_predefinido_detalle->getid_asiento_predefinido(),$asiento_predefinido_detalle->getid_cuenta(),$asiento_predefinido_detalle->getid_centro_costo(),$asiento_predefinido_detalle->getorden(),Funciones::GetRealScapeString($asiento_predefinido_detalle->getcuenta_contable(),$connexion), Funciones::GetRealScapeString($asiento_predefinido_detalle->getId(),$connexion), Funciones::GetRealScapeString($asiento_predefinido_detalle->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($asiento_predefinido_detalle, $connexion,$strQuerySaveComplete,asiento_predefinido_detalle_data::$TABLE_NAME,asiento_predefinido_detalle_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				asiento_predefinido_detalle_data::savePrepared($asiento_predefinido_detalle, $connexion,$strQuerySave,asiento_predefinido_detalle_data::$TABLE_NAME,asiento_predefinido_detalle_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			asiento_predefinido_detalle_data::setasiento_predefinido_detalle_OriginalStatic($asiento_predefinido_detalle);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(asiento_predefinido_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				asiento_predefinido_detalle_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					asiento_predefinido_detalle_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					asiento_predefinido_detalle_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(asiento_predefinido_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					asiento_predefinido_detalle_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(asiento_predefinido_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					asiento_predefinido_detalle_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(asiento_predefinido_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					asiento_predefinido_detalle_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?asiento_predefinido_detalle {		
		$entity = new asiento_predefinido_detalle();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=asiento_predefinido_detalle_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=asiento_predefinido_detalle_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//Contabilidad.asiento_predefinido_detalle.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setasiento_predefinido_detalle_Original(new asiento_predefinido_detalle());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,asiento_predefinido_detalle_data::$IS_WITH_SCHEMA);         	    
				/*$entity=asiento_predefinido_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setasiento_predefinido_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getasiento_predefinido_detalle_Original(),$resultSet,asiento_predefinido_detalle_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setasiento_predefinido_detalle_Original(asiento_predefinido_detalle_data::getEntityBaseResult("",$entity->getasiento_predefinido_detalle_Original(),$resultSet));
				//$entity->setasiento_predefinido_detalle_Original($this->getEntityBaseResult("",$entity->getasiento_predefinido_detalle_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?asiento_predefinido_detalle {
		$entity = new asiento_predefinido_detalle();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=asiento_predefinido_detalle_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=asiento_predefinido_detalle_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,asiento_predefinido_detalle_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".Contabilidad.asiento_predefinido_detalle.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setasiento_predefinido_detalle_Original(new asiento_predefinido_detalle());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,asiento_predefinido_detalle_data::$IS_WITH_SCHEMA);         	    
				/*$entity=asiento_predefinido_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setasiento_predefinido_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getasiento_predefinido_detalle_Original(),$resultSet,asiento_predefinido_detalle_data::$IS_WITH_SCHEMA));         		
				////$entity->setasiento_predefinido_detalle_Original(asiento_predefinido_detalle_data::getEntityBaseResult("",$entity->getasiento_predefinido_detalle_Original(),$resultSet));
				//$entity->setasiento_predefinido_detalle_Original($this->getEntityBaseResult("",$entity->getasiento_predefinido_detalle_Original(),$resultSet));
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
		$entity = new asiento_predefinido_detalle();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=asiento_predefinido_detalle_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=asiento_predefinido_detalle_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,asiento_predefinido_detalle_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new asiento_predefinido_detalle();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,asiento_predefinido_detalle_data::$IS_WITH_SCHEMA);         		
				/*$entity=asiento_predefinido_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setasiento_predefinido_detalle_Original( new asiento_predefinido_detalle());
				
				//$entity->setasiento_predefinido_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getasiento_predefinido_detalle_Original(),$resultSet,asiento_predefinido_detalle_data::$IS_WITH_SCHEMA));         		
				////$entity->setasiento_predefinido_detalle_Original(asiento_predefinido_detalle_data::getEntityBaseResult("",$entity->getasiento_predefinido_detalle_Original(),$resultSet));
				//$entity->setasiento_predefinido_detalle_Original($this->getEntityBaseResult("",$entity->getasiento_predefinido_detalle_Original(),$resultSet));
								
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
		$entity = new asiento_predefinido_detalle();		  
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
      	    	$entity = new asiento_predefinido_detalle();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,asiento_predefinido_detalle_data::$IS_WITH_SCHEMA);         		
				/*$entity=asiento_predefinido_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setasiento_predefinido_detalle_Original( new asiento_predefinido_detalle());
				
				//$entity->setasiento_predefinido_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getasiento_predefinido_detalle_Original(),$resultSet,asiento_predefinido_detalle_data::$IS_WITH_SCHEMA));         		
				////$entity->setasiento_predefinido_detalle_Original(asiento_predefinido_detalle_data::getEntityBaseResult("",$entity->getasiento_predefinido_detalle_Original(),$resultSet));
				//$entity->setasiento_predefinido_detalle_Original($this->getEntityBaseResult("",$entity->getasiento_predefinido_detalle_Original(),$resultSet));
				
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
		$entity = new asiento_predefinido_detalle();		  
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
      	    	$entity = new asiento_predefinido_detalle();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,asiento_predefinido_detalle_data::$IS_WITH_SCHEMA);         		
				/*$entity=asiento_predefinido_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setasiento_predefinido_detalle_Original( new asiento_predefinido_detalle());				
				//$entity->setasiento_predefinido_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getasiento_predefinido_detalle_Original(),$resultSet,asiento_predefinido_detalle_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setasiento_predefinido_detalle_Original(asiento_predefinido_detalle_data::getEntityBaseResult("",$entity->getasiento_predefinido_detalle_Original(),$resultSet));
				//$entity->setasiento_predefinido_detalle_Original($this->getEntityBaseResult("",$entity->getasiento_predefinido_detalle_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=asiento_predefinido_detalle_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,asiento_predefinido_detalle $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,asiento_predefinido_detalle_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,asiento_predefinido_detalle_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getasiento_predefinido(Connexion $connexion,$relasiento_predefinido_detalle) : ?asiento_predefinido{

		$asiento_predefinido= new asiento_predefinido();

		try {
			$asiento_predefinidoDataAccess=new asiento_predefinido_data();
			$asiento_predefinidoDataAccess->isForFKData=$this->isForFKDataRels;
			$asiento_predefinido=$asiento_predefinidoDataAccess->getEntity($connexion,$relasiento_predefinido_detalle->getid_asiento_predefinido());

		} catch(Exception $e) {
			throw $e;
		}

		return $asiento_predefinido;
	}


	public function  getcuenta(Connexion $connexion,$relasiento_predefinido_detalle) : ?cuenta{

		$cuenta= new cuenta();

		try {
			$cuentaDataAccess=new cuenta_data();
			$cuentaDataAccess->isForFKData=$this->isForFKDataRels;
			$cuenta=$cuentaDataAccess->getEntity($connexion,$relasiento_predefinido_detalle->getid_cuenta());

		} catch(Exception $e) {
			throw $e;
		}

		return $cuenta;
	}


	public function  getcentro_costo(Connexion $connexion,$relasiento_predefinido_detalle) : ?centro_costo{

		$centro_costo= new centro_costo();

		try {
			$centro_costoDataAccess=new centro_costo_data();
			$centro_costoDataAccess->isForFKData=$this->isForFKDataRels;
			$centro_costo=$centro_costoDataAccess->getEntity($connexion,$relasiento_predefinido_detalle->getid_centro_costo());

		} catch(Exception $e) {
			throw $e;
		}

		return $centro_costo;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,asiento_predefinido_detalle $entity,$resultSet) : asiento_predefinido_detalle {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_asiento_predefinido((int)$resultSet[$strPrefijo.'id_asiento_predefinido']);
				$entity->setid_cuenta((int)$resultSet[$strPrefijo.'id_cuenta']);
				$entity->setid_centro_costo((int)$resultSet[$strPrefijo.'id_centro_costo']);
				$entity->setorden((int)$resultSet[$strPrefijo.'orden']);
				$entity->setcuenta_contable(utf8_encode($resultSet[$strPrefijo.'cuenta_contable']));
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,asiento_predefinido_detalle $asiento_predefinido_detalle,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $asiento_predefinido_detalle->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiis', $asiento_predefinido_detalle->getid_asiento_predefinido(),$asiento_predefinido_detalle->getid_cuenta(),$asiento_predefinido_detalle->getid_centro_costo(),$asiento_predefinido_detalle->getorden(),$asiento_predefinido_detalle->getcuenta_contable());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiisis', $asiento_predefinido_detalle->getid_asiento_predefinido(),$asiento_predefinido_detalle->getid_cuenta(),$asiento_predefinido_detalle->getid_centro_costo(),$asiento_predefinido_detalle->getorden(),$asiento_predefinido_detalle->getcuenta_contable(), $asiento_predefinido_detalle->getId(), Funciones::GetRealScapeString($asiento_predefinido_detalle->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,asiento_predefinido_detalle $asiento_predefinido_detalle,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($asiento_predefinido_detalle->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($asiento_predefinido_detalle->getid_asiento_predefinido(),$asiento_predefinido_detalle->getid_cuenta(),$asiento_predefinido_detalle->getid_centro_costo(),$asiento_predefinido_detalle->getorden(),Funciones::GetRealScapeString($asiento_predefinido_detalle->getcuenta_contable(),$connexion));
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($asiento_predefinido_detalle->getid_asiento_predefinido(),$asiento_predefinido_detalle->getid_cuenta(),$asiento_predefinido_detalle->getid_centro_costo(),$asiento_predefinido_detalle->getorden(),Funciones::GetRealScapeString($asiento_predefinido_detalle->getcuenta_contable(),$connexion), $asiento_predefinido_detalle->getId(), Funciones::GetRealScapeString($asiento_predefinido_detalle->getVersionRow(),$connexion));
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
	
	public function setasiento_predefinido_detalle_Original(asiento_predefinido_detalle $asiento_predefinido_detalle) {
		$asiento_predefinido_detalle->setasiento_predefinido_detalle_Original(clone $asiento_predefinido_detalle);		
	}
	
	public function setasiento_predefinido_detalles_Original(array $asiento_predefinido_detalles) {
		foreach($asiento_predefinido_detalles as $asiento_predefinido_detalle){
			$asiento_predefinido_detalle->setasiento_predefinido_detalle_Original(clone $asiento_predefinido_detalle);
		}
	}
	
	public static function setasiento_predefinido_detalle_OriginalStatic(asiento_predefinido_detalle $asiento_predefinido_detalle) {
		$asiento_predefinido_detalle->setasiento_predefinido_detalle_Original(clone $asiento_predefinido_detalle);		
	}
	
	public static function setasiento_predefinido_detalles_OriginalStatic(array $asiento_predefinido_detalles) {		
		foreach($asiento_predefinido_detalles as $asiento_predefinido_detalle){
			$asiento_predefinido_detalle->setasiento_predefinido_detalle_Original(clone $asiento_predefinido_detalle);
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
