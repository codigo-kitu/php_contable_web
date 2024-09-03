<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\business\entity;

class DatoGeneralMinimo {
    
	public string $sCodigo='';	
	public string $sDescripcion='';
	public string $sValor='';
	
	public string $sValorString="";	
	public int $iValorInteger=0;
	public int $iValorLong=0;
	public bool $isValorBoolean=false;
	public ?string $dtValorDate=null;
	public float $dValorDouble=0.0;
	
	public int $shValorShort=0;
	public float $fValorFloat=0.0;
	public float $dbValorBigDecimal=0.0;
	public ?string $tsValorTimestamp=null;
	public ?string $tValorTime=null;
	public $bValorByte=null;	
	
	function __construct() {
		$this->sCodigo='';	
		$this->sDescripcion='';
		$this->sValor='';
	}
	
	public function getsCodigo():string {
		return $this->sCodigo;
	}

	public function setsCodigo(string $sCodigo) {
		$this->sCodigo = $sCodigo;
	}

	public function getsDescripcion():string {
		return $this->sDescripcion;
	}

	public function setsDescripcion(string $sDescripcion) {
		$this->sDescripcion = $sDescripcion;
	}
	
	public function getsValor():string {
		return $this->sValor;
	}

	public function setsValor(string $sValor) {
		$this->sValor = $sValor;
	}

	
	
	//VALORES
	public function getsValorString():string {return $this->sValorString;}
	public function setsValorString(string $sValorString) {$this->sValorString = $sValorString;}
	
	public function getiValorInteger():int {return $this->iValorInteger;}
	public function setiValorInteger(int $iValorInteger) {$this->iValorInteger = $iValorInteger;}
	
	public function getiValorLong():int {return $this->iValorLong;	}
	public function setiValorLong(int $iValorLong) {$this->iValorLong = $iValorLong;}
	
	public function getIsValorBoolean():bool {return $this->isValorBoolean;}
	public function setIsValorBoolean(bool $isValorBoolean) {$this->isValorBoolean = $isValorBoolean;}
	
	public function getDtValorDate():string {return $this->dtValorDate;}
	public function setDtValorDate(string $dtValorDate) {$this->dtValorDate = $dtValorDate;}
	
	public function getdValorDouble():float {return $this->dValorDouble;}
	public function setdValorDouble(float $dValorDouble) {$this->dValorDouble = $dValorDouble;}

	
	public function getShValorShort():int {return $this->shValorShort;}
	public function setShValorShort(int $shValorShort) {$this->shValorShort = $shValorShort;	}

	public function getfValorFloat():float {return $this->fValorFloat;}
	public function setfValorFloat(float $fValorFloat) {$this->fValorFloat = $fValorFloat;	}

	public function getDbValorBigDecimal():float {return $this->dbValorBigDecimal;}
	public function setDbValorBigDecimal(float $dbValorBigDecimal) {$this->dbValorBigDecimal = $dbValorBigDecimal;	}

	public function getTsValorTimestamp():?string {return $this->tsValorTimestamp;}
	public function setTsValorTimestamp(?string $tsValorTimestamp) {$this->tsValorTimestamp = $tsValorTimestamp;}

	public function gettValorTime():?string {return $this->tValorTime;	}
	public function settValorTime(?string $tValorTime) {$this->tValorTime = $tValorTime;}

	public function getbValorByte() {return $this->bValorByte;}
	public function setbValorByte($bValorByte) {$this->bValorByte = $bValorByte;}
	
	
	
	public string $NOMBRE_STRING='';
	public string $NOMBRE_INTEGER='';
	public string $NOMBRE_LONG='';
	public string $NOMBRE_BOOLEAN='';
	public string $NOMBRE_DATE='';
	public string $NOMBRE_DOUBLE='';
	
	public string $NOMBRE_SHORT='';
	public string $NOMBRE_FLOAT='';
	public string $NOMBRE_BIGDECIMAL='';
	public string $NOMBRE_TIMESTAMP='';
	public string $NOMBRE_TIME='';
	public string $NOMBRE_BYTE='';
}
?>
