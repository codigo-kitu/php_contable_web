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
namespace com\bydan\contabilidad\estimados\estimado_detalle\business\data;

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

use com\bydan\contabilidad\estimados\estimado_detalle\business\entity\estimado_detalle;

//FK


use com\bydan\contabilidad\estimados\estimado\business\data\estimado_data;
use com\bydan\contabilidad\estimados\estimado\business\entity\estimado;

use com\bydan\contabilidad\inventario\bodega\business\data\bodega_data;
use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;

use com\bydan\contabilidad\inventario\producto\business\data\producto_data;
use com\bydan\contabilidad\inventario\producto\business\entity\producto;

use com\bydan\contabilidad\inventario\unidad\business\data\unidad_data;
use com\bydan\contabilidad\inventario\unidad\business\entity\unidad;

//REL



class estimado_detalle_data extends GetEntitiesDataAccessHelper implements estimado_detalle_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='est_';
	public static string $TABLE_NAME='est_estimado_detalle';			
	public static string $TABLE_NAME_estimado_detalle='estimado_detalle';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_ESTIMADO_DETALLE_INSERT(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_ESTIMADO_DETALLE_UPDATE(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_ESTIMADO_DETALLE_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_ESTIMADO_DETALLE_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $estimado_detalle_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'estimado_detalle';
		
		estimado_detalle_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('ESTIMADOS');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->estimado_detalle_DataAccessAdditional=new estimado_detalleDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_estimado,id_bodega,id_producto,id_unidad,cantidad,precio,descuento_porciento,descuento_monto,sub_total,iva_porciento,iva_monto,total,recibido,observacion,impuesto2_porciento,impuesto2_monto,cotizacion,moneda) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%s,%d,%d,%d,%f,%f,%f,%f,%f,%f,%f,%f,%f,\'%s\',%f,%f,%f,%d)';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_estimado=%s,id_bodega=%d,id_producto=%d,id_unidad=%d,cantidad=%f,precio=%f,descuento_porciento=%f,descuento_monto=%f,sub_total=%f,iva_porciento=%f,iva_monto=%f,total=%f,recibido=%f,observacion=\'%s\',impuesto2_porciento=%f,impuesto2_monto=%f,cotizacion=%f,moneda=%d where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_estimado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_bodega,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_unidad,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cantidad,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.precio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descuento_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descuento_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.sub_total,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.iva_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.iva_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.total,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.recibido,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.observacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.impuesto2_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.impuesto2_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cotizacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.moneda from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(estimado_detalle $estimado_detalle,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($estimado_detalle->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=estimado_detalle_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($estimado_detalle->getId(),$connexion));				
				
			} else if ($estimado_detalle->getIsChanged()) {
				if($estimado_detalle->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=estimado_detalle_data::$QUERY_INSERT;
					
					
					
					

					//$id_estimado='null';
					//if($estimado_detalle->getid_estimado()!==null && $estimado_detalle->getid_estimado()>=0) {
						//$id_estimado=$estimado_detalle->getid_estimado();
					//} else {
						//$id_estimado='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$estimado_detalle->getid_estimado(),$estimado_detalle->getid_bodega(),$estimado_detalle->getid_producto(),$estimado_detalle->getid_unidad(),$estimado_detalle->getcantidad(),$estimado_detalle->getprecio(),$estimado_detalle->getdescuento_porciento(),$estimado_detalle->getdescuento_monto(),$estimado_detalle->getsub_total(),$estimado_detalle->getiva_porciento(),$estimado_detalle->getiva_monto(),$estimado_detalle->gettotal(),$estimado_detalle->getrecibido(),Funciones::GetRealScapeString($estimado_detalle->getobservacion(),$connexion),$estimado_detalle->getimpuesto2_porciento(),$estimado_detalle->getimpuesto2_monto(),$estimado_detalle->getcotizacion(),$estimado_detalle->getmoneda() );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=estimado_detalle_data::$QUERY_UPDATE;			
					
					
					
					

					//$id_estimado='null';
					//if($estimado_detalle->getid_estimado()!==null && $estimado_detalle->getid_estimado()>=0) {
						//$id_estimado=$estimado_detalle->getid_estimado();
					//} else {
						//$id_estimado='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$estimado_detalle->getid_estimado(),$estimado_detalle->getid_bodega(),$estimado_detalle->getid_producto(),$estimado_detalle->getid_unidad(),$estimado_detalle->getcantidad(),$estimado_detalle->getprecio(),$estimado_detalle->getdescuento_porciento(),$estimado_detalle->getdescuento_monto(),$estimado_detalle->getsub_total(),$estimado_detalle->getiva_porciento(),$estimado_detalle->getiva_monto(),$estimado_detalle->gettotal(),$estimado_detalle->getrecibido(),Funciones::GetRealScapeString($estimado_detalle->getobservacion(),$connexion),$estimado_detalle->getimpuesto2_porciento(),$estimado_detalle->getimpuesto2_monto(),$estimado_detalle->getcotizacion(),$estimado_detalle->getmoneda(), Funciones::GetRealScapeString($estimado_detalle->getId(),$connexion), Funciones::GetRealScapeString($estimado_detalle->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($estimado_detalle, $connexion,$strQuerySaveComplete,estimado_detalle_data::$TABLE_NAME,estimado_detalle_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				estimado_detalle_data::savePrepared($estimado_detalle, $connexion,$strQuerySave,estimado_detalle_data::$TABLE_NAME,estimado_detalle_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			estimado_detalle_data::setestimado_detalle_OriginalStatic($estimado_detalle);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(estimado_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				estimado_detalle_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					estimado_detalle_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					estimado_detalle_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(estimado_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					estimado_detalle_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(estimado_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					estimado_detalle_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(estimado_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					estimado_detalle_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?estimado_detalle {		
		$entity = new estimado_detalle();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=estimado_detalle_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=estimado_detalle_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//Estimados.estimado_detalle.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setestimado_detalle_Original(new estimado_detalle());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,estimado_detalle_data::$IS_WITH_SCHEMA);         	    
				/*$entity=estimado_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setestimado_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getestimado_detalle_Original(),$resultSet,estimado_detalle_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setestimado_detalle_Original(estimado_detalle_data::getEntityBaseResult("",$entity->getestimado_detalle_Original(),$resultSet));
				//$entity->setestimado_detalle_Original($this->getEntityBaseResult("",$entity->getestimado_detalle_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?estimado_detalle {
		$entity = new estimado_detalle();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=estimado_detalle_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=estimado_detalle_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,estimado_detalle_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".Estimados.estimado_detalle.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setestimado_detalle_Original(new estimado_detalle());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,estimado_detalle_data::$IS_WITH_SCHEMA);         	    
				/*$entity=estimado_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setestimado_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getestimado_detalle_Original(),$resultSet,estimado_detalle_data::$IS_WITH_SCHEMA));         		
				////$entity->setestimado_detalle_Original(estimado_detalle_data::getEntityBaseResult("",$entity->getestimado_detalle_Original(),$resultSet));
				//$entity->setestimado_detalle_Original($this->getEntityBaseResult("",$entity->getestimado_detalle_Original(),$resultSet));
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
		$entity = new estimado_detalle();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=estimado_detalle_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=estimado_detalle_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,estimado_detalle_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new estimado_detalle();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,estimado_detalle_data::$IS_WITH_SCHEMA);         		
				/*$entity=estimado_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setestimado_detalle_Original( new estimado_detalle());
				
				//$entity->setestimado_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getestimado_detalle_Original(),$resultSet,estimado_detalle_data::$IS_WITH_SCHEMA));         		
				////$entity->setestimado_detalle_Original(estimado_detalle_data::getEntityBaseResult("",$entity->getestimado_detalle_Original(),$resultSet));
				//$entity->setestimado_detalle_Original($this->getEntityBaseResult("",$entity->getestimado_detalle_Original(),$resultSet));
								
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
		$entity = new estimado_detalle();		  
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
      	    	$entity = new estimado_detalle();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,estimado_detalle_data::$IS_WITH_SCHEMA);         		
				/*$entity=estimado_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setestimado_detalle_Original( new estimado_detalle());
				
				//$entity->setestimado_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getestimado_detalle_Original(),$resultSet,estimado_detalle_data::$IS_WITH_SCHEMA));         		
				////$entity->setestimado_detalle_Original(estimado_detalle_data::getEntityBaseResult("",$entity->getestimado_detalle_Original(),$resultSet));
				//$entity->setestimado_detalle_Original($this->getEntityBaseResult("",$entity->getestimado_detalle_Original(),$resultSet));
				
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
		$entity = new estimado_detalle();		  
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
      	    	$entity = new estimado_detalle();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,estimado_detalle_data::$IS_WITH_SCHEMA);         		
				/*$entity=estimado_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setestimado_detalle_Original( new estimado_detalle());				
				//$entity->setestimado_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getestimado_detalle_Original(),$resultSet,estimado_detalle_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setestimado_detalle_Original(estimado_detalle_data::getEntityBaseResult("",$entity->getestimado_detalle_Original(),$resultSet));
				//$entity->setestimado_detalle_Original($this->getEntityBaseResult("",$entity->getestimado_detalle_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=estimado_detalle_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,estimado_detalle $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,estimado_detalle_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,estimado_detalle_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getestimado(Connexion $connexion,$relestimado_detalle) : ?estimado{

		$estimado= new estimado();

		try {
			$estimadoDataAccess=new estimado_data();
			$estimadoDataAccess->isForFKData=$this->isForFKDataRels;
			$estimado=$estimadoDataAccess->getEntity($connexion,$relestimado_detalle->getid_estimado());

		} catch(Exception $e) {
			throw $e;
		}

		return $estimado;
	}


	public function  getbodega(Connexion $connexion,$relestimado_detalle) : ?bodega{

		$bodega= new bodega();

		try {
			$bodegaDataAccess=new bodega_data();
			$bodegaDataAccess->isForFKData=$this->isForFKDataRels;
			$bodega=$bodegaDataAccess->getEntity($connexion,$relestimado_detalle->getid_bodega());

		} catch(Exception $e) {
			throw $e;
		}

		return $bodega;
	}


	public function  getproducto(Connexion $connexion,$relestimado_detalle) : ?producto{

		$producto= new producto();

		try {
			$productoDataAccess=new producto_data();
			$productoDataAccess->isForFKData=$this->isForFKDataRels;
			$producto=$productoDataAccess->getEntity($connexion,$relestimado_detalle->getid_producto());

		} catch(Exception $e) {
			throw $e;
		}

		return $producto;
	}


	public function  getunidad(Connexion $connexion,$relestimado_detalle) : ?unidad{

		$unidad= new unidad();

		try {
			$unidadDataAccess=new unidad_data();
			$unidadDataAccess->isForFKData=$this->isForFKDataRels;
			$unidad=$unidadDataAccess->getEntity($connexion,$relestimado_detalle->getid_unidad());

		} catch(Exception $e) {
			throw $e;
		}

		return $unidad;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,estimado_detalle $entity,$resultSet) : estimado_detalle {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_estimado((int)$resultSet[$strPrefijo.'id_estimado']);
				$entity->setid_bodega((int)$resultSet[$strPrefijo.'id_bodega']);
				$entity->setid_producto((int)$resultSet[$strPrefijo.'id_producto']);
				$entity->setid_unidad((int)$resultSet[$strPrefijo.'id_unidad']);
				$entity->setcantidad((float)$resultSet[$strPrefijo.'cantidad']);
				$entity->setprecio((float)$resultSet[$strPrefijo.'precio']);
				$entity->setdescuento_porciento((float)$resultSet[$strPrefijo.'descuento_porciento']);
				$entity->setdescuento_monto((float)$resultSet[$strPrefijo.'descuento_monto']);
				$entity->setsub_total((float)$resultSet[$strPrefijo.'sub_total']);
				$entity->setiva_porciento((float)$resultSet[$strPrefijo.'iva_porciento']);
				$entity->setiva_monto((float)$resultSet[$strPrefijo.'iva_monto']);
				$entity->settotal((float)$resultSet[$strPrefijo.'total']);
				$entity->setrecibido((float)$resultSet[$strPrefijo.'recibido']);
				$entity->setobservacion(utf8_encode($resultSet[$strPrefijo.'observacion']));
				$entity->setimpuesto2_porciento((float)$resultSet[$strPrefijo.'impuesto2_porciento']);
				$entity->setimpuesto2_monto((float)$resultSet[$strPrefijo.'impuesto2_monto']);
				$entity->setcotizacion((float)$resultSet[$strPrefijo.'cotizacion']);
				$entity->setmoneda((int)$resultSet[$strPrefijo.'moneda']);
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,estimado_detalle $estimado_detalle,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $estimado_detalle->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiidddddddddsdddi', $estimado_detalle->getid_estimado(),$estimado_detalle->getid_bodega(),$estimado_detalle->getid_producto(),$estimado_detalle->getid_unidad(),$estimado_detalle->getcantidad(),$estimado_detalle->getprecio(),$estimado_detalle->getdescuento_porciento(),$estimado_detalle->getdescuento_monto(),$estimado_detalle->getsub_total(),$estimado_detalle->getiva_porciento(),$estimado_detalle->getiva_monto(),$estimado_detalle->gettotal(),$estimado_detalle->getrecibido(),$estimado_detalle->getobservacion(),$estimado_detalle->getimpuesto2_porciento(),$estimado_detalle->getimpuesto2_monto(),$estimado_detalle->getcotizacion(),$estimado_detalle->getmoneda());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiidddddddddsdddiis', $estimado_detalle->getid_estimado(),$estimado_detalle->getid_bodega(),$estimado_detalle->getid_producto(),$estimado_detalle->getid_unidad(),$estimado_detalle->getcantidad(),$estimado_detalle->getprecio(),$estimado_detalle->getdescuento_porciento(),$estimado_detalle->getdescuento_monto(),$estimado_detalle->getsub_total(),$estimado_detalle->getiva_porciento(),$estimado_detalle->getiva_monto(),$estimado_detalle->gettotal(),$estimado_detalle->getrecibido(),$estimado_detalle->getobservacion(),$estimado_detalle->getimpuesto2_porciento(),$estimado_detalle->getimpuesto2_monto(),$estimado_detalle->getcotizacion(),$estimado_detalle->getmoneda(), $estimado_detalle->getId(), Funciones::GetRealScapeString($estimado_detalle->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,estimado_detalle $estimado_detalle,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($estimado_detalle->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($estimado_detalle->getid_estimado(),$estimado_detalle->getid_bodega(),$estimado_detalle->getid_producto(),$estimado_detalle->getid_unidad(),$estimado_detalle->getcantidad(),$estimado_detalle->getprecio(),$estimado_detalle->getdescuento_porciento(),$estimado_detalle->getdescuento_monto(),$estimado_detalle->getsub_total(),$estimado_detalle->getiva_porciento(),$estimado_detalle->getiva_monto(),$estimado_detalle->gettotal(),$estimado_detalle->getrecibido(),Funciones::GetRealScapeString($estimado_detalle->getobservacion(),$connexion),$estimado_detalle->getimpuesto2_porciento(),$estimado_detalle->getimpuesto2_monto(),$estimado_detalle->getcotizacion(),$estimado_detalle->getmoneda());
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($estimado_detalle->getid_estimado(),$estimado_detalle->getid_bodega(),$estimado_detalle->getid_producto(),$estimado_detalle->getid_unidad(),$estimado_detalle->getcantidad(),$estimado_detalle->getprecio(),$estimado_detalle->getdescuento_porciento(),$estimado_detalle->getdescuento_monto(),$estimado_detalle->getsub_total(),$estimado_detalle->getiva_porciento(),$estimado_detalle->getiva_monto(),$estimado_detalle->gettotal(),$estimado_detalle->getrecibido(),Funciones::GetRealScapeString($estimado_detalle->getobservacion(),$connexion),$estimado_detalle->getimpuesto2_porciento(),$estimado_detalle->getimpuesto2_monto(),$estimado_detalle->getcotizacion(),$estimado_detalle->getmoneda(), $estimado_detalle->getId(), Funciones::GetRealScapeString($estimado_detalle->getVersionRow(),$connexion));
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
	
	public function setestimado_detalle_Original(estimado_detalle $estimado_detalle) {
		$estimado_detalle->setestimado_detalle_Original(clone $estimado_detalle);		
	}
	
	public function setestimado_detalles_Original(array $estimado_detalles) {
		foreach($estimado_detalles as $estimado_detalle){
			$estimado_detalle->setestimado_detalle_Original(clone $estimado_detalle);
		}
	}
	
	public static function setestimado_detalle_OriginalStatic(estimado_detalle $estimado_detalle) {
		$estimado_detalle->setestimado_detalle_Original(clone $estimado_detalle);		
	}
	
	public static function setestimado_detalles_OriginalStatic(array $estimado_detalles) {		
		foreach($estimado_detalles as $estimado_detalle){
			$estimado_detalle->setestimado_detalle_Original(clone $estimado_detalle);
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
