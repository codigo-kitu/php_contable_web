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
namespace com\bydan\contabilidad\inventario\orden_compra_detalle\business\data;

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

use com\bydan\contabilidad\inventario\orden_compra_detalle\business\entity\orden_compra_detalle;

//FK


use com\bydan\contabilidad\inventario\orden_compra\business\data\orden_compra_data;
use com\bydan\contabilidad\inventario\orden_compra\business\entity\orden_compra;

use com\bydan\contabilidad\inventario\bodega\business\data\bodega_data;
use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;

use com\bydan\contabilidad\inventario\producto\business\data\producto_data;
use com\bydan\contabilidad\inventario\producto\business\entity\producto;

use com\bydan\contabilidad\inventario\unidad\business\data\unidad_data;
use com\bydan\contabilidad\inventario\unidad\business\entity\unidad;

//REL



class orden_compra_detalle_data extends GetEntitiesDataAccessHelper implements orden_compra_detalle_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='inv_';
	public static string $TABLE_NAME='inv_orden_compra_detalle';			
	public static string $TABLE_NAME_orden_compra_detalle='orden_compra_detalle';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_ORDEN_COMPRA_DETALLE_INSERT(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_ORDEN_COMPRA_DETALLE_UPDATE(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_ORDEN_COMPRA_DETALLE_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_ORDEN_COMPRA_DETALLE_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $orden_compra_detalle_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'orden_compra_detalle';
		
		orden_compra_detalle_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('INVENTARIO');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->orden_compra_detalle_DataAccessAdditional=new orden_compra_detalleDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_orden_compra,id_bodega,id_producto,id_unidad,cantidad,precio,sub_total,descuento_porciento,descuento_monto,iva_porciento,iva_monto,total,observacion,recibido,impuesto2_porciento,impuesto2_monto) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%s,%d,%d,%d,%f,%f,%f,%f,%f,%f,%f,%f,\'%s\',%f,%f,%f)';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_orden_compra=%s,id_bodega=%d,id_producto=%d,id_unidad=%d,cantidad=%f,precio=%f,sub_total=%f,descuento_porciento=%f,descuento_monto=%f,iva_porciento=%f,iva_monto=%f,total=%f,observacion=\'%s\',recibido=%f,impuesto2_porciento=%f,impuesto2_monto=%f where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_orden_compra,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_bodega,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_unidad,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cantidad,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.precio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.sub_total,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descuento_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descuento_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.iva_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.iva_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.total,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.observacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.recibido,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.impuesto2_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.impuesto2_monto from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(orden_compra_detalle $orden_compra_detalle,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($orden_compra_detalle->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=orden_compra_detalle_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($orden_compra_detalle->getId(),$connexion));				
				
			} else if ($orden_compra_detalle->getIsChanged()) {
				if($orden_compra_detalle->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=orden_compra_detalle_data::$QUERY_INSERT;
					
					
					
					

					//$id_orden_compra='null';
					//if($orden_compra_detalle->getid_orden_compra()!==null && $orden_compra_detalle->getid_orden_compra()>=0) {
						//$id_orden_compra=$orden_compra_detalle->getid_orden_compra();
					//} else {
						//$id_orden_compra='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$orden_compra_detalle->getid_orden_compra(),$orden_compra_detalle->getid_bodega(),$orden_compra_detalle->getid_producto(),$orden_compra_detalle->getid_unidad(),$orden_compra_detalle->getcantidad(),$orden_compra_detalle->getprecio(),$orden_compra_detalle->getsub_total(),$orden_compra_detalle->getdescuento_porciento(),$orden_compra_detalle->getdescuento_monto(),$orden_compra_detalle->getiva_porciento(),$orden_compra_detalle->getiva_monto(),$orden_compra_detalle->gettotal(),Funciones::GetRealScapeString($orden_compra_detalle->getobservacion(),$connexion),$orden_compra_detalle->getrecibido(),$orden_compra_detalle->getimpuesto2_porciento(),$orden_compra_detalle->getimpuesto2_monto() );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=orden_compra_detalle_data::$QUERY_UPDATE;			
					
					
					
					

					//$id_orden_compra='null';
					//if($orden_compra_detalle->getid_orden_compra()!==null && $orden_compra_detalle->getid_orden_compra()>=0) {
						//$id_orden_compra=$orden_compra_detalle->getid_orden_compra();
					//} else {
						//$id_orden_compra='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$orden_compra_detalle->getid_orden_compra(),$orden_compra_detalle->getid_bodega(),$orden_compra_detalle->getid_producto(),$orden_compra_detalle->getid_unidad(),$orden_compra_detalle->getcantidad(),$orden_compra_detalle->getprecio(),$orden_compra_detalle->getsub_total(),$orden_compra_detalle->getdescuento_porciento(),$orden_compra_detalle->getdescuento_monto(),$orden_compra_detalle->getiva_porciento(),$orden_compra_detalle->getiva_monto(),$orden_compra_detalle->gettotal(),Funciones::GetRealScapeString($orden_compra_detalle->getobservacion(),$connexion),$orden_compra_detalle->getrecibido(),$orden_compra_detalle->getimpuesto2_porciento(),$orden_compra_detalle->getimpuesto2_monto(), Funciones::GetRealScapeString($orden_compra_detalle->getId(),$connexion), Funciones::GetRealScapeString($orden_compra_detalle->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($orden_compra_detalle, $connexion,$strQuerySaveComplete,orden_compra_detalle_data::$TABLE_NAME,orden_compra_detalle_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				orden_compra_detalle_data::savePrepared($orden_compra_detalle, $connexion,$strQuerySave,orden_compra_detalle_data::$TABLE_NAME,orden_compra_detalle_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			orden_compra_detalle_data::setorden_compra_detalle_OriginalStatic($orden_compra_detalle);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(orden_compra_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				orden_compra_detalle_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					orden_compra_detalle_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					orden_compra_detalle_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(orden_compra_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					orden_compra_detalle_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(orden_compra_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					orden_compra_detalle_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(orden_compra_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					orden_compra_detalle_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?orden_compra_detalle {		
		$entity = new orden_compra_detalle();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=orden_compra_detalle_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=orden_compra_detalle_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//Inventario.orden_compra_detalle.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setorden_compra_detalle_Original(new orden_compra_detalle());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,orden_compra_detalle_data::$IS_WITH_SCHEMA);         	    
				/*$entity=orden_compra_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setorden_compra_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getorden_compra_detalle_Original(),$resultSet,orden_compra_detalle_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setorden_compra_detalle_Original(orden_compra_detalle_data::getEntityBaseResult("",$entity->getorden_compra_detalle_Original(),$resultSet));
				//$entity->setorden_compra_detalle_Original($this->getEntityBaseResult("",$entity->getorden_compra_detalle_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?orden_compra_detalle {
		$entity = new orden_compra_detalle();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=orden_compra_detalle_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=orden_compra_detalle_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,orden_compra_detalle_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".Inventario.orden_compra_detalle.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setorden_compra_detalle_Original(new orden_compra_detalle());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,orden_compra_detalle_data::$IS_WITH_SCHEMA);         	    
				/*$entity=orden_compra_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setorden_compra_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getorden_compra_detalle_Original(),$resultSet,orden_compra_detalle_data::$IS_WITH_SCHEMA));         		
				////$entity->setorden_compra_detalle_Original(orden_compra_detalle_data::getEntityBaseResult("",$entity->getorden_compra_detalle_Original(),$resultSet));
				//$entity->setorden_compra_detalle_Original($this->getEntityBaseResult("",$entity->getorden_compra_detalle_Original(),$resultSet));
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
		$entity = new orden_compra_detalle();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=orden_compra_detalle_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=orden_compra_detalle_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,orden_compra_detalle_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new orden_compra_detalle();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,orden_compra_detalle_data::$IS_WITH_SCHEMA);         		
				/*$entity=orden_compra_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setorden_compra_detalle_Original( new orden_compra_detalle());
				
				//$entity->setorden_compra_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getorden_compra_detalle_Original(),$resultSet,orden_compra_detalle_data::$IS_WITH_SCHEMA));         		
				////$entity->setorden_compra_detalle_Original(orden_compra_detalle_data::getEntityBaseResult("",$entity->getorden_compra_detalle_Original(),$resultSet));
				//$entity->setorden_compra_detalle_Original($this->getEntityBaseResult("",$entity->getorden_compra_detalle_Original(),$resultSet));
								
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
		$entity = new orden_compra_detalle();		  
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
      	    	$entity = new orden_compra_detalle();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,orden_compra_detalle_data::$IS_WITH_SCHEMA);         		
				/*$entity=orden_compra_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setorden_compra_detalle_Original( new orden_compra_detalle());
				
				//$entity->setorden_compra_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getorden_compra_detalle_Original(),$resultSet,orden_compra_detalle_data::$IS_WITH_SCHEMA));         		
				////$entity->setorden_compra_detalle_Original(orden_compra_detalle_data::getEntityBaseResult("",$entity->getorden_compra_detalle_Original(),$resultSet));
				//$entity->setorden_compra_detalle_Original($this->getEntityBaseResult("",$entity->getorden_compra_detalle_Original(),$resultSet));
				
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
		$entity = new orden_compra_detalle();		  
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
      	    	$entity = new orden_compra_detalle();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,orden_compra_detalle_data::$IS_WITH_SCHEMA);         		
				/*$entity=orden_compra_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setorden_compra_detalle_Original( new orden_compra_detalle());				
				//$entity->setorden_compra_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getorden_compra_detalle_Original(),$resultSet,orden_compra_detalle_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setorden_compra_detalle_Original(orden_compra_detalle_data::getEntityBaseResult("",$entity->getorden_compra_detalle_Original(),$resultSet));
				//$entity->setorden_compra_detalle_Original($this->getEntityBaseResult("",$entity->getorden_compra_detalle_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=orden_compra_detalle_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,orden_compra_detalle $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,orden_compra_detalle_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,orden_compra_detalle_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getorden_compra(Connexion $connexion,$relorden_compra_detalle) : ?orden_compra{

		$orden_compra= new orden_compra();

		try {
			$orden_compraDataAccess=new orden_compra_data();
			$orden_compraDataAccess->isForFKData=$this->isForFKDataRels;
			$orden_compra=$orden_compraDataAccess->getEntity($connexion,$relorden_compra_detalle->getid_orden_compra());

		} catch(Exception $e) {
			throw $e;
		}

		return $orden_compra;
	}


	public function  getbodega(Connexion $connexion,$relorden_compra_detalle) : ?bodega{

		$bodega= new bodega();

		try {
			$bodegaDataAccess=new bodega_data();
			$bodegaDataAccess->isForFKData=$this->isForFKDataRels;
			$bodega=$bodegaDataAccess->getEntity($connexion,$relorden_compra_detalle->getid_bodega());

		} catch(Exception $e) {
			throw $e;
		}

		return $bodega;
	}


	public function  getproducto(Connexion $connexion,$relorden_compra_detalle) : ?producto{

		$producto= new producto();

		try {
			$productoDataAccess=new producto_data();
			$productoDataAccess->isForFKData=$this->isForFKDataRels;
			$producto=$productoDataAccess->getEntity($connexion,$relorden_compra_detalle->getid_producto());

		} catch(Exception $e) {
			throw $e;
		}

		return $producto;
	}


	public function  getunidad(Connexion $connexion,$relorden_compra_detalle) : ?unidad{

		$unidad= new unidad();

		try {
			$unidadDataAccess=new unidad_data();
			$unidadDataAccess->isForFKData=$this->isForFKDataRels;
			$unidad=$unidadDataAccess->getEntity($connexion,$relorden_compra_detalle->getid_unidad());

		} catch(Exception $e) {
			throw $e;
		}

		return $unidad;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,orden_compra_detalle $entity,$resultSet) : orden_compra_detalle {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_orden_compra((int)$resultSet[$strPrefijo.'id_orden_compra']);
				$entity->setid_bodega((int)$resultSet[$strPrefijo.'id_bodega']);
				$entity->setid_producto((int)$resultSet[$strPrefijo.'id_producto']);
				$entity->setid_unidad((int)$resultSet[$strPrefijo.'id_unidad']);
				$entity->setcantidad((float)$resultSet[$strPrefijo.'cantidad']);
				$entity->setprecio((float)$resultSet[$strPrefijo.'precio']);
				$entity->setsub_total((float)$resultSet[$strPrefijo.'sub_total']);
				$entity->setdescuento_porciento((float)$resultSet[$strPrefijo.'descuento_porciento']);
				$entity->setdescuento_monto((float)$resultSet[$strPrefijo.'descuento_monto']);
				$entity->setiva_porciento((float)$resultSet[$strPrefijo.'iva_porciento']);
				$entity->setiva_monto((float)$resultSet[$strPrefijo.'iva_monto']);
				$entity->settotal((float)$resultSet[$strPrefijo.'total']);
				$entity->setobservacion(utf8_encode($resultSet[$strPrefijo.'observacion']));
				$entity->setrecibido((float)$resultSet[$strPrefijo.'recibido']);
				$entity->setimpuesto2_porciento((float)$resultSet[$strPrefijo.'impuesto2_porciento']);
				$entity->setimpuesto2_monto((float)$resultSet[$strPrefijo.'impuesto2_monto']);
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,orden_compra_detalle $orden_compra_detalle,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $orden_compra_detalle->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiddddddddsddd', $orden_compra_detalle->getid_orden_compra(),$orden_compra_detalle->getid_bodega(),$orden_compra_detalle->getid_producto(),$orden_compra_detalle->getid_unidad(),$orden_compra_detalle->getcantidad(),$orden_compra_detalle->getprecio(),$orden_compra_detalle->getsub_total(),$orden_compra_detalle->getdescuento_porciento(),$orden_compra_detalle->getdescuento_monto(),$orden_compra_detalle->getiva_porciento(),$orden_compra_detalle->getiva_monto(),$orden_compra_detalle->gettotal(),$orden_compra_detalle->getobservacion(),$orden_compra_detalle->getrecibido(),$orden_compra_detalle->getimpuesto2_porciento(),$orden_compra_detalle->getimpuesto2_monto());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiddddddddsdddis', $orden_compra_detalle->getid_orden_compra(),$orden_compra_detalle->getid_bodega(),$orden_compra_detalle->getid_producto(),$orden_compra_detalle->getid_unidad(),$orden_compra_detalle->getcantidad(),$orden_compra_detalle->getprecio(),$orden_compra_detalle->getsub_total(),$orden_compra_detalle->getdescuento_porciento(),$orden_compra_detalle->getdescuento_monto(),$orden_compra_detalle->getiva_porciento(),$orden_compra_detalle->getiva_monto(),$orden_compra_detalle->gettotal(),$orden_compra_detalle->getobservacion(),$orden_compra_detalle->getrecibido(),$orden_compra_detalle->getimpuesto2_porciento(),$orden_compra_detalle->getimpuesto2_monto(), $orden_compra_detalle->getId(), Funciones::GetRealScapeString($orden_compra_detalle->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,orden_compra_detalle $orden_compra_detalle,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($orden_compra_detalle->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($orden_compra_detalle->getid_orden_compra(),$orden_compra_detalle->getid_bodega(),$orden_compra_detalle->getid_producto(),$orden_compra_detalle->getid_unidad(),$orden_compra_detalle->getcantidad(),$orden_compra_detalle->getprecio(),$orden_compra_detalle->getsub_total(),$orden_compra_detalle->getdescuento_porciento(),$orden_compra_detalle->getdescuento_monto(),$orden_compra_detalle->getiva_porciento(),$orden_compra_detalle->getiva_monto(),$orden_compra_detalle->gettotal(),Funciones::GetRealScapeString($orden_compra_detalle->getobservacion(),$connexion),$orden_compra_detalle->getrecibido(),$orden_compra_detalle->getimpuesto2_porciento(),$orden_compra_detalle->getimpuesto2_monto());
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($orden_compra_detalle->getid_orden_compra(),$orden_compra_detalle->getid_bodega(),$orden_compra_detalle->getid_producto(),$orden_compra_detalle->getid_unidad(),$orden_compra_detalle->getcantidad(),$orden_compra_detalle->getprecio(),$orden_compra_detalle->getsub_total(),$orden_compra_detalle->getdescuento_porciento(),$orden_compra_detalle->getdescuento_monto(),$orden_compra_detalle->getiva_porciento(),$orden_compra_detalle->getiva_monto(),$orden_compra_detalle->gettotal(),Funciones::GetRealScapeString($orden_compra_detalle->getobservacion(),$connexion),$orden_compra_detalle->getrecibido(),$orden_compra_detalle->getimpuesto2_porciento(),$orden_compra_detalle->getimpuesto2_monto(), $orden_compra_detalle->getId(), Funciones::GetRealScapeString($orden_compra_detalle->getVersionRow(),$connexion));
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
	
	public function setorden_compra_detalle_Original(orden_compra_detalle $orden_compra_detalle) {
		$orden_compra_detalle->setorden_compra_detalle_Original(clone $orden_compra_detalle);		
	}
	
	public function setorden_compra_detalles_Original(array $orden_compra_detalles) {
		foreach($orden_compra_detalles as $orden_compra_detalle){
			$orden_compra_detalle->setorden_compra_detalle_Original(clone $orden_compra_detalle);
		}
	}
	
	public static function setorden_compra_detalle_OriginalStatic(orden_compra_detalle $orden_compra_detalle) {
		$orden_compra_detalle->setorden_compra_detalle_Original(clone $orden_compra_detalle);		
	}
	
	public static function setorden_compra_detalles_OriginalStatic(array $orden_compra_detalles) {		
		foreach($orden_compra_detalles as $orden_compra_detalle){
			$orden_compra_detalle->setorden_compra_detalle_Original(clone $orden_compra_detalle);
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
