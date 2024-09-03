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
namespace com\bydan\contabilidad\inventario\kardex_detalle\business\data;

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

use com\bydan\contabilidad\inventario\kardex_detalle\business\entity\kardex_detalle;

//FK


use com\bydan\contabilidad\inventario\kardex\business\data\kardex_data;
use com\bydan\contabilidad\inventario\kardex\business\entity\kardex;

use com\bydan\contabilidad\inventario\bodega\business\data\bodega_data;
use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;

use com\bydan\contabilidad\inventario\producto\business\data\producto_data;
use com\bydan\contabilidad\inventario\producto\business\entity\producto;

use com\bydan\contabilidad\inventario\unidad\business\data\unidad_data;
use com\bydan\contabilidad\inventario\unidad\business\entity\unidad;

use com\bydan\contabilidad\inventario\lote_producto\business\data\lote_producto_data;
use com\bydan\contabilidad\inventario\lote_producto\business\entity\lote_producto;

//REL



class kardex_detalle_data extends GetEntitiesDataAccessHelper implements kardex_detalle_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='inv_';
	public static string $TABLE_NAME='inv_kardex_detalle';			
	public static string $TABLE_NAME_kardex_detalle='kardex_detalle';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_KARDEX_DETALLE_INSERT(??,?,?,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_KARDEX_DETALLE_UPDATE(??,?,?,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_KARDEX_DETALLE_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_KARDEX_DETALLE_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $kardex_detalle_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'kardex_detalle';
		
		kardex_detalle_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('INVENTARIO');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->kardex_detalle_DataAccessAdditional=new kardex_detalleDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_kardex,numero_item,id_bodega,id_producto,id_unidad,cantidad,costo,total,id_lote_producto,descripcion,cantidad_disponible,cantidad_disponible_total,costo_anterior) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%s,%d,%d,%d,%d,%f,%f,%f,%s,\'%s\',%f,%f,%f)';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_kardex=%s,numero_item=%d,id_bodega=%d,id_producto=%d,id_unidad=%d,cantidad=%f,costo=%f,total=%f,id_lote_producto=%s,descripcion=\'%s\',cantidad_disponible=%f,cantidad_disponible_total=%f,costo_anterior=%f where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_kardex,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_item,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_bodega,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_unidad,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cantidad,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.costo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.total,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_lote_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cantidad_disponible,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cantidad_disponible_total,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.costo_anterior from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(kardex_detalle $kardex_detalle,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($kardex_detalle->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=kardex_detalle_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($kardex_detalle->getId(),$connexion));				
				
			} else if ($kardex_detalle->getIsChanged()) {
				if($kardex_detalle->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=kardex_detalle_data::$QUERY_INSERT;
					
					
					
					

					//$id_kardex='null';
					//if($kardex_detalle->getid_kardex()!==null && $kardex_detalle->getid_kardex()>=0) {
						//$id_kardex=$kardex_detalle->getid_kardex();
					//} else {
						//$id_kardex='null';
					//}

					//$id_lote_producto='null';
					//if($kardex_detalle->getid_lote_producto()!==null && $kardex_detalle->getid_lote_producto()>=0) {
						//$id_lote_producto=$kardex_detalle->getid_lote_producto();
					//} else {
						//$id_lote_producto='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetNullString($kardex_detalle->getid_kardex()),$kardex_detalle->getnumero_item(),$kardex_detalle->getid_bodega(),$kardex_detalle->getid_producto(),$kardex_detalle->getid_unidad(),$kardex_detalle->getcantidad(),$kardex_detalle->getcosto(),$kardex_detalle->gettotal(),Funciones::GetNullString($kardex_detalle->getid_lote_producto()),Funciones::GetRealScapeString($kardex_detalle->getdescripcion(),$connexion),$kardex_detalle->getcantidad_disponible(),$kardex_detalle->getcantidad_disponible_total(),$kardex_detalle->getcosto_anterior() );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=kardex_detalle_data::$QUERY_UPDATE;			
					
					
					
					

					//$id_kardex='null';
					//if($kardex_detalle->getid_kardex()!==null && $kardex_detalle->getid_kardex()>=0) {
						//$id_kardex=$kardex_detalle->getid_kardex();
					//} else {
						//$id_kardex='null';
					//}

					//$id_lote_producto='null';
					//if($kardex_detalle->getid_lote_producto()!==null && $kardex_detalle->getid_lote_producto()>=0) {
						//$id_lote_producto=$kardex_detalle->getid_lote_producto();
					//} else {
						//$id_lote_producto='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetNullString($kardex_detalle->getid_kardex()),$kardex_detalle->getnumero_item(),$kardex_detalle->getid_bodega(),$kardex_detalle->getid_producto(),$kardex_detalle->getid_unidad(),$kardex_detalle->getcantidad(),$kardex_detalle->getcosto(),$kardex_detalle->gettotal(),Funciones::GetNullString($kardex_detalle->getid_lote_producto()),Funciones::GetRealScapeString($kardex_detalle->getdescripcion(),$connexion),$kardex_detalle->getcantidad_disponible(),$kardex_detalle->getcantidad_disponible_total(),$kardex_detalle->getcosto_anterior(), Funciones::GetRealScapeString($kardex_detalle->getId(),$connexion), Funciones::GetRealScapeString($kardex_detalle->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($kardex_detalle, $connexion,$strQuerySaveComplete,kardex_detalle_data::$TABLE_NAME,kardex_detalle_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				kardex_detalle_data::savePrepared($kardex_detalle, $connexion,$strQuerySave,kardex_detalle_data::$TABLE_NAME,kardex_detalle_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			kardex_detalle_data::setkardex_detalle_OriginalStatic($kardex_detalle);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(kardex_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				kardex_detalle_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					kardex_detalle_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					kardex_detalle_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(kardex_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					kardex_detalle_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(kardex_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					kardex_detalle_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(kardex_detalle $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					kardex_detalle_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?kardex_detalle {		
		$entity = new kardex_detalle();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=kardex_detalle_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=kardex_detalle_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//Inventario.kardex_detalle.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setkardex_detalle_Original(new kardex_detalle());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,kardex_detalle_data::$IS_WITH_SCHEMA);         	    
				/*$entity=kardex_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setkardex_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getkardex_detalle_Original(),$resultSet,kardex_detalle_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setkardex_detalle_Original(kardex_detalle_data::getEntityBaseResult("",$entity->getkardex_detalle_Original(),$resultSet));
				//$entity->setkardex_detalle_Original($this->getEntityBaseResult("",$entity->getkardex_detalle_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?kardex_detalle {
		$entity = new kardex_detalle();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=kardex_detalle_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=kardex_detalle_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,kardex_detalle_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".Inventario.kardex_detalle.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setkardex_detalle_Original(new kardex_detalle());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,kardex_detalle_data::$IS_WITH_SCHEMA);         	    
				/*$entity=kardex_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setkardex_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getkardex_detalle_Original(),$resultSet,kardex_detalle_data::$IS_WITH_SCHEMA));         		
				////$entity->setkardex_detalle_Original(kardex_detalle_data::getEntityBaseResult("",$entity->getkardex_detalle_Original(),$resultSet));
				//$entity->setkardex_detalle_Original($this->getEntityBaseResult("",$entity->getkardex_detalle_Original(),$resultSet));
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
		$entity = new kardex_detalle();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=kardex_detalle_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=kardex_detalle_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,kardex_detalle_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new kardex_detalle();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,kardex_detalle_data::$IS_WITH_SCHEMA);         		
				/*$entity=kardex_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setkardex_detalle_Original( new kardex_detalle());
				
				//$entity->setkardex_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getkardex_detalle_Original(),$resultSet,kardex_detalle_data::$IS_WITH_SCHEMA));         		
				////$entity->setkardex_detalle_Original(kardex_detalle_data::getEntityBaseResult("",$entity->getkardex_detalle_Original(),$resultSet));
				//$entity->setkardex_detalle_Original($this->getEntityBaseResult("",$entity->getkardex_detalle_Original(),$resultSet));
								
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
		$entity = new kardex_detalle();		  
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
      	    	$entity = new kardex_detalle();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,kardex_detalle_data::$IS_WITH_SCHEMA);         		
				/*$entity=kardex_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setkardex_detalle_Original( new kardex_detalle());
				
				//$entity->setkardex_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getkardex_detalle_Original(),$resultSet,kardex_detalle_data::$IS_WITH_SCHEMA));         		
				////$entity->setkardex_detalle_Original(kardex_detalle_data::getEntityBaseResult("",$entity->getkardex_detalle_Original(),$resultSet));
				//$entity->setkardex_detalle_Original($this->getEntityBaseResult("",$entity->getkardex_detalle_Original(),$resultSet));
				
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
		$entity = new kardex_detalle();		  
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
      	    	$entity = new kardex_detalle();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,kardex_detalle_data::$IS_WITH_SCHEMA);         		
				/*$entity=kardex_detalle_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setkardex_detalle_Original( new kardex_detalle());				
				//$entity->setkardex_detalle_Original(parent::getEntityPrefijoEntityResult("",$entity->getkardex_detalle_Original(),$resultSet,kardex_detalle_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setkardex_detalle_Original(kardex_detalle_data::getEntityBaseResult("",$entity->getkardex_detalle_Original(),$resultSet));
				//$entity->setkardex_detalle_Original($this->getEntityBaseResult("",$entity->getkardex_detalle_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=kardex_detalle_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,kardex_detalle $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,kardex_detalle_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,kardex_detalle_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getkardex(Connexion $connexion,$relkardex_detalle) : ?kardex{

		$kardex= new kardex();

		try {
			$kardexDataAccess=new kardex_data();
			$kardexDataAccess->isForFKData=$this->isForFKDataRels;
			$kardex=$kardexDataAccess->getEntity($connexion,$relkardex_detalle->getid_kardex());

		} catch(Exception $e) {
			throw $e;
		}

		return $kardex;
	}


	public function  getbodega(Connexion $connexion,$relkardex_detalle) : ?bodega{

		$bodega= new bodega();

		try {
			$bodegaDataAccess=new bodega_data();
			$bodegaDataAccess->isForFKData=$this->isForFKDataRels;
			$bodega=$bodegaDataAccess->getEntity($connexion,$relkardex_detalle->getid_bodega());

		} catch(Exception $e) {
			throw $e;
		}

		return $bodega;
	}


	public function  getproducto(Connexion $connexion,$relkardex_detalle) : ?producto{

		$producto= new producto();

		try {
			$productoDataAccess=new producto_data();
			$productoDataAccess->isForFKData=$this->isForFKDataRels;
			$producto=$productoDataAccess->getEntity($connexion,$relkardex_detalle->getid_producto());

		} catch(Exception $e) {
			throw $e;
		}

		return $producto;
	}


	public function  getunidad(Connexion $connexion,$relkardex_detalle) : ?unidad{

		$unidad= new unidad();

		try {
			$unidadDataAccess=new unidad_data();
			$unidadDataAccess->isForFKData=$this->isForFKDataRels;
			$unidad=$unidadDataAccess->getEntity($connexion,$relkardex_detalle->getid_unidad());

		} catch(Exception $e) {
			throw $e;
		}

		return $unidad;
	}


	public function  getlote_producto(Connexion $connexion,$relkardex_detalle) : ?lote_producto{

		$lote_producto= new lote_producto();

		try {
			$lote_productoDataAccess=new lote_producto_data();
			$lote_productoDataAccess->isForFKData=$this->isForFKDataRels;
			$lote_producto=$lote_productoDataAccess->getEntity($connexion,$relkardex_detalle->getid_lote_producto());

		} catch(Exception $e) {
			throw $e;
		}

		return $lote_producto;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,kardex_detalle $entity,$resultSet) : kardex_detalle {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_kardex((int)$resultSet[$strPrefijo.'id_kardex']);
				$entity->setnumero_item((int)$resultSet[$strPrefijo.'numero_item']);
				$entity->setid_bodega((int)$resultSet[$strPrefijo.'id_bodega']);
				$entity->setid_producto((int)$resultSet[$strPrefijo.'id_producto']);
				$entity->setid_unidad((int)$resultSet[$strPrefijo.'id_unidad']);
				$entity->setcantidad((float)$resultSet[$strPrefijo.'cantidad']);
				$entity->setcosto((float)$resultSet[$strPrefijo.'costo']);
				$entity->settotal((float)$resultSet[$strPrefijo.'total']);
				$entity->setid_lote_producto((int)$resultSet[$strPrefijo.'id_lote_producto']);
				$entity->setdescripcion(utf8_encode($resultSet[$strPrefijo.'descripcion']));
				$entity->setcantidad_disponible((float)$resultSet[$strPrefijo.'cantidad_disponible']);
				$entity->setcantidad_disponible_total((float)$resultSet[$strPrefijo.'cantidad_disponible_total']);
				$entity->setcosto_anterior((float)$resultSet[$strPrefijo.'costo_anterior']);
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,kardex_detalle $kardex_detalle,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $kardex_detalle->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiidddisddd', $kardex_detalle->getid_kardex(),$kardex_detalle->getnumero_item(),$kardex_detalle->getid_bodega(),$kardex_detalle->getid_producto(),$kardex_detalle->getid_unidad(),$kardex_detalle->getcantidad(),$kardex_detalle->getcosto(),$kardex_detalle->gettotal(),$kardex_detalle->getid_lote_producto(),$kardex_detalle->getdescripcion(),$kardex_detalle->getcantidad_disponible(),$kardex_detalle->getcantidad_disponible_total(),$kardex_detalle->getcosto_anterior());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiidddisdddis', $kardex_detalle->getid_kardex(),$kardex_detalle->getnumero_item(),$kardex_detalle->getid_bodega(),$kardex_detalle->getid_producto(),$kardex_detalle->getid_unidad(),$kardex_detalle->getcantidad(),$kardex_detalle->getcosto(),$kardex_detalle->gettotal(),$kardex_detalle->getid_lote_producto(),$kardex_detalle->getdescripcion(),$kardex_detalle->getcantidad_disponible(),$kardex_detalle->getcantidad_disponible_total(),$kardex_detalle->getcosto_anterior(), $kardex_detalle->getId(), Funciones::GetRealScapeString($kardex_detalle->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,kardex_detalle $kardex_detalle,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($kardex_detalle->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array(Funciones::GetNullString($kardex_detalle->getid_kardex()),$kardex_detalle->getnumero_item(),$kardex_detalle->getid_bodega(),$kardex_detalle->getid_producto(),$kardex_detalle->getid_unidad(),$kardex_detalle->getcantidad(),$kardex_detalle->getcosto(),$kardex_detalle->gettotal(),Funciones::GetNullString($kardex_detalle->getid_lote_producto()),Funciones::GetRealScapeString($kardex_detalle->getdescripcion(),$connexion),$kardex_detalle->getcantidad_disponible(),$kardex_detalle->getcantidad_disponible_total(),$kardex_detalle->getcosto_anterior());
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array(Funciones::GetNullString($kardex_detalle->getid_kardex()),$kardex_detalle->getnumero_item(),$kardex_detalle->getid_bodega(),$kardex_detalle->getid_producto(),$kardex_detalle->getid_unidad(),$kardex_detalle->getcantidad(),$kardex_detalle->getcosto(),$kardex_detalle->gettotal(),Funciones::GetNullString($kardex_detalle->getid_lote_producto()),Funciones::GetRealScapeString($kardex_detalle->getdescripcion(),$connexion),$kardex_detalle->getcantidad_disponible(),$kardex_detalle->getcantidad_disponible_total(),$kardex_detalle->getcosto_anterior(), $kardex_detalle->getId(), Funciones::GetRealScapeString($kardex_detalle->getVersionRow(),$connexion));
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
	
	public function setkardex_detalle_Original(kardex_detalle $kardex_detalle) {
		$kardex_detalle->setkardex_detalle_Original(clone $kardex_detalle);		
	}
	
	public function setkardex_detalles_Original(array $kardex_detalles) {
		foreach($kardex_detalles as $kardex_detalle){
			$kardex_detalle->setkardex_detalle_Original(clone $kardex_detalle);
		}
	}
	
	public static function setkardex_detalle_OriginalStatic(kardex_detalle $kardex_detalle) {
		$kardex_detalle->setkardex_detalle_Original(clone $kardex_detalle);		
	}
	
	public static function setkardex_detalles_OriginalStatic(array $kardex_detalles) {		
		foreach($kardex_detalles as $kardex_detalle){
			$kardex_detalle->setkardex_detalle_Original(clone $kardex_detalle);
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
