<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\business\logic;

use com\bydan\framework\contabilidad\util\ParameterDbType;
use com\bydan\framework\contabilidad\util\ParameterTypeOperator;
use com\bydan\framework\contabilidad\util\ParameterTypeSign;

class ParameterSelectionGeneral {
	 
     private ?string $parameterType='';
	 private $parameterInitialValue;
	 private $parameterFinalValue;
	 private ?string $parameterInitialQuery='';
	 private ?string $parameterFinalQuery='';

	 private ?string $parameterInitialTypeSign='';
	 private ?string $parameterFinalTypeSign;
	 
	 private ?string $columnName='';
	 private ?string $nextOperator='';
	 private ?bool $isEqual=true;
	 
	 function __construct(?string $newParameterType=null,?string $newColumnName=null,?string $newParameterInitialTypeSign=null,$newParameterInitialValue=null,
	     ?string $newParameterFinalTypeSign=null,$newParameterFinalValue=null,?string $newNextOperator=null,?bool $isEqual=null)
	{
		 $this->parameterType=$newParameterType;
		 $this->parameterInitialValue=$newParameterInitialValue;
		 $this->parameterInitialTypeSign=$newParameterInitialTypeSign;
		 $this->parameterFinalValue=$newParameterFinalValue;
		 $this->parameterFinalTypeSign=$newParameterFinalTypeSign;		
		 $this->columnName=$newColumnName;
		 $this->nextOperator=$newNextOperator;
		 $this->isEqual=false;		 
		 $this->parameterInitialQuery='';		 
		 $this->parameterFinalQuery='';		 		  	 
	}
	
	public function setParameterSelectionGeneral(?string $newParameterType=null,?string $newColumnName=null,
	    ?string $newParameterInitialTypeSign=null,$newParameterInitialValue=null,
	    ?string $newParameterFinalTypeSign=null,$newParameterFinalValue=null,?string $newNextOperator=null)
	{
		 $this->parameterType=$newParameterType;
		 $this->parameterInitialValue=$newParameterInitialValue;
		 $this->parameterFinalValue=$newParameterFinalValue;
		 $this->parameterInitialTypeSign=$newParameterInitialTypeSign;
		 $this->parameterFinalTypeSign=$newParameterFinalTypeSign;		 
		 $this->columnName=$newColumnName;
		 $this->nextOperator=$newNextOperator;
		 $this->isEqual=false;
	}
	
	public function setParameterSelectionGeneralEqual(?string $newParameterType=null,
	    $newParameterInitialValue=null,?string $newColumnName=null,?string $newNextOperator=null,
	    ?string $newParameterInitialQuery=null,?string $newParameterFinalQuery=null) 
	{
			
		$this->parameterType=$newParameterType;
		$this->parameterInitialValue=$newParameterInitialValue;
		$this->parameterInitialTypeSign=ParameterTypeSign::$IGUAL;				 
		$this->columnName=$newColumnName;
		$this->nextOperator=$newNextOperator;
		$this->isEqual=true;	
		$this->parameterInitialQuery=$newParameterInitialQuery;
		$this->parameterFinalQuery=$newParameterFinalQuery;
	}
	 
	public function setParameterSelectionGeneralLike(?string $newParameterType=null,
	    $newParameterInitialValue=null,?string $newColumnName=null,?string $newNextOperator=null,
	    ?string $newParameterInitialQuery=null,?string $newParameterFinalQuery=null) 
	{
			
		$this->parameterType=$newParameterType;
		$this->parameterInitialValue=$newParameterInitialValue;
		$this->parameterInitialTypeSign=ParameterTypeSign::$LIKE;				 
		$this->columnName=$newColumnName;
		$this->nextOperator=$newNextOperator;
		$this->isEqual=true;	
		$this->parameterInitialQuery=$newParameterInitialQuery;
		$this->parameterFinalQuery=$newParameterFinalQuery;
	}
	
	public function setParameterSelectionGeneralMayor(?string $newParameterType=null,
	    $newParameterInitialValue=null,?string $newColumnName=null,?string $newNextOperator=null) 
	{
			
	 	$this->parameterType=$newParameterType;
		$this->parameterInitialValue=$newParameterInitialValue;
		$this->parameterInitialTypeSign=ParameterTypeSign::$MAYOR;				 
		$this->columnName=$newColumnName;
		$this->nextOperator=$newNextOperator;
		$this->isEqual=true;		
	}
	 
	public function setParameterSelectionGeneralMayorIgual(?string $newParameterType=null,
	    $newParameterInitialValue=null,?string $newColumnName=null,?string $newNextOperator=null) 
	{
			
	 	$this->parameterType=$newParameterType;
		$this->parameterInitialValue=$newParameterInitialValue;
		$this->parameterInitialTypeSign=ParameterTypeSign::$MAYORIGUAL;				 
		$this->columnName=$newColumnName;
		$this->nextOperator=$newNextOperator;
		$this->isEqual=true;		
	}
	 
	public function setParameterSelectionGeneralMenor(?string $newParameterType=null,
	    $newParameterInitialValue=null,?string $newColumnName=null,?string $newNextOperator=null) 
	{
			
	 	$this->parameterType=$newParameterType;
		$this->parameterInitialValue=$newParameterInitialValue;
		$this->parameterInitialTypeSign=ParameterTypeSign::$MENOR;				 
		$this->columnName=$newColumnName;
		$this->nextOperator=$newNextOperator;
		$this->isEqual=true;		
	}
		
	public function setParameterSelectionGeneralMenorIgual(?string $newParameterType=null,
	    $newParameterInitialValue=null,?string $newColumnName=null,?string $newNextOperator=null) 
	{
			
	 	$this->parameterType=$newParameterType;
		$this->parameterInitialValue=$newParameterInitialValue;
		$this->parameterInitialTypeSign=ParameterTypeSign::$MENORIGUAL;				 
		$this->columnName=$newColumnName;
		$this->nextOperator=$newNextOperator;
		$this->isEqual=true;		
	}
	
	public function getColumnName():?string {
		return $this->columnName;
	}

	public function setColumnName(?string $columnName) {
		$this->columnName = $columnName;
	}

	public function getIsEqual():?bool {
		return $this->isEqual;
	}

	public function setEqual(?bool $isEqual) {
		$this->isEqual = $isEqual;
	}
	
	public function setNextOperator(?string $nextOperator) {
		$this->nextOperator = $nextOperator;
	}

	public function setParameterFinalTypeSign(?string $parameterFinalTypeSign)	{
		$this->parameterFinalTypeSign = $parameterFinalTypeSign;
	}

	public function getParameterFinalValue() {
		return $this->parameterFinalValue;
	}

	public function setParameterFinalValue($parameterFinalValue) {
		$this->parameterFinalValue = $parameterFinalValue;
	}

	public function setParameterInitialTypeSign(?string $parameterInitialTypeSign) {
		$this->parameterInitialTypeSign = $parameterInitialTypeSign;
	}

	public function getParameterInitialValue() {
		return $this->parameterInitialValue;
	}

	public function setParameterInitialValue($parameterInitialValue) {
		$this->parameterInitialValue = $parameterInitialValue;
	}
	
	public function getParameterType():?string {
		return $this->parameterType;
	}

	public function setParameterType(?string $newParameterType)	{
		$this->parameterType = $newParameterType;
	}

	public function getParameterInitialQuery():?string {
		return $this->parameterInitialQuery;
	}

	public function setParameterInitialQuery(?string $parameterInitialQuery) {
		$this->parameterInitialQuery = $parameterInitialQuery;
	}

	public function getParameterFinalQuery():?string {
		return $this->parameterFinalQuery;
	}

	public function setParameterFinalQuery(?string $parameterFinalQuery) {
		$this->parameterFinalQuery = $parameterFinalQuery;
	} 
	
	public function getParameterInitialTypeSign(?string $dbType=null):string {
		$strReturn="";
		
		if($dbType==null) {
			$strReturn=$this->parameterInitialTypeSign;
		} else {
			$strTypeSign="";
			$strTypeSign=$this->getParameterTypeSign($dbType,$this->parameterInitialTypeSign);
			$strReturn=$strTypeSign;
		}
		
		return $strReturn;
	}
		
	public function getParameterFinalTypeSign(?string $dbType=null):string {
		$strReturn="";
		
		if($dbType==null) {
			$strTypeSign="";
			$strTypeSign=$this->getParameterTypeSign($dbType,$this->parameterFinalTypeSign);
			$strReturn=$strTypeSign;
		} else {
			$strReturn=$this->parameterFinalTypeSign;
		}
		
		return $strReturn;	
	}
		
	public function getNextOperator(string $dbType):string {
		$strReturn="";
		
		if($dbType!=null) {
			
			if($dbType==ParameterDbType::$MYSQL) {
				if($this->nextOperator==ParameterTypeOperator::$AND)	{
					$strReturn=" and ";
				}
				
				if($this->nextOperator==ParameterTypeOperator::$OR) {
					$strReturn=" or ";
				}
				
				if($this->nextOperator==ParameterTypeOperator::$NONE) {
					$strReturn="";
				}				
			}						
		} else {
			$strReturn=$this->nextOperator;
		}
		
		return $strReturn;
	}
	
	public function getParameterTypeSign(string $dbType,string $parameterTypeSign):string {
		$strTypeSign="";
		
		if($dbType==ParameterDbType::$MYSQL) {
			if($parameterTypeSign==ParameterTypeSign::$DONTLIKE) {
				$strTypeSign=" not like ";
			}
			
			if($parameterTypeSign==ParameterTypeSign::$IGUAL) {
				$strTypeSign=" = ";
			}
			
			if($parameterTypeSign==ParameterTypeSign::$LIKE) {
				$strTypeSign=" like ";
			}
			
			if($parameterTypeSign==ParameterTypeSign::$MAYOR) {
				$strTypeSign=" > ";
			}
			
			if($parameterTypeSign==ParameterTypeSign::$MAYORIGUAL)	{
				$strTypeSign=" >= ";
			}
			
			if($parameterTypeSign==ParameterTypeSign::$MENOR) {
				$strTypeSign=" < ";
			}
			
			if($parameterTypeSign==ParameterTypeSign::$MENORIGUAL) {
				$strTypeSign=" <= ";
			}
		}
		
		return $strTypeSign;	
	}			

/*
include_once('com/bydan/framework/contabilidad/util/ParameterDbType.php');
include_once('com/bydan/framework/contabilidad/util/ParameterType.php');
include_once('com/bydan/framework/contabilidad/util/ParameterTypeSign.php');
include_once('com/bydan/framework/contabilidad/util/ParameterTypeOperator.php');
*/

//PHP5.3-use com/bydan/framework/contabilidad/util/ParameterDbType;
//PHP5.3-use com/bydan/framework/contabilidad/util/ParameterType;
//PHP5.3-use com/bydan/framework/contabilidad/util/ParameterTypeSign;
//PHP5.3-use com/bydan/framework/contabilidad/util/ParameterTypeOperator;

}
  
?>