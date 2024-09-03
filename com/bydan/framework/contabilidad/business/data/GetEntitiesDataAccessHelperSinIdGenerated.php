<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\business\data;

use Exception;
use com\bydan\framework\contabilidad\business\logic\QueryWhereSelectParameters;
use com\bydan\framework\contabilidad\util\Connexion;
use com\bydan\framework\contabilidad\business\entity\GeneralEntitySinIdGenerated;

class GetEntitiesDataAccessHelperSinIdGenerated {
    
	public  function getEntityConnectionId(Connexion $con, int $id) : GeneralEntitySinIdGenerated|null {		  
          $entityT = null;
          
          try {
				/*
      	    	$stmt = $con->getConnection()->createStatement();
      	    	$rs = $stmt->executeQuery($this->extracted($entityT)->getQuerySelect().' '.ConstantesSql::$WHERE.' '.DataAccessHelper::getColumnNameId(). "=".$id);
      	   
	      	    while ($rs->next()) {      		
	      	    	$entityT=$this->getEntity("",$this->extracted($entityT),$rs);     	    	
	      	    }				

	      	    $stmt->close();
				*/

	      	    $con->getConnection()->close();
	      	    
	      } catch(Exception $ex) {
	            throw $ex;
	      }
        
        return null; //$this->extracted($entityT);
    }

    private function extracted(GeneralEntitySinIdGenerated $entityT) : GeneralEntitySinIdGenerated {
		return $entityT;
	}
	  
	public  function  getEntitiesById(GeneralEntitySinIdGenerated $entity,QueryWhereSelectParameters $queryWhereSelectParameters,Connexion $con, int $id) : array {
		  $entitiesT =array();
		  $entityT = null;
		  
          try {
				/*
	      	    $stmt = $con->getConnection()->createStatement();
	      	    $rs = $stmt->executeQuery($entity->getQuerySelect(). ' '.ConstantesSql::$WHERE.' '.$queryWhereSelectParameters->getQueryWhereSelectParameters().$queryWhereSelectParameters->getFinalQuery());
	      	   
	      	    while ($rs->next()) {     	    	
	      	    	$entityT=$this->getEntity("",$this->extracted($entityT),$rs);
	      	    	$entitiesT->add($this->extracted($entityT));
	      	    }
	
	      	    $stmt->close();
				*/

	      	    $con->getConnection()->close();
	      	} catch(Exception $ex) {
	            throw $ex;
	        }
        
          return $entitiesT;
    }
	 
    public  function  getEntities(Connexion $connexion,QueryWhereSelectParameters $queryWhereSelectParameters) : array {
		$entitiesT = array();
		//$entityT = null;
		
		try {
			//SE SUPONE QUE TIENE CODIGO DE FUNCION ANTERIOR, PERO SE SOBREESCRIBE EN OBJETOS DATAACCESS
		} catch(Exception $ex) {
			throw $ex;
		}
	
		return $entitiesT;
    }
    
    public  function getEntityPrefijoEntityResult(string $strPrefijo,GeneralEntitySinIdGenerated $entityT,$rs) : GeneralEntitySinIdGenerated
    {		 
		$this->extracted($entityT)->setIsNew(false);
          
		try {
		
			if($this->extracted($entityT)->getIsWithSchema()) {
				$this->extracted($entityT)->setId((int)$rs[$strPrefijo.DataAccessHelper::getColumnNameId()]);
				$this->extracted($entityT)->setVersionRow($rs[$strPrefijo.DataAccessHelper::getColumnNameVersionRow()]);	
				//$this->extracted($entityT)->setIsActive($rs[$strPrefijo.DataAccessHelper::getColumnNameIsActive()]);
				//$this->extracted($entityT)->setIsExpired($rs[$strPrefijo.DataAccessHelper::getColumnNameIsExpired()]);
				//BYDAN-TOVERIFY-(talvez se descomenta)											
			}
			
		} catch(Exception $ex) {
			throw $ex;
		}
	        
        return $this->extracted($entityT);
    }
	
	public function setGeneralEntitiesIsNewFalseIsChangedFalse(array $generalEntities) {
		
		foreach($generalEntities as $generalEntity){
			$generalEntity->setIsNew(false);
			$generalEntity->setIsChanged(false);
		}
	}
	
	public function setGeneralEntityIsNewFalseIsChangedFalse(GeneralEntitySinIdGenerated $generalEntity) {
		//if($generalEntity!=null) { 
			$generalEntity->setIsNew(false);
			$generalEntity->setIsChanged(false);
		//}
	}
	
	public  static function getGeneralEntity(string $strPrefijo,GeneralEntitySinIdGenerated $entityT,$rs) {		 
		$entityT->setIsNew(false);
		
		try {
			$entityT->setId($rs->getLong($strPrefijo.DataAccessHelper::getColumnNameId()));	
			//$entityT->setIsActive($rs->getBoolean(strPrefijo.DataAccessHelper::getColumnNameIsActive()));
			//$entityT->setIsExpired($rs->getBoolean(strPrefijo.DataAccessHelper::getColumnNameIsExpired()));
			$entityT->setVersionRow($rs->getTimestamp($strPrefijo.DataAccessHelper::getColumnNameVersionRow()));
			
		} catch(Exception $ex) {
		throw $ex;
		}         
	}

/*
//use com\bydan\framework\contabilidad\business\entity\GeneralEntity;
//use com\bydan\framework\contabilidad\business\data\DataAccessHelper;
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
include_once('com/bydan/framework/contabilidad/business/dataaccess/DataAccessHelper.php');
*/

//PHP5.3-use com/bydan/framework/contabilidad/business/entity/GeneralEntity;
////PHP5.3-use com/bydan/framework/contabilidad/business/entity/GeneralEntityReadOnly;
//PHP5.3-use com/bydan/framework/contabilidad/business/logic/QueryWhereSelectParameters;
//PHP5.3-use com/bydan/framework/contabilidad/util/Connexion;
//PHP5.3-use com/bydan/framework/contabilidad/util/ParameterDbType;
//PHP5.3-use com/bydan/framework/contabilidad/util/ParameterMaintenance;
//PHP5.3-use com/bydan/framework/contabilidad/util/ParameterType;
//PHP5.3-use com/bydan/framework/contabilidad/util/ParametersMaintenance;
//PHP5.3-use com/bydan/framework/contabilidad/util/ParametersType;
//PHP5.3-use com/bydan/framework/contabilidad/business/dataaccess/ConstantesSql;
//PHP5.3-use com/bydan/framework/contabilidad/business/dataaccess/DataAccessHelper;

}