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
namespace com\bydan\contabilidad\seguridad\pais\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class pais extends GeneralEntity {

	/*GENERAL*/
	public static string $class='pais';
	
	/*AUXILIARES*/
	public ?pais $pais_Original=null;	
	public ?GeneralEntity $pais_Additional=null;
	public array $map_pais=array();	
		
	/*CAMPOS*/
	public string $codigo = '';
	public string $nombre = '';
	public float $iva = 0.0;
	
	/*FKs*/
	
	
	/*RELACIONES*/
	
	public array $parametrogenerals = array();
	public array $clientes = array();
	public array $proveedors = array();
	public array $datogeneralusuarios = array();
	public array $sucursals = array();
	public array $provincias = array();
	public array $empresas = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->pais_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->codigo='';
 		$this->nombre='';
 		$this->iva=0.0;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
		}
		
		/*RELACIONES*/
		
		$this->parametrogenerals=array();
		$this->clientes=array();
		$this->proveedors=array();
		$this->datogeneralusuarios=array();
		$this->sucursals=array();
		$this->provincias=array();
		$this->empresas=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->pais_Additional=new pais_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_pais() {
		$this->map_pais = array();
	}
	
	/*CAMPOS*/
    
	public function  getcodigo() : ?string {
		return $this->codigo;
	}
    
	public function  getnombre() : ?string {
		return $this->nombre;
	}
    
	public function  getiva() : ?float {
		return $this->iva;
	}
	
    
	public function setcodigo(?string $newcodigo)
	{
		try {
			if($this->codigo!==$newcodigo) {
				if($newcodigo===null && $newcodigo!='') {
					throw new Exception('pais:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>50) {
					throw new Exception('pais:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('pais:Formato incorrecto en columna codigo='.$newcodigo);
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
					throw new Exception('pais:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>200) {
					throw new Exception('pais:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=200 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('pais:Formato incorrecto en columna nombre='.$newnombre);
				}

				$this->nombre=$newnombre;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setiva(?float $newiva)
	{
		try {
			if($this->iva!==$newiva) {
				if($newiva===null && $newiva!='') {
					throw new Exception('pais:Valor nulo no permitido en columna iva');
				}

				if($newiva!=0) {
					if($newiva!==null && filter_var($newiva,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('pais:No es numero decimal - iva='.$newiva);
					}
				}

				$this->iva=$newiva;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	
		
	
	/*RELACIONES*/
	
	public function getparametro_generals() : array {
		return $this->parametrogenerals;
	}

	public function getclientes() : array {
		return $this->clientes;
	}

	public function getproveedors() : array {
		return $this->proveedors;
	}

	public function getdato_general_usuarios() : array {
		return $this->datogeneralusuarios;
	}

	public function getsucursals() : array {
		return $this->sucursals;
	}

	public function getprovincias() : array {
		return $this->provincias;
	}

	public function getempresas() : array {
		return $this->empresas;
	}

	
	
	public  function  setparametro_generals(array $parametrogenerals) {
		try {
			$this->parametrogenerals=$parametrogenerals;
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

	public  function  setproveedors(array $proveedors) {
		try {
			$this->proveedors=$proveedors;
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

	public  function  setprovincias(array $provincias) {
		try {
			$this->provincias=$provincias;
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
	public function setMap_paisValue(string $sKey,$oValue) {
		$this->map_pais[$sKey]=$oValue;
	}
	
	public function getMap_paisValue(string $sKey) {
		return $this->map_pais[$sKey];
	}
	
	public function getpais_Original() : ?pais {
		return $this->pais_Original;
	}
	
	public function setpais_Original(pais $pais) {
		try {
			$this->pais_Original=$pais;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_pais() : array {
		return $this->map_pais;
	}

	public function setMap_pais(array $map_pais) {
		$this->map_pais = $map_pais;
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
