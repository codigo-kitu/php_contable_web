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
namespace com\bydan\contabilidad\general\tipo_costeo_kardex\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class tipo_costeo_kardex extends GeneralEntity {

	/*GENERAL*/
	public static string $class='tipo_costeo_kardex';
	
	/*AUXILIARES*/
	public ?tipo_costeo_kardex $tipo_costeo_kardex_Original=null;	
	public ?GeneralEntity $tipo_costeo_kardex_Additional=null;
	public array $map_tipo_costeo_kardex=array();	
		
	/*CAMPOS*/
	public string $nombre = '';
	
	/*FKs*/
	
	
	/*RELACIONES*/
	
	public array $parametroauxiliars = array();
	public array $parametroinventarios = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(false);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->tipo_costeo_kardex_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->nombre='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
		}
		
		/*RELACIONES*/
		
		$this->parametroauxiliars=array();
		$this->parametroinventarios=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->tipo_costeo_kardex_Additional=new tipo_costeo_kardex_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_tipo_costeo_kardex() {
		$this->map_tipo_costeo_kardex = array();
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
					throw new Exception('tipo_costeo_kardex:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>50) {
					throw new Exception('tipo_costeo_kardex:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('tipo_costeo_kardex:Formato incorrecto en columna nombre='.$newnombre);
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
	
	public function getparametro_auxiliars() : array {
		return $this->parametroauxiliars;
	}

	public function getparametro_inventarios() : array {
		return $this->parametroinventarios;
	}

	
	
	public  function  setparametro_auxiliars(array $parametroauxiliars) {
		try {
			$this->parametroauxiliars=$parametroauxiliars;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setparametro_inventarios(array $parametroinventarios) {
		try {
			$this->parametroinventarios=$parametroinventarios;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_tipo_costeo_kardexValue(string $sKey,$oValue) {
		$this->map_tipo_costeo_kardex[$sKey]=$oValue;
	}
	
	public function getMap_tipo_costeo_kardexValue(string $sKey) {
		return $this->map_tipo_costeo_kardex[$sKey];
	}
	
	public function gettipo_costeo_kardex_Original() : ?tipo_costeo_kardex {
		return $this->tipo_costeo_kardex_Original;
	}
	
	public function settipo_costeo_kardex_Original(tipo_costeo_kardex $tipo_costeo_kardex) {
		try {
			$this->tipo_costeo_kardex_Original=$tipo_costeo_kardex;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_tipo_costeo_kardex() : array {
		return $this->map_tipo_costeo_kardex;
	}

	public function setMap_tipo_costeo_kardex(array $map_tipo_costeo_kardex) {
		$this->map_tipo_costeo_kardex = $map_tipo_costeo_kardex;
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
