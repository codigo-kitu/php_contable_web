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
namespace com\bydan\contabilidad\seguridad\dato_general_usuario\business\data;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\FuncionesSql;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\data\GetEntitiesDataAccessHelperSinIdGenerated;

/*use com\bydan\framework\contabilidad\business\entity\GeneralEntity;*/
use com\bydan\framework\contabilidad\business\entity\DatoGeneral;
use com\bydan\framework\contabilidad\business\entity\DatoGeneralMinimo;
use com\bydan\framework\contabilidad\business\entity\DatoGeneralMaximo;
use com\bydan\framework\contabilidad\business\logic\QueryWhereSelectParameters;
use com\bydan\framework\contabilidad\business\logic\Pagination;
use com\bydan\framework\contabilidad\business\data\DataAccessHelper;
use com\bydan\framework\contabilidad\util\Connexion;
use com\bydan\framework\contabilidad\util\ParametersType;

use com\bydan\contabilidad\seguridad\dato_general_usuario\business\entity\dato_general_usuario;

//FK


use com\bydan\contabilidad\seguridad\usuario\business\data\usuario_data;
use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;

use com\bydan\contabilidad\seguridad\pais\business\data\pais_data;
use com\bydan\contabilidad\seguridad\pais\business\entity\pais;

use com\bydan\contabilidad\seguridad\provincia\business\data\provincia_data;
use com\bydan\contabilidad\seguridad\provincia\business\entity\provincia;

use com\bydan\contabilidad\seguridad\ciudad\business\data\ciudad_data;
use com\bydan\contabilidad\seguridad\ciudad\business\entity\ciudad;

//REL



class dato_general_usuario_data extends GetEntitiesDataAccessHelperSinIdGenerated implements dato_general_usuario_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='seg_';
	public static string $TABLE_NAME='seg_dato_general_usuario';			
	public static string $TABLE_NAME_dato_general_usuario='dato_general_usuario';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_DATO_GENERAL_USUARIO_INSERT(??,?,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_DATO_GENERAL_USUARIO_UPDATE(??,?,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_DATO_GENERAL_USUARIO_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_DATO_GENERAL_USUARIO_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $dato_general_usuario_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'dato_general_usuario';
		
		dato_general_usuario_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('SEGURIDAD');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->dato_general_usuario_DataAccessAdditional=new dato_general_usuarioDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(id,created_at,updated_at,id_pais,id_provincia,id_ciudad,cedula,apellidos,nombres,telefono,telefono_movil,e_mail,url,fecha_nacimiento,direccion) values (%d,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%d,%d,\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\')';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_pais=%d,id_provincia=%d,id_ciudad=%d,cedula=\'%s\',apellidos=\'%s\',nombres=\'%s\',telefono=\'%s\',telefono_movil=\'%s\',e_mail=\'%s\',url=\'%s\',fecha_nacimiento=\'%s\',direccion=\'%s\' where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_pais,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_provincia,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_ciudad,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cedula,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.apellidos,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombres,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.telefono,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.telefono_movil,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.e_mail,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.url,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_nacimiento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.direccion from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(dato_general_usuario $dato_general_usuario,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($dato_general_usuario->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=dato_general_usuario_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($dato_general_usuario->getId(),$connexion));				
				
			} else if ($dato_general_usuario->getIsChanged()) {
				if($dato_general_usuario->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=dato_general_usuario_data::$QUERY_INSERT;
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($dato_general_usuario->getId(),$connexion),$dato_general_usuario->getid_pais(),$dato_general_usuario->getid_provincia(),$dato_general_usuario->getid_ciudad(),Funciones::GetRealScapeString($dato_general_usuario->getcedula(),$connexion),Funciones::GetRealScapeString($dato_general_usuario->getapellidos(),$connexion),Funciones::GetRealScapeString($dato_general_usuario->getnombres(),$connexion),Funciones::GetRealScapeString($dato_general_usuario->gettelefono(),$connexion),Funciones::GetRealScapeString($dato_general_usuario->gettelefono_movil(),$connexion),Funciones::GetRealScapeString($dato_general_usuario->gete_mail(),$connexion),Funciones::GetRealScapeString($dato_general_usuario->geturl(),$connexion),Funciones::GetRealScapeString($dato_general_usuario->getfecha_nacimiento(),$connexion),Funciones::GetRealScapeString($dato_general_usuario->getdireccion(),$connexion) );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=dato_general_usuario_data::$QUERY_UPDATE;			
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$dato_general_usuario->getid_pais(),$dato_general_usuario->getid_provincia(),$dato_general_usuario->getid_ciudad(),Funciones::GetRealScapeString($dato_general_usuario->getcedula(),$connexion),Funciones::GetRealScapeString($dato_general_usuario->getapellidos(),$connexion),Funciones::GetRealScapeString($dato_general_usuario->getnombres(),$connexion),Funciones::GetRealScapeString($dato_general_usuario->gettelefono(),$connexion),Funciones::GetRealScapeString($dato_general_usuario->gettelefono_movil(),$connexion),Funciones::GetRealScapeString($dato_general_usuario->gete_mail(),$connexion),Funciones::GetRealScapeString($dato_general_usuario->geturl(),$connexion),Funciones::GetRealScapeString($dato_general_usuario->getfecha_nacimiento(),$connexion),Funciones::GetRealScapeString($dato_general_usuario->getdireccion(),$connexion), Funciones::GetRealScapeString($dato_general_usuario->getId(),$connexion), Funciones::GetRealScapeString($dato_general_usuario->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($dato_general_usuario, $connexion,$strQuerySaveComplete,dato_general_usuario_data::$TABLE_NAME,dato_general_usuario_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				dato_general_usuario_data::savePrepared($dato_general_usuario, $connexion,$strQuerySave,dato_general_usuario_data::$TABLE_NAME,dato_general_usuario_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			dato_general_usuario_data::setdato_general_usuario_OriginalStatic($dato_general_usuario);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(dato_general_usuario $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				dato_general_usuario_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					dato_general_usuario_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					dato_general_usuario_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(dato_general_usuario $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					dato_general_usuario_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(dato_general_usuario $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					dato_general_usuario_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(dato_general_usuario $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					dato_general_usuario_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?dato_general_usuario {		
		$entity = new dato_general_usuario();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=dato_general_usuario_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=dato_general_usuario_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//Seguridad.dato_general_usuario.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setdato_general_usuario_Original(new dato_general_usuario());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,dato_general_usuario_data::$IS_WITH_SCHEMA);         	    
				/*$entity=dato_general_usuario_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setdato_general_usuario_Original(parent::getEntityPrefijoEntityResult("",$entity->getdato_general_usuario_Original(),$resultSet,dato_general_usuario_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setdato_general_usuario_Original(dato_general_usuario_data::getEntityBaseResult("",$entity->getdato_general_usuario_Original(),$resultSet));
				//$entity->setdato_general_usuario_Original($this->getEntityBaseResult("",$entity->getdato_general_usuario_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?dato_general_usuario {
		$entity = new dato_general_usuario();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=dato_general_usuario_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=dato_general_usuario_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,dato_general_usuario_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".Seguridad.dato_general_usuario.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setdato_general_usuario_Original(new dato_general_usuario());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,dato_general_usuario_data::$IS_WITH_SCHEMA);         	    
				/*$entity=dato_general_usuario_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setdato_general_usuario_Original(parent::getEntityPrefijoEntityResult("",$entity->getdato_general_usuario_Original(),$resultSet,dato_general_usuario_data::$IS_WITH_SCHEMA));         		
				////$entity->setdato_general_usuario_Original(dato_general_usuario_data::getEntityBaseResult("",$entity->getdato_general_usuario_Original(),$resultSet));
				//$entity->setdato_general_usuario_Original($this->getEntityBaseResult("",$entity->getdato_general_usuario_Original(),$resultSet));
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
		$entity = new dato_general_usuario();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=dato_general_usuario_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=dato_general_usuario_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,dato_general_usuario_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new dato_general_usuario();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,dato_general_usuario_data::$IS_WITH_SCHEMA);         		
				/*$entity=dato_general_usuario_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setdato_general_usuario_Original( new dato_general_usuario());
				
				//$entity->setdato_general_usuario_Original(parent::getEntityPrefijoEntityResult("",$entity->getdato_general_usuario_Original(),$resultSet,dato_general_usuario_data::$IS_WITH_SCHEMA));         		
				////$entity->setdato_general_usuario_Original(dato_general_usuario_data::getEntityBaseResult("",$entity->getdato_general_usuario_Original(),$resultSet));
				//$entity->setdato_general_usuario_Original($this->getEntityBaseResult("",$entity->getdato_general_usuario_Original(),$resultSet));
								
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
		$entity = new dato_general_usuario();		  
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
      	    	$entity = new dato_general_usuario();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,dato_general_usuario_data::$IS_WITH_SCHEMA);         		
				/*$entity=dato_general_usuario_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setdato_general_usuario_Original( new dato_general_usuario());
				
				//$entity->setdato_general_usuario_Original(parent::getEntityPrefijoEntityResult("",$entity->getdato_general_usuario_Original(),$resultSet,dato_general_usuario_data::$IS_WITH_SCHEMA));         		
				////$entity->setdato_general_usuario_Original(dato_general_usuario_data::getEntityBaseResult("",$entity->getdato_general_usuario_Original(),$resultSet));
				//$entity->setdato_general_usuario_Original($this->getEntityBaseResult("",$entity->getdato_general_usuario_Original(),$resultSet));
				
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
		$entity = new dato_general_usuario();		  
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
      	    	$entity = new dato_general_usuario();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,dato_general_usuario_data::$IS_WITH_SCHEMA);         		
				/*$entity=dato_general_usuario_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setdato_general_usuario_Original( new dato_general_usuario());				
				//$entity->setdato_general_usuario_Original(parent::getEntityPrefijoEntityResult("",$entity->getdato_general_usuario_Original(),$resultSet,dato_general_usuario_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setdato_general_usuario_Original(dato_general_usuario_data::getEntityBaseResult("",$entity->getdato_general_usuario_Original(),$resultSet));
				//$entity->setdato_general_usuario_Original($this->getEntityBaseResult("",$entity->getdato_general_usuario_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=dato_general_usuario_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,dato_general_usuario $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,dato_general_usuario_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,dato_general_usuario_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getusuario(Connexion $connexion,$reldato_general_usuario) : ?usuario{

		$usuario= new usuario();

		try {
			$usuarioDataAccess=new usuario_data();
			$usuarioDataAccess->isForFKData=$this->isForFKDataRels;
			$usuario=$usuarioDataAccess->getEntity($connexion,$reldato_general_usuario->getId());

		} catch(Exception $e) {
			throw $e;
		}

		return $usuario;
	}


	public function  getpais(Connexion $connexion,$reldato_general_usuario) : ?pais{

		$pais= new pais();

		try {
			$paisDataAccess=new pais_data();
			$paisDataAccess->isForFKData=$this->isForFKDataRels;
			$pais=$paisDataAccess->getEntity($connexion,$reldato_general_usuario->getid_pais());

		} catch(Exception $e) {
			throw $e;
		}

		return $pais;
	}


	public function  getprovincia(Connexion $connexion,$reldato_general_usuario) : ?provincia{

		$provincia= new provincia();

		try {
			$provinciaDataAccess=new provincia_data();
			$provinciaDataAccess->isForFKData=$this->isForFKDataRels;
			$provincia=$provinciaDataAccess->getEntity($connexion,$reldato_general_usuario->getid_provincia());

		} catch(Exception $e) {
			throw $e;
		}

		return $provincia;
	}


	public function  getciudad(Connexion $connexion,$reldato_general_usuario) : ?ciudad{

		$ciudad= new ciudad();

		try {
			$ciudadDataAccess=new ciudad_data();
			$ciudadDataAccess->isForFKData=$this->isForFKDataRels;
			$ciudad=$ciudadDataAccess->getEntity($connexion,$reldato_general_usuario->getid_ciudad());

		} catch(Exception $e) {
			throw $e;
		}

		return $ciudad;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,dato_general_usuario $entity,$resultSet) : dato_general_usuario {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_pais((int)$resultSet[$strPrefijo.'id_pais']);
				$entity->setid_provincia((int)$resultSet[$strPrefijo.'id_provincia']);
				$entity->setid_ciudad((int)$resultSet[$strPrefijo.'id_ciudad']);
				$entity->setcedula(utf8_encode($resultSet[$strPrefijo.'cedula']));
				$entity->setapellidos(utf8_encode($resultSet[$strPrefijo.'apellidos']));
				$entity->setnombres(utf8_encode($resultSet[$strPrefijo.'nombres']));
				$entity->settelefono(utf8_encode($resultSet[$strPrefijo.'telefono']));
				$entity->settelefono_movil(utf8_encode($resultSet[$strPrefijo.'telefono_movil']));
				$entity->sete_mail(utf8_encode($resultSet[$strPrefijo.'e_mail']));
				$entity->seturl(utf8_encode($resultSet[$strPrefijo.'url']));
				$entity->setfecha_nacimiento($resultSet[$strPrefijo.'fecha_nacimiento']);
				$entity->setdireccion(utf8_encode($resultSet[$strPrefijo.'direccion']));
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,dato_general_usuario $dato_general_usuario,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $dato_general_usuario->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiisssssssss', $dato_general_usuario->getId(),$dato_general_usuario->getid_pais(),$dato_general_usuario->getid_provincia(),$dato_general_usuario->getid_ciudad(),$dato_general_usuario->getcedula(),$dato_general_usuario->getapellidos(),$dato_general_usuario->getnombres(),$dato_general_usuario->gettelefono(),$dato_general_usuario->gettelefono_movil(),$dato_general_usuario->gete_mail(),$dato_general_usuario->geturl(),$dato_general_usuario->getfecha_nacimiento(),$dato_general_usuario->getdireccion());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iiisssssssssis', $dato_general_usuario->getid_pais(),$dato_general_usuario->getid_provincia(),$dato_general_usuario->getid_ciudad(),$dato_general_usuario->getcedula(),$dato_general_usuario->getapellidos(),$dato_general_usuario->getnombres(),$dato_general_usuario->gettelefono(),$dato_general_usuario->gettelefono_movil(),$dato_general_usuario->gete_mail(),$dato_general_usuario->geturl(),$dato_general_usuario->getfecha_nacimiento(),$dato_general_usuario->getdireccion(), $dato_general_usuario->getId(), Funciones::GetRealScapeString($dato_general_usuario->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,dato_general_usuario $dato_general_usuario,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($dato_general_usuario->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($dato_general_usuario->getId(),$dato_general_usuario->getid_pais(),$dato_general_usuario->getid_provincia(),$dato_general_usuario->getid_ciudad(),Funciones::GetRealScapeString($dato_general_usuario->getcedula(),$connexion),Funciones::GetRealScapeString($dato_general_usuario->getapellidos(),$connexion),Funciones::GetRealScapeString($dato_general_usuario->getnombres(),$connexion),Funciones::GetRealScapeString($dato_general_usuario->gettelefono(),$connexion),Funciones::GetRealScapeString($dato_general_usuario->gettelefono_movil(),$connexion),Funciones::GetRealScapeString($dato_general_usuario->gete_mail(),$connexion),Funciones::GetRealScapeString($dato_general_usuario->geturl(),$connexion),Funciones::GetRealScapeString($dato_general_usuario->getfecha_nacimiento(),$connexion),Funciones::GetRealScapeString($dato_general_usuario->getdireccion(),$connexion));
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($dato_general_usuario->getid_pais(),$dato_general_usuario->getid_provincia(),$dato_general_usuario->getid_ciudad(),Funciones::GetRealScapeString($dato_general_usuario->getcedula(),$connexion),Funciones::GetRealScapeString($dato_general_usuario->getapellidos(),$connexion),Funciones::GetRealScapeString($dato_general_usuario->getnombres(),$connexion),Funciones::GetRealScapeString($dato_general_usuario->gettelefono(),$connexion),Funciones::GetRealScapeString($dato_general_usuario->gettelefono_movil(),$connexion),Funciones::GetRealScapeString($dato_general_usuario->gete_mail(),$connexion),Funciones::GetRealScapeString($dato_general_usuario->geturl(),$connexion),Funciones::GetRealScapeString($dato_general_usuario->getfecha_nacimiento(),$connexion),Funciones::GetRealScapeString($dato_general_usuario->getdireccion(),$connexion), $dato_general_usuario->getId(), Funciones::GetRealScapeString($dato_general_usuario->getVersionRow(),$connexion));
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
	
	public function setdato_general_usuario_Original(dato_general_usuario $dato_general_usuario) {
		$dato_general_usuario->setdato_general_usuario_Original(clone $dato_general_usuario);		
	}
	
	public function setdato_general_usuarios_Original(array $dato_general_usuarios) {
		foreach($dato_general_usuarios as $dato_general_usuario){
			$dato_general_usuario->setdato_general_usuario_Original(clone $dato_general_usuario);
		}
	}
	
	public static function setdato_general_usuario_OriginalStatic(dato_general_usuario $dato_general_usuario) {
		$dato_general_usuario->setdato_general_usuario_Original(clone $dato_general_usuario);		
	}
	
	public static function setdato_general_usuarios_OriginalStatic(array $dato_general_usuarios) {		
		foreach($dato_general_usuarios as $dato_general_usuario){
			$dato_general_usuario->setdato_general_usuario_Original(clone $dato_general_usuario);
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
