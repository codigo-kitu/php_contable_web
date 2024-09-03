<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\presentation\report;

class CellReport {
    
	public int $id=0;
	public int $intWidth=0;
	public int $intHeight=0;
	public string $strText='';
	public int $intBorder=0;
	public int $intLine=0;
	public string $strAlign='';	
	public bool $blnFill=false;
	public string $strLink='';
	public bool $blnEsTituloGrupo=false;
	public int $intColSpan=0;
	
	function __construct() {
		$this->id=0;
		$this->intWidth=0;
		$this->intHeight=0;
		$this->strText='';
		$this->intBorder=0;
		$this->intLine=0;
		$this->intColSpan=0;
		$this->strAlign='';
		$this->blnFill=false;
		$this->strLink='';
		$this->blnEsTituloGrupo=false;
	}
	
	public function inicializar(int $id=0,int $intWidth=0,int $intHeight=0,string $strText='',int $intBorder=0,int $intLine=0,string $strAlign='',bool $blnFill=false,string $strLink='') {
		$this->id=$id;
		$this->intWidth=$intWidth;
		$this->intHeight=$intHeight;
		$this->strText=$strText;
		$this->intBorder=$intBorder;
		$this->intLine=$intLine;
		$this->strAlign=$strAlign;
		$this->blnFill=$blnFill;
		$this->strLink=$strLink;
		$this->intColSpan=0;
	}
	
	public function inicializarTextWidthHeightLine(mixed $strText='',int $intWidth=0,int $intHeight=0,int $intBorder=0) {
		$this->strText=$strText;		
		$this->intWidth=$intWidth;
		$this->intHeight=$intHeight;
		$this->intBorder=$intBorder;
		
		$this->id=0;
		$this->intLine=0;
		$this->intColSpan=0;
		$this->strAlign='';
		$this->blnFill=false;
		$this->strLink='';
	}
	
	public function getId() :int{
		return $this->id;
	}

	public function setId(int $id) {
		$this->id=$id;
	}

	public function getintWidth():int {
		return $this->intWidth;
	}

	public function setintWidth(int $intWidth) {
		$this->intWidth=$intWidth;
	}
	
	public function getintHeight():int {
		return $this->intHeight;
	}

	public function setintHeight(int $intHeight) {
		$this->intHeight=$intHeight;
	}
	
	public function getstrText():string {
		return $this->strText;
	}

	public function setstrText(string $strText) {
		$this->strText=$strText;
	}
	
	public function getintBorder():int {
		return $this->intBorder;
	}

	public function setintBorder(int $intBorder) {
		$this->intBorder=$intBorder;
	}
	
	public function getintLine():int {
		return $this->intLine;
	}

	public function setintLine(int $intLine) {
		$this->intLine=$intLine;
	}
	
	public function getintColSpan():int {
		return $this->intColSpan;
	}

	public function setintColSpan(int $intColSpan) {
		$this->intColSpan=$intColSpan;
	}
	
	public function getstrAlign():string {
		return $this->strAlign;
	}

	public function setstrAlign(string $strAlign) {
		$this->strAlign=$strAlign;
	}
	
	public function getblnFill():bool {
		return $this->blnFill;
	}

	public function setblnFill(bool $blnFill) {
		$this->blnFill=$blnFill;
	}
	
	public function getstrLink():string {
		return $this->strLink;
	}

	public function setstrLink(string $strLink) {
		$this->strLink=$strLink;
	}
	
	public function getblnEsTituloGrupo():bool {
		return $this->blnEsTituloGrupo;
	}

	public function setblnEsTituloGrupo(bool $blnEsTituloGrupo) {
		$this->blnEsTituloGrupo=$blnEsTituloGrupo;
	}
}

?>