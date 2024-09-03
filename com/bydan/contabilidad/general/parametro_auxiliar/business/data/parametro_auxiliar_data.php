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
namespace com\bydan\contabilidad\general\parametro_auxiliar\business\data;

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

use com\bydan\contabilidad\general\parametro_auxiliar\business\entity\parametro_auxiliar;

//FK


use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\entity\empresa;

use com\bydan\contabilidad\general\tipo_costeo_kardex\business\data\tipo_costeo_kardex_data;
use com\bydan\contabilidad\general\tipo_costeo_kardex\business\entity\tipo_costeo_kardex;

//REL



class parametro_auxiliar_data extends GetEntitiesDataAccessHelper implements parametro_auxiliar_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='gen_';
	public static string $TABLE_NAME='gen_parametro_auxiliar';			
	public static string $TABLE_NAME_parametro_auxiliar='parametro_auxiliar';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_PARAMETRO_AUXILIAR_INSERT(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_PARAMETRO_AUXILIAR_UPDATE(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_PARAMETRO_AUXILIAR_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_PARAMETRO_AUXILIAR_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $parametro_auxiliar_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'parametro_auxiliar';
		
		parametro_auxiliar_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('GENERAL');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->parametro_auxiliar_DataAccessAdditional=new parametro_auxiliarDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_empresa,nombre_asignado,siguiente_numero_correlativo,incremento,mostrar_solo_costo_producto,con_codigo_secuencial_producto,contador_producto,id_tipo_costeo_kardex,con_producto_inactivo,con_busqueda_incremental,permitir_revisar_asiento,numero_decimales_unidades,mostrar_documento_anulado,siguiente_numero_correlativo_cc,con_eliminacion_fisica_asiento,siguiente_numero_correlativo_asiento,con_asiento_simple_factura,con_codigo_secuencial_cliente,contador_cliente,con_cliente_inactivo,con_codigo_secuencial_proveedor,contador_proveedor,con_proveedor_inactivo,abreviatura_registro_tributario,con_asiento_cheque) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,\'%s\',%d,%d,\'%d\',\'%d\',%d,%d,\'%d\',\'%d\',\'%d\',%d,\'%d\',%d,\'%d\',%d,\'%d\',\'%d\',%d,\'%d\',\'%d\',%d,\'%d\',\'%s\',\'%d\')';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_empresa=%d,nombre_asignado=\'%s\',siguiente_numero_correlativo=%d,incremento=%d,mostrar_solo_costo_producto=\'%d\',con_codigo_secuencial_producto=\'%d\',contador_producto=%d,id_tipo_costeo_kardex=%d,con_producto_inactivo=\'%d\',con_busqueda_incremental=\'%d\',permitir_revisar_asiento=\'%d\',numero_decimales_unidades=%d,mostrar_documento_anulado=\'%d\',siguiente_numero_correlativo_cc=%d,con_eliminacion_fisica_asiento=\'%d\',siguiente_numero_correlativo_asiento=%d,con_asiento_simple_factura=\'%d\',con_codigo_secuencial_cliente=\'%d\',contador_cliente=%d,con_cliente_inactivo=\'%d\',con_codigo_secuencial_proveedor=\'%d\',contador_proveedor=%d,con_proveedor_inactivo=\'%d\',abreviatura_registro_tributario=\'%s\',con_asiento_cheque=\'%d\' where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_asignado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.siguiente_numero_correlativo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.incremento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.mostrar_solo_costo_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_codigo_secuencial_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.contador_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_tipo_costeo_kardex,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_producto_inactivo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_busqueda_incremental,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.permitir_revisar_asiento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_decimales_unidades,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.mostrar_documento_anulado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.siguiente_numero_correlativo_cc,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_eliminacion_fisica_asiento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.siguiente_numero_correlativo_asiento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_asiento_simple_factura,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_codigo_secuencial_cliente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.contador_cliente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_cliente_inactivo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_codigo_secuencial_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.contador_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_proveedor_inactivo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.abreviatura_registro_tributario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_asiento_cheque from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(parametro_auxiliar $parametro_auxiliar,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($parametro_auxiliar->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=parametro_auxiliar_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($parametro_auxiliar->getId(),$connexion));				
				
			} else if ($parametro_auxiliar->getIsChanged()) {
				if($parametro_auxiliar->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=parametro_auxiliar_data::$QUERY_INSERT;
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$parametro_auxiliar->getid_empresa(),Funciones::GetRealScapeString($parametro_auxiliar->getnombre_asignado(),$connexion),$parametro_auxiliar->getsiguiente_numero_correlativo(),$parametro_auxiliar->getincremento(),$parametro_auxiliar->getmostrar_solo_costo_producto(),$parametro_auxiliar->getcon_codigo_secuencial_producto(),$parametro_auxiliar->getcontador_producto(),$parametro_auxiliar->getid_tipo_costeo_kardex(),$parametro_auxiliar->getcon_producto_inactivo(),$parametro_auxiliar->getcon_busqueda_incremental(),$parametro_auxiliar->getpermitir_revisar_asiento(),$parametro_auxiliar->getnumero_decimales_unidades(),$parametro_auxiliar->getmostrar_documento_anulado(),$parametro_auxiliar->getsiguiente_numero_correlativo_cc(),$parametro_auxiliar->getcon_eliminacion_fisica_asiento(),$parametro_auxiliar->getsiguiente_numero_correlativo_asiento(),$parametro_auxiliar->getcon_asiento_simple_factura(),$parametro_auxiliar->getcon_codigo_secuencial_cliente(),$parametro_auxiliar->getcontador_cliente(),$parametro_auxiliar->getcon_cliente_inactivo(),$parametro_auxiliar->getcon_codigo_secuencial_proveedor(),$parametro_auxiliar->getcontador_proveedor(),$parametro_auxiliar->getcon_proveedor_inactivo(),Funciones::GetRealScapeString($parametro_auxiliar->getabreviatura_registro_tributario(),$connexion),$parametro_auxiliar->getcon_asiento_cheque() );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=parametro_auxiliar_data::$QUERY_UPDATE;			
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$parametro_auxiliar->getid_empresa(),Funciones::GetRealScapeString($parametro_auxiliar->getnombre_asignado(),$connexion),$parametro_auxiliar->getsiguiente_numero_correlativo(),$parametro_auxiliar->getincremento(),$parametro_auxiliar->getmostrar_solo_costo_producto(),$parametro_auxiliar->getcon_codigo_secuencial_producto(),$parametro_auxiliar->getcontador_producto(),$parametro_auxiliar->getid_tipo_costeo_kardex(),$parametro_auxiliar->getcon_producto_inactivo(),$parametro_auxiliar->getcon_busqueda_incremental(),$parametro_auxiliar->getpermitir_revisar_asiento(),$parametro_auxiliar->getnumero_decimales_unidades(),$parametro_auxiliar->getmostrar_documento_anulado(),$parametro_auxiliar->getsiguiente_numero_correlativo_cc(),$parametro_auxiliar->getcon_eliminacion_fisica_asiento(),$parametro_auxiliar->getsiguiente_numero_correlativo_asiento(),$parametro_auxiliar->getcon_asiento_simple_factura(),$parametro_auxiliar->getcon_codigo_secuencial_cliente(),$parametro_auxiliar->getcontador_cliente(),$parametro_auxiliar->getcon_cliente_inactivo(),$parametro_auxiliar->getcon_codigo_secuencial_proveedor(),$parametro_auxiliar->getcontador_proveedor(),$parametro_auxiliar->getcon_proveedor_inactivo(),Funciones::GetRealScapeString($parametro_auxiliar->getabreviatura_registro_tributario(),$connexion),$parametro_auxiliar->getcon_asiento_cheque(), Funciones::GetRealScapeString($parametro_auxiliar->getId(),$connexion), Funciones::GetRealScapeString($parametro_auxiliar->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($parametro_auxiliar, $connexion,$strQuerySaveComplete,parametro_auxiliar_data::$TABLE_NAME,parametro_auxiliar_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				parametro_auxiliar_data::savePrepared($parametro_auxiliar, $connexion,$strQuerySave,parametro_auxiliar_data::$TABLE_NAME,parametro_auxiliar_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			parametro_auxiliar_data::setparametro_auxiliar_OriginalStatic($parametro_auxiliar);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(parametro_auxiliar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				parametro_auxiliar_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					parametro_auxiliar_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					parametro_auxiliar_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(parametro_auxiliar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					parametro_auxiliar_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(parametro_auxiliar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					parametro_auxiliar_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(parametro_auxiliar $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					parametro_auxiliar_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?parametro_auxiliar {		
		$entity = new parametro_auxiliar();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=parametro_auxiliar_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=parametro_auxiliar_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//General.parametro_auxiliar.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setparametro_auxiliar_Original(new parametro_auxiliar());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_auxiliar_data::$IS_WITH_SCHEMA);         	    
				/*$entity=parametro_auxiliar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setparametro_auxiliar_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_auxiliar_Original(),$resultSet,parametro_auxiliar_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setparametro_auxiliar_Original(parametro_auxiliar_data::getEntityBaseResult("",$entity->getparametro_auxiliar_Original(),$resultSet));
				//$entity->setparametro_auxiliar_Original($this->getEntityBaseResult("",$entity->getparametro_auxiliar_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?parametro_auxiliar {
		$entity = new parametro_auxiliar();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=parametro_auxiliar_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=parametro_auxiliar_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,parametro_auxiliar_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".General.parametro_auxiliar.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setparametro_auxiliar_Original(new parametro_auxiliar());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_auxiliar_data::$IS_WITH_SCHEMA);         	    
				/*$entity=parametro_auxiliar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setparametro_auxiliar_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_auxiliar_Original(),$resultSet,parametro_auxiliar_data::$IS_WITH_SCHEMA));         		
				////$entity->setparametro_auxiliar_Original(parametro_auxiliar_data::getEntityBaseResult("",$entity->getparametro_auxiliar_Original(),$resultSet));
				//$entity->setparametro_auxiliar_Original($this->getEntityBaseResult("",$entity->getparametro_auxiliar_Original(),$resultSet));
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
		$entity = new parametro_auxiliar();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=parametro_auxiliar_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=parametro_auxiliar_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,parametro_auxiliar_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new parametro_auxiliar();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_auxiliar_data::$IS_WITH_SCHEMA);         		
				/*$entity=parametro_auxiliar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setparametro_auxiliar_Original( new parametro_auxiliar());
				
				//$entity->setparametro_auxiliar_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_auxiliar_Original(),$resultSet,parametro_auxiliar_data::$IS_WITH_SCHEMA));         		
				////$entity->setparametro_auxiliar_Original(parametro_auxiliar_data::getEntityBaseResult("",$entity->getparametro_auxiliar_Original(),$resultSet));
				//$entity->setparametro_auxiliar_Original($this->getEntityBaseResult("",$entity->getparametro_auxiliar_Original(),$resultSet));
								
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
		$entity = new parametro_auxiliar();		  
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
      	    	$entity = new parametro_auxiliar();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_auxiliar_data::$IS_WITH_SCHEMA);         		
				/*$entity=parametro_auxiliar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setparametro_auxiliar_Original( new parametro_auxiliar());
				
				//$entity->setparametro_auxiliar_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_auxiliar_Original(),$resultSet,parametro_auxiliar_data::$IS_WITH_SCHEMA));         		
				////$entity->setparametro_auxiliar_Original(parametro_auxiliar_data::getEntityBaseResult("",$entity->getparametro_auxiliar_Original(),$resultSet));
				//$entity->setparametro_auxiliar_Original($this->getEntityBaseResult("",$entity->getparametro_auxiliar_Original(),$resultSet));
				
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
		$entity = new parametro_auxiliar();		  
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
      	    	$entity = new parametro_auxiliar();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_auxiliar_data::$IS_WITH_SCHEMA);         		
				/*$entity=parametro_auxiliar_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setparametro_auxiliar_Original( new parametro_auxiliar());				
				//$entity->setparametro_auxiliar_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_auxiliar_Original(),$resultSet,parametro_auxiliar_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setparametro_auxiliar_Original(parametro_auxiliar_data::getEntityBaseResult("",$entity->getparametro_auxiliar_Original(),$resultSet));
				//$entity->setparametro_auxiliar_Original($this->getEntityBaseResult("",$entity->getparametro_auxiliar_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=parametro_auxiliar_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,parametro_auxiliar $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,parametro_auxiliar_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,parametro_auxiliar_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getempresa(Connexion $connexion,$relparametro_auxiliar) : ?empresa{

		$empresa= new empresa();

		try {
			$empresaDataAccess=new empresa_data();
			$empresaDataAccess->isForFKData=$this->isForFKDataRels;
			$empresa=$empresaDataAccess->getEntity($connexion,$relparametro_auxiliar->getid_empresa());

		} catch(Exception $e) {
			throw $e;
		}

		return $empresa;
	}


	public function  gettipo_costeo_kardex(Connexion $connexion,$relparametro_auxiliar) : ?tipo_costeo_kardex{

		$tipo_costeo_kardex= new tipo_costeo_kardex();

		try {
			$tipo_costeo_kardexDataAccess=new tipo_costeo_kardex_data();
			$tipo_costeo_kardexDataAccess->isForFKData=$this->isForFKDataRels;
			$tipo_costeo_kardex=$tipo_costeo_kardexDataAccess->getEntity($connexion,$relparametro_auxiliar->getid_tipo_costeo_kardex());

		} catch(Exception $e) {
			throw $e;
		}

		return $tipo_costeo_kardex;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,parametro_auxiliar $entity,$resultSet) : parametro_auxiliar {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_empresa((int)$resultSet[$strPrefijo.'id_empresa']);
				$entity->setnombre_asignado(utf8_encode($resultSet[$strPrefijo.'nombre_asignado']));
				$entity->setsiguiente_numero_correlativo((int)$resultSet[$strPrefijo.'siguiente_numero_correlativo']);
				$entity->setincremento((int)$resultSet[$strPrefijo.'incremento']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setmostrar_solo_costo_producto($resultSet[$strPrefijo.'mostrar_solo_costo_producto']=='f'? false:true );
				} else {
					$entity->setmostrar_solo_costo_producto((bool)$resultSet[$strPrefijo.'mostrar_solo_costo_producto']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setcon_codigo_secuencial_producto($resultSet[$strPrefijo.'con_codigo_secuencial_producto']=='f'? false:true );
				} else {
					$entity->setcon_codigo_secuencial_producto((bool)$resultSet[$strPrefijo.'con_codigo_secuencial_producto']);
				}
				$entity->setcontador_producto((int)$resultSet[$strPrefijo.'contador_producto']);
				$entity->setid_tipo_costeo_kardex((int)$resultSet[$strPrefijo.'id_tipo_costeo_kardex']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setcon_producto_inactivo($resultSet[$strPrefijo.'con_producto_inactivo']=='f'? false:true );
				} else {
					$entity->setcon_producto_inactivo((bool)$resultSet[$strPrefijo.'con_producto_inactivo']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setcon_busqueda_incremental($resultSet[$strPrefijo.'con_busqueda_incremental']=='f'? false:true );
				} else {
					$entity->setcon_busqueda_incremental((bool)$resultSet[$strPrefijo.'con_busqueda_incremental']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setpermitir_revisar_asiento($resultSet[$strPrefijo.'permitir_revisar_asiento']=='f'? false:true );
				} else {
					$entity->setpermitir_revisar_asiento((bool)$resultSet[$strPrefijo.'permitir_revisar_asiento']);
				}
				$entity->setnumero_decimales_unidades((int)$resultSet[$strPrefijo.'numero_decimales_unidades']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setmostrar_documento_anulado($resultSet[$strPrefijo.'mostrar_documento_anulado']=='f'? false:true );
				} else {
					$entity->setmostrar_documento_anulado((bool)$resultSet[$strPrefijo.'mostrar_documento_anulado']);
				}
				$entity->setsiguiente_numero_correlativo_cc((int)$resultSet[$strPrefijo.'siguiente_numero_correlativo_cc']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setcon_eliminacion_fisica_asiento($resultSet[$strPrefijo.'con_eliminacion_fisica_asiento']=='f'? false:true );
				} else {
					$entity->setcon_eliminacion_fisica_asiento((bool)$resultSet[$strPrefijo.'con_eliminacion_fisica_asiento']);
				}
				$entity->setsiguiente_numero_correlativo_asiento((int)$resultSet[$strPrefijo.'siguiente_numero_correlativo_asiento']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setcon_asiento_simple_factura($resultSet[$strPrefijo.'con_asiento_simple_factura']=='f'? false:true );
				} else {
					$entity->setcon_asiento_simple_factura((bool)$resultSet[$strPrefijo.'con_asiento_simple_factura']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setcon_codigo_secuencial_cliente($resultSet[$strPrefijo.'con_codigo_secuencial_cliente']=='f'? false:true );
				} else {
					$entity->setcon_codigo_secuencial_cliente((bool)$resultSet[$strPrefijo.'con_codigo_secuencial_cliente']);
				}
				$entity->setcontador_cliente((int)$resultSet[$strPrefijo.'contador_cliente']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setcon_cliente_inactivo($resultSet[$strPrefijo.'con_cliente_inactivo']=='f'? false:true );
				} else {
					$entity->setcon_cliente_inactivo((bool)$resultSet[$strPrefijo.'con_cliente_inactivo']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setcon_codigo_secuencial_proveedor($resultSet[$strPrefijo.'con_codigo_secuencial_proveedor']=='f'? false:true );
				} else {
					$entity->setcon_codigo_secuencial_proveedor((bool)$resultSet[$strPrefijo.'con_codigo_secuencial_proveedor']);
				}
				$entity->setcontador_proveedor((int)$resultSet[$strPrefijo.'contador_proveedor']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setcon_proveedor_inactivo($resultSet[$strPrefijo.'con_proveedor_inactivo']=='f'? false:true );
				} else {
					$entity->setcon_proveedor_inactivo((bool)$resultSet[$strPrefijo.'con_proveedor_inactivo']);
				}
				$entity->setabreviatura_registro_tributario(utf8_encode($resultSet[$strPrefijo.'abreviatura_registro_tributario']));
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setcon_asiento_cheque($resultSet[$strPrefijo.'con_asiento_cheque']=='f'? false:true );
				} else {
					$entity->setcon_asiento_cheque((bool)$resultSet[$strPrefijo.'con_asiento_cheque']);
				}
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,parametro_auxiliar $parametro_auxiliar,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $parametro_auxiliar->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'isiiiiiiiiiiiiiiiiiiiiisi', $parametro_auxiliar->getid_empresa(),$parametro_auxiliar->getnombre_asignado(),$parametro_auxiliar->getsiguiente_numero_correlativo(),$parametro_auxiliar->getincremento(),$parametro_auxiliar->getmostrar_solo_costo_producto(),$parametro_auxiliar->getcon_codigo_secuencial_producto(),$parametro_auxiliar->getcontador_producto(),$parametro_auxiliar->getid_tipo_costeo_kardex(),$parametro_auxiliar->getcon_producto_inactivo(),$parametro_auxiliar->getcon_busqueda_incremental(),$parametro_auxiliar->getpermitir_revisar_asiento(),$parametro_auxiliar->getnumero_decimales_unidades(),$parametro_auxiliar->getmostrar_documento_anulado(),$parametro_auxiliar->getsiguiente_numero_correlativo_cc(),$parametro_auxiliar->getcon_eliminacion_fisica_asiento(),$parametro_auxiliar->getsiguiente_numero_correlativo_asiento(),$parametro_auxiliar->getcon_asiento_simple_factura(),$parametro_auxiliar->getcon_codigo_secuencial_cliente(),$parametro_auxiliar->getcontador_cliente(),$parametro_auxiliar->getcon_cliente_inactivo(),$parametro_auxiliar->getcon_codigo_secuencial_proveedor(),$parametro_auxiliar->getcontador_proveedor(),$parametro_auxiliar->getcon_proveedor_inactivo(),$parametro_auxiliar->getabreviatura_registro_tributario(),$parametro_auxiliar->getcon_asiento_cheque());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'isiiiiiiiiiiiiiiiiiiiiisiis', $parametro_auxiliar->getid_empresa(),$parametro_auxiliar->getnombre_asignado(),$parametro_auxiliar->getsiguiente_numero_correlativo(),$parametro_auxiliar->getincremento(),$parametro_auxiliar->getmostrar_solo_costo_producto(),$parametro_auxiliar->getcon_codigo_secuencial_producto(),$parametro_auxiliar->getcontador_producto(),$parametro_auxiliar->getid_tipo_costeo_kardex(),$parametro_auxiliar->getcon_producto_inactivo(),$parametro_auxiliar->getcon_busqueda_incremental(),$parametro_auxiliar->getpermitir_revisar_asiento(),$parametro_auxiliar->getnumero_decimales_unidades(),$parametro_auxiliar->getmostrar_documento_anulado(),$parametro_auxiliar->getsiguiente_numero_correlativo_cc(),$parametro_auxiliar->getcon_eliminacion_fisica_asiento(),$parametro_auxiliar->getsiguiente_numero_correlativo_asiento(),$parametro_auxiliar->getcon_asiento_simple_factura(),$parametro_auxiliar->getcon_codigo_secuencial_cliente(),$parametro_auxiliar->getcontador_cliente(),$parametro_auxiliar->getcon_cliente_inactivo(),$parametro_auxiliar->getcon_codigo_secuencial_proveedor(),$parametro_auxiliar->getcontador_proveedor(),$parametro_auxiliar->getcon_proveedor_inactivo(),$parametro_auxiliar->getabreviatura_registro_tributario(),$parametro_auxiliar->getcon_asiento_cheque(), $parametro_auxiliar->getId(), Funciones::GetRealScapeString($parametro_auxiliar->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,parametro_auxiliar $parametro_auxiliar,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($parametro_auxiliar->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($parametro_auxiliar->getid_empresa(),Funciones::GetRealScapeString($parametro_auxiliar->getnombre_asignado(),$connexion),$parametro_auxiliar->getsiguiente_numero_correlativo(),$parametro_auxiliar->getincremento(),$parametro_auxiliar->getmostrar_solo_costo_producto(),$parametro_auxiliar->getcon_codigo_secuencial_producto(),$parametro_auxiliar->getcontador_producto(),$parametro_auxiliar->getid_tipo_costeo_kardex(),$parametro_auxiliar->getcon_producto_inactivo(),$parametro_auxiliar->getcon_busqueda_incremental(),$parametro_auxiliar->getpermitir_revisar_asiento(),$parametro_auxiliar->getnumero_decimales_unidades(),$parametro_auxiliar->getmostrar_documento_anulado(),$parametro_auxiliar->getsiguiente_numero_correlativo_cc(),$parametro_auxiliar->getcon_eliminacion_fisica_asiento(),$parametro_auxiliar->getsiguiente_numero_correlativo_asiento(),$parametro_auxiliar->getcon_asiento_simple_factura(),$parametro_auxiliar->getcon_codigo_secuencial_cliente(),$parametro_auxiliar->getcontador_cliente(),$parametro_auxiliar->getcon_cliente_inactivo(),$parametro_auxiliar->getcon_codigo_secuencial_proveedor(),$parametro_auxiliar->getcontador_proveedor(),$parametro_auxiliar->getcon_proveedor_inactivo(),Funciones::GetRealScapeString($parametro_auxiliar->getabreviatura_registro_tributario(),$connexion),$parametro_auxiliar->getcon_asiento_cheque());
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($parametro_auxiliar->getid_empresa(),Funciones::GetRealScapeString($parametro_auxiliar->getnombre_asignado(),$connexion),$parametro_auxiliar->getsiguiente_numero_correlativo(),$parametro_auxiliar->getincremento(),$parametro_auxiliar->getmostrar_solo_costo_producto(),$parametro_auxiliar->getcon_codigo_secuencial_producto(),$parametro_auxiliar->getcontador_producto(),$parametro_auxiliar->getid_tipo_costeo_kardex(),$parametro_auxiliar->getcon_producto_inactivo(),$parametro_auxiliar->getcon_busqueda_incremental(),$parametro_auxiliar->getpermitir_revisar_asiento(),$parametro_auxiliar->getnumero_decimales_unidades(),$parametro_auxiliar->getmostrar_documento_anulado(),$parametro_auxiliar->getsiguiente_numero_correlativo_cc(),$parametro_auxiliar->getcon_eliminacion_fisica_asiento(),$parametro_auxiliar->getsiguiente_numero_correlativo_asiento(),$parametro_auxiliar->getcon_asiento_simple_factura(),$parametro_auxiliar->getcon_codigo_secuencial_cliente(),$parametro_auxiliar->getcontador_cliente(),$parametro_auxiliar->getcon_cliente_inactivo(),$parametro_auxiliar->getcon_codigo_secuencial_proveedor(),$parametro_auxiliar->getcontador_proveedor(),$parametro_auxiliar->getcon_proveedor_inactivo(),Funciones::GetRealScapeString($parametro_auxiliar->getabreviatura_registro_tributario(),$connexion),$parametro_auxiliar->getcon_asiento_cheque(), $parametro_auxiliar->getId(), Funciones::GetRealScapeString($parametro_auxiliar->getVersionRow(),$connexion));
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
	
	public function setparametro_auxiliar_Original(parametro_auxiliar $parametro_auxiliar) {
		$parametro_auxiliar->setparametro_auxiliar_Original(clone $parametro_auxiliar);		
	}
	
	public function setparametro_auxiliars_Original(array $parametro_auxiliars) {
		foreach($parametro_auxiliars as $parametro_auxiliar){
			$parametro_auxiliar->setparametro_auxiliar_Original(clone $parametro_auxiliar);
		}
	}
	
	public static function setparametro_auxiliar_OriginalStatic(parametro_auxiliar $parametro_auxiliar) {
		$parametro_auxiliar->setparametro_auxiliar_Original(clone $parametro_auxiliar);		
	}
	
	public static function setparametro_auxiliars_OriginalStatic(array $parametro_auxiliars) {		
		foreach($parametro_auxiliars as $parametro_auxiliar){
			$parametro_auxiliar->setparametro_auxiliar_Original(clone $parametro_auxiliar);
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
