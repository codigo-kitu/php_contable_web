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
namespace com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\data;

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

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity\termino_pago_proveedor;

//FK


use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\entity\empresa;

use com\bydan\contabilidad\general\tipo_termino_pago\business\data\tipo_termino_pago_data;
use com\bydan\contabilidad\general\tipo_termino_pago\business\entity\tipo_termino_pago;

use com\bydan\contabilidad\contabilidad\cuenta\business\data\cuenta_data;
use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;

//REL

use com\bydan\contabilidad\inventario\orden_compra\business\data\orden_compra_data;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\data\proveedor_data;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\business\data\credito_cuenta_pagar_data;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\data\cuenta_pagar_data;
use com\bydan\contabilidad\inventario\cotizacion\business\data\cotizacion_data;
use com\bydan\contabilidad\inventario\parametro_inventario\business\data\parametro_inventario_data;
use com\bydan\contabilidad\inventario\devolucion\business\data\devolucion_data;


class termino_pago_proveedor_data extends GetEntitiesDataAccessHelper implements termino_pago_proveedor_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='cp_';
	public static string $TABLE_NAME='cp_termino_pago_proveedor';			
	public static string $TABLE_NAME_termino_pago_proveedor='termino_pago_proveedor';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_TERMINO_PAGO_PROVEEDOR_INSERT(??,?,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_TERMINO_PAGO_PROVEEDOR_UPDATE(??,?,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_TERMINO_PAGO_PROVEEDOR_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_TERMINO_PAGO_PROVEEDOR_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $termino_pago_proveedor_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'termino_pago_proveedor';
		
		termino_pago_proveedor_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('CUENTASPAGAR');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->termino_pago_proveedor_DataAccessAdditional=new termino_pago_proveedorDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_empresa,id_tipo_termino_pago,codigo,descripcion,monto,dias,inicial,cuotas,descuento_pronto_pago,predeterminado,id_cuenta,cuenta_contable) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%d,\'%s\',\'%s\',%f,%d,%f,%d,%f,\'%d\',%s,\'%s\')';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_empresa=%d,id_tipo_termino_pago=%d,codigo=\'%s\',descripcion=\'%s\',monto=%f,dias=%d,inicial=%f,cuotas=%d,descuento_pronto_pago=%f,predeterminado=\'%d\',id_cuenta=%s,cuenta_contable=\'%s\' where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_tipo_termino_pago,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.dias,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.inicial,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cuotas,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descuento_pronto_pago,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.predeterminado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cuenta_contable from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(termino_pago_proveedor $termino_pago_proveedor,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($termino_pago_proveedor->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=termino_pago_proveedor_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($termino_pago_proveedor->getId(),$connexion));				
				
			} else if ($termino_pago_proveedor->getIsChanged()) {
				if($termino_pago_proveedor->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=termino_pago_proveedor_data::$QUERY_INSERT;
					
					
					
					

					//$id_cuenta='null';
					//if($termino_pago_proveedor->getid_cuenta()!==null && $termino_pago_proveedor->getid_cuenta()>=0) {
						//$id_cuenta=$termino_pago_proveedor->getid_cuenta();
					//} else {
						//$id_cuenta='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$termino_pago_proveedor->getid_empresa(),$termino_pago_proveedor->getid_tipo_termino_pago(),Funciones::GetRealScapeString($termino_pago_proveedor->getcodigo(),$connexion),Funciones::GetRealScapeString($termino_pago_proveedor->getdescripcion(),$connexion),$termino_pago_proveedor->getmonto(),$termino_pago_proveedor->getdias(),$termino_pago_proveedor->getinicial(),$termino_pago_proveedor->getcuotas(),$termino_pago_proveedor->getdescuento_pronto_pago(),$termino_pago_proveedor->getpredeterminado(),$termino_pago_proveedor->getid_cuenta(),Funciones::GetRealScapeString($termino_pago_proveedor->getcuenta_contable(),$connexion) );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=termino_pago_proveedor_data::$QUERY_UPDATE;			
					
					
					
					

					//$id_cuenta='null';
					//if($termino_pago_proveedor->getid_cuenta()!==null && $termino_pago_proveedor->getid_cuenta()>=0) {
						//$id_cuenta=$termino_pago_proveedor->getid_cuenta();
					//} else {
						//$id_cuenta='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$termino_pago_proveedor->getid_empresa(),$termino_pago_proveedor->getid_tipo_termino_pago(),Funciones::GetRealScapeString($termino_pago_proveedor->getcodigo(),$connexion),Funciones::GetRealScapeString($termino_pago_proveedor->getdescripcion(),$connexion),$termino_pago_proveedor->getmonto(),$termino_pago_proveedor->getdias(),$termino_pago_proveedor->getinicial(),$termino_pago_proveedor->getcuotas(),$termino_pago_proveedor->getdescuento_pronto_pago(),$termino_pago_proveedor->getpredeterminado(),$termino_pago_proveedor->getid_cuenta(),Funciones::GetRealScapeString($termino_pago_proveedor->getcuenta_contable(),$connexion), Funciones::GetRealScapeString($termino_pago_proveedor->getId(),$connexion), Funciones::GetRealScapeString($termino_pago_proveedor->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($termino_pago_proveedor, $connexion,$strQuerySaveComplete,termino_pago_proveedor_data::$TABLE_NAME,termino_pago_proveedor_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				termino_pago_proveedor_data::savePrepared($termino_pago_proveedor, $connexion,$strQuerySave,termino_pago_proveedor_data::$TABLE_NAME,termino_pago_proveedor_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			termino_pago_proveedor_data::settermino_pago_proveedor_OriginalStatic($termino_pago_proveedor);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(termino_pago_proveedor $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				termino_pago_proveedor_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					termino_pago_proveedor_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					termino_pago_proveedor_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(termino_pago_proveedor $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					termino_pago_proveedor_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(termino_pago_proveedor $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					termino_pago_proveedor_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(termino_pago_proveedor $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					termino_pago_proveedor_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?termino_pago_proveedor {		
		$entity = new termino_pago_proveedor();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=termino_pago_proveedor_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=termino_pago_proveedor_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//CuentasPagar.termino_pago_proveedor.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->settermino_pago_proveedor_Original(new termino_pago_proveedor());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,termino_pago_proveedor_data::$IS_WITH_SCHEMA);         	    
				/*$entity=termino_pago_proveedor_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->settermino_pago_proveedor_Original(parent::getEntityPrefijoEntityResult("",$entity->gettermino_pago_proveedor_Original(),$resultSet,termino_pago_proveedor_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->settermino_pago_proveedor_Original(termino_pago_proveedor_data::getEntityBaseResult("",$entity->gettermino_pago_proveedor_Original(),$resultSet));
				//$entity->settermino_pago_proveedor_Original($this->getEntityBaseResult("",$entity->gettermino_pago_proveedor_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?termino_pago_proveedor {
		$entity = new termino_pago_proveedor();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=termino_pago_proveedor_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=termino_pago_proveedor_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,termino_pago_proveedor_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".CuentasPagar.termino_pago_proveedor.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->settermino_pago_proveedor_Original(new termino_pago_proveedor());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,termino_pago_proveedor_data::$IS_WITH_SCHEMA);         	    
				/*$entity=termino_pago_proveedor_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->settermino_pago_proveedor_Original(parent::getEntityPrefijoEntityResult("",$entity->gettermino_pago_proveedor_Original(),$resultSet,termino_pago_proveedor_data::$IS_WITH_SCHEMA));         		
				////$entity->settermino_pago_proveedor_Original(termino_pago_proveedor_data::getEntityBaseResult("",$entity->gettermino_pago_proveedor_Original(),$resultSet));
				//$entity->settermino_pago_proveedor_Original($this->getEntityBaseResult("",$entity->gettermino_pago_proveedor_Original(),$resultSet));
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
		$entity = new termino_pago_proveedor();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=termino_pago_proveedor_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=termino_pago_proveedor_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,termino_pago_proveedor_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new termino_pago_proveedor();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,termino_pago_proveedor_data::$IS_WITH_SCHEMA);         		
				/*$entity=termino_pago_proveedor_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->settermino_pago_proveedor_Original( new termino_pago_proveedor());
				
				//$entity->settermino_pago_proveedor_Original(parent::getEntityPrefijoEntityResult("",$entity->gettermino_pago_proveedor_Original(),$resultSet,termino_pago_proveedor_data::$IS_WITH_SCHEMA));         		
				////$entity->settermino_pago_proveedor_Original(termino_pago_proveedor_data::getEntityBaseResult("",$entity->gettermino_pago_proveedor_Original(),$resultSet));
				//$entity->settermino_pago_proveedor_Original($this->getEntityBaseResult("",$entity->gettermino_pago_proveedor_Original(),$resultSet));
								
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
		$entity = new termino_pago_proveedor();		  
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
      	    	$entity = new termino_pago_proveedor();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,termino_pago_proveedor_data::$IS_WITH_SCHEMA);         		
				/*$entity=termino_pago_proveedor_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->settermino_pago_proveedor_Original( new termino_pago_proveedor());
				
				//$entity->settermino_pago_proveedor_Original(parent::getEntityPrefijoEntityResult("",$entity->gettermino_pago_proveedor_Original(),$resultSet,termino_pago_proveedor_data::$IS_WITH_SCHEMA));         		
				////$entity->settermino_pago_proveedor_Original(termino_pago_proveedor_data::getEntityBaseResult("",$entity->gettermino_pago_proveedor_Original(),$resultSet));
				//$entity->settermino_pago_proveedor_Original($this->getEntityBaseResult("",$entity->gettermino_pago_proveedor_Original(),$resultSet));
				
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
		$entity = new termino_pago_proveedor();		  
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
      	    	$entity = new termino_pago_proveedor();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,termino_pago_proveedor_data::$IS_WITH_SCHEMA);         		
				/*$entity=termino_pago_proveedor_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->settermino_pago_proveedor_Original( new termino_pago_proveedor());				
				//$entity->settermino_pago_proveedor_Original(parent::getEntityPrefijoEntityResult("",$entity->gettermino_pago_proveedor_Original(),$resultSet,termino_pago_proveedor_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->settermino_pago_proveedor_Original(termino_pago_proveedor_data::getEntityBaseResult("",$entity->gettermino_pago_proveedor_Original(),$resultSet));
				//$entity->settermino_pago_proveedor_Original($this->getEntityBaseResult("",$entity->gettermino_pago_proveedor_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=termino_pago_proveedor_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,termino_pago_proveedor $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,termino_pago_proveedor_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,termino_pago_proveedor_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getempresa(Connexion $connexion,$reltermino_pago_proveedor) : ?empresa{

		$empresa= new empresa();

		try {
			$empresaDataAccess=new empresa_data();
			$empresaDataAccess->isForFKData=$this->isForFKDataRels;
			$empresa=$empresaDataAccess->getEntity($connexion,$reltermino_pago_proveedor->getid_empresa());

		} catch(Exception $e) {
			throw $e;
		}

		return $empresa;
	}


	public function  gettipo_termino_pago(Connexion $connexion,$reltermino_pago_proveedor) : ?tipo_termino_pago{

		$tipo_termino_pago= new tipo_termino_pago();

		try {
			$tipo_termino_pagoDataAccess=new tipo_termino_pago_data();
			$tipo_termino_pagoDataAccess->isForFKData=$this->isForFKDataRels;
			$tipo_termino_pago=$tipo_termino_pagoDataAccess->getEntity($connexion,$reltermino_pago_proveedor->getid_tipo_termino_pago());

		} catch(Exception $e) {
			throw $e;
		}

		return $tipo_termino_pago;
	}


	public function  getcuenta(Connexion $connexion,$reltermino_pago_proveedor) : ?cuenta{

		$cuenta= new cuenta();

		try {
			$cuentaDataAccess=new cuenta_data();
			$cuentaDataAccess->isForFKData=$this->isForFKDataRels;
			$cuenta=$cuentaDataAccess->getEntity($connexion,$reltermino_pago_proveedor->getid_cuenta());

		} catch(Exception $e) {
			throw $e;
		}

		return $cuenta;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	public function  getorden_compras(Connexion $connexion,termino_pago_proveedor $termino_pago_proveedor) : array {

		$ordencompras=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.orden_compra_data::$SCHEMA.".".orden_compra_data::$TABLE_NAME.".id_termino_pago_proveedor=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$termino_pago_proveedor->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$ordencompraDataAccess=new orden_compra_data();

			$ordencompras=$ordencompraDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $ordencompras;
	}


	public function  getproveedors(Connexion $connexion,termino_pago_proveedor $termino_pago_proveedor) : array {

		$proveedors=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.proveedor_data::$SCHEMA.".".proveedor_data::$TABLE_NAME.".id_termino_pago_proveedor=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$termino_pago_proveedor->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$proveedorDataAccess=new proveedor_data();

			$proveedors=$proveedorDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $proveedors;
	}


	public function  getcredito_cuenta_pagars(Connexion $connexion,termino_pago_proveedor $termino_pago_proveedor) : array {

		$creditocuentapagars=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.credito_cuenta_pagar_data::$SCHEMA.".".credito_cuenta_pagar_data::$TABLE_NAME.".id_termino_pago_proveedor=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$termino_pago_proveedor->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$creditocuentapagarDataAccess=new credito_cuenta_pagar_data();

			$creditocuentapagars=$creditocuentapagarDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $creditocuentapagars;
	}


	public function  getcuenta_pagars(Connexion $connexion,termino_pago_proveedor $termino_pago_proveedor) : array {

		$cuentapagars=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.cuenta_pagar_data::$SCHEMA.".".cuenta_pagar_data::$TABLE_NAME.".id_termino_pago_proveedor=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$termino_pago_proveedor->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$cuentapagarDataAccess=new cuenta_pagar_data();

			$cuentapagars=$cuentapagarDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $cuentapagars;
	}


	public function  getcotizacions(Connexion $connexion,termino_pago_proveedor $termino_pago_proveedor) : array {

		$cotizacions=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.cotizacion_data::$SCHEMA.".".cotizacion_data::$TABLE_NAME.".id_termino_pago_proveedor=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$termino_pago_proveedor->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$cotizacionDataAccess=new cotizacion_data();

			$cotizacions=$cotizacionDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $cotizacions;
	}


	public function  getparametro_inventarios(Connexion $connexion,termino_pago_proveedor $termino_pago_proveedor) : array {

		$parametroinventarios=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.parametro_inventario_data::$SCHEMA.".".parametro_inventario_data::$TABLE_NAME.".id_termino_pago_proveedor=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$termino_pago_proveedor->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$parametroinventarioDataAccess=new parametro_inventario_data();

			$parametroinventarios=$parametroinventarioDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $parametroinventarios;
	}


	public function  getdevolucions(Connexion $connexion,termino_pago_proveedor $termino_pago_proveedor) : array {

		$devolucions=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.devolucion_data::$SCHEMA.".".devolucion_data::$TABLE_NAME.".id_termino_pago_proveedor=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$termino_pago_proveedor->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$devolucionDataAccess=new devolucion_data();

			$devolucions=$devolucionDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $devolucions;
	}


	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,termino_pago_proveedor $entity,$resultSet) : termino_pago_proveedor {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_empresa((int)$resultSet[$strPrefijo.'id_empresa']);
				$entity->setid_tipo_termino_pago((int)$resultSet[$strPrefijo.'id_tipo_termino_pago']);
				$entity->setcodigo(utf8_encode($resultSet[$strPrefijo.'codigo']));
				$entity->setdescripcion(utf8_encode($resultSet[$strPrefijo.'descripcion']));
				$entity->setmonto((float)$resultSet[$strPrefijo.'monto']);
				$entity->setdias((int)$resultSet[$strPrefijo.'dias']);
				$entity->setinicial((float)$resultSet[$strPrefijo.'inicial']);
				$entity->setcuotas((int)$resultSet[$strPrefijo.'cuotas']);
				$entity->setdescuento_pronto_pago((float)$resultSet[$strPrefijo.'descuento_pronto_pago']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setpredeterminado($resultSet[$strPrefijo.'predeterminado']=='f'? false:true );
				} else {
					$entity->setpredeterminado((bool)$resultSet[$strPrefijo.'predeterminado']);
				}
				$entity->setid_cuenta((int)$resultSet[$strPrefijo.'id_cuenta']);
				$entity->setcuenta_contable(utf8_encode($resultSet[$strPrefijo.'cuenta_contable']));
			} else {
				$entity->setdescripcion(utf8_encode($resultSet[$strPrefijo.'descripcion']));								
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,termino_pago_proveedor $termino_pago_proveedor,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $termino_pago_proveedor->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iissdididiis', $termino_pago_proveedor->getid_empresa(),$termino_pago_proveedor->getid_tipo_termino_pago(),$termino_pago_proveedor->getcodigo(),$termino_pago_proveedor->getdescripcion(),$termino_pago_proveedor->getmonto(),$termino_pago_proveedor->getdias(),$termino_pago_proveedor->getinicial(),$termino_pago_proveedor->getcuotas(),$termino_pago_proveedor->getdescuento_pronto_pago(),$termino_pago_proveedor->getpredeterminado(),$termino_pago_proveedor->getid_cuenta(),$termino_pago_proveedor->getcuenta_contable());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iissdididiisis', $termino_pago_proveedor->getid_empresa(),$termino_pago_proveedor->getid_tipo_termino_pago(),$termino_pago_proveedor->getcodigo(),$termino_pago_proveedor->getdescripcion(),$termino_pago_proveedor->getmonto(),$termino_pago_proveedor->getdias(),$termino_pago_proveedor->getinicial(),$termino_pago_proveedor->getcuotas(),$termino_pago_proveedor->getdescuento_pronto_pago(),$termino_pago_proveedor->getpredeterminado(),$termino_pago_proveedor->getid_cuenta(),$termino_pago_proveedor->getcuenta_contable(), $termino_pago_proveedor->getId(), Funciones::GetRealScapeString($termino_pago_proveedor->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,termino_pago_proveedor $termino_pago_proveedor,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($termino_pago_proveedor->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($termino_pago_proveedor->getid_empresa(),$termino_pago_proveedor->getid_tipo_termino_pago(),Funciones::GetRealScapeString($termino_pago_proveedor->getcodigo(),$connexion),Funciones::GetRealScapeString($termino_pago_proveedor->getdescripcion(),$connexion),$termino_pago_proveedor->getmonto(),$termino_pago_proveedor->getdias(),$termino_pago_proveedor->getinicial(),$termino_pago_proveedor->getcuotas(),$termino_pago_proveedor->getdescuento_pronto_pago(),$termino_pago_proveedor->getpredeterminado(),$termino_pago_proveedor->getid_cuenta(),Funciones::GetRealScapeString($termino_pago_proveedor->getcuenta_contable(),$connexion));
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($termino_pago_proveedor->getid_empresa(),$termino_pago_proveedor->getid_tipo_termino_pago(),Funciones::GetRealScapeString($termino_pago_proveedor->getcodigo(),$connexion),Funciones::GetRealScapeString($termino_pago_proveedor->getdescripcion(),$connexion),$termino_pago_proveedor->getmonto(),$termino_pago_proveedor->getdias(),$termino_pago_proveedor->getinicial(),$termino_pago_proveedor->getcuotas(),$termino_pago_proveedor->getdescuento_pronto_pago(),$termino_pago_proveedor->getpredeterminado(),$termino_pago_proveedor->getid_cuenta(),Funciones::GetRealScapeString($termino_pago_proveedor->getcuenta_contable(),$connexion), $termino_pago_proveedor->getId(), Funciones::GetRealScapeString($termino_pago_proveedor->getVersionRow(),$connexion));
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
	
	public function settermino_pago_proveedor_Original(termino_pago_proveedor $termino_pago_proveedor) {
		$termino_pago_proveedor->settermino_pago_proveedor_Original(clone $termino_pago_proveedor);		
	}
	
	public function settermino_pago_proveedors_Original(array $termino_pago_proveedors) {
		foreach($termino_pago_proveedors as $termino_pago_proveedor){
			$termino_pago_proveedor->settermino_pago_proveedor_Original(clone $termino_pago_proveedor);
		}
	}
	
	public static function settermino_pago_proveedor_OriginalStatic(termino_pago_proveedor $termino_pago_proveedor) {
		$termino_pago_proveedor->settermino_pago_proveedor_Original(clone $termino_pago_proveedor);		
	}
	
	public static function settermino_pago_proveedors_OriginalStatic(array $termino_pago_proveedors) {		
		foreach($termino_pago_proveedors as $termino_pago_proveedor){
			$termino_pago_proveedor->settermino_pago_proveedor_Original(clone $termino_pago_proveedor);
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
