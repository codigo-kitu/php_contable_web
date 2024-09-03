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
namespace com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;
use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity\cuenta_corriente;

class documento_cuenta_pagar extends GeneralEntity {

	/*GENERAL*/
	public static string $class='documento_cuenta_pagar';
	
	/*AUXILIARES*/
	public ?documento_cuenta_pagar $documento_cuenta_pagar_Original=null;	
	public ?GeneralEntity $documento_cuenta_pagar_Additional=null;
	public array $map_documento_cuenta_pagar=array();	
		
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

	public string $numero = '';
	public int $id_proveedor = -1;
	public string $id_proveedor_Descripcion = '';

	public string $tipo = '';
	public string $fecha_emision = '';
	public string $descripcion = '';
	public float $monto = 0.0;
	public float $monto_parcial = 0.0;
	public string $moneda = '';
	public string $fecha_vence = '';
	public int $numero_de_pagos = 0;
	public float $balance = 0.0;
	public float $balance_mon = 0.0;
	public string $numero_pagado = '';
	public int $id_pagado = 0;
	public string $modulo_origen = '';
	public int $id_origen = 0;
	public string $modulo_destino = '';
	public int $id_destino = 0;
	public string $nombre_pc = '';
	public string $hora = '';
	public float $monto_mora = 0.0;
	public float $interes_mora = 0.0;
	public int $dias_gracia_mora = 0;
	public string $instrumento_pago = '';
	public float $tipo_cambio = 0.0;
	public string $nro_documento_proveedor = '';
	public string $clase_registro = '';
	public string $estado_registro = '';
	public string $motivo_anulacion = '';
	public float $impuesto_1 = 0.0;
	public float $impuesto_2 = 0.0;
	public bool $impuesto_incluido = false;
	public string $observaciones = '';
	public string $grupo_pago = '';
	public int $termino_idpv = 0;
	public int $id_forma_pago_proveedor = -1;
	public string $id_forma_pago_proveedor_Descripcion = '';

	public string $nro_pago = '';
	public string $referencia_pago = '';
	public string $fecha_hora = '';
	public int $id_base = 0;
	public int $id_cuenta_corriente = -1;
	public string $id_cuenta_corriente_Descripcion = '';

	
	/*FKs*/
	
	public ?empresa $empresa = null;
	public ?sucursal $sucursal = null;
	public ?ejercicio $ejercicio = null;
	public ?periodo $periodo = null;
	public ?usuario $usuario = null;
	public ?proveedor $proveedor = null;
	public ?forma_pago_proveedor $forma_pago_proveedor = null;
	public ?cuenta_corriente $cuenta_corriente = null;
	
	/*RELACIONES*/
	
	public array $ordencompras = array();
	public array $imagendocumentocuentapagars = array();
	public array $devolucions = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->documento_cuenta_pagar_Original=$this;
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

 		$this->numero='';
 		$this->id_proveedor=-1;
		$this->id_proveedor_Descripcion='';

 		$this->tipo='';
 		$this->fecha_emision=date('Y-m-d');
 		$this->descripcion='';
 		$this->monto=0.0;
 		$this->monto_parcial=0.0;
 		$this->moneda='';
 		$this->fecha_vence=date('Y-m-d');
 		$this->numero_de_pagos=0;
 		$this->balance=0.0;
 		$this->balance_mon=0.0;
 		$this->numero_pagado='';
 		$this->id_pagado=0;
 		$this->modulo_origen='';
 		$this->id_origen=0;
 		$this->modulo_destino='';
 		$this->id_destino=0;
 		$this->nombre_pc='';
 		$this->hora=date('Y-m-d');
 		$this->monto_mora=0.0;
 		$this->interes_mora=0.0;
 		$this->dias_gracia_mora=0;
 		$this->instrumento_pago='';
 		$this->tipo_cambio=0.0;
 		$this->nro_documento_proveedor='';
 		$this->clase_registro='';
 		$this->estado_registro='';
 		$this->motivo_anulacion='';
 		$this->impuesto_1=0.0;
 		$this->impuesto_2=0.0;
 		$this->impuesto_incluido=false;
 		$this->observaciones='';
 		$this->grupo_pago='';
 		$this->termino_idpv=0;
 		$this->id_forma_pago_proveedor=-1;
		$this->id_forma_pago_proveedor_Descripcion='';

 		$this->nro_pago='';
 		$this->referencia_pago='';
 		$this->fecha_hora=date('Y-m-d');
 		$this->id_base=0;
 		$this->id_cuenta_corriente=-1;
		$this->id_cuenta_corriente_Descripcion='';

		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
			$this->sucursal=new sucursal();
			$this->ejercicio=new ejercicio();
			$this->periodo=new periodo();
			$this->usuario=new usuario();
			$this->proveedor=new proveedor();
			$this->forma_pago_proveedor=new forma_pago_proveedor();
			$this->cuenta_corriente=new cuenta_corriente();
		}
		
		/*RELACIONES*/
		
		$this->ordencompras=array();
		$this->imagendocumentocuentapagars=array();
		$this->devolucions=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->documento_cuenta_pagar_Additional=new documento_cuenta_pagar_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_documento_cuenta_pagar() {
		$this->map_documento_cuenta_pagar = array();
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
    
	public function  getnumero() : ?string {
		return $this->numero;
	}
    
	public function  getid_proveedor() : ?int {
		return $this->id_proveedor;
	}
	
	public function  getid_proveedor_Descripcion() : string {
		return $this->id_proveedor_Descripcion;
	}
    
	public function  gettipo() : ?string {
		return $this->tipo;
	}
    
	public function  getfecha_emision() : ?string {
		return $this->fecha_emision;
	}
    
	public function  getdescripcion() : ?string {
		return $this->descripcion;
	}
    
	public function  getmonto() : ?float {
		return $this->monto;
	}
    
	public function  getmonto_parcial() : ?float {
		return $this->monto_parcial;
	}
    
	public function  getmoneda() : ?string {
		return $this->moneda;
	}
    
	public function  getfecha_vence() : ?string {
		return $this->fecha_vence;
	}
    
	public function  getnumero_de_pagos() : ?int {
		return $this->numero_de_pagos;
	}
    
	public function  getbalance() : ?float {
		return $this->balance;
	}
    
	public function  getbalance_mon() : ?float {
		return $this->balance_mon;
	}
    
	public function  getnumero_pagado() : ?string {
		return $this->numero_pagado;
	}
    
	public function  getid_pagado() : ?int {
		return $this->id_pagado;
	}
    
	public function  getmodulo_origen() : ?string {
		return $this->modulo_origen;
	}
    
	public function  getid_origen() : ?int {
		return $this->id_origen;
	}
    
	public function  getmodulo_destino() : ?string {
		return $this->modulo_destino;
	}
    
	public function  getid_destino() : ?int {
		return $this->id_destino;
	}
    
	public function  getnombre_pc() : ?string {
		return $this->nombre_pc;
	}
    
	public function  gethora() : ?string {
		return $this->hora;
	}
    
	public function  getmonto_mora() : ?float {
		return $this->monto_mora;
	}
    
	public function  getinteres_mora() : ?float {
		return $this->interes_mora;
	}
    
	public function  getdias_gracia_mora() : ?int {
		return $this->dias_gracia_mora;
	}
    
	public function  getinstrumento_pago() : ?string {
		return $this->instrumento_pago;
	}
    
	public function  gettipo_cambio() : ?float {
		return $this->tipo_cambio;
	}
    
	public function  getnro_documento_proveedor() : ?string {
		return $this->nro_documento_proveedor;
	}
    
	public function  getclase_registro() : ?string {
		return $this->clase_registro;
	}
    
	public function  getestado_registro() : ?string {
		return $this->estado_registro;
	}
    
	public function  getmotivo_anulacion() : ?string {
		return $this->motivo_anulacion;
	}
    
	public function  getimpuesto_1() : ?float {
		return $this->impuesto_1;
	}
    
	public function  getimpuesto_2() : ?float {
		return $this->impuesto_2;
	}
    
	public function  getimpuesto_incluido() : ?bool {
		return $this->impuesto_incluido;
	}
    
	public function  getobservaciones() : ?string {
		return $this->observaciones;
	}
    
	public function  getgrupo_pago() : ?string {
		return $this->grupo_pago;
	}
    
	public function  gettermino_idpv() : ?int {
		return $this->termino_idpv;
	}
    
	public function  getid_forma_pago_proveedor() : ?int {
		return $this->id_forma_pago_proveedor;
	}
	
	public function  getid_forma_pago_proveedor_Descripcion() : string {
		return $this->id_forma_pago_proveedor_Descripcion;
	}
    
	public function  getnro_pago() : ?string {
		return $this->nro_pago;
	}
    
	public function  getreferencia_pago() : ?string {
		return $this->referencia_pago;
	}
    
	public function  getfecha_hora() : ?string {
		return $this->fecha_hora;
	}
    
	public function  getid_base() : ?int {
		return $this->id_base;
	}
    
	public function  getid_cuenta_corriente() : ?int {
		return $this->id_cuenta_corriente;
	}
	
	public function  getid_cuenta_corriente_Descripcion() : string {
		return $this->id_cuenta_corriente_Descripcion;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('documento_cuenta_pagar:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna id_empresa');
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
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna id_sucursal');
				}

				if($newid_sucursal!==null && filter_var($newid_sucursal,FILTER_VALIDATE_INT)===false) {
					throw new Exception('documento_cuenta_pagar:No es numero entero - id_sucursal='.$newid_sucursal);
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
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna id_sucursal');
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
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna id_ejercicio');
				}

				if($newid_ejercicio!==null && filter_var($newid_ejercicio,FILTER_VALIDATE_INT)===false) {
					throw new Exception('documento_cuenta_pagar:No es numero entero - id_ejercicio='.$newid_ejercicio);
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
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna id_ejercicio');
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
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna id_periodo');
				}

				if($newid_periodo!==null && filter_var($newid_periodo,FILTER_VALIDATE_INT)===false) {
					throw new Exception('documento_cuenta_pagar:No es numero entero - id_periodo='.$newid_periodo);
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
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna id_periodo');
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
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna id_usuario');
				}

				if($newid_usuario!==null && filter_var($newid_usuario,FILTER_VALIDATE_INT)===false) {
					throw new Exception('documento_cuenta_pagar:No es numero entero - id_usuario='.$newid_usuario);
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
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna id_usuario');
				}

				$this->id_usuario_Descripcion=$newid_usuario_Descripcion;
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
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna numero');
				}

				if(strlen($newnumero)>250) {
					throw new Exception('documento_cuenta_pagar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=250 en columna numero');
				}

				if(filter_var($newnumero,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('documento_cuenta_pagar:Formato incorrecto en columna numero='.$newnumero);
				}

				$this->numero=$newnumero;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_proveedor(?int $newid_proveedor)
	{
		try {
			if($this->id_proveedor!==$newid_proveedor) {
				if($newid_proveedor===null && $newid_proveedor!='') {
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna id_proveedor');
				}

				if($newid_proveedor!==null && filter_var($newid_proveedor,FILTER_VALIDATE_INT)===false) {
					throw new Exception('documento_cuenta_pagar:No es numero entero - id_proveedor='.$newid_proveedor);
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
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna id_proveedor');
				}

				$this->id_proveedor_Descripcion=$newid_proveedor_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function settipo(?string $newtipo)
	{
		try {
			if($this->tipo!==$newtipo) {
				if($newtipo===null && $newtipo!='') {
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna tipo');
				}

				if(strlen($newtipo)>2) {
					throw new Exception('documento_cuenta_pagar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=2 en columna tipo');
				}

				if(filter_var($newtipo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('documento_cuenta_pagar:Formato incorrecto en columna tipo='.$newtipo);
				}

				$this->tipo=$newtipo;
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
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna fecha_emision');
				}

				if($newfecha_emision!==null && filter_var($newfecha_emision,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('documento_cuenta_pagar:No es fecha - fecha_emision='.$newfecha_emision);
				}

				$this->fecha_emision=$newfecha_emision;
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
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna descripcion');
				}

				if(strlen($newdescripcion)>120) {
					throw new Exception('documento_cuenta_pagar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=120 en columna descripcion');
				}

				if(filter_var($newdescripcion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('documento_cuenta_pagar:Formato incorrecto en columna descripcion='.$newdescripcion);
				}

				$this->descripcion=$newdescripcion;
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
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna monto');
				}

				if($newmonto!=0) {
					if($newmonto!==null && filter_var($newmonto,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('documento_cuenta_pagar:No es numero decimal - monto='.$newmonto);
					}
				}

				$this->monto=$newmonto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setmonto_parcial(?float $newmonto_parcial)
	{
		try {
			if($this->monto_parcial!==$newmonto_parcial) {
				if($newmonto_parcial===null && $newmonto_parcial!='') {
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna monto_parcial');
				}

				if($newmonto_parcial!=0) {
					if($newmonto_parcial!==null && filter_var($newmonto_parcial,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('documento_cuenta_pagar:No es numero decimal - monto_parcial='.$newmonto_parcial);
					}
				}

				$this->monto_parcial=$newmonto_parcial;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setmoneda(?string $newmoneda)
	{
		try {
			if($this->moneda!==$newmoneda) {
				if($newmoneda===null && $newmoneda!='') {
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna moneda');
				}

				if(strlen($newmoneda)>1) {
					throw new Exception('documento_cuenta_pagar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1 en columna moneda');
				}

				if(filter_var($newmoneda,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('documento_cuenta_pagar:Formato incorrecto en columna moneda='.$newmoneda);
				}

				$this->moneda=$newmoneda;
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
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna fecha_vence');
				}

				if($newfecha_vence!==null && filter_var($newfecha_vence,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('documento_cuenta_pagar:No es fecha - fecha_vence='.$newfecha_vence);
				}

				$this->fecha_vence=$newfecha_vence;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnumero_de_pagos(?int $newnumero_de_pagos)
	{
		try {
			if($this->numero_de_pagos!==$newnumero_de_pagos) {
				if($newnumero_de_pagos===null && $newnumero_de_pagos!='') {
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna numero_de_pagos');
				}

				if($newnumero_de_pagos!==null && filter_var($newnumero_de_pagos,FILTER_VALIDATE_INT)===false) {
					throw new Exception('documento_cuenta_pagar:No es numero entero - numero_de_pagos='.$newnumero_de_pagos);
				}

				$this->numero_de_pagos=$newnumero_de_pagos;
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
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna balance');
				}

				if($newbalance!=0) {
					if($newbalance!==null && filter_var($newbalance,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('documento_cuenta_pagar:No es numero decimal - balance='.$newbalance);
					}
				}

				$this->balance=$newbalance;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setbalance_mon(?float $newbalance_mon)
	{
		try {
			if($this->balance_mon!==$newbalance_mon) {
				if($newbalance_mon===null && $newbalance_mon!='') {
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna balance_mon');
				}

				if($newbalance_mon!=0) {
					if($newbalance_mon!==null && filter_var($newbalance_mon,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('documento_cuenta_pagar:No es numero decimal - balance_mon='.$newbalance_mon);
					}
				}

				$this->balance_mon=$newbalance_mon;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnumero_pagado(?string $newnumero_pagado)
	{
		try {
			if($this->numero_pagado!==$newnumero_pagado) {
				if($newnumero_pagado===null && $newnumero_pagado!='') {
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna numero_pagado');
				}

				if(strlen($newnumero_pagado)>10) {
					throw new Exception('documento_cuenta_pagar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=10 en columna numero_pagado');
				}

				if(filter_var($newnumero_pagado,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('documento_cuenta_pagar:Formato incorrecto en columna numero_pagado='.$newnumero_pagado);
				}

				$this->numero_pagado=$newnumero_pagado;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_pagado(?int $newid_pagado)
	{
		try {
			if($this->id_pagado!==$newid_pagado) {
				if($newid_pagado===null && $newid_pagado!='') {
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna id_pagado');
				}

				if($newid_pagado!==null && filter_var($newid_pagado,FILTER_VALIDATE_INT)===false) {
					throw new Exception('documento_cuenta_pagar:No es numero entero - id_pagado='.$newid_pagado);
				}

				$this->id_pagado=$newid_pagado;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setmodulo_origen(?string $newmodulo_origen)
	{
		try {
			if($this->modulo_origen!==$newmodulo_origen) {
				if($newmodulo_origen===null && $newmodulo_origen!='') {
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna modulo_origen');
				}

				if(strlen($newmodulo_origen)>2) {
					throw new Exception('documento_cuenta_pagar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=2 en columna modulo_origen');
				}

				if(filter_var($newmodulo_origen,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('documento_cuenta_pagar:Formato incorrecto en columna modulo_origen='.$newmodulo_origen);
				}

				$this->modulo_origen=$newmodulo_origen;
				$this->setIsChanged(true);
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
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna id_origen');
				}

				if($newid_origen!==null && filter_var($newid_origen,FILTER_VALIDATE_INT)===false) {
					throw new Exception('documento_cuenta_pagar:No es numero entero - id_origen='.$newid_origen);
				}

				$this->id_origen=$newid_origen;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setmodulo_destino(?string $newmodulo_destino)
	{
		try {
			if($this->modulo_destino!==$newmodulo_destino) {
				if($newmodulo_destino===null && $newmodulo_destino!='') {
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna modulo_destino');
				}

				if(strlen($newmodulo_destino)>2) {
					throw new Exception('documento_cuenta_pagar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=2 en columna modulo_destino');
				}

				if(filter_var($newmodulo_destino,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('documento_cuenta_pagar:Formato incorrecto en columna modulo_destino='.$newmodulo_destino);
				}

				$this->modulo_destino=$newmodulo_destino;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_destino(?int $newid_destino)
	{
		try {
			if($this->id_destino!==$newid_destino) {
				if($newid_destino===null && $newid_destino!='') {
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna id_destino');
				}

				if($newid_destino!==null && filter_var($newid_destino,FILTER_VALIDATE_INT)===false) {
					throw new Exception('documento_cuenta_pagar:No es numero entero - id_destino='.$newid_destino);
				}

				$this->id_destino=$newid_destino;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnombre_pc(?string $newnombre_pc)
	{
		try {
			if($this->nombre_pc!==$newnombre_pc) {
				if($newnombre_pc===null && $newnombre_pc!='') {
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna nombre_pc');
				}

				if(strlen($newnombre_pc)>100) {
					throw new Exception('documento_cuenta_pagar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=100 en columna nombre_pc');
				}

				if(filter_var($newnombre_pc,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('documento_cuenta_pagar:Formato incorrecto en columna nombre_pc='.$newnombre_pc);
				}

				$this->nombre_pc=$newnombre_pc;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function sethora(?string $newhora)
	{
		try {
			if($this->hora!==$newhora) {
				if($newhora===null && $newhora!='') {
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna hora');
				}

				if($newhora!==null && filter_var($newhora,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('documento_cuenta_pagar:No es fecha - hora='.$newhora);
				}

				$this->hora=$newhora;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setmonto_mora(?float $newmonto_mora)
	{
		try {
			if($this->monto_mora!==$newmonto_mora) {
				if($newmonto_mora===null && $newmonto_mora!='') {
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna monto_mora');
				}

				if($newmonto_mora!=0) {
					if($newmonto_mora!==null && filter_var($newmonto_mora,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('documento_cuenta_pagar:No es numero decimal - monto_mora='.$newmonto_mora);
					}
				}

				$this->monto_mora=$newmonto_mora;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setinteres_mora(?float $newinteres_mora)
	{
		try {
			if($this->interes_mora!==$newinteres_mora) {
				if($newinteres_mora===null && $newinteres_mora!='') {
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna interes_mora');
				}

				if($newinteres_mora!=0) {
					if($newinteres_mora!==null && filter_var($newinteres_mora,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('documento_cuenta_pagar:No es numero decimal - interes_mora='.$newinteres_mora);
					}
				}

				$this->interes_mora=$newinteres_mora;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdias_gracia_mora(?int $newdias_gracia_mora)
	{
		try {
			if($this->dias_gracia_mora!==$newdias_gracia_mora) {
				if($newdias_gracia_mora===null && $newdias_gracia_mora!='') {
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna dias_gracia_mora');
				}

				if($newdias_gracia_mora!==null && filter_var($newdias_gracia_mora,FILTER_VALIDATE_INT)===false) {
					throw new Exception('documento_cuenta_pagar:No es numero entero - dias_gracia_mora='.$newdias_gracia_mora);
				}

				$this->dias_gracia_mora=$newdias_gracia_mora;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setinstrumento_pago(?string $newinstrumento_pago)
	{
		try {
			if($this->instrumento_pago!==$newinstrumento_pago) {
				if($newinstrumento_pago===null && $newinstrumento_pago!='') {
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna instrumento_pago');
				}

				if(strlen($newinstrumento_pago)>2) {
					throw new Exception('documento_cuenta_pagar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=2 en columna instrumento_pago');
				}

				if(filter_var($newinstrumento_pago,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('documento_cuenta_pagar:Formato incorrecto en columna instrumento_pago='.$newinstrumento_pago);
				}

				$this->instrumento_pago=$newinstrumento_pago;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function settipo_cambio(?float $newtipo_cambio)
	{
		try {
			if($this->tipo_cambio!==$newtipo_cambio) {
				if($newtipo_cambio===null && $newtipo_cambio!='') {
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna tipo_cambio');
				}

				if($newtipo_cambio!=0) {
					if($newtipo_cambio!==null && filter_var($newtipo_cambio,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('documento_cuenta_pagar:No es numero decimal - tipo_cambio='.$newtipo_cambio);
					}
				}

				$this->tipo_cambio=$newtipo_cambio;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnro_documento_proveedor(?string $newnro_documento_proveedor)
	{
		try {
			if($this->nro_documento_proveedor!==$newnro_documento_proveedor) {
				if($newnro_documento_proveedor===null && $newnro_documento_proveedor!='') {
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna nro_documento_proveedor');
				}

				if(strlen($newnro_documento_proveedor)>30) {
					throw new Exception('documento_cuenta_pagar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=30 en columna nro_documento_proveedor');
				}

				if(filter_var($newnro_documento_proveedor,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('documento_cuenta_pagar:Formato incorrecto en columna nro_documento_proveedor='.$newnro_documento_proveedor);
				}

				$this->nro_documento_proveedor=$newnro_documento_proveedor;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setclase_registro(?string $newclase_registro)
	{
		try {
			if($this->clase_registro!==$newclase_registro) {
				if($newclase_registro===null && $newclase_registro!='') {
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna clase_registro');
				}

				if(strlen($newclase_registro)>2) {
					throw new Exception('documento_cuenta_pagar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=2 en columna clase_registro');
				}

				if(filter_var($newclase_registro,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('documento_cuenta_pagar:Formato incorrecto en columna clase_registro='.$newclase_registro);
				}

				$this->clase_registro=$newclase_registro;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setestado_registro(?string $newestado_registro)
	{
		try {
			if($this->estado_registro!==$newestado_registro) {
				if($newestado_registro===null && $newestado_registro!='') {
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna estado_registro');
				}

				if(strlen($newestado_registro)>2) {
					throw new Exception('documento_cuenta_pagar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=2 en columna estado_registro');
				}

				if(filter_var($newestado_registro,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('documento_cuenta_pagar:Formato incorrecto en columna estado_registro='.$newestado_registro);
				}

				$this->estado_registro=$newestado_registro;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setmotivo_anulacion(?string $newmotivo_anulacion)
	{
		try {
			if($this->motivo_anulacion!==$newmotivo_anulacion) {
				if($newmotivo_anulacion===null && $newmotivo_anulacion!='') {
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna motivo_anulacion');
				}

				if(strlen($newmotivo_anulacion)>1000) {
					throw new Exception('documento_cuenta_pagar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna motivo_anulacion');
				}

				if(filter_var($newmotivo_anulacion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('documento_cuenta_pagar:Formato incorrecto en columna motivo_anulacion='.$newmotivo_anulacion);
				}

				$this->motivo_anulacion=$newmotivo_anulacion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setimpuesto_1(?float $newimpuesto_1)
	{
		try {
			if($this->impuesto_1!==$newimpuesto_1) {
				if($newimpuesto_1===null && $newimpuesto_1!='') {
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna impuesto_1');
				}

				if($newimpuesto_1!=0) {
					if($newimpuesto_1!==null && filter_var($newimpuesto_1,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('documento_cuenta_pagar:No es numero decimal - impuesto_1='.$newimpuesto_1);
					}
				}

				$this->impuesto_1=$newimpuesto_1;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setimpuesto_2(?float $newimpuesto_2)
	{
		try {
			if($this->impuesto_2!==$newimpuesto_2) {
				if($newimpuesto_2===null && $newimpuesto_2!='') {
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna impuesto_2');
				}

				if($newimpuesto_2!=0) {
					if($newimpuesto_2!==null && filter_var($newimpuesto_2,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('documento_cuenta_pagar:No es numero decimal - impuesto_2='.$newimpuesto_2);
					}
				}

				$this->impuesto_2=$newimpuesto_2;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setimpuesto_incluido(?bool $newimpuesto_incluido)
	{
		try {
			if($this->impuesto_incluido!==$newimpuesto_incluido) {
				if($newimpuesto_incluido===null && $newimpuesto_incluido!='') {
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna impuesto_incluido');
				}

				if($newimpuesto_incluido!==null && filter_var($newimpuesto_incluido,FILTER_VALIDATE_BOOLEAN)===false && $newimpuesto_incluido!==0 && $newimpuesto_incluido!==false) {
					throw new Exception('documento_cuenta_pagar:No es valor booleano - impuesto_incluido='.$newimpuesto_incluido);
				}

				$this->impuesto_incluido=$newimpuesto_incluido;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setobservaciones(?string $newobservaciones)
	{
		try {
			if($this->observaciones!==$newobservaciones) {
				if($newobservaciones===null && $newobservaciones!='') {
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna observaciones');
				}

				if(strlen($newobservaciones)>1000) {
					throw new Exception('documento_cuenta_pagar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna observaciones');
				}

				if(filter_var($newobservaciones,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('documento_cuenta_pagar:Formato incorrecto en columna observaciones='.$newobservaciones);
				}

				$this->observaciones=$newobservaciones;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setgrupo_pago(?string $newgrupo_pago)
	{
		try {
			if($this->grupo_pago!==$newgrupo_pago) {
				if($newgrupo_pago===null && $newgrupo_pago!='') {
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna grupo_pago');
				}

				if(strlen($newgrupo_pago)>100) {
					throw new Exception('documento_cuenta_pagar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=100 en columna grupo_pago');
				}

				if(filter_var($newgrupo_pago,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('documento_cuenta_pagar:Formato incorrecto en columna grupo_pago='.$newgrupo_pago);
				}

				$this->grupo_pago=$newgrupo_pago;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function settermino_idpv(?int $newtermino_idpv)
	{
		try {
			if($this->termino_idpv!==$newtermino_idpv) {
				if($newtermino_idpv===null && $newtermino_idpv!='') {
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna termino_idpv');
				}

				if($newtermino_idpv!==null && filter_var($newtermino_idpv,FILTER_VALIDATE_INT)===false) {
					throw new Exception('documento_cuenta_pagar:No es numero entero - termino_idpv='.$newtermino_idpv);
				}

				$this->termino_idpv=$newtermino_idpv;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_forma_pago_proveedor(?int $newid_forma_pago_proveedor)
	{
		try {
			if($this->id_forma_pago_proveedor!==$newid_forma_pago_proveedor) {
				if($newid_forma_pago_proveedor===null && $newid_forma_pago_proveedor!='') {
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna id_forma_pago_proveedor');
				}

				if($newid_forma_pago_proveedor!==null && filter_var($newid_forma_pago_proveedor,FILTER_VALIDATE_INT)===false) {
					throw new Exception('documento_cuenta_pagar:No es numero entero - id_forma_pago_proveedor='.$newid_forma_pago_proveedor);
				}

				$this->id_forma_pago_proveedor=$newid_forma_pago_proveedor;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_forma_pago_proveedor_Descripcion(string $newid_forma_pago_proveedor_Descripcion)
	{
		try {
			if($this->id_forma_pago_proveedor_Descripcion!=$newid_forma_pago_proveedor_Descripcion) {
				if($newid_forma_pago_proveedor_Descripcion===null && $newid_forma_pago_proveedor_Descripcion!='') {
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna id_forma_pago_proveedor');
				}

				$this->id_forma_pago_proveedor_Descripcion=$newid_forma_pago_proveedor_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnro_pago(?string $newnro_pago)
	{
		try {
			if($this->nro_pago!==$newnro_pago) {
				if($newnro_pago===null && $newnro_pago!='') {
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna nro_pago');
				}

				if(strlen($newnro_pago)>30) {
					throw new Exception('documento_cuenta_pagar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=30 en columna nro_pago');
				}

				if(filter_var($newnro_pago,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('documento_cuenta_pagar:Formato incorrecto en columna nro_pago='.$newnro_pago);
				}

				$this->nro_pago=$newnro_pago;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setreferencia_pago(?string $newreferencia_pago)
	{
		try {
			if($this->referencia_pago!==$newreferencia_pago) {
				if($newreferencia_pago===null && $newreferencia_pago!='') {
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna referencia_pago');
				}

				if(strlen($newreferencia_pago)>80) {
					throw new Exception('documento_cuenta_pagar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=80 en columna referencia_pago');
				}

				if(filter_var($newreferencia_pago,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('documento_cuenta_pagar:Formato incorrecto en columna referencia_pago='.$newreferencia_pago);
				}

				$this->referencia_pago=$newreferencia_pago;
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
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna fecha_hora');
				}

				if($newfecha_hora!==null && filter_var($newfecha_hora,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('documento_cuenta_pagar:No es fecha - fecha_hora='.$newfecha_hora);
				}

				$this->fecha_hora=$newfecha_hora;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_base(?int $newid_base)
	{
		try {
			if($this->id_base!==$newid_base) {
				if($newid_base===null && $newid_base!='') {
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna id_base');
				}

				if($newid_base!==null && filter_var($newid_base,FILTER_VALIDATE_INT)===false) {
					throw new Exception('documento_cuenta_pagar:No es numero entero - id_base='.$newid_base);
				}

				$this->id_base=$newid_base;
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
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna id_cuenta_corriente');
				}

				if($newid_cuenta_corriente!==null && filter_var($newid_cuenta_corriente,FILTER_VALIDATE_INT)===false) {
					throw new Exception('documento_cuenta_pagar:No es numero entero - id_cuenta_corriente='.$newid_cuenta_corriente);
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
					throw new Exception('documento_cuenta_pagar:Valor nulo no permitido en columna id_cuenta_corriente');
				}

				$this->id_cuenta_corriente_Descripcion=$newid_cuenta_corriente_Descripcion;
				//$this->setIsChanged(true);
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

	public function getproveedor() : ?proveedor {
		return $this->proveedor;
	}

	public function getforma_pago_proveedor() : ?forma_pago_proveedor {
		return $this->forma_pago_proveedor;
	}

	public function getcuenta_corriente() : ?cuenta_corriente {
		return $this->cuenta_corriente;
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


	public  function  setproveedor(?proveedor $proveedor) {
		try {
			$this->proveedor=$proveedor;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setforma_pago_proveedor(?forma_pago_proveedor $forma_pago_proveedor) {
		try {
			$this->forma_pago_proveedor=$forma_pago_proveedor;
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
	
	public function getorden_compras() : array {
		return $this->ordencompras;
	}

	public function getimagen_documento_cuenta_pagars() : array {
		return $this->imagendocumentocuentapagars;
	}

	public function getdevolucions() : array {
		return $this->devolucions;
	}

	
	
	public  function  setorden_compras(array $ordencompras) {
		try {
			$this->ordencompras=$ordencompras;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setimagen_documento_cuenta_pagars(array $imagendocumentocuentapagars) {
		try {
			$this->imagendocumentocuentapagars=$imagendocumentocuentapagars;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setdevolucions(array $devolucions) {
		try {
			$this->devolucions=$devolucions;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_documento_cuenta_pagarValue(string $sKey,$oValue) {
		$this->map_documento_cuenta_pagar[$sKey]=$oValue;
	}
	
	public function getMap_documento_cuenta_pagarValue(string $sKey) {
		return $this->map_documento_cuenta_pagar[$sKey];
	}
	
	public function getdocumento_cuenta_pagar_Original() : ?documento_cuenta_pagar {
		return $this->documento_cuenta_pagar_Original;
	}
	
	public function setdocumento_cuenta_pagar_Original(documento_cuenta_pagar $documento_cuenta_pagar) {
		try {
			$this->documento_cuenta_pagar_Original=$documento_cuenta_pagar;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_documento_cuenta_pagar() : array {
		return $this->map_documento_cuenta_pagar;
	}

	public function setMap_documento_cuenta_pagar(array $map_documento_cuenta_pagar) {
		$this->map_documento_cuenta_pagar = $map_documento_cuenta_pagar;
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
