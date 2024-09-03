<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\business\entity;

class DatoGeneralMaximo {
    
    public string $sCodigo='';	
    public string $sDescripcion='';
    public string $sValor='';
	
	public string $sValorString='';	
	public string $sValorString1='';	
	public string $sValorString2='';
	public string $sValorString3='';
	public string $sValorString4='';
	public string $sValorString5='';
	public string $sValorString6='';
	public string $sValorString7='';
	public string $sValorString8='';
	public string $sValorString9='';
	public string $sValorString10='';
	
	public int $iValorInteger=0;
	public int $iValorInteger1=0;
	public int $iValorInteger2=0;
	public int $iValorInteger3=0;
	public int $iValorInteger4=0;
	public int $iValorInteger5=0;
	public int $iValorInteger6=0;
	public int $iValorInteger7=0;
	public int $iValorInteger8=0;
	public int $iValorInteger9=0;
	public int $iValorInteger10=0;
	
	public int $iValorLong=0;
	public int $iValorLong1=0;
	public int $iValorLong2=0;
	public int $iValorLong3=0;
	public int $iValorLong4=0;
	public int $iValorLong5=0;
	public int $iValorLong6=0;
	public int $iValorLong7=0;
	public int $iValorLong8=0;
	public int $iValorLong9=0;
	public int $iValorLong10=0;
	
	public bool $isValorBoolean=false;
	public bool $isValorBoolean1=false;
	public bool $isValorBoolean2=false;
	public bool $isValorBoolean3=false;
	public bool $isValorBoolean4=false;
	public bool $isValorBoolean5=false;
	public bool $isValorBoolean6=false;
	public bool $isValorBoolean7=false;
	public bool $isValorBoolean8=false;
	public bool $isValorBoolean9=false;
	public bool $isValorBoolean10=false;
	
	public string $dtValorDate='1900-01-01';
	public string $dtValorDate1='1900-01-01';
	public string $dtValorDate2='1900-01-01';
	public string $dtValorDate3='1900-01-01';
	public string $dtValorDate4='1900-01-01';
	public string $dtValorDate5='1900-01-01';
	public string $dtValorDate6='1900-01-01';
	public string $dtValorDate7='1900-01-01';
	public string $dtValorDate8='1900-01-01';
	public string $dtValorDate9='1900-01-01';
	public string $dtValorDate10='1900-01-01';
	
	public float $dValorDouble=0.0;
	public float $dValorDouble1=0.0;
	public float $dValorDouble2=0.0;
	public float $dValorDouble3=0.0;
	public float $dValorDouble4=0.0;
	public float $dValorDouble5=0.0;
	public float $dValorDouble6=0.0;
	public float $dValorDouble7=0.0;
	public float $dValorDouble8=0.0;
	public float $dValorDouble9=0.0;
	public float $dValorDouble10=0.0;
	
	
	function __construct() {
		
	}
	
	//CODIGO,DESCRIPCION,VALOR
	public function getsCodigo():string {return $this->sCodigo;}
	public function setsCodigo(string $sCodigo) {$this->sCodigo = $sCodigo;}

	public function getsDescripcion():string {return $this->sDescripcion;}
	public function setsDescripcion(string $sDescripcion) {$this->sDescripcion = $sDescripcion;}
	
	public function getsValor():string {return $this->sValor;}
	public function setsValor(string $sValor) {$this->sValor = $sValor;}

	
	//STRING
	public function getsValorString() {return $this->sValorString;}
	public function setsValorString($sValorString) {$this->sValorString = $sValorString;}
	
	public function getsValorString1() { return $this->sValorString1;}
	public function setsValorString1($sValorString1) {$this->sValorString1 = $sValorString1;}

	public function getsValorString2() {return $this->sValorString2;}
	public function setsValorString2($sValorString2) {$this->sValorString2 = $sValorString2;	}

	public function getsValorString3() {return $this->sValorString3;	}
	public function setsValorString3($sValorString3) {$this->sValorString3 = $sValorString3;	}

	public function getsValorString4() {return $this->sValorString4;}
	public function setsValorString4($sValorString4) {$this->sValorString4 = $sValorString4;	}

	public function getsValorString5() {return $this->sValorString5;	}
	public function setsValorString5($sValorString5) {$this->sValorString5 = $sValorString5;	}
	
	public function getsValorString6() {return $this->sValorString6;}
	public function setsValorString6($sValorString6) {$this->sValorString6 = $sValorString6;	}
	
	public function getsValorString7() {return $this->sValorString7;	}
	public function setsValorString7($sValorString7) {$this->sValorString7 = $sValorString7;	}
	
	public function getsValorString8() {return $this->sValorString8;}
	public function setsValorString8($sValorString8) {$this->sValorString8 = $sValorString8;}

	public function getsValorString9() { return $this->sValorString9;}
	public function setsValorString9($sValorString9) {$this->sValorString9 = $sValorString9;}

	public function getsValorString10() {return $this->sValorString10;}
	public function setsValorString10($sValorString10) {$this->sValorString10 = $sValorString10;}


	//INTEGER
	public function getiValorInteger() {return $this->iValorInteger;}
	public function setiValorInteger($iValorInteger) {$this->iValorInteger = $iValorInteger;}

	public function getiValorInteger1() {return $this->iValorInteger1;}
	public function setiValorInteger1($iValorInteger1) {$this->iValorInteger1 = $iValorInteger1;}

	public function getiValorInteger2() {return $this->iValorInteger2;}
	public function setiValorInteger2($iValorInteger2) {$this->iValorInteger2 = $iValorInteger2;}

	public function getiValorInteger3() {return $this->iValorInteger3;}
	public function setiValorInteger3($iValorInteger3) {$this->iValorInteger3 = $iValorInteger3;}

	public function getiValorInteger4() {return $this->iValorInteger4;}
	public function setiValorInteger4($iValorInteger4) {$this->iValorInteger4 = $iValorInteger4;}

	public function getiValorInteger5() {return $this->iValorInteger5;}
	public function setiValorInteger5($iValorInteger5) {$this->iValorInteger5 = $iValorInteger5;}
	
	public function getiValorInteger6() {return $this->iValorInteger6;}
	public function setiValorInteger6($iValorInteger6) {$this->iValorInteger6 = $iValorInteger6;}

	public function getiValorInteger7() {return $this->iValorInteger7;}
	public function setiValorInteger7($iValorInteger7) {$this->iValorInteger7 = $iValorInteger7;}

	public function getiValorInteger8() {return $this->iValorInteger8;}
	public function setiValorInteger8($iValorInteger8) {$this->iValorInteger8 = $iValorInteger8;}

	public function getiValorInteger9() {return $this->iValorInteger9;}
	public function setiValorInteger9($iValorInteger9) {$this->iValorInteger9 = $iValorInteger9;}

	public function getiValorInteger10() {return $this->iValorInteger10;}
	public function setiValorInteger10($iValorInteger10) {$this->iValorInteger10 = $iValorInteger10;}

	//LONG
	public function getiValorLong() {return $this->iValorLong;	}
	public function setiValorLong($iValorLong) {$this->iValorLong = $iValorLong;}

	public function getiValorLong1() {return $this->iValorLong1;}
	public function setiValorLong1($iValorLong1) {$this->iValorLong1 = $iValorLong1;}

	public function getiValorLong2() {return $this->iValorLong2;}
	public function setiValorLong2($iValorLong2) {$this->iValorLong2 = $iValorLong2;}

	public function getiValorLong3() {return $this->iValorLong3;}
	public function setiValorLong3($iValorLong3) {$this->iValorLong3 = $iValorLong3;}

	public function getiValorLong4() {return $this->iValorLong4;}
	public function setiValorLong4($iValorLong4) {$this->iValorLong4 = $iValorLong4;}

	public function getiValorLong5() {return $this->iValorLong5;}
	public function setiValorLong5($iValorLong5) {$this->iValorLong5 = $iValorLong5;}

	public function getiValorLong6() {return $this->iValorLong6;}
	public function setiValorLong6($iValorLong6) {$this->iValorLong6 = $iValorLong6;}

	public function getiValorLong7() {return $this->iValorLong7;}
	public function setiValorLong7($iValorLong7) {$this->iValorLong7 = $iValorLong7;}

	public function getiValorLong8() {return $this->iValorLong8;}
	public function setiValorLong8($iValorLong8) {$this->iValorLong8 = $iValorLong8;}

	public function getiValorLong9() {return $this->iValorLong9;}
	public function setiValorLong9($iValorLong9) {$this->iValorLong9 = $iValorLong9;}

	public function getiValorLong10() {return $this->iValorLong10;}
	public function setiValorLong10($iValorLong10) {$this->iValorLong10 = $iValorLong10;}
	
	
	//BOOLEAN
	public function getIsValorBoolean() {return $this->isValorBoolean;}
	public function setIsValorBoolean($isValorBoolean) {$this->isValorBoolean = $isValorBoolean;}

	public function getIsValorBoolean1() {return $this->isValorBoolean1;}
	public function setIsValorBoolean1($isValorBoolean1) {$this->isValorBoolean1 = $isValorBoolean1;}

	public function getIsValorBoolean2() {return $this->isValorBoolean2;}
	public function setIsValorBoolean2($isValorBoolean2) {$this->isValorBoolean2 = $isValorBoolean2;}

	public function getIsValorBoolean3() {return $this->isValorBoolean3;}
	public function setIsValorBoolean3($isValorBoolean3) {$this->isValorBoolean3 = $isValorBoolean3;}

	public function getIsValorBoolean4() {return $this->isValorBoolean4;}
	public function setIsValorBoolean4($isValorBoolean4) {$this->isValorBoolean4 = $isValorBoolean4;}

	public function getIsValorBoolean5() {return $this->isValorBoolean5;}
	public function setIsValorBoolean5($isValorBoolean5) {$this->isValorBoolean5 = $isValorBoolean5;}
	
	public function getIsValorBoolean6() {return $this->isValorBoolean6;}
	public function setIsValorBoolean6($isValorBoolean6) {$this->isValorBoolean6 = $isValorBoolean6;}

	public function getIsValorBoolean7() {return $this->isValorBoolean7;}
	public function setIsValorBoolean7($isValorBoolean7) {$this->isValorBoolean7 = $isValorBoolean7;}

	public function getIsValorBoolean8() {return $this->isValorBoolean8;}
	public function setIsValorBoolean8($isValorBoolean8) {$this->isValorBoolean8 = $isValorBoolean8;}

	public function getIsValorBoolean9() {return $this->isValorBoolean9;}
	public function setIsValorBoolean9($isValorBoolean9) {$this->isValorBoolean9 = $isValorBoolean9;}

	public function getIsValorBoolean10() {return $this->isValorBoolean10;}
	public function setIsValorBoolean10($isValorBoolean10) {$this->isValorBoolean10 = $isValorBoolean10;}
	
	
	//DATE
	public function getDtValorDate() {return $this->dtValorDate;}
	public function setDtValorDate($dtValorDate) {$this->dtValorDate = $dtValorDate;}

	public function getDtValorDate1() {return $this->dtValorDate1;}
	public function setDtValorDate1($dtValorDate1) {$this->dtValorDate1 = $dtValorDate1;}

	public function getDtValorDate2() {return $this->dtValorDate2;}
	public function setDtValorDate2($dtValorDate2) {$this->dtValorDate2 = $dtValorDate2;}

	public function getDtValorDate3() {return $this->dtValorDate3;}
	public function setDtValorDate3($dtValorDate3) {$this->dtValorDate3 = $dtValorDate3;}

	public function getDtValorDate4() {	return $this->dtValorDate4;}
	public function setDtValorDate4($dtValorDate4) {$this->dtValorDate4 = $dtValorDate4;}

	public function getDtValorDate5() {return $this->dtValorDate5;}
	public function setDtValorDate5($dtValorDate5) {$this->dtValorDate5 = $dtValorDate5;}	

	public function getDtValorDate6() {return $this->dtValorDate6;}
	public function setDtValorDate6($dtValorDate6) {$this->dtValorDate6 = $dtValorDate6;}

	public function getDtValorDate7() {return $this->dtValorDate7;}
	public function setDtValorDate7($dtValorDate7) {$this->dtValorDate7 = $dtValorDate7;}

	public function getDtValorDate8() {return $this->dtValorDate8;}
	public function setDtValorDate8($dtValorDate8) {$this->dtValorDate8 = $dtValorDate8;}

	public function getDtValorDate9() {	return $this->dtValorDate9;}
	public function setDtValorDate9($dtValorDate9) {$this->dtValorDate9 = $dtValorDate9;}

	public function getDtValorDate10() {return $this->dtValorDate10;}
	public function setDtValorDate10($dtValorDate10) {$this->dtValorDate10 = $dtValorDate10;}
	
	
	//DOUBLE
	public function getdValorDouble() {return $this->dValorDouble;}
	public function setdValorDouble($dValorDouble) {$this->dValorDouble = $dValorDouble;}

	public function getdValorDouble1() {return $this->dValorDouble1;}
	public function setdValorDouble1($dValorDouble1) {$this->dValorDouble1 = $dValorDouble1;}

	public function getdValorDouble2() {return $this->dValorDouble2;}
	public function setdValorDouble2($dValorDouble2) {$this->dValorDouble2 = $dValorDouble2;}

	public function getdValorDouble3() {return $this->dValorDouble3;}
	public function setdValorDouble3($dValorDouble3) {$this->dValorDouble3 = $dValorDouble3;}

	public function getdValorDouble4() {return $this->dValorDouble4;}
	public function setdValorDouble4($dValorDouble4) {$this->dValorDouble4 = $dValorDouble4;}

	public function getdValorDouble5() {return $this->dValorDouble5;}
	public function setdValorDouble5($dValorDouble5) {$this->dValorDouble5 = $dValorDouble5;}
	
	public function getdValorDouble6() {return $this->dValorDouble6;}
	public function setdValorDouble6($dValorDouble6) {$this->dValorDouble6 = $dValorDouble6;}

	public function getdValorDouble7() {return $this->dValorDouble7;}
	public function setdValorDouble7($dValorDouble7) {$this->dValorDouble7 = $dValorDouble7;}

	public function getdValorDouble8() {return $this->dValorDouble8;}
	public function setdValorDouble8($dValorDouble8) {$this->dValorDouble8 = $dValorDouble8;}

	public function getdValorDouble9() {return $this->dValorDouble9;}
	public function setdValorDouble9($dValorDouble9) {$this->dValorDouble9 = $dValorDouble9;}

	public function getdValorDouble10() {return $this->dValorDouble10;}
	public function setdValorDouble10($dValorDouble10) {$this->dValorDouble10 = $dValorDouble10;}
	
	
	//NOMBRE_CAMPOS
	public string $NOMBRE_STRING='';
	public string $NOMBRE_STRING1='';
	public string $NOMBRE_STRING2='';
	public string $NOMBRE_STRING3='';
	public string $NOMBRE_STRING4='';
	public string $NOMBRE_STRING5='';
	public string $NOMBRE_STRING6='';
	public string $NOMBRE_STRING7='';
	public string $NOMBRE_STRING8='';
	public string $NOMBRE_STRING9='';
	public string $NOMBRE_STRING10='';
		
	public string $NOMBRE_INTEGER='';
	public string $NOMBRE_INTEGER1='';
	public string $NOMBRE_INTEGER2='';
	public string $NOMBRE_INTEGER3='';
	public string $NOMBRE_INTEGER4='';
	public string $NOMBRE_INTEGER5='';
	public string $NOMBRE_INTEGER6='';
	public string $NOMBRE_INTEGER7='';
	public string $NOMBRE_INTEGER8='';
	public string $NOMBRE_INTEGER9='';
	public string $NOMBRE_INTEGER10='';
		
	public string $NOMBRE_LONG='';
	public string $NOMBRE_LONG1='';
	public string $NOMBRE_LONG2='';
	public string $NOMBRE_LONG3='';
	public string $NOMBRE_LONG4='';
	public string $NOMBRE_LONG5='';
	public string $NOMBRE_LONG6='';
	public string $NOMBRE_LONG7='';
	public string $NOMBRE_LONG8='';
	public string $NOMBRE_LONG9='';
	public string $NOMBRE_LONG10='';
		
	public string $NOMBRE_BOOLEAN='';
	public string $NOMBRE_BOOLEAN1='';
	public string $NOMBRE_BOOLEAN2='';
	public string $NOMBRE_BOOLEAN3='';
	public string $NOMBRE_BOOLEAN4='';
	public string $NOMBRE_BOOLEAN5='';
	public string $NOMBRE_BOOLEAN6='';
	public string $NOMBRE_BOOLEAN7='';
	public string $NOMBRE_BOOLEAN8='';
	public string $NOMBRE_BOOLEAN9='';
	public string $NOMBRE_BOOLEAN10='';
		
	public string $NOMBRE_DATE='';
	public string $NOMBRE_DATE1='';
	public string $NOMBRE_DATE2='';
	public string $NOMBRE_DATE3='';
	public string $NOMBRE_DATE4='';
	public string $NOMBRE_DATE5='';
	public string $NOMBRE_DATE6='';
	public string $NOMBRE_DATE7='';
	public string $NOMBRE_DATE8='';
	public string $NOMBRE_DATE9='';
	public string $NOMBRE_DATE10='';
		
	public string $NOMBRE_DOUBLE='';
	public string $NOMBRE_DOUBLE1='';
	public string $NOMBRE_DOUBLE2='';
	public string $NOMBRE_DOUBLE3='';
	public string $NOMBRE_DOUBLE4='';
	public string $NOMBRE_DOUBLE5='';
	public string $NOMBRE_DOUBLE6='';
	public string $NOMBRE_DOUBLE7='';
	public string $NOMBRE_DOUBLE8='';
	public string $NOMBRE_DOUBLE9='';
	public string $NOMBRE_DOUBLE10='';
}
?>