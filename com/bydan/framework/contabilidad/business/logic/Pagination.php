<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\business\logic;

class Pagination {
    
	private int $intFirstResult=0;
	private int $intMaxResults=0;
	private string $strType='';
	private bool $blnConNumeroMaximo=false;
	private int $intNumeroMaximo=0;
	
	function __construct(int $newIntFirstResult=0,int $newIntMaxResults=0,string $newStrType='') {
		$this->intFirstResult=$newIntFirstResult;
		$this->intMaxResults= $newIntMaxResults;
		$this->strType=$newStrType;
		$this->blnConNumeroMaximo=false;
		$this->intNumeroMaximo=0;
    }
    
	public function getIntFirstResult() : int {
		return $this->intFirstResult;
	}

	public function setIntFirstResult(int $newIntFirstResult) {
		$this->intFirstResult = $newIntFirstResult;
	}

	public function getIntMaxResults() :int {
		return $this->intMaxResults;
	}

	public function setIntMaxResults(int $newIntMaxResults) {
		$this->intMaxResults = $newIntMaxResults;
	}

	public function getStrType() :string {
		return $this->strType;
	}

	public function setStrType(string $newStrType) {
		$this->strType = $newStrType;
	}
	
	public function getBlnConNumeroMaximo() : bool {
		return $this->blnConNumeroMaximo;
	}

	public function setBlnConNumeroMaximo(bool $newBlnConNumeroMaximo) {
		$this->blnConNumeroMaximo = $newBlnConNumeroMaximo;
	}
	
	public function getIntNumeroMaximo() : int {
		return $this->intNumeroMaximo;
	}

	public function setIntNumeroMaximo(int $newIntNumeroMaximo) {
		$this->intNumeroMaximo = $newIntNumeroMaximo;
	}
}

?>
