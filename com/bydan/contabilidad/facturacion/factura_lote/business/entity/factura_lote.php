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
namespace com\bydan\contabilidad\facturacion\factura_lote\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;
use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;
use com\bydan\contabilidad\contabilidad\moneda\business\entity\moneda;
use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\entity\documento_cuenta_cobrar;
use com\bydan\contabilidad\inventario\kardex\business\entity\kardex;

class factura_lote extends GeneralEntity {

	/*GENERAL*/
	public static string $class='factura_lote';
	
	/*AUXILIARES*/
	public ?factura_lote $factura_lote_Original=null;	
	public ?GeneralEntity $factura_lote_Additional=null;
	public array $map_factura_lote=array();	
		
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
	public int $id_cliente = -1;
	public string $id_cliente_Descripcion = '';

	public string $ruc = '';
	public string $referencia_cliente = '';
	public string $fecha_emision = '';
	public int $id_vendedor = -1;
	public string $id_vendedor_Descripcion = '';

	public int $id_termino_pago = -1;
	public string $id_termino_pago_Descripcion = '';

	public string $fecha_vence = '';
	public float $cotizacion = 0.0;
	public int $id_moneda = -1;
	public string $id_moneda_Descripcion = '';

	public int $id_estado = -1;
	public string $id_estado_Descripcion = '';

	public string $direccion = '';
	public string $enviar_a = '';
	public string $observacion = '';
	public bool $impuesto_en_precio = false;
	public float $sub_total = 0.0;
	public float $descuento_monto = 0.0;
	public float $descuento_porciento = 0.0;
	public float $iva_monto = 0.0;
	public float $iva_porciento = 0.0;
	public float $retencion_fuente_monto = 0.0;
	public float $retencion_fuente_porciento = 0.0;
	public float $retencion_iva_monto = 0.0;
	public float $retencion_iva_porciento = 0.0;
	public float $total = 0.0;
	public float $otro_monto = 0.0;
	public float $otro_porciento = 0.0;
	public string $hora = '';
	public float $retencion_ica_monto = 0.0;
	public float $retencion_ica_porciento = 0.0;
	public ?int $id_asiento = null;
	public string $id_asiento_Descripcion = '';

	public ?int $id_documento_cuenta_cobrar = null;
	public string $id_documento_cuenta_cobrar_Descripcion = '';

	public ?int $id_kardex = null;
	public string $id_kardex_Descripcion = '';

	
	/*FKs*/
	
	public ?empresa $empresa = null;
	public ?sucursal $sucursal = null;
	public ?ejercicio $ejercicio = null;
	public ?periodo $periodo = null;
	public ?usuario $usuario = null;
	public ?cliente $cliente = null;
	public ?vendedor $vendedor = null;
	public ?termino_pago_cliente $termino_pago = null;
	public ?moneda $moneda = null;
	public ?estado $estado = null;
	public ?asiento $asiento = null;
	public ?documento_cuenta_cobrar $documento_cuenta_cobrar = null;
	public ?kardex $kardex = null;
	
	/*RELACIONES*/
	
	public array $facturalotedetalles = array();
	public array $facturamodelos = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->factura_lote_Original=$this;
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
 		$this->id_cliente=-1;
		$this->id_cliente_Descripcion='';

 		$this->ruc='';
 		$this->referencia_cliente='';
 		$this->fecha_emision=date('Y-m-d');
 		$this->id_vendedor=-1;
		$this->id_vendedor_Descripcion='';

 		$this->id_termino_pago=-1;
		$this->id_termino_pago_Descripcion='';

 		$this->fecha_vence=date('Y-m-d');
 		$this->cotizacion=0.0;
 		$this->id_moneda=-1;
		$this->id_moneda_Descripcion='';

 		$this->id_estado=-1;
		$this->id_estado_Descripcion='';

 		$this->direccion='';
 		$this->enviar_a='';
 		$this->observacion='';
 		$this->impuesto_en_precio=false;
 		$this->sub_total=0.0;
 		$this->descuento_monto=0.0;
 		$this->descuento_porciento=0.0;
 		$this->iva_monto=0.0;
 		$this->iva_porciento=0.0;
 		$this->retencion_fuente_monto=0.0;
 		$this->retencion_fuente_porciento=0.0;
 		$this->retencion_iva_monto=0.0;
 		$this->retencion_iva_porciento=0.0;
 		$this->total=0.0;
 		$this->otro_monto=0.0;
 		$this->otro_porciento=0.0;
 		$this->hora=date('Y-m-d');
 		$this->retencion_ica_monto=0.0;
 		$this->retencion_ica_porciento=0.0;
 		$this->id_asiento=null;
		$this->id_asiento_Descripcion='';

 		$this->id_documento_cuenta_cobrar=null;
		$this->id_documento_cuenta_cobrar_Descripcion='';

 		$this->id_kardex=null;
		$this->id_kardex_Descripcion='';

		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
			$this->sucursal=new sucursal();
			$this->ejercicio=new ejercicio();
			$this->periodo=new periodo();
			$this->usuario=new usuario();
			$this->cliente=new cliente();
			$this->vendedor=new vendedor();
			$this->termino_pago=new termino_pago_cliente();
			$this->moneda=new moneda();
			$this->estado=new estado();
			$this->asiento=new asiento();
			$this->documento_cuenta_cobrar=new documento_cuenta_cobrar();
			$this->kardex=new kardex();
		}
		
		/*RELACIONES*/
		
		$this->facturalotedetalles=array();
		$this->facturamodelos=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->factura_lote_Additional=new factura_lote_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_factura_lote() {
		$this->map_factura_lote = array();
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
    
	public function  getid_cliente() : ?int {
		return $this->id_cliente;
	}
	
	public function  getid_cliente_Descripcion() : string {
		return $this->id_cliente_Descripcion;
	}
    
	public function  getruc() : ?string {
		return $this->ruc;
	}
    
	public function  getreferencia_cliente() : ?string {
		return $this->referencia_cliente;
	}
    
	public function  getfecha_emision() : ?string {
		return $this->fecha_emision;
	}
    
	public function  getid_vendedor() : ?int {
		return $this->id_vendedor;
	}
	
	public function  getid_vendedor_Descripcion() : string {
		return $this->id_vendedor_Descripcion;
	}
    
	public function  getid_termino_pago() : ?int {
		return $this->id_termino_pago;
	}
	
	public function  getid_termino_pago_Descripcion() : string {
		return $this->id_termino_pago_Descripcion;
	}
    
	public function  getfecha_vence() : ?string {
		return $this->fecha_vence;
	}
    
	public function  getcotizacion() : ?float {
		return $this->cotizacion;
	}
    
	public function  getid_moneda() : ?int {
		return $this->id_moneda;
	}
	
	public function  getid_moneda_Descripcion() : string {
		return $this->id_moneda_Descripcion;
	}
    
	public function  getid_estado() : ?int {
		return $this->id_estado;
	}
	
	public function  getid_estado_Descripcion() : string {
		return $this->id_estado_Descripcion;
	}
    
	public function  getdireccion() : ?string {
		return $this->direccion;
	}
    
	public function  getenviar_a() : ?string {
		return $this->enviar_a;
	}
    
	public function  getobservacion() : ?string {
		return $this->observacion;
	}
    
	public function  getimpuesto_en_precio() : ?bool {
		return $this->impuesto_en_precio;
	}
    
	public function  getsub_total() : ?float {
		return $this->sub_total;
	}
    
	public function  getdescuento_monto() : ?float {
		return $this->descuento_monto;
	}
    
	public function  getdescuento_porciento() : ?float {
		return $this->descuento_porciento;
	}
    
	public function  getiva_monto() : ?float {
		return $this->iva_monto;
	}
    
	public function  getiva_porciento() : ?float {
		return $this->iva_porciento;
	}
    
	public function  getretencion_fuente_monto() : ?float {
		return $this->retencion_fuente_monto;
	}
    
	public function  getretencion_fuente_porciento() : ?float {
		return $this->retencion_fuente_porciento;
	}
    
	public function  getretencion_iva_monto() : ?float {
		return $this->retencion_iva_monto;
	}
    
	public function  getretencion_iva_porciento() : ?float {
		return $this->retencion_iva_porciento;
	}
    
	public function  gettotal() : ?float {
		return $this->total;
	}
    
	public function  getotro_monto() : ?float {
		return $this->otro_monto;
	}
    
	public function  getotro_porciento() : ?float {
		return $this->otro_porciento;
	}
    
	public function  gethora() : ?string {
		return $this->hora;
	}
    
	public function  getretencion_ica_monto() : ?float {
		return $this->retencion_ica_monto;
	}
    
	public function  getretencion_ica_porciento() : ?float {
		return $this->retencion_ica_porciento;
	}
    
	public function  getid_asiento() : ?int {
		return $this->id_asiento;
	}
	
	public function  getid_asiento_Descripcion() : string {
		return $this->id_asiento_Descripcion;
	}
    
	public function  getid_documento_cuenta_cobrar() : ?int {
		return $this->id_documento_cuenta_cobrar;
	}
	
	public function  getid_documento_cuenta_cobrar_Descripcion() : string {
		return $this->id_documento_cuenta_cobrar_Descripcion;
	}
    
	public function  getid_kardex() : ?int {
		return $this->id_kardex;
	}
	
	public function  getid_kardex_Descripcion() : string {
		return $this->id_kardex_Descripcion;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('factura_lote:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('factura_lote:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('factura_lote:Valor nulo no permitido en columna id_empresa');
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
					throw new Exception('factura_lote:Valor nulo no permitido en columna id_sucursal');
				}

				if($newid_sucursal!==null && filter_var($newid_sucursal,FILTER_VALIDATE_INT)===false) {
					throw new Exception('factura_lote:No es numero entero - id_sucursal='.$newid_sucursal);
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
					throw new Exception('factura_lote:Valor nulo no permitido en columna id_sucursal');
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
					throw new Exception('factura_lote:Valor nulo no permitido en columna id_ejercicio');
				}

				if($newid_ejercicio!==null && filter_var($newid_ejercicio,FILTER_VALIDATE_INT)===false) {
					throw new Exception('factura_lote:No es numero entero - id_ejercicio='.$newid_ejercicio);
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
					throw new Exception('factura_lote:Valor nulo no permitido en columna id_ejercicio');
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
					throw new Exception('factura_lote:Valor nulo no permitido en columna id_periodo');
				}

				if($newid_periodo!==null && filter_var($newid_periodo,FILTER_VALIDATE_INT)===false) {
					throw new Exception('factura_lote:No es numero entero - id_periodo='.$newid_periodo);
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
					throw new Exception('factura_lote:Valor nulo no permitido en columna id_periodo');
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
					throw new Exception('factura_lote:Valor nulo no permitido en columna id_usuario');
				}

				if($newid_usuario!==null && filter_var($newid_usuario,FILTER_VALIDATE_INT)===false) {
					throw new Exception('factura_lote:No es numero entero - id_usuario='.$newid_usuario);
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
					throw new Exception('factura_lote:Valor nulo no permitido en columna id_usuario');
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
					throw new Exception('factura_lote:Valor nulo no permitido en columna numero');
				}

				if(strlen($newnumero)>10) {
					throw new Exception('factura_lote:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=10 en columna numero');
				}

				if(filter_var($newnumero,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('factura_lote:Formato incorrecto en columna numero='.$newnumero);
				}

				$this->numero=$newnumero;
				$this->setIsChanged(true);
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
					throw new Exception('factura_lote:Valor nulo no permitido en columna id_cliente');
				}

				if($newid_cliente!==null && filter_var($newid_cliente,FILTER_VALIDATE_INT)===false) {
					throw new Exception('factura_lote:No es numero entero - id_cliente='.$newid_cliente);
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
					throw new Exception('factura_lote:Valor nulo no permitido en columna id_cliente');
				}

				$this->id_cliente_Descripcion=$newid_cliente_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setruc(?string $newruc)
	{
		try {
			if($this->ruc!==$newruc) {
				if($newruc===null && $newruc!='') {
					throw new Exception('factura_lote:Valor nulo no permitido en columna ruc');
				}

				if(strlen($newruc)>250) {
					throw new Exception('factura_lote:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=250 en columna ruc');
				}

				if(filter_var($newruc,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('factura_lote:Formato incorrecto en columna ruc='.$newruc);
				}

				$this->ruc=$newruc;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setreferencia_cliente(?string $newreferencia_cliente) {
		if($this->referencia_cliente!==$newreferencia_cliente) {

				if(strlen($newreferencia_cliente)>20) {
					try {
						throw new Exception('factura_lote:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=referencia_cliente en columna referencia_cliente');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newreferencia_cliente,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('factura_lote:Formato incorrecto en la columna referencia_cliente='.$newreferencia_cliente);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->referencia_cliente=$newreferencia_cliente;
			$this->setIsChanged(true);
		}
	}
    
	public function setfecha_emision(?string $newfecha_emision)
	{
		try {
			if($this->fecha_emision!==$newfecha_emision) {
				if($newfecha_emision===null && $newfecha_emision!='') {
					throw new Exception('factura_lote:Valor nulo no permitido en columna fecha_emision');
				}

				if($newfecha_emision!==null && filter_var($newfecha_emision,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('factura_lote:No es fecha - fecha_emision='.$newfecha_emision);
				}

				$this->fecha_emision=$newfecha_emision;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_vendedor(?int $newid_vendedor)
	{
		try {
			if($this->id_vendedor!==$newid_vendedor) {
				if($newid_vendedor===null && $newid_vendedor!='') {
					throw new Exception('factura_lote:Valor nulo no permitido en columna id_vendedor');
				}

				if($newid_vendedor!==null && filter_var($newid_vendedor,FILTER_VALIDATE_INT)===false) {
					throw new Exception('factura_lote:No es numero entero - id_vendedor='.$newid_vendedor);
				}

				$this->id_vendedor=$newid_vendedor;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_vendedor_Descripcion(string $newid_vendedor_Descripcion)
	{
		try {
			if($this->id_vendedor_Descripcion!=$newid_vendedor_Descripcion) {
				if($newid_vendedor_Descripcion===null && $newid_vendedor_Descripcion!='') {
					throw new Exception('factura_lote:Valor nulo no permitido en columna id_vendedor');
				}

				$this->id_vendedor_Descripcion=$newid_vendedor_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_termino_pago(?int $newid_termino_pago)
	{
		try {
			if($this->id_termino_pago!==$newid_termino_pago) {
				if($newid_termino_pago===null && $newid_termino_pago!='') {
					throw new Exception('factura_lote:Valor nulo no permitido en columna id_termino_pago');
				}

				if($newid_termino_pago!==null && filter_var($newid_termino_pago,FILTER_VALIDATE_INT)===false) {
					throw new Exception('factura_lote:No es numero entero - id_termino_pago='.$newid_termino_pago);
				}

				$this->id_termino_pago=$newid_termino_pago;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_termino_pago_Descripcion(string $newid_termino_pago_Descripcion)
	{
		try {
			if($this->id_termino_pago_Descripcion!=$newid_termino_pago_Descripcion) {
				if($newid_termino_pago_Descripcion===null && $newid_termino_pago_Descripcion!='') {
					throw new Exception('factura_lote:Valor nulo no permitido en columna id_termino_pago');
				}

				$this->id_termino_pago_Descripcion=$newid_termino_pago_Descripcion;
				//$this->setIsChanged(true);
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
					throw new Exception('factura_lote:Valor nulo no permitido en columna fecha_vence');
				}

				if($newfecha_vence!==null && filter_var($newfecha_vence,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('factura_lote:No es fecha - fecha_vence='.$newfecha_vence);
				}

				$this->fecha_vence=$newfecha_vence;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcotizacion(?float $newcotizacion)
	{
		try {
			if($this->cotizacion!==$newcotizacion) {
				if($newcotizacion===null && $newcotizacion!='') {
					throw new Exception('factura_lote:Valor nulo no permitido en columna cotizacion');
				}

				if($newcotizacion!=0) {
					if($newcotizacion!==null && filter_var($newcotizacion,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('factura_lote:No es numero decimal - cotizacion='.$newcotizacion);
					}
				}

				$this->cotizacion=$newcotizacion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_moneda(?int $newid_moneda)
	{
		try {
			if($this->id_moneda!==$newid_moneda) {
				if($newid_moneda===null && $newid_moneda!='') {
					throw new Exception('factura_lote:Valor nulo no permitido en columna id_moneda');
				}

				if($newid_moneda!==null && filter_var($newid_moneda,FILTER_VALIDATE_INT)===false) {
					throw new Exception('factura_lote:No es numero entero - id_moneda='.$newid_moneda);
				}

				$this->id_moneda=$newid_moneda;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_moneda_Descripcion(string $newid_moneda_Descripcion)
	{
		try {
			if($this->id_moneda_Descripcion!=$newid_moneda_Descripcion) {
				if($newid_moneda_Descripcion===null && $newid_moneda_Descripcion!='') {
					throw new Exception('factura_lote:Valor nulo no permitido en columna id_moneda');
				}

				$this->id_moneda_Descripcion=$newid_moneda_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_estado(?int $newid_estado)
	{
		try {
			if($this->id_estado!==$newid_estado) {
				if($newid_estado===null && $newid_estado!='') {
					throw new Exception('factura_lote:Valor nulo no permitido en columna id_estado');
				}

				if($newid_estado!==null && filter_var($newid_estado,FILTER_VALIDATE_INT)===false) {
					throw new Exception('factura_lote:No es numero entero - id_estado='.$newid_estado);
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
					throw new Exception('factura_lote:Valor nulo no permitido en columna id_estado');
				}

				$this->id_estado_Descripcion=$newid_estado_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdireccion(?string $newdireccion) {
		if($this->direccion!==$newdireccion) {

				if(strlen($newdireccion)>80) {
					try {
						throw new Exception('factura_lote:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=direccion en columna direccion');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newdireccion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('factura_lote:Formato incorrecto en la columna direccion='.$newdireccion);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->direccion=$newdireccion;
			$this->setIsChanged(true);
		}
	}
    
	public function setenviar_a(?string $newenviar_a) {
		if($this->enviar_a!==$newenviar_a) {

				if(strlen($newenviar_a)>250) {
					try {
						throw new Exception('factura_lote:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=enviar_a en columna enviar_a');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newenviar_a,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('factura_lote:Formato incorrecto en la columna enviar_a='.$newenviar_a);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->enviar_a=$newenviar_a;
			$this->setIsChanged(true);
		}
	}
    
	public function setobservacion(?string $newobservacion) {
		if($this->observacion!==$newobservacion) {

				if(strlen($newobservacion)>1000) {
					try {
						throw new Exception('factura_lote:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=observacion en columna observacion');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newobservacion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('factura_lote:Formato incorrecto en la columna observacion='.$newobservacion);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->observacion=$newobservacion;
			$this->setIsChanged(true);
		}
	}
    
	public function setimpuesto_en_precio(?bool $newimpuesto_en_precio)
	{
		try {
			if($this->impuesto_en_precio!==$newimpuesto_en_precio) {
				if($newimpuesto_en_precio===null && $newimpuesto_en_precio!='') {
					throw new Exception('factura_lote:Valor nulo no permitido en columna impuesto_en_precio');
				}

				if($newimpuesto_en_precio!==null && filter_var($newimpuesto_en_precio,FILTER_VALIDATE_BOOLEAN)===false && $newimpuesto_en_precio!==0 && $newimpuesto_en_precio!==false) {
					throw new Exception('factura_lote:No es valor booleano - impuesto_en_precio='.$newimpuesto_en_precio);
				}

				$this->impuesto_en_precio=$newimpuesto_en_precio;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setsub_total(?float $newsub_total)
	{
		try {
			if($this->sub_total!==$newsub_total) {
				if($newsub_total===null && $newsub_total!='') {
					throw new Exception('factura_lote:Valor nulo no permitido en columna sub_total');
				}

				if($newsub_total!=0) {
					if($newsub_total!==null && filter_var($newsub_total,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('factura_lote:No es numero decimal - sub_total='.$newsub_total);
					}
				}

				$this->sub_total=$newsub_total;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdescuento_monto(?float $newdescuento_monto)
	{
		try {
			if($this->descuento_monto!==$newdescuento_monto) {
				if($newdescuento_monto===null && $newdescuento_monto!='') {
					throw new Exception('factura_lote:Valor nulo no permitido en columna descuento_monto');
				}

				if($newdescuento_monto!=0) {
					if($newdescuento_monto!==null && filter_var($newdescuento_monto,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('factura_lote:No es numero decimal - descuento_monto='.$newdescuento_monto);
					}
				}

				$this->descuento_monto=$newdescuento_monto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdescuento_porciento(?float $newdescuento_porciento)
	{
		try {
			if($this->descuento_porciento!==$newdescuento_porciento) {
				if($newdescuento_porciento===null && $newdescuento_porciento!='') {
					throw new Exception('factura_lote:Valor nulo no permitido en columna descuento_porciento');
				}

				if($newdescuento_porciento!=0) {
					if($newdescuento_porciento!==null && filter_var($newdescuento_porciento,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('factura_lote:No es numero decimal - descuento_porciento='.$newdescuento_porciento);
					}
				}

				$this->descuento_porciento=$newdescuento_porciento;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setiva_monto(?float $newiva_monto)
	{
		try {
			if($this->iva_monto!==$newiva_monto) {
				if($newiva_monto===null && $newiva_monto!='') {
					throw new Exception('factura_lote:Valor nulo no permitido en columna iva_monto');
				}

				if($newiva_monto!=0) {
					if($newiva_monto!==null && filter_var($newiva_monto,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('factura_lote:No es numero decimal - iva_monto='.$newiva_monto);
					}
				}

				$this->iva_monto=$newiva_monto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setiva_porciento(?float $newiva_porciento)
	{
		try {
			if($this->iva_porciento!==$newiva_porciento) {
				if($newiva_porciento===null && $newiva_porciento!='') {
					throw new Exception('factura_lote:Valor nulo no permitido en columna iva_porciento');
				}

				if($newiva_porciento!=0) {
					if($newiva_porciento!==null && filter_var($newiva_porciento,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('factura_lote:No es numero decimal - iva_porciento='.$newiva_porciento);
					}
				}

				$this->iva_porciento=$newiva_porciento;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setretencion_fuente_monto(?float $newretencion_fuente_monto)
	{
		try {
			if($this->retencion_fuente_monto!==$newretencion_fuente_monto) {
				if($newretencion_fuente_monto===null && $newretencion_fuente_monto!='') {
					throw new Exception('factura_lote:Valor nulo no permitido en columna retencion_fuente_monto');
				}

				if($newretencion_fuente_monto!=0) {
					if($newretencion_fuente_monto!==null && filter_var($newretencion_fuente_monto,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('factura_lote:No es numero decimal - retencion_fuente_monto='.$newretencion_fuente_monto);
					}
				}

				$this->retencion_fuente_monto=$newretencion_fuente_monto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setretencion_fuente_porciento(?float $newretencion_fuente_porciento)
	{
		try {
			if($this->retencion_fuente_porciento!==$newretencion_fuente_porciento) {
				if($newretencion_fuente_porciento===null && $newretencion_fuente_porciento!='') {
					throw new Exception('factura_lote:Valor nulo no permitido en columna retencion_fuente_porciento');
				}

				if($newretencion_fuente_porciento!=0) {
					if($newretencion_fuente_porciento!==null && filter_var($newretencion_fuente_porciento,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('factura_lote:No es numero decimal - retencion_fuente_porciento='.$newretencion_fuente_porciento);
					}
				}

				$this->retencion_fuente_porciento=$newretencion_fuente_porciento;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setretencion_iva_monto(?float $newretencion_iva_monto)
	{
		try {
			if($this->retencion_iva_monto!==$newretencion_iva_monto) {
				if($newretencion_iva_monto===null && $newretencion_iva_monto!='') {
					throw new Exception('factura_lote:Valor nulo no permitido en columna retencion_iva_monto');
				}

				if($newretencion_iva_monto!=0) {
					if($newretencion_iva_monto!==null && filter_var($newretencion_iva_monto,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('factura_lote:No es numero decimal - retencion_iva_monto='.$newretencion_iva_monto);
					}
				}

				$this->retencion_iva_monto=$newretencion_iva_monto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setretencion_iva_porciento(?float $newretencion_iva_porciento)
	{
		try {
			if($this->retencion_iva_porciento!==$newretencion_iva_porciento) {
				if($newretencion_iva_porciento===null && $newretencion_iva_porciento!='') {
					throw new Exception('factura_lote:Valor nulo no permitido en columna retencion_iva_porciento');
				}

				if($newretencion_iva_porciento!=0) {
					if($newretencion_iva_porciento!==null && filter_var($newretencion_iva_porciento,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('factura_lote:No es numero decimal - retencion_iva_porciento='.$newretencion_iva_porciento);
					}
				}

				$this->retencion_iva_porciento=$newretencion_iva_porciento;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function settotal(?float $newtotal)
	{
		try {
			if($this->total!==$newtotal) {
				if($newtotal===null && $newtotal!='') {
					throw new Exception('factura_lote:Valor nulo no permitido en columna total');
				}

				if($newtotal!=0) {
					if($newtotal!==null && filter_var($newtotal,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('factura_lote:No es numero decimal - total='.$newtotal);
					}
				}

				$this->total=$newtotal;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setotro_monto(?float $newotro_monto)
	{
		try {
			if($this->otro_monto!==$newotro_monto) {
				if($newotro_monto===null && $newotro_monto!='') {
					throw new Exception('factura_lote:Valor nulo no permitido en columna otro_monto');
				}

				if($newotro_monto!=0) {
					if($newotro_monto!==null && filter_var($newotro_monto,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('factura_lote:No es numero decimal - otro_monto='.$newotro_monto);
					}
				}

				$this->otro_monto=$newotro_monto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setotro_porciento(?float $newotro_porciento)
	{
		try {
			if($this->otro_porciento!==$newotro_porciento) {
				if($newotro_porciento===null && $newotro_porciento!='') {
					throw new Exception('factura_lote:Valor nulo no permitido en columna otro_porciento');
				}

				if($newotro_porciento!=0) {
					if($newotro_porciento!==null && filter_var($newotro_porciento,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('factura_lote:No es numero decimal - otro_porciento='.$newotro_porciento);
					}
				}

				$this->otro_porciento=$newotro_porciento;
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
					throw new Exception('factura_lote:Valor nulo no permitido en columna hora');
				}

				if($newhora!==null && filter_var($newhora,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('factura_lote:No es fecha - hora='.$newhora);
				}

				$this->hora=$newhora;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setretencion_ica_monto(?float $newretencion_ica_monto)
	{
		try {
			if($this->retencion_ica_monto!==$newretencion_ica_monto) {
				if($newretencion_ica_monto===null && $newretencion_ica_monto!='') {
					throw new Exception('factura_lote:Valor nulo no permitido en columna retencion_ica_monto');
				}

				if($newretencion_ica_monto!=0) {
					if($newretencion_ica_monto!==null && filter_var($newretencion_ica_monto,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('factura_lote:No es numero decimal - retencion_ica_monto='.$newretencion_ica_monto);
					}
				}

				$this->retencion_ica_monto=$newretencion_ica_monto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setretencion_ica_porciento(?float $newretencion_ica_porciento)
	{
		try {
			if($this->retencion_ica_porciento!==$newretencion_ica_porciento) {
				if($newretencion_ica_porciento===null && $newretencion_ica_porciento!='') {
					throw new Exception('factura_lote:Valor nulo no permitido en columna retencion_ica_porciento');
				}

				if($newretencion_ica_porciento!=0) {
					if($newretencion_ica_porciento!==null && filter_var($newretencion_ica_porciento,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('factura_lote:No es numero decimal - retencion_ica_porciento='.$newretencion_ica_porciento);
					}
				}

				$this->retencion_ica_porciento=$newretencion_ica_porciento;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_asiento(?int $newid_asiento) {
		if($this->id_asiento!==$newid_asiento) {

				if($newid_asiento!==null && filter_var($newid_asiento,FILTER_VALIDATE_INT)===false) {
					throw new Exception('factura_lote:No es numero entero - id_asiento');
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
    
	public function setid_documento_cuenta_cobrar(?int $newid_documento_cuenta_cobrar) {
		if($this->id_documento_cuenta_cobrar!==$newid_documento_cuenta_cobrar) {

				if($newid_documento_cuenta_cobrar!==null && filter_var($newid_documento_cuenta_cobrar,FILTER_VALIDATE_INT)===false) {
					throw new Exception('factura_lote:No es numero entero - id_documento_cuenta_cobrar');
				}

			$this->id_documento_cuenta_cobrar=$newid_documento_cuenta_cobrar;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_documento_cuenta_cobrar_Descripcion(string $newid_documento_cuenta_cobrar_Descripcion) {
		if($this->id_documento_cuenta_cobrar_Descripcion!=$newid_documento_cuenta_cobrar_Descripcion) {

			$this->id_documento_cuenta_cobrar_Descripcion=$newid_documento_cuenta_cobrar_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function setid_kardex(?int $newid_kardex) {
		if($this->id_kardex!==$newid_kardex) {

				if($newid_kardex!==null && filter_var($newid_kardex,FILTER_VALIDATE_INT)===false) {
					throw new Exception('factura_lote:No es numero entero - id_kardex');
				}

			$this->id_kardex=$newid_kardex;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_kardex_Descripcion(string $newid_kardex_Descripcion) {
		if($this->id_kardex_Descripcion!=$newid_kardex_Descripcion) {

			$this->id_kardex_Descripcion=$newid_kardex_Descripcion;
			//$this->setIsChanged(true);
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

	public function getcliente() : ?cliente {
		return $this->cliente;
	}

	public function getvendedor() : ?vendedor {
		return $this->vendedor;
	}

	public function gettermino_pago() : ?termino_pago_cliente {
		return $this->termino_pago;
	}

	public function getmoneda() : ?moneda {
		return $this->moneda;
	}

	public function getestado() : ?estado {
		return $this->estado;
	}

	public function getasiento() : ?asiento {
		return $this->asiento;
	}

	public function getdocumento_cuenta_cobrar() : ?documento_cuenta_cobrar {
		return $this->documento_cuenta_cobrar;
	}

	public function getkardex() : ?kardex {
		return $this->kardex;
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


	public  function  setcliente(?cliente $cliente) {
		try {
			$this->cliente=$cliente;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setvendedor(?vendedor $vendedor) {
		try {
			$this->vendedor=$vendedor;
		} catch(Exception $e) {
			;
		}
	}


	public  function  settermino_pago(?termino_pago_cliente $termino_pago) {
		try {
			$this->termino_pago=$termino_pago;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setmoneda(?moneda $moneda) {
		try {
			$this->moneda=$moneda;
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


	public  function  setdocumento_cuenta_cobrar(?documento_cuenta_cobrar $documento_cuenta_cobrar) {
		try {
			$this->documento_cuenta_cobrar=$documento_cuenta_cobrar;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setkardex(?kardex $kardex) {
		try {
			$this->kardex=$kardex;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	public function getfactura_lote_detalles() : array {
		return $this->facturalotedetalles;
	}

	public function getfactura_modelos() : array {
		return $this->facturamodelos;
	}

	
	
	public  function  setfactura_lote_detalles(array $facturalotedetalles) {
		try {
			$this->facturalotedetalles=$facturalotedetalles;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setfactura_modelos(array $facturamodelos) {
		try {
			$this->facturamodelos=$facturamodelos;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_factura_loteValue(string $sKey,$oValue) {
		$this->map_factura_lote[$sKey]=$oValue;
	}
	
	public function getMap_factura_loteValue(string $sKey) {
		return $this->map_factura_lote[$sKey];
	}
	
	public function getfactura_lote_Original() : ?factura_lote {
		return $this->factura_lote_Original;
	}
	
	public function setfactura_lote_Original(factura_lote $factura_lote) {
		try {
			$this->factura_lote_Original=$factura_lote;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_factura_lote() : array {
		return $this->map_factura_lote;
	}

	public function setMap_factura_lote(array $map_factura_lote) {
		$this->map_factura_lote = $map_factura_lote;
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
