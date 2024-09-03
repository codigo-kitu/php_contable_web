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
namespace com\bydan\contabilidad\facturacion\parametro_facturacion\business\data;

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

use com\bydan\contabilidad\facturacion\parametro_facturacion\business\entity\parametro_facturacion;

//FK


use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\entity\empresa;

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\data\termino_pago_cliente_data;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;

//REL



class parametro_facturacion_data extends GetEntitiesDataAccessHelper implements parametro_facturacion_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='fac_';
	public static string $TABLE_NAME='fac_parametro_facturacion';			
	public static string $TABLE_NAME_parametro_facturacion='parametro_facturacion';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_PARAMETRO_FACTURACION_INSERT(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_PARAMETRO_FACTURACION_UPDATE(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_PARAMETRO_FACTURACION_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_PARAMETRO_FACTURACION_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $parametro_facturacion_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'parametro_facturacion';
		
		parametro_facturacion_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('FACTURACION');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->parametro_facturacion_DataAccessAdditional=new parametro_facturacionDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_empresa,nombre_factura,numero_factura,incremento_factura,solo_costo_producto,numero_factura_lote,incremento_factura_lote,numero_devolucion,incremento_devolucion,id_termino_pago_cliente,nombre_estimado,numero_estimado,incremento_estimado,solo_costo_producto_estimado,nombre_consignacion,numero_consignacion,incremento_consignacion,solo_costo_producto_consignacion,con_recibo,nombre_recibo,numero_recibo,incremento_recibo,con_impuesto_recibo) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,\'%s\',%d,%d,\'%d\',%d,%d,%d,%d,%d,\'%s\',%d,%d,\'%d\',\'%s\',%d,%d,\'%d\',\'%d\',\'%s\',%d,%d,\'%d\')';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_empresa=%d,nombre_factura=\'%s\',numero_factura=%d,incremento_factura=%d,solo_costo_producto=\'%d\',numero_factura_lote=%d,incremento_factura_lote=%d,numero_devolucion=%d,incremento_devolucion=%d,id_termino_pago_cliente=%d,nombre_estimado=\'%s\',numero_estimado=%d,incremento_estimado=%d,solo_costo_producto_estimado=\'%d\',nombre_consignacion=\'%s\',numero_consignacion=%d,incremento_consignacion=%d,solo_costo_producto_consignacion=\'%d\',con_recibo=\'%d\',nombre_recibo=\'%s\',numero_recibo=%d,incremento_recibo=%d,con_impuesto_recibo=\'%d\' where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_factura,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_factura,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.incremento_factura,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.solo_costo_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_factura_lote,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.incremento_factura_lote,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_devolucion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.incremento_devolucion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_termino_pago_cliente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_estimado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_estimado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.incremento_estimado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.solo_costo_producto_estimado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_consignacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_consignacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.incremento_consignacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.solo_costo_producto_consignacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_recibo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_recibo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_recibo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.incremento_recibo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_impuesto_recibo from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(parametro_facturacion $parametro_facturacion,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($parametro_facturacion->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=parametro_facturacion_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($parametro_facturacion->getId(),$connexion));				
				
			} else if ($parametro_facturacion->getIsChanged()) {
				if($parametro_facturacion->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=parametro_facturacion_data::$QUERY_INSERT;
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$parametro_facturacion->getid_empresa(),Funciones::GetRealScapeString($parametro_facturacion->getnombre_factura(),$connexion),$parametro_facturacion->getnumero_factura(),$parametro_facturacion->getincremento_factura(),$parametro_facturacion->getsolo_costo_producto(),$parametro_facturacion->getnumero_factura_lote(),$parametro_facturacion->getincremento_factura_lote(),$parametro_facturacion->getnumero_devolucion(),$parametro_facturacion->getincremento_devolucion(),$parametro_facturacion->getid_termino_pago_cliente(),Funciones::GetRealScapeString($parametro_facturacion->getnombre_estimado(),$connexion),$parametro_facturacion->getnumero_estimado(),$parametro_facturacion->getincremento_estimado(),$parametro_facturacion->getsolo_costo_producto_estimado(),Funciones::GetRealScapeString($parametro_facturacion->getnombre_consignacion(),$connexion),$parametro_facturacion->getnumero_consignacion(),$parametro_facturacion->getincremento_consignacion(),$parametro_facturacion->getsolo_costo_producto_consignacion(),$parametro_facturacion->getcon_recibo(),Funciones::GetRealScapeString($parametro_facturacion->getnombre_recibo(),$connexion),$parametro_facturacion->getnumero_recibo(),$parametro_facturacion->getincremento_recibo(),$parametro_facturacion->getcon_impuesto_recibo() );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=parametro_facturacion_data::$QUERY_UPDATE;			
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$parametro_facturacion->getid_empresa(),Funciones::GetRealScapeString($parametro_facturacion->getnombre_factura(),$connexion),$parametro_facturacion->getnumero_factura(),$parametro_facturacion->getincremento_factura(),$parametro_facturacion->getsolo_costo_producto(),$parametro_facturacion->getnumero_factura_lote(),$parametro_facturacion->getincremento_factura_lote(),$parametro_facturacion->getnumero_devolucion(),$parametro_facturacion->getincremento_devolucion(),$parametro_facturacion->getid_termino_pago_cliente(),Funciones::GetRealScapeString($parametro_facturacion->getnombre_estimado(),$connexion),$parametro_facturacion->getnumero_estimado(),$parametro_facturacion->getincremento_estimado(),$parametro_facturacion->getsolo_costo_producto_estimado(),Funciones::GetRealScapeString($parametro_facturacion->getnombre_consignacion(),$connexion),$parametro_facturacion->getnumero_consignacion(),$parametro_facturacion->getincremento_consignacion(),$parametro_facturacion->getsolo_costo_producto_consignacion(),$parametro_facturacion->getcon_recibo(),Funciones::GetRealScapeString($parametro_facturacion->getnombre_recibo(),$connexion),$parametro_facturacion->getnumero_recibo(),$parametro_facturacion->getincremento_recibo(),$parametro_facturacion->getcon_impuesto_recibo(), Funciones::GetRealScapeString($parametro_facturacion->getId(),$connexion), Funciones::GetRealScapeString($parametro_facturacion->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($parametro_facturacion, $connexion,$strQuerySaveComplete,parametro_facturacion_data::$TABLE_NAME,parametro_facturacion_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				parametro_facturacion_data::savePrepared($parametro_facturacion, $connexion,$strQuerySave,parametro_facturacion_data::$TABLE_NAME,parametro_facturacion_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			parametro_facturacion_data::setparametro_facturacion_OriginalStatic($parametro_facturacion);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(parametro_facturacion $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				parametro_facturacion_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					parametro_facturacion_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					parametro_facturacion_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(parametro_facturacion $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					parametro_facturacion_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(parametro_facturacion $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					parametro_facturacion_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(parametro_facturacion $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					parametro_facturacion_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?parametro_facturacion {		
		$entity = new parametro_facturacion();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=parametro_facturacion_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=parametro_facturacion_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//Facturacion.parametro_facturacion.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setparametro_facturacion_Original(new parametro_facturacion());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_facturacion_data::$IS_WITH_SCHEMA);         	    
				/*$entity=parametro_facturacion_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setparametro_facturacion_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_facturacion_Original(),$resultSet,parametro_facturacion_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setparametro_facturacion_Original(parametro_facturacion_data::getEntityBaseResult("",$entity->getparametro_facturacion_Original(),$resultSet));
				//$entity->setparametro_facturacion_Original($this->getEntityBaseResult("",$entity->getparametro_facturacion_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?parametro_facturacion {
		$entity = new parametro_facturacion();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=parametro_facturacion_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=parametro_facturacion_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,parametro_facturacion_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".Facturacion.parametro_facturacion.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setparametro_facturacion_Original(new parametro_facturacion());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_facturacion_data::$IS_WITH_SCHEMA);         	    
				/*$entity=parametro_facturacion_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setparametro_facturacion_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_facturacion_Original(),$resultSet,parametro_facturacion_data::$IS_WITH_SCHEMA));         		
				////$entity->setparametro_facturacion_Original(parametro_facturacion_data::getEntityBaseResult("",$entity->getparametro_facturacion_Original(),$resultSet));
				//$entity->setparametro_facturacion_Original($this->getEntityBaseResult("",$entity->getparametro_facturacion_Original(),$resultSet));
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
		$entity = new parametro_facturacion();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=parametro_facturacion_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=parametro_facturacion_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,parametro_facturacion_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new parametro_facturacion();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_facturacion_data::$IS_WITH_SCHEMA);         		
				/*$entity=parametro_facturacion_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setparametro_facturacion_Original( new parametro_facturacion());
				
				//$entity->setparametro_facturacion_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_facturacion_Original(),$resultSet,parametro_facturacion_data::$IS_WITH_SCHEMA));         		
				////$entity->setparametro_facturacion_Original(parametro_facturacion_data::getEntityBaseResult("",$entity->getparametro_facturacion_Original(),$resultSet));
				//$entity->setparametro_facturacion_Original($this->getEntityBaseResult("",$entity->getparametro_facturacion_Original(),$resultSet));
								
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
		$entity = new parametro_facturacion();		  
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
      	    	$entity = new parametro_facturacion();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_facturacion_data::$IS_WITH_SCHEMA);         		
				/*$entity=parametro_facturacion_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setparametro_facturacion_Original( new parametro_facturacion());
				
				//$entity->setparametro_facturacion_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_facturacion_Original(),$resultSet,parametro_facturacion_data::$IS_WITH_SCHEMA));         		
				////$entity->setparametro_facturacion_Original(parametro_facturacion_data::getEntityBaseResult("",$entity->getparametro_facturacion_Original(),$resultSet));
				//$entity->setparametro_facturacion_Original($this->getEntityBaseResult("",$entity->getparametro_facturacion_Original(),$resultSet));
				
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
		$entity = new parametro_facturacion();		  
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
      	    	$entity = new parametro_facturacion();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_facturacion_data::$IS_WITH_SCHEMA);         		
				/*$entity=parametro_facturacion_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setparametro_facturacion_Original( new parametro_facturacion());				
				//$entity->setparametro_facturacion_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_facturacion_Original(),$resultSet,parametro_facturacion_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setparametro_facturacion_Original(parametro_facturacion_data::getEntityBaseResult("",$entity->getparametro_facturacion_Original(),$resultSet));
				//$entity->setparametro_facturacion_Original($this->getEntityBaseResult("",$entity->getparametro_facturacion_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=parametro_facturacion_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,parametro_facturacion $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,parametro_facturacion_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,parametro_facturacion_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getempresa(Connexion $connexion,$relparametro_facturacion) : ?empresa{

		$empresa= new empresa();

		try {
			$empresaDataAccess=new empresa_data();
			$empresaDataAccess->isForFKData=$this->isForFKDataRels;
			$empresa=$empresaDataAccess->getEntity($connexion,$relparametro_facturacion->getid_empresa());

		} catch(Exception $e) {
			throw $e;
		}

		return $empresa;
	}


	public function  gettermino_pago_cliente(Connexion $connexion,$relparametro_facturacion) : ?termino_pago_cliente{

		$termino_pago_cliente= new termino_pago_cliente();

		try {
			$termino_pago_clienteDataAccess=new termino_pago_cliente_data();
			$termino_pago_clienteDataAccess->isForFKData=$this->isForFKDataRels;
			$termino_pago_cliente=$termino_pago_clienteDataAccess->getEntity($connexion,$relparametro_facturacion->getid_termino_pago_cliente());

		} catch(Exception $e) {
			throw $e;
		}

		return $termino_pago_cliente;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,parametro_facturacion $entity,$resultSet) : parametro_facturacion {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_empresa((int)$resultSet[$strPrefijo.'id_empresa']);
				$entity->setnombre_factura(utf8_encode($resultSet[$strPrefijo.'nombre_factura']));
				$entity->setnumero_factura((int)$resultSet[$strPrefijo.'numero_factura']);
				$entity->setincremento_factura((int)$resultSet[$strPrefijo.'incremento_factura']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setsolo_costo_producto($resultSet[$strPrefijo.'solo_costo_producto']=='f'? false:true );
				} else {
					$entity->setsolo_costo_producto((bool)$resultSet[$strPrefijo.'solo_costo_producto']);
				}
				$entity->setnumero_factura_lote((int)$resultSet[$strPrefijo.'numero_factura_lote']);
				$entity->setincremento_factura_lote((int)$resultSet[$strPrefijo.'incremento_factura_lote']);
				$entity->setnumero_devolucion((int)$resultSet[$strPrefijo.'numero_devolucion']);
				$entity->setincremento_devolucion((int)$resultSet[$strPrefijo.'incremento_devolucion']);
				$entity->setid_termino_pago_cliente((int)$resultSet[$strPrefijo.'id_termino_pago_cliente']);
				$entity->setnombre_estimado(utf8_encode($resultSet[$strPrefijo.'nombre_estimado']));
				$entity->setnumero_estimado((int)$resultSet[$strPrefijo.'numero_estimado']);
				$entity->setincremento_estimado((int)$resultSet[$strPrefijo.'incremento_estimado']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setsolo_costo_producto_estimado($resultSet[$strPrefijo.'solo_costo_producto_estimado']=='f'? false:true );
				} else {
					$entity->setsolo_costo_producto_estimado((bool)$resultSet[$strPrefijo.'solo_costo_producto_estimado']);
				}
				$entity->setnombre_consignacion(utf8_encode($resultSet[$strPrefijo.'nombre_consignacion']));
				$entity->setnumero_consignacion((int)$resultSet[$strPrefijo.'numero_consignacion']);
				$entity->setincremento_consignacion((int)$resultSet[$strPrefijo.'incremento_consignacion']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setsolo_costo_producto_consignacion($resultSet[$strPrefijo.'solo_costo_producto_consignacion']=='f'? false:true );
				} else {
					$entity->setsolo_costo_producto_consignacion((bool)$resultSet[$strPrefijo.'solo_costo_producto_consignacion']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setcon_recibo($resultSet[$strPrefijo.'con_recibo']=='f'? false:true );
				} else {
					$entity->setcon_recibo((bool)$resultSet[$strPrefijo.'con_recibo']);
				}
				$entity->setnombre_recibo(utf8_encode($resultSet[$strPrefijo.'nombre_recibo']));
				$entity->setnumero_recibo((int)$resultSet[$strPrefijo.'numero_recibo']);
				$entity->setincremento_recibo((int)$resultSet[$strPrefijo.'incremento_recibo']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setcon_impuesto_recibo($resultSet[$strPrefijo.'con_impuesto_recibo']=='f'? false:true );
				} else {
					$entity->setcon_impuesto_recibo((bool)$resultSet[$strPrefijo.'con_impuesto_recibo']);
				}
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,parametro_facturacion $parametro_facturacion,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $parametro_facturacion->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'isiiiiiiiisiiisiiiisiii', $parametro_facturacion->getid_empresa(),$parametro_facturacion->getnombre_factura(),$parametro_facturacion->getnumero_factura(),$parametro_facturacion->getincremento_factura(),$parametro_facturacion->getsolo_costo_producto(),$parametro_facturacion->getnumero_factura_lote(),$parametro_facturacion->getincremento_factura_lote(),$parametro_facturacion->getnumero_devolucion(),$parametro_facturacion->getincremento_devolucion(),$parametro_facturacion->getid_termino_pago_cliente(),$parametro_facturacion->getnombre_estimado(),$parametro_facturacion->getnumero_estimado(),$parametro_facturacion->getincremento_estimado(),$parametro_facturacion->getsolo_costo_producto_estimado(),$parametro_facturacion->getnombre_consignacion(),$parametro_facturacion->getnumero_consignacion(),$parametro_facturacion->getincremento_consignacion(),$parametro_facturacion->getsolo_costo_producto_consignacion(),$parametro_facturacion->getcon_recibo(),$parametro_facturacion->getnombre_recibo(),$parametro_facturacion->getnumero_recibo(),$parametro_facturacion->getincremento_recibo(),$parametro_facturacion->getcon_impuesto_recibo());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'isiiiiiiiisiiisiiiisiiiis', $parametro_facturacion->getid_empresa(),$parametro_facturacion->getnombre_factura(),$parametro_facturacion->getnumero_factura(),$parametro_facturacion->getincremento_factura(),$parametro_facturacion->getsolo_costo_producto(),$parametro_facturacion->getnumero_factura_lote(),$parametro_facturacion->getincremento_factura_lote(),$parametro_facturacion->getnumero_devolucion(),$parametro_facturacion->getincremento_devolucion(),$parametro_facturacion->getid_termino_pago_cliente(),$parametro_facturacion->getnombre_estimado(),$parametro_facturacion->getnumero_estimado(),$parametro_facturacion->getincremento_estimado(),$parametro_facturacion->getsolo_costo_producto_estimado(),$parametro_facturacion->getnombre_consignacion(),$parametro_facturacion->getnumero_consignacion(),$parametro_facturacion->getincremento_consignacion(),$parametro_facturacion->getsolo_costo_producto_consignacion(),$parametro_facturacion->getcon_recibo(),$parametro_facturacion->getnombre_recibo(),$parametro_facturacion->getnumero_recibo(),$parametro_facturacion->getincremento_recibo(),$parametro_facturacion->getcon_impuesto_recibo(), $parametro_facturacion->getId(), Funciones::GetRealScapeString($parametro_facturacion->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,parametro_facturacion $parametro_facturacion,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($parametro_facturacion->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($parametro_facturacion->getid_empresa(),Funciones::GetRealScapeString($parametro_facturacion->getnombre_factura(),$connexion),$parametro_facturacion->getnumero_factura(),$parametro_facturacion->getincremento_factura(),$parametro_facturacion->getsolo_costo_producto(),$parametro_facturacion->getnumero_factura_lote(),$parametro_facturacion->getincremento_factura_lote(),$parametro_facturacion->getnumero_devolucion(),$parametro_facturacion->getincremento_devolucion(),$parametro_facturacion->getid_termino_pago_cliente(),Funciones::GetRealScapeString($parametro_facturacion->getnombre_estimado(),$connexion),$parametro_facturacion->getnumero_estimado(),$parametro_facturacion->getincremento_estimado(),$parametro_facturacion->getsolo_costo_producto_estimado(),Funciones::GetRealScapeString($parametro_facturacion->getnombre_consignacion(),$connexion),$parametro_facturacion->getnumero_consignacion(),$parametro_facturacion->getincremento_consignacion(),$parametro_facturacion->getsolo_costo_producto_consignacion(),$parametro_facturacion->getcon_recibo(),Funciones::GetRealScapeString($parametro_facturacion->getnombre_recibo(),$connexion),$parametro_facturacion->getnumero_recibo(),$parametro_facturacion->getincremento_recibo(),$parametro_facturacion->getcon_impuesto_recibo());
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($parametro_facturacion->getid_empresa(),Funciones::GetRealScapeString($parametro_facturacion->getnombre_factura(),$connexion),$parametro_facturacion->getnumero_factura(),$parametro_facturacion->getincremento_factura(),$parametro_facturacion->getsolo_costo_producto(),$parametro_facturacion->getnumero_factura_lote(),$parametro_facturacion->getincremento_factura_lote(),$parametro_facturacion->getnumero_devolucion(),$parametro_facturacion->getincremento_devolucion(),$parametro_facturacion->getid_termino_pago_cliente(),Funciones::GetRealScapeString($parametro_facturacion->getnombre_estimado(),$connexion),$parametro_facturacion->getnumero_estimado(),$parametro_facturacion->getincremento_estimado(),$parametro_facturacion->getsolo_costo_producto_estimado(),Funciones::GetRealScapeString($parametro_facturacion->getnombre_consignacion(),$connexion),$parametro_facturacion->getnumero_consignacion(),$parametro_facturacion->getincremento_consignacion(),$parametro_facturacion->getsolo_costo_producto_consignacion(),$parametro_facturacion->getcon_recibo(),Funciones::GetRealScapeString($parametro_facturacion->getnombre_recibo(),$connexion),$parametro_facturacion->getnumero_recibo(),$parametro_facturacion->getincremento_recibo(),$parametro_facturacion->getcon_impuesto_recibo(), $parametro_facturacion->getId(), Funciones::GetRealScapeString($parametro_facturacion->getVersionRow(),$connexion));
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
	
	public function setparametro_facturacion_Original(parametro_facturacion $parametro_facturacion) {
		$parametro_facturacion->setparametro_facturacion_Original(clone $parametro_facturacion);		
	}
	
	public function setparametro_facturacions_Original(array $parametro_facturacions) {
		foreach($parametro_facturacions as $parametro_facturacion){
			$parametro_facturacion->setparametro_facturacion_Original(clone $parametro_facturacion);
		}
	}
	
	public static function setparametro_facturacion_OriginalStatic(parametro_facturacion $parametro_facturacion) {
		$parametro_facturacion->setparametro_facturacion_Original(clone $parametro_facturacion);		
	}
	
	public static function setparametro_facturacions_OriginalStatic(array $parametro_facturacions) {		
		foreach($parametro_facturacions as $parametro_facturacion){
			$parametro_facturacion->setparametro_facturacion_Original(clone $parametro_facturacion);
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
