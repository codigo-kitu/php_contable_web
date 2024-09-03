<?php declare(strict_types = 1);
 /*
*AVISO LEGAL
(C) Copyright
*Este programa esta protegido por la ley de derechos de autor.
*La reproduccion o distribucion ilicita de este programa o de cualquiera de
*sus partes esta penado por la ley con severas sanciones civiles y penales,
*y seran objeto de todas las sanciones legales que correspondan.

*Su contenido no puede copiarse para fines comerciales o de otras,
*ni puede mostrarse, incluso en una version modificada, en otros sitios Web.
Solo esta permitido colocar hipervinculos al sitio web.
*/
namespace com\bydan\contabilidad\general\parametro_sql\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class parametro_sql extends GeneralEntity {

	/*GENERAL*/
	public static string $class='parametro_sql';
	
	/*AUXILIARES*/
	public ?parametro_sql $parametro_sql_Original=null;	
	public ?GeneralEntity $parametro_sql_Additional=null;
	public array $map_parametro_sql=array();	
		
	/*CAMPOS*/
	public string $binario1 = '';
	public string $binario2 = '';
	public string $binario3 = '';
	public string $binario4 = '';
	public string $binario5 = '';
	
	/*FKs*/
	
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->parametro_sql_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->binario1='';
 		$this->binario2='';
 		$this->binario3='';
 		$this->binario4='';
 		$this->binario5='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->parametro_sql_Additional=new parametro_sql_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_parametro_sql() {
		$this->map_parametro_sql = array();
	}
	
	/*CAMPOS*/
    
	public function  getbinario1() : ?string {
		return $this->binario1;
	}
    
	public function  getbinario2() : ?string {
		return $this->binario2;
	}
    
	public function  getbinario3() : ?string {
		return $this->binario3;
	}
    
	public function  getbinario4() : ?string {
		return $this->binario4;
	}
    
	public function  getbinario5() : ?string {
		return $this->binario5;
	}
	
    
	public function setbinario1(?string $newbinario1)
	{
		try {
			if($this->binario1!==$newbinario1) {
				if($newbinario1===null && $newbinario1!='') {
					throw new Exception('parametro_sql:Valor nulo no permitido en columna binario1');
				}

				if(strlen($newbinario1)>30) {
					throw new Exception('parametro_sql:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=30 en columna binario1');
				}

				if(filter_var($newbinario1,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('parametro_sql:Formato incorrecto en columna binario1='.$newbinario1);
				}

				$this->binario1=$newbinario1;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setbinario2(?string $newbinario2)
	{
		try {
			if($this->binario2!==$newbinario2) {
				if($newbinario2===null && $newbinario2!='') {
					throw new Exception('parametro_sql:Valor nulo no permitido en columna binario2');
				}

				if(strlen($newbinario2)>40) {
					throw new Exception('parametro_sql:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=40 en columna binario2');
				}

				if(filter_var($newbinario2,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('parametro_sql:Formato incorrecto en columna binario2='.$newbinario2);
				}

				$this->binario2=$newbinario2;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setbinario3(?string $newbinario3)
	{
		try {
			if($this->binario3!==$newbinario3) {
				if($newbinario3===null && $newbinario3!='') {
					throw new Exception('parametro_sql:Valor nulo no permitido en columna binario3');
				}

				if(strlen($newbinario3)>20) {
					throw new Exception('parametro_sql:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=20 en columna binario3');
				}

				if(filter_var($newbinario3,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('parametro_sql:Formato incorrecto en columna binario3='.$newbinario3);
				}

				$this->binario3=$newbinario3;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setbinario4(?string $newbinario4)
	{
		try {
			if($this->binario4!==$newbinario4) {
				if($newbinario4===null && $newbinario4!='') {
					throw new Exception('parametro_sql:Valor nulo no permitido en columna binario4');
				}

				if(strlen($newbinario4)>20) {
					throw new Exception('parametro_sql:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=20 en columna binario4');
				}

				if(filter_var($newbinario4,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('parametro_sql:Formato incorrecto en columna binario4='.$newbinario4);
				}

				$this->binario4=$newbinario4;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setbinario5(?string $newbinario5)
	{
		try {
			if($this->binario5!==$newbinario5) {
				if($newbinario5===null && $newbinario5!='') {
					throw new Exception('parametro_sql:Valor nulo no permitido en columna binario5');
				}

				if(strlen($newbinario5)>20) {
					throw new Exception('parametro_sql:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=20 en columna binario5');
				}

				if(filter_var($newbinario5,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('parametro_sql:Formato incorrecto en columna binario5='.$newbinario5);
				}

				$this->binario5=$newbinario5;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	
		
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_parametro_sqlValue(string $sKey,$oValue) {
		$this->map_parametro_sql[$sKey]=$oValue;
	}
	
	public function getMap_parametro_sqlValue(string $sKey) {
		return $this->map_parametro_sql[$sKey];
	}
	
	public function getparametro_sql_Original() : ?parametro_sql {
		return $this->parametro_sql_Original;
	}
	
	public function setparametro_sql_Original(parametro_sql $parametro_sql) {
		try {
			$this->parametro_sql_Original=$parametro_sql;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_parametro_sql() : array {
		return $this->map_parametro_sql;
	}

	public function setMap_parametro_sql(array $map_parametro_sql) {
		$this->map_parametro_sql = $map_parametro_sql;
	}
	
	/*
		campo1,campo2,campo3
		tabla1,tabla2,tabla3
		tablas1,tablas2,tablas3
		getcampo1,getcampo2,getcampo3
		settabla1,settabla2,settabla3
	*/
}
?>
