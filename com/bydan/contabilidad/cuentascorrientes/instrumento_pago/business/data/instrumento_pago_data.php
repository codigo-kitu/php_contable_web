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
namespace com\bydan\contabilidad\cuentascorrientes\instrumento_pago\business\data;

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

use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\business\entity\instrumento_pago;

//FK


use com\bydan\contabilidad\contabilidad\cuenta\business\data\cuenta_data;
use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\data\cuenta_corriente_data;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity\cuenta_corriente;

//REL



class instrumento_pago_data extends GetEntitiesDataAccessHelper implements instrumento_pago_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='cco_';
	public static string $TABLE_NAME='cco_instrumento_pago';			
	public static string $TABLE_NAME_instrumento_pago='instrumento_pago';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_INSTRUMENTO_PAGO_INSERT(??,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_INSTRUMENTO_PAGO_UPDATE(??,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_INSTRUMENTO_PAGO_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_INSTRUMENTO_PAGO_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $instrumento_pago_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'instrumento_pago';
		
		instrumento_pago_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('CUENTASCORRIENTES');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->instrumento_pago_DataAccessAdditional=new instrumento_pagoDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,codigo,descripcion,predeterminado,id_cuenta_compras,id_cuenta_ventas,cuenta_contable_compra,cuenta_contable_ventas,id_cuenta_corriente) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,\'%s\',\'%s\',%d,%s,%s,\'%s\',\'%s\',%d)';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,codigo=\'%s\',descripcion=\'%s\',predeterminado=%d,id_cuenta_compras=%s,id_cuenta_ventas=%s,cuenta_contable_compra=\'%s\',cuenta_contable_ventas=\'%s\',id_cuenta_corriente=%d where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.predeterminado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta_compras,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta_ventas,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cuenta_contable_compra,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cuenta_contable_ventas,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta_corriente from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(instrumento_pago $instrumento_pago,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($instrumento_pago->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=instrumento_pago_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($instrumento_pago->getId(),$connexion));				
				
			} else if ($instrumento_pago->getIsChanged()) {
				if($instrumento_pago->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=instrumento_pago_data::$QUERY_INSERT;
					
					
					
					

					//$id_cuenta_compras='null';
					//if($instrumento_pago->getid_cuenta_compras()!==null && $instrumento_pago->getid_cuenta_compras()>=0) {
						//$id_cuenta_compras=$instrumento_pago->getid_cuenta_compras();
					//} else {
						//$id_cuenta_compras='null';
					//}

					//$id_cuenta_ventas='null';
					//if($instrumento_pago->getid_cuenta_ventas()!==null && $instrumento_pago->getid_cuenta_ventas()>=0) {
						//$id_cuenta_ventas=$instrumento_pago->getid_cuenta_ventas();
					//} else {
						//$id_cuenta_ventas='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($instrumento_pago->getcodigo(),$connexion),Funciones::GetRealScapeString($instrumento_pago->getdescripcion(),$connexion),$instrumento_pago->getpredeterminado(),$instrumento_pago->getid_cuenta_compras(),$instrumento_pago->getid_cuenta_ventas(),Funciones::GetRealScapeString($instrumento_pago->getcuenta_contable_compra(),$connexion),Funciones::GetRealScapeString($instrumento_pago->getcuenta_contable_ventas(),$connexion),$instrumento_pago->getid_cuenta_corriente() );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=instrumento_pago_data::$QUERY_UPDATE;			
					
					
					
					

					//$id_cuenta_compras='null';
					//if($instrumento_pago->getid_cuenta_compras()!==null && $instrumento_pago->getid_cuenta_compras()>=0) {
						//$id_cuenta_compras=$instrumento_pago->getid_cuenta_compras();
					//} else {
						//$id_cuenta_compras='null';
					//}

					//$id_cuenta_ventas='null';
					//if($instrumento_pago->getid_cuenta_ventas()!==null && $instrumento_pago->getid_cuenta_ventas()>=0) {
						//$id_cuenta_ventas=$instrumento_pago->getid_cuenta_ventas();
					//} else {
						//$id_cuenta_ventas='null';
					//}
					
					$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($instrumento_pago->getcodigo(),$connexion),Funciones::GetRealScapeString($instrumento_pago->getdescripcion(),$connexion),$instrumento_pago->getpredeterminado(),$instrumento_pago->getid_cuenta_compras(),$instrumento_pago->getid_cuenta_ventas(),Funciones::GetRealScapeString($instrumento_pago->getcuenta_contable_compra(),$connexion),Funciones::GetRealScapeString($instrumento_pago->getcuenta_contable_ventas(),$connexion),$instrumento_pago->getid_cuenta_corriente(), Funciones::GetRealScapeString($instrumento_pago->getId(),$connexion), Funciones::GetRealScapeString($instrumento_pago->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($instrumento_pago, $connexion,$strQuerySaveComplete,instrumento_pago_data::$TABLE_NAME,instrumento_pago_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				instrumento_pago_data::savePrepared($instrumento_pago, $connexion,$strQuerySave,instrumento_pago_data::$TABLE_NAME,instrumento_pago_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			instrumento_pago_data::setinstrumento_pago_OriginalStatic($instrumento_pago);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(instrumento_pago $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				instrumento_pago_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					instrumento_pago_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					instrumento_pago_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(instrumento_pago $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					instrumento_pago_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(instrumento_pago $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					instrumento_pago_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(instrumento_pago $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					instrumento_pago_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?instrumento_pago {		
		$entity = new instrumento_pago();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=instrumento_pago_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=instrumento_pago_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//CuentasCorrientes.instrumento_pago.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setinstrumento_pago_Original(new instrumento_pago());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,instrumento_pago_data::$IS_WITH_SCHEMA);         	    
				/*$entity=instrumento_pago_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setinstrumento_pago_Original(parent::getEntityPrefijoEntityResult("",$entity->getinstrumento_pago_Original(),$resultSet,instrumento_pago_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setinstrumento_pago_Original(instrumento_pago_data::getEntityBaseResult("",$entity->getinstrumento_pago_Original(),$resultSet));
				//$entity->setinstrumento_pago_Original($this->getEntityBaseResult("",$entity->getinstrumento_pago_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?instrumento_pago {
		$entity = new instrumento_pago();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=instrumento_pago_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=instrumento_pago_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,instrumento_pago_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".CuentasCorrientes.instrumento_pago.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setinstrumento_pago_Original(new instrumento_pago());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,instrumento_pago_data::$IS_WITH_SCHEMA);         	    
				/*$entity=instrumento_pago_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setinstrumento_pago_Original(parent::getEntityPrefijoEntityResult("",$entity->getinstrumento_pago_Original(),$resultSet,instrumento_pago_data::$IS_WITH_SCHEMA));         		
				////$entity->setinstrumento_pago_Original(instrumento_pago_data::getEntityBaseResult("",$entity->getinstrumento_pago_Original(),$resultSet));
				//$entity->setinstrumento_pago_Original($this->getEntityBaseResult("",$entity->getinstrumento_pago_Original(),$resultSet));
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
		$entity = new instrumento_pago();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=instrumento_pago_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=instrumento_pago_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,instrumento_pago_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new instrumento_pago();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,instrumento_pago_data::$IS_WITH_SCHEMA);         		
				/*$entity=instrumento_pago_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setinstrumento_pago_Original( new instrumento_pago());
				
				//$entity->setinstrumento_pago_Original(parent::getEntityPrefijoEntityResult("",$entity->getinstrumento_pago_Original(),$resultSet,instrumento_pago_data::$IS_WITH_SCHEMA));         		
				////$entity->setinstrumento_pago_Original(instrumento_pago_data::getEntityBaseResult("",$entity->getinstrumento_pago_Original(),$resultSet));
				//$entity->setinstrumento_pago_Original($this->getEntityBaseResult("",$entity->getinstrumento_pago_Original(),$resultSet));
								
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
		$entity = new instrumento_pago();		  
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
      	    	$entity = new instrumento_pago();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,instrumento_pago_data::$IS_WITH_SCHEMA);         		
				/*$entity=instrumento_pago_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setinstrumento_pago_Original( new instrumento_pago());
				
				//$entity->setinstrumento_pago_Original(parent::getEntityPrefijoEntityResult("",$entity->getinstrumento_pago_Original(),$resultSet,instrumento_pago_data::$IS_WITH_SCHEMA));         		
				////$entity->setinstrumento_pago_Original(instrumento_pago_data::getEntityBaseResult("",$entity->getinstrumento_pago_Original(),$resultSet));
				//$entity->setinstrumento_pago_Original($this->getEntityBaseResult("",$entity->getinstrumento_pago_Original(),$resultSet));
				
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
		$entity = new instrumento_pago();		  
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
      	    	$entity = new instrumento_pago();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,instrumento_pago_data::$IS_WITH_SCHEMA);         		
				/*$entity=instrumento_pago_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setinstrumento_pago_Original( new instrumento_pago());				
				//$entity->setinstrumento_pago_Original(parent::getEntityPrefijoEntityResult("",$entity->getinstrumento_pago_Original(),$resultSet,instrumento_pago_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setinstrumento_pago_Original(instrumento_pago_data::getEntityBaseResult("",$entity->getinstrumento_pago_Original(),$resultSet));
				//$entity->setinstrumento_pago_Original($this->getEntityBaseResult("",$entity->getinstrumento_pago_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=instrumento_pago_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,instrumento_pago $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,instrumento_pago_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,instrumento_pago_data::$QUERY_SELECT_COUNT);
				
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
	
	public function  getcuenta_compras(Connexion $connexion,$relinstrumento_pago) : ?cuenta{

		$cuenta= new cuenta();

		try {
			$cuentaDataAccess=new cuenta_data();
			$cuentaDataAccess->isForFKData=$this->isForFKDataRels;
			$cuenta=$cuentaDataAccess->getEntity($connexion,$relinstrumento_pago->getid_cuenta_compras());

		} catch(Exception $e) {
			throw $e;
		}

		return $cuenta;
	}


	public function  getcuenta_ventas(Connexion $connexion,$relinstrumento_pago) : ?cuenta{

		$cuenta= new cuenta();

		try {
			$cuentaDataAccess=new cuenta_data();
			$cuentaDataAccess->isForFKData=$this->isForFKDataRels;
			$cuenta=$cuentaDataAccess->getEntity($connexion,$relinstrumento_pago->getid_cuenta_ventas());

		} catch(Exception $e) {
			throw $e;
		}

		return $cuenta;
	}


	public function  getcuenta_corriente(Connexion $connexion,$relinstrumento_pago) : ?cuenta_corriente{

		$cuenta_corriente= new cuenta_corriente();

		try {
			$cuenta_corrienteDataAccess=new cuenta_corriente_data();
			$cuenta_corrienteDataAccess->isForFKData=$this->isForFKDataRels;
			$cuenta_corriente=$cuenta_corrienteDataAccess->getEntity($connexion,$relinstrumento_pago->getid_cuenta_corriente());

		} catch(Exception $e) {
			throw $e;
		}

		return $cuenta_corriente;
	}


	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,instrumento_pago $entity,$resultSet) : instrumento_pago {
        try {     	
			if(!$this->isForFKData) {
				$entity->setcodigo(utf8_encode($resultSet[$strPrefijo.'codigo']));
				$entity->setdescripcion(utf8_encode($resultSet[$strPrefijo.'descripcion']));
				$entity->setpredeterminado((int)$resultSet[$strPrefijo.'predeterminado']);
				$entity->setid_cuenta_compras((int)$resultSet[$strPrefijo.'id_cuenta_compras']);
				$entity->setid_cuenta_ventas((int)$resultSet[$strPrefijo.'id_cuenta_ventas']);
				$entity->setcuenta_contable_compra(utf8_encode($resultSet[$strPrefijo.'cuenta_contable_compra']));
				$entity->setcuenta_contable_ventas(utf8_encode($resultSet[$strPrefijo.'cuenta_contable_ventas']));
				$entity->setid_cuenta_corriente((int)$resultSet[$strPrefijo.'id_cuenta_corriente']);
			} else {
				$entity->setcodigo(utf8_encode($resultSet[$strPrefijo.'codigo']));								
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,instrumento_pago $instrumento_pago,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $instrumento_pago->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'ssiiissi', $instrumento_pago->getcodigo(),$instrumento_pago->getdescripcion(),$instrumento_pago->getpredeterminado(),$instrumento_pago->getid_cuenta_compras(),$instrumento_pago->getid_cuenta_ventas(),$instrumento_pago->getcuenta_contable_compra(),$instrumento_pago->getcuenta_contable_ventas(),$instrumento_pago->getid_cuenta_corriente());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'ssiiissiis', $instrumento_pago->getcodigo(),$instrumento_pago->getdescripcion(),$instrumento_pago->getpredeterminado(),$instrumento_pago->getid_cuenta_compras(),$instrumento_pago->getid_cuenta_ventas(),$instrumento_pago->getcuenta_contable_compra(),$instrumento_pago->getcuenta_contable_ventas(),$instrumento_pago->getid_cuenta_corriente(), $instrumento_pago->getId(), Funciones::GetRealScapeString($instrumento_pago->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,instrumento_pago $instrumento_pago,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($instrumento_pago->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array(Funciones::GetRealScapeString($instrumento_pago->getcodigo(),$connexion),Funciones::GetRealScapeString($instrumento_pago->getdescripcion(),$connexion),$instrumento_pago->getpredeterminado(),$instrumento_pago->getid_cuenta_compras(),$instrumento_pago->getid_cuenta_ventas(),Funciones::GetRealScapeString($instrumento_pago->getcuenta_contable_compra(),$connexion),Funciones::GetRealScapeString($instrumento_pago->getcuenta_contable_ventas(),$connexion),$instrumento_pago->getid_cuenta_corriente());
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array(Funciones::GetRealScapeString($instrumento_pago->getcodigo(),$connexion),Funciones::GetRealScapeString($instrumento_pago->getdescripcion(),$connexion),$instrumento_pago->getpredeterminado(),$instrumento_pago->getid_cuenta_compras(),$instrumento_pago->getid_cuenta_ventas(),Funciones::GetRealScapeString($instrumento_pago->getcuenta_contable_compra(),$connexion),Funciones::GetRealScapeString($instrumento_pago->getcuenta_contable_ventas(),$connexion),$instrumento_pago->getid_cuenta_corriente(), $instrumento_pago->getId(), Funciones::GetRealScapeString($instrumento_pago->getVersionRow(),$connexion));
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
	
	public function setinstrumento_pago_Original(instrumento_pago $instrumento_pago) {
		$instrumento_pago->setinstrumento_pago_Original(clone $instrumento_pago);		
	}
	
	public function setinstrumento_pagos_Original(array $instrumento_pagos) {
		foreach($instrumento_pagos as $instrumento_pago){
			$instrumento_pago->setinstrumento_pago_Original(clone $instrumento_pago);
		}
	}
	
	public static function setinstrumento_pago_OriginalStatic(instrumento_pago $instrumento_pago) {
		$instrumento_pago->setinstrumento_pago_Original(clone $instrumento_pago);		
	}
	
	public static function setinstrumento_pagos_OriginalStatic(array $instrumento_pagos) {		
		foreach($instrumento_pagos as $instrumento_pago){
			$instrumento_pago->setinstrumento_pago_Original(clone $instrumento_pago);
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
