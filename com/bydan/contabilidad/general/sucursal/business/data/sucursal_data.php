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
namespace com\bydan\contabilidad\general\sucursal\business\data;

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

use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;

//FK


use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\entity\empresa;

use com\bydan\contabilidad\seguridad\pais\business\data\pais_data;
use com\bydan\contabilidad\seguridad\pais\business\entity\pais;

use com\bydan\contabilidad\seguridad\ciudad\business\data\ciudad_data;
use com\bydan\contabilidad\seguridad\ciudad\business\entity\ciudad;

//REL



class sucursal_data extends GetEntitiesDataAccessHelper implements sucursal_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='gen_';
	public static string $TABLE_NAME='gen_sucursal';			
	public static string $TABLE_NAME_sucursal='sucursal';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_SUCURSAL_INSERT(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_SUCURSAL_UPDATE(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_SUCURSAL_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_SUCURSAL_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $sucursal_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'sucursal';
		
		sucursal_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('GENERAL');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->sucursal_DataAccessAdditional=new sucursalDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_empresa,id_pais,id_ciudad,nombre,registro_tributario,registro_sucursalrial,direccion1,direccion2,direccion3,telefono1,celular,correo_electronico,sitio_web,codigo_postal,fax,barrio_distrito,logo,base_de_datos,condicion,icono_asociado,folder_sucursal) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%d,%d,\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',%d,\'%s\',\'%s\')';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_empresa=%d,id_pais=%d,id_ciudad=%d,nombre=\'%s\',registro_tributario=\'%s\',registro_sucursalrial=\'%s\',direccion1=\'%s\',direccion2=\'%s\',direccion3=\'%s\',telefono1=\'%s\',celular=\'%s\',correo_electronico=\'%s\',sitio_web=\'%s\',codigo_postal=\'%s\',fax=\'%s\',barrio_distrito=\'%s\',logo=\'%s\',base_de_datos=\'%s\',condicion=%d,icono_asociado=\'%s\',folder_sucursal=\'%s\' where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_pais,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_ciudad,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.registro_tributario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.registro_sucursalrial,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.direccion1,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.direccion2,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.direccion3,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.telefono1,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.celular,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.correo_electronico,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.sitio_web,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo_postal,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fax,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.barrio_distrito,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.logo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.base_de_datos,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.condicion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.icono_asociado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.folder_sucursal from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(sucursal $sucursal,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($sucursal->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=sucursal_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($sucursal->getId(),$connexion));				
				
			} else if ($sucursal->getIsChanged()) {
				if($sucursal->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=sucursal_data::$QUERY_INSERT;
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$sucursal->getid_empresa(),$sucursal->getid_pais(),$sucursal->getid_ciudad(),Funciones::GetRealScapeString($sucursal->getnombre(),$connexion),Funciones::GetRealScapeString($sucursal->getregistro_tributario(),$connexion),Funciones::GetRealScapeString($sucursal->getregistro_sucursalrial(),$connexion),Funciones::GetRealScapeString($sucursal->getdireccion1(),$connexion),Funciones::GetRealScapeString($sucursal->getdireccion2(),$connexion),Funciones::GetRealScapeString($sucursal->getdireccion3(),$connexion),Funciones::GetRealScapeString($sucursal->gettelefono1(),$connexion),Funciones::GetRealScapeString($sucursal->getcelular(),$connexion),Funciones::GetRealScapeString($sucursal->getcorreo_electronico(),$connexion),Funciones::GetRealScapeString($sucursal->getsitio_web(),$connexion),Funciones::GetRealScapeString($sucursal->getcodigo_postal(),$connexion),Funciones::GetRealScapeString($sucursal->getfax(),$connexion),Funciones::GetRealScapeString($sucursal->getbarrio_distrito(),$connexion),Funciones::GetRealScapeString($sucursal->getlogo(),$connexion),Funciones::GetRealScapeString($sucursal->getbase_de_datos(),$connexion),$sucursal->getcondicion(),Funciones::GetRealScapeString($sucursal->geticono_asociado(),$connexion),Funciones::GetRealScapeString($sucursal->getfolder_sucursal(),$connexion) );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=sucursal_data::$QUERY_UPDATE;			
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$sucursal->getid_empresa(),$sucursal->getid_pais(),$sucursal->getid_ciudad(),Funciones::GetRealScapeString($sucursal->getnombre(),$connexion),Funciones::GetRealScapeString($sucursal->getregistro_tributario(),$connexion),Funciones::GetRealScapeString($sucursal->getregistro_sucursalrial(),$connexion),Funciones::GetRealScapeString($sucursal->getdireccion1(),$connexion),Funciones::GetRealScapeString($sucursal->getdireccion2(),$connexion),Funciones::GetRealScapeString($sucursal->getdireccion3(),$connexion),Funciones::GetRealScapeString($sucursal->gettelefono1(),$connexion),Funciones::GetRealScapeString($sucursal->getcelular(),$connexion),Funciones::GetRealScapeString($sucursal->getcorreo_electronico(),$connexion),Funciones::GetRealScapeString($sucursal->getsitio_web(),$connexion),Funciones::GetRealScapeString($sucursal->getcodigo_postal(),$connexion),Funciones::GetRealScapeString($sucursal->getfax(),$connexion),Funciones::GetRealScapeString($sucursal->getbarrio_distrito(),$connexion),Funciones::GetRealScapeString($sucursal->getlogo(),$connexion),Funciones::GetRealScapeString($sucursal->getbase_de_datos(),$connexion),$sucursal->getcondicion(),Funciones::GetRealScapeString($sucursal->geticono_asociado(),$connexion),Funciones::GetRealScapeString($sucursal->getfolder_sucursal(),$connexion), Funciones::GetRealScapeString($sucursal->getId(),$connexion), Funciones::GetRealScapeString($sucursal->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($sucursal, $connexion,$strQuerySaveComplete,sucursal_data::$TABLE_NAME,sucursal_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				sucursal_data::savePrepared($sucursal, $connexion,$strQuerySave,sucursal_data::$TABLE_NAME,sucursal_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			sucursal_data::setsucursal_OriginalStatic($sucursal);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(sucursal $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				sucursal_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					sucursal_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					sucursal_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(sucursal $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					sucursal_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(sucursal $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					sucursal_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(sucursal $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					sucursal_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?sucursal {		
		$entity = new sucursal();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=sucursal_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=sucursal_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//General.sucursal.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setsucursal_Original(new sucursal());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,sucursal_data::$IS_WITH_SCHEMA);         	    
				/*$entity=sucursal_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setsucursal_Original(parent::getEntityPrefijoEntityResult("",$entity->getsucursal_Original(),$resultSet,sucursal_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setsucursal_Original(sucursal_data::getEntityBaseResult("",$entity->getsucursal_Original(),$resultSet));
				//$entity->setsucursal_Original($this->getEntityBaseResult("",$entity->getsucursal_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?sucursal {
		$entity = new sucursal();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=sucursal_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=sucursal_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,sucursal_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".General.sucursal.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setsucursal_Original(new sucursal());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,sucursal_data::$IS_WITH_SCHEMA);         	    
				/*$entity=sucursal_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setsucursal_Original(parent::getEntityPrefijoEntityResult("",$entity->getsucursal_Original(),$resultSet,sucursal_data::$IS_WITH_SCHEMA));         		
				////$entity->setsucursal_Original(sucursal_data::getEntityBaseResult("",$entity->getsucursal_Original(),$resultSet));
				//$entity->setsucursal_Original($this->getEntityBaseResult("",$entity->getsucursal_Original(),$resultSet));
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
		$entity = new sucursal();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=sucursal_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=sucursal_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,sucursal_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new sucursal();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,sucursal_data::$IS_WITH_SCHEMA);         		
				/*$entity=sucursal_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setsucursal_Original( new sucursal());
				
				//$entity->setsucursal_Original(parent::getEntityPrefijoEntityResult("",$entity->getsucursal_Original(),$resultSet,sucursal_data::$IS_WITH_SCHEMA));         		
				////$entity->setsucursal_Original(sucursal_data::getEntityBaseResult("",$entity->getsucursal_Original(),$resultSet));
				//$entity->setsucursal_Original($this->getEntityBaseResult("",$entity->getsucursal_Original(),$resultSet));
								
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
		$entity = new sucursal();		  
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
      	    	$entity = new sucursal();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,sucursal_data::$IS_WITH_SCHEMA);         		
				/*$entity=sucursal_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setsucursal_Original( new sucursal());
				
				//$entity->setsucursal_Original(parent::getEntityPrefijoEntityResult("",$entity->getsucursal_Original(),$resultSet,sucursal_data::$IS_WITH_SCHEMA));         		
				////$entity->setsucursal_Original(sucursal_data::getEntityBaseResult("",$entity->getsucursal_Original(),$resultSet));
				//$entity->setsucursal_Original($this->getEntityBaseResult("",$entity->getsucursal_Original(),$resultSet));
				
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
		$entity = new sucursal();		  
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
      	    	$entity = new sucursal();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,sucursal_data::$IS_WITH_SCHEMA);         		
				/*$entity=sucursal_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setsucursal_Original( new sucursal());				
				//$entity->setsucursal_Original(parent::getEntityPrefijoEntityResult("",$entity->getsucursal_Original(),$resultSet,sucursal_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setsucursal_Original(sucursal_data::getEntityBaseResult("",$entity->getsucursal_Original(),$resultSet));
				//$entity->setsucursal_Original($this->getEntityBaseResult("",$entity->getsucursal_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=sucursal_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,sucursal $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,sucursal_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,sucursal_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getempresa(Connexion $connexion,$relsucursal) : ?empresa{

		$empresa= new empresa();

		try {
			$empresaDataAccess=new empresa_data();
			$empresaDataAccess->isForFKData=$this->isForFKDataRels;
			$empresa=$empresaDataAccess->getEntity($connexion,$relsucursal->getid_empresa());

		} catch(Exception $e) {
			throw $e;
		}

		return $empresa;
	}


	public function  getpais(Connexion $connexion,$relsucursal) : ?pais{

		$pais= new pais();

		try {
			$paisDataAccess=new pais_data();
			$paisDataAccess->isForFKData=$this->isForFKDataRels;
			$pais=$paisDataAccess->getEntity($connexion,$relsucursal->getid_pais());

		} catch(Exception $e) {
			throw $e;
		}

		return $pais;
	}


	public function  getciudad(Connexion $connexion,$relsucursal) : ?ciudad{

		$ciudad= new ciudad();

		try {
			$ciudadDataAccess=new ciudad_data();
			$ciudadDataAccess->isForFKData=$this->isForFKDataRels;
			$ciudad=$ciudadDataAccess->getEntity($connexion,$relsucursal->getid_ciudad());

		} catch(Exception $e) {
			throw $e;
		}

		return $ciudad;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,sucursal $entity,$resultSet) : sucursal {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_empresa((int)$resultSet[$strPrefijo.'id_empresa']);
				$entity->setid_pais((int)$resultSet[$strPrefijo.'id_pais']);
				$entity->setid_ciudad((int)$resultSet[$strPrefijo.'id_ciudad']);
				$entity->setnombre(utf8_encode($resultSet[$strPrefijo.'nombre']));
				$entity->setregistro_tributario(utf8_encode($resultSet[$strPrefijo.'registro_tributario']));
				$entity->setregistro_sucursalrial(utf8_encode($resultSet[$strPrefijo.'registro_sucursalrial']));
				$entity->setdireccion1(utf8_encode($resultSet[$strPrefijo.'direccion1']));
				$entity->setdireccion2(utf8_encode($resultSet[$strPrefijo.'direccion2']));
				$entity->setdireccion3(utf8_encode($resultSet[$strPrefijo.'direccion3']));
				$entity->settelefono1(utf8_encode($resultSet[$strPrefijo.'telefono1']));
				$entity->setcelular(utf8_encode($resultSet[$strPrefijo.'celular']));
				$entity->setcorreo_electronico(utf8_encode($resultSet[$strPrefijo.'correo_electronico']));
				$entity->setsitio_web(utf8_encode($resultSet[$strPrefijo.'sitio_web']));
				$entity->setcodigo_postal(utf8_encode($resultSet[$strPrefijo.'codigo_postal']));
				$entity->setfax(utf8_encode($resultSet[$strPrefijo.'fax']));
				$entity->setbarrio_distrito(utf8_encode($resultSet[$strPrefijo.'barrio_distrito']));
				$entity->setlogo(utf8_encode($resultSet[$strPrefijo.'logo']));
				$entity->setbase_de_datos(utf8_encode($resultSet[$strPrefijo.'base_de_datos']));
				$entity->setcondicion((int)$resultSet[$strPrefijo.'condicion']);
				$entity->seticono_asociado(utf8_encode($resultSet[$strPrefijo.'icono_asociado']));
				$entity->setfolder_sucursal(utf8_encode($resultSet[$strPrefijo.'folder_sucursal']));
			} else {
				$entity->setnombre(utf8_encode($resultSet[$strPrefijo.'nombre']));								
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,sucursal $sucursal,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $sucursal->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iiisssssssssssssssiss', $sucursal->getid_empresa(),$sucursal->getid_pais(),$sucursal->getid_ciudad(),$sucursal->getnombre(),$sucursal->getregistro_tributario(),$sucursal->getregistro_sucursalrial(),$sucursal->getdireccion1(),$sucursal->getdireccion2(),$sucursal->getdireccion3(),$sucursal->gettelefono1(),$sucursal->getcelular(),$sucursal->getcorreo_electronico(),$sucursal->getsitio_web(),$sucursal->getcodigo_postal(),$sucursal->getfax(),$sucursal->getbarrio_distrito(),$sucursal->getlogo(),$sucursal->getbase_de_datos(),$sucursal->getcondicion(),$sucursal->geticono_asociado(),$sucursal->getfolder_sucursal());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iiisssssssssssssssissis', $sucursal->getid_empresa(),$sucursal->getid_pais(),$sucursal->getid_ciudad(),$sucursal->getnombre(),$sucursal->getregistro_tributario(),$sucursal->getregistro_sucursalrial(),$sucursal->getdireccion1(),$sucursal->getdireccion2(),$sucursal->getdireccion3(),$sucursal->gettelefono1(),$sucursal->getcelular(),$sucursal->getcorreo_electronico(),$sucursal->getsitio_web(),$sucursal->getcodigo_postal(),$sucursal->getfax(),$sucursal->getbarrio_distrito(),$sucursal->getlogo(),$sucursal->getbase_de_datos(),$sucursal->getcondicion(),$sucursal->geticono_asociado(),$sucursal->getfolder_sucursal(), $sucursal->getId(), Funciones::GetRealScapeString($sucursal->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,sucursal $sucursal,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($sucursal->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($sucursal->getid_empresa(),$sucursal->getid_pais(),$sucursal->getid_ciudad(),Funciones::GetRealScapeString($sucursal->getnombre(),$connexion),Funciones::GetRealScapeString($sucursal->getregistro_tributario(),$connexion),Funciones::GetRealScapeString($sucursal->getregistro_sucursalrial(),$connexion),Funciones::GetRealScapeString($sucursal->getdireccion1(),$connexion),Funciones::GetRealScapeString($sucursal->getdireccion2(),$connexion),Funciones::GetRealScapeString($sucursal->getdireccion3(),$connexion),Funciones::GetRealScapeString($sucursal->gettelefono1(),$connexion),Funciones::GetRealScapeString($sucursal->getcelular(),$connexion),Funciones::GetRealScapeString($sucursal->getcorreo_electronico(),$connexion),Funciones::GetRealScapeString($sucursal->getsitio_web(),$connexion),Funciones::GetRealScapeString($sucursal->getcodigo_postal(),$connexion),Funciones::GetRealScapeString($sucursal->getfax(),$connexion),Funciones::GetRealScapeString($sucursal->getbarrio_distrito(),$connexion),Funciones::GetRealScapeString($sucursal->getlogo(),$connexion),Funciones::GetRealScapeString($sucursal->getbase_de_datos(),$connexion),$sucursal->getcondicion(),Funciones::GetRealScapeString($sucursal->geticono_asociado(),$connexion),Funciones::GetRealScapeString($sucursal->getfolder_sucursal(),$connexion));
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($sucursal->getid_empresa(),$sucursal->getid_pais(),$sucursal->getid_ciudad(),Funciones::GetRealScapeString($sucursal->getnombre(),$connexion),Funciones::GetRealScapeString($sucursal->getregistro_tributario(),$connexion),Funciones::GetRealScapeString($sucursal->getregistro_sucursalrial(),$connexion),Funciones::GetRealScapeString($sucursal->getdireccion1(),$connexion),Funciones::GetRealScapeString($sucursal->getdireccion2(),$connexion),Funciones::GetRealScapeString($sucursal->getdireccion3(),$connexion),Funciones::GetRealScapeString($sucursal->gettelefono1(),$connexion),Funciones::GetRealScapeString($sucursal->getcelular(),$connexion),Funciones::GetRealScapeString($sucursal->getcorreo_electronico(),$connexion),Funciones::GetRealScapeString($sucursal->getsitio_web(),$connexion),Funciones::GetRealScapeString($sucursal->getcodigo_postal(),$connexion),Funciones::GetRealScapeString($sucursal->getfax(),$connexion),Funciones::GetRealScapeString($sucursal->getbarrio_distrito(),$connexion),Funciones::GetRealScapeString($sucursal->getlogo(),$connexion),Funciones::GetRealScapeString($sucursal->getbase_de_datos(),$connexion),$sucursal->getcondicion(),Funciones::GetRealScapeString($sucursal->geticono_asociado(),$connexion),Funciones::GetRealScapeString($sucursal->getfolder_sucursal(),$connexion), $sucursal->getId(), Funciones::GetRealScapeString($sucursal->getVersionRow(),$connexion));
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
	
	public function setsucursal_Original(sucursal $sucursal) {
		$sucursal->setsucursal_Original(clone $sucursal);		
	}
	
	public function setsucursals_Original(array $sucursals) {
		foreach($sucursals as $sucursal){
			$sucursal->setsucursal_Original(clone $sucursal);
		}
	}
	
	public static function setsucursal_OriginalStatic(sucursal $sucursal) {
		$sucursal->setsucursal_Original(clone $sucursal);		
	}
	
	public static function setsucursals_OriginalStatic(array $sucursals) {		
		foreach($sucursals as $sucursal){
			$sucursal->setsucursal_Original(clone $sucursal);
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
