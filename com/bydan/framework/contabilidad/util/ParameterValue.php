<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\util;

class ParameterValue {
    
	private $value;

	function __construct($newValue)	{
		$this->value=$newValue;	
	}
		
	public function getValue() {	
		return $this->value;
	}

	public function getValueDate():?string {
		return $this->value;	
	}

	public function getValueTimestamp():?string	{
		return ($this->value);	
	}

	public function getValueTime():?string {
		return ($this->value);	
	}

	public function setValue($newValue) {
		$this->value = $newValue;
	}

	public function getValueInteger() :?int{
		return ($this->value);	
	}

	public function getValueByte() {
		return ($this->value);	
	}

	public function getValueBytes() {
		return $this->value;	
	}
		
	public function getValueDouble():?float {
		return ($this->value);	
	}

	public function getValueFloat():?float {
		return ($this->value);	
	}
	
	public function getValueShort():?int {
		return ($this->value);	
	}
	
	public function getValueLong():?int {
		return ($this->value);	
	}
	
	public function getValueNumber():?int {
		return $this->value;	
	}
	
	public function getValueString():?string {
		return $this->value;	
	}
	
	public function getValueBoolean():?bool {
		return ($this->value);	
	}
	
	public function getValueCharacter():?string	{
		return ($this->value);	
	}
	
	public function getValueObject():?object {
		return $this->value;	
	}
}

?>