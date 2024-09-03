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
namespace com\bydan\contabilidad\seguridad\usuario\business\data;

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

use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;

//FK


//REL

use com\bydan\contabilidad\seguridad\historial_cambio_clave\business\data\historial_cambio_clave_data;
use com\bydan\contabilidad\seguridad\resumen_usuario\business\data\resumen_usuario_data;
use com\bydan\contabilidad\seguridad\auditoria\business\data\auditoria_data;
use com\bydan\contabilidad\seguridad\perfil\business\data\perfil_data;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\data\parametro_general_usuario_data;
use com\bydan\contabilidad\seguridad\perfil_usuario\business\data\perfil_usuario_data;
use com\bydan\contabilidad\seguridad\dato_general_usuario\business\entity\dato_general_usuario;
use com\bydan\contabilidad\seguridad\dato_general_usuario\business\data\dato_general_usuario_data;


class usuario_data extends GetEntitiesDataAccessHelper implements usuario_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='seg_';
	public static string $TABLE_NAME='seg_usuario';			
	public static string $TABLE_NAME_usuario='usuario';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_USUARIO_INSERT(??,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_USUARIO_UPDATE(??,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_USUARIO_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_USUARIO_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//true;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $usuario_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'usuario';
		
		usuario_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('SEGURIDAD');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->usuario_DataAccessAdditional=new usuarioDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,user_name,clave,confirmar_clave,nombre,codigo_alterno,tipo,estado) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%d\',\'%d\')';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,user_name=\'%s\',clave=\'%s\',confirmar_clave=\'%s\',nombre=\'%s\',codigo_alterno=\'%s\',tipo=\'%d\',estado=\'%d\' where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.user_name,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.clave,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.confirmar_clave,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo_alterno,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.tipo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.estado from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.user_name from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(usuario $usuario,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($usuario->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=usuario_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($usuario->getId(),$connexion));				
				
			} else if ($usuario->getIsChanged()) {
				if($usuario->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=usuario_data::$QUERY_INSERT;
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($usuario->getuser_name(),$connexion),Funciones::GetRealScapeString($usuario->getclave(),$connexion),Funciones::GetRealScapeString($usuario->getconfirmar_clave(),$connexion),Funciones::GetRealScapeString($usuario->getnombre(),$connexion),Funciones::GetRealScapeString($usuario->getcodigo_alterno(),$connexion),$usuario->gettipo(),$usuario->getestado() );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=usuario_data::$QUERY_UPDATE;			
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($usuario->getuser_name(),$connexion),Funciones::GetRealScapeString($usuario->getclave(),$connexion),Funciones::GetRealScapeString($usuario->getconfirmar_clave(),$connexion),Funciones::GetRealScapeString($usuario->getnombre(),$connexion),Funciones::GetRealScapeString($usuario->getcodigo_alterno(),$connexion),$usuario->gettipo(),$usuario->getestado(), Funciones::GetRealScapeString($usuario->getId(),$connexion), Funciones::GetRealScapeString($usuario->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($usuario, $connexion,$strQuerySaveComplete,usuario_data::$TABLE_NAME,usuario_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				usuario_data::savePrepared($usuario, $connexion,$strQuerySave,usuario_data::$TABLE_NAME,usuario_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			usuario_data::setusuario_OriginalStatic($usuario);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(usuario $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				usuario_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					usuario_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					usuario_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(usuario $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					usuario_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(usuario $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					usuario_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(usuario $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					usuario_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?usuario {		
		$entity = new usuario();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=usuario_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=usuario_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//Seguridad.usuario.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setusuario_Original(new usuario());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,usuario_data::$IS_WITH_SCHEMA);         	    
				/*$entity=usuario_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				$entity->setusuario_Original(parent::getEntityPrefijoEntityResult("",$entity->getusuario_Original(),$resultSet,usuario_data::$IS_WITH_SCHEMA));         						
      	    	//$entity->setusuario_Original(usuario_data::getEntityBaseResult("",$entity->getusuario_Original(),$resultSet));
				$entity->setusuario_Original($this->getEntityBaseResult("",$entity->getusuario_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?usuario {
		$entity = new usuario();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=usuario_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=usuario_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,usuario_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".Seguridad.usuario.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setusuario_Original(new usuario());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,usuario_data::$IS_WITH_SCHEMA);         	    
				/*$entity=usuario_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				$entity->setusuario_Original(parent::getEntityPrefijoEntityResult("",$entity->getusuario_Original(),$resultSet,usuario_data::$IS_WITH_SCHEMA));         		
				//$entity->setusuario_Original(usuario_data::getEntityBaseResult("",$entity->getusuario_Original(),$resultSet));
				$entity->setusuario_Original($this->getEntityBaseResult("",$entity->getusuario_Original(),$resultSet));
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
		$entity = new usuario();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=usuario_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=usuario_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,usuario_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new usuario();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,usuario_data::$IS_WITH_SCHEMA);         		
				/*$entity=usuario_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				$entity->setusuario_Original( new usuario());
				
				$entity->setusuario_Original(parent::getEntityPrefijoEntityResult("",$entity->getusuario_Original(),$resultSet,usuario_data::$IS_WITH_SCHEMA));         		
				//$entity->setusuario_Original(usuario_data::getEntityBaseResult("",$entity->getusuario_Original(),$resultSet));
				$entity->setusuario_Original($this->getEntityBaseResult("",$entity->getusuario_Original(),$resultSet));
								
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
		$entity = new usuario();		  
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
      	    	$entity = new usuario();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,usuario_data::$IS_WITH_SCHEMA);         		
				/*$entity=usuario_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				$entity->setusuario_Original( new usuario());
				
				$entity->setusuario_Original(parent::getEntityPrefijoEntityResult("",$entity->getusuario_Original(),$resultSet,usuario_data::$IS_WITH_SCHEMA));         		
				//$entity->setusuario_Original(usuario_data::getEntityBaseResult("",$entity->getusuario_Original(),$resultSet));
				$entity->setusuario_Original($this->getEntityBaseResult("",$entity->getusuario_Original(),$resultSet));
				
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
		$entity = new usuario();		  
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
      	    	$entity = new usuario();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,usuario_data::$IS_WITH_SCHEMA);         		
				/*$entity=usuario_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				$entity->setusuario_Original( new usuario());				
				$entity->setusuario_Original(parent::getEntityPrefijoEntityResult("",$entity->getusuario_Original(),$resultSet,usuario_data::$IS_WITH_SCHEMA));         		
				
      	    	//$entity->setusuario_Original(usuario_data::getEntityBaseResult("",$entity->getusuario_Original(),$resultSet));
				$entity->setusuario_Original($this->getEntityBaseResult("",$entity->getusuario_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=usuario_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,usuario $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,usuario_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,usuario_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  gethistorial_cambio_claves(Connexion $connexion,usuario $usuario) : array {

		$historialcambioclaves=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.historial_cambio_clave_data::$SCHEMA.".".historial_cambio_clave_data::$TABLE_NAME.".id_usuario=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$usuario->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$historialcambioclaveDataAccess=new historial_cambio_clave_data();

			$historialcambioclaves=$historialcambioclaveDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $historialcambioclaves;
	}


	public function  getresumen_usuarios(Connexion $connexion,usuario $usuario) : array {

		$resumenusuarios=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.resumen_usuario_data::$SCHEMA.".".resumen_usuario_data::$TABLE_NAME.".id_usuario=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$usuario->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$resumenusuarioDataAccess=new resumen_usuario_data();

			$resumenusuarios=$resumenusuarioDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $resumenusuarios;
	}


	public function  getauditorias(Connexion $connexion,usuario $usuario) : array {

		$auditorias=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.auditoria_data::$SCHEMA.".".auditoria_data::$TABLE_NAME.".id_usuario=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$usuario->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$auditoriaDataAccess=new auditoria_data();

			$auditorias=$auditoriaDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $auditorias;
	}


	public function  getperfils(Connexion $connexion,usuario $usuario) : array {

		$perfils= array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.perfil_usuario_data::$SCHEMA.".".perfil_usuario_data::$TABLE_NAME." ON ".Constantes::$STR_PREFIJO_SCHEMA.perfil_usuario_data::$SCHEMA.".".perfil_usuario_data::$TABLE_NAME.".id_perfil=".Constantes::$STR_PREFIJO_SCHEMA.perfil_data::$SCHEMA.".".perfil_data::$TABLE_NAME.".id INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME." ON ".Constantes::$STR_PREFIJO_SCHEMA.perfil_usuario_data::$SCHEMA.".".perfil_usuario_data::$TABLE_NAME.".idusuario=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$usuario->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$perfilDataAccess=new perfil_data();

			$perfils=$perfilDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $perfils;
	}


	public function  getparametro_general_usuario(Connexion $connexion,usuario $usuario) : ?parametro_general_usuario {

		$parametrogeneralusuario= new parametro_general_usuario();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME." ON ".Constantes::$STR_PREFIJO_SCHEMA.parametro_general_usuario_data::$SCHEMA.".".parametro_general_usuario_data::$TABLE_NAME.".idusuario=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$usuario->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parametrogeneralusuarioDataAccess=new parametro_general_usuario_data();

			$parametrogeneralusuario=$parametrogeneralusuarioDataAccess->getEntity($connexion,$usuario->getId());

		} catch(Exception $e) {
			throw $e;
		}

		return $parametrogeneralusuario;
	}


	public function  getperfil_usuarios(Connexion $connexion,usuario $usuario) : array {

		$perfilusuarios=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.perfil_usuario_data::$SCHEMA.".".perfil_usuario_data::$TABLE_NAME.".id_usuario=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$usuario->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$perfilusuarioDataAccess=new perfil_usuario_data();

			$perfilusuarios=$perfilusuarioDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $perfilusuarios;
	}


	public function  getdato_general_usuario(Connexion $connexion,usuario $usuario) : ?dato_general_usuario {

		$datogeneralusuario= new dato_general_usuario();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME." ON ".Constantes::$STR_PREFIJO_SCHEMA.dato_general_usuario_data::$SCHEMA.".".dato_general_usuario_data::$TABLE_NAME.".idusuario=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$usuario->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$datogeneralusuarioDataAccess=new dato_general_usuario_data();

			$datogeneralusuario=$datogeneralusuarioDataAccess->getEntity($connexion,$usuario->getId());

		} catch(Exception $e) {
			throw $e;
		}

		return $datogeneralusuario;
	}


	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,usuario $entity,$resultSet) : usuario {
        try {     	
			if(!$this->isForFKData) {
				$entity->setuser_name(utf8_encode($resultSet[$strPrefijo.'user_name']));
				$entity->setclave(utf8_encode($resultSet[$strPrefijo.'clave']));
				$entity->setconfirmar_clave(utf8_encode($resultSet[$strPrefijo.'confirmar_clave']));
				$entity->setnombre(utf8_encode($resultSet[$strPrefijo.'nombre']));
				$entity->setcodigo_alterno(utf8_encode($resultSet[$strPrefijo.'codigo_alterno']));
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->settipo($resultSet[$strPrefijo.'tipo']=='f'? false:true );
				} else {
					$entity->settipo((bool)$resultSet[$strPrefijo.'tipo']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setestado($resultSet[$strPrefijo.'estado']=='f'? false:true );
				} else {
					$entity->setestado((bool)$resultSet[$strPrefijo.'estado']);
				}
			} else {
				$entity->setuser_name(utf8_encode($resultSet[$strPrefijo.'user_name']));								
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,usuario $usuario,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $usuario->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'sssssii', $usuario->getuser_name(),$usuario->getclave(),$usuario->getconfirmar_clave(),$usuario->getnombre(),$usuario->getcodigo_alterno(),$usuario->gettipo(),$usuario->getestado());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'sssssiiis', $usuario->getuser_name(),$usuario->getclave(),$usuario->getconfirmar_clave(),$usuario->getnombre(),$usuario->getcodigo_alterno(),$usuario->gettipo(),$usuario->getestado(), $usuario->getId(), Funciones::GetRealScapeString($usuario->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,usuario $usuario,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($usuario->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array(Funciones::GetRealScapeString($usuario->getuser_name(),$connexion),Funciones::GetRealScapeString($usuario->getclave(),$connexion),Funciones::GetRealScapeString($usuario->getconfirmar_clave(),$connexion),Funciones::GetRealScapeString($usuario->getnombre(),$connexion),Funciones::GetRealScapeString($usuario->getcodigo_alterno(),$connexion),$usuario->gettipo(),$usuario->getestado());
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array(Funciones::GetRealScapeString($usuario->getuser_name(),$connexion),Funciones::GetRealScapeString($usuario->getclave(),$connexion),Funciones::GetRealScapeString($usuario->getconfirmar_clave(),$connexion),Funciones::GetRealScapeString($usuario->getnombre(),$connexion),Funciones::GetRealScapeString($usuario->getcodigo_alterno(),$connexion),$usuario->gettipo(),$usuario->getestado(), $usuario->getId(), Funciones::GetRealScapeString($usuario->getVersionRow(),$connexion));
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
	
	public function setusuario_Original(usuario $usuario) {
		$usuario->setusuario_Original(clone $usuario);		
	}
	
	public function setusuarios_Original(array $usuarios) {
		foreach($usuarios as $usuario){
			$usuario->setusuario_Original(clone $usuario);
		}
	}
	
	public static function setusuario_OriginalStatic(usuario $usuario) {
		$usuario->setusuario_Original(clone $usuario);		
	}
	
	public static function setusuarios_OriginalStatic(array $usuarios) {		
		foreach($usuarios as $usuario){
			$usuario->setusuario_Original(clone $usuario);
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
