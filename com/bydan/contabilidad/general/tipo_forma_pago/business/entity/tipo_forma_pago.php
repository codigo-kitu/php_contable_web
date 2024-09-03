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
namespace com\bydan\contabilidad\general\tipo_forma_pago\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class tipo_forma_pago extends GeneralEntity {

	/*GENERAL*/
	public static string $class='tipo_forma_pago';
	
	/*AUXILIARES*/
	public ?tipo_forma_pago $tipo_forma_pago_Original=null;	
	public ?GeneralEntity $tipo_forma_pago_Additional=null;
	public array $map_tipo_forma_pago=array();	
		
	/*CAMPOS*/
	public string $codigo = '';
	public string $nombre = '';
	
	/*FKs*/
	
	
	/*RELACIONES*/
	
	public array $formapagoproveedors = array();
	public array $formapagoclientes = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(false);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->tipo_forma_pago_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->codigo='';
 		$this->nombre='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
		}
		
		/*RELACIONES*/
		
		$this->formapagoproveedors=array();
		$this->formapagoclientes=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->tipo_forma_pago_Additional=new tipo_forma_pago_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_tipo_forma_pago() {
		$this->map_tipo_forma_pago = array();
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
					throw new Exception('tipo_forma_pago:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>25) {
					throw new Exception('tipo_forma_pago:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=25 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('tipo_forma_pago:Formato incorrecto en columna codigo='.$newcodigo);
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
					throw new Exception('tipo_forma_pago:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>50) {
					throw new Exception('tipo_forma_pago:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('tipo_forma_pago:Formato incorrecto en columna nombre='.$newnombre);
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
	
	public function getforma_pago_proveedors() : array {
		return $this->formapagoproveedors;
	}

	public function getforma_pago_clientes() : array {
		return $this->formapagoclientes;
	}

	
	
	public  function  setforma_pago_proveedors(array $formapagoproveedors) {
		try {
			$this->formapagoproveedors=$formapagoproveedors;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setforma_pago_clientes(array $formapagoclientes) {
		try {
			$this->formapagoclientes=$formapagoclientes;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_tipo_forma_pagoValue(string $sKey,$oValue) {
		$this->map_tipo_forma_pago[$sKey]=$oValue;
	}
	
	public function getMap_tipo_forma_pagoValue(string $sKey) {
		return $this->map_tipo_forma_pago[$sKey];
	}
	
	public function gettipo_forma_pago_Original() : ?tipo_forma_pago {
		return $this->tipo_forma_pago_Original;
	}
	
	public function settipo_forma_pago_Original(tipo_forma_pago $tipo_forma_pago) {
		try {
			$this->tipo_forma_pago_Original=$tipo_forma_pago;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_tipo_forma_pago() : array {
		return $this->map_tipo_forma_pago;
	}

	public function setMap_tipo_forma_pago(array $map_tipo_forma_pago) {
		$this->map_tipo_forma_pago = $map_tipo_forma_pago;
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
