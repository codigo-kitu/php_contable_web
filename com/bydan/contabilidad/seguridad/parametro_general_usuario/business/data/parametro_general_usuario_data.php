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
namespace com\bydan\contabilidad\seguridad\parametro_general_usuario\business\data;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\FuncionesSql;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\data\GetEntitiesDataAccessHelperSinIdGenerated;

/*use com\bydan\framework\contabilidad\business\entity\GeneralEntity;*/
use com\bydan\framework\contabilidad\business\entity\DatoGeneral;
use com\bydan\framework\contabilidad\business\entity\DatoGeneralMinimo;
use com\bydan\framework\contabilidad\business\entity\DatoGeneralMaximo;
use com\bydan\framework\contabilidad\business\logic\QueryWhereSelectParameters;
use com\bydan\framework\contabilidad\business\logic\Pagination;
use com\bydan\framework\contabilidad\business\data\DataAccessHelper;
use com\bydan\framework\contabilidad\util\Connexion;
use com\bydan\framework\contabilidad\util\ParametersType;

use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;

//FK


use com\bydan\contabilidad\seguridad\usuario\business\data\usuario_data;
use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;

use com\bydan\contabilidad\seguridad\tipo_fondo\business\data\tipo_fondo_data;
use com\bydan\contabilidad\seguridad\tipo_fondo\business\entity\tipo_fondo;

use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\entity\empresa;

use com\bydan\contabilidad\general\sucursal\business\data\sucursal_data;
use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;

use com\bydan\contabilidad\contabilidad\ejercicio\business\data\ejercicio_data;
use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;

use com\bydan\contabilidad\contabilidad\periodo\business\data\periodo_data;
use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;

//REL



class parametro_general_usuario_data extends GetEntitiesDataAccessHelperSinIdGenerated implements parametro_general_usuario_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='seg_';
	public static string $TABLE_NAME='seg_parametro_general_usuario';			
	public static string $TABLE_NAME_parametro_general_usuario='parametro_general_usuario';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_PARAMETRO_GENERAL_USUARIO_INSERT(??,?,?,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_PARAMETRO_GENERAL_USUARIO_UPDATE(??,?,?,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_PARAMETRO_GENERAL_USUARIO_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_PARAMETRO_GENERAL_USUARIO_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $parametro_general_usuario_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'parametro_general_usuario';
		
		parametro_general_usuario_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('SEGURIDAD');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->parametro_general_usuario_DataAccessAdditional=new parametro_general_usuarioDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(id,created_at,updated_at,id_tipo_fondo,id_empresa,id_sucursal,id_ejercicio,id_periodo,path_exportar,con_exportar_cabecera,con_exportar_campo_version,con_botones_tool_bar,con_cargar_por_parte,con_guardar_relaciones,con_mostrar_acciones_campo_general,con_mensaje_confirmacion) values (%d,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%d,%d,%d,%d,\'%s\',\'%d\',\'%d\',\'%d\',\'%d\',\'%d\',\'%d\',\'%d\')';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_tipo_fondo=%d,id_empresa=%d,id_sucursal=%d,id_ejercicio=%d,id_periodo=%d,path_exportar=\'%s\',con_exportar_cabecera=\'%d\',con_exportar_campo_version=\'%d\',con_botones_tool_bar=\'%d\',con_cargar_por_parte=\'%d\',con_guardar_relaciones=\'%d\',con_mostrar_acciones_campo_general=\'%d\',con_mensaje_confirmacion=\'%d\' where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_tipo_fondo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_sucursal,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_ejercicio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_periodo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.path_exportar,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_exportar_cabecera,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_exportar_campo_version,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_botones_tool_bar,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_cargar_por_parte,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_guardar_relaciones,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_mostrar_acciones_campo_general,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_mensaje_confirmacion from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(parametro_general_usuario $parametro_general_usuario,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($parametro_general_usuario->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=parametro_general_usuario_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($parametro_general_usuario->getId(),$connexion));				
				
			} else if ($parametro_general_usuario->getIsChanged()) {
				if($parametro_general_usuario->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=parametro_general_usuario_data::$QUERY_INSERT;
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($parametro_general_usuario->getId(),$connexion),$parametro_general_usuario->getid_tipo_fondo(),$parametro_general_usuario->getid_empresa(),$parametro_general_usuario->getid_sucursal(),$parametro_general_usuario->getid_ejercicio(),$parametro_general_usuario->getid_periodo(),Funciones::GetRealScapeString($parametro_general_usuario->getpath_exportar(),$connexion),$parametro_general_usuario->getcon_exportar_cabecera(),$parametro_general_usuario->getcon_exportar_campo_version(),$parametro_general_usuario->getcon_botones_tool_bar(),$parametro_general_usuario->getcon_cargar_por_parte(),$parametro_general_usuario->getcon_guardar_relaciones(),$parametro_general_usuario->getcon_mostrar_acciones_campo_general(),$parametro_general_usuario->getcon_mensaje_confirmacion() );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=parametro_general_usuario_data::$QUERY_UPDATE;			
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,$parametro_general_usuario->getid_tipo_fondo(),$parametro_general_usuario->getid_empresa(),$parametro_general_usuario->getid_sucursal(),$parametro_general_usuario->getid_ejercicio(),$parametro_general_usuario->getid_periodo(),Funciones::GetRealScapeString($parametro_general_usuario->getpath_exportar(),$connexion),$parametro_general_usuario->getcon_exportar_cabecera(),$parametro_general_usuario->getcon_exportar_campo_version(),$parametro_general_usuario->getcon_botones_tool_bar(),$parametro_general_usuario->getcon_cargar_por_parte(),$parametro_general_usuario->getcon_guardar_relaciones(),$parametro_general_usuario->getcon_mostrar_acciones_campo_general(),$parametro_general_usuario->getcon_mensaje_confirmacion(), Funciones::GetRealScapeString($parametro_general_usuario->getId(),$connexion), Funciones::GetRealScapeString($parametro_general_usuario->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($parametro_general_usuario, $connexion,$strQuerySaveComplete,parametro_general_usuario_data::$TABLE_NAME,parametro_general_usuario_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				parametro_general_usuario_data::savePrepared($parametro_general_usuario, $connexion,$strQuerySave,parametro_general_usuario_data::$TABLE_NAME,parametro_general_usuario_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			parametro_general_usuario_data::setparametro_general_usuario_OriginalStatic($parametro_general_usuario);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(parametro_general_usuario $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				parametro_general_usuario_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					parametro_general_usuario_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					parametro_general_usuario_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(parametro_general_usuario $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					parametro_general_usuario_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(parametro_general_usuario $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					parametro_general_usuario_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(parametro_general_usuario $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					parametro_general_usuario_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?parametro_general_usuario {		
		$entity = new parametro_general_usuario();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=parametro_general_usuario_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=parametro_general_usuario_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//Seguridad.parametro_general_usuario.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setparametro_general_usuario_Original(new parametro_general_usuario());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_general_usuario_data::$IS_WITH_SCHEMA);         	    
				/*$entity=parametro_general_usuario_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setparametro_general_usuario_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_general_usuario_Original(),$resultSet,parametro_general_usuario_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setparametro_general_usuario_Original(parametro_general_usuario_data::getEntityBaseResult("",$entity->getparametro_general_usuario_Original(),$resultSet));
				//$entity->setparametro_general_usuario_Original($this->getEntityBaseResult("",$entity->getparametro_general_usuario_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?parametro_general_usuario {
		$entity = new parametro_general_usuario();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=parametro_general_usuario_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=parametro_general_usuario_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,parametro_general_usuario_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".Seguridad.parametro_general_usuario.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setparametro_general_usuario_Original(new parametro_general_usuario());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_general_usuario_data::$IS_WITH_SCHEMA);         	    
				/*$entity=parametro_general_usuario_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setparametro_general_usuario_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_general_usuario_Original(),$resultSet,parametro_general_usuario_data::$IS_WITH_SCHEMA));         		
				////$entity->setparametro_general_usuario_Original(parametro_general_usuario_data::getEntityBaseResult("",$entity->getparametro_general_usuario_Original(),$resultSet));
				//$entity->setparametro_general_usuario_Original($this->getEntityBaseResult("",$entity->getparametro_general_usuario_Original(),$resultSet));
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
		$entity = new parametro_general_usuario();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=parametro_general_usuario_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=parametro_general_usuario_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,parametro_general_usuario_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new parametro_general_usuario();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_general_usuario_data::$IS_WITH_SCHEMA);         		
				/*$entity=parametro_general_usuario_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setparametro_general_usuario_Original( new parametro_general_usuario());
				
				//$entity->setparametro_general_usuario_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_general_usuario_Original(),$resultSet,parametro_general_usuario_data::$IS_WITH_SCHEMA));         		
				////$entity->setparametro_general_usuario_Original(parametro_general_usuario_data::getEntityBaseResult("",$entity->getparametro_general_usuario_Original(),$resultSet));
				//$entity->setparametro_general_usuario_Original($this->getEntityBaseResult("",$entity->getparametro_general_usuario_Original(),$resultSet));
								
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
		$entity = new parametro_general_usuario();		  
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
      	    	$entity = new parametro_general_usuario();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_general_usuario_data::$IS_WITH_SCHEMA);         		
				/*$entity=parametro_general_usuario_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setparametro_general_usuario_Original( new parametro_general_usuario());
				
				//$entity->setparametro_general_usuario_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_general_usuario_Original(),$resultSet,parametro_general_usuario_data::$IS_WITH_SCHEMA));         		
				////$entity->setparametro_general_usuario_Original(parametro_general_usuario_data::getEntityBaseResult("",$entity->getparametro_general_usuario_Original(),$resultSet));
				//$entity->setparametro_general_usuario_Original($this->getEntityBaseResult("",$entity->getparametro_general_usuario_Original(),$resultSet));
				
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
		$entity = new parametro_general_usuario();		  
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
      	    	$entity = new parametro_general_usuario();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,parametro_general_usuario_data::$IS_WITH_SCHEMA);         		
				/*$entity=parametro_general_usuario_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setparametro_general_usuario_Original( new parametro_general_usuario());				
				//$entity->setparametro_general_usuario_Original(parent::getEntityPrefijoEntityResult("",$entity->getparametro_general_usuario_Original(),$resultSet,parametro_general_usuario_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setparametro_general_usuario_Original(parametro_general_usuario_data::getEntityBaseResult("",$entity->getparametro_general_usuario_Original(),$resultSet));
				//$entity->setparametro_general_usuario_Original($this->getEntityBaseResult("",$entity->getparametro_general_usuario_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=parametro_general_usuario_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,parametro_general_usuario $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,parametro_general_usuario_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,parametro_general_usuario_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getusuario(Connexion $connexion,$relparametro_general_usuario) : ?usuario{

		$usuario= new usuario();

		try {
			$usuarioDataAccess=new usuario_data();
			$usuarioDataAccess->isForFKData=$this->isForFKDataRels;
			$usuario=$usuarioDataAccess->getEntity($connexion,$relparametro_general_usuario->getId());

		} catch(Exception $e) {
			throw $e;
		}

		return $usuario;
	}


	public function  gettipo_fondo(Connexion $connexion,$relparametro_general_usuario) : ?tipo_fondo{

		$tipo_fondo= new tipo_fondo();

		try {
			$tipo_fondoDataAccess=new tipo_fondo_data();
			$tipo_fondoDataAccess->isForFKData=$this->isForFKDataRels;
			$tipo_fondo=$tipo_fondoDataAccess->getEntity($connexion,$relparametro_general_usuario->getid_tipo_fondo());

		} catch(Exception $e) {
			throw $e;
		}

		return $tipo_fondo;
	}


	public function  getempresa(Connexion $connexion,$relparametro_general_usuario) : ?empresa{

		$empresa= new empresa();

		try {
			$empresaDataAccess=new empresa_data();
			$empresaDataAccess->isForFKData=$this->isForFKDataRels;
			$empresa=$empresaDataAccess->getEntity($connexion,$relparametro_general_usuario->getid_empresa());

		} catch(Exception $e) {
			throw $e;
		}

		return $empresa;
	}


	public function  getsucursal(Connexion $connexion,$relparametro_general_usuario) : ?sucursal{

		$sucursal= new sucursal();

		try {
			$sucursalDataAccess=new sucursal_data();
			$sucursalDataAccess->isForFKData=$this->isForFKDataRels;
			$sucursal=$sucursalDataAccess->getEntity($connexion,$relparametro_general_usuario->getid_sucursal());

		} catch(Exception $e) {
			throw $e;
		}

		return $sucursal;
	}


	public function  getejercicio(Connexion $connexion,$relparametro_general_usuario) : ?ejercicio{

		$ejercicio= new ejercicio();

		try {
			$ejercicioDataAccess=new ejercicio_data();
			$ejercicioDataAccess->isForFKData=$this->isForFKDataRels;
			$ejercicio=$ejercicioDataAccess->getEntity($connexion,$relparametro_general_usuario->getid_ejercicio());

		} catch(Exception $e) {
			throw $e;
		}

		return $ejercicio;
	}


	public function  getperiodo(Connexion $connexion,$relparametro_general_usuario) : ?periodo{

		$periodo= new periodo();

		try {
			$periodoDataAccess=new periodo_data();
			$periodoDataAccess->isForFKData=$this->isForFKDataRels;
			$periodo=$periodoDataAccess->getEntity($connexion,$relparametro_general_usuario->getid_periodo());

		} catch(Exception $e) {
			throw $e;
		}

		return $periodo;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,parametro_general_usuario $entity,$resultSet) : parametro_general_usuario {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_tipo_fondo((int)$resultSet[$strPrefijo.'id_tipo_fondo']);
				$entity->setid_empresa((int)$resultSet[$strPrefijo.'id_empresa']);
				$entity->setid_sucursal((int)$resultSet[$strPrefijo.'id_sucursal']);
				$entity->setid_ejercicio((int)$resultSet[$strPrefijo.'id_ejercicio']);
				$entity->setid_periodo((int)$resultSet[$strPrefijo.'id_periodo']);
				$entity->setpath_exportar(utf8_encode($resultSet[$strPrefijo.'path_exportar']));
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setcon_exportar_cabecera($resultSet[$strPrefijo.'con_exportar_cabecera']=='f'? false:true );
				} else {
					$entity->setcon_exportar_cabecera((bool)$resultSet[$strPrefijo.'con_exportar_cabecera']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setcon_exportar_campo_version($resultSet[$strPrefijo.'con_exportar_campo_version']=='f'? false:true );
				} else {
					$entity->setcon_exportar_campo_version((bool)$resultSet[$strPrefijo.'con_exportar_campo_version']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setcon_botones_tool_bar($resultSet[$strPrefijo.'con_botones_tool_bar']=='f'? false:true );
				} else {
					$entity->setcon_botones_tool_bar((bool)$resultSet[$strPrefijo.'con_botones_tool_bar']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setcon_cargar_por_parte($resultSet[$strPrefijo.'con_cargar_por_parte']=='f'? false:true );
				} else {
					$entity->setcon_cargar_por_parte((bool)$resultSet[$strPrefijo.'con_cargar_por_parte']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setcon_guardar_relaciones($resultSet[$strPrefijo.'con_guardar_relaciones']=='f'? false:true );
				} else {
					$entity->setcon_guardar_relaciones((bool)$resultSet[$strPrefijo.'con_guardar_relaciones']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setcon_mostrar_acciones_campo_general($resultSet[$strPrefijo.'con_mostrar_acciones_campo_general']=='f'? false:true );
				} else {
					$entity->setcon_mostrar_acciones_campo_general((bool)$resultSet[$strPrefijo.'con_mostrar_acciones_campo_general']);
				}
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setcon_mensaje_confirmacion($resultSet[$strPrefijo.'con_mensaje_confirmacion']=='f'? false:true );
				} else {
					$entity->setcon_mensaje_confirmacion((bool)$resultSet[$strPrefijo.'con_mensaje_confirmacion']);
				}
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,parametro_general_usuario $parametro_general_usuario,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $parametro_general_usuario->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiiisiiiiiii', $parametro_general_usuario->getId(),$parametro_general_usuario->getid_tipo_fondo(),$parametro_general_usuario->getid_empresa(),$parametro_general_usuario->getid_sucursal(),$parametro_general_usuario->getid_ejercicio(),$parametro_general_usuario->getid_periodo(),$parametro_general_usuario->getpath_exportar(),$parametro_general_usuario->getcon_exportar_cabecera(),$parametro_general_usuario->getcon_exportar_campo_version(),$parametro_general_usuario->getcon_botones_tool_bar(),$parametro_general_usuario->getcon_cargar_por_parte(),$parametro_general_usuario->getcon_guardar_relaciones(),$parametro_general_usuario->getcon_mostrar_acciones_campo_general(),$parametro_general_usuario->getcon_mensaje_confirmacion());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiisiiiiiiiis', $parametro_general_usuario->getid_tipo_fondo(),$parametro_general_usuario->getid_empresa(),$parametro_general_usuario->getid_sucursal(),$parametro_general_usuario->getid_ejercicio(),$parametro_general_usuario->getid_periodo(),$parametro_general_usuario->getpath_exportar(),$parametro_general_usuario->getcon_exportar_cabecera(),$parametro_general_usuario->getcon_exportar_campo_version(),$parametro_general_usuario->getcon_botones_tool_bar(),$parametro_general_usuario->getcon_cargar_por_parte(),$parametro_general_usuario->getcon_guardar_relaciones(),$parametro_general_usuario->getcon_mostrar_acciones_campo_general(),$parametro_general_usuario->getcon_mensaje_confirmacion(), $parametro_general_usuario->getId(), Funciones::GetRealScapeString($parametro_general_usuario->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,parametro_general_usuario $parametro_general_usuario,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($parametro_general_usuario->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($parametro_general_usuario->getId(),$parametro_general_usuario->getid_tipo_fondo(),$parametro_general_usuario->getid_empresa(),$parametro_general_usuario->getid_sucursal(),$parametro_general_usuario->getid_ejercicio(),$parametro_general_usuario->getid_periodo(),Funciones::GetRealScapeString($parametro_general_usuario->getpath_exportar(),$connexion),$parametro_general_usuario->getcon_exportar_cabecera(),$parametro_general_usuario->getcon_exportar_campo_version(),$parametro_general_usuario->getcon_botones_tool_bar(),$parametro_general_usuario->getcon_cargar_por_parte(),$parametro_general_usuario->getcon_guardar_relaciones(),$parametro_general_usuario->getcon_mostrar_acciones_campo_general(),$parametro_general_usuario->getcon_mensaje_confirmacion());
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($parametro_general_usuario->getid_tipo_fondo(),$parametro_general_usuario->getid_empresa(),$parametro_general_usuario->getid_sucursal(),$parametro_general_usuario->getid_ejercicio(),$parametro_general_usuario->getid_periodo(),Funciones::GetRealScapeString($parametro_general_usuario->getpath_exportar(),$connexion),$parametro_general_usuario->getcon_exportar_cabecera(),$parametro_general_usuario->getcon_exportar_campo_version(),$parametro_general_usuario->getcon_botones_tool_bar(),$parametro_general_usuario->getcon_cargar_por_parte(),$parametro_general_usuario->getcon_guardar_relaciones(),$parametro_general_usuario->getcon_mostrar_acciones_campo_general(),$parametro_general_usuario->getcon_mensaje_confirmacion(), $parametro_general_usuario->getId(), Funciones::GetRealScapeString($parametro_general_usuario->getVersionRow(),$connexion));
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
	
	public function setparametro_general_usuario_Original(parametro_general_usuario $parametro_general_usuario) {
		$parametro_general_usuario->setparametro_general_usuario_Original(clone $parametro_general_usuario);		
	}
	
	public function setparametro_general_usuarios_Original(array $parametro_general_usuarios) {
		foreach($parametro_general_usuarios as $parametro_general_usuario){
			$parametro_general_usuario->setparametro_general_usuario_Original(clone $parametro_general_usuario);
		}
	}
	
	public static function setparametro_general_usuario_OriginalStatic(parametro_general_usuario $parametro_general_usuario) {
		$parametro_general_usuario->setparametro_general_usuario_Original(clone $parametro_general_usuario);		
	}
	
	public static function setparametro_general_usuarios_OriginalStatic(array $parametro_general_usuarios) {		
		foreach($parametro_general_usuarios as $parametro_general_usuario){
			$parametro_general_usuario->setparametro_general_usuario_Original(clone $parametro_general_usuario);
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
