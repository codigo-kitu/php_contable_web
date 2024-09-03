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
namespace com\bydan\contabilidad\cuentascobrar\cliente\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\tipo_persona\business\entity\tipo_persona;
use com\bydan\contabilidad\inventario\tipo_precio\business\entity\tipo_precio;
use com\bydan\contabilidad\seguridad\pais\business\entity\pais;
use com\bydan\contabilidad\seguridad\provincia\business\entity\provincia;
use com\bydan\contabilidad\seguridad\ciudad\business\entity\ciudad;
use com\bydan\contabilidad\facturacion\vendedor\business\entity\vendedor;
use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\facturacion\impuesto\business\entity\impuesto;
use com\bydan\contabilidad\facturacion\retencion\business\entity\retencion;
use com\bydan\contabilidad\facturacion\retencion_fuente\business\entity\retencion_fuente;
use com\bydan\contabilidad\facturacion\retencion_ica\business\entity\retencion_ica;
use com\bydan\contabilidad\facturacion\otro_impuesto\business\entity\otro_impuesto;

class cliente extends GeneralEntity {

	/*GENERAL*/
	public static string $class='cliente';
	
	/*AUXILIARES*/
	public ?cliente $cliente_Original=null;	
	public ?GeneralEntity $cliente_Additional=null;
	public array $map_cliente=array();	
		
	/*CAMPOS*/
	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public int $id_tipo_persona = -1;
	public string $id_tipo_persona_Descripcion = '';

	public int $id_categoria_cliente = -1;
	public string $id_categoria_cliente_Descripcion = '';

	public int $id_tipo_precio = -1;
	public string $id_tipo_precio_Descripcion = '';

	public int $id_giro_negocio_cliente = -1;
	public string $id_giro_negocio_cliente_Descripcion = '';

	public string $codigo = '';
	public string $ruc = '';
	public string $primer_apellido = '';
	public string $segundo_apellido = '';
	public string $primer_nombre = '';
	public string $segundo_nombre = '';
	public string $nombre_completo = '';
	public string $direccion = '';
	public string $telefono = '';
	public string $telefono_movil = '';
	public string $e_mail = '';
	public string $e_mail2 = '';
	public string $comentario = '';
	public string $imagen = '';
	public bool $activo = true;
	public int $id_pais = -1;
	public string $id_pais_Descripcion = '';

	public int $id_provincia = -1;
	public string $id_provincia_Descripcion = '';

	public int $id_ciudad = -1;
	public string $id_ciudad_Descripcion = '';

	public string $codigo_postal = '';
	public string $fax = '';
	public string $contacto = '';
	public int $id_vendedor = -1;
	public string $id_vendedor_Descripcion = '';

	public float $maximo_credito = 0.0;
	public float $maximo_descuento = 0.0;
	public float $interes_anual = 0.0;
	public float $balance = 0.0;
	public int $id_termino_pago_cliente = -1;
	public string $id_termino_pago_cliente_Descripcion = '';

	public ?int $id_cuenta = null;
	public string $id_cuenta_Descripcion = '';

	public int $facturar_con = 0;
	public bool $aplica_impuesto_ventas = false;
	public int $id_impuesto = -1;
	public string $id_impuesto_Descripcion = '';

	public bool $aplica_retencion_impuesto = false;
	public ?int $id_retencion = null;
	public string $id_retencion_Descripcion = '';

	public bool $aplica_retencion_fuente = false;
	public ?int $id_retencion_fuente = null;
	public string $id_retencion_fuente_Descripcion = '';

	public bool $aplica_retencion_ica = false;
	public ?int $id_retencion_ica = null;
	public string $id_retencion_ica_Descripcion = '';

	public bool $aplica_2do_impuesto = false;
	public ?int $id_otro_impuesto = null;
	public string $id_otro_impuesto_Descripcion = '';

	public string $creado = '';
	public float $monto_ultima_transaccion = 0.0;
	public string $fecha_ultima_transaccion = '';
	public string $descripcion_ultima_transaccion = '';
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	public ?tipo_persona $tipo_persona = null;
	public ?categoria_cliente $categoria_cliente = null;
	public ?tipo_precio $tipo_precio = null;
	public ?giro_negocio_cliente $giro_negocio_cliente = null;
	public ?pais $pais = null;
	public ?provincia $provincia = null;
	public ?ciudad $ciudad = null;
	public ?vendedor $vendedor = null;
	public ?termino_pago_cliente $termino_pago_cliente = null;
	public ?cuenta $cuenta = null;
	public ?impuesto $impuesto = null;
	public ?retencion $retencion = null;
	public ?retencion_fuente $retencion_fuente = null;
	public ?retencion_ica $retencion_ica = null;
	public ?otro_impuesto $otro_impuesto = null;
	
	/*RELACIONES*/
	
	public array $devolucionfacturas = array();
	public array $cuentacobrars = array();
	public array $documentoclientes = array();
	public array $estimados = array();
	public array $imagenclientes = array();
	public array $facturas = array();
	public array $consignacions = array();
	public array $listaclientes = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->cliente_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->id_tipo_persona=-1;
		$this->id_tipo_persona_Descripcion='';

 		$this->id_categoria_cliente=-1;
		$this->id_categoria_cliente_Descripcion='';

 		$this->id_tipo_precio=-1;
		$this->id_tipo_precio_Descripcion='';

 		$this->id_giro_negocio_cliente=-1;
		$this->id_giro_negocio_cliente_Descripcion='';

 		$this->codigo='';
 		$this->ruc='';
 		$this->primer_apellido='';
 		$this->segundo_apellido='';
 		$this->primer_nombre='';
 		$this->segundo_nombre='';
 		$this->nombre_completo='';
 		$this->direccion='';
 		$this->telefono='';
 		$this->telefono_movil='';
 		$this->e_mail='';
 		$this->e_mail2='';
 		$this->comentario='';
 		$this->imagen='';
 		$this->activo=true;
 		$this->id_pais=-1;
		$this->id_pais_Descripcion='';

 		$this->id_provincia=-1;
		$this->id_provincia_Descripcion='';

 		$this->id_ciudad=-1;
		$this->id_ciudad_Descripcion='';

 		$this->codigo_postal='';
 		$this->fax='';
 		$this->contacto='';
 		$this->id_vendedor=-1;
		$this->id_vendedor_Descripcion='';

 		$this->maximo_credito=0.0;
 		$this->maximo_descuento=0.0;
 		$this->interes_anual=0.0;
 		$this->balance=0.0;
 		$this->id_termino_pago_cliente=-1;
		$this->id_termino_pago_cliente_Descripcion='';

 		$this->id_cuenta=null;
		$this->id_cuenta_Descripcion='';

 		$this->facturar_con=0;
 		$this->aplica_impuesto_ventas=false;
 		$this->id_impuesto=-1;
		$this->id_impuesto_Descripcion='';

 		$this->aplica_retencion_impuesto=false;
 		$this->id_retencion=null;
		$this->id_retencion_Descripcion='';

 		$this->aplica_retencion_fuente=false;
 		$this->id_retencion_fuente=null;
		$this->id_retencion_fuente_Descripcion='';

 		$this->aplica_retencion_ica=false;
 		$this->id_retencion_ica=null;
		$this->id_retencion_ica_Descripcion='';

 		$this->aplica_2do_impuesto=false;
 		$this->id_otro_impuesto=null;
		$this->id_otro_impuesto_Descripcion='';

 		$this->creado=date('Y-m-d');
 		$this->monto_ultima_transaccion=0.0;
 		$this->fecha_ultima_transaccion=date('Y-m-d');
 		$this->descripcion_ultima_transaccion='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
			$this->tipo_persona=new tipo_persona();
			$this->categoria_cliente=new categoria_cliente();
			$this->tipo_precio=new tipo_precio();
			$this->giro_negocio_cliente=new giro_negocio_cliente();
			$this->pais=new pais();
			$this->provincia=new provincia();
			$this->ciudad=new ciudad();
			$this->vendedor=new vendedor();
			$this->termino_pago_cliente=new termino_pago_cliente();
			$this->cuenta=new cuenta();
			$this->impuesto=new impuesto();
			$this->retencion=new retencion();
			$this->retencion_fuente=new retencion_fuente();
			$this->retencion_ica=new retencion_ica();
			$this->otro_impuesto=new otro_impuesto();
		}
		
		/*RELACIONES*/
		
		$this->devolucionfacturas=array();
		$this->cuentacobrars=array();
		$this->documentoclientes=array();
		$this->estimados=array();
		$this->imagenclientes=array();
		$this->facturas=array();
		$this->consignacions=array();
		$this->listaclientes=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cliente_Additional=new cliente_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_cliente() {
		$this->map_cliente = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_empresa() : ?int {
		return $this->id_empresa;
	}
	
	public function  getid_empresa_Descripcion() : string {
		return $this->id_empresa_Descripcion;
	}
    
	public function  getid_tipo_persona() : ?int {
		return $this->id_tipo_persona;
	}
	
	public function  getid_tipo_persona_Descripcion() : string {
		return $this->id_tipo_persona_Descripcion;
	}
    
	public function  getid_categoria_cliente() : ?int {
		return $this->id_categoria_cliente;
	}
	
	public function  getid_categoria_cliente_Descripcion() : string {
		return $this->id_categoria_cliente_Descripcion;
	}
    
	public function  getid_tipo_precio() : ?int {
		return $this->id_tipo_precio;
	}
	
	public function  getid_tipo_precio_Descripcion() : string {
		return $this->id_tipo_precio_Descripcion;
	}
    
	public function  getid_giro_negocio_cliente() : ?int {
		return $this->id_giro_negocio_cliente;
	}
	
	public function  getid_giro_negocio_cliente_Descripcion() : string {
		return $this->id_giro_negocio_cliente_Descripcion;
	}
    
	public function  getcodigo() : ?string {
		return $this->codigo;
	}
    
	public function  getruc() : ?string {
		return $this->ruc;
	}
    
	public function  getprimer_apellido() : ?string {
		return $this->primer_apellido;
	}
    
	public function  getsegundo_apellido() : ?string {
		return $this->segundo_apellido;
	}
    
	public function  getprimer_nombre() : ?string {
		return $this->primer_nombre;
	}
    
	public function  getsegundo_nombre() : ?string {
		return $this->segundo_nombre;
	}
    
	public function  getnombre_completo() : ?string {
		return $this->nombre_completo;
	}
    
	public function  getdireccion() : ?string {
		return $this->direccion;
	}
    
	public function  gettelefono() : ?string {
		return $this->telefono;
	}
    
	public function  gettelefono_movil() : ?string {
		return $this->telefono_movil;
	}
    
	public function  gete_mail() : ?string {
		return $this->e_mail;
	}
    
	public function  gete_mail2() : ?string {
		return $this->e_mail2;
	}
    
	public function  getcomentario() : ?string {
		return $this->comentario;
	}
    
	public function  getimagen() : ?string {
		return $this->imagen;
	}
    
	public function  getactivo() : ?bool {
		return $this->activo;
	}
    
	public function  getid_pais() : ?int {
		return $this->id_pais;
	}
	
	public function  getid_pais_Descripcion() : string {
		return $this->id_pais_Descripcion;
	}
    
	public function  getid_provincia() : ?int {
		return $this->id_provincia;
	}
	
	public function  getid_provincia_Descripcion() : string {
		return $this->id_provincia_Descripcion;
	}
    
	public function  getid_ciudad() : ?int {
		return $this->id_ciudad;
	}
	
	public function  getid_ciudad_Descripcion() : string {
		return $this->id_ciudad_Descripcion;
	}
    
	public function  getcodigo_postal() : ?string {
		return $this->codigo_postal;
	}
    
	public function  getfax() : ?string {
		return $this->fax;
	}
    
	public function  getcontacto() : ?string {
		return $this->contacto;
	}
    
	public function  getid_vendedor() : ?int {
		return $this->id_vendedor;
	}
	
	public function  getid_vendedor_Descripcion() : string {
		return $this->id_vendedor_Descripcion;
	}
    
	public function  getmaximo_credito() : ?float {
		return $this->maximo_credito;
	}
    
	public function  getmaximo_descuento() : ?float {
		return $this->maximo_descuento;
	}
    
	public function  getinteres_anual() : ?float {
		return $this->interes_anual;
	}
    
	public function  getbalance() : ?float {
		return $this->balance;
	}
    
	public function  getid_termino_pago_cliente() : ?int {
		return $this->id_termino_pago_cliente;
	}
	
	public function  getid_termino_pago_cliente_Descripcion() : string {
		return $this->id_termino_pago_cliente_Descripcion;
	}
    
	public function  getid_cuenta() : ?int {
		return $this->id_cuenta;
	}
	
	public function  getid_cuenta_Descripcion() : string {
		return $this->id_cuenta_Descripcion;
	}
    
	public function  getfacturar_con() : ?int {
		return $this->facturar_con;
	}
    
	public function  getaplica_impuesto_ventas() : ?bool {
		return $this->aplica_impuesto_ventas;
	}
    
	public function  getid_impuesto() : ?int {
		return $this->id_impuesto;
	}
	
	public function  getid_impuesto_Descripcion() : string {
		return $this->id_impuesto_Descripcion;
	}
    
	public function  getaplica_retencion_impuesto() : ?bool {
		return $this->aplica_retencion_impuesto;
	}
    
	public function  getid_retencion() : ?int {
		return $this->id_retencion;
	}
	
	public function  getid_retencion_Descripcion() : string {
		return $this->id_retencion_Descripcion;
	}
    
	public function  getaplica_retencion_fuente() : ?bool {
		return $this->aplica_retencion_fuente;
	}
    
	public function  getid_retencion_fuente() : ?int {
		return $this->id_retencion_fuente;
	}
	
	public function  getid_retencion_fuente_Descripcion() : string {
		return $this->id_retencion_fuente_Descripcion;
	}
    
	public function  getaplica_retencion_ica() : ?bool {
		return $this->aplica_retencion_ica;
	}
    
	public function  getid_retencion_ica() : ?int {
		return $this->id_retencion_ica;
	}
	
	public function  getid_retencion_ica_Descripcion() : string {
		return $this->id_retencion_ica_Descripcion;
	}
    
	public function  getaplica_2do_impuesto() : ?bool {
		return $this->aplica_2do_impuesto;
	}
    
	public function  getid_otro_impuesto() : ?int {
		return $this->id_otro_impuesto;
	}
	
	public function  getid_otro_impuesto_Descripcion() : string {
		return $this->id_otro_impuesto_Descripcion;
	}
    
	public function  getcreado() : ?string {
		return $this->creado;
	}
    
	public function  getmonto_ultima_transaccion() : ?float {
		return $this->monto_ultima_transaccion;
	}
    
	public function  getfecha_ultima_transaccion() : ?string {
		return $this->fecha_ultima_transaccion;
	}
    
	public function  getdescripcion_ultima_transaccion() : ?string {
		return $this->descripcion_ultima_transaccion;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cliente:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('cliente:Valor nulo no permitido en columna id_empresa');
				}

				$this->id_empresa_Descripcion=$newid_empresa_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_tipo_persona(?int $newid_tipo_persona)
	{
		try {
			if($this->id_tipo_persona!==$newid_tipo_persona) {
				if($newid_tipo_persona===null && $newid_tipo_persona!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna id_tipo_persona');
				}

				if($newid_tipo_persona!==null && filter_var($newid_tipo_persona,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cliente:No es numero entero - id_tipo_persona='.$newid_tipo_persona);
				}

				$this->id_tipo_persona=$newid_tipo_persona;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_tipo_persona_Descripcion(string $newid_tipo_persona_Descripcion)
	{
		try {
			if($this->id_tipo_persona_Descripcion!=$newid_tipo_persona_Descripcion) {
				if($newid_tipo_persona_Descripcion===null && $newid_tipo_persona_Descripcion!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna id_tipo_persona');
				}

				$this->id_tipo_persona_Descripcion=$newid_tipo_persona_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_categoria_cliente(?int $newid_categoria_cliente)
	{
		try {
			if($this->id_categoria_cliente!==$newid_categoria_cliente) {
				if($newid_categoria_cliente===null && $newid_categoria_cliente!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna id_categoria_cliente');
				}

				if($newid_categoria_cliente!==null && filter_var($newid_categoria_cliente,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cliente:No es numero entero - id_categoria_cliente='.$newid_categoria_cliente);
				}

				$this->id_categoria_cliente=$newid_categoria_cliente;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_categoria_cliente_Descripcion(string $newid_categoria_cliente_Descripcion)
	{
		try {
			if($this->id_categoria_cliente_Descripcion!=$newid_categoria_cliente_Descripcion) {
				if($newid_categoria_cliente_Descripcion===null && $newid_categoria_cliente_Descripcion!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna id_categoria_cliente');
				}

				$this->id_categoria_cliente_Descripcion=$newid_categoria_cliente_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_tipo_precio(?int $newid_tipo_precio)
	{
		try {
			if($this->id_tipo_precio!==$newid_tipo_precio) {
				if($newid_tipo_precio===null && $newid_tipo_precio!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna id_tipo_precio');
				}

				if($newid_tipo_precio!==null && filter_var($newid_tipo_precio,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cliente:No es numero entero - id_tipo_precio='.$newid_tipo_precio);
				}

				$this->id_tipo_precio=$newid_tipo_precio;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_tipo_precio_Descripcion(string $newid_tipo_precio_Descripcion)
	{
		try {
			if($this->id_tipo_precio_Descripcion!=$newid_tipo_precio_Descripcion) {
				if($newid_tipo_precio_Descripcion===null && $newid_tipo_precio_Descripcion!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna id_tipo_precio');
				}

				$this->id_tipo_precio_Descripcion=$newid_tipo_precio_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_giro_negocio_cliente(?int $newid_giro_negocio_cliente)
	{
		try {
			if($this->id_giro_negocio_cliente!==$newid_giro_negocio_cliente) {
				if($newid_giro_negocio_cliente===null && $newid_giro_negocio_cliente!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna id_giro_negocio_cliente');
				}

				if($newid_giro_negocio_cliente!==null && filter_var($newid_giro_negocio_cliente,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cliente:No es numero entero - id_giro_negocio_cliente='.$newid_giro_negocio_cliente);
				}

				$this->id_giro_negocio_cliente=$newid_giro_negocio_cliente;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_giro_negocio_cliente_Descripcion(string $newid_giro_negocio_cliente_Descripcion)
	{
		try {
			if($this->id_giro_negocio_cliente_Descripcion!=$newid_giro_negocio_cliente_Descripcion) {
				if($newid_giro_negocio_cliente_Descripcion===null && $newid_giro_negocio_cliente_Descripcion!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna id_giro_negocio_cliente');
				}

				$this->id_giro_negocio_cliente_Descripcion=$newid_giro_negocio_cliente_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcodigo(?string $newcodigo)
	{
		try {
			if($this->codigo!==$newcodigo) {
				if($newcodigo===null && $newcodigo!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>20) {
					throw new Exception('cliente:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=20 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('cliente:Formato incorrecto en columna codigo='.$newcodigo);
				}

				$this->codigo=$newcodigo;
				$this->setIsChanged(true);
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
					throw new Exception('cliente:Valor nulo no permitido en columna ruc');
				}

				if(strlen($newruc)>30) {
					throw new Exception('cliente:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=30 en columna ruc');
				}

				if(filter_var($newruc,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('cliente:Formato incorrecto en columna ruc='.$newruc);
				}

				$this->ruc=$newruc;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setprimer_apellido(?string $newprimer_apellido)
	{
		try {
			if($this->primer_apellido!==$newprimer_apellido) {
				if($newprimer_apellido===null && $newprimer_apellido!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna primer_apellido');
				}

				if(strlen($newprimer_apellido)>60) {
					throw new Exception('cliente:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=60 en columna primer_apellido');
				}

				if(filter_var($newprimer_apellido,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('cliente:Formato incorrecto en columna primer_apellido='.$newprimer_apellido);
				}

				$this->primer_apellido=$newprimer_apellido;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setsegundo_apellido(?string $newsegundo_apellido) {
		if($this->segundo_apellido!==$newsegundo_apellido) {

				if(strlen($newsegundo_apellido)>60) {
					try {
						throw new Exception('cliente:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=segundo_apellido en columna segundo_apellido');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newsegundo_apellido,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('cliente:Formato incorrecto en la columna segundo_apellido='.$newsegundo_apellido);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->segundo_apellido=$newsegundo_apellido;
			$this->setIsChanged(true);
		}
	}
    
	public function setprimer_nombre(?string $newprimer_nombre)
	{
		try {
			if($this->primer_nombre!==$newprimer_nombre) {
				if($newprimer_nombre===null && $newprimer_nombre!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna primer_nombre');
				}

				if(strlen($newprimer_nombre)>60) {
					throw new Exception('cliente:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=60 en columna primer_nombre');
				}

				if(filter_var($newprimer_nombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('cliente:Formato incorrecto en columna primer_nombre='.$newprimer_nombre);
				}

				$this->primer_nombre=$newprimer_nombre;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setsegundo_nombre(?string $newsegundo_nombre) {
		if($this->segundo_nombre!==$newsegundo_nombre) {

				if(strlen($newsegundo_nombre)>60) {
					try {
						throw new Exception('cliente:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=segundo_nombre en columna segundo_nombre');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newsegundo_nombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('cliente:Formato incorrecto en la columna segundo_nombre='.$newsegundo_nombre);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->segundo_nombre=$newsegundo_nombre;
			$this->setIsChanged(true);
		}
	}
    
	public function setnombre_completo(?string $newnombre_completo) {
		if($this->nombre_completo!==$newnombre_completo) {

				if(strlen($newnombre_completo)>80) {
					try {
						throw new Exception('cliente:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=nombre_completo en columna nombre_completo');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newnombre_completo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('cliente:Formato incorrecto en la columna nombre_completo='.$newnombre_completo);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->nombre_completo=$newnombre_completo;
			$this->setIsChanged(true);
		}
	}
    
	public function setdireccion(?string $newdireccion)
	{
		try {
			if($this->direccion!==$newdireccion) {
				if($newdireccion===null && $newdireccion!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna direccion');
				}

				if(strlen($newdireccion)>150) {
					throw new Exception('cliente:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=150 en columna direccion');
				}

				if(filter_var($newdireccion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_DIR_GENERAL)))===false) {
					throw new Exception('cliente:Formato incorrecto en columna direccion='.$newdireccion);
				}

				$this->direccion=$newdireccion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function settelefono(?string $newtelefono)
	{
		try {
			if($this->telefono!==$newtelefono) {
				if($newtelefono===null && $newtelefono!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna telefono');
				}

				if(strlen($newtelefono)>20) {
					throw new Exception('cliente:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=20 en columna telefono');
				}

				if(filter_var($newtelefono,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_TELEFONO_GENERAL)))===false) {
					throw new Exception('cliente:Formato incorrecto en columna telefono='.$newtelefono);
				}

				$this->telefono=$newtelefono;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function settelefono_movil(?string $newtelefono_movil) {
		if($this->telefono_movil!==$newtelefono_movil) {

				if(strlen($newtelefono_movil)>20) {
					try {
						throw new Exception('cliente:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=telefono_movil en columna telefono_movil');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newtelefono_movil,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_TELEFONO_GENERAL)))===false) {
					try {
						throw new Exception('cliente:Formato incorrecto en la columna telefono_movil='.$newtelefono_movil);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->telefono_movil=$newtelefono_movil;
			$this->setIsChanged(true);
		}
	}
    
	public function sete_mail(?string $newe_mail)
	{
		try {
			if($this->e_mail!==$newe_mail) {
				if($newe_mail===null && $newe_mail!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna e_mail');
				}

				if(strlen($newe_mail)>100) {
					throw new Exception('cliente:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=100 en columna e_mail');
				}

				if(!empty($newe_mail) && filter_var($newe_mail,FILTER_VALIDATE_EMAIL)===false) {
					throw new Exception('cliente:Formato incorrecto en columna e_mail='.$newe_mail);
				}

				$this->e_mail=$newe_mail;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function sete_mail2(?string $newe_mail2) {
		if($this->e_mail2!==$newe_mail2) {

				if(strlen($newe_mail2)>100) {
					try {
						throw new Exception('cliente:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=e_mail2 en columna e_mail2');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(!empty($newe_mail2) && filter_var($newe_mail2,FILTER_VALIDATE_EMAIL)===false) {
					try {
						throw new Exception('cliente:Formato incorrecto en la columna e_mail2='.$newe_mail2);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->e_mail2=$newe_mail2;
			$this->setIsChanged(true);
		}
	}
    
	public function setcomentario(?string $newcomentario) {
		if($this->comentario!==$newcomentario) {

				if(strlen($newcomentario)>1000) {
					try {
						throw new Exception('cliente:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=comentario en columna comentario');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newcomentario,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('cliente:Formato incorrecto en la columna comentario='.$newcomentario);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->comentario=$newcomentario;
			$this->setIsChanged(true);
		}
	}
    
	public function setimagen(?string $newimagen) {
		if($this->imagen!==$newimagen) {

				if(strlen($newimagen)>1000) {
					try {
						throw new Exception('cliente:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=imagen en columna imagen');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newimagen,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('cliente:Formato incorrecto en la columna imagen='.$newimagen);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->imagen=$newimagen;
			$this->setIsChanged(true);
		}
	}
    
	public function setactivo(?bool $newactivo)
	{
		try {
			if($this->activo!==$newactivo) {
				if($newactivo===null && $newactivo!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna activo');
				}

				if($newactivo!==null && filter_var($newactivo,FILTER_VALIDATE_BOOLEAN)===false && $newactivo!==0 && $newactivo!==false) {
					throw new Exception('cliente:No es valor booleano - activo='.$newactivo);
				}

				$this->activo=$newactivo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_pais(?int $newid_pais)
	{
		try {
			if($this->id_pais!==$newid_pais) {
				if($newid_pais===null && $newid_pais!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna id_pais');
				}

				if($newid_pais!==null && filter_var($newid_pais,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cliente:No es numero entero - id_pais='.$newid_pais);
				}

				$this->id_pais=$newid_pais;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_pais_Descripcion(string $newid_pais_Descripcion)
	{
		try {
			if($this->id_pais_Descripcion!=$newid_pais_Descripcion) {
				if($newid_pais_Descripcion===null && $newid_pais_Descripcion!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna id_pais');
				}

				$this->id_pais_Descripcion=$newid_pais_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_provincia(?int $newid_provincia)
	{
		try {
			if($this->id_provincia!==$newid_provincia) {
				if($newid_provincia===null && $newid_provincia!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna id_provincia');
				}

				if($newid_provincia!==null && filter_var($newid_provincia,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cliente:No es numero entero - id_provincia='.$newid_provincia);
				}

				$this->id_provincia=$newid_provincia;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_provincia_Descripcion(string $newid_provincia_Descripcion)
	{
		try {
			if($this->id_provincia_Descripcion!=$newid_provincia_Descripcion) {
				if($newid_provincia_Descripcion===null && $newid_provincia_Descripcion!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna id_provincia');
				}

				$this->id_provincia_Descripcion=$newid_provincia_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_ciudad(?int $newid_ciudad)
	{
		try {
			if($this->id_ciudad!==$newid_ciudad) {
				if($newid_ciudad===null && $newid_ciudad!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna id_ciudad');
				}

				if($newid_ciudad!==null && filter_var($newid_ciudad,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cliente:No es numero entero - id_ciudad='.$newid_ciudad);
				}

				$this->id_ciudad=$newid_ciudad;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_ciudad_Descripcion(string $newid_ciudad_Descripcion)
	{
		try {
			if($this->id_ciudad_Descripcion!=$newid_ciudad_Descripcion) {
				if($newid_ciudad_Descripcion===null && $newid_ciudad_Descripcion!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna id_ciudad');
				}

				$this->id_ciudad_Descripcion=$newid_ciudad_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcodigo_postal(?string $newcodigo_postal) {
		if($this->codigo_postal!==$newcodigo_postal) {

				if(strlen($newcodigo_postal)>15) {
					try {
						throw new Exception('cliente:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=codigo_postal en columna codigo_postal');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newcodigo_postal,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_POSTAL_GENERAL)))===false) {
					try {
						throw new Exception('cliente:Formato incorrecto en la columna codigo_postal='.$newcodigo_postal);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->codigo_postal=$newcodigo_postal;
			$this->setIsChanged(true);
		}
	}
    
	public function setfax(?string $newfax) {
		if($this->fax!==$newfax) {

				if(strlen($newfax)>20) {
					try {
						throw new Exception('cliente:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=fax en columna fax');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newfax,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FAX_GENERAL)))===false) {
					try {
						throw new Exception('cliente:Formato incorrecto en la columna fax='.$newfax);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->fax=$newfax;
			$this->setIsChanged(true);
		}
	}
    
	public function setcontacto(?string $newcontacto) {
		if($this->contacto!==$newcontacto) {

				if(strlen($newcontacto)>50) {
					try {
						throw new Exception('cliente:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=contacto en columna contacto');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newcontacto,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('cliente:Formato incorrecto en la columna contacto='.$newcontacto);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->contacto=$newcontacto;
			$this->setIsChanged(true);
		}
	}
    
	public function setid_vendedor(?int $newid_vendedor)
	{
		try {
			if($this->id_vendedor!==$newid_vendedor) {
				if($newid_vendedor===null && $newid_vendedor!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna id_vendedor');
				}

				if($newid_vendedor!==null && filter_var($newid_vendedor,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cliente:No es numero entero - id_vendedor='.$newid_vendedor);
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
					throw new Exception('cliente:Valor nulo no permitido en columna id_vendedor');
				}

				$this->id_vendedor_Descripcion=$newid_vendedor_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setmaximo_credito(?float $newmaximo_credito)
	{
		try {
			if($this->maximo_credito!==$newmaximo_credito) {
				if($newmaximo_credito===null && $newmaximo_credito!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna maximo_credito');
				}

				if($newmaximo_credito!=0) {
					if($newmaximo_credito!==null && filter_var($newmaximo_credito,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('cliente:No es numero decimal - maximo_credito='.$newmaximo_credito);
					}
				}

				$this->maximo_credito=$newmaximo_credito;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setmaximo_descuento(?float $newmaximo_descuento)
	{
		try {
			if($this->maximo_descuento!==$newmaximo_descuento) {
				if($newmaximo_descuento===null && $newmaximo_descuento!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna maximo_descuento');
				}

				if($newmaximo_descuento!=0) {
					if($newmaximo_descuento!==null && filter_var($newmaximo_descuento,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('cliente:No es numero decimal - maximo_descuento='.$newmaximo_descuento);
					}
				}

				$this->maximo_descuento=$newmaximo_descuento;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setinteres_anual(?float $newinteres_anual)
	{
		try {
			if($this->interes_anual!==$newinteres_anual) {
				if($newinteres_anual===null && $newinteres_anual!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna interes_anual');
				}

				if($newinteres_anual!=0) {
					if($newinteres_anual!==null && filter_var($newinteres_anual,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('cliente:No es numero decimal - interes_anual='.$newinteres_anual);
					}
				}

				$this->interes_anual=$newinteres_anual;
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
					throw new Exception('cliente:Valor nulo no permitido en columna balance');
				}

				if($newbalance!=0) {
					if($newbalance!==null && filter_var($newbalance,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('cliente:No es numero decimal - balance='.$newbalance);
					}
				}

				$this->balance=$newbalance;
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
					throw new Exception('cliente:Valor nulo no permitido en columna id_termino_pago_cliente');
				}

				if($newid_termino_pago_cliente!==null && filter_var($newid_termino_pago_cliente,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cliente:No es numero entero - id_termino_pago_cliente='.$newid_termino_pago_cliente);
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
					throw new Exception('cliente:Valor nulo no permitido en columna id_termino_pago_cliente');
				}

				$this->id_termino_pago_cliente_Descripcion=$newid_termino_pago_cliente_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_cuenta(?int $newid_cuenta) {
		if($this->id_cuenta!==$newid_cuenta) {

				if($newid_cuenta!==null && filter_var($newid_cuenta,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cliente:No es numero entero - id_cuenta');
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
    
	public function setfacturar_con(?int $newfacturar_con)
	{
		try {
			if($this->facturar_con!==$newfacturar_con) {
				if($newfacturar_con===null && $newfacturar_con!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna facturar_con');
				}

				if($newfacturar_con!==null && filter_var($newfacturar_con,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cliente:No es numero entero - facturar_con='.$newfacturar_con);
				}

				$this->facturar_con=$newfacturar_con;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setaplica_impuesto_ventas(?bool $newaplica_impuesto_ventas)
	{
		try {
			if($this->aplica_impuesto_ventas!==$newaplica_impuesto_ventas) {
				if($newaplica_impuesto_ventas===null && $newaplica_impuesto_ventas!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna aplica_impuesto_ventas');
				}

				if($newaplica_impuesto_ventas!==null && filter_var($newaplica_impuesto_ventas,FILTER_VALIDATE_BOOLEAN)===false && $newaplica_impuesto_ventas!==0 && $newaplica_impuesto_ventas!==false) {
					throw new Exception('cliente:No es valor booleano - aplica_impuesto_ventas='.$newaplica_impuesto_ventas);
				}

				$this->aplica_impuesto_ventas=$newaplica_impuesto_ventas;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_impuesto(?int $newid_impuesto)
	{
		try {
			if($this->id_impuesto!==$newid_impuesto) {
				if($newid_impuesto===null && $newid_impuesto!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna id_impuesto');
				}

				if($newid_impuesto!==null && filter_var($newid_impuesto,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cliente:No es numero entero - id_impuesto='.$newid_impuesto);
				}

				$this->id_impuesto=$newid_impuesto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_impuesto_Descripcion(string $newid_impuesto_Descripcion)
	{
		try {
			if($this->id_impuesto_Descripcion!=$newid_impuesto_Descripcion) {
				if($newid_impuesto_Descripcion===null && $newid_impuesto_Descripcion!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna id_impuesto');
				}

				$this->id_impuesto_Descripcion=$newid_impuesto_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setaplica_retencion_impuesto(?bool $newaplica_retencion_impuesto)
	{
		try {
			if($this->aplica_retencion_impuesto!==$newaplica_retencion_impuesto) {
				if($newaplica_retencion_impuesto===null && $newaplica_retencion_impuesto!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna aplica_retencion_impuesto');
				}

				if($newaplica_retencion_impuesto!==null && filter_var($newaplica_retencion_impuesto,FILTER_VALIDATE_BOOLEAN)===false && $newaplica_retencion_impuesto!==0 && $newaplica_retencion_impuesto!==false) {
					throw new Exception('cliente:No es valor booleano - aplica_retencion_impuesto='.$newaplica_retencion_impuesto);
				}

				$this->aplica_retencion_impuesto=$newaplica_retencion_impuesto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_retencion(?int $newid_retencion) {
		if($this->id_retencion!==$newid_retencion) {

				if($newid_retencion!==null && filter_var($newid_retencion,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cliente:No es numero entero - id_retencion');
				}

			$this->id_retencion=$newid_retencion;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_retencion_Descripcion(string $newid_retencion_Descripcion) {
		if($this->id_retencion_Descripcion!=$newid_retencion_Descripcion) {

			$this->id_retencion_Descripcion=$newid_retencion_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function setaplica_retencion_fuente(?bool $newaplica_retencion_fuente)
	{
		try {
			if($this->aplica_retencion_fuente!==$newaplica_retencion_fuente) {
				if($newaplica_retencion_fuente===null && $newaplica_retencion_fuente!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna aplica_retencion_fuente');
				}

				if($newaplica_retencion_fuente!==null && filter_var($newaplica_retencion_fuente,FILTER_VALIDATE_BOOLEAN)===false && $newaplica_retencion_fuente!==0 && $newaplica_retencion_fuente!==false) {
					throw new Exception('cliente:No es valor booleano - aplica_retencion_fuente='.$newaplica_retencion_fuente);
				}

				$this->aplica_retencion_fuente=$newaplica_retencion_fuente;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_retencion_fuente(?int $newid_retencion_fuente) {
		if($this->id_retencion_fuente!==$newid_retencion_fuente) {

				if($newid_retencion_fuente!==null && filter_var($newid_retencion_fuente,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cliente:No es numero entero - id_retencion_fuente');
				}

			$this->id_retencion_fuente=$newid_retencion_fuente;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_retencion_fuente_Descripcion(string $newid_retencion_fuente_Descripcion) {
		if($this->id_retencion_fuente_Descripcion!=$newid_retencion_fuente_Descripcion) {

			$this->id_retencion_fuente_Descripcion=$newid_retencion_fuente_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function setaplica_retencion_ica(?bool $newaplica_retencion_ica)
	{
		try {
			if($this->aplica_retencion_ica!==$newaplica_retencion_ica) {
				if($newaplica_retencion_ica===null && $newaplica_retencion_ica!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna aplica_retencion_ica');
				}

				if($newaplica_retencion_ica!==null && filter_var($newaplica_retencion_ica,FILTER_VALIDATE_BOOLEAN)===false && $newaplica_retencion_ica!==0 && $newaplica_retencion_ica!==false) {
					throw new Exception('cliente:No es valor booleano - aplica_retencion_ica='.$newaplica_retencion_ica);
				}

				$this->aplica_retencion_ica=$newaplica_retencion_ica;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_retencion_ica(?int $newid_retencion_ica) {
		if($this->id_retencion_ica!==$newid_retencion_ica) {

				if($newid_retencion_ica!==null && filter_var($newid_retencion_ica,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cliente:No es numero entero - id_retencion_ica');
				}

			$this->id_retencion_ica=$newid_retencion_ica;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_retencion_ica_Descripcion(string $newid_retencion_ica_Descripcion) {
		if($this->id_retencion_ica_Descripcion!=$newid_retencion_ica_Descripcion) {

			$this->id_retencion_ica_Descripcion=$newid_retencion_ica_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function setaplica_2do_impuesto(?bool $newaplica_2do_impuesto)
	{
		try {
			if($this->aplica_2do_impuesto!==$newaplica_2do_impuesto) {
				if($newaplica_2do_impuesto===null && $newaplica_2do_impuesto!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna aplica_2do_impuesto');
				}

				if($newaplica_2do_impuesto!==null && filter_var($newaplica_2do_impuesto,FILTER_VALIDATE_BOOLEAN)===false && $newaplica_2do_impuesto!==0 && $newaplica_2do_impuesto!==false) {
					throw new Exception('cliente:No es valor booleano - aplica_2do_impuesto='.$newaplica_2do_impuesto);
				}

				$this->aplica_2do_impuesto=$newaplica_2do_impuesto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_otro_impuesto(?int $newid_otro_impuesto) {
		if($this->id_otro_impuesto!==$newid_otro_impuesto) {

				if($newid_otro_impuesto!==null && filter_var($newid_otro_impuesto,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cliente:No es numero entero - id_otro_impuesto');
				}

			$this->id_otro_impuesto=$newid_otro_impuesto;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_otro_impuesto_Descripcion(string $newid_otro_impuesto_Descripcion) {
		if($this->id_otro_impuesto_Descripcion!=$newid_otro_impuesto_Descripcion) {

			$this->id_otro_impuesto_Descripcion=$newid_otro_impuesto_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function setcreado(?string $newcreado)
	{
		try {
			if($this->creado!==$newcreado) {
				if($newcreado===null && $newcreado!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna creado');
				}

				if($newcreado!==null && filter_var($newcreado,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('cliente:No es fecha - creado='.$newcreado);
				}

				$this->creado=$newcreado;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setmonto_ultima_transaccion(?float $newmonto_ultima_transaccion) {
		if($this->monto_ultima_transaccion!==$newmonto_ultima_transaccion) {

				if($newmonto_ultima_transaccion!==null && filter_var($newmonto_ultima_transaccion,FILTER_VALIDATE_FLOAT)===false) {
					throw new Exception('cliente:No es numero decimal - monto_ultima_transaccion');
				}

			$this->monto_ultima_transaccion=$newmonto_ultima_transaccion;
			$this->setIsChanged(true);
		}
	}
    
	public function setfecha_ultima_transaccion(?string $newfecha_ultima_transaccion)
	{
		try {
			if($this->fecha_ultima_transaccion!==$newfecha_ultima_transaccion) {
				if($newfecha_ultima_transaccion===null && $newfecha_ultima_transaccion!='') {
					throw new Exception('cliente:Valor nulo no permitido en columna fecha_ultima_transaccion');
				}

				if($newfecha_ultima_transaccion!==null && filter_var($newfecha_ultima_transaccion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('cliente:No es fecha - fecha_ultima_transaccion='.$newfecha_ultima_transaccion);
				}

				$this->fecha_ultima_transaccion=$newfecha_ultima_transaccion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdescripcion_ultima_transaccion(?string $newdescripcion_ultima_transaccion) {
		if($this->descripcion_ultima_transaccion!==$newdescripcion_ultima_transaccion) {

				if(strlen($newdescripcion_ultima_transaccion)>100) {
					try {
						throw new Exception('cliente:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=descripcion_ultima_transaccion en columna descri_ultima_transaccion');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newdescripcion_ultima_transaccion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('cliente:Formato incorrecto en la columna descri_ultima_transaccion='.$newdescripcion_ultima_transaccion);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->descripcion_ultima_transaccion=$newdescripcion_ultima_transaccion;
			$this->setIsChanged(true);
		}
	}
	
	/*FKs*/
	
	public function getempresa() : ?empresa {
		return $this->empresa;
	}

	public function gettipo_persona() : ?tipo_persona {
		return $this->tipo_persona;
	}

	public function getcategoria_cliente() : ?categoria_cliente {
		return $this->categoria_cliente;
	}

	public function gettipo_precio() : ?tipo_precio {
		return $this->tipo_precio;
	}

	public function getgiro_negocio_cliente() : ?giro_negocio_cliente {
		return $this->giro_negocio_cliente;
	}

	public function getpais() : ?pais {
		return $this->pais;
	}

	public function getprovincia() : ?provincia {
		return $this->provincia;
	}

	public function getciudad() : ?ciudad {
		return $this->ciudad;
	}

	public function getvendedor() : ?vendedor {
		return $this->vendedor;
	}

	public function gettermino_pago_cliente() : ?termino_pago_cliente {
		return $this->termino_pago_cliente;
	}

	public function getcuenta() : ?cuenta {
		return $this->cuenta;
	}

	public function getimpuesto() : ?impuesto {
		return $this->impuesto;
	}

	public function getretencion() : ?retencion {
		return $this->retencion;
	}

	public function getretencion_fuente() : ?retencion_fuente {
		return $this->retencion_fuente;
	}

	public function getretencion_ica() : ?retencion_ica {
		return $this->retencion_ica;
	}

	public function getotro_impuesto() : ?otro_impuesto {
		return $this->otro_impuesto;
	}

	
	
	public  function  setempresa(?empresa $empresa) {
		try {
			$this->empresa=$empresa;
		} catch(Exception $e) {
			;
		}
	}


	public  function  settipo_persona(?tipo_persona $tipo_persona) {
		try {
			$this->tipo_persona=$tipo_persona;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setcategoria_cliente(?categoria_cliente $categoria_cliente) {
		try {
			$this->categoria_cliente=$categoria_cliente;
		} catch(Exception $e) {
			;
		}
	}


	public  function  settipo_precio(?tipo_precio $tipo_precio) {
		try {
			$this->tipo_precio=$tipo_precio;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setgiro_negocio_cliente(?giro_negocio_cliente $giro_negocio_cliente) {
		try {
			$this->giro_negocio_cliente=$giro_negocio_cliente;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setpais(?pais $pais) {
		try {
			$this->pais=$pais;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setprovincia(?provincia $provincia) {
		try {
			$this->provincia=$provincia;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setciudad(?ciudad $ciudad) {
		try {
			$this->ciudad=$ciudad;
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


	public  function  settermino_pago_cliente(?termino_pago_cliente $termino_pago_cliente) {
		try {
			$this->termino_pago_cliente=$termino_pago_cliente;
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


	public  function  setimpuesto(?impuesto $impuesto) {
		try {
			$this->impuesto=$impuesto;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setretencion(?retencion $retencion) {
		try {
			$this->retencion=$retencion;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setretencion_fuente(?retencion_fuente $retencion_fuente) {
		try {
			$this->retencion_fuente=$retencion_fuente;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setretencion_ica(?retencion_ica $retencion_ica) {
		try {
			$this->retencion_ica=$retencion_ica;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setotro_impuesto(?otro_impuesto $otro_impuesto) {
		try {
			$this->otro_impuesto=$otro_impuesto;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	public function getdevolucion_facturas() : array {
		return $this->devolucionfacturas;
	}

	public function getcuenta_cobrars() : array {
		return $this->cuentacobrars;
	}

	public function getdocumento_clientes() : array {
		return $this->documentoclientes;
	}

	public function getestimados() : array {
		return $this->estimados;
	}

	public function getimagen_clientes() : array {
		return $this->imagenclientes;
	}

	public function getfacturas() : array {
		return $this->facturas;
	}

	public function getconsignacions() : array {
		return $this->consignacions;
	}

	public function getlista_clientes() : array {
		return $this->listaclientes;
	}

	
	
	public  function  setdevolucion_facturas(array $devolucionfacturas) {
		try {
			$this->devolucionfacturas=$devolucionfacturas;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setcuenta_cobrars(array $cuentacobrars) {
		try {
			$this->cuentacobrars=$cuentacobrars;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setdocumento_clientes(array $documentoclientes) {
		try {
			$this->documentoclientes=$documentoclientes;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setestimados(array $estimados) {
		try {
			$this->estimados=$estimados;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setimagen_clientes(array $imagenclientes) {
		try {
			$this->imagenclientes=$imagenclientes;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setfacturas(array $facturas) {
		try {
			$this->facturas=$facturas;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setconsignacions(array $consignacions) {
		try {
			$this->consignacions=$consignacions;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setlista_clientes(array $listaclientes) {
		try {
			$this->listaclientes=$listaclientes;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_clienteValue(string $sKey,$oValue) {
		$this->map_cliente[$sKey]=$oValue;
	}
	
	public function getMap_clienteValue(string $sKey) {
		return $this->map_cliente[$sKey];
	}
	
	public function getcliente_Original() : ?cliente {
		return $this->cliente_Original;
	}
	
	public function setcliente_Original(cliente $cliente) {
		try {
			$this->cliente_Original=$cliente;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_cliente() : array {
		return $this->map_cliente;
	}

	public function setMap_cliente(array $map_cliente) {
		$this->map_cliente = $map_cliente;
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
