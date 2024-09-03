<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\presentation\web;

class PaginationLink {
    
	public string $strLabel;
	public int $intPage;
	
	function __construct() {
		$this->strLabel='0';
		$this->intPage=0;	
	}	
	
	public function getStrLabel():string {
		return $this->strLabel;
	}
	
	public function setStrLabel(string $strLabel) {
		$this->strLabel = $strLabel;
	}
	
	public function getIntPage():int {
		return $this->intPage;
	}
	
	public function setIntPage(int $intPage) {
		$this->intPage = $intPage;
	}
}

?>