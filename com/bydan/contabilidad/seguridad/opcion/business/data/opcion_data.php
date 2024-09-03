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
namespace com\bydan\contabilidad\seguridad\opcion\business\data;

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

use com\bydan\contabilidad\seguridad\opcion\business\entity\opcion;

//FK


use com\bydan\contabilidad\seguridad\sistema\business\data\sistema_data;
use com\bydan\contabilidad\seguridad\sistema\business\entity\sistema;

use com\bydan\contabilidad\seguridad\grupo_opcion\business\data\grupo_opcion_data;
use com\bydan\contabilidad\seguridad\grupo_opcion\business\entity\grupo_opcion;

use com\bydan\contabilidad\seguridad\modulo\business\data\modulo_data;
use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;

//REL

use com\bydan\contabilidad\seguridad\perfil\business\data\perfil_data;
use com\bydan\contabilidad\seguridad\accion\business\data\accion_data;
use com\bydan\contabilidad\seguridad\perfil_opcion\business\data\perfil_opcion_data;
use com\bydan\contabilidad\seguridad\campo\business\data\campo_data;


class opcion_data extends GetEntitiesDataAccessHelper implements opcion_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='seg_';
	public static string $TABLE_NAME='seg_opcion';			
	public static string $TABLE_NAME_opcion='opcion';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_OPCION_INSERT(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_OPCION_UPDATE(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_OPCION_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_OPCION_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $opcion_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'opcion';
		
		opcion_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('SEGURIDAD');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->opcion_DataAccessAdditional=new opcionDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_sistema,id_opcion,id_grupo_opcion,id_modulo,codigo,nombre,posicion,icon_name,nombre_clase,modulo0,sub_modulo,paquete,es_para_menu,es_guardar_relaciones,con_mostrar_acciones_campo,estado) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%s,%d,%d,\'%s\',\'%s\',%d,\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%d\',\'%d\',\'%d\',\'%d\')';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_sistema=%d,id_opcion=%s,id_grupo_opcion=%d,id_modulo=%d,codigo=\'%s\',nombre=\'%s\',posicion=%d,icon_name=\'%s\',nombre_clase=\'%s\',modulo0=\'%s\',sub_modulo=\'%s\',paquete=\'%s\',es_para_menu=\'%d\',es_guardar_relaciones=\'%d\',con_mostrar_acciones_campo=\'%d\',estado=\'%d\' where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_sistema,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_opcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_grupo_opcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_modulo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.posicion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.icon_name,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_clase,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.modulo0,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.sub_modulo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.paquete,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.es_para_menu,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.es_guardar_relaciones,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_mostrar_acciones_campo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.estado from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(opcion $opcion,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($opcion->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=opcion_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($opcion->getId(),$connexion));				
				
			} else if ($opcion->getIsChanged()) {
				if($opcion->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=opcion_data::$QUERY_INSERT;
					
					
					
					

					//$id_opcion='null';
					//if($opcion->getid_opcion()!==null && $opcion->getid_opcion()>=0) {
						//$id_opcion=$opcion->getid_opcion();
					//} else {
						//$id_opcion='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$opcion->getid_sistema(),Funciones::GetNullString($opcion->getid_opcion()),$opcion->getid_grupo_opcion(),$opcion->getid_modulo(),Funciones::GetRealScapeString($opcion->getcodigo(),$connexion),Funciones::GetRealScapeString($opcion->getnombre(),$connexion),$opcion->getposicion(),Funciones::GetRealScapeString($opcion->geticon_name(),$connexion),Funciones::GetRealScapeString($opcion->getnombre_clase(),$connexion),Funciones::GetRealScapeString($opcion->getmodulo0(),$connexion),Funciones::GetRealScapeString($opcion->getsub_modulo(),$connexion),Funciones::GetRealScapeString($opcion->getpaquete(),$connexion),$opcion->getes_para_menu(),$opcion->getes_guardar_relaciones(),$opcion->getcon_mostrar_acciones_campo(),$opcion->getestado() );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=opcion_data::$QUERY_UPDATE;			
					
					
					
					

					//$id_opcion='null';
					//if($opcion->getid_opcion()!==null && $opcion->getid_opcion()>=0) {
						//$id_opcion=$opcion->getid_opcion();
					//} else {
						//$id_opcion='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$opcion->getid_sistema(),Funciones::GetNullString($opcion->getid_opcion()),$opcion->getid_grupo_opcion(),$opcion->getid_modulo(),Funciones::GetRealScapeString($opcion->getcodigo(),$connexion),Funciones::GetRealScapeString($opcion->getnombre(),$connexion),$opcion->getposicion(),Funciones::GetRealScapeString($opcion->geticon_name(),$connexion),Funciones::GetRealScapeString($opcion->getnombre_clase(),$connexion),Funciones::GetRealScapeString($opcion->getmodulo0(),$connexion),Funciones::GetRealScapeString($opcion->getsub_modulo(),$connexion),Funciones::GetRealScapeString($opcion->getpaquete(),$connexion),$opcion->getes_para_menu(),$opcion->getes_guardar_relaciones(),$opcion->getcon_mostrar_acciones_campo(),$opcion->getestado(), Funciones::GetRealScapeString($opcion->getId(),$connexion), Funciones::GetRealScapeString($opcion->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($opcion, $connexion,$strQuerySaveComplete,opcion_data::$TABLE_NAME,opcion_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				opcion_data::savePrepared($opcion, $connexion,$strQuerySave,opcion_data::$TABLE_NAME,opcion_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			opcion_data::setopcion_OriginalStatic($opcion);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(opcion $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				opcion_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					opcion_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					opcion_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(opcion $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					opcion_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(opcion $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					opcion_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(opcion $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					opcion_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?opcion {		
		$entity = new opcion();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=opcion_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=opcion_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//Seguridad.opcion.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setopcion_Original(new opcion());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,opcion_data::$IS_WITH_SCHEMA);         	    
				/*$entity=opcion_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				$entity->setopcion_Original(parent::getEntityPrefijoEntityResult("",$entity->getopcion_Original(),$resultSet,opcion_data::$IS_WITH_SCHEMA));         						
      	    	//$entity->setopcion_Original(opcion_data::getEntityBaseResult("",$entity->getopcion_Original(),$resultSet));
				$entity->setopcion_Original($this->getEntityBaseResult("",$entity->getopcion_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?opcion {
		$entity = new opcion();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=opcion_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=opcion_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,opcion_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".Seguridad.opcion.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setopcion_Original(new opcion());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,opcion_data::$IS_WITH_SCHEMA);         	    
				/*$entity=opcion_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				$entity->setopcion_Original(parent::getEntityPrefijoEntityResult("",$entity->getopcion_Original(),$resultSet,opcion_data::$IS_WITH_SCHEMA));         		
				//$entity->setopcion_Original(opcion_data::getEntityBaseResult("",$entity->getopcion_Original(),$resultSet));
				$entity->setopcion_Original($this->getEntityBaseResult("",$entity->getopcion_Original(),$resultSet));
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
		$entity = new opcion();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=opcion_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=opcion_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,opcion_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new opcion();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,opcion_data::$IS_WITH_SCHEMA);         		
				/*$entity=opcion_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				$entity->setopcion_Original( new opcion());
				
				$entity->setopcion_Original(parent::getEntityPrefijoEntityResult("",$entity->getopcion_Original(),$resultSet,opcion_data::$IS_WITH_SCHEMA));         		
				//$entity->setopcion_Original(opcion_data::getEntityBaseResult("",$entity->getopcion_Original(),$resultSet));
				$entity->setopcion_Original($this->getEntityBaseResult("",$entity->getopcion_Original(),$resultSet));
								
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
		$entity = new opcion();		  
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
      	    	$entity = new opcion();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,opcion_data::$IS_WITH_SCHEMA);         		
				/*$entity=opcion_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				$entity->setopcion_Original( new opcion());
				
				$entity->setopcion_Original(parent::getEntityPrefijoEntityResult("",$entity->getopcion_Original(),$resultSet,opcion_data::$IS_WITH_SCHEMA));         		
				//$entity->setopcion_Original(opcion_data::getEntityBaseResult("",$entity->getopcion_Original(),$resultSet));
				$entity->setopcion_Original($this->getEntityBaseResult("",$entity->getopcion_Original(),$resultSet));
				
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
		$entity = new opcion();		  
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
      	    	$entity = new opcion();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,opcion_data::$IS_WITH_SCHEMA);         		
				/*$entity=opcion_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				$entity->setopcion_Original( new opcion());				
				$entity->setopcion_Original(parent::getEntityPrefijoEntityResult("",$entity->getopcion_Original(),$resultSet,opcion_data::$IS_WITH_SCHEMA));         		
				
      	    	//$entity->setopcion_Original(opcion_data::getEntityBaseResult("",$entity->getopcion_Original(),$resultSet));
				$entity->setopcion_Original($this->getEntityBaseResult("",$entity->getopcion_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=opcion_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,opcion $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,opcion_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,opcion_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getsistema(Connexion $connexion,$relopcion) : ?sistema{

		$sistema= new sistema();

		try {
			$sistemaDataAccess=new sistema_data();
			$sistemaDataAccess->isForFKData=$this->isForFKDataRels;
			$sistema=$sistemaDataAccess->getEntity($connexion,$relopcion->getid_sistema());

		} catch(Exception $e) {
			throw $e;
		}

		return $sistema;
	}


	public function  getopcion(Connexion $connexion,$relopcion) : ?opcion{

		$opcion= new opcion();

		try {
			$opcionDataAccess=new opcion_data();
			$opcionDataAccess->isForFKData=$this->isForFKDataRels;
			$opcion=$opcionDataAccess->getEntity($connexion,$relopcion->getid_opcion());

		} catch(Exception $e) {
			throw $e;
		}

		return $opcion;
	}


	public function  getgrupo_opcion(Connexion $connexion,$relopcion) : ?grupo_opcion{

		$grupo_opcion= new grupo_opcion();

		try {
			$grupo_opcionDataAccess=new grupo_opcion_data();
			$grupo_opcionDataAccess->isForFKData=$this->isForFKDataRels;
			$grupo_opcion=$grupo_opcionDataAccess->getEntity($connexion,$relopcion->getid_grupo_opcion());

		} catch(Exception $e) {
			throw $e;
		}

		return $grupo_opcion;
	}


	public function  getmodulo(Connexion $connexion,$relopcion) : ?modulo{

		$modulo= new modulo();

		try {
			$moduloDataAccess=new modulo_data();
			$moduloDataAccess->isForFKData=$this->isForFKDataRels;
			$modulo=$moduloDataAccess->getEntity($connexion,$relopcion->getid_modulo());

		} catch(Exception $e) {
			throw $e;
		}

		return $modulo;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	public function  getperfils(Connexion $connexion,opcion $opcion) : array {

		$perfils= array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.perfil_opcion_data::$SCHEMA.".".perfil_opcion_data::$TABLE_NAME." ON ".Constantes::$STR_PREFIJO_SCHEMA.perfil_opcion_data::$SCHEMA.".".perfil_opcion_data::$TABLE_NAME.".id_perfil=".Constantes::$STR_PREFIJO_SCHEMA.perfil_data::$SCHEMA.".".perfil_data::$TABLE_NAME.".id INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME." ON ".Constantes::$STR_PREFIJO_SCHEMA.perfil_opcion_data::$SCHEMA.".".perfil_opcion_data::$TABLE_NAME.".idopcion=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$opcion->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$perfilDataAccess=new perfil_data();

			$perfils=$perfilDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $perfils;
	}


	public function  getopcions(Connexion $connexion,opcion $opcion) : array {

		$opcions=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  as opcion_aux ON ".Constantes::$STR_PREFIJO_SCHEMA.opcion_data::$SCHEMA.".".opcion_data::$TABLE_NAME.".id_opcion="."opcion_aux".".id WHERE "."opcion_aux".".id=".$opcion->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$opcionDataAccess=new opcion_data();

			$opcions=$opcionDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $opcions;
	}


	public function  getaccions(Connexion $connexion,opcion $opcion) : array {

		$accions=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.accion_data::$SCHEMA.".".accion_data::$TABLE_NAME.".id_opcion=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$opcion->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$accionDataAccess=new accion_data();

			$accions=$accionDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $accions;
	}


	public function  getperfil_opcions(Connexion $connexion,opcion $opcion) : array {

		$perfilopcions=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.perfil_opcion_data::$SCHEMA.".".perfil_opcion_data::$TABLE_NAME.".id_opcion=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$opcion->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$perfilopcionDataAccess=new perfil_opcion_data();

			$perfilopcions=$perfilopcionDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $perfilopcions;
	}


	public function  getcampos(Connexion $connexion,opcion $opcion) : array {

		$campos=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.campo_data::$SCHEMA.".".campo_data::$TABLE_NAME.".id_opcion=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$opcion->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$campoDataAccess=new campo_data();

			$campos=$campoDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $campos;
	}


	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,opcion $entity,$resultSet) : opcion {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_sistema((int)$resultSet[$strPrefijo.'id_sistema']);
				$entity->setid_opcion((int)$resultSet[$strPrefijo.'id_opcion']);
				$entity->setid_grupo_opcion((int)$resultSet[$strPrefijo.'id_grupo_opcion']);
				$entity->setid_modulo((int)$resultSet[$strPrefijo.'id_modulo']);
				$entity->setcodigo(utf8_encode($resultSet[$strPrefijo.'codigo']));
				$entity->setnombre(utf8_encode($resultSet[$strPrefijo.'nombre']));
				$entity->setposicion((int)$resultSet[$strPrefijo.'posicion']);
				$entity->seticon_name(utf8_encode($resultSet[$strPrefijo.'icon_name']));
				$entity->setnombre_clase(utf8_encode($resultSet[$strPrefijo.'nombre_clase']));
				$entity->setmodulo0(utf8_encode($resultSet[$strPrefijo.'modulo0']));
				$entity->setsub_modulo(utf8_encode($resultSet[$strPrefijo.'sub_modulo']));
				$entity->setpaquete(utf8_encode($resultSet[$strPrefijo.'paquete']));
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setes_para_menu($resultSet[$strPrefijo.'es_para_menu']=='f'? false:true );
				} else {
					$entity->setes_para_menu((bool)$resultSet[$strPrefijo.'es_para_menu']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setes_guardar_relaciones($resultSet[$strPrefijo.'es_guardar_relaciones']=='f'? false:true );
				} else {
					$entity->setes_guardar_relaciones((bool)$resultSet[$strPrefijo.'es_guardar_relaciones']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setcon_mostrar_acciones_campo($resultSet[$strPrefijo.'con_mostrar_acciones_campo']=='f'? false:true );
				} else {
					$entity->setcon_mostrar_acciones_campo((bool)$resultSet[$strPrefijo.'con_mostrar_acciones_campo']);
				}
				
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
	
	public static function addPrepareStatementParams(string $type,opcion $opcion,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $opcion->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiississsssiiii', $opcion->getid_sistema(),$opcion->getid_opcion(),$opcion->getid_grupo_opcion(),$opcion->getid_modulo(),$opcion->getcodigo(),$opcion->getnombre(),$opcion->getposicion(),$opcion->geticon_name(),$opcion->getnombre_clase(),$opcion->getmodulo0(),$opcion->getsub_modulo(),$opcion->getpaquete(),$opcion->getes_para_menu(),$opcion->getes_guardar_relaciones(),$opcion->getcon_mostrar_acciones_campo(),$opcion->getestado());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiississsssiiiiis', $opcion->getid_sistema(),$opcion->getid_opcion(),$opcion->getid_grupo_opcion(),$opcion->getid_modulo(),$opcion->getcodigo(),$opcion->getnombre(),$opcion->getposicion(),$opcion->geticon_name(),$opcion->getnombre_clase(),$opcion->getmodulo0(),$opcion->getsub_modulo(),$opcion->getpaquete(),$opcion->getes_para_menu(),$opcion->getes_guardar_relaciones(),$opcion->getcon_mostrar_acciones_campo(),$opcion->getestado(), $opcion->getId(), Funciones::GetRealScapeString($opcion->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,opcion $opcion,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($opcion->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($opcion->getid_sistema(),Funciones::GetNullString($opcion->getid_opcion()),$opcion->getid_grupo_opcion(),$opcion->getid_modulo(),Funciones::GetRealScapeString($opcion->getcodigo(),$connexion),Funciones::GetRealScapeString($opcion->getnombre(),$connexion),$opcion->getposicion(),Funciones::GetRealScapeString($opcion->geticon_name(),$connexion),Funciones::GetRealScapeString($opcion->getnombre_clase(),$connexion),Funciones::GetRealScapeString($opcion->getmodulo0(),$connexion),Funciones::GetRealScapeString($opcion->getsub_modulo(),$connexion),Funciones::GetRealScapeString($opcion->getpaquete(),$connexion),$opcion->getes_para_menu(),$opcion->getes_guardar_relaciones(),$opcion->getcon_mostrar_acciones_campo(),$opcion->getestado());
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($opcion->getid_sistema(),Funciones::GetNullString($opcion->getid_opcion()),$opcion->getid_grupo_opcion(),$opcion->getid_modulo(),Funciones::GetRealScapeString($opcion->getcodigo(),$connexion),Funciones::GetRealScapeString($opcion->getnombre(),$connexion),$opcion->getposicion(),Funciones::GetRealScapeString($opcion->geticon_name(),$connexion),Funciones::GetRealScapeString($opcion->getnombre_clase(),$connexion),Funciones::GetRealScapeString($opcion->getmodulo0(),$connexion),Funciones::GetRealScapeString($opcion->getsub_modulo(),$connexion),Funciones::GetRealScapeString($opcion->getpaquete(),$connexion),$opcion->getes_para_menu(),$opcion->getes_guardar_relaciones(),$opcion->getcon_mostrar_acciones_campo(),$opcion->getestado(), $opcion->getId(), Funciones::GetRealScapeString($opcion->getVersionRow(),$connexion));
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
	
	public function setopcion_Original(opcion $opcion) {
		$opcion->setopcion_Original(clone $opcion);		
	}
	
	public function setopcions_Original(array $opcions) {
		foreach($opcions as $opcion){
			$opcion->setopcion_Original(clone $opcion);
		}
	}
	
	public static function setopcion_OriginalStatic(opcion $opcion) {
		$opcion->setopcion_Original(clone $opcion);		
	}
	
	public static function setopcions_OriginalStatic(array $opcions) {		
		foreach($opcions as $opcion){
			$opcion->setopcion_Original(clone $opcion);
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
