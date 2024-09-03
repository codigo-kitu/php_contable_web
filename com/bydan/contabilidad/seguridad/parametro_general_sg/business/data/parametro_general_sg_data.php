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
namespace com\bydan\contabilidad\seguridad\parametro_general_sg\business\data;

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

use com\bydan\contabilidad\seguridad\parametro_general_sg\business\entity\parametro_general_sg;

//FK


//REL



class parametro_general_sg_data extends GetEntitiesDataAccessHelper implements parametro_general_sg_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='seg_';
	public static string $TABLE_NAME='seg_parametro_general_sg';			
	public static string $TABLE_NAME_parametro_general_sg='parametro_general_sg';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_PARAMETRO_GENERAL_SG_INSERT(??,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_PARAMETRO_GENERAL_SG_UPDATE(??,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_PARAMETRO_GENERAL_SG_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_PARAMETRO_GENERAL_SG_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $parametro_general_sg_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'parametro_general_sg';
		
		parametro_general_sg_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('SEGURIDAD');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->parametro_general_sg_DataAccessAdditional=new parametro_general_sgDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,nombre_sistema,nombre_simple_sistema,nombre_empresa,version_sistema,siglas_sistema,mail_sistema,telefono_sistema,fax_sistema,representante_nombre,codigo_proceso_actualizacion,esta_activo) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,\'%s\',\'%s\',\'%s\',%f,\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%d\')';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,nombre_sistema=\'%s\',nombre_simple_sistema=\'%s\',nombre_empresa=\'%s\',version_sistema=%f,siglas_sistema=\'%s\',mail_sistema=\'%s\',telefono_sistema=\'%s\',fax_sistema=\'%s\',representante_nombre=\'%s\',codigo_proceso_actualizacion=\'%s\',esta_activo=\'%d\' where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_sistema,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_simple_sistema,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.version_sistema,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.siglas_sistema,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.mail_sistema,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.telefono_sistema,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fax_sistema,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.representante_nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo_proceso_actualizacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.esta_activo from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_simple_sistema from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(parametro_general_sg $parametro_general_sg,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($parametro_general_sg->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=parametro_general_sg_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($parametro_general_sg->getId(),$connexion));				
				
			} else if ($parametro_general_sg->getIsChanged()) {
				if($parametro_general_sg->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=parametro_general_sg_data::$QUERY_INSERT;
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($parametro_general_sg->getnombre_sistema(),$connexion),Funciones::GetRealScapeString($parametro_general_sg->getnombre_simple_sistema(),$connexion),Funciones::GetRealScapeString($parametro_general_sg->getnombre_empresa(),$connexion),$parametro_general_sg->getversion_sistema(),Funciones::GetRealScapeString($parametro_general_sg->getsiglas_sistema(),$connexion),Funciones::GetRealScapeString($parametro_general_sg->getmail_sistema(),$connexion),Funciones::GetRealScapeString($parametro_general_sg->gettelefono_sistema(),$connexion),Funciones::GetRealScapeString($parametro_general_sg->getfax_sistema(),$connexion),Funciones::GetRealScapeString($parametro_general_sg->getrepresentante_nombre(),$connexion),Funciones::GetRealScapeString($parametro_general_sg->getcodigo_proceso_actualizacion(),$connexion),$parametro_general_sg->getesta_activo() );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=parametro_general_sg_data::$QUERY_UPDATE;			
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($parametro_general_sg->getnombre_sistema(),$connexion),Funciones::GetRealScapeString($parametro_general_sg->getnombre_simple_sistema(),$connexion),Funciones::GetRealScapeString($parametro_general_sg->getnombre_empresa(),$connexion),$parametro_general_sg->getversion_sistema(),Funciones::GetRealScapeString($parametro_general_sg->getsiglas_sistema(),$connexion),Funciones::GetRealScapeString($parametro_general_sg->getmail_sistema(),$connexion),Funciones::GetRealScapeString($parametro_general_sg->gettelefono_sistema(),$connexion),Funciones::GetRealScapeString($parametro_general_sg->getfax_sistema(),$connexion),Funciones::GetRealScapeString($parametro_general_sg->getrepresentante_nombre(),$connexion),Funciones::GetRealScapeString($parametro_general_sg->getcodigo_proceso_actualizacion(),$connexion),$parametro_general_sg->getesta_activo(), Funciones::GetRealScapeString($parametro_general_sg->getId(),$connexion), Funciones::GetRealScapeString($parametro_general_sg->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($parametro_general_sg, $connexion,$strQuerySaveComplete,parametro_general_sg_data::$TABLE_NAME,parametro_general_sg_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				parametro_general_sg_data::savePrepared($parametro_general_sg, $connexion,$strQuerySave,parametro_general_sg_data::$TABLE_NAME,parametro_general_sg_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			parametro_general_sg_data::setparametro_general_sg_OriginalStatic($parametro_general_sg);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(parametro_general_sg $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				parametro_general_sg_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					parametro_general_sg_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					parametro_general_sg_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(parametro_general_sg $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					parametro_general_sg_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(parametro_general_sg $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					parametro_general_sg_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(parametro_general_sg $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					parametro_general_sg_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?parametro_general_sg {		
		$entity = new parametro_general_sg();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=parametro_general_sg_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=parametro_general_sg_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//Seguridad.parametro_general_sg.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setparametro_general_sg_Original(new parametro_general_sg());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_general_sg_data::$IS_WITH_SCHEMA);         	    
				/*$entity=parametro_general_sg_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setparametro_general_sg_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_general_sg_Original(),$resultSet,parametro_general_sg_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setparametro_general_sg_Original(parametro_general_sg_data::getEntityBaseResult("",$entity->getparametro_general_sg_Original(),$resultSet));
				//$entity->setparametro_general_sg_Original($this->getEntityBaseResult("",$entity->getparametro_general_sg_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?parametro_general_sg {
		$entity = new parametro_general_sg();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=parametro_general_sg_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=parametro_general_sg_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,parametro_general_sg_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".Seguridad.parametro_general_sg.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setparametro_general_sg_Original(new parametro_general_sg());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_general_sg_data::$IS_WITH_SCHEMA);         	    
				/*$entity=parametro_general_sg_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setparametro_general_sg_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_general_sg_Original(),$resultSet,parametro_general_sg_data::$IS_WITH_SCHEMA));         		
				////$entity->setparametro_general_sg_Original(parametro_general_sg_data::getEntityBaseResult("",$entity->getparametro_general_sg_Original(),$resultSet));
				//$entity->setparametro_general_sg_Original($this->getEntityBaseResult("",$entity->getparametro_general_sg_Original(),$resultSet));
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
		$entity = new parametro_general_sg();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=parametro_general_sg_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=parametro_general_sg_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,parametro_general_sg_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new parametro_general_sg();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_general_sg_data::$IS_WITH_SCHEMA);         		
				/*$entity=parametro_general_sg_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setparametro_general_sg_Original( new parametro_general_sg());
				
				//$entity->setparametro_general_sg_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_general_sg_Original(),$resultSet,parametro_general_sg_data::$IS_WITH_SCHEMA));         		
				////$entity->setparametro_general_sg_Original(parametro_general_sg_data::getEntityBaseResult("",$entity->getparametro_general_sg_Original(),$resultSet));
				//$entity->setparametro_general_sg_Original($this->getEntityBaseResult("",$entity->getparametro_general_sg_Original(),$resultSet));
								
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
		$entity = new parametro_general_sg();		  
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
      	    	$entity = new parametro_general_sg();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_general_sg_data::$IS_WITH_SCHEMA);         		
				/*$entity=parametro_general_sg_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setparametro_general_sg_Original( new parametro_general_sg());
				
				//$entity->setparametro_general_sg_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_general_sg_Original(),$resultSet,parametro_general_sg_data::$IS_WITH_SCHEMA));         		
				////$entity->setparametro_general_sg_Original(parametro_general_sg_data::getEntityBaseResult("",$entity->getparametro_general_sg_Original(),$resultSet));
				//$entity->setparametro_general_sg_Original($this->getEntityBaseResult("",$entity->getparametro_general_sg_Original(),$resultSet));
				
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
		$entity = new parametro_general_sg();		  
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
      	    	$entity = new parametro_general_sg();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_general_sg_data::$IS_WITH_SCHEMA);         		
				/*$entity=parametro_general_sg_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setparametro_general_sg_Original( new parametro_general_sg());				
				//$entity->setparametro_general_sg_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_general_sg_Original(),$resultSet,parametro_general_sg_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setparametro_general_sg_Original(parametro_general_sg_data::getEntityBaseResult("",$entity->getparametro_general_sg_Original(),$resultSet));
				//$entity->setparametro_general_sg_Original($this->getEntityBaseResult("",$entity->getparametro_general_sg_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=parametro_general_sg_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,parametro_general_sg $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,parametro_general_sg_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,parametro_general_sg_data::$QUERY_SELECT_COUNT);
				
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
	
	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,parametro_general_sg $entity,$resultSet) : parametro_general_sg {
        try {     	
			if(!$this->isForFKData) {
				$entity->setnombre_sistema(utf8_encode($resultSet[$strPrefijo.'nombre_sistema']));
				$entity->setnombre_simple_sistema(utf8_encode($resultSet[$strPrefijo.'nombre_simple_sistema']));
				$entity->setnombre_empresa(utf8_encode($resultSet[$strPrefijo.'nombre_empresa']));
				$entity->setversion_sistema((float)$resultSet[$strPrefijo.'version_sistema']);
				$entity->setsiglas_sistema(utf8_encode($resultSet[$strPrefijo.'siglas_sistema']));
				$entity->setmail_sistema(utf8_encode($resultSet[$strPrefijo.'mail_sistema']));
				$entity->settelefono_sistema(utf8_encode($resultSet[$strPrefijo.'telefono_sistema']));
				$entity->setfax_sistema(utf8_encode($resultSet[$strPrefijo.'fax_sistema']));
				$entity->setrepresentante_nombre(utf8_encode($resultSet[$strPrefijo.'representante_nombre']));
				$entity->setcodigo_proceso_actualizacion(utf8_encode($resultSet[$strPrefijo.'codigo_proceso_actualizacion']));
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setesta_activo($resultSet[$strPrefijo.'esta_activo']=='f'? false:true );
				} else {
					$entity->setesta_activo((bool)$resultSet[$strPrefijo.'esta_activo']);
				}
			} else {
				$entity->setnombre_simple_sistema(utf8_encode($resultSet[$strPrefijo.'nombre_simple_sistema']));								
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,parametro_general_sg $parametro_general_sg,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $parametro_general_sg->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'sssdssssssi', $parametro_general_sg->getnombre_sistema(),$parametro_general_sg->getnombre_simple_sistema(),$parametro_general_sg->getnombre_empresa(),$parametro_general_sg->getversion_sistema(),$parametro_general_sg->getsiglas_sistema(),$parametro_general_sg->getmail_sistema(),$parametro_general_sg->gettelefono_sistema(),$parametro_general_sg->getfax_sistema(),$parametro_general_sg->getrepresentante_nombre(),$parametro_general_sg->getcodigo_proceso_actualizacion(),$parametro_general_sg->getesta_activo());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'sssdssssssiis', $parametro_general_sg->getnombre_sistema(),$parametro_general_sg->getnombre_simple_sistema(),$parametro_general_sg->getnombre_empresa(),$parametro_general_sg->getversion_sistema(),$parametro_general_sg->getsiglas_sistema(),$parametro_general_sg->getmail_sistema(),$parametro_general_sg->gettelefono_sistema(),$parametro_general_sg->getfax_sistema(),$parametro_general_sg->getrepresentante_nombre(),$parametro_general_sg->getcodigo_proceso_actualizacion(),$parametro_general_sg->getesta_activo(), $parametro_general_sg->getId(), Funciones::GetRealScapeString($parametro_general_sg->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,parametro_general_sg $parametro_general_sg,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($parametro_general_sg->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array(Funciones::GetRealScapeString($parametro_general_sg->getnombre_sistema(),$connexion),Funciones::GetRealScapeString($parametro_general_sg->getnombre_simple_sistema(),$connexion),Funciones::GetRealScapeString($parametro_general_sg->getnombre_empresa(),$connexion),$parametro_general_sg->getversion_sistema(),Funciones::GetRealScapeString($parametro_general_sg->getsiglas_sistema(),$connexion),Funciones::GetRealScapeString($parametro_general_sg->getmail_sistema(),$connexion),Funciones::GetRealScapeString($parametro_general_sg->gettelefono_sistema(),$connexion),Funciones::GetRealScapeString($parametro_general_sg->getfax_sistema(),$connexion),Funciones::GetRealScapeString($parametro_general_sg->getrepresentante_nombre(),$connexion),Funciones::GetRealScapeString($parametro_general_sg->getcodigo_proceso_actualizacion(),$connexion),$parametro_general_sg->getesta_activo());
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array(Funciones::GetRealScapeString($parametro_general_sg->getnombre_sistema(),$connexion),Funciones::GetRealScapeString($parametro_general_sg->getnombre_simple_sistema(),$connexion),Funciones::GetRealScapeString($parametro_general_sg->getnombre_empresa(),$connexion),$parametro_general_sg->getversion_sistema(),Funciones::GetRealScapeString($parametro_general_sg->getsiglas_sistema(),$connexion),Funciones::GetRealScapeString($parametro_general_sg->getmail_sistema(),$connexion),Funciones::GetRealScapeString($parametro_general_sg->gettelefono_sistema(),$connexion),Funciones::GetRealScapeString($parametro_general_sg->getfax_sistema(),$connexion),Funciones::GetRealScapeString($parametro_general_sg->getrepresentante_nombre(),$connexion),Funciones::GetRealScapeString($parametro_general_sg->getcodigo_proceso_actualizacion(),$connexion),$parametro_general_sg->getesta_activo(), $parametro_general_sg->getId(), Funciones::GetRealScapeString($parametro_general_sg->getVersionRow(),$connexion));
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
	
	public function setparametro_general_sg_Original(parametro_general_sg $parametro_general_sg) {
		$parametro_general_sg->setparametro_general_sg_Original(clone $parametro_general_sg);		
	}
	
	public function setparametro_general_sgs_Original(array $parametro_general_sgs) {
		foreach($parametro_general_sgs as $parametro_general_sg){
			$parametro_general_sg->setparametro_general_sg_Original(clone $parametro_general_sg);
		}
	}
	
	public static function setparametro_general_sg_OriginalStatic(parametro_general_sg $parametro_general_sg) {
		$parametro_general_sg->setparametro_general_sg_Original(clone $parametro_general_sg);		
	}
	
	public static function setparametro_general_sgs_OriginalStatic(array $parametro_general_sgs) {		
		foreach($parametro_general_sgs as $parametro_general_sg){
			$parametro_general_sg->setparametro_general_sg_Original(clone $parametro_general_sg);
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
