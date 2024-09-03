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
namespace com\bydan\contabilidad\seguridad\municipio\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class municipio extends GeneralEntity {

	/*GENERAL*/
	public static string $class='municipio';
	
	/*AUXILIARES*/
	public ?municipio $municipio_Original=null;	
	public ?GeneralEntity $municipio_Additional=null;
	public array $map_municipio=array();	
		
	/*CAMPOS*/
	public string $codigo = '';
	public string $municipio = '';
	public string $departamento = '';
	public string $codigo_departamento = '';
	public string $codigo_municipio = '';
	
	/*FKs*/
	
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->municipio_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->codigo='';
 		$this->municipio='';
 		$this->departamento='';
 		$this->codigo_departamento='';
 		$this->codigo_municipio='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->municipio_Additional=new municipio_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_municipio() {
		$this->map_municipio = array();
	}
	
	/*CAMPOS*/
    
	public function  getcodigo() : ?string {
		return $this->codigo;
	}
    
	public function  getmunicipio() : ?string {
		return $this->municipio;
	}
    
	public function  getdepartamento() : ?string {
		return $this->departamento;
	}
    
	public function  getcodigo_departamento() : ?string {
		return $this->codigo_departamento;
	}
    
	public function  getcodigo_municipio() : ?string {
		return $this->codigo_municipio;
	}
	
    
	public function setcodigo(?string $newcodigo)
	{
		try {
			if($this->codigo!==$newcodigo) {
				if($newcodigo===null && $newcodigo!='') {
					throw new Exception('municipio:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>10) {
					throw new Exception('municipio:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=10 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('municipio:Formato incorrecto en columna codigo='.$newcodigo);
				}

				$this->codigo=$newcodigo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setmunicipio(?string $newmunicipio)
	{
		try {
			if($this->municipio!==$newmunicipio) {
				if($newmunicipio===null && $newmunicipio!='') {
					throw new Exception('municipio:Valor nulo no permitido en columna municipio');
				}

				if(strlen($newmunicipio)>50) {
					throw new Exception('municipio:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna municipio');
				}

				if(filter_var($newmunicipio,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('municipio:Formato incorrecto en columna municipio='.$newmunicipio);
				}

				$this->municipio=$newmunicipio;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdepartamento(?string $newdepartamento)
	{
		try {
			if($this->departamento!==$newdepartamento) {
				if($newdepartamento===null && $newdepartamento!='') {
					throw new Exception('municipio:Valor nulo no permitido en columna departamento');
				}

				if(strlen($newdepartamento)>50) {
					throw new Exception('municipio:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna departamento');
				}

				if(filter_var($newdepartamento,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('municipio:Formato incorrecto en columna departamento='.$newdepartamento);
				}

				$this->departamento=$newdepartamento;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcodigo_departamento(?string $newcodigo_departamento)
	{
		try {
			if($this->codigo_departamento!==$newcodigo_departamento) {
				if($newcodigo_departamento===null && $newcodigo_departamento!='') {
					throw new Exception('municipio:Valor nulo no permitido en columna codigo_departamento');
				}

				if(strlen($newcodigo_departamento)>4) {
					throw new Exception('municipio:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=4 en columna codigo_departamento');
				}

				if(filter_var($newcodigo_departamento,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('municipio:Formato incorrecto en columna codigo_departamento='.$newcodigo_departamento);
				}

				$this->codigo_departamento=$newcodigo_departamento;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcodigo_municipio(?string $newcodigo_municipio)
	{
		try {
			if($this->codigo_municipio!==$newcodigo_municipio) {
				if($newcodigo_municipio===null && $newcodigo_municipio!='') {
					throw new Exception('municipio:Valor nulo no permitido en columna codigo_municipio');
				}

				if(strlen($newcodigo_municipio)>4) {
					throw new Exception('municipio:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=4 en columna codigo_municipio');
				}

				if(filter_var($newcodigo_municipio,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('municipio:Formato incorrecto en columna codigo_municipio='.$newcodigo_municipio);
				}

				$this->codigo_municipio=$newcodigo_municipio;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	
		
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_municipioValue(string $sKey,$oValue) {
		$this->map_municipio[$sKey]=$oValue;
	}
	
	public function getMap_municipioValue(string $sKey) {
		return $this->map_municipio[$sKey];
	}
	
	public function getmunicipio_Original() : ?municipio {
		return $this->municipio_Original;
	}
	
	public function setmunicipio_Original(municipio $municipio) {
		try {
			$this->municipio_Original=$municipio;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_municipio() : array {
		return $this->map_municipio;
	}

	public function setMap_municipio(array $map_municipio) {
		$this->map_municipio = $map_municipio;
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
