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
namespace com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\data;

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

use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\entity\cuenta_pagar;

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

use com\bydan\contabilidad\inventario\orden_compra\business\data\orden_compra_data;
use com\bydan\contabilidad\inventario\orden_compra\business\entity\orden_compra;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\data\proveedor_data;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\data\termino_pago_proveedor_data;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity\termino_pago_proveedor;

use com\bydan\contabilidad\cuentaspagar\estado_cuentas_pagar\business\data\estado_cuentas_pagar_data;
use com\bydan\contabilidad\cuentaspagar\estado_cuentas_pagar\business\entity\estado_cuentas_pagar;

//REL

use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\business\data\debito_cuenta_pagar_data;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\business\data\credito_cuenta_pagar_data;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\business\data\pago_cuenta_pagar_data;


class cuenta_pagar_data extends GetEntitiesDataAccessHelper implements cuenta_pagar_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='cp_';
	public static string $TABLE_NAME='cp_cuenta_pagar';			
	public static string $TABLE_NAME_cuenta_pagar='cuenta_pagar';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_CUENTA_PAGAR_INSERT(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_CUENTA_PAGAR_UPDATE(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_CUENTA_PAGAR_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_CUENTA_PAGAR_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $cuenta_pagar_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'cuenta_pagar';
		
		cuenta_pagar_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('CUENTASPAGAR');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cuenta_pagar_DataAccessAdditional=new cuenta_pagarDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_empresa,id_sucursal,id_ejercicio,id_periodo,id_usuario,id_orden_compra,id_proveedor,id_termino_pago_proveedor,numero,fecha_emision,fecha_vence,fecha_ultimo_movimiento,monto,saldo,porcentaje,descripcion,id_estado_cuentas_pagar,referencia) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%d,%d,%d,%d,%s,%d,%d,\'%s\',\'%s\',\'%s\',\'%s\',%f,%f,%f,\'%s\',%d,\'%s\')';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_empresa=%d,id_sucursal=%d,id_ejercicio=%d,id_periodo=%d,id_usuario=%d,id_orden_compra=%s,id_proveedor=%d,id_termino_pago_proveedor=%d,numero=\'%s\',fecha_emision=\'%s\',fecha_vence=\'%s\',fecha_ultimo_movimiento=\'%s\',monto=%f,saldo=%f,porcentaje=%f,descripcion=\'%s\',id_estado_cuentas_pagar=%d,referencia=\'%s\' where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_sucursal,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_ejercicio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_periodo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_usuario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_orden_compra,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_termino_pago_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_emision,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_vence,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_ultimo_movimiento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.saldo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.porcentaje,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_estado_cuentas_pagar,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.referencia from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(cuenta_pagar $cuenta_pagar,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($cuenta_pagar->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=cuenta_pagar_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($cuenta_pagar->getId(),$connexion));				
				
			} else if ($cuenta_pagar->getIsChanged()) {
				if($cuenta_pagar->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=cuenta_pagar_data::$QUERY_INSERT;
					
					
					
					

					//$id_orden_compra='null';
					//if($cuenta_pagar->getid_orden_compra()!==null && $cuenta_pagar->getid_orden_compra()>=0) {
						//$id_orden_compra=$cuenta_pagar->getid_orden_compra();
					//} else {
						//$id_orden_compra='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$cuenta_pagar->getid_empresa(),$cuenta_pagar->getid_sucursal(),$cuenta_pagar->getid_ejercicio(),$cuenta_pagar->getid_periodo(),$cuenta_pagar->getid_usuario(),Funciones::GetNullString($cuenta_pagar->getid_orden_compra()),$cuenta_pagar->getid_proveedor(),$cuenta_pagar->getid_termino_pago_proveedor(),Funciones::GetRealScapeString($cuenta_pagar->getnumero(),$connexion),Funciones::GetRealScapeString($cuenta_pagar->getfecha_emision(),$connexion),Funciones::GetRealScapeString($cuenta_pagar->getfecha_vence(),$connexion),Funciones::GetRealScapeString($cuenta_pagar->getfecha_ultimo_movimiento(),$connexion),$cuenta_pagar->getmonto(),$cuenta_pagar->getsaldo(),$cuenta_pagar->getporcentaje(),Funciones::GetRealScapeString($cuenta_pagar->getdescripcion(),$connexion),$cuenta_pagar->getid_estado_cuentas_pagar(),Funciones::GetRealScapeString($cuenta_pagar->getreferencia(),$connexion) );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=cuenta_pagar_data::$QUERY_UPDATE;			
					
					
					
					

					//$id_orden_compra='null';
					//if($cuenta_pagar->getid_orden_compra()!==null && $cuenta_pagar->getid_orden_compra()>=0) {
						//$id_orden_compra=$cuenta_pagar->getid_orden_compra();
					//} else {
						//$id_orden_compra='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$cuenta_pagar->getid_empresa(),$cuenta_pagar->getid_sucursal(),$cuenta_pagar->getid_ejercicio(),$cuenta_pagar->getid_periodo(),$cuenta_pagar->getid_usuario(),Funciones::GetNullString($cuenta_pagar->getid_orden_compra()),$cuenta_pagar->getid_proveedor(),$cuenta_pagar->getid_termino_pago_proveedor(),Funciones::GetRealScapeString($cuenta_pagar->getnumero(),$connexion),Funciones::GetRealScapeString($cuenta_pagar->getfecha_emision(),$connexion),Funciones::GetRealScapeString($cuenta_pagar->getfecha_vence(),$connexion),Funciones::GetRealScapeString($cuenta_pagar->getfecha_ultimo_movimiento(),$connexion),$cuenta_pagar->getmonto(),$cuenta_pagar->getsaldo(),$cuenta_pagar->getporcentaje(),Funciones::GetRealScapeString($cuenta_pagar->getdescripcion(),$connexion),$cuenta_pagar->getid_estado_cuentas_pagar(),Funciones::GetRealScapeString($cuenta_pagar->getreferencia(),$connexion), Funciones::GetRealScapeString($cuenta_pagar->getId(),$connexion), Funciones::GetRealScapeString($cuenta_pagar->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($cuenta_pagar, $connexion,$strQuerySaveComplete,cuenta_pagar_data::$TABLE_NAME,cuenta_pagar_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				cuenta_pagar_data::savePrepared($cuenta_pagar, $connexion,$strQuerySave,cuenta_pagar_data::$TABLE_NAME,cuenta_pagar_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			cuenta_pagar_data::setcuenta_pagar_OriginalStatic($cuenta_pagar);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(cuenta_pagar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				cuenta_pagar_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					cuenta_pagar_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					cuenta_pagar_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(cuenta_pagar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					cuenta_pagar_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(cuenta_pagar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					cuenta_pagar_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(cuenta_pagar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					cuenta_pagar_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?cuenta_pagar {		
		$entity = new cuenta_pagar();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=cuenta_pagar_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=cuenta_pagar_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//CuentasPagar.cuenta_pagar.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setcuenta_pagar_Original(new cuenta_pagar());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cuenta_pagar_data::$IS_WITH_SCHEMA);         	    
				/*$entity=cuenta_pagar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setcuenta_pagar_Original(parent::getEntityPrefijoEntityResult("",$entity->getcuenta_pagar_Original(),$resultSet,cuenta_pagar_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setcuenta_pagar_Original(cuenta_pagar_data::getEntityBaseResult("",$entity->getcuenta_pagar_Original(),$resultSet));
				//$entity->setcuenta_pagar_Original($this->getEntityBaseResult("",$entity->getcuenta_pagar_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?cuenta_pagar {
		$entity = new cuenta_pagar();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=cuenta_pagar_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=cuenta_pagar_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,cuenta_pagar_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".CuentasPagar.cuenta_pagar.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setcuenta_pagar_Original(new cuenta_pagar());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cuenta_pagar_data::$IS_WITH_SCHEMA);         	    
				/*$entity=cuenta_pagar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setcuenta_pagar_Original(parent::getEntityPrefijoEntityResult("",$entity->getcuenta_pagar_Original(),$resultSet,cuenta_pagar_data::$IS_WITH_SCHEMA));         		
				////$entity->setcuenta_pagar_Original(cuenta_pagar_data::getEntityBaseResult("",$entity->getcuenta_pagar_Original(),$resultSet));
				//$entity->setcuenta_pagar_Original($this->getEntityBaseResult("",$entity->getcuenta_pagar_Original(),$resultSet));
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
		$entity = new cuenta_pagar();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=cuenta_pagar_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=cuenta_pagar_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,cuenta_pagar_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new cuenta_pagar();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cuenta_pagar_data::$IS_WITH_SCHEMA);         		
				/*$entity=cuenta_pagar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setcuenta_pagar_Original( new cuenta_pagar());
				
				//$entity->setcuenta_pagar_Original(parent::getEntityPrefijoEntityResult("",$entity->getcuenta_pagar_Original(),$resultSet,cuenta_pagar_data::$IS_WITH_SCHEMA));         		
				////$entity->setcuenta_pagar_Original(cuenta_pagar_data::getEntityBaseResult("",$entity->getcuenta_pagar_Original(),$resultSet));
				//$entity->setcuenta_pagar_Original($this->getEntityBaseResult("",$entity->getcuenta_pagar_Original(),$resultSet));
								
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
		$entity = new cuenta_pagar();		  
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
      	    	$entity = new cuenta_pagar();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cuenta_pagar_data::$IS_WITH_SCHEMA);         		
				/*$entity=cuenta_pagar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setcuenta_pagar_Original( new cuenta_pagar());
				
				//$entity->setcuenta_pagar_Original(parent::getEntityPrefijoEntityResult("",$entity->getcuenta_pagar_Original(),$resultSet,cuenta_pagar_data::$IS_WITH_SCHEMA));         		
				////$entity->setcuenta_pagar_Original(cuenta_pagar_data::getEntityBaseResult("",$entity->getcuenta_pagar_Original(),$resultSet));
				//$entity->setcuenta_pagar_Original($this->getEntityBaseResult("",$entity->getcuenta_pagar_Original(),$resultSet));
				
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
		$entity = new cuenta_pagar();		  
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
      	    	$entity = new cuenta_pagar();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cuenta_pagar_data::$IS_WITH_SCHEMA);         		
				/*$entity=cuenta_pagar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setcuenta_pagar_Original( new cuenta_pagar());				
				//$entity->setcuenta_pagar_Original(parent::getEntityPrefijoEntityResult("",$entity->getcuenta_pagar_Original(),$resultSet,cuenta_pagar_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setcuenta_pagar_Original(cuenta_pagar_data::getEntityBaseResult("",$entity->getcuenta_pagar_Original(),$resultSet));
				//$entity->setcuenta_pagar_Original($this->getEntityBaseResult("",$entity->getcuenta_pagar_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=cuenta_pagar_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,cuenta_pagar $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,cuenta_pagar_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,cuenta_pagar_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getempresa(Connexion $connexion,$relcuenta_pagar) : ?empresa{

		$empresa= new empresa();

		try {
			$empresaDataAccess=new empresa_data();
			$empresaDataAccess->isForFKData=$this->isForFKDataRels;
			$empresa=$empresaDataAccess->getEntity($connexion,$relcuenta_pagar->getid_empresa());

		} catch(Exception $e) {
			throw $e;
		}

		return $empresa;
	}


	public function  getsucursal(Connexion $connexion,$relcuenta_pagar) : ?sucursal{

		$sucursal= new sucursal();

		try {
			$sucursalDataAccess=new sucursal_data();
			$sucursalDataAccess->isForFKData=$this->isForFKDataRels;
			$sucursal=$sucursalDataAccess->getEntity($connexion,$relcuenta_pagar->getid_sucursal());

		} catch(Exception $e) {
			throw $e;
		}

		return $sucursal;
	}


	public function  getejercicio(Connexion $connexion,$relcuenta_pagar) : ?ejercicio{

		$ejercicio= new ejercicio();

		try {
			$ejercicioDataAccess=new ejercicio_data();
			$ejercicioDataAccess->isForFKData=$this->isForFKDataRels;
			$ejercicio=$ejercicioDataAccess->getEntity($connexion,$relcuenta_pagar->getid_ejercicio());

		} catch(Exception $e) {
			throw $e;
		}

		return $ejercicio;
	}


	public function  getperiodo(Connexion $connexion,$relcuenta_pagar) : ?periodo{

		$periodo= new periodo();

		try {
			$periodoDataAccess=new periodo_data();
			$periodoDataAccess->isForFKData=$this->isForFKDataRels;
			$periodo=$periodoDataAccess->getEntity($connexion,$relcuenta_pagar->getid_periodo());

		} catch(Exception $e) {
			throw $e;
		}

		return $periodo;
	}


	public function  getusuario(Connexion $connexion,$relcuenta_pagar) : ?usuario{

		$usuario= new usuario();

		try {
			$usuarioDataAccess=new usuario_data();
			$usuarioDataAccess->isForFKData=$this->isForFKDataRels;
			$usuario=$usuarioDataAccess->getEntity($connexion,$relcuenta_pagar->getid_usuario());

		} catch(Exception $e) {
			throw $e;
		}

		return $usuario;
	}


	public function  getorden_compra(Connexion $connexion,$relcuenta_pagar) : ?orden_compra{

		$orden_compra= new orden_compra();

		try {
			$orden_compraDataAccess=new orden_compra_data();
			$orden_compraDataAccess->isForFKData=$this->isForFKDataRels;
			$orden_compra=$orden_compraDataAccess->getEntity($connexion,$relcuenta_pagar->getid_orden_compra());

		} catch(Exception $e) {
			throw $e;
		}

		return $orden_compra;
	}


	public function  getproveedor(Connexion $connexion,$relcuenta_pagar) : ?proveedor{

		$proveedor= new proveedor();

		try {
			$proveedorDataAccess=new proveedor_data();
			$proveedorDataAccess->isForFKData=$this->isForFKDataRels;
			$proveedor=$proveedorDataAccess->getEntity($connexion,$relcuenta_pagar->getid_proveedor());

		} catch(Exception $e) {
			throw $e;
		}

		return $proveedor;
	}


	public function  gettermino_pago_proveedor(Connexion $connexion,$relcuenta_pagar) : ?termino_pago_proveedor{

		$termino_pago_proveedor= new termino_pago_proveedor();

		try {
			$termino_pago_proveedorDataAccess=new termino_pago_proveedor_data();
			$termino_pago_proveedorDataAccess->isForFKData=$this->isForFKDataRels;
			$termino_pago_proveedor=$termino_pago_proveedorDataAccess->getEntity($connexion,$relcuenta_pagar->getid_termino_pago_proveedor());

		} catch(Exception $e) {
			throw $e;
		}

		return $termino_pago_proveedor;
	}


	public function  getestado_cuentas_pagar(Connexion $connexion,$relcuenta_pagar) : ?estado_cuentas_pagar{

		$estado_cuentas_pagar= new estado_cuentas_pagar();

		try {
			$estado_cuentas_pagarDataAccess=new estado_cuentas_pagar_data();
			$estado_cuentas_pagarDataAccess->isForFKData=$this->isForFKDataRels;
			$estado_cuentas_pagar=$estado_cuentas_pagarDataAccess->getEntity($connexion,$relcuenta_pagar->getid_estado_cuentas_pagar());

		} catch(Exception $e) {
			throw $e;
		}

		return $estado_cuentas_pagar;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	public function  getdebito_cuenta_pagars(Connexion $connexion,cuenta_pagar $cuenta_pagar) : array {

		$debitocuentapagars=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.debito_cuenta_pagar_data::$SCHEMA.".".debito_cuenta_pagar_data::$TABLE_NAME.".id_cuenta_pagar=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$cuenta_pagar->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$debitocuentapagarDataAccess=new debito_cuenta_pagar_data();

			$debitocuentapagars=$debitocuentapagarDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $debitocuentapagars;
	}


	public function  getcredito_cuenta_pagars(Connexion $connexion,cuenta_pagar $cuenta_pagar) : array {

		$creditocuentapagars=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.credito_cuenta_pagar_data::$SCHEMA.".".credito_cuenta_pagar_data::$TABLE_NAME.".id_cuenta_pagar=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$cuenta_pagar->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$creditocuentapagarDataAccess=new credito_cuenta_pagar_data();

			$creditocuentapagars=$creditocuentapagarDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $creditocuentapagars;
	}


	public function  getpago_cuenta_pagars(Connexion $connexion,cuenta_pagar $cuenta_pagar) : array {

		$pagocuentapagars=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.pago_cuenta_pagar_data::$SCHEMA.".".pago_cuenta_pagar_data::$TABLE_NAME.".id_cuenta_pagar=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$cuenta_pagar->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$pagocuentapagarDataAccess=new pago_cuenta_pagar_data();

			$pagocuentapagars=$pagocuentapagarDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $pagocuentapagars;
	}


	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,cuenta_pagar $entity,$resultSet) : cuenta_pagar {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_empresa((int)$resultSet[$strPrefijo.'id_empresa']);
				$entity->setid_sucursal((int)$resultSet[$strPrefijo.'id_sucursal']);
				$entity->setid_ejercicio((int)$resultSet[$strPrefijo.'id_ejercicio']);
				$entity->setid_periodo((int)$resultSet[$strPrefijo.'id_periodo']);
				$entity->setid_usuario((int)$resultSet[$strPrefijo.'id_usuario']);
				$entity->setid_orden_compra((int)$resultSet[$strPrefijo.'id_orden_compra']);
				$entity->setid_proveedor((int)$resultSet[$strPrefijo.'id_proveedor']);
				$entity->setid_termino_pago_proveedor((int)$resultSet[$strPrefijo.'id_termino_pago_proveedor']);
				$entity->setnumero(utf8_encode($resultSet[$strPrefijo.'numero']));
				$entity->setfecha_emision($resultSet[$strPrefijo.'fecha_emision']);
				$entity->setfecha_vence($resultSet[$strPrefijo.'fecha_vence']);
				$entity->setfecha_ultimo_movimiento($resultSet[$strPrefijo.'fecha_ultimo_movimiento']);
				$entity->setmonto((float)$resultSet[$strPrefijo.'monto']);
				$entity->setsaldo((float)$resultSet[$strPrefijo.'saldo']);
				$entity->setporcentaje((float)$resultSet[$strPrefijo.'porcentaje']);
				$entity->setdescripcion(utf8_encode($resultSet[$strPrefijo.'descripcion']));
				$entity->setid_estado_cuentas_pagar((int)$resultSet[$strPrefijo.'id_estado_cuentas_pagar']);
				$entity->setreferencia(utf8_encode($resultSet[$strPrefijo.'referencia']));
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,cuenta_pagar $cuenta_pagar,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $cuenta_pagar->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiiiiissssdddsis', $cuenta_pagar->getid_empresa(),$cuenta_pagar->getid_sucursal(),$cuenta_pagar->getid_ejercicio(),$cuenta_pagar->getid_periodo(),$cuenta_pagar->getid_usuario(),$cuenta_pagar->getid_orden_compra(),$cuenta_pagar->getid_proveedor(),$cuenta_pagar->getid_termino_pago_proveedor(),$cuenta_pagar->getnumero(),$cuenta_pagar->getfecha_emision(),$cuenta_pagar->getfecha_vence(),$cuenta_pagar->getfecha_ultimo_movimiento(),$cuenta_pagar->getmonto(),$cuenta_pagar->getsaldo(),$cuenta_pagar->getporcentaje(),$cuenta_pagar->getdescripcion(),$cuenta_pagar->getid_estado_cuentas_pagar(),$cuenta_pagar->getreferencia());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiiiiissssdddsisis', $cuenta_pagar->getid_empresa(),$cuenta_pagar->getid_sucursal(),$cuenta_pagar->getid_ejercicio(),$cuenta_pagar->getid_periodo(),$cuenta_pagar->getid_usuario(),$cuenta_pagar->getid_orden_compra(),$cuenta_pagar->getid_proveedor(),$cuenta_pagar->getid_termino_pago_proveedor(),$cuenta_pagar->getnumero(),$cuenta_pagar->getfecha_emision(),$cuenta_pagar->getfecha_vence(),$cuenta_pagar->getfecha_ultimo_movimiento(),$cuenta_pagar->getmonto(),$cuenta_pagar->getsaldo(),$cuenta_pagar->getporcentaje(),$cuenta_pagar->getdescripcion(),$cuenta_pagar->getid_estado_cuentas_pagar(),$cuenta_pagar->getreferencia(), $cuenta_pagar->getId(), Funciones::GetRealScapeString($cuenta_pagar->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,cuenta_pagar $cuenta_pagar,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($cuenta_pagar->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($cuenta_pagar->getid_empresa(),$cuenta_pagar->getid_sucursal(),$cuenta_pagar->getid_ejercicio(),$cuenta_pagar->getid_periodo(),$cuenta_pagar->getid_usuario(),Funciones::GetNullString($cuenta_pagar->getid_orden_compra()),$cuenta_pagar->getid_proveedor(),$cuenta_pagar->getid_termino_pago_proveedor(),Funciones::GetRealScapeString($cuenta_pagar->getnumero(),$connexion),Funciones::GetRealScapeString($cuenta_pagar->getfecha_emision(),$connexion),Funciones::GetRealScapeString($cuenta_pagar->getfecha_vence(),$connexion),Funciones::GetRealScapeString($cuenta_pagar->getfecha_ultimo_movimiento(),$connexion),$cuenta_pagar->getmonto(),$cuenta_pagar->getsaldo(),$cuenta_pagar->getporcentaje(),Funciones::GetRealScapeString($cuenta_pagar->getdescripcion(),$connexion),$cuenta_pagar->getid_estado_cuentas_pagar(),Funciones::GetRealScapeString($cuenta_pagar->getreferencia(),$connexion));
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($cuenta_pagar->getid_empresa(),$cuenta_pagar->getid_sucursal(),$cuenta_pagar->getid_ejercicio(),$cuenta_pagar->getid_periodo(),$cuenta_pagar->getid_usuario(),Funciones::GetNullString($cuenta_pagar->getid_orden_compra()),$cuenta_pagar->getid_proveedor(),$cuenta_pagar->getid_termino_pago_proveedor(),Funciones::GetRealScapeString($cuenta_pagar->getnumero(),$connexion),Funciones::GetRealScapeString($cuenta_pagar->getfecha_emision(),$connexion),Funciones::GetRealScapeString($cuenta_pagar->getfecha_vence(),$connexion),Funciones::GetRealScapeString($cuenta_pagar->getfecha_ultimo_movimiento(),$connexion),$cuenta_pagar->getmonto(),$cuenta_pagar->getsaldo(),$cuenta_pagar->getporcentaje(),Funciones::GetRealScapeString($cuenta_pagar->getdescripcion(),$connexion),$cuenta_pagar->getid_estado_cuentas_pagar(),Funciones::GetRealScapeString($cuenta_pagar->getreferencia(),$connexion), $cuenta_pagar->getId(), Funciones::GetRealScapeString($cuenta_pagar->getVersionRow(),$connexion));
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
	
	public function setcuenta_pagar_Original(cuenta_pagar $cuenta_pagar) {
		$cuenta_pagar->setcuenta_pagar_Original(clone $cuenta_pagar);		
	}
	
	public function setcuenta_pagars_Original(array $cuenta_pagars) {
		foreach($cuenta_pagars as $cuenta_pagar){
			$cuenta_pagar->setcuenta_pagar_Original(clone $cuenta_pagar);
		}
	}
	
	public static function setcuenta_pagar_OriginalStatic(cuenta_pagar $cuenta_pagar) {
		$cuenta_pagar->setcuenta_pagar_Original(clone $cuenta_pagar);		
	}
	
	public static function setcuenta_pagars_OriginalStatic(array $cuenta_pagars) {		
		foreach($cuenta_pagars as $cuenta_pagar){
			$cuenta_pagar->setcuenta_pagar_Original(clone $cuenta_pagar);
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
