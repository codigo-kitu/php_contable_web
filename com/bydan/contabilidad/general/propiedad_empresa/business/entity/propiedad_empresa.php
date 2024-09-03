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
namespace com\bydan\contabilidad\general\propiedad_empresa\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class propiedad_empresa extends GeneralEntity {

	/*GENERAL*/
	public static string $class='propiedad_empresa';
	
	/*AUXILIARES*/
	public ?propiedad_empresa $propiedad_empresa_Original=null;	
	public ?GeneralEntity $propiedad_empresa_Additional=null;
	public array $map_propiedad_empresa=array();	
		
	/*CAMPOS*/
	public string $nombre_empresa = '';
	public string $calle_1 = '';
	public string $calle_2 = '';
	public string $calle_3 = '';
	public string $barrio = '';
	public string $ciudad = '';
	public string $estado = '';
	public string $codigo_postal = '';
	public string $codigo_pais = '';
	
	/*FKs*/
	
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->propiedad_empresa_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->nombre_empresa='';
 		$this->calle_1='';
 		$this->calle_2='';
 		$this->calle_3='';
 		$this->barrio='';
 		$this->ciudad='';
 		$this->estado='';
 		$this->codigo_postal='';
 		$this->codigo_pais='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->propiedad_empresa_Additional=new propiedad_empresa_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_propiedad_empresa() {
		$this->map_propiedad_empresa = array();
	}
	
	/*CAMPOS*/
    
	public function  getnombre_empresa() : ?string {
		return $this->nombre_empresa;
	}
    
	public function  getcalle_1() : ?string {
		return $this->calle_1;
	}
    
	public function  getcalle_2() : ?string {
		return $this->calle_2;
	}
    
	public function  getcalle_3() : ?string {
		return $this->calle_3;
	}
    
	public function  getbarrio() : ?string {
		return $this->barrio;
	}
    
	public function  getciudad() : ?string {
		return $this->ciudad;
	}
    
	public function  getestado() : ?string {
		return $this->estado;
	}
    
	public function  getcodigo_postal() : ?string {
		return $this->codigo_postal;
	}
    
	public function  getcodigo_pais() : ?string {
		return $this->codigo_pais;
	}
	
    
	public function setnombre_empresa(?string $newnombre_empresa)
	{
		try {
			if($this->nombre_empresa!==$newnombre_empresa) {
				if($newnombre_empresa===null && $newnombre_empresa!='') {
					throw new Exception('propiedad_empresa:Valor nulo no permitido en columna nombre_empresa');
				}

				if(strlen($newnombre_empresa)>80) {
					throw new Exception('propiedad_empresa:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=80 en columna nombre_empresa');
				}

				if(filter_var($newnombre_empresa,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('propiedad_empresa:Formato incorrecto en columna nombre_empresa='.$newnombre_empresa);
				}

				$this->nombre_empresa=$newnombre_empresa;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcalle_1(?string $newcalle_1)
	{
		try {
			if($this->calle_1!==$newcalle_1) {
				if($newcalle_1===null && $newcalle_1!='') {
					throw new Exception('propiedad_empresa:Valor nulo no permitido en columna calle_1');
				}

				if(strlen($newcalle_1)>1000) {
					throw new Exception('propiedad_empresa:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna calle_1');
				}

				if(filter_var($newcalle_1,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('propiedad_empresa:Formato incorrecto en columna calle_1='.$newcalle_1);
				}

				$this->calle_1=$newcalle_1;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcalle_2(?string $newcalle_2)
	{
		try {
			if($this->calle_2!==$newcalle_2) {
				if($newcalle_2===null && $newcalle_2!='') {
					throw new Exception('propiedad_empresa:Valor nulo no permitido en columna calle_2');
				}

				if(strlen($newcalle_2)>1000) {
					throw new Exception('propiedad_empresa:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna calle_2');
				}

				if(filter_var($newcalle_2,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('propiedad_empresa:Formato incorrecto en columna calle_2='.$newcalle_2);
				}

				$this->calle_2=$newcalle_2;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcalle_3(?string $newcalle_3)
	{
		try {
			if($this->calle_3!==$newcalle_3) {
				if($newcalle_3===null && $newcalle_3!='') {
					throw new Exception('propiedad_empresa:Valor nulo no permitido en columna calle_3');
				}

				if(strlen($newcalle_3)>1000) {
					throw new Exception('propiedad_empresa:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna calle_3');
				}

				if(filter_var($newcalle_3,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('propiedad_empresa:Formato incorrecto en columna calle_3='.$newcalle_3);
				}

				$this->calle_3=$newcalle_3;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setbarrio(?string $newbarrio)
	{
		try {
			if($this->barrio!==$newbarrio) {
				if($newbarrio===null && $newbarrio!='') {
					throw new Exception('propiedad_empresa:Valor nulo no permitido en columna barrio');
				}

				if(strlen($newbarrio)>1000) {
					throw new Exception('propiedad_empresa:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna barrio');
				}

				if(filter_var($newbarrio,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('propiedad_empresa:Formato incorrecto en columna barrio='.$newbarrio);
				}

				$this->barrio=$newbarrio;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setciudad(?string $newciudad)
	{
		try {
			if($this->ciudad!==$newciudad) {
				if($newciudad===null && $newciudad!='') {
					throw new Exception('propiedad_empresa:Valor nulo no permitido en columna ciudad');
				}

				if(strlen($newciudad)>1000) {
					throw new Exception('propiedad_empresa:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna ciudad');
				}

				if(filter_var($newciudad,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('propiedad_empresa:Formato incorrecto en columna ciudad='.$newciudad);
				}

				$this->ciudad=$newciudad;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setestado(?string $newestado)
	{
		try {
			if($this->estado!==$newestado) {
				if($newestado===null && $newestado!='') {
					throw new Exception('propiedad_empresa:Valor nulo no permitido en columna estado');
				}

				if(strlen($newestado)>1000) {
					throw new Exception('propiedad_empresa:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna estado');
				}

				if(filter_var($newestado,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('propiedad_empresa:Formato incorrecto en columna estado='.$newestado);
				}

				$this->estado=$newestado;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcodigo_postal(?string $newcodigo_postal)
	{
		try {
			if($this->codigo_postal!==$newcodigo_postal) {
				if($newcodigo_postal===null && $newcodigo_postal!='') {
					throw new Exception('propiedad_empresa:Valor nulo no permitido en columna codigo_postal');
				}

				if(strlen($newcodigo_postal)>20) {
					throw new Exception('propiedad_empresa:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=20 en columna codigo_postal');
				}

				if(filter_var($newcodigo_postal,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_POSTAL_GENERAL)))===false) {
					throw new Exception('propiedad_empresa:Formato incorrecto en columna codigo_postal='.$newcodigo_postal);
				}

				$this->codigo_postal=$newcodigo_postal;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcodigo_pais(?string $newcodigo_pais)
	{
		try {
			if($this->codigo_pais!==$newcodigo_pais) {
				if($newcodigo_pais===null && $newcodigo_pais!='') {
					throw new Exception('propiedad_empresa:Valor nulo no permitido en columna codigo_pais');
				}

				if(strlen($newcodigo_pais)>5) {
					throw new Exception('propiedad_empresa:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=5 en columna codigo_pais');
				}

				if(filter_var($newcodigo_pais,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('propiedad_empresa:Formato incorrecto en columna codigo_pais='.$newcodigo_pais);
				}

				$this->codigo_pais=$newcodigo_pais;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	
		
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_propiedad_empresaValue(string $sKey,$oValue) {
		$this->map_propiedad_empresa[$sKey]=$oValue;
	}
	
	public function getMap_propiedad_empresaValue(string $sKey) {
		return $this->map_propiedad_empresa[$sKey];
	}
	
	public function getpropiedad_empresa_Original() : ?propiedad_empresa {
		return $this->propiedad_empresa_Original;
	}
	
	public function setpropiedad_empresa_Original(propiedad_empresa $propiedad_empresa) {
		try {
			$this->propiedad_empresa_Original=$propiedad_empresa;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_propiedad_empresa() : array {
		return $this->map_propiedad_empresa;
	}

	public function setMap_propiedad_empresa(array $map_propiedad_empresa) {
		$this->map_propiedad_empresa = $map_propiedad_empresa;
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
