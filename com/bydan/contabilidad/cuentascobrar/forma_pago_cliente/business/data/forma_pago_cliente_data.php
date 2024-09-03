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
namespace com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\business\data;

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

use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\business\entity\forma_pago_cliente;

//FK


use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\entity\empresa;

use com\bydan\contabilidad\general\tipo_forma_pago\business\data\tipo_forma_pago_data;
use com\bydan\contabilidad\general\tipo_forma_pago\business\entity\tipo_forma_pago;

use com\bydan\contabilidad\contabilidad\cuenta\business\data\cuenta_data;
use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;

//REL

use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\data\documento_cuenta_cobrar_data;
use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\business\data\pago_cuenta_cobrar_data;
use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\business\data\credito_cuenta_cobrar_data;


class forma_pago_cliente_data extends GetEntitiesDataAccessHelper implements forma_pago_cliente_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='cc_';
	public static string $TABLE_NAME='cc_forma_pago_cliente';			
	public static string $TABLE_NAME_forma_pago_cliente='forma_pago_cliente';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_FORMA_PAGO_CLIENTE_INSERT(??,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_FORMA_PAGO_CLIENTE_UPDATE(??,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_FORMA_PAGO_CLIENTE_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_FORMA_PAGO_CLIENTE_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $forma_pago_cliente_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'forma_pago_cliente';
		
		forma_pago_cliente_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('CUENTASCOBRAR');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->forma_pago_cliente_DataAccessAdditional=new forma_pago_clienteDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_empresa,id_tipo_forma_pago,codigo,nombre,predeterminado,id_cuenta,cuenta_contable) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%d,\'%s\',\'%s\',\'%d\',%s,\'%s\')';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_empresa=%d,id_tipo_forma_pago=%d,codigo=\'%s\',nombre=\'%s\',predeterminado=\'%d\',id_cuenta=%s,cuenta_contable=\'%s\' where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_tipo_forma_pago,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.predeterminado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cuenta_contable from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(forma_pago_cliente $forma_pago_cliente,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($forma_pago_cliente->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=forma_pago_cliente_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($forma_pago_cliente->getId(),$connexion));				
				
			} else if ($forma_pago_cliente->getIsChanged()) {
				if($forma_pago_cliente->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=forma_pago_cliente_data::$QUERY_INSERT;
					
					
					
					

					//$id_cuenta='null';
					//if($forma_pago_cliente->getid_cuenta()!==null && $forma_pago_cliente->getid_cuenta()>=0) {
						//$id_cuenta=$forma_pago_cliente->getid_cuenta();
					//} else {
						//$id_cuenta='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$forma_pago_cliente->getid_empresa(),$forma_pago_cliente->getid_tipo_forma_pago(),Funciones::GetRealScapeString($forma_pago_cliente->getcodigo(),$connexion),Funciones::GetRealScapeString($forma_pago_cliente->getnombre(),$connexion),$forma_pago_cliente->getpredeterminado(),Funciones::GetNullString($forma_pago_cliente->getid_cuenta()),Funciones::GetRealScapeString($forma_pago_cliente->getcuenta_contable(),$connexion) );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=forma_pago_cliente_data::$QUERY_UPDATE;			
					
					
					
					

					//$id_cuenta='null';
					//if($forma_pago_cliente->getid_cuenta()!==null && $forma_pago_cliente->getid_cuenta()>=0) {
						//$id_cuenta=$forma_pago_cliente->getid_cuenta();
					//} else {
						//$id_cuenta='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$forma_pago_cliente->getid_empresa(),$forma_pago_cliente->getid_tipo_forma_pago(),Funciones::GetRealScapeString($forma_pago_cliente->getcodigo(),$connexion),Funciones::GetRealScapeString($forma_pago_cliente->getnombre(),$connexion),$forma_pago_cliente->getpredeterminado(),Funciones::GetNullString($forma_pago_cliente->getid_cuenta()),Funciones::GetRealScapeString($forma_pago_cliente->getcuenta_contable(),$connexion), Funciones::GetRealScapeString($forma_pago_cliente->getId(),$connexion), Funciones::GetRealScapeString($forma_pago_cliente->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($forma_pago_cliente, $connexion,$strQuerySaveComplete,forma_pago_cliente_data::$TABLE_NAME,forma_pago_cliente_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				forma_pago_cliente_data::savePrepared($forma_pago_cliente, $connexion,$strQuerySave,forma_pago_cliente_data::$TABLE_NAME,forma_pago_cliente_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			forma_pago_cliente_data::setforma_pago_cliente_OriginalStatic($forma_pago_cliente);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(forma_pago_cliente $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				forma_pago_cliente_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					forma_pago_cliente_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					forma_pago_cliente_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(forma_pago_cliente $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					forma_pago_cliente_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(forma_pago_cliente $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					forma_pago_cliente_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(forma_pago_cliente $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					forma_pago_cliente_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?forma_pago_cliente {		
		$entity = new forma_pago_cliente();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=forma_pago_cliente_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=forma_pago_cliente_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//CuentasCobrar.forma_pago_cliente.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setforma_pago_cliente_Original(new forma_pago_cliente());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,forma_pago_cliente_data::$IS_WITH_SCHEMA);         	    
				/*$entity=forma_pago_cliente_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setforma_pago_cliente_Original(parent::getEntityPrefijoEntityResult("",$entity->getforma_pago_cliente_Original(),$resultSet,forma_pago_cliente_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setforma_pago_cliente_Original(forma_pago_cliente_data::getEntityBaseResult("",$entity->getforma_pago_cliente_Original(),$resultSet));
				//$entity->setforma_pago_cliente_Original($this->getEntityBaseResult("",$entity->getforma_pago_cliente_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?forma_pago_cliente {
		$entity = new forma_pago_cliente();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=forma_pago_cliente_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=forma_pago_cliente_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,forma_pago_cliente_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".CuentasCobrar.forma_pago_cliente.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setforma_pago_cliente_Original(new forma_pago_cliente());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,forma_pago_cliente_data::$IS_WITH_SCHEMA);         	    
				/*$entity=forma_pago_cliente_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setforma_pago_cliente_Original(parent::getEntityPrefijoEntityResult("",$entity->getforma_pago_cliente_Original(),$resultSet,forma_pago_cliente_data::$IS_WITH_SCHEMA));         		
				////$entity->setforma_pago_cliente_Original(forma_pago_cliente_data::getEntityBaseResult("",$entity->getforma_pago_cliente_Original(),$resultSet));
				//$entity->setforma_pago_cliente_Original($this->getEntityBaseResult("",$entity->getforma_pago_cliente_Original(),$resultSet));
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
		$entity = new forma_pago_cliente();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=forma_pago_cliente_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=forma_pago_cliente_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,forma_pago_cliente_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new forma_pago_cliente();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,forma_pago_cliente_data::$IS_WITH_SCHEMA);         		
				/*$entity=forma_pago_cliente_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setforma_pago_cliente_Original( new forma_pago_cliente());
				
				//$entity->setforma_pago_cliente_Original(parent::getEntityPrefijoEntityResult("",$entity->getforma_pago_cliente_Original(),$resultSet,forma_pago_cliente_data::$IS_WITH_SCHEMA));         		
				////$entity->setforma_pago_cliente_Original(forma_pago_cliente_data::getEntityBaseResult("",$entity->getforma_pago_cliente_Original(),$resultSet));
				//$entity->setforma_pago_cliente_Original($this->getEntityBaseResult("",$entity->getforma_pago_cliente_Original(),$resultSet));
								
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
		$entity = new forma_pago_cliente();		  
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
      	    	$entity = new forma_pago_cliente();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,forma_pago_cliente_data::$IS_WITH_SCHEMA);         		
				/*$entity=forma_pago_cliente_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setforma_pago_cliente_Original( new forma_pago_cliente());
				
				//$entity->setforma_pago_cliente_Original(parent::getEntityPrefijoEntityResult("",$entity->getforma_pago_cliente_Original(),$resultSet,forma_pago_cliente_data::$IS_WITH_SCHEMA));         		
				////$entity->setforma_pago_cliente_Original(forma_pago_cliente_data::getEntityBaseResult("",$entity->getforma_pago_cliente_Original(),$resultSet));
				//$entity->setforma_pago_cliente_Original($this->getEntityBaseResult("",$entity->getforma_pago_cliente_Original(),$resultSet));
				
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
		$entity = new forma_pago_cliente();		  
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
      	    	$entity = new forma_pago_cliente();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,forma_pago_cliente_data::$IS_WITH_SCHEMA);         		
				/*$entity=forma_pago_cliente_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setforma_pago_cliente_Original( new forma_pago_cliente());				
				//$entity->setforma_pago_cliente_Original(parent::getEntityPrefijoEntityResult("",$entity->getforma_pago_cliente_Original(),$resultSet,forma_pago_cliente_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setforma_pago_cliente_Original(forma_pago_cliente_data::getEntityBaseResult("",$entity->getforma_pago_cliente_Original(),$resultSet));
				//$entity->setforma_pago_cliente_Original($this->getEntityBaseResult("",$entity->getforma_pago_cliente_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=forma_pago_cliente_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,forma_pago_cliente $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,forma_pago_cliente_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,forma_pago_cliente_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getempresa(Connexion $connexion,$relforma_pago_cliente) : ?empresa{

		$empresa= new empresa();

		try {
			$empresaDataAccess=new empresa_data();
			$empresaDataAccess->isForFKData=$this->isForFKDataRels;
			$empresa=$empresaDataAccess->getEntity($connexion,$relforma_pago_cliente->getid_empresa());

		} catch(Exception $e) {
			throw $e;
		}

		return $empresa;
	}


	public function  gettipo_forma_pago(Connexion $connexion,$relforma_pago_cliente) : ?tipo_forma_pago{

		$tipo_forma_pago= new tipo_forma_pago();

		try {
			$tipo_forma_pagoDataAccess=new tipo_forma_pago_data();
			$tipo_forma_pagoDataAccess->isForFKData=$this->isForFKDataRels;
			$tipo_forma_pago=$tipo_forma_pagoDataAccess->getEntity($connexion,$relforma_pago_cliente->getid_tipo_forma_pago());

		} catch(Exception $e) {
			throw $e;
		}

		return $tipo_forma_pago;
	}


	public function  getcuenta(Connexion $connexion,$relforma_pago_cliente) : ?cuenta{

		$cuenta= new cuenta();

		try {
			$cuentaDataAccess=new cuenta_data();
			$cuentaDataAccess->isForFKData=$this->isForFKDataRels;
			$cuenta=$cuentaDataAccess->getEntity($connexion,$relforma_pago_cliente->getid_cuenta());

		} catch(Exception $e) {
			throw $e;
		}

		return $cuenta;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	public function  getdocumento_cuenta_cobrars(Connexion $connexion,forma_pago_cliente $forma_pago_cliente) : array {

		$documentocuentacobrars=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.documento_cuenta_cobrar_data::$SCHEMA.".".documento_cuenta_cobrar_data::$TABLE_NAME.".id_forma_pago_cliente=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$forma_pago_cliente->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$documentocuentacobrarDataAccess=new documento_cuenta_cobrar_data();

			$documentocuentacobrars=$documentocuentacobrarDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $documentocuentacobrars;
	}


	public function  getpago_cuenta_cobrars(Connexion $connexion,forma_pago_cliente $forma_pago_cliente) : array {

		$pagocuentacobrars=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.pago_cuenta_cobrar_data::$SCHEMA.".".pago_cuenta_cobrar_data::$TABLE_NAME.".id_forma_pago_cliente=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$forma_pago_cliente->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$pagocuentacobrarDataAccess=new pago_cuenta_cobrar_data();

			$pagocuentacobrars=$pagocuentacobrarDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $pagocuentacobrars;
	}


	public function  getcredito_cuenta_cobrars(Connexion $connexion,forma_pago_cliente $forma_pago_cliente) : array {

		$creditocuentacobrars=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.credito_cuenta_cobrar_data::$SCHEMA.".".credito_cuenta_cobrar_data::$TABLE_NAME.".id_forma_pago_cliente=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$forma_pago_cliente->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$creditocuentacobrarDataAccess=new credito_cuenta_cobrar_data();

			$creditocuentacobrars=$creditocuentacobrarDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $creditocuentacobrars;
	}


	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,forma_pago_cliente $entity,$resultSet) : forma_pago_cliente {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_empresa((int)$resultSet[$strPrefijo.'id_empresa']);
				$entity->setid_tipo_forma_pago((int)$resultSet[$strPrefijo.'id_tipo_forma_pago']);
				$entity->setcodigo(utf8_encode($resultSet[$strPrefijo.'codigo']));
				$entity->setnombre(utf8_encode($resultSet[$strPrefijo.'nombre']));
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setpredeterminado($resultSet[$strPrefijo.'predeterminado']=='f'? false:true );
				} else {
					$entity->setpredeterminado((bool)$resultSet[$strPrefijo.'predeterminado']);
				}
				$entity->setid_cuenta((int)$resultSet[$strPrefijo.'id_cuenta']);
				$entity->setcuenta_contable(utf8_encode($resultSet[$strPrefijo.'cuenta_contable']));
			} else {
				$entity->setcodigo(utf8_encode($resultSet[$strPrefijo.'codigo']));								
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,forma_pago_cliente $forma_pago_cliente,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $forma_pago_cliente->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iissiis', $forma_pago_cliente->getid_empresa(),$forma_pago_cliente->getid_tipo_forma_pago(),$forma_pago_cliente->getcodigo(),$forma_pago_cliente->getnombre(),$forma_pago_cliente->getpredeterminado(),$forma_pago_cliente->getid_cuenta(),$forma_pago_cliente->getcuenta_contable());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iissiisis', $forma_pago_cliente->getid_empresa(),$forma_pago_cliente->getid_tipo_forma_pago(),$forma_pago_cliente->getcodigo(),$forma_pago_cliente->getnombre(),$forma_pago_cliente->getpredeterminado(),$forma_pago_cliente->getid_cuenta(),$forma_pago_cliente->getcuenta_contable(), $forma_pago_cliente->getId(), Funciones::GetRealScapeString($forma_pago_cliente->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,forma_pago_cliente $forma_pago_cliente,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($forma_pago_cliente->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($forma_pago_cliente->getid_empresa(),$forma_pago_cliente->getid_tipo_forma_pago(),Funciones::GetRealScapeString($forma_pago_cliente->getcodigo(),$connexion),Funciones::GetRealScapeString($forma_pago_cliente->getnombre(),$connexion),$forma_pago_cliente->getpredeterminado(),Funciones::GetNullString($forma_pago_cliente->getid_cuenta()),Funciones::GetRealScapeString($forma_pago_cliente->getcuenta_contable(),$connexion));
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($forma_pago_cliente->getid_empresa(),$forma_pago_cliente->getid_tipo_forma_pago(),Funciones::GetRealScapeString($forma_pago_cliente->getcodigo(),$connexion),Funciones::GetRealScapeString($forma_pago_cliente->getnombre(),$connexion),$forma_pago_cliente->getpredeterminado(),Funciones::GetNullString($forma_pago_cliente->getid_cuenta()),Funciones::GetRealScapeString($forma_pago_cliente->getcuenta_contable(),$connexion), $forma_pago_cliente->getId(), Funciones::GetRealScapeString($forma_pago_cliente->getVersionRow(),$connexion));
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
	
	public function setforma_pago_cliente_Original(forma_pago_cliente $forma_pago_cliente) {
		$forma_pago_cliente->setforma_pago_cliente_Original(clone $forma_pago_cliente);		
	}
	
	public function setforma_pago_clientes_Original(array $forma_pago_clientes) {
		foreach($forma_pago_clientes as $forma_pago_cliente){
			$forma_pago_cliente->setforma_pago_cliente_Original(clone $forma_pago_cliente);
		}
	}
	
	public static function setforma_pago_cliente_OriginalStatic(forma_pago_cliente $forma_pago_cliente) {
		$forma_pago_cliente->setforma_pago_cliente_Original(clone $forma_pago_cliente);		
	}
	
	public static function setforma_pago_clientes_OriginalStatic(array $forma_pago_clientes) {		
		foreach($forma_pago_clientes as $forma_pago_cliente){
			$forma_pago_cliente->setforma_pago_cliente_Original(clone $forma_pago_cliente);
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
