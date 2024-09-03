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
namespace com\bydan\contabilidad\contabilidad\fuente\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class fuente extends GeneralEntity {

	/*GENERAL*/
	public static string $class='fuente';
	
	/*AUXILIARES*/
	public ?fuente $fuente_Original=null;	
	public ?GeneralEntity $fuente_Additional=null;
	public array $map_fuente=array();	
		
	/*CAMPOS*/
	public string $codigo = '';
	public string $nombre = '';
	
	/*FKs*/
	
	
	/*RELACIONES*/
	
	public array $asientopredefinidos = array();
	public array $asientoautomaticos = array();
	public array $asientos = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(false);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->fuente_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->codigo='';
 		$this->nombre='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
		}
		
		/*RELACIONES*/
		
		$this->asientopredefinidos=array();
		$this->asientoautomaticos=array();
		$this->asientos=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->fuente_Additional=new fuente_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_fuente() {
		$this->map_fuente = array();
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
					throw new Exception('fuente:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>4) {
					throw new Exception('fuente:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=4 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('fuente:Formato incorrecto en columna codigo='.$newcodigo);
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
					throw new Exception('fuente:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>30) {
					throw new Exception('fuente:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=30 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('fuente:Formato incorrecto en columna nombre='.$newnombre);
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
	
	public function getasiento_predefinidos() : array {
		return $this->asientopredefinidos;
	}

	public function getasiento_automaticos() : array {
		return $this->asientoautomaticos;
	}

	public function getasientos() : array {
		return $this->asientos;
	}

	
	
	public  function  setasiento_predefinidos(array $asientopredefinidos) {
		try {
			$this->asientopredefinidos=$asientopredefinidos;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setasiento_automaticos(array $asientoautomaticos) {
		try {
			$this->asientoautomaticos=$asientoautomaticos;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setasientos(array $asientos) {
		try {
			$this->asientos=$asientos;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_fuenteValue(string $sKey,$oValue) {
		$this->map_fuente[$sKey]=$oValue;
	}
	
	public function getMap_fuenteValue(string $sKey) {
		return $this->map_fuente[$sKey];
	}
	
	public function getfuente_Original() : ?fuente {
		return $this->fuente_Original;
	}
	
	public function setfuente_Original(fuente $fuente) {
		try {
			$this->fuente_Original=$fuente;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_fuente() : array {
		return $this->map_fuente;
	}

	public function setMap_fuente(array $map_fuente) {
		$this->map_fuente = $map_fuente;
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
