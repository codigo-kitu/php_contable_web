<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\business\data;

class ModelBase {
    
    public ?object $data=null; //?array
	
	function __construct() {
		//$this->data=array();
	}
	
	public function validates():bool {
		return true;
	}
	
	public function invalidFieldsMe():?array {
		return array();
	}
	
	public function set(?object $data) { //?array
		$this->data=$data;
	}
}

?>