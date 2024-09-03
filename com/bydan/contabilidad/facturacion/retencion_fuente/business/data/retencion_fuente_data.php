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
namespace com\bydan\contabilidad\facturacion\retencion_fuente\business\data;

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

use com\bydan\contabilidad\facturacion\retencion_fuente\business\entity\retencion_fuente;

//FK


use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\entity\empresa;

use com\bydan\contabilidad\contabilidad\cuenta\business\data\cuenta_data;
use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;

//REL

use com\bydan\contabilidad\cuentaspagar\proveedor\business\data\proveedor_data;
use com\bydan\contabilidad\cuentascobrar\cliente\business\data\cliente_data;


class retencion_fuente_data extends GetEntitiesDataAccessHelper implements retencion_fuente_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='fac_';
	public static string $TABLE_NAME='fac_retencion_fuente';			
	public static string $TABLE_NAME_retencion_fuente='retencion_fuente';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_RETENCION_FUENTE_INSERT(??,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_RETENCION_FUENTE_UPDATE(??,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_RETENCION_FUENTE_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_RETENCION_FUENTE_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $retencion_fuente_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'retencion_fuente';
		
		retencion_fuente_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('FACTURACION');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->retencion_fuente_DataAccessAdditional=new retencion_fuenteDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,id_empresa,codigo,descripcion,valor,valor_base,predeterminado,id_cuenta_ventas,id_cuenta_compras,cuenta_contable_ventas,cuenta_contable_compras) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,%d,\'%s\',\'%s\',%f,%f,\'%d\',%s,%s,\'%s\',\'%s\')';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,id_empresa=%d,codigo=\'%s\',descripcion=\'%s\',valor=%f,valor_base=%f,predeterminado=\'%d\',id_cuenta_ventas=%s,id_cuenta_compras=%s,cuenta_contable_ventas=\'%s\',cuenta_contable_compras=\'%s\' where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.valor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.valor_base,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.predeterminado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta_ventas,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta_compras,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cuenta_contable_ventas,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cuenta_contable_compras from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(retencion_fuente $retencion_fuente,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($retencion_fuente->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=retencion_fuente_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($retencion_fuente->getId(),$connexion));				
				
			} else if ($retencion_fuente->getIsChanged()) {
				if($retencion_fuente->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=retencion_fuente_data::$QUERY_INSERT;
					
					
					
					

					//$id_cuenta_ventas='null';
					//if($retencion_fuente->getid_cuenta_ventas()!==null && $retencion_fuente->getid_cuenta_ventas()>=0) {
						//$id_cuenta_ventas=$retencion_fuente->getid_cuenta_ventas();
					//} else {
						//$id_cuenta_ventas='null';
					//}

					//$id_cuenta_compras='null';
					//if($retencion_fuente->getid_cuenta_compras()!==null && $retencion_fuente->getid_cuenta_compras()>=0) {
						//$id_cuenta_compras=$retencion_fuente->getid_cuenta_compras();
					//} else {
						//$id_cuenta_compras='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$retencion_fuente->getid_empresa(),Funciones::GetRealScapeString($retencion_fuente->getcodigo(),$connexion),Funciones::GetRealScapeString($retencion_fuente->getdescripcion(),$connexion),$retencion_fuente->getvalor(),$retencion_fuente->getvalor_base(),$retencion_fuente->getpredeterminado(),Funciones::GetNullString($retencion_fuente->getid_cuenta_ventas()),Funciones::GetNullString($retencion_fuente->getid_cuenta_compras()),Funciones::GetRealScapeString($retencion_fuente->getcuenta_contable_ventas(),$connexion),Funciones::GetRealScapeString($retencion_fuente->getcuenta_contable_compras(),$connexion) );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=retencion_fuente_data::$QUERY_UPDATE;			
					
					
					
					

					//$id_cuenta_ventas='null';
					//if($retencion_fuente->getid_cuenta_ventas()!==null && $retencion_fuente->getid_cuenta_ventas()>=0) {
						//$id_cuenta_ventas=$retencion_fuente->getid_cuenta_ventas();
					//} else {
						//$id_cuenta_ventas='null';
					//}

					//$id_cuenta_compras='null';
					//if($retencion_fuente->getid_cuenta_compras()!==null && $retencion_fuente->getid_cuenta_compras()>=0) {
						//$id_cuenta_compras=$retencion_fuente->getid_cuenta_compras();
					//} else {
						//$id_cuenta_compras='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,$retencion_fuente->getid_empresa(),Funciones::GetRealScapeString($retencion_fuente->getcodigo(),$connexion),Funciones::GetRealScapeString($retencion_fuente->getdescripcion(),$connexion),$retencion_fuente->getvalor(),$retencion_fuente->getvalor_base(),$retencion_fuente->getpredeterminado(),Funciones::GetNullString($retencion_fuente->getid_cuenta_ventas()),Funciones::GetNullString($retencion_fuente->getid_cuenta_compras()),Funciones::GetRealScapeString($retencion_fuente->getcuenta_contable_ventas(),$connexion),Funciones::GetRealScapeString($retencion_fuente->getcuenta_contable_compras(),$connexion), Funciones::GetRealScapeString($retencion_fuente->getId(),$connexion), Funciones::GetRealScapeString($retencion_fuente->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($retencion_fuente, $connexion,$strQuerySaveComplete,retencion_fuente_data::$TABLE_NAME,retencion_fuente_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				retencion_fuente_data::savePrepared($retencion_fuente, $connexion,$strQuerySave,retencion_fuente_data::$TABLE_NAME,retencion_fuente_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			retencion_fuente_data::setretencion_fuente_OriginalStatic($retencion_fuente);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(retencion_fuente $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				retencion_fuente_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					retencion_fuente_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					retencion_fuente_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(retencion_fuente $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					retencion_fuente_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(retencion_fuente $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					retencion_fuente_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(retencion_fuente $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					retencion_fuente_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?retencion_fuente {		
		$entity = new retencion_fuente();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=retencion_fuente_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=retencion_fuente_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//Facturacion.retencion_fuente.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setretencion_fuente_Original(new retencion_fuente());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,retencion_fuente_data::$IS_WITH_SCHEMA);         	    
				/*$entity=retencion_fuente_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setretencion_fuente_Original(parent::getEntityPrefijoEntityResult("",$entity->getretencion_fuente_Original(),$resultSet,retencion_fuente_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setretencion_fuente_Original(retencion_fuente_data::getEntityBaseResult("",$entity->getretencion_fuente_Original(),$resultSet));
				//$entity->setretencion_fuente_Original($this->getEntityBaseResult("",$entity->getretencion_fuente_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?retencion_fuente {
		$entity = new retencion_fuente();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=retencion_fuente_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=retencion_fuente_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,retencion_fuente_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".Facturacion.retencion_fuente.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setretencion_fuente_Original(new retencion_fuente());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,retencion_fuente_data::$IS_WITH_SCHEMA);         	    
				/*$entity=retencion_fuente_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setretencion_fuente_Original(parent::getEntityPrefijoEntityResult("",$entity->getretencion_fuente_Original(),$resultSet,retencion_fuente_data::$IS_WITH_SCHEMA));         		
				////$entity->setretencion_fuente_Original(retencion_fuente_data::getEntityBaseResult("",$entity->getretencion_fuente_Original(),$resultSet));
				//$entity->setretencion_fuente_Original($this->getEntityBaseResult("",$entity->getretencion_fuente_Original(),$resultSet));
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
		$entity = new retencion_fuente();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=retencion_fuente_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=retencion_fuente_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,retencion_fuente_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new retencion_fuente();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,retencion_fuente_data::$IS_WITH_SCHEMA);         		
				/*$entity=retencion_fuente_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setretencion_fuente_Original( new retencion_fuente());
				
				//$entity->setretencion_fuente_Original(parent::getEntityPrefijoEntityResult("",$entity->getretencion_fuente_Original(),$resultSet,retencion_fuente_data::$IS_WITH_SCHEMA));         		
				////$entity->setretencion_fuente_Original(retencion_fuente_data::getEntityBaseResult("",$entity->getretencion_fuente_Original(),$resultSet));
				//$entity->setretencion_fuente_Original($this->getEntityBaseResult("",$entity->getretencion_fuente_Original(),$resultSet));
								
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
		$entity = new retencion_fuente();		  
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
      	    	$entity = new retencion_fuente();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,retencion_fuente_data::$IS_WITH_SCHEMA);         		
				/*$entity=retencion_fuente_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setretencion_fuente_Original( new retencion_fuente());
				
				//$entity->setretencion_fuente_Original(parent::getEntityPrefijoEntityResult("",$entity->getretencion_fuente_Original(),$resultSet,retencion_fuente_data::$IS_WITH_SCHEMA));         		
				////$entity->setretencion_fuente_Original(retencion_fuente_data::getEntityBaseResult("",$entity->getretencion_fuente_Original(),$resultSet));
				//$entity->setretencion_fuente_Original($this->getEntityBaseResult("",$entity->getretencion_fuente_Original(),$resultSet));
				
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
		$entity = new retencion_fuente();		  
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
      	    	$entity = new retencion_fuente();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,retencion_fuente_data::$IS_WITH_SCHEMA);         		
				/*$entity=retencion_fuente_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setretencion_fuente_Original( new retencion_fuente());				
				//$entity->setretencion_fuente_Original(parent::getEntityPrefijoEntityResult("",$entity->getretencion_fuente_Original(),$resultSet,retencion_fuente_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setretencion_fuente_Original(retencion_fuente_data::getEntityBaseResult("",$entity->getretencion_fuente_Original(),$resultSet));
				//$entity->setretencion_fuente_Original($this->getEntityBaseResult("",$entity->getretencion_fuente_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=retencion_fuente_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,retencion_fuente $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,retencion_fuente_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,retencion_fuente_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getempresa(Connexion $connexion,$relretencion_fuente) : ?empresa{

		$empresa= new empresa();

		try {
			$empresaDataAccess=new empresa_data();
			$empresaDataAccess->isForFKData=$this->isForFKDataRels;
			$empresa=$empresaDataAccess->getEntity($connexion,$relretencion_fuente->getid_empresa());

		} catch(Exception $e) {
			throw $e;
		}

		return $empresa;
	}


	public function  getcuenta_ventas(Connexion $connexion,$relretencion_fuente) : ?cuenta{

		$cuenta= new cuenta();

		try {
			$cuentaDataAccess=new cuenta_data();
			$cuentaDataAccess->isForFKData=$this->isForFKDataRels;
			$cuenta=$cuentaDataAccess->getEntity($connexion,$relretencion_fuente->getid_cuenta_ventas());

		} catch(Exception $e) {
			throw $e;
		}

		return $cuenta;
	}


	public function  getcuenta_compras(Connexion $connexion,$relretencion_fuente) : ?cuenta{

		$cuenta= new cuenta();

		try {
			$cuentaDataAccess=new cuenta_data();
			$cuentaDataAccess->isForFKData=$this->isForFKDataRels;
			$cuenta=$cuentaDataAccess->getEntity($connexion,$relretencion_fuente->getid_cuenta_compras());

		} catch(Exception $e) {
			throw $e;
		}

		return $cuenta;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	public function  getproveedors(Connexion $connexion,retencion_fuente $retencion_fuente) : array {

		$proveedors=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.proveedor_data::$SCHEMA.".".proveedor_data::$TABLE_NAME.".id_retencion_fuente=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$retencion_fuente->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$proveedorDataAccess=new proveedor_data();

			$proveedors=$proveedorDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $proveedors;
	}


	public function  getclientes(Connexion $connexion,retencion_fuente $retencion_fuente) : array {

		$clientes=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.cliente_data::$SCHEMA.".".cliente_data::$TABLE_NAME.".id_retencion_fuente=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$retencion_fuente->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$clienteDataAccess=new cliente_data();

			$clientes=$clienteDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $clientes;
	}


	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,retencion_fuente $entity,$resultSet) : retencion_fuente {
        try {     	
			if(!$this->isForFKData) {
				$entity->setid_empresa((int)$resultSet[$strPrefijo.'id_empresa']);
				$entity->setcodigo(utf8_encode($resultSet[$strPrefijo.'codigo']));
				$entity->setdescripcion(utf8_encode($resultSet[$strPrefijo.'descripcion']));
				$entity->setvalor((float)$resultSet[$strPrefijo.'valor']);
				$entity->setvalor_base((float)$resultSet[$strPrefijo.'valor_base']);
				
				if(Constantes::$BIT_ES_POSTGRES==true) {
					$entity->setpredeterminado($resultSet[$strPrefijo.'predeterminado']=='f'? false:true );
				} else {
					$entity->setpredeterminado((bool)$resultSet[$strPrefijo.'predeterminado']);
				}
				$entity->setid_cuenta_ventas((int)$resultSet[$strPrefijo.'id_cuenta_ventas']);
				$entity->setid_cuenta_compras((int)$resultSet[$strPrefijo.'id_cuenta_compras']);
				$entity->setcuenta_contable_ventas(utf8_encode($resultSet[$strPrefijo.'cuenta_contable_ventas']));
				$entity->setcuenta_contable_compras(utf8_encode($resultSet[$strPrefijo.'cuenta_contable_compras']));
			} else {
				$entity->setcodigo(utf8_encode($resultSet[$strPrefijo.'codigo']));								
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,retencion_fuente $retencion_fuente,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $retencion_fuente->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'issddiiiss', $retencion_fuente->getid_empresa(),$retencion_fuente->getcodigo(),$retencion_fuente->getdescripcion(),$retencion_fuente->getvalor(),$retencion_fuente->getvalor_base(),$retencion_fuente->getpredeterminado(),$retencion_fuente->getid_cuenta_ventas(),$retencion_fuente->getid_cuenta_compras(),$retencion_fuente->getcuenta_contable_ventas(),$retencion_fuente->getcuenta_contable_compras());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'issddiiissis', $retencion_fuente->getid_empresa(),$retencion_fuente->getcodigo(),$retencion_fuente->getdescripcion(),$retencion_fuente->getvalor(),$retencion_fuente->getvalor_base(),$retencion_fuente->getpredeterminado(),$retencion_fuente->getid_cuenta_ventas(),$retencion_fuente->getid_cuenta_compras(),$retencion_fuente->getcuenta_contable_ventas(),$retencion_fuente->getcuenta_contable_compras(), $retencion_fuente->getId(), Funciones::GetRealScapeString($retencion_fuente->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,retencion_fuente $retencion_fuente,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($retencion_fuente->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array($retencion_fuente->getid_empresa(),Funciones::GetRealScapeString($retencion_fuente->getcodigo(),$connexion),Funciones::GetRealScapeString($retencion_fuente->getdescripcion(),$connexion),$retencion_fuente->getvalor(),$retencion_fuente->getvalor_base(),$retencion_fuente->getpredeterminado(),Funciones::GetNullString($retencion_fuente->getid_cuenta_ventas()),Funciones::GetNullString($retencion_fuente->getid_cuenta_compras()),Funciones::GetRealScapeString($retencion_fuente->getcuenta_contable_ventas(),$connexion),Funciones::GetRealScapeString($retencion_fuente->getcuenta_contable_compras(),$connexion));
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array($retencion_fuente->getid_empresa(),Funciones::GetRealScapeString($retencion_fuente->getcodigo(),$connexion),Funciones::GetRealScapeString($retencion_fuente->getdescripcion(),$connexion),$retencion_fuente->getvalor(),$retencion_fuente->getvalor_base(),$retencion_fuente->getpredeterminado(),Funciones::GetNullString($retencion_fuente->getid_cuenta_ventas()),Funciones::GetNullString($retencion_fuente->getid_cuenta_compras()),Funciones::GetRealScapeString($retencion_fuente->getcuenta_contable_ventas(),$connexion),Funciones::GetRealScapeString($retencion_fuente->getcuenta_contable_compras(),$connexion), $retencion_fuente->getId(), Funciones::GetRealScapeString($retencion_fuente->getVersionRow(),$connexion));
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
	
	public function setretencion_fuente_Original(retencion_fuente $retencion_fuente) {
		$retencion_fuente->setretencion_fuente_Original(clone $retencion_fuente);		
	}
	
	public function setretencion_fuentes_Original(array $retencion_fuentes) {
		foreach($retencion_fuentes as $retencion_fuente){
			$retencion_fuente->setretencion_fuente_Original(clone $retencion_fuente);
		}
	}
	
	public static function setretencion_fuente_OriginalStatic(retencion_fuente $retencion_fuente) {
		$retencion_fuente->setretencion_fuente_Original(clone $retencion_fuente);		
	}
	
	public static function setretencion_fuentes_OriginalStatic(array $retencion_fuentes) {		
		foreach($retencion_fuentes as $retencion_fuente){
			$retencion_fuente->setretencion_fuente_Original(clone $retencion_fuente);
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
