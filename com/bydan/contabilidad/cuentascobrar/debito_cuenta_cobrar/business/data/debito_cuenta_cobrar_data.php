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
namespace com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\business\data;

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

use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\business\entity\debito_cuenta_cobrar;

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

use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\data\cuenta_cobrar_data;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\entity\cuenta_cobrar;

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\data\termino_pago_cliente_data;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;

use com\bydan\contabilidad\general\estado\business\data\estado_data;
use com\bydan\contabilidad\general\estado\business\entity\estado;

//REL



class debito_cuenta_cobrar_data extends GetEntitiesDataAccessHelper implements debito_cuenta_cobrar_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='cc_';
	public static string $TABLE_NAME='cc_debito_cuenta_cobrar';			
	public static string $TABLE_NAME_debito_cuenta_cobrar='debito_cuenta_cobrar';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_DEBITO_CUENTA_COBRAR_INSERT(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_DEBITO_CUENTA_COBRAR_UPDATE(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_DEBITO_CUENTA_COBRAR_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_DEBITO_CUENTA_COBRAR_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $debito_cuenta_cobrar_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'debito_cuenta_cobrar';
		
		debito_cuenta_cobrar_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('CUENTASCOBRAR');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->debito_cuenta_cobrar_DataAccessAdditional=new debito_cuenta_cobrarDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_empresa,id_sucursal,id_ejercicio,id_periodo,id_usuario,id_cuenta_cobrar,numero,fecha_emision,fecha_vence,id_termino_pago_cliente,monto,saldo,descripcion,sub_total,iva,es_balance_inicial,id_estado,referencia,debito,credito) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%d,%d,%d,%d,%d,\'%s\',\'%s\',\'%s\',%d,%f,%f,\'%s\',%f,%f,\'%d\',%d,\'%s\',%f,%f)';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_empresa=%d,id_sucursal=%d,id_ejercicio=%d,id_periodo=%d,id_usuario=%d,id_cuenta_cobrar=%d,numero=\'%s\',fecha_emision=\'%s\',fecha_vence=\'%s\',id_termino_pago_cliente=%d,monto=%f,saldo=%f,descripcion=\'%s\',sub_total=%f,iva=%f,es_balance_inicial=\'%d\',id_estado=%d,referencia=\'%s\',debito=%f,credito=%f where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_sucursal,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_ejercicio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_periodo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_usuario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta_cobrar,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_emision,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_vence,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_termino_pago_cliente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.saldo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.sub_total,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.iva,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.es_balance_inicial,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_estado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.referencia,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.debito,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.credito from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(debito_cuenta_cobrar $debito_cuenta_cobrar,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($debito_cuenta_cobrar->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=debito_cuenta_cobrar_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($debito_cuenta_cobrar->getId(),$connexion));				
				
			} else if ($debito_cuenta_cobrar->getIsChanged()) {
				if($debito_cuenta_cobrar->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=debito_cuenta_cobrar_data::$QUERY_INSERT;
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$debito_cuenta_cobrar->getid_empresa(),$debito_cuenta_cobrar->getid_sucursal(),$debito_cuenta_cobrar->getid_ejercicio(),$debito_cuenta_cobrar->getid_periodo(),$debito_cuenta_cobrar->getid_usuario(),$debito_cuenta_cobrar->getid_cuenta_cobrar(),Funciones::GetRealScapeString($debito_cuenta_cobrar->getnumero(),$connexion),Funciones::GetRealScapeString($debito_cuenta_cobrar->getfecha_emision(),$connexion),Funciones::GetRealScapeString($debito_cuenta_cobrar->getfecha_vence(),$connexion),$debito_cuenta_cobrar->getid_termino_pago_cliente(),$debito_cuenta_cobrar->getmonto(),$debito_cuenta_cobrar->getsaldo(),Funciones::GetRealScapeString($debito_cuenta_cobrar->getdescripcion(),$connexion),$debito_cuenta_cobrar->getsub_total(),$debito_cuenta_cobrar->getiva(),$debito_cuenta_cobrar->getes_balance_inicial(),$debito_cuenta_cobrar->getid_estado(),Funciones::GetRealScapeString($debito_cuenta_cobrar->getreferencia(),$connexion),$debito_cuenta_cobrar->getdebito(),$debito_cuenta_cobrar->getcredito() );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=debito_cuenta_cobrar_data::$QUERY_UPDATE;			
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$debito_cuenta_cobrar->getid_empresa(),$debito_cuenta_cobrar->getid_sucursal(),$debito_cuenta_cobrar->getid_ejercicio(),$debito_cuenta_cobrar->getid_periodo(),$debito_cuenta_cobrar->getid_usuario(),$debito_cuenta_cobrar->getid_cuenta_cobrar(),Funciones::GetRealScapeString($debito_cuenta_cobrar->getnumero(),$connexion),Funciones::GetRealScapeString($debito_cuenta_cobrar->getfecha_emision(),$connexion),Funciones::GetRealScapeString($debito_cuenta_cobrar->getfecha_vence(),$connexion),$debito_cuenta_cobrar->getid_termino_pago_cliente(),$debito_cuenta_cobrar->getmonto(),$debito_cuenta_cobrar->getsaldo(),Funciones::GetRealScapeString($debito_cuenta_cobrar->getdescripcion(),$connexion),$debito_cuenta_cobrar->getsub_total(),$debito_cuenta_cobrar->getiva(),$debito_cuenta_cobrar->getes_balance_inicial(),$debito_cuenta_cobrar->getid_estado(),Funciones::GetRealScapeString($debito_cuenta_cobrar->getreferencia(),$connexion),$debito_cuenta_cobrar->getdebito(),$debito_cuenta_cobrar->getcredito(), Funciones::GetRealScapeString($debito_cuenta_cobrar->getId(),$connexion), Funciones::GetRealScapeString($debito_cuenta_cobrar->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($debito_cuenta_cobrar, $connexion,$strQuerySaveComplete,debito_cuenta_cobrar_data::$TABLE_NAME,debito_cuenta_cobrar_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				debito_cuenta_cobrar_data::savePrepared($debito_cuenta_cobrar, $connexion,$strQuerySave,debito_cuenta_cobrar_data::$TABLE_NAME,debito_cuenta_cobrar_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			debito_cuenta_cobrar_data::setdebito_cuenta_cobrar_OriginalStatic($debito_cuenta_cobrar);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(debito_cuenta_cobrar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				debito_cuenta_cobrar_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					debito_cuenta_cobrar_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					debito_cuenta_cobrar_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(debito_cuenta_cobrar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					debito_cuenta_cobrar_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(debito_cuenta_cobrar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					debito_cuenta_cobrar_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(debito_cuenta_cobrar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					debito_cuenta_cobrar_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?debito_cuenta_cobrar {		
		$entity = new debito_cuenta_cobrar();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=debito_cuenta_cobrar_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=debito_cuenta_cobrar_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//CuentasCobrar.debito_cuenta_cobrar.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setdebito_cuenta_cobrar_Original(new debito_cuenta_cobrar());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,debito_cuenta_cobrar_data::$IS_WITH_SCHEMA);         	    
				/*$entity=debito_cuenta_cobrar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setdebito_cuenta_cobrar_Original(parent::getEntityPrefijoEntityResult("",$entity->getdebito_cuenta_cobrar_Original(),$resultSet,debito_cuenta_cobrar_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setdebito_cuenta_cobrar_Original(debito_cuenta_cobrar_data::getEntityBaseResult("",$entity->getdebito_cuenta_cobrar_Original(),$resultSet));
				//$entity->setdebito_cuenta_cobrar_Original($this->getEntityBaseResult("",$entity->getdebito_cuenta_cobrar_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?debito_cuenta_cobrar {
		$entity = new debito_cuenta_cobrar();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=debito_cuenta_cobrar_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=debito_cuenta_cobrar_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,debito_cuenta_cobrar_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".CuentasCobrar.debito_cuenta_cobrar.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setdebito_cuenta_cobrar_Original(new debito_cuenta_cobrar());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,debito_cuenta_cobrar_data::$IS_WITH_SCHEMA);         	    
				/*$entity=debito_cuenta_cobrar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setdebito_cuenta_cobrar_Original(parent::getEntityPrefijoEntityResult("",$entity->getdebito_cuenta_cobrar_Original(),$resultSet,debito_cuenta_cobrar_data::$IS_WITH_SCHEMA));         		
				////$entity->setdebito_cuenta_cobrar_Original(debito_cuenta_cobrar_data::getEntityBaseResult("",$entity->getdebito_cuenta_cobrar_Original(),$resultSet));
				//$entity->setdebito_cuenta_cobrar_Original($this->getEntityBaseResult("",$entity->getdebito_cuenta_cobrar_Original(),$resultSet));
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
		$entity = new debito_cuenta_cobrar();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=debito_cuenta_cobrar_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=debito_cuenta_cobrar_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,debito_cuenta_cobrar_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new debito_cuenta_cobrar();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,debito_cuenta_cobrar_data::$IS_WITH_SCHEMA);         		
				/*$entity=debito_cuenta_cobrar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setdebito_cuenta_cobrar_Original( new debito_cuenta_cobrar());
				
				//$entity->setdebito_cuenta_cobrar_Original(parent::getEntityPrefijoEntityResult("",$entity->getdebito_cuenta_cobrar_Original(),$resultSet,debito_cuenta_cobrar_data::$IS_WITH_SCHEMA));         		
				////$entity->setdebito_cuenta_cobrar_Original(debito_cuenta_cobrar_data::getEntityBaseResult("",$entity->getdebito_cuenta_cobrar_Original(),$resultSet));
				//$entity->setdebito_cuenta_cobrar_Original($this->getEntityBaseResult("",$entity->getdebito_cuenta_cobrar_Original(),$resultSet));
								
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
		$entity = new debito_cuenta_cobrar();		  
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
      	    	$entity = new debito_cuenta_cobrar();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,debito_cuenta_cobrar_data::$IS_WITH_SCHEMA);         		
				/*$entity=debito_cuenta_cobrar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setdebito_cuenta_cobrar_Original( new debito_cuenta_cobrar());
				
				//$entity->setdebito_cuenta_cobrar_Original(parent::getEntityPrefijoEntityResult("",$entity->getdebito_cuenta_cobrar_Original(),$resultSet,debito_cuenta_cobrar_data::$IS_WITH_SCHEMA));         		
				////$entity->setdebito_cuenta_cobrar_Original(debito_cuenta_cobrar_data::getEntityBaseResult("",$entity->getdebito_cuenta_cobrar_Original(),$resultSet));
				//$entity->setdebito_cuenta_cobrar_Original($this->getEntityBaseResult("",$entity->getdebito_cuenta_cobrar_Original(),$resultSet));
				
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
		$entity = new debito_cuenta_cobrar();		  
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
      	    	$entity = new debito_cuenta_cobrar();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,debito_cuenta_cobrar_data::$IS_WITH_SCHEMA);         		
				/*$entity=debito_cuenta_cobrar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setdebito_cuenta_cobrar_Original( new debito_cuenta_cobrar());				
				//$entity->setdebito_cuenta_cobrar_Original(parent::getEntityPrefijoEntityResult("",$entity->getdebito_cuenta_cobrar_Original(),$resultSet,debito_cuenta_cobrar_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setdebito_cuenta_cobrar_Original(debito_cuenta_cobrar_data::getEntityBaseResult("",$entity->getdebito_cuenta_cobrar_Original(),$resultSet));
				//$entity->setdebito_cuenta_cobrar_Original($this->getEntityBaseResult("",$entity->getdebito_cuenta_cobrar_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=debito_cuenta_cobrar_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,debito_cuenta_cobrar $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,debito_cuenta_cobrar_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,debito_cuenta_cobrar_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getempresa(Connexion $connexion,$reldebito_cuenta_cobrar) : ?empresa{

		$empresa= new empresa();

		try {
			$empresaDataAccess=new empresa_data();
			$empresaDataAccess->isForFKData=$this->isForFKDataRels;
			$empresa=$empresaDataAccess->getEntity($connexion,$reldebito_cuenta_cobrar->getid_empresa());

		} catch(Exception $e) {
			throw $e;
		}

		return $empresa;
	}


	public function  getsucursal(Connexion $connexion,$reldebito_cuenta_cobrar) : ?sucursal{

		$sucursal= new sucursal();

		try {
			$sucursalDataAccess=new sucursal_data();
			$sucursalDataAccess->isForFKData=$this->isForFKDataRels;
			$sucursal=$sucursalDataAccess->getEntity($connexion,$reldebito_cuenta_cobrar->getid_sucursal());

		} catch(Exception $e) {
			throw $e;
		}

		return $sucursal;
	}


	public function  getejercicio(Connexion $connexion,$reldebito_cuenta_cobrar) : ?ejercicio{

		$ejercicio= new ejercicio();

		try {
			$ejercicioDataAccess=new ejercicio_data();
			$ejercicioDataAccess->isForFKData=$this->isForFKDataRels;
			$ejercicio=$ejercicioDataAccess->getEntity($connexion,$reldebito_cuenta_cobrar->getid_ejercicio());

		} catch(Exception $e) {
			throw $e;
		}

		return $ejercicio;
	}


	public function  getperiodo(Connexion $connexion,$reldebito_cuenta_cobrar) : ?periodo{

		$periodo= new periodo();

		try {
			$periodoDataAccess=new periodo_data();
			$periodoDataAccess->isForFKData=$this->isForFKDataRels;
			$periodo=$periodoDataAccess->getEntity($connexion,$reldebito_cuenta_cobrar->getid_periodo());

		} catch(Exception $e) {
			throw $e;
		}

		return $periodo;
	}


	public function  getusuario(Connexion $connexion,$reldebito_cuenta_cobrar) : ?usuario{

		$usuario= new usuario();

		try {
			$usuarioDataAccess=new usuario_data();
			$usuarioDataAccess->isForFKData=$this->isForFKDataRels;
			$usuario=$usuarioDataAccess->getEntity($connexion,$reldebito_cuenta_cobrar->getid_usuario());

		} catch(Exception $e) {
			throw $e;
		}

		return $usuario;
	}


	public function  getcuenta_cobrar(Connexion $connexion,$reldebito_cuenta_cobrar) : ?cuenta_cobrar{

		$cuenta_cobrar= new cuenta_cobrar();

		try {
			$cuenta_cobrarDataAccess=new cuenta_cobrar_data();
			$cuenta_cobrarDataAccess->isForFKData=$this->isForFKDataRels;
			$cuenta_cobrar=$cuenta_cobrarDataAccess->getEntity($connexion,$reldebito_cuenta_cobrar->getid_cuenta_cobrar());

		} catch(Exception $e) {
			throw $e;
		}

		return $cuenta_cobrar;
	}


	public function  gettermino_pago_cliente(Connexion $connexion,$reldebito_cuenta_cobrar) : ?termino_pago_cliente{

		$termino_pago_cliente= new termino_pago_cliente();

		try {
			$termino_pago_clienteDataAccess=new termino_pago_cliente_data();
			$termino_pago_clienteDataAccess->isForFKData=$this->isForFKDataRels;
			$termino_pago_cliente=$termino_pago_clienteDataAccess->getEntity($connexion,$reldebito_cuenta_cobrar->getid_termino_pago_cliente());

		} catch(Exception $e) {
			throw $e;
		}

		return $termino_pago_cliente;
	}


	public function  getestado(Connexion $connexion,$reldebito_cuenta_cobrar) : ?estado{

		$estado= new estado();

		try {
			$estadoDataAccess=new estado_data();
			$estadoDataAccess->isForFKData=$this->isForFKDataRels;
			$estado=$estadoDataAccess->getEntity($connexion,$reldebito_cuenta_cobrar->getid_estado());

		} catch(Exception $e) {
			throw $e;
		}

		return $estado;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,debito_cuenta_cobrar $entity,$resultSet) : debito_cuenta_cobrar {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_empresa((int)$resultSet[$strPrefijo.'id_empresa']);
				$entity->setid_sucursal((int)$resultSet[$strPrefijo.'id_sucursal']);
				$entity->setid_ejercicio((int)$resultSet[$strPrefijo.'id_ejercicio']);
				$entity->setid_periodo((int)$resultSet[$strPrefijo.'id_periodo']);
				$entity->setid_usuario((int)$resultSet[$strPrefijo.'id_usuario']);
				$entity->setid_cuenta_cobrar((int)$resultSet[$strPrefijo.'id_cuenta_cobrar']);
				$entity->setnumero(utf8_encode($resultSet[$strPrefijo.'numero']));
				$entity->setfecha_emision($resultSet[$strPrefijo.'fecha_emision']);
				$entity->setfecha_vence($resultSet[$strPrefijo.'fecha_vence']);
				$entity->setid_termino_pago_cliente((int)$resultSet[$strPrefijo.'id_termino_pago_cliente']);
				$entity->setmonto((float)$resultSet[$strPrefijo.'monto']);
				$entity->setsaldo((float)$resultSet[$strPrefijo.'saldo']);
				$entity->setdescripcion(utf8_encode($resultSet[$strPrefijo.'descripcion']));
				$entity->setsub_total((float)$resultSet[$strPrefijo.'sub_total']);
				$entity->setiva((float)$resultSet[$strPrefijo.'iva']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setes_balance_inicial($resultSet[$strPrefijo.'es_balance_inicial']=='f'? false:true );
				} else {
					$entity->setes_balance_inicial((bool)$resultSet[$strPrefijo.'es_balance_inicial']);
				}
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
	
	public static function addPrepareStatementParams(string $type,debito_cuenta_cobrar $debito_cuenta_cobrar,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $debito_cuenta_cobrar->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiiisssiddsddiisdd', $debito_cuenta_cobrar->getid_empresa(),$debito_cuenta_cobrar->getid_sucursal(),$debito_cuenta_cobrar->getid_ejercicio(),$debito_cuenta_cobrar->getid_periodo(),$debito_cuenta_cobrar->getid_usuario(),$debito_cuenta_cobrar->getid_cuenta_cobrar(),$debito_cuenta_cobrar->getnumero(),$debito_cuenta_cobrar->getfecha_emision(),$debito_cuenta_cobrar->getfecha_vence(),$debito_cuenta_cobrar->getid_termino_pago_cliente(),$debito_cuenta_cobrar->getmonto(),$debito_cuenta_cobrar->getsaldo(),$debito_cuenta_cobrar->getdescripcion(),$debito_cuenta_cobrar->getsub_total(),$debito_cuenta_cobrar->getiva(),$debito_cuenta_cobrar->getes_balance_inicial(),$debito_cuenta_cobrar->getid_estado(),$debito_cuenta_cobrar->getreferencia(),$debito_cuenta_cobrar->getdebito(),$debito_cuenta_cobrar->getcredito());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiiisssiddsddiisddis', $debito_cuenta_cobrar->getid_empresa(),$debito_cuenta_cobrar->getid_sucursal(),$debito_cuenta_cobrar->getid_ejercicio(),$debito_cuenta_cobrar->getid_periodo(),$debito_cuenta_cobrar->getid_usuario(),$debito_cuenta_cobrar->getid_cuenta_cobrar(),$debito_cuenta_cobrar->getnumero(),$debito_cuenta_cobrar->getfecha_emision(),$debito_cuenta_cobrar->getfecha_vence(),$debito_cuenta_cobrar->getid_termino_pago_cliente(),$debito_cuenta_cobrar->getmonto(),$debito_cuenta_cobrar->getsaldo(),$debito_cuenta_cobrar->getdescripcion(),$debito_cuenta_cobrar->getsub_total(),$debito_cuenta_cobrar->getiva(),$debito_cuenta_cobrar->getes_balance_inicial(),$debito_cuenta_cobrar->getid_estado(),$debito_cuenta_cobrar->getreferencia(),$debito_cuenta_cobrar->getdebito(),$debito_cuenta_cobrar->getcredito(), $debito_cuenta_cobrar->getId(), Funciones::GetRealScapeString($debito_cuenta_cobrar->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,debito_cuenta_cobrar $debito_cuenta_cobrar,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($debito_cuenta_cobrar->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($debito_cuenta_cobrar->getid_empresa(),$debito_cuenta_cobrar->getid_sucursal(),$debito_cuenta_cobrar->getid_ejercicio(),$debito_cuenta_cobrar->getid_periodo(),$debito_cuenta_cobrar->getid_usuario(),$debito_cuenta_cobrar->getid_cuenta_cobrar(),Funciones::GetRealScapeString($debito_cuenta_cobrar->getnumero(),$connexion),Funciones::GetRealScapeString($debito_cuenta_cobrar->getfecha_emision(),$connexion),Funciones::GetRealScapeString($debito_cuenta_cobrar->getfecha_vence(),$connexion),$debito_cuenta_cobrar->getid_termino_pago_cliente(),$debito_cuenta_cobrar->getmonto(),$debito_cuenta_cobrar->getsaldo(),Funciones::GetRealScapeString($debito_cuenta_cobrar->getdescripcion(),$connexion),$debito_cuenta_cobrar->getsub_total(),$debito_cuenta_cobrar->getiva(),$debito_cuenta_cobrar->getes_balance_inicial(),$debito_cuenta_cobrar->getid_estado(),Funciones::GetRealScapeString($debito_cuenta_cobrar->getreferencia(),$connexion),$debito_cuenta_cobrar->getdebito(),$debito_cuenta_cobrar->getcredito());
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($debito_cuenta_cobrar->getid_empresa(),$debito_cuenta_cobrar->getid_sucursal(),$debito_cuenta_cobrar->getid_ejercicio(),$debito_cuenta_cobrar->getid_periodo(),$debito_cuenta_cobrar->getid_usuario(),$debito_cuenta_cobrar->getid_cuenta_cobrar(),Funciones::GetRealScapeString($debito_cuenta_cobrar->getnumero(),$connexion),Funciones::GetRealScapeString($debito_cuenta_cobrar->getfecha_emision(),$connexion),Funciones::GetRealScapeString($debito_cuenta_cobrar->getfecha_vence(),$connexion),$debito_cuenta_cobrar->getid_termino_pago_cliente(),$debito_cuenta_cobrar->getmonto(),$debito_cuenta_cobrar->getsaldo(),Funciones::GetRealScapeString($debito_cuenta_cobrar->getdescripcion(),$connexion),$debito_cuenta_cobrar->getsub_total(),$debito_cuenta_cobrar->getiva(),$debito_cuenta_cobrar->getes_balance_inicial(),$debito_cuenta_cobrar->getid_estado(),Funciones::GetRealScapeString($debito_cuenta_cobrar->getreferencia(),$connexion),$debito_cuenta_cobrar->getdebito(),$debito_cuenta_cobrar->getcredito(), $debito_cuenta_cobrar->getId(), Funciones::GetRealScapeString($debito_cuenta_cobrar->getVersionRow(),$connexion));
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
	
	public function setdebito_cuenta_cobrar_Original(debito_cuenta_cobrar $debito_cuenta_cobrar) {
		$debito_cuenta_cobrar->setdebito_cuenta_cobrar_Original(clone $debito_cuenta_cobrar);		
	}
	
	public function setdebito_cuenta_cobrars_Original(array $debito_cuenta_cobrars) {
		foreach($debito_cuenta_cobrars as $debito_cuenta_cobrar){
			$debito_cuenta_cobrar->setdebito_cuenta_cobrar_Original(clone $debito_cuenta_cobrar);
		}
	}
	
	public static function setdebito_cuenta_cobrar_OriginalStatic(debito_cuenta_cobrar $debito_cuenta_cobrar) {
		$debito_cuenta_cobrar->setdebito_cuenta_cobrar_Original(clone $debito_cuenta_cobrar);		
	}
	
	public static function setdebito_cuenta_cobrars_OriginalStatic(array $debito_cuenta_cobrars) {		
		foreach($debito_cuenta_cobrars as $debito_cuenta_cobrar){
			$debito_cuenta_cobrar->setdebito_cuenta_cobrar_Original(clone $debito_cuenta_cobrar);
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
