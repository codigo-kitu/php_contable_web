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
namespace com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\tipo_termino_pago\business\entity\tipo_termino_pago;
use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;

class termino_pago_proveedor extends GeneralEntity {

	/*GENERAL*/
	public static string $class='termino_pago_proveedor';
	
	/*AUXILIARES*/
	public ?termino_pago_proveedor $termino_pago_proveedor_Original=null;	
	public ?GeneralEntity $termino_pago_proveedor_Additional=null;
	public array $map_termino_pago_proveedor=array();	
		
	/*CAMPOS*/
	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public int $id_tipo_termino_pago = -1;
	public string $id_tipo_termino_pago_Descripcion = '';

	public string $codigo = '';
	public string $descripcion = '';
	public float $monto = 0.0;
	public int $dias = 0;
	public float $inicial = 0.0;
	public int $cuotas = 0;
	public float $descuento_pronto_pago = 0.0;
	public bool $predeterminado = false;
	public int $id_cuenta = -1;
	public string $id_cuenta_Descripcion = '';

	public string $cuenta_contable = '';
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	public ?tipo_termino_pago $tipo_termino_pago = null;
	public ?cuenta $cuenta = null;
	
	/*RELACIONES*/
	
	public array $ordencompras = array();
	public array $proveedors = array();
	public array $creditocuentapagars = array();
	public array $cuentapagars = array();
	public array $cotizacions = array();
	public array $parametroinventarios = array();
	public array $devolucions = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->termino_pago_proveedor_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->id_tipo_termino_pago=-1;
		$this->id_tipo_termino_pago_Descripcion='';

 		$this->codigo='';
 		$this->descripcion='';
 		$this->monto=0.0;
 		$this->dias=0;
 		$this->inicial=0.0;
 		$this->cuotas=0;
 		$this->descuento_pronto_pago=0.0;
 		$this->predeterminado=false;
 		$this->id_cuenta=-1;
		$this->id_cuenta_Descripcion='';

 		$this->cuenta_contable='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
			$this->tipo_termino_pago=new tipo_termino_pago();
			$this->cuenta=new cuenta();
		}
		
		/*RELACIONES*/
		
		$this->ordencompras=array();
		$this->proveedors=array();
		$this->creditocuentapagars=array();
		$this->cuentapagars=array();
		$this->cotizacions=array();
		$this->parametroinventarios=array();
		$this->devolucions=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->termino_pago_proveedor_Additional=new termino_pago_proveedor_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_termino_pago_proveedor() {
		$this->map_termino_pago_proveedor = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_empresa() : ?int {
		return $this->id_empresa;
	}
	
	public function  getid_empresa_Descripcion() : string {
		return $this->id_empresa_Descripcion;
	}
    
	public function  getid_tipo_termino_pago() : ?int {
		return $this->id_tipo_termino_pago;
	}
	
	public function  getid_tipo_termino_pago_Descripcion() : string {
		return $this->id_tipo_termino_pago_Descripcion;
	}
    
	public function  getcodigo() : ?string {
		return $this->codigo;
	}
    
	public function  getdescripcion() : ?string {
		return $this->descripcion;
	}
    
	public function  getmonto() : ?float {
		return $this->monto;
	}
    
	public function  getdias() : ?int {
		return $this->dias;
	}
    
	public function  getinicial() : ?float {
		return $this->inicial;
	}
    
	public function  getcuotas() : ?int {
		return $this->cuotas;
	}
    
	public function  getdescuento_pronto_pago() : ?float {
		return $this->descuento_pronto_pago;
	}
    
	public function  getpredeterminado() : ?bool {
		return $this->predeterminado;
	}
    
	public function  getid_cuenta() : ?int {
		return $this->id_cuenta;
	}
	
	public function  getid_cuenta_Descripcion() : string {
		return $this->id_cuenta_Descripcion;
	}
    
	public function  getcuenta_contable() : ?string {
		return $this->cuenta_contable;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('termino_pago_proveedor:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('termino_pago_proveedor:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('termino_pago_proveedor:Valor nulo no permitido en columna id_empresa');
				}

				$this->id_empresa_Descripcion=$newid_empresa_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_tipo_termino_pago(?int $newid_tipo_termino_pago)
	{
		try {
			if($this->id_tipo_termino_pago!==$newid_tipo_termino_pago) {
				if($newid_tipo_termino_pago===null && $newid_tipo_termino_pago!='') {
					throw new Exception('termino_pago_proveedor:Valor nulo no permitido en columna id_tipo_termino_pago');
				}

				if($newid_tipo_termino_pago!==null && filter_var($newid_tipo_termino_pago,FILTER_VALIDATE_INT)===false) {
					throw new Exception('termino_pago_proveedor:No es numero entero - id_tipo_termino_pago='.$newid_tipo_termino_pago);
				}

				$this->id_tipo_termino_pago=$newid_tipo_termino_pago;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_tipo_termino_pago_Descripcion(string $newid_tipo_termino_pago_Descripcion)
	{
		try {
			if($this->id_tipo_termino_pago_Descripcion!=$newid_tipo_termino_pago_Descripcion) {
				if($newid_tipo_termino_pago_Descripcion===null && $newid_tipo_termino_pago_Descripcion!='') {
					throw new Exception('termino_pago_proveedor:Valor nulo no permitido en columna id_tipo_termino_pago');
				}

				$this->id_tipo_termino_pago_Descripcion=$newid_tipo_termino_pago_Descripcion;
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
					throw new Exception('termino_pago_proveedor:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>4) {
					throw new Exception('termino_pago_proveedor:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=4 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('termino_pago_proveedor:Formato incorrecto en columna codigo='.$newcodigo);
				}

				$this->codigo=$newcodigo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdescripcion(?string $newdescripcion)
	{
		try {
			if($this->descripcion!==$newdescripcion) {
				if($newdescripcion===null && $newdescripcion!='') {
					throw new Exception('termino_pago_proveedor:Valor nulo no permitido en columna descripcion');
				}

				if(strlen($newdescripcion)>40) {
					throw new Exception('termino_pago_proveedor:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=40 en columna descripcion');
				}

				if(filter_var($newdescripcion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('termino_pago_proveedor:Formato incorrecto en columna descripcion='.$newdescripcion);
				}

				$this->descripcion=$newdescripcion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setmonto(?float $newmonto)
	{
		try {
			if($this->monto!==$newmonto) {
				if($newmonto===null && $newmonto!='') {
					throw new Exception('termino_pago_proveedor:Valor nulo no permitido en columna monto');
				}

				if($newmonto!=0) {
					if($newmonto!==null && filter_var($newmonto,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('termino_pago_proveedor:No es numero decimal - monto='.$newmonto);
					}
				}

				$this->monto=$newmonto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdias(?int $newdias)
	{
		try {
			if($this->dias!==$newdias) {
				if($newdias===null && $newdias!='') {
					throw new Exception('termino_pago_proveedor:Valor nulo no permitido en columna dias');
				}

				if($newdias!==null && filter_var($newdias,FILTER_VALIDATE_INT)===false) {
					throw new Exception('termino_pago_proveedor:No es numero entero - dias='.$newdias);
				}

				$this->dias=$newdias;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setinicial(?float $newinicial)
	{
		try {
			if($this->inicial!==$newinicial) {
				if($newinicial===null && $newinicial!='') {
					throw new Exception('termino_pago_proveedor:Valor nulo no permitido en columna inicial');
				}

				if($newinicial!=0) {
					if($newinicial!==null && filter_var($newinicial,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('termino_pago_proveedor:No es numero decimal - inicial='.$newinicial);
					}
				}

				$this->inicial=$newinicial;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcuotas(?int $newcuotas)
	{
		try {
			if($this->cuotas!==$newcuotas) {
				if($newcuotas===null && $newcuotas!='') {
					throw new Exception('termino_pago_proveedor:Valor nulo no permitido en columna cuotas');
				}

				if($newcuotas!==null && filter_var($newcuotas,FILTER_VALIDATE_INT)===false) {
					throw new Exception('termino_pago_proveedor:No es numero entero - cuotas='.$newcuotas);
				}

				$this->cuotas=$newcuotas;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdescuento_pronto_pago(?float $newdescuento_pronto_pago)
	{
		try {
			if($this->descuento_pronto_pago!==$newdescuento_pronto_pago) {
				if($newdescuento_pronto_pago===null && $newdescuento_pronto_pago!='') {
					throw new Exception('termino_pago_proveedor:Valor nulo no permitido en columna descuento_pronto_pago');
				}

				if($newdescuento_pronto_pago!=0) {
					if($newdescuento_pronto_pago!==null && filter_var($newdescuento_pronto_pago,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('termino_pago_proveedor:No es numero decimal - descuento_pronto_pago='.$newdescuento_pronto_pago);
					}
				}

				$this->descuento_pronto_pago=$newdescuento_pronto_pago;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setpredeterminado(?bool $newpredeterminado)
	{
		try {
			if($this->predeterminado!==$newpredeterminado) {
				if($newpredeterminado===null && $newpredeterminado!='') {
					throw new Exception('termino_pago_proveedor:Valor nulo no permitido en columna predeterminado');
				}

				if($newpredeterminado!==null && filter_var($newpredeterminado,FILTER_VALIDATE_BOOLEAN)===false && $newpredeterminado!==0 && $newpredeterminado!==false) {
					throw new Exception('termino_pago_proveedor:No es valor booleano - predeterminado='.$newpredeterminado);
				}

				$this->predeterminado=$newpredeterminado;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_cuenta(?int $newid_cuenta) {
		if($this->id_cuenta!==$newid_cuenta) {

				if($newid_cuenta!==null && filter_var($newid_cuenta,FILTER_VALIDATE_INT)===false) {
					throw new Exception('termino_pago_proveedor:No es numero entero - id_cuenta');
				}

			$this->id_cuenta=$newid_cuenta;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_cuenta_Descripcion(string $newid_cuenta_Descripcion) {
		if($this->id_cuenta_Descripcion!=$newid_cuenta_Descripcion) {

			$this->id_cuenta_Descripcion=$newid_cuenta_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function setcuenta_contable(?string $newcuenta_contable) {
		if($this->cuenta_contable!==$newcuenta_contable) {

				if(strlen($newcuenta_contable)>20) {
					try {
						throw new Exception('termino_pago_proveedor:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=cuenta_contable en columna cuenta_contable');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newcuenta_contable,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('termino_pago_proveedor:Formato incorrecto en la columna cuenta_contable='.$newcuenta_contable);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->cuenta_contable=$newcuenta_contable;
			$this->setIsChanged(true);
		}
	}
	
	/*FKs*/
	
	public function getempresa() : ?empresa {
		return $this->empresa;
	}

	public function gettipo_termino_pago() : ?tipo_termino_pago {
		return $this->tipo_termino_pago;
	}

	public function getcuenta() : ?cuenta {
		return $this->cuenta;
	}

	
	
	public  function  setempresa(?empresa $empresa) {
		try {
			$this->empresa=$empresa;
		} catch(Exception $e) {
			;
		}
	}


	public  function  settipo_termino_pago(?tipo_termino_pago $tipo_termino_pago) {
		try {
			$this->tipo_termino_pago=$tipo_termino_pago;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setcuenta(?cuenta $cuenta) {
		try {
			$this->cuenta=$cuenta;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	public function getorden_compras() : array {
		return $this->ordencompras;
	}

	public function getproveedors() : array {
		return $this->proveedors;
	}

	public function getcredito_cuenta_pagars() : array {
		return $this->creditocuentapagars;
	}

	public function getcuenta_pagars() : array {
		return $this->cuentapagars;
	}

	public function getcotizacions() : array {
		return $this->cotizacions;
	}

	public function getparametro_inventarios() : array {
		return $this->parametroinventarios;
	}

	public function getdevolucions() : array {
		return $this->devolucions;
	}

	
	
	public  function  setorden_compras(array $ordencompras) {
		try {
			$this->ordencompras=$ordencompras;
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

	public  function  setcredito_cuenta_pagars(array $creditocuentapagars) {
		try {
			$this->creditocuentapagars=$creditocuentapagars;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setcuenta_pagars(array $cuentapagars) {
		try {
			$this->cuentapagars=$cuentapagars;
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

	public  function  setparametro_inventarios(array $parametroinventarios) {
		try {
			$this->parametroinventarios=$parametroinventarios;
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

	
	/*AUXILIARES*/
	public function setMap_termino_pago_proveedorValue(string $sKey,$oValue) {
		$this->map_termino_pago_proveedor[$sKey]=$oValue;
	}
	
	public function getMap_termino_pago_proveedorValue(string $sKey) {
		return $this->map_termino_pago_proveedor[$sKey];
	}
	
	public function gettermino_pago_proveedor_Original() : ?termino_pago_proveedor {
		return $this->termino_pago_proveedor_Original;
	}
	
	public function settermino_pago_proveedor_Original(termino_pago_proveedor $termino_pago_proveedor) {
		try {
			$this->termino_pago_proveedor_Original=$termino_pago_proveedor;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_termino_pago_proveedor() : array {
		return $this->map_termino_pago_proveedor;
	}

	public function setMap_termino_pago_proveedor(array $map_termino_pago_proveedor) {
		$this->map_termino_pago_proveedor = $map_termino_pago_proveedor;
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
