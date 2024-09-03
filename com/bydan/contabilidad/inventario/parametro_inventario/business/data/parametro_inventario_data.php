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
namespace com\bydan\contabilidad\inventario\parametro_inventario\business\data;

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

use com\bydan\contabilidad\inventario\parametro_inventario\business\entity\parametro_inventario;

//FK


use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\entity\empresa;

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\data\termino_pago_proveedor_data;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity\termino_pago_proveedor;

use com\bydan\contabilidad\general\tipo_costeo_kardex\business\data\tipo_costeo_kardex_data;
use com\bydan\contabilidad\general\tipo_costeo_kardex\business\entity\tipo_costeo_kardex;

use com\bydan\contabilidad\inventario\tipo_kardex\business\data\tipo_kardex_data;
use com\bydan\contabilidad\inventario\tipo_kardex\business\entity\tipo_kardex;

//REL



class parametro_inventario_data extends GetEntitiesDataAccessHelper implements parametro_inventario_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='inv_';
	public static string $TABLE_NAME='inv_parametro_inventario';			
	public static string $TABLE_NAME_parametro_inventario='parametro_inventario';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_PARAMETRO_INVENTARIO_INSERT(??,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_PARAMETRO_INVENTARIO_UPDATE(??,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_PARAMETRO_INVENTARIO_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_PARAMETRO_INVENTARIO_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $parametro_inventario_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'parametro_inventario';
		
		parametro_inventario_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('INVENTARIO');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->parametro_inventario_DataAccessAdditional=new parametro_inventarioDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_empresa,id_termino_pago_proveedor,id_tipo_costeo_kardex,id_tipo_kardex,numero_producto,numero_orden_compra,numero_devolucion,numero_cotizacion,numero_kardex,con_producto_inactivo) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%s,%d,%d,%d,%d,%d,%d,%d,%d,\'%d\')';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_empresa=%s,id_termino_pago_proveedor=%d,id_tipo_costeo_kardex=%d,id_tipo_kardex=%d,numero_producto=%d,numero_orden_compra=%d,numero_devolucion=%d,numero_cotizacion=%d,numero_kardex=%d,con_producto_inactivo=\'%d\' where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_termino_pago_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_tipo_costeo_kardex,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_tipo_kardex,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_orden_compra,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_devolucion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_cotizacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_kardex,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_producto_inactivo from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(parametro_inventario $parametro_inventario,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($parametro_inventario->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=parametro_inventario_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($parametro_inventario->getId(),$connexion));				
				
			} else if ($parametro_inventario->getIsChanged()) {
				if($parametro_inventario->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=parametro_inventario_data::$QUERY_INSERT;
					
					
					
					

					//$id_empresa='null';
					//if($parametro_inventario->getid_empresa()!==null && $parametro_inventario->getid_empresa()>=0) {
						//$id_empresa=$parametro_inventario->getid_empresa();
					//} else {
						//$id_empresa='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$parametro_inventario->getid_empresa(),$parametro_inventario->getid_termino_pago_proveedor(),$parametro_inventario->getid_tipo_costeo_kardex(),$parametro_inventario->getid_tipo_kardex(),$parametro_inventario->getnumero_producto(),$parametro_inventario->getnumero_orden_compra(),$parametro_inventario->getnumero_devolucion(),$parametro_inventario->getnumero_cotizacion(),$parametro_inventario->getnumero_kardex(),$parametro_inventario->getcon_producto_inactivo() );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=parametro_inventario_data::$QUERY_UPDATE;			
					
					
					
					

					//$id_empresa='null';
					//if($parametro_inventario->getid_empresa()!==null && $parametro_inventario->getid_empresa()>=0) {
						//$id_empresa=$parametro_inventario->getid_empresa();
					//} else {
						//$id_empresa='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$parametro_inventario->getid_empresa(),$parametro_inventario->getid_termino_pago_proveedor(),$parametro_inventario->getid_tipo_costeo_kardex(),$parametro_inventario->getid_tipo_kardex(),$parametro_inventario->getnumero_producto(),$parametro_inventario->getnumero_orden_compra(),$parametro_inventario->getnumero_devolucion(),$parametro_inventario->getnumero_cotizacion(),$parametro_inventario->getnumero_kardex(),$parametro_inventario->getcon_producto_inactivo(), Funciones::GetRealScapeString($parametro_inventario->getId(),$connexion), Funciones::GetRealScapeString($parametro_inventario->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($parametro_inventario, $connexion,$strQuerySaveComplete,parametro_inventario_data::$TABLE_NAME,parametro_inventario_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				parametro_inventario_data::savePrepared($parametro_inventario, $connexion,$strQuerySave,parametro_inventario_data::$TABLE_NAME,parametro_inventario_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			parametro_inventario_data::setparametro_inventario_OriginalStatic($parametro_inventario);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(parametro_inventario $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				parametro_inventario_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					parametro_inventario_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					parametro_inventario_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(parametro_inventario $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					parametro_inventario_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(parametro_inventario $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					parametro_inventario_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(parametro_inventario $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					parametro_inventario_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?parametro_inventario {		
		$entity = new parametro_inventario();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=parametro_inventario_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=parametro_inventario_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//Inventario.parametro_inventario.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setparametro_inventario_Original(new parametro_inventario());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_inventario_data::$IS_WITH_SCHEMA);         	    
				/*$entity=parametro_inventario_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setparametro_inventario_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_inventario_Original(),$resultSet,parametro_inventario_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setparametro_inventario_Original(parametro_inventario_data::getEntityBaseResult("",$entity->getparametro_inventario_Original(),$resultSet));
				//$entity->setparametro_inventario_Original($this->getEntityBaseResult("",$entity->getparametro_inventario_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?parametro_inventario {
		$entity = new parametro_inventario();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=parametro_inventario_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=parametro_inventario_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,parametro_inventario_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".Inventario.parametro_inventario.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setparametro_inventario_Original(new parametro_inventario());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_inventario_data::$IS_WITH_SCHEMA);         	    
				/*$entity=parametro_inventario_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setparametro_inventario_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_inventario_Original(),$resultSet,parametro_inventario_data::$IS_WITH_SCHEMA));         		
				////$entity->setparametro_inventario_Original(parametro_inventario_data::getEntityBaseResult("",$entity->getparametro_inventario_Original(),$resultSet));
				//$entity->setparametro_inventario_Original($this->getEntityBaseResult("",$entity->getparametro_inventario_Original(),$resultSet));
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
		$entity = new parametro_inventario();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=parametro_inventario_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=parametro_inventario_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,parametro_inventario_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new parametro_inventario();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_inventario_data::$IS_WITH_SCHEMA);         		
				/*$entity=parametro_inventario_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setparametro_inventario_Original( new parametro_inventario());
				
				//$entity->setparametro_inventario_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_inventario_Original(),$resultSet,parametro_inventario_data::$IS_WITH_SCHEMA));         		
				////$entity->setparametro_inventario_Original(parametro_inventario_data::getEntityBaseResult("",$entity->getparametro_inventario_Original(),$resultSet));
				//$entity->setparametro_inventario_Original($this->getEntityBaseResult("",$entity->getparametro_inventario_Original(),$resultSet));
								
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
		$entity = new parametro_inventario();		  
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
      	    	$entity = new parametro_inventario();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_inventario_data::$IS_WITH_SCHEMA);         		
				/*$entity=parametro_inventario_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setparametro_inventario_Original( new parametro_inventario());
				
				//$entity->setparametro_inventario_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_inventario_Original(),$resultSet,parametro_inventario_data::$IS_WITH_SCHEMA));         		
				////$entity->setparametro_inventario_Original(parametro_inventario_data::getEntityBaseResult("",$entity->getparametro_inventario_Original(),$resultSet));
				//$entity->setparametro_inventario_Original($this->getEntityBaseResult("",$entity->getparametro_inventario_Original(),$resultSet));
				
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
		$entity = new parametro_inventario();		  
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
      	    	$entity = new parametro_inventario();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_inventario_data::$IS_WITH_SCHEMA);         		
				/*$entity=parametro_inventario_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setparametro_inventario_Original( new parametro_inventario());				
				//$entity->setparametro_inventario_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_inventario_Original(),$resultSet,parametro_inventario_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setparametro_inventario_Original(parametro_inventario_data::getEntityBaseResult("",$entity->getparametro_inventario_Original(),$resultSet));
				//$entity->setparametro_inventario_Original($this->getEntityBaseResult("",$entity->getparametro_inventario_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=parametro_inventario_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,parametro_inventario $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,parametro_inventario_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,parametro_inventario_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getempresa(Connexion $connexion,$relparametro_inventario) : ?empresa{

		$empresa= new empresa();

		try {
			$empresaDataAccess=new empresa_data();
			$empresaDataAccess->isForFKData=$this->isForFKDataRels;
			$empresa=$empresaDataAccess->getEntity($connexion,$relparametro_inventario->getid_empresa());

		} catch(Exception $e) {
			throw $e;
		}

		return $empresa;
	}


	public function  gettermino_pago_proveedor(Connexion $connexion,$relparametro_inventario) : ?termino_pago_proveedor{

		$termino_pago_proveedor= new termino_pago_proveedor();

		try {
			$termino_pago_proveedorDataAccess=new termino_pago_proveedor_data();
			$termino_pago_proveedorDataAccess->isForFKData=$this->isForFKDataRels;
			$termino_pago_proveedor=$termino_pago_proveedorDataAccess->getEntity($connexion,$relparametro_inventario->getid_termino_pago_proveedor());

		} catch(Exception $e) {
			throw $e;
		}

		return $termino_pago_proveedor;
	}


	public function  gettipo_costeo_kardex(Connexion $connexion,$relparametro_inventario) : ?tipo_costeo_kardex{

		$tipo_costeo_kardex= new tipo_costeo_kardex();

		try {
			$tipo_costeo_kardexDataAccess=new tipo_costeo_kardex_data();
			$tipo_costeo_kardexDataAccess->isForFKData=$this->isForFKDataRels;
			$tipo_costeo_kardex=$tipo_costeo_kardexDataAccess->getEntity($connexion,$relparametro_inventario->getid_tipo_costeo_kardex());

		} catch(Exception $e) {
			throw $e;
		}

		return $tipo_costeo_kardex;
	}


	public function  gettipo_kardex(Connexion $connexion,$relparametro_inventario) : ?tipo_kardex{

		$tipo_kardex= new tipo_kardex();

		try {
			$tipo_kardexDataAccess=new tipo_kardex_data();
			$tipo_kardexDataAccess->isForFKData=$this->isForFKDataRels;
			$tipo_kardex=$tipo_kardexDataAccess->getEntity($connexion,$relparametro_inventario->getid_tipo_kardex());

		} catch(Exception $e) {
			throw $e;
		}

		return $tipo_kardex;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,parametro_inventario $entity,$resultSet) : parametro_inventario {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_empresa((int)$resultSet[$strPrefijo.'id_empresa']);
				$entity->setid_termino_pago_proveedor((int)$resultSet[$strPrefijo.'id_termino_pago_proveedor']);
				$entity->setid_tipo_costeo_kardex((int)$resultSet[$strPrefijo.'id_tipo_costeo_kardex']);
				$entity->setid_tipo_kardex((int)$resultSet[$strPrefijo.'id_tipo_kardex']);
				$entity->setnumero_producto((int)$resultSet[$strPrefijo.'numero_producto']);
				$entity->setnumero_orden_compra((int)$resultSet[$strPrefijo.'numero_orden_compra']);
				$entity->setnumero_devolucion((int)$resultSet[$strPrefijo.'numero_devolucion']);
				$entity->setnumero_cotizacion((int)$resultSet[$strPrefijo.'numero_cotizacion']);
				$entity->setnumero_kardex((int)$resultSet[$strPrefijo.'numero_kardex']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setcon_producto_inactivo($resultSet[$strPrefijo.'con_producto_inactivo']=='f'? false:true );
				} else {
					$entity->setcon_producto_inactivo((bool)$resultSet[$strPrefijo.'con_producto_inactivo']);
				}
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,parametro_inventario $parametro_inventario,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $parametro_inventario->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiiiiiii', $parametro_inventario->getid_empresa(),$parametro_inventario->getid_termino_pago_proveedor(),$parametro_inventario->getid_tipo_costeo_kardex(),$parametro_inventario->getid_tipo_kardex(),$parametro_inventario->getnumero_producto(),$parametro_inventario->getnumero_orden_compra(),$parametro_inventario->getnumero_devolucion(),$parametro_inventario->getnumero_cotizacion(),$parametro_inventario->getnumero_kardex(),$parametro_inventario->getcon_producto_inactivo());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiiiiiiiis', $parametro_inventario->getid_empresa(),$parametro_inventario->getid_termino_pago_proveedor(),$parametro_inventario->getid_tipo_costeo_kardex(),$parametro_inventario->getid_tipo_kardex(),$parametro_inventario->getnumero_producto(),$parametro_inventario->getnumero_orden_compra(),$parametro_inventario->getnumero_devolucion(),$parametro_inventario->getnumero_cotizacion(),$parametro_inventario->getnumero_kardex(),$parametro_inventario->getcon_producto_inactivo(), $parametro_inventario->getId(), Funciones::GetRealScapeString($parametro_inventario->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,parametro_inventario $parametro_inventario,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($parametro_inventario->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($parametro_inventario->getid_empresa(),$parametro_inventario->getid_termino_pago_proveedor(),$parametro_inventario->getid_tipo_costeo_kardex(),$parametro_inventario->getid_tipo_kardex(),$parametro_inventario->getnumero_producto(),$parametro_inventario->getnumero_orden_compra(),$parametro_inventario->getnumero_devolucion(),$parametro_inventario->getnumero_cotizacion(),$parametro_inventario->getnumero_kardex(),$parametro_inventario->getcon_producto_inactivo());
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($parametro_inventario->getid_empresa(),$parametro_inventario->getid_termino_pago_proveedor(),$parametro_inventario->getid_tipo_costeo_kardex(),$parametro_inventario->getid_tipo_kardex(),$parametro_inventario->getnumero_producto(),$parametro_inventario->getnumero_orden_compra(),$parametro_inventario->getnumero_devolucion(),$parametro_inventario->getnumero_cotizacion(),$parametro_inventario->getnumero_kardex(),$parametro_inventario->getcon_producto_inactivo(), $parametro_inventario->getId(), Funciones::GetRealScapeString($parametro_inventario->getVersionRow(),$connexion));
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
	
	public function setparametro_inventario_Original(parametro_inventario $parametro_inventario) {
		$parametro_inventario->setparametro_inventario_Original(clone $parametro_inventario);		
	}
	
	public function setparametro_inventarios_Original(array $parametro_inventarios) {
		foreach($parametro_inventarios as $parametro_inventario){
			$parametro_inventario->setparametro_inventario_Original(clone $parametro_inventario);
		}
	}
	
	public static function setparametro_inventario_OriginalStatic(parametro_inventario $parametro_inventario) {
		$parametro_inventario->setparametro_inventario_Original(clone $parametro_inventario);		
	}
	
	public static function setparametro_inventarios_OriginalStatic(array $parametro_inventarios) {		
		foreach($parametro_inventarios as $parametro_inventario){
			$parametro_inventario->setparametro_inventario_Original(clone $parametro_inventario);
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
