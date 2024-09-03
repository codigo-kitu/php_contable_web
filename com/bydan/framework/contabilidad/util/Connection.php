<?php
namespace com\bydan\framework\contabilidad\util;

use Exception;


class Connection {
	private $mysqLink=null;
	private $autoCommit=null;
	
	function __construct($mysqLinkNew=null) {
		try	{	
			 $this->mysqLink=$mysqLinkNew;
			 $this->autoCommit=null;
		} catch(Exception $ex) {
			throw new Exception();
		}
	}
	
	public function getMysqLink() {
		return $this->mysqLink;
	}
	
	public function setMysqLink($mysqLink) {
		$this->mysqLink = $mysqLink;
	}	
	
	public function setAutoCommit($autoCommit) {
		$this->autoCommit = $autoCommit;
		
		//PASOS PARA MYSQLI
		//mysqli_autocommit($this->mysqLink,$autoCommit);
		
		//PASOS PARA MYSQL
		if(Constantes::$BIT_ES_POSTGRES==false) {
			if(Constantes::$PHP_VERSION!='7.0') {
				/*mysql_query('SET AUTOCOMMIT=0;',$this->mysqLink) or die('Query failed: ' . mysql_error());*/
			} else {
				mysqli_query($this->mysqLink,'SET AUTOCOMMIT=0;') or die('Query failed: ' . mysqli_error($this->mysqLink));
			}
			
		} else {
			pg_query($this->mysqLink,'set autocommit to off ');
		}
	}
	
	public function commit() {
		//PASOS PARA MYSQLI
		//mysqli_commit($this->mysqLink);
		
		//PASOS PARA MYSQL
		if(Constantes::$BIT_ES_POSTGRES==false) {
			if(Constantes::$PHP_VERSION!='7.0') {
				/*mysql_query('COMMIT;',$this->mysqLink) or die('Query commit failed: ' . mysql_error());*/
			
			} else {
				mysqli_query($this->mysqLink,'COMMIT;') or die('Query commit failed: ' . mysqli_error($this->mysqLink));
			}
		} else {
			pg_query($this->mysqLink,'commit');
		}
	}
	
	public function rollback() {
		//PASOS PARA MYSQLI
		//mysqli_rollback($this->mysqLink);
		
		//PASOS PARA MYSQL
		if(Constantes::$BIT_ES_POSTGRES==false) {
			if(Constantes::$PHP_VERSION!='7.0') {
				/*mysql_query('ROLLBACK;',$this->mysqLink) or die('Query rollback failed: ' . mysql_error());*/
			} else {
				mysqli_query($this->mysqLink,'ROLLBACK;') or die('Query rollback failed: ' . mysqli_error($this->mysqLink));
			}
		} else {
			pg_query($this->mysqLink,'rollback');
		}
	}
	
	public function close() {
		//PASOS CON MYSQLI
		//mysqli_close($this->mysqLink);
		
		//PASOS CON MYSQL
		if(Constantes::$BIT_ES_POSTGRES==false) {
			if(Constantes::$PHP_VERSION!='7.0') {
				/*mysql_close($this->mysqLink);*/
			} else {
				mysqli_close($this->mysqLink);
			}
		} else {
			pg_close($this->mysqLink);
		}
	}
}
?>