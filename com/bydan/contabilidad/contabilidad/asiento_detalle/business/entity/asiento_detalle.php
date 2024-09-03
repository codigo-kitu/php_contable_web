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
namespace com\bydan\contabilidad\contabilidad\asiento_detalle\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;
use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;

class asiento_detalle extends GeneralEntity {

	/*GENERAL*/
	public static string $class='asiento_detalle';
	
	/*AUXILIARES*/
	public ?asiento_detalle $asiento_detalle_Original=null;	
	public ?GeneralEntity $asiento_detalle_Additional=null;
	public array $map_asiento_detalle=array();	
		
	/*CAMPOS*/
	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public int $id_sucursal = -1;
	public string $id_sucursal_Descripcion = '';

	public int $id_ejercicio = -1;
	public string $id_ejercicio_Descripcion = '';

	public int $id_periodo = -1;
	public string $id_periodo_Descripcion = '';

	public int $id_usuario = -1;
	public string $id_usuario_Descripcion = '';

	public int $id_asiento = -1;
	public string $id_asiento_Descripcion = '';

	public int $id_cuenta = -1;
	public string $id_cuenta_Descripcion = '';

	public int $id_centro_costo = -1;
	public string $id_centro_costo_Descripcion = '';

	public int $orden = 0;
	public float $debito = 0.0;
	public float $credito = 0.0;
	public float $valor_base = 0.0;
	public string $cuenta_contable = '';
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	public ?sucursal $sucursal = null;
	public ?ejercicio $ejercicio = null;
	public ?periodo $periodo = null;
	public ?usuario $usuario = null;
	public ?asiento $asiento = null;
	public ?cuenta $cuenta = null;
	public ?centro_costo $centro_costo = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->asiento_detalle_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->id_sucursal=-1;
		$this->id_sucursal_Descripcion='';

 		$this->id_ejercicio=-1;
		$this->id_ejercicio_Descripcion='';

 		$this->id_periodo=-1;
		$this->id_periodo_Descripcion='';

 		$this->id_usuario=-1;
		$this->id_usuario_Descripcion='';

 		$this->id_asiento=-1;
		$this->id_asiento_Descripcion='';

 		$this->id_cuenta=-1;
		$this->id_cuenta_Descripcion='';

 		$this->id_centro_costo=-1;
		$this->id_centro_costo_Descripcion='';

 		$this->orden=0;
 		$this->debito=0.0;
 		$this->credito=0.0;
 		$this->valor_base=0.0;
 		$this->cuenta_contable='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
			$this->sucursal=new sucursal();
			$this->ejercicio=new ejercicio();
			$this->periodo=new periodo();
			$this->usuario=new usuario();
			$this->asiento=new asiento();
			$this->cuenta=new cuenta();
			$this->centro_costo=new centro_costo();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->asiento_detalle_Additional=new asiento_detalle_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_asiento_detalle() {
		$this->map_asiento_detalle = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_empresa() : ?int {
		return $this->id_empresa;
	}
	
	public function  getid_empresa_Descripcion() : string {
		return $this->id_empresa_Descripcion;
	}
    
	public function  getid_sucursal() : ?int {
		return $this->id_sucursal;
	}
	
	public function  getid_sucursal_Descripcion() : string {
		return $this->id_sucursal_Descripcion;
	}
    
	public function  getid_ejercicio() : ?int {
		return $this->id_ejercicio;
	}
	
	public function  getid_ejercicio_Descripcion() : string {
		return $this->id_ejercicio_Descripcion;
	}
    
	public function  getid_periodo() : ?int {
		return $this->id_periodo;
	}
	
	public function  getid_periodo_Descripcion() : string {
		return $this->id_periodo_Descripcion;
	}
    
	public function  getid_usuario() : ?int {
		return $this->id_usuario;
	}
	
	public function  getid_usuario_Descripcion() : string {
		return $this->id_usuario_Descripcion;
	}
    
	public function  getid_asiento() : ?int {
		return $this->id_asiento;
	}
	
	public function  getid_asiento_Descripcion() : string {
		return $this->id_asiento_Descripcion;
	}
    
	public function  getid_cuenta() : ?int {
		return $this->id_cuenta;
	}
	
	public function  getid_cuenta_Descripcion() : string {
		return $this->id_cuenta_Descripcion;
	}
    
	public function  getid_centro_costo() : ?int {
		return $this->id_centro_costo;
	}
	
	public function  getid_centro_costo_Descripcion() : string {
		return $this->id_centro_costo_Descripcion;
	}
    
	public function  getorden() : ?int {
		return $this->orden;
	}
    
	public function  getdebito() : ?float {
		return $this->debito;
	}
    
	public function  getcredito() : ?float {
		return $this->credito;
	}
    
	public function  getvalor_base() : ?float {
		return $this->valor_base;
	}
    
	public function  getcuenta_contable() : ?string {
		return $this->cuenta_contable;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('asiento_detalle:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento_detalle:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('asiento_detalle:Valor nulo no permitido en columna id_empresa');
				}

				$this->id_empresa_Descripcion=$newid_empresa_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_sucursal(?int $newid_sucursal)
	{
		try {
			if($this->id_sucursal!==$newid_sucursal) {
				if($newid_sucursal===null && $newid_sucursal!='') {
					throw new Exception('asiento_detalle:Valor nulo no permitido en columna id_sucursal');
				}

				if($newid_sucursal!==null && filter_var($newid_sucursal,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento_detalle:No es numero entero - id_sucursal='.$newid_sucursal);
				}

				$this->id_sucursal=$newid_sucursal;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_sucursal_Descripcion(string $newid_sucursal_Descripcion)
	{
		try {
			if($this->id_sucursal_Descripcion!=$newid_sucursal_Descripcion) {
				if($newid_sucursal_Descripcion===null && $newid_sucursal_Descripcion!='') {
					throw new Exception('asiento_detalle:Valor nulo no permitido en columna id_sucursal');
				}

				$this->id_sucursal_Descripcion=$newid_sucursal_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_ejercicio(?int $newid_ejercicio)
	{
		try {
			if($this->id_ejercicio!==$newid_ejercicio) {
				if($newid_ejercicio===null && $newid_ejercicio!='') {
					throw new Exception('asiento_detalle:Valor nulo no permitido en columna id_ejercicio');
				}

				if($newid_ejercicio!==null && filter_var($newid_ejercicio,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento_detalle:No es numero entero - id_ejercicio='.$newid_ejercicio);
				}

				$this->id_ejercicio=$newid_ejercicio;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_ejercicio_Descripcion(string $newid_ejercicio_Descripcion)
	{
		try {
			if($this->id_ejercicio_Descripcion!=$newid_ejercicio_Descripcion) {
				if($newid_ejercicio_Descripcion===null && $newid_ejercicio_Descripcion!='') {
					throw new Exception('asiento_detalle:Valor nulo no permitido en columna id_ejercicio');
				}

				$this->id_ejercicio_Descripcion=$newid_ejercicio_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_periodo(?int $newid_periodo)
	{
		try {
			if($this->id_periodo!==$newid_periodo) {
				if($newid_periodo===null && $newid_periodo!='') {
					throw new Exception('asiento_detalle:Valor nulo no permitido en columna id_periodo');
				}

				if($newid_periodo!==null && filter_var($newid_periodo,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento_detalle:No es numero entero - id_periodo='.$newid_periodo);
				}

				$this->id_periodo=$newid_periodo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_periodo_Descripcion(string $newid_periodo_Descripcion)
	{
		try {
			if($this->id_periodo_Descripcion!=$newid_periodo_Descripcion) {
				if($newid_periodo_Descripcion===null && $newid_periodo_Descripcion!='') {
					throw new Exception('asiento_detalle:Valor nulo no permitido en columna id_periodo');
				}

				$this->id_periodo_Descripcion=$newid_periodo_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_usuario(?int $newid_usuario)
	{
		try {
			if($this->id_usuario!==$newid_usuario) {
				if($newid_usuario===null && $newid_usuario!='') {
					throw new Exception('asiento_detalle:Valor nulo no permitido en columna id_usuario');
				}

				if($newid_usuario!==null && filter_var($newid_usuario,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento_detalle:No es numero entero - id_usuario='.$newid_usuario);
				}

				$this->id_usuario=$newid_usuario;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_usuario_Descripcion(string $newid_usuario_Descripcion)
	{
		try {
			if($this->id_usuario_Descripcion!=$newid_usuario_Descripcion) {
				if($newid_usuario_Descripcion===null && $newid_usuario_Descripcion!='') {
					throw new Exception('asiento_detalle:Valor nulo no permitido en columna id_usuario');
				}

				$this->id_usuario_Descripcion=$newid_usuario_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_asiento(?int $newid_asiento) {
		if($this->id_asiento!==$newid_asiento) {

				if($newid_asiento!==null && filter_var($newid_asiento,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento_detalle:No es numero entero - id_asiento');
				}

			$this->id_asiento=$newid_asiento;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_asiento_Descripcion(string $newid_asiento_Descripcion) {
		if($this->id_asiento_Descripcion!=$newid_asiento_Descripcion) {

			$this->id_asiento_Descripcion=$newid_asiento_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function setid_cuenta(?int $newid_cuenta)
	{
		try {
			if($this->id_cuenta!==$newid_cuenta) {
				if($newid_cuenta===null && $newid_cuenta!='') {
					throw new Exception('asiento_detalle:Valor nulo no permitido en columna id_cuenta');
				}

				if($newid_cuenta!==null && filter_var($newid_cuenta,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento_detalle:No es numero entero - id_cuenta='.$newid_cuenta);
				}

				$this->id_cuenta=$newid_cuenta;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_cuenta_Descripcion(string $newid_cuenta_Descripcion)
	{
		try {
			if($this->id_cuenta_Descripcion!=$newid_cuenta_Descripcion) {
				if($newid_cuenta_Descripcion===null && $newid_cuenta_Descripcion!='') {
					throw new Exception('asiento_detalle:Valor nulo no permitido en columna id_cuenta');
				}

				$this->id_cuenta_Descripcion=$newid_cuenta_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_centro_costo(?int $newid_centro_costo)
	{
		try {
			if($this->id_centro_costo!==$newid_centro_costo) {
				if($newid_centro_costo===null && $newid_centro_costo!='') {
					throw new Exception('asiento_detalle:Valor nulo no permitido en columna id_centro_costo');
				}

				if($newid_centro_costo!==null && filter_var($newid_centro_costo,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento_detalle:No es numero entero - id_centro_costo='.$newid_centro_costo);
				}

				$this->id_centro_costo=$newid_centro_costo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_centro_costo_Descripcion(string $newid_centro_costo_Descripcion)
	{
		try {
			if($this->id_centro_costo_Descripcion!=$newid_centro_costo_Descripcion) {
				if($newid_centro_costo_Descripcion===null && $newid_centro_costo_Descripcion!='') {
					throw new Exception('asiento_detalle:Valor nulo no permitido en columna id_centro_costo');
				}

				$this->id_centro_costo_Descripcion=$newid_centro_costo_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setorden(?int $neworden)
	{
		try {
			if($this->orden!==$neworden) {
				if($neworden===null && $neworden!='') {
					throw new Exception('asiento_detalle:Valor nulo no permitido en columna orden');
				}

				if($neworden!==null && filter_var($neworden,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento_detalle:No es numero entero - orden='.$neworden);
				}

				$this->orden=$neworden;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdebito(?float $newdebito)
	{
		try {
			if($this->debito!==$newdebito) {
				if($newdebito===null && $newdebito!='') {
					throw new Exception('asiento_detalle:Valor nulo no permitido en columna debito');
				}

				if($newdebito!=0) {
					if($newdebito!==null && filter_var($newdebito,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('asiento_detalle:No es numero decimal - debito='.$newdebito);
					}
				}

				$this->debito=$newdebito;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcredito(?float $newcredito)
	{
		try {
			if($this->credito!==$newcredito) {
				if($newcredito===null && $newcredito!='') {
					throw new Exception('asiento_detalle:Valor nulo no permitido en columna credito');
				}

				if($newcredito!=0) {
					if($newcredito!==null && filter_var($newcredito,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('asiento_detalle:No es numero decimal - credito='.$newcredito);
					}
				}

				$this->credito=$newcredito;
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
					throw new Exception('asiento_detalle:Valor nulo no permitido en columna valor_base');
				}

				if($newvalor_base!=0) {
					if($newvalor_base!==null && filter_var($newvalor_base,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('asiento_detalle:No es numero decimal - valor_base='.$newvalor_base);
					}
				}

				$this->valor_base=$newvalor_base;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcuenta_contable(?string $newcuenta_contable) {
		if($this->cuenta_contable!==$newcuenta_contable) {

				if(strlen($newcuenta_contable)>20) {
					try {
						throw new Exception('asiento_detalle:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=cuenta_contable en columna cuenta_contable');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newcuenta_contable,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('asiento_detalle:Formato incorrecto en la columna cuenta_contable='.$newcuenta_contable);
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

	public function getsucursal() : ?sucursal {
		return $this->sucursal;
	}

	public function getejercicio() : ?ejercicio {
		return $this->ejercicio;
	}

	public function getperiodo() : ?periodo {
		return $this->periodo;
	}

	public function getusuario() : ?usuario {
		return $this->usuario;
	}

	public function getasiento() : ?asiento {
		return $this->asiento;
	}

	public function getcuenta() : ?cuenta {
		return $this->cuenta;
	}

	public function getcentro_costo() : ?centro_costo {
		return $this->centro_costo;
	}

	
	
	public  function  setempresa(?empresa $empresa) {
		try {
			$this->empresa=$empresa;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setsucursal(?sucursal $sucursal) {
		try {
			$this->sucursal=$sucursal;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setejercicio(?ejercicio $ejercicio) {
		try {
			$this->ejercicio=$ejercicio;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setperiodo(?periodo $periodo) {
		try {
			$this->periodo=$periodo;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setusuario(?usuario $usuario) {
		try {
			$this->usuario=$usuario;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setasiento(?asiento $asiento) {
		try {
			$this->asiento=$asiento;
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


	public  function  setcentro_costo(?centro_costo $centro_costo) {
		try {
			$this->centro_costo=$centro_costo;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_asiento_detalleValue(string $sKey,$oValue) {
		$this->map_asiento_detalle[$sKey]=$oValue;
	}
	
	public function getMap_asiento_detalleValue(string $sKey) {
		return $this->map_asiento_detalle[$sKey];
	}
	
	public function getasiento_detalle_Original() : ?asiento_detalle {
		return $this->asiento_detalle_Original;
	}
	
	public function setasiento_detalle_Original(asiento_detalle $asiento_detalle) {
		try {
			$this->asiento_detalle_Original=$asiento_detalle;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_asiento_detalle() : array {
		return $this->map_asiento_detalle;
	}

	public function setMap_asiento_detalle(array $map_asiento_detalle) {
		$this->map_asiento_detalle = $map_asiento_detalle;
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
