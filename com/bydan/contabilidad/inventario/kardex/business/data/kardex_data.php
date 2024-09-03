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
namespace com\bydan\contabilidad\inventario\kardex\business\data;

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

use com\bydan\contabilidad\inventario\kardex\business\entity\kardex;

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

use com\bydan\contabilidad\inventario\tipo_kardex\business\data\tipo_kardex_data;
use com\bydan\contabilidad\inventario\tipo_kardex\business\entity\tipo_kardex;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\data\proveedor_data;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;

use com\bydan\contabilidad\cuentascobrar\cliente\business\data\cliente_data;
use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;

use com\bydan\contabilidad\general\estado\business\data\estado_data;
use com\bydan\contabilidad\general\estado\business\entity\estado;

//REL

use com\bydan\contabilidad\inventario\kardex_detalle\business\data\kardex_detalle_data;


class kardex_data extends GetEntitiesDataAccessHelper implements kardex_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='inv_';
	public static string $TABLE_NAME='inv_kardex';			
	public static string $TABLE_NAME_kardex='kardex';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_KARDEX_INSERT(??,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_KARDEX_UPDATE(??,?,?,?,?,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_KARDEX_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_KARDEX_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $kardex_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'kardex';
		
		kardex_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('INVENTARIO');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->kardex_DataAccessAdditional=new kardexDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_empresa,id_sucursal,id_ejercicio,id_periodo,id_usuario,id_modulo,id_tipo_kardex,numero,numero_documento,id_proveedor,id_cliente,total,descripcion,id_estado,costo) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,%d,%d,%d,%d,%s,%d,\'%s\',\'%s\',%s,%s,%f,\'%s\',%d,%f)';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_empresa=%d,id_sucursal=%d,id_ejercicio=%d,id_periodo=%d,id_usuario=%d,id_modulo=%s,id_tipo_kardex=%d,numero=\'%s\',numero_documento=\'%s\',id_proveedor=%s,id_cliente=%s,total=%f,descripcion=\'%s\',id_estado=%d,costo=%f where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_sucursal,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_ejercicio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_periodo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_usuario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_modulo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_tipo_kardex,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_documento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cliente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.total,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_estado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.costo from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(kardex $kardex,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($kardex->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=kardex_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($kardex->getId(),$connexion));				
				
			} else if ($kardex->getIsChanged()) {
				if($kardex->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=kardex_data::$QUERY_INSERT;
					
					
					
					

					//$id_modulo='null';
					//if($kardex->getid_modulo()!==null && $kardex->getid_modulo()>=0) {
						//$id_modulo=$kardex->getid_modulo();
					//} else {
						//$id_modulo='null';
					//}

					//$id_proveedor='null';
					//if($kardex->getid_proveedor()!==null && $kardex->getid_proveedor()>=0) {
						//$id_proveedor=$kardex->getid_proveedor();
					//} else {
						//$id_proveedor='null';
					//}

					//$id_cliente='null';
					//if($kardex->getid_cliente()!==null && $kardex->getid_cliente()>=0) {
						//$id_cliente=$kardex->getid_cliente();
					//} else {
						//$id_cliente='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$kardex->getid_empresa(),$kardex->getid_sucursal(),$kardex->getid_ejercicio(),$kardex->getid_periodo(),$kardex->getid_usuario(),$kardex->getid_modulo(),$kardex->getid_tipo_kardex(),Funciones::GetRealScapeString($kardex->getnumero(),$connexion),Funciones::GetRealScapeString($kardex->getnumero_documento(),$connexion),Funciones::GetNullString($kardex->getid_proveedor()),Funciones::GetNullString($kardex->getid_cliente()),$kardex->gettotal(),Funciones::GetRealScapeString($kardex->getdescripcion(),$connexion),$kardex->getid_estado(),$kardex->getcosto() );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=kardex_data::$QUERY_UPDATE;			
					
					
					
					

					//$id_modulo='null';
					//if($kardex->getid_modulo()!==null && $kardex->getid_modulo()>=0) {
						//$id_modulo=$kardex->getid_modulo();
					//} else {
						//$id_modulo='null';
					//}

					//$id_proveedor='null';
					//if($kardex->getid_proveedor()!==null && $kardex->getid_proveedor()>=0) {
						//$id_proveedor=$kardex->getid_proveedor();
					//} else {
						//$id_proveedor='null';
					//}

					//$id_cliente='null';
					//if($kardex->getid_cliente()!==null && $kardex->getid_cliente()>=0) {
						//$id_cliente=$kardex->getid_cliente();
					//} else {
						//$id_cliente='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$kardex->getid_empresa(),$kardex->getid_sucursal(),$kardex->getid_ejercicio(),$kardex->getid_periodo(),$kardex->getid_usuario(),$kardex->getid_modulo(),$kardex->getid_tipo_kardex(),Funciones::GetRealScapeString($kardex->getnumero(),$connexion),Funciones::GetRealScapeString($kardex->getnumero_documento(),$connexion),Funciones::GetNullString($kardex->getid_proveedor()),Funciones::GetNullString($kardex->getid_cliente()),$kardex->gettotal(),Funciones::GetRealScapeString($kardex->getdescripcion(),$connexion),$kardex->getid_estado(),$kardex->getcosto(), Funciones::GetRealScapeString($kardex->getId(),$connexion), Funciones::GetRealScapeString($kardex->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($kardex, $connexion,$strQuerySaveComplete,kardex_data::$TABLE_NAME,kardex_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				kardex_data::savePrepared($kardex, $connexion,$strQuerySave,kardex_data::$TABLE_NAME,kardex_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			kardex_data::setkardex_OriginalStatic($kardex);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(kardex $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				kardex_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					kardex_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					kardex_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(kardex $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					kardex_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(kardex $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					kardex_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(kardex $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					kardex_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?kardex {		
		$entity = new kardex();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=kardex_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=kardex_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//Inventario.kardex.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setkardex_Original(new kardex());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,kardex_data::$IS_WITH_SCHEMA);         	    
				/*$entity=kardex_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setkardex_Original(parent::getEntityPrefijoEntityResult("",$entity->getkardex_Original(),$resultSet,kardex_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setkardex_Original(kardex_data::getEntityBaseResult("",$entity->getkardex_Original(),$resultSet));
				//$entity->setkardex_Original($this->getEntityBaseResult("",$entity->getkardex_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?kardex {
		$entity = new kardex();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=kardex_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=kardex_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,kardex_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".Inventario.kardex.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setkardex_Original(new kardex());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,kardex_data::$IS_WITH_SCHEMA);         	    
				/*$entity=kardex_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setkardex_Original(parent::getEntityPrefijoEntityResult("",$entity->getkardex_Original(),$resultSet,kardex_data::$IS_WITH_SCHEMA));         		
				////$entity->setkardex_Original(kardex_data::getEntityBaseResult("",$entity->getkardex_Original(),$resultSet));
				//$entity->setkardex_Original($this->getEntityBaseResult("",$entity->getkardex_Original(),$resultSet));
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
		$entity = new kardex();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=kardex_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=kardex_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,kardex_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new kardex();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,kardex_data::$IS_WITH_SCHEMA);         		
				/*$entity=kardex_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setkardex_Original( new kardex());
				
				//$entity->setkardex_Original(parent::getEntityPrefijoEntityResult("",$entity->getkardex_Original(),$resultSet,kardex_data::$IS_WITH_SCHEMA));         		
				////$entity->setkardex_Original(kardex_data::getEntityBaseResult("",$entity->getkardex_Original(),$resultSet));
				//$entity->setkardex_Original($this->getEntityBaseResult("",$entity->getkardex_Original(),$resultSet));
								
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
		$entity = new kardex();		  
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
      	    	$entity = new kardex();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,kardex_data::$IS_WITH_SCHEMA);         		
				/*$entity=kardex_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setkardex_Original( new kardex());
				
				//$entity->setkardex_Original(parent::getEntityPrefijoEntityResult("",$entity->getkardex_Original(),$resultSet,kardex_data::$IS_WITH_SCHEMA));         		
				////$entity->setkardex_Original(kardex_data::getEntityBaseResult("",$entity->getkardex_Original(),$resultSet));
				//$entity->setkardex_Original($this->getEntityBaseResult("",$entity->getkardex_Original(),$resultSet));
				
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
		$entity = new kardex();		  
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
      	    	$entity = new kardex();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,kardex_data::$IS_WITH_SCHEMA);         		
				/*$entity=kardex_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setkardex_Original( new kardex());				
				//$entity->setkardex_Original(parent::getEntityPrefijoEntityResult("",$entity->getkardex_Original(),$resultSet,kardex_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setkardex_Original(kardex_data::getEntityBaseResult("",$entity->getkardex_Original(),$resultSet));
				//$entity->setkardex_Original($this->getEntityBaseResult("",$entity->getkardex_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=kardex_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,kardex $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,kardex_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,kardex_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getempresa(Connexion $connexion,$relkardex) : ?empresa{

		$empresa= new empresa();

		try {
			$empresaDataAccess=new empresa_data();
			$empresaDataAccess->isForFKData=$this->isForFKDataRels;
			$empresa=$empresaDataAccess->getEntity($connexion,$relkardex->getid_empresa());

		} catch(Exception $e) {
			throw $e;
		}

		return $empresa;
	}


	public function  getsucursal(Connexion $connexion,$relkardex) : ?sucursal{

		$sucursal= new sucursal();

		try {
			$sucursalDataAccess=new sucursal_data();
			$sucursalDataAccess->isForFKData=$this->isForFKDataRels;
			$sucursal=$sucursalDataAccess->getEntity($connexion,$relkardex->getid_sucursal());

		} catch(Exception $e) {
			throw $e;
		}

		return $sucursal;
	}


	public function  getejercicio(Connexion $connexion,$relkardex) : ?ejercicio{

		$ejercicio= new ejercicio();

		try {
			$ejercicioDataAccess=new ejercicio_data();
			$ejercicioDataAccess->isForFKData=$this->isForFKDataRels;
			$ejercicio=$ejercicioDataAccess->getEntity($connexion,$relkardex->getid_ejercicio());

		} catch(Exception $e) {
			throw $e;
		}

		return $ejercicio;
	}


	public function  getperiodo(Connexion $connexion,$relkardex) : ?periodo{

		$periodo= new periodo();

		try {
			$periodoDataAccess=new periodo_data();
			$periodoDataAccess->isForFKData=$this->isForFKDataRels;
			$periodo=$periodoDataAccess->getEntity($connexion,$relkardex->getid_periodo());

		} catch(Exception $e) {
			throw $e;
		}

		return $periodo;
	}


	public function  getusuario(Connexion $connexion,$relkardex) : ?usuario{

		$usuario= new usuario();

		try {
			$usuarioDataAccess=new usuario_data();
			$usuarioDataAccess->isForFKData=$this->isForFKDataRels;
			$usuario=$usuarioDataAccess->getEntity($connexion,$relkardex->getid_usuario());

		} catch(Exception $e) {
			throw $e;
		}

		return $usuario;
	}


	public function  getmodulo(Connexion $connexion,$relkardex) : ?modulo{

		$modulo= new modulo();

		try {
			$moduloDataAccess=new modulo_data();
			$moduloDataAccess->isForFKData=$this->isForFKDataRels;
			$modulo=$moduloDataAccess->getEntity($connexion,$relkardex->getid_modulo());

		} catch(Exception $e) {
			throw $e;
		}

		return $modulo;
	}


	public function  gettipo_kardex(Connexion $connexion,$relkardex) : ?tipo_kardex{

		$tipo_kardex= new tipo_kardex();

		try {
			$tipo_kardexDataAccess=new tipo_kardex_data();
			$tipo_kardexDataAccess->isForFKData=$this->isForFKDataRels;
			$tipo_kardex=$tipo_kardexDataAccess->getEntity($connexion,$relkardex->getid_tipo_kardex());

		} catch(Exception $e) {
			throw $e;
		}

		return $tipo_kardex;
	}


	public function  getproveedor(Connexion $connexion,$relkardex) : ?proveedor{

		$proveedor= new proveedor();

		try {
			$proveedorDataAccess=new proveedor_data();
			$proveedorDataAccess->isForFKData=$this->isForFKDataRels;
			$proveedor=$proveedorDataAccess->getEntity($connexion,$relkardex->getid_proveedor());

		} catch(Exception $e) {
			throw $e;
		}

		return $proveedor;
	}


	public function  getcliente(Connexion $connexion,$relkardex) : ?cliente{

		$cliente= new cliente();

		try {
			$clienteDataAccess=new cliente_data();
			$clienteDataAccess->isForFKData=$this->isForFKDataRels;
			$cliente=$clienteDataAccess->getEntity($connexion,$relkardex->getid_cliente());

		} catch(Exception $e) {
			throw $e;
		}

		return $cliente;
	}


	public function  getestado(Connexion $connexion,$relkardex) : ?estado{

		$estado= new estado();

		try {
			$estadoDataAccess=new estado_data();
			$estadoDataAccess->isForFKData=$this->isForFKDataRels;
			$estado=$estadoDataAccess->getEntity($connexion,$relkardex->getid_estado());

		} catch(Exception $e) {
			throw $e;
		}

		return $estado;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	public function  getkardex_detalles(Connexion $connexion,kardex $kardex) : array {

		$kardexdetalles=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.kardex_detalle_data::$SCHEMA.".".kardex_detalle_data::$TABLE_NAME.".id_kardex=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$kardex->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$kardexdetalleDataAccess=new kardex_detalle_data();

			$kardexdetalles=$kardexdetalleDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $kardexdetalles;
	}


	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,kardex $entity,$resultSet) : kardex {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_empresa((int)$resultSet[$strPrefijo.'id_empresa']);
				$entity->setid_sucursal((int)$resultSet[$strPrefijo.'id_sucursal']);
				$entity->setid_ejercicio((int)$resultSet[$strPrefijo.'id_ejercicio']);
				$entity->setid_periodo((int)$resultSet[$strPrefijo.'id_periodo']);
				$entity->setid_usuario((int)$resultSet[$strPrefijo.'id_usuario']);
				$entity->setid_modulo((int)$resultSet[$strPrefijo.'id_modulo']);
				$entity->setid_tipo_kardex((int)$resultSet[$strPrefijo.'id_tipo_kardex']);
				$entity->setnumero(utf8_encode($resultSet[$strPrefijo.'numero']));
				$entity->setnumero_documento(utf8_encode($resultSet[$strPrefijo.'numero_documento']));
				$entity->setid_proveedor((int)$resultSet[$strPrefijo.'id_proveedor']);
				$entity->setid_cliente((int)$resultSet[$strPrefijo.'id_cliente']);
				$entity->settotal((float)$resultSet[$strPrefijo.'total']);
				$entity->setdescripcion(utf8_encode($resultSet[$strPrefijo.'descripcion']));
				$entity->setid_estado((int)$resultSet[$strPrefijo.'id_estado']);
				$entity->setcosto((float)$resultSet[$strPrefijo.'costo']);
			} else {
												
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,kardex $kardex,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $kardex->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiiiissiidsid', $kardex->getid_empresa(),$kardex->getid_sucursal(),$kardex->getid_ejercicio(),$kardex->getid_periodo(),$kardex->getid_usuario(),$kardex->getid_modulo(),$kardex->getid_tipo_kardex(),$kardex->getnumero(),$kardex->getnumero_documento(),$kardex->getid_proveedor(),$kardex->getid_cliente(),$kardex->gettotal(),$kardex->getdescripcion(),$kardex->getid_estado(),$kardex->getcosto());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'iiiiiiissiidsidis', $kardex->getid_empresa(),$kardex->getid_sucursal(),$kardex->getid_ejercicio(),$kardex->getid_periodo(),$kardex->getid_usuario(),$kardex->getid_modulo(),$kardex->getid_tipo_kardex(),$kardex->getnumero(),$kardex->getnumero_documento(),$kardex->getid_proveedor(),$kardex->getid_cliente(),$kardex->gettotal(),$kardex->getdescripcion(),$kardex->getid_estado(),$kardex->getcosto(), $kardex->getId(), Funciones::GetRealScapeString($kardex->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,kardex $kardex,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($kardex->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($kardex->getid_empresa(),$kardex->getid_sucursal(),$kardex->getid_ejercicio(),$kardex->getid_periodo(),$kardex->getid_usuario(),$kardex->getid_modulo(),$kardex->getid_tipo_kardex(),Funciones::GetRealScapeString($kardex->getnumero(),$connexion),Funciones::GetRealScapeString($kardex->getnumero_documento(),$connexion),Funciones::GetNullString($kardex->getid_proveedor()),Funciones::GetNullString($kardex->getid_cliente()),$kardex->gettotal(),Funciones::GetRealScapeString($kardex->getdescripcion(),$connexion),$kardex->getid_estado(),$kardex->getcosto());
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($kardex->getid_empresa(),$kardex->getid_sucursal(),$kardex->getid_ejercicio(),$kardex->getid_periodo(),$kardex->getid_usuario(),$kardex->getid_modulo(),$kardex->getid_tipo_kardex(),Funciones::GetRealScapeString($kardex->getnumero(),$connexion),Funciones::GetRealScapeString($kardex->getnumero_documento(),$connexion),Funciones::GetNullString($kardex->getid_proveedor()),Funciones::GetNullString($kardex->getid_cliente()),$kardex->gettotal(),Funciones::GetRealScapeString($kardex->getdescripcion(),$connexion),$kardex->getid_estado(),$kardex->getcosto(), $kardex->getId(), Funciones::GetRealScapeString($kardex->getVersionRow(),$connexion));
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
	
	public function setkardex_Original(kardex $kardex) {
		$kardex->setkardex_Original(clone $kardex);		
	}
	
	public function setkardexs_Original(array $kardexs) {
		foreach($kardexs as $kardex){
			$kardex->setkardex_Original(clone $kardex);
		}
	}
	
	public static function setkardex_OriginalStatic(kardex $kardex) {
		$kardex->setkardex_Original(clone $kardex);		
	}
	
	public static function setkardexs_OriginalStatic(array $kardexs) {		
		foreach($kardexs as $kardex){
			$kardex->setkardex_Original(clone $kardex);
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
