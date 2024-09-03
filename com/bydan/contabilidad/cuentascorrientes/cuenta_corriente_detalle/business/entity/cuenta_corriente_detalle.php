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
namespace com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\general\tabla\business\entity\tabla;
use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\entity\cuenta_pagar;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\entity\cuenta_cobrar;

class cuenta_corriente_detalle extends GeneralEntity {

	/*GENERAL*/
	public static string $class='cuenta_corriente_detalle';
	
	/*AUXILIARES*/
	public ?cuenta_corriente_detalle $cuenta_corriente_detalle_Original=null;	
	public ?GeneralEntity $cuenta_corriente_detalle_Additional=null;
	public array $map_cuenta_corriente_detalle=array();	
		
	/*CAMPOS*/
	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public int $id_ejercicio = -1;
	public string $id_ejercicio_Descripcion = '';

	public int $id_periodo = -1;
	public string $id_periodo_Descripcion = '';

	public int $id_usuario = -1;
	public string $id_usuario_Descripcion = '';

	public int $id_cuenta_corriente = -1;
	public string $id_cuenta_corriente_Descripcion = '';

	public bool $es_balance_inicial = false;
	public bool $es_cheque = false;
	public bool $es_deposito = false;
	public bool $es_retiro = false;
	public string $numero_cheque = '';
	public string $fecha_emision = '';
	public ?int $id_cliente = null;
	public string $id_cliente_Descripcion = '';

	public ?int $id_proveedor = null;
	public string $id_proveedor_Descripcion = '';

	public float $monto = 0.0;
	public float $debito = 0.0;
	public float $credito = 0.0;
	public float $balance = 0.0;
	public string $fecha_hora = '';
	public int $id_tabla = -1;
	public string $id_tabla_Descripcion = '';

	public int $id_origen = 0;
	public string $descripcion = '';
	public int $id_estado = -1;
	public string $id_estado_Descripcion = '';

	public ?int $id_asiento = null;
	public string $id_asiento_Descripcion = '';

	public ?int $id_cuenta_pagar = null;
	public string $id_cuenta_pagar_Descripcion = '';

	public ?int $id_cuenta_cobrar = null;
	public string $id_cuenta_cobrar_Descripcion = '';

	public string $tabla_origen = '';
	public string $origen_empresa = '';
	public string $motivo_anulacion = '';
	public string $origen_dato = '';
	public string $computador_origen = '';
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	public ?ejercicio $ejercicio = null;
	public ?periodo $periodo = null;
	public ?usuario $usuario = null;
	public ?cuenta_corriente $cuenta_corriente = null;
	public ?cliente $cliente = null;
	public ?proveedor $proveedor = null;
	public ?tabla $tabla = null;
	public ?estado $estado = null;
	public ?asiento $asiento = null;
	public ?cuenta_pagar $cuenta_pagar = null;
	public ?cuenta_cobrar $cuenta_cobrar = null;
	
	/*RELACIONES*/
	
	public array $clasificacioncheques = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->cuenta_corriente_detalle_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->id_ejercicio=-1;
		$this->id_ejercicio_Descripcion='';

 		$this->id_periodo=-1;
		$this->id_periodo_Descripcion='';

 		$this->id_usuario=-1;
		$this->id_usuario_Descripcion='';

 		$this->id_cuenta_corriente=-1;
		$this->id_cuenta_corriente_Descripcion='';

 		$this->es_balance_inicial=false;
 		$this->es_cheque=false;
 		$this->es_deposito=false;
 		$this->es_retiro=false;
 		$this->numero_cheque='';
 		$this->fecha_emision=date('Y-m-d');
 		$this->id_cliente=null;
		$this->id_cliente_Descripcion='';

 		$this->id_proveedor=null;
		$this->id_proveedor_Descripcion='';

 		$this->monto=0.0;
 		$this->debito=0.0;
 		$this->credito=0.0;
 		$this->balance=0.0;
 		$this->fecha_hora=date('Y-m-d');
 		$this->id_tabla=-1;
		$this->id_tabla_Descripcion='';

 		$this->id_origen=0;
 		$this->descripcion='';
 		$this->id_estado=-1;
		$this->id_estado_Descripcion='';

 		$this->id_asiento=null;
		$this->id_asiento_Descripcion='';

 		$this->id_cuenta_pagar=null;
		$this->id_cuenta_pagar_Descripcion='';

 		$this->id_cuenta_cobrar=null;
		$this->id_cuenta_cobrar_Descripcion='';

 		$this->tabla_origen='';
 		$this->origen_empresa='';
 		$this->motivo_anulacion='';
 		$this->origen_dato='';
 		$this->computador_origen='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
			$this->ejercicio=new ejercicio();
			$this->periodo=new periodo();
			$this->usuario=new usuario();
			$this->cuenta_corriente=new cuenta_corriente();
			$this->cliente=new cliente();
			$this->proveedor=new proveedor();
			$this->tabla=new tabla();
			$this->estado=new estado();
			$this->asiento=new asiento();
			$this->cuenta_pagar=new cuenta_pagar();
			$this->cuenta_cobrar=new cuenta_cobrar();
		}
		
		/*RELACIONES*/
		
		$this->clasificacioncheques=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cuenta_corriente_detalle_Additional=new cuenta_corriente_detalle_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_cuenta_corriente_detalle() {
		$this->map_cuenta_corriente_detalle = array();
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
    
	public function  getes_balance_inicial() : ?bool {
		return $this->es_balance_inicial;
	}
    
	public function  getes_cheque() : ?bool {
		return $this->es_cheque;
	}
    
	public function  getes_deposito() : ?bool {
		return $this->es_deposito;
	}
    
	public function  getes_retiro() : ?bool {
		return $this->es_retiro;
	}
    
	public function  getnumero_cheque() : ?string {
		return $this->numero_cheque;
	}
    
	public function  getfecha_emision() : ?string {
		return $this->fecha_emision;
	}
    
	public function  getid_cliente() : ?int {
		return $this->id_cliente;
	}
	
	public function  getid_cliente_Descripcion() : string {
		return $this->id_cliente_Descripcion;
	}
    
	public function  getid_proveedor() : ?int {
		return $this->id_proveedor;
	}
	
	public function  getid_proveedor_Descripcion() : string {
		return $this->id_proveedor_Descripcion;
	}
    
	public function  getmonto() : ?float {
		return $this->monto;
	}
    
	public function  getdebito() : ?float {
		return $this->debito;
	}
    
	public function  getcredito() : ?float {
		return $this->credito;
	}
    
	public function  getbalance() : ?float {
		return $this->balance;
	}
    
	public function  getfecha_hora() : ?string {
		return $this->fecha_hora;
	}
    
	public function  getid_tabla() : ?int {
		return $this->id_tabla;
	}
	
	public function  getid_tabla_Descripcion() : string {
		return $this->id_tabla_Descripcion;
	}
    
	public function  getid_origen() : ?int {
		return $this->id_origen;
	}
    
	public function  getdescripcion() : ?string {
		return $this->descripcion;
	}
    
	public function  getid_estado() : ?int {
		return $this->id_estado;
	}
	
	public function  getid_estado_Descripcion() : string {
		return $this->id_estado_Descripcion;
	}
    
	public function  getid_asiento() : ?int {
		return $this->id_asiento;
	}
	
	public function  getid_asiento_Descripcion() : string {
		return $this->id_asiento_Descripcion;
	}
    
	public function  getid_cuenta_pagar() : ?int {
		return $this->id_cuenta_pagar;
	}
	
	public function  getid_cuenta_pagar_Descripcion() : string {
		return $this->id_cuenta_pagar_Descripcion;
	}
    
	public function  getid_cuenta_cobrar() : ?int {
		return $this->id_cuenta_cobrar;
	}
	
	public function  getid_cuenta_cobrar_Descripcion() : string {
		return $this->id_cuenta_cobrar_Descripcion;
	}
    
	public function  gettabla_origen() : ?string {
		return $this->tabla_origen;
	}
    
	public function  getorigen_empresa() : ?string {
		return $this->origen_empresa;
	}
    
	public function  getmotivo_anulacion() : ?string {
		return $this->motivo_anulacion;
	}
    
	public function  getorigen_dato() : ?string {
		return $this->origen_dato;
	}
    
	public function  getcomputador_origen() : ?string {
		return $this->computador_origen;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('cuenta_corriente_detalle:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_corriente_detalle:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('cuenta_corriente_detalle:Valor nulo no permitido en columna id_empresa');
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
					throw new Exception('cuenta_corriente_detalle:Valor nulo no permitido en columna id_ejercicio');
				}

				if($newid_ejercicio!==null && filter_var($newid_ejercicio,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_corriente_detalle:No es numero entero - id_ejercicio='.$newid_ejercicio);
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
					throw new Exception('cuenta_corriente_detalle:Valor nulo no permitido en columna id_ejercicio');
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
					throw new Exception('cuenta_corriente_detalle:Valor nulo no permitido en columna id_periodo');
				}

				if($newid_periodo!==null && filter_var($newid_periodo,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_corriente_detalle:No es numero entero - id_periodo='.$newid_periodo);
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
					throw new Exception('cuenta_corriente_detalle:Valor nulo no permitido en columna id_periodo');
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
					throw new Exception('cuenta_corriente_detalle:Valor nulo no permitido en columna id_usuario');
				}

				if($newid_usuario!==null && filter_var($newid_usuario,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_corriente_detalle:No es numero entero - id_usuario='.$newid_usuario);
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
					throw new Exception('cuenta_corriente_detalle:Valor nulo no permitido en columna id_usuario');
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
					throw new Exception('cuenta_corriente_detalle:Valor nulo no permitido en columna id_cuenta_corriente');
				}

				if($newid_cuenta_corriente!==null && filter_var($newid_cuenta_corriente,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_corriente_detalle:No es numero entero - id_cuenta_corriente='.$newid_cuenta_corriente);
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
					throw new Exception('cuenta_corriente_detalle:Valor nulo no permitido en columna id_cuenta_corriente');
				}

				$this->id_cuenta_corriente_Descripcion=$newid_cuenta_corriente_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setes_balance_inicial(?bool $newes_balance_inicial)
	{
		try {
			if($this->es_balance_inicial!==$newes_balance_inicial) {
				if($newes_balance_inicial===null && $newes_balance_inicial!='') {
					throw new Exception('cuenta_corriente_detalle:Valor nulo no permitido en columna es_balance_inicial');
				}

				if($newes_balance_inicial!==null && filter_var($newes_balance_inicial,FILTER_VALIDATE_BOOLEAN)===false && $newes_balance_inicial!==0 && $newes_balance_inicial!==false) {
					throw new Exception('cuenta_corriente_detalle:No es valor booleano - es_balance_inicial='.$newes_balance_inicial);
				}

				$this->es_balance_inicial=$newes_balance_inicial;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setes_cheque(?bool $newes_cheque)
	{
		try {
			if($this->es_cheque!==$newes_cheque) {
				if($newes_cheque===null && $newes_cheque!='') {
					throw new Exception('cuenta_corriente_detalle:Valor nulo no permitido en columna es_cheque');
				}

				if($newes_cheque!==null && filter_var($newes_cheque,FILTER_VALIDATE_BOOLEAN)===false && $newes_cheque!==0 && $newes_cheque!==false) {
					throw new Exception('cuenta_corriente_detalle:No es valor booleano - es_cheque='.$newes_cheque);
				}

				$this->es_cheque=$newes_cheque;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setes_deposito(?bool $newes_deposito)
	{
		try {
			if($this->es_deposito!==$newes_deposito) {
				if($newes_deposito===null && $newes_deposito!='') {
					throw new Exception('cuenta_corriente_detalle:Valor nulo no permitido en columna es_deposito');
				}

				if($newes_deposito!==null && filter_var($newes_deposito,FILTER_VALIDATE_BOOLEAN)===false && $newes_deposito!==0 && $newes_deposito!==false) {
					throw new Exception('cuenta_corriente_detalle:No es valor booleano - es_deposito='.$newes_deposito);
				}

				$this->es_deposito=$newes_deposito;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setes_retiro(?bool $newes_retiro)
	{
		try {
			if($this->es_retiro!==$newes_retiro) {
				if($newes_retiro===null && $newes_retiro!='') {
					throw new Exception('cuenta_corriente_detalle:Valor nulo no permitido en columna es_retiro');
				}

				if($newes_retiro!==null && filter_var($newes_retiro,FILTER_VALIDATE_BOOLEAN)===false && $newes_retiro!==0 && $newes_retiro!==false) {
					throw new Exception('cuenta_corriente_detalle:No es valor booleano - es_retiro='.$newes_retiro);
				}

				$this->es_retiro=$newes_retiro;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnumero_cheque(?string $newnumero_cheque) {
		if($this->numero_cheque!==$newnumero_cheque) {

				if(strlen($newnumero_cheque)>12) {
					try {
						throw new Exception('cuenta_corriente_detalle:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=numero_cheque en columna numero_cheque');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newnumero_cheque,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('cuenta_corriente_detalle:Formato incorrecto en la columna numero_cheque='.$newnumero_cheque);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->numero_cheque=$newnumero_cheque;
			$this->setIsChanged(true);
		}
	}
    
	public function setfecha_emision(?string $newfecha_emision)
	{
		try {
			if($this->fecha_emision!==$newfecha_emision) {
				if($newfecha_emision===null && $newfecha_emision!='') {
					throw new Exception('cuenta_corriente_detalle:Valor nulo no permitido en columna fecha_emision');
				}

				if($newfecha_emision!==null && filter_var($newfecha_emision,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('cuenta_corriente_detalle:No es fecha - fecha_emision='.$newfecha_emision);
				}

				$this->fecha_emision=$newfecha_emision;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_cliente(?int $newid_cliente) {
		if($this->id_cliente!==$newid_cliente) {

				if($newid_cliente!==null && filter_var($newid_cliente,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_corriente_detalle:No es numero entero - id_cliente');
				}

			$this->id_cliente=$newid_cliente;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_cliente_Descripcion(string $newid_cliente_Descripcion) {
		if($this->id_cliente_Descripcion!=$newid_cliente_Descripcion) {

			$this->id_cliente_Descripcion=$newid_cliente_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function setid_proveedor(?int $newid_proveedor) {
		if($this->id_proveedor!==$newid_proveedor) {

				if($newid_proveedor!==null && filter_var($newid_proveedor,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_corriente_detalle:No es numero entero - id_proveedor');
				}

			$this->id_proveedor=$newid_proveedor;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_proveedor_Descripcion(string $newid_proveedor_Descripcion) {
		if($this->id_proveedor_Descripcion!=$newid_proveedor_Descripcion) {

			$this->id_proveedor_Descripcion=$newid_proveedor_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function setmonto(?float $newmonto)
	{
		try {
			if($this->monto!==$newmonto) {
				if($newmonto===null && $newmonto!='') {
					throw new Exception('cuenta_corriente_detalle:Valor nulo no permitido en columna monto');
				}

				if($newmonto!=0) {
					if($newmonto!==null && filter_var($newmonto,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('cuenta_corriente_detalle:No es numero decimal - monto='.$newmonto);
					}
				}

				$this->monto=$newmonto;
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
					throw new Exception('cuenta_corriente_detalle:Valor nulo no permitido en columna debito');
				}

				if($newdebito!=0) {
					if($newdebito!==null && filter_var($newdebito,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('cuenta_corriente_detalle:No es numero decimal - debito='.$newdebito);
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
					throw new Exception('cuenta_corriente_detalle:Valor nulo no permitido en columna credito');
				}

				if($newcredito!=0) {
					if($newcredito!==null && filter_var($newcredito,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('cuenta_corriente_detalle:No es numero decimal - credito='.$newcredito);
					}
				}

				$this->credito=$newcredito;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setbalance(?float $newbalance)
	{
		try {
			if($this->balance!==$newbalance) {
				if($newbalance===null && $newbalance!='') {
					throw new Exception('cuenta_corriente_detalle:Valor nulo no permitido en columna balance');
				}

				if($newbalance!=0) {
					if($newbalance!==null && filter_var($newbalance,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('cuenta_corriente_detalle:No es numero decimal - balance='.$newbalance);
					}
				}

				$this->balance=$newbalance;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setfecha_hora(?string $newfecha_hora)
	{
		try {
			if($this->fecha_hora!==$newfecha_hora) {
				if($newfecha_hora===null && $newfecha_hora!='') {
					throw new Exception('cuenta_corriente_detalle:Valor nulo no permitido en columna fecha_hora');
				}

				if($newfecha_hora!==null && filter_var($newfecha_hora,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('cuenta_corriente_detalle:No es fecha - fecha_hora='.$newfecha_hora);
				}

				$this->fecha_hora=$newfecha_hora;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_tabla(?int $newid_tabla)
	{
		try {
			if($this->id_tabla!==$newid_tabla) {
				if($newid_tabla===null && $newid_tabla!='') {
					throw new Exception('cuenta_corriente_detalle:Valor nulo no permitido en columna id_tabla');
				}

				if($newid_tabla!==null && filter_var($newid_tabla,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_corriente_detalle:No es numero entero - id_tabla='.$newid_tabla);
				}

				$this->id_tabla=$newid_tabla;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_tabla_Descripcion(string $newid_tabla_Descripcion)
	{
		try {
			if($this->id_tabla_Descripcion!=$newid_tabla_Descripcion) {
				if($newid_tabla_Descripcion===null && $newid_tabla_Descripcion!='') {
					throw new Exception('cuenta_corriente_detalle:Valor nulo no permitido en columna id_tabla');
				}

				$this->id_tabla_Descripcion=$newid_tabla_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_origen(?int $newid_origen)
	{
		try {
			if($this->id_origen!==$newid_origen) {
				if($newid_origen===null && $newid_origen!='') {
					throw new Exception('cuenta_corriente_detalle:Valor nulo no permitido en columna id_origen');
				}

				if($newid_origen!==null && filter_var($newid_origen,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_corriente_detalle:No es numero entero - id_origen='.$newid_origen);
				}

				$this->id_origen=$newid_origen;
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
						throw new Exception('cuenta_corriente_detalle:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=descripcion en columna descripcion');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newdescripcion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('cuenta_corriente_detalle:Formato incorrecto en la columna descripcion='.$newdescripcion);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->descripcion=$newdescripcion;
			$this->setIsChanged(true);
		}
	}
    
	public function setid_estado(?int $newid_estado)
	{
		try {
			if($this->id_estado!==$newid_estado) {
				if($newid_estado===null && $newid_estado!='') {
					throw new Exception('cuenta_corriente_detalle:Valor nulo no permitido en columna id_estado');
				}

				if($newid_estado!==null && filter_var($newid_estado,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_corriente_detalle:No es numero entero - id_estado='.$newid_estado);
				}

				$this->id_estado=$newid_estado;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_estado_Descripcion(string $newid_estado_Descripcion)
	{
		try {
			if($this->id_estado_Descripcion!=$newid_estado_Descripcion) {
				if($newid_estado_Descripcion===null && $newid_estado_Descripcion!='') {
					throw new Exception('cuenta_corriente_detalle:Valor nulo no permitido en columna id_estado');
				}

				$this->id_estado_Descripcion=$newid_estado_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_asiento(?int $newid_asiento) {
		if($this->id_asiento!==$newid_asiento) {

				if($newid_asiento!==null && filter_var($newid_asiento,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_corriente_detalle:No es numero entero - id_asiento');
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
    
	public function setid_cuenta_pagar(?int $newid_cuenta_pagar) {
		if($this->id_cuenta_pagar!==$newid_cuenta_pagar) {

				if($newid_cuenta_pagar!==null && filter_var($newid_cuenta_pagar,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_corriente_detalle:No es numero entero - id_cuenta_pagar');
				}

			$this->id_cuenta_pagar=$newid_cuenta_pagar;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_cuenta_pagar_Descripcion(string $newid_cuenta_pagar_Descripcion) {
		if($this->id_cuenta_pagar_Descripcion!=$newid_cuenta_pagar_Descripcion) {

			$this->id_cuenta_pagar_Descripcion=$newid_cuenta_pagar_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function setid_cuenta_cobrar(?int $newid_cuenta_cobrar) {
		if($this->id_cuenta_cobrar!==$newid_cuenta_cobrar) {

				if($newid_cuenta_cobrar!==null && filter_var($newid_cuenta_cobrar,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_corriente_detalle:No es numero entero - id_cuenta_cobrar');
				}

			$this->id_cuenta_cobrar=$newid_cuenta_cobrar;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_cuenta_cobrar_Descripcion(string $newid_cuenta_cobrar_Descripcion) {
		if($this->id_cuenta_cobrar_Descripcion!=$newid_cuenta_cobrar_Descripcion) {

			$this->id_cuenta_cobrar_Descripcion=$newid_cuenta_cobrar_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function settabla_origen(?string $newtabla_origen) {
		if($this->tabla_origen!==$newtabla_origen) {

				if(strlen($newtabla_origen)>2) {
					try {
						throw new Exception('cuenta_corriente_detalle:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=tabla_origen en columna tabla_origen');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newtabla_origen,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('cuenta_corriente_detalle:Formato incorrecto en la columna tabla_origen='.$newtabla_origen);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->tabla_origen=$newtabla_origen;
			$this->setIsChanged(true);
		}
	}
    
	public function setorigen_empresa(?string $neworigen_empresa) {
		if($this->origen_empresa!==$neworigen_empresa) {

				if(strlen($neworigen_empresa)>2) {
					try {
						throw new Exception('cuenta_corriente_detalle:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=origen_empresa en columna origen_empresa');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($neworigen_empresa,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('cuenta_corriente_detalle:Formato incorrecto en la columna origen_empresa='.$neworigen_empresa);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->origen_empresa=$neworigen_empresa;
			$this->setIsChanged(true);
		}
	}
    
	public function setmotivo_anulacion(?string $newmotivo_anulacion) {
		if($this->motivo_anulacion!==$newmotivo_anulacion) {

				if(strlen($newmotivo_anulacion)>1000) {
					try {
						throw new Exception('cuenta_corriente_detalle:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=motivo_anulacion en columna motivo_anulacion');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newmotivo_anulacion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('cuenta_corriente_detalle:Formato incorrecto en la columna motivo_anulacion='.$newmotivo_anulacion);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->motivo_anulacion=$newmotivo_anulacion;
			$this->setIsChanged(true);
		}
	}
    
	public function setorigen_dato(?string $neworigen_dato) {
		if($this->origen_dato!==$neworigen_dato) {

				if(strlen($neworigen_dato)>6) {
					try {
						throw new Exception('cuenta_corriente_detalle:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=origen_dato en columna origen_dato');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($neworigen_dato,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('cuenta_corriente_detalle:Formato incorrecto en la columna origen_dato='.$neworigen_dato);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->origen_dato=$neworigen_dato;
			$this->setIsChanged(true);
		}
	}
    
	public function setcomputador_origen(?string $newcomputador_origen) {
		if($this->computador_origen!==$newcomputador_origen) {

				if(strlen($newcomputador_origen)>1000) {
					try {
						throw new Exception('cuenta_corriente_detalle:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=computador_origen en columna computador_origen');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newcomputador_origen,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('cuenta_corriente_detalle:Formato incorrecto en la columna computador_origen='.$newcomputador_origen);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->computador_origen=$newcomputador_origen;
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

	public function getusuario() : ?usuario {
		return $this->usuario;
	}

	public function getcuenta_corriente() : ?cuenta_corriente {
		return $this->cuenta_corriente;
	}

	public function getcliente() : ?cliente {
		return $this->cliente;
	}

	public function getproveedor() : ?proveedor {
		return $this->proveedor;
	}

	public function gettabla() : ?tabla {
		return $this->tabla;
	}

	public function getestado() : ?estado {
		return $this->estado;
	}

	public function getasiento() : ?asiento {
		return $this->asiento;
	}

	public function getcuenta_pagar() : ?cuenta_pagar {
		return $this->cuenta_pagar;
	}

	public function getcuenta_cobrar() : ?cuenta_cobrar {
		return $this->cuenta_cobrar;
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


	public  function  setcliente(?cliente $cliente) {
		try {
			$this->cliente=$cliente;
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


	public  function  settabla(?tabla $tabla) {
		try {
			$this->tabla=$tabla;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setestado(?estado $estado) {
		try {
			$this->estado=$estado;
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


	public  function  setcuenta_pagar(?cuenta_pagar $cuenta_pagar) {
		try {
			$this->cuenta_pagar=$cuenta_pagar;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setcuenta_cobrar(?cuenta_cobrar $cuenta_cobrar) {
		try {
			$this->cuenta_cobrar=$cuenta_cobrar;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	public function getclasificacion_cheques() : array {
		return $this->clasificacioncheques;
	}

	
	
	public  function  setclasificacion_cheques(array $clasificacioncheques) {
		try {
			$this->clasificacioncheques=$clasificacioncheques;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_cuenta_corriente_detalleValue(string $sKey,$oValue) {
		$this->map_cuenta_corriente_detalle[$sKey]=$oValue;
	}
	
	public function getMap_cuenta_corriente_detalleValue(string $sKey) {
		return $this->map_cuenta_corriente_detalle[$sKey];
	}
	
	public function getcuenta_corriente_detalle_Original() : ?cuenta_corriente_detalle {
		return $this->cuenta_corriente_detalle_Original;
	}
	
	public function setcuenta_corriente_detalle_Original(cuenta_corriente_detalle $cuenta_corriente_detalle) {
		try {
			$this->cuenta_corriente_detalle_Original=$cuenta_corriente_detalle;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_cuenta_corriente_detalle() : array {
		return $this->map_cuenta_corriente_detalle;
	}

	public function setMap_cuenta_corriente_detalle(array $map_cuenta_corriente_detalle) {
		$this->map_cuenta_corriente_detalle = $map_cuenta_corriente_detalle;
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
