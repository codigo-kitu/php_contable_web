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
namespace com\bydan\contabilidad\seguridad\ciudad\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class ciudad extends GeneralEntity {

	/*GENERAL*/
	public static string $class='ciudad';
	
	/*AUXILIARES*/
	public ?ciudad $ciudad_Original=null;	
	public ?GeneralEntity $ciudad_Additional=null;
	public array $map_ciudad=array();	
		
	/*CAMPOS*/
	public int $id_provincia = -1;
	public string $id_provincia_Descripcion = '';

	public string $codigo = '';
	public string $nombre = '';
	
	/*FKs*/
	
	public ?provincia $provincia = null;
	
	/*RELACIONES*/
	
	public array $proveedors = array();
	public array $clientes = array();
	public array $datogeneralusuarios = array();
	public array $sucursals = array();
	public array $empresas = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->ciudad_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_provincia=-1;
		$this->id_provincia_Descripcion='';

 		$this->codigo='';
 		$this->nombre='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->provincia=new provincia();
		}
		
		/*RELACIONES*/
		
		$this->proveedors=array();
		$this->clientes=array();
		$this->datogeneralusuarios=array();
		$this->sucursals=array();
		$this->empresas=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->ciudad_Additional=new ciudad_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_ciudad() {
		$this->map_ciudad = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_provincia() : ?int {
		return $this->id_provincia;
	}
	
	public function  getid_provincia_Descripcion() : string {
		return $this->id_provincia_Descripcion;
	}
    
	public function  getcodigo() : ?string {
		return $this->codigo;
	}
    
	public function  getnombre() : ?string {
		return $this->nombre;
	}
	
    
	public function setid_provincia(?int $newid_provincia)
	{
		try {
			if($this->id_provincia!==$newid_provincia) {
				if($newid_provincia===null && $newid_provincia!='') {
					throw new Exception('ciudad:Valor nulo no permitido en columna id_provincia');
				}

				if($newid_provincia!==null && filter_var($newid_provincia,FILTER_VALIDATE_INT)===false) {
					throw new Exception('ciudad:No es numero entero - id_provincia='.$newid_provincia);
				}

				$this->id_provincia=$newid_provincia;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_provincia_Descripcion(string $newid_provincia_Descripcion)
	{
		try {
			if($this->id_provincia_Descripcion!=$newid_provincia_Descripcion) {
				if($newid_provincia_Descripcion===null && $newid_provincia_Descripcion!='') {
					throw new Exception('ciudad:Valor nulo no permitido en columna id_provincia');
				}

				$this->id_provincia_Descripcion=$newid_provincia_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcodigo(?string $newcodigo)
	{
		try {
			if($this->codigo!==$newcodigo) {
				if($newcodigo===null && $newcodigo!='') {
					throw new Exception('ciudad:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>50) {
					throw new Exception('ciudad:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('ciudad:Formato incorrecto en columna codigo='.$newcodigo);
				}

				$this->codigo=$newcodigo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnombre(?string $newnombre)
	{
		try {
			if($this->nombre!==$newnombre) {
				if($newnombre===null && $newnombre!='') {
					throw new Exception('ciudad:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>200) {
					throw new Exception('ciudad:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=200 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('ciudad:Formato incorrecto en columna nombre='.$newnombre);
				}

				$this->nombre=$newnombre;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	public function getprovincia() : ?provincia {
		return $this->provincia;
	}

	
	
	public  function  setprovincia(?provincia $provincia) {
		try {
			$this->provincia=$provincia;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	public function getproveedors() : array {
		return $this->proveedors;
	}

	public function getclientes() : array {
		return $this->clientes;
	}

	public function getdato_general_usuarios() : array {
		return $this->datogeneralusuarios;
	}

	public function getsucursals() : array {
		return $this->sucursals;
	}

	public function getempresas() : array {
		return $this->empresas;
	}

	
	
	public  function  setproveedors(array $proveedors) {
		try {
			$this->proveedors=$proveedors;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setclientes(array $clientes) {
		try {
			$this->clientes=$clientes;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setdato_general_usuarios(array $datogeneralusuarios) {
		try {
			$this->datogeneralusuarios=$datogeneralusuarios;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setsucursals(array $sucursals) {
		try {
			$this->sucursals=$sucursals;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setempresas(array $empresas) {
		try {
			$this->empresas=$empresas;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_ciudadValue(string $sKey,$oValue) {
		$this->map_ciudad[$sKey]=$oValue;
	}
	
	public function getMap_ciudadValue(string $sKey) {
		return $this->map_ciudad[$sKey];
	}
	
	public function getciudad_Original() : ?ciudad {
		return $this->ciudad_Original;
	}
	
	public function setciudad_Original(ciudad $ciudad) {
		try {
			$this->ciudad_Original=$ciudad;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_ciudad() : array {
		return $this->map_ciudad;
	}

	public function setMap_ciudad(array $map_ciudad) {
		$this->map_ciudad = $map_ciudad;
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
