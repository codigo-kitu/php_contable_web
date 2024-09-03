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
namespace com\bydan\contabilidad\contabilidad\cierre_contable_detalle\business\data;

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

use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\business\entity\cierre_contable_detalle;

//FK


use com\bydan\contabilidad\contabilidad\cierre_contable\business\data\cierre_contable_data;
use com\bydan\contabilidad\contabilidad\cierre_contable\business\entity\cierre_contable;

//REL



class cierre_contable_detalle_data extends GetEntitiesDataAccessHelper implements cierre_contable_detalle_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='con_';
	public static string $TABLE_NAME='con_cierre_contable_detalle';			
	public static string $TABLE_NAME_cierre_contable_detalle='cierre_contable_detalle';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_CIERRE_CONTABLE_DETALLE_INSERT(??,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_CIERRE_CONTABLE_DETALLE_UPDATE(??,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_CIERRE_CONTABLE_DETALLE_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_CIERRE_CONTABLE_DETALLE_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $cierre_contable_detalle_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'cierre_contable_detalle';
		
		cierre_contable_detalle_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('CONTABILIDAD');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cierre_contable_detalle_DataAccessAdditional=new cierre_contable_detalleDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_detalle,id_cierre_contable,nro_documento,tipo_factura,monto) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%d,\'%s\',\'%s\',%f)';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_detalle=%d,id_cierre_contable=%d,nro_documento=\'%s\',tipo_factura=\'%s\',monto=%f where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_detalle,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cierre_contable,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nro_documento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.tipo_factura,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.monto from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(cierre_contable_detalle $cierre_contable_detalle,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($cierre_contable_detalle->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=cierre_contable_detalle_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($cierre_contable_detalle->getId(),$connexion));				
				
			} else if ($cierre_contable_detalle->getIsChanged()) {
				if($cierre_contable_detalle->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=cierre_contable_detalle_data::$QUERY_INSERT;
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$cierre_contable_detalle->getid_detalle(),$cierre_contable_detalle->getid_cierre_contable(),Funciones::GetRealScapeString($cierre_contable_detalle->getnro_documento(),$connexion),Funciones::GetRealScapeString($cierre_contable_detalle->gettipo_factura(),$connexion),$cierre_contable_detalle->getmonto() );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=cierre_contable_detalle_data::$QUERY_UPDATE;			
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$cierre_contable_detalle->getid_detalle(),$cierre_contable_detalle->getid_cierre_contable(),Funciones::GetRealScapeString($cierre_contable_detalle->getnro_documento(),$connexion),Funciones::GetRealScapeString($cierre_contable_detalle->gettipo_factura(),$connexion),$cierre_contable_detalle->getmonto(), Funciones::GetRealScapeString($cierre_contable_detalle->getId(),$connexion), Funciones::GetRealScapeString($cierre_contable_detalle->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($cierre_contable_detalle, $connexion,$strQuerySaveComplete,cierre_contable_detalle_data::$TABLE_NAME,cierre_contable_detalle_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				cierre_contable_detalle_data::savePrepared($cierre_contable_detalle, $connexion,$strQuerySave,cierre_contable_detalle_data::$TABLE_NAME,cierre_contable_detalle_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			cierre_contable_detalle_data::setcierre_contable_detalle_OriginalStatic($cierre_contable_detalle);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(cierre_contable_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				cierre_contable_detalle_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					cierre_contable_detalle_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					cierre_contable_detalle_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(cierre_contable_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					cierre_contable_detalle_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(cierre_contable_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					cierre_contable_detalle_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(cierre_contable_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					cierre_contable_detalle_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?cierre_contable_detalle {		
		$entity = new cierre_contable_detalle();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=cierre_contable_detalle_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=cierre_contable_detalle_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//Contabilidad.cierre_contable_detalle.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setcierre_contable_detalle_Original(new cierre_contable_detalle());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cierre_contable_detalle_data::$IS_WITH_SCHEMA);         	    
				/*$entity=cierre_contable_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setcierre_contable_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getcierre_contable_detalle_Original(),$resultSet,cierre_contable_detalle_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setcierre_contable_detalle_Original(cierre_contable_detalle_data::getEntityBaseResult("",$entity->getcierre_contable_detalle_Original(),$resultSet));
				//$entity->setcierre_contable_detalle_Original($this->getEntityBaseResult("",$entity->getcierre_contable_detalle_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?cierre_contable_detalle {
		$entity = new cierre_contable_detalle();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=cierre_contable_detalle_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=cierre_contable_detalle_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,cierre_contable_detalle_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".Contabilidad.cierre_contable_detalle.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setcierre_contable_detalle_Original(new cierre_contable_detalle());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cierre_contable_detalle_data::$IS_WITH_SCHEMA);         	    
				/*$entity=cierre_contable_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setcierre_contable_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getcierre_contable_detalle_Original(),$resultSet,cierre_contable_detalle_data::$IS_WITH_SCHEMA));         		
				////$entity->setcierre_contable_detalle_Original(cierre_contable_detalle_data::getEntityBaseResult("",$entity->getcierre_contable_detalle_Original(),$resultSet));
				//$entity->setcierre_contable_detalle_Original($this->getEntityBaseResult("",$entity->getcierre_contable_detalle_Original(),$resultSet));
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
		$entity = new cierre_contable_detalle();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=cierre_contable_detalle_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=cierre_contable_detalle_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,cierre_contable_detalle_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new cierre_contable_detalle();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cierre_contable_detalle_data::$IS_WITH_SCHEMA);         		
				/*$entity=cierre_contable_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setcierre_contable_detalle_Original( new cierre_contable_detalle());
				
				//$entity->setcierre_contable_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getcierre_contable_detalle_Original(),$resultSet,cierre_contable_detalle_data::$IS_WITH_SCHEMA));         		
				////$entity->setcierre_contable_detalle_Original(cierre_contable_detalle_data::getEntityBaseResult("",$entity->getcierre_contable_detalle_Original(),$resultSet));
				//$entity->setcierre_contable_detalle_Original($this->getEntityBaseResult("",$entity->getcierre_contable_detalle_Original(),$resultSet));
								
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
		$entity = new cierre_contable_detalle();		  
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
      	    	$entity = new cierre_contable_detalle();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cierre_contable_detalle_data::$IS_WITH_SCHEMA);         		
				/*$entity=cierre_contable_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setcierre_contable_detalle_Original( new cierre_contable_detalle());
				
				//$entity->setcierre_contable_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getcierre_contable_detalle_Original(),$resultSet,cierre_contable_detalle_data::$IS_WITH_SCHEMA));         		
				////$entity->setcierre_contable_detalle_Original(cierre_contable_detalle_data::getEntityBaseResult("",$entity->getcierre_contable_detalle_Original(),$resultSet));
				//$entity->setcierre_contable_detalle_Original($this->getEntityBaseResult("",$entity->getcierre_contable_detalle_Original(),$resultSet));
				
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
		$entity = new cierre_contable_detalle();		  
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
      	    	$entity = new cierre_contable_detalle();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cierre_contable_detalle_data::$IS_WITH_SCHEMA);         		
				/*$entity=cierre_contable_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setcierre_contable_detalle_Original( new cierre_contable_detalle());				
				//$entity->setcierre_contable_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getcierre_contable_detalle_Original(),$resultSet,cierre_contable_detalle_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setcierre_contable_detalle_Original(cierre_contable_detalle_data::getEntityBaseResult("",$entity->getcierre_contable_detalle_Original(),$resultSet));
				//$entity->setcierre_contable_detalle_Original($this->getEntityBaseResult("",$entity->getcierre_contable_detalle_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=cierre_contable_detalle_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,cierre_contable_detalle $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,cierre_contable_detalle_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,cierre_contable_detalle_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getcierre_contable(Connexion $connexion,$relcierre_contable_detalle) : ?cierre_contable{

		$cierre_contable= new cierre_contable();

		try {
			$cierre_contableDataAccess=new cierre_contable_data();
			$cierre_contableDataAccess->isForFKData=$this->isForFKDataRels;
			$cierre_contable=$cierre_contableDataAccess->getEntity($connexion,$relcierre_contable_detalle->getid_cierre_contable());

		} catch(Exception $e) {
			throw $e;
		}

		return $cierre_contable;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,cierre_contable_detalle $entity,$resultSet) : cierre_contable_detalle {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_detalle((int)$resultSet[$strPrefijo.'id_detalle']);
				$entity->setid_cierre_contable((int)$resultSet[$strPrefijo.'id_cierre_contable']);
				$entity->setnro_documento(utf8_encode($resultSet[$strPrefijo.'nro_documento']));
				$entity->settipo_factura(utf8_encode($resultSet[$strPrefijo.'tipo_factura']));
				$entity->setmonto((float)$resultSet[$strPrefijo.'monto']);
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,cierre_contable_detalle $cierre_contable_detalle,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $cierre_contable_detalle->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iissd', $cierre_contable_detalle->getid_detalle(),$cierre_contable_detalle->getid_cierre_contable(),$cierre_contable_detalle->getnro_documento(),$cierre_contable_detalle->gettipo_factura(),$cierre_contable_detalle->getmonto());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iissdis', $cierre_contable_detalle->getid_detalle(),$cierre_contable_detalle->getid_cierre_contable(),$cierre_contable_detalle->getnro_documento(),$cierre_contable_detalle->gettipo_factura(),$cierre_contable_detalle->getmonto(), $cierre_contable_detalle->getId(), Funciones::GetRealScapeString($cierre_contable_detalle->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,cierre_contable_detalle $cierre_contable_detalle,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($cierre_contable_detalle->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($cierre_contable_detalle->getid_detalle(),$cierre_contable_detalle->getid_cierre_contable(),Funciones::GetRealScapeString($cierre_contable_detalle->getnro_documento(),$connexion),Funciones::GetRealScapeString($cierre_contable_detalle->gettipo_factura(),$connexion),$cierre_contable_detalle->getmonto());
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($cierre_contable_detalle->getid_detalle(),$cierre_contable_detalle->getid_cierre_contable(),Funciones::GetRealScapeString($cierre_contable_detalle->getnro_documento(),$connexion),Funciones::GetRealScapeString($cierre_contable_detalle->gettipo_factura(),$connexion),$cierre_contable_detalle->getmonto(), $cierre_contable_detalle->getId(), Funciones::GetRealScapeString($cierre_contable_detalle->getVersionRow(),$connexion));
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
	
	public function setcierre_contable_detalle_Original(cierre_contable_detalle $cierre_contable_detalle) {
		$cierre_contable_detalle->setcierre_contable_detalle_Original(clone $cierre_contable_detalle);		
	}
	
	public function setcierre_contable_detalles_Original(array $cierre_contable_detalles) {
		foreach($cierre_contable_detalles as $cierre_contable_detalle){
			$cierre_contable_detalle->setcierre_contable_detalle_Original(clone $cierre_contable_detalle);
		}
	}
	
	public static function setcierre_contable_detalle_OriginalStatic(cierre_contable_detalle $cierre_contable_detalle) {
		$cierre_contable_detalle->setcierre_contable_detalle_Original(clone $cierre_contable_detalle);		
	}
	
	public static function setcierre_contable_detalles_OriginalStatic(array $cierre_contable_detalles) {		
		foreach($cierre_contable_detalles as $cierre_contable_detalle){
			$cierre_contable_detalle->setcierre_contable_detalle_Original(clone $cierre_contable_detalle);
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
