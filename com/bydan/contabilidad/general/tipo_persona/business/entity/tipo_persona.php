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
namespace com\bydan\contabilidad\general\tipo_persona\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class tipo_persona extends GeneralEntity {

	/*GENERAL*/
	public static string $class='tipo_persona';
	
	/*AUXILIARES*/
	public ?tipo_persona $tipo_persona_Original=null;	
	public ?GeneralEntity $tipo_persona_Additional=null;
	public array $map_tipo_persona=array();	
		
	/*CAMPOS*/
	public string $nombre = '';
	
	/*FKs*/
	
	
	/*RELACIONES*/
	
	public array $proveedors = array();
	public array $clientes = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(false);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->tipo_persona_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->nombre='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
		}
		
		/*RELACIONES*/
		
		$this->proveedors=array();
		$this->clientes=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->tipo_persona_Additional=new tipo_persona_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_tipo_persona() {
		$this->map_tipo_persona = array();
	}
	
	/*CAMPOS*/
    
	public function  getnombre() : ?string {
		return $this->nombre;
	}
	
    
	public function setnombre(?string $newnombre)
	{
		try {
			if($this->nombre!==$newnombre) {
				if($newnombre===null && $newnombre!='') {
					throw new Exception('tipo_persona:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>50) {
					throw new Exception('tipo_persona:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('tipo_persona:Formato incorrecto en columna nombre='.$newnombre);
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
	
	public function getproveedors() : array {
		return $this->proveedors;
	}

	public function getclientes() : array {
		return $this->clientes;
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

	
	/*AUXILIARES*/
	public function setMap_tipo_personaValue(string $sKey,$oValue) {
		$this->map_tipo_persona[$sKey]=$oValue;
	}
	
	public function getMap_tipo_personaValue(string $sKey) {
		return $this->map_tipo_persona[$sKey];
	}
	
	public function gettipo_persona_Original() : ?tipo_persona {
		return $this->tipo_persona_Original;
	}
	
	public function settipo_persona_Original(tipo_persona $tipo_persona) {
		try {
			$this->tipo_persona_Original=$tipo_persona;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_tipo_persona() : array {
		return $this->map_tipo_persona;
	}

	public function setMap_tipo_persona(array $map_tipo_persona) {
		$this->map_tipo_persona = $map_tipo_persona;
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
