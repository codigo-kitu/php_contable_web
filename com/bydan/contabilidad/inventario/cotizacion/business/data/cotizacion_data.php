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
namespace com\bydan\contabilidad\inventario\cotizacion\business\data;

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

use com\bydan\contabilidad\inventario\cotizacion\business\entity\cotizacion;

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

use com\bydan\contabilidad\cuentaspagar\proveedor\business\data\proveedor_data;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;

use com\bydan\contabilidad\facturacion\vendedor\business\data\vendedor_data;
use com\bydan\contabilidad\facturacion\vendedor\business\entity\vendedor;

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\data\termino_pago_proveedor_data;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity\termino_pago_proveedor;

use com\bydan\contabilidad\contabilidad\moneda\business\data\moneda_data;
use com\bydan\contabilidad\contabilidad\moneda\business\entity\moneda;

use com\bydan\contabilidad\general\estado\business\data\estado_data;
use com\bydan\contabilidad\general\estado\business\entity\estado;

//REL

use com\bydan\contabilidad\inventario\cotizacion_detalle\business\data\cotizacion_detalle_data;


class cotizacion_data extends GetEntitiesDataAccessHelper implements cotizacion_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='inv_';
	public static string $TABLE_NAME='inv_cotizacion';			
	public static string $TABLE_NAME_cotizacion='cotizacion';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_COTIZACION_INSERT(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_COTIZACION_UPDATE(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_COTIZACION_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_COTIZACION_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $cotizacion_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'cotizacion';
		
		cotizacion_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('INVENTARIO');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cotizacion_DataAccessAdditional=new cotizacionDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_empresa,id_sucursal,id_ejercicio,id_periodo,id_usuario,id_proveedor,ruc,numero,fecha_emision,id_vendedor,id_termino_pago_proveedor,fecha_vence,id_moneda,cotizacion,direccion,enviar,observacion,id_estado,sub_total,descuento_monto,descuento_porciento,iva_monto,iva_porciento,total,otro_monto,otro_porciento) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%d,%d,%d,%d,%d,\'%s\',\'%s\',\'%s\',%d,%d,\'%s\',%d,%f,\'%s\',\'%s\',\'%s\',%s,%f,%f,%f,%f,%f,%f,%f,%f)';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_empresa=%d,id_sucursal=%d,id_ejercicio=%d,id_periodo=%d,id_usuario=%d,id_proveedor=%d,ruc=\'%s\',numero=\'%s\',fecha_emision=\'%s\',id_vendedor=%d,id_termino_pago_proveedor=%d,fecha_vence=\'%s\',id_moneda=%d,cotizacion=%f,direccion=\'%s\',enviar=\'%s\',observacion=\'%s\',id_estado=%s,sub_total=%f,descuento_monto=%f,descuento_porciento=%f,iva_monto=%f,iva_porciento=%f,total=%f,otro_monto=%f,otro_porciento=%f where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_sucursal,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_ejercicio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_periodo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_usuario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.ruc,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_emision,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_vendedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_termino_pago_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_vence,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_moneda,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cotizacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.direccion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.enviar,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.observacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_estado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.sub_total,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descuento_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descuento_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.iva_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.iva_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.total,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.otro_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.otro_porciento from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(cotizacion $cotizacion,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($cotizacion->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=cotizacion_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($cotizacion->getId(),$connexion));				
				
			} else if ($cotizacion->getIsChanged()) {
				if($cotizacion->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=cotizacion_data::$QUERY_INSERT;
					
					
					
					

					//$id_estado='null';
					//if($cotizacion->getid_estado()!==null && $cotizacion->getid_estado()>=0) {
						//$id_estado=$cotizacion->getid_estado();
					//} else {
						//$id_estado='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$cotizacion->getid_empresa(),$cotizacion->getid_sucursal(),$cotizacion->getid_ejercicio(),$cotizacion->getid_periodo(),$cotizacion->getid_usuario(),$cotizacion->getid_proveedor(),Funciones::GetRealScapeString($cotizacion->getruc(),$connexion),Funciones::GetRealScapeString($cotizacion->getnumero(),$connexion),Funciones::GetRealScapeString($cotizacion->getfecha_emision(),$connexion),$cotizacion->getid_vendedor(),$cotizacion->getid_termino_pago_proveedor(),Funciones::GetRealScapeString($cotizacion->getfecha_vence(),$connexion),$cotizacion->getid_moneda(),$cotizacion->getcotizacion(),Funciones::GetRealScapeString($cotizacion->getdireccion(),$connexion),Funciones::GetRealScapeString($cotizacion->getenviar(),$connexion),Funciones::GetRealScapeString($cotizacion->getobservacion(),$connexion),$cotizacion->getid_estado(),$cotizacion->getsub_total(),$cotizacion->getdescuento_monto(),$cotizacion->getdescuento_porciento(),$cotizacion->getiva_monto(),$cotizacion->getiva_porciento(),$cotizacion->gettotal(),$cotizacion->getotro_monto(),$cotizacion->getotro_porciento() );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=cotizacion_data::$QUERY_UPDATE;			
					
					
					
					

					//$id_estado='null';
					//if($cotizacion->getid_estado()!==null && $cotizacion->getid_estado()>=0) {
						//$id_estado=$cotizacion->getid_estado();
					//} else {
						//$id_estado='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$cotizacion->getid_empresa(),$cotizacion->getid_sucursal(),$cotizacion->getid_ejercicio(),$cotizacion->getid_periodo(),$cotizacion->getid_usuario(),$cotizacion->getid_proveedor(),Funciones::GetRealScapeString($cotizacion->getruc(),$connexion),Funciones::GetRealScapeString($cotizacion->getnumero(),$connexion),Funciones::GetRealScapeString($cotizacion->getfecha_emision(),$connexion),$cotizacion->getid_vendedor(),$cotizacion->getid_termino_pago_proveedor(),Funciones::GetRealScapeString($cotizacion->getfecha_vence(),$connexion),$cotizacion->getid_moneda(),$cotizacion->getcotizacion(),Funciones::GetRealScapeString($cotizacion->getdireccion(),$connexion),Funciones::GetRealScapeString($cotizacion->getenviar(),$connexion),Funciones::GetRealScapeString($cotizacion->getobservacion(),$connexion),$cotizacion->getid_estado(),$cotizacion->getsub_total(),$cotizacion->getdescuento_monto(),$cotizacion->getdescuento_porciento(),$cotizacion->getiva_monto(),$cotizacion->getiva_porciento(),$cotizacion->gettotal(),$cotizacion->getotro_monto(),$cotizacion->getotro_porciento(), Funciones::GetRealScapeString($cotizacion->getId(),$connexion), Funciones::GetRealScapeString($cotizacion->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($cotizacion, $connexion,$strQuerySaveComplete,cotizacion_data::$TABLE_NAME,cotizacion_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				cotizacion_data::savePrepared($cotizacion, $connexion,$strQuerySave,cotizacion_data::$TABLE_NAME,cotizacion_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			cotizacion_data::setcotizacion_OriginalStatic($cotizacion);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(cotizacion $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				cotizacion_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					cotizacion_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					cotizacion_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(cotizacion $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					cotizacion_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(cotizacion $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					cotizacion_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(cotizacion $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					cotizacion_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?cotizacion {		
		$entity = new cotizacion();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=cotizacion_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=cotizacion_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//Inventario.cotizacion.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setcotizacion_Original(new cotizacion());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cotizacion_data::$IS_WITH_SCHEMA);         	    
				/*$entity=cotizacion_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setcotizacion_Original(parent::getEntityPrefijoEntityResult("",$entity->getcotizacion_Original(),$resultSet,cotizacion_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setcotizacion_Original(cotizacion_data::getEntityBaseResult("",$entity->getcotizacion_Original(),$resultSet));
				//$entity->setcotizacion_Original($this->getEntityBaseResult("",$entity->getcotizacion_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?cotizacion {
		$entity = new cotizacion();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=cotizacion_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=cotizacion_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,cotizacion_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".Inventario.cotizacion.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setcotizacion_Original(new cotizacion());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cotizacion_data::$IS_WITH_SCHEMA);         	    
				/*$entity=cotizacion_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setcotizacion_Original(parent::getEntityPrefijoEntityResult("",$entity->getcotizacion_Original(),$resultSet,cotizacion_data::$IS_WITH_SCHEMA));         		
				////$entity->setcotizacion_Original(cotizacion_data::getEntityBaseResult("",$entity->getcotizacion_Original(),$resultSet));
				//$entity->setcotizacion_Original($this->getEntityBaseResult("",$entity->getcotizacion_Original(),$resultSet));
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
		$entity = new cotizacion();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=cotizacion_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=cotizacion_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,cotizacion_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new cotizacion();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cotizacion_data::$IS_WITH_SCHEMA);         		
				/*$entity=cotizacion_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setcotizacion_Original( new cotizacion());
				
				//$entity->setcotizacion_Original(parent::getEntityPrefijoEntityResult("",$entity->getcotizacion_Original(),$resultSet,cotizacion_data::$IS_WITH_SCHEMA));         		
				////$entity->setcotizacion_Original(cotizacion_data::getEntityBaseResult("",$entity->getcotizacion_Original(),$resultSet));
				//$entity->setcotizacion_Original($this->getEntityBaseResult("",$entity->getcotizacion_Original(),$resultSet));
								
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
		$entity = new cotizacion();		  
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
      	    	$entity = new cotizacion();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cotizacion_data::$IS_WITH_SCHEMA);         		
				/*$entity=cotizacion_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setcotizacion_Original( new cotizacion());
				
				//$entity->setcotizacion_Original(parent::getEntityPrefijoEntityResult("",$entity->getcotizacion_Original(),$resultSet,cotizacion_data::$IS_WITH_SCHEMA));         		
				////$entity->setcotizacion_Original(cotizacion_data::getEntityBaseResult("",$entity->getcotizacion_Original(),$resultSet));
				//$entity->setcotizacion_Original($this->getEntityBaseResult("",$entity->getcotizacion_Original(),$resultSet));
				
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
		$entity = new cotizacion();		  
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
      	    	$entity = new cotizacion();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,cotizacion_data::$IS_WITH_SCHEMA);         		
				/*$entity=cotizacion_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setcotizacion_Original( new cotizacion());				
				//$entity->setcotizacion_Original(parent::getEntityPrefijoEntityResult("",$entity->getcotizacion_Original(),$resultSet,cotizacion_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setcotizacion_Original(cotizacion_data::getEntityBaseResult("",$entity->getcotizacion_Original(),$resultSet));
				//$entity->setcotizacion_Original($this->getEntityBaseResult("",$entity->getcotizacion_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=cotizacion_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,cotizacion $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,cotizacion_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,cotizacion_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getempresa(Connexion $connexion,$relcotizacion) : ?empresa{

		$empresa= new empresa();

		try {
			$empresaDataAccess=new empresa_data();
			$empresaDataAccess->isForFKData=$this->isForFKDataRels;
			$empresa=$empresaDataAccess->getEntity($connexion,$relcotizacion->getid_empresa());

		} catch(Exception $e) {
			throw $e;
		}

		return $empresa;
	}


	public function  getsucursal(Connexion $connexion,$relcotizacion) : ?sucursal{

		$sucursal= new sucursal();

		try {
			$sucursalDataAccess=new sucursal_data();
			$sucursalDataAccess->isForFKData=$this->isForFKDataRels;
			$sucursal=$sucursalDataAccess->getEntity($connexion,$relcotizacion->getid_sucursal());

		} catch(Exception $e) {
			throw $e;
		}

		return $sucursal;
	}


	public function  getejercicio(Connexion $connexion,$relcotizacion) : ?ejercicio{

		$ejercicio= new ejercicio();

		try {
			$ejercicioDataAccess=new ejercicio_data();
			$ejercicioDataAccess->isForFKData=$this->isForFKDataRels;
			$ejercicio=$ejercicioDataAccess->getEntity($connexion,$relcotizacion->getid_ejercicio());

		} catch(Exception $e) {
			throw $e;
		}

		return $ejercicio;
	}


	public function  getperiodo(Connexion $connexion,$relcotizacion) : ?periodo{

		$periodo= new periodo();

		try {
			$periodoDataAccess=new periodo_data();
			$periodoDataAccess->isForFKData=$this->isForFKDataRels;
			$periodo=$periodoDataAccess->getEntity($connexion,$relcotizacion->getid_periodo());

		} catch(Exception $e) {
			throw $e;
		}

		return $periodo;
	}


	public function  getusuario(Connexion $connexion,$relcotizacion) : ?usuario{

		$usuario= new usuario();

		try {
			$usuarioDataAccess=new usuario_data();
			$usuarioDataAccess->isForFKData=$this->isForFKDataRels;
			$usuario=$usuarioDataAccess->getEntity($connexion,$relcotizacion->getid_usuario());

		} catch(Exception $e) {
			throw $e;
		}

		return $usuario;
	}


	public function  getproveedor(Connexion $connexion,$relcotizacion) : ?proveedor{

		$proveedor= new proveedor();

		try {
			$proveedorDataAccess=new proveedor_data();
			$proveedorDataAccess->isForFKData=$this->isForFKDataRels;
			$proveedor=$proveedorDataAccess->getEntity($connexion,$relcotizacion->getid_proveedor());

		} catch(Exception $e) {
			throw $e;
		}

		return $proveedor;
	}


	public function  getvendedor(Connexion $connexion,$relcotizacion) : ?vendedor{

		$vendedor= new vendedor();

		try {
			$vendedorDataAccess=new vendedor_data();
			$vendedorDataAccess->isForFKData=$this->isForFKDataRels;
			$vendedor=$vendedorDataAccess->getEntity($connexion,$relcotizacion->getid_vendedor());

		} catch(Exception $e) {
			throw $e;
		}

		return $vendedor;
	}


	public function  gettermino_pago_proveedor(Connexion $connexion,$relcotizacion) : ?termino_pago_proveedor{

		$termino_pago_proveedor= new termino_pago_proveedor();

		try {
			$termino_pago_proveedorDataAccess=new termino_pago_proveedor_data();
			$termino_pago_proveedorDataAccess->isForFKData=$this->isForFKDataRels;
			$termino_pago_proveedor=$termino_pago_proveedorDataAccess->getEntity($connexion,$relcotizacion->getid_termino_pago_proveedor());

		} catch(Exception $e) {
			throw $e;
		}

		return $termino_pago_proveedor;
	}


	public function  getmoneda(Connexion $connexion,$relcotizacion) : ?moneda{

		$moneda= new moneda();

		try {
			$monedaDataAccess=new moneda_data();
			$monedaDataAccess->isForFKData=$this->isForFKDataRels;
			$moneda=$monedaDataAccess->getEntity($connexion,$relcotizacion->getid_moneda());

		} catch(Exception $e) {
			throw $e;
		}

		return $moneda;
	}


	public function  getestado(Connexion $connexion,$relcotizacion) : ?estado{

		$estado= new estado();

		try {
			$estadoDataAccess=new estado_data();
			$estadoDataAccess->isForFKData=$this->isForFKDataRels;
			$estado=$estadoDataAccess->getEntity($connexion,$relcotizacion->getid_estado());

		} catch(Exception $e) {
			throw $e;
		}

		return $estado;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	public function  getcotizacion_detalles(Connexion $connexion,cotizacion $cotizacion) : array {

		$cotizaciondetalles=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.cotizacion_detalle_data::$SCHEMA.".".cotizacion_detalle_data::$TABLE_NAME.".id_cotizacion=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$cotizacion->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$cotizaciondetalleDataAccess=new cotizacion_detalle_data();

			$cotizaciondetalles=$cotizaciondetalleDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $cotizaciondetalles;
	}


	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,cotizacion $entity,$resultSet) : cotizacion {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_empresa((int)$resultSet[$strPrefijo.'id_empresa']);
				$entity->setid_sucursal((int)$resultSet[$strPrefijo.'id_sucursal']);
				$entity->setid_ejercicio((int)$resultSet[$strPrefijo.'id_ejercicio']);
				$entity->setid_periodo((int)$resultSet[$strPrefijo.'id_periodo']);
				$entity->setid_usuario((int)$resultSet[$strPrefijo.'id_usuario']);
				$entity->setid_proveedor((int)$resultSet[$strPrefijo.'id_proveedor']);
				$entity->setruc(utf8_encode($resultSet[$strPrefijo.'ruc']));
				$entity->setnumero(utf8_encode($resultSet[$strPrefijo.'numero']));
				$entity->setfecha_emision($resultSet[$strPrefijo.'fecha_emision']);
				$entity->setid_vendedor((int)$resultSet[$strPrefijo.'id_vendedor']);
				$entity->setid_termino_pago_proveedor((int)$resultSet[$strPrefijo.'id_termino_pago_proveedor']);
				$entity->setfecha_vence($resultSet[$strPrefijo.'fecha_vence']);
				$entity->setid_moneda((int)$resultSet[$strPrefijo.'id_moneda']);
				$entity->setcotizacion((float)$resultSet[$strPrefijo.'cotizacion']);
				$entity->setdireccion(utf8_encode($resultSet[$strPrefijo.'direccion']));
				$entity->setenviar(utf8_encode($resultSet[$strPrefijo.'enviar']));
				$entity->setobservacion(utf8_encode($resultSet[$strPrefijo.'observacion']));
				$entity->setid_estado((int)$resultSet[$strPrefijo.'id_estado']);
				$entity->setsub_total((float)$resultSet[$strPrefijo.'sub_total']);
				$entity->setdescuento_monto((float)$resultSet[$strPrefijo.'descuento_monto']);
				$entity->setdescuento_porciento((float)$resultSet[$strPrefijo.'descuento_porciento']);
				$entity->setiva_monto((float)$resultSet[$strPrefijo.'iva_monto']);
				$entity->setiva_porciento((float)$resultSet[$strPrefijo.'iva_porciento']);
				$entity->settotal((float)$resultSet[$strPrefijo.'total']);
				$entity->setotro_monto((float)$resultSet[$strPrefijo.'otro_monto']);
				$entity->setotro_porciento((float)$resultSet[$strPrefijo.'otro_porciento']);
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,cotizacion $cotizacion,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $cotizacion->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiiisssiisidsssidddddddd', $cotizacion->getid_empresa(),$cotizacion->getid_sucursal(),$cotizacion->getid_ejercicio(),$cotizacion->getid_periodo(),$cotizacion->getid_usuario(),$cotizacion->getid_proveedor(),$cotizacion->getruc(),$cotizacion->getnumero(),$cotizacion->getfecha_emision(),$cotizacion->getid_vendedor(),$cotizacion->getid_termino_pago_proveedor(),$cotizacion->getfecha_vence(),$cotizacion->getid_moneda(),$cotizacion->getcotizacion(),$cotizacion->getdireccion(),$cotizacion->getenviar(),$cotizacion->getobservacion(),$cotizacion->getid_estado(),$cotizacion->getsub_total(),$cotizacion->getdescuento_monto(),$cotizacion->getdescuento_porciento(),$cotizacion->getiva_monto(),$cotizacion->getiva_porciento(),$cotizacion->gettotal(),$cotizacion->getotro_monto(),$cotizacion->getotro_porciento());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiiisssiisidsssiddddddddis', $cotizacion->getid_empresa(),$cotizacion->getid_sucursal(),$cotizacion->getid_ejercicio(),$cotizacion->getid_periodo(),$cotizacion->getid_usuario(),$cotizacion->getid_proveedor(),$cotizacion->getruc(),$cotizacion->getnumero(),$cotizacion->getfecha_emision(),$cotizacion->getid_vendedor(),$cotizacion->getid_termino_pago_proveedor(),$cotizacion->getfecha_vence(),$cotizacion->getid_moneda(),$cotizacion->getcotizacion(),$cotizacion->getdireccion(),$cotizacion->getenviar(),$cotizacion->getobservacion(),$cotizacion->getid_estado(),$cotizacion->getsub_total(),$cotizacion->getdescuento_monto(),$cotizacion->getdescuento_porciento(),$cotizacion->getiva_monto(),$cotizacion->getiva_porciento(),$cotizacion->gettotal(),$cotizacion->getotro_monto(),$cotizacion->getotro_porciento(), $cotizacion->getId(), Funciones::GetRealScapeString($cotizacion->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,cotizacion $cotizacion,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($cotizacion->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($cotizacion->getid_empresa(),$cotizacion->getid_sucursal(),$cotizacion->getid_ejercicio(),$cotizacion->getid_periodo(),$cotizacion->getid_usuario(),$cotizacion->getid_proveedor(),Funciones::GetRealScapeString($cotizacion->getruc(),$connexion),Funciones::GetRealScapeString($cotizacion->getnumero(),$connexion),Funciones::GetRealScapeString($cotizacion->getfecha_emision(),$connexion),$cotizacion->getid_vendedor(),$cotizacion->getid_termino_pago_proveedor(),Funciones::GetRealScapeString($cotizacion->getfecha_vence(),$connexion),$cotizacion->getid_moneda(),$cotizacion->getcotizacion(),Funciones::GetRealScapeString($cotizacion->getdireccion(),$connexion),Funciones::GetRealScapeString($cotizacion->getenviar(),$connexion),Funciones::GetRealScapeString($cotizacion->getobservacion(),$connexion),$cotizacion->getid_estado(),$cotizacion->getsub_total(),$cotizacion->getdescuento_monto(),$cotizacion->getdescuento_porciento(),$cotizacion->getiva_monto(),$cotizacion->getiva_porciento(),$cotizacion->gettotal(),$cotizacion->getotro_monto(),$cotizacion->getotro_porciento());
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($cotizacion->getid_empresa(),$cotizacion->getid_sucursal(),$cotizacion->getid_ejercicio(),$cotizacion->getid_periodo(),$cotizacion->getid_usuario(),$cotizacion->getid_proveedor(),Funciones::GetRealScapeString($cotizacion->getruc(),$connexion),Funciones::GetRealScapeString($cotizacion->getnumero(),$connexion),Funciones::GetRealScapeString($cotizacion->getfecha_emision(),$connexion),$cotizacion->getid_vendedor(),$cotizacion->getid_termino_pago_proveedor(),Funciones::GetRealScapeString($cotizacion->getfecha_vence(),$connexion),$cotizacion->getid_moneda(),$cotizacion->getcotizacion(),Funciones::GetRealScapeString($cotizacion->getdireccion(),$connexion),Funciones::GetRealScapeString($cotizacion->getenviar(),$connexion),Funciones::GetRealScapeString($cotizacion->getobservacion(),$connexion),$cotizacion->getid_estado(),$cotizacion->getsub_total(),$cotizacion->getdescuento_monto(),$cotizacion->getdescuento_porciento(),$cotizacion->getiva_monto(),$cotizacion->getiva_porciento(),$cotizacion->gettotal(),$cotizacion->getotro_monto(),$cotizacion->getotro_porciento(), $cotizacion->getId(), Funciones::GetRealScapeString($cotizacion->getVersionRow(),$connexion));
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
	
	public function setcotizacion_Original(cotizacion $cotizacion) {
		$cotizacion->setcotizacion_Original(clone $cotizacion);		
	}
	
	public function setcotizacions_Original(array $cotizacions) {
		foreach($cotizacions as $cotizacion){
			$cotizacion->setcotizacion_Original(clone $cotizacion);
		}
	}
	
	public static function setcotizacion_OriginalStatic(cotizacion $cotizacion) {
		$cotizacion->setcotizacion_Original(clone $cotizacion);		
	}
	
	public static function setcotizacions_OriginalStatic(array $cotizacions) {		
		foreach($cotizacions as $cotizacion){
			$cotizacion->setcotizacion_Original(clone $cotizacion);
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
