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
namespace com\bydan\contabilidad\seguridad\perfil_opcion\business\data;

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

use com\bydan\contabilidad\seguridad\perfil_opcion\business\entity\perfil_opcion;

//FK


use com\bydan\contabilidad\seguridad\perfil\business\data\perfil_data;
use com\bydan\contabilidad\seguridad\perfil\business\entity\perfil;

use com\bydan\contabilidad\seguridad\opcion\business\data\opcion_data;
use com\bydan\contabilidad\seguridad\opcion\business\entity\opcion;

//REL



class perfil_opcion_data extends GetEntitiesDataAccessHelper implements perfil_opcion_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='seg_';
	public static string $TABLE_NAME='seg_perfil_opcion';			
	public static string $TABLE_NAME_perfil_opcion='perfil_opcion';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_PERFIL_OPCION_INSERT(??,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_PERFIL_OPCION_UPDATE(??,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_PERFIL_OPCION_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_PERFIL_OPCION_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $perfil_opcion_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'perfil_opcion';
		
		perfil_opcion_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('SEGURIDAD');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->perfil_opcion_DataAccessAdditional=new perfil_opcionDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_perfil,id_opcion,todo,ingreso,modificacion,eliminacion,consulta,busqueda,reporte,estado) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%d,\'%d\',\'%d\',\'%d\',\'%d\',\'%d\',\'%d\',\'%d\',\'%d\')';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_perfil=%d,id_opcion=%d,todo=\'%d\',ingreso=\'%d\',modificacion=\'%d\',eliminacion=\'%d\',consulta=\'%d\',busqueda=\'%d\',reporte=\'%d\',estado=\'%d\' where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_perfil,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_opcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.todo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.ingreso,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.modificacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.eliminacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.consulta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.busqueda,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.reporte,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.estado from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(perfil_opcion $perfil_opcion,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($perfil_opcion->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=perfil_opcion_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($perfil_opcion->getId(),$connexion));				
				
			} else if ($perfil_opcion->getIsChanged()) {
				if($perfil_opcion->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=perfil_opcion_data::$QUERY_INSERT;
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$perfil_opcion->getid_perfil(),$perfil_opcion->getid_opcion(),$perfil_opcion->gettodo(),$perfil_opcion->getingreso(),$perfil_opcion->getmodificacion(),$perfil_opcion->geteliminacion(),$perfil_opcion->getconsulta(),$perfil_opcion->getbusqueda(),$perfil_opcion->getreporte(),$perfil_opcion->getestado() );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=perfil_opcion_data::$QUERY_UPDATE;			
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$perfil_opcion->getid_perfil(),$perfil_opcion->getid_opcion(),$perfil_opcion->gettodo(),$perfil_opcion->getingreso(),$perfil_opcion->getmodificacion(),$perfil_opcion->geteliminacion(),$perfil_opcion->getconsulta(),$perfil_opcion->getbusqueda(),$perfil_opcion->getreporte(),$perfil_opcion->getestado(), Funciones::GetRealScapeString($perfil_opcion->getId(),$connexion), Funciones::GetRealScapeString($perfil_opcion->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($perfil_opcion, $connexion,$strQuerySaveComplete,perfil_opcion_data::$TABLE_NAME,perfil_opcion_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				perfil_opcion_data::savePrepared($perfil_opcion, $connexion,$strQuerySave,perfil_opcion_data::$TABLE_NAME,perfil_opcion_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			perfil_opcion_data::setperfil_opcion_OriginalStatic($perfil_opcion);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(perfil_opcion $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				perfil_opcion_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					perfil_opcion_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					perfil_opcion_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(perfil_opcion $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					perfil_opcion_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(perfil_opcion $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					perfil_opcion_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(perfil_opcion $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					perfil_opcion_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?perfil_opcion {		
		$entity = new perfil_opcion();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=perfil_opcion_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=perfil_opcion_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//Seguridad.perfil_opcion.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setperfil_opcion_Original(new perfil_opcion());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,perfil_opcion_data::$IS_WITH_SCHEMA);         	    
				/*$entity=perfil_opcion_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				$entity->setperfil_opcion_Original(parent::getEntityPrefijoEntityResult("",$entity->getperfil_opcion_Original(),$resultSet,perfil_opcion_data::$IS_WITH_SCHEMA));         						
      	    	//$entity->setperfil_opcion_Original(perfil_opcion_data::getEntityBaseResult("",$entity->getperfil_opcion_Original(),$resultSet));
				$entity->setperfil_opcion_Original($this->getEntityBaseResult("",$entity->getperfil_opcion_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?perfil_opcion {
		$entity = new perfil_opcion();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=perfil_opcion_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=perfil_opcion_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,perfil_opcion_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".Seguridad.perfil_opcion.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setperfil_opcion_Original(new perfil_opcion());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,perfil_opcion_data::$IS_WITH_SCHEMA);         	    
				/*$entity=perfil_opcion_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				$entity->setperfil_opcion_Original(parent::getEntityPrefijoEntityResult("",$entity->getperfil_opcion_Original(),$resultSet,perfil_opcion_data::$IS_WITH_SCHEMA));         		
				//$entity->setperfil_opcion_Original(perfil_opcion_data::getEntityBaseResult("",$entity->getperfil_opcion_Original(),$resultSet));
				$entity->setperfil_opcion_Original($this->getEntityBaseResult("",$entity->getperfil_opcion_Original(),$resultSet));
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
		$entity = new perfil_opcion();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=perfil_opcion_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=perfil_opcion_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,perfil_opcion_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new perfil_opcion();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,perfil_opcion_data::$IS_WITH_SCHEMA);         		
				/*$entity=perfil_opcion_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				$entity->setperfil_opcion_Original( new perfil_opcion());
				
				$entity->setperfil_opcion_Original(parent::getEntityPrefijoEntityResult("",$entity->getperfil_opcion_Original(),$resultSet,perfil_opcion_data::$IS_WITH_SCHEMA));         		
				//$entity->setperfil_opcion_Original(perfil_opcion_data::getEntityBaseResult("",$entity->getperfil_opcion_Original(),$resultSet));
				$entity->setperfil_opcion_Original($this->getEntityBaseResult("",$entity->getperfil_opcion_Original(),$resultSet));
								
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
		$entity = new perfil_opcion();		  
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
      	    	$entity = new perfil_opcion();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,perfil_opcion_data::$IS_WITH_SCHEMA);         		
				/*$entity=perfil_opcion_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				$entity->setperfil_opcion_Original( new perfil_opcion());
				
				$entity->setperfil_opcion_Original(parent::getEntityPrefijoEntityResult("",$entity->getperfil_opcion_Original(),$resultSet,perfil_opcion_data::$IS_WITH_SCHEMA));         		
				//$entity->setperfil_opcion_Original(perfil_opcion_data::getEntityBaseResult("",$entity->getperfil_opcion_Original(),$resultSet));
				$entity->setperfil_opcion_Original($this->getEntityBaseResult("",$entity->getperfil_opcion_Original(),$resultSet));
				
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
		$entity = new perfil_opcion();		  
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
      	    	$entity = new perfil_opcion();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,perfil_opcion_data::$IS_WITH_SCHEMA);         		
				/*$entity=perfil_opcion_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				$entity->setperfil_opcion_Original( new perfil_opcion());				
				$entity->setperfil_opcion_Original(parent::getEntityPrefijoEntityResult("",$entity->getperfil_opcion_Original(),$resultSet,perfil_opcion_data::$IS_WITH_SCHEMA));         		
				
      	    	//$entity->setperfil_opcion_Original(perfil_opcion_data::getEntityBaseResult("",$entity->getperfil_opcion_Original(),$resultSet));
				$entity->setperfil_opcion_Original($this->getEntityBaseResult("",$entity->getperfil_opcion_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=perfil_opcion_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,perfil_opcion $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,perfil_opcion_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,perfil_opcion_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getperfil(Connexion $connexion,$relperfil_opcion) : ?perfil{

		$perfil= new perfil();

		try {
			$perfilDataAccess=new perfil_data();
			$perfilDataAccess->isForFKData=$this->isForFKDataRels;
			$perfil=$perfilDataAccess->getEntity($connexion,$relperfil_opcion->getid_perfil());

		} catch(Exception $e) {
			throw $e;
		}

		return $perfil;
	}


	public function  getopcion(Connexion $connexion,$relperfil_opcion) : ?opcion{

		$opcion= new opcion();

		try {
			$opcionDataAccess=new opcion_data();
			$opcionDataAccess->isForFKData=$this->isForFKDataRels;
			$opcion=$opcionDataAccess->getEntity($connexion,$relperfil_opcion->getid_opcion());

		} catch(Exception $e) {
			throw $e;
		}

		return $opcion;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,perfil_opcion $entity,$resultSet) : perfil_opcion {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_perfil((int)$resultSet[$strPrefijo.'id_perfil']);
				$entity->setid_opcion((int)$resultSet[$strPrefijo.'id_opcion']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->settodo($resultSet[$strPrefijo.'todo']=='f'? false:true );
				} else {
					$entity->settodo((bool)$resultSet[$strPrefijo.'todo']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setingreso($resultSet[$strPrefijo.'ingreso']=='f'? false:true );
				} else {
					$entity->setingreso((bool)$resultSet[$strPrefijo.'ingreso']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setmodificacion($resultSet[$strPrefijo.'modificacion']=='f'? false:true );
				} else {
					$entity->setmodificacion((bool)$resultSet[$strPrefijo.'modificacion']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->seteliminacion($resultSet[$strPrefijo.'eliminacion']=='f'? false:true );
				} else {
					$entity->seteliminacion((bool)$resultSet[$strPrefijo.'eliminacion']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setconsulta($resultSet[$strPrefijo.'consulta']=='f'? false:true );
				} else {
					$entity->setconsulta((bool)$resultSet[$strPrefijo.'consulta']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setbusqueda($resultSet[$strPrefijo.'busqueda']=='f'? false:true );
				} else {
					$entity->setbusqueda((bool)$resultSet[$strPrefijo.'busqueda']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setreporte($resultSet[$strPrefijo.'reporte']=='f'? false:true );
				} else {
					$entity->setreporte((bool)$resultSet[$strPrefijo.'reporte']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setestado($resultSet[$strPrefijo.'estado']=='f'? false:true );
				} else {
					$entity->setestado((bool)$resultSet[$strPrefijo.'estado']);
				}
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,perfil_opcion $perfil_opcion,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $perfil_opcion->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiiiiiii', $perfil_opcion->getid_perfil(),$perfil_opcion->getid_opcion(),$perfil_opcion->gettodo(),$perfil_opcion->getingreso(),$perfil_opcion->getmodificacion(),$perfil_opcion->geteliminacion(),$perfil_opcion->getconsulta(),$perfil_opcion->getbusqueda(),$perfil_opcion->getreporte(),$perfil_opcion->getestado());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiiiiiiiis', $perfil_opcion->getid_perfil(),$perfil_opcion->getid_opcion(),$perfil_opcion->gettodo(),$perfil_opcion->getingreso(),$perfil_opcion->getmodificacion(),$perfil_opcion->geteliminacion(),$perfil_opcion->getconsulta(),$perfil_opcion->getbusqueda(),$perfil_opcion->getreporte(),$perfil_opcion->getestado(), $perfil_opcion->getId(), Funciones::GetRealScapeString($perfil_opcion->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,perfil_opcion $perfil_opcion,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($perfil_opcion->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($perfil_opcion->getid_perfil(),$perfil_opcion->getid_opcion(),$perfil_opcion->gettodo(),$perfil_opcion->getingreso(),$perfil_opcion->getmodificacion(),$perfil_opcion->geteliminacion(),$perfil_opcion->getconsulta(),$perfil_opcion->getbusqueda(),$perfil_opcion->getreporte(),$perfil_opcion->getestado());
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($perfil_opcion->getid_perfil(),$perfil_opcion->getid_opcion(),$perfil_opcion->gettodo(),$perfil_opcion->getingreso(),$perfil_opcion->getmodificacion(),$perfil_opcion->geteliminacion(),$perfil_opcion->getconsulta(),$perfil_opcion->getbusqueda(),$perfil_opcion->getreporte(),$perfil_opcion->getestado(), $perfil_opcion->getId(), Funciones::GetRealScapeString($perfil_opcion->getVersionRow(),$connexion));
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
	
	public function setperfil_opcion_Original(perfil_opcion $perfil_opcion) {
		$perfil_opcion->setperfil_opcion_Original(clone $perfil_opcion);		
	}
	
	public function setperfil_opcions_Original(array $perfil_opcions) {
		foreach($perfil_opcions as $perfil_opcion){
			$perfil_opcion->setperfil_opcion_Original(clone $perfil_opcion);
		}
	}
	
	public static function setperfil_opcion_OriginalStatic(perfil_opcion $perfil_opcion) {
		$perfil_opcion->setperfil_opcion_Original(clone $perfil_opcion);		
	}
	
	public static function setperfil_opcions_OriginalStatic(array $perfil_opcions) {		
		foreach($perfil_opcions as $perfil_opcion){
			$perfil_opcion->setperfil_opcion_Original(clone $perfil_opcion);
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
