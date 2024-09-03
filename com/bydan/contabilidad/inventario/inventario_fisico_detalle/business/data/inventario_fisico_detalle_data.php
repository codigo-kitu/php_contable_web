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
namespace com\bydan\contabilidad\inventario\inventario_fisico_detalle\business\data;

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

use com\bydan\contabilidad\inventario\inventario_fisico_detalle\business\entity\inventario_fisico_detalle;

//FK


use com\bydan\contabilidad\inventario\inventario_fisico\business\data\inventario_fisico_data;
use com\bydan\contabilidad\inventario\inventario_fisico\business\entity\inventario_fisico;

use com\bydan\contabilidad\inventario\producto\business\data\producto_data;
use com\bydan\contabilidad\inventario\producto\business\entity\producto;

use com\bydan\contabilidad\inventario\bodega\business\data\bodega_data;
use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;

//REL



class inventario_fisico_detalle_data extends GetEntitiesDataAccessHelper implements inventario_fisico_detalle_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='inv_';
	public static string $TABLE_NAME='inv_inventario_fisico_detalle';			
	public static string $TABLE_NAME_inventario_fisico_detalle='inventario_fisico_detalle';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_INVENTARIO_FISICO_DETALLE_INSERT(??,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_INVENTARIO_FISICO_DETALLE_UPDATE(??,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_INVENTARIO_FISICO_DETALLE_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_INVENTARIO_FISICO_DETALLE_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $inventario_fisico_detalle_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'inventario_fisico_detalle';
		
		inventario_fisico_detalle_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('INVENTARIO');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->inventario_fisico_detalle_DataAccessAdditional=new inventario_fisico_detalleDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_inventario_fisico,id_producto,id_bodega,unidades_contadas,campo1,campo2,campo3) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%d,%d,%f,\'%s\',%f,\'%s\')';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_inventario_fisico=%d,id_producto=%d,id_bodega=%d,unidades_contadas=%f,campo1=\'%s\',campo2=%f,campo3=\'%s\' where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_inventario_fisico,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_bodega,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.unidades_contadas,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.campo1,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.campo2,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.campo3 from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(inventario_fisico_detalle $inventario_fisico_detalle,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($inventario_fisico_detalle->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=inventario_fisico_detalle_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($inventario_fisico_detalle->getId(),$connexion));				
				
			} else if ($inventario_fisico_detalle->getIsChanged()) {
				if($inventario_fisico_detalle->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=inventario_fisico_detalle_data::$QUERY_INSERT;
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$inventario_fisico_detalle->getid_inventario_fisico(),$inventario_fisico_detalle->getid_producto(),$inventario_fisico_detalle->getid_bodega(),$inventario_fisico_detalle->getunidades_contadas(),Funciones::GetRealScapeString($inventario_fisico_detalle->getcampo1(),$connexion),$inventario_fisico_detalle->getcampo2(),Funciones::GetRealScapeString($inventario_fisico_detalle->getcampo3(),$connexion) );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=inventario_fisico_detalle_data::$QUERY_UPDATE;			
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$inventario_fisico_detalle->getid_inventario_fisico(),$inventario_fisico_detalle->getid_producto(),$inventario_fisico_detalle->getid_bodega(),$inventario_fisico_detalle->getunidades_contadas(),Funciones::GetRealScapeString($inventario_fisico_detalle->getcampo1(),$connexion),$inventario_fisico_detalle->getcampo2(),Funciones::GetRealScapeString($inventario_fisico_detalle->getcampo3(),$connexion), Funciones::GetRealScapeString($inventario_fisico_detalle->getId(),$connexion), Funciones::GetRealScapeString($inventario_fisico_detalle->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($inventario_fisico_detalle, $connexion,$strQuerySaveComplete,inventario_fisico_detalle_data::$TABLE_NAME,inventario_fisico_detalle_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				inventario_fisico_detalle_data::savePrepared($inventario_fisico_detalle, $connexion,$strQuerySave,inventario_fisico_detalle_data::$TABLE_NAME,inventario_fisico_detalle_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			inventario_fisico_detalle_data::setinventario_fisico_detalle_OriginalStatic($inventario_fisico_detalle);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(inventario_fisico_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				inventario_fisico_detalle_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					inventario_fisico_detalle_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					inventario_fisico_detalle_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(inventario_fisico_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					inventario_fisico_detalle_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(inventario_fisico_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					inventario_fisico_detalle_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(inventario_fisico_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					inventario_fisico_detalle_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?inventario_fisico_detalle {		
		$entity = new inventario_fisico_detalle();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=inventario_fisico_detalle_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=inventario_fisico_detalle_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//Inventario.inventario_fisico_detalle.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setinventario_fisico_detalle_Original(new inventario_fisico_detalle());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,inventario_fisico_detalle_data::$IS_WITH_SCHEMA);         	    
				/*$entity=inventario_fisico_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setinventario_fisico_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getinventario_fisico_detalle_Original(),$resultSet,inventario_fisico_detalle_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setinventario_fisico_detalle_Original(inventario_fisico_detalle_data::getEntityBaseResult("",$entity->getinventario_fisico_detalle_Original(),$resultSet));
				//$entity->setinventario_fisico_detalle_Original($this->getEntityBaseResult("",$entity->getinventario_fisico_detalle_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?inventario_fisico_detalle {
		$entity = new inventario_fisico_detalle();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=inventario_fisico_detalle_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=inventario_fisico_detalle_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,inventario_fisico_detalle_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".Inventario.inventario_fisico_detalle.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setinventario_fisico_detalle_Original(new inventario_fisico_detalle());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,inventario_fisico_detalle_data::$IS_WITH_SCHEMA);         	    
				/*$entity=inventario_fisico_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setinventario_fisico_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getinventario_fisico_detalle_Original(),$resultSet,inventario_fisico_detalle_data::$IS_WITH_SCHEMA));         		
				////$entity->setinventario_fisico_detalle_Original(inventario_fisico_detalle_data::getEntityBaseResult("",$entity->getinventario_fisico_detalle_Original(),$resultSet));
				//$entity->setinventario_fisico_detalle_Original($this->getEntityBaseResult("",$entity->getinventario_fisico_detalle_Original(),$resultSet));
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
		$entity = new inventario_fisico_detalle();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=inventario_fisico_detalle_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=inventario_fisico_detalle_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,inventario_fisico_detalle_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new inventario_fisico_detalle();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,inventario_fisico_detalle_data::$IS_WITH_SCHEMA);         		
				/*$entity=inventario_fisico_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setinventario_fisico_detalle_Original( new inventario_fisico_detalle());
				
				//$entity->setinventario_fisico_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getinventario_fisico_detalle_Original(),$resultSet,inventario_fisico_detalle_data::$IS_WITH_SCHEMA));         		
				////$entity->setinventario_fisico_detalle_Original(inventario_fisico_detalle_data::getEntityBaseResult("",$entity->getinventario_fisico_detalle_Original(),$resultSet));
				//$entity->setinventario_fisico_detalle_Original($this->getEntityBaseResult("",$entity->getinventario_fisico_detalle_Original(),$resultSet));
								
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
		$entity = new inventario_fisico_detalle();		  
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
      	    	$entity = new inventario_fisico_detalle();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,inventario_fisico_detalle_data::$IS_WITH_SCHEMA);         		
				/*$entity=inventario_fisico_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setinventario_fisico_detalle_Original( new inventario_fisico_detalle());
				
				//$entity->setinventario_fisico_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getinventario_fisico_detalle_Original(),$resultSet,inventario_fisico_detalle_data::$IS_WITH_SCHEMA));         		
				////$entity->setinventario_fisico_detalle_Original(inventario_fisico_detalle_data::getEntityBaseResult("",$entity->getinventario_fisico_detalle_Original(),$resultSet));
				//$entity->setinventario_fisico_detalle_Original($this->getEntityBaseResult("",$entity->getinventario_fisico_detalle_Original(),$resultSet));
				
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
		$entity = new inventario_fisico_detalle();		  
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
      	    	$entity = new inventario_fisico_detalle();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,inventario_fisico_detalle_data::$IS_WITH_SCHEMA);         		
				/*$entity=inventario_fisico_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setinventario_fisico_detalle_Original( new inventario_fisico_detalle());				
				//$entity->setinventario_fisico_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getinventario_fisico_detalle_Original(),$resultSet,inventario_fisico_detalle_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setinventario_fisico_detalle_Original(inventario_fisico_detalle_data::getEntityBaseResult("",$entity->getinventario_fisico_detalle_Original(),$resultSet));
				//$entity->setinventario_fisico_detalle_Original($this->getEntityBaseResult("",$entity->getinventario_fisico_detalle_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=inventario_fisico_detalle_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,inventario_fisico_detalle $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,inventario_fisico_detalle_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,inventario_fisico_detalle_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getinventario_fisico(Connexion $connexion,$relinventario_fisico_detalle) : ?inventario_fisico{

		$inventario_fisico= new inventario_fisico();

		try {
			$inventario_fisicoDataAccess=new inventario_fisico_data();
			$inventario_fisicoDataAccess->isForFKData=$this->isForFKDataRels;
			$inventario_fisico=$inventario_fisicoDataAccess->getEntity($connexion,$relinventario_fisico_detalle->getid_inventario_fisico());

		} catch(Exception $e) {
			throw $e;
		}

		return $inventario_fisico;
	}


	public function  getproducto(Connexion $connexion,$relinventario_fisico_detalle) : ?producto{

		$producto= new producto();

		try {
			$productoDataAccess=new producto_data();
			$productoDataAccess->isForFKData=$this->isForFKDataRels;
			$producto=$productoDataAccess->getEntity($connexion,$relinventario_fisico_detalle->getid_producto());

		} catch(Exception $e) {
			throw $e;
		}

		return $producto;
	}


	public function  getbodega(Connexion $connexion,$relinventario_fisico_detalle) : ?bodega{

		$bodega= new bodega();

		try {
			$bodegaDataAccess=new bodega_data();
			$bodegaDataAccess->isForFKData=$this->isForFKDataRels;
			$bodega=$bodegaDataAccess->getEntity($connexion,$relinventario_fisico_detalle->getid_bodega());

		} catch(Exception $e) {
			throw $e;
		}

		return $bodega;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,inventario_fisico_detalle $entity,$resultSet) : inventario_fisico_detalle {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_inventario_fisico((int)$resultSet[$strPrefijo.'id_inventario_fisico']);
				$entity->setid_producto((int)$resultSet[$strPrefijo.'id_producto']);
				$entity->setid_bodega((int)$resultSet[$strPrefijo.'id_bodega']);
				$entity->setunidades_contadas((float)$resultSet[$strPrefijo.'unidades_contadas']);
				$entity->setcampo1(utf8_encode($resultSet[$strPrefijo.'campo1']));
				$entity->setcampo2((float)$resultSet[$strPrefijo.'campo2']);
				$entity->setcampo3(utf8_encode($resultSet[$strPrefijo.'campo3']));
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,inventario_fisico_detalle $inventario_fisico_detalle,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $inventario_fisico_detalle->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iiidsds', $inventario_fisico_detalle->getid_inventario_fisico(),$inventario_fisico_detalle->getid_producto(),$inventario_fisico_detalle->getid_bodega(),$inventario_fisico_detalle->getunidades_contadas(),$inventario_fisico_detalle->getcampo1(),$inventario_fisico_detalle->getcampo2(),$inventario_fisico_detalle->getcampo3());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iiidsdsis', $inventario_fisico_detalle->getid_inventario_fisico(),$inventario_fisico_detalle->getid_producto(),$inventario_fisico_detalle->getid_bodega(),$inventario_fisico_detalle->getunidades_contadas(),$inventario_fisico_detalle->getcampo1(),$inventario_fisico_detalle->getcampo2(),$inventario_fisico_detalle->getcampo3(), $inventario_fisico_detalle->getId(), Funciones::GetRealScapeString($inventario_fisico_detalle->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,inventario_fisico_detalle $inventario_fisico_detalle,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($inventario_fisico_detalle->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($inventario_fisico_detalle->getid_inventario_fisico(),$inventario_fisico_detalle->getid_producto(),$inventario_fisico_detalle->getid_bodega(),$inventario_fisico_detalle->getunidades_contadas(),Funciones::GetRealScapeString($inventario_fisico_detalle->getcampo1(),$connexion),$inventario_fisico_detalle->getcampo2(),Funciones::GetRealScapeString($inventario_fisico_detalle->getcampo3(),$connexion));
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($inventario_fisico_detalle->getid_inventario_fisico(),$inventario_fisico_detalle->getid_producto(),$inventario_fisico_detalle->getid_bodega(),$inventario_fisico_detalle->getunidades_contadas(),Funciones::GetRealScapeString($inventario_fisico_detalle->getcampo1(),$connexion),$inventario_fisico_detalle->getcampo2(),Funciones::GetRealScapeString($inventario_fisico_detalle->getcampo3(),$connexion), $inventario_fisico_detalle->getId(), Funciones::GetRealScapeString($inventario_fisico_detalle->getVersionRow(),$connexion));
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
	
	public function setinventario_fisico_detalle_Original(inventario_fisico_detalle $inventario_fisico_detalle) {
		$inventario_fisico_detalle->setinventario_fisico_detalle_Original(clone $inventario_fisico_detalle);		
	}
	
	public function setinventario_fisico_detalles_Original(array $inventario_fisico_detalles) {
		foreach($inventario_fisico_detalles as $inventario_fisico_detalle){
			$inventario_fisico_detalle->setinventario_fisico_detalle_Original(clone $inventario_fisico_detalle);
		}
	}
	
	public static function setinventario_fisico_detalle_OriginalStatic(inventario_fisico_detalle $inventario_fisico_detalle) {
		$inventario_fisico_detalle->setinventario_fisico_detalle_Original(clone $inventario_fisico_detalle);		
	}
	
	public static function setinventario_fisico_detalles_OriginalStatic(array $inventario_fisico_detalles) {		
		foreach($inventario_fisico_detalles as $inventario_fisico_detalle){
			$inventario_fisico_detalle->setinventario_fisico_detalle_Original(clone $inventario_fisico_detalle);
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
