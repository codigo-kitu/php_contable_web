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
namespace com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\business\data;

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

use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\business\entity\pago_cuenta_pagar;

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

use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\data\cuenta_pagar_data;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\entity\cuenta_pagar;

use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\data\forma_pago_proveedor_data;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\entity\forma_pago_proveedor;

use com\bydan\contabilidad\general\estado\business\data\estado_data;
use com\bydan\contabilidad\general\estado\business\entity\estado;

//REL



class pago_cuenta_pagar_data extends GetEntitiesDataAccessHelper implements pago_cuenta_pagar_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='cp_';
	public static string $TABLE_NAME='cp_pago_cuenta_pagar';			
	public static string $TABLE_NAME_pago_cuenta_pagar='pago_cuenta_pagar';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_PAGO_CUENTA_PAGAR_INSERT(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_PAGO_CUENTA_PAGAR_UPDATE(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_PAGO_CUENTA_PAGAR_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_PAGO_CUENTA_PAGAR_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $pago_cuenta_pagar_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'pago_cuenta_pagar';
		
		pago_cuenta_pagar_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('CUENTASPAGAR');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->pago_cuenta_pagar_DataAccessAdditional=new pago_cuenta_pagarDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_empresa,id_sucursal,id_ejercicio,id_periodo,id_usuario,id_cuenta_pagar,id_forma_pago_proveedor,numero,fecha_emision,fecha_vence,abono,saldo,descripcion,id_estado,referencia,debito,credito) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%d,%d,%d,%d,%d,%d,\'%s\',\'%s\',\'%s\',%f,%f,\'%s\',%d,\'%s\',%f,%f)';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_empresa=%d,id_sucursal=%d,id_ejercicio=%d,id_periodo=%d,id_usuario=%d,id_cuenta_pagar=%d,id_forma_pago_proveedor=%d,numero=\'%s\',fecha_emision=\'%s\',fecha_vence=\'%s\',abono=%f,saldo=%f,descripcion=\'%s\',id_estado=%d,referencia=\'%s\',debito=%f,credito=%f where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_sucursal,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_ejercicio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_periodo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_usuario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta_pagar,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_forma_pago_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_emision,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_vence,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.abono,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.saldo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_estado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.referencia,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.debito,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.credito from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(pago_cuenta_pagar $pago_cuenta_pagar,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($pago_cuenta_pagar->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=pago_cuenta_pagar_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($pago_cuenta_pagar->getId(),$connexion));				
				
			} else if ($pago_cuenta_pagar->getIsChanged()) {
				if($pago_cuenta_pagar->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=pago_cuenta_pagar_data::$QUERY_INSERT;
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$pago_cuenta_pagar->getid_empresa(),$pago_cuenta_pagar->getid_sucursal(),$pago_cuenta_pagar->getid_ejercicio(),$pago_cuenta_pagar->getid_periodo(),$pago_cuenta_pagar->getid_usuario(),$pago_cuenta_pagar->getid_cuenta_pagar(),$pago_cuenta_pagar->getid_forma_pago_proveedor(),Funciones::GetRealScapeString($pago_cuenta_pagar->getnumero(),$connexion),Funciones::GetRealScapeString($pago_cuenta_pagar->getfecha_emision(),$connexion),Funciones::GetRealScapeString($pago_cuenta_pagar->getfecha_vence(),$connexion),$pago_cuenta_pagar->getabono(),$pago_cuenta_pagar->getsaldo(),Funciones::GetRealScapeString($pago_cuenta_pagar->getdescripcion(),$connexion),$pago_cuenta_pagar->getid_estado(),Funciones::GetRealScapeString($pago_cuenta_pagar->getreferencia(),$connexion),$pago_cuenta_pagar->getdebito(),$pago_cuenta_pagar->getcredito() );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=pago_cuenta_pagar_data::$QUERY_UPDATE;			
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$pago_cuenta_pagar->getid_empresa(),$pago_cuenta_pagar->getid_sucursal(),$pago_cuenta_pagar->getid_ejercicio(),$pago_cuenta_pagar->getid_periodo(),$pago_cuenta_pagar->getid_usuario(),$pago_cuenta_pagar->getid_cuenta_pagar(),$pago_cuenta_pagar->getid_forma_pago_proveedor(),Funciones::GetRealScapeString($pago_cuenta_pagar->getnumero(),$connexion),Funciones::GetRealScapeString($pago_cuenta_pagar->getfecha_emision(),$connexion),Funciones::GetRealScapeString($pago_cuenta_pagar->getfecha_vence(),$connexion),$pago_cuenta_pagar->getabono(),$pago_cuenta_pagar->getsaldo(),Funciones::GetRealScapeString($pago_cuenta_pagar->getdescripcion(),$connexion),$pago_cuenta_pagar->getid_estado(),Funciones::GetRealScapeString($pago_cuenta_pagar->getreferencia(),$connexion),$pago_cuenta_pagar->getdebito(),$pago_cuenta_pagar->getcredito(), Funciones::GetRealScapeString($pago_cuenta_pagar->getId(),$connexion), Funciones::GetRealScapeString($pago_cuenta_pagar->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($pago_cuenta_pagar, $connexion,$strQuerySaveComplete,pago_cuenta_pagar_data::$TABLE_NAME,pago_cuenta_pagar_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				pago_cuenta_pagar_data::savePrepared($pago_cuenta_pagar, $connexion,$strQuerySave,pago_cuenta_pagar_data::$TABLE_NAME,pago_cuenta_pagar_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			pago_cuenta_pagar_data::setpago_cuenta_pagar_OriginalStatic($pago_cuenta_pagar);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(pago_cuenta_pagar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				pago_cuenta_pagar_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					pago_cuenta_pagar_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					pago_cuenta_pagar_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(pago_cuenta_pagar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					pago_cuenta_pagar_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(pago_cuenta_pagar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					pago_cuenta_pagar_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(pago_cuenta_pagar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					pago_cuenta_pagar_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?pago_cuenta_pagar {		
		$entity = new pago_cuenta_pagar();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=pago_cuenta_pagar_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=pago_cuenta_pagar_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//CuentasPagar.pago_cuenta_pagar.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setpago_cuenta_pagar_Original(new pago_cuenta_pagar());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,pago_cuenta_pagar_data::$IS_WITH_SCHEMA);         	    
				/*$entity=pago_cuenta_pagar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setpago_cuenta_pagar_Original(parent::getEntityPrefijoEntityResult("",$entity->getpago_cuenta_pagar_Original(),$resultSet,pago_cuenta_pagar_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setpago_cuenta_pagar_Original(pago_cuenta_pagar_data::getEntityBaseResult("",$entity->getpago_cuenta_pagar_Original(),$resultSet));
				//$entity->setpago_cuenta_pagar_Original($this->getEntityBaseResult("",$entity->getpago_cuenta_pagar_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?pago_cuenta_pagar {
		$entity = new pago_cuenta_pagar();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=pago_cuenta_pagar_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=pago_cuenta_pagar_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,pago_cuenta_pagar_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".CuentasPagar.pago_cuenta_pagar.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setpago_cuenta_pagar_Original(new pago_cuenta_pagar());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,pago_cuenta_pagar_data::$IS_WITH_SCHEMA);         	    
				/*$entity=pago_cuenta_pagar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setpago_cuenta_pagar_Original(parent::getEntityPrefijoEntityResult("",$entity->getpago_cuenta_pagar_Original(),$resultSet,pago_cuenta_pagar_data::$IS_WITH_SCHEMA));         		
				////$entity->setpago_cuenta_pagar_Original(pago_cuenta_pagar_data::getEntityBaseResult("",$entity->getpago_cuenta_pagar_Original(),$resultSet));
				//$entity->setpago_cuenta_pagar_Original($this->getEntityBaseResult("",$entity->getpago_cuenta_pagar_Original(),$resultSet));
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
		$entity = new pago_cuenta_pagar();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=pago_cuenta_pagar_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=pago_cuenta_pagar_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,pago_cuenta_pagar_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new pago_cuenta_pagar();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,pago_cuenta_pagar_data::$IS_WITH_SCHEMA);         		
				/*$entity=pago_cuenta_pagar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setpago_cuenta_pagar_Original( new pago_cuenta_pagar());
				
				//$entity->setpago_cuenta_pagar_Original(parent::getEntityPrefijoEntityResult("",$entity->getpago_cuenta_pagar_Original(),$resultSet,pago_cuenta_pagar_data::$IS_WITH_SCHEMA));         		
				////$entity->setpago_cuenta_pagar_Original(pago_cuenta_pagar_data::getEntityBaseResult("",$entity->getpago_cuenta_pagar_Original(),$resultSet));
				//$entity->setpago_cuenta_pagar_Original($this->getEntityBaseResult("",$entity->getpago_cuenta_pagar_Original(),$resultSet));
								
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
		$entity = new pago_cuenta_pagar();		  
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
      	    	$entity = new pago_cuenta_pagar();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,pago_cuenta_pagar_data::$IS_WITH_SCHEMA);         		
				/*$entity=pago_cuenta_pagar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setpago_cuenta_pagar_Original( new pago_cuenta_pagar());
				
				//$entity->setpago_cuenta_pagar_Original(parent::getEntityPrefijoEntityResult("",$entity->getpago_cuenta_pagar_Original(),$resultSet,pago_cuenta_pagar_data::$IS_WITH_SCHEMA));         		
				////$entity->setpago_cuenta_pagar_Original(pago_cuenta_pagar_data::getEntityBaseResult("",$entity->getpago_cuenta_pagar_Original(),$resultSet));
				//$entity->setpago_cuenta_pagar_Original($this->getEntityBaseResult("",$entity->getpago_cuenta_pagar_Original(),$resultSet));
				
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
		$entity = new pago_cuenta_pagar();		  
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
      	    	$entity = new pago_cuenta_pagar();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,pago_cuenta_pagar_data::$IS_WITH_SCHEMA);         		
				/*$entity=pago_cuenta_pagar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setpago_cuenta_pagar_Original( new pago_cuenta_pagar());				
				//$entity->setpago_cuenta_pagar_Original(parent::getEntityPrefijoEntityResult("",$entity->getpago_cuenta_pagar_Original(),$resultSet,pago_cuenta_pagar_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setpago_cuenta_pagar_Original(pago_cuenta_pagar_data::getEntityBaseResult("",$entity->getpago_cuenta_pagar_Original(),$resultSet));
				//$entity->setpago_cuenta_pagar_Original($this->getEntityBaseResult("",$entity->getpago_cuenta_pagar_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=pago_cuenta_pagar_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,pago_cuenta_pagar $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,pago_cuenta_pagar_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,pago_cuenta_pagar_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getempresa(Connexion $connexion,$relpago_cuenta_pagar) : ?empresa{

		$empresa= new empresa();

		try {
			$empresaDataAccess=new empresa_data();
			$empresaDataAccess->isForFKData=$this->isForFKDataRels;
			$empresa=$empresaDataAccess->getEntity($connexion,$relpago_cuenta_pagar->getid_empresa());

		} catch(Exception $e) {
			throw $e;
		}

		return $empresa;
	}


	public function  getsucursal(Connexion $connexion,$relpago_cuenta_pagar) : ?sucursal{

		$sucursal= new sucursal();

		try {
			$sucursalDataAccess=new sucursal_data();
			$sucursalDataAccess->isForFKData=$this->isForFKDataRels;
			$sucursal=$sucursalDataAccess->getEntity($connexion,$relpago_cuenta_pagar->getid_sucursal());

		} catch(Exception $e) {
			throw $e;
		}

		return $sucursal;
	}


	public function  getejercicio(Connexion $connexion,$relpago_cuenta_pagar) : ?ejercicio{

		$ejercicio= new ejercicio();

		try {
			$ejercicioDataAccess=new ejercicio_data();
			$ejercicioDataAccess->isForFKData=$this->isForFKDataRels;
			$ejercicio=$ejercicioDataAccess->getEntity($connexion,$relpago_cuenta_pagar->getid_ejercicio());

		} catch(Exception $e) {
			throw $e;
		}

		return $ejercicio;
	}


	public function  getperiodo(Connexion $connexion,$relpago_cuenta_pagar) : ?periodo{

		$periodo= new periodo();

		try {
			$periodoDataAccess=new periodo_data();
			$periodoDataAccess->isForFKData=$this->isForFKDataRels;
			$periodo=$periodoDataAccess->getEntity($connexion,$relpago_cuenta_pagar->getid_periodo());

		} catch(Exception $e) {
			throw $e;
		}

		return $periodo;
	}


	public function  getusuario(Connexion $connexion,$relpago_cuenta_pagar) : ?usuario{

		$usuario= new usuario();

		try {
			$usuarioDataAccess=new usuario_data();
			$usuarioDataAccess->isForFKData=$this->isForFKDataRels;
			$usuario=$usuarioDataAccess->getEntity($connexion,$relpago_cuenta_pagar->getid_usuario());

		} catch(Exception $e) {
			throw $e;
		}

		return $usuario;
	}


	public function  getcuenta_pagar(Connexion $connexion,$relpago_cuenta_pagar) : ?cuenta_pagar{

		$cuenta_pagar= new cuenta_pagar();

		try {
			$cuenta_pagarDataAccess=new cuenta_pagar_data();
			$cuenta_pagarDataAccess->isForFKData=$this->isForFKDataRels;
			$cuenta_pagar=$cuenta_pagarDataAccess->getEntity($connexion,$relpago_cuenta_pagar->getid_cuenta_pagar());

		} catch(Exception $e) {
			throw $e;
		}

		return $cuenta_pagar;
	}


	public function  getforma_pago_proveedor(Connexion $connexion,$relpago_cuenta_pagar) : ?forma_pago_proveedor{

		$forma_pago_proveedor= new forma_pago_proveedor();

		try {
			$forma_pago_proveedorDataAccess=new forma_pago_proveedor_data();
			$forma_pago_proveedorDataAccess->isForFKData=$this->isForFKDataRels;
			$forma_pago_proveedor=$forma_pago_proveedorDataAccess->getEntity($connexion,$relpago_cuenta_pagar->getid_forma_pago_proveedor());

		} catch(Exception $e) {
			throw $e;
		}

		return $forma_pago_proveedor;
	}


	public function  getestado(Connexion $connexion,$relpago_cuenta_pagar) : ?estado{

		$estado= new estado();

		try {
			$estadoDataAccess=new estado_data();
			$estadoDataAccess->isForFKData=$this->isForFKDataRels;
			$estado=$estadoDataAccess->getEntity($connexion,$relpago_cuenta_pagar->getid_estado());

		} catch(Exception $e) {
			throw $e;
		}

		return $estado;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,pago_cuenta_pagar $entity,$resultSet) : pago_cuenta_pagar {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_empresa((int)$resultSet[$strPrefijo.'id_empresa']);
				$entity->setid_sucursal((int)$resultSet[$strPrefijo.'id_sucursal']);
				$entity->setid_ejercicio((int)$resultSet[$strPrefijo.'id_ejercicio']);
				$entity->setid_periodo((int)$resultSet[$strPrefijo.'id_periodo']);
				$entity->setid_usuario((int)$resultSet[$strPrefijo.'id_usuario']);
				$entity->setid_cuenta_pagar((int)$resultSet[$strPrefijo.'id_cuenta_pagar']);
				$entity->setid_forma_pago_proveedor((int)$resultSet[$strPrefijo.'id_forma_pago_proveedor']);
				$entity->setnumero(utf8_encode($resultSet[$strPrefijo.'numero']));
				$entity->setfecha_emision($resultSet[$strPrefijo.'fecha_emision']);
				$entity->setfecha_vence($resultSet[$strPrefijo.'fecha_vence']);
				$entity->setabono((float)$resultSet[$strPrefijo.'abono']);
				$entity->setsaldo((float)$resultSet[$strPrefijo.'saldo']);
				$entity->setdescripcion(utf8_encode($resultSet[$strPrefijo.'descripcion']));
				$entity->setid_estado((int)$resultSet[$strPrefijo.'id_estado']);
				$entity->setreferencia(utf8_encode($resultSet[$strPrefijo.'referencia']));
				$entity->setdebito((float)$resultSet[$strPrefijo.'debito']);
				$entity->setcredito((float)$resultSet[$strPrefijo.'credito']);
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,pago_cuenta_pagar $pago_cuenta_pagar,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $pago_cuenta_pagar->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiiiisssddsisdd', $pago_cuenta_pagar->getid_empresa(),$pago_cuenta_pagar->getid_sucursal(),$pago_cuenta_pagar->getid_ejercicio(),$pago_cuenta_pagar->getid_periodo(),$pago_cuenta_pagar->getid_usuario(),$pago_cuenta_pagar->getid_cuenta_pagar(),$pago_cuenta_pagar->getid_forma_pago_proveedor(),$pago_cuenta_pagar->getnumero(),$pago_cuenta_pagar->getfecha_emision(),$pago_cuenta_pagar->getfecha_vence(),$pago_cuenta_pagar->getabono(),$pago_cuenta_pagar->getsaldo(),$pago_cuenta_pagar->getdescripcion(),$pago_cuenta_pagar->getid_estado(),$pago_cuenta_pagar->getreferencia(),$pago_cuenta_pagar->getdebito(),$pago_cuenta_pagar->getcredito());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiiiisssddsisddis', $pago_cuenta_pagar->getid_empresa(),$pago_cuenta_pagar->getid_sucursal(),$pago_cuenta_pagar->getid_ejercicio(),$pago_cuenta_pagar->getid_periodo(),$pago_cuenta_pagar->getid_usuario(),$pago_cuenta_pagar->getid_cuenta_pagar(),$pago_cuenta_pagar->getid_forma_pago_proveedor(),$pago_cuenta_pagar->getnumero(),$pago_cuenta_pagar->getfecha_emision(),$pago_cuenta_pagar->getfecha_vence(),$pago_cuenta_pagar->getabono(),$pago_cuenta_pagar->getsaldo(),$pago_cuenta_pagar->getdescripcion(),$pago_cuenta_pagar->getid_estado(),$pago_cuenta_pagar->getreferencia(),$pago_cuenta_pagar->getdebito(),$pago_cuenta_pagar->getcredito(), $pago_cuenta_pagar->getId(), Funciones::GetRealScapeString($pago_cuenta_pagar->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,pago_cuenta_pagar $pago_cuenta_pagar,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($pago_cuenta_pagar->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($pago_cuenta_pagar->getid_empresa(),$pago_cuenta_pagar->getid_sucursal(),$pago_cuenta_pagar->getid_ejercicio(),$pago_cuenta_pagar->getid_periodo(),$pago_cuenta_pagar->getid_usuario(),$pago_cuenta_pagar->getid_cuenta_pagar(),$pago_cuenta_pagar->getid_forma_pago_proveedor(),Funciones::GetRealScapeString($pago_cuenta_pagar->getnumero(),$connexion),Funciones::GetRealScapeString($pago_cuenta_pagar->getfecha_emision(),$connexion),Funciones::GetRealScapeString($pago_cuenta_pagar->getfecha_vence(),$connexion),$pago_cuenta_pagar->getabono(),$pago_cuenta_pagar->getsaldo(),Funciones::GetRealScapeString($pago_cuenta_pagar->getdescripcion(),$connexion),$pago_cuenta_pagar->getid_estado(),Funciones::GetRealScapeString($pago_cuenta_pagar->getreferencia(),$connexion),$pago_cuenta_pagar->getdebito(),$pago_cuenta_pagar->getcredito());
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($pago_cuenta_pagar->getid_empresa(),$pago_cuenta_pagar->getid_sucursal(),$pago_cuenta_pagar->getid_ejercicio(),$pago_cuenta_pagar->getid_periodo(),$pago_cuenta_pagar->getid_usuario(),$pago_cuenta_pagar->getid_cuenta_pagar(),$pago_cuenta_pagar->getid_forma_pago_proveedor(),Funciones::GetRealScapeString($pago_cuenta_pagar->getnumero(),$connexion),Funciones::GetRealScapeString($pago_cuenta_pagar->getfecha_emision(),$connexion),Funciones::GetRealScapeString($pago_cuenta_pagar->getfecha_vence(),$connexion),$pago_cuenta_pagar->getabono(),$pago_cuenta_pagar->getsaldo(),Funciones::GetRealScapeString($pago_cuenta_pagar->getdescripcion(),$connexion),$pago_cuenta_pagar->getid_estado(),Funciones::GetRealScapeString($pago_cuenta_pagar->getreferencia(),$connexion),$pago_cuenta_pagar->getdebito(),$pago_cuenta_pagar->getcredito(), $pago_cuenta_pagar->getId(), Funciones::GetRealScapeString($pago_cuenta_pagar->getVersionRow(),$connexion));
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
	
	public function setpago_cuenta_pagar_Original(pago_cuenta_pagar $pago_cuenta_pagar) {
		$pago_cuenta_pagar->setpago_cuenta_pagar_Original(clone $pago_cuenta_pagar);		
	}
	
	public function setpago_cuenta_pagars_Original(array $pago_cuenta_pagars) {
		foreach($pago_cuenta_pagars as $pago_cuenta_pagar){
			$pago_cuenta_pagar->setpago_cuenta_pagar_Original(clone $pago_cuenta_pagar);
		}
	}
	
	public static function setpago_cuenta_pagar_OriginalStatic(pago_cuenta_pagar $pago_cuenta_pagar) {
		$pago_cuenta_pagar->setpago_cuenta_pagar_Original(clone $pago_cuenta_pagar);		
	}
	
	public static function setpago_cuenta_pagars_OriginalStatic(array $pago_cuenta_pagars) {		
		foreach($pago_cuenta_pagars as $pago_cuenta_pagar){
			$pago_cuenta_pagar->setpago_cuenta_pagar_Original(clone $pago_cuenta_pagar);
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
