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
namespace com\bydan\contabilidad\inventario\lista_cliente\business\data;

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

use com\bydan\contabilidad\inventario\lista_cliente\business\entity\lista_cliente;

//FK


use com\bydan\contabilidad\cuentascobrar\cliente\business\data\cliente_data;
use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;

use com\bydan\contabilidad\inventario\producto\business\data\producto_data;
use com\bydan\contabilidad\inventario\producto\business\entity\producto;

//REL



class lista_cliente_data extends GetEntitiesDataAccessHelper implements lista_cliente_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='cc_';
	public static string $TABLE_NAME='cc_lista_cliente';			
	public static string $TABLE_NAME_lista_cliente='lista_cliente';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_LISTA_CLIENTE_INSERT(??,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_LISTA_CLIENTE_UPDATE(??,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_LISTA_CLIENTE_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_LISTA_CLIENTE_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $lista_cliente_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'lista_cliente';
		
		lista_cliente_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('INVENTARIO');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->lista_cliente_DataAccessAdditional=new lista_clienteDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_cliente,id_producto,precio) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%d,%f)';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_cliente=%d,id_producto=%d,precio=%f where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cliente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.precio from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(lista_cliente $lista_cliente,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($lista_cliente->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=lista_cliente_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($lista_cliente->getId(),$connexion));				
				
			} else if ($lista_cliente->getIsChanged()) {
				if($lista_cliente->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=lista_cliente_data::$QUERY_INSERT;
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$lista_cliente->getid_cliente(),$lista_cliente->getid_producto(),$lista_cliente->getprecio() );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=lista_cliente_data::$QUERY_UPDATE;			
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$lista_cliente->getid_cliente(),$lista_cliente->getid_producto(),$lista_cliente->getprecio(), Funciones::GetRealScapeString($lista_cliente->getId(),$connexion), Funciones::GetRealScapeString($lista_cliente->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($lista_cliente, $connexion,$strQuerySaveComplete,lista_cliente_data::$TABLE_NAME,lista_cliente_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				lista_cliente_data::savePrepared($lista_cliente, $connexion,$strQuerySave,lista_cliente_data::$TABLE_NAME,lista_cliente_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			lista_cliente_data::setlista_cliente_OriginalStatic($lista_cliente);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(lista_cliente $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				lista_cliente_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					lista_cliente_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					lista_cliente_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(lista_cliente $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					lista_cliente_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(lista_cliente $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					lista_cliente_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(lista_cliente $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					lista_cliente_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?lista_cliente {		
		$entity = new lista_cliente();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=lista_cliente_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=lista_cliente_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//Inventario.lista_cliente.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setlista_cliente_Original(new lista_cliente());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,lista_cliente_data::$IS_WITH_SCHEMA);         	    
				/*$entity=lista_cliente_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setlista_cliente_Original(parent::getEntityPrefijoEntityResult("",$entity->getlista_cliente_Original(),$resultSet,lista_cliente_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setlista_cliente_Original(lista_cliente_data::getEntityBaseResult("",$entity->getlista_cliente_Original(),$resultSet));
				//$entity->setlista_cliente_Original($this->getEntityBaseResult("",$entity->getlista_cliente_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?lista_cliente {
		$entity = new lista_cliente();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=lista_cliente_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=lista_cliente_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,lista_cliente_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".Inventario.lista_cliente.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setlista_cliente_Original(new lista_cliente());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,lista_cliente_data::$IS_WITH_SCHEMA);         	    
				/*$entity=lista_cliente_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setlista_cliente_Original(parent::getEntityPrefijoEntityResult("",$entity->getlista_cliente_Original(),$resultSet,lista_cliente_data::$IS_WITH_SCHEMA));         		
				////$entity->setlista_cliente_Original(lista_cliente_data::getEntityBaseResult("",$entity->getlista_cliente_Original(),$resultSet));
				//$entity->setlista_cliente_Original($this->getEntityBaseResult("",$entity->getlista_cliente_Original(),$resultSet));
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
		$entity = new lista_cliente();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=lista_cliente_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=lista_cliente_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,lista_cliente_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new lista_cliente();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,lista_cliente_data::$IS_WITH_SCHEMA);         		
				/*$entity=lista_cliente_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setlista_cliente_Original( new lista_cliente());
				
				//$entity->setlista_cliente_Original(parent::getEntityPrefijoEntityResult("",$entity->getlista_cliente_Original(),$resultSet,lista_cliente_data::$IS_WITH_SCHEMA));         		
				////$entity->setlista_cliente_Original(lista_cliente_data::getEntityBaseResult("",$entity->getlista_cliente_Original(),$resultSet));
				//$entity->setlista_cliente_Original($this->getEntityBaseResult("",$entity->getlista_cliente_Original(),$resultSet));
								
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
		$entity = new lista_cliente();		  
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
      	    	$entity = new lista_cliente();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,lista_cliente_data::$IS_WITH_SCHEMA);         		
				/*$entity=lista_cliente_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setlista_cliente_Original( new lista_cliente());
				
				//$entity->setlista_cliente_Original(parent::getEntityPrefijoEntityResult("",$entity->getlista_cliente_Original(),$resultSet,lista_cliente_data::$IS_WITH_SCHEMA));         		
				////$entity->setlista_cliente_Original(lista_cliente_data::getEntityBaseResult("",$entity->getlista_cliente_Original(),$resultSet));
				//$entity->setlista_cliente_Original($this->getEntityBaseResult("",$entity->getlista_cliente_Original(),$resultSet));
				
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
		$entity = new lista_cliente();		  
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
      	    	$entity = new lista_cliente();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,lista_cliente_data::$IS_WITH_SCHEMA);         		
				/*$entity=lista_cliente_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setlista_cliente_Original( new lista_cliente());				
				//$entity->setlista_cliente_Original(parent::getEntityPrefijoEntityResult("",$entity->getlista_cliente_Original(),$resultSet,lista_cliente_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setlista_cliente_Original(lista_cliente_data::getEntityBaseResult("",$entity->getlista_cliente_Original(),$resultSet));
				//$entity->setlista_cliente_Original($this->getEntityBaseResult("",$entity->getlista_cliente_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=lista_cliente_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,lista_cliente $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,lista_cliente_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,lista_cliente_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getcliente(Connexion $connexion,$rellista_cliente) : ?cliente{

		$cliente= new cliente();

		try {
			$clienteDataAccess=new cliente_data();
			$clienteDataAccess->isForFKData=$this->isForFKDataRels;
			$cliente=$clienteDataAccess->getEntity($connexion,$rellista_cliente->getid_cliente());

		} catch(Exception $e) {
			throw $e;
		}

		return $cliente;
	}


	public function  getproducto(Connexion $connexion,$rellista_cliente) : ?producto{

		$producto= new producto();

		try {
			$productoDataAccess=new producto_data();
			$productoDataAccess->isForFKData=$this->isForFKDataRels;
			$producto=$productoDataAccess->getEntity($connexion,$rellista_cliente->getid_producto());

		} catch(Exception $e) {
			throw $e;
		}

		return $producto;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,lista_cliente $entity,$resultSet) : lista_cliente {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_cliente((int)$resultSet[$strPrefijo.'id_cliente']);
				$entity->setid_producto((int)$resultSet[$strPrefijo.'id_producto']);
				$entity->setprecio((float)$resultSet[$strPrefijo.'precio']);
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,lista_cliente $lista_cliente,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $lista_cliente->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iid', $lista_cliente->getid_cliente(),$lista_cliente->getid_producto(),$lista_cliente->getprecio());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iidis', $lista_cliente->getid_cliente(),$lista_cliente->getid_producto(),$lista_cliente->getprecio(), $lista_cliente->getId(), Funciones::GetRealScapeString($lista_cliente->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,lista_cliente $lista_cliente,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($lista_cliente->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($lista_cliente->getid_cliente(),$lista_cliente->getid_producto(),$lista_cliente->getprecio());
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($lista_cliente->getid_cliente(),$lista_cliente->getid_producto(),$lista_cliente->getprecio(), $lista_cliente->getId(), Funciones::GetRealScapeString($lista_cliente->getVersionRow(),$connexion));
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
	
	public function setlista_cliente_Original(lista_cliente $lista_cliente) {
		$lista_cliente->setlista_cliente_Original(clone $lista_cliente);		
	}
	
	public function setlista_clientes_Original(array $lista_clientes) {
		foreach($lista_clientes as $lista_cliente){
			$lista_cliente->setlista_cliente_Original(clone $lista_cliente);
		}
	}
	
	public static function setlista_cliente_OriginalStatic(lista_cliente $lista_cliente) {
		$lista_cliente->setlista_cliente_Original(clone $lista_cliente);		
	}
	
	public static function setlista_clientes_OriginalStatic(array $lista_clientes) {		
		foreach($lista_clientes as $lista_cliente){
			$lista_cliente->setlista_cliente_Original(clone $lista_cliente);
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
