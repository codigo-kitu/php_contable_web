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
namespace com\bydan\contabilidad\general\parametro_auxiliar_facturacion\business\data;

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

use com\bydan\contabilidad\general\parametro_auxiliar_facturacion\business\entity\parametro_auxiliar_facturacion;

//FK


use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\entity\empresa;

//REL



class parametro_auxiliar_facturacion_data extends GetEntitiesDataAccessHelper implements parametro_auxiliar_facturacion_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='gen_';
	public static string $TABLE_NAME='gen_parametro_auxiliar_facturacion';			
	public static string $TABLE_NAME_parametro_auxiliar_facturacion='parametro_auxiliar_facturacion';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_PARAMETRO_AUXILIAR_FACTURACION_INSERT(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_PARAMETRO_AUXILIAR_FACTURACION_UPDATE(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_PARAMETRO_AUXILIAR_FACTURACION_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_PARAMETRO_AUXILIAR_FACTURACION_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $parametro_auxiliar_facturacion_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'parametro_auxiliar_facturacion';
		
		parametro_auxiliar_facturacion_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('GENERAL');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->parametro_auxiliar_facturacion_DataAccessAdditional=new parametro_auxiliar_facturacionDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_empresa,nombre_tipo_factura,siguiente_numero_correlativo,incremento,con_creacion_rapida_producto,con_busqueda_producto_fabricante,con_solo_costo_producto,con_recibo,nombre_tipo_factura_recibo,siguiente_numero_correlativo_recibo,incremento_recibo,con_impuesto_final_boleta,con_ticket,nombre_tipo_factura_ticket,siguiente_numero_correlativo_ticket,incremento_ticket,con_impuesto_final_ticket) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,\'%s\',%d,%d,\'%d\',\'%d\',\'%d\',\'%d\',\'%s\',%d,%d,\'%d\',\'%d\',\'%s\',%d,%d,\'%d\')';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_empresa=%d,nombre_tipo_factura=\'%s\',siguiente_numero_correlativo=%d,incremento=%d,con_creacion_rapida_producto=\'%d\',con_busqueda_producto_fabricante=\'%d\',con_solo_costo_producto=\'%d\',con_recibo=\'%d\',nombre_tipo_factura_recibo=\'%s\',siguiente_numero_correlativo_recibo=%d,incremento_recibo=%d,con_impuesto_final_boleta=\'%d\',con_ticket=\'%d\',nombre_tipo_factura_ticket=\'%s\',siguiente_numero_correlativo_ticket=%d,incremento_ticket=%d,con_impuesto_final_ticket=\'%d\' where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_tipo_factura,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.siguiente_numero_correlativo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.incremento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_creacion_rapida_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_busqueda_producto_fabricante,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_solo_costo_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_recibo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_tipo_factura_recibo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.siguiente_numero_correlativo_recibo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.incremento_recibo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_impuesto_final_boleta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_ticket,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_tipo_factura_ticket,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.siguiente_numero_correlativo_ticket,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.incremento_ticket,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_impuesto_final_ticket from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(parametro_auxiliar_facturacion $parametro_auxiliar_facturacion,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($parametro_auxiliar_facturacion->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=parametro_auxiliar_facturacion_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($parametro_auxiliar_facturacion->getId(),$connexion));				
				
			} else if ($parametro_auxiliar_facturacion->getIsChanged()) {
				if($parametro_auxiliar_facturacion->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=parametro_auxiliar_facturacion_data::$QUERY_INSERT;
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$parametro_auxiliar_facturacion->getid_empresa(),Funciones::GetRealScapeString($parametro_auxiliar_facturacion->getnombre_tipo_factura(),$connexion),$parametro_auxiliar_facturacion->getsiguiente_numero_correlativo(),$parametro_auxiliar_facturacion->getincremento(),$parametro_auxiliar_facturacion->getcon_creacion_rapida_producto(),$parametro_auxiliar_facturacion->getcon_busqueda_producto_fabricante(),$parametro_auxiliar_facturacion->getcon_solo_costo_producto(),$parametro_auxiliar_facturacion->getcon_recibo(),Funciones::GetRealScapeString($parametro_auxiliar_facturacion->getnombre_tipo_factura_recibo(),$connexion),$parametro_auxiliar_facturacion->getsiguiente_numero_correlativo_recibo(),$parametro_auxiliar_facturacion->getincremento_recibo(),$parametro_auxiliar_facturacion->getcon_impuesto_final_boleta(),$parametro_auxiliar_facturacion->getcon_ticket(),Funciones::GetRealScapeString($parametro_auxiliar_facturacion->getnombre_tipo_factura_ticket(),$connexion),$parametro_auxiliar_facturacion->getsiguiente_numero_correlativo_ticket(),$parametro_auxiliar_facturacion->getincremento_ticket(),$parametro_auxiliar_facturacion->getcon_impuesto_final_ticket() );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=parametro_auxiliar_facturacion_data::$QUERY_UPDATE;			
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$parametro_auxiliar_facturacion->getid_empresa(),Funciones::GetRealScapeString($parametro_auxiliar_facturacion->getnombre_tipo_factura(),$connexion),$parametro_auxiliar_facturacion->getsiguiente_numero_correlativo(),$parametro_auxiliar_facturacion->getincremento(),$parametro_auxiliar_facturacion->getcon_creacion_rapida_producto(),$parametro_auxiliar_facturacion->getcon_busqueda_producto_fabricante(),$parametro_auxiliar_facturacion->getcon_solo_costo_producto(),$parametro_auxiliar_facturacion->getcon_recibo(),Funciones::GetRealScapeString($parametro_auxiliar_facturacion->getnombre_tipo_factura_recibo(),$connexion),$parametro_auxiliar_facturacion->getsiguiente_numero_correlativo_recibo(),$parametro_auxiliar_facturacion->getincremento_recibo(),$parametro_auxiliar_facturacion->getcon_impuesto_final_boleta(),$parametro_auxiliar_facturacion->getcon_ticket(),Funciones::GetRealScapeString($parametro_auxiliar_facturacion->getnombre_tipo_factura_ticket(),$connexion),$parametro_auxiliar_facturacion->getsiguiente_numero_correlativo_ticket(),$parametro_auxiliar_facturacion->getincremento_ticket(),$parametro_auxiliar_facturacion->getcon_impuesto_final_ticket(), Funciones::GetRealScapeString($parametro_auxiliar_facturacion->getId(),$connexion), Funciones::GetRealScapeString($parametro_auxiliar_facturacion->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($parametro_auxiliar_facturacion, $connexion,$strQuerySaveComplete,parametro_auxiliar_facturacion_data::$TABLE_NAME,parametro_auxiliar_facturacion_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				parametro_auxiliar_facturacion_data::savePrepared($parametro_auxiliar_facturacion, $connexion,$strQuerySave,parametro_auxiliar_facturacion_data::$TABLE_NAME,parametro_auxiliar_facturacion_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			parametro_auxiliar_facturacion_data::setparametro_auxiliar_facturacion_OriginalStatic($parametro_auxiliar_facturacion);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(parametro_auxiliar_facturacion $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				parametro_auxiliar_facturacion_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					parametro_auxiliar_facturacion_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					parametro_auxiliar_facturacion_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(parametro_auxiliar_facturacion $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					parametro_auxiliar_facturacion_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(parametro_auxiliar_facturacion $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					parametro_auxiliar_facturacion_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(parametro_auxiliar_facturacion $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					parametro_auxiliar_facturacion_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?parametro_auxiliar_facturacion {		
		$entity = new parametro_auxiliar_facturacion();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=parametro_auxiliar_facturacion_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=parametro_auxiliar_facturacion_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//General.parametro_auxiliar_facturacion.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setparametro_auxiliar_facturacion_Original(new parametro_auxiliar_facturacion());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_auxiliar_facturacion_data::$IS_WITH_SCHEMA);         	    
				/*$entity=parametro_auxiliar_facturacion_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setparametro_auxiliar_facturacion_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_auxiliar_facturacion_Original(),$resultSet,parametro_auxiliar_facturacion_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setparametro_auxiliar_facturacion_Original(parametro_auxiliar_facturacion_data::getEntityBaseResult("",$entity->getparametro_auxiliar_facturacion_Original(),$resultSet));
				//$entity->setparametro_auxiliar_facturacion_Original($this->getEntityBaseResult("",$entity->getparametro_auxiliar_facturacion_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?parametro_auxiliar_facturacion {
		$entity = new parametro_auxiliar_facturacion();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=parametro_auxiliar_facturacion_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=parametro_auxiliar_facturacion_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,parametro_auxiliar_facturacion_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".General.parametro_auxiliar_facturacion.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setparametro_auxiliar_facturacion_Original(new parametro_auxiliar_facturacion());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_auxiliar_facturacion_data::$IS_WITH_SCHEMA);         	    
				/*$entity=parametro_auxiliar_facturacion_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setparametro_auxiliar_facturacion_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_auxiliar_facturacion_Original(),$resultSet,parametro_auxiliar_facturacion_data::$IS_WITH_SCHEMA));         		
				////$entity->setparametro_auxiliar_facturacion_Original(parametro_auxiliar_facturacion_data::getEntityBaseResult("",$entity->getparametro_auxiliar_facturacion_Original(),$resultSet));
				//$entity->setparametro_auxiliar_facturacion_Original($this->getEntityBaseResult("",$entity->getparametro_auxiliar_facturacion_Original(),$resultSet));
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
		$entity = new parametro_auxiliar_facturacion();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=parametro_auxiliar_facturacion_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=parametro_auxiliar_facturacion_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,parametro_auxiliar_facturacion_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new parametro_auxiliar_facturacion();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_auxiliar_facturacion_data::$IS_WITH_SCHEMA);         		
				/*$entity=parametro_auxiliar_facturacion_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setparametro_auxiliar_facturacion_Original( new parametro_auxiliar_facturacion());
				
				//$entity->setparametro_auxiliar_facturacion_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_auxiliar_facturacion_Original(),$resultSet,parametro_auxiliar_facturacion_data::$IS_WITH_SCHEMA));         		
				////$entity->setparametro_auxiliar_facturacion_Original(parametro_auxiliar_facturacion_data::getEntityBaseResult("",$entity->getparametro_auxiliar_facturacion_Original(),$resultSet));
				//$entity->setparametro_auxiliar_facturacion_Original($this->getEntityBaseResult("",$entity->getparametro_auxiliar_facturacion_Original(),$resultSet));
								
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
		$entity = new parametro_auxiliar_facturacion();		  
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
      	    	$entity = new parametro_auxiliar_facturacion();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_auxiliar_facturacion_data::$IS_WITH_SCHEMA);         		
				/*$entity=parametro_auxiliar_facturacion_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setparametro_auxiliar_facturacion_Original( new parametro_auxiliar_facturacion());
				
				//$entity->setparametro_auxiliar_facturacion_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_auxiliar_facturacion_Original(),$resultSet,parametro_auxiliar_facturacion_data::$IS_WITH_SCHEMA));         		
				////$entity->setparametro_auxiliar_facturacion_Original(parametro_auxiliar_facturacion_data::getEntityBaseResult("",$entity->getparametro_auxiliar_facturacion_Original(),$resultSet));
				//$entity->setparametro_auxiliar_facturacion_Original($this->getEntityBaseResult("",$entity->getparametro_auxiliar_facturacion_Original(),$resultSet));
				
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
		$entity = new parametro_auxiliar_facturacion();		  
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
      	    	$entity = new parametro_auxiliar_facturacion();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_auxiliar_facturacion_data::$IS_WITH_SCHEMA);         		
				/*$entity=parametro_auxiliar_facturacion_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setparametro_auxiliar_facturacion_Original( new parametro_auxiliar_facturacion());				
				//$entity->setparametro_auxiliar_facturacion_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_auxiliar_facturacion_Original(),$resultSet,parametro_auxiliar_facturacion_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setparametro_auxiliar_facturacion_Original(parametro_auxiliar_facturacion_data::getEntityBaseResult("",$entity->getparametro_auxiliar_facturacion_Original(),$resultSet));
				//$entity->setparametro_auxiliar_facturacion_Original($this->getEntityBaseResult("",$entity->getparametro_auxiliar_facturacion_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=parametro_auxiliar_facturacion_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,parametro_auxiliar_facturacion $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,parametro_auxiliar_facturacion_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,parametro_auxiliar_facturacion_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getempresa(Connexion $connexion,$relparametro_auxiliar_facturacion) : ?empresa{

		$empresa= new empresa();

		try {
			$empresaDataAccess=new empresa_data();
			$empresaDataAccess->isForFKData=$this->isForFKDataRels;
			$empresa=$empresaDataAccess->getEntity($connexion,$relparametro_auxiliar_facturacion->getid_empresa());

		} catch(Exception $e) {
			throw $e;
		}

		return $empresa;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,parametro_auxiliar_facturacion $entity,$resultSet) : parametro_auxiliar_facturacion {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_empresa((int)$resultSet[$strPrefijo.'id_empresa']);
				$entity->setnombre_tipo_factura(utf8_encode($resultSet[$strPrefijo.'nombre_tipo_factura']));
				$entity->setsiguiente_numero_correlativo((int)$resultSet[$strPrefijo.'siguiente_numero_correlativo']);
				$entity->setincremento((int)$resultSet[$strPrefijo.'incremento']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setcon_creacion_rapida_producto($resultSet[$strPrefijo.'con_creacion_rapida_producto']=='f'? false:true );
				} else {
					$entity->setcon_creacion_rapida_producto((bool)$resultSet[$strPrefijo.'con_creacion_rapida_producto']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setcon_busqueda_producto_fabricante($resultSet[$strPrefijo.'con_busqueda_producto_fabricante']=='f'? false:true );
				} else {
					$entity->setcon_busqueda_producto_fabricante((bool)$resultSet[$strPrefijo.'con_busqueda_producto_fabricante']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setcon_solo_costo_producto($resultSet[$strPrefijo.'con_solo_costo_producto']=='f'? false:true );
				} else {
					$entity->setcon_solo_costo_producto((bool)$resultSet[$strPrefijo.'con_solo_costo_producto']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setcon_recibo($resultSet[$strPrefijo.'con_recibo']=='f'? false:true );
				} else {
					$entity->setcon_recibo((bool)$resultSet[$strPrefijo.'con_recibo']);
				}
				$entity->setnombre_tipo_factura_recibo(utf8_encode($resultSet[$strPrefijo.'nombre_tipo_factura_recibo']));
				$entity->setsiguiente_numero_correlativo_recibo((int)$resultSet[$strPrefijo.'siguiente_numero_correlativo_recibo']);
				$entity->setincremento_recibo((int)$resultSet[$strPrefijo.'incremento_recibo']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setcon_impuesto_final_boleta($resultSet[$strPrefijo.'con_impuesto_final_boleta']=='f'? false:true );
				} else {
					$entity->setcon_impuesto_final_boleta((bool)$resultSet[$strPrefijo.'con_impuesto_final_boleta']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setcon_ticket($resultSet[$strPrefijo.'con_ticket']=='f'? false:true );
				} else {
					$entity->setcon_ticket((bool)$resultSet[$strPrefijo.'con_ticket']);
				}
				$entity->setnombre_tipo_factura_ticket(utf8_encode($resultSet[$strPrefijo.'nombre_tipo_factura_ticket']));
				$entity->setsiguiente_numero_correlativo_ticket((int)$resultSet[$strPrefijo.'siguiente_numero_correlativo_ticket']);
				$entity->setincremento_ticket((int)$resultSet[$strPrefijo.'incremento_ticket']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setcon_impuesto_final_ticket($resultSet[$strPrefijo.'con_impuesto_final_ticket']=='f'? false:true );
				} else {
					$entity->setcon_impuesto_final_ticket((bool)$resultSet[$strPrefijo.'con_impuesto_final_ticket']);
				}
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,parametro_auxiliar_facturacion $parametro_auxiliar_facturacion,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $parametro_auxiliar_facturacion->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'isiiiiiisiiiisiii', $parametro_auxiliar_facturacion->getid_empresa(),$parametro_auxiliar_facturacion->getnombre_tipo_factura(),$parametro_auxiliar_facturacion->getsiguiente_numero_correlativo(),$parametro_auxiliar_facturacion->getincremento(),$parametro_auxiliar_facturacion->getcon_creacion_rapida_producto(),$parametro_auxiliar_facturacion->getcon_busqueda_producto_fabricante(),$parametro_auxiliar_facturacion->getcon_solo_costo_producto(),$parametro_auxiliar_facturacion->getcon_recibo(),$parametro_auxiliar_facturacion->getnombre_tipo_factura_recibo(),$parametro_auxiliar_facturacion->getsiguiente_numero_correlativo_recibo(),$parametro_auxiliar_facturacion->getincremento_recibo(),$parametro_auxiliar_facturacion->getcon_impuesto_final_boleta(),$parametro_auxiliar_facturacion->getcon_ticket(),$parametro_auxiliar_facturacion->getnombre_tipo_factura_ticket(),$parametro_auxiliar_facturacion->getsiguiente_numero_correlativo_ticket(),$parametro_auxiliar_facturacion->getincremento_ticket(),$parametro_auxiliar_facturacion->getcon_impuesto_final_ticket());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'isiiiiiisiiiisiiiis', $parametro_auxiliar_facturacion->getid_empresa(),$parametro_auxiliar_facturacion->getnombre_tipo_factura(),$parametro_auxiliar_facturacion->getsiguiente_numero_correlativo(),$parametro_auxiliar_facturacion->getincremento(),$parametro_auxiliar_facturacion->getcon_creacion_rapida_producto(),$parametro_auxiliar_facturacion->getcon_busqueda_producto_fabricante(),$parametro_auxiliar_facturacion->getcon_solo_costo_producto(),$parametro_auxiliar_facturacion->getcon_recibo(),$parametro_auxiliar_facturacion->getnombre_tipo_factura_recibo(),$parametro_auxiliar_facturacion->getsiguiente_numero_correlativo_recibo(),$parametro_auxiliar_facturacion->getincremento_recibo(),$parametro_auxiliar_facturacion->getcon_impuesto_final_boleta(),$parametro_auxiliar_facturacion->getcon_ticket(),$parametro_auxiliar_facturacion->getnombre_tipo_factura_ticket(),$parametro_auxiliar_facturacion->getsiguiente_numero_correlativo_ticket(),$parametro_auxiliar_facturacion->getincremento_ticket(),$parametro_auxiliar_facturacion->getcon_impuesto_final_ticket(), $parametro_auxiliar_facturacion->getId(), Funciones::GetRealScapeString($parametro_auxiliar_facturacion->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,parametro_auxiliar_facturacion $parametro_auxiliar_facturacion,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($parametro_auxiliar_facturacion->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($parametro_auxiliar_facturacion->getid_empresa(),Funciones::GetRealScapeString($parametro_auxiliar_facturacion->getnombre_tipo_factura(),$connexion),$parametro_auxiliar_facturacion->getsiguiente_numero_correlativo(),$parametro_auxiliar_facturacion->getincremento(),$parametro_auxiliar_facturacion->getcon_creacion_rapida_producto(),$parametro_auxiliar_facturacion->getcon_busqueda_producto_fabricante(),$parametro_auxiliar_facturacion->getcon_solo_costo_producto(),$parametro_auxiliar_facturacion->getcon_recibo(),Funciones::GetRealScapeString($parametro_auxiliar_facturacion->getnombre_tipo_factura_recibo(),$connexion),$parametro_auxiliar_facturacion->getsiguiente_numero_correlativo_recibo(),$parametro_auxiliar_facturacion->getincremento_recibo(),$parametro_auxiliar_facturacion->getcon_impuesto_final_boleta(),$parametro_auxiliar_facturacion->getcon_ticket(),Funciones::GetRealScapeString($parametro_auxiliar_facturacion->getnombre_tipo_factura_ticket(),$connexion),$parametro_auxiliar_facturacion->getsiguiente_numero_correlativo_ticket(),$parametro_auxiliar_facturacion->getincremento_ticket(),$parametro_auxiliar_facturacion->getcon_impuesto_final_ticket());
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($parametro_auxiliar_facturacion->getid_empresa(),Funciones::GetRealScapeString($parametro_auxiliar_facturacion->getnombre_tipo_factura(),$connexion),$parametro_auxiliar_facturacion->getsiguiente_numero_correlativo(),$parametro_auxiliar_facturacion->getincremento(),$parametro_auxiliar_facturacion->getcon_creacion_rapida_producto(),$parametro_auxiliar_facturacion->getcon_busqueda_producto_fabricante(),$parametro_auxiliar_facturacion->getcon_solo_costo_producto(),$parametro_auxiliar_facturacion->getcon_recibo(),Funciones::GetRealScapeString($parametro_auxiliar_facturacion->getnombre_tipo_factura_recibo(),$connexion),$parametro_auxiliar_facturacion->getsiguiente_numero_correlativo_recibo(),$parametro_auxiliar_facturacion->getincremento_recibo(),$parametro_auxiliar_facturacion->getcon_impuesto_final_boleta(),$parametro_auxiliar_facturacion->getcon_ticket(),Funciones::GetRealScapeString($parametro_auxiliar_facturacion->getnombre_tipo_factura_ticket(),$connexion),$parametro_auxiliar_facturacion->getsiguiente_numero_correlativo_ticket(),$parametro_auxiliar_facturacion->getincremento_ticket(),$parametro_auxiliar_facturacion->getcon_impuesto_final_ticket(), $parametro_auxiliar_facturacion->getId(), Funciones::GetRealScapeString($parametro_auxiliar_facturacion->getVersionRow(),$connexion));
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
	
	public function setparametro_auxiliar_facturacion_Original(parametro_auxiliar_facturacion $parametro_auxiliar_facturacion) {
		$parametro_auxiliar_facturacion->setparametro_auxiliar_facturacion_Original(clone $parametro_auxiliar_facturacion);		
	}
	
	public function setparametro_auxiliar_facturacions_Original(array $parametro_auxiliar_facturacions) {
		foreach($parametro_auxiliar_facturacions as $parametro_auxiliar_facturacion){
			$parametro_auxiliar_facturacion->setparametro_auxiliar_facturacion_Original(clone $parametro_auxiliar_facturacion);
		}
	}
	
	public static function setparametro_auxiliar_facturacion_OriginalStatic(parametro_auxiliar_facturacion $parametro_auxiliar_facturacion) {
		$parametro_auxiliar_facturacion->setparametro_auxiliar_facturacion_Original(clone $parametro_auxiliar_facturacion);		
	}
	
	public static function setparametro_auxiliar_facturacions_OriginalStatic(array $parametro_auxiliar_facturacions) {		
		foreach($parametro_auxiliar_facturacions as $parametro_auxiliar_facturacion){
			$parametro_auxiliar_facturacion->setparametro_auxiliar_facturacion_Original(clone $parametro_auxiliar_facturacion);
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
