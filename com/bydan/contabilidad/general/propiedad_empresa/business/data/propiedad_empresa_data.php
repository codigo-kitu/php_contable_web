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
namespace com\bydan\contabilidad\general\propiedad_empresa\business\data;

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

use com\bydan\contabilidad\general\propiedad_empresa\business\entity\propiedad_empresa;

//FK


//REL



class propiedad_empresa_data extends GetEntitiesDataAccessHelper implements propiedad_empresa_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='gen_';
	public static string $TABLE_NAME='gen_propiedad_empresa';			
	public static string $TABLE_NAME_propiedad_empresa='propiedad_empresa';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_PROPIEDAD_EMPRESA_INSERT(??,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_PROPIEDAD_EMPRESA_UPDATE(??,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_PROPIEDAD_EMPRESA_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_PROPIEDAD_EMPRESA_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $propiedad_empresa_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'propiedad_empresa';
		
		propiedad_empresa_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('GENERAL');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->propiedad_empresa_DataAccessAdditional=new propiedad_empresaDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,nombre_empresa,calle_1,calle_2,calle_3,barrio,ciudad,estado,codigo_postal,codigo_pais) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\')';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,nombre_empresa=\'%s\',calle_1=\'%s\',calle_2=\'%s\',calle_3=\'%s\',barrio=\'%s\',ciudad=\'%s\',estado=\'%s\',codigo_postal=\'%s\',codigo_pais=\'%s\' where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.calle_1,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.calle_2,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.calle_3,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.barrio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.ciudad,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.estado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo_postal,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo_pais from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(propiedad_empresa $propiedad_empresa,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($propiedad_empresa->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=propiedad_empresa_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($propiedad_empresa->getId(),$connexion));				
				
			} else if ($propiedad_empresa->getIsChanged()) {
				if($propiedad_empresa->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=propiedad_empresa_data::$QUERY_INSERT;
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($propiedad_empresa->getnombre_empresa(),$connexion),Funciones::GetRealScapeString($propiedad_empresa->getcalle_1(),$connexion),Funciones::GetRealScapeString($propiedad_empresa->getcalle_2(),$connexion),Funciones::GetRealScapeString($propiedad_empresa->getcalle_3(),$connexion),Funciones::GetRealScapeString($propiedad_empresa->getbarrio(),$connexion),Funciones::GetRealScapeString($propiedad_empresa->getciudad(),$connexion),Funciones::GetRealScapeString($propiedad_empresa->getestado(),$connexion),Funciones::GetRealScapeString($propiedad_empresa->getcodigo_postal(),$connexion),Funciones::GetRealScapeString($propiedad_empresa->getcodigo_pais(),$connexion) );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=propiedad_empresa_data::$QUERY_UPDATE;			
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($propiedad_empresa->getnombre_empresa(),$connexion),Funciones::GetRealScapeString($propiedad_empresa->getcalle_1(),$connexion),Funciones::GetRealScapeString($propiedad_empresa->getcalle_2(),$connexion),Funciones::GetRealScapeString($propiedad_empresa->getcalle_3(),$connexion),Funciones::GetRealScapeString($propiedad_empresa->getbarrio(),$connexion),Funciones::GetRealScapeString($propiedad_empresa->getciudad(),$connexion),Funciones::GetRealScapeString($propiedad_empresa->getestado(),$connexion),Funciones::GetRealScapeString($propiedad_empresa->getcodigo_postal(),$connexion),Funciones::GetRealScapeString($propiedad_empresa->getcodigo_pais(),$connexion), Funciones::GetRealScapeString($propiedad_empresa->getId(),$connexion), Funciones::GetRealScapeString($propiedad_empresa->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($propiedad_empresa, $connexion,$strQuerySaveComplete,propiedad_empresa_data::$TABLE_NAME,propiedad_empresa_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				propiedad_empresa_data::savePrepared($propiedad_empresa, $connexion,$strQuerySave,propiedad_empresa_data::$TABLE_NAME,propiedad_empresa_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			propiedad_empresa_data::setpropiedad_empresa_OriginalStatic($propiedad_empresa);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(propiedad_empresa $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				propiedad_empresa_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					propiedad_empresa_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					propiedad_empresa_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(propiedad_empresa $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					propiedad_empresa_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(propiedad_empresa $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					propiedad_empresa_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(propiedad_empresa $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					propiedad_empresa_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?propiedad_empresa {		
		$entity = new propiedad_empresa();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=propiedad_empresa_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=propiedad_empresa_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//General.propiedad_empresa.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setpropiedad_empresa_Original(new propiedad_empresa());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,propiedad_empresa_data::$IS_WITH_SCHEMA);         	    
				/*$entity=propiedad_empresa_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setpropiedad_empresa_Original(parent::getEntityPrefijoEntityResult("",$entity->getpropiedad_empresa_Original(),$resultSet,propiedad_empresa_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setpropiedad_empresa_Original(propiedad_empresa_data::getEntityBaseResult("",$entity->getpropiedad_empresa_Original(),$resultSet));
				//$entity->setpropiedad_empresa_Original($this->getEntityBaseResult("",$entity->getpropiedad_empresa_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?propiedad_empresa {
		$entity = new propiedad_empresa();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=propiedad_empresa_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=propiedad_empresa_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,propiedad_empresa_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".General.propiedad_empresa.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setpropiedad_empresa_Original(new propiedad_empresa());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,propiedad_empresa_data::$IS_WITH_SCHEMA);         	    
				/*$entity=propiedad_empresa_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setpropiedad_empresa_Original(parent::getEntityPrefijoEntityResult("",$entity->getpropiedad_empresa_Original(),$resultSet,propiedad_empresa_data::$IS_WITH_SCHEMA));         		
				////$entity->setpropiedad_empresa_Original(propiedad_empresa_data::getEntityBaseResult("",$entity->getpropiedad_empresa_Original(),$resultSet));
				//$entity->setpropiedad_empresa_Original($this->getEntityBaseResult("",$entity->getpropiedad_empresa_Original(),$resultSet));
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
		$entity = new propiedad_empresa();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=propiedad_empresa_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=propiedad_empresa_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,propiedad_empresa_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new propiedad_empresa();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,propiedad_empresa_data::$IS_WITH_SCHEMA);         		
				/*$entity=propiedad_empresa_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setpropiedad_empresa_Original( new propiedad_empresa());
				
				//$entity->setpropiedad_empresa_Original(parent::getEntityPrefijoEntityResult("",$entity->getpropiedad_empresa_Original(),$resultSet,propiedad_empresa_data::$IS_WITH_SCHEMA));         		
				////$entity->setpropiedad_empresa_Original(propiedad_empresa_data::getEntityBaseResult("",$entity->getpropiedad_empresa_Original(),$resultSet));
				//$entity->setpropiedad_empresa_Original($this->getEntityBaseResult("",$entity->getpropiedad_empresa_Original(),$resultSet));
								
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
		$entity = new propiedad_empresa();		  
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
      	    	$entity = new propiedad_empresa();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,propiedad_empresa_data::$IS_WITH_SCHEMA);         		
				/*$entity=propiedad_empresa_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setpropiedad_empresa_Original( new propiedad_empresa());
				
				//$entity->setpropiedad_empresa_Original(parent::getEntityPrefijoEntityResult("",$entity->getpropiedad_empresa_Original(),$resultSet,propiedad_empresa_data::$IS_WITH_SCHEMA));         		
				////$entity->setpropiedad_empresa_Original(propiedad_empresa_data::getEntityBaseResult("",$entity->getpropiedad_empresa_Original(),$resultSet));
				//$entity->setpropiedad_empresa_Original($this->getEntityBaseResult("",$entity->getpropiedad_empresa_Original(),$resultSet));
				
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
		$entity = new propiedad_empresa();		  
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
      	    	$entity = new propiedad_empresa();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,propiedad_empresa_data::$IS_WITH_SCHEMA);         		
				/*$entity=propiedad_empresa_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setpropiedad_empresa_Original( new propiedad_empresa());				
				//$entity->setpropiedad_empresa_Original(parent::getEntityPrefijoEntityResult("",$entity->getpropiedad_empresa_Original(),$resultSet,propiedad_empresa_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setpropiedad_empresa_Original(propiedad_empresa_data::getEntityBaseResult("",$entity->getpropiedad_empresa_Original(),$resultSet));
				//$entity->setpropiedad_empresa_Original($this->getEntityBaseResult("",$entity->getpropiedad_empresa_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=propiedad_empresa_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,propiedad_empresa $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,propiedad_empresa_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,propiedad_empresa_data::$QUERY_SELECT_COUNT);
				
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
	
	public function getEntityBaseResult(string $strPrefijo,propiedad_empresa $entity,$resultSet) : propiedad_empresa {
        try {     	
			if(!$this->isForFKData) {
				$entity->setnombre_empresa(utf8_encode($resultSet[$strPrefijo.'nombre_empresa']));
				$entity->setcalle_1(utf8_encode($resultSet[$strPrefijo.'calle_1']));
				$entity->setcalle_2(utf8_encode($resultSet[$strPrefijo.'calle_2']));
				$entity->setcalle_3(utf8_encode($resultSet[$strPrefijo.'calle_3']));
				$entity->setbarrio(utf8_encode($resultSet[$strPrefijo.'barrio']));
				$entity->setciudad(utf8_encode($resultSet[$strPrefijo.'ciudad']));
				$entity->setestado(utf8_encode($resultSet[$strPrefijo.'estado']));
				$entity->setcodigo_postal(utf8_encode($resultSet[$strPrefijo.'codigo_postal']));
				$entity->setcodigo_pais(utf8_encode($resultSet[$strPrefijo.'codigo_pais']));
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,propiedad_empresa $propiedad_empresa,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $propiedad_empresa->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'sssssssss', $propiedad_empresa->getnombre_empresa(),$propiedad_empresa->getcalle_1(),$propiedad_empresa->getcalle_2(),$propiedad_empresa->getcalle_3(),$propiedad_empresa->getbarrio(),$propiedad_empresa->getciudad(),$propiedad_empresa->getestado(),$propiedad_empresa->getcodigo_postal(),$propiedad_empresa->getcodigo_pais());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'sssssssssis', $propiedad_empresa->getnombre_empresa(),$propiedad_empresa->getcalle_1(),$propiedad_empresa->getcalle_2(),$propiedad_empresa->getcalle_3(),$propiedad_empresa->getbarrio(),$propiedad_empresa->getciudad(),$propiedad_empresa->getestado(),$propiedad_empresa->getcodigo_postal(),$propiedad_empresa->getcodigo_pais(), $propiedad_empresa->getId(), Funciones::GetRealScapeString($propiedad_empresa->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,propiedad_empresa $propiedad_empresa,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($propiedad_empresa->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array(Funciones::GetRealScapeString($propiedad_empresa->getnombre_empresa(),$connexion),Funciones::GetRealScapeString($propiedad_empresa->getcalle_1(),$connexion),Funciones::GetRealScapeString($propiedad_empresa->getcalle_2(),$connexion),Funciones::GetRealScapeString($propiedad_empresa->getcalle_3(),$connexion),Funciones::GetRealScapeString($propiedad_empresa->getbarrio(),$connexion),Funciones::GetRealScapeString($propiedad_empresa->getciudad(),$connexion),Funciones::GetRealScapeString($propiedad_empresa->getestado(),$connexion),Funciones::GetRealScapeString($propiedad_empresa->getcodigo_postal(),$connexion),Funciones::GetRealScapeString($propiedad_empresa->getcodigo_pais(),$connexion));
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array(Funciones::GetRealScapeString($propiedad_empresa->getnombre_empresa(),$connexion),Funciones::GetRealScapeString($propiedad_empresa->getcalle_1(),$connexion),Funciones::GetRealScapeString($propiedad_empresa->getcalle_2(),$connexion),Funciones::GetRealScapeString($propiedad_empresa->getcalle_3(),$connexion),Funciones::GetRealScapeString($propiedad_empresa->getbarrio(),$connexion),Funciones::GetRealScapeString($propiedad_empresa->getciudad(),$connexion),Funciones::GetRealScapeString($propiedad_empresa->getestado(),$connexion),Funciones::GetRealScapeString($propiedad_empresa->getcodigo_postal(),$connexion),Funciones::GetRealScapeString($propiedad_empresa->getcodigo_pais(),$connexion), $propiedad_empresa->getId(), Funciones::GetRealScapeString($propiedad_empresa->getVersionRow(),$connexion));
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
	
	public function setpropiedad_empresa_Original(propiedad_empresa $propiedad_empresa) {
		$propiedad_empresa->setpropiedad_empresa_Original(clone $propiedad_empresa);		
	}
	
	public function setpropiedad_empresas_Original(array $propiedad_empresas) {
		foreach($propiedad_empresas as $propiedad_empresa){
			$propiedad_empresa->setpropiedad_empresa_Original(clone $propiedad_empresa);
		}
	}
	
	public static function setpropiedad_empresa_OriginalStatic(propiedad_empresa $propiedad_empresa) {
		$propiedad_empresa->setpropiedad_empresa_Original(clone $propiedad_empresa);		
	}
	
	public static function setpropiedad_empresas_OriginalStatic(array $propiedad_empresas) {		
		foreach($propiedad_empresas as $propiedad_empresa){
			$propiedad_empresa->setpropiedad_empresa_Original(clone $propiedad_empresa);
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
