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
namespace com\bydan\contabilidad\cuentaspagar\estado_cuentas_pagar\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class estado_cuentas_pagar extends GeneralEntity {

	/*GENERAL*/
	public static string $class='estado_cuentas_pagar';
	
	/*AUXILIARES*/
	public ?estado_cuentas_pagar $estado_cuentas_pagar_Original=null;	
	public ?GeneralEntity $estado_cuentas_pagar_Additional=null;
	public array $map_estado_cuentas_pagar=array();	
		
	/*CAMPOS*/
	public string $codigo = '';
	public string $nombre = '';
	
	/*FKs*/
	
	
	/*RELACIONES*/
	
	public array $cuentapagars = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(false);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->estado_cuentas_pagar_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->codigo='';
 		$this->nombre='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
		}
		
		/*RELACIONES*/
		
		$this->cuentapagars=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->estado_cuentas_pagar_Additional=new estado_cuentas_pagar_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_estado_cuentas_pagar() {
		$this->map_estado_cuentas_pagar = array();
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
					throw new Exception('estado_cuentas_pagar:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>25) {
					throw new Exception('estado_cuentas_pagar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=25 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('estado_cuentas_pagar:Formato incorrecto en columna codigo='.$newcodigo);
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
					throw new Exception('estado_cuentas_pagar:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>35) {
					throw new Exception('estado_cuentas_pagar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=35 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('estado_cuentas_pagar:Formato incorrecto en columna nombre='.$newnombre);
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
	
	public function getcuenta_pagars() : array {
		return $this->cuentapagars;
	}

	
	
	public  function  setcuenta_pagars(array $cuentapagars) {
		try {
			$this->cuentapagars=$cuentapagars;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_estado_cuentas_pagarValue(string $sKey,$oValue) {
		$this->map_estado_cuentas_pagar[$sKey]=$oValue;
	}
	
	public function getMap_estado_cuentas_pagarValue(string $sKey) {
		return $this->map_estado_cuentas_pagar[$sKey];
	}
	
	public function getestado_cuentas_pagar_Original() : ?estado_cuentas_pagar {
		return $this->estado_cuentas_pagar_Original;
	}
	
	public function setestado_cuentas_pagar_Original(estado_cuentas_pagar $estado_cuentas_pagar) {
		try {
			$this->estado_cuentas_pagar_Original=$estado_cuentas_pagar;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_estado_cuentas_pagar() : array {
		return $this->map_estado_cuentas_pagar;
	}

	public function setMap_estado_cuentas_pagar(array $map_estado_cuentas_pagar) {
		$this->map_estado_cuentas_pagar = $map_estado_cuentas_pagar;
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
