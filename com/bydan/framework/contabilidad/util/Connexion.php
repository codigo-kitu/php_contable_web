<?php

namespace com\bydan\framework\contabilidad\util;

use Exception;

//use com\bydan\framework\seguridad\util\Constantes;
include_once('com/bydan/framework/contabilidad/util/ConnexionType.php');
include_once('com/bydan/framework/contabilidad/util/Connection.php');
include_once('com/bydan/framework/contabilidad/util/Constantes.php');

//import java.sql.DriverManager;
//import java.sql.SQLException;
//import com.mysql.jdbc.Driver;
//PHP5.3-use com/bydan/framework/contabilidad/util/Connection;
//PHP5.3-use com/bydan/framework/contabilidad/util/ConnexionType;

class Connexion {

	private	?string $driver='';
	private	?string $schema='';
	private	?string $user='';
	private	?string $password='';
	private	?string $dbType='';
	private	?string $connexionType='';
	private ?Connection $connection;
		
	function __construct(?string $newDriver=null,?string $newSchema=null,?string $newUser=null,?string $newPassword=null,?string $newDbType=null) {// throws SQLException,Exception
		try	{	
			 $this->driver=$newDriver;
			 $this->schema=$newSchema;
			 $this->user=$newUser;
			 $this->password=$newPassword;
			 $this->dbType=$newDbType;
			 $this->connection=null;//DriverManager.getConnection(driver);
		} catch(Exception $ex) {
			throw new Exception();
		}
	}
	
	public function construct(?string $newDriver,?string $newConnexionType,?string $newDbType) {// throws SQLException,Exception
		 $strDriver="";
		 
			try	{	 
				 $this->dbType=$newDbType;
				 $this->connexionType=$newConnexionType;
				 
				 if($this->connexionType==ConnexionType::$ODBC) {
					 $strDriver="jdbc:odbc:";
				 }
				 
				 //$driverMySql=null;// new Driver();
				 
				 $this->driver= $strDriver+$newDriver;
				 //DriverManager.registerDriver(driverMySql);
				 $this->connection=new Connection();//DriverManager.getConnection(driver);
				 $this->connection->setAutoCommit(false);
			} catch(Exception $ex) {
				throw new Exception();
			}
	}
	
	public function getConnection() {
		return $this->connection;
	}
	
	public function setConnection($connection) {
		$this->connection = $connection;
	}	
	
	public function getSchema():?string {
		return $this->schema;
	}
	
	public function setSchema(?string $newSchema) {
		$this->schema = $newSchema;
	}
	
	public function getDriver():?string {
		return $this->driver;
	}
	
	public function setDriver(?string $newDriver) {
		$this->driver = $newDriver;
	}
	
	public function getPassword():?string {
		return $this->password;
	}
	
	public function setPassword(?string $newPassword) {
		$this->password = $newPassword;
	}
	
	public function getUser():?string {
		return $this->user;
	}
	
	public function setUser(?string $newUser) {
		$this->user = $newUser;
	}
	
	public function getDbType():?string {
		return $this->dbType;
	}
	
	public function setDbType(?string $tipo) {
		$this->dbType = $tipo;
	}
	
    public static function getNewSeguridadTestConnexion():Connexion {//throws SQLException,Exception
		$connexion= null;//new Connexion();
		
		try	{
			$connexion= new Connexion("MySqlOdbcTest",ConnexionType::$ODBC,ParameterDbType::$MYSQL);
		} catch(Exception $ex) {
			throw new Exception();
		}
		
		return $connexion;	
	}
	
	public static function getNewConnexion():Connexion {//throws SQLException,Exception 
		$connexion= new Connexion();
		$mysqlLink = null;
		//$strDriverJdbc32MySql= "jdbc:mysql://".Constantes::getStrConnexion().replace("////", "&");
		
		try	{
			//$connexion= new Connexion($strDriverJdbc32MySql,ConnexionType::JDBC32,ParameterDbType::MYSQL);
			
			//PASOS CON mysqli
			/*
			$mysqlLink= mysqli_connect('localhost', 'root', 'root','enviomails_dbo')
    					  or die('Error al conectarse a la base de datos: ' . mysql_error());
    		
    		$connection=new Connection($mysqlLink);
    		
    		$connexion->setConnection($connection);
    		*/
			
			//PASOS CON mysql
			
			//$mysqlLink = mysql_connect('localhost', 'bydansco', 'JESflaMEJ5@')
			
			if(Constantes::$BIT_ES_PRODUCCION==false) {
				if(Constantes::$BIT_ES_POSTGRES==false) {
					if(Constantes::$PHP_VERSION!='7.0') {
						/*
						$mysqlLink = mysql_pconnect(Constantes::$STR_CONNEXION_IP_DATABASE, Constantes::$STR_CONNEXION_USER_DATABASE, Constantes::$STR_CONNEXION_PASSWORD_DATABASE) or die('Could not connect: ' . mysqli_error($mysqlLink));
						//$result = mysql_query("SELECT 1", $mysqlLink);
						mysql_select_db(Constantes::$STR_PREFIJO_SCHEMA.Constantes::$STR_SCHEMA_SEGURIDAD) or die('Could not select database');
						//mysql_query('SET AUTOCOMMIT=0;',$mysqlLink) or die('Query failed: ' . mysql_error());
						*/
					} else {
						$mysqlLink = mysqli_connect(Constantes::$STR_CONNEXION_IP_DATABASE, Constantes::$STR_CONNEXION_USER_DATABASE, Constantes::$STR_CONNEXION_PASSWORD_DATABASE) or die('Could not connect: ' . mysqli_error($mysqlLink));
						//$result = mysql_query("SELECT 1", $mysqlLink);
						mysqli_select_db($mysqlLink,Constantes::$STR_PREFIJO_SCHEMA.Constantes::$STR_SCHEMA_SEGURIDAD) or die('Could not select database');
						
						//PERMITE TRANSACCION
						mysqli_query($mysqlLink,'SET autocommit=0;') or die('Query failed: ' . mysqli_error($mysqlLink));
						
						//INICIA TRANSACCION
						mysqli_query($mysqlLink,'START TRANSACTION;') or die('Query failed: ' . mysqli_error($mysqlLink));
					}
				} else {
				    //POSTGRES
				    
					//$st='host='.Constantes::$STR_CONNEXION_IP_DATABASE.' port='.Constantes::$STR_POSTGRES_PORT.' dbname='.Constantes::$STR_POSTGRES_DBNAME.' user='.Constantes::$STR_CONNEXION_USER_DATABASE.' password='.Constantes::$STR_CONNEXION_PASSWORD_DATABASE;
					
					$mysqlLink =pg_pconnect('host='.Constantes::$STR_CONNEXION_IP_DATABASE.' port='.Constantes::$STR_POSTGRES_PORT.' dbname='.Constantes::$STR_POSTGRES_PREFIJO_DATABASE.Constantes::$STR_POSTGRES_DBNAME.' user='.Constantes::$STR_CONNEXION_USER_DATABASE.' password='.Constantes::$STR_CONNEXION_PASSWORD_DATABASE)or die('Could not connect: ');
					
					//$er= pg_last_error($mysqlLink);
					
				}
			} else {	
				if(Constantes::$BIT_ES_POSTGRES==false) {
					if(Constantes::$PHP_VERSION!='7.0') {
						/*
						$mysqlLink = mysql_connect(Constantes::$STR_CONNEXION_IP_DATABASE, Constantes::$STR_CONNEXION_USER_DATABASE, Constantes::$STR_CONNEXION_PASSWORD_DATABASE) or die('Could not connect: ' . mysqli_error($mysqlLink));
						mysql_select_db(Constantes::$STR_PREFIJO_SCHEMA.Constantes::$STR_SCHEMA_SEGURIDAD) or die('Could not select database');
						*/
					} else {
						$mysqlLink = mysqli_connect(Constantes::$STR_CONNEXION_IP_DATABASE, Constantes::$STR_CONNEXION_USER_DATABASE, Constantes::$STR_CONNEXION_PASSWORD_DATABASE) or die('Could not connect: ' . mysqli_error($mysqlLink));
						mysqli_select_db($mysqlLink,Constantes::$STR_PREFIJO_SCHEMA.Constantes::$STR_SCHEMA_SEGURIDAD) or die('Could not select database');
					}
				} else {
				    
				    //POSTGRES
				    
					$mysqlLink =pg_pconnect('host='.Constantes::$STR_CONNEXION_IP_DATABASE.' port='.Constantes::$STR_POSTGRES_PORT.' dbname='.Constantes::$STR_POSTGRES_PREFIJO_DATABASE.Constantes::$STR_POSTGRES_DBNAME.' user='.Constantes::$STR_CONNEXION_USER_DATABASE.' password='.Constantes::$STR_CONNEXION_PASSWORD_DATABASE)or die('Could not connect: ');
					
					//$er= pg_last_error($mysqlLink);
					
				}
			}
			
			$connection=new Connection($mysqlLink);
    		
    		$connexion->setConnection($connection);
    		
    		//$connection->setAutoCommit(false);
    					  
		} catch(Exception $ex) {
			throw new Exception();
		}
		
		return $connexion;		
	}
	
	public function ejecutarQuery(string $query) {//throws SQLException,Exception
		
		try	{
			//PASOS COMMYSQLI
			/*
			$mysqli=$this->connection->getMysqLink();
			$result = mysqli_query($mysqli,$query, MYSQLI_USE_RESULT) or die('Error en el query: ' . mysql_error());
			*/
			
			//PASOS COMMYSQL
			$mysql=$this->connection->getMysqLink();
			
			$result =null;
			
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
				
				if(Constantes::$BIT_ES_POSTGRES==false) {
					if(Constantes::$PHP_VERSION!='7.0') {
						/*$result = mysql_query($query,$mysql);// or die('Query failed: ' . mysql_error());*/
					} else {
						$result = mysqli_query($mysql,$query);// or die('Query failed: ' . mysql_error());
					}
					
					if(!$result) {
						throw new Exception(mysqli_error($mysql));
					}
				} else {
					$result = pg_query($mysql,$query);// or die('Query failed: ');
					
					if(!$result) {
						throw new Exception(pg_errormessage($mysql));
					}
				}
			
			} else {
				Funciones::writeQueryFile($query);
			}
			
		} catch(Exception $ex) {
			throw $ex;
		}
		
		return $result;		
	}
	
	public function ejecutarQuerySimple(string $query) {//throws SQLException,Exception
	
		try	{
			//PASOS COMMYSQLI
			/*
			$mysqli=$this->connection->getMysqLink();
			$result = mysqli_query($mysqli,$query, MYSQLI_USE_RESULT) or die('Error en el query: ' . mysql_error());
			*/
				
			//PASOS COMMYSQL
			$mysql=$this->connection->getMysqLink();
				
			//$result =null;
				
			if(!Constantes::$IS_DEVELOPING_QUERY_EXPORT) {
	
				if(Constantes::$BIT_ES_POSTGRES==false) {
					
					if(Constantes::$PHP_VERSION!='7.0') {
						/*
						if(!mysql_query($query,$mysql)) {
							throw new Exception(mysql_error()); // or die('Query failed: ' . mysql_error());
						}
						*/
					} else {
						if(!mysqli_query($mysql,$query)) {
							throw new Exception(mysqli_error($mysql)); // or die('Query failed: ' . mysql_error());
						}
					}
					
				} else {
					if(!pg_query($mysql,$query)) {
						throw new Exception(pg_errormessage($mysql)); // or die('Query failed: ');
					}
				}
					
			} else {
				Funciones::writeQueryFile($query);
			}
				
		} catch(Exception $ex) {
			throw $ex;
		}
	
		//return $result;
	}
	
	public static function liberarResult($result) {	//throws SQLException,Exception 	
		try	{
			//PASOS CON MYSQLI
			 //$result->close();
			 
			 //PASOS CONMYSQL
			if(Constantes::$BIT_ES_POSTGRES==false) {
				if(Constantes::$PHP_VERSION!='7.0') {
			 		/*mysql_free_result($result);*/
				} else {
					mysqli_free_result($result);
				}
			} else {
				pg_free_result($result);
			}
		} catch(Exception $ex) {
			throw new Exception();
		}					
	}
	
	public static function getResultSet($result) {	//throws SQLException,Exception 	
		try	{
			//PASOS PARAMYSQLI
			//$rs=$result->fetch_array(MYSQLI_ASSOC);
			
			//PASOS PARA MYSQL
			if(Constantes::$BIT_ES_POSTGRES==false) {
				if(Constantes::$PHP_VERSION!='7.0') {
					/*$rs=mysql_fetch_array($result);*/
				} else {
					$rs=mysqli_fetch_array($result);
				}
			} else {
				$rs=pg_fetch_assoc($result);
			}
		} catch(Exception $ex) {
			throw new Exception();
		}	

		return $rs;
	}
	
	
	public static function getNewConnexionAuditoria():Connexion { //throws SQLException,Exception
		$connexion= new Connexion();
		$strDriverJdbc32MySql= "jdbc:mysql://localhost/asambleavirtualauditoria_dbo?" +  "user=root&password=";
		
		try	{
			//connexion= new Connexion("odbcAsamblea",ConnexionType.ODBC,ParameterDbType.MYSQL);
			$connexion= new Connexion($strDriverJdbc32MySql,ConnexionType::$JDBC32,ParameterDbType::$MYSQL);
		} catch(Exception $ex) {
			throw new Exception();
		}
		
		return $connexion;
	}

	public function commit() {
		try	{
			$this->getConnection()->commit();
			
		}  catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	public function rollback() {
		try	{
			$this->getConnection()->rollback();

		}  catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	public function close() {
		try	{
			$this->getConnection()->close();
			
		}  catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}

	public function begin() {
		try	{
			//$this->getConnection()->begin();
			
		}  catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
}

?>
