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
namespace com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\business\data;

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

use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\business\entity\tipo_cuenta_predefinida;

//FK


//REL

use com\bydan\contabilidad\contabilidad\cuenta_predefinida\business\data\cuenta_predefinida_data;


class tipo_cuenta_predefinida_data extends GetEntitiesDataAccessHelper implements tipo_cuenta_predefinida_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='con_';
	public static string $TABLE_NAME='con_tipo_cuenta_predefinida';			
	public static string $TABLE_NAME_tipo_cuenta_predefinida='tipo_cuenta_predefinida';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_TIPO_CUENTA_PREDEFINIDA_INSERT(??,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_TIPO_CUENTA_PREDEFINIDA_UPDATE(??,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_TIPO_CUENTA_PREDEFINIDA_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_TIPO_CUENTA_PREDEFINIDA_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $tipo_cuenta_predefinida_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'tipo_cuenta_predefinida';
		
		tipo_cuenta_predefinida_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('CONTABILIDAD');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->tipo_cuenta_predefinida_DataAccessAdditional=new tipo_cuenta_predefinidaDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,codigo,nombre,descripcion) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,\'%s\',\'%s\',\'%s\')';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,codigo=\'%s\',nombre=\'%s\',descripcion=\'%s\' where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(tipo_cuenta_predefinida $tipo_cuenta_predefinida,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($tipo_cuenta_predefinida->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=tipo_cuenta_predefinida_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($tipo_cuenta_predefinida->getId(),$connexion));				
				
			} else if ($tipo_cuenta_predefinida->getIsChanged()) {
				if($tipo_cuenta_predefinida->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=tipo_cuenta_predefinida_data::$QUERY_INSERT;
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($tipo_cuenta_predefinida->getcodigo(),$connexion),Funciones::GetRealScapeString($tipo_cuenta_predefinida->getnombre(),$connexion),Funciones::GetRealScapeString($tipo_cuenta_predefinida->getdescripcion(),$connexion) );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=tipo_cuenta_predefinida_data::$QUERY_UPDATE;			
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($tipo_cuenta_predefinida->getcodigo(),$connexion),Funciones::GetRealScapeString($tipo_cuenta_predefinida->getnombre(),$connexion),Funciones::GetRealScapeString($tipo_cuenta_predefinida->getdescripcion(),$connexion), Funciones::GetRealScapeString($tipo_cuenta_predefinida->getId(),$connexion), Funciones::GetRealScapeString($tipo_cuenta_predefinida->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($tipo_cuenta_predefinida, $connexion,$strQuerySaveComplete,tipo_cuenta_predefinida_data::$TABLE_NAME,tipo_cuenta_predefinida_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				tipo_cuenta_predefinida_data::savePrepared($tipo_cuenta_predefinida, $connexion,$strQuerySave,tipo_cuenta_predefinida_data::$TABLE_NAME,tipo_cuenta_predefinida_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			tipo_cuenta_predefinida_data::settipo_cuenta_predefinida_OriginalStatic($tipo_cuenta_predefinida);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(tipo_cuenta_predefinida $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				tipo_cuenta_predefinida_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					tipo_cuenta_predefinida_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					tipo_cuenta_predefinida_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(tipo_cuenta_predefinida $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					tipo_cuenta_predefinida_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(tipo_cuenta_predefinida $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					tipo_cuenta_predefinida_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(tipo_cuenta_predefinida $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					tipo_cuenta_predefinida_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?tipo_cuenta_predefinida {		
		$entity = new tipo_cuenta_predefinida();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=tipo_cuenta_predefinida_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=tipo_cuenta_predefinida_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//Contabilidad.tipo_cuenta_predefinida.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->settipo_cuenta_predefinida_Original(new tipo_cuenta_predefinida());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,tipo_cuenta_predefinida_data::$IS_WITH_SCHEMA);         	    
				/*$entity=tipo_cuenta_predefinida_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->settipo_cuenta_predefinida_Original(parent::getEntityPrefijoEntityResult("",$entity->gettipo_cuenta_predefinida_Original(),$resultSet,tipo_cuenta_predefinida_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->settipo_cuenta_predefinida_Original(tipo_cuenta_predefinida_data::getEntityBaseResult("",$entity->gettipo_cuenta_predefinida_Original(),$resultSet));
				//$entity->settipo_cuenta_predefinida_Original($this->getEntityBaseResult("",$entity->gettipo_cuenta_predefinida_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?tipo_cuenta_predefinida {
		$entity = new tipo_cuenta_predefinida();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=tipo_cuenta_predefinida_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=tipo_cuenta_predefinida_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,tipo_cuenta_predefinida_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".Contabilidad.tipo_cuenta_predefinida.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->settipo_cuenta_predefinida_Original(new tipo_cuenta_predefinida());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,tipo_cuenta_predefinida_data::$IS_WITH_SCHEMA);         	    
				/*$entity=tipo_cuenta_predefinida_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->settipo_cuenta_predefinida_Original(parent::getEntityPrefijoEntityResult("",$entity->gettipo_cuenta_predefinida_Original(),$resultSet,tipo_cuenta_predefinida_data::$IS_WITH_SCHEMA));         		
				////$entity->settipo_cuenta_predefinida_Original(tipo_cuenta_predefinida_data::getEntityBaseResult("",$entity->gettipo_cuenta_predefinida_Original(),$resultSet));
				//$entity->settipo_cuenta_predefinida_Original($this->getEntityBaseResult("",$entity->gettipo_cuenta_predefinida_Original(),$resultSet));
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
		$entity = new tipo_cuenta_predefinida();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=tipo_cuenta_predefinida_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=tipo_cuenta_predefinida_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,tipo_cuenta_predefinida_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new tipo_cuenta_predefinida();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,tipo_cuenta_predefinida_data::$IS_WITH_SCHEMA);         		
				/*$entity=tipo_cuenta_predefinida_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->settipo_cuenta_predefinida_Original( new tipo_cuenta_predefinida());
				
				//$entity->settipo_cuenta_predefinida_Original(parent::getEntityPrefijoEntityResult("",$entity->gettipo_cuenta_predefinida_Original(),$resultSet,tipo_cuenta_predefinida_data::$IS_WITH_SCHEMA));         		
				////$entity->settipo_cuenta_predefinida_Original(tipo_cuenta_predefinida_data::getEntityBaseResult("",$entity->gettipo_cuenta_predefinida_Original(),$resultSet));
				//$entity->settipo_cuenta_predefinida_Original($this->getEntityBaseResult("",$entity->gettipo_cuenta_predefinida_Original(),$resultSet));
								
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
		$entity = new tipo_cuenta_predefinida();		  
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
      	    	$entity = new tipo_cuenta_predefinida();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,tipo_cuenta_predefinida_data::$IS_WITH_SCHEMA);         		
				/*$entity=tipo_cuenta_predefinida_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->settipo_cuenta_predefinida_Original( new tipo_cuenta_predefinida());
				
				//$entity->settipo_cuenta_predefinida_Original(parent::getEntityPrefijoEntityResult("",$entity->gettipo_cuenta_predefinida_Original(),$resultSet,tipo_cuenta_predefinida_data::$IS_WITH_SCHEMA));         		
				////$entity->settipo_cuenta_predefinida_Original(tipo_cuenta_predefinida_data::getEntityBaseResult("",$entity->gettipo_cuenta_predefinida_Original(),$resultSet));
				//$entity->settipo_cuenta_predefinida_Original($this->getEntityBaseResult("",$entity->gettipo_cuenta_predefinida_Original(),$resultSet));
				
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
		$entity = new tipo_cuenta_predefinida();		  
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
      	    	$entity = new tipo_cuenta_predefinida();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,tipo_cuenta_predefinida_data::$IS_WITH_SCHEMA);         		
				/*$entity=tipo_cuenta_predefinida_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->settipo_cuenta_predefinida_Original( new tipo_cuenta_predefinida());				
				//$entity->settipo_cuenta_predefinida_Original(parent::getEntityPrefijoEntityResult("",$entity->gettipo_cuenta_predefinida_Original(),$resultSet,tipo_cuenta_predefinida_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->settipo_cuenta_predefinida_Original(tipo_cuenta_predefinida_data::getEntityBaseResult("",$entity->gettipo_cuenta_predefinida_Original(),$resultSet));
				//$entity->settipo_cuenta_predefinida_Original($this->getEntityBaseResult("",$entity->gettipo_cuenta_predefinida_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=tipo_cuenta_predefinida_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,tipo_cuenta_predefinida $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,tipo_cuenta_predefinida_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,tipo_cuenta_predefinida_data::$QUERY_SELECT_COUNT);
				
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
	
	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	public function  getcuenta_predefinidas(Connexion $connexion,tipo_cuenta_predefinida $tipo_cuenta_predefinida) : array {

		$cuentapredefinidas=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.cuenta_predefinida_data::$SCHEMA.".".cuenta_predefinida_data::$TABLE_NAME.".id_tipo_cuenta_predefinida=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$tipo_cuenta_predefinida->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$cuentapredefinidaDataAccess=new cuenta_predefinida_data();

			$cuentapredefinidas=$cuentapredefinidaDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $cuentapredefinidas;
	}


	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,tipo_cuenta_predefinida $entity,$resultSet) : tipo_cuenta_predefinida {
        try {     	
			if(!$this->isForFKData) {
				$entity->setcodigo(utf8_encode($resultSet[$strPrefijo.'codigo']));
				$entity->setnombre(utf8_encode($resultSet[$strPrefijo.'nombre']));
				$entity->setdescripcion(utf8_encode($resultSet[$strPrefijo.'descripcion']));
			} else {
				$entity->setnombre(utf8_encode($resultSet[$strPrefijo.'nombre']));								
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,tipo_cuenta_predefinida $tipo_cuenta_predefinida,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $tipo_cuenta_predefinida->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'sss', $tipo_cuenta_predefinida->getcodigo(),$tipo_cuenta_predefinida->getnombre(),$tipo_cuenta_predefinida->getdescripcion());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'sssis', $tipo_cuenta_predefinida->getcodigo(),$tipo_cuenta_predefinida->getnombre(),$tipo_cuenta_predefinida->getdescripcion(), $tipo_cuenta_predefinida->getId(), Funciones::GetRealScapeString($tipo_cuenta_predefinida->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,tipo_cuenta_predefinida $tipo_cuenta_predefinida,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($tipo_cuenta_predefinida->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array(Funciones::GetRealScapeString($tipo_cuenta_predefinida->getcodigo(),$connexion),Funciones::GetRealScapeString($tipo_cuenta_predefinida->getnombre(),$connexion),Funciones::GetRealScapeString($tipo_cuenta_predefinida->getdescripcion(),$connexion));
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array(Funciones::GetRealScapeString($tipo_cuenta_predefinida->getcodigo(),$connexion),Funciones::GetRealScapeString($tipo_cuenta_predefinida->getnombre(),$connexion),Funciones::GetRealScapeString($tipo_cuenta_predefinida->getdescripcion(),$connexion), $tipo_cuenta_predefinida->getId(), Funciones::GetRealScapeString($tipo_cuenta_predefinida->getVersionRow(),$connexion));
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
	
	public function settipo_cuenta_predefinida_Original(tipo_cuenta_predefinida $tipo_cuenta_predefinida) {
		$tipo_cuenta_predefinida->settipo_cuenta_predefinida_Original(clone $tipo_cuenta_predefinida);		
	}
	
	public function settipo_cuenta_predefinidas_Original(array $tipo_cuenta_predefinidas) {
		foreach($tipo_cuenta_predefinidas as $tipo_cuenta_predefinida){
			$tipo_cuenta_predefinida->settipo_cuenta_predefinida_Original(clone $tipo_cuenta_predefinida);
		}
	}
	
	public static function settipo_cuenta_predefinida_OriginalStatic(tipo_cuenta_predefinida $tipo_cuenta_predefinida) {
		$tipo_cuenta_predefinida->settipo_cuenta_predefinida_Original(clone $tipo_cuenta_predefinida);		
	}
	
	public static function settipo_cuenta_predefinidas_OriginalStatic(array $tipo_cuenta_predefinidas) {		
		foreach($tipo_cuenta_predefinidas as $tipo_cuenta_predefinida){
			$tipo_cuenta_predefinida->settipo_cuenta_predefinida_Original(clone $tipo_cuenta_predefinida);
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
