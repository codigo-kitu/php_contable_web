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
namespace com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\tipo_forma_pago\business\entity\tipo_forma_pago;
use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;

class forma_pago_proveedor extends GeneralEntity {

	/*GENERAL*/
	public static string $class='forma_pago_proveedor';
	
	/*AUXILIARES*/
	public ?forma_pago_proveedor $forma_pago_proveedor_Original=null;	
	public ?GeneralEntity $forma_pago_proveedor_Additional=null;
	public array $map_forma_pago_proveedor=array();	
		
	/*CAMPOS*/
	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public int $id_tipo_forma_pago = -1;
	public string $id_tipo_forma_pago_Descripcion = '';

	public string $codigo = '';
	public string $nombre = '';
	public bool $predeterminado = false;
	public ?int $id_cuenta = null;
	public string $id_cuenta_Descripcion = '';

	public string $cuenta_contable = '';
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	public ?tipo_forma_pago $tipo_forma_pago = null;
	public ?cuenta $cuenta = null;
	
	/*RELACIONES*/
	
	public array $debitocuentapagars = array();
	public array $documentocuentapagars = array();
	public array $pagocuentapagars = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->forma_pago_proveedor_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->id_tipo_forma_pago=-1;
		$this->id_tipo_forma_pago_Descripcion='';

 		$this->codigo='';
 		$this->nombre='';
 		$this->predeterminado=false;
 		$this->id_cuenta=null;
		$this->id_cuenta_Descripcion='';

 		$this->cuenta_contable='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
			$this->tipo_forma_pago=new tipo_forma_pago();
			$this->cuenta=new cuenta();
		}
		
		/*RELACIONES*/
		
		$this->debitocuentapagars=array();
		$this->documentocuentapagars=array();
		$this->pagocuentapagars=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->forma_pago_proveedor_Additional=new forma_pago_proveedor_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_forma_pago_proveedor() {
		$this->map_forma_pago_proveedor = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_empresa() : ?int {
		return $this->id_empresa;
	}
	
	public function  getid_empresa_Descripcion() : string {
		return $this->id_empresa_Descripcion;
	}
    
	public function  getid_tipo_forma_pago() : ?int {
		return $this->id_tipo_forma_pago;
	}
	
	public function  getid_tipo_forma_pago_Descripcion() : string {
		return $this->id_tipo_forma_pago_Descripcion;
	}
    
	public function  getcodigo() : ?string {
		return $this->codigo;
	}
    
	public function  getnombre() : ?string {
		return $this->nombre;
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
					throw new Exception('forma_pago_proveedor:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('forma_pago_proveedor:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('forma_pago_proveedor:Valor nulo no permitido en columna id_empresa');
				}

				$this->id_empresa_Descripcion=$newid_empresa_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_tipo_forma_pago(?int $newid_tipo_forma_pago)
	{
		try {
			if($this->id_tipo_forma_pago!==$newid_tipo_forma_pago) {
				if($newid_tipo_forma_pago===null && $newid_tipo_forma_pago!='') {
					throw new Exception('forma_pago_proveedor:Valor nulo no permitido en columna id_tipo_forma_pago');
				}

				if($newid_tipo_forma_pago!==null && filter_var($newid_tipo_forma_pago,FILTER_VALIDATE_INT)===false) {
					throw new Exception('forma_pago_proveedor:No es numero entero - id_tipo_forma_pago='.$newid_tipo_forma_pago);
				}

				$this->id_tipo_forma_pago=$newid_tipo_forma_pago;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_tipo_forma_pago_Descripcion(string $newid_tipo_forma_pago_Descripcion)
	{
		try {
			if($this->id_tipo_forma_pago_Descripcion!=$newid_tipo_forma_pago_Descripcion) {
				if($newid_tipo_forma_pago_Descripcion===null && $newid_tipo_forma_pago_Descripcion!='') {
					throw new Exception('forma_pago_proveedor:Valor nulo no permitido en columna id_tipo_forma_pago');
				}

				$this->id_tipo_forma_pago_Descripcion=$newid_tipo_forma_pago_Descripcion;
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
					throw new Exception('forma_pago_proveedor:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>4) {
					throw new Exception('forma_pago_proveedor:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=4 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('forma_pago_proveedor:Formato incorrecto en columna codigo='.$newcodigo);
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
					throw new Exception('forma_pago_proveedor:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>50) {
					throw new Exception('forma_pago_proveedor:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('forma_pago_proveedor:Formato incorrecto en columna nombre='.$newnombre);
				}

				$this->nombre=$newnombre;
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
					throw new Exception('forma_pago_proveedor:Valor nulo no permitido en columna predeterminado');
				}

				if($newpredeterminado!==null && filter_var($newpredeterminado,FILTER_VALIDATE_BOOLEAN)===false && $newpredeterminado!==0 && $newpredeterminado!==false) {
					throw new Exception('forma_pago_proveedor:No es valor booleano - predeterminado='.$newpredeterminado);
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
					throw new Exception('forma_pago_proveedor:No es numero entero - id_cuenta');
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
						throw new Exception('forma_pago_proveedor:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=cuenta_contable en columna cuenta_contable');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newcuenta_contable,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('forma_pago_proveedor:Formato incorrecto en la columna cuenta_contable='.$newcuenta_contable);
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

	public function gettipo_forma_pago() : ?tipo_forma_pago {
		return $this->tipo_forma_pago;
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


	public  function  settipo_forma_pago(?tipo_forma_pago $tipo_forma_pago) {
		try {
			$this->tipo_forma_pago=$tipo_forma_pago;
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
	
	public function getdebito_cuenta_pagars() : array {
		return $this->debitocuentapagars;
	}

	public function getdocumento_cuenta_pagars() : array {
		return $this->documentocuentapagars;
	}

	public function getpago_cuenta_pagars() : array {
		return $this->pagocuentapagars;
	}

	
	
	public  function  setdebito_cuenta_pagars(array $debitocuentapagars) {
		try {
			$this->debitocuentapagars=$debitocuentapagars;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setdocumento_cuenta_pagars(array $documentocuentapagars) {
		try {
			$this->documentocuentapagars=$documentocuentapagars;
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

	
	/*AUXILIARES*/
	public function setMap_forma_pago_proveedorValue(string $sKey,$oValue) {
		$this->map_forma_pago_proveedor[$sKey]=$oValue;
	}
	
	public function getMap_forma_pago_proveedorValue(string $sKey) {
		return $this->map_forma_pago_proveedor[$sKey];
	}
	
	public function getforma_pago_proveedor_Original() : ?forma_pago_proveedor {
		return $this->forma_pago_proveedor_Original;
	}
	
	public function setforma_pago_proveedor_Original(forma_pago_proveedor $forma_pago_proveedor) {
		try {
			$this->forma_pago_proveedor_Original=$forma_pago_proveedor;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_forma_pago_proveedor() : array {
		return $this->map_forma_pago_proveedor;
	}

	public function setMap_forma_pago_proveedor(array $map_forma_pago_proveedor) {
		$this->map_forma_pago_proveedor = $map_forma_pago_proveedor;
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
