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
namespace com\bydan\contabilidad\cuentascorrientes\instrumento_pago\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;

class instrumento_pago extends GeneralEntity {

	/*GENERAL*/
	public static string $class='instrumento_pago';
	
	/*AUXILIARES*/
	public ?instrumento_pago $instrumento_pago_Original=null;	
	public ?GeneralEntity $instrumento_pago_Additional=null;
	public array $map_instrumento_pago=array();	
		
	/*CAMPOS*/
	public string $codigo = '';
	public string $descripcion = '';
	public int $predeterminado = 0;
	public int $id_cuenta_compras = -1;
	public string $id_cuenta_compras_Descripcion = '';

	public int $id_cuenta_ventas = -1;
	public string $id_cuenta_ventas_Descripcion = '';

	public string $cuenta_contable_compra = '';
	public string $cuenta_contable_ventas = '';
	public int $id_cuenta_corriente = -1;
	public string $id_cuenta_corriente_Descripcion = '';

	
	/*FKs*/
	
	public ?cuenta $cuenta_compras = null;
	public ?cuenta $cuenta_ventas = null;
	public ?cuenta_corriente $cuenta_corriente = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->instrumento_pago_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->codigo='';
 		$this->descripcion='';
 		$this->predeterminado=0;
 		$this->id_cuenta_compras=-1;
		$this->id_cuenta_compras_Descripcion='';

 		$this->id_cuenta_ventas=-1;
		$this->id_cuenta_ventas_Descripcion='';

 		$this->cuenta_contable_compra='';
 		$this->cuenta_contable_ventas='';
 		$this->id_cuenta_corriente=-1;
		$this->id_cuenta_corriente_Descripcion='';

		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->cuenta_compras=new cuenta();
			$this->cuenta_ventas=new cuenta();
			$this->cuenta_corriente=new cuenta_corriente();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->instrumento_pago_Additional=new instrumento_pago_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_instrumento_pago() {
		$this->map_instrumento_pago = array();
	}
	
	/*CAMPOS*/
    
	public function  getcodigo() : ?string {
		return $this->codigo;
	}
    
	public function  getdescripcion() : ?string {
		return $this->descripcion;
	}
    
	public function  getpredeterminado() : ?int {
		return $this->predeterminado;
	}
    
	public function  getid_cuenta_compras() : ?int {
		return $this->id_cuenta_compras;
	}
	
	public function  getid_cuenta_compras_Descripcion() : string {
		return $this->id_cuenta_compras_Descripcion;
	}
    
	public function  getid_cuenta_ventas() : ?int {
		return $this->id_cuenta_ventas;
	}
	
	public function  getid_cuenta_ventas_Descripcion() : string {
		return $this->id_cuenta_ventas_Descripcion;
	}
    
	public function  getcuenta_contable_compra() : ?string {
		return $this->cuenta_contable_compra;
	}
    
	public function  getcuenta_contable_ventas() : ?string {
		return $this->cuenta_contable_ventas;
	}
    
	public function  getid_cuenta_corriente() : ?int {
		return $this->id_cuenta_corriente;
	}
	
	public function  getid_cuenta_corriente_Descripcion() : string {
		return $this->id_cuenta_corriente_Descripcion;
	}
	
    
	public function setcodigo(?string $newcodigo)
	{
		try {
			if($this->codigo!==$newcodigo) {
				if($newcodigo===null && $newcodigo!='') {
					throw new Exception('instrumento_pago:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>4) {
					throw new Exception('instrumento_pago:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=4 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('instrumento_pago:Formato incorrecto en columna codigo='.$newcodigo);
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
					throw new Exception('instrumento_pago:Valor nulo no permitido en columna descripcion');
				}

				if(strlen($newdescripcion)>50) {
					throw new Exception('instrumento_pago:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna descripcion');
				}

				if(filter_var($newdescripcion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('instrumento_pago:Formato incorrecto en columna descripcion='.$newdescripcion);
				}

				$this->descripcion=$newdescripcion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setpredeterminado(?int $newpredeterminado)
	{
		try {
			if($this->predeterminado!==$newpredeterminado) {
				if($newpredeterminado===null && $newpredeterminado!='') {
					throw new Exception('instrumento_pago:Valor nulo no permitido en columna predeterminado');
				}

				if($newpredeterminado!==null && filter_var($newpredeterminado,FILTER_VALIDATE_INT)===false) {
					throw new Exception('instrumento_pago:No es numero entero - predeterminado='.$newpredeterminado);
				}

				$this->predeterminado=$newpredeterminado;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_cuenta_compras(?int $newid_cuenta_compras) {
		if($this->id_cuenta_compras!==$newid_cuenta_compras) {

				if($newid_cuenta_compras!==null && filter_var($newid_cuenta_compras,FILTER_VALIDATE_INT)===false) {
					throw new Exception('instrumento_pago:No es numero entero - id_cuenta_compras');
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
    
	public function setid_cuenta_ventas(?int $newid_cuenta_ventas) {
		if($this->id_cuenta_ventas!==$newid_cuenta_ventas) {

				if($newid_cuenta_ventas!==null && filter_var($newid_cuenta_ventas,FILTER_VALIDATE_INT)===false) {
					throw new Exception('instrumento_pago:No es numero entero - id_cuenta_ventas');
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
    
	public function setcuenta_contable_compra(?string $newcuenta_contable_compra)
	{
		try {
			if($this->cuenta_contable_compra!==$newcuenta_contable_compra) {
				if($newcuenta_contable_compra===null && $newcuenta_contable_compra!='') {
					throw new Exception('instrumento_pago:Valor nulo no permitido en columna cuenta_contable_compra');
				}

				if(strlen($newcuenta_contable_compra)>20) {
					throw new Exception('instrumento_pago:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=20 en columna cuenta_contable_compra');
				}

				if(filter_var($newcuenta_contable_compra,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('instrumento_pago:Formato incorrecto en columna cuenta_contable_compra='.$newcuenta_contable_compra);
				}

				$this->cuenta_contable_compra=$newcuenta_contable_compra;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcuenta_contable_ventas(?string $newcuenta_contable_ventas)
	{
		try {
			if($this->cuenta_contable_ventas!==$newcuenta_contable_ventas) {
				if($newcuenta_contable_ventas===null && $newcuenta_contable_ventas!='') {
					throw new Exception('instrumento_pago:Valor nulo no permitido en columna cuenta_contable_ventas');
				}

				if(strlen($newcuenta_contable_ventas)>20) {
					throw new Exception('instrumento_pago:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=20 en columna cuenta_contable_ventas');
				}

				if(filter_var($newcuenta_contable_ventas,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('instrumento_pago:Formato incorrecto en columna cuenta_contable_ventas='.$newcuenta_contable_ventas);
				}

				$this->cuenta_contable_ventas=$newcuenta_contable_ventas;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_cuenta_corriente(?int $newid_cuenta_corriente)
	{
		try {
			if($this->id_cuenta_corriente!==$newid_cuenta_corriente) {
				if($newid_cuenta_corriente===null && $newid_cuenta_corriente!='') {
					throw new Exception('instrumento_pago:Valor nulo no permitido en columna id_cuenta_corriente');
				}

				if($newid_cuenta_corriente!==null && filter_var($newid_cuenta_corriente,FILTER_VALIDATE_INT)===false) {
					throw new Exception('instrumento_pago:No es numero entero - id_cuenta_corriente='.$newid_cuenta_corriente);
				}

				$this->id_cuenta_corriente=$newid_cuenta_corriente;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_cuenta_corriente_Descripcion(string $newid_cuenta_corriente_Descripcion)
	{
		try {
			if($this->id_cuenta_corriente_Descripcion!=$newid_cuenta_corriente_Descripcion) {
				if($newid_cuenta_corriente_Descripcion===null && $newid_cuenta_corriente_Descripcion!='') {
					throw new Exception('instrumento_pago:Valor nulo no permitido en columna id_cuenta_corriente');
				}

				$this->id_cuenta_corriente_Descripcion=$newid_cuenta_corriente_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	public function getcuenta_compras() : ?cuenta {
		return $this->cuenta_compras;
	}

	public function getcuenta_ventas() : ?cuenta {
		return $this->cuenta_ventas;
	}

	public function getcuenta_corriente() : ?cuenta_corriente {
		return $this->cuenta_corriente;
	}

	
	
	public  function  setcuenta_compras(?cuenta $cuenta_compras) {
		try {
			$this->cuenta_compras=$cuenta_compras;
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


	public  function  setcuenta_corriente(?cuenta_corriente $cuenta_corriente) {
		try {
			$this->cuenta_corriente=$cuenta_corriente;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_instrumento_pagoValue(string $sKey,$oValue) {
		$this->map_instrumento_pago[$sKey]=$oValue;
	}
	
	public function getMap_instrumento_pagoValue(string $sKey) {
		return $this->map_instrumento_pago[$sKey];
	}
	
	public function getinstrumento_pago_Original() : ?instrumento_pago {
		return $this->instrumento_pago_Original;
	}
	
	public function setinstrumento_pago_Original(instrumento_pago $instrumento_pago) {
		try {
			$this->instrumento_pago_Original=$instrumento_pago;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_instrumento_pago() : array {
		return $this->map_instrumento_pago;
	}

	public function setMap_instrumento_pago(array $map_instrumento_pago) {
		$this->map_instrumento_pago = $map_instrumento_pago;
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
