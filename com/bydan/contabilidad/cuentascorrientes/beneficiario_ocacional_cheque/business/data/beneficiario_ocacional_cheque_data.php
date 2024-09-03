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
namespace com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\business\data;

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

use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\business\entity\beneficiario_ocacional_cheque;

//FK


//REL

use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\business\data\cheque_cuenta_corriente_data;


class beneficiario_ocacional_cheque_data extends GetEntitiesDataAccessHelper implements beneficiario_ocacional_cheque_dataI {		
	/*OJO:SE REDEFINEN BIEN EN CONSTRUCTOR	
	NOMBRES OBJETOS*/
	public static string $SCHEMA='2017_contabilidad0';
	public static string $STR_PREFIJO_TABLE='cco_';
	public static string $TABLE_NAME='cco_beneficiario_ocacional_cheque';			
	public static string $TABLE_NAME_beneficiario_ocacional_cheque='beneficiario_ocacional_cheque';	
	
	/*QUERIES*/
	public static string $QUERY_INSERT='';
	public static string $QUERY_UPDATE='';
	public static string $QUERY_DELETE='';	
	public static string $QUERY_SELECT='';
	
	/*QUERIES AUXILIARES*/
	public static string $QUERY_SELECT_COUNT='';
	public static string $QUERY_SELECT_FOR_FK='';
	
	/*STORE PROCEDURES*/
	public static string $STORE_PROCEDURE_INSERT='call SP_BENEFICIARIO_OCACIONAL_CHEQUE_INSERT(??,?,?,?,?,?,?,?,?,?,?,?)';
	public static string $STORE_PROCEDURE_UPDATE='call SP_BENEFICIARIO_OCACIONAL_CHEQUE_UPDATE(??,?,?,?,?,?,?,?,?,?,? ,? ,?,?)';
	public static string $STORE_PROCEDURE_DELETE='call SP_BENEFICIARIO_OCACIONAL_CHEQUE_DELETE(?,?)';
	public static string $STORE_PROCEDURE_SELECT='call SP_BENEFICIARIO_OCACIONAL_CHEQUE_SELECT(?,?)';
	public static bool $IS_DELETE_CASCADE=true;//false;	
	public static bool $IS_WITH_SCHEMA=false;
	public static bool $IS_WITH_STORE_PROCEDURES=true;
	
	/*PARAMETROS*/
	public bool $isForFKData=false;
	public bool $isForFKDataRels=false;
	
	/*AUXILIAR*/
	//protected $beneficiario_ocacional_cheque_DataAccessAdditional;
	
	function __construct (){
		/*GENERAL*/
		self::$TABLE_NAME=self::$STR_PREFIJO_TABLE.'beneficiario_ocacional_cheque';
		
		beneficiario_ocacional_cheque_data::$SCHEMA=Funciones::getSchemaMySqlFromOwner('CUENTASCORRIENTES');
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->beneficiario_ocacional_cheque_DataAccessAdditional=new beneficiario_ocacional_chequeDataAccessAdditional();*/

		/*QUERIES*/
		self::$QUERY_INSERT='insert into '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'(created_at,updated_at,codigo,nombre,direccion_1,direccion_2,direccion_3,telefono,telefono_movil,email,notas,registro_ocacional,registro_tributario) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\')';
		self::$QUERY_UPDATE='update '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' set created_at=CURRENT_TIMESTAMP,updated_at=CURRENT_TIMESTAMP,codigo=\'%s\',nombre=\'%s\',direccion_1=\'%s\',direccion_2=\'%s\',direccion_3=\'%s\',telefono=\'%s\',telefono_movil=\'%s\',email=\'%s\',notas=\'%s\',registro_ocacional=\'%s\',registro_tributario=\'%s\' where id=%d AND updated_at=\'%s\'';
		self::$QUERY_DELETE='delete from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.' where id=%d';
		self::$QUERY_SELECT='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.direccion_1,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.direccion_2,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.direccion_3,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.telefono,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.telefono_movil,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.email,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.notas,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.registro_ocacional,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.registro_tributario from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_FOR_FK='select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;  //'select , from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		self::$QUERY_SELECT_COUNT='select count(*) as value from '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME;		
		
		/*PARAMETROS*/
		$this->isForFKData=false;
		$this->isForFKDataRels=false;		
	}
	
	/*MANTENIMIENTO*/
	public static function save(beneficiario_ocacional_cheque $beneficiario_ocacional_cheque,Connexion $connexion) {	
		try {
			/*$statement=null;*/
			$strQuerySave='';
			$strQuerySaveComplete='';			
			
			if ($beneficiario_ocacional_cheque->getIsDeleted()) {
				/*$parametersType=ParametersType::$DELETE;*/
				$strQuerySave=beneficiario_ocacional_cheque_data::$QUERY_DELETE;
				$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getId(),$connexion));				
				
			} else if ($beneficiario_ocacional_cheque->getIsChanged()) {
				if($beneficiario_ocacional_cheque->getIsNew()) {
					/*$parametersType=ParametersType::$INSERT;*/
					$strQuerySave=beneficiario_ocacional_cheque_data::$QUERY_INSERT;
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getcodigo(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getnombre(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getdireccion_1(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getdireccion_2(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getdireccion_3(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->gettelefono(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->gettelefono_movil(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getemail(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getnotas(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getregistro_ocacional(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getregistro_tributario(),$connexion) );					
					
					
				} else {
					/*$parametersType=ParametersType::$UPDATE;*/
					$strQuerySave=beneficiario_ocacional_cheque_data::$QUERY_UPDATE;			
					
					
					
					
					
					$strQuerySaveComplete=sprintf($strQuerySave,Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getcodigo(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getnombre(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getdireccion_1(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getdireccion_2(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getdireccion_3(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->gettelefono(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->gettelefono_movil(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getemail(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getnotas(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getregistro_ocacional(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getregistro_tributario(),$connexion), Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getId(),$connexion), Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getVersionRow(),$connexion));
					
				}	
			} 						
			
			if(Constantes::$SQL_CON_PREPARED==false) {
				DataAccessHelper::save($beneficiario_ocacional_cheque, $connexion,$strQuerySaveComplete,beneficiario_ocacional_cheque_data::$TABLE_NAME,beneficiario_ocacional_cheque_data::$IS_WITH_STORE_PROCEDURES);
			} else {
				beneficiario_ocacional_cheque_data::savePrepared($beneficiario_ocacional_cheque, $connexion,$strQuerySave,beneficiario_ocacional_cheque_data::$TABLE_NAME,beneficiario_ocacional_cheque_data::$IS_WITH_STORE_PROCEDURES);
			}
			
			beneficiario_ocacional_cheque_data::setbeneficiario_ocacional_cheque_OriginalStatic($beneficiario_ocacional_cheque);
			
		} catch(Exception $e) {
            throw $e;
        }
	}
	
	public static function savePrepared(beneficiario_ocacional_cheque $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		try  {
			
			if($entity==null) {
				return;
			}					
					
			if ($entity->getIsDeleted()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=str_replace('%d','?',$sQuerySave);
				
				beneficiario_ocacional_cheque_data::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				
			} else if ($entity->getIsChanged()==true) {
				/*QUERY NORMAL A QUERY PREPARED STATEMENT*/
				$sQuerySave=FuncionesSql::getReplaceForPreparedQuery($sQuerySave);
				
				if ($entity->getIsNew()) {
					beneficiario_ocacional_cheque_data::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					
					$entity->setIsNew(false);
					$entity->setIsNewAux(true);
					
				} else {
					beneficiario_ocacional_cheque_data::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
				}
	
				$entity->setIsChanged(false);
			}
	
		} catch(Exception $ex) {
			throw $ex;
		}
	}
	
	public static function insert(beneficiario_ocacional_cheque $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$id=0;
		$prepare_statement=null;
		 
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				 
				if(Constantes::$BIT_ES_POSTGRES==false) {
											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					beneficiario_ocacional_cheque_data::addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement,$con);										
					
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
	
	public static function update(beneficiario_ocacional_cheque $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
	
			$mysql=$con->getConnection()->getMysqLink();
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
					
				if(Constantes::$BIT_ES_POSTGRES==false) {											
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
								
					beneficiario_ocacional_cheque_data::addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement,$con);										
					
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
	
	public static function delete(beneficiario_ocacional_cheque $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		$numeroRegistroModificado=0;
		$prepare_statement=null;
	
		try {
			 
			$mysql=$con->getConnection()->getMysqLink();
	
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {										
					$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	
					beneficiario_ocacional_cheque_data::addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement,$con);										
					
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
	public function getEntity(Connexion $connexion, ?int $id) : ?beneficiario_ocacional_cheque {		
		$entity = new beneficiario_ocacional_cheque();		
		$strQuerySelect='';
		$strQuerySelectFinal='';
		
        try {
			
			if(!$this->isForFKData) {
				$strQuerySelect=beneficiario_ocacional_cheque_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=beneficiario_ocacional_cheque_data::$QUERY_SELECT_FOR_FK;
			}
			
			if($id==null || $id=='') {
				$id=0;	
			}
			
			$strQuerySelectFinal=$strQuerySelect.' WHERE id='.$id;
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($strQuerySelectFinal);
            }
			
			$result = $connexion->ejecutarQuery($strQuerySelectFinal);//CuentasCorrientes.beneficiario_ocacional_cheque.isActive=1 AND 
      	    
			$resultSet =Connexion::getResultSet($result);
      	    
			if($resultSet) {				
				$entity->setbeneficiario_ocacional_cheque_Original(new beneficiario_ocacional_cheque());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,beneficiario_ocacional_cheque_data::$IS_WITH_SCHEMA);         	    
				/*$entity=beneficiario_ocacional_cheque_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet); 
				
				//$entity->setbeneficiario_ocacional_cheque_Original(parent::getEntityPrefijoEntityResult("",$entity->getbeneficiario_ocacional_cheque_Original(),$resultSet,beneficiario_ocacional_cheque_data::$IS_WITH_SCHEMA));         						
      	    	////$entity->setbeneficiario_ocacional_cheque_Original(beneficiario_ocacional_cheque_data::getEntityBaseResult("",$entity->getbeneficiario_ocacional_cheque_Original(),$resultSet));
				//$entity->setbeneficiario_ocacional_cheque_Original($this->getEntityBaseResult("",$entity->getbeneficiario_ocacional_cheque_Original(),$resultSet));
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
	  
	public function getEntityConnexionWhereSelect(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : ?beneficiario_ocacional_cheque {
		$entity = new beneficiario_ocacional_cheque();		
		
        try {
      	    $sQuery='';
      	    $strQuerySelect='';
			
			if(!$this->isForFKData) {
				$strQuerySelect=beneficiario_ocacional_cheque_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=beneficiario_ocacional_cheque_data::$QUERY_SELECT_FOR_FK;
			}
						
      	    $sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,beneficiario_ocacional_cheque_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
      	  	$result = $connexion->ejecutarQuery($sQuery);//" WHERE ".CuentasCorrientes.beneficiario_ocacional_cheque.isActive=1
        	
			$resultSet =Connexion::getResultSet($result);
			
			if($resultSet) {				
				$entity->setbeneficiario_ocacional_cheque_Original(new beneficiario_ocacional_cheque());
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,beneficiario_ocacional_cheque_data::$IS_WITH_SCHEMA);         	    
				/*$entity=beneficiario_ocacional_cheque_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);    
				
				//$entity->setbeneficiario_ocacional_cheque_Original(parent::getEntityPrefijoEntityResult("",$entity->getbeneficiario_ocacional_cheque_Original(),$resultSet,beneficiario_ocacional_cheque_data::$IS_WITH_SCHEMA));         		
				////$entity->setbeneficiario_ocacional_cheque_Original(beneficiario_ocacional_cheque_data::getEntityBaseResult("",$entity->getbeneficiario_ocacional_cheque_Original(),$resultSet));
				//$entity->setbeneficiario_ocacional_cheque_Original($this->getEntityBaseResult("",$entity->getbeneficiario_ocacional_cheque_Original(),$resultSet));
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
		$entity = new beneficiario_ocacional_cheque();		  
		$sQuery='';
		$strQuerySelect='';
		
        try {     	   
        	
			if(!$this->isForFKData) {
				$strQuerySelect=beneficiario_ocacional_cheque_data::$QUERY_SELECT;
			} else {
				$strQuerySelect=beneficiario_ocacional_cheque_data::$QUERY_SELECT_FOR_FK;
			}
			
			$sQuery=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,beneficiario_ocacional_cheque_data::$TABLE_NAME.".",$queryWhereSelectParameters,$strQuerySelect);
			
			if(Constantes::$IS_DEVELOPING_SQL)  {
            	Funciones::mostrarMensajeDeveloping($sQuery);
            }
			
			$result = $connexion->ejecutarQuery($sQuery);
        	
			$resultSet =Connexion::getResultSet($result);
			
			$i=1;
			
      	    while ($resultSet) {
      	    	$entity = new beneficiario_ocacional_cheque();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,beneficiario_ocacional_cheque_data::$IS_WITH_SCHEMA);         		
				/*$entity=beneficiario_ocacional_cheque_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setbeneficiario_ocacional_cheque_Original( new beneficiario_ocacional_cheque());
				
				//$entity->setbeneficiario_ocacional_cheque_Original(parent::getEntityPrefijoEntityResult("",$entity->getbeneficiario_ocacional_cheque_Original(),$resultSet,beneficiario_ocacional_cheque_data::$IS_WITH_SCHEMA));         		
				////$entity->setbeneficiario_ocacional_cheque_Original(beneficiario_ocacional_cheque_data::getEntityBaseResult("",$entity->getbeneficiario_ocacional_cheque_Original(),$resultSet));
				//$entity->setbeneficiario_ocacional_cheque_Original($this->getEntityBaseResult("",$entity->getbeneficiario_ocacional_cheque_Original(),$resultSet));
								
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
		$entity = new beneficiario_ocacional_cheque();		  
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
      	    	$entity = new beneficiario_ocacional_cheque();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,beneficiario_ocacional_cheque_data::$IS_WITH_SCHEMA);         		
				/*$entity=beneficiario_ocacional_cheque_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setbeneficiario_ocacional_cheque_Original( new beneficiario_ocacional_cheque());
				
				//$entity->setbeneficiario_ocacional_cheque_Original(parent::getEntityPrefijoEntityResult("",$entity->getbeneficiario_ocacional_cheque_Original(),$resultSet,beneficiario_ocacional_cheque_data::$IS_WITH_SCHEMA));         		
				////$entity->setbeneficiario_ocacional_cheque_Original(beneficiario_ocacional_cheque_data::getEntityBaseResult("",$entity->getbeneficiario_ocacional_cheque_Original(),$resultSet));
				//$entity->setbeneficiario_ocacional_cheque_Original($this->getEntityBaseResult("",$entity->getbeneficiario_ocacional_cheque_Original(),$resultSet));
				
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
		$entity = new beneficiario_ocacional_cheque();		  
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
      	    	$entity = new beneficiario_ocacional_cheque();
				
				$entity->i=$i;
				
				$entity=parent::getEntityPrefijoEntityResult("",$entity,$resultSet,beneficiario_ocacional_cheque_data::$IS_WITH_SCHEMA);         		
				/*$entity=beneficiario_ocacional_cheque_data::getEntityBaseResult("",$entity,$resultSet);*/
				$entity=$this->getEntityBaseResult("",$entity,$resultSet);
      	    	
				//$entity->setbeneficiario_ocacional_cheque_Original( new beneficiario_ocacional_cheque());				
				//$entity->setbeneficiario_ocacional_cheque_Original(parent::getEntityPrefijoEntityResult("",$entity->getbeneficiario_ocacional_cheque_Original(),$resultSet,beneficiario_ocacional_cheque_data::$IS_WITH_SCHEMA));         		
				
      	    	////$entity->setbeneficiario_ocacional_cheque_Original(beneficiario_ocacional_cheque_data::getEntityBaseResult("",$entity->getbeneficiario_ocacional_cheque_Original(),$resultSet));
				//$entity->setbeneficiario_ocacional_cheque_Original($this->getEntityBaseResult("",$entity->getbeneficiario_ocacional_cheque_Original(),$resultSet));
				
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
		
		$sQueryExecuteValor=beneficiario_ocacional_cheque_data::$QUERY_SELECT_COUNT;
		
		$count=$this->executeQueryValor($connexion, $sQueryExecuteValor,'value');
		
		return $count;
	}
	
	public function setCountSelect(QueryWhereSelectParameters $queryWhereSelectParameters,beneficiario_ocacional_cheque $entity,Connexion $connexion) {
		$sQueryCount='';
		$queryWhereSelectParametersCount=null;
		$paginationAux=new Pagination();
		
		$paginationAux=$queryWhereSelectParameters->getPagination();
				
		$queryWhereSelectParametersCount=$queryWhereSelectParameters;			
		$queryWhereSelectParametersCount->setPagination(new Pagination());
		
		$sQueryCount=DataAccessHelper::buildSqlGeneralGetEntitiesEntityTableNameQueryWhere($entity,beneficiario_ocacional_cheque_data::$TABLE_NAME.'.',$queryWhereSelectParametersCount,beneficiario_ocacional_cheque_data::$QUERY_SELECT_COUNT);
				
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
	
	
	/*-------------------------- TRAER RELACIONES --------------------------*/
	
	public function  getcheque_cuenta_corrientes(Connexion $connexion,beneficiario_ocacional_cheque $beneficiario_ocacional_cheque) : array {

		$chequecuentacorrientes=array();

		try {
			$strFinalQuery=" INNER JOIN ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME."  ON ".Constantes::$STR_PREFIJO_SCHEMA.cheque_cuenta_corriente_data::$SCHEMA.".".cheque_cuenta_corriente_data::$TABLE_NAME.".id_beneficiario_ocacional_cheque=".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id WHERE ".Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.".".self::$TABLE_NAME.".id=".$beneficiario_ocacional_cheque->getId();

			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setFinalQuery($strFinalQuery);

			$chequecuentacorrienteDataAccess=new cheque_cuenta_corriente_data();

			$chequecuentacorrientes=$chequecuentacorrienteDataAccess->getEntities($connexion,$queryWhereSelectParameters);

		} catch(Exception $e) {
			throw $e;
		}

		return $chequecuentacorrientes;
	}


	
	/*-------------------------------- AUXILIARES --------------------------------*/
	
	public function getEntityBaseResult(string $strPrefijo,beneficiario_ocacional_cheque $entity,$resultSet) : beneficiario_ocacional_cheque {
        try {     	
			if(!$this->isForFKData) {
				$entity->setcodigo(utf8_encode($resultSet[$strPrefijo.'codigo']));
				$entity->setnombre(utf8_encode($resultSet[$strPrefijo.'nombre']));
				$entity->setdireccion_1(utf8_encode($resultSet[$strPrefijo.'direccion_1']));
				$entity->setdireccion_2(utf8_encode($resultSet[$strPrefijo.'direccion_2']));
				$entity->setdireccion_3(utf8_encode($resultSet[$strPrefijo.'direccion_3']));
				$entity->settelefono(utf8_encode($resultSet[$strPrefijo.'telefono']));
				$entity->settelefono_movil(utf8_encode($resultSet[$strPrefijo.'telefono_movil']));
				$entity->setemail(utf8_encode($resultSet[$strPrefijo.'email']));
				$entity->setnotas(utf8_encode($resultSet[$strPrefijo.'notas']));
				$entity->setregistro_ocacional(utf8_encode($resultSet[$strPrefijo.'registro_ocacional']));
				$entity->setregistro_tributario(utf8_encode($resultSet[$strPrefijo.'registro_tributario']));
			} else {
				$entity->setnombre(utf8_encode($resultSet[$strPrefijo.'nombre']));								
			}
      	} catch(Exception $e) {
			throw $e;
      	}
		
    	return $entity;	
    }
	
	public static function addPrepareStatementParams(string $type,beneficiario_ocacional_cheque $beneficiario_ocacional_cheque,$prepare_statement,Connexion $connexion) {
		if($type==ParametersType::$DELETE) {
			mysqli_stmt_bind_param($prepare_statement, 'd', $beneficiario_ocacional_cheque->getId());
			
		} else if($type==ParametersType::$INSERT) {
			mysqli_stmt_bind_param($prepare_statement, 'sssssssssss', $beneficiario_ocacional_cheque->getcodigo(),$beneficiario_ocacional_cheque->getnombre(),$beneficiario_ocacional_cheque->getdireccion_1(),$beneficiario_ocacional_cheque->getdireccion_2(),$beneficiario_ocacional_cheque->getdireccion_3(),$beneficiario_ocacional_cheque->gettelefono(),$beneficiario_ocacional_cheque->gettelefono_movil(),$beneficiario_ocacional_cheque->getemail(),$beneficiario_ocacional_cheque->getnotas(),$beneficiario_ocacional_cheque->getregistro_ocacional(),$beneficiario_ocacional_cheque->getregistro_tributario());
			
		} else if($type==ParametersType::$UPDATE) {
			mysqli_stmt_bind_param($prepare_statement, 'sssssssssssis', $beneficiario_ocacional_cheque->getcodigo(),$beneficiario_ocacional_cheque->getnombre(),$beneficiario_ocacional_cheque->getdireccion_1(),$beneficiario_ocacional_cheque->getdireccion_2(),$beneficiario_ocacional_cheque->getdireccion_3(),$beneficiario_ocacional_cheque->gettelefono(),$beneficiario_ocacional_cheque->gettelefono_movil(),$beneficiario_ocacional_cheque->getemail(),$beneficiario_ocacional_cheque->getnotas(),$beneficiario_ocacional_cheque->getregistro_ocacional(),$beneficiario_ocacional_cheque->getregistro_tributario(), $beneficiario_ocacional_cheque->getId(), Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getVersionRow(),$connexion));
		}
	}
	
	public static function getPrepareStatementParamsArray(string $type,beneficiario_ocacional_cheque $beneficiario_ocacional_cheque,$prepare_statement,Connexion $connexion) : array {
		$params=array();
		
		if($type==ParametersType::$DELETE) {
			$params=array($beneficiario_ocacional_cheque->getId());
			
		} else if($type==ParametersType::$INSERT) {
			$params= array(Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getcodigo(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getnombre(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getdireccion_1(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getdireccion_2(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getdireccion_3(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->gettelefono(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->gettelefono_movil(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getemail(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getnotas(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getregistro_ocacional(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getregistro_tributario(),$connexion));
			
		} else if($type==ParametersType::$UPDATE) {
			$params= array(Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getcodigo(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getnombre(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getdireccion_1(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getdireccion_2(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getdireccion_3(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->gettelefono(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->gettelefono_movil(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getemail(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getnotas(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getregistro_ocacional(),$connexion),Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getregistro_tributario(),$connexion), $beneficiario_ocacional_cheque->getId(), Funciones::GetRealScapeString($beneficiario_ocacional_cheque->getVersionRow(),$connexion));
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
	
	public function setbeneficiario_ocacional_cheque_Original(beneficiario_ocacional_cheque $beneficiario_ocacional_cheque) {
		$beneficiario_ocacional_cheque->setbeneficiario_ocacional_cheque_Original(clone $beneficiario_ocacional_cheque);		
	}
	
	public function setbeneficiario_ocacional_cheques_Original(array $beneficiario_ocacional_cheques) {
		foreach($beneficiario_ocacional_cheques as $beneficiario_ocacional_cheque){
			$beneficiario_ocacional_cheque->setbeneficiario_ocacional_cheque_Original(clone $beneficiario_ocacional_cheque);
		}
	}
	
	public static function setbeneficiario_ocacional_cheque_OriginalStatic(beneficiario_ocacional_cheque $beneficiario_ocacional_cheque) {
		$beneficiario_ocacional_cheque->setbeneficiario_ocacional_cheque_Original(clone $beneficiario_ocacional_cheque);		
	}
	
	public static function setbeneficiario_ocacional_cheques_OriginalStatic(array $beneficiario_ocacional_cheques) {		
		foreach($beneficiario_ocacional_cheques as $beneficiario_ocacional_cheque){
			$beneficiario_ocacional_cheque->setbeneficiario_ocacional_cheque_Original(clone $beneficiario_ocacional_cheque);
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
