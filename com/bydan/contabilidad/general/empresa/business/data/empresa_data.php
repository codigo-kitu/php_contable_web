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
namespace com\bydan\contabilidad\general\empresa\business\data;

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

use com\bydan\contabilidad\general\empresa\business\entity\empresa;

//FK


use com\bydan\contabilidad\seguridad\pais\business\data\pais_data;
use com\bydan\contabilidad\seguridad\pais\business\entity\pais;

use com\bydan\contabilidad\seguridad\ciudad\business\data\ciudad_data;
use com\bydan\contabilidad\seguridad\ciudad\business\entity\ciudad;

//REL



class empresa_data extends GetEntitiesDataAccessHelper implements empresa_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='gen_';
	public static string $TABLE_NAME='gen_empresa';			
	public static string $TABLE_NAME_empresa='empresa';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_EMPRESA_INSERT(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_EMPRESA_UPDATE(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_EMPRESA_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_EMPRESA_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $empresa_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'empresa';
		
		empresa_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('GENERAL');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->empresa_DataAccessAdditional=new empresaDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_pais,id_ciudad,ruc,nombre,nombre_comercial,sector,direccion1,direccion2,direccion3,telefono1,movil,mail,sitio_web,codigo_postal,fax,logo,icono) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%d,\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\')';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_pais=%d,id_ciudad=%d,ruc=\'%s\',nombre=\'%s\',nombre_comercial=\'%s\',sector=\'%s\',direccion1=\'%s\',direccion2=\'%s\',direccion3=\'%s\',telefono1=\'%s\',movil=\'%s\',mail=\'%s\',sitio_web=\'%s\',codigo_postal=\'%s\',fax=\'%s\',logo=\'%s\',icono=\'%s\' where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_pais,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_ciudad,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.ruc,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_comercial,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.sector,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.direccion1,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.direccion2,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.direccion3,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.telefono1,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.movil,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.mail,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.sitio_web,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo_postal,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fax,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.logo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.icono from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(empresa $empresa,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($empresa->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=empresa_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($empresa->getId(),$connexion));				
				
			} else if ($empresa->getIsChanged()) {
				if($empresa->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=empresa_data::$QUERY_INSERT;
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$empresa->getid_pais(),$empresa->getid_ciudad(),Funciones::GetRealScapeString($empresa->getruc(),$connexion),Funciones::GetRealScapeString($empresa->getnombre(),$connexion),Funciones::GetRealScapeString($empresa->getnombre_comercial(),$connexion),Funciones::GetRealScapeString($empresa->getsector(),$connexion),Funciones::GetRealScapeString($empresa->getdireccion1(),$connexion),Funciones::GetRealScapeString($empresa->getdireccion2(),$connexion),Funciones::GetRealScapeString($empresa->getdireccion3(),$connexion),Funciones::GetRealScapeString($empresa->gettelefono1(),$connexion),Funciones::GetRealScapeString($empresa->getmovil(),$connexion),Funciones::GetRealScapeString($empresa->getmail(),$connexion),Funciones::GetRealScapeString($empresa->getsitio_web(),$connexion),Funciones::GetRealScapeString($empresa->getcodigo_postal(),$connexion),Funciones::GetRealScapeString($empresa->getfax(),$connexion),Funciones::GetRealScapeString($empresa->getlogo(),$connexion),Funciones::GetRealScapeString($empresa->geticono(),$connexion) );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=empresa_data::$QUERY_UPDATE;			
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$empresa->getid_pais(),$empresa->getid_ciudad(),Funciones::GetRealScapeString($empresa->getruc(),$connexion),Funciones::GetRealScapeString($empresa->getnombre(),$connexion),Funciones::GetRealScapeString($empresa->getnombre_comercial(),$connexion),Funciones::GetRealScapeString($empresa->getsector(),$connexion),Funciones::GetRealScapeString($empresa->getdireccion1(),$connexion),Funciones::GetRealScapeString($empresa->getdireccion2(),$connexion),Funciones::GetRealScapeString($empresa->getdireccion3(),$connexion),Funciones::GetRealScapeString($empresa->gettelefono1(),$connexion),Funciones::GetRealScapeString($empresa->getmovil(),$connexion),Funciones::GetRealScapeString($empresa->getmail(),$connexion),Funciones::GetRealScapeString($empresa->getsitio_web(),$connexion),Funciones::GetRealScapeString($empresa->getcodigo_postal(),$connexion),Funciones::GetRealScapeString($empresa->getfax(),$connexion),Funciones::GetRealScapeString($empresa->getlogo(),$connexion),Funciones::GetRealScapeString($empresa->geticono(),$connexion), Funciones::GetRealScapeString($empresa->getId(),$connexion), Funciones::GetRealScapeString($empresa->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($empresa, $connexion,$strQuerySaveComplete,empresa_data::$TABLE_NAME,empresa_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				empresa_data::savePrepared($empresa, $connexion,$strQuerySave,empresa_data::$TABLE_NAME,empresa_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			empresa_data::setempresa_OriginalStatic($empresa);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(empresa $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				empresa_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					empresa_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					empresa_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(empresa $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					empresa_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(empresa $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					empresa_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(empresa $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					empresa_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?empresa {		
		$entity = new empresa();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=empresa_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=empresa_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//General.empresa.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setempresa_Original(new empresa());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,empresa_data::$IS_WITH_SCHEMA);         	    
				/*$entity=empresa_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setempresa_Original(parent::getEntityPrefijoEntityResult("",$entity->getempresa_Original(),$resultSet,empresa_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setempresa_Original(empresa_data::getEntityBaseResult("",$entity->getempresa_Original(),$resultSet));
				//$entity->setempresa_Original($this->getEntityBaseResult("",$entity->getempresa_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?empresa {
		$entity = new empresa();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=empresa_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=empresa_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,empresa_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".General.empresa.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setempresa_Original(new empresa());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,empresa_data::$IS_WITH_SCHEMA);         	    
				/*$entity=empresa_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setempresa_Original(parent::getEntityPrefijoEntityResult("",$entity->getempresa_Original(),$resultSet,empresa_data::$IS_WITH_SCHEMA));         		
				////$entity->setempresa_Original(empresa_data::getEntityBaseResult("",$entity->getempresa_Original(),$resultSet));
				//$entity->setempresa_Original($this->getEntityBaseResult("",$entity->getempresa_Original(),$resultSet));
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
		$entity = new empresa();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=empresa_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=empresa_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,empresa_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new empresa();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,empresa_data::$IS_WITH_SCHEMA);         		
				/*$entity=empresa_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setempresa_Original( new empresa());
				
				//$entity->setempresa_Original(parent::getEntityPrefijoEntityResult("",$entity->getempresa_Original(),$resultSet,empresa_data::$IS_WITH_SCHEMA));         		
				////$entity->setempresa_Original(empresa_data::getEntityBaseResult("",$entity->getempresa_Original(),$resultSet));
				//$entity->setempresa_Original($this->getEntityBaseResult("",$entity->getempresa_Original(),$resultSet));
								
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
		$entity = new empresa();		  
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
      	    	$entity = new empresa();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,empresa_data::$IS_WITH_SCHEMA);         		
				/*$entity=empresa_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setempresa_Original( new empresa());
				
				//$entity->setempresa_Original(parent::getEntityPrefijoEntityResult("",$entity->getempresa_Original(),$resultSet,empresa_data::$IS_WITH_SCHEMA));         		
				////$entity->setempresa_Original(empresa_data::getEntityBaseResult("",$entity->getempresa_Original(),$resultSet));
				//$entity->setempresa_Original($this->getEntityBaseResult("",$entity->getempresa_Original(),$resultSet));
				
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
		$entity = new empresa();		  
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
      	    	$entity = new empresa();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,empresa_data::$IS_WITH_SCHEMA);         		
				/*$entity=empresa_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setempresa_Original( new empresa());				
				//$entity->setempresa_Original(parent::getEntityPrefijoEntityResult("",$entity->getempresa_Original(),$resultSet,empresa_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setempresa_Original(empresa_data::getEntityBaseResult("",$entity->getempresa_Original(),$resultSet));
				//$entity->setempresa_Original($this->getEntityBaseResult("",$entity->getempresa_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=empresa_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,empresa $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,empresa_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,empresa_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getpais(Connexion $connexion,$relempresa) : ?pais{

		$pais= new pais();

		try {
			$paisDataAccess=new pais_data();
			$paisDataAccess->isForFKData=$this->isForFKDataRels;
			$pais=$paisDataAccess->getEntity($connexion,$relempresa->getid_pais());

		} catch(Exception $e) {
			throw $e;
		}

		return $pais;
	}


	public function  getciudad(Connexion $connexion,$relempresa) : ?ciudad{

		$ciudad= new ciudad();

		try {
			$ciudadDataAccess=new ciudad_data();
			$ciudadDataAccess->isForFKData=$this->isForFKDataRels;
			$ciudad=$ciudadDataAccess->getEntity($connexion,$relempresa->getid_ciudad());

		} catch(Exception $e) {
			throw $e;
		}

		return $ciudad;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,empresa $entity,$resultSet) : empresa {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_pais((int)$resultSet[$strPrefijo.'id_pais']);
				$entity->setid_ciudad((int)$resultSet[$strPrefijo.'id_ciudad']);
				$entity->setruc(utf8_encode($resultSet[$strPrefijo.'ruc']));
				$entity->setnombre(utf8_encode($resultSet[$strPrefijo.'nombre']));
				$entity->setnombre_comercial(utf8_encode($resultSet[$strPrefijo.'nombre_comercial']));
				$entity->setsector(utf8_encode($resultSet[$strPrefijo.'sector']));
				$entity->setdireccion1(utf8_encode($resultSet[$strPrefijo.'direccion1']));
				$entity->setdireccion2(utf8_encode($resultSet[$strPrefijo.'direccion2']));
				$entity->setdireccion3(utf8_encode($resultSet[$strPrefijo.'direccion3']));
				$entity->settelefono1(utf8_encode($resultSet[$strPrefijo.'telefono1']));
				$entity->setmovil(utf8_encode($resultSet[$strPrefijo.'movil']));
				$entity->setmail(utf8_encode($resultSet[$strPrefijo.'mail']));
				$entity->setsitio_web(utf8_encode($resultSet[$strPrefijo.'sitio_web']));
				$entity->setcodigo_postal(utf8_encode($resultSet[$strPrefijo.'codigo_postal']));
				$entity->setfax(utf8_encode($resultSet[$strPrefijo.'fax']));
				$entity->setlogo(utf8_encode($resultSet[$strPrefijo.'logo']));
				$entity->seticono(utf8_encode($resultSet[$strPrefijo.'icono']));
			} else {
				$entity->setnombre(utf8_encode($resultSet[$strPrefijo.'nombre']));								
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,empresa $empresa,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $empresa->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iisssssssssssssss', $empresa->getid_pais(),$empresa->getid_ciudad(),$empresa->getruc(),$empresa->getnombre(),$empresa->getnombre_comercial(),$empresa->getsector(),$empresa->getdireccion1(),$empresa->getdireccion2(),$empresa->getdireccion3(),$empresa->gettelefono1(),$empresa->getmovil(),$empresa->getmail(),$empresa->getsitio_web(),$empresa->getcodigo_postal(),$empresa->getfax(),$empresa->getlogo(),$empresa->geticono());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iisssssssssssssssis', $empresa->getid_pais(),$empresa->getid_ciudad(),$empresa->getruc(),$empresa->getnombre(),$empresa->getnombre_comercial(),$empresa->getsector(),$empresa->getdireccion1(),$empresa->getdireccion2(),$empresa->getdireccion3(),$empresa->gettelefono1(),$empresa->getmovil(),$empresa->getmail(),$empresa->getsitio_web(),$empresa->getcodigo_postal(),$empresa->getfax(),$empresa->getlogo(),$empresa->geticono(), $empresa->getId(), Funciones::GetRealScapeString($empresa->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,empresa $empresa,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($empresa->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($empresa->getid_pais(),$empresa->getid_ciudad(),Funciones::GetRealScapeString($empresa->getruc(),$connexion),Funciones::GetRealScapeString($empresa->getnombre(),$connexion),Funciones::GetRealScapeString($empresa->getnombre_comercial(),$connexion),Funciones::GetRealScapeString($empresa->getsector(),$connexion),Funciones::GetRealScapeString($empresa->getdireccion1(),$connexion),Funciones::GetRealScapeString($empresa->getdireccion2(),$connexion),Funciones::GetRealScapeString($empresa->getdireccion3(),$connexion),Funciones::GetRealScapeString($empresa->gettelefono1(),$connexion),Funciones::GetRealScapeString($empresa->getmovil(),$connexion),Funciones::GetRealScapeString($empresa->getmail(),$connexion),Funciones::GetRealScapeString($empresa->getsitio_web(),$connexion),Funciones::GetRealScapeString($empresa->getcodigo_postal(),$connexion),Funciones::GetRealScapeString($empresa->getfax(),$connexion),Funciones::GetRealScapeString($empresa->getlogo(),$connexion),Funciones::GetRealScapeString($empresa->geticono(),$connexion));
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($empresa->getid_pais(),$empresa->getid_ciudad(),Funciones::GetRealScapeString($empresa->getruc(),$connexion),Funciones::GetRealScapeString($empresa->getnombre(),$connexion),Funciones::GetRealScapeString($empresa->getnombre_comercial(),$connexion),Funciones::GetRealScapeString($empresa->getsector(),$connexion),Funciones::GetRealScapeString($empresa->getdireccion1(),$connexion),Funciones::GetRealScapeString($empresa->getdireccion2(),$connexion),Funciones::GetRealScapeString($empresa->getdireccion3(),$connexion),Funciones::GetRealScapeString($empresa->gettelefono1(),$connexion),Funciones::GetRealScapeString($empresa->getmovil(),$connexion),Funciones::GetRealScapeString($empresa->getmail(),$connexion),Funciones::GetRealScapeString($empresa->getsitio_web(),$connexion),Funciones::GetRealScapeString($empresa->getcodigo_postal(),$connexion),Funciones::GetRealScapeString($empresa->getfax(),$connexion),Funciones::GetRealScapeString($empresa->getlogo(),$connexion),Funciones::GetRealScapeString($empresa->geticono(),$connexion), $empresa->getId(), Funciones::GetRealScapeString($empresa->getVersionRow(),$connexion));
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
	
	public function setempresa_Original(empresa $empresa) {
		$empresa->setempresa_Original(clone $empresa);		
	}
	
	public function setempresas_Original(array $empresas) {
		foreach($empresas as $empresa){
			$empresa->setempresa_Original(clone $empresa);
		}
	}
	
	public static function setempresa_OriginalStatic(empresa $empresa) {
		$empresa->setempresa_Original(clone $empresa);		
	}
	
	public static function setempresas_OriginalStatic(array $empresas) {		
		foreach($empresas as $empresa){
			$empresa->setempresa_Original(clone $empresa);
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
