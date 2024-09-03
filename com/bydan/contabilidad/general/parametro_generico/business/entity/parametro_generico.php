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
namespace com\bydan\contabilidad\general\parametro_generico\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class parametro_generico extends GeneralEntity {

	/*GENERAL*/
	public static string $class='parametro_generico';
	
	/*AUXILIARES*/
	public ?parametro_generico $parametro_generico_Original=null;	
	public ?GeneralEntity $parametro_generico_Additional=null;
	public array $map_parametro_generico=array();	
		
	/*CAMPOS*/
	public string $parametro = '';
	public string $descripcion_pantalla = '';
	public string $valor_caracteristica = '';
	public string $valor2_caracteristica = '';
	public string $valor3_caracteristica = '';
	public string $valor_fecha = '';
	public float $valor_numerico = 0.0;
	public float $valor2_numerico = 0.0;
	public string $valor_binario = '';
	
	/*FKs*/
	
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->parametro_generico_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->parametro='';
 		$this->descripcion_pantalla='';
 		$this->valor_caracteristica='';
 		$this->valor2_caracteristica='';
 		$this->valor3_caracteristica='';
 		$this->valor_fecha=date('Y-m-d');
 		$this->valor_numerico=0.0;
 		$this->valor2_numerico=0.0;
 		$this->valor_binario='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->parametro_generico_Additional=new parametro_generico_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_parametro_generico() {
		$this->map_parametro_generico = array();
	}
	
	/*CAMPOS*/
    
	public function  getparametro() : ?string {
		return $this->parametro;
	}
    
	public function  getdescripcion_pantalla() : ?string {
		return $this->descripcion_pantalla;
	}
    
	public function  getvalor_caracteristica() : ?string {
		return $this->valor_caracteristica;
	}
    
	public function  getvalor2_caracteristica() : ?string {
		return $this->valor2_caracteristica;
	}
    
	public function  getvalor3_caracteristica() : ?string {
		return $this->valor3_caracteristica;
	}
    
	public function  getvalor_fecha() : ?string {
		return $this->valor_fecha;
	}
    
	public function  getvalor_numerico() : ?float {
		return $this->valor_numerico;
	}
    
	public function  getvalor2_numerico() : ?float {
		return $this->valor2_numerico;
	}
    
	public function  getvalor_binario() : ?string {
		return $this->valor_binario;
	}
	
    
	public function setparametro(?string $newparametro)
	{
		try {
			if($this->parametro!==$newparametro) {
				if($newparametro===null && $newparametro!='') {
					throw new Exception('parametro_generico:Valor nulo no permitido en columna parametro');
				}

				if(strlen($newparametro)>30) {
					throw new Exception('parametro_generico:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=30 en columna parametro');
				}

				if(filter_var($newparametro,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('parametro_generico:Formato incorrecto en columna parametro='.$newparametro);
				}

				$this->parametro=$newparametro;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdescripcion_pantalla(?string $newdescripcion_pantalla)
	{
		try {
			if($this->descripcion_pantalla!==$newdescripcion_pantalla) {
				if($newdescripcion_pantalla===null && $newdescripcion_pantalla!='') {
					throw new Exception('parametro_generico:Valor nulo no permitido en columna descripcion_pantalla');
				}

				if(strlen($newdescripcion_pantalla)>1000) {
					throw new Exception('parametro_generico:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna descripcion_pantalla');
				}

				if(filter_var($newdescripcion_pantalla,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('parametro_generico:Formato incorrecto en columna descripcion_pantalla='.$newdescripcion_pantalla);
				}

				$this->descripcion_pantalla=$newdescripcion_pantalla;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setvalor_caracteristica(?string $newvalor_caracteristica)
	{
		try {
			if($this->valor_caracteristica!==$newvalor_caracteristica) {
				if($newvalor_caracteristica===null && $newvalor_caracteristica!='') {
					throw new Exception('parametro_generico:Valor nulo no permitido en columna valor_caracteristica');
				}

				if(strlen($newvalor_caracteristica)>1000) {
					throw new Exception('parametro_generico:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna valor_caracteristica');
				}

				if(filter_var($newvalor_caracteristica,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('parametro_generico:Formato incorrecto en columna valor_caracteristica='.$newvalor_caracteristica);
				}

				$this->valor_caracteristica=$newvalor_caracteristica;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setvalor2_caracteristica(?string $newvalor2_caracteristica)
	{
		try {
			if($this->valor2_caracteristica!==$newvalor2_caracteristica) {
				if($newvalor2_caracteristica===null && $newvalor2_caracteristica!='') {
					throw new Exception('parametro_generico:Valor nulo no permitido en columna valor2_caracteristica');
				}

				if(strlen($newvalor2_caracteristica)>254) {
					throw new Exception('parametro_generico:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=254 en columna valor2_caracteristica');
				}

				if(filter_var($newvalor2_caracteristica,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('parametro_generico:Formato incorrecto en columna valor2_caracteristica='.$newvalor2_caracteristica);
				}

				$this->valor2_caracteristica=$newvalor2_caracteristica;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setvalor3_caracteristica(?string $newvalor3_caracteristica)
	{
		try {
			if($this->valor3_caracteristica!==$newvalor3_caracteristica) {
				if($newvalor3_caracteristica===null && $newvalor3_caracteristica!='') {
					throw new Exception('parametro_generico:Valor nulo no permitido en columna valor3_caracteristica');
				}

				if(strlen($newvalor3_caracteristica)>1000) {
					throw new Exception('parametro_generico:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna valor3_caracteristica');
				}

				if(filter_var($newvalor3_caracteristica,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('parametro_generico:Formato incorrecto en columna valor3_caracteristica='.$newvalor3_caracteristica);
				}

				$this->valor3_caracteristica=$newvalor3_caracteristica;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setvalor_fecha(?string $newvalor_fecha)
	{
		try {
			if($this->valor_fecha!==$newvalor_fecha) {
				if($newvalor_fecha===null && $newvalor_fecha!='') {
					throw new Exception('parametro_generico:Valor nulo no permitido en columna valor_fecha');
				}

				if($newvalor_fecha!==null && filter_var($newvalor_fecha,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('parametro_generico:No es fecha - valor_fecha='.$newvalor_fecha);
				}

				$this->valor_fecha=$newvalor_fecha;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setvalor_numerico(?float $newvalor_numerico)
	{
		try {
			if($this->valor_numerico!==$newvalor_numerico) {
				if($newvalor_numerico===null && $newvalor_numerico!='') {
					throw new Exception('parametro_generico:Valor nulo no permitido en columna valor_numerico');
				}

				if($newvalor_numerico!=0) {
					if($newvalor_numerico!==null && filter_var($newvalor_numerico,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('parametro_generico:No es numero decimal - valor_numerico='.$newvalor_numerico);
					}
				}

				$this->valor_numerico=$newvalor_numerico;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setvalor2_numerico(?float $newvalor2_numerico)
	{
		try {
			if($this->valor2_numerico!==$newvalor2_numerico) {
				if($newvalor2_numerico===null && $newvalor2_numerico!='') {
					throw new Exception('parametro_generico:Valor nulo no permitido en columna valor2_numerico');
				}

				if($newvalor2_numerico!=0) {
					if($newvalor2_numerico!==null && filter_var($newvalor2_numerico,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('parametro_generico:No es numero decimal - valor2_numerico='.$newvalor2_numerico);
					}
				}

				$this->valor2_numerico=$newvalor2_numerico;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setvalor_binario(?string $newvalor_binario)
	{
		try {
			if($this->valor_binario!==$newvalor_binario) {
				if($newvalor_binario===null && $newvalor_binario!='') {
					throw new Exception('parametro_generico:Valor nulo no permitido en columna valor_binario');
				}

				if(strlen($newvalor_binario)>1000) {
					throw new Exception('parametro_generico:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna valor_binario');
				}

				if(filter_var($newvalor_binario,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('parametro_generico:Formato incorrecto en columna valor_binario='.$newvalor_binario);
				}

				$this->valor_binario=$newvalor_binario;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	
		
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_parametro_genericoValue(string $sKey,$oValue) {
		$this->map_parametro_generico[$sKey]=$oValue;
	}
	
	public function getMap_parametro_genericoValue(string $sKey) {
		return $this->map_parametro_generico[$sKey];
	}
	
	public function getparametro_generico_Original() : ?parametro_generico {
		return $this->parametro_generico_Original;
	}
	
	public function setparametro_generico_Original(parametro_generico $parametro_generico) {
		try {
			$this->parametro_generico_Original=$parametro_generico;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_parametro_generico() : array {
		return $this->map_parametro_generico;
	}

	public function setMap_parametro_generico(array $map_parametro_generico) {
		$this->map_parametro_generico = $map_parametro_generico;
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
