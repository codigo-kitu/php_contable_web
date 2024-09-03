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
namespace com\bydan\contabilidad\facturacion\vendedor\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;

class vendedor extends GeneralEntity {

	/*GENERAL*/
	public static string $class='vendedor';
	
	/*AUXILIARES*/
	public ?vendedor $vendedor_Original=null;	
	public ?GeneralEntity $vendedor_Additional=null;
	public array $map_vendedor=array();	
		
	/*CAMPOS*/
	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public string $codigo = '';
	public string $nombre = '';
	public string $direccion1 = '';
	public string $direccion2 = '';
	public float $comision = 0.0;
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	
	/*RELACIONES*/
	
	public array $clientes = array();
	public array $facturalotes = array();
	public array $devolucionfacturas = array();
	public array $estimados = array();
	public array $devolucions = array();
	public array $ordencompras = array();
	public array $facturas = array();
	public array $cotizacions = array();
	public array $consignacions = array();
	public array $proveedors = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->vendedor_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->codigo='';
 		$this->nombre='';
 		$this->direccion1='';
 		$this->direccion2='';
 		$this->comision=0.0;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
		}
		
		/*RELACIONES*/
		
		$this->clientes=array();
		$this->facturalotes=array();
		$this->devolucionfacturas=array();
		$this->estimados=array();
		$this->devolucions=array();
		$this->ordencompras=array();
		$this->facturas=array();
		$this->cotizacions=array();
		$this->consignacions=array();
		$this->proveedors=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->vendedor_Additional=new vendedor_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_vendedor() {
		$this->map_vendedor = array();
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
    
	public function  getdireccion1() : ?string {
		return $this->direccion1;
	}
    
	public function  getdireccion2() : ?string {
		return $this->direccion2;
	}
    
	public function  getcomision() : ?float {
		return $this->comision;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('vendedor:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('vendedor:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('vendedor:Valor nulo no permitido en columna id_empresa');
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
					throw new Exception('vendedor:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>6) {
					throw new Exception('vendedor:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=6 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('vendedor:Formato incorrecto en columna codigo='.$newcodigo);
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
					throw new Exception('vendedor:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>40) {
					throw new Exception('vendedor:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=40 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('vendedor:Formato incorrecto en columna nombre='.$newnombre);
				}

				$this->nombre=$newnombre;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdireccion1(?string $newdireccion1) {
		if($this->direccion1!==$newdireccion1) {

				if(strlen($newdireccion1)>80) {
					try {
						throw new Exception('vendedor:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=direccion1 en columna direccion1');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newdireccion1,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('vendedor:Formato incorrecto en la columna direccion1='.$newdireccion1);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->direccion1=$newdireccion1;
			$this->setIsChanged(true);
		}
	}
    
	public function setdireccion2(?string $newdireccion2) {
		if($this->direccion2!==$newdireccion2) {

				if(strlen($newdireccion2)>80) {
					try {
						throw new Exception('vendedor:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=direccion2 en columna direccion2');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newdireccion2,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('vendedor:Formato incorrecto en la columna direccion2='.$newdireccion2);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->direccion2=$newdireccion2;
			$this->setIsChanged(true);
		}
	}
    
	public function setcomision(?float $newcomision)
	{
		try {
			if($this->comision!==$newcomision) {
				if($newcomision===null && $newcomision!='') {
					throw new Exception('vendedor:Valor nulo no permitido en columna comision');
				}

				if($newcomision!=0) {
					if($newcomision!==null && filter_var($newcomision,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('vendedor:No es numero decimal - comision='.$newcomision);
					}
				}

				$this->comision=$newcomision;
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
	
	public function getclientes() : array {
		return $this->clientes;
	}

	public function getfactura_lotes() : array {
		return $this->facturalotes;
	}

	public function getdevolucion_facturas() : array {
		return $this->devolucionfacturas;
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

	public function getconsignacions() : array {
		return $this->consignacions;
	}

	public function getproveedors() : array {
		return $this->proveedors;
	}

	
	
	public  function  setclientes(array $clientes) {
		try {
			$this->clientes=$clientes;
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

	public  function  setdevolucion_facturas(array $devolucionfacturas) {
		try {
			$this->devolucionfacturas=$devolucionfacturas;
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

	public  function  setconsignacions(array $consignacions) {
		try {
			$this->consignacions=$consignacions;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setproveedors(array $proveedors) {
		try {
			$this->proveedors=$proveedors;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_vendedorValue(string $sKey,$oValue) {
		$this->map_vendedor[$sKey]=$oValue;
	}
	
	public function getMap_vendedorValue(string $sKey) {
		return $this->map_vendedor[$sKey];
	}
	
	public function getvendedor_Original() : ?vendedor {
		return $this->vendedor_Original;
	}
	
	public function setvendedor_Original(vendedor $vendedor) {
		try {
			$this->vendedor_Original=$vendedor;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_vendedor() : array {
		return $this->map_vendedor;
	}

	public function setMap_vendedor(array $map_vendedor) {
		$this->map_vendedor = $map_vendedor;
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
