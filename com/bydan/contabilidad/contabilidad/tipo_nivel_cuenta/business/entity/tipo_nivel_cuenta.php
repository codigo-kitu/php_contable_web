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
namespace com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class tipo_nivel_cuenta extends GeneralEntity {

	/*GENERAL*/
	public static string $class='tipo_nivel_cuenta';
	
	/*AUXILIARES*/
	public ?tipo_nivel_cuenta $tipo_nivel_cuenta_Original=null;	
	public ?GeneralEntity $tipo_nivel_cuenta_Additional=null;
	public array $map_tipo_nivel_cuenta=array();	
		
	/*CAMPOS*/
	public string $codigo = '';
	public string $nombre = '';
	
	/*FKs*/
	
	
	/*RELACIONES*/
	
	public array $cuentas = array();
	public array $cuentapredefinidas = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(false);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->tipo_nivel_cuenta_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->codigo='';
 		$this->nombre='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
		}
		
		/*RELACIONES*/
		
		$this->cuentas=array();
		$this->cuentapredefinidas=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->tipo_nivel_cuenta_Additional=new tipo_nivel_cuenta_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_tipo_nivel_cuenta() {
		$this->map_tipo_nivel_cuenta = array();
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
					throw new Exception('tipo_nivel_cuenta:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>25) {
					throw new Exception('tipo_nivel_cuenta:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=25 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('tipo_nivel_cuenta:Formato incorrecto en columna codigo='.$newcodigo);
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
					throw new Exception('tipo_nivel_cuenta:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>50) {
					throw new Exception('tipo_nivel_cuenta:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('tipo_nivel_cuenta:Formato incorrecto en columna nombre='.$newnombre);
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
	
	public function getcuentas() : array {
		return $this->cuentas;
	}

	public function getcuenta_predefinidas() : array {
		return $this->cuentapredefinidas;
	}

	
	
	public  function  setcuentas(array $cuentas) {
		try {
			$this->cuentas=$cuentas;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setcuenta_predefinidas(array $cuentapredefinidas) {
		try {
			$this->cuentapredefinidas=$cuentapredefinidas;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_tipo_nivel_cuentaValue(string $sKey,$oValue) {
		$this->map_tipo_nivel_cuenta[$sKey]=$oValue;
	}
	
	public function getMap_tipo_nivel_cuentaValue(string $sKey) {
		return $this->map_tipo_nivel_cuenta[$sKey];
	}
	
	public function gettipo_nivel_cuenta_Original() : ?tipo_nivel_cuenta {
		return $this->tipo_nivel_cuenta_Original;
	}
	
	public function settipo_nivel_cuenta_Original(tipo_nivel_cuenta $tipo_nivel_cuenta) {
		try {
			$this->tipo_nivel_cuenta_Original=$tipo_nivel_cuenta;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_tipo_nivel_cuenta() : array {
		return $this->map_tipo_nivel_cuenta;
	}

	public function setMap_tipo_nivel_cuenta(array $map_tipo_nivel_cuenta) {
		$this->map_tipo_nivel_cuenta = $map_tipo_nivel_cuenta;
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
