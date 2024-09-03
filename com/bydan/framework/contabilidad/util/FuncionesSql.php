<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\util;

class FuncionesSql {

	public static function getOrderSqlFromFinalQuery(string $sFinalQuery,string $sSelectQuery):string {
		$sOrderQuery='';
		
		if(!(strpos($sSelectQuery,"order")!== false)) {
			if(strpos($sFinalQuery,"order")!== false) {
				//$sOrderQuery=sFinalQuery.substring(sFinalQuery.lastIndexOf("order"));				  
				$sOrderQuery=substr($sFinalQuery, 0,strrpos($sFinalQuery,"order"));								
				$sOrderQuery=' '.$sOrderQuery;
			} 
		} 	
		
		return $sOrderQuery;
	}
	
	public static function getReplaceForPreparedQuery(string $sSelectQuery):string {
		
		$sSelectQuery=str_replace("%d","?",$sSelectQuery);
		$sSelectQuery=str_replace("%f","?",$sSelectQuery);
		$sSelectQuery=str_replace("%s","?",$sSelectQuery);
		$sSelectQuery=str_replace("'","",$sSelectQuery);
		
		//$sSelectQuery=str_replace("\'%s\'","?",$sSelectQuery);
		//$sSelectQuery=str_replace("\'%d\'","?",$sSelectQuery);
				
		return $sSelectQuery;
	}
	
	public static function GetCalcFunctionQuery(string $type,string $column,string $alias,string $table,string $where):string {
	    $schema=Constantes::$STR_SCHEMA;
	    
	    $query="select $type($column) as $alias from  $schema.$table where $where";
	    
	    return $query;
	}
}

?>