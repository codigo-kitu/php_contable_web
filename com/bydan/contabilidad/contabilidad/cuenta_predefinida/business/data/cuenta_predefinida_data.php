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
namespace com\bydan\contabilidad\contabilidad\cuenta_predefinida\business\data;

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

use com\bydan\contabilidad\contabilidad\cuenta_predefinida\business\entity\cuenta_predefinida;

//FK


use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\entity\empresa;

use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\business\data\tipo_cuenta_predefinida_data;
use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\business\entity\tipo_cuenta_predefinida;

use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\data\tipo_cuenta_data;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\entity\tipo_cuenta;

use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\business\data\tipo_nivel_cuenta_data;
use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\business\entity\tipo_nivel_cuenta;

//REL



class cuenta_predefinida_data extends GetEntitiesDataAccessHelper implements cuenta_predefinida_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='con_';
	public static string $TABLE_NAME='con_cuenta_predefinida';			
	public static string $TABLE_NAME_cuenta_predefinida='cuenta_predefinida';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_CUENTA_PREDEFINIDA_INSERT(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_CUENTA_PREDEFINIDA_UPDATE(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_CUENTA_PREDEFINIDA_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_CUENTA_PREDEFINIDA_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $cuenta_predefinida_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'cuenta_predefinida';
		
		cuenta_predefinida_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('CONTABILIDAD');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cuenta_predefinida_DataAccessAdditional=new cuenta_predefinidaDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_empresa,id_tipo_cuenta_predefinida,id_tipo_cuenta,id_tipo_nivel_cuenta,codigo_tabla,codigo_cuenta,nombre_cuenta,monto_minimo,valor_retencion,balance,porcentaje_base,seleccionar,centro_costos,retencion,usa_base,nit,modifica,ultima_transaccion,comenta1,comenta2) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%d,%d,%d,\'%s\',\'%s\',\'%s\',%f,%f,%f,%f,%d,\'%d\',\'%d\',\'%d\',\'%d\',\'%d\',\'%s\',\'%s\',\'%s\')';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_empresa=%d,id_tipo_cuenta_predefinida=%d,id_tipo_cuenta=%d,id_tipo_nivel_cuenta=%d,codigo_tabla=\'%s\',codigo_cuenta=\'%s\',nombre_cuenta=\'%s\',monto_minimo=%f,valor_retencion=%f,balance=%f,porcentaje_base=%f,seleccionar=%d,centro_costos=\'%d\',retencion=\'%d\',usa_base=\'%d\',nit=\'%d\',modifica=\'%d\',ultima_transaccion=\'%s\',comenta1=\'%s\',comenta2=\'%s\' where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_tipo_cuenta_predefinida,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_tipo_cuenta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_tipo_nivel_cuenta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo_tabla,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo_cuenta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_cuenta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.monto_minimo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.valor_retencion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.balance,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.porcentaje_base,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.seleccionar,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.centro_costos,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.retencion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.usa_base,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nit,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.modifica,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.ultima_transaccion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.comenta1,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.comenta2 from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(cuenta_predefinida $cuenta_predefinida,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($cuenta_predefinida->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=cuenta_predefinida_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($cuenta_predefinida->getId(),$connexion));				
				
			} else if ($cuenta_predefinida->getIsChanged()) {
				if($cuenta_predefinida->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=cuenta_predefinida_data::$QUERY_INSERT;
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$cuenta_predefinida->getid_empresa(),$cuenta_predefinida->getid_tipo_cuenta_predefinida(),$cuenta_predefinida->getid_tipo_cuenta(),$cuenta_predefinida->getid_tipo_nivel_cuenta(),Funciones::GetRealScapeString($cuenta_predefinida->getcodigo_tabla(),$connexion),Funciones::GetRealScapeString($cuenta_predefinida->getcodigo_cuenta(),$connexion),Funciones::GetRealScapeString($cuenta_predefinida->getnombre_cuenta(),$connexion),$cuenta_predefinida->getmonto_minimo(),$cuenta_predefinida->getvalor_retencion(),$cuenta_predefinida->getbalance(),$cuenta_predefinida->getporcentaje_base(),$cuenta_predefinida->getseleccionar(),$cuenta_predefinida->getcentro_costos(),$cuenta_predefinida->getretencion(),$cuenta_predefinida->getusa_base(),$cuenta_predefinida->getnit(),$cuenta_predefinida->getmodifica(),Funciones::GetRealScapeString($cuenta_predefinida->getultima_transaccion(),$connexion),Funciones::GetRealScapeString($cuenta_predefinida->getcomenta1(),$connexion),Funciones::GetRealScapeString($cuenta_predefinida->getcomenta2(),$connexion) );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=cuenta_predefinida_data::$QUERY_UPDATE;			
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$cuenta_predefinida->getid_empresa(),$cuenta_predefinida->getid_tipo_cuenta_predefinida(),$cuenta_predefinida->getid_tipo_cuenta(),$cuenta_predefinida->getid_tipo_nivel_cuenta(),Funciones::GetRealScapeString($cuenta_predefinida->getcodigo_tabla(),$connexion),Funciones::GetRealScapeString($cuenta_predefinida->getcodigo_cuenta(),$connexion),Funciones::GetRealScapeString($cuenta_predefinida->getnombre_cuenta(),$connexion),$cuenta_predefinida->getmonto_minimo(),$cuenta_predefinida->getvalor_retencion(),$cuenta_predefinida->getbalance(),$cuenta_predefinida->getporcentaje_base(),$cuenta_predefinida->getseleccionar(),$cuenta_predefinida->getcentro_costos(),$cuenta_predefinida->getretencion(),$cuenta_predefinida->getusa_base(),$cuenta_predefinida->getnit(),$cuenta_predefinida->getmodifica(),Funciones::GetRealScapeString($cuenta_predefinida->getultima_transaccion(),$connexion),Funciones::GetRealScapeString($cuenta_predefinida->getcomenta1(),$connexion),Funciones::GetRealScapeString($cuenta_predefinida->getcomenta2(),$connexion), Funciones::GetRealScapeString($cuenta_predefinida->getId(),$connexion), Funciones::GetRealScapeString($cuenta_predefinida->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($cuenta_predefinida, $connexion,$strQuerySaveComplete,cuenta_predefinida_data::$TABLE_NAME,cuenta_predefinida_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				cuenta_predefinida_data::savePrepared($cuenta_predefinida, $connexion,$strQuerySave,cuenta_predefinida_data::$TABLE_NAME,cuenta_predefinida_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			cuenta_predefinida_data::setcuenta_predefinida_OriginalStatic($cuenta_predefinida);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(cuenta_predefinida $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				cuenta_predefinida_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					cuenta_predefinida_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					cuenta_predefinida_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(cuenta_predefinida $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					cuenta_predefinida_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(cuenta_predefinida $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					cuenta_predefinida_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(cuenta_predefinida $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					cuenta_predefinida_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?cuenta_predefinida {		
		$entity = new cuenta_predefinida();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=cuenta_predefinida_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=cuenta_predefinida_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//Contabilidad.cuenta_predefinida.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setcuenta_predefinida_Original(new cuenta_predefinida());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cuenta_predefinida_data::$IS_WITH_SCHEMA);         	    
				/*$entity=cuenta_predefinida_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setcuenta_predefinida_Original(parent::getEntityPrefijoEntityResult("",$entity->getcuenta_predefinida_Original(),$resultSet,cuenta_predefinida_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setcuenta_predefinida_Original(cuenta_predefinida_data::getEntityBaseResult("",$entity->getcuenta_predefinida_Original(),$resultSet));
				//$entity->setcuenta_predefinida_Original($this->getEntityBaseResult("",$entity->getcuenta_predefinida_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?cuenta_predefinida {
		$entity = new cuenta_predefinida();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=cuenta_predefinida_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=cuenta_predefinida_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,cuenta_predefinida_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".Contabilidad.cuenta_predefinida.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setcuenta_predefinida_Original(new cuenta_predefinida());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cuenta_predefinida_data::$IS_WITH_SCHEMA);         	    
				/*$entity=cuenta_predefinida_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setcuenta_predefinida_Original(parent::getEntityPrefijoEntityResult("",$entity->getcuenta_predefinida_Original(),$resultSet,cuenta_predefinida_data::$IS_WITH_SCHEMA));         		
				////$entity->setcuenta_predefinida_Original(cuenta_predefinida_data::getEntityBaseResult("",$entity->getcuenta_predefinida_Original(),$resultSet));
				//$entity->setcuenta_predefinida_Original($this->getEntityBaseResult("",$entity->getcuenta_predefinida_Original(),$resultSet));
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
		$entity = new cuenta_predefinida();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=cuenta_predefinida_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=cuenta_predefinida_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,cuenta_predefinida_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new cuenta_predefinida();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cuenta_predefinida_data::$IS_WITH_SCHEMA);         		
				/*$entity=cuenta_predefinida_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setcuenta_predefinida_Original( new cuenta_predefinida());
				
				//$entity->setcuenta_predefinida_Original(parent::getEntityPrefijoEntityResult("",$entity->getcuenta_predefinida_Original(),$resultSet,cuenta_predefinida_data::$IS_WITH_SCHEMA));         		
				////$entity->setcuenta_predefinida_Original(cuenta_predefinida_data::getEntityBaseResult("",$entity->getcuenta_predefinida_Original(),$resultSet));
				//$entity->setcuenta_predefinida_Original($this->getEntityBaseResult("",$entity->getcuenta_predefinida_Original(),$resultSet));
								
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
		$entity = new cuenta_predefinida();		  
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
      	    	$entity = new cuenta_predefinida();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cuenta_predefinida_data::$IS_WITH_SCHEMA);         		
				/*$entity=cuenta_predefinida_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setcuenta_predefinida_Original( new cuenta_predefinida());
				
				//$entity->setcuenta_predefinida_Original(parent::getEntityPrefijoEntityResult("",$entity->getcuenta_predefinida_Original(),$resultSet,cuenta_predefinida_data::$IS_WITH_SCHEMA));         		
				////$entity->setcuenta_predefinida_Original(cuenta_predefinida_data::getEntityBaseResult("",$entity->getcuenta_predefinida_Original(),$resultSet));
				//$entity->setcuenta_predefinida_Original($this->getEntityBaseResult("",$entity->getcuenta_predefinida_Original(),$resultSet));
				
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
		$entity = new cuenta_predefinida();		  
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
      	    	$entity = new cuenta_predefinida();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cuenta_predefinida_data::$IS_WITH_SCHEMA);         		
				/*$entity=cuenta_predefinida_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setcuenta_predefinida_Original( new cuenta_predefinida());				
				//$entity->setcuenta_predefinida_Original(parent::getEntityPrefijoEntityResult("",$entity->getcuenta_predefinida_Original(),$resultSet,cuenta_predefinida_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setcuenta_predefinida_Original(cuenta_predefinida_data::getEntityBaseResult("",$entity->getcuenta_predefinida_Original(),$resultSet));
				//$entity->setcuenta_predefinida_Original($this->getEntityBaseResult("",$entity->getcuenta_predefinida_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=cuenta_predefinida_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,cuenta_predefinida $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,cuenta_predefinida_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,cuenta_predefinida_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getempresa(Connexion $connexion,$relcuenta_predefinida) : ?empresa{

		$empresa= new empresa();

		try {
			$empresaDataAccess=new empresa_data();
			$empresaDataAccess->isForFKData=$this->isForFKDataRels;
			$empresa=$empresaDataAccess->getEntity($connexion,$relcuenta_predefinida->getid_empresa());

		} catch(Exception $e) {
			throw $e;
		}

		return $empresa;
	}


	public function  gettipo_cuenta_predefinida(Connexion $connexion,$relcuenta_predefinida) : ?tipo_cuenta_predefinida{

		$tipo_cuenta_predefinida= new tipo_cuenta_predefinida();

		try {
			$tipo_cuenta_predefinidaDataAccess=new tipo_cuenta_predefinida_data();
			$tipo_cuenta_predefinidaDataAccess->isForFKData=$this->isForFKDataRels;
			$tipo_cuenta_predefinida=$tipo_cuenta_predefinidaDataAccess->getEntity($connexion,$relcuenta_predefinida->getid_tipo_cuenta_predefinida());

		} catch(Exception $e) {
			throw $e;
		}

		return $tipo_cuenta_predefinida;
	}


	public function  gettipo_cuenta(Connexion $connexion,$relcuenta_predefinida) : ?tipo_cuenta{

		$tipo_cuenta= new tipo_cuenta();

		try {
			$tipo_cuentaDataAccess=new tipo_cuenta_data();
			$tipo_cuentaDataAccess->isForFKData=$this->isForFKDataRels;
			$tipo_cuenta=$tipo_cuentaDataAccess->getEntity($connexion,$relcuenta_predefinida->getid_tipo_cuenta());

		} catch(Exception $e) {
			throw $e;
		}

		return $tipo_cuenta;
	}


	public function  gettipo_nivel_cuenta(Connexion $connexion,$relcuenta_predefinida) : ?tipo_nivel_cuenta{

		$tipo_nivel_cuenta= new tipo_nivel_cuenta();

		try {
			$tipo_nivel_cuentaDataAccess=new tipo_nivel_cuenta_data();
			$tipo_nivel_cuentaDataAccess->isForFKData=$this->isForFKDataRels;
			$tipo_nivel_cuenta=$tipo_nivel_cuentaDataAccess->getEntity($connexion,$relcuenta_predefinida->getid_tipo_nivel_cuenta());

		} catch(Exception $e) {
			throw $e;
		}

		return $tipo_nivel_cuenta;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,cuenta_predefinida $entity,$resultSet) : cuenta_predefinida {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_empresa((int)$resultSet[$strPrefijo.'id_empresa']);
				$entity->setid_tipo_cuenta_predefinida((int)$resultSet[$strPrefijo.'id_tipo_cuenta_predefinida']);
				$entity->setid_tipo_cuenta((int)$resultSet[$strPrefijo.'id_tipo_cuenta']);
				$entity->setid_tipo_nivel_cuenta((int)$resultSet[$strPrefijo.'id_tipo_nivel_cuenta']);
				$entity->setcodigo_tabla(utf8_encode($resultSet[$strPrefijo.'codigo_tabla']));
				$entity->setcodigo_cuenta(utf8_encode($resultSet[$strPrefijo.'codigo_cuenta']));
				$entity->setnombre_cuenta(utf8_encode($resultSet[$strPrefijo.'nombre_cuenta']));
				$entity->setmonto_minimo((float)$resultSet[$strPrefijo.'monto_minimo']);
				$entity->setvalor_retencion((float)$resultSet[$strPrefijo.'valor_retencion']);
				$entity->setbalance((float)$resultSet[$strPrefijo.'balance']);
				$entity->setporcentaje_base((float)$resultSet[$strPrefijo.'porcentaje_base']);
				$entity->setseleccionar((int)$resultSet[$strPrefijo.'seleccionar']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setcentro_costos($resultSet[$strPrefijo.'centro_costos']=='f'? false:true );
				} else {
					$entity->setcentro_costos((bool)$resultSet[$strPrefijo.'centro_costos']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setretencion($resultSet[$strPrefijo.'retencion']=='f'? false:true );
				} else {
					$entity->setretencion((bool)$resultSet[$strPrefijo.'retencion']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setusa_base($resultSet[$strPrefijo.'usa_base']=='f'? false:true );
				} else {
					$entity->setusa_base((bool)$resultSet[$strPrefijo.'usa_base']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setnit($resultSet[$strPrefijo.'nit']=='f'? false:true );
				} else {
					$entity->setnit((bool)$resultSet[$strPrefijo.'nit']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setmodifica($resultSet[$strPrefijo.'modifica']=='f'? false:true );
				} else {
					$entity->setmodifica((bool)$resultSet[$strPrefijo.'modifica']);
				}
				$entity->setultima_transaccion($resultSet[$strPrefijo.'ultima_transaccion']);
				$entity->setcomenta1(utf8_encode($resultSet[$strPrefijo.'comenta1']));
				$entity->setcomenta2(utf8_encode($resultSet[$strPrefijo.'comenta2']));
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,cuenta_predefinida $cuenta_predefinida,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $cuenta_predefinida->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiisssddddiiiiiisss', $cuenta_predefinida->getid_empresa(),$cuenta_predefinida->getid_tipo_cuenta_predefinida(),$cuenta_predefinida->getid_tipo_cuenta(),$cuenta_predefinida->getid_tipo_nivel_cuenta(),$cuenta_predefinida->getcodigo_tabla(),$cuenta_predefinida->getcodigo_cuenta(),$cuenta_predefinida->getnombre_cuenta(),$cuenta_predefinida->getmonto_minimo(),$cuenta_predefinida->getvalor_retencion(),$cuenta_predefinida->getbalance(),$cuenta_predefinida->getporcentaje_base(),$cuenta_predefinida->getseleccionar(),$cuenta_predefinida->getcentro_costos(),$cuenta_predefinida->getretencion(),$cuenta_predefinida->getusa_base(),$cuenta_predefinida->getnit(),$cuenta_predefinida->getmodifica(),$cuenta_predefinida->getultima_transaccion(),$cuenta_predefinida->getcomenta1(),$cuenta_predefinida->getcomenta2());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiisssddddiiiiiisssis', $cuenta_predefinida->getid_empresa(),$cuenta_predefinida->getid_tipo_cuenta_predefinida(),$cuenta_predefinida->getid_tipo_cuenta(),$cuenta_predefinida->getid_tipo_nivel_cuenta(),$cuenta_predefinida->getcodigo_tabla(),$cuenta_predefinida->getcodigo_cuenta(),$cuenta_predefinida->getnombre_cuenta(),$cuenta_predefinida->getmonto_minimo(),$cuenta_predefinida->getvalor_retencion(),$cuenta_predefinida->getbalance(),$cuenta_predefinida->getporcentaje_base(),$cuenta_predefinida->getseleccionar(),$cuenta_predefinida->getcentro_costos(),$cuenta_predefinida->getretencion(),$cuenta_predefinida->getusa_base(),$cuenta_predefinida->getnit(),$cuenta_predefinida->getmodifica(),$cuenta_predefinida->getultima_transaccion(),$cuenta_predefinida->getcomenta1(),$cuenta_predefinida->getcomenta2(), $cuenta_predefinida->getId(), Funciones::GetRealScapeString($cuenta_predefinida->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,cuenta_predefinida $cuenta_predefinida,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($cuenta_predefinida->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($cuenta_predefinida->getid_empresa(),$cuenta_predefinida->getid_tipo_cuenta_predefinida(),$cuenta_predefinida->getid_tipo_cuenta(),$cuenta_predefinida->getid_tipo_nivel_cuenta(),Funciones::GetRealScapeString($cuenta_predefinida->getcodigo_tabla(),$connexion),Funciones::GetRealScapeString($cuenta_predefinida->getcodigo_cuenta(),$connexion),Funciones::GetRealScapeString($cuenta_predefinida->getnombre_cuenta(),$connexion),$cuenta_predefinida->getmonto_minimo(),$cuenta_predefinida->getvalor_retencion(),$cuenta_predefinida->getbalance(),$cuenta_predefinida->getporcentaje_base(),$cuenta_predefinida->getseleccionar(),$cuenta_predefinida->getcentro_costos(),$cuenta_predefinida->getretencion(),$cuenta_predefinida->getusa_base(),$cuenta_predefinida->getnit(),$cuenta_predefinida->getmodifica(),Funciones::GetRealScapeString($cuenta_predefinida->getultima_transaccion(),$connexion),Funciones::GetRealScapeString($cuenta_predefinida->getcomenta1(),$connexion),Funciones::GetRealScapeString($cuenta_predefinida->getcomenta2(),$connexion));
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($cuenta_predefinida->getid_empresa(),$cuenta_predefinida->getid_tipo_cuenta_predefinida(),$cuenta_predefinida->getid_tipo_cuenta(),$cuenta_predefinida->getid_tipo_nivel_cuenta(),Funciones::GetRealScapeString($cuenta_predefinida->getcodigo_tabla(),$connexion),Funciones::GetRealScapeString($cuenta_predefinida->getcodigo_cuenta(),$connexion),Funciones::GetRealScapeString($cuenta_predefinida->getnombre_cuenta(),$connexion),$cuenta_predefinida->getmonto_minimo(),$cuenta_predefinida->getvalor_retencion(),$cuenta_predefinida->getbalance(),$cuenta_predefinida->getporcentaje_base(),$cuenta_predefinida->getseleccionar(),$cuenta_predefinida->getcentro_costos(),$cuenta_predefinida->getretencion(),$cuenta_predefinida->getusa_base(),$cuenta_predefinida->getnit(),$cuenta_predefinida->getmodifica(),Funciones::GetRealScapeString($cuenta_predefinida->getultima_transaccion(),$connexion),Funciones::GetRealScapeString($cuenta_predefinida->getcomenta1(),$connexion),Funciones::GetRealScapeString($cuenta_predefinida->getcomenta2(),$connexion), $cuenta_predefinida->getId(), Funciones::GetRealScapeString($cuenta_predefinida->getVersionRow(),$connexion));
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
	
	public function setcuenta_predefinida_Original(cuenta_predefinida $cuenta_predefinida) {
		$cuenta_predefinida->setcuenta_predefinida_Original(clone $cuenta_predefinida);		
	}
	
	public function setcuenta_predefinidas_Original(array $cuenta_predefinidas) {
		foreach($cuenta_predefinidas as $cuenta_predefinida){
			$cuenta_predefinida->setcuenta_predefinida_Original(clone $cuenta_predefinida);
		}
	}
	
	public static function setcuenta_predefinida_OriginalStatic(cuenta_predefinida $cuenta_predefinida) {
		$cuenta_predefinida->setcuenta_predefinida_Original(clone $cuenta_predefinida);		
	}
	
	public static function setcuenta_predefinidas_OriginalStatic(array $cuenta_predefinidas) {		
		foreach($cuenta_predefinidas as $cuenta_predefinida){
			$cuenta_predefinida->setcuenta_predefinida_Original(clone $cuenta_predefinida);
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
