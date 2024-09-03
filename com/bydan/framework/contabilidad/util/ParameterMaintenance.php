<?php declare(strict_types  =  1);

namespace com\bydan\framework\contabilidad\util;

class ParameterMaintenance {
    
 	private string $name = '';
	private string $dbType = '';
	private string $order = '';
	private $value = null;
	private string $parameterMaintenanceType = '';
	private ?ParameterValue $parameterMaintenanceValue = null;
	 	 
	function __construct($newValue,string $newName,string $newDbType,string $newOrder,string $newParameterMaintenanceType,?ParameterValue $newparameterMaintenanceValue) {
		
		$this->name = $newName;
		$this->dbType = $newDbType;
		$this->order = $newOrder;
		$this->parameterMaintenanceType = $newParameterMaintenanceType;
		$this->parameterMaintenanceValue = $newparameterMaintenanceValue;
		$this->value = $newValue;
	}
	
	public function getValue()	{
		return $this->value;
	}

	public function getValueInt():int {
		return $this->value;
	}
	
	public function setValue($newValue) {
		$this->value =  $newValue;
	}

	public function getParameterMaintenanceType():string {
		return $this->parameterMaintenanceType;
	}

	public function setParameterMaintenanceType(string $newParameterMaintenanceType) {
		$this->parameterMaintenanceType  =  $newParameterMaintenanceType;
	}

	public function getParameterMaintenanceValue():?ParameterValue {
		return $this->parameterMaintenanceValue;
	}

	public function setParameterMaintenanceValue(?ParameterValue $newParameterMaintenanceValue) {
		$this->parameterMaintenanceValue  =  $newParameterMaintenanceValue;
	}
	
	public function getOrder():string {
		return $this->order;
	}

	public function setOrder(string $newOrder) {
		$this->order  =  $newOrder;
	}
	
	public function getName():string {
		return $this->name; 
	}

	public function setName(string $newName) {
		$this->name  =  $newName; 
	}  

	public function getDbType():string { 
		return $this->dbType; 
	}

	public function setDbType(string $newDbType) { 
		$this->dbType  =  $newDbType; 
	}

	/*		
	function __construct($newValue,$newName,$newDbType,$newParameterMaintenanceType,$newparameterMaintenanceValue) {
		$this->name  =  $newName;
		$this->dbType  =  $newDbType;
		$this->parameterMaintenanceType = $newParameterMaintenanceType;
		$this->parameterMaintenanceValue = $newparameterMaintenanceValue;
		$this->value =  $newValue;
    }
	*/
}

?>
