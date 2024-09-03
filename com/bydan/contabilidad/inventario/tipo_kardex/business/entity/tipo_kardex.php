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
namespace com\bydan\contabilidad\inventario\tipo_kardex\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class tipo_kardex extends GeneralEntity {

	/*GENERAL*/
	public static string $class='tipo_kardex';
	
	/*AUXILIARES*/
	public ?tipo_kardex $tipo_kardex_Original=null;	
	public ?GeneralEntity $tipo_kardex_Additional=null;
	public array $map_tipo_kardex=array();	
		
	/*CAMPOS*/
	public string $codigo = '';
	public string $nombre = '';
	
	/*FKs*/
	
	
	/*RELACIONES*/
	
	public array $parametroinventarios = array();
	public array $kardexs = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(false);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->tipo_kardex_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->codigo='';
 		$this->nombre='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
		}
		
		/*RELACIONES*/
		
		$this->parametroinventarios=array();
		$this->kardexs=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->tipo_kardex_Additional=new tipo_kardex_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_tipo_kardex() {
		$this->map_tipo_kardex = array();
	}
	
	/*CAMPOS*/
    
	public function  getcodigo() : ?string {
		return $this->codigo;
	}
    
	public function  getnombre() : ?string {
		return $this->nombre;
	}
	
    
	public function setcodigo(?string $newcodigo)
	{
		try {
			if($this->codigo!==$newcodigo) {
				if($newcodigo===null && $newcodigo!='') {
					throw new Exception('tipo_kardex:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>25) {
					throw new Exception('tipo_kardex:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=25 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('tipo_kardex:Formato incorrecto en columna codigo='.$newcodigo);
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
					throw new Exception('tipo_kardex:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>50) {
					throw new Exception('tipo_kardex:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('tipo_kardex:Formato incorrecto en columna nombre='.$newnombre);
				}

				$this->nombre=$newnombre;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	
		
	
	/*RELACIONES*/
	
	public function getparametro_inventarios() : array {
		return $this->parametroinventarios;
	}

	public function getkardexs() : array {
		return $this->kardexs;
	}

	
	
	public  function  setparametro_inventarios(array $parametroinventarios) {
		try {
			$this->parametroinventarios=$parametroinventarios;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setkardexs(array $kardexs) {
		try {
			$this->kardexs=$kardexs;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_tipo_kardexValue(string $sKey,$oValue) {
		$this->map_tipo_kardex[$sKey]=$oValue;
	}
	
	public function getMap_tipo_kardexValue(string $sKey) {
		return $this->map_tipo_kardex[$sKey];
	}
	
	public function gettipo_kardex_Original() : ?tipo_kardex {
		return $this->tipo_kardex_Original;
	}
	
	public function settipo_kardex_Original(tipo_kardex $tipo_kardex) {
		try {
			$this->tipo_kardex_Original=$tipo_kardex;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_tipo_kardex() : array {
		return $this->map_tipo_kardex;
	}

	public function setMap_tipo_kardex(array $map_tipo_kardex) {
		$this->map_tipo_kardex = $map_tipo_kardex;
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
