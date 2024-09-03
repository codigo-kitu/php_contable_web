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
namespace com\bydan\contabilidad\seguridad\campo\business\data;

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

use com\bydan\contabilidad\seguridad\campo\business\entity\campo;

//FK


use com\bydan\contabilidad\seguridad\opcion\business\data\opcion_data;
use com\bydan\contabilidad\seguridad\opcion\business\entity\opcion;

//REL

use com\bydan\contabilidad\seguridad\perfil_campo\business\data\perfil_campo_data;
use com\bydan\contabilidad\seguridad\perfil\business\data\perfil_data;


class campo_data extends GetEntitiesDataAccessHelper implements campo_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='seg_';
	public static string $TABLE_NAME='seg_campo';			
	public static string $TABLE_NAME_campo='campo';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_CAMPO_INSERT(??,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_CAMPO_UPDATE(??,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_CAMPO_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_CAMPO_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $campo_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'campo';
		
		campo_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('SEGURIDAD');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->campo_DataAccessAdditional=new campoDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_opcion,codigo,nombre,descripcion,estado) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,\'%s\',\'%s\',\'%s\',\'%d\')';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_opcion=%d,codigo=\'%s\',nombre=\'%s\',descripcion=\'%s\',estado=\'%d\' where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_opcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.estado from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(campo $campo,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($campo->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=campo_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($campo->getId(),$connexion));				
				
			} else if ($campo->getIsChanged()) {
				if($campo->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=campo_data::$QUERY_INSERT;
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$campo->getid_opcion(),Funciones::GetRealScapeString($campo->getcodigo(),$connexion),Funciones::GetRealScapeString($campo->getnombre(),$connexion),Funciones::GetRealScapeString($campo->getdescripcion(),$connexion),$campo->getestado() );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=campo_data::$QUERY_UPDATE;			
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$campo->getid_opcion(),Funciones::GetRealScapeString($campo->getcodigo(),$connexion),Funciones::GetRealScapeString($campo->getnombre(),$connexion),Funciones::GetRealScapeString($campo->getdescripcion(),$connexion),$campo->getestado(), Funciones::GetRealScapeString($campo->getId(),$connexion), Funciones::GetRealScapeString($campo->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($campo, $connexion,$strQuerySaveComplete,campo_data::$TABLE_NAME,campo_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				campo_data::savePrepared($campo, $connexion,$strQuerySave,campo_data::$TABLE_NAME,campo_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			campo_data::setcampo_OriginalStatic($campo);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(campo $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				campo_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					campo_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					campo_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(campo $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					campo_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(campo $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					campo_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(campo $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					campo_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?campo {		
		$entity = new campo();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=campo_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=campo_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//Seguridad.campo.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setcampo_Original(new campo());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,campo_data::$IS_WITH_SCHEMA);         	    
				/*$entity=campo_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				$entity->setcampo_Original(parent::getEntityPrefijoEntityResult("",$entity->getcampo_Original(),$resultSet,campo_data::$IS_WITH_SCHEMA));         						
      	    	//$entity->setcampo_Original(campo_data::getEntityBaseResult("",$entity->getcampo_Original(),$resultSet));
				$entity->setcampo_Original($this->getEntityBaseResult("",$entity->getcampo_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?campo {
		$entity = new campo();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=campo_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=campo_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,campo_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".Seguridad.campo.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setcampo_Original(new campo());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,campo_data::$IS_WITH_SCHEMA);         	    
				/*$entity=campo_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				$entity->setcampo_Original(parent::getEntityPrefijoEntityResult("",$entity->getcampo_Original(),$resultSet,campo_data::$IS_WITH_SCHEMA));         		
				//$entity->setcampo_Original(campo_data::getEntityBaseResult("",$entity->getcampo_Original(),$resultSet));
				$entity->setcampo_Original($this->getEntityBaseResult("",$entity->getcampo_Original(),$resultSet));
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
		$entity = new campo();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=campo_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=campo_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,campo_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new campo();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,campo_data::$IS_WITH_SCHEMA);         		
				/*$entity=campo_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				$entity->setcampo_Original( new campo());
				
				$entity->setcampo_Original(parent::getEntityPrefijoEntityResult("",$entity->getcampo_Original(),$resultSet,campo_data::$IS_WITH_SCHEMA));         		
				//$entity->setcampo_Original(campo_data::getEntityBaseResult("",$entity->getcampo_Original(),$resultSet));
				$entity->setcampo_Original($this->getEntityBaseResult("",$entity->getcampo_Original(),$resultSet));
								
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
		$entity = new campo();		  
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
      	    	$entity = new campo();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,campo_data::$IS_WITH_SCHEMA);         		
				/*$entity=campo_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				$entity->setcampo_Original( new campo());
				
				$entity->setcampo_Original(parent::getEntityPrefijoEntityResult("",$entity->getcampo_Original(),$resultSet,campo_data::$IS_WITH_SCHEMA));         		
				//$entity->setcampo_Original(campo_data::getEntityBaseResult("",$entity->getcampo_Original(),$resultSet));
				$entity->setcampo_Original($this->getEntityBaseResult("",$entity->getcampo_Original(),$resultSet));
				
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
		$entity = new campo();		  
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
      	    	$entity = new campo();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,campo_data::$IS_WITH_SCHEMA);         		
				/*$entity=campo_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				$entity->setcampo_Original( new campo());				
				$entity->setcampo_Original(parent::getEntityPrefijoEntityResult("",$entity->getcampo_Original(),$resultSet,campo_data::$IS_WITH_SCHEMA));         		
				
      	    	//$entity->setcampo_Original(campo_data::getEntityBaseResult("",$entity->getcampo_Original(),$resultSet));
				$entity->setcampo_Original($this->getEntityBaseResult("",$entity->getcampo_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=campo_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,campo $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,campo_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,campo_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getopcion(Connexion $connexion,$relcampo) : ?opcion{

		$opcion= new opcion();

		try {
			$opcionDataAccess=new opcion_data();
			$opcionDataAccess->isForFKData=$this->isForFKDataRels;
			$opcion=$opcionDataAccess->getEntity($connexion,$relcampo->getid_opcion());

		} catch(Exception $e) {
			throw $e;
		}

		return $opcion;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	public function  getperfil_campos(Connexion $connexion,campo $campo) : array {

		$perfilcampos=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.perfil_campo_data::$SCHEMA.".".perfil_campo_data::$TABLE_NAME.".id_campo=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$campo->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$perfilcampoDataAccess=new perfil_campo_data();

			$perfilcampos=$perfilcampoDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $perfilcampos;
	}


	public function  getperfils(Connexion $connexion,campo $campo) : array {

		$perfils= array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.perfil_campo_data::$SCHEMA.".".perfil_campo_data::$TABLE_NAME." ON ".Constantes::$STR_PREFIJO_SCHEMA.perfil_campo_data::$SCHEMA.".".perfil_campo_data::$TABLE_NAME.".id_perfil=".Constantes::$STR_PREFIJO_SCHEMA.perfil_data::$SCHEMA.".".perfil_data::$TABLE_NAME.".id INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME." ON ".Constantes::$STR_PREFIJO_SCHEMA.perfil_campo_data::$SCHEMA.".".perfil_campo_data::$TABLE_NAME.".idcampo=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$campo->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$perfilDataAccess=new perfil_data();

			$perfils=$perfilDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $perfils;
	}


	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,campo $entity,$resultSet) : campo {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_opcion((int)$resultSet[$strPrefijo.'id_opcion']);
				$entity->setcodigo(utf8_encode($resultSet[$strPrefijo.'codigo']));
				$entity->setnombre(utf8_encode($resultSet[$strPrefijo.'nombre']));
				$entity->setdescripcion(utf8_encode($resultSet[$strPrefijo.'descripcion']));
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setestado($resultSet[$strPrefijo.'estado']=='f'? false:true );
				} else {
					$entity->setestado((bool)$resultSet[$strPrefijo.'estado']);
				}
			} else {
				$entity->setcodigo(utf8_encode($resultSet[$strPrefijo.'codigo']));								
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,campo $campo,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $campo->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'isssi', $campo->getid_opcion(),$campo->getcodigo(),$campo->getnombre(),$campo->getdescripcion(),$campo->getestado());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'isssiis', $campo->getid_opcion(),$campo->getcodigo(),$campo->getnombre(),$campo->getdescripcion(),$campo->getestado(), $campo->getId(), Funciones::GetRealScapeString($campo->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,campo $campo,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($campo->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($campo->getid_opcion(),Funciones::GetRealScapeString($campo->getcodigo(),$connexion),Funciones::GetRealScapeString($campo->getnombre(),$connexion),Funciones::GetRealScapeString($campo->getdescripcion(),$connexion),$campo->getestado());
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($campo->getid_opcion(),Funciones::GetRealScapeString($campo->getcodigo(),$connexion),Funciones::GetRealScapeString($campo->getnombre(),$connexion),Funciones::GetRealScapeString($campo->getdescripcion(),$connexion),$campo->getestado(), $campo->getId(), Funciones::GetRealScapeString($campo->getVersionRow(),$connexion));
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
	
	public function setcampo_Original(campo $campo) {
		$campo->setcampo_Original(clone $campo);		
	}
	
	public function setcampos_Original(array $campos) {
		foreach($campos as $campo){
			$campo->setcampo_Original(clone $campo);
		}
	}
	
	public static function setcampo_OriginalStatic(campo $campo) {
		$campo->setcampo_Original(clone $campo);		
	}
	
	public static function setcampos_OriginalStatic(array $campos) {		
		foreach($campos as $campo){
			$campo->setcampo_Original(clone $campo);
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
