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
namespace com\bydan\contabilidad\contabilidad\saldo_cuenta\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;

class saldo_cuenta extends GeneralEntity {

	/*GENERAL*/
	public static string $class='saldo_cuenta';
	
	/*AUXILIARES*/
	public ?saldo_cuenta $saldo_cuenta_Original=null;	
	public ?GeneralEntity $saldo_cuenta_Additional=null;
	public array $map_saldo_cuenta=array();	
		
	/*CAMPOS*/
	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public int $id_ejercicio = -1;
	public string $id_ejercicio_Descripcion = '';

	public int $id_periodo = -1;
	public string $id_periodo_Descripcion = '';

	public int $id_tipo_cuenta = -1;
	public string $id_tipo_cuenta_Descripcion = '';

	public int $id_cuenta = -1;
	public string $id_cuenta_Descripcion = '';

	public float $suma_debe = 0.0;
	public float $suma_haber = 0.0;
	public float $deudor = 0.0;
	public float $acreedor = 0.0;
	public float $saldo = 0.0;
	public string $fecha_proceso = '';
	public string $fecha_fin_mes = '';
	public string $tipo_cuenta_codigo = '';
	public string $cuenta_contable = '';
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	public ?ejercicio $ejercicio = null;
	public ?periodo $periodo = null;
	public ?tipo_cuenta $tipo_cuenta = null;
	public ?cuenta $cuenta = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->saldo_cuenta_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->id_ejercicio=-1;
		$this->id_ejercicio_Descripcion='';

 		$this->id_periodo=-1;
		$this->id_periodo_Descripcion='';

 		$this->id_tipo_cuenta=-1;
		$this->id_tipo_cuenta_Descripcion='';

 		$this->id_cuenta=-1;
		$this->id_cuenta_Descripcion='';

 		$this->suma_debe=0.0;
 		$this->suma_haber=0.0;
 		$this->deudor=0.0;
 		$this->acreedor=0.0;
 		$this->saldo=0.0;
 		$this->fecha_proceso=date('Y-m-d');
 		$this->fecha_fin_mes=date('Y-m-d');
 		$this->tipo_cuenta_codigo='';
 		$this->cuenta_contable='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
			$this->ejercicio=new ejercicio();
			$this->periodo=new periodo();
			$this->tipo_cuenta=new tipo_cuenta();
			$this->cuenta=new cuenta();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->saldo_cuenta_Additional=new saldo_cuenta_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_saldo_cuenta() {
		$this->map_saldo_cuenta = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_empresa() : ?int {
		return $this->id_empresa;
	}
	
	public function  getid_empresa_Descripcion() : string {
		return $this->id_empresa_Descripcion;
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
    
	public function  getid_tipo_cuenta() : ?int {
		return $this->id_tipo_cuenta;
	}
	
	public function  getid_tipo_cuenta_Descripcion() : string {
		return $this->id_tipo_cuenta_Descripcion;
	}
    
	public function  getid_cuenta() : ?int {
		return $this->id_cuenta;
	}
	
	public function  getid_cuenta_Descripcion() : string {
		return $this->id_cuenta_Descripcion;
	}
    
	public function  getsuma_debe() : ?float {
		return $this->suma_debe;
	}
    
	public function  getsuma_haber() : ?float {
		return $this->suma_haber;
	}
    
	public function  getdeudor() : ?float {
		return $this->deudor;
	}
    
	public function  getacreedor() : ?float {
		return $this->acreedor;
	}
    
	public function  getsaldo() : ?float {
		return $this->saldo;
	}
    
	public function  getfecha_proceso() : ?string {
		return $this->fecha_proceso;
	}
    
	public function  getfecha_fin_mes() : ?string {
		return $this->fecha_fin_mes;
	}
    
	public function  gettipo_cuenta_codigo() : ?string {
		return $this->tipo_cuenta_codigo;
	}
    
	public function  getcuenta_contable() : ?string {
		return $this->cuenta_contable;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('saldo_cuenta:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('saldo_cuenta:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('saldo_cuenta:Valor nulo no permitido en columna id_empresa');
				}

				$this->id_empresa_Descripcion=$newid_empresa_Descripcion;
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
					throw new Exception('saldo_cuenta:Valor nulo no permitido en columna id_ejercicio');
				}

				if($newid_ejercicio!==null && filter_var($newid_ejercicio,FILTER_VALIDATE_INT)===false) {
					throw new Exception('saldo_cuenta:No es numero entero - id_ejercicio='.$newid_ejercicio);
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
					throw new Exception('saldo_cuenta:Valor nulo no permitido en columna id_ejercicio');
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
					throw new Exception('saldo_cuenta:Valor nulo no permitido en columna id_periodo');
				}

				if($newid_periodo!==null && filter_var($newid_periodo,FILTER_VALIDATE_INT)===false) {
					throw new Exception('saldo_cuenta:No es numero entero - id_periodo='.$newid_periodo);
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
					throw new Exception('saldo_cuenta:Valor nulo no permitido en columna id_periodo');
				}

				$this->id_periodo_Descripcion=$newid_periodo_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_tipo_cuenta(?int $newid_tipo_cuenta)
	{
		try {
			if($this->id_tipo_cuenta!==$newid_tipo_cuenta) {
				if($newid_tipo_cuenta===null && $newid_tipo_cuenta!='') {
					throw new Exception('saldo_cuenta:Valor nulo no permitido en columna id_tipo_cuenta');
				}

				if($newid_tipo_cuenta!==null && filter_var($newid_tipo_cuenta,FILTER_VALIDATE_INT)===false) {
					throw new Exception('saldo_cuenta:No es numero entero - id_tipo_cuenta='.$newid_tipo_cuenta);
				}

				$this->id_tipo_cuenta=$newid_tipo_cuenta;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_tipo_cuenta_Descripcion(string $newid_tipo_cuenta_Descripcion)
	{
		try {
			if($this->id_tipo_cuenta_Descripcion!=$newid_tipo_cuenta_Descripcion) {
				if($newid_tipo_cuenta_Descripcion===null && $newid_tipo_cuenta_Descripcion!='') {
					throw new Exception('saldo_cuenta:Valor nulo no permitido en columna id_tipo_cuenta');
				}

				$this->id_tipo_cuenta_Descripcion=$newid_tipo_cuenta_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_cuenta(?int $newid_cuenta)
	{
		try {
			if($this->id_cuenta!==$newid_cuenta) {
				if($newid_cuenta===null && $newid_cuenta!='') {
					throw new Exception('saldo_cuenta:Valor nulo no permitido en columna id_cuenta');
				}

				if($newid_cuenta!==null && filter_var($newid_cuenta,FILTER_VALIDATE_INT)===false) {
					throw new Exception('saldo_cuenta:No es numero entero - id_cuenta='.$newid_cuenta);
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
					throw new Exception('saldo_cuenta:Valor nulo no permitido en columna id_cuenta');
				}

				$this->id_cuenta_Descripcion=$newid_cuenta_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setsuma_debe(?float $newsuma_debe)
	{
		try {
			if($this->suma_debe!==$newsuma_debe) {
				if($newsuma_debe===null && $newsuma_debe!='') {
					throw new Exception('saldo_cuenta:Valor nulo no permitido en columna suma_debe');
				}

				if($newsuma_debe!=0) {
					if($newsuma_debe!==null && filter_var($newsuma_debe,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('saldo_cuenta:No es numero decimal - suma_debe='.$newsuma_debe);
					}
				}

				$this->suma_debe=$newsuma_debe;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setsuma_haber(?float $newsuma_haber)
	{
		try {
			if($this->suma_haber!==$newsuma_haber) {
				if($newsuma_haber===null && $newsuma_haber!='') {
					throw new Exception('saldo_cuenta:Valor nulo no permitido en columna suma_haber');
				}

				if($newsuma_haber!=0) {
					if($newsuma_haber!==null && filter_var($newsuma_haber,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('saldo_cuenta:No es numero decimal - suma_haber='.$newsuma_haber);
					}
				}

				$this->suma_haber=$newsuma_haber;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdeudor(?float $newdeudor)
	{
		try {
			if($this->deudor!==$newdeudor) {
				if($newdeudor===null && $newdeudor!='') {
					throw new Exception('saldo_cuenta:Valor nulo no permitido en columna deudor');
				}

				if($newdeudor!=0) {
					if($newdeudor!==null && filter_var($newdeudor,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('saldo_cuenta:No es numero decimal - deudor='.$newdeudor);
					}
				}

				$this->deudor=$newdeudor;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setacreedor(?float $newacreedor)
	{
		try {
			if($this->acreedor!==$newacreedor) {
				if($newacreedor===null && $newacreedor!='') {
					throw new Exception('saldo_cuenta:Valor nulo no permitido en columna acreedor');
				}

				if($newacreedor!=0) {
					if($newacreedor!==null && filter_var($newacreedor,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('saldo_cuenta:No es numero decimal - acreedor='.$newacreedor);
					}
				}

				$this->acreedor=$newacreedor;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setsaldo(?float $newsaldo)
	{
		try {
			if($this->saldo!==$newsaldo) {
				if($newsaldo===null && $newsaldo!='') {
					throw new Exception('saldo_cuenta:Valor nulo no permitido en columna saldo');
				}

				if($newsaldo!=0) {
					if($newsaldo!==null && filter_var($newsaldo,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('saldo_cuenta:No es numero decimal - saldo='.$newsaldo);
					}
				}

				$this->saldo=$newsaldo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setfecha_proceso(?string $newfecha_proceso)
	{
		try {
			if($this->fecha_proceso!==$newfecha_proceso) {
				if($newfecha_proceso===null && $newfecha_proceso!='') {
					throw new Exception('saldo_cuenta:Valor nulo no permitido en columna fecha_proceso');
				}

				if($newfecha_proceso!==null && filter_var($newfecha_proceso,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('saldo_cuenta:No es fecha - fecha_proceso='.$newfecha_proceso);
				}

				$this->fecha_proceso=$newfecha_proceso;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setfecha_fin_mes(?string $newfecha_fin_mes)
	{
		try {
			if($this->fecha_fin_mes!==$newfecha_fin_mes) {
				if($newfecha_fin_mes===null && $newfecha_fin_mes!='') {
					throw new Exception('saldo_cuenta:Valor nulo no permitido en columna fecha_fin_mes');
				}

				if($newfecha_fin_mes!==null && filter_var($newfecha_fin_mes,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('saldo_cuenta:No es fecha - fecha_fin_mes='.$newfecha_fin_mes);
				}

				$this->fecha_fin_mes=$newfecha_fin_mes;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function settipo_cuenta_codigo(?string $newtipo_cuenta_codigo) {
		if($this->tipo_cuenta_codigo!==$newtipo_cuenta_codigo) {

				if(strlen($newtipo_cuenta_codigo)>2) {
					try {
						throw new Exception('saldo_cuenta:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=tipo_cuenta_codigo en columna tipo_cuenta_codigo');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newtipo_cuenta_codigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('saldo_cuenta:Formato incorrecto en la columna tipo_cuenta_codigo='.$newtipo_cuenta_codigo);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->tipo_cuenta_codigo=$newtipo_cuenta_codigo;
			$this->setIsChanged(true);
		}
	}
    
	public function setcuenta_contable(?string $newcuenta_contable) {
		if($this->cuenta_contable!==$newcuenta_contable) {

				if(strlen($newcuenta_contable)>20) {
					try {
						throw new Exception('saldo_cuenta:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=cuenta_contable en columna cuenta_contable');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newcuenta_contable,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('saldo_cuenta:Formato incorrecto en la columna cuenta_contable='.$newcuenta_contable);
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

	public function getejercicio() : ?ejercicio {
		return $this->ejercicio;
	}

	public function getperiodo() : ?periodo {
		return $this->periodo;
	}

	public function gettipo_cuenta() : ?tipo_cuenta {
		return $this->tipo_cuenta;
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


	public  function  settipo_cuenta(?tipo_cuenta $tipo_cuenta) {
		try {
			$this->tipo_cuenta=$tipo_cuenta;
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
	
	
	
	
	/*AUXILIARES*/
	public function setMap_saldo_cuentaValue(string $sKey,$oValue) {
		$this->map_saldo_cuenta[$sKey]=$oValue;
	}
	
	public function getMap_saldo_cuentaValue(string $sKey) {
		return $this->map_saldo_cuenta[$sKey];
	}
	
	public function getsaldo_cuenta_Original() : ?saldo_cuenta {
		return $this->saldo_cuenta_Original;
	}
	
	public function setsaldo_cuenta_Original(saldo_cuenta $saldo_cuenta) {
		try {
			$this->saldo_cuenta_Original=$saldo_cuenta;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_saldo_cuenta() : array {
		return $this->map_saldo_cuenta;
	}

	public function setMap_saldo_cuenta(array $map_saldo_cuenta) {
		$this->map_saldo_cuenta = $map_saldo_cuenta;
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
