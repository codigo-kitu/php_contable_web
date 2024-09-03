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
namespace com\bydan\contabilidad\contabilidad\moneda\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;

class moneda extends GeneralEntity {

	/*GENERAL*/
	public static string $class='moneda';
	
	/*AUXILIARES*/
	public ?moneda $moneda_Original=null;	
	public ?GeneralEntity $moneda_Additional=null;
	public array $map_moneda=array();	
		
	/*CAMPOS*/
	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public string $codigo = '';
	public string $nombre = '';
	public string $simbolo = '';
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	
	/*RELACIONES*/
	
	public array $devolucionfacturas = array();
	public array $facturalotes = array();
	public array $estimados = array();
	public array $devolucions = array();
	public array $ordencompras = array();
	public array $facturas = array();
	public array $cotizacions = array();
	public array $parametrogenerals = array();
	public array $consignacions = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->moneda_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->codigo='';
 		$this->nombre='';
 		$this->simbolo='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
		}
		
		/*RELACIONES*/
		
		$this->devolucionfacturas=array();
		$this->facturalotes=array();
		$this->estimados=array();
		$this->devolucions=array();
		$this->ordencompras=array();
		$this->facturas=array();
		$this->cotizacions=array();
		$this->parametrogenerals=array();
		$this->consignacions=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->moneda_Additional=new moneda_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_moneda() {
		$this->map_moneda = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_empresa() : ?int {
		return $this->id_empresa;
	}
	
	public function  getid_empresa_Descripcion() : string {
		return $this->id_empresa_Descripcion;
	}
    
	public function  getcodigo() : ?string {
		return $this->codigo;
	}
    
	public function  getnombre() : ?string {
		return $this->nombre;
	}
    
	public function  getsimbolo() : ?string {
		return $this->simbolo;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('moneda:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('moneda:No es numero entero - id_empresa='.$newid_empresa);
				}

				$this->id_empresa=$newid_empresa;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_empresa_Descripcion(string $newid_empresa_Descripcion)
	{
		try {
			if($this->id_empresa_Descripcion!=$newid_empresa_Descripcion) {
				if($newid_empresa_Descripcion===null && $newid_empresa_Descripcion!='') {
					throw new Exception('moneda:Valor nulo no permitido en columna id_empresa');
				}

				$this->id_empresa_Descripcion=$newid_empresa_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcodigo(?string $newcodigo)
	{
		try {
			if($this->codigo!==$newcodigo) {
				if($newcodigo===null && $newcodigo!='') {
					throw new Exception('moneda:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>10) {
					throw new Exception('moneda:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=10 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('moneda:Formato incorrecto en columna codigo='.$newcodigo);
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
					throw new Exception('moneda:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>50) {
					throw new Exception('moneda:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('moneda:Formato incorrecto en columna nombre='.$newnombre);
				}

				$this->nombre=$newnombre;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setsimbolo(?string $newsimbolo)
	{
		try {
			if($this->simbolo!==$newsimbolo) {
				if($newsimbolo===null && $newsimbolo!='') {
					throw new Exception('moneda:Valor nulo no permitido en columna simbolo');
				}

				if(strlen($newsimbolo)>5) {
					throw new Exception('moneda:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=5 en columna simbolo');
				}

				if(filter_var($newsimbolo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('moneda:Formato incorrecto en columna simbolo='.$newsimbolo);
				}

				$this->simbolo=$newsimbolo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	public function getempresa() : ?empresa {
		return $this->empresa;
	}

	
	
	public  function  setempresa(?empresa $empresa) {
		try {
			$this->empresa=$empresa;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	public function getdevolucion_facturas() : array {
		return $this->devolucionfacturas;
	}

	public function getfactura_lotes() : array {
		return $this->facturalotes;
	}

	public function getestimados() : array {
		return $this->estimados;
	}

	public function getdevolucions() : array {
		return $this->devolucions;
	}

	public function getorden_compras() : array {
		return $this->ordencompras;
	}

	public function getfacturas() : array {
		return $this->facturas;
	}

	public function getcotizacions() : array {
		return $this->cotizacions;
	}

	public function getparametro_generals() : array {
		return $this->parametrogenerals;
	}

	public function getconsignacions() : array {
		return $this->consignacions;
	}

	
	
	public  function  setdevolucion_facturas(array $devolucionfacturas) {
		try {
			$this->devolucionfacturas=$devolucionfacturas;
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

	public  function  setestimados(array $estimados) {
		try {
			$this->estimados=$estimados;
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

	public  function  setorden_compras(array $ordencompras) {
		try {
			$this->ordencompras=$ordencompras;
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

	public  function  setcotizacions(array $cotizacions) {
		try {
			$this->cotizacions=$cotizacions;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setparametro_generals(array $parametrogenerals) {
		try {
			$this->parametrogenerals=$parametrogenerals;
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

	
	/*AUXILIARES*/
	public function setMap_monedaValue(string $sKey,$oValue) {
		$this->map_moneda[$sKey]=$oValue;
	}
	
	public function getMap_monedaValue(string $sKey) {
		return $this->map_moneda[$sKey];
	}
	
	public function getmoneda_Original() : ?moneda {
		return $this->moneda_Original;
	}
	
	public function setmoneda_Original(moneda $moneda) {
		try {
			$this->moneda_Original=$moneda;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_moneda() : array {
		return $this->map_moneda;
	}

	public function setMap_moneda(array $map_moneda) {
		$this->map_moneda = $map_moneda;
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
