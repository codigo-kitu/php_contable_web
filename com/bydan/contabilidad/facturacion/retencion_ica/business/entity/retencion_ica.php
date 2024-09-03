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
namespace com\bydan\contabilidad\facturacion\retencion_ica\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;

class retencion_ica extends GeneralEntity {

	/*GENERAL*/
	public static string $class='retencion_ica';
	
	/*AUXILIARES*/
	public ?retencion_ica $retencion_ica_Original=null;	
	public ?GeneralEntity $retencion_ica_Additional=null;
	public array $map_retencion_ica=array();	
		
	/*CAMPOS*/
	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public string $codigo = '';
	public string $descripcion = '';
	public float $valor = 0.0;
	public float $valor_base = 0.0;
	public bool $predeterminado = false;
	public ?int $id_cuenta_ventas = null;
	public string $id_cuenta_ventas_Descripcion = '';

	public ?int $id_cuenta_compras = null;
	public string $id_cuenta_compras_Descripcion = '';

	public string $cuenta_contable_ventas = '';
	public string $cuenta_contable_compras = '';
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	public ?cuenta $cuenta_ventas = null;
	public ?cuenta $cuenta_compras = null;
	
	/*RELACIONES*/
	
	public array $proveedors = array();
	public array $clientes = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->retencion_ica_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->codigo='';
 		$this->descripcion='';
 		$this->valor=0.0;
 		$this->valor_base=0.0;
 		$this->predeterminado=false;
 		$this->id_cuenta_ventas=null;
		$this->id_cuenta_ventas_Descripcion='';

 		$this->id_cuenta_compras=null;
		$this->id_cuenta_compras_Descripcion='';

 		$this->cuenta_contable_ventas='';
 		$this->cuenta_contable_compras='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
			$this->cuenta_ventas=new cuenta();
			$this->cuenta_compras=new cuenta();
		}
		
		/*RELACIONES*/
		
		$this->proveedors=array();
		$this->clientes=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->retencion_ica_Additional=new retencion_ica_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_retencion_ica() {
		$this->map_retencion_ica = array();
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
    
	public function  getdescripcion() : ?string {
		return $this->descripcion;
	}
    
	public function  getvalor() : ?float {
		return $this->valor;
	}
    
	public function  getvalor_base() : ?float {
		return $this->valor_base;
	}
    
	public function  getpredeterminado() : ?bool {
		return $this->predeterminado;
	}
    
	public function  getid_cuenta_ventas() : ?int {
		return $this->id_cuenta_ventas;
	}
	
	public function  getid_cuenta_ventas_Descripcion() : string {
		return $this->id_cuenta_ventas_Descripcion;
	}
    
	public function  getid_cuenta_compras() : ?int {
		return $this->id_cuenta_compras;
	}
	
	public function  getid_cuenta_compras_Descripcion() : string {
		return $this->id_cuenta_compras_Descripcion;
	}
    
	public function  getcuenta_contable_ventas() : ?string {
		return $this->cuenta_contable_ventas;
	}
    
	public function  getcuenta_contable_compras() : ?string {
		return $this->cuenta_contable_compras;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('retencion_ica:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('retencion_ica:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('retencion_ica:Valor nulo no permitido en columna id_empresa');
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
					throw new Exception('retencion_ica:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>5) {
					throw new Exception('retencion_ica:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=5 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('retencion_ica:Formato incorrecto en columna codigo='.$newcodigo);
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
					throw new Exception('retencion_ica:Valor nulo no permitido en columna descripcion');
				}

				if(strlen($newdescripcion)>40) {
					throw new Exception('retencion_ica:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=40 en columna descripcion');
				}

				if(filter_var($newdescripcion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('retencion_ica:Formato incorrecto en columna descripcion='.$newdescripcion);
				}

				$this->descripcion=$newdescripcion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setvalor(?float $newvalor)
	{
		try {
			if($this->valor!==$newvalor) {
				if($newvalor===null && $newvalor!='') {
					throw new Exception('retencion_ica:Valor nulo no permitido en columna valor');
				}

				if($newvalor!=0) {
					if($newvalor!==null && filter_var($newvalor,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('retencion_ica:No es numero decimal - valor='.$newvalor);
					}
				}

				$this->valor=$newvalor;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setvalor_base(?float $newvalor_base)
	{
		try {
			if($this->valor_base!==$newvalor_base) {
				if($newvalor_base===null && $newvalor_base!='') {
					throw new Exception('retencion_ica:Valor nulo no permitido en columna valor_base');
				}

				if($newvalor_base!=0) {
					if($newvalor_base!==null && filter_var($newvalor_base,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('retencion_ica:No es numero decimal - valor_base='.$newvalor_base);
					}
				}

				$this->valor_base=$newvalor_base;
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
					throw new Exception('retencion_ica:Valor nulo no permitido en columna predeterminado');
				}

				if($newpredeterminado!==null && filter_var($newpredeterminado,FILTER_VALIDATE_BOOLEAN)===false && $newpredeterminado!==0 && $newpredeterminado!==false) {
					throw new Exception('retencion_ica:No es valor booleano - predeterminado='.$newpredeterminado);
				}

				$this->predeterminado=$newpredeterminado;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_cuenta_ventas(?int $newid_cuenta_ventas) {
		if($this->id_cuenta_ventas!==$newid_cuenta_ventas) {

				if($newid_cuenta_ventas!==null && filter_var($newid_cuenta_ventas,FILTER_VALIDATE_INT)===false) {
					throw new Exception('retencion_ica:No es numero entero - id_cuenta_ventas');
				}

			$this->id_cuenta_ventas=$newid_cuenta_ventas;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_cuenta_ventas_Descripcion(string $newid_cuenta_ventas_Descripcion) {
		if($this->id_cuenta_ventas_Descripcion!=$newid_cuenta_ventas_Descripcion) {

			$this->id_cuenta_ventas_Descripcion=$newid_cuenta_ventas_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function setid_cuenta_compras(?int $newid_cuenta_compras) {
		if($this->id_cuenta_compras!==$newid_cuenta_compras) {

				if($newid_cuenta_compras!==null && filter_var($newid_cuenta_compras,FILTER_VALIDATE_INT)===false) {
					throw new Exception('retencion_ica:No es numero entero - id_cuenta_compras');
				}

			$this->id_cuenta_compras=$newid_cuenta_compras;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_cuenta_compras_Descripcion(string $newid_cuenta_compras_Descripcion) {
		if($this->id_cuenta_compras_Descripcion!=$newid_cuenta_compras_Descripcion) {

			$this->id_cuenta_compras_Descripcion=$newid_cuenta_compras_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function setcuenta_contable_ventas(?string $newcuenta_contable_ventas) {
		if($this->cuenta_contable_ventas!==$newcuenta_contable_ventas) {

				if(strlen($newcuenta_contable_ventas)>20) {
					try {
						throw new Exception('retencion_ica:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=cuenta_contable_ventas en columna cuenta_contable_ventas');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newcuenta_contable_ventas,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('retencion_ica:Formato incorrecto en la columna cuenta_contable_ventas='.$newcuenta_contable_ventas);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->cuenta_contable_ventas=$newcuenta_contable_ventas;
			$this->setIsChanged(true);
		}
	}
    
	public function setcuenta_contable_compras(?string $newcuenta_contable_compras) {
		if($this->cuenta_contable_compras!==$newcuenta_contable_compras) {

				if(strlen($newcuenta_contable_compras)>20) {
					try {
						throw new Exception('retencion_ica:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=cuenta_contable_compras en columna cuenta_contable_compras');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newcuenta_contable_compras,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('retencion_ica:Formato incorrecto en la columna cuenta_contable_compras='.$newcuenta_contable_compras);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->cuenta_contable_compras=$newcuenta_contable_compras;
			$this->setIsChanged(true);
		}
	}
	
	/*FKs*/
	
	public function getempresa() : ?empresa {
		return $this->empresa;
	}

	public function getcuenta_ventas() : ?cuenta {
		return $this->cuenta_ventas;
	}

	public function getcuenta_compras() : ?cuenta {
		return $this->cuenta_compras;
	}

	
	
	public  function  setempresa(?empresa $empresa) {
		try {
			$this->empresa=$empresa;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setcuenta_ventas(?cuenta $cuenta_ventas) {
		try {
			$this->cuenta_ventas=$cuenta_ventas;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setcuenta_compras(?cuenta $cuenta_compras) {
		try {
			$this->cuenta_compras=$cuenta_compras;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	public function getproveedors() : array {
		return $this->proveedors;
	}

	public function getclientes() : array {
		return $this->clientes;
	}

	
	
	public  function  setproveedors(array $proveedors) {
		try {
			$this->proveedors=$proveedors;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setclientes(array $clientes) {
		try {
			$this->clientes=$clientes;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_retencion_icaValue(string $sKey,$oValue) {
		$this->map_retencion_ica[$sKey]=$oValue;
	}
	
	public function getMap_retencion_icaValue(string $sKey) {
		return $this->map_retencion_ica[$sKey];
	}
	
	public function getretencion_ica_Original() : ?retencion_ica {
		return $this->retencion_ica_Original;
	}
	
	public function setretencion_ica_Original(retencion_ica $retencion_ica) {
		try {
			$this->retencion_ica_Original=$retencion_ica;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_retencion_ica() : array {
		return $this->map_retencion_ica;
	}

	public function setMap_retencion_ica(array $map_retencion_ica) {
		$this->map_retencion_ica = $map_retencion_ica;
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
