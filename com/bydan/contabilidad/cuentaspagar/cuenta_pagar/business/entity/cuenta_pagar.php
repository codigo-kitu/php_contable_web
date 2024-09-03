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
namespace com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;
use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
use com\bydan\contabilidad\inventario\orden_compra\business\entity\orden_compra;

class cuenta_pagar extends GeneralEntity {

	/*GENERAL*/
	public static string $class='cuenta_pagar';
	
	/*AUXILIARES*/
	public ?cuenta_pagar $cuenta_pagar_Original=null;	
	public ?GeneralEntity $cuenta_pagar_Additional=null;
	public array $map_cuenta_pagar=array();	
		
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

	public ?int $id_orden_compra = null;
	public string $id_orden_compra_Descripcion = '';

	public int $id_proveedor = -1;
	public string $id_proveedor_Descripcion = '';

	public int $id_termino_pago_proveedor = -1;
	public string $id_termino_pago_proveedor_Descripcion = '';

	public string $numero = '';
	public string $fecha_emision = '';
	public string $fecha_vence = '';
	public string $fecha_ultimo_movimiento = '';
	public float $monto = 0.0;
	public float $saldo = 0.0;
	public float $porcentaje = 0.0;
	public string $descripcion = '';
	public int $id_estado_cuentas_pagar = -1;
	public string $id_estado_cuentas_pagar_Descripcion = '';

	public string $referencia = '';
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	public ?sucursal $sucursal = null;
	public ?ejercicio $ejercicio = null;
	public ?periodo $periodo = null;
	public ?usuario $usuario = null;
	public ?orden_compra $orden_compra = null;
	public ?proveedor $proveedor = null;
	public ?termino_pago_proveedor $termino_pago_proveedor = null;
	public ?estado_cuentas_pagar $estado_cuentas_pagar = null;
	
	/*RELACIONES*/
	
	public array $debitocuentapagars = array();
	public array $creditocuentapagars = array();
	public array $pagocuentapagars = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->cuenta_pagar_Original=$this;
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

 		$this->id_orden_compra=null;
		$this->id_orden_compra_Descripcion='';

 		$this->id_proveedor=-1;
		$this->id_proveedor_Descripcion='';

 		$this->id_termino_pago_proveedor=-1;
		$this->id_termino_pago_proveedor_Descripcion='';

 		$this->numero='';
 		$this->fecha_emision=date('Y-m-d');
 		$this->fecha_vence=date('Y-m-d');
 		$this->fecha_ultimo_movimiento=date('Y-m-d');
 		$this->monto=0.0;
 		$this->saldo=0.0;
 		$this->porcentaje=0.0;
 		$this->descripcion='';
 		$this->id_estado_cuentas_pagar=-1;
		$this->id_estado_cuentas_pagar_Descripcion='';

 		$this->referencia='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
			$this->sucursal=new sucursal();
			$this->ejercicio=new ejercicio();
			$this->periodo=new periodo();
			$this->usuario=new usuario();
			$this->orden_compra=new orden_compra();
			$this->proveedor=new proveedor();
			$this->termino_pago_proveedor=new termino_pago_proveedor();
			$this->estado_cuentas_pagar=new estado_cuentas_pagar();
		}
		
		/*RELACIONES*/
		
		$this->debitocuentapagars=array();
		$this->creditocuentapagars=array();
		$this->pagocuentapagars=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cuenta_pagar_Additional=new cuenta_pagar_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_cuenta_pagar() {
		$this->map_cuenta_pagar = array();
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
    
	public function  getid_orden_compra() : ?int {
		return $this->id_orden_compra;
	}
	
	public function  getid_orden_compra_Descripcion() : string {
		return $this->id_orden_compra_Descripcion;
	}
    
	public function  getid_proveedor() : ?int {
		return $this->id_proveedor;
	}
	
	public function  getid_proveedor_Descripcion() : string {
		return $this->id_proveedor_Descripcion;
	}
    
	public function  getid_termino_pago_proveedor() : ?int {
		return $this->id_termino_pago_proveedor;
	}
	
	public function  getid_termino_pago_proveedor_Descripcion() : string {
		return $this->id_termino_pago_proveedor_Descripcion;
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
    
	public function  getid_estado_cuentas_pagar() : ?int {
		return $this->id_estado_cuentas_pagar;
	}
	
	public function  getid_estado_cuentas_pagar_Descripcion() : string {
		return $this->id_estado_cuentas_pagar_Descripcion;
	}
    
	public function  getreferencia() : ?string {
		return $this->referencia;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('cuenta_pagar:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_pagar:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('cuenta_pagar:Valor nulo no permitido en columna id_empresa');
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
					throw new Exception('cuenta_pagar:Valor nulo no permitido en columna id_sucursal');
				}

				if($newid_sucursal!==null && filter_var($newid_sucursal,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_pagar:No es numero entero - id_sucursal='.$newid_sucursal);
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
					throw new Exception('cuenta_pagar:Valor nulo no permitido en columna id_sucursal');
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
					throw new Exception('cuenta_pagar:Valor nulo no permitido en columna id_ejercicio');
				}

				if($newid_ejercicio!==null && filter_var($newid_ejercicio,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_pagar:No es numero entero - id_ejercicio='.$newid_ejercicio);
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
					throw new Exception('cuenta_pagar:Valor nulo no permitido en columna id_ejercicio');
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
					throw new Exception('cuenta_pagar:Valor nulo no permitido en columna id_periodo');
				}

				if($newid_periodo!==null && filter_var($newid_periodo,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_pagar:No es numero entero - id_periodo='.$newid_periodo);
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
					throw new Exception('cuenta_pagar:Valor nulo no permitido en columna id_periodo');
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
					throw new Exception('cuenta_pagar:Valor nulo no permitido en columna id_usuario');
				}

				if($newid_usuario!==null && filter_var($newid_usuario,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_pagar:No es numero entero - id_usuario='.$newid_usuario);
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
					throw new Exception('cuenta_pagar:Valor nulo no permitido en columna id_usuario');
				}

				$this->id_usuario_Descripcion=$newid_usuario_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_orden_compra(?int $newid_orden_compra) {
		if($this->id_orden_compra!==$newid_orden_compra) {

				if($newid_orden_compra!==null && filter_var($newid_orden_compra,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_pagar:No es numero entero - id_orden_compra');
				}

			$this->id_orden_compra=$newid_orden_compra;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_orden_compra_Descripcion(string $newid_orden_compra_Descripcion) {
		if($this->id_orden_compra_Descripcion!=$newid_orden_compra_Descripcion) {

			$this->id_orden_compra_Descripcion=$newid_orden_compra_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function setid_proveedor(?int $newid_proveedor)
	{
		try {
			if($this->id_proveedor!==$newid_proveedor) {
				if($newid_proveedor===null && $newid_proveedor!='') {
					throw new Exception('cuenta_pagar:Valor nulo no permitido en columna id_proveedor');
				}

				if($newid_proveedor!==null && filter_var($newid_proveedor,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_pagar:No es numero entero - id_proveedor='.$newid_proveedor);
				}

				$this->id_proveedor=$newid_proveedor;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_proveedor_Descripcion(string $newid_proveedor_Descripcion)
	{
		try {
			if($this->id_proveedor_Descripcion!=$newid_proveedor_Descripcion) {
				if($newid_proveedor_Descripcion===null && $newid_proveedor_Descripcion!='') {
					throw new Exception('cuenta_pagar:Valor nulo no permitido en columna id_proveedor');
				}

				$this->id_proveedor_Descripcion=$newid_proveedor_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_termino_pago_proveedor(?int $newid_termino_pago_proveedor)
	{
		try {
			if($this->id_termino_pago_proveedor!==$newid_termino_pago_proveedor) {
				if($newid_termino_pago_proveedor===null && $newid_termino_pago_proveedor!='') {
					throw new Exception('cuenta_pagar:Valor nulo no permitido en columna id_termino_pago_proveedor');
				}

				if($newid_termino_pago_proveedor!==null && filter_var($newid_termino_pago_proveedor,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_pagar:No es numero entero - id_termino_pago_proveedor='.$newid_termino_pago_proveedor);
				}

				$this->id_termino_pago_proveedor=$newid_termino_pago_proveedor;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_termino_pago_proveedor_Descripcion(string $newid_termino_pago_proveedor_Descripcion)
	{
		try {
			if($this->id_termino_pago_proveedor_Descripcion!=$newid_termino_pago_proveedor_Descripcion) {
				if($newid_termino_pago_proveedor_Descripcion===null && $newid_termino_pago_proveedor_Descripcion!='') {
					throw new Exception('cuenta_pagar:Valor nulo no permitido en columna id_termino_pago_proveedor');
				}

				$this->id_termino_pago_proveedor_Descripcion=$newid_termino_pago_proveedor_Descripcion;
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
					throw new Exception('cuenta_pagar:Valor nulo no permitido en columna numero');
				}

				if(strlen($newnumero)>12) {
					throw new Exception('cuenta_pagar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=12 en columna numero');
				}

				if(filter_var($newnumero,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('cuenta_pagar:Formato incorrecto en columna numero='.$newnumero);
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
					throw new Exception('cuenta_pagar:Valor nulo no permitido en columna fecha_emision');
				}

				if($newfecha_emision!==null && filter_var($newfecha_emision,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('cuenta_pagar:No es fecha - fecha_emision='.$newfecha_emision);
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
					throw new Exception('cuenta_pagar:Valor nulo no permitido en columna fecha_vence');
				}

				if($newfecha_vence!==null && filter_var($newfecha_vence,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('cuenta_pagar:No es fecha - fecha_vence='.$newfecha_vence);
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
					throw new Exception('cuenta_pagar:Valor nulo no permitido en columna fecha_ultimo_movimiento');
				}

				if($newfecha_ultimo_movimiento!==null && filter_var($newfecha_ultimo_movimiento,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('cuenta_pagar:No es fecha - fecha_ultimo_movimiento='.$newfecha_ultimo_movimiento);
				}

				$this->fecha_ultimo_movimiento=$newfecha_ultimo_movimiento;
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
					throw new Exception('cuenta_pagar:Valor nulo no permitido en columna monto');
				}

				if($newmonto!=0) {
					if($newmonto!==null && filter_var($newmonto,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('cuenta_pagar:No es numero decimal - monto='.$newmonto);
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
					throw new Exception('cuenta_pagar:Valor nulo no permitido en columna saldo');
				}

				if($newsaldo!=0) {
					if($newsaldo!==null && filter_var($newsaldo,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('cuenta_pagar:No es numero decimal - saldo='.$newsaldo);
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
					throw new Exception('cuenta_pagar:Valor nulo no permitido en columna porcentaje');
				}

				if($newporcentaje!=0) {
					if($newporcentaje!==null && filter_var($newporcentaje,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('cuenta_pagar:No es numero decimal - porcentaje='.$newporcentaje);
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
						throw new Exception('cuenta_pagar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=descripcion en columna descripcion');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newdescripcion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('cuenta_pagar:Formato incorrecto en la columna descripcion='.$newdescripcion);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->descripcion=$newdescripcion;
			$this->setIsChanged(true);
		}
	}
    
	public function setid_estado_cuentas_pagar(?int $newid_estado_cuentas_pagar)
	{
		try {
			if($this->id_estado_cuentas_pagar!==$newid_estado_cuentas_pagar) {
				if($newid_estado_cuentas_pagar===null && $newid_estado_cuentas_pagar!='') {
					throw new Exception('cuenta_pagar:Valor nulo no permitido en columna id_estado_cuentas_pagar');
				}

				if($newid_estado_cuentas_pagar!==null && filter_var($newid_estado_cuentas_pagar,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_pagar:No es numero entero - id_estado_cuentas_pagar='.$newid_estado_cuentas_pagar);
				}

				$this->id_estado_cuentas_pagar=$newid_estado_cuentas_pagar;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_estado_cuentas_pagar_Descripcion(string $newid_estado_cuentas_pagar_Descripcion)
	{
		try {
			if($this->id_estado_cuentas_pagar_Descripcion!=$newid_estado_cuentas_pagar_Descripcion) {
				if($newid_estado_cuentas_pagar_Descripcion===null && $newid_estado_cuentas_pagar_Descripcion!='') {
					throw new Exception('cuenta_pagar:Valor nulo no permitido en columna id_estado_cuentas_pagar');
				}

				$this->id_estado_cuentas_pagar_Descripcion=$newid_estado_cuentas_pagar_Descripcion;
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
						throw new Exception('cuenta_pagar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=referencia en columna referencia');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newreferencia,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('cuenta_pagar:Formato incorrecto en la columna referencia='.$newreferencia);
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

	public function getorden_compra() : ?orden_compra {
		return $this->orden_compra;
	}

	public function getproveedor() : ?proveedor {
		return $this->proveedor;
	}

	public function gettermino_pago_proveedor() : ?termino_pago_proveedor {
		return $this->termino_pago_proveedor;
	}

	public function getestado_cuentas_pagar() : ?estado_cuentas_pagar {
		return $this->estado_cuentas_pagar;
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


	public  function  setorden_compra(?orden_compra $orden_compra) {
		try {
			$this->orden_compra=$orden_compra;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setproveedor(?proveedor $proveedor) {
		try {
			$this->proveedor=$proveedor;
		} catch(Exception $e) {
			;
		}
	}


	public  function  settermino_pago_proveedor(?termino_pago_proveedor $termino_pago_proveedor) {
		try {
			$this->termino_pago_proveedor=$termino_pago_proveedor;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setestado_cuentas_pagar(?estado_cuentas_pagar $estado_cuentas_pagar) {
		try {
			$this->estado_cuentas_pagar=$estado_cuentas_pagar;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	public function getdebito_cuenta_pagars() : array {
		return $this->debitocuentapagars;
	}

	public function getcredito_cuenta_pagars() : array {
		return $this->creditocuentapagars;
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

	public  function  setcredito_cuenta_pagars(array $creditocuentapagars) {
		try {
			$this->creditocuentapagars=$creditocuentapagars;
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
	public function setMap_cuenta_pagarValue(string $sKey,$oValue) {
		$this->map_cuenta_pagar[$sKey]=$oValue;
	}
	
	public function getMap_cuenta_pagarValue(string $sKey) {
		return $this->map_cuenta_pagar[$sKey];
	}
	
	public function getcuenta_pagar_Original() : ?cuenta_pagar {
		return $this->cuenta_pagar_Original;
	}
	
	public function setcuenta_pagar_Original(cuenta_pagar $cuenta_pagar) {
		try {
			$this->cuenta_pagar_Original=$cuenta_pagar;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_cuenta_pagar() : array {
		return $this->map_cuenta_pagar;
	}

	public function setMap_cuenta_pagar(array $map_cuenta_pagar) {
		$this->map_cuenta_pagar = $map_cuenta_pagar;
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
