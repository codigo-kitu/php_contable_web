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
namespace com\bydan\contabilidad\contabilidad\saldo_cuenta\business\data;

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

use com\bydan\contabilidad\contabilidad\saldo_cuenta\business\entity\saldo_cuenta;

//FK


use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\entity\empresa;

use com\bydan\contabilidad\contabilidad\ejercicio\business\data\ejercicio_data;
use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;

use com\bydan\contabilidad\contabilidad\periodo\business\data\periodo_data;
use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;

use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\data\tipo_cuenta_data;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\entity\tipo_cuenta;

use com\bydan\contabilidad\contabilidad\cuenta\business\data\cuenta_data;
use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;

//REL



class saldo_cuenta_data extends GetEntitiesDataAccessHelper implements saldo_cuenta_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='con_';
	public static string $TABLE_NAME='con_saldo_cuenta';			
	public static string $TABLE_NAME_saldo_cuenta='saldo_cuenta';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_SALDO_CUENTA_INSERT(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_SALDO_CUENTA_UPDATE(??,?,?,?,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_SALDO_CUENTA_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_SALDO_CUENTA_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $saldo_cuenta_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'saldo_cuenta';
		
		saldo_cuenta_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('CONTABILIDAD');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->saldo_cuenta_DataAccessAdditional=new saldo_cuentaDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_empresa,id_ejercicio,id_periodo,id_tipo_cuenta,id_cuenta,suma_debe,suma_haber,deudor,acreedor,saldo,fecha_proceso,fecha_fin_mes,tipo_cuenta_codigo,cuenta_contable) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%d,%d,%d,%d,%f,%f,%f,%f,%f,\'%s\',\'%s\',\'%s\',\'%s\')';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_empresa=%d,id_ejercicio=%d,id_periodo=%d,id_tipo_cuenta=%d,id_cuenta=%d,suma_debe=%f,suma_haber=%f,deudor=%f,acreedor=%f,saldo=%f,fecha_proceso=\'%s\',fecha_fin_mes=\'%s\',tipo_cuenta_codigo=\'%s\',cuenta_contable=\'%s\' where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_ejercicio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_periodo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_tipo_cuenta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.suma_debe,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.suma_haber,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.deudor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.acreedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.saldo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_proceso,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_fin_mes,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.tipo_cuenta_codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cuenta_contable from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(saldo_cuenta $saldo_cuenta,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($saldo_cuenta->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=saldo_cuenta_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($saldo_cuenta->getId(),$connexion));				
				
			} else if ($saldo_cuenta->getIsChanged()) {
				if($saldo_cuenta->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=saldo_cuenta_data::$QUERY_INSERT;
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$saldo_cuenta->getid_empresa(),$saldo_cuenta->getid_ejercicio(),$saldo_cuenta->getid_periodo(),$saldo_cuenta->getid_tipo_cuenta(),$saldo_cuenta->getid_cuenta(),$saldo_cuenta->getsuma_debe(),$saldo_cuenta->getsuma_haber(),$saldo_cuenta->getdeudor(),$saldo_cuenta->getacreedor(),$saldo_cuenta->getsaldo(),Funciones::GetRealScapeString($saldo_cuenta->getfecha_proceso(),$connexion),Funciones::GetRealScapeString($saldo_cuenta->getfecha_fin_mes(),$connexion),Funciones::GetRealScapeString($saldo_cuenta->gettipo_cuenta_codigo(),$connexion),Funciones::GetRealScapeString($saldo_cuenta->getcuenta_contable(),$connexion) );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=saldo_cuenta_data::$QUERY_UPDATE;			
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$saldo_cuenta->getid_empresa(),$saldo_cuenta->getid_ejercicio(),$saldo_cuenta->getid_periodo(),$saldo_cuenta->getid_tipo_cuenta(),$saldo_cuenta->getid_cuenta(),$saldo_cuenta->getsuma_debe(),$saldo_cuenta->getsuma_haber(),$saldo_cuenta->getdeudor(),$saldo_cuenta->getacreedor(),$saldo_cuenta->getsaldo(),Funciones::GetRealScapeString($saldo_cuenta->getfecha_proceso(),$connexion),Funciones::GetRealScapeString($saldo_cuenta->getfecha_fin_mes(),$connexion),Funciones::GetRealScapeString($saldo_cuenta->gettipo_cuenta_codigo(),$connexion),Funciones::GetRealScapeString($saldo_cuenta->getcuenta_contable(),$connexion), Funciones::GetRealScapeString($saldo_cuenta->getId(),$connexion), Funciones::GetRealScapeString($saldo_cuenta->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($saldo_cuenta, $connexion,$strQuerySaveComplete,saldo_cuenta_data::$TABLE_NAME,saldo_cuenta_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				saldo_cuenta_data::savePrepared($saldo_cuenta, $connexion,$strQuerySave,saldo_cuenta_data::$TABLE_NAME,saldo_cuenta_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			saldo_cuenta_data::setsaldo_cuenta_OriginalStatic($saldo_cuenta);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(saldo_cuenta $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				saldo_cuenta_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					saldo_cuenta_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					saldo_cuenta_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(saldo_cuenta $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					saldo_cuenta_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(saldo_cuenta $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					saldo_cuenta_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(saldo_cuenta $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					saldo_cuenta_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?saldo_cuenta {		
		$entity = new saldo_cuenta();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=saldo_cuenta_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=saldo_cuenta_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//Contabilidad.saldo_cuenta.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setsaldo_cuenta_Original(new saldo_cuenta());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,saldo_cuenta_data::$IS_WITH_SCHEMA);         	    
				/*$entity=saldo_cuenta_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setsaldo_cuenta_Original(parent::getEntityPrefijoEntityResult("",$entity->getsaldo_cuenta_Original(),$resultSet,saldo_cuenta_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setsaldo_cuenta_Original(saldo_cuenta_data::getEntityBaseResult("",$entity->getsaldo_cuenta_Original(),$resultSet));
				//$entity->setsaldo_cuenta_Original($this->getEntityBaseResult("",$entity->getsaldo_cuenta_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?saldo_cuenta {
		$entity = new saldo_cuenta();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=saldo_cuenta_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=saldo_cuenta_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,saldo_cuenta_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".Contabilidad.saldo_cuenta.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setsaldo_cuenta_Original(new saldo_cuenta());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,saldo_cuenta_data::$IS_WITH_SCHEMA);         	    
				/*$entity=saldo_cuenta_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setsaldo_cuenta_Original(parent::getEntityPrefijoEntityResult("",$entity->getsaldo_cuenta_Original(),$resultSet,saldo_cuenta_data::$IS_WITH_SCHEMA));         		
				////$entity->setsaldo_cuenta_Original(saldo_cuenta_data::getEntityBaseResult("",$entity->getsaldo_cuenta_Original(),$resultSet));
				//$entity->setsaldo_cuenta_Original($this->getEntityBaseResult("",$entity->getsaldo_cuenta_Original(),$resultSet));
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
		$entity = new saldo_cuenta();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=saldo_cuenta_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=saldo_cuenta_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,saldo_cuenta_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new saldo_cuenta();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,saldo_cuenta_data::$IS_WITH_SCHEMA);         		
				/*$entity=saldo_cuenta_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setsaldo_cuenta_Original( new saldo_cuenta());
				
				//$entity->setsaldo_cuenta_Original(parent::getEntityPrefijoEntityResult("",$entity->getsaldo_cuenta_Original(),$resultSet,saldo_cuenta_data::$IS_WITH_SCHEMA));         		
				////$entity->setsaldo_cuenta_Original(saldo_cuenta_data::getEntityBaseResult("",$entity->getsaldo_cuenta_Original(),$resultSet));
				//$entity->setsaldo_cuenta_Original($this->getEntityBaseResult("",$entity->getsaldo_cuenta_Original(),$resultSet));
								
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
		$entity = new saldo_cuenta();		  
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
      	    	$entity = new saldo_cuenta();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,saldo_cuenta_data::$IS_WITH_SCHEMA);         		
				/*$entity=saldo_cuenta_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setsaldo_cuenta_Original( new saldo_cuenta());
				
				//$entity->setsaldo_cuenta_Original(parent::getEntityPrefijoEntityResult("",$entity->getsaldo_cuenta_Original(),$resultSet,saldo_cuenta_data::$IS_WITH_SCHEMA));         		
				////$entity->setsaldo_cuenta_Original(saldo_cuenta_data::getEntityBaseResult("",$entity->getsaldo_cuenta_Original(),$resultSet));
				//$entity->setsaldo_cuenta_Original($this->getEntityBaseResult("",$entity->getsaldo_cuenta_Original(),$resultSet));
				
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
		$entity = new saldo_cuenta();		  
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
      	    	$entity = new saldo_cuenta();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,saldo_cuenta_data::$IS_WITH_SCHEMA);         		
				/*$entity=saldo_cuenta_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setsaldo_cuenta_Original( new saldo_cuenta());				
				//$entity->setsaldo_cuenta_Original(parent::getEntityPrefijoEntityResult("",$entity->getsaldo_cuenta_Original(),$resultSet,saldo_cuenta_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setsaldo_cuenta_Original(saldo_cuenta_data::getEntityBaseResult("",$entity->getsaldo_cuenta_Original(),$resultSet));
				//$entity->setsaldo_cuenta_Original($this->getEntityBaseResult("",$entity->getsaldo_cuenta_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=saldo_cuenta_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,saldo_cuenta $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,saldo_cuenta_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,saldo_cuenta_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getempresa(Connexion $connexion,$relsaldo_cuenta) : ?empresa{

		$empresa= new empresa();

		try {
			$empresaDataAccess=new empresa_data();
			$empresaDataAccess->isForFKData=$this->isForFKDataRels;
			$empresa=$empresaDataAccess->getEntity($connexion,$relsaldo_cuenta->getid_empresa());

		} catch(Exception $e) {
			throw $e;
		}

		return $empresa;
	}


	public function  getejercicio(Connexion $connexion,$relsaldo_cuenta) : ?ejercicio{

		$ejercicio= new ejercicio();

		try {
			$ejercicioDataAccess=new ejercicio_data();
			$ejercicioDataAccess->isForFKData=$this->isForFKDataRels;
			$ejercicio=$ejercicioDataAccess->getEntity($connexion,$relsaldo_cuenta->getid_ejercicio());

		} catch(Exception $e) {
			throw $e;
		}

		return $ejercicio;
	}


	public function  getperiodo(Connexion $connexion,$relsaldo_cuenta) : ?periodo{

		$periodo= new periodo();

		try {
			$periodoDataAccess=new periodo_data();
			$periodoDataAccess->isForFKData=$this->isForFKDataRels;
			$periodo=$periodoDataAccess->getEntity($connexion,$relsaldo_cuenta->getid_periodo());

		} catch(Exception $e) {
			throw $e;
		}

		return $periodo;
	}


	public function  gettipo_cuenta(Connexion $connexion,$relsaldo_cuenta) : ?tipo_cuenta{

		$tipo_cuenta= new tipo_cuenta();

		try {
			$tipo_cuentaDataAccess=new tipo_cuenta_data();
			$tipo_cuentaDataAccess->isForFKData=$this->isForFKDataRels;
			$tipo_cuenta=$tipo_cuentaDataAccess->getEntity($connexion,$relsaldo_cuenta->getid_tipo_cuenta());

		} catch(Exception $e) {
			throw $e;
		}

		return $tipo_cuenta;
	}


	public function  getcuenta(Connexion $connexion,$relsaldo_cuenta) : ?cuenta{

		$cuenta= new cuenta();

		try {
			$cuentaDataAccess=new cuenta_data();
			$cuentaDataAccess->isForFKData=$this->isForFKDataRels;
			$cuenta=$cuentaDataAccess->getEntity($connexion,$relsaldo_cuenta->getid_cuenta());

		} catch(Exception $e) {
			throw $e;
		}

		return $cuenta;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,saldo_cuenta $entity,$resultSet) : saldo_cuenta {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_empresa((int)$resultSet[$strPrefijo.'id_empresa']);
				$entity->setid_ejercicio((int)$resultSet[$strPrefijo.'id_ejercicio']);
				$entity->setid_periodo((int)$resultSet[$strPrefijo.'id_periodo']);
				$entity->setid_tipo_cuenta((int)$resultSet[$strPrefijo.'id_tipo_cuenta']);
				$entity->setid_cuenta((int)$resultSet[$strPrefijo.'id_cuenta']);
				$entity->setsuma_debe((float)$resultSet[$strPrefijo.'suma_debe']);
				$entity->setsuma_haber((float)$resultSet[$strPrefijo.'suma_haber']);
				$entity->setdeudor((float)$resultSet[$strPrefijo.'deudor']);
				$entity->setacreedor((float)$resultSet[$strPrefijo.'acreedor']);
				$entity->setsaldo((float)$resultSet[$strPrefijo.'saldo']);
				$entity->setfecha_proceso($resultSet[$strPrefijo.'fecha_proceso']);
				$entity->setfecha_fin_mes($resultSet[$strPrefijo.'fecha_fin_mes']);
				$entity->settipo_cuenta_codigo(utf8_encode($resultSet[$strPrefijo.'tipo_cuenta_codigo']));
				$entity->setcuenta_contable(utf8_encode($resultSet[$strPrefijo.'cuenta_contable']));
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,saldo_cuenta $saldo_cuenta,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $saldo_cuenta->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiidddddssss', $saldo_cuenta->getid_empresa(),$saldo_cuenta->getid_ejercicio(),$saldo_cuenta->getid_periodo(),$saldo_cuenta->getid_tipo_cuenta(),$saldo_cuenta->getid_cuenta(),$saldo_cuenta->getsuma_debe(),$saldo_cuenta->getsuma_haber(),$saldo_cuenta->getdeudor(),$saldo_cuenta->getacreedor(),$saldo_cuenta->getsaldo(),$saldo_cuenta->getfecha_proceso(),$saldo_cuenta->getfecha_fin_mes(),$saldo_cuenta->gettipo_cuenta_codigo(),$saldo_cuenta->getcuenta_contable());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiidddddssssis', $saldo_cuenta->getid_empresa(),$saldo_cuenta->getid_ejercicio(),$saldo_cuenta->getid_periodo(),$saldo_cuenta->getid_tipo_cuenta(),$saldo_cuenta->getid_cuenta(),$saldo_cuenta->getsuma_debe(),$saldo_cuenta->getsuma_haber(),$saldo_cuenta->getdeudor(),$saldo_cuenta->getacreedor(),$saldo_cuenta->getsaldo(),$saldo_cuenta->getfecha_proceso(),$saldo_cuenta->getfecha_fin_mes(),$saldo_cuenta->gettipo_cuenta_codigo(),$saldo_cuenta->getcuenta_contable(), $saldo_cuenta->getId(), Funciones::GetRealScapeString($saldo_cuenta->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,saldo_cuenta $saldo_cuenta,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($saldo_cuenta->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($saldo_cuenta->getid_empresa(),$saldo_cuenta->getid_ejercicio(),$saldo_cuenta->getid_periodo(),$saldo_cuenta->getid_tipo_cuenta(),$saldo_cuenta->getid_cuenta(),$saldo_cuenta->getsuma_debe(),$saldo_cuenta->getsuma_haber(),$saldo_cuenta->getdeudor(),$saldo_cuenta->getacreedor(),$saldo_cuenta->getsaldo(),Funciones::GetRealScapeString($saldo_cuenta->getfecha_proceso(),$connexion),Funciones::GetRealScapeString($saldo_cuenta->getfecha_fin_mes(),$connexion),Funciones::GetRealScapeString($saldo_cuenta->gettipo_cuenta_codigo(),$connexion),Funciones::GetRealScapeString($saldo_cuenta->getcuenta_contable(),$connexion));
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($saldo_cuenta->getid_empresa(),$saldo_cuenta->getid_ejercicio(),$saldo_cuenta->getid_periodo(),$saldo_cuenta->getid_tipo_cuenta(),$saldo_cuenta->getid_cuenta(),$saldo_cuenta->getsuma_debe(),$saldo_cuenta->getsuma_haber(),$saldo_cuenta->getdeudor(),$saldo_cuenta->getacreedor(),$saldo_cuenta->getsaldo(),Funciones::GetRealScapeString($saldo_cuenta->getfecha_proceso(),$connexion),Funciones::GetRealScapeString($saldo_cuenta->getfecha_fin_mes(),$connexion),Funciones::GetRealScapeString($saldo_cuenta->gettipo_cuenta_codigo(),$connexion),Funciones::GetRealScapeString($saldo_cuenta->getcuenta_contable(),$connexion), $saldo_cuenta->getId(), Funciones::GetRealScapeString($saldo_cuenta->getVersionRow(),$connexion));
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
	
	public function setsaldo_cuenta_Original(saldo_cuenta $saldo_cuenta) {
		$saldo_cuenta->setsaldo_cuenta_Original(clone $saldo_cuenta);		
	}
	
	public function setsaldo_cuentas_Original(array $saldo_cuentas) {
		foreach($saldo_cuentas as $saldo_cuenta){
			$saldo_cuenta->setsaldo_cuenta_Original(clone $saldo_cuenta);
		}
	}
	
	public static function setsaldo_cuenta_OriginalStatic(saldo_cuenta $saldo_cuenta) {
		$saldo_cuenta->setsaldo_cuenta_Original(clone $saldo_cuenta);		
	}
	
	public static function setsaldo_cuentas_OriginalStatic(array $saldo_cuentas) {		
		foreach($saldo_cuentas as $saldo_cuenta){
			$saldo_cuenta->setsaldo_cuenta_Original(clone $saldo_cuenta);
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
