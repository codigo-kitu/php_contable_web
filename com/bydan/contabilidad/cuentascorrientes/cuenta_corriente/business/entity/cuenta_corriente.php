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
namespace com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;

class cuenta_corriente extends GeneralEntity {

	/*GENERAL*/
	public static string $class='cuenta_corriente';
	
	/*AUXILIARES*/
	public ?cuenta_corriente $cuenta_corriente_Original=null;	
	public ?GeneralEntity $cuenta_corriente_Additional=null;
	public array $map_cuenta_corriente=array();	
		
	/*CAMPOS*/
	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public int $id_usuario = -1;
	public string $id_usuario_Descripcion = '';

	public int $id_banco = -1;
	public string $id_banco_Descripcion = '';

	public string $numero_cuenta = '';
	public float $balance_inicial = 0.0;
	public float $saldo = 0.0;
	public int $contador_cheque = 0;
	public ?int $id_cuenta = null;
	public string $id_cuenta_Descripcion = '';

	public string $descripcion = '';
	public string $icono = '';
	public int $id_estado_cuentas_corrientes = -1;
	public string $id_estado_cuentas_corrientes_Descripcion = '';

	
	/*FKs*/
	
	public ?empresa $empresa = null;
	public ?usuario $usuario = null;
	public ?banco $banco = null;
	public ?cuenta $cuenta = null;
	public ?estado_cuentas_corrientes $estado_cuentas_corrientes = null;
	
	/*RELACIONES*/
	
	public array $chequecuentacorrientes = array();
	public array $retirocuentacorrientes = array();
	public array $depositocuentacorrientes = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->cuenta_corriente_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->id_usuario=-1;
		$this->id_usuario_Descripcion='';

 		$this->id_banco=-1;
		$this->id_banco_Descripcion='';

 		$this->numero_cuenta='';
 		$this->balance_inicial=0.0;
 		$this->saldo=0.0;
 		$this->contador_cheque=0;
 		$this->id_cuenta=null;
		$this->id_cuenta_Descripcion='';

 		$this->descripcion='';
 		$this->icono='';
 		$this->id_estado_cuentas_corrientes=-1;
		$this->id_estado_cuentas_corrientes_Descripcion='';

		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
			$this->usuario=new usuario();
			$this->banco=new banco();
			$this->cuenta=new cuenta();
			$this->estado_cuentas_corrientes=new estado_cuentas_corrientes();
		}
		
		/*RELACIONES*/
		
		$this->chequecuentacorrientes=array();
		$this->retirocuentacorrientes=array();
		$this->depositocuentacorrientes=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cuenta_corriente_Additional=new cuenta_corriente_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_cuenta_corriente() {
		$this->map_cuenta_corriente = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_empresa() : ?int {
		return $this->id_empresa;
	}
	
	public function  getid_empresa_Descripcion() : string {
		return $this->id_empresa_Descripcion;
	}
    
	public function  getid_usuario() : ?int {
		return $this->id_usuario;
	}
	
	public function  getid_usuario_Descripcion() : string {
		return $this->id_usuario_Descripcion;
	}
    
	public function  getid_banco() : ?int {
		return $this->id_banco;
	}
	
	public function  getid_banco_Descripcion() : string {
		return $this->id_banco_Descripcion;
	}
    
	public function  getnumero_cuenta() : ?string {
		return $this->numero_cuenta;
	}
    
	public function  getbalance_inicial() : ?float {
		return $this->balance_inicial;
	}
    
	public function  getsaldo() : ?float {
		return $this->saldo;
	}
    
	public function  getcontador_cheque() : ?int {
		return $this->contador_cheque;
	}
    
	public function  getid_cuenta() : ?int {
		return $this->id_cuenta;
	}
	
	public function  getid_cuenta_Descripcion() : string {
		return $this->id_cuenta_Descripcion;
	}
    
	public function  getdescripcion() : ?string {
		return $this->descripcion;
	}
    
	public function  geticono() : ?string {
		return $this->icono;
	}
    
	public function  getid_estado_cuentas_corrientes() : ?int {
		return $this->id_estado_cuentas_corrientes;
	}
	
	public function  getid_estado_cuentas_corrientes_Descripcion() : string {
		return $this->id_estado_cuentas_corrientes_Descripcion;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('cuenta_corriente:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_corriente:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('cuenta_corriente:Valor nulo no permitido en columna id_empresa');
				}

				$this->id_empresa_Descripcion=$newid_empresa_Descripcion;
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
					throw new Exception('cuenta_corriente:Valor nulo no permitido en columna id_usuario');
				}

				if($newid_usuario!==null && filter_var($newid_usuario,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_corriente:No es numero entero - id_usuario='.$newid_usuario);
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
					throw new Exception('cuenta_corriente:Valor nulo no permitido en columna id_usuario');
				}

				$this->id_usuario_Descripcion=$newid_usuario_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_banco(?int $newid_banco)
	{
		try {
			if($this->id_banco!==$newid_banco) {
				if($newid_banco===null && $newid_banco!='') {
					throw new Exception('cuenta_corriente:Valor nulo no permitido en columna id_banco');
				}

				if($newid_banco!==null && filter_var($newid_banco,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_corriente:No es numero entero - id_banco='.$newid_banco);
				}

				$this->id_banco=$newid_banco;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_banco_Descripcion(string $newid_banco_Descripcion)
	{
		try {
			if($this->id_banco_Descripcion!=$newid_banco_Descripcion) {
				if($newid_banco_Descripcion===null && $newid_banco_Descripcion!='') {
					throw new Exception('cuenta_corriente:Valor nulo no permitido en columna id_banco');
				}

				$this->id_banco_Descripcion=$newid_banco_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnumero_cuenta(?string $newnumero_cuenta)
	{
		try {
			if($this->numero_cuenta!==$newnumero_cuenta) {
				if($newnumero_cuenta===null && $newnumero_cuenta!='') {
					throw new Exception('cuenta_corriente:Valor nulo no permitido en columna numero_cuenta');
				}

				if(strlen($newnumero_cuenta)>40) {
					throw new Exception('cuenta_corriente:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=40 en columna numero_cuenta');
				}

				if(filter_var($newnumero_cuenta,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('cuenta_corriente:Formato incorrecto en columna numero_cuenta='.$newnumero_cuenta);
				}

				$this->numero_cuenta=$newnumero_cuenta;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setbalance_inicial(?float $newbalance_inicial)
	{
		try {
			if($this->balance_inicial!==$newbalance_inicial) {
				if($newbalance_inicial===null && $newbalance_inicial!='') {
					throw new Exception('cuenta_corriente:Valor nulo no permitido en columna balance_inicial');
				}

				if($newbalance_inicial!=0) {
					if($newbalance_inicial!==null && filter_var($newbalance_inicial,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('cuenta_corriente:No es numero decimal - balance_inicial='.$newbalance_inicial);
					}
				}

				$this->balance_inicial=$newbalance_inicial;
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
					throw new Exception('cuenta_corriente:Valor nulo no permitido en columna saldo');
				}

				if($newsaldo!=0) {
					if($newsaldo!==null && filter_var($newsaldo,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('cuenta_corriente:No es numero decimal - saldo='.$newsaldo);
					}
				}

				$this->saldo=$newsaldo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcontador_cheque(?int $newcontador_cheque)
	{
		try {
			if($this->contador_cheque!==$newcontador_cheque) {
				if($newcontador_cheque===null && $newcontador_cheque!='') {
					throw new Exception('cuenta_corriente:Valor nulo no permitido en columna contador_cheque');
				}

				if($newcontador_cheque!==null && filter_var($newcontador_cheque,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_corriente:No es numero entero - contador_cheque='.$newcontador_cheque);
				}

				$this->contador_cheque=$newcontador_cheque;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_cuenta(?int $newid_cuenta) {
		if($this->id_cuenta!==$newid_cuenta) {

				if($newid_cuenta!==null && filter_var($newid_cuenta,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_corriente:No es numero entero - id_cuenta');
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
    
	public function setdescripcion(?string $newdescripcion) {
		if($this->descripcion!==$newdescripcion) {

				if(strlen($newdescripcion)>60) {
					try {
						throw new Exception('cuenta_corriente:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=descripcion en columna descripcion');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newdescripcion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('cuenta_corriente:Formato incorrecto en la columna descripcion='.$newdescripcion);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->descripcion=$newdescripcion;
			$this->setIsChanged(true);
		}
	}
    
	public function seticono(?string $newicono) {
		if($this->icono!==$newicono) {

				if(strlen($newicono)>1000) {
					try {
						throw new Exception('cuenta_corriente:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=icono en columna icono');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newicono,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('cuenta_corriente:Formato incorrecto en la columna icono='.$newicono);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->icono=$newicono;
			$this->setIsChanged(true);
		}
	}
    
	public function setid_estado_cuentas_corrientes(?int $newid_estado_cuentas_corrientes) {
		if($this->id_estado_cuentas_corrientes!==$newid_estado_cuentas_corrientes) {

				if($newid_estado_cuentas_corrientes!==null && filter_var($newid_estado_cuentas_corrientes,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_corriente:No es numero entero - id_estado_cuentas_corrientes');
				}

			$this->id_estado_cuentas_corrientes=$newid_estado_cuentas_corrientes;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_estado_cuentas_corrientes_Descripcion(string $newid_estado_cuentas_corrientes_Descripcion) {
		if($this->id_estado_cuentas_corrientes_Descripcion!=$newid_estado_cuentas_corrientes_Descripcion) {

			$this->id_estado_cuentas_corrientes_Descripcion=$newid_estado_cuentas_corrientes_Descripcion;
			//$this->setIsChanged(true);
		}
	}
	
	/*FKs*/
	
	public function getempresa() : ?empresa {
		return $this->empresa;
	}

	public function getusuario() : ?usuario {
		return $this->usuario;
	}

	public function getbanco() : ?banco {
		return $this->banco;
	}

	public function getcuenta() : ?cuenta {
		return $this->cuenta;
	}

	public function getestado_cuentas_corrientes() : ?estado_cuentas_corrientes {
		return $this->estado_cuentas_corrientes;
	}

	
	
	public  function  setempresa(?empresa $empresa) {
		try {
			$this->empresa=$empresa;
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


	public  function  setbanco(?banco $banco) {
		try {
			$this->banco=$banco;
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


	public  function  setestado_cuentas_corrientes(?estado_cuentas_corrientes $estado_cuentas_corrientes) {
		try {
			$this->estado_cuentas_corrientes=$estado_cuentas_corrientes;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	public function getcheque_cuenta_corrientes() : array {
		return $this->chequecuentacorrientes;
	}

	public function getretiro_cuenta_corrientes() : array {
		return $this->retirocuentacorrientes;
	}

	public function getdeposito_cuenta_corrientes() : array {
		return $this->depositocuentacorrientes;
	}

	
	
	public  function  setcheque_cuenta_corrientes(array $chequecuentacorrientes) {
		try {
			$this->chequecuentacorrientes=$chequecuentacorrientes;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setretiro_cuenta_corrientes(array $retirocuentacorrientes) {
		try {
			$this->retirocuentacorrientes=$retirocuentacorrientes;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setdeposito_cuenta_corrientes(array $depositocuentacorrientes) {
		try {
			$this->depositocuentacorrientes=$depositocuentacorrientes;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_cuenta_corrienteValue(string $sKey,$oValue) {
		$this->map_cuenta_corriente[$sKey]=$oValue;
	}
	
	public function getMap_cuenta_corrienteValue(string $sKey) {
		return $this->map_cuenta_corriente[$sKey];
	}
	
	public function getcuenta_corriente_Original() : ?cuenta_corriente {
		return $this->cuenta_corriente_Original;
	}
	
	public function setcuenta_corriente_Original(cuenta_corriente $cuenta_corriente) {
		try {
			$this->cuenta_corriente_Original=$cuenta_corriente;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_cuenta_corriente() : array {
		return $this->map_cuenta_corriente;
	}

	public function setMap_cuenta_corriente(array $map_cuenta_corriente) {
		$this->map_cuenta_corriente = $map_cuenta_corriente;
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
