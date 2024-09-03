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
namespace com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;
use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;

class deposito_cuenta_corriente extends GeneralEntity {

	/*GENERAL*/
	public static string $class='deposito_cuenta_corriente';
	
	/*AUXILIARES*/
	public ?deposito_cuenta_corriente $deposito_cuenta_corriente_Original=null;	
	public ?GeneralEntity $deposito_cuenta_corriente_Additional=null;
	public array $map_deposito_cuenta_corriente=array();	
		
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

	public int $id_cuenta_corriente = -1;
	public string $id_cuenta_corriente_Descripcion = '';

	public string $fecha_emision = '';
	public float $monto = 0.0;
	public string $monto_texto = '';
	public float $saldo = 0.0;
	public string $descripcion = '';
	public bool $es_balance_inicial = false;
	public int $id_estado_deposito_retiro = -1;
	public string $id_estado_deposito_retiro_Descripcion = '';

	public float $debito = 0.0;
	public float $credito = 0.0;
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	public ?sucursal $sucursal = null;
	public ?ejercicio $ejercicio = null;
	public ?periodo $periodo = null;
	public ?usuario $usuario = null;
	public ?cuenta_corriente $cuenta_corriente = null;
	public ?estado_deposito_retiro $estado_deposito_retiro = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->deposito_cuenta_corriente_Original=$this;
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

 		$this->id_cuenta_corriente=-1;
		$this->id_cuenta_corriente_Descripcion='';

 		$this->fecha_emision=date('Y-m-d');
 		$this->monto=0.0;
 		$this->monto_texto='';
 		$this->saldo=0.0;
 		$this->descripcion='';
 		$this->es_balance_inicial=false;
 		$this->id_estado_deposito_retiro=-1;
		$this->id_estado_deposito_retiro_Descripcion='';

 		$this->debito=0.0;
 		$this->credito=0.0;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
			$this->sucursal=new sucursal();
			$this->ejercicio=new ejercicio();
			$this->periodo=new periodo();
			$this->usuario=new usuario();
			$this->cuenta_corriente=new cuenta_corriente();
			$this->estado_deposito_retiro=new estado_deposito_retiro();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->deposito_cuenta_corriente_Additional=new deposito_cuenta_corriente_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_deposito_cuenta_corriente() {
		$this->map_deposito_cuenta_corriente = array();
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
    
	public function  getid_cuenta_corriente() : ?int {
		return $this->id_cuenta_corriente;
	}
	
	public function  getid_cuenta_corriente_Descripcion() : string {
		return $this->id_cuenta_corriente_Descripcion;
	}
    
	public function  getfecha_emision() : ?string {
		return $this->fecha_emision;
	}
    
	public function  getmonto() : ?float {
		return $this->monto;
	}
    
	public function  getmonto_texto() : ?string {
		return $this->monto_texto;
	}
    
	public function  getsaldo() : ?float {
		return $this->saldo;
	}
    
	public function  getdescripcion() : ?string {
		return $this->descripcion;
	}
    
	public function  getes_balance_inicial() : ?bool {
		return $this->es_balance_inicial;
	}
    
	public function  getid_estado_deposito_retiro() : ?int {
		return $this->id_estado_deposito_retiro;
	}
	
	public function  getid_estado_deposito_retiro_Descripcion() : string {
		return $this->id_estado_deposito_retiro_Descripcion;
	}
    
	public function  getdebito() : ?float {
		return $this->debito;
	}
    
	public function  getcredito() : ?float {
		return $this->credito;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('deposito_cuenta_corriente:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('deposito_cuenta_corriente:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('deposito_cuenta_corriente:Valor nulo no permitido en columna id_empresa');
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
					throw new Exception('deposito_cuenta_corriente:Valor nulo no permitido en columna id_sucursal');
				}

				if($newid_sucursal!==null && filter_var($newid_sucursal,FILTER_VALIDATE_INT)===false) {
					throw new Exception('deposito_cuenta_corriente:No es numero entero - id_sucursal='.$newid_sucursal);
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
					throw new Exception('deposito_cuenta_corriente:Valor nulo no permitido en columna id_sucursal');
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
					throw new Exception('deposito_cuenta_corriente:Valor nulo no permitido en columna id_ejercicio');
				}

				if($newid_ejercicio!==null && filter_var($newid_ejercicio,FILTER_VALIDATE_INT)===false) {
					throw new Exception('deposito_cuenta_corriente:No es numero entero - id_ejercicio='.$newid_ejercicio);
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
					throw new Exception('deposito_cuenta_corriente:Valor nulo no permitido en columna id_ejercicio');
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
					throw new Exception('deposito_cuenta_corriente:Valor nulo no permitido en columna id_periodo');
				}

				if($newid_periodo!==null && filter_var($newid_periodo,FILTER_VALIDATE_INT)===false) {
					throw new Exception('deposito_cuenta_corriente:No es numero entero - id_periodo='.$newid_periodo);
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
					throw new Exception('deposito_cuenta_corriente:Valor nulo no permitido en columna id_periodo');
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
					throw new Exception('deposito_cuenta_corriente:Valor nulo no permitido en columna id_usuario');
				}

				if($newid_usuario!==null && filter_var($newid_usuario,FILTER_VALIDATE_INT)===false) {
					throw new Exception('deposito_cuenta_corriente:No es numero entero - id_usuario='.$newid_usuario);
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
					throw new Exception('deposito_cuenta_corriente:Valor nulo no permitido en columna id_usuario');
				}

				$this->id_usuario_Descripcion=$newid_usuario_Descripcion;
				//$this->setIsChanged(true);
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
					throw new Exception('deposito_cuenta_corriente:Valor nulo no permitido en columna id_cuenta_corriente');
				}

				if($newid_cuenta_corriente!==null && filter_var($newid_cuenta_corriente,FILTER_VALIDATE_INT)===false) {
					throw new Exception('deposito_cuenta_corriente:No es numero entero - id_cuenta_corriente='.$newid_cuenta_corriente);
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
					throw new Exception('deposito_cuenta_corriente:Valor nulo no permitido en columna id_cuenta_corriente');
				}

				$this->id_cuenta_corriente_Descripcion=$newid_cuenta_corriente_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setfecha_emision(?string $newfecha_emision)
	{
		try {
			if($this->fecha_emision!==$newfecha_emision) {
				if($newfecha_emision===null && $newfecha_emision!='') {
					throw new Exception('deposito_cuenta_corriente:Valor nulo no permitido en columna fecha_emision');
				}

				if($newfecha_emision!==null && filter_var($newfecha_emision,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('deposito_cuenta_corriente:No es fecha - fecha_emision='.$newfecha_emision);
				}

				$this->fecha_emision=$newfecha_emision;
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
					throw new Exception('deposito_cuenta_corriente:Valor nulo no permitido en columna monto');
				}

				if($newmonto!=0) {
					if($newmonto!==null && filter_var($newmonto,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('deposito_cuenta_corriente:No es numero decimal - monto='.$newmonto);
					}
				}

				$this->monto=$newmonto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setmonto_texto(?string $newmonto_texto) {
		if($this->monto_texto!==$newmonto_texto) {

				if(strlen($newmonto_texto)>150) {
					try {
						throw new Exception('deposito_cuenta_corriente:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=monto_texto en columna monto_texto');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newmonto_texto,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('deposito_cuenta_corriente:Formato incorrecto en la columna monto_texto='.$newmonto_texto);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->monto_texto=$newmonto_texto;
			$this->setIsChanged(true);
		}
	}
    
	public function setsaldo(?float $newsaldo)
	{
		try {
			if($this->saldo!==$newsaldo) {
				if($newsaldo===null && $newsaldo!='') {
					throw new Exception('deposito_cuenta_corriente:Valor nulo no permitido en columna saldo');
				}

				if($newsaldo!=0) {
					if($newsaldo!==null && filter_var($newsaldo,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('deposito_cuenta_corriente:No es numero decimal - saldo='.$newsaldo);
					}
				}

				$this->saldo=$newsaldo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdescripcion(?string $newdescripcion) {
		if($this->descripcion!==$newdescripcion) {

				if(strlen($newdescripcion)>1000) {
					try {
						throw new Exception('deposito_cuenta_corriente:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=descripcion en columna descripcion');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newdescripcion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('deposito_cuenta_corriente:Formato incorrecto en la columna descripcion='.$newdescripcion);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->descripcion=$newdescripcion;
			$this->setIsChanged(true);
		}
	}
    
	public function setes_balance_inicial(?bool $newes_balance_inicial)
	{
		try {
			if($this->es_balance_inicial!==$newes_balance_inicial) {
				if($newes_balance_inicial===null && $newes_balance_inicial!='') {
					throw new Exception('deposito_cuenta_corriente:Valor nulo no permitido en columna es_balance_inicial');
				}

				if($newes_balance_inicial!==null && filter_var($newes_balance_inicial,FILTER_VALIDATE_BOOLEAN)===false && $newes_balance_inicial!==0 && $newes_balance_inicial!==false) {
					throw new Exception('deposito_cuenta_corriente:No es valor booleano - es_balance_inicial='.$newes_balance_inicial);
				}

				$this->es_balance_inicial=$newes_balance_inicial;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_estado_deposito_retiro(?int $newid_estado_deposito_retiro)
	{
		try {
			if($this->id_estado_deposito_retiro!==$newid_estado_deposito_retiro) {
				if($newid_estado_deposito_retiro===null && $newid_estado_deposito_retiro!='') {
					throw new Exception('deposito_cuenta_corriente:Valor nulo no permitido en columna id_estado_deposito_retiro');
				}

				if($newid_estado_deposito_retiro!==null && filter_var($newid_estado_deposito_retiro,FILTER_VALIDATE_INT)===false) {
					throw new Exception('deposito_cuenta_corriente:No es numero entero - id_estado_deposito_retiro='.$newid_estado_deposito_retiro);
				}

				$this->id_estado_deposito_retiro=$newid_estado_deposito_retiro;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_estado_deposito_retiro_Descripcion(string $newid_estado_deposito_retiro_Descripcion)
	{
		try {
			if($this->id_estado_deposito_retiro_Descripcion!=$newid_estado_deposito_retiro_Descripcion) {
				if($newid_estado_deposito_retiro_Descripcion===null && $newid_estado_deposito_retiro_Descripcion!='') {
					throw new Exception('deposito_cuenta_corriente:Valor nulo no permitido en columna id_estado_deposito_retiro');
				}

				$this->id_estado_deposito_retiro_Descripcion=$newid_estado_deposito_retiro_Descripcion;
				//$this->setIsChanged(true);
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
					throw new Exception('deposito_cuenta_corriente:Valor nulo no permitido en columna debito');
				}

				if($newdebito!=0) {
					if($newdebito!==null && filter_var($newdebito,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('deposito_cuenta_corriente:No es numero decimal - debito='.$newdebito);
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
					throw new Exception('deposito_cuenta_corriente:Valor nulo no permitido en columna credito');
				}

				if($newcredito!=0) {
					if($newcredito!==null && filter_var($newcredito,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('deposito_cuenta_corriente:No es numero decimal - credito='.$newcredito);
					}
				}

				$this->credito=$newcredito;
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

	public function getcuenta_corriente() : ?cuenta_corriente {
		return $this->cuenta_corriente;
	}

	public function getestado_deposito_retiro() : ?estado_deposito_retiro {
		return $this->estado_deposito_retiro;
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


	public  function  setcuenta_corriente(?cuenta_corriente $cuenta_corriente) {
		try {
			$this->cuenta_corriente=$cuenta_corriente;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setestado_deposito_retiro(?estado_deposito_retiro $estado_deposito_retiro) {
		try {
			$this->estado_deposito_retiro=$estado_deposito_retiro;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_deposito_cuenta_corrienteValue(string $sKey,$oValue) {
		$this->map_deposito_cuenta_corriente[$sKey]=$oValue;
	}
	
	public function getMap_deposito_cuenta_corrienteValue(string $sKey) {
		return $this->map_deposito_cuenta_corriente[$sKey];
	}
	
	public function getdeposito_cuenta_corriente_Original() : ?deposito_cuenta_corriente {
		return $this->deposito_cuenta_corriente_Original;
	}
	
	public function setdeposito_cuenta_corriente_Original(deposito_cuenta_corriente $deposito_cuenta_corriente) {
		try {
			$this->deposito_cuenta_corriente_Original=$deposito_cuenta_corriente;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_deposito_cuenta_corriente() : array {
		return $this->map_deposito_cuenta_corriente;
	}

	public function setMap_deposito_cuenta_corriente(array $map_deposito_cuenta_corriente) {
		$this->map_deposito_cuenta_corriente = $map_deposito_cuenta_corriente;
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
