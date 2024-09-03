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
namespace com\bydan\contabilidad\seguridad\resumen_usuario\business\data;

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

use com\bydan\contabilidad\seguridad\resumen_usuario\business\entity\resumen_usuario;

//FK


use com\bydan\contabilidad\seguridad\usuario\business\data\usuario_data;
use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;

//REL



class resumen_usuario_data extends GetEntitiesDataAccessHelper implements resumen_usuario_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='seg_';
	public static string $TABLE_NAME='seg_resumen_usuario';			
	public static string $TABLE_NAME_resumen_usuario='resumen_usuario';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_RESUMEN_USUARIO_INSERT(??,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_RESUMEN_USUARIO_UPDATE(??,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_RESUMEN_USUARIO_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_RESUMEN_USUARIO_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $resumen_usuario_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'resumen_usuario';
		
		resumen_usuario_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('SEGURIDAD');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->resumen_usuario_DataAccessAdditional=new resumen_usuarioDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_usuario,numero_ingresos,numero_error_ingreso,numero_intentos,numero_cierres,numero_reinicios,numero_ingreso_actual,fecha_ultimo_ingreso,fecha_ultimo_error_ingreso,fecha_ultimo_intento,fecha_ultimo_cierre) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%d,%d,%d,%d,%d,%d,\'%s\',\'%s\',\'%s\',\'%s\')';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_usuario=%d,numero_ingresos=%d,numero_error_ingreso=%d,numero_intentos=%d,numero_cierres=%d,numero_reinicios=%d,numero_ingreso_actual=%d,fecha_ultimo_ingreso=\'%s\',fecha_ultimo_error_ingreso=\'%s\',fecha_ultimo_intento=\'%s\',fecha_ultimo_cierre=\'%s\' where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_usuario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_ingresos,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_error_ingreso,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_intentos,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_cierres,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_reinicios,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_ingreso_actual,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_ultimo_ingreso,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_ultimo_error_ingreso,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_ultimo_intento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_ultimo_cierre from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(resumen_usuario $resumen_usuario,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($resumen_usuario->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=resumen_usuario_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($resumen_usuario->getId(),$connexion));				
				
			} else if ($resumen_usuario->getIsChanged()) {
				if($resumen_usuario->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=resumen_usuario_data::$QUERY_INSERT;
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$resumen_usuario->getid_usuario(),$resumen_usuario->getnumero_ingresos(),$resumen_usuario->getnumero_error_ingreso(),$resumen_usuario->getnumero_intentos(),$resumen_usuario->getnumero_cierres(),$resumen_usuario->getnumero_reinicios(),$resumen_usuario->getnumero_ingreso_actual(),Funciones::GetRealScapeString($resumen_usuario->getfecha_ultimo_ingreso(),$connexion),Funciones::GetRealScapeString($resumen_usuario->getfecha_ultimo_error_ingreso(),$connexion),Funciones::GetRealScapeString($resumen_usuario->getfecha_ultimo_intento(),$connexion),Funciones::GetRealScapeString($resumen_usuario->getfecha_ultimo_cierre(),$connexion) );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=resumen_usuario_data::$QUERY_UPDATE;			
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$resumen_usuario->getid_usuario(),$resumen_usuario->getnumero_ingresos(),$resumen_usuario->getnumero_error_ingreso(),$resumen_usuario->getnumero_intentos(),$resumen_usuario->getnumero_cierres(),$resumen_usuario->getnumero_reinicios(),$resumen_usuario->getnumero_ingreso_actual(),Funciones::GetRealScapeString($resumen_usuario->getfecha_ultimo_ingreso(),$connexion),Funciones::GetRealScapeString($resumen_usuario->getfecha_ultimo_error_ingreso(),$connexion),Funciones::GetRealScapeString($resumen_usuario->getfecha_ultimo_intento(),$connexion),Funciones::GetRealScapeString($resumen_usuario->getfecha_ultimo_cierre(),$connexion), Funciones::GetRealScapeString($resumen_usuario->getId(),$connexion), Funciones::GetRealScapeString($resumen_usuario->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($resumen_usuario, $connexion,$strQuerySaveComplete,resumen_usuario_data::$TABLE_NAME,resumen_usuario_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				resumen_usuario_data::savePrepared($resumen_usuario, $connexion,$strQuerySave,resumen_usuario_data::$TABLE_NAME,resumen_usuario_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			resumen_usuario_data::setresumen_usuario_OriginalStatic($resumen_usuario);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(resumen_usuario $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				resumen_usuario_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					resumen_usuario_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					resumen_usuario_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(resumen_usuario $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					resumen_usuario_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(resumen_usuario $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					resumen_usuario_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(resumen_usuario $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					resumen_usuario_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?resumen_usuario {		
		$entity = new resumen_usuario();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=resumen_usuario_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=resumen_usuario_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//Seguridad.resumen_usuario.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setresumen_usuario_Original(new resumen_usuario());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,resumen_usuario_data::$IS_WITH_SCHEMA);         	    
				/*$entity=resumen_usuario_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setresumen_usuario_Original(parent::getEntityPrefijoEntityResult("",$entity->getresumen_usuario_Original(),$resultSet,resumen_usuario_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setresumen_usuario_Original(resumen_usuario_data::getEntityBaseResult("",$entity->getresumen_usuario_Original(),$resultSet));
				//$entity->setresumen_usuario_Original($this->getEntityBaseResult("",$entity->getresumen_usuario_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?resumen_usuario {
		$entity = new resumen_usuario();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=resumen_usuario_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=resumen_usuario_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,resumen_usuario_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".Seguridad.resumen_usuario.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setresumen_usuario_Original(new resumen_usuario());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,resumen_usuario_data::$IS_WITH_SCHEMA);         	    
				/*$entity=resumen_usuario_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setresumen_usuario_Original(parent::getEntityPrefijoEntityResult("",$entity->getresumen_usuario_Original(),$resultSet,resumen_usuario_data::$IS_WITH_SCHEMA));         		
				////$entity->setresumen_usuario_Original(resumen_usuario_data::getEntityBaseResult("",$entity->getresumen_usuario_Original(),$resultSet));
				//$entity->setresumen_usuario_Original($this->getEntityBaseResult("",$entity->getresumen_usuario_Original(),$resultSet));
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
		$entity = new resumen_usuario();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=resumen_usuario_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=resumen_usuario_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,resumen_usuario_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new resumen_usuario();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,resumen_usuario_data::$IS_WITH_SCHEMA);         		
				/*$entity=resumen_usuario_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setresumen_usuario_Original( new resumen_usuario());
				
				//$entity->setresumen_usuario_Original(parent::getEntityPrefijoEntityResult("",$entity->getresumen_usuario_Original(),$resultSet,resumen_usuario_data::$IS_WITH_SCHEMA));         		
				////$entity->setresumen_usuario_Original(resumen_usuario_data::getEntityBaseResult("",$entity->getresumen_usuario_Original(),$resultSet));
				//$entity->setresumen_usuario_Original($this->getEntityBaseResult("",$entity->getresumen_usuario_Original(),$resultSet));
								
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
		$entity = new resumen_usuario();		  
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
      	    	$entity = new resumen_usuario();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,resumen_usuario_data::$IS_WITH_SCHEMA);         		
				/*$entity=resumen_usuario_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setresumen_usuario_Original( new resumen_usuario());
				
				//$entity->setresumen_usuario_Original(parent::getEntityPrefijoEntityResult("",$entity->getresumen_usuario_Original(),$resultSet,resumen_usuario_data::$IS_WITH_SCHEMA));         		
				////$entity->setresumen_usuario_Original(resumen_usuario_data::getEntityBaseResult("",$entity->getresumen_usuario_Original(),$resultSet));
				//$entity->setresumen_usuario_Original($this->getEntityBaseResult("",$entity->getresumen_usuario_Original(),$resultSet));
				
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
		$entity = new resumen_usuario();		  
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
      	    	$entity = new resumen_usuario();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,resumen_usuario_data::$IS_WITH_SCHEMA);         		
				/*$entity=resumen_usuario_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setresumen_usuario_Original( new resumen_usuario());				
				//$entity->setresumen_usuario_Original(parent::getEntityPrefijoEntityResult("",$entity->getresumen_usuario_Original(),$resultSet,resumen_usuario_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setresumen_usuario_Original(resumen_usuario_data::getEntityBaseResult("",$entity->getresumen_usuario_Original(),$resultSet));
				//$entity->setresumen_usuario_Original($this->getEntityBaseResult("",$entity->getresumen_usuario_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=resumen_usuario_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,resumen_usuario $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,resumen_usuario_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,resumen_usuario_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getusuario(Connexion $connexion,$relresumen_usuario) : ?usuario{

		$usuario= new usuario();

		try {
			$usuarioDataAccess=new usuario_data();
			$usuarioDataAccess->isForFKData=$this->isForFKDataRels;
			$usuario=$usuarioDataAccess->getEntity($connexion,$relresumen_usuario->getid_usuario());

		} catch(Exception $e) {
			throw $e;
		}

		return $usuario;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,resumen_usuario $entity,$resultSet) : resumen_usuario {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_usuario((int)$resultSet[$strPrefijo.'id_usuario']);
				$entity->setnumero_ingresos((int)$resultSet[$strPrefijo.'numero_ingresos']);
				$entity->setnumero_error_ingreso((int)$resultSet[$strPrefijo.'numero_error_ingreso']);
				$entity->setnumero_intentos((int)$resultSet[$strPrefijo.'numero_intentos']);
				$entity->setnumero_cierres((int)$resultSet[$strPrefijo.'numero_cierres']);
				$entity->setnumero_reinicios((int)$resultSet[$strPrefijo.'numero_reinicios']);
				$entity->setnumero_ingreso_actual((int)$resultSet[$strPrefijo.'numero_ingreso_actual']);
				$entity->setfecha_ultimo_ingreso($resultSet[$strPrefijo.'fecha_ultimo_ingreso']);
				$entity->setfecha_ultimo_error_ingreso($resultSet[$strPrefijo.'fecha_ultimo_error_ingreso']);
				$entity->setfecha_ultimo_intento($resultSet[$strPrefijo.'fecha_ultimo_intento']);
				$entity->setfecha_ultimo_cierre($resultSet[$strPrefijo.'fecha_ultimo_cierre']);
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,resumen_usuario $resumen_usuario,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $resumen_usuario->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiiiissss', $resumen_usuario->getid_usuario(),$resumen_usuario->getnumero_ingresos(),$resumen_usuario->getnumero_error_ingreso(),$resumen_usuario->getnumero_intentos(),$resumen_usuario->getnumero_cierres(),$resumen_usuario->getnumero_reinicios(),$resumen_usuario->getnumero_ingreso_actual(),$resumen_usuario->getfecha_ultimo_ingreso(),$resumen_usuario->getfecha_ultimo_error_ingreso(),$resumen_usuario->getfecha_ultimo_intento(),$resumen_usuario->getfecha_ultimo_cierre());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiiiissssis', $resumen_usuario->getid_usuario(),$resumen_usuario->getnumero_ingresos(),$resumen_usuario->getnumero_error_ingreso(),$resumen_usuario->getnumero_intentos(),$resumen_usuario->getnumero_cierres(),$resumen_usuario->getnumero_reinicios(),$resumen_usuario->getnumero_ingreso_actual(),$resumen_usuario->getfecha_ultimo_ingreso(),$resumen_usuario->getfecha_ultimo_error_ingreso(),$resumen_usuario->getfecha_ultimo_intento(),$resumen_usuario->getfecha_ultimo_cierre(), $resumen_usuario->getId(), Funciones::GetRealScapeString($resumen_usuario->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,resumen_usuario $resumen_usuario,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($resumen_usuario->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($resumen_usuario->getid_usuario(),$resumen_usuario->getnumero_ingresos(),$resumen_usuario->getnumero_error_ingreso(),$resumen_usuario->getnumero_intentos(),$resumen_usuario->getnumero_cierres(),$resumen_usuario->getnumero_reinicios(),$resumen_usuario->getnumero_ingreso_actual(),Funciones::GetRealScapeString($resumen_usuario->getfecha_ultimo_ingreso(),$connexion),Funciones::GetRealScapeString($resumen_usuario->getfecha_ultimo_error_ingreso(),$connexion),Funciones::GetRealScapeString($resumen_usuario->getfecha_ultimo_intento(),$connexion),Funciones::GetRealScapeString($resumen_usuario->getfecha_ultimo_cierre(),$connexion));
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($resumen_usuario->getid_usuario(),$resumen_usuario->getnumero_ingresos(),$resumen_usuario->getnumero_error_ingreso(),$resumen_usuario->getnumero_intentos(),$resumen_usuario->getnumero_cierres(),$resumen_usuario->getnumero_reinicios(),$resumen_usuario->getnumero_ingreso_actual(),Funciones::GetRealScapeString($resumen_usuario->getfecha_ultimo_ingreso(),$connexion),Funciones::GetRealScapeString($resumen_usuario->getfecha_ultimo_error_ingreso(),$connexion),Funciones::GetRealScapeString($resumen_usuario->getfecha_ultimo_intento(),$connexion),Funciones::GetRealScapeString($resumen_usuario->getfecha_ultimo_cierre(),$connexion), $resumen_usuario->getId(), Funciones::GetRealScapeString($resumen_usuario->getVersionRow(),$connexion));
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
	
	public function setresumen_usuario_Original(resumen_usuario $resumen_usuario) {
		$resumen_usuario->setresumen_usuario_Original(clone $resumen_usuario);		
	}
	
	public function setresumen_usuarios_Original(array $resumen_usuarios) {
		foreach($resumen_usuarios as $resumen_usuario){
			$resumen_usuario->setresumen_usuario_Original(clone $resumen_usuario);
		}
	}
	
	public static function setresumen_usuario_OriginalStatic(resumen_usuario $resumen_usuario) {
		$resumen_usuario->setresumen_usuario_Original(clone $resumen_usuario);		
	}
	
	public static function setresumen_usuarios_OriginalStatic(array $resumen_usuarios) {		
		foreach($resumen_usuarios as $resumen_usuario){
			$resumen_usuario->setresumen_usuario_Original(clone $resumen_usuario);
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
