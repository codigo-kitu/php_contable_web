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
namespace com\bydan\contabilidad\general\estado\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class estado extends GeneralEntity {

	/*GENERAL*/
	public static string $class='estado';
	
	/*AUXILIARES*/
	public ?estado $estado_Original=null;	
	public ?GeneralEntity $estado_Additional=null;
	public array $map_estado=array();	
		
	/*CAMPOS*/
	public string $codigo = '';
	public string $nombre = '';
	
	/*FKs*/
	
	
	/*RELACIONES*/
	
	public array $cuentacorrientedetalles = array();
	public array $creditocuentacobrars = array();
	public array $pagocuentacobrars = array();
	public array $cuentacobrardetalles = array();
	public array $kardexs = array();
	public array $cuentapagardetalles = array();
	public array $devolucions = array();
	public array $devolucionfacturas = array();
	public array $facturas = array();
	public array $debitocuentacobrars = array();
	public array $consignacions = array();
	public array $pagocuentapagars = array();
	public array $facturalotes = array();
	public array $debitocuentapagars = array();
	public array $ordencompras = array();
	public array $estimados = array();
	public array $creditocuentapagars = array();
	public array $cotizacions = array();
	public array $asientos = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(false);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->estado_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->codigo='';
 		$this->nombre='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
		}
		
		/*RELACIONES*/
		
		$this->cuentacorrientedetalles=array();
		$this->creditocuentacobrars=array();
		$this->pagocuentacobrars=array();
		$this->cuentacobrardetalles=array();
		$this->kardexs=array();
		$this->cuentapagardetalles=array();
		$this->devolucions=array();
		$this->devolucionfacturas=array();
		$this->facturas=array();
		$this->debitocuentacobrars=array();
		$this->consignacions=array();
		$this->pagocuentapagars=array();
		$this->facturalotes=array();
		$this->debitocuentapagars=array();
		$this->ordencompras=array();
		$this->estimados=array();
		$this->creditocuentapagars=array();
		$this->cotizacions=array();
		$this->asientos=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->estado_Additional=new estado_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_estado() {
		$this->map_estado = array();
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
					throw new Exception('estado:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>25) {
					throw new Exception('estado:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=25 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('estado:Formato incorrecto en columna codigo='.$newcodigo);
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
					throw new Exception('estado:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>35) {
					throw new Exception('estado:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=35 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('estado:Formato incorrecto en columna nombre='.$newnombre);
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
	
	public function getcuenta_corriente_detalles() : array {
		return $this->cuentacorrientedetalles;
	}

	public function getcredito_cuenta_cobrars() : array {
		return $this->creditocuentacobrars;
	}

	public function getpago_cuenta_cobrars() : array {
		return $this->pagocuentacobrars;
	}

	public function getcuenta_cobrar_detalles() : array {
		return $this->cuentacobrardetalles;
	}

	public function getkardexs() : array {
		return $this->kardexs;
	}

	public function getcuenta_pagar_detalles() : array {
		return $this->cuentapagardetalles;
	}

	public function getdevolucions() : array {
		return $this->devolucions;
	}

	public function getdevolucion_facturas() : array {
		return $this->devolucionfacturas;
	}

	public function getfacturas() : array {
		return $this->facturas;
	}

	public function getdebito_cuenta_cobrars() : array {
		return $this->debitocuentacobrars;
	}

	public function getconsignacions() : array {
		return $this->consignacions;
	}

	public function getpago_cuenta_pagars() : array {
		return $this->pagocuentapagars;
	}

	public function getfactura_lotes() : array {
		return $this->facturalotes;
	}

	public function getdebito_cuenta_pagars() : array {
		return $this->debitocuentapagars;
	}

	public function getorden_compras() : array {
		return $this->ordencompras;
	}

	public function getestimados() : array {
		return $this->estimados;
	}

	public function getcredito_cuenta_pagars() : array {
		return $this->creditocuentapagars;
	}

	public function getcotizacions() : array {
		return $this->cotizacions;
	}

	public function getasientos() : array {
		return $this->asientos;
	}

	
	
	public  function  setcuenta_corriente_detalles(array $cuentacorrientedetalles) {
		try {
			$this->cuentacorrientedetalles=$cuentacorrientedetalles;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setcredito_cuenta_cobrars(array $creditocuentacobrars) {
		try {
			$this->creditocuentacobrars=$creditocuentacobrars;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setpago_cuenta_cobrars(array $pagocuentacobrars) {
		try {
			$this->pagocuentacobrars=$pagocuentacobrars;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setcuenta_cobrar_detalles(array $cuentacobrardetalles) {
		try {
			$this->cuentacobrardetalles=$cuentacobrardetalles;
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

	public  function  setcuenta_pagar_detalles(array $cuentapagardetalles) {
		try {
			$this->cuentapagardetalles=$cuentapagardetalles;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setdevolucions(array $devolucions) {
		try {
			$this->devolucions=$devolucions;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setdevolucion_facturas(array $devolucionfacturas) {
		try {
			$this->devolucionfacturas=$devolucionfacturas;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setfacturas(array $facturas) {
		try {
			$this->facturas=$facturas;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setdebito_cuenta_cobrars(array $debitocuentacobrars) {
		try {
			$this->debitocuentacobrars=$debitocuentacobrars;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setconsignacions(array $consignacions) {
		try {
			$this->consignacions=$consignacions;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setpago_cuenta_pagars(array $pagocuentapagars) {
		try {
			$this->pagocuentapagars=$pagocuentapagars;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setfactura_lotes(array $facturalotes) {
		try {
			$this->facturalotes=$facturalotes;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setdebito_cuenta_pagars(array $debitocuentapagars) {
		try {
			$this->debitocuentapagars=$debitocuentapagars;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setorden_compras(array $ordencompras) {
		try {
			$this->ordencompras=$ordencompras;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setestimados(array $estimados) {
		try {
			$this->estimados=$estimados;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setcredito_cuenta_pagars(array $creditocuentapagars) {
		try {
			$this->creditocuentapagars=$creditocuentapagars;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setcotizacions(array $cotizacions) {
		try {
			$this->cotizacions=$cotizacions;
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
	public function setMap_estadoValue(string $sKey,$oValue) {
		$this->map_estado[$sKey]=$oValue;
	}
	
	public function getMap_estadoValue(string $sKey) {
		return $this->map_estado[$sKey];
	}
	
	public function getestado_Original() : ?estado {
		return $this->estado_Original;
	}
	
	public function setestado_Original(estado $estado) {
		try {
			$this->estado_Original=$estado;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_estado() : array {
		return $this->map_estado;
	}

	public function setMap_estado(array $map_estado) {
		$this->map_estado = $map_estado;
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
