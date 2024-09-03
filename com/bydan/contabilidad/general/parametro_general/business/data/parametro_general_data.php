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
namespace com\bydan\contabilidad\general\parametro_general\business\data;

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

use com\bydan\contabilidad\general\parametro_general\business\entity\parametro_general;

//FK


use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\entity\empresa;

use com\bydan\contabilidad\seguridad\pais\business\data\pais_data;
use com\bydan\contabilidad\seguridad\pais\business\entity\pais;

use com\bydan\contabilidad\contabilidad\moneda\business\data\moneda_data;
use com\bydan\contabilidad\contabilidad\moneda\business\entity\moneda;

//REL



class parametro_general_data extends GetEntitiesDataAccessHelper implements parametro_general_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='gen_';
	public static string $TABLE_NAME='gen_parametro_general';			
	public static string $TABLE_NAME_parametro_general='parametro_general';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_PARAMETRO_GENERAL_INSERT(??,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_PARAMETRO_GENERAL_UPDATE(??,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_PARAMETRO_GENERAL_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_PARAMETRO_GENERAL_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $parametro_general_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'parametro_general';
		
		parametro_general_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('GENERAL');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->parametro_general_DataAccessAdditional=new parametro_generalDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_empresa,id_pais,id_modena,simbolo_moneda,numero_decimales,con_formato_fecha_mda,con_formato_cantidad_coma,iva_porciento) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%s,%d,\'%s\',%d,\'%d\',\'%d\',%f)';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_empresa=%d,id_pais=%s,id_modena=%d,simbolo_moneda=\'%s\',numero_decimales=%d,con_formato_fecha_mda=\'%d\',con_formato_cantidad_coma=\'%d\',iva_porciento=%f where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_pais,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_modena,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.simbolo_moneda,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_decimales,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_formato_fecha_mda,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_formato_cantidad_coma,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.iva_porciento from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(parametro_general $parametro_general,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($parametro_general->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=parametro_general_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($parametro_general->getId(),$connexion));				
				
			} else if ($parametro_general->getIsChanged()) {
				if($parametro_general->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=parametro_general_data::$QUERY_INSERT;
					
					
					
					

					//$id_pais='null';
					//if($parametro_general->getid_pais()!==null && $parametro_general->getid_pais()>=0) {
						//$id_pais=$parametro_general->getid_pais();
					//} else {
						//$id_pais='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$parametro_general->getid_empresa(),$parametro_general->getid_pais(),$parametro_general->getid_modena(),Funciones::GetRealScapeString($parametro_general->getsimbolo_moneda(),$connexion),$parametro_general->getnumero_decimales(),$parametro_general->getcon_formato_fecha_mda(),$parametro_general->getcon_formato_cantidad_coma(),$parametro_general->getiva_porciento() );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=parametro_general_data::$QUERY_UPDATE;			
					
					
					
					

					//$id_pais='null';
					//if($parametro_general->getid_pais()!==null && $parametro_general->getid_pais()>=0) {
						//$id_pais=$parametro_general->getid_pais();
					//} else {
						//$id_pais='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$parametro_general->getid_empresa(),$parametro_general->getid_pais(),$parametro_general->getid_modena(),Funciones::GetRealScapeString($parametro_general->getsimbolo_moneda(),$connexion),$parametro_general->getnumero_decimales(),$parametro_general->getcon_formato_fecha_mda(),$parametro_general->getcon_formato_cantidad_coma(),$parametro_general->getiva_porciento(), Funciones::GetRealScapeString($parametro_general->getId(),$connexion), Funciones::GetRealScapeString($parametro_general->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($parametro_general, $connexion,$strQuerySaveComplete,parametro_general_data::$TABLE_NAME,parametro_general_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				parametro_general_data::savePrepared($parametro_general, $connexion,$strQuerySave,parametro_general_data::$TABLE_NAME,parametro_general_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			parametro_general_data::setparametro_general_OriginalStatic($parametro_general);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(parametro_general $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				parametro_general_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					parametro_general_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					parametro_general_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(parametro_general $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					parametro_general_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(parametro_general $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					parametro_general_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(parametro_general $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					parametro_general_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?parametro_general {		
		$entity = new parametro_general();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=parametro_general_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=parametro_general_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//General.parametro_general.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setparametro_general_Original(new parametro_general());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_general_data::$IS_WITH_SCHEMA);         	    
				/*$entity=parametro_general_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setparametro_general_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_general_Original(),$resultSet,parametro_general_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setparametro_general_Original(parametro_general_data::getEntityBaseResult("",$entity->getparametro_general_Original(),$resultSet));
				//$entity->setparametro_general_Original($this->getEntityBaseResult("",$entity->getparametro_general_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?parametro_general {
		$entity = new parametro_general();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=parametro_general_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=parametro_general_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,parametro_general_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".General.parametro_general.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setparametro_general_Original(new parametro_general());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_general_data::$IS_WITH_SCHEMA);         	    
				/*$entity=parametro_general_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setparametro_general_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_general_Original(),$resultSet,parametro_general_data::$IS_WITH_SCHEMA));         		
				////$entity->setparametro_general_Original(parametro_general_data::getEntityBaseResult("",$entity->getparametro_general_Original(),$resultSet));
				//$entity->setparametro_general_Original($this->getEntityBaseResult("",$entity->getparametro_general_Original(),$resultSet));
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
		$entity = new parametro_general();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=parametro_general_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=parametro_general_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,parametro_general_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new parametro_general();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_general_data::$IS_WITH_SCHEMA);         		
				/*$entity=parametro_general_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setparametro_general_Original( new parametro_general());
				
				//$entity->setparametro_general_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_general_Original(),$resultSet,parametro_general_data::$IS_WITH_SCHEMA));         		
				////$entity->setparametro_general_Original(parametro_general_data::getEntityBaseResult("",$entity->getparametro_general_Original(),$resultSet));
				//$entity->setparametro_general_Original($this->getEntityBaseResult("",$entity->getparametro_general_Original(),$resultSet));
								
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
		$entity = new parametro_general();		  
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
      	    	$entity = new parametro_general();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_general_data::$IS_WITH_SCHEMA);         		
				/*$entity=parametro_general_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setparametro_general_Original( new parametro_general());
				
				//$entity->setparametro_general_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_general_Original(),$resultSet,parametro_general_data::$IS_WITH_SCHEMA));         		
				////$entity->setparametro_general_Original(parametro_general_data::getEntityBaseResult("",$entity->getparametro_general_Original(),$resultSet));
				//$entity->setparametro_general_Original($this->getEntityBaseResult("",$entity->getparametro_general_Original(),$resultSet));
				
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
		$entity = new parametro_general();		  
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
      	    	$entity = new parametro_general();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_general_data::$IS_WITH_SCHEMA);         		
				/*$entity=parametro_general_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setparametro_general_Original( new parametro_general());				
				//$entity->setparametro_general_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_general_Original(),$resultSet,parametro_general_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setparametro_general_Original(parametro_general_data::getEntityBaseResult("",$entity->getparametro_general_Original(),$resultSet));
				//$entity->setparametro_general_Original($this->getEntityBaseResult("",$entity->getparametro_general_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=parametro_general_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,parametro_general $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,parametro_general_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,parametro_general_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getempresa(Connexion $connexion,$relparametro_general) : ?empresa{

		$empresa= new empresa();

		try {
			$empresaDataAccess=new empresa_data();
			$empresaDataAccess->isForFKData=$this->isForFKDataRels;
			$empresa=$empresaDataAccess->getEntity($connexion,$relparametro_general->getid_empresa());

		} catch(Exception $e) {
			throw $e;
		}

		return $empresa;
	}


	public function  getpais(Connexion $connexion,$relparametro_general) : ?pais{

		$pais= new pais();

		try {
			$paisDataAccess=new pais_data();
			$paisDataAccess->isForFKData=$this->isForFKDataRels;
			$pais=$paisDataAccess->getEntity($connexion,$relparametro_general->getid_pais());

		} catch(Exception $e) {
			throw $e;
		}

		return $pais;
	}


	public function  getmoneda(Connexion $connexion,$relparametro_general) : ?moneda{

		$moneda= new moneda();

		try {
			$monedaDataAccess=new moneda_data();
			$monedaDataAccess->isForFKData=$this->isForFKDataRels;
			$moneda=$monedaDataAccess->getEntity($connexion,$relparametro_general->getid_modena());

		} catch(Exception $e) {
			throw $e;
		}

		return $moneda;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,parametro_general $entity,$resultSet) : parametro_general {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_empresa((int)$resultSet[$strPrefijo.'id_empresa']);
				$entity->setid_pais((int)$resultSet[$strPrefijo.'id_pais']);
				$entity->setid_modena((int)$resultSet[$strPrefijo.'id_modena']);
				$entity->setsimbolo_moneda(utf8_encode($resultSet[$strPrefijo.'simbolo_moneda']));
				$entity->setnumero_decimales((int)$resultSet[$strPrefijo.'numero_decimales']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setcon_formato_fecha_mda($resultSet[$strPrefijo.'con_formato_fecha_mda']=='f'? false:true );
				} else {
					$entity->setcon_formato_fecha_mda((bool)$resultSet[$strPrefijo.'con_formato_fecha_mda']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setcon_formato_cantidad_coma($resultSet[$strPrefijo.'con_formato_cantidad_coma']=='f'? false:true );
				} else {
					$entity->setcon_formato_cantidad_coma((bool)$resultSet[$strPrefijo.'con_formato_cantidad_coma']);
				}
				$entity->setiva_porciento((float)$resultSet[$strPrefijo.'iva_porciento']);
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,parametro_general $parametro_general,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $parametro_general->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iiisiiid', $parametro_general->getid_empresa(),$parametro_general->getid_pais(),$parametro_general->getid_modena(),$parametro_general->getsimbolo_moneda(),$parametro_general->getnumero_decimales(),$parametro_general->getcon_formato_fecha_mda(),$parametro_general->getcon_formato_cantidad_coma(),$parametro_general->getiva_porciento());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iiisiiidis', $parametro_general->getid_empresa(),$parametro_general->getid_pais(),$parametro_general->getid_modena(),$parametro_general->getsimbolo_moneda(),$parametro_general->getnumero_decimales(),$parametro_general->getcon_formato_fecha_mda(),$parametro_general->getcon_formato_cantidad_coma(),$parametro_general->getiva_porciento(), $parametro_general->getId(), Funciones::GetRealScapeString($parametro_general->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,parametro_general $parametro_general,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($parametro_general->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($parametro_general->getid_empresa(),$parametro_general->getid_pais(),$parametro_general->getid_modena(),Funciones::GetRealScapeString($parametro_general->getsimbolo_moneda(),$connexion),$parametro_general->getnumero_decimales(),$parametro_general->getcon_formato_fecha_mda(),$parametro_general->getcon_formato_cantidad_coma(),$parametro_general->getiva_porciento());
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($parametro_general->getid_empresa(),$parametro_general->getid_pais(),$parametro_general->getid_modena(),Funciones::GetRealScapeString($parametro_general->getsimbolo_moneda(),$connexion),$parametro_general->getnumero_decimales(),$parametro_general->getcon_formato_fecha_mda(),$parametro_general->getcon_formato_cantidad_coma(),$parametro_general->getiva_porciento(), $parametro_general->getId(), Funciones::GetRealScapeString($parametro_general->getVersionRow(),$connexion));
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
	
	public function setparametro_general_Original(parametro_general $parametro_general) {
		$parametro_general->setparametro_general_Original(clone $parametro_general);		
	}
	
	public function setparametro_generals_Original(array $parametro_generals) {
		foreach($parametro_generals as $parametro_general){
			$parametro_general->setparametro_general_Original(clone $parametro_general);
		}
	}
	
	public static function setparametro_general_OriginalStatic(parametro_general $parametro_general) {
		$parametro_general->setparametro_general_Original(clone $parametro_general);		
	}
	
	public static function setparametro_generals_OriginalStatic(array $parametro_generals) {		
		foreach($parametro_generals as $parametro_general){
			$parametro_general->setparametro_general_Original(clone $parametro_general);
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
