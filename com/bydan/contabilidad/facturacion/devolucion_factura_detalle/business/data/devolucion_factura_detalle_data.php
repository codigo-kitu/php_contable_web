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
namespace com\bydan\contabilidad\facturacion\devolucion_factura_detalle\business\data;

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

use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\business\entity\devolucion_factura_detalle;

//FK


use com\bydan\contabilidad\facturacion\devolucion_factura\business\data\devolucion_factura_data;
use com\bydan\contabilidad\facturacion\devolucion_factura\business\entity\devolucion_factura;

use com\bydan\contabilidad\inventario\bodega\business\data\bodega_data;
use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;

use com\bydan\contabilidad\inventario\producto\business\data\producto_data;
use com\bydan\contabilidad\inventario\producto\business\entity\producto;

use com\bydan\contabilidad\inventario\unidad\business\data\unidad_data;
use com\bydan\contabilidad\inventario\unidad\business\entity\unidad;

//REL



class devolucion_factura_detalle_data extends GetEntitiesDataAccessHelper implements devolucion_factura_detalle_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='fac_';
	public static string $TABLE_NAME='fac_devolucion_factura_detalle';			
	public static string $TABLE_NAME_devolucion_factura_detalle='devolucion_factura_detalle';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_DEVOLUCION_FACTURA_DETALLE_INSERT(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_DEVOLUCION_FACTURA_DETALLE_UPDATE(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_DEVOLUCION_FACTURA_DETALLE_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_DEVOLUCION_FACTURA_DETALLE_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $devolucion_factura_detalle_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'devolucion_factura_detalle';
		
		devolucion_factura_detalle_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('FACTURACION');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->devolucion_factura_detalle_DataAccessAdditional=new devolucion_factura_detalleDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_devolucion_factura,id_bodega,id_producto,id_unidad,cantidad,precio,descuento_porciento,descuento_monto,sub_total,iva_porciento,iva_monto,total,recibido,observacion,impuesto2_porciento,impuesto2_monto,cotizacion) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%s,%d,%d,%d,%f,%f,%f,%f,%f,%f,%f,%f,%f,\'%s\',%f,%f,%f)';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_devolucion_factura=%s,id_bodega=%d,id_producto=%d,id_unidad=%d,cantidad=%f,precio=%f,descuento_porciento=%f,descuento_monto=%f,sub_total=%f,iva_porciento=%f,iva_monto=%f,total=%f,recibido=%f,observacion=\'%s\',impuesto2_porciento=%f,impuesto2_monto=%f,cotizacion=%f where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_devolucion_factura,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_bodega,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_unidad,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cantidad,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.precio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descuento_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descuento_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.sub_total,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.iva_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.iva_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.total,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.recibido,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.observacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.impuesto2_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.impuesto2_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cotizacion from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(devolucion_factura_detalle $devolucion_factura_detalle,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($devolucion_factura_detalle->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=devolucion_factura_detalle_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($devolucion_factura_detalle->getId(),$connexion));				
				
			} else if ($devolucion_factura_detalle->getIsChanged()) {
				if($devolucion_factura_detalle->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=devolucion_factura_detalle_data::$QUERY_INSERT;
					
					
					
					

					//$id_devolucion_factura='null';
					//if($devolucion_factura_detalle->getid_devolucion_factura()!==null && $devolucion_factura_detalle->getid_devolucion_factura()>=0) {
						//$id_devolucion_factura=$devolucion_factura_detalle->getid_devolucion_factura();
					//} else {
						//$id_devolucion_factura='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$devolucion_factura_detalle->getid_devolucion_factura(),$devolucion_factura_detalle->getid_bodega(),$devolucion_factura_detalle->getid_producto(),$devolucion_factura_detalle->getid_unidad(),$devolucion_factura_detalle->getcantidad(),$devolucion_factura_detalle->getprecio(),$devolucion_factura_detalle->getdescuento_porciento(),$devolucion_factura_detalle->getdescuento_monto(),$devolucion_factura_detalle->getsub_total(),$devolucion_factura_detalle->getiva_porciento(),$devolucion_factura_detalle->getiva_monto(),$devolucion_factura_detalle->gettotal(),$devolucion_factura_detalle->getrecibido(),Funciones::GetRealScapeString($devolucion_factura_detalle->getobservacion(),$connexion),$devolucion_factura_detalle->getimpuesto2_porciento(),$devolucion_factura_detalle->getimpuesto2_monto(),$devolucion_factura_detalle->getcotizacion() );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=devolucion_factura_detalle_data::$QUERY_UPDATE;			
					
					
					
					

					//$id_devolucion_factura='null';
					//if($devolucion_factura_detalle->getid_devolucion_factura()!==null && $devolucion_factura_detalle->getid_devolucion_factura()>=0) {
						//$id_devolucion_factura=$devolucion_factura_detalle->getid_devolucion_factura();
					//} else {
						//$id_devolucion_factura='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$devolucion_factura_detalle->getid_devolucion_factura(),$devolucion_factura_detalle->getid_bodega(),$devolucion_factura_detalle->getid_producto(),$devolucion_factura_detalle->getid_unidad(),$devolucion_factura_detalle->getcantidad(),$devolucion_factura_detalle->getprecio(),$devolucion_factura_detalle->getdescuento_porciento(),$devolucion_factura_detalle->getdescuento_monto(),$devolucion_factura_detalle->getsub_total(),$devolucion_factura_detalle->getiva_porciento(),$devolucion_factura_detalle->getiva_monto(),$devolucion_factura_detalle->gettotal(),$devolucion_factura_detalle->getrecibido(),Funciones::GetRealScapeString($devolucion_factura_detalle->getobservacion(),$connexion),$devolucion_factura_detalle->getimpuesto2_porciento(),$devolucion_factura_detalle->getimpuesto2_monto(),$devolucion_factura_detalle->getcotizacion(), Funciones::GetRealScapeString($devolucion_factura_detalle->getId(),$connexion), Funciones::GetRealScapeString($devolucion_factura_detalle->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($devolucion_factura_detalle, $connexion,$strQuerySaveComplete,devolucion_factura_detalle_data::$TABLE_NAME,devolucion_factura_detalle_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				devolucion_factura_detalle_data::savePrepared($devolucion_factura_detalle, $connexion,$strQuerySave,devolucion_factura_detalle_data::$TABLE_NAME,devolucion_factura_detalle_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			devolucion_factura_detalle_data::setdevolucion_factura_detalle_OriginalStatic($devolucion_factura_detalle);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(devolucion_factura_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				devolucion_factura_detalle_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					devolucion_factura_detalle_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					devolucion_factura_detalle_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(devolucion_factura_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					devolucion_factura_detalle_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(devolucion_factura_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					devolucion_factura_detalle_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(devolucion_factura_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					devolucion_factura_detalle_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?devolucion_factura_detalle {		
		$entity = new devolucion_factura_detalle();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=devolucion_factura_detalle_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=devolucion_factura_detalle_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//Facturacion.devolucion_factura_detalle.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setdevolucion_factura_detalle_Original(new devolucion_factura_detalle());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,devolucion_factura_detalle_data::$IS_WITH_SCHEMA);         	    
				/*$entity=devolucion_factura_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setdevolucion_factura_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getdevolucion_factura_detalle_Original(),$resultSet,devolucion_factura_detalle_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setdevolucion_factura_detalle_Original(devolucion_factura_detalle_data::getEntityBaseResult("",$entity->getdevolucion_factura_detalle_Original(),$resultSet));
				//$entity->setdevolucion_factura_detalle_Original($this->getEntityBaseResult("",$entity->getdevolucion_factura_detalle_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?devolucion_factura_detalle {
		$entity = new devolucion_factura_detalle();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=devolucion_factura_detalle_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=devolucion_factura_detalle_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,devolucion_factura_detalle_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".Facturacion.devolucion_factura_detalle.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setdevolucion_factura_detalle_Original(new devolucion_factura_detalle());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,devolucion_factura_detalle_data::$IS_WITH_SCHEMA);         	    
				/*$entity=devolucion_factura_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setdevolucion_factura_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getdevolucion_factura_detalle_Original(),$resultSet,devolucion_factura_detalle_data::$IS_WITH_SCHEMA));         		
				////$entity->setdevolucion_factura_detalle_Original(devolucion_factura_detalle_data::getEntityBaseResult("",$entity->getdevolucion_factura_detalle_Original(),$resultSet));
				//$entity->setdevolucion_factura_detalle_Original($this->getEntityBaseResult("",$entity->getdevolucion_factura_detalle_Original(),$resultSet));
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
		$entity = new devolucion_factura_detalle();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=devolucion_factura_detalle_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=devolucion_factura_detalle_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,devolucion_factura_detalle_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new devolucion_factura_detalle();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,devolucion_factura_detalle_data::$IS_WITH_SCHEMA);         		
				/*$entity=devolucion_factura_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setdevolucion_factura_detalle_Original( new devolucion_factura_detalle());
				
				//$entity->setdevolucion_factura_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getdevolucion_factura_detalle_Original(),$resultSet,devolucion_factura_detalle_data::$IS_WITH_SCHEMA));         		
				////$entity->setdevolucion_factura_detalle_Original(devolucion_factura_detalle_data::getEntityBaseResult("",$entity->getdevolucion_factura_detalle_Original(),$resultSet));
				//$entity->setdevolucion_factura_detalle_Original($this->getEntityBaseResult("",$entity->getdevolucion_factura_detalle_Original(),$resultSet));
								
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
		$entity = new devolucion_factura_detalle();		  
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
      	    	$entity = new devolucion_factura_detalle();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,devolucion_factura_detalle_data::$IS_WITH_SCHEMA);         		
				/*$entity=devolucion_factura_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setdevolucion_factura_detalle_Original( new devolucion_factura_detalle());
				
				//$entity->setdevolucion_factura_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getdevolucion_factura_detalle_Original(),$resultSet,devolucion_factura_detalle_data::$IS_WITH_SCHEMA));         		
				////$entity->setdevolucion_factura_detalle_Original(devolucion_factura_detalle_data::getEntityBaseResult("",$entity->getdevolucion_factura_detalle_Original(),$resultSet));
				//$entity->setdevolucion_factura_detalle_Original($this->getEntityBaseResult("",$entity->getdevolucion_factura_detalle_Original(),$resultSet));
				
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
		$entity = new devolucion_factura_detalle();		  
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
      	    	$entity = new devolucion_factura_detalle();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,devolucion_factura_detalle_data::$IS_WITH_SCHEMA);         		
				/*$entity=devolucion_factura_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setdevolucion_factura_detalle_Original( new devolucion_factura_detalle());				
				//$entity->setdevolucion_factura_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getdevolucion_factura_detalle_Original(),$resultSet,devolucion_factura_detalle_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setdevolucion_factura_detalle_Original(devolucion_factura_detalle_data::getEntityBaseResult("",$entity->getdevolucion_factura_detalle_Original(),$resultSet));
				//$entity->setdevolucion_factura_detalle_Original($this->getEntityBaseResult("",$entity->getdevolucion_factura_detalle_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=devolucion_factura_detalle_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,devolucion_factura_detalle $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,devolucion_factura_detalle_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,devolucion_factura_detalle_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getdevolucion_factura(Connexion $connexion,$reldevolucion_factura_detalle) : ?devolucion_factura{

		$devolucion_factura= new devolucion_factura();

		try {
			$devolucion_facturaDataAccess=new devolucion_factura_data();
			$devolucion_facturaDataAccess->isForFKData=$this->isForFKDataRels;
			$devolucion_factura=$devolucion_facturaDataAccess->getEntity($connexion,$reldevolucion_factura_detalle->getid_devolucion_factura());

		} catch(Exception $e) {
			throw $e;
		}

		return $devolucion_factura;
	}


	public function  getbodega(Connexion $connexion,$reldevolucion_factura_detalle) : ?bodega{

		$bodega= new bodega();

		try {
			$bodegaDataAccess=new bodega_data();
			$bodegaDataAccess->isForFKData=$this->isForFKDataRels;
			$bodega=$bodegaDataAccess->getEntity($connexion,$reldevolucion_factura_detalle->getid_bodega());

		} catch(Exception $e) {
			throw $e;
		}

		return $bodega;
	}


	public function  getproducto(Connexion $connexion,$reldevolucion_factura_detalle) : ?producto{

		$producto= new producto();

		try {
			$productoDataAccess=new producto_data();
			$productoDataAccess->isForFKData=$this->isForFKDataRels;
			$producto=$productoDataAccess->getEntity($connexion,$reldevolucion_factura_detalle->getid_producto());

		} catch(Exception $e) {
			throw $e;
		}

		return $producto;
	}


	public function  getunidad(Connexion $connexion,$reldevolucion_factura_detalle) : ?unidad{

		$unidad= new unidad();

		try {
			$unidadDataAccess=new unidad_data();
			$unidadDataAccess->isForFKData=$this->isForFKDataRels;
			$unidad=$unidadDataAccess->getEntity($connexion,$reldevolucion_factura_detalle->getid_unidad());

		} catch(Exception $e) {
			throw $e;
		}

		return $unidad;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,devolucion_factura_detalle $entity,$resultSet) : devolucion_factura_detalle {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_devolucion_factura((int)$resultSet[$strPrefijo.'id_devolucion_factura']);
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
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,devolucion_factura_detalle $devolucion_factura_detalle,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $devolucion_factura_detalle->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiidddddddddsddd', $devolucion_factura_detalle->getid_devolucion_factura(),$devolucion_factura_detalle->getid_bodega(),$devolucion_factura_detalle->getid_producto(),$devolucion_factura_detalle->getid_unidad(),$devolucion_factura_detalle->getcantidad(),$devolucion_factura_detalle->getprecio(),$devolucion_factura_detalle->getdescuento_porciento(),$devolucion_factura_detalle->getdescuento_monto(),$devolucion_factura_detalle->getsub_total(),$devolucion_factura_detalle->getiva_porciento(),$devolucion_factura_detalle->getiva_monto(),$devolucion_factura_detalle->gettotal(),$devolucion_factura_detalle->getrecibido(),$devolucion_factura_detalle->getobservacion(),$devolucion_factura_detalle->getimpuesto2_porciento(),$devolucion_factura_detalle->getimpuesto2_monto(),$devolucion_factura_detalle->getcotizacion());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiidddddddddsdddis', $devolucion_factura_detalle->getid_devolucion_factura(),$devolucion_factura_detalle->getid_bodega(),$devolucion_factura_detalle->getid_producto(),$devolucion_factura_detalle->getid_unidad(),$devolucion_factura_detalle->getcantidad(),$devolucion_factura_detalle->getprecio(),$devolucion_factura_detalle->getdescuento_porciento(),$devolucion_factura_detalle->getdescuento_monto(),$devolucion_factura_detalle->getsub_total(),$devolucion_factura_detalle->getiva_porciento(),$devolucion_factura_detalle->getiva_monto(),$devolucion_factura_detalle->gettotal(),$devolucion_factura_detalle->getrecibido(),$devolucion_factura_detalle->getobservacion(),$devolucion_factura_detalle->getimpuesto2_porciento(),$devolucion_factura_detalle->getimpuesto2_monto(),$devolucion_factura_detalle->getcotizacion(), $devolucion_factura_detalle->getId(), Funciones::GetRealScapeString($devolucion_factura_detalle->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,devolucion_factura_detalle $devolucion_factura_detalle,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($devolucion_factura_detalle->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($devolucion_factura_detalle->getid_devolucion_factura(),$devolucion_factura_detalle->getid_bodega(),$devolucion_factura_detalle->getid_producto(),$devolucion_factura_detalle->getid_unidad(),$devolucion_factura_detalle->getcantidad(),$devolucion_factura_detalle->getprecio(),$devolucion_factura_detalle->getdescuento_porciento(),$devolucion_factura_detalle->getdescuento_monto(),$devolucion_factura_detalle->getsub_total(),$devolucion_factura_detalle->getiva_porciento(),$devolucion_factura_detalle->getiva_monto(),$devolucion_factura_detalle->gettotal(),$devolucion_factura_detalle->getrecibido(),Funciones::GetRealScapeString($devolucion_factura_detalle->getobservacion(),$connexion),$devolucion_factura_detalle->getimpuesto2_porciento(),$devolucion_factura_detalle->getimpuesto2_monto(),$devolucion_factura_detalle->getcotizacion());
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($devolucion_factura_detalle->getid_devolucion_factura(),$devolucion_factura_detalle->getid_bodega(),$devolucion_factura_detalle->getid_producto(),$devolucion_factura_detalle->getid_unidad(),$devolucion_factura_detalle->getcantidad(),$devolucion_factura_detalle->getprecio(),$devolucion_factura_detalle->getdescuento_porciento(),$devolucion_factura_detalle->getdescuento_monto(),$devolucion_factura_detalle->getsub_total(),$devolucion_factura_detalle->getiva_porciento(),$devolucion_factura_detalle->getiva_monto(),$devolucion_factura_detalle->gettotal(),$devolucion_factura_detalle->getrecibido(),Funciones::GetRealScapeString($devolucion_factura_detalle->getobservacion(),$connexion),$devolucion_factura_detalle->getimpuesto2_porciento(),$devolucion_factura_detalle->getimpuesto2_monto(),$devolucion_factura_detalle->getcotizacion(), $devolucion_factura_detalle->getId(), Funciones::GetRealScapeString($devolucion_factura_detalle->getVersionRow(),$connexion));
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
	
	public function setdevolucion_factura_detalle_Original(devolucion_factura_detalle $devolucion_factura_detalle) {
		$devolucion_factura_detalle->setdevolucion_factura_detalle_Original(clone $devolucion_factura_detalle);		
	}
	
	public function setdevolucion_factura_detalles_Original(array $devolucion_factura_detalles) {
		foreach($devolucion_factura_detalles as $devolucion_factura_detalle){
			$devolucion_factura_detalle->setdevolucion_factura_detalle_Original(clone $devolucion_factura_detalle);
		}
	}
	
	public static function setdevolucion_factura_detalle_OriginalStatic(devolucion_factura_detalle $devolucion_factura_detalle) {
		$devolucion_factura_detalle->setdevolucion_factura_detalle_Original(clone $devolucion_factura_detalle);		
	}
	
	public static function setdevolucion_factura_detalles_OriginalStatic(array $devolucion_factura_detalles) {		
		foreach($devolucion_factura_detalles as $devolucion_factura_detalle){
			$devolucion_factura_detalle->setdevolucion_factura_detalle_Original(clone $devolucion_factura_detalle);
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
