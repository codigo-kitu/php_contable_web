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
namespace com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class tipo_cuenta_predefinida extends GeneralEntity {

	/*GENERAL*/
	public static string $class='tipo_cuenta_predefinida';
	
	/*AUXILIARES*/
	public ?tipo_cuenta_predefinida $tipo_cuenta_predefinida_Original=null;	
	public ?GeneralEntity $tipo_cuenta_predefinida_Additional=null;
	public array $map_tipo_cuenta_predefinida=array();	
		
	/*CAMPOS*/
	public string $codigo = '';
	public string $nombre = '';
	public string $descripcion = '';
	
	/*FKs*/
	
	
	/*RELACIONES*/
	
	public array $cuentapredefinidas = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->tipo_cuenta_predefinida_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->codigo='';
 		$this->nombre='';
 		$this->descripcion='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
		}
		
		/*RELACIONES*/
		
		$this->cuentapredefinidas=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->tipo_cuenta_predefinida_Additional=new tipo_cuenta_predefinida_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_tipo_cuenta_predefinida() {
		$this->map_tipo_cuenta_predefinida = array();
	}
	
	/*CAMPOS*/
    
	public function  getcodigo() : ?string {
		return $this->codigo;
	}
    
	public function  getnombre() : ?string {
		return $this->nombre;
	}
    
	public function  getdescripcion() : ?string {
		return $this->descripcion;
	}
	
    
	public function setcodigo(?string $newcodigo)
	{
		try {
			if($this->codigo!==$newcodigo) {
				if($newcodigo===null && $newcodigo!='') {
					throw new Exception('tipo_cuenta_predefinida:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>25) {
					throw new Exception('tipo_cuenta_predefinida:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=25 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('tipo_cuenta_predefinida:Formato incorrecto en columna codigo='.$newcodigo);
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
					throw new Exception('tipo_cuenta_predefinida:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>50) {
					throw new Exception('tipo_cuenta_predefinida:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('tipo_cuenta_predefinida:Formato incorrecto en columna nombre='.$newnombre);
				}

				$this->nombre=$newnombre;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdescripcion(?string $newdescripcion) {
		if($this->descripcion!==$newdescripcion) {

				if(strlen($newdescripcion)>150) {
					try {
						throw new Exception('tipo_cuenta_predefinida:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=descripcion en columna descripcion');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newdescripcion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('tipo_cuenta_predefinida:Formato incorrecto en la columna descripcion='.$newdescripcion);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->descripcion=$newdescripcion;
			$this->setIsChanged(true);
		}
	}
	
	/*FKs*/
	
	
		
	
	/*RELACIONES*/
	
	public function getcuenta_predefinidas() : array {
		return $this->cuentapredefinidas;
	}

	
	
	public  function  setcuenta_predefinidas(array $cuentapredefinidas) {
		try {
			$this->cuentapredefinidas=$cuentapredefinidas;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_tipo_cuenta_predefinidaValue(string $sKey,$oValue) {
		$this->map_tipo_cuenta_predefinida[$sKey]=$oValue;
	}
	
	public function getMap_tipo_cuenta_predefinidaValue(string $sKey) {
		return $this->map_tipo_cuenta_predefinida[$sKey];
	}
	
	public function gettipo_cuenta_predefinida_Original() : ?tipo_cuenta_predefinida {
		return $this->tipo_cuenta_predefinida_Original;
	}
	
	public function settipo_cuenta_predefinida_Original(tipo_cuenta_predefinida $tipo_cuenta_predefinida) {
		try {
			$this->tipo_cuenta_predefinida_Original=$tipo_cuenta_predefinida;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_tipo_cuenta_predefinida() : array {
		return $this->map_tipo_cuenta_predefinida;
	}

	public function setMap_tipo_cuenta_predefinida(array $map_tipo_cuenta_predefinida) {
		$this->map_tipo_cuenta_predefinida = $map_tipo_cuenta_predefinida;
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
