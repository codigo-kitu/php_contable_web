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
namespace com\bydan\contabilidad\inventario\cotizacion_detalle\business\data;

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

use com\bydan\contabilidad\inventario\cotizacion_detalle\business\entity\cotizacion_detalle;

//FK


use com\bydan\contabilidad\inventario\cotizacion\business\data\cotizacion_data;
use com\bydan\contabilidad\inventario\cotizacion\business\entity\cotizacion;

use com\bydan\contabilidad\inventario\bodega\business\data\bodega_data;
use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;

use com\bydan\contabilidad\inventario\producto\business\data\producto_data;
use com\bydan\contabilidad\inventario\producto\business\entity\producto;

use com\bydan\contabilidad\inventario\unidad\business\data\unidad_data;
use com\bydan\contabilidad\inventario\unidad\business\entity\unidad;

use com\bydan\contabilidad\inventario\otro_suplidor\business\data\otro_suplidor_data;
use com\bydan\contabilidad\inventario\otro_suplidor\business\entity\otro_suplidor;

//REL



class cotizacion_detalle_data extends GetEntitiesDataAccessHelper implements cotizacion_detalle_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='inv_';
	public static string $TABLE_NAME='inv_cotizacion_detalle';			
	public static string $TABLE_NAME_cotizacion_detalle='cotizacion_detalle';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_COTIZACION_DETALLE_INSERT(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_COTIZACION_DETALLE_UPDATE(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_COTIZACION_DETALLE_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_COTIZACION_DETALLE_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $cotizacion_detalle_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'cotizacion_detalle';
		
		cotizacion_detalle_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('INVENTARIO');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cotizacion_detalle_DataAccessAdditional=new cotizacion_detalleDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_cotizacion,id_bodega,id_producto,id_unidad,cantidad,precio,descuento_porciento,descuento_monto,sub_total,iva_porciento,iva_monto,total,observacion,impuesto2_porciento,impuesto2_monto,id_otro_suplidor) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%s,%d,%d,%d,%f,%f,%f,%f,%f,%f,%f,%f,\'%s\',%f,%f,%s)';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_cotizacion=%s,id_bodega=%d,id_producto=%d,id_unidad=%d,cantidad=%f,precio=%f,descuento_porciento=%f,descuento_monto=%f,sub_total=%f,iva_porciento=%f,iva_monto=%f,total=%f,observacion=\'%s\',impuesto2_porciento=%f,impuesto2_monto=%f,id_otro_suplidor=%s where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cotizacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_bodega,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_unidad,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cantidad,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.precio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descuento_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descuento_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.sub_total,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.iva_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.iva_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.total,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.observacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.impuesto2_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.impuesto2_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_otro_suplidor from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(cotizacion_detalle $cotizacion_detalle,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($cotizacion_detalle->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=cotizacion_detalle_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($cotizacion_detalle->getId(),$connexion));				
				
			} else if ($cotizacion_detalle->getIsChanged()) {
				if($cotizacion_detalle->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=cotizacion_detalle_data::$QUERY_INSERT;
					
					
					
					

					//$id_cotizacion='null';
					//if($cotizacion_detalle->getid_cotizacion()!==null && $cotizacion_detalle->getid_cotizacion()>=0) {
						//$id_cotizacion=$cotizacion_detalle->getid_cotizacion();
					//} else {
						//$id_cotizacion='null';
					//}

					//$id_otro_suplidor='null';
					//if($cotizacion_detalle->getid_otro_suplidor()!==null && $cotizacion_detalle->getid_otro_suplidor()>=0) {
						//$id_otro_suplidor=$cotizacion_detalle->getid_otro_suplidor();
					//} else {
						//$id_otro_suplidor='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$cotizacion_detalle->getid_cotizacion(),$cotizacion_detalle->getid_bodega(),$cotizacion_detalle->getid_producto(),$cotizacion_detalle->getid_unidad(),$cotizacion_detalle->getcantidad(),$cotizacion_detalle->getprecio(),$cotizacion_detalle->getdescuento_porciento(),$cotizacion_detalle->getdescuento_monto(),$cotizacion_detalle->getsub_total(),$cotizacion_detalle->getiva_porciento(),$cotizacion_detalle->getiva_monto(),$cotizacion_detalle->gettotal(),Funciones::GetRealScapeString($cotizacion_detalle->getobservacion(),$connexion),$cotizacion_detalle->getimpuesto2_porciento(),$cotizacion_detalle->getimpuesto2_monto(),Funciones::GetNullString($cotizacion_detalle->getid_otro_suplidor()) );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=cotizacion_detalle_data::$QUERY_UPDATE;			
					
					
					
					

					//$id_cotizacion='null';
					//if($cotizacion_detalle->getid_cotizacion()!==null && $cotizacion_detalle->getid_cotizacion()>=0) {
						//$id_cotizacion=$cotizacion_detalle->getid_cotizacion();
					//} else {
						//$id_cotizacion='null';
					//}

					//$id_otro_suplidor='null';
					//if($cotizacion_detalle->getid_otro_suplidor()!==null && $cotizacion_detalle->getid_otro_suplidor()>=0) {
						//$id_otro_suplidor=$cotizacion_detalle->getid_otro_suplidor();
					//} else {
						//$id_otro_suplidor='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$cotizacion_detalle->getid_cotizacion(),$cotizacion_detalle->getid_bodega(),$cotizacion_detalle->getid_producto(),$cotizacion_detalle->getid_unidad(),$cotizacion_detalle->getcantidad(),$cotizacion_detalle->getprecio(),$cotizacion_detalle->getdescuento_porciento(),$cotizacion_detalle->getdescuento_monto(),$cotizacion_detalle->getsub_total(),$cotizacion_detalle->getiva_porciento(),$cotizacion_detalle->getiva_monto(),$cotizacion_detalle->gettotal(),Funciones::GetRealScapeString($cotizacion_detalle->getobservacion(),$connexion),$cotizacion_detalle->getimpuesto2_porciento(),$cotizacion_detalle->getimpuesto2_monto(),Funciones::GetNullString($cotizacion_detalle->getid_otro_suplidor()), Funciones::GetRealScapeString($cotizacion_detalle->getId(),$connexion), Funciones::GetRealScapeString($cotizacion_detalle->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($cotizacion_detalle, $connexion,$strQuerySaveComplete,cotizacion_detalle_data::$TABLE_NAME,cotizacion_detalle_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				cotizacion_detalle_data::savePrepared($cotizacion_detalle, $connexion,$strQuerySave,cotizacion_detalle_data::$TABLE_NAME,cotizacion_detalle_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			cotizacion_detalle_data::setcotizacion_detalle_OriginalStatic($cotizacion_detalle);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(cotizacion_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				cotizacion_detalle_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					cotizacion_detalle_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					cotizacion_detalle_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(cotizacion_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					cotizacion_detalle_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(cotizacion_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					cotizacion_detalle_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(cotizacion_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					cotizacion_detalle_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?cotizacion_detalle {		
		$entity = new cotizacion_detalle();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=cotizacion_detalle_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=cotizacion_detalle_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//Inventario.cotizacion_detalle.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setcotizacion_detalle_Original(new cotizacion_detalle());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cotizacion_detalle_data::$IS_WITH_SCHEMA);         	    
				/*$entity=cotizacion_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setcotizacion_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getcotizacion_detalle_Original(),$resultSet,cotizacion_detalle_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setcotizacion_detalle_Original(cotizacion_detalle_data::getEntityBaseResult("",$entity->getcotizacion_detalle_Original(),$resultSet));
				//$entity->setcotizacion_detalle_Original($this->getEntityBaseResult("",$entity->getcotizacion_detalle_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?cotizacion_detalle {
		$entity = new cotizacion_detalle();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=cotizacion_detalle_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=cotizacion_detalle_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,cotizacion_detalle_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".Inventario.cotizacion_detalle.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setcotizacion_detalle_Original(new cotizacion_detalle());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cotizacion_detalle_data::$IS_WITH_SCHEMA);         	    
				/*$entity=cotizacion_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setcotizacion_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getcotizacion_detalle_Original(),$resultSet,cotizacion_detalle_data::$IS_WITH_SCHEMA));         		
				////$entity->setcotizacion_detalle_Original(cotizacion_detalle_data::getEntityBaseResult("",$entity->getcotizacion_detalle_Original(),$resultSet));
				//$entity->setcotizacion_detalle_Original($this->getEntityBaseResult("",$entity->getcotizacion_detalle_Original(),$resultSet));
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
		$entity = new cotizacion_detalle();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=cotizacion_detalle_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=cotizacion_detalle_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,cotizacion_detalle_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new cotizacion_detalle();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cotizacion_detalle_data::$IS_WITH_SCHEMA);         		
				/*$entity=cotizacion_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setcotizacion_detalle_Original( new cotizacion_detalle());
				
				//$entity->setcotizacion_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getcotizacion_detalle_Original(),$resultSet,cotizacion_detalle_data::$IS_WITH_SCHEMA));         		
				////$entity->setcotizacion_detalle_Original(cotizacion_detalle_data::getEntityBaseResult("",$entity->getcotizacion_detalle_Original(),$resultSet));
				//$entity->setcotizacion_detalle_Original($this->getEntityBaseResult("",$entity->getcotizacion_detalle_Original(),$resultSet));
								
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
		$entity = new cotizacion_detalle();		  
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
      	    	$entity = new cotizacion_detalle();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cotizacion_detalle_data::$IS_WITH_SCHEMA);         		
				/*$entity=cotizacion_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setcotizacion_detalle_Original( new cotizacion_detalle());
				
				//$entity->setcotizacion_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getcotizacion_detalle_Original(),$resultSet,cotizacion_detalle_data::$IS_WITH_SCHEMA));         		
				////$entity->setcotizacion_detalle_Original(cotizacion_detalle_data::getEntityBaseResult("",$entity->getcotizacion_detalle_Original(),$resultSet));
				//$entity->setcotizacion_detalle_Original($this->getEntityBaseResult("",$entity->getcotizacion_detalle_Original(),$resultSet));
				
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
		$entity = new cotizacion_detalle();		  
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
      	    	$entity = new cotizacion_detalle();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cotizacion_detalle_data::$IS_WITH_SCHEMA);         		
				/*$entity=cotizacion_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setcotizacion_detalle_Original( new cotizacion_detalle());				
				//$entity->setcotizacion_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getcotizacion_detalle_Original(),$resultSet,cotizacion_detalle_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setcotizacion_detalle_Original(cotizacion_detalle_data::getEntityBaseResult("",$entity->getcotizacion_detalle_Original(),$resultSet));
				//$entity->setcotizacion_detalle_Original($this->getEntityBaseResult("",$entity->getcotizacion_detalle_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=cotizacion_detalle_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,cotizacion_detalle $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,cotizacion_detalle_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,cotizacion_detalle_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getcotizacion(Connexion $connexion,$relcotizacion_detalle) : ?cotizacion{

		$cotizacion= new cotizacion();

		try {
			$cotizacionDataAccess=new cotizacion_data();
			$cotizacionDataAccess->isForFKData=$this->isForFKDataRels;
			$cotizacion=$cotizacionDataAccess->getEntity($connexion,$relcotizacion_detalle->getid_cotizacion());

		} catch(Exception $e) {
			throw $e;
		}

		return $cotizacion;
	}


	public function  getbodega(Connexion $connexion,$relcotizacion_detalle) : ?bodega{

		$bodega= new bodega();

		try {
			$bodegaDataAccess=new bodega_data();
			$bodegaDataAccess->isForFKData=$this->isForFKDataRels;
			$bodega=$bodegaDataAccess->getEntity($connexion,$relcotizacion_detalle->getid_bodega());

		} catch(Exception $e) {
			throw $e;
		}

		return $bodega;
	}


	public function  getproducto(Connexion $connexion,$relcotizacion_detalle) : ?producto{

		$producto= new producto();

		try {
			$productoDataAccess=new producto_data();
			$productoDataAccess->isForFKData=$this->isForFKDataRels;
			$producto=$productoDataAccess->getEntity($connexion,$relcotizacion_detalle->getid_producto());

		} catch(Exception $e) {
			throw $e;
		}

		return $producto;
	}


	public function  getunidad(Connexion $connexion,$relcotizacion_detalle) : ?unidad{

		$unidad= new unidad();

		try {
			$unidadDataAccess=new unidad_data();
			$unidadDataAccess->isForFKData=$this->isForFKDataRels;
			$unidad=$unidadDataAccess->getEntity($connexion,$relcotizacion_detalle->getid_unidad());

		} catch(Exception $e) {
			throw $e;
		}

		return $unidad;
	}


	public function  getotro_suplidor(Connexion $connexion,$relcotizacion_detalle) : ?otro_suplidor{

		$otro_suplidor= new otro_suplidor();

		try {
			$otro_suplidorDataAccess=new otro_suplidor_data();
			$otro_suplidorDataAccess->isForFKData=$this->isForFKDataRels;
			$otro_suplidor=$otro_suplidorDataAccess->getEntity($connexion,$relcotizacion_detalle->getid_otro_suplidor());

		} catch(Exception $e) {
			throw $e;
		}

		return $otro_suplidor;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,cotizacion_detalle $entity,$resultSet) : cotizacion_detalle {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_cotizacion((int)$resultSet[$strPrefijo.'id_cotizacion']);
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
				$entity->setobservacion(utf8_encode($resultSet[$strPrefijo.'observacion']));
				$entity->setimpuesto2_porciento((float)$resultSet[$strPrefijo.'impuesto2_porciento']);
				$entity->setimpuesto2_monto((float)$resultSet[$strPrefijo.'impuesto2_monto']);
				$entity->setid_otro_suplidor((int)$resultSet[$strPrefijo.'id_otro_suplidor']);
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,cotizacion_detalle $cotizacion_detalle,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $cotizacion_detalle->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiddddddddsddi', $cotizacion_detalle->getid_cotizacion(),$cotizacion_detalle->getid_bodega(),$cotizacion_detalle->getid_producto(),$cotizacion_detalle->getid_unidad(),$cotizacion_detalle->getcantidad(),$cotizacion_detalle->getprecio(),$cotizacion_detalle->getdescuento_porciento(),$cotizacion_detalle->getdescuento_monto(),$cotizacion_detalle->getsub_total(),$cotizacion_detalle->getiva_porciento(),$cotizacion_detalle->getiva_monto(),$cotizacion_detalle->gettotal(),$cotizacion_detalle->getobservacion(),$cotizacion_detalle->getimpuesto2_porciento(),$cotizacion_detalle->getimpuesto2_monto(),$cotizacion_detalle->getid_otro_suplidor());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiddddddddsddiis', $cotizacion_detalle->getid_cotizacion(),$cotizacion_detalle->getid_bodega(),$cotizacion_detalle->getid_producto(),$cotizacion_detalle->getid_unidad(),$cotizacion_detalle->getcantidad(),$cotizacion_detalle->getprecio(),$cotizacion_detalle->getdescuento_porciento(),$cotizacion_detalle->getdescuento_monto(),$cotizacion_detalle->getsub_total(),$cotizacion_detalle->getiva_porciento(),$cotizacion_detalle->getiva_monto(),$cotizacion_detalle->gettotal(),$cotizacion_detalle->getobservacion(),$cotizacion_detalle->getimpuesto2_porciento(),$cotizacion_detalle->getimpuesto2_monto(),$cotizacion_detalle->getid_otro_suplidor(), $cotizacion_detalle->getId(), Funciones::GetRealScapeString($cotizacion_detalle->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,cotizacion_detalle $cotizacion_detalle,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($cotizacion_detalle->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($cotizacion_detalle->getid_cotizacion(),$cotizacion_detalle->getid_bodega(),$cotizacion_detalle->getid_producto(),$cotizacion_detalle->getid_unidad(),$cotizacion_detalle->getcantidad(),$cotizacion_detalle->getprecio(),$cotizacion_detalle->getdescuento_porciento(),$cotizacion_detalle->getdescuento_monto(),$cotizacion_detalle->getsub_total(),$cotizacion_detalle->getiva_porciento(),$cotizacion_detalle->getiva_monto(),$cotizacion_detalle->gettotal(),Funciones::GetRealScapeString($cotizacion_detalle->getobservacion(),$connexion),$cotizacion_detalle->getimpuesto2_porciento(),$cotizacion_detalle->getimpuesto2_monto(),Funciones::GetNullString($cotizacion_detalle->getid_otro_suplidor()));
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($cotizacion_detalle->getid_cotizacion(),$cotizacion_detalle->getid_bodega(),$cotizacion_detalle->getid_producto(),$cotizacion_detalle->getid_unidad(),$cotizacion_detalle->getcantidad(),$cotizacion_detalle->getprecio(),$cotizacion_detalle->getdescuento_porciento(),$cotizacion_detalle->getdescuento_monto(),$cotizacion_detalle->getsub_total(),$cotizacion_detalle->getiva_porciento(),$cotizacion_detalle->getiva_monto(),$cotizacion_detalle->gettotal(),Funciones::GetRealScapeString($cotizacion_detalle->getobservacion(),$connexion),$cotizacion_detalle->getimpuesto2_porciento(),$cotizacion_detalle->getimpuesto2_monto(),Funciones::GetNullString($cotizacion_detalle->getid_otro_suplidor()), $cotizacion_detalle->getId(), Funciones::GetRealScapeString($cotizacion_detalle->getVersionRow(),$connexion));
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
	
	public function setcotizacion_detalle_Original(cotizacion_detalle $cotizacion_detalle) {
		$cotizacion_detalle->setcotizacion_detalle_Original(clone $cotizacion_detalle);		
	}
	
	public function setcotizacion_detalles_Original(array $cotizacion_detalles) {
		foreach($cotizacion_detalles as $cotizacion_detalle){
			$cotizacion_detalle->setcotizacion_detalle_Original(clone $cotizacion_detalle);
		}
	}
	
	public static function setcotizacion_detalle_OriginalStatic(cotizacion_detalle $cotizacion_detalle) {
		$cotizacion_detalle->setcotizacion_detalle_Original(clone $cotizacion_detalle);		
	}
	
	public static function setcotizacion_detalles_OriginalStatic(array $cotizacion_detalles) {		
		foreach($cotizacion_detalles as $cotizacion_detalle){
			$cotizacion_detalle->setcotizacion_detalle_Original(clone $cotizacion_detalle);
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
