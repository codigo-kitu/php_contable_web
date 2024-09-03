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
namespace com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\business\data;

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

use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\business\entity\imagen_documento_cuenta_pagar;

//FK


use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\business\data\documento_cuenta_pagar_data;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\business\entity\documento_cuenta_pagar;

//REL



class imagen_documento_cuenta_pagar_data extends GetEntitiesDataAccessHelper implements imagen_documento_cuenta_pagar_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='cp_';
	public static string $TABLE_NAME='cp_imagen_documento_cuenta_pagar';			
	public static string $TABLE_NAME_imagen_documento_cuenta_pagar='imagen_documento_cuenta_pagar';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_IMAGEN_DOCUMENTO_CUENTA_PAGAR_INSERT(??,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_IMAGEN_DOCUMENTO_CUENTA_PAGAR_UPDATE(??,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_IMAGEN_DOCUMENTO_CUENTA_PAGAR_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_IMAGEN_DOCUMENTO_CUENTA_PAGAR_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $imagen_documento_cuenta_pagar_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'imagen_documento_cuenta_pagar';
		
		imagen_documento_cuenta_pagar_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('CUENTASPAGAR');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->imagen_documento_cuenta_pagar_DataAccessAdditional=new imagen_documento_cuenta_pagarDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,imagen,id_documento_cuenta_pagar,nro_documento) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,\'%s\',%d,\'%s\')';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,imagen=\'%s\',id_documento_cuenta_pagar=%d,nro_documento=\'%s\' where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.imagen,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_documento_cuenta_pagar,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nro_documento from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(imagen_documento_cuenta_pagar $imagen_documento_cuenta_pagar,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($imagen_documento_cuenta_pagar->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=imagen_documento_cuenta_pagar_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($imagen_documento_cuenta_pagar->getId(),$connexion));				
				
			} else if ($imagen_documento_cuenta_pagar->getIsChanged()) {
				if($imagen_documento_cuenta_pagar->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=imagen_documento_cuenta_pagar_data::$QUERY_INSERT;
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($imagen_documento_cuenta_pagar->getimagen(),$connexion),$imagen_documento_cuenta_pagar->getid_documento_cuenta_pagar(),Funciones::GetRealScapeString($imagen_documento_cuenta_pagar->getnro_documento(),$connexion) );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=imagen_documento_cuenta_pagar_data::$QUERY_UPDATE;			
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($imagen_documento_cuenta_pagar->getimagen(),$connexion),$imagen_documento_cuenta_pagar->getid_documento_cuenta_pagar(),Funciones::GetRealScapeString($imagen_documento_cuenta_pagar->getnro_documento(),$connexion), Funciones::GetRealScapeString($imagen_documento_cuenta_pagar->getId(),$connexion), Funciones::GetRealScapeString($imagen_documento_cuenta_pagar->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($imagen_documento_cuenta_pagar, $connexion,$strQuerySaveComplete,imagen_documento_cuenta_pagar_data::$TABLE_NAME,imagen_documento_cuenta_pagar_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				imagen_documento_cuenta_pagar_data::savePrepared($imagen_documento_cuenta_pagar, $connexion,$strQuerySave,imagen_documento_cuenta_pagar_data::$TABLE_NAME,imagen_documento_cuenta_pagar_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			imagen_documento_cuenta_pagar_data::setimagen_documento_cuenta_pagar_OriginalStatic($imagen_documento_cuenta_pagar);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(imagen_documento_cuenta_pagar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				imagen_documento_cuenta_pagar_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					imagen_documento_cuenta_pagar_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					imagen_documento_cuenta_pagar_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(imagen_documento_cuenta_pagar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					imagen_documento_cuenta_pagar_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(imagen_documento_cuenta_pagar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					imagen_documento_cuenta_pagar_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(imagen_documento_cuenta_pagar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					imagen_documento_cuenta_pagar_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?imagen_documento_cuenta_pagar {		
		$entity = new imagen_documento_cuenta_pagar();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=imagen_documento_cuenta_pagar_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=imagen_documento_cuenta_pagar_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//CuentasPagar.imagen_documento_cuenta_pagar.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setimagen_documento_cuenta_pagar_Original(new imagen_documento_cuenta_pagar());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,imagen_documento_cuenta_pagar_data::$IS_WITH_SCHEMA);         	    
				/*$entity=imagen_documento_cuenta_pagar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setimagen_documento_cuenta_pagar_Original(parent::getEntityPrefijoEntityResult("",$entity->getimagen_documento_cuenta_pagar_Original(),$resultSet,imagen_documento_cuenta_pagar_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setimagen_documento_cuenta_pagar_Original(imagen_documento_cuenta_pagar_data::getEntityBaseResult("",$entity->getimagen_documento_cuenta_pagar_Original(),$resultSet));
				//$entity->setimagen_documento_cuenta_pagar_Original($this->getEntityBaseResult("",$entity->getimagen_documento_cuenta_pagar_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?imagen_documento_cuenta_pagar {
		$entity = new imagen_documento_cuenta_pagar();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=imagen_documento_cuenta_pagar_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=imagen_documento_cuenta_pagar_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,imagen_documento_cuenta_pagar_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".CuentasPagar.imagen_documento_cuenta_pagar.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setimagen_documento_cuenta_pagar_Original(new imagen_documento_cuenta_pagar());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,imagen_documento_cuenta_pagar_data::$IS_WITH_SCHEMA);         	    
				/*$entity=imagen_documento_cuenta_pagar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setimagen_documento_cuenta_pagar_Original(parent::getEntityPrefijoEntityResult("",$entity->getimagen_documento_cuenta_pagar_Original(),$resultSet,imagen_documento_cuenta_pagar_data::$IS_WITH_SCHEMA));         		
				////$entity->setimagen_documento_cuenta_pagar_Original(imagen_documento_cuenta_pagar_data::getEntityBaseResult("",$entity->getimagen_documento_cuenta_pagar_Original(),$resultSet));
				//$entity->setimagen_documento_cuenta_pagar_Original($this->getEntityBaseResult("",$entity->getimagen_documento_cuenta_pagar_Original(),$resultSet));
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
		$entity = new imagen_documento_cuenta_pagar();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=imagen_documento_cuenta_pagar_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=imagen_documento_cuenta_pagar_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,imagen_documento_cuenta_pagar_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new imagen_documento_cuenta_pagar();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,imagen_documento_cuenta_pagar_data::$IS_WITH_SCHEMA);         		
				/*$entity=imagen_documento_cuenta_pagar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setimagen_documento_cuenta_pagar_Original( new imagen_documento_cuenta_pagar());
				
				//$entity->setimagen_documento_cuenta_pagar_Original(parent::getEntityPrefijoEntityResult("",$entity->getimagen_documento_cuenta_pagar_Original(),$resultSet,imagen_documento_cuenta_pagar_data::$IS_WITH_SCHEMA));         		
				////$entity->setimagen_documento_cuenta_pagar_Original(imagen_documento_cuenta_pagar_data::getEntityBaseResult("",$entity->getimagen_documento_cuenta_pagar_Original(),$resultSet));
				//$entity->setimagen_documento_cuenta_pagar_Original($this->getEntityBaseResult("",$entity->getimagen_documento_cuenta_pagar_Original(),$resultSet));
								
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
		$entity = new imagen_documento_cuenta_pagar();		  
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
      	    	$entity = new imagen_documento_cuenta_pagar();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,imagen_documento_cuenta_pagar_data::$IS_WITH_SCHEMA);         		
				/*$entity=imagen_documento_cuenta_pagar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setimagen_documento_cuenta_pagar_Original( new imagen_documento_cuenta_pagar());
				
				//$entity->setimagen_documento_cuenta_pagar_Original(parent::getEntityPrefijoEntityResult("",$entity->getimagen_documento_cuenta_pagar_Original(),$resultSet,imagen_documento_cuenta_pagar_data::$IS_WITH_SCHEMA));         		
				////$entity->setimagen_documento_cuenta_pagar_Original(imagen_documento_cuenta_pagar_data::getEntityBaseResult("",$entity->getimagen_documento_cuenta_pagar_Original(),$resultSet));
				//$entity->setimagen_documento_cuenta_pagar_Original($this->getEntityBaseResult("",$entity->getimagen_documento_cuenta_pagar_Original(),$resultSet));
				
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
		$entity = new imagen_documento_cuenta_pagar();		  
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
      	    	$entity = new imagen_documento_cuenta_pagar();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,imagen_documento_cuenta_pagar_data::$IS_WITH_SCHEMA);         		
				/*$entity=imagen_documento_cuenta_pagar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setimagen_documento_cuenta_pagar_Original( new imagen_documento_cuenta_pagar());				
				//$entity->setimagen_documento_cuenta_pagar_Original(parent::getEntityPrefijoEntityResult("",$entity->getimagen_documento_cuenta_pagar_Original(),$resultSet,imagen_documento_cuenta_pagar_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setimagen_documento_cuenta_pagar_Original(imagen_documento_cuenta_pagar_data::getEntityBaseResult("",$entity->getimagen_documento_cuenta_pagar_Original(),$resultSet));
				//$entity->setimagen_documento_cuenta_pagar_Original($this->getEntityBaseResult("",$entity->getimagen_documento_cuenta_pagar_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=imagen_documento_cuenta_pagar_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,imagen_documento_cuenta_pagar $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,imagen_documento_cuenta_pagar_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,imagen_documento_cuenta_pagar_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getdocumento_cuenta_pagar(Connexion $connexion,$relimagen_documento_cuenta_pagar) : ?documento_cuenta_pagar{

		$documento_cuenta_pagar= new documento_cuenta_pagar();

		try {
			$documento_cuenta_pagarDataAccess=new documento_cuenta_pagar_data();
			$documento_cuenta_pagarDataAccess->isForFKData=$this->isForFKDataRels;
			$documento_cuenta_pagar=$documento_cuenta_pagarDataAccess->getEntity($connexion,$relimagen_documento_cuenta_pagar->getid_documento_cuenta_pagar());

		} catch(Exception $e) {
			throw $e;
		}

		return $documento_cuenta_pagar;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,imagen_documento_cuenta_pagar $entity,$resultSet) : imagen_documento_cuenta_pagar {
        try {     	
			if(!$this->isForFKData) {
				$entity->setimagen(utf8_encode($resultSet[$strPrefijo.'imagen']));
				$entity->setid_documento_cuenta_pagar((int)$resultSet[$strPrefijo.'id_documento_cuenta_pagar']);
				$entity->setnro_documento(utf8_encode($resultSet[$strPrefijo.'nro_documento']));
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,imagen_documento_cuenta_pagar $imagen_documento_cuenta_pagar,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $imagen_documento_cuenta_pagar->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'sis', $imagen_documento_cuenta_pagar->getimagen(),$imagen_documento_cuenta_pagar->getid_documento_cuenta_pagar(),$imagen_documento_cuenta_pagar->getnro_documento());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'sisis', $imagen_documento_cuenta_pagar->getimagen(),$imagen_documento_cuenta_pagar->getid_documento_cuenta_pagar(),$imagen_documento_cuenta_pagar->getnro_documento(), $imagen_documento_cuenta_pagar->getId(), Funciones::GetRealScapeString($imagen_documento_cuenta_pagar->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,imagen_documento_cuenta_pagar $imagen_documento_cuenta_pagar,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($imagen_documento_cuenta_pagar->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array(Funciones::GetRealScapeString($imagen_documento_cuenta_pagar->getimagen(),$connexion),$imagen_documento_cuenta_pagar->getid_documento_cuenta_pagar(),Funciones::GetRealScapeString($imagen_documento_cuenta_pagar->getnro_documento(),$connexion));
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array(Funciones::GetRealScapeString($imagen_documento_cuenta_pagar->getimagen(),$connexion),$imagen_documento_cuenta_pagar->getid_documento_cuenta_pagar(),Funciones::GetRealScapeString($imagen_documento_cuenta_pagar->getnro_documento(),$connexion), $imagen_documento_cuenta_pagar->getId(), Funciones::GetRealScapeString($imagen_documento_cuenta_pagar->getVersionRow(),$connexion));
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
	
	public function setimagen_documento_cuenta_pagar_Original(imagen_documento_cuenta_pagar $imagen_documento_cuenta_pagar) {
		$imagen_documento_cuenta_pagar->setimagen_documento_cuenta_pagar_Original(clone $imagen_documento_cuenta_pagar);		
	}
	
	public function setimagen_documento_cuenta_pagars_Original(array $imagen_documento_cuenta_pagars) {
		foreach($imagen_documento_cuenta_pagars as $imagen_documento_cuenta_pagar){
			$imagen_documento_cuenta_pagar->setimagen_documento_cuenta_pagar_Original(clone $imagen_documento_cuenta_pagar);
		}
	}
	
	public static function setimagen_documento_cuenta_pagar_OriginalStatic(imagen_documento_cuenta_pagar $imagen_documento_cuenta_pagar) {
		$imagen_documento_cuenta_pagar->setimagen_documento_cuenta_pagar_Original(clone $imagen_documento_cuenta_pagar);		
	}
	
	public static function setimagen_documento_cuenta_pagars_OriginalStatic(array $imagen_documento_cuenta_pagars) {		
		foreach($imagen_documento_cuenta_pagars as $imagen_documento_cuenta_pagar){
			$imagen_documento_cuenta_pagar->setimagen_documento_cuenta_pagar_Original(clone $imagen_documento_cuenta_pagar);
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
