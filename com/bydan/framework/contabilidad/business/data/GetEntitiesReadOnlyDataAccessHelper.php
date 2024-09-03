<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\business\data;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;
use com\bydan\framework\contabilidad\util\Connexion;
use com\bydan\framework\contabilidad\business\logic\QueryWhereSelectParameters;

class GetEntitiesReadOnlyDataAccessHelper {
    
    public  function getEntities(GeneralEntity $entity,QueryWhereSelectParameters $queryWhereSelectParameters,Connexion $con):array {
			$entitiesT = array();
			$entityT = null;
			
			try {

				/*
				$stmt = $con->getConnection()->createStatement();
				$rs = $stmt->executeQuery($entity->getQuerySelect().' '.ConstantesSql::$WHERE.' '.$queryWhereSelectParameters->getQueryWhereSelectParameters() .$queryWhereSelectParameters->getFinalQuery());
				
				while ($rs.next()) {	      	    	
					$entityT=$this->getEntityEntityResult($entityT,$rs);
					$entitiesT->add($entityT);
				}				

				$stmt->close();
				*/

				$con->getConnection()->close();

			} catch(Exception $ex) {
				throw $ex;
			}
		
		return $entitiesT;
	}
		  
	public  function getEntityEntityResult(GeneralEntity $entityT,$rs):GeneralEntity {						  
		try {	      	  
			$entityT->setId($rs->getInt(DataAccessHelper::getColumnNameId()));	   	    	       	 
		} catch(Exception $ex) {
			throw $ex;
		}
		
		return $entityT;
	}
	
//include_once('com/bydan/framework/contabilidad/business/dataaccess/DataAccessHelper.php');
//PHP5.3-use com/bydan/framework/contabilidad/business/dataaccess/DataAccessHelper;
//PHP5.3-use com/bydan/framework/contabilidad/business/entity/GeneralEntity;
//PHP5.3-use com/bydan/framework/contabilidad/business/entity/GeneralEntityReadOnly;
//PHP5.3-use com/bydan/framework/contabilidad/business/logic/QueryWhereSelectParameters;
//PHP5.3-use com/bydan/framework/contabilidad/util/Connexion;
//PHP5.3-use com/bydan/framework/contabilidad/util/ParameterDbType;
//PHP5.3-use com/bydan/framework/contabilidad/util/ParameterMaintenance;
//PHP5.3-use com/bydan/framework/contabilidad/util/ParameterType;
//PHP5.3-use com/bydan/framework/contabilidad/util/ParametersMaintenance;
//PHP5.3-use com/bydan/framework/contabilidad/util/ParametersType;
//use com\bydan\framework\contabilidad\business\data\DataAccessHelper;

}

?>	