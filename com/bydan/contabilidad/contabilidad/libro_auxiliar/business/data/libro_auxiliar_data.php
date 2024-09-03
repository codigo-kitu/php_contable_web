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
namespace com\bydan\contabilidad\contabilidad\libro_auxiliar\business\data;

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

use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\entity\libro_auxiliar;

//FK


use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\entity\empresa;

//REL

use com\bydan\contabilidad\contabilidad\contador_auxiliar\business\data\contador_auxiliar_data;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\data\asiento_predefinido_data;
use com\bydan\contabilidad\contabilidad\asiento_automatico\business\data\asiento_automatico_data;
use com\bydan\contabilidad\contabilidad\asiento\business\data\asiento_data;


class libro_auxiliar_data extends GetEntitiesDataAccessHelper implements libro_auxiliar_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='con_';
	public static string $TABLE_NAME='con_libro_auxiliar';			
	public static string $TABLE_NAME_libro_auxiliar='libro_auxiliar';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_LIBRO_AUXILIAR_INSERT(??,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_LIBRO_AUXILIAR_UPDATE(??,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_LIBRO_AUXILIAR_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_LIBRO_AUXILIAR_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $libro_auxiliar_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'libro_auxiliar';
		
		libro_auxiliar_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('CONTABILIDAD');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->libro_auxiliar_DataAccessAdditional=new libro_auxiliarDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(id,created_at,updated_at,id_empresa,iniciales,nombre,secuencial,incremento,reinicia_secuencial_mes,generado_por) values (%d,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,\'%s\',\'%s\',%d,%d,\'%d\',%d)';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_empresa=%d,iniciales=\'%s\',nombre=\'%s\',secuencial=%d,incremento=%d,reinicia_secuencial_mes=\'%d\',generado_por=%d where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.iniciales,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.secuencial,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.incremento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.reinicia_secuencial_mes,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.generado_por from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(libro_auxiliar $libro_auxiliar,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($libro_auxiliar->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=libro_auxiliar_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($libro_auxiliar->getId(),$connexion));				
				
			} else if ($libro_auxiliar->getIsChanged()) {
				if($libro_auxiliar->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=libro_auxiliar_data::$QUERY_INSERT;
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($libro_auxiliar->getId(),$connexion),$libro_auxiliar->getid_empresa(),Funciones::GetRealScapeString($libro_auxiliar->getiniciales(),$connexion),Funciones::GetRealScapeString($libro_auxiliar->getnombre(),$connexion),$libro_auxiliar->getsecuencial(),$libro_auxiliar->getincremento(),$libro_auxiliar->getreinicia_secuencial_mes(),$libro_auxiliar->getgenerado_por() );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=libro_auxiliar_data::$QUERY_UPDATE;			
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$libro_auxiliar->getid_empresa(),Funciones::GetRealScapeString($libro_auxiliar->getiniciales(),$connexion),Funciones::GetRealScapeString($libro_auxiliar->getnombre(),$connexion),$libro_auxiliar->getsecuencial(),$libro_auxiliar->getincremento(),$libro_auxiliar->getreinicia_secuencial_mes(),$libro_auxiliar->getgenerado_por(), Funciones::GetRealScapeString($libro_auxiliar->getId(),$connexion), Funciones::GetRealScapeString($libro_auxiliar->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($libro_auxiliar, $connexion,$strQuerySaveComplete,libro_auxiliar_data::$TABLE_NAME,libro_auxiliar_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				libro_auxiliar_data::savePrepared($libro_auxiliar, $connexion,$strQuerySave,libro_auxiliar_data::$TABLE_NAME,libro_auxiliar_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			libro_auxiliar_data::setlibro_auxiliar_OriginalStatic($libro_auxiliar);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(libro_auxiliar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				libro_auxiliar_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					libro_auxiliar_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					libro_auxiliar_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(libro_auxiliar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					libro_auxiliar_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(libro_auxiliar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					libro_auxiliar_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(libro_auxiliar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					libro_auxiliar_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?libro_auxiliar {		
		$entity = new libro_auxiliar();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=libro_auxiliar_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=libro_auxiliar_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//Contabilidad.libro_auxiliar.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setlibro_auxiliar_Original(new libro_auxiliar());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,libro_auxiliar_data::$IS_WITH_SCHEMA);         	    
				/*$entity=libro_auxiliar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setlibro_auxiliar_Original(parent::getEntityPrefijoEntityResult("",$entity->getlibro_auxiliar_Original(),$resultSet,libro_auxiliar_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setlibro_auxiliar_Original(libro_auxiliar_data::getEntityBaseResult("",$entity->getlibro_auxiliar_Original(),$resultSet));
				//$entity->setlibro_auxiliar_Original($this->getEntityBaseResult("",$entity->getlibro_auxiliar_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?libro_auxiliar {
		$entity = new libro_auxiliar();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=libro_auxiliar_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=libro_auxiliar_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,libro_auxiliar_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".Contabilidad.libro_auxiliar.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setlibro_auxiliar_Original(new libro_auxiliar());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,libro_auxiliar_data::$IS_WITH_SCHEMA);         	    
				/*$entity=libro_auxiliar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setlibro_auxiliar_Original(parent::getEntityPrefijoEntityResult("",$entity->getlibro_auxiliar_Original(),$resultSet,libro_auxiliar_data::$IS_WITH_SCHEMA));         		
				////$entity->setlibro_auxiliar_Original(libro_auxiliar_data::getEntityBaseResult("",$entity->getlibro_auxiliar_Original(),$resultSet));
				//$entity->setlibro_auxiliar_Original($this->getEntityBaseResult("",$entity->getlibro_auxiliar_Original(),$resultSet));
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
		$entity = new libro_auxiliar();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=libro_auxiliar_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=libro_auxiliar_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,libro_auxiliar_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new libro_auxiliar();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,libro_auxiliar_data::$IS_WITH_SCHEMA);         		
				/*$entity=libro_auxiliar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setlibro_auxiliar_Original( new libro_auxiliar());
				
				//$entity->setlibro_auxiliar_Original(parent::getEntityPrefijoEntityResult("",$entity->getlibro_auxiliar_Original(),$resultSet,libro_auxiliar_data::$IS_WITH_SCHEMA));         		
				////$entity->setlibro_auxiliar_Original(libro_auxiliar_data::getEntityBaseResult("",$entity->getlibro_auxiliar_Original(),$resultSet));
				//$entity->setlibro_auxiliar_Original($this->getEntityBaseResult("",$entity->getlibro_auxiliar_Original(),$resultSet));
								
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
		$entity = new libro_auxiliar();		  
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
      	    	$entity = new libro_auxiliar();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,libro_auxiliar_data::$IS_WITH_SCHEMA);         		
				/*$entity=libro_auxiliar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setlibro_auxiliar_Original( new libro_auxiliar());
				
				//$entity->setlibro_auxiliar_Original(parent::getEntityPrefijoEntityResult("",$entity->getlibro_auxiliar_Original(),$resultSet,libro_auxiliar_data::$IS_WITH_SCHEMA));         		
				////$entity->setlibro_auxiliar_Original(libro_auxiliar_data::getEntityBaseResult("",$entity->getlibro_auxiliar_Original(),$resultSet));
				//$entity->setlibro_auxiliar_Original($this->getEntityBaseResult("",$entity->getlibro_auxiliar_Original(),$resultSet));
				
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
		$entity = new libro_auxiliar();		  
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
      	    	$entity = new libro_auxiliar();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,libro_auxiliar_data::$IS_WITH_SCHEMA);         		
				/*$entity=libro_auxiliar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setlibro_auxiliar_Original( new libro_auxiliar());				
				//$entity->setlibro_auxiliar_Original(parent::getEntityPrefijoEntityResult("",$entity->getlibro_auxiliar_Original(),$resultSet,libro_auxiliar_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setlibro_auxiliar_Original(libro_auxiliar_data::getEntityBaseResult("",$entity->getlibro_auxiliar_Original(),$resultSet));
				//$entity->setlibro_auxiliar_Original($this->getEntityBaseResult("",$entity->getlibro_auxiliar_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=libro_auxiliar_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,libro_auxiliar $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,libro_auxiliar_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,libro_auxiliar_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getempresa(Connexion $connexion,$rellibro_auxiliar) : ?empresa{

		$empresa= new empresa();

		try {
			$empresaDataAccess=new empresa_data();
			$empresaDataAccess->isForFKData=$this->isForFKDataRels;
			$empresa=$empresaDataAccess->getEntity($connexion,$rellibro_auxiliar->getid_empresa());

		} catch(Exception $e) {
			throw $e;
		}

		return $empresa;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	public function  getcontador_auxiliars(Connexion $connexion,libro_auxiliar $libro_auxiliar) : array {

		$contadorauxiliars=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.contador_auxiliar_data::$SCHEMA.".".contador_auxiliar_data::$TABLE_NAME.".id_libro_auxiliar=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$libro_auxiliar->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$contadorauxiliarDataAccess=new contador_auxiliar_data();

			$contadorauxiliars=$contadorauxiliarDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $contadorauxiliars;
	}


	public function  getasiento_predefinidos(Connexion $connexion,libro_auxiliar $libro_auxiliar) : array {

		$asientopredefinidos=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.asiento_predefinido_data::$SCHEMA.".".asiento_predefinido_data::$TABLE_NAME.".id_libro_auxiliar=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$libro_auxiliar->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$asientopredefinidoDataAccess=new asiento_predefinido_data();

			$asientopredefinidos=$asientopredefinidoDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $asientopredefinidos;
	}


	public function  getasiento_automaticos(Connexion $connexion,libro_auxiliar $libro_auxiliar) : array {

		$asientoautomaticos=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.asiento_automatico_data::$SCHEMA.".".asiento_automatico_data::$TABLE_NAME.".id_libro_auxiliar=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$libro_auxiliar->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$asientoautomaticoDataAccess=new asiento_automatico_data();

			$asientoautomaticos=$asientoautomaticoDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $asientoautomaticos;
	}


	public function  getasientos(Connexion $connexion,libro_auxiliar $libro_auxiliar) : array {

		$asientos=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.asiento_data::$SCHEMA.".".asiento_data::$TABLE_NAME.".id_libro_auxiliar=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$libro_auxiliar->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$asientoDataAccess=new asiento_data();

			$asientos=$asientoDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $asientos;
	}


	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,libro_auxiliar $entity,$resultSet) : libro_auxiliar {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_empresa((int)$resultSet[$strPrefijo.'id_empresa']);
				$entity->setiniciales(utf8_encode($resultSet[$strPrefijo.'iniciales']));
				$entity->setnombre(utf8_encode($resultSet[$strPrefijo.'nombre']));
				$entity->setsecuencial((int)$resultSet[$strPrefijo.'secuencial']);
				$entity->setincremento((int)$resultSet[$strPrefijo.'incremento']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setreinicia_secuencial_mes($resultSet[$strPrefijo.'reinicia_secuencial_mes']=='f'? false:true );
				} else {
					$entity->setreinicia_secuencial_mes((bool)$resultSet[$strPrefijo.'reinicia_secuencial_mes']);
				}
				$entity->setgenerado_por((int)$resultSet[$strPrefijo.'generado_por']);
			} else {
				$entity->setnombre(utf8_encode($resultSet[$strPrefijo.'nombre']));								
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,libro_auxiliar $libro_auxiliar,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $libro_auxiliar->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iissiiii', $libro_auxiliar->getId(),$libro_auxiliar->getid_empresa(),$libro_auxiliar->getiniciales(),$libro_auxiliar->getnombre(),$libro_auxiliar->getsecuencial(),$libro_auxiliar->getincremento(),$libro_auxiliar->getreinicia_secuencial_mes(),$libro_auxiliar->getgenerado_por());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'issiiiiis', $libro_auxiliar->getid_empresa(),$libro_auxiliar->getiniciales(),$libro_auxiliar->getnombre(),$libro_auxiliar->getsecuencial(),$libro_auxiliar->getincremento(),$libro_auxiliar->getreinicia_secuencial_mes(),$libro_auxiliar->getgenerado_por(), $libro_auxiliar->getId(), Funciones::GetRealScapeString($libro_auxiliar->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,libro_auxiliar $libro_auxiliar,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($libro_auxiliar->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($libro_auxiliar->getId(),$libro_auxiliar->getid_empresa(),Funciones::GetRealScapeString($libro_auxiliar->getiniciales(),$connexion),Funciones::GetRealScapeString($libro_auxiliar->getnombre(),$connexion),$libro_auxiliar->getsecuencial(),$libro_auxiliar->getincremento(),$libro_auxiliar->getreinicia_secuencial_mes(),$libro_auxiliar->getgenerado_por());
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($libro_auxiliar->getid_empresa(),Funciones::GetRealScapeString($libro_auxiliar->getiniciales(),$connexion),Funciones::GetRealScapeString($libro_auxiliar->getnombre(),$connexion),$libro_auxiliar->getsecuencial(),$libro_auxiliar->getincremento(),$libro_auxiliar->getreinicia_secuencial_mes(),$libro_auxiliar->getgenerado_por(), $libro_auxiliar->getId(), Funciones::GetRealScapeString($libro_auxiliar->getVersionRow(),$connexion));
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
	
	public function setlibro_auxiliar_Original(libro_auxiliar $libro_auxiliar) {
		$libro_auxiliar->setlibro_auxiliar_Original(clone $libro_auxiliar);		
	}
	
	public function setlibro_auxiliars_Original(array $libro_auxiliars) {
		foreach($libro_auxiliars as $libro_auxiliar){
			$libro_auxiliar->setlibro_auxiliar_Original(clone $libro_auxiliar);
		}
	}
	
	public static function setlibro_auxiliar_OriginalStatic(libro_auxiliar $libro_auxiliar) {
		$libro_auxiliar->setlibro_auxiliar_Original(clone $libro_auxiliar);		
	}
	
	public static function setlibro_auxiliars_OriginalStatic(array $libro_auxiliars) {		
		foreach($libro_auxiliars as $libro_auxiliar){
			$libro_auxiliar->setlibro_auxiliar_Original(clone $libro_auxiliar);
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
