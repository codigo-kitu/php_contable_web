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
namespace com\bydan\contabilidad\contabilidad\asiento_automatico\business\data;

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

use com\bydan\contabilidad\contabilidad\asiento_automatico\business\entity\asiento_automatico;

//FK


use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\entity\empresa;

use com\bydan\contabilidad\seguridad\modulo\business\data\modulo_data;
use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;

use com\bydan\contabilidad\contabilidad\fuente\business\data\fuente_data;
use com\bydan\contabilidad\contabilidad\fuente\business\entity\fuente;

use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\data\libro_auxiliar_data;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\entity\libro_auxiliar;

use com\bydan\contabilidad\contabilidad\centro_costo\business\data\centro_costo_data;
use com\bydan\contabilidad\contabilidad\centro_costo\business\entity\centro_costo;

//REL

use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\business\data\asiento_automatico_detalle_data;


class asiento_automatico_data extends GetEntitiesDataAccessHelper implements asiento_automatico_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='con_';
	public static string $TABLE_NAME='con_asiento_automatico';			
	public static string $TABLE_NAME_asiento_automatico='asiento_automatico';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_ASIENTO_AUTOMATICO_INSERT(??,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_ASIENTO_AUTOMATICO_UPDATE(??,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_ASIENTO_AUTOMATICO_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_ASIENTO_AUTOMATICO_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $asiento_automatico_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'asiento_automatico';
		
		asiento_automatico_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('CONTABILIDAD');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->asiento_automatico_DataAccessAdditional=new asiento_automaticoDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_empresa,id_modulo,codigo,nombre,id_fuente,id_libro_auxiliar,id_centro_costo,descripcion,activo,asignada) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%d,\'%s\',\'%s\',%d,%d,%d,\'%s\',\'%d\',\'%s\')';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_empresa=%d,id_modulo=%d,codigo=\'%s\',nombre=\'%s\',id_fuente=%d,id_libro_auxiliar=%d,id_centro_costo=%d,descripcion=\'%s\',activo=\'%d\',asignada=\'%s\' where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_modulo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_fuente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_libro_auxiliar,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_centro_costo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.activo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.asignada from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(asiento_automatico $asiento_automatico,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($asiento_automatico->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=asiento_automatico_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($asiento_automatico->getId(),$connexion));				
				
			} else if ($asiento_automatico->getIsChanged()) {
				if($asiento_automatico->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=asiento_automatico_data::$QUERY_INSERT;
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$asiento_automatico->getid_empresa(),$asiento_automatico->getid_modulo(),Funciones::GetRealScapeString($asiento_automatico->getcodigo(),$connexion),Funciones::GetRealScapeString($asiento_automatico->getnombre(),$connexion),$asiento_automatico->getid_fuente(),$asiento_automatico->getid_libro_auxiliar(),$asiento_automatico->getid_centro_costo(),Funciones::GetRealScapeString($asiento_automatico->getdescripcion(),$connexion),$asiento_automatico->getactivo(),Funciones::GetRealScapeString($asiento_automatico->getasignada(),$connexion) );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=asiento_automatico_data::$QUERY_UPDATE;			
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$asiento_automatico->getid_empresa(),$asiento_automatico->getid_modulo(),Funciones::GetRealScapeString($asiento_automatico->getcodigo(),$connexion),Funciones::GetRealScapeString($asiento_automatico->getnombre(),$connexion),$asiento_automatico->getid_fuente(),$asiento_automatico->getid_libro_auxiliar(),$asiento_automatico->getid_centro_costo(),Funciones::GetRealScapeString($asiento_automatico->getdescripcion(),$connexion),$asiento_automatico->getactivo(),Funciones::GetRealScapeString($asiento_automatico->getasignada(),$connexion), Funciones::GetRealScapeString($asiento_automatico->getId(),$connexion), Funciones::GetRealScapeString($asiento_automatico->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($asiento_automatico, $connexion,$strQuerySaveComplete,asiento_automatico_data::$TABLE_NAME,asiento_automatico_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				asiento_automatico_data::savePrepared($asiento_automatico, $connexion,$strQuerySave,asiento_automatico_data::$TABLE_NAME,asiento_automatico_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			asiento_automatico_data::setasiento_automatico_OriginalStatic($asiento_automatico);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(asiento_automatico $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				asiento_automatico_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					asiento_automatico_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					asiento_automatico_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(asiento_automatico $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					asiento_automatico_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(asiento_automatico $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					asiento_automatico_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(asiento_automatico $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					asiento_automatico_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?asiento_automatico {		
		$entity = new asiento_automatico();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=asiento_automatico_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=asiento_automatico_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//Contabilidad.asiento_automatico.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setasiento_automatico_Original(new asiento_automatico());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,asiento_automatico_data::$IS_WITH_SCHEMA);         	    
				/*$entity=asiento_automatico_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setasiento_automatico_Original(parent::getEntityPrefijoEntityResult("",$entity->getasiento_automatico_Original(),$resultSet,asiento_automatico_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setasiento_automatico_Original(asiento_automatico_data::getEntityBaseResult("",$entity->getasiento_automatico_Original(),$resultSet));
				//$entity->setasiento_automatico_Original($this->getEntityBaseResult("",$entity->getasiento_automatico_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?asiento_automatico {
		$entity = new asiento_automatico();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=asiento_automatico_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=asiento_automatico_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,asiento_automatico_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".Contabilidad.asiento_automatico.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setasiento_automatico_Original(new asiento_automatico());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,asiento_automatico_data::$IS_WITH_SCHEMA);         	    
				/*$entity=asiento_automatico_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setasiento_automatico_Original(parent::getEntityPrefijoEntityResult("",$entity->getasiento_automatico_Original(),$resultSet,asiento_automatico_data::$IS_WITH_SCHEMA));         		
				////$entity->setasiento_automatico_Original(asiento_automatico_data::getEntityBaseResult("",$entity->getasiento_automatico_Original(),$resultSet));
				//$entity->setasiento_automatico_Original($this->getEntityBaseResult("",$entity->getasiento_automatico_Original(),$resultSet));
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
		$entity = new asiento_automatico();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=asiento_automatico_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=asiento_automatico_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,asiento_automatico_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new asiento_automatico();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,asiento_automatico_data::$IS_WITH_SCHEMA);         		
				/*$entity=asiento_automatico_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setasiento_automatico_Original( new asiento_automatico());
				
				//$entity->setasiento_automatico_Original(parent::getEntityPrefijoEntityResult("",$entity->getasiento_automatico_Original(),$resultSet,asiento_automatico_data::$IS_WITH_SCHEMA));         		
				////$entity->setasiento_automatico_Original(asiento_automatico_data::getEntityBaseResult("",$entity->getasiento_automatico_Original(),$resultSet));
				//$entity->setasiento_automatico_Original($this->getEntityBaseResult("",$entity->getasiento_automatico_Original(),$resultSet));
								
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
		$entity = new asiento_automatico();		  
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
      	    	$entity = new asiento_automatico();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,asiento_automatico_data::$IS_WITH_SCHEMA);         		
				/*$entity=asiento_automatico_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setasiento_automatico_Original( new asiento_automatico());
				
				//$entity->setasiento_automatico_Original(parent::getEntityPrefijoEntityResult("",$entity->getasiento_automatico_Original(),$resultSet,asiento_automatico_data::$IS_WITH_SCHEMA));         		
				////$entity->setasiento_automatico_Original(asiento_automatico_data::getEntityBaseResult("",$entity->getasiento_automatico_Original(),$resultSet));
				//$entity->setasiento_automatico_Original($this->getEntityBaseResult("",$entity->getasiento_automatico_Original(),$resultSet));
				
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
		$entity = new asiento_automatico();		  
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
      	    	$entity = new asiento_automatico();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,asiento_automatico_data::$IS_WITH_SCHEMA);         		
				/*$entity=asiento_automatico_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setasiento_automatico_Original( new asiento_automatico());				
				//$entity->setasiento_automatico_Original(parent::getEntityPrefijoEntityResult("",$entity->getasiento_automatico_Original(),$resultSet,asiento_automatico_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setasiento_automatico_Original(asiento_automatico_data::getEntityBaseResult("",$entity->getasiento_automatico_Original(),$resultSet));
				//$entity->setasiento_automatico_Original($this->getEntityBaseResult("",$entity->getasiento_automatico_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=asiento_automatico_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,asiento_automatico $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,asiento_automatico_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,asiento_automatico_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getempresa(Connexion $connexion,$relasiento_automatico) : ?empresa{

		$empresa= new empresa();

		try {
			$empresaDataAccess=new empresa_data();
			$empresaDataAccess->isForFKData=$this->isForFKDataRels;
			$empresa=$empresaDataAccess->getEntity($connexion,$relasiento_automatico->getid_empresa());

		} catch(Exception $e) {
			throw $e;
		}

		return $empresa;
	}


	public function  getmodulo(Connexion $connexion,$relasiento_automatico) : ?modulo{

		$modulo= new modulo();

		try {
			$moduloDataAccess=new modulo_data();
			$moduloDataAccess->isForFKData=$this->isForFKDataRels;
			$modulo=$moduloDataAccess->getEntity($connexion,$relasiento_automatico->getid_modulo());

		} catch(Exception $e) {
			throw $e;
		}

		return $modulo;
	}


	public function  getfuente(Connexion $connexion,$relasiento_automatico) : ?fuente{

		$fuente= new fuente();

		try {
			$fuenteDataAccess=new fuente_data();
			$fuenteDataAccess->isForFKData=$this->isForFKDataRels;
			$fuente=$fuenteDataAccess->getEntity($connexion,$relasiento_automatico->getid_fuente());

		} catch(Exception $e) {
			throw $e;
		}

		return $fuente;
	}


	public function  getlibro_auxiliar(Connexion $connexion,$relasiento_automatico) : ?libro_auxiliar{

		$libro_auxiliar= new libro_auxiliar();

		try {
			$libro_auxiliarDataAccess=new libro_auxiliar_data();
			$libro_auxiliarDataAccess->isForFKData=$this->isForFKDataRels;
			$libro_auxiliar=$libro_auxiliarDataAccess->getEntity($connexion,$relasiento_automatico->getid_libro_auxiliar());

		} catch(Exception $e) {
			throw $e;
		}

		return $libro_auxiliar;
	}


	public function  getcentro_costo(Connexion $connexion,$relasiento_automatico) : ?centro_costo{

		$centro_costo= new centro_costo();

		try {
			$centro_costoDataAccess=new centro_costo_data();
			$centro_costoDataAccess->isForFKData=$this->isForFKDataRels;
			$centro_costo=$centro_costoDataAccess->getEntity($connexion,$relasiento_automatico->getid_centro_costo());

		} catch(Exception $e) {
			throw $e;
		}

		return $centro_costo;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	public function  getasiento_automatico_detalles(Connexion $connexion,asiento_automatico $asiento_automatico) : array {

		$asientoautomaticodetalles=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.asiento_automatico_detalle_data::$SCHEMA.".".asiento_automatico_detalle_data::$TABLE_NAME.".id_asiento_automatico=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$asiento_automatico->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$asientoautomaticodetalleDataAccess=new asiento_automatico_detalle_data();

			$asientoautomaticodetalles=$asientoautomaticodetalleDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $asientoautomaticodetalles;
	}


	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,asiento_automatico $entity,$resultSet) : asiento_automatico {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_empresa((int)$resultSet[$strPrefijo.'id_empresa']);
				$entity->setid_modulo((int)$resultSet[$strPrefijo.'id_modulo']);
				$entity->setcodigo(utf8_encode($resultSet[$strPrefijo.'codigo']));
				$entity->setnombre(utf8_encode($resultSet[$strPrefijo.'nombre']));
				$entity->setid_fuente((int)$resultSet[$strPrefijo.'id_fuente']);
				$entity->setid_libro_auxiliar((int)$resultSet[$strPrefijo.'id_libro_auxiliar']);
				$entity->setid_centro_costo((int)$resultSet[$strPrefijo.'id_centro_costo']);
				$entity->setdescripcion(utf8_encode($resultSet[$strPrefijo.'descripcion']));
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setactivo($resultSet[$strPrefijo.'activo']=='f'? false:true );
				} else {
					$entity->setactivo((bool)$resultSet[$strPrefijo.'activo']);
				}
				$entity->setasignada(utf8_encode($resultSet[$strPrefijo.'asignada']));
			} else {
				$entity->setcodigo(utf8_encode($resultSet[$strPrefijo.'codigo']));								
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,asiento_automatico $asiento_automatico,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $asiento_automatico->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iissiiisis', $asiento_automatico->getid_empresa(),$asiento_automatico->getid_modulo(),$asiento_automatico->getcodigo(),$asiento_automatico->getnombre(),$asiento_automatico->getid_fuente(),$asiento_automatico->getid_libro_auxiliar(),$asiento_automatico->getid_centro_costo(),$asiento_automatico->getdescripcion(),$asiento_automatico->getactivo(),$asiento_automatico->getasignada());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iissiiisisis', $asiento_automatico->getid_empresa(),$asiento_automatico->getid_modulo(),$asiento_automatico->getcodigo(),$asiento_automatico->getnombre(),$asiento_automatico->getid_fuente(),$asiento_automatico->getid_libro_auxiliar(),$asiento_automatico->getid_centro_costo(),$asiento_automatico->getdescripcion(),$asiento_automatico->getactivo(),$asiento_automatico->getasignada(), $asiento_automatico->getId(), Funciones::GetRealScapeString($asiento_automatico->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,asiento_automatico $asiento_automatico,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($asiento_automatico->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($asiento_automatico->getid_empresa(),$asiento_automatico->getid_modulo(),Funciones::GetRealScapeString($asiento_automatico->getcodigo(),$connexion),Funciones::GetRealScapeString($asiento_automatico->getnombre(),$connexion),$asiento_automatico->getid_fuente(),$asiento_automatico->getid_libro_auxiliar(),$asiento_automatico->getid_centro_costo(),Funciones::GetRealScapeString($asiento_automatico->getdescripcion(),$connexion),$asiento_automatico->getactivo(),Funciones::GetRealScapeString($asiento_automatico->getasignada(),$connexion));
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($asiento_automatico->getid_empresa(),$asiento_automatico->getid_modulo(),Funciones::GetRealScapeString($asiento_automatico->getcodigo(),$connexion),Funciones::GetRealScapeString($asiento_automatico->getnombre(),$connexion),$asiento_automatico->getid_fuente(),$asiento_automatico->getid_libro_auxiliar(),$asiento_automatico->getid_centro_costo(),Funciones::GetRealScapeString($asiento_automatico->getdescripcion(),$connexion),$asiento_automatico->getactivo(),Funciones::GetRealScapeString($asiento_automatico->getasignada(),$connexion), $asiento_automatico->getId(), Funciones::GetRealScapeString($asiento_automatico->getVersionRow(),$connexion));
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
	
	public function setasiento_automatico_Original(asiento_automatico $asiento_automatico) {
		$asiento_automatico->setasiento_automatico_Original(clone $asiento_automatico);		
	}
	
	public function setasiento_automaticos_Original(array $asiento_automaticos) {
		foreach($asiento_automaticos as $asiento_automatico){
			$asiento_automatico->setasiento_automatico_Original(clone $asiento_automatico);
		}
	}
	
	public static function setasiento_automatico_OriginalStatic(asiento_automatico $asiento_automatico) {
		$asiento_automatico->setasiento_automatico_Original(clone $asiento_automatico);		
	}
	
	public static function setasiento_automaticos_OriginalStatic(array $asiento_automaticos) {		
		foreach($asiento_automaticos as $asiento_automatico){
			$asiento_automatico->setasiento_automatico_Original(clone $asiento_automatico);
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
