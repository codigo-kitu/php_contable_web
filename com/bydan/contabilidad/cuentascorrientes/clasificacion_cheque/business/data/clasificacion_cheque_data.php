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
namespace com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\business\data;

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

use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\business\entity\clasificacion_cheque;

//FK


use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\business\data\cuenta_corriente_detalle_data;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\business\entity\cuenta_corriente_detalle;

use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\business\data\categoria_cheque_data;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\business\entity\categoria_cheque;

//REL



class clasificacion_cheque_data extends GetEntitiesDataAccessHelper implements clasificacion_cheque_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='cco_';
	public static string $TABLE_NAME='cco_clasificacion_cheque';			
	public static string $TABLE_NAME_clasificacion_cheque='clasificacion_cheque';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_CLASIFICACION_CHEQUE_INSERT(??,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_CLASIFICACION_CHEQUE_UPDATE(??,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_CLASIFICACION_CHEQUE_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_CLASIFICACION_CHEQUE_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $clasificacion_cheque_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'clasificacion_cheque';
		
		clasificacion_cheque_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('CUENTASCORRIENTES');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->clasificacion_cheque_DataAccessAdditional=new clasificacion_chequeDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_cuenta_corriente_detalle,id_categoria_cheque,monto) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%d,%f)';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_cuenta_corriente_detalle=%d,id_categoria_cheque=%d,monto=%f where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta_corriente_detalle,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_categoria_cheque,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.monto from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(clasificacion_cheque $clasificacion_cheque,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($clasificacion_cheque->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=clasificacion_cheque_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($clasificacion_cheque->getId(),$connexion));				
				
			} else if ($clasificacion_cheque->getIsChanged()) {
				if($clasificacion_cheque->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=clasificacion_cheque_data::$QUERY_INSERT;
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$clasificacion_cheque->getid_cuenta_corriente_detalle(),$clasificacion_cheque->getid_categoria_cheque(),$clasificacion_cheque->getmonto() );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=clasificacion_cheque_data::$QUERY_UPDATE;			
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$clasificacion_cheque->getid_cuenta_corriente_detalle(),$clasificacion_cheque->getid_categoria_cheque(),$clasificacion_cheque->getmonto(), Funciones::GetRealScapeString($clasificacion_cheque->getId(),$connexion), Funciones::GetRealScapeString($clasificacion_cheque->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($clasificacion_cheque, $connexion,$strQuerySaveComplete,clasificacion_cheque_data::$TABLE_NAME,clasificacion_cheque_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				clasificacion_cheque_data::savePrepared($clasificacion_cheque, $connexion,$strQuerySave,clasificacion_cheque_data::$TABLE_NAME,clasificacion_cheque_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			clasificacion_cheque_data::setclasificacion_cheque_OriginalStatic($clasificacion_cheque);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(clasificacion_cheque $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				clasificacion_cheque_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					clasificacion_cheque_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					clasificacion_cheque_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(clasificacion_cheque $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					clasificacion_cheque_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(clasificacion_cheque $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					clasificacion_cheque_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(clasificacion_cheque $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					clasificacion_cheque_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?clasificacion_cheque {		
		$entity = new clasificacion_cheque();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=clasificacion_cheque_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=clasificacion_cheque_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//CuentasCorrientes.clasificacion_cheque.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setclasificacion_cheque_Original(new clasificacion_cheque());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,clasificacion_cheque_data::$IS_WITH_SCHEMA);         	    
				/*$entity=clasificacion_cheque_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setclasificacion_cheque_Original(parent::getEntityPrefijoEntityResult("",$entity->getclasificacion_cheque_Original(),$resultSet,clasificacion_cheque_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setclasificacion_cheque_Original(clasificacion_cheque_data::getEntityBaseResult("",$entity->getclasificacion_cheque_Original(),$resultSet));
				//$entity->setclasificacion_cheque_Original($this->getEntityBaseResult("",$entity->getclasificacion_cheque_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?clasificacion_cheque {
		$entity = new clasificacion_cheque();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=clasificacion_cheque_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=clasificacion_cheque_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,clasificacion_cheque_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".CuentasCorrientes.clasificacion_cheque.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setclasificacion_cheque_Original(new clasificacion_cheque());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,clasificacion_cheque_data::$IS_WITH_SCHEMA);         	    
				/*$entity=clasificacion_cheque_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setclasificacion_cheque_Original(parent::getEntityPrefijoEntityResult("",$entity->getclasificacion_cheque_Original(),$resultSet,clasificacion_cheque_data::$IS_WITH_SCHEMA));         		
				////$entity->setclasificacion_cheque_Original(clasificacion_cheque_data::getEntityBaseResult("",$entity->getclasificacion_cheque_Original(),$resultSet));
				//$entity->setclasificacion_cheque_Original($this->getEntityBaseResult("",$entity->getclasificacion_cheque_Original(),$resultSet));
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
		$entity = new clasificacion_cheque();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=clasificacion_cheque_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=clasificacion_cheque_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,clasificacion_cheque_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new clasificacion_cheque();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,clasificacion_cheque_data::$IS_WITH_SCHEMA);         		
				/*$entity=clasificacion_cheque_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setclasificacion_cheque_Original( new clasificacion_cheque());
				
				//$entity->setclasificacion_cheque_Original(parent::getEntityPrefijoEntityResult("",$entity->getclasificacion_cheque_Original(),$resultSet,clasificacion_cheque_data::$IS_WITH_SCHEMA));         		
				////$entity->setclasificacion_cheque_Original(clasificacion_cheque_data::getEntityBaseResult("",$entity->getclasificacion_cheque_Original(),$resultSet));
				//$entity->setclasificacion_cheque_Original($this->getEntityBaseResult("",$entity->getclasificacion_cheque_Original(),$resultSet));
								
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
		$entity = new clasificacion_cheque();		  
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
      	    	$entity = new clasificacion_cheque();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,clasificacion_cheque_data::$IS_WITH_SCHEMA);         		
				/*$entity=clasificacion_cheque_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setclasificacion_cheque_Original( new clasificacion_cheque());
				
				//$entity->setclasificacion_cheque_Original(parent::getEntityPrefijoEntityResult("",$entity->getclasificacion_cheque_Original(),$resultSet,clasificacion_cheque_data::$IS_WITH_SCHEMA));         		
				////$entity->setclasificacion_cheque_Original(clasificacion_cheque_data::getEntityBaseResult("",$entity->getclasificacion_cheque_Original(),$resultSet));
				//$entity->setclasificacion_cheque_Original($this->getEntityBaseResult("",$entity->getclasificacion_cheque_Original(),$resultSet));
				
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
		$entity = new clasificacion_cheque();		  
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
      	    	$entity = new clasificacion_cheque();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,clasificacion_cheque_data::$IS_WITH_SCHEMA);         		
				/*$entity=clasificacion_cheque_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setclasificacion_cheque_Original( new clasificacion_cheque());				
				//$entity->setclasificacion_cheque_Original(parent::getEntityPrefijoEntityResult("",$entity->getclasificacion_cheque_Original(),$resultSet,clasificacion_cheque_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setclasificacion_cheque_Original(clasificacion_cheque_data::getEntityBaseResult("",$entity->getclasificacion_cheque_Original(),$resultSet));
				//$entity->setclasificacion_cheque_Original($this->getEntityBaseResult("",$entity->getclasificacion_cheque_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=clasificacion_cheque_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,clasificacion_cheque $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,clasificacion_cheque_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,clasificacion_cheque_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getcuenta_corriente_detalle(Connexion $connexion,$relclasificacion_cheque) : ?cuenta_corriente_detalle{

		$cuenta_corriente_detalle= new cuenta_corriente_detalle();

		try {
			$cuenta_corriente_detalleDataAccess=new cuenta_corriente_detalle_data();
			$cuenta_corriente_detalleDataAccess->isForFKData=$this->isForFKDataRels;
			$cuenta_corriente_detalle=$cuenta_corriente_detalleDataAccess->getEntity($connexion,$relclasificacion_cheque->getid_cuenta_corriente_detalle());

		} catch(Exception $e) {
			throw $e;
		}

		return $cuenta_corriente_detalle;
	}


	public function  getcategoria_cheque(Connexion $connexion,$relclasificacion_cheque) : ?categoria_cheque{

		$categoria_cheque= new categoria_cheque();

		try {
			$categoria_chequeDataAccess=new categoria_cheque_data();
			$categoria_chequeDataAccess->isForFKData=$this->isForFKDataRels;
			$categoria_cheque=$categoria_chequeDataAccess->getEntity($connexion,$relclasificacion_cheque->getid_categoria_cheque());

		} catch(Exception $e) {
			throw $e;
		}

		return $categoria_cheque;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,clasificacion_cheque $entity,$resultSet) : clasificacion_cheque {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_cuenta_corriente_detalle((int)$resultSet[$strPrefijo.'id_cuenta_corriente_detalle']);
				$entity->setid_categoria_cheque((int)$resultSet[$strPrefijo.'id_categoria_cheque']);
				$entity->setmonto((float)$resultSet[$strPrefijo.'monto']);
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,clasificacion_cheque $clasificacion_cheque,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $clasificacion_cheque->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iid', $clasificacion_cheque->getid_cuenta_corriente_detalle(),$clasificacion_cheque->getid_categoria_cheque(),$clasificacion_cheque->getmonto());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iidis', $clasificacion_cheque->getid_cuenta_corriente_detalle(),$clasificacion_cheque->getid_categoria_cheque(),$clasificacion_cheque->getmonto(), $clasificacion_cheque->getId(), Funciones::GetRealScapeString($clasificacion_cheque->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,clasificacion_cheque $clasificacion_cheque,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($clasificacion_cheque->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($clasificacion_cheque->getid_cuenta_corriente_detalle(),$clasificacion_cheque->getid_categoria_cheque(),$clasificacion_cheque->getmonto());
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($clasificacion_cheque->getid_cuenta_corriente_detalle(),$clasificacion_cheque->getid_categoria_cheque(),$clasificacion_cheque->getmonto(), $clasificacion_cheque->getId(), Funciones::GetRealScapeString($clasificacion_cheque->getVersionRow(),$connexion));
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
	
	public function setclasificacion_cheque_Original(clasificacion_cheque $clasificacion_cheque) {
		$clasificacion_cheque->setclasificacion_cheque_Original(clone $clasificacion_cheque);		
	}
	
	public function setclasificacion_cheques_Original(array $clasificacion_cheques) {
		foreach($clasificacion_cheques as $clasificacion_cheque){
			$clasificacion_cheque->setclasificacion_cheque_Original(clone $clasificacion_cheque);
		}
	}
	
	public static function setclasificacion_cheque_OriginalStatic(clasificacion_cheque $clasificacion_cheque) {
		$clasificacion_cheque->setclasificacion_cheque_Original(clone $clasificacion_cheque);		
	}
	
	public static function setclasificacion_cheques_OriginalStatic(array $clasificacion_cheques) {		
		foreach($clasificacion_cheques as $clasificacion_cheque){
			$clasificacion_cheque->setclasificacion_cheque_Original(clone $clasificacion_cheque);
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
