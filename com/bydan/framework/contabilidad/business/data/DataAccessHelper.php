<?php  declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\business\data;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\DataType;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\ParameterType;
use com\bydan\framework\contabilidad\business\logic\QueryWhereSelectParameters;
use com\bydan\framework\contabilidad\business\entity\GeneralEntity;
use com\bydan\framework\contabilidad\util\Connexion;
use com\bydan\framework\contabilidad\util\ParameterMaintenance;
use com\bydan\framework\contabilidad\business\entity\DatoGeneralMinimo;
use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\DatoGeneral;
use com\bydan\framework\contabilidad\business\entity\DatoGeneralMaximo;

class DataAccessHelper {

	public static function getColumnNameId():string {
		return ConstantesSql::$ID;
	}
	
	public static function getColumnNameIsActive() :string {
		return ConstantesSql::$ISACTIVE;
	}
	
	public static function getColumnNameIsExpired():string {
		return ConstantesSql::$ISEXPIRED;
	}
	
	public static function getColumnNameVersionRow() :string {
		return ConstantesSql::$VERSIONROW;
	}
	
	public  static function buildSqlGeneralGetEntitiesEntityQueryWhereSelect(GeneralEntity $entity,QueryWhereSelectParameters $queryWhereSelectParameters,string $strSelectQuery):string {
        $query="";
        
        try {
        	
        	if(strpos($queryWhereSelectParameters->getFinalQuery(),ConstantesSql::$INNERJOIN)==true) {
        		$query=$strSelectQuery.$queryWhereSelectParameters->getFinalQuery();  			  			
			} else {
				$query=$strSelectQuery;
			}
						
			if($queryWhereSelectParameters->getQueryWhereSelectParameters()!="") {
        		$query=$query.' '.ConstantesSql::$WHERE.' '.$queryWhereSelectParameters->getQueryWhereSelectParameters();				
			}
						
			if(strpos($queryWhereSelectParameters->getFinalQuery(),ConstantesSql::$INNERJOIN)==false) {
				$query= $queryWhereSelectParameters->getInitialQuery().$query.$queryWhereSelectParameters->getFinalQuery();
			}
    	} catch(Exception $ex) {
            throw $ex;
        }
        
        return $query;
    }
	
    public  static function buildSqlGeneralGetEntitiesEntityQueryWhere(GeneralEntity $entity,QueryWhereSelectParameters $queryWhereSelectParameters):string {
        $query="";
        
         try {
        	
        	if(strpos($queryWhereSelectParameters->getFinalQuery(),ConstantesSql::$INNERJOIN)==true) {
        		$query=$entity->getQuerySelect().$queryWhereSelectParameters->getFinalQuery();  			
			} else {
				$query=$entity->getQuerySelect();
			}
						
			if($queryWhereSelectParameters->getQueryWhereSelectParameters()!="") {
        		$query=$query.' '.ConstantesSql::$WHERE.' '.$queryWhereSelectParameters->getQueryWhereSelectParameters();
        	}
			
			if(strpos($queryWhereSelectParameters->getFinalQuery(),ConstantesSql::$INNERJOIN)==false) {
				$query=$queryWhereSelectParameters->getInitialQuery().$query.$queryWhereSelectParameters->getFinalQuery();
			}    	 	 
	      } catch(Exception $ex) {
	          throw $ex;
	      }
      	  
	      return $query;
    }
	
    public  static function buildSqlGeneralGetEntitiesCompuesto(QueryWhereSelectParameters $queryWhereSelectParameters):string {
        $query="";
        
        try {
        	
        	if($queryWhereSelectParameters->getQueryWhereSelectParameters()!="") {
        		$query=$query.' '.ConstantesSql::$WHERE.' '.$queryWhereSelectParameters->getQueryWhereSelectParameters();								
        	} else {
				if(strpos($queryWhereSelectParameters->getFinalQuery(),ConstantesSql::$ID.'<')==true || strpos($queryWhereSelectParameters->getFinalQuery(),ConstantesSql::$ID.'>')==true) {
					$query=$query.' '.ConstantesSql::$WHERE.' ';
				}
			}        	       	       	
    	} catch(Exception $ex) {
            throw $ex;
        }
        
        return $query;
    }
	
    public  static function buildSqlGeneralGetEntitiesEntityTableNameQueryWhere(GeneralEntity $entity,string $strTableName,QueryWhereSelectParameters $queryWhereSelectParameters,string $strTableSelect):string {
        $query="";
        
        try {
        	
        	if(strpos($queryWhereSelectParameters->getFinalQuery(),ConstantesSql::$INNERJOIN)==true) {
        		$query=$strTableSelect.$queryWhereSelectParameters->getFinalQuery();  			
			} else {
				$query=$strTableSelect;
			}
						
			if($queryWhereSelectParameters->getQueryWhereSelectParameters()!="") {
        		$query=$query.' '.ConstantesSql::$WHERE.' '.$queryWhereSelectParameters->getQueryWhereSelectParameters();
        	}
			
			if(!(strpos($queryWhereSelectParameters->getFinalQuery(),ConstantesSql::$INNERJOIN)==true)) {
				$query= $queryWhereSelectParameters->getInitialQuery().$query.$queryWhereSelectParameters->getFinalQueryValidate($query);
			}    	    	 
	      } catch(Exception $ex) {
	          throw $ex;
	      }
        return $query;
    }
	
    public  static function buildSqlGeneralGetEntitiesEntityQueryWhereSelectQuery(GeneralEntity $entity,QueryWhereSelectParameters $queryWhereSelectParameters,string $querySelect,string $query) :string{
        
        try {
        	
        	$query=$querySelect;
        	
        	if($queryWhereSelectParameters->getQueryWhereSelectParameters()!="") {
        		$query=$query.' '.ConstantesSql::$WHERE.' '.$queryWhereSelectParameters->getQueryWhereSelectParameters();
        	}
			
			if(strpos($queryWhereSelectParameters->getFinalQuery(),ConstantesSql::$INNERJOIN)==false) {
				$query= $queryWhereSelectParameters->getInitialQuery().$query.$queryWhereSelectParameters->getFinalQueryValidate($query);
			}
	    } catch(Exception $ex) {
	    		throw $ex;
	    }
      
      	return $query;
    }
	
    public  static function buildSqlGeneralGetEntitiesSimpleQueryBuild(QueryWhereSelectParameters $queryWhereSelectParameters,string $strSelectQuery):string {
        $query="";
        
        try  {        	
        	$query=$strSelectQuery.$queryWhereSelectParameters->getFinalQuery();  			
								
			if($queryWhereSelectParameters->getQueryWhereSelectParameters()!="") {
        		$query=$query.' '.ConstantesSql::$WHERE.' '.$queryWhereSelectParameters->getQueryWhereSelectParameters();
				
				if(strpos($queryWhereSelectParameters->getFinalQuery(),ConstantesSql::$ID.'<')==true|| strpos($queryWhereSelectParameters->getFinalQuery(),ConstantesSql::$WHERE.'>')==true) {
					$query=$queryWhereSelectParameters->getFinalQuery();
				}
        	}
						
			if(strpos($queryWhereSelectParameters->getFinalQuery(),"OID<")==true) {
				$queryWhereSelectParameters->setInitialQuery(' '.ConstantesSql::$SELECT.' * '.' '.ConstantesSql::$FROM.'  ( ');
				$queryWhereSelectParameters->setFinalQuery($queryWhereSelectParameters->getFinalQuery().' ) T  '.ConstantesSql::$ORDER.' '.ConstantesSql::$BY.'   '.ConstantesSql::$ID.'  '.ConstantesSql::$ASC.' ');
				$query= $queryWhereSelectParameters->getInitialQuery().$query.$queryWhereSelectParameters->getFinalQuery();
			}										
    	} catch(Exception $ex) {
            throw $ex;
        }
        
        return $query;
    }
	
	public  static function ejecutarSql(string $sql,Connexion $con):bool {
        $ejecutado= true;
        
        try {
			/*
    	    $stmt = $con->getConnection()->createStatement();
    	    $ejecutado= $stmt->execute($sql);
    	       	    
    	    $stmt->close();
			*/

    	} catch(Exception $ex) {
	       throw $ex;
	    }
	    
        return !$ejecutado;
    }
    
	public static function save(GeneralEntity $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {		
		//,$parametersMaintenance
		 try  {		
			 if($entity==null) {
				 return;
			 }
			 
			 if ($entity->getIsDeleted()==true) {
				 //if ($entity->getIsExpired()) {
					 
				 	 //$entity->buildParametersMaintenance($con->getDbType(),ParametersType::DELETE);			 			
					 DataAccessHelper::delete($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
		         /*} else {
					 $entity->setIsActive(false);					
					 //$entity->buildParametersMaintenance($con->getDbType(),ParametersType::UPDATE);
		      		 //,$parametersMaintenance	
					 DataAccessHelper::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
					 $entity->setIsChanged( false);
		         }*/
	         } else if ($entity->getIsChanged()==true) {
	             
	             if ($entity->getIsNew()) {
	            	// $entity->buildParametersMaintenance($con->getDbType(),ParametersType::INSERT);
	      			//,$parametersMaintenance
	            	 DataAccessHelper::insert( $entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
	                 $entity->setIsNew(false);
	                 $entity->setIsNewAux(true);
	                 
	             } else {
	            	 //$entity->BuildParametersMaintenance($con->getDbType(),ParametersType::UPDATE);
	      			//,$parametersMaintenance
	                 DataAccessHelper::update($entity,$con,$sQuerySave,$strTableName,$isWithStoreProcedures);
	             }
	
	             $entity->setIsChanged(false);
	             $entity->setIsChangedAux(true);
	         }	         	         
	         
		 } catch(Exception $ex) {
	         throw $ex;
	     }
	}

	private static function delete(GeneralEntity $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {      
		//$pstmt = null;
		//$prepare_statement=null;
		
		$numeroRegistroModificado=0;
		$result=null;		
		
        try {
         
   			$mysql=$con->getConnection()->getMysqLink();
   			
   			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
	   			if(Constantes::$BIT_ES_POSTGRES==false) {
	   				if(Constantes::$PHP_VERSION!='7.0') {
						/*
						if(!mysql_query($sQuerySave,$mysql)) {
							throw new Exception(mysql_error());// or die('Query failed: ' . mysql_error());
						}
						*/
						
	   				} else {
	   					//if(Constantes::$SQL_CONPREPARED==false) {
		   					if(!mysqli_query($mysql,$sQuerySave)) {
		   						throw new Exception(mysqli_error($mysql));// or die('Query failed: ' . mysql_error());
		   					}
		   				
		   				/*	
	   					} else {
	   						$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
	   						
	   						//mysqli_stmt_bind_param($stmt, 'sssd', $code, $language, $official, $percent);
	   						
	   						//AUXILIAR:UNICA FUNCION DE DATAACCESS
	   						//	* Se dana estatica save de xDataAccess y para no crer un new xDataAccess() auxiliar
	   						$entity->addPrepareStatementParams(ParametersType::$DELETE,$entity,$prepare_statement);
	   						
	   						mysqli_stmt_execute($prepare_statement);
	   							   							   						
	   					}
	   					*/
	   				}
	   			} else {
					if(!pg_query($mysql,$sQuerySave)) {
						throw new Exception(pg_errormessage($mysql));// or die('Query failed: ');
					}
				}
		
				if(Constantes::$BIT_ES_POSTGRES==false) {
					if(Constantes::$PHP_VERSION!='7.0') {
	        			//$numeroRegistroModificado=mysql_affected_rows();

					} else {
						//if(Constantes::$SQL_CONPREPARED==false) {
							$numeroRegistroModificado=mysqli_affected_rows($mysql);
						
						/*	
						} else {
							$numeroRegistroModificado=mysqli_stmt_affected_rows($prepare_statement);
							
							mysqli_stmt_close($prepare_statement);
						}
						*/
					}
	        	} else {
	        		$numeroRegistroModificado=pg_affected_rows($result);
	        	}
	        	
		        if($numeroRegistroModificado==0) {
		        	throw new Exception("No se actualizo los datos,intentelo nuevamente");		
		        }
		        
   			} else {
   				Funciones::writeQueryFile($sQuerySave);
   			}
   			   
        	//CON JAVAANTERIORMENTE
        	/*
            $pstmt = $con->getConnection()->prepareStatement($entity->getQueryDelete());        
            $pstmt->setLong(1, $entity->getId());
                                  	
            $numeroRegistroModificado=$pstmt->executeUpdate();
            
	        if($numeroRegistroModificado->equals(0)) {
	        	throw new Exception("No se actualizo los datos,intentelo nuevamente");		
	        }     
	        */
        	
        	// CON MYSLQI
        	/*
        	$statement=$con->getConnection()->getMysqLink()->prepare($sQuerySave);
			
			$statement->bind_param("i", $entity->getId()); 
			
        	
        	$statement->execute(); 
        	
        	$numeroRegistroModificado=$statement->affected_rows;
            
	        if($numeroRegistroModificado==0) {
	        	throw new Exception("No se actualizo los datos,intentelo nuevamente");		
	        }  
        	
        	
        	$statement->close();
        	*/
        	
        	
        	
        } catch(Exception $ex) {
            throw $ex;
        }
        /*
        finally 
        {
            if ($pstmt != null)
            { 
            	$pstmt.close();
            }
        }
        */
    }
	
	private static function insert(GeneralEntity $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
    	//,$parametersMaintenance
		//$pstmt = null;
		//$prepare_statement=null;
		
    	$numeroRegistroModificado=0;
    	$id=0;    	
    	
    	try {
    	    
    	    //Funciones::mostrarMensajeDeveloping($sQuerySave);
    	    
    		$mysql=$con->getConnection()->getMysqLink();
    		$result=null;
    		
    		if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
    			
	    		if(Constantes::$BIT_ES_POSTGRES==false) {
	    		    
	    		    if(Constantes::$IS_DEVELOPING_SQL) {
	    		        Funciones::writeQueryChangeFile($sQuerySave);
	    		    }
	    		    
	    			if(Constantes::$PHP_VERSION!='7.0') {
						/*
						if(!mysql_query($sQuerySave,$mysql)) {
							throw new Exception(mysql_error());// or die('Query failed: ' . mysql_error());
						}
						*/

	    			} else {
	    				//if(Constantes::$SQL_CONPREPARED==false) {
		    				if(!mysqli_query($mysql,$sQuerySave)) {
		    					throw new Exception(mysqli_error($mysql));// or die('Query failed: ' . mysql_error());
		    				}
		    			/*
	    				} else {
		    				$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
		    				
		    				//mysqli_stmt_bind_param($stmt, 'sssd', $code, $language, $official, $percent);
		    				
		    				//AUXILIAR:UNICA FUNCION DE DATAACCESS
		    				//	* Se dana estatica save de xDataAccess y para no crer un new xDataAccess() auxiliar
		    				$entity->addPrepareStatementParams(ParametersType::$INSERT,$entity,$prepare_statement);
		    				
		    				mysqli_stmt_execute($prepare_statement);		    				
		    			}
		    			*/
	    			}
	    		} else {
	    			if(!pg_query($mysql,$sQuerySave)) {
	    				throw new Exception(pg_errormessage($mysql));// or die('Query failed: ');
	    			}
	    		}
				
				if(Constantes::$BIT_ES_POSTGRES==false) {	
					if(Constantes::$PHP_VERSION!='7.0') {
						//$numeroRegistroModificado=mysql_affected_rows();

					} else {
						//if(Constantes::$SQL_CONPREPARED==false) {
							$numeroRegistroModificado=mysqli_affected_rows($mysql);
						
						/*
						} else {
							$numeroRegistroModificado=mysqli_stmt_affected_rows($prepare_statement);
									
							mysqli_stmt_close($prepare_statement);
						}
						*/
					}
				} else {
					$numeroRegistroModificado=pg_affected_rows($result);
				}
				
		        if($numeroRegistroModificado==0) {
		        	throw new Exception("No se actualizo los datos,intentelo nuevamente");		
		        } 
		        
		        if(Constantes::$BIT_ES_POSTGRES==false) {	
		        	if($entity->getIsWithIdentity()) {
		        		if(Constantes::$PHP_VERSION!='7.0') {							
							//$id=mysql_insert_id();
							
		        		} else {
		        			//if(Constantes::$SQL_CONPREPARED==false) {
		        				$id=mysqli_insert_id($mysql);
		        			
		        			/*
		        			} else {
		        				$id=mysqli_stmt_insert_id($prepare_statement);
		        			}
		        			*/
		        		}
		        	}
		        } else {
		        	if($entity->getIsWithIdentity()) {
			        	$insert_query = pg_query("SELECT lastval();");
						$insert_row = pg_fetch_row($insert_query);
						$id = $insert_row[0];
		        	}
		        }
		        
		        if($entity->getIsWithIdentity()) {
	        		$entity->setId($id);
		        }
    		} else {
   				Funciones::writeQueryFile($sQuerySave);
   			}
   			
    		//ANTERIOR CON JAVA
    		/*
    		$pstmt = $con->getConnection()->prepareStatement($entity->getQueryInsert());
    		
    		
    		foreach($parametersMaintenance as $parameter) {
    			if($parametersMaintenance->getDbType()->equals(ParameterDbType::MYSQL)) {
    				$this->addMYSQLParameter($con,$pstmt,$parameter);
    			}   		
    		}
    		
    		
    		$numeroRegistroModificado=$pstmt->executeUpdate();
    		
    		if($numeroRegistroModificado->equals(0)) {
    			throw new Exception("No se actualizo los datos,intentelo nuevamente");		
    		}
    		
    		//$entity->setParametersMaintenance(new ParametersMaintenance());
    		//$entity->setOrder(1);
    		
    		$pstmt = $con->getConnection()->prepareStatement("select LAST_INSERT_ID();");
    		$rs =$pstmt->executeQuery();
    		   		   
       	    while ($rs->next()) {       		
       	    	$id=$rs->getLong("LAST_INSERT_ID()");      	    	
       	    }
       	    
       	    $entity->setId($id);
       	    
       	    */
    		
    		// CON MYSLQI
    		/*
    		$statement->execute(); 
        	
    		$numeroRegistroModificado=$statement->affected_rows;
            
	        if($numeroRegistroModificado==0) {
	        	throw new Exception("No se actualizo los datos,intentelo nuevamente");		
	        } 
	            
	        $id=mysql_insert_id();
    		
        	$statement->close();
        	
        	
        	$entity->setId($id);
       	   */
    		
    	} catch(Exception $ex) {
             throw $ex;
        }
        /*
    	finally 
    	{
    		if ($pstmt != null)
    		{ 
    			$pstmt->close();
    		}
    	}   
    	*/ 		
    }
      
	private static function update(GeneralEntity $entity,Connexion $con,string $sQuerySave,string $strTableName,bool $isWithStoreProcedures) {
		//,$parametersMaintenance
		//$pstmt = null;
		//$prepare_statement=null;
		
		$numeroRegistroModificado=0;
		$result=null;		
		
		try {
		
			$mysql=$con->getConnection()->getMysqLink();
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
							
				if(Constantes::$BIT_ES_POSTGRES==false) {
					if(Constantes::$PHP_VERSION!='7.0') {
						/*
						if(!mysql_query($sQuerySave,$mysql)) {
							throw new Exception(mysql_error());// or die('Query failed: ' . mysql_error());
						}
						*/

					} else {
						//if(Constantes::$SQL_CONPREPARED==false) {
							if(!mysqli_query($mysql,$sQuerySave)) {
								throw new Exception(mysqli_error($mysql));// or die('Query failed: ' . mysql_error());
							}
						/*
						} else {
							$prepare_statement = mysqli_prepare($mysql, $sQuerySave);
							
							//mysqli_stmt_bind_param($stmt, 'sssd', $code, $language, $official, $percent);
							
							//AUXILIAR:UNICA FUNCION DE DATAACCESS
							//	* Se dana estatica save de xDataAccess y para no crer un new xDataAccess() auxiliar
							$entity->addPrepareStatementParams(ParametersType::$UPDATE,$entity,$prepare_statement);
							
							mysqli_stmt_execute($prepare_statement);
						}
						*/
					}
				} else {
					if(!pg_query($mysql,$sQuerySave)) {
						throw new Exception(pg_errormessage($mysql));// or die('Query failed: ');
					}
				}
				
				if(Constantes::$BIT_ES_POSTGRES==false) {	
					if(Constantes::$PHP_VERSION!='7.0') {
						//$numeroRegistroModificado=mysql_affected_rows();

					} else {
						//if(Constantes::$SQL_CONPREPARED==false) {
							$numeroRegistroModificado=mysqli_affected_rows($mysql);
						
						/*
						} else {
							$numeroRegistroModificado=mysqli_stmt_affected_rows($prepare_statement);
									
							mysqli_stmt_close($prepare_statement);
						}
						*/
					}
				} else {
					$numeroRegistroModificado=pg_affected_rows($result);
				}
				
		        if($numeroRegistroModificado<0) {
		        	throw new Exception('No se actualizo los datos,intentelo nuevamente');		
		        } 
		        
			} else {
   				Funciones::writeQueryFile($sQuerySave);
   			}
   			
			//ANTERIOR CON JAVA
			/*
			$pstmt = $con->getConnection()->prepareStatement($entity->getQueryUpdate());
		
			
			foreach($parametersMaintenance as $parameter) {
				if($parametersMaintenance->getDbType()==ParameterDbType::$MYSQL) {
					$this->addMYSQLParameter($con,$pstmt,$parameter);	
				}
			}
			
			
			$numeroRegistroModificado=$pstmt->executeUpdate();
		
			if($numeroRegistroModificado==0) {
				throw new Exception("No se actualizo los datos,intentelo nuevamente");		
			}
			*/
			
			//$entity->setParametersMaintenance(new ParametersMaintenance());
			//$entity->setOrder(1);
			
			// CON MYSLQI
			/*
			$statement->execute(); 
        	
			$numeroRegistroModificado=$statement->affected_rows;
            
	        if($numeroRegistroModificado==0) {
	        	throw new Exception("No se actualizo los datos,intentelo nuevamente");		
	        } 
	        
        	$statement->close();
        	*/
				
		} catch(Exception $ex) {
	        throw $ex;
	    }
	    /*
		finally 
		{
		
			if ($pstmt != null)
			{ 
				$pstmt->close();
			}
		}
		*/
	}
	
	private static function addMYSQLParameter(Connexion $con,$pstmt,ParameterMaintenance $parameterMaintenance) {
	    
		if($parameterMaintenance->getParameterMaintenanceType()==ParameterType::$BOOLEAN) {			
			if($parameterMaintenance->getParameterMaintenanceValue()->getValueObject()!=null) {
				$pstmt->setBoolean($parameterMaintenance->getOrder(), $parameterMaintenance->getParameterMaintenanceValue()->getValueBoolean());
			} else {
				$pstmt->setNull($parameterMaintenance->getOrder(), 0);
			}
						
			return;
		}
		
		if($parameterMaintenance->getParameterMaintenanceType()==ParameterType::$BYTE) {
			if($parameterMaintenance->getParameterMaintenanceValue()->getValueObject()!=null) {
				$pstmt->setByte($parameterMaintenance->getOrder(), $parameterMaintenance->getParameterMaintenanceValue()->getValueByte());
			} else {
				$pstmt->setNull($parameterMaintenance->getOrder(), 0);
			}
						
			return;
		}
		
		if($parameterMaintenance->getParameterMaintenanceType()==ParameterType::$BYTES) {
			if($parameterMaintenance->getParameterMaintenanceValue()->getValueObject()!=null) {
				$pstmt->setBytes($parameterMaintenance->getOrder(), $parameterMaintenance->getParameterMaintenanceValue()->getValuebytes());
			} else {
				$pstmt->setNull($parameterMaintenance->getOrder(), 0);
			}
			
			return;
		}
		
		if($parameterMaintenance->getParameterMaintenanceType()==ParameterType::$DOUBLE) {
			if($parameterMaintenance->getParameterMaintenanceValue()->getValueObject()!=null) {
				$pstmt->setDouble($parameterMaintenance->getOrder(), $parameterMaintenance->getParameterMaintenanceValue()->getValueDouble());
			} else {
				$pstmt->setNull($parameterMaintenance->getOrder(), 0);
			}
			
			return;
		}
			
		if($parameterMaintenance->getParameterMaintenanceType()==ParameterType::$FLOAT) {
			if($parameterMaintenance->getParameterMaintenanceValue()->getValueObject()!=null) {
				$pstmt->setFloat($parameterMaintenance->getOrder(), $parameterMaintenance->getParameterMaintenanceValue()->getValueFloat());
			} else {
				$pstmt->setNull($parameterMaintenance->getOrder(), 0);
			}
			
			return;
		}
		
		if($parameterMaintenance->getParameterMaintenanceType()==ParameterType::$SHORT) {
			if($parameterMaintenance->getParameterMaintenanceValue()->getValueObject()!=null) {
				$pstmt->setShort($parameterMaintenance->getOrder(), $parameterMaintenance->getParameterMaintenanceValue()->getValueShort());
			} else {
				$pstmt->setNull($parameterMaintenance->getOrder(), 0);
			}
			
			return;
		}
		
		if($parameterMaintenance->getParameterMaintenanceType()==ParameterType::$INT) {
			if($parameterMaintenance->getParameterMaintenanceValue()->getValueObject()!=null) {
				$pstmt->setInt($parameterMaintenance->getOrder(), $parameterMaintenance->getParameterMaintenanceValue()->getValueInteger());
			} else {
				$pstmt->setNull($parameterMaintenance->getOrder(), 0);
			}
			
			return;
		}
		
		if($parameterMaintenance->getParameterMaintenanceType()==ParameterType::$LONG) {
			if($parameterMaintenance->getParameterMaintenanceValue()->getValueObject()!=null) {
				$pstmt->setLong($parameterMaintenance->getOrder(), $parameterMaintenance->getParameterMaintenanceValue()->getValueLong());
			} else {
				$pstmt->setNull($parameterMaintenance->getOrder(), 0);
			}
			
			return;
		}
		
		if($parameterMaintenance->getParameterMaintenanceType()==ParameterType::$STRING) {
			if($parameterMaintenance->getParameterMaintenanceValue()->getValueObject()!=null) {
				$pstmt->setString($parameterMaintenance->getOrder(), $parameterMaintenance->getParameterMaintenanceValue()->getValueString());
			} else {
				$pstmt->setNull($parameterMaintenance->getOrder(), 0);
			}
			
			return;
		}
		
		if($parameterMaintenance->getParameterMaintenanceType()==ParameterType::$OBJECT) {
			if($parameterMaintenance->getParameterMaintenanceValue()->getValueObject()!=null) {
				$pstmt->setObject($parameterMaintenance->getOrder(), $parameterMaintenance->getParameterMaintenanceValue()->getValueObject());
			} else {
				$pstmt->setNull($parameterMaintenance->getOrder(), 0);
			}
			
			return;
		}
		
		if($parameterMaintenance->getParameterMaintenanceType()==ParameterType::$DATE) {
			if($parameterMaintenance->getParameterMaintenanceValue()->getValueObject()!=null) {
				$pstmt->setDate($parameterMaintenance->getOrder(),  $parameterMaintenance->getParameterMaintenanceValue()->getValueDate());
			}  else {
				$pstmt->setNull($parameterMaintenance->getOrder(), 0);
			}
			
			return;
		}
		
		if($parameterMaintenance->getParameterMaintenanceType()==ParameterType::$TIME) {
			if($parameterMaintenance->getParameterMaintenanceValue()->getValueObject()!=null) {
				$pstmt->setTime($parameterMaintenance->getOrder(),  $parameterMaintenance->getParameterMaintenanceValue()->getValueTime());
			}  else {
				$pstmt->setNull($parameterMaintenance->getOrder(), 0);
			}
			
			return;
		}
		
		if($parameterMaintenance->getParameterMaintenanceType()==ParameterType::$TIMESTAMP) {
			if($parameterMaintenance->getParameterMaintenanceValue()->getValueObject()!=null) {
				$pstmt->setTimestamp($parameterMaintenance->getOrder(),  $parameterMaintenance->getParameterMaintenanceValue()->getValueTimestamp());
			}  else {
				$pstmt->setNull($parameterMaintenance->getOrder(), 0);
			}
			
			return;
		}
    }
    
    public static function setFieldDynamicDatoGeneralMinimo(DatoGeneralMinimo $datoGeneralMinimo,Classe $classe,$resultSet) {
		$sCampo=$classe->getColumna();
		
		if($classe->clas==DataType::$INTEGER) {
			$datoGeneralMinimo->setiValorInteger($resultSet[$sCampo]);
			$datoGeneralMinimo->NOMBRE_INTEGER=$classe->getColumna();
			
		} else if($classe->clas==DataType::$DOUBLE) {
			$datoGeneralMinimo->setdValorDouble($resultSet[$sCampo]);
			$datoGeneralMinimo->NOMBRE_DOUBLE=$classe->getColumna();
			
		} else if($classe->clas==DataType::$STRING) {
			$datoGeneralMinimo->setsValorString($resultSet[$sCampo]);
			$datoGeneralMinimo->NOMBRE_STRING=$classe->getColumna();
			
		} else if($classe->clas==DataType::$DATE) {
			$datoGeneralMinimo->setDtValorDate($resultSet[$sCampo]);
			$datoGeneralMinimo->NOMBRE_DATE=$classe->getColumna();
			
		} else if($classe->clas==DataType::$LONG) {
			$datoGeneralMinimo->setiValorLong($resultSet[$sCampo]);
			$datoGeneralMinimo->NOMBRE_LONG=$classe->getColumna();
			
		} else if($classe->clas==DataType::$BOOLEAN) {
			$datoGeneralMinimo->setIsValorBoolean($resultSet[$sCampo]);
			$datoGeneralMinimo->NOMBRE_BOOLEAN=$classe->getColumna();
			
		} else if($classe->clas==DataType::$FLOAT) {
			$datoGeneralMinimo->setfValorFloat($resultSet[$sCampo]);
			$datoGeneralMinimo->NOMBRE_FLOAT=$classe->getColumna();
			
		} else if($classe->clas==DataType::$SHORT) {
			$datoGeneralMinimo->setShValorShort($resultSet[$sCampo]);
			$datoGeneralMinimo->NOMBRE_SHORT=$classe->getColumna();
			
		} else if($classe->clas==DataType::$BIGDECIMAL) {
			$datoGeneralMinimo->setDbValorBigDecimal($resultSet[$sCampo]);
			$datoGeneralMinimo->NOMBRE_BIGDECIMAL=$classe->getColumna();
			
		} else if($classe->clas==DataType::$TIMESTAMP) {
			$datoGeneralMinimo->setTsValorTimestamp($resultSet[$sCampo]);
			$datoGeneralMinimo->NOMBRE_TIMESTAMP=$classe->getColumna();
			
		} else if($classe->clas==DataType::$TIME) {
			$datoGeneralMinimo->settValorTime($resultSet[$sCampo]);
			$datoGeneralMinimo->NOMBRE_TIME=$classe->getColumna();
			
		} else if($classe->clas==DataType::$BYTE) {
			$datoGeneralMinimo->setbValorByte($resultSet[$sCampo]);
			$datoGeneralMinimo->NOMBRE_BYTE=$classe->getColumna();
			
		} else if($classe->clas==DataType::$READER) {
			//$datoGeneralMinimo->setrValorReader($resultSet[$sCampo]);
			//$datoGeneralMinimo->NOMBRE_READER=$classe->getColumna();
			
		} else {
			//$datoGeneralMinimo->setoValorObject($resultSet[$sCampo]);
		}
	}
	
	public static function setFieldDynamicDatoGeneral(DatoGeneral $datoGeneral,Classe $classe,$resultSet) {
		$sCampo=$classe->getColumna();
		
		if($classe->clas==DataType::$INTEGER) {
			if($classe->getIndice()==0) {$datoGeneral->setiValorInteger($resultSet[$sCampo]);$datoGeneral->NOMBRE_INTEGER=$classe->getColumna();}
			else if($classe->getIndice()==1) {$datoGeneral->setiValorInteger1($resultSet[$sCampo]);$datoGeneral->NOMBRE_INTEGER1=$classe->getColumna();}
			else if($classe->getIndice()==2) {$datoGeneral->setiValorInteger2($resultSet[$sCampo]);$datoGeneral->NOMBRE_INTEGER2=$classe->getColumna();}
			else if($classe->getIndice()==3) {$datoGeneral->setiValorInteger3($resultSet[$sCampo]);$datoGeneral->NOMBRE_INTEGER3=$classe->getColumna();}
			else if($classe->getIndice()==4) {$datoGeneral->setiValorInteger4($resultSet[$sCampo]);$datoGeneral->NOMBRE_INTEGER4=$classe->getColumna();}
			else if($classe->getIndice()==5) {$datoGeneral->setiValorInteger5($resultSet[$sCampo]);$datoGeneral->NOMBRE_INTEGER5=$classe->getColumna();}
						
		} else if($classe->clas==DataType::$DOUBLE) {
			if($classe->getIndice()==0) {$datoGeneral->setdValorDouble($resultSet[$sCampo]);$datoGeneral->NOMBRE_DOUBLE=$classe->getColumna();}
			else if($classe->getIndice()==1) {$datoGeneral->setdValorDouble1($resultSet[$sCampo]);$datoGeneral->NOMBRE_DOUBLE1=$classe->getColumna();}
			else if($classe->getIndice()==2) {$datoGeneral->setdValorDouble2($resultSet[$sCampo]);$datoGeneral->NOMBRE_DOUBLE2=$classe->getColumna();}
			else if($classe->getIndice()==3) {$datoGeneral->setdValorDouble3($resultSet[$sCampo]);$datoGeneral->NOMBRE_DOUBLE3=$classe->getColumna();}
			else if($classe->getIndice()==4) {$datoGeneral->setdValorDouble4($resultSet[$sCampo]);$datoGeneral->NOMBRE_DOUBLE4=$classe->getColumna();}
			else if($classe->getIndice()==5) {$datoGeneral->setdValorDouble5($resultSet[$sCampo]);$datoGeneral->NOMBRE_DOUBLE5=$classe->getColumna();}
					
		} else if($classe->clas==DataType::$STRING) {
			if($classe->getIndice()==0) {$datoGeneral->setsValorString($resultSet[$sCampo]);$datoGeneral->NOMBRE_STRING=$classe->getColumna();}
			else if($classe->getIndice()==1) {$datoGeneral->setsValorString1($resultSet[$sCampo]);$datoGeneral->NOMBRE_STRING1=$classe->getColumna();}
			else if($classe->getIndice()==2) {$datoGeneral->setsValorString2($resultSet[$sCampo]);$datoGeneral->NOMBRE_STRING2=$classe->getColumna();}
			else if($classe->getIndice()==3) {$datoGeneral->setsValorString3($resultSet[$sCampo]);$datoGeneral->NOMBRE_STRING3=$classe->getColumna();}
			else if($classe->getIndice()==4) {$datoGeneral->setsValorString4($resultSet[$sCampo]);$datoGeneral->NOMBRE_STRING4=$classe->getColumna();}
			else if($classe->getIndice()==5) {$datoGeneral->setsValorString5($resultSet[$sCampo]);$datoGeneral->NOMBRE_STRING5=$classe->getColumna();}
					
		} else if($classe->clas==DataType::$DATE) {
			if($classe->getIndice()==0) {$datoGeneral->setDtValorDate($resultSet[$sCampo]);$datoGeneral->NOMBRE_DATE=$classe->getColumna();}
			else if($classe->getIndice()==1) {$datoGeneral->setDtValorDate1($resultSet[$sCampo]);$datoGeneral->NOMBRE_DATE1=$classe->getColumna();}
			else if($classe->getIndice()==2) {$datoGeneral->setDtValorDate2($resultSet[$sCampo]);$datoGeneral->NOMBRE_DATE2=$classe->getColumna();}
			else if($classe->getIndice()==3) {$datoGeneral->setDtValorDate3($resultSet[$sCampo]);$datoGeneral->NOMBRE_DATE3=$classe->getColumna();}
			else if($classe->getIndice()==4) {$datoGeneral->setDtValorDate4($resultSet[$sCampo]);$datoGeneral->NOMBRE_DATE4=$classe->getColumna();}
			else if($classe->getIndice()==5) {$datoGeneral->setDtValorDate5($resultSet[$sCampo]);$datoGeneral->NOMBRE_DATE5=$classe->getColumna();}
						
		} else if($classe->clas==DataType::$LONG) {
			if($classe->getIndice()==0) {$datoGeneral->setiValorLong($resultSet[$sCampo]);$datoGeneral->NOMBRE_LONG=$classe->getColumna();}
			else if($classe->getIndice()==1) {$datoGeneral->setiValorLong1($resultSet[$sCampo]);$datoGeneral->NOMBRE_LONG1=$classe->getColumna();}
			else if($classe->getIndice()==2) {$datoGeneral->setiValorLong2($resultSet[$sCampo]);$datoGeneral->NOMBRE_LONG2=$classe->getColumna();}
			else if($classe->getIndice()==3) {$datoGeneral->setiValorLong3($resultSet[$sCampo]);$datoGeneral->NOMBRE_LONG3=$classe->getColumna();}
			else if($classe->getIndice()==4) {$datoGeneral->setiValorLong4($resultSet[$sCampo]);$datoGeneral->NOMBRE_LONG4=$classe->getColumna();}
			else if($classe->getIndice()==5) {$datoGeneral->setiValorLong5($resultSet[$sCampo]);$datoGeneral->NOMBRE_LONG5=$classe->getColumna();}
						
		} else if($classe->clas==DataType::$BOOLEAN) {
			if($classe->getIndice()==0) {$datoGeneral->setIsValorBoolean($resultSet[$sCampo]);$datoGeneral->NOMBRE_BOOLEAN=$classe->getColumna();}
			else if($classe->getIndice()==1) {$datoGeneral->setIsValorBoolean1($resultSet[$sCampo]);$datoGeneral->NOMBRE_BOOLEAN1=$classe->getColumna();}
			else if($classe->getIndice()==2) {$datoGeneral->setIsValorBoolean2($resultSet[$sCampo]);$datoGeneral->NOMBRE_BOOLEAN2=$classe->getColumna();}
			else if($classe->getIndice()==3) {$datoGeneral->setIsValorBoolean3($resultSet[$sCampo]);$datoGeneral->NOMBRE_BOOLEAN3=$classe->getColumna();}
			else if($classe->getIndice()==4) {$datoGeneral->setIsValorBoolean4($resultSet[$sCampo]);$datoGeneral->NOMBRE_BOOLEAN4=$classe->getColumna();}
			else if($classe->getIndice()==5) {$datoGeneral->setIsValorBoolean5($resultSet[$sCampo]);$datoGeneral->NOMBRE_BOOLEAN5=$classe->getColumna();}
						
		} else if($classe->clas==DataType::$SHORT) {
			//datoGeneralMaximo.setShValorShort($resultSet[$sCampo]);
			
		} else if($classe->clas==DataType::$FLOAT) {
			//datoGeneralMaximo.setfValorFloat($resultSet[$sCampo]);
			
		} else if($classe->clas==DataType::$BIGDECIMAL) {
			//datoGeneralMaximo.setDbValorBigDecimal($resultSet[$sCampo]);
			
		} else if($classe->clas==DataType::$TIMESTAMP) {
			//datoGeneralMaximo.setTsValorTimestamp($resultSet[$sCampo]);
			
		} else if($classe->clas==DataType::$TIME) {
			//datoGeneralMaximo.settValorTime($resultSet[$sCampo]);
			
		} else if($classe->clas==DataType::$BYTE) {
			//datoGeneralMaximo.setbValorByte($resultSet[$sCampo]);
			
		} else if($classe->clas==DataType::$READER) {
			//datoGeneralMaximo.setrValorReader($resultSet[$sCampo]);
			
		} else {
			//datoGeneralMaximo.setoValorObject($resultSet[$sCampo]);
		}
	}
	
	public static function setFieldDynamicDatoGeneralMaximo(DatoGeneralMaximo $datoGeneralMaximo,Classe $classe,$resultSet) {
		$sCampo=$classe->getColumna();
		
		if($classe->clas==DataType::$INTEGER) {
		    
			if($classe->getIndice()==0) {$datoGeneralMaximo->setiValorInteger($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_INTEGER=$classe->getColumna();}
			else if($classe->getIndice()==1) {$datoGeneralMaximo->setiValorInteger1($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_INTEGER1=$classe->getColumna();}
			else if($classe->getIndice()==2) {$datoGeneralMaximo->setiValorInteger2($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_INTEGER2=$classe->getColumna();}
			else if($classe->getIndice()==3) {$datoGeneralMaximo->setiValorInteger3($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_INTEGER3=$classe->getColumna();}
			else if($classe->getIndice()==4) {$datoGeneralMaximo->setiValorInteger4($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_INTEGER4=$classe->getColumna();}
			else if($classe->getIndice()==5) {$datoGeneralMaximo->setiValorInteger5($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_INTEGER5=$classe->getColumna();}
			else if($classe->getIndice()==6) {$datoGeneralMaximo->setiValorInteger6($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_INTEGER6=$classe->getColumna();}
			else if($classe->getIndice()==7) {$datoGeneralMaximo->setiValorInteger7($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_INTEGER7=$classe->getColumna();}
			else if($classe->getIndice()==8) {$datoGeneralMaximo->setiValorInteger8($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_INTEGER8=$classe->getColumna();}
			else if($classe->getIndice()==9) {$datoGeneralMaximo->setiValorInteger9($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_INTEGER9=$classe->getColumna();}
			else if($classe->getIndice()==10) {$datoGeneralMaximo->setiValorInteger10($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_INTEGER10=$classe->getColumna();}
			
		} else if($classe->clas==DataType::$DOUBLE) {
			if($classe->getIndice()==0) {$datoGeneralMaximo->setdValorDouble($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_DOUBLE=$classe->getColumna();}
			else if($classe->getIndice()==1) {$datoGeneralMaximo->setdValorDouble1($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_DOUBLE1=$classe->getColumna();}
			else if($classe->getIndice()==2) {$datoGeneralMaximo->setdValorDouble2($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_DOUBLE2=$classe->getColumna();}
			else if($classe->getIndice()==3) {$datoGeneralMaximo->setdValorDouble3($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_DOUBLE3=$classe->getColumna();}
			else if($classe->getIndice()==4) {$datoGeneralMaximo->setdValorDouble4($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_DOUBLE4=$classe->getColumna();}
			else if($classe->getIndice()==5) {$datoGeneralMaximo->setdValorDouble5($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_DOUBLE5=$classe->getColumna();}
			else if($classe->getIndice()==6) {$datoGeneralMaximo->setdValorDouble6($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_DOUBLE6=$classe->getColumna();}
			else if($classe->getIndice()==7) {$datoGeneralMaximo->setdValorDouble7($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_DOUBLE7=$classe->getColumna();}
			else if($classe->getIndice()==8) {$datoGeneralMaximo->setdValorDouble8($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_DOUBLE8=$classe->getColumna();}
			else if($classe->getIndice()==9) {$datoGeneralMaximo->setdValorDouble9($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_DOUBLE9=$classe->getColumna();}
			else if($classe->getIndice()==10) {$datoGeneralMaximo->setdValorDouble10($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_DOUBLE10=$classe->getColumna();}
			
		} else if($classe->clas==DataType::$STRING) {
			if($classe->getIndice()==0) {$datoGeneralMaximo->setsValorString($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_STRING=$classe->getColumna();}
			else if($classe->getIndice()==1) {$datoGeneralMaximo->setsValorString1($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_STRING1=$classe->getColumna();}
			else if($classe->getIndice()==2) {$datoGeneralMaximo->setsValorString2($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_STRING2=$classe->getColumna();}
			else if($classe->getIndice()==3) {$datoGeneralMaximo->setsValorString3($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_STRING3=$classe->getColumna();}
			else if($classe->getIndice()==4) {$datoGeneralMaximo->setsValorString4($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_STRING4=$classe->getColumna();}
			else if($classe->getIndice()==5) {$datoGeneralMaximo->setsValorString5($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_STRING5=$classe->getColumna();}
			else if($classe->getIndice()==6) {$datoGeneralMaximo->setsValorString6($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_STRING6=$classe->getColumna();}
			else if($classe->getIndice()==7) {$datoGeneralMaximo->setsValorString7($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_STRING7=$classe->getColumna();}
			else if($classe->getIndice()==8) {$datoGeneralMaximo->setsValorString8($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_STRING8=$classe->getColumna();}
			else if($classe->getIndice()==9) {$datoGeneralMaximo->setsValorString9($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_STRING9=$classe->getColumna();}
			else if($classe->getIndice()==10) {$datoGeneralMaximo->setsValorString10($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_STRING10=$classe->getColumna();}
			
		} else if($classe->clas==DataType::$DATE) {
			if($classe->getIndice()==0) {$datoGeneralMaximo->setDtValorDate($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_DATE=$classe->getColumna();}
			else if($classe->getIndice()==1) {$datoGeneralMaximo->setDtValorDate1($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_DATE1=$classe->getColumna();}
			else if($classe->getIndice()==2) {$datoGeneralMaximo->setDtValorDate2($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_DATE2=$classe->getColumna();}
			else if($classe->getIndice()==3) {$datoGeneralMaximo->setDtValorDate3($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_DATE3=$classe->getColumna();}
			else if($classe->getIndice()==4) {$datoGeneralMaximo->setDtValorDate4($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_DATE4=$classe->getColumna();}
			else if($classe->getIndice()==5) {$datoGeneralMaximo->setDtValorDate5($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_DATE5=$classe->getColumna();}
			else if($classe->getIndice()==6) {$datoGeneralMaximo->setDtValorDate6($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_DATE6=$classe->getColumna();}
			else if($classe->getIndice()==7) {$datoGeneralMaximo->setDtValorDate7($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_DATE7=$classe->getColumna();}
			else if($classe->getIndice()==8) {$datoGeneralMaximo->setDtValorDate8($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_DATE8=$classe->getColumna();}
			else if($classe->getIndice()==9) {$datoGeneralMaximo->setDtValorDate9($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_DATE9=$classe->getColumna();}
			else if($classe->getIndice()==10) {$datoGeneralMaximo->setDtValorDate10($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_DATE10=$classe->getColumna();}
			
		} else if($classe->clas==DataType::$LONG) {
			if($classe->getIndice()==0) {$datoGeneralMaximo->setiValorLong($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_LONG=$classe->getColumna();}
			else if($classe->getIndice()==1) {$datoGeneralMaximo->setiValorLong1($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_LONG1=$classe->getColumna();}
			else if($classe->getIndice()==2) {$datoGeneralMaximo->setiValorLong2($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_LONG2=$classe->getColumna();}
			else if($classe->getIndice()==3) {$datoGeneralMaximo->setiValorLong3($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_LONG3=$classe->getColumna();}
			else if($classe->getIndice()==4) {$datoGeneralMaximo->setiValorLong4($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_LONG4=$classe->getColumna();}
			else if($classe->getIndice()==5) {$datoGeneralMaximo->setiValorLong5($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_LONG5=$classe->getColumna();}
			else if($classe->getIndice()==6) {$datoGeneralMaximo->setiValorLong6($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_LONG6=$classe->getColumna();}
			else if($classe->getIndice()==7) {$datoGeneralMaximo->setiValorLong7($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_LONG7=$classe->getColumna();}
			else if($classe->getIndice()==8) {$datoGeneralMaximo->setiValorLong8($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_LONG8=$classe->getColumna();}
			else if($classe->getIndice()==9) {$datoGeneralMaximo->setiValorLong9($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_LONG9=$classe->getColumna();}
			else if($classe->getIndice()==10) {$datoGeneralMaximo->setiValorLong10($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_LONG10=$classe->getColumna();}
			
		} else if($classe->clas==DataType::$BOOLEAN) {
			if($classe->getIndice()==0) {$datoGeneralMaximo->setIsValorBoolean($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_BOOLEAN=$classe->getColumna();}
			else if($classe->getIndice()==1) {$datoGeneralMaximo->setIsValorBoolean1($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_BOOLEAN1=$classe->getColumna();}
			else if($classe->getIndice()==2) {$datoGeneralMaximo->setIsValorBoolean2($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_BOOLEAN2=$classe->getColumna();}
			else if($classe->getIndice()==3) {$datoGeneralMaximo->setIsValorBoolean3($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_BOOLEAN3=$classe->getColumna();}
			else if($classe->getIndice()==4) {$datoGeneralMaximo->setIsValorBoolean4($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_BOOLEAN4=$classe->getColumna();}
			else if($classe->getIndice()==5) {$datoGeneralMaximo->setIsValorBoolean5($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_BOOLEAN5=$classe->getColumna();}
			else if($classe->getIndice()==6) {$datoGeneralMaximo->setIsValorBoolean6($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_BOOLEAN6=$classe->getColumna();}
			else if($classe->getIndice()==7) {$datoGeneralMaximo->setIsValorBoolean7($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_BOOLEAN7=$classe->getColumna();}
			else if($classe->getIndice()==8) {$datoGeneralMaximo->setIsValorBoolean8($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_BOOLEAN8=$classe->getColumna();}
			else if($classe->getIndice()==9) {$datoGeneralMaximo->setIsValorBoolean9($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_BOOLEAN9=$classe->getColumna();}
			else if($classe->getIndice()==10) {$datoGeneralMaximo->setIsValorBoolean10($resultSet[$sCampo]);$datoGeneralMaximo->NOMBRE_BOOLEAN10=$classe->getColumna();}
			
		} else if($classe->clas==DataType::$SHORT) {
			//datoGeneralMaximo.setShValorShort($resultSet[$sCampo]);
			
		} else if($classe->clas==DataType::$FLOAT) {
			//datoGeneralMaximo.setfValorFloat($resultSet[$sCampo]);
			
		} else if($classe->clas==DataType::$BIGDECIMAL) {
			//datoGeneralMaximo.setDbValorBigDecimal($resultSet[$sCampo]);
			
		} else if($classe->clas==DataType::$TIMESTAMP) {
			//datoGeneralMaximo.setTsValorTimestamp($resultSet[$sCampo]);
			
		} else if($classe->clas==DataType::$TIME) {
			//datoGeneralMaximo.settValorTime($resultSet[$sCampo]);
			
		} else if($classe->clas==DataType::$BYTE) {
			//datoGeneralMaximo.setbValorByte($resultSet[$sCampo]);
			
		} else if($classe->clas==DataType::$READER) {
			//datoGeneralMaximo.setrValorReader($resultSet[$sCampo]);
			
		} else {
			//datoGeneralMaximo.setoValorObject($resultSet[$sCampo]);
		}
	}

/*
//use com\bydan\framework\contabilidad\business\data\ConstantesSql;
include_once('com/bydan/framework/contabilidad/business/entity/GeneralEntity.php');
//include_once('com/bydan/framework/contabilidad/business/entity/GeneralEntityReadOnly.php');
include_once('com/bydan/framework/contabilidad/business/logic/QueryWhereSelectParameters.php');
include_once('com/bydan/framework/contabilidad/util/Connexion.php');
include_once('com/bydan/framework/contabilidad/util/ParameterDbType.php');
include_once('com/bydan/framework/contabilidad/util/ParameterMaintenance.php');
include_once('com/bydan/framework/contabilidad/util/ParameterType.php');
include_once('com/bydan/framework/contabilidad/util/ParametersMaintenance.php');
include_once('com/bydan/framework/contabilidad/util/ParametersType.php');
include_once('com/bydan/framework/contabilidad/business/dataaccess/ConstantesSql.php');
*/

//use com\bydan\framework\contabilidad\business\entity\GeneralEntity;
    //PHP5.3-use com\bydan\framework\contabilidad\business\entity\GeneralEntityReadOnly;
/*
use com\bydan\framework\contabilidad\business\logic\QueryWhereSelectParameters;
use com\bydan\framework\contabilidad\util\Connexion;
use com\bydan\framework\contabilidad\util\ParameterDbType;
use com\bydan\framework\contabilidad\util\ParameterMaintenance;
use com\bydan\framework\contabilidad\util\ParametersMaintenance;
use com\bydan\framework\contabilidad\util\ParametersType;
*/
//use com\bydan\framework\contabilidad\business\dataaccess\ConstantesSql;

}

?>