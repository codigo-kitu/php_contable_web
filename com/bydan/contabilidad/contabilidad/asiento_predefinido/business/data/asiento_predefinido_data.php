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
namespace com\bydan\contabilidad\contabilidad\asiento_predefinido\business\data;

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

use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\entity\asiento_predefinido;

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

use com\bydan\contabilidad\seguridad\modulo\business\data\modulo_data;
use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;

use com\bydan\contabilidad\contabilidad\fuente\business\data\fuente_data;
use com\bydan\contabilidad\contabilidad\fuente\business\entity\fuente;

use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\data\libro_auxiliar_data;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\entity\libro_auxiliar;

use com\bydan\contabilidad\contabilidad\centro_costo\business\data\centro_costo_data;
use com\bydan\contabilidad\contabilidad\centro_costo\business\entity\centro_costo;

use com\bydan\contabilidad\contabilidad\documento_contable\business\data\documento_contable_data;
use com\bydan\contabilidad\contabilidad\documento_contable\business\entity\documento_contable;

//REL

use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\business\data\asiento_predefinido_detalle_data;
use com\bydan\contabilidad\contabilidad\asiento\business\data\asiento_data;


class asiento_predefinido_data extends GetEntitiesDataAccessHelper implements asiento_predefinido_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='con_';
	public static string $TABLE_NAME='con_asiento_predefinido';			
	public static string $TABLE_NAME_asiento_predefinido='asiento_predefinido';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_ASIENTO_PREDEFINIDO_INSERT(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_ASIENTO_PREDEFINIDO_UPDATE(??,?,?,?,?,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_ASIENTO_PREDEFINIDO_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_ASIENTO_PREDEFINIDO_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $asiento_predefinido_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'asiento_predefinido';
		
		asiento_predefinido_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('CONTABILIDAD');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->asiento_predefinido_DataAccessAdditional=new asiento_predefinidoDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_empresa,id_sucursal,id_ejercicio,id_periodo,id_usuario,id_modulo,codigo,nombre,id_fuente,id_libro_auxiliar,id_centro_costo,id_documento_contable,descripcion,nro_nit,referencia) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%d,%d,%d,%d,%d,\'%s\',\'%s\',%d,%d,%d,%d,\'%s\',\'%s\',\'%s\')';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_empresa=%d,id_sucursal=%d,id_ejercicio=%d,id_periodo=%d,id_usuario=%d,id_modulo=%d,codigo=\'%s\',nombre=\'%s\',id_fuente=%d,id_libro_auxiliar=%d,id_centro_costo=%d,id_documento_contable=%d,descripcion=\'%s\',nro_nit=\'%s\',referencia=\'%s\' where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_sucursal,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_ejercicio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_periodo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_usuario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_modulo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_fuente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_libro_auxiliar,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_centro_costo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_documento_contable,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nro_nit,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.referencia from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(asiento_predefinido $asiento_predefinido,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($asiento_predefinido->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=asiento_predefinido_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($asiento_predefinido->getId(),$connexion));				
				
			} else if ($asiento_predefinido->getIsChanged()) {
				if($asiento_predefinido->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=asiento_predefinido_data::$QUERY_INSERT;
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$asiento_predefinido->getid_empresa(),$asiento_predefinido->getid_sucursal(),$asiento_predefinido->getid_ejercicio(),$asiento_predefinido->getid_periodo(),$asiento_predefinido->getid_usuario(),$asiento_predefinido->getid_modulo(),Funciones::GetRealScapeString($asiento_predefinido->getcodigo(),$connexion),Funciones::GetRealScapeString($asiento_predefinido->getnombre(),$connexion),$asiento_predefinido->getid_fuente(),$asiento_predefinido->getid_libro_auxiliar(),$asiento_predefinido->getid_centro_costo(),$asiento_predefinido->getid_documento_contable(),Funciones::GetRealScapeString($asiento_predefinido->getdescripcion(),$connexion),Funciones::GetRealScapeString($asiento_predefinido->getnro_nit(),$connexion),Funciones::GetRealScapeString($asiento_predefinido->getreferencia(),$connexion) );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=asiento_predefinido_data::$QUERY_UPDATE;			
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$asiento_predefinido->getid_empresa(),$asiento_predefinido->getid_sucursal(),$asiento_predefinido->getid_ejercicio(),$asiento_predefinido->getid_periodo(),$asiento_predefinido->getid_usuario(),$asiento_predefinido->getid_modulo(),Funciones::GetRealScapeString($asiento_predefinido->getcodigo(),$connexion),Funciones::GetRealScapeString($asiento_predefinido->getnombre(),$connexion),$asiento_predefinido->getid_fuente(),$asiento_predefinido->getid_libro_auxiliar(),$asiento_predefinido->getid_centro_costo(),$asiento_predefinido->getid_documento_contable(),Funciones::GetRealScapeString($asiento_predefinido->getdescripcion(),$connexion),Funciones::GetRealScapeString($asiento_predefinido->getnro_nit(),$connexion),Funciones::GetRealScapeString($asiento_predefinido->getreferencia(),$connexion), Funciones::GetRealScapeString($asiento_predefinido->getId(),$connexion), Funciones::GetRealScapeString($asiento_predefinido->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($asiento_predefinido, $connexion,$strQuerySaveComplete,asiento_predefinido_data::$TABLE_NAME,asiento_predefinido_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				asiento_predefinido_data::savePrepared($asiento_predefinido, $connexion,$strQuerySave,asiento_predefinido_data::$TABLE_NAME,asiento_predefinido_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			asiento_predefinido_data::setasiento_predefinido_OriginalStatic($asiento_predefinido);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(asiento_predefinido $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				asiento_predefinido_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					asiento_predefinido_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					asiento_predefinido_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(asiento_predefinido $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					asiento_predefinido_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(asiento_predefinido $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					asiento_predefinido_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(asiento_predefinido $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					asiento_predefinido_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?asiento_predefinido {		
		$entity = new asiento_predefinido();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=asiento_predefinido_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=asiento_predefinido_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//Contabilidad.asiento_predefinido.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setasiento_predefinido_Original(new asiento_predefinido());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,asiento_predefinido_data::$IS_WITH_SCHEMA);         	    
				/*$entity=asiento_predefinido_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setasiento_predefinido_Original(parent::getEntityPrefijoEntityResult("",$entity->getasiento_predefinido_Original(),$resultSet,asiento_predefinido_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setasiento_predefinido_Original(asiento_predefinido_data::getEntityBaseResult("",$entity->getasiento_predefinido_Original(),$resultSet));
				//$entity->setasiento_predefinido_Original($this->getEntityBaseResult("",$entity->getasiento_predefinido_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?asiento_predefinido {
		$entity = new asiento_predefinido();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=asiento_predefinido_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=asiento_predefinido_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,asiento_predefinido_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".Contabilidad.asiento_predefinido.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setasiento_predefinido_Original(new asiento_predefinido());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,asiento_predefinido_data::$IS_WITH_SCHEMA);         	    
				/*$entity=asiento_predefinido_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setasiento_predefinido_Original(parent::getEntityPrefijoEntityResult("",$entity->getasiento_predefinido_Original(),$resultSet,asiento_predefinido_data::$IS_WITH_SCHEMA));         		
				////$entity->setasiento_predefinido_Original(asiento_predefinido_data::getEntityBaseResult("",$entity->getasiento_predefinido_Original(),$resultSet));
				//$entity->setasiento_predefinido_Original($this->getEntityBaseResult("",$entity->getasiento_predefinido_Original(),$resultSet));
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
		$entity = new asiento_predefinido();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=asiento_predefinido_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=asiento_predefinido_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,asiento_predefinido_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new asiento_predefinido();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,asiento_predefinido_data::$IS_WITH_SCHEMA);         		
				/*$entity=asiento_predefinido_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setasiento_predefinido_Original( new asiento_predefinido());
				
				//$entity->setasiento_predefinido_Original(parent::getEntityPrefijoEntityResult("",$entity->getasiento_predefinido_Original(),$resultSet,asiento_predefinido_data::$IS_WITH_SCHEMA));         		
				////$entity->setasiento_predefinido_Original(asiento_predefinido_data::getEntityBaseResult("",$entity->getasiento_predefinido_Original(),$resultSet));
				//$entity->setasiento_predefinido_Original($this->getEntityBaseResult("",$entity->getasiento_predefinido_Original(),$resultSet));
								
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
		$entity = new asiento_predefinido();		  
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
      	    	$entity = new asiento_predefinido();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,asiento_predefinido_data::$IS_WITH_SCHEMA);         		
				/*$entity=asiento_predefinido_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setasiento_predefinido_Original( new asiento_predefinido());
				
				//$entity->setasiento_predefinido_Original(parent::getEntityPrefijoEntityResult("",$entity->getasiento_predefinido_Original(),$resultSet,asiento_predefinido_data::$IS_WITH_SCHEMA));         		
				////$entity->setasiento_predefinido_Original(asiento_predefinido_data::getEntityBaseResult("",$entity->getasiento_predefinido_Original(),$resultSet));
				//$entity->setasiento_predefinido_Original($this->getEntityBaseResult("",$entity->getasiento_predefinido_Original(),$resultSet));
				
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
		$entity = new asiento_predefinido();		  
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
      	    	$entity = new asiento_predefinido();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,asiento_predefinido_data::$IS_WITH_SCHEMA);         		
				/*$entity=asiento_predefinido_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setasiento_predefinido_Original( new asiento_predefinido());				
				//$entity->setasiento_predefinido_Original(parent::getEntityPrefijoEntityResult("",$entity->getasiento_predefinido_Original(),$resultSet,asiento_predefinido_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setasiento_predefinido_Original(asiento_predefinido_data::getEntityBaseResult("",$entity->getasiento_predefinido_Original(),$resultSet));
				//$entity->setasiento_predefinido_Original($this->getEntityBaseResult("",$entity->getasiento_predefinido_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=asiento_predefinido_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,asiento_predefinido $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,asiento_predefinido_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,asiento_predefinido_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getempresa(Connexion $connexion,$relasiento_predefinido) : ?empresa{

		$empresa= new empresa();

		try {
			$empresaDataAccess=new empresa_data();
			$empresaDataAccess->isForFKData=$this->isForFKDataRels;
			$empresa=$empresaDataAccess->getEntity($connexion,$relasiento_predefinido->getid_empresa());

		} catch(Exception $e) {
			throw $e;
		}

		return $empresa;
	}


	public function  getsucursal(Connexion $connexion,$relasiento_predefinido) : ?sucursal{

		$sucursal= new sucursal();

		try {
			$sucursalDataAccess=new sucursal_data();
			$sucursalDataAccess->isForFKData=$this->isForFKDataRels;
			$sucursal=$sucursalDataAccess->getEntity($connexion,$relasiento_predefinido->getid_sucursal());

		} catch(Exception $e) {
			throw $e;
		}

		return $sucursal;
	}


	public function  getejercicio(Connexion $connexion,$relasiento_predefinido) : ?ejercicio{

		$ejercicio= new ejercicio();

		try {
			$ejercicioDataAccess=new ejercicio_data();
			$ejercicioDataAccess->isForFKData=$this->isForFKDataRels;
			$ejercicio=$ejercicioDataAccess->getEntity($connexion,$relasiento_predefinido->getid_ejercicio());

		} catch(Exception $e) {
			throw $e;
		}

		return $ejercicio;
	}


	public function  getperiodo(Connexion $connexion,$relasiento_predefinido) : ?periodo{

		$periodo= new periodo();

		try {
			$periodoDataAccess=new periodo_data();
			$periodoDataAccess->isForFKData=$this->isForFKDataRels;
			$periodo=$periodoDataAccess->getEntity($connexion,$relasiento_predefinido->getid_periodo());

		} catch(Exception $e) {
			throw $e;
		}

		return $periodo;
	}


	public function  getusuario(Connexion $connexion,$relasiento_predefinido) : ?usuario{

		$usuario= new usuario();

		try {
			$usuarioDataAccess=new usuario_data();
			$usuarioDataAccess->isForFKData=$this->isForFKDataRels;
			$usuario=$usuarioDataAccess->getEntity($connexion,$relasiento_predefinido->getid_usuario());

		} catch(Exception $e) {
			throw $e;
		}

		return $usuario;
	}


	public function  getmodulo(Connexion $connexion,$relasiento_predefinido) : ?modulo{

		$modulo= new modulo();

		try {
			$moduloDataAccess=new modulo_data();
			$moduloDataAccess->isForFKData=$this->isForFKDataRels;
			$modulo=$moduloDataAccess->getEntity($connexion,$relasiento_predefinido->getid_modulo());

		} catch(Exception $e) {
			throw $e;
		}

		return $modulo;
	}


	public function  getfuente(Connexion $connexion,$relasiento_predefinido) : ?fuente{

		$fuente= new fuente();

		try {
			$fuenteDataAccess=new fuente_data();
			$fuenteDataAccess->isForFKData=$this->isForFKDataRels;
			$fuente=$fuenteDataAccess->getEntity($connexion,$relasiento_predefinido->getid_fuente());

		} catch(Exception $e) {
			throw $e;
		}

		return $fuente;
	}


	public function  getlibro_auxiliar(Connexion $connexion,$relasiento_predefinido) : ?libro_auxiliar{

		$libro_auxiliar= new libro_auxiliar();

		try {
			$libro_auxiliarDataAccess=new libro_auxiliar_data();
			$libro_auxiliarDataAccess->isForFKData=$this->isForFKDataRels;
			$libro_auxiliar=$libro_auxiliarDataAccess->getEntity($connexion,$relasiento_predefinido->getid_libro_auxiliar());

		} catch(Exception $e) {
			throw $e;
		}

		return $libro_auxiliar;
	}


	public function  getcentro_costo(Connexion $connexion,$relasiento_predefinido) : ?centro_costo{

		$centro_costo= new centro_costo();

		try {
			$centro_costoDataAccess=new centro_costo_data();
			$centro_costoDataAccess->isForFKData=$this->isForFKDataRels;
			$centro_costo=$centro_costoDataAccess->getEntity($connexion,$relasiento_predefinido->getid_centro_costo());

		} catch(Exception $e) {
			throw $e;
		}

		return $centro_costo;
	}


	public function  getdocumento_contable(Connexion $connexion,$relasiento_predefinido) : ?documento_contable{

		$documento_contable= new documento_contable();

		try {
			$documento_contableDataAccess=new documento_contable_data();
			$documento_contableDataAccess->isForFKData=$this->isForFKDataRels;
			$documento_contable=$documento_contableDataAccess->getEntity($connexion,$relasiento_predefinido->getid_documento_contable());

		} catch(Exception $e) {
			throw $e;
		}

		return $documento_contable;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	public function  getasiento_predefinido_detalles(Connexion $connexion,asiento_predefinido $asiento_predefinido) : array {

		$asientopredefinidodetalles=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.asiento_predefinido_detalle_data::$SCHEMA.".".asiento_predefinido_detalle_data::$TABLE_NAME.".id_asiento_predefinido=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$asiento_predefinido->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$asientopredefinidodetalleDataAccess=new asiento_predefinido_detalle_data();

			$asientopredefinidodetalles=$asientopredefinidodetalleDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $asientopredefinidodetalles;
	}


	public function  getasientos(Connexion $connexion,asiento_predefinido $asiento_predefinido) : array {

		$asientos=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.asiento_data::$SCHEMA.".".asiento_data::$TABLE_NAME.".id_asiento_predefinido=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$asiento_predefinido->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$asientoDataAccess=new asiento_data();

			$asientos=$asientoDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $asientos;
	}


	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,asiento_predefinido $entity,$resultSet) : asiento_predefinido {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_empresa((int)$resultSet[$strPrefijo.'id_empresa']);
				$entity->setid_sucursal((int)$resultSet[$strPrefijo.'id_sucursal']);
				$entity->setid_ejercicio((int)$resultSet[$strPrefijo.'id_ejercicio']);
				$entity->setid_periodo((int)$resultSet[$strPrefijo.'id_periodo']);
				$entity->setid_usuario((int)$resultSet[$strPrefijo.'id_usuario']);
				$entity->setid_modulo((int)$resultSet[$strPrefijo.'id_modulo']);
				$entity->setcodigo(utf8_encode($resultSet[$strPrefijo.'codigo']));
				$entity->setnombre(utf8_encode($resultSet[$strPrefijo.'nombre']));
				$entity->setid_fuente((int)$resultSet[$strPrefijo.'id_fuente']);
				$entity->setid_libro_auxiliar((int)$resultSet[$strPrefijo.'id_libro_auxiliar']);
				$entity->setid_centro_costo((int)$resultSet[$strPrefijo.'id_centro_costo']);
				$entity->setid_documento_contable((int)$resultSet[$strPrefijo.'id_documento_contable']);
				$entity->setdescripcion(utf8_encode($resultSet[$strPrefijo.'descripcion']));
				$entity->setnro_nit(utf8_encode($resultSet[$strPrefijo.'nro_nit']));
				$entity->setreferencia(utf8_encode($resultSet[$strPrefijo.'referencia']));
			} else {
				$entity->setcodigo(utf8_encode($resultSet[$strPrefijo.'codigo']));								
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,asiento_predefinido $asiento_predefinido,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $asiento_predefinido->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiiissiiiisss', $asiento_predefinido->getid_empresa(),$asiento_predefinido->getid_sucursal(),$asiento_predefinido->getid_ejercicio(),$asiento_predefinido->getid_periodo(),$asiento_predefinido->getid_usuario(),$asiento_predefinido->getid_modulo(),$asiento_predefinido->getcodigo(),$asiento_predefinido->getnombre(),$asiento_predefinido->getid_fuente(),$asiento_predefinido->getid_libro_auxiliar(),$asiento_predefinido->getid_centro_costo(),$asiento_predefinido->getid_documento_contable(),$asiento_predefinido->getdescripcion(),$asiento_predefinido->getnro_nit(),$asiento_predefinido->getreferencia());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiiissiiiisssis', $asiento_predefinido->getid_empresa(),$asiento_predefinido->getid_sucursal(),$asiento_predefinido->getid_ejercicio(),$asiento_predefinido->getid_periodo(),$asiento_predefinido->getid_usuario(),$asiento_predefinido->getid_modulo(),$asiento_predefinido->getcodigo(),$asiento_predefinido->getnombre(),$asiento_predefinido->getid_fuente(),$asiento_predefinido->getid_libro_auxiliar(),$asiento_predefinido->getid_centro_costo(),$asiento_predefinido->getid_documento_contable(),$asiento_predefinido->getdescripcion(),$asiento_predefinido->getnro_nit(),$asiento_predefinido->getreferencia(), $asiento_predefinido->getId(), Funciones::GetRealScapeString($asiento_predefinido->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,asiento_predefinido $asiento_predefinido,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($asiento_predefinido->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($asiento_predefinido->getid_empresa(),$asiento_predefinido->getid_sucursal(),$asiento_predefinido->getid_ejercicio(),$asiento_predefinido->getid_periodo(),$asiento_predefinido->getid_usuario(),$asiento_predefinido->getid_modulo(),Funciones::GetRealScapeString($asiento_predefinido->getcodigo(),$connexion),Funciones::GetRealScapeString($asiento_predefinido->getnombre(),$connexion),$asiento_predefinido->getid_fuente(),$asiento_predefinido->getid_libro_auxiliar(),$asiento_predefinido->getid_centro_costo(),$asiento_predefinido->getid_documento_contable(),Funciones::GetRealScapeString($asiento_predefinido->getdescripcion(),$connexion),Funciones::GetRealScapeString($asiento_predefinido->getnro_nit(),$connexion),Funciones::GetRealScapeString($asiento_predefinido->getreferencia(),$connexion));
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($asiento_predefinido->getid_empresa(),$asiento_predefinido->getid_sucursal(),$asiento_predefinido->getid_ejercicio(),$asiento_predefinido->getid_periodo(),$asiento_predefinido->getid_usuario(),$asiento_predefinido->getid_modulo(),Funciones::GetRealScapeString($asiento_predefinido->getcodigo(),$connexion),Funciones::GetRealScapeString($asiento_predefinido->getnombre(),$connexion),$asiento_predefinido->getid_fuente(),$asiento_predefinido->getid_libro_auxiliar(),$asiento_predefinido->getid_centro_costo(),$asiento_predefinido->getid_documento_contable(),Funciones::GetRealScapeString($asiento_predefinido->getdescripcion(),$connexion),Funciones::GetRealScapeString($asiento_predefinido->getnro_nit(),$connexion),Funciones::GetRealScapeString($asiento_predefinido->getreferencia(),$connexion), $asiento_predefinido->getId(), Funciones::GetRealScapeString($asiento_predefinido->getVersionRow(),$connexion));
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
	
	public function setasiento_predefinido_Original(asiento_predefinido $asiento_predefinido) {
		$asiento_predefinido->setasiento_predefinido_Original(clone $asiento_predefinido);		
	}
	
	public function setasiento_predefinidos_Original(array $asiento_predefinidos) {
		foreach($asiento_predefinidos as $asiento_predefinido){
			$asiento_predefinido->setasiento_predefinido_Original(clone $asiento_predefinido);
		}
	}
	
	public static function setasiento_predefinido_OriginalStatic(asiento_predefinido $asiento_predefinido) {
		$asiento_predefinido->setasiento_predefinido_Original(clone $asiento_predefinido);		
	}
	
	public static function setasiento_predefinidos_OriginalStatic(array $asiento_predefinidos) {		
		foreach($asiento_predefinidos as $asiento_predefinido){
			$asiento_predefinido->setasiento_predefinido_Original(clone $asiento_predefinido);
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
