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
namespace com\bydan\contabilidad\cuentaspagar\parametro_cuenta_pagar\business\data;

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

use com\bydan\contabilidad\cuentaspagar\parametro_cuenta_pagar\business\entity\parametro_cuenta_pagar;

//FK


use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\entity\empresa;

//REL



class parametro_cuenta_pagar_data extends GetEntitiesDataAccessHelper implements parametro_cuenta_pagar_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='cp_';
	public static string $TABLE_NAME='cp_parametro_cuenta_pagar';			
	public static string $TABLE_NAME_parametro_cuenta_pagar='parametro_cuenta_pagar';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_PARAMETRO_CUENTA_PAGAR_INSERT(??,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_PARAMETRO_CUENTA_PAGAR_UPDATE(??,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_PARAMETRO_CUENTA_PAGAR_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_PARAMETRO_CUENTA_PAGAR_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $parametro_cuenta_pagar_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'parametro_cuenta_pagar';
		
		parametro_cuenta_pagar_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('CUENTASPAGAR');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->parametro_cuenta_pagar_DataAccessAdditional=new parametro_cuenta_pagarDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_empresa,numero_cuenta_pagar,numero_credito,numero_debito,numero_pago,mostrar_anulado,numero_proveedor,con_proveedor_inactivo) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%d,%d,%d,%d,\'%d\',%d,\'%d\')';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_empresa=%d,numero_cuenta_pagar=%d,numero_credito=%d,numero_debito=%d,numero_pago=%d,mostrar_anulado=\'%d\',numero_proveedor=%d,con_proveedor_inactivo=\'%d\' where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_cuenta_pagar,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_credito,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_debito,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_pago,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.mostrar_anulado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_proveedor_inactivo from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(parametro_cuenta_pagar $parametro_cuenta_pagar,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($parametro_cuenta_pagar->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=parametro_cuenta_pagar_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($parametro_cuenta_pagar->getId(),$connexion));				
				
			} else if ($parametro_cuenta_pagar->getIsChanged()) {
				if($parametro_cuenta_pagar->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=parametro_cuenta_pagar_data::$QUERY_INSERT;
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$parametro_cuenta_pagar->getid_empresa(),$parametro_cuenta_pagar->getnumero_cuenta_pagar(),$parametro_cuenta_pagar->getnumero_credito(),$parametro_cuenta_pagar->getnumero_debito(),$parametro_cuenta_pagar->getnumero_pago(),$parametro_cuenta_pagar->getmostrar_anulado(),$parametro_cuenta_pagar->getnumero_proveedor(),$parametro_cuenta_pagar->getcon_proveedor_inactivo() );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=parametro_cuenta_pagar_data::$QUERY_UPDATE;			
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$parametro_cuenta_pagar->getid_empresa(),$parametro_cuenta_pagar->getnumero_cuenta_pagar(),$parametro_cuenta_pagar->getnumero_credito(),$parametro_cuenta_pagar->getnumero_debito(),$parametro_cuenta_pagar->getnumero_pago(),$parametro_cuenta_pagar->getmostrar_anulado(),$parametro_cuenta_pagar->getnumero_proveedor(),$parametro_cuenta_pagar->getcon_proveedor_inactivo(), Funciones::GetRealScapeString($parametro_cuenta_pagar->getId(),$connexion), Funciones::GetRealScapeString($parametro_cuenta_pagar->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($parametro_cuenta_pagar, $connexion,$strQuerySaveComplete,parametro_cuenta_pagar_data::$TABLE_NAME,parametro_cuenta_pagar_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				parametro_cuenta_pagar_data::savePrepared($parametro_cuenta_pagar, $connexion,$strQuerySave,parametro_cuenta_pagar_data::$TABLE_NAME,parametro_cuenta_pagar_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			parametro_cuenta_pagar_data::setparametro_cuenta_pagar_OriginalStatic($parametro_cuenta_pagar);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(parametro_cuenta_pagar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				parametro_cuenta_pagar_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					parametro_cuenta_pagar_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					parametro_cuenta_pagar_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(parametro_cuenta_pagar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					parametro_cuenta_pagar_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(parametro_cuenta_pagar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					parametro_cuenta_pagar_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(parametro_cuenta_pagar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					parametro_cuenta_pagar_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?parametro_cuenta_pagar {		
		$entity = new parametro_cuenta_pagar();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=parametro_cuenta_pagar_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=parametro_cuenta_pagar_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//CuentasPagar.parametro_cuenta_pagar.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setparametro_cuenta_pagar_Original(new parametro_cuenta_pagar());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_cuenta_pagar_data::$IS_WITH_SCHEMA);         	    
				/*$entity=parametro_cuenta_pagar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setparametro_cuenta_pagar_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_cuenta_pagar_Original(),$resultSet,parametro_cuenta_pagar_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setparametro_cuenta_pagar_Original(parametro_cuenta_pagar_data::getEntityBaseResult("",$entity->getparametro_cuenta_pagar_Original(),$resultSet));
				//$entity->setparametro_cuenta_pagar_Original($this->getEntityBaseResult("",$entity->getparametro_cuenta_pagar_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?parametro_cuenta_pagar {
		$entity = new parametro_cuenta_pagar();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=parametro_cuenta_pagar_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=parametro_cuenta_pagar_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,parametro_cuenta_pagar_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".CuentasPagar.parametro_cuenta_pagar.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setparametro_cuenta_pagar_Original(new parametro_cuenta_pagar());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_cuenta_pagar_data::$IS_WITH_SCHEMA);         	    
				/*$entity=parametro_cuenta_pagar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setparametro_cuenta_pagar_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_cuenta_pagar_Original(),$resultSet,parametro_cuenta_pagar_data::$IS_WITH_SCHEMA));         		
				////$entity->setparametro_cuenta_pagar_Original(parametro_cuenta_pagar_data::getEntityBaseResult("",$entity->getparametro_cuenta_pagar_Original(),$resultSet));
				//$entity->setparametro_cuenta_pagar_Original($this->getEntityBaseResult("",$entity->getparametro_cuenta_pagar_Original(),$resultSet));
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
		$entity = new parametro_cuenta_pagar();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=parametro_cuenta_pagar_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=parametro_cuenta_pagar_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,parametro_cuenta_pagar_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new parametro_cuenta_pagar();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_cuenta_pagar_data::$IS_WITH_SCHEMA);         		
				/*$entity=parametro_cuenta_pagar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setparametro_cuenta_pagar_Original( new parametro_cuenta_pagar());
				
				//$entity->setparametro_cuenta_pagar_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_cuenta_pagar_Original(),$resultSet,parametro_cuenta_pagar_data::$IS_WITH_SCHEMA));         		
				////$entity->setparametro_cuenta_pagar_Original(parametro_cuenta_pagar_data::getEntityBaseResult("",$entity->getparametro_cuenta_pagar_Original(),$resultSet));
				//$entity->setparametro_cuenta_pagar_Original($this->getEntityBaseResult("",$entity->getparametro_cuenta_pagar_Original(),$resultSet));
								
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
		$entity = new parametro_cuenta_pagar();		  
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
      	    	$entity = new parametro_cuenta_pagar();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_cuenta_pagar_data::$IS_WITH_SCHEMA);         		
				/*$entity=parametro_cuenta_pagar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setparametro_cuenta_pagar_Original( new parametro_cuenta_pagar());
				
				//$entity->setparametro_cuenta_pagar_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_cuenta_pagar_Original(),$resultSet,parametro_cuenta_pagar_data::$IS_WITH_SCHEMA));         		
				////$entity->setparametro_cuenta_pagar_Original(parametro_cuenta_pagar_data::getEntityBaseResult("",$entity->getparametro_cuenta_pagar_Original(),$resultSet));
				//$entity->setparametro_cuenta_pagar_Original($this->getEntityBaseResult("",$entity->getparametro_cuenta_pagar_Original(),$resultSet));
				
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
		$entity = new parametro_cuenta_pagar();		  
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
      	    	$entity = new parametro_cuenta_pagar();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_cuenta_pagar_data::$IS_WITH_SCHEMA);         		
				/*$entity=parametro_cuenta_pagar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setparametro_cuenta_pagar_Original( new parametro_cuenta_pagar());				
				//$entity->setparametro_cuenta_pagar_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_cuenta_pagar_Original(),$resultSet,parametro_cuenta_pagar_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setparametro_cuenta_pagar_Original(parametro_cuenta_pagar_data::getEntityBaseResult("",$entity->getparametro_cuenta_pagar_Original(),$resultSet));
				//$entity->setparametro_cuenta_pagar_Original($this->getEntityBaseResult("",$entity->getparametro_cuenta_pagar_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=parametro_cuenta_pagar_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,parametro_cuenta_pagar $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,parametro_cuenta_pagar_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,parametro_cuenta_pagar_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getempresa(Connexion $connexion,$relparametro_cuenta_pagar) : ?empresa{

		$empresa= new empresa();

		try {
			$empresaDataAccess=new empresa_data();
			$empresaDataAccess->isForFKData=$this->isForFKDataRels;
			$empresa=$empresaDataAccess->getEntity($connexion,$relparametro_cuenta_pagar->getid_empresa());

		} catch(Exception $e) {
			throw $e;
		}

		return $empresa;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,parametro_cuenta_pagar $entity,$resultSet) : parametro_cuenta_pagar {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_empresa((int)$resultSet[$strPrefijo.'id_empresa']);
				$entity->setnumero_cuenta_pagar((int)$resultSet[$strPrefijo.'numero_cuenta_pagar']);
				$entity->setnumero_credito((int)$resultSet[$strPrefijo.'numero_credito']);
				$entity->setnumero_debito((int)$resultSet[$strPrefijo.'numero_debito']);
				$entity->setnumero_pago((int)$resultSet[$strPrefijo.'numero_pago']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setmostrar_anulado($resultSet[$strPrefijo.'mostrar_anulado']=='f'? false:true );
				} else {
					$entity->setmostrar_anulado((bool)$resultSet[$strPrefijo.'mostrar_anulado']);
				}
				$entity->setnumero_proveedor((int)$resultSet[$strPrefijo.'numero_proveedor']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setcon_proveedor_inactivo($resultSet[$strPrefijo.'con_proveedor_inactivo']=='f'? false:true );
				} else {
					$entity->setcon_proveedor_inactivo((bool)$resultSet[$strPrefijo.'con_proveedor_inactivo']);
				}
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,parametro_cuenta_pagar $parametro_cuenta_pagar,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $parametro_cuenta_pagar->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiiiii', $parametro_cuenta_pagar->getid_empresa(),$parametro_cuenta_pagar->getnumero_cuenta_pagar(),$parametro_cuenta_pagar->getnumero_credito(),$parametro_cuenta_pagar->getnumero_debito(),$parametro_cuenta_pagar->getnumero_pago(),$parametro_cuenta_pagar->getmostrar_anulado(),$parametro_cuenta_pagar->getnumero_proveedor(),$parametro_cuenta_pagar->getcon_proveedor_inactivo());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiiiiiis', $parametro_cuenta_pagar->getid_empresa(),$parametro_cuenta_pagar->getnumero_cuenta_pagar(),$parametro_cuenta_pagar->getnumero_credito(),$parametro_cuenta_pagar->getnumero_debito(),$parametro_cuenta_pagar->getnumero_pago(),$parametro_cuenta_pagar->getmostrar_anulado(),$parametro_cuenta_pagar->getnumero_proveedor(),$parametro_cuenta_pagar->getcon_proveedor_inactivo(), $parametro_cuenta_pagar->getId(), Funciones::GetRealScapeString($parametro_cuenta_pagar->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,parametro_cuenta_pagar $parametro_cuenta_pagar,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($parametro_cuenta_pagar->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($parametro_cuenta_pagar->getid_empresa(),$parametro_cuenta_pagar->getnumero_cuenta_pagar(),$parametro_cuenta_pagar->getnumero_credito(),$parametro_cuenta_pagar->getnumero_debito(),$parametro_cuenta_pagar->getnumero_pago(),$parametro_cuenta_pagar->getmostrar_anulado(),$parametro_cuenta_pagar->getnumero_proveedor(),$parametro_cuenta_pagar->getcon_proveedor_inactivo());
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($parametro_cuenta_pagar->getid_empresa(),$parametro_cuenta_pagar->getnumero_cuenta_pagar(),$parametro_cuenta_pagar->getnumero_credito(),$parametro_cuenta_pagar->getnumero_debito(),$parametro_cuenta_pagar->getnumero_pago(),$parametro_cuenta_pagar->getmostrar_anulado(),$parametro_cuenta_pagar->getnumero_proveedor(),$parametro_cuenta_pagar->getcon_proveedor_inactivo(), $parametro_cuenta_pagar->getId(), Funciones::GetRealScapeString($parametro_cuenta_pagar->getVersionRow(),$connexion));
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
	
	public function setparametro_cuenta_pagar_Original(parametro_cuenta_pagar $parametro_cuenta_pagar) {
		$parametro_cuenta_pagar->setparametro_cuenta_pagar_Original(clone $parametro_cuenta_pagar);		
	}
	
	public function setparametro_cuenta_pagars_Original(array $parametro_cuenta_pagars) {
		foreach($parametro_cuenta_pagars as $parametro_cuenta_pagar){
			$parametro_cuenta_pagar->setparametro_cuenta_pagar_Original(clone $parametro_cuenta_pagar);
		}
	}
	
	public static function setparametro_cuenta_pagar_OriginalStatic(parametro_cuenta_pagar $parametro_cuenta_pagar) {
		$parametro_cuenta_pagar->setparametro_cuenta_pagar_Original(clone $parametro_cuenta_pagar);		
	}
	
	public static function setparametro_cuenta_pagars_OriginalStatic(array $parametro_cuenta_pagars) {		
		foreach($parametro_cuenta_pagars as $parametro_cuenta_pagar){
			$parametro_cuenta_pagar->setparametro_cuenta_pagar_Original(clone $parametro_cuenta_pagar);
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
