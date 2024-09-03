<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\util;

class ParametersMaintenance {
    
	private string $dbType;
	private array $parametersMaintenance=array();

	function __construct (){	
		$this->parametersMaintenance=array();
	}
	
	public function getDbType():string	{ 
		 return $this->dbType; 
	}

	public function setDbType(string $newDbType) { 
	   $this->dbType = $newDbType; 
	}

	public function getParametersMaintenance() :array{
		return $this->parametersMaintenance;
	}

	public function setParametersMaintenance(array $parametersMaintenance) {
		$this->parametersMaintenance = $parametersMaintenance;
	}
	public function addParameter(ParameterMaintenance $parameterMaintenance)	{
		$this->parametersMaintenance[]=$parameterMaintenance;
	}		
}

?>