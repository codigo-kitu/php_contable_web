<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\business\logic;

use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\ParameterDbType;
use com\bydan\framework\contabilidad\util\ParameterType;
use com\bydan\framework\contabilidad\util\Connexion;

class QueryWhereSelectParameters {
    
	private string $initialQuery='';
	private string $finalQuery='';
	private string $selectQuery='';
	private bool $isAll=false;
	private string $dbType='';
    private ?Pagination $pagination=null;
    
	private	array $parametersSelectionGeneral;
	public ?Connexion $connexion=null;
	
	function __construct(string $newDbType='',string $newInitialQuery="",string $newFinalQuery="",bool $newIsAll=false)	{ 
		if($newDbType==null){
		    $newDbType=ParameterDbType::$MYSQL;
		}
		
		$this->initialQuery=$newInitialQuery;
		$this->finalQuery=$newFinalQuery;
		$this->dbType=$newDbType;
		$this->parametersSelectionGeneral=array();
		$this->isAll=$newIsAll;
		$this->pagination=new Pagination();
		$this->selectQuery='';
	}
	
	public function getConnexion():?Connexion {
		return $this->connexion;
	}
	
	public function setConnexion(?Connexion $newConnexion) {
		$this->connexion =$newConnexion;
	}
	
	public function getPagination():Pagination {
		return $this->pagination;
	}

	public function setPagination(Pagination $newPagination) {
		$this->pagination =$newPagination;
	}
	
	public function getInitialQuery():string {
		return $this->initialQuery;
	}

	public function setInitialQuery(string $initialQuery) {
		$this->initialQuery = $initialQuery;
	}
	
	public function setAll(bool $isAll) {
		$this->isAll = $isAll;
	}
	
	public function getDbType():string { 
		 return $this->dbType; 
	}
	
	public function setDbType(string $newDbType) { 
	   $this->dbType = $newDbType; 
	}
	
	public function getIsAll():bool {
		return $this->isAll;
	}
	
	public function setIsAll(bool $isAll) {
		$this->isAll = $isAll;
	}
	
	public function getFinalQuery():string	{
		//FINAL QUERY MAS QUERY PAGINACION
		return $this->finalQuery.$this->getPaginationFinalQuery();
	}
	
	public function getFinalQueryValidate(string $select_query):string	{				
		//FINAL QUERY MAS QUERY PAGINACION
		$existe_where=false;
		$existe_where_finalquery=false;
		$existe_and_finalquery=false;
		
		if (strpos($select_query,'where') !== false) {
    		$existe_where=true;
    		
		} else if (strpos($select_query,'WHERE') !== false) {
    		$existe_where=true;
		}
		
		if(!$existe_where) {
			if (strpos($this->finalQuery,'and') !== false) {
	    		$existe_and_finalquery=true;
	    		
			} else if (strpos($this->finalQuery,'AND') !== false) {
	    		$existe_and_finalquery=true;
			}
			
			if($existe_and_finalquery) {								
				if (strpos($this->finalQuery,'where') !== false) {
		    		$existe_where_finalquery=true;
		    		
				} else if (strpos($this->finalQuery,'WHERE') !== false) {
		    		$existe_where_finalquery=true;
				}
		
				if(!$existe_where_finalquery) {
					$this->finalQuery=str_replace("and","",$this->finalQuery);
					$this->finalQuery=str_replace("AND","",$this->finalQuery);
				
					$this->finalQuery='where '.$this->finalQuery;
				}
			}
		}
		
		$this->finalQuery=' '.$this->finalQuery.' ';
		
		return $this->finalQuery.$this->getPaginationFinalQuery();
	}
	
	public function setFinalQuery(string $finalQuery) {
		$this->finalQuery = $finalQuery;
	}
	
	public function setSelectQuery(string $selectQuery) {
		$this->selectQuery = $selectQuery;
	}
	
	public function getSelectQuery():string {		
		return $this->selectQuery;
	}
	
	public function getParametersSelectionGeneral():array{
		return $this->parametersSelectionGeneral;
	}
	
	public function setParametersSelectionGeneral(array $parametersSelectionGeneral) {
		$this->parametersSelectionGeneral = $parametersSelectionGeneral;
	}
	
	public function addParameter(ParameterSelectionGeneral $parameterSelectionGeneral) {
		$this->parametersSelectionGeneral[]=$parameterSelectionGeneral;
	}

	public function getQueryWhereSelectParameters():string {
		$query="";
		
		if(!$this->isAll)	{	
			foreach($this->parametersSelectionGeneral as $parameterSelectionGeneral) {
				if($this->dbType==ParameterDbType::$MYSQL) {				
					$query=$query.$this->addMYSQLParameterQuery($parameterSelectionGeneral);
				}
			}
		}
		
		return $query;
	}
	
	public function addMYSQLParameterQuery($parameterSelectionGeneral):string {
		$queryParameter='';
		$queryParameter=$queryParameter.' ('.$parameterSelectionGeneral->getColumnName();
		
		if($parameterSelectionGeneral->getIsEqual()==true) {				
			if($parameterSelectionGeneral->getParameterType()==ParameterType::$BIGDECIMAL||
			   $parameterSelectionGeneral->getParameterType()==ParameterType::$FLOAT||
			   $parameterSelectionGeneral->getParameterType()==ParameterType::$DOUBLE||
			   $parameterSelectionGeneral->getParameterType()==ParameterType::$BOOLEAN||
			   $parameterSelectionGeneral->getParameterType()==ParameterType::$DATE||
			   $parameterSelectionGeneral->getParameterType()==ParameterType::$INT||
			   $parameterSelectionGeneral->getParameterType()==ParameterType::$LONG||
			   $parameterSelectionGeneral->getParameterType()==ParameterType::$TIME||
			   $parameterSelectionGeneral->getParameterType()==ParameterType::$TIMESTAMP)
			{
				//$queryParameter=$queryParameter.' = ';
				$queryParameter=$queryParameter.' '.$parameterSelectionGeneral->getParameterInitialTypeSign(ParameterDbType::$MYSQL);
				$queryParameter=$queryParameter.$parameterSelectionGeneral->getParameterInitialValue();
				$queryParameter=$queryParameter.' ) '.$parameterSelectionGeneral->getNextOperator(ParameterDbType::$MYSQL);				
			}
			
			if($parameterSelectionGeneral->getParameterType()==ParameterType::$STRING) {
				$queryParameter=$queryParameter." like '";
				$queryParameter=$queryParameter.Funciones::GetRealScapeString($parameterSelectionGeneral->getParameterInitialValue(),$this->connexion);
				$queryParameter=$queryParameter."'";
				$queryParameter=$queryParameter.' ) '.$parameterSelectionGeneral->getNextOperator(ParameterDbType::$MYSQL);				
			}					
		} else {
			if($parameterSelectionGeneral->getParameterType()==ParameterType::$BIGDECIMAL||
					   $parameterSelectionGeneral->getParameterType()==ParameterType::$FLOAT||
					   $parameterSelectionGeneral->getParameterType()==ParameterType::$DOUBLE||
					   $parameterSelectionGeneral->getParameterType()==ParameterType::$BOOLEAN||
					   $parameterSelectionGeneral->getParameterType()==ParameterType::$DATE||
					   $parameterSelectionGeneral->getParameterType()==ParameterType::$INT||
					   $parameterSelectionGeneral->getParameterType()==ParameterType::$LONG||
					   $parameterSelectionGeneral->getParameterType()==ParameterType::$TIME||
					   $parameterSelectionGeneral->getParameterType()==ParameterType::$TIMESTAMP)
			{
				$queryParameter=$parameterSelectionGeneral->getParameterInitialTypeSign(ParameterDbType::$MYSQL);
				$queryParameter=$queryParameter.' '.$parameterSelectionGeneral->getParameterInitialValue();		
				$queryParameter=$queryParameter.' and '. $parameterSelectionGeneral->getColumnName();
				$queryParameter=$queryParameter.' '.$parameterSelectionGeneral->getParameterFinalTypeSign(ParameterDbType::$MYSQL);
				$queryParameter=$queryParameter.' '.$parameterSelectionGeneral->getParameterFinalValue().' )';						
				$queryParameter=$queryParameter.' '.$parameterSelectionGeneral->getNextOperator(ParameterDbType::$MYSQL);					
			}
					
			if($parameterSelectionGeneral->getParameterType()==ParameterType::$STRING) {
				$queryParameter=$parameterSelectionGeneral->getParameterInitialTypeSign(ParameterDbType::$MYSQL);
				$queryParameter=$queryParameter." '".Funciones::GetRealScapeString($parameterSelectionGeneral->getParameterInitialValue(),$this->connexion)."'";		
				$queryParameter=$queryParameter.' and '. $parameterSelectionGeneral->getColumnName();
				$queryParameter=$queryParameter.' '.$parameterSelectionGeneral->getParameterFinalTypeSign(ParameterDbType::$MYSQL);
				$queryParameter=$queryParameter." '".Funciones::GetRealScapeString($parameterSelectionGeneral->getParameterFinalValue(),$this->connexion)."' )";							
				$queryParameter=$queryParameter.' '.$parameterSelectionGeneral->getNextOperator(ParameterDbType::$MYSQL);					
			}
		}
		
		return $parameterSelectionGeneral->getParameterInitialQuery().' '.$queryParameter.' '.$parameterSelectionGeneral->getParameterFinalQuery().' ';
	}
	
	public function getPaginationFinalQuery():string {
		$strQueryPagination='';
		
		if($this->pagination!=null && $this->pagination->getIntFirstResult()>0 && $this->pagination->getIntMaxResults()>-1) {
			if($this->dbType==ParameterDbType::$MYSQL) {
				if(!$this->pagination->getBlnConNumeroMaximo()) {
					$strQueryPagination=' limit '.$this->pagination->getIntFirstResult().' offset '.$this->pagination->getIntMaxResults();
				 }
			}
		}
		
		return $strQueryPagination;
	}
	
	public static function getPaginationFinalQueryWithPaginationWithDbType(Pagination $pagination,?string $dbType):string	{
		$strQueryPagination='';
		
		if($pagination!=null && $pagination->getIntFirstResult()>-1 && $pagination->getIntMaxResults()>0) {
			if($dbType==ParameterDbType::$MYSQL) {	
				$strQueryPagination=" limit "+$pagination->getIntMaxResults()+" offset "+$pagination->getIntFirstResult();
			
			} else if($dbType==ParameterDbType::$POSTGRES) {
				$strQueryPagination=" limit "+$pagination->getIntMaxResults()+" offset "+$pagination->getIntFirstResult();
			}
		}
		
		return $strQueryPagination;
	}

/*
include_once('com/bydan/framework/contabilidad/util/ParameterDbType.php');
include_once('com/bydan/framework/contabilidad/util/ParameterDbType.php');
include_once('com/bydan/framework/contabilidad/business/logic/Pagination.php');
*/

//PHP5.3-use com/bydan/framework/contabilidad/util/ParameterDbType;
//PHP5.3-use com/bydan/framework/contabilidad/util/ParameterType;
//PHP5.3-use com/bydan/framework/contabilidad/business/logic/Pagination;

}
?>