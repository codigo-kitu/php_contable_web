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
namespace com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;
use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
use com\bydan\contabilidad\facturacion\factura\business\entity\factura;

class cuenta_cobrar extends GeneralEntity {

	/*GENERAL*/
	public static string $class='cuenta_cobrar';
	
	/*AUXILIARES*/
	public ?cuenta_cobrar $cuenta_cobrar_Original=null;	
	public ?GeneralEntity $cuenta_cobrar_Additional=null;
	public array $map_cuenta_cobrar=array();	
		
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

	public ?int $id_factura = null;
	public string $id_factura_Descripcion = '';

	public int $id_cliente = -1;
	public string $id_cliente_Descripcion = '';

	public string $numero = '';
	public string $fecha_emision = '';
	public string $fecha_vence = '';
	public string $fecha_ultimo_movimiento = '';
	public int $id_termino_pago_cliente = -1;
	public string $id_termino_pago_cliente_Descripcion = '';

	public float $monto = 0.0;
	public float $saldo = 0.0;
	public float $porcentaje = 0.0;
	public string $descripcion = '';
	public int $id_estado_cuentas_cobrar = -1;
	public string $id_estado_cuentas_cobrar_Descripcion = '';

	public string $referencia = '';
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	public ?sucursal $sucursal = null;
	public ?ejercicio $ejercicio = null;
	public ?periodo $periodo = null;
	public ?usuario $usuario = null;
	public ?factura $factura = null;
	public ?cliente $cliente = null;
	public ?termino_pago_cliente $termino_pago_cliente = null;
	public ?estado_cuentas_cobrar $estado_cuentas_cobrar = null;
	
	/*RELACIONES*/
	
	public array $debitocuentacobrars = array();
	public array $pagocuentacobrars = array();
	public array $creditocuentacobrars = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->cuenta_cobrar_Original=$this;
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

 		$this->id_factura=null;
		$this->id_factura_Descripcion='';

 		$this->id_cliente=-1;
		$this->id_cliente_Descripcion='';

 		$this->numero='';
 		$this->fecha_emision=date('Y-m-d');
 		$this->fecha_vence=date('Y-m-d');
 		$this->fecha_ultimo_movimiento=date('Y-m-d');
 		$this->id_termino_pago_cliente=-1;
		$this->id_termino_pago_cliente_Descripcion='';

 		$this->monto=0.0;
 		$this->saldo=0.0;
 		$this->porcentaje=0.0;
 		$this->descripcion='';
 		$this->id_estado_cuentas_cobrar=-1;
		$this->id_estado_cuentas_cobrar_Descripcion='';

 		$this->referencia='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
			$this->sucursal=new sucursal();
			$this->ejercicio=new ejercicio();
			$this->periodo=new periodo();
			$this->usuario=new usuario();
			$this->factura=new factura();
			$this->cliente=new cliente();
			$this->termino_pago_cliente=new termino_pago_cliente();
			$this->estado_cuentas_cobrar=new estado_cuentas_cobrar();
		}
		
		/*RELACIONES*/
		
		$this->debitocuentacobrars=array();
		$this->pagocuentacobrars=array();
		$this->creditocuentacobrars=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cuenta_cobrar_Additional=new cuenta_cobrar_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_cuenta_cobrar() {
		$this->map_cuenta_cobrar = array();
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
    
	public function  getid_factura() : ?int {
		return $this->id_factura;
	}
	
	public function  getid_factura_Descripcion() : string {
		return $this->id_factura_Descripcion;
	}
    
	public function  getid_cliente() : ?int {
		return $this->id_cliente;
	}
	
	public function  getid_cliente_Descripcion() : string {
		return $this->id_cliente_Descripcion;
	}
    
	public function  getnumero() : ?string {
		return $this->numero;
	}
    
	public function  getfecha_emision() : ?string {
		return $this->fecha_emision;
	}
    
	public function  getfecha_vence() : ?string {
		return $this->fecha_vence;
	}
    
	public function  getfecha_ultimo_movimiento() : ?string {
		return $this->fecha_ultimo_movimiento;
	}
    
	public function  getid_termino_pago_cliente() : ?int {
		return $this->id_termino_pago_cliente;
	}
	
	public function  getid_termino_pago_cliente_Descripcion() : string {
		return $this->id_termino_pago_cliente_Descripcion;
	}
    
	public function  getmonto() : ?float {
		return $this->monto;
	}
    
	public function  getsaldo() : ?float {
		return $this->saldo;
	}
    
	public function  getporcentaje() : ?float {
		return $this->porcentaje;
	}
    
	public function  getdescripcion() : ?string {
		return $this->descripcion;
	}
    
	public function  getid_estado_cuentas_cobrar() : ?int {
		return $this->id_estado_cuentas_cobrar;
	}
	
	public function  getid_estado_cuentas_cobrar_Descripcion() : string {
		return $this->id_estado_cuentas_cobrar_Descripcion;
	}
    
	public function  getreferencia() : ?string {
		return $this->referencia;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('cuenta_cobrar:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_cobrar:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('cuenta_cobrar:Valor nulo no permitido en columna id_empresa');
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
					throw new Exception('cuenta_cobrar:Valor nulo no permitido en columna id_sucursal');
				}

				if($newid_sucursal!==null && filter_var($newid_sucursal,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_cobrar:No es numero entero - id_sucursal='.$newid_sucursal);
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
					throw new Exception('cuenta_cobrar:Valor nulo no permitido en columna id_sucursal');
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
					throw new Exception('cuenta_cobrar:Valor nulo no permitido en columna id_ejercicio');
				}

				if($newid_ejercicio!==null && filter_var($newid_ejercicio,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_cobrar:No es numero entero - id_ejercicio='.$newid_ejercicio);
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
					throw new Exception('cuenta_cobrar:Valor nulo no permitido en columna id_ejercicio');
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
					throw new Exception('cuenta_cobrar:Valor nulo no permitido en columna id_periodo');
				}

				if($newid_periodo!==null && filter_var($newid_periodo,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_cobrar:No es numero entero - id_periodo='.$newid_periodo);
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
					throw new Exception('cuenta_cobrar:Valor nulo no permitido en columna id_periodo');
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
					throw new Exception('cuenta_cobrar:Valor nulo no permitido en columna id_usuario');
				}

				if($newid_usuario!==null && filter_var($newid_usuario,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_cobrar:No es numero entero - id_usuario='.$newid_usuario);
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
					throw new Exception('cuenta_cobrar:Valor nulo no permitido en columna id_usuario');
				}

				$this->id_usuario_Descripcion=$newid_usuario_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_factura(?int $newid_factura)
	{
		try {
			if($this->id_factura!==$newid_factura) {
				if($newid_factura===null && $newid_factura!='') {
					throw new Exception('cuenta_cobrar:Valor nulo no permitido en columna id_factura');
				}

				if($newid_factura!==null && filter_var($newid_factura,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_cobrar:No es numero entero - id_factura='.$newid_factura);
				}

				$this->id_factura=$newid_factura;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_factura_Descripcion(string $newid_factura_Descripcion)
	{
		try {
			if($this->id_factura_Descripcion!=$newid_factura_Descripcion) {
				if($newid_factura_Descripcion===null && $newid_factura_Descripcion!='') {
					throw new Exception('cuenta_cobrar:Valor nulo no permitido en columna id_factura');
				}

				$this->id_factura_Descripcion=$newid_factura_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_cliente(?int $newid_cliente)
	{
		try {
			if($this->id_cliente!==$newid_cliente) {
				if($newid_cliente===null && $newid_cliente!='') {
					throw new Exception('cuenta_cobrar:Valor nulo no permitido en columna id_cliente');
				}

				if($newid_cliente!==null && filter_var($newid_cliente,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_cobrar:No es numero entero - id_cliente='.$newid_cliente);
				}

				$this->id_cliente=$newid_cliente;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_cliente_Descripcion(string $newid_cliente_Descripcion)
	{
		try {
			if($this->id_cliente_Descripcion!=$newid_cliente_Descripcion) {
				if($newid_cliente_Descripcion===null && $newid_cliente_Descripcion!='') {
					throw new Exception('cuenta_cobrar:Valor nulo no permitido en columna id_cliente');
				}

				$this->id_cliente_Descripcion=$newid_cliente_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnumero(?string $newnumero)
	{
		try {
			if($this->numero!==$newnumero) {
				if($newnumero===null && $newnumero!='') {
					throw new Exception('cuenta_cobrar:Valor nulo no permitido en columna numero');
				}

				if(strlen($newnumero)>12) {
					throw new Exception('cuenta_cobrar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=12 en columna numero');
				}

				if(filter_var($newnumero,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('cuenta_cobrar:Formato incorrecto en columna numero='.$newnumero);
				}

				$this->numero=$newnumero;
				$this->setIsChanged(true);
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
					throw new Exception('cuenta_cobrar:Valor nulo no permitido en columna fecha_emision');
				}

				if($newfecha_emision!==null && filter_var($newfecha_emision,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('cuenta_cobrar:No es fecha - fecha_emision='.$newfecha_emision);
				}

				$this->fecha_emision=$newfecha_emision;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setfecha_vence(?string $newfecha_vence)
	{
		try {
			if($this->fecha_vence!==$newfecha_vence) {
				if($newfecha_vence===null && $newfecha_vence!='') {
					throw new Exception('cuenta_cobrar:Valor nulo no permitido en columna fecha_vence');
				}

				if($newfecha_vence!==null && filter_var($newfecha_vence,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('cuenta_cobrar:No es fecha - fecha_vence='.$newfecha_vence);
				}

				$this->fecha_vence=$newfecha_vence;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setfecha_ultimo_movimiento(?string $newfecha_ultimo_movimiento)
	{
		try {
			if($this->fecha_ultimo_movimiento!==$newfecha_ultimo_movimiento) {
				if($newfecha_ultimo_movimiento===null && $newfecha_ultimo_movimiento!='') {
					throw new Exception('cuenta_cobrar:Valor nulo no permitido en columna fecha_ultimo_movimiento');
				}

				if($newfecha_ultimo_movimiento!==null && filter_var($newfecha_ultimo_movimiento,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('cuenta_cobrar:No es fecha - fecha_ultimo_movimiento='.$newfecha_ultimo_movimiento);
				}

				$this->fecha_ultimo_movimiento=$newfecha_ultimo_movimiento;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_termino_pago_cliente(?int $newid_termino_pago_cliente)
	{
		try {
			if($this->id_termino_pago_cliente!==$newid_termino_pago_cliente) {
				if($newid_termino_pago_cliente===null && $newid_termino_pago_cliente!='') {
					throw new Exception('cuenta_cobrar:Valor nulo no permitido en columna id_termino_pago_cliente');
				}

				if($newid_termino_pago_cliente!==null && filter_var($newid_termino_pago_cliente,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_cobrar:No es numero entero - id_termino_pago_cliente='.$newid_termino_pago_cliente);
				}

				$this->id_termino_pago_cliente=$newid_termino_pago_cliente;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_termino_pago_cliente_Descripcion(string $newid_termino_pago_cliente_Descripcion)
	{
		try {
			if($this->id_termino_pago_cliente_Descripcion!=$newid_termino_pago_cliente_Descripcion) {
				if($newid_termino_pago_cliente_Descripcion===null && $newid_termino_pago_cliente_Descripcion!='') {
					throw new Exception('cuenta_cobrar:Valor nulo no permitido en columna id_termino_pago_cliente');
				}

				$this->id_termino_pago_cliente_Descripcion=$newid_termino_pago_cliente_Descripcion;
				//$this->setIsChanged(true);
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
					throw new Exception('cuenta_cobrar:Valor nulo no permitido en columna monto');
				}

				if($newmonto!=0) {
					if($newmonto!==null && filter_var($newmonto,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('cuenta_cobrar:No es numero decimal - monto='.$newmonto);
					}
				}

				$this->monto=$newmonto;
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
					throw new Exception('cuenta_cobrar:Valor nulo no permitido en columna saldo');
				}

				if($newsaldo!=0) {
					if($newsaldo!==null && filter_var($newsaldo,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('cuenta_cobrar:No es numero decimal - saldo='.$newsaldo);
					}
				}

				$this->saldo=$newsaldo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setporcentaje(?float $newporcentaje)
	{
		try {
			if($this->porcentaje!==$newporcentaje) {
				if($newporcentaje===null && $newporcentaje!='') {
					throw new Exception('cuenta_cobrar:Valor nulo no permitido en columna porcentaje');
				}

				if($newporcentaje!=0) {
					if($newporcentaje!==null && filter_var($newporcentaje,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('cuenta_cobrar:No es numero decimal - porcentaje='.$newporcentaje);
					}
				}

				$this->porcentaje=$newporcentaje;
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
						throw new Exception('cuenta_cobrar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=descripcion en columna descripcion');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newdescripcion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('cuenta_cobrar:Formato incorrecto en la columna descripcion='.$newdescripcion);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->descripcion=$newdescripcion;
			$this->setIsChanged(true);
		}
	}
    
	public function setid_estado_cuentas_cobrar(?int $newid_estado_cuentas_cobrar)
	{
		try {
			if($this->id_estado_cuentas_cobrar!==$newid_estado_cuentas_cobrar) {
				if($newid_estado_cuentas_cobrar===null && $newid_estado_cuentas_cobrar!='') {
					throw new Exception('cuenta_cobrar:Valor nulo no permitido en columna id_estado_cuentas_cobrar');
				}

				if($newid_estado_cuentas_cobrar!==null && filter_var($newid_estado_cuentas_cobrar,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_cobrar:No es numero entero - id_estado_cuentas_cobrar='.$newid_estado_cuentas_cobrar);
				}

				$this->id_estado_cuentas_cobrar=$newid_estado_cuentas_cobrar;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_estado_cuentas_cobrar_Descripcion(string $newid_estado_cuentas_cobrar_Descripcion)
	{
		try {
			if($this->id_estado_cuentas_cobrar_Descripcion!=$newid_estado_cuentas_cobrar_Descripcion) {
				if($newid_estado_cuentas_cobrar_Descripcion===null && $newid_estado_cuentas_cobrar_Descripcion!='') {
					throw new Exception('cuenta_cobrar:Valor nulo no permitido en columna id_estado_cuentas_cobrar');
				}

				$this->id_estado_cuentas_cobrar_Descripcion=$newid_estado_cuentas_cobrar_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setreferencia(?string $newreferencia) {
		if($this->referencia!==$newreferencia) {

				if(strlen($newreferencia)>25) {
					try {
						throw new Exception('cuenta_cobrar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=referencia en columna referencia');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newreferencia,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('cuenta_cobrar:Formato incorrecto en la columna referencia='.$newreferencia);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->referencia=$newreferencia;
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

	public function getfactura() : ?factura {
		return $this->factura;
	}

	public function getcliente() : ?cliente {
		return $this->cliente;
	}

	public function gettermino_pago_cliente() : ?termino_pago_cliente {
		return $this->termino_pago_cliente;
	}

	public function getestado_cuentas_cobrar() : ?estado_cuentas_cobrar {
		return $this->estado_cuentas_cobrar;
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


	public  function  setfactura(?factura $factura) {
		try {
			$this->factura=$factura;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setcliente(?cliente $cliente) {
		try {
			$this->cliente=$cliente;
		} catch(Exception $e) {
			;
		}
	}


	public  function  settermino_pago_cliente(?termino_pago_cliente $termino_pago_cliente) {
		try {
			$this->termino_pago_cliente=$termino_pago_cliente;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setestado_cuentas_cobrar(?estado_cuentas_cobrar $estado_cuentas_cobrar) {
		try {
			$this->estado_cuentas_cobrar=$estado_cuentas_cobrar;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	public function getdebito_cuenta_cobrars() : array {
		return $this->debitocuentacobrars;
	}

	public function getpago_cuenta_cobrars() : array {
		return $this->pagocuentacobrars;
	}

	public function getcredito_cuenta_cobrars() : array {
		return $this->creditocuentacobrars;
	}

	
	
	public  function  setdebito_cuenta_cobrars(array $debitocuentacobrars) {
		try {
			$this->debitocuentacobrars=$debitocuentacobrars;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setpago_cuenta_cobrars(array $pagocuentacobrars) {
		try {
			$this->pagocuentacobrars=$pagocuentacobrars;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setcredito_cuenta_cobrars(array $creditocuentacobrars) {
		try {
			$this->creditocuentacobrars=$creditocuentacobrars;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_cuenta_cobrarValue(string $sKey,$oValue) {
		$this->map_cuenta_cobrar[$sKey]=$oValue;
	}
	
	public function getMap_cuenta_cobrarValue(string $sKey) {
		return $this->map_cuenta_cobrar[$sKey];
	}
	
	public function getcuenta_cobrar_Original() : ?cuenta_cobrar {
		return $this->cuenta_cobrar_Original;
	}
	
	public function setcuenta_cobrar_Original(cuenta_cobrar $cuenta_cobrar) {
		try {
			$this->cuenta_cobrar_Original=$cuenta_cobrar;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_cuenta_cobrar() : array {
		return $this->map_cuenta_cobrar;
	}

	public function setMap_cuenta_cobrar(array $map_cuenta_cobrar) {
		$this->map_cuenta_cobrar = $map_cuenta_cobrar;
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
