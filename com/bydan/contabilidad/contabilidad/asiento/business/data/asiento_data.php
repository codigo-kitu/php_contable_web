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
namespace com\bydan\contabilidad\contabilidad\asiento\business\data;

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

use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;

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

use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\data\asiento_predefinido_data;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\entity\asiento_predefinido;

use com\bydan\contabilidad\contabilidad\documento_contable\business\data\documento_contable_data;
use com\bydan\contabilidad\contabilidad\documento_contable\business\entity\documento_contable;

use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\data\libro_auxiliar_data;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\entity\libro_auxiliar;

use com\bydan\contabilidad\contabilidad\fuente\business\data\fuente_data;
use com\bydan\contabilidad\contabilidad\fuente\business\entity\fuente;

use com\bydan\contabilidad\contabilidad\centro_costo\business\data\centro_costo_data;
use com\bydan\contabilidad\contabilidad\centro_costo\business\entity\centro_costo;

use com\bydan\contabilidad\general\estado\business\data\estado_data;
use com\bydan\contabilidad\general\estado\business\entity\estado;

//REL

use com\bydan\contabilidad\contabilidad\asiento_detalle\business\data\asiento_detalle_data;


class asiento_data extends GetEntitiesDataAccessHelper implements asiento_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='con_';
	public static string $TABLE_NAME='con_asiento';			
	public static string $TABLE_NAME_asiento='asiento';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_ASIENTO_INSERT(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_ASIENTO_UPDATE(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_ASIENTO_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_ASIENTO_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $asiento_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'asiento';
		
		asiento_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('CONTABILIDAD');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->asiento_DataAccessAdditional=new asientoDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_empresa,id_sucursal,id_ejercicio,id_periodo,id_usuario,numero,fecha,id_asiento_predefinido,id_documento_contable,id_libro_auxiliar,id_fuente,id_centro_costo,descripcion,total_debito,total_credito,diferencia,id_estado,id_documento_contable_origen,valor,nro_nit) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%d,%d,%d,%d,\'%s\',\'%s\',%s,%d,%d,%d,%d,\'%s\',%f,%f,%f,%d,%s,%f,\'%s\')';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_empresa=%d,id_sucursal=%d,id_ejercicio=%d,id_periodo=%d,id_usuario=%d,numero=\'%s\',fecha=\'%s\',id_asiento_predefinido=%s,id_documento_contable=%d,id_libro_auxiliar=%d,id_fuente=%d,id_centro_costo=%d,descripcion=\'%s\',total_debito=%f,total_credito=%f,diferencia=%f,id_estado=%d,id_documento_contable_origen=%s,valor=%f,nro_nit=\'%s\' where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_sucursal,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_ejercicio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_periodo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_usuario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_asiento_predefinido,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_documento_contable,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_libro_auxiliar,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_fuente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_centro_costo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.total_debito,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.total_credito,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.diferencia,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_estado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_documento_contable_origen,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.valor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nro_nit from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(asiento $asiento,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($asiento->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=asiento_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($asiento->getId(),$connexion));				
				
			} else if ($asiento->getIsChanged()) {
				if($asiento->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=asiento_data::$QUERY_INSERT;
					
					
					
					

					//$id_asiento_predefinido='null';
					//if($asiento->getid_asiento_predefinido()!==null && $asiento->getid_asiento_predefinido()>=0) {
						//$id_asiento_predefinido=$asiento->getid_asiento_predefinido();
					//} else {
						//$id_asiento_predefinido='null';
					//}

					//$id_documento_contable_origen='null';
					//if($asiento->getid_documento_contable_origen()!==null && $asiento->getid_documento_contable_origen()>=0) {
						//$id_documento_contable_origen=$asiento->getid_documento_contable_origen();
					//} else {
						//$id_documento_contable_origen='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$asiento->getid_empresa(),$asiento->getid_sucursal(),$asiento->getid_ejercicio(),$asiento->getid_periodo(),$asiento->getid_usuario(),Funciones::GetRealScapeString($asiento->getnumero(),$connexion),Funciones::GetRealScapeString($asiento->getfecha(),$connexion),Funciones::GetNullString($asiento->getid_asiento_predefinido()),$asiento->getid_documento_contable(),$asiento->getid_libro_auxiliar(),$asiento->getid_fuente(),$asiento->getid_centro_costo(),Funciones::GetRealScapeString($asiento->getdescripcion(),$connexion),$asiento->gettotal_debito(),$asiento->gettotal_credito(),$asiento->getdiferencia(),$asiento->getid_estado(),Funciones::GetNullString($asiento->getid_documento_contable_origen()),$asiento->getvalor(),Funciones::GetRealScapeString($asiento->getnro_nit(),$connexion) );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=asiento_data::$QUERY_UPDATE;			
					
					
					
					

					//$id_asiento_predefinido='null';
					//if($asiento->getid_asiento_predefinido()!==null && $asiento->getid_asiento_predefinido()>=0) {
						//$id_asiento_predefinido=$asiento->getid_asiento_predefinido();
					//} else {
						//$id_asiento_predefinido='null';
					//}

					//$id_documento_contable_origen='null';
					//if($asiento->getid_documento_contable_origen()!==null && $asiento->getid_documento_contable_origen()>=0) {
						//$id_documento_contable_origen=$asiento->getid_documento_contable_origen();
					//} else {
						//$id_documento_contable_origen='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$asiento->getid_empresa(),$asiento->getid_sucursal(),$asiento->getid_ejercicio(),$asiento->getid_periodo(),$asiento->getid_usuario(),Funciones::GetRealScapeString($asiento->getnumero(),$connexion),Funciones::GetRealScapeString($asiento->getfecha(),$connexion),Funciones::GetNullString($asiento->getid_asiento_predefinido()),$asiento->getid_documento_contable(),$asiento->getid_libro_auxiliar(),$asiento->getid_fuente(),$asiento->getid_centro_costo(),Funciones::GetRealScapeString($asiento->getdescripcion(),$connexion),$asiento->gettotal_debito(),$asiento->gettotal_credito(),$asiento->getdiferencia(),$asiento->getid_estado(),Funciones::GetNullString($asiento->getid_documento_contable_origen()),$asiento->getvalor(),Funciones::GetRealScapeString($asiento->getnro_nit(),$connexion), Funciones::GetRealScapeString($asiento->getId(),$connexion), Funciones::GetRealScapeString($asiento->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($asiento, $connexion,$strQuerySaveComplete,asiento_data::$TABLE_NAME,asiento_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				asiento_data::savePrepared($asiento, $connexion,$strQuerySave,asiento_data::$TABLE_NAME,asiento_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			asiento_data::setasiento_OriginalStatic($asiento);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(asiento $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				asiento_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					asiento_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					asiento_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(asiento $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					asiento_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(asiento $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					asiento_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(asiento $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					asiento_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?asiento {		
		$entity = new asiento();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=asiento_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=asiento_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//Contabilidad.asiento.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setasiento_Original(new asiento());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,asiento_data::$IS_WITH_SCHEMA);         	    
				/*$entity=asiento_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setasiento_Original(parent::getEntityPrefijoEntityResult("",$entity->getasiento_Original(),$resultSet,asiento_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setasiento_Original(asiento_data::getEntityBaseResult("",$entity->getasiento_Original(),$resultSet));
				//$entity->setasiento_Original($this->getEntityBaseResult("",$entity->getasiento_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?asiento {
		$entity = new asiento();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=asiento_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=asiento_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,asiento_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".Contabilidad.asiento.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setasiento_Original(new asiento());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,asiento_data::$IS_WITH_SCHEMA);         	    
				/*$entity=asiento_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setasiento_Original(parent::getEntityPrefijoEntityResult("",$entity->getasiento_Original(),$resultSet,asiento_data::$IS_WITH_SCHEMA));         		
				////$entity->setasiento_Original(asiento_data::getEntityBaseResult("",$entity->getasiento_Original(),$resultSet));
				//$entity->setasiento_Original($this->getEntityBaseResult("",$entity->getasiento_Original(),$resultSet));
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
		$entity = new asiento();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=asiento_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=asiento_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,asiento_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new asiento();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,asiento_data::$IS_WITH_SCHEMA);         		
				/*$entity=asiento_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setasiento_Original( new asiento());
				
				//$entity->setasiento_Original(parent::getEntityPrefijoEntityResult("",$entity->getasiento_Original(),$resultSet,asiento_data::$IS_WITH_SCHEMA));         		
				////$entity->setasiento_Original(asiento_data::getEntityBaseResult("",$entity->getasiento_Original(),$resultSet));
				//$entity->setasiento_Original($this->getEntityBaseResult("",$entity->getasiento_Original(),$resultSet));
								
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
		$entity = new asiento();		  
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
      	    	$entity = new asiento();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,asiento_data::$IS_WITH_SCHEMA);         		
				/*$entity=asiento_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setasiento_Original( new asiento());
				
				//$entity->setasiento_Original(parent::getEntityPrefijoEntityResult("",$entity->getasiento_Original(),$resultSet,asiento_data::$IS_WITH_SCHEMA));         		
				////$entity->setasiento_Original(asiento_data::getEntityBaseResult("",$entity->getasiento_Original(),$resultSet));
				//$entity->setasiento_Original($this->getEntityBaseResult("",$entity->getasiento_Original(),$resultSet));
				
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
		$entity = new asiento();		  
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
      	    	$entity = new asiento();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,asiento_data::$IS_WITH_SCHEMA);         		
				/*$entity=asiento_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setasiento_Original( new asiento());				
				//$entity->setasiento_Original(parent::getEntityPrefijoEntityResult("",$entity->getasiento_Original(),$resultSet,asiento_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setasiento_Original(asiento_data::getEntityBaseResult("",$entity->getasiento_Original(),$resultSet));
				//$entity->setasiento_Original($this->getEntityBaseResult("",$entity->getasiento_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=asiento_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,asiento $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,asiento_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,asiento_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getempresa(Connexion $connexion,$relasiento) : ?empresa{

		$empresa= new empresa();

		try {
			$empresaDataAccess=new empresa_data();
			$empresaDataAccess->isForFKData=$this->isForFKDataRels;
			$empresa=$empresaDataAccess->getEntity($connexion,$relasiento->getid_empresa());

		} catch(Exception $e) {
			throw $e;
		}

		return $empresa;
	}


	public function  getsucursal(Connexion $connexion,$relasiento) : ?sucursal{

		$sucursal= new sucursal();

		try {
			$sucursalDataAccess=new sucursal_data();
			$sucursalDataAccess->isForFKData=$this->isForFKDataRels;
			$sucursal=$sucursalDataAccess->getEntity($connexion,$relasiento->getid_sucursal());

		} catch(Exception $e) {
			throw $e;
		}

		return $sucursal;
	}


	public function  getejercicio(Connexion $connexion,$relasiento) : ?ejercicio{

		$ejercicio= new ejercicio();

		try {
			$ejercicioDataAccess=new ejercicio_data();
			$ejercicioDataAccess->isForFKData=$this->isForFKDataRels;
			$ejercicio=$ejercicioDataAccess->getEntity($connexion,$relasiento->getid_ejercicio());

		} catch(Exception $e) {
			throw $e;
		}

		return $ejercicio;
	}


	public function  getperiodo(Connexion $connexion,$relasiento) : ?periodo{

		$periodo= new periodo();

		try {
			$periodoDataAccess=new periodo_data();
			$periodoDataAccess->isForFKData=$this->isForFKDataRels;
			$periodo=$periodoDataAccess->getEntity($connexion,$relasiento->getid_periodo());

		} catch(Exception $e) {
			throw $e;
		}

		return $periodo;
	}


	public function  getusuario(Connexion $connexion,$relasiento) : ?usuario{

		$usuario= new usuario();

		try {
			$usuarioDataAccess=new usuario_data();
			$usuarioDataAccess->isForFKData=$this->isForFKDataRels;
			$usuario=$usuarioDataAccess->getEntity($connexion,$relasiento->getid_usuario());

		} catch(Exception $e) {
			throw $e;
		}

		return $usuario;
	}


	public function  getasiento_predefinido(Connexion $connexion,$relasiento) : ?asiento_predefinido{

		$asiento_predefinido= new asiento_predefinido();

		try {
			$asiento_predefinidoDataAccess=new asiento_predefinido_data();
			$asiento_predefinidoDataAccess->isForFKData=$this->isForFKDataRels;
			$asiento_predefinido=$asiento_predefinidoDataAccess->getEntity($connexion,$relasiento->getid_asiento_predefinido());

		} catch(Exception $e) {
			throw $e;
		}

		return $asiento_predefinido;
	}


	public function  getdocumento_contable(Connexion $connexion,$relasiento) : ?documento_contable{

		$documento_contable= new documento_contable();

		try {
			$documento_contableDataAccess=new documento_contable_data();
			$documento_contableDataAccess->isForFKData=$this->isForFKDataRels;
			$documento_contable=$documento_contableDataAccess->getEntity($connexion,$relasiento->getid_documento_contable());

		} catch(Exception $e) {
			throw $e;
		}

		return $documento_contable;
	}


	public function  getlibro_auxiliar(Connexion $connexion,$relasiento) : ?libro_auxiliar{

		$libro_auxiliar= new libro_auxiliar();

		try {
			$libro_auxiliarDataAccess=new libro_auxiliar_data();
			$libro_auxiliarDataAccess->isForFKData=$this->isForFKDataRels;
			$libro_auxiliar=$libro_auxiliarDataAccess->getEntity($connexion,$relasiento->getid_libro_auxiliar());

		} catch(Exception $e) {
			throw $e;
		}

		return $libro_auxiliar;
	}


	public function  getfuente(Connexion $connexion,$relasiento) : ?fuente{

		$fuente= new fuente();

		try {
			$fuenteDataAccess=new fuente_data();
			$fuenteDataAccess->isForFKData=$this->isForFKDataRels;
			$fuente=$fuenteDataAccess->getEntity($connexion,$relasiento->getid_fuente());

		} catch(Exception $e) {
			throw $e;
		}

		return $fuente;
	}


	public function  getcentro_costo(Connexion $connexion,$relasiento) : ?centro_costo{

		$centro_costo= new centro_costo();

		try {
			$centro_costoDataAccess=new centro_costo_data();
			$centro_costoDataAccess->isForFKData=$this->isForFKDataRels;
			$centro_costo=$centro_costoDataAccess->getEntity($connexion,$relasiento->getid_centro_costo());

		} catch(Exception $e) {
			throw $e;
		}

		return $centro_costo;
	}


	public function  getestado(Connexion $connexion,$relasiento) : ?estado{

		$estado= new estado();

		try {
			$estadoDataAccess=new estado_data();
			$estadoDataAccess->isForFKData=$this->isForFKDataRels;
			$estado=$estadoDataAccess->getEntity($connexion,$relasiento->getid_estado());

		} catch(Exception $e) {
			throw $e;
		}

		return $estado;
	}


	public function  getdocumento_contable_origen(Connexion $connexion,$relasiento) : ?documento_contable{

		$documento_contable= new documento_contable();

		try {
			$documento_contableDataAccess=new documento_contable_data();
			$documento_contableDataAccess->isForFKData=$this->isForFKDataRels;
			$documento_contable=$documento_contableDataAccess->getEntity($connexion,$relasiento->getid_documento_contable_origen());

		} catch(Exception $e) {
			throw $e;
		}

		return $documento_contable;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	public function  getasiento_detalles(Connexion $connexion,asiento $asiento) : array {

		$asientodetalles=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.asiento_detalle_data::$SCHEMA.".".asiento_detalle_data::$TABLE_NAME.".id_asiento=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$asiento->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$asientodetalleDataAccess=new asiento_detalle_data();

			$asientodetalles=$asientodetalleDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $asientodetalles;
	}


	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,asiento $entity,$resultSet) : asiento {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_empresa((int)$resultSet[$strPrefijo.'id_empresa']);
				$entity->setid_sucursal((int)$resultSet[$strPrefijo.'id_sucursal']);
				$entity->setid_ejercicio((int)$resultSet[$strPrefijo.'id_ejercicio']);
				$entity->setid_periodo((int)$resultSet[$strPrefijo.'id_periodo']);
				$entity->setid_usuario((int)$resultSet[$strPrefijo.'id_usuario']);
				$entity->setnumero(utf8_encode($resultSet[$strPrefijo.'numero']));
				$entity->setfecha($resultSet[$strPrefijo.'fecha']);
				$entity->setid_asiento_predefinido((int)$resultSet[$strPrefijo.'id_asiento_predefinido']);
				$entity->setid_documento_contable((int)$resultSet[$strPrefijo.'id_documento_contable']);
				$entity->setid_libro_auxiliar((int)$resultSet[$strPrefijo.'id_libro_auxiliar']);
				$entity->setid_fuente((int)$resultSet[$strPrefijo.'id_fuente']);
				$entity->setid_centro_costo((int)$resultSet[$strPrefijo.'id_centro_costo']);
				$entity->setdescripcion(utf8_encode($resultSet[$strPrefijo.'descripcion']));
				$entity->settotal_debito((float)$resultSet[$strPrefijo.'total_debito']);
				$entity->settotal_credito((float)$resultSet[$strPrefijo.'total_credito']);
				$entity->setdiferencia((float)$resultSet[$strPrefijo.'diferencia']);
				$entity->setid_estado((int)$resultSet[$strPrefijo.'id_estado']);
				$entity->setid_documento_contable_origen((int)$resultSet[$strPrefijo.'id_documento_contable_origen']);
				$entity->setvalor((float)$resultSet[$strPrefijo.'valor']);
				$entity->setnro_nit(utf8_encode($resultSet[$strPrefijo.'nro_nit']));
			} else {
				$entity->setnumero(utf8_encode($resultSet[$strPrefijo.'numero']));								
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,asiento $asiento,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $asiento->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiissiiiiisdddiids', $asiento->getid_empresa(),$asiento->getid_sucursal(),$asiento->getid_ejercicio(),$asiento->getid_periodo(),$asiento->getid_usuario(),$asiento->getnumero(),$asiento->getfecha(),$asiento->getid_asiento_predefinido(),$asiento->getid_documento_contable(),$asiento->getid_libro_auxiliar(),$asiento->getid_fuente(),$asiento->getid_centro_costo(),$asiento->getdescripcion(),$asiento->gettotal_debito(),$asiento->gettotal_credito(),$asiento->getdiferencia(),$asiento->getid_estado(),$asiento->getid_documento_contable_origen(),$asiento->getvalor(),$asiento->getnro_nit());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiissiiiiisdddiidsis', $asiento->getid_empresa(),$asiento->getid_sucursal(),$asiento->getid_ejercicio(),$asiento->getid_periodo(),$asiento->getid_usuario(),$asiento->getnumero(),$asiento->getfecha(),$asiento->getid_asiento_predefinido(),$asiento->getid_documento_contable(),$asiento->getid_libro_auxiliar(),$asiento->getid_fuente(),$asiento->getid_centro_costo(),$asiento->getdescripcion(),$asiento->gettotal_debito(),$asiento->gettotal_credito(),$asiento->getdiferencia(),$asiento->getid_estado(),$asiento->getid_documento_contable_origen(),$asiento->getvalor(),$asiento->getnro_nit(), $asiento->getId(), Funciones::GetRealScapeString($asiento->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,asiento $asiento,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($asiento->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($asiento->getid_empresa(),$asiento->getid_sucursal(),$asiento->getid_ejercicio(),$asiento->getid_periodo(),$asiento->getid_usuario(),Funciones::GetRealScapeString($asiento->getnumero(),$connexion),Funciones::GetRealScapeString($asiento->getfecha(),$connexion),Funciones::GetNullString($asiento->getid_asiento_predefinido()),$asiento->getid_documento_contable(),$asiento->getid_libro_auxiliar(),$asiento->getid_fuente(),$asiento->getid_centro_costo(),Funciones::GetRealScapeString($asiento->getdescripcion(),$connexion),$asiento->gettotal_debito(),$asiento->gettotal_credito(),$asiento->getdiferencia(),$asiento->getid_estado(),Funciones::GetNullString($asiento->getid_documento_contable_origen()),$asiento->getvalor(),Funciones::GetRealScapeString($asiento->getnro_nit(),$connexion));
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($asiento->getid_empresa(),$asiento->getid_sucursal(),$asiento->getid_ejercicio(),$asiento->getid_periodo(),$asiento->getid_usuario(),Funciones::GetRealScapeString($asiento->getnumero(),$connexion),Funciones::GetRealScapeString($asiento->getfecha(),$connexion),Funciones::GetNullString($asiento->getid_asiento_predefinido()),$asiento->getid_documento_contable(),$asiento->getid_libro_auxiliar(),$asiento->getid_fuente(),$asiento->getid_centro_costo(),Funciones::GetRealScapeString($asiento->getdescripcion(),$connexion),$asiento->gettotal_debito(),$asiento->gettotal_credito(),$asiento->getdiferencia(),$asiento->getid_estado(),Funciones::GetNullString($asiento->getid_documento_contable_origen()),$asiento->getvalor(),Funciones::GetRealScapeString($asiento->getnro_nit(),$connexion), $asiento->getId(), Funciones::GetRealScapeString($asiento->getVersionRow(),$connexion));
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
	
	public function setasiento_Original(asiento $asiento) {
		$asiento->setasiento_Original(clone $asiento);		
	}
	
	public function setasientos_Original(array $asientos) {
		foreach($asientos as $asiento){
			$asiento->setasiento_Original(clone $asiento);
		}
	}
	
	public static function setasiento_OriginalStatic(asiento $asiento) {
		$asiento->setasiento_Original(clone $asiento);		
	}
	
	public static function setasientos_OriginalStatic(array $asientos) {		
		foreach($asientos as $asiento){
			$asiento->setasiento_Original(clone $asiento);
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
