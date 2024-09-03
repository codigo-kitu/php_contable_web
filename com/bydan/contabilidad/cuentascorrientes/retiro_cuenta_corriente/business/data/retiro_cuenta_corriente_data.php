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
namespace com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\business\data;

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

use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\business\entity\retiro_cuenta_corriente;

//FK


use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\entity\empresa;

use com\bydan\contabilidad\general\sucursal\business\data\sucursal_data;
use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;

use com\bydan\contabilidad\contabilidad\ejercicio\business\data\ejercicio_data;
use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;

use com\bydan\contabilidad\contabilidad\periodo\business\data\periodo_data;
use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;

use com\bydan\contabilidad\seguridad\usuario\business\data\usuario_data;
use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\data\cuenta_corriente_data;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity\cuenta_corriente;

use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\business\data\estado_deposito_retiro_data;
use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\business\entity\estado_deposito_retiro;

//REL



class retiro_cuenta_corriente_data extends GetEntitiesDataAccessHelper implements retiro_cuenta_corriente_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='cco_';
	public static string $TABLE_NAME='cco_retiro_cuenta_corriente';			
	public static string $TABLE_NAME_retiro_cuenta_corriente='retiro_cuenta_corriente';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_RETIRO_CUENTA_CORRIENTE_INSERT(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_RETIRO_CUENTA_CORRIENTE_UPDATE(??,?,?,?,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_RETIRO_CUENTA_CORRIENTE_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_RETIRO_CUENTA_CORRIENTE_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $retiro_cuenta_corriente_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'retiro_cuenta_corriente';
		
		retiro_cuenta_corriente_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('CUENTASCORRIENTES');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->retiro_cuenta_corriente_DataAccessAdditional=new retiro_cuenta_corrienteDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_empresa,id_sucursal,id_ejercicio,id_periodo,id_usuario,id_cuenta_corriente,fecha_emision,monto,monto_texto,saldo,descripcion,id_estado_deposito_retiro,debito,credito) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%d,%d,%d,%d,%d,\'%s\',%f,\'%s\',%f,\'%s\',%d,%f,%f)';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_empresa=%d,id_sucursal=%d,id_ejercicio=%d,id_periodo=%d,id_usuario=%d,id_cuenta_corriente=%d,fecha_emision=\'%s\',monto=%f,monto_texto=\'%s\',saldo=%f,descripcion=\'%s\',id_estado_deposito_retiro=%d,debito=%f,credito=%f where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_sucursal,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_ejercicio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_periodo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_usuario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta_corriente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_emision,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.monto_texto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.saldo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_estado_deposito_retiro,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.debito,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.credito from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(retiro_cuenta_corriente $retiro_cuenta_corriente,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($retiro_cuenta_corriente->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=retiro_cuenta_corriente_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($retiro_cuenta_corriente->getId(),$connexion));				
				
			} else if ($retiro_cuenta_corriente->getIsChanged()) {
				if($retiro_cuenta_corriente->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=retiro_cuenta_corriente_data::$QUERY_INSERT;
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$retiro_cuenta_corriente->getid_empresa(),$retiro_cuenta_corriente->getid_sucursal(),$retiro_cuenta_corriente->getid_ejercicio(),$retiro_cuenta_corriente->getid_periodo(),$retiro_cuenta_corriente->getid_usuario(),$retiro_cuenta_corriente->getid_cuenta_corriente(),Funciones::GetRealScapeString($retiro_cuenta_corriente->getfecha_emision(),$connexion),$retiro_cuenta_corriente->getmonto(),Funciones::GetRealScapeString($retiro_cuenta_corriente->getmonto_texto(),$connexion),$retiro_cuenta_corriente->getsaldo(),Funciones::GetRealScapeString($retiro_cuenta_corriente->getdescripcion(),$connexion),$retiro_cuenta_corriente->getid_estado_deposito_retiro(),$retiro_cuenta_corriente->getdebito(),$retiro_cuenta_corriente->getcredito() );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=retiro_cuenta_corriente_data::$QUERY_UPDATE;			
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$retiro_cuenta_corriente->getid_empresa(),$retiro_cuenta_corriente->getid_sucursal(),$retiro_cuenta_corriente->getid_ejercicio(),$retiro_cuenta_corriente->getid_periodo(),$retiro_cuenta_corriente->getid_usuario(),$retiro_cuenta_corriente->getid_cuenta_corriente(),Funciones::GetRealScapeString($retiro_cuenta_corriente->getfecha_emision(),$connexion),$retiro_cuenta_corriente->getmonto(),Funciones::GetRealScapeString($retiro_cuenta_corriente->getmonto_texto(),$connexion),$retiro_cuenta_corriente->getsaldo(),Funciones::GetRealScapeString($retiro_cuenta_corriente->getdescripcion(),$connexion),$retiro_cuenta_corriente->getid_estado_deposito_retiro(),$retiro_cuenta_corriente->getdebito(),$retiro_cuenta_corriente->getcredito(), Funciones::GetRealScapeString($retiro_cuenta_corriente->getId(),$connexion), Funciones::GetRealScapeString($retiro_cuenta_corriente->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($retiro_cuenta_corriente, $connexion,$strQuerySaveComplete,retiro_cuenta_corriente_data::$TABLE_NAME,retiro_cuenta_corriente_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				retiro_cuenta_corriente_data::savePrepared($retiro_cuenta_corriente, $connexion,$strQuerySave,retiro_cuenta_corriente_data::$TABLE_NAME,retiro_cuenta_corriente_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			retiro_cuenta_corriente_data::setretiro_cuenta_corriente_OriginalStatic($retiro_cuenta_corriente);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(retiro_cuenta_corriente $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				retiro_cuenta_corriente_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					retiro_cuenta_corriente_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					retiro_cuenta_corriente_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(retiro_cuenta_corriente $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					retiro_cuenta_corriente_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(retiro_cuenta_corriente $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					retiro_cuenta_corriente_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(retiro_cuenta_corriente $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					retiro_cuenta_corriente_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?retiro_cuenta_corriente {		
		$entity = new retiro_cuenta_corriente();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=retiro_cuenta_corriente_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=retiro_cuenta_corriente_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//CuentasCorrientes.retiro_cuenta_corriente.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setretiro_cuenta_corriente_Original(new retiro_cuenta_corriente());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,retiro_cuenta_corriente_data::$IS_WITH_SCHEMA);         	    
				/*$entity=retiro_cuenta_corriente_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setretiro_cuenta_corriente_Original(parent::getEntityPrefijoEntityResult("",$entity->getretiro_cuenta_corriente_Original(),$resultSet,retiro_cuenta_corriente_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setretiro_cuenta_corriente_Original(retiro_cuenta_corriente_data::getEntityBaseResult("",$entity->getretiro_cuenta_corriente_Original(),$resultSet));
				//$entity->setretiro_cuenta_corriente_Original($this->getEntityBaseResult("",$entity->getretiro_cuenta_corriente_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?retiro_cuenta_corriente {
		$entity = new retiro_cuenta_corriente();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=retiro_cuenta_corriente_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=retiro_cuenta_corriente_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,retiro_cuenta_corriente_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".CuentasCorrientes.retiro_cuenta_corriente.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setretiro_cuenta_corriente_Original(new retiro_cuenta_corriente());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,retiro_cuenta_corriente_data::$IS_WITH_SCHEMA);         	    
				/*$entity=retiro_cuenta_corriente_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setretiro_cuenta_corriente_Original(parent::getEntityPrefijoEntityResult("",$entity->getretiro_cuenta_corriente_Original(),$resultSet,retiro_cuenta_corriente_data::$IS_WITH_SCHEMA));         		
				////$entity->setretiro_cuenta_corriente_Original(retiro_cuenta_corriente_data::getEntityBaseResult("",$entity->getretiro_cuenta_corriente_Original(),$resultSet));
				//$entity->setretiro_cuenta_corriente_Original($this->getEntityBaseResult("",$entity->getretiro_cuenta_corriente_Original(),$resultSet));
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
		$entity = new retiro_cuenta_corriente();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=retiro_cuenta_corriente_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=retiro_cuenta_corriente_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,retiro_cuenta_corriente_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new retiro_cuenta_corriente();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,retiro_cuenta_corriente_data::$IS_WITH_SCHEMA);         		
				/*$entity=retiro_cuenta_corriente_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setretiro_cuenta_corriente_Original( new retiro_cuenta_corriente());
				
				//$entity->setretiro_cuenta_corriente_Original(parent::getEntityPrefijoEntityResult("",$entity->getretiro_cuenta_corriente_Original(),$resultSet,retiro_cuenta_corriente_data::$IS_WITH_SCHEMA));         		
				////$entity->setretiro_cuenta_corriente_Original(retiro_cuenta_corriente_data::getEntityBaseResult("",$entity->getretiro_cuenta_corriente_Original(),$resultSet));
				//$entity->setretiro_cuenta_corriente_Original($this->getEntityBaseResult("",$entity->getretiro_cuenta_corriente_Original(),$resultSet));
								
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
		$entity = new retiro_cuenta_corriente();		  
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
      	    	$entity = new retiro_cuenta_corriente();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,retiro_cuenta_corriente_data::$IS_WITH_SCHEMA);         		
				/*$entity=retiro_cuenta_corriente_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setretiro_cuenta_corriente_Original( new retiro_cuenta_corriente());
				
				//$entity->setretiro_cuenta_corriente_Original(parent::getEntityPrefijoEntityResult("",$entity->getretiro_cuenta_corriente_Original(),$resultSet,retiro_cuenta_corriente_data::$IS_WITH_SCHEMA));         		
				////$entity->setretiro_cuenta_corriente_Original(retiro_cuenta_corriente_data::getEntityBaseResult("",$entity->getretiro_cuenta_corriente_Original(),$resultSet));
				//$entity->setretiro_cuenta_corriente_Original($this->getEntityBaseResult("",$entity->getretiro_cuenta_corriente_Original(),$resultSet));
				
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
		$entity = new retiro_cuenta_corriente();		  
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
      	    	$entity = new retiro_cuenta_corriente();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,retiro_cuenta_corriente_data::$IS_WITH_SCHEMA);         		
				/*$entity=retiro_cuenta_corriente_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setretiro_cuenta_corriente_Original( new retiro_cuenta_corriente());				
				//$entity->setretiro_cuenta_corriente_Original(parent::getEntityPrefijoEntityResult("",$entity->getretiro_cuenta_corriente_Original(),$resultSet,retiro_cuenta_corriente_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setretiro_cuenta_corriente_Original(retiro_cuenta_corriente_data::getEntityBaseResult("",$entity->getretiro_cuenta_corriente_Original(),$resultSet));
				//$entity->setretiro_cuenta_corriente_Original($this->getEntityBaseResult("",$entity->getretiro_cuenta_corriente_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=retiro_cuenta_corriente_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,retiro_cuenta_corriente $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,retiro_cuenta_corriente_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,retiro_cuenta_corriente_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getempresa(Connexion $connexion,$relretiro_cuenta_corriente) : ?empresa{

		$empresa= new empresa();

		try {
			$empresaDataAccess=new empresa_data();
			$empresaDataAccess->isForFKData=$this->isForFKDataRels;
			$empresa=$empresaDataAccess->getEntity($connexion,$relretiro_cuenta_corriente->getid_empresa());

		} catch(Exception $e) {
			throw $e;
		}

		return $empresa;
	}


	public function  getsucursal(Connexion $connexion,$relretiro_cuenta_corriente) : ?sucursal{

		$sucursal= new sucursal();

		try {
			$sucursalDataAccess=new sucursal_data();
			$sucursalDataAccess->isForFKData=$this->isForFKDataRels;
			$sucursal=$sucursalDataAccess->getEntity($connexion,$relretiro_cuenta_corriente->getid_sucursal());

		} catch(Exception $e) {
			throw $e;
		}

		return $sucursal;
	}


	public function  getejercicio(Connexion $connexion,$relretiro_cuenta_corriente) : ?ejercicio{

		$ejercicio= new ejercicio();

		try {
			$ejercicioDataAccess=new ejercicio_data();
			$ejercicioDataAccess->isForFKData=$this->isForFKDataRels;
			$ejercicio=$ejercicioDataAccess->getEntity($connexion,$relretiro_cuenta_corriente->getid_ejercicio());

		} catch(Exception $e) {
			throw $e;
		}

		return $ejercicio;
	}


	public function  getperiodo(Connexion $connexion,$relretiro_cuenta_corriente) : ?periodo{

		$periodo= new periodo();

		try {
			$periodoDataAccess=new periodo_data();
			$periodoDataAccess->isForFKData=$this->isForFKDataRels;
			$periodo=$periodoDataAccess->getEntity($connexion,$relretiro_cuenta_corriente->getid_periodo());

		} catch(Exception $e) {
			throw $e;
		}

		return $periodo;
	}


	public function  getusuario(Connexion $connexion,$relretiro_cuenta_corriente) : ?usuario{

		$usuario= new usuario();

		try {
			$usuarioDataAccess=new usuario_data();
			$usuarioDataAccess->isForFKData=$this->isForFKDataRels;
			$usuario=$usuarioDataAccess->getEntity($connexion,$relretiro_cuenta_corriente->getid_usuario());

		} catch(Exception $e) {
			throw $e;
		}

		return $usuario;
	}


	public function  getcuenta_corriente(Connexion $connexion,$relretiro_cuenta_corriente) : ?cuenta_corriente{

		$cuenta_corriente= new cuenta_corriente();

		try {
			$cuenta_corrienteDataAccess=new cuenta_corriente_data();
			$cuenta_corrienteDataAccess->isForFKData=$this->isForFKDataRels;
			$cuenta_corriente=$cuenta_corrienteDataAccess->getEntity($connexion,$relretiro_cuenta_corriente->getid_cuenta_corriente());

		} catch(Exception $e) {
			throw $e;
		}

		return $cuenta_corriente;
	}


	public function  getestado_deposito_retiro(Connexion $connexion,$relretiro_cuenta_corriente) : ?estado_deposito_retiro{

		$estado_deposito_retiro= new estado_deposito_retiro();

		try {
			$estado_deposito_retiroDataAccess=new estado_deposito_retiro_data();
			$estado_deposito_retiroDataAccess->isForFKData=$this->isForFKDataRels;
			$estado_deposito_retiro=$estado_deposito_retiroDataAccess->getEntity($connexion,$relretiro_cuenta_corriente->getid_estado_deposito_retiro());

		} catch(Exception $e) {
			throw $e;
		}

		return $estado_deposito_retiro;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,retiro_cuenta_corriente $entity,$resultSet) : retiro_cuenta_corriente {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_empresa((int)$resultSet[$strPrefijo.'id_empresa']);
				$entity->setid_sucursal((int)$resultSet[$strPrefijo.'id_sucursal']);
				$entity->setid_ejercicio((int)$resultSet[$strPrefijo.'id_ejercicio']);
				$entity->setid_periodo((int)$resultSet[$strPrefijo.'id_periodo']);
				$entity->setid_usuario((int)$resultSet[$strPrefijo.'id_usuario']);
				$entity->setid_cuenta_corriente((int)$resultSet[$strPrefijo.'id_cuenta_corriente']);
				$entity->setfecha_emision($resultSet[$strPrefijo.'fecha_emision']);
				$entity->setmonto((float)$resultSet[$strPrefijo.'monto']);
				$entity->setmonto_texto(utf8_encode($resultSet[$strPrefijo.'monto_texto']));
				$entity->setsaldo((float)$resultSet[$strPrefijo.'saldo']);
				$entity->setdescripcion(utf8_encode($resultSet[$strPrefijo.'descripcion']));
				$entity->setid_estado_deposito_retiro((int)$resultSet[$strPrefijo.'id_estado_deposito_retiro']);
				$entity->setdebito((float)$resultSet[$strPrefijo.'debito']);
				$entity->setcredito((float)$resultSet[$strPrefijo.'credito']);
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,retiro_cuenta_corriente $retiro_cuenta_corriente,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $retiro_cuenta_corriente->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiiisdsdsidd', $retiro_cuenta_corriente->getid_empresa(),$retiro_cuenta_corriente->getid_sucursal(),$retiro_cuenta_corriente->getid_ejercicio(),$retiro_cuenta_corriente->getid_periodo(),$retiro_cuenta_corriente->getid_usuario(),$retiro_cuenta_corriente->getid_cuenta_corriente(),$retiro_cuenta_corriente->getfecha_emision(),$retiro_cuenta_corriente->getmonto(),$retiro_cuenta_corriente->getmonto_texto(),$retiro_cuenta_corriente->getsaldo(),$retiro_cuenta_corriente->getdescripcion(),$retiro_cuenta_corriente->getid_estado_deposito_retiro(),$retiro_cuenta_corriente->getdebito(),$retiro_cuenta_corriente->getcredito());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiiisdsdsiddis', $retiro_cuenta_corriente->getid_empresa(),$retiro_cuenta_corriente->getid_sucursal(),$retiro_cuenta_corriente->getid_ejercicio(),$retiro_cuenta_corriente->getid_periodo(),$retiro_cuenta_corriente->getid_usuario(),$retiro_cuenta_corriente->getid_cuenta_corriente(),$retiro_cuenta_corriente->getfecha_emision(),$retiro_cuenta_corriente->getmonto(),$retiro_cuenta_corriente->getmonto_texto(),$retiro_cuenta_corriente->getsaldo(),$retiro_cuenta_corriente->getdescripcion(),$retiro_cuenta_corriente->getid_estado_deposito_retiro(),$retiro_cuenta_corriente->getdebito(),$retiro_cuenta_corriente->getcredito(), $retiro_cuenta_corriente->getId(), Funciones::GetRealScapeString($retiro_cuenta_corriente->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,retiro_cuenta_corriente $retiro_cuenta_corriente,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($retiro_cuenta_corriente->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($retiro_cuenta_corriente->getid_empresa(),$retiro_cuenta_corriente->getid_sucursal(),$retiro_cuenta_corriente->getid_ejercicio(),$retiro_cuenta_corriente->getid_periodo(),$retiro_cuenta_corriente->getid_usuario(),$retiro_cuenta_corriente->getid_cuenta_corriente(),Funciones::GetRealScapeString($retiro_cuenta_corriente->getfecha_emision(),$connexion),$retiro_cuenta_corriente->getmonto(),Funciones::GetRealScapeString($retiro_cuenta_corriente->getmonto_texto(),$connexion),$retiro_cuenta_corriente->getsaldo(),Funciones::GetRealScapeString($retiro_cuenta_corriente->getdescripcion(),$connexion),$retiro_cuenta_corriente->getid_estado_deposito_retiro(),$retiro_cuenta_corriente->getdebito(),$retiro_cuenta_corriente->getcredito());
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($retiro_cuenta_corriente->getid_empresa(),$retiro_cuenta_corriente->getid_sucursal(),$retiro_cuenta_corriente->getid_ejercicio(),$retiro_cuenta_corriente->getid_periodo(),$retiro_cuenta_corriente->getid_usuario(),$retiro_cuenta_corriente->getid_cuenta_corriente(),Funciones::GetRealScapeString($retiro_cuenta_corriente->getfecha_emision(),$connexion),$retiro_cuenta_corriente->getmonto(),Funciones::GetRealScapeString($retiro_cuenta_corriente->getmonto_texto(),$connexion),$retiro_cuenta_corriente->getsaldo(),Funciones::GetRealScapeString($retiro_cuenta_corriente->getdescripcion(),$connexion),$retiro_cuenta_corriente->getid_estado_deposito_retiro(),$retiro_cuenta_corriente->getdebito(),$retiro_cuenta_corriente->getcredito(), $retiro_cuenta_corriente->getId(), Funciones::GetRealScapeString($retiro_cuenta_corriente->getVersionRow(),$connexion));
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
	
	public function setretiro_cuenta_corriente_Original(retiro_cuenta_corriente $retiro_cuenta_corriente) {
		$retiro_cuenta_corriente->setretiro_cuenta_corriente_Original(clone $retiro_cuenta_corriente);		
	}
	
	public function setretiro_cuenta_corrientes_Original(array $retiro_cuenta_corrientes) {
		foreach($retiro_cuenta_corrientes as $retiro_cuenta_corriente){
			$retiro_cuenta_corriente->setretiro_cuenta_corriente_Original(clone $retiro_cuenta_corriente);
		}
	}
	
	public static function setretiro_cuenta_corriente_OriginalStatic(retiro_cuenta_corriente $retiro_cuenta_corriente) {
		$retiro_cuenta_corriente->setretiro_cuenta_corriente_Original(clone $retiro_cuenta_corriente);		
	}
	
	public static function setretiro_cuenta_corrientes_OriginalStatic(array $retiro_cuenta_corrientes) {		
		foreach($retiro_cuenta_corrientes as $retiro_cuenta_corriente){
			$retiro_cuenta_corriente->setretiro_cuenta_corriente_Original(clone $retiro_cuenta_corriente);
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
