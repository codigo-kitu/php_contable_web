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
namespace com\bydan\contabilidad\seguridad\provincia\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class provincia extends GeneralEntity {

	/*GENERAL*/
	public static string $class='provincia';
	
	/*AUXILIARES*/
	public ?provincia $provincia_Original=null;	
	public ?GeneralEntity $provincia_Additional=null;
	public array $map_provincia=array();	
		
	/*CAMPOS*/
	public int $id_pais = -1;
	public string $id_pais_Descripcion = '';

	public string $codigo = '';
	public string $nombre = '';
	
	/*FKs*/
	
	public ?pais $pais = null;
	
	/*RELACIONES*/
	
	public array $ciudads = array();
	public array $proveedors = array();
	public array $clientes = array();
	public array $datogeneralusuarios = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->provincia_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_pais=-1;
		$this->id_pais_Descripcion='';

 		$this->codigo='';
 		$this->nombre='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->pais=new pais();
		}
		
		/*RELACIONES*/
		
		$this->ciudads=array();
		$this->proveedors=array();
		$this->clientes=array();
		$this->datogeneralusuarios=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->provincia_Additional=new provincia_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_provincia() {
		$this->map_provincia = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_pais() : ?int {
		return $this->id_pais;
	}
	
	public function  getid_pais_Descripcion() : string {
		return $this->id_pais_Descripcion;
	}
    
	public function  getcodigo() : ?string {
		return $this->codigo;
	}
    
	public function  getnombre() : ?string {
		return $this->nombre;
	}
	
    
	public function setid_pais(?int $newid_pais)
	{
		try {
			if($this->id_pais!==$newid_pais) {
				if($newid_pais===null && $newid_pais!='') {
					throw new Exception('provincia:Valor nulo no permitido en columna id_pais');
				}

				if($newid_pais!==null && filter_var($newid_pais,FILTER_VALIDATE_INT)===false) {
					throw new Exception('provincia:No es numero entero - id_pais='.$newid_pais);
				}

				$this->id_pais=$newid_pais;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_pais_Descripcion(string $newid_pais_Descripcion)
	{
		try {
			if($this->id_pais_Descripcion!=$newid_pais_Descripcion) {
				if($newid_pais_Descripcion===null && $newid_pais_Descripcion!='') {
					throw new Exception('provincia:Valor nulo no permitido en columna id_pais');
				}

				$this->id_pais_Descripcion=$newid_pais_Descripcion;
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
					throw new Exception('provincia:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>50) {
					throw new Exception('provincia:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('provincia:Formato incorrecto en columna codigo='.$newcodigo);
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
					throw new Exception('provincia:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>200) {
					throw new Exception('provincia:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=200 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('provincia:Formato incorrecto en columna nombre='.$newnombre);
				}

				$this->nombre=$newnombre;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	public function getpais() : ?pais {
		return $this->pais;
	}

	
	
	public  function  setpais(?pais $pais) {
		try {
			$this->pais=$pais;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	public function getciudads() : array {
		return $this->ciudads;
	}

	public function getproveedors() : array {
		return $this->proveedors;
	}

	public function getclientes() : array {
		return $this->clientes;
	}

	public function getdato_general_usuarios() : array {
		return $this->datogeneralusuarios;
	}

	
	
	public  function  setciudads(array $ciudads) {
		try {
			$this->ciudads=$ciudads;
		} catch(Exception $e) {
			;
		}
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

	
	/*AUXILIARES*/
	public function setMap_provinciaValue(string $sKey,$oValue) {
		$this->map_provincia[$sKey]=$oValue;
	}
	
	public function getMap_provinciaValue(string $sKey) {
		return $this->map_provincia[$sKey];
	}
	
	public function getprovincia_Original() : ?provincia {
		return $this->provincia_Original;
	}
	
	public function setprovincia_Original(provincia $provincia) {
		try {
			$this->provincia_Original=$provincia;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_provincia() : array {
		return $this->map_provincia;
	}

	public function setMap_provincia(array $map_provincia) {
		$this->map_provincia = $map_provincia;
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
