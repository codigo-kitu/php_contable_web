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
namespace com\bydan\contabilidad\inventario\producto\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\facturacion\impuesto\business\entity\impuesto;
use com\bydan\contabilidad\facturacion\otro_impuesto\business\entity\otro_impuesto;
use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\facturacion\retencion\business\entity\retencion;

class producto extends GeneralEntity {

	/*GENERAL*/
	public static string $class='producto';
	
	/*AUXILIARES*/
	public ?producto $producto_Original=null;	
	public ?GeneralEntity $producto_Additional=null;
	public array $map_producto=array();	
		
	/*CAMPOS*/
	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public int $id_proveedor = -1;
	public string $id_proveedor_Descripcion = '';

	public string $codigo = '';
	public string $nombre = '';
	public float $costo = 0.0;
	public bool $activo = true;
	public int $id_tipo_producto = -1;
	public string $id_tipo_producto_Descripcion = '';

	public float $cantidad_inicial = 0.0;
	public int $id_impuesto = -1;
	public string $id_impuesto_Descripcion = '';

	public ?int $id_otro_impuesto = null;
	public string $id_otro_impuesto_Descripcion = '';

	public bool $impuesto_ventas = false;
	public bool $otro_impuesto_ventas = false;
	public bool $impuesto_compras = false;
	public bool $otro_impuesto_compras = false;
	public int $id_categoria_producto = -1;
	public string $id_categoria_producto_Descripcion = '';

	public int $id_sub_categoria_producto = -1;
	public string $id_sub_categoria_producto_Descripcion = '';

	public int $id_bodega_defecto = -1;
	public string $id_bodega_defecto_Descripcion = '';

	public int $id_unidad_compra = -1;
	public string $id_unidad_compra_Descripcion = '';

	public float $equivalencia_compra = 0.0;
	public int $id_unidad_venta = -1;
	public string $id_unidad_venta_Descripcion = '';

	public float $equivalencia_venta = 0.0;
	public string $descripcion = '';
	public string $imagen = '';
	public string $observacion = '';
	public bool $comenta_factura = false;
	public string $codigo_fabricante = '';
	public float $cantidad = 0.0;
	public float $cantidad_minima = 0.0;
	public float $cantidad_maxima = 0.0;
	public bool $factura_sin_stock = false;
	public bool $mostrar_componente = false;
	public bool $producto_equivalente = false;
	public bool $avisa_expiracion = false;
	public bool $requiere_serie = false;
	public bool $acepta_lote = false;
	public ?int $id_cuenta_venta = null;
	public string $id_cuenta_venta_Descripcion = '';

	public ?int $id_cuenta_compra = null;
	public string $id_cuenta_compra_Descripcion = '';

	public ?int $id_cuenta_costo = null;
	public string $id_cuenta_costo_Descripcion = '';

	public float $valor_inventario = 0.0;
	public int $producto_fisico = 0;
	public string $ultima_venta = '';
	public string $precio_actualizado = '';
	public ?int $id_retencion = null;
	public string $id_retencion_Descripcion = '';

	public bool $retencion_ventas = false;
	public bool $retencion_compras = false;
	public int $factura_con_precio = 0;
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	public ?proveedor $proveedor = null;
	public ?tipo_producto $tipo_producto = null;
	public ?impuesto $impuesto = null;
	public ?otro_impuesto $otro_impuesto = null;
	public ?categoria_producto $categoria_producto = null;
	public ?sub_categoria_producto $sub_categoria_producto = null;
	public ?bodega $bodega_defecto = null;
	public ?unidad $unidad_compra = null;
	public ?unidad $unidad_venta = null;
	public ?cuenta $cuenta_venta = null;
	public ?cuenta $cuenta_compra = null;
	public ?cuenta $cuenta_costo = null;
	public ?retencion $retencion = null;
	
	/*RELACIONES*/
	
	public array $listaprecios = array();
	public array $productobodegas = array();
	public array $otrosuplidors = array();
	public array $listaclientes = array();
	public array $bodegas = array();
	public array $imagenproductos = array();
	public array $listaproductos = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->producto_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->id_proveedor=-1;
		$this->id_proveedor_Descripcion='';

 		$this->codigo='';
 		$this->nombre='';
 		$this->costo=0.0;
 		$this->activo=true;
 		$this->id_tipo_producto=-1;
		$this->id_tipo_producto_Descripcion='';

 		$this->cantidad_inicial=0.0;
 		$this->id_impuesto=-1;
		$this->id_impuesto_Descripcion='';

 		$this->id_otro_impuesto=null;
		$this->id_otro_impuesto_Descripcion='';

 		$this->impuesto_ventas=false;
 		$this->otro_impuesto_ventas=false;
 		$this->impuesto_compras=false;
 		$this->otro_impuesto_compras=false;
 		$this->id_categoria_producto=-1;
		$this->id_categoria_producto_Descripcion='';

 		$this->id_sub_categoria_producto=-1;
		$this->id_sub_categoria_producto_Descripcion='';

 		$this->id_bodega_defecto=-1;
		$this->id_bodega_defecto_Descripcion='';

 		$this->id_unidad_compra=-1;
		$this->id_unidad_compra_Descripcion='';

 		$this->equivalencia_compra=0.0;
 		$this->id_unidad_venta=-1;
		$this->id_unidad_venta_Descripcion='';

 		$this->equivalencia_venta=0.0;
 		$this->descripcion='';
 		$this->imagen='';
 		$this->observacion='';
 		$this->comenta_factura=false;
 		$this->codigo_fabricante='';
 		$this->cantidad=0.0;
 		$this->cantidad_minima=0.0;
 		$this->cantidad_maxima=0.0;
 		$this->factura_sin_stock=false;
 		$this->mostrar_componente=false;
 		$this->producto_equivalente=false;
 		$this->avisa_expiracion=false;
 		$this->requiere_serie=false;
 		$this->acepta_lote=false;
 		$this->id_cuenta_venta=null;
		$this->id_cuenta_venta_Descripcion='';

 		$this->id_cuenta_compra=null;
		$this->id_cuenta_compra_Descripcion='';

 		$this->id_cuenta_costo=null;
		$this->id_cuenta_costo_Descripcion='';

 		$this->valor_inventario=0.0;
 		$this->producto_fisico=0;
 		$this->ultima_venta=date('Y-m-d');
 		$this->precio_actualizado=date('Y-m-d');
 		$this->id_retencion=null;
		$this->id_retencion_Descripcion='';

 		$this->retencion_ventas=false;
 		$this->retencion_compras=false;
 		$this->factura_con_precio=0;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
			$this->proveedor=new proveedor();
			$this->tipo_producto=new tipo_producto();
			$this->impuesto=new impuesto();
			$this->otro_impuesto=new otro_impuesto();
			$this->categoria_producto=new categoria_producto();
			$this->sub_categoria_producto=new sub_categoria_producto();
			$this->bodega_defecto=new bodega();
			$this->unidad_compra=new unidad();
			$this->unidad_venta=new unidad();
			$this->cuenta_venta=new cuenta();
			$this->cuenta_compra=new cuenta();
			$this->cuenta_costo=new cuenta();
			$this->retencion=new retencion();
		}
		
		/*RELACIONES*/
		
		$this->listaprecios=array();
		$this->productobodegas=array();
		$this->otrosuplidors=array();
		$this->listaclientes=array();
		$this->bodegas=array();
		$this->imagenproductos=array();
		$this->listaproductos=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->producto_Additional=new producto_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_producto() {
		$this->map_producto = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_empresa() : ?int {
		return $this->id_empresa;
	}
	
	public function  getid_empresa_Descripcion() : string {
		return $this->id_empresa_Descripcion;
	}
    
	public function  getid_proveedor() : ?int {
		return $this->id_proveedor;
	}
	
	public function  getid_proveedor_Descripcion() : string {
		return $this->id_proveedor_Descripcion;
	}
    
	public function  getcodigo() : ?string {
		return $this->codigo;
	}
    
	public function  getnombre() : ?string {
		return $this->nombre;
	}
    
	public function  getcosto() : ?float {
		return $this->costo;
	}
    
	public function  getactivo() : ?bool {
		return $this->activo;
	}
    
	public function  getid_tipo_producto() : ?int {
		return $this->id_tipo_producto;
	}
	
	public function  getid_tipo_producto_Descripcion() : string {
		return $this->id_tipo_producto_Descripcion;
	}
    
	public function  getcantidad_inicial() : ?float {
		return $this->cantidad_inicial;
	}
    
	public function  getid_impuesto() : ?int {
		return $this->id_impuesto;
	}
	
	public function  getid_impuesto_Descripcion() : string {
		return $this->id_impuesto_Descripcion;
	}
    
	public function  getid_otro_impuesto() : ?int {
		return $this->id_otro_impuesto;
	}
	
	public function  getid_otro_impuesto_Descripcion() : string {
		return $this->id_otro_impuesto_Descripcion;
	}
    
	public function  getimpuesto_ventas() : ?bool {
		return $this->impuesto_ventas;
	}
    
	public function  getotro_impuesto_ventas() : ?bool {
		return $this->otro_impuesto_ventas;
	}
    
	public function  getimpuesto_compras() : ?bool {
		return $this->impuesto_compras;
	}
    
	public function  getotro_impuesto_compras() : ?bool {
		return $this->otro_impuesto_compras;
	}
    
	public function  getid_categoria_producto() : ?int {
		return $this->id_categoria_producto;
	}
	
	public function  getid_categoria_producto_Descripcion() : string {
		return $this->id_categoria_producto_Descripcion;
	}
    
	public function  getid_sub_categoria_producto() : ?int {
		return $this->id_sub_categoria_producto;
	}
	
	public function  getid_sub_categoria_producto_Descripcion() : string {
		return $this->id_sub_categoria_producto_Descripcion;
	}
    
	public function  getid_bodega_defecto() : ?int {
		return $this->id_bodega_defecto;
	}
	
	public function  getid_bodega_defecto_Descripcion() : string {
		return $this->id_bodega_defecto_Descripcion;
	}
    
	public function  getid_unidad_compra() : ?int {
		return $this->id_unidad_compra;
	}
	
	public function  getid_unidad_compra_Descripcion() : string {
		return $this->id_unidad_compra_Descripcion;
	}
    
	public function  getequivalencia_compra() : ?float {
		return $this->equivalencia_compra;
	}
    
	public function  getid_unidad_venta() : ?int {
		return $this->id_unidad_venta;
	}
	
	public function  getid_unidad_venta_Descripcion() : string {
		return $this->id_unidad_venta_Descripcion;
	}
    
	public function  getequivalencia_venta() : ?float {
		return $this->equivalencia_venta;
	}
    
	public function  getdescripcion() : ?string {
		return $this->descripcion;
	}
    
	public function  getimagen() : ?string {
		return $this->imagen;
	}
    
	public function  getobservacion() : ?string {
		return $this->observacion;
	}
    
	public function  getcomenta_factura() : ?bool {
		return $this->comenta_factura;
	}
    
	public function  getcodigo_fabricante() : ?string {
		return $this->codigo_fabricante;
	}
    
	public function  getcantidad() : ?float {
		return $this->cantidad;
	}
    
	public function  getcantidad_minima() : ?float {
		return $this->cantidad_minima;
	}
    
	public function  getcantidad_maxima() : ?float {
		return $this->cantidad_maxima;
	}
    
	public function  getfactura_sin_stock() : ?bool {
		return $this->factura_sin_stock;
	}
    
	public function  getmostrar_componente() : ?bool {
		return $this->mostrar_componente;
	}
    
	public function  getproducto_equivalente() : ?bool {
		return $this->producto_equivalente;
	}
    
	public function  getavisa_expiracion() : ?bool {
		return $this->avisa_expiracion;
	}
    
	public function  getrequiere_serie() : ?bool {
		return $this->requiere_serie;
	}
    
	public function  getacepta_lote() : ?bool {
		return $this->acepta_lote;
	}
    
	public function  getid_cuenta_venta() : ?int {
		return $this->id_cuenta_venta;
	}
	
	public function  getid_cuenta_venta_Descripcion() : string {
		return $this->id_cuenta_venta_Descripcion;
	}
    
	public function  getid_cuenta_compra() : ?int {
		return $this->id_cuenta_compra;
	}
	
	public function  getid_cuenta_compra_Descripcion() : string {
		return $this->id_cuenta_compra_Descripcion;
	}
    
	public function  getid_cuenta_costo() : ?int {
		return $this->id_cuenta_costo;
	}
	
	public function  getid_cuenta_costo_Descripcion() : string {
		return $this->id_cuenta_costo_Descripcion;
	}
    
	public function  getvalor_inventario() : ?float {
		return $this->valor_inventario;
	}
    
	public function  getproducto_fisico() : ?int {
		return $this->producto_fisico;
	}
    
	public function  getultima_venta() : ?string {
		return $this->ultima_venta;
	}
    
	public function  getprecio_actualizado() : ?string {
		return $this->precio_actualizado;
	}
    
	public function  getid_retencion() : ?int {
		return $this->id_retencion;
	}
	
	public function  getid_retencion_Descripcion() : string {
		return $this->id_retencion_Descripcion;
	}
    
	public function  getretencion_ventas() : ?bool {
		return $this->retencion_ventas;
	}
    
	public function  getretencion_compras() : ?bool {
		return $this->retencion_compras;
	}
    
	public function  getfactura_con_precio() : ?int {
		return $this->factura_con_precio;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('producto:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('producto:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('producto:Valor nulo no permitido en columna id_empresa');
				}

				$this->id_empresa_Descripcion=$newid_empresa_Descripcion;
				//$this->setIsChanged(true);
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
					throw new Exception('producto:Valor nulo no permitido en columna id_proveedor');
				}

				if($newid_proveedor!==null && filter_var($newid_proveedor,FILTER_VALIDATE_INT)===false) {
					throw new Exception('producto:No es numero entero - id_proveedor='.$newid_proveedor);
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
					throw new Exception('producto:Valor nulo no permitido en columna id_proveedor');
				}

				$this->id_proveedor_Descripcion=$newid_proveedor_Descripcion;
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
					throw new Exception('producto:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>26) {
					throw new Exception('producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=26 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('producto:Formato incorrecto en columna codigo='.$newcodigo);
				}

				$this->codigo=$newcodigo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnombre(?string $newnombre)
	{
		try {
			if($this->nombre!==$newnombre) {
				if($newnombre===null && $newnombre!='') {
					throw new Exception('producto:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>70) {
					throw new Exception('producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=70 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('producto:Formato incorrecto en columna nombre='.$newnombre);
				}

				$this->nombre=$newnombre;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcosto(?float $newcosto)
	{
		try {
			if($this->costo!==$newcosto) {
				if($newcosto===null && $newcosto!='') {
					throw new Exception('producto:Valor nulo no permitido en columna costo');
				}

				if($newcosto!=0) {
					if($newcosto!==null && filter_var($newcosto,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('producto:No es numero decimal - costo='.$newcosto);
					}
				}

				$this->costo=$newcosto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setactivo(?bool $newactivo)
	{
		try {
			if($this->activo!==$newactivo) {
				if($newactivo===null && $newactivo!='') {
					throw new Exception('producto:Valor nulo no permitido en columna activo');
				}

				if($newactivo!==null && filter_var($newactivo,FILTER_VALIDATE_BOOLEAN)===false && $newactivo!==0 && $newactivo!==false) {
					throw new Exception('producto:No es valor booleano - activo='.$newactivo);
				}

				$this->activo=$newactivo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_tipo_producto(?int $newid_tipo_producto)
	{
		try {
			if($this->id_tipo_producto!==$newid_tipo_producto) {
				if($newid_tipo_producto===null && $newid_tipo_producto!='') {
					throw new Exception('producto:Valor nulo no permitido en columna id_tipo_producto');
				}

				if($newid_tipo_producto!==null && filter_var($newid_tipo_producto,FILTER_VALIDATE_INT)===false) {
					throw new Exception('producto:No es numero entero - id_tipo_producto='.$newid_tipo_producto);
				}

				$this->id_tipo_producto=$newid_tipo_producto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_tipo_producto_Descripcion(string $newid_tipo_producto_Descripcion)
	{
		try {
			if($this->id_tipo_producto_Descripcion!=$newid_tipo_producto_Descripcion) {
				if($newid_tipo_producto_Descripcion===null && $newid_tipo_producto_Descripcion!='') {
					throw new Exception('producto:Valor nulo no permitido en columna id_tipo_producto');
				}

				$this->id_tipo_producto_Descripcion=$newid_tipo_producto_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcantidad_inicial(?float $newcantidad_inicial)
	{
		try {
			if($this->cantidad_inicial!==$newcantidad_inicial) {
				if($newcantidad_inicial===null && $newcantidad_inicial!='') {
					throw new Exception('producto:Valor nulo no permitido en columna cantidad_inicial');
				}

				if($newcantidad_inicial!=0) {
					if($newcantidad_inicial!==null && filter_var($newcantidad_inicial,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('producto:No es numero decimal - cantidad_inicial='.$newcantidad_inicial);
					}
				}

				$this->cantidad_inicial=$newcantidad_inicial;
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
					throw new Exception('producto:Valor nulo no permitido en columna id_impuesto');
				}

				if($newid_impuesto!==null && filter_var($newid_impuesto,FILTER_VALIDATE_INT)===false) {
					throw new Exception('producto:No es numero entero - id_impuesto='.$newid_impuesto);
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
					throw new Exception('producto:Valor nulo no permitido en columna id_impuesto');
				}

				$this->id_impuesto_Descripcion=$newid_impuesto_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_otro_impuesto(?int $newid_otro_impuesto) {
		if($this->id_otro_impuesto!==$newid_otro_impuesto) {

				if($newid_otro_impuesto!==null && filter_var($newid_otro_impuesto,FILTER_VALIDATE_INT)===false) {
					throw new Exception('producto:No es numero entero - id_otro_impuesto');
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
    
	public function setimpuesto_ventas(?bool $newimpuesto_ventas)
	{
		try {
			if($this->impuesto_ventas!==$newimpuesto_ventas) {
				if($newimpuesto_ventas===null && $newimpuesto_ventas!='') {
					throw new Exception('producto:Valor nulo no permitido en columna impuesto_ventas');
				}

				if($newimpuesto_ventas!==null && filter_var($newimpuesto_ventas,FILTER_VALIDATE_BOOLEAN)===false && $newimpuesto_ventas!==0 && $newimpuesto_ventas!==false) {
					throw new Exception('producto:No es valor booleano - impuesto_ventas='.$newimpuesto_ventas);
				}

				$this->impuesto_ventas=$newimpuesto_ventas;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setotro_impuesto_ventas(?bool $newotro_impuesto_ventas)
	{
		try {
			if($this->otro_impuesto_ventas!==$newotro_impuesto_ventas) {
				if($newotro_impuesto_ventas===null && $newotro_impuesto_ventas!='') {
					throw new Exception('producto:Valor nulo no permitido en columna otro_impuesto_ventas');
				}

				if($newotro_impuesto_ventas!==null && filter_var($newotro_impuesto_ventas,FILTER_VALIDATE_BOOLEAN)===false && $newotro_impuesto_ventas!==0 && $newotro_impuesto_ventas!==false) {
					throw new Exception('producto:No es valor booleano - otro_impuesto_ventas='.$newotro_impuesto_ventas);
				}

				$this->otro_impuesto_ventas=$newotro_impuesto_ventas;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setimpuesto_compras(?bool $newimpuesto_compras)
	{
		try {
			if($this->impuesto_compras!==$newimpuesto_compras) {
				if($newimpuesto_compras===null && $newimpuesto_compras!='') {
					throw new Exception('producto:Valor nulo no permitido en columna impuesto_compras');
				}

				if($newimpuesto_compras!==null && filter_var($newimpuesto_compras,FILTER_VALIDATE_BOOLEAN)===false && $newimpuesto_compras!==0 && $newimpuesto_compras!==false) {
					throw new Exception('producto:No es valor booleano - impuesto_compras='.$newimpuesto_compras);
				}

				$this->impuesto_compras=$newimpuesto_compras;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setotro_impuesto_compras(?bool $newotro_impuesto_compras)
	{
		try {
			if($this->otro_impuesto_compras!==$newotro_impuesto_compras) {
				if($newotro_impuesto_compras===null && $newotro_impuesto_compras!='') {
					throw new Exception('producto:Valor nulo no permitido en columna otro_impuesto_compras');
				}

				if($newotro_impuesto_compras!==null && filter_var($newotro_impuesto_compras,FILTER_VALIDATE_BOOLEAN)===false && $newotro_impuesto_compras!==0 && $newotro_impuesto_compras!==false) {
					throw new Exception('producto:No es valor booleano - otro_impuesto_compras='.$newotro_impuesto_compras);
				}

				$this->otro_impuesto_compras=$newotro_impuesto_compras;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_categoria_producto(?int $newid_categoria_producto)
	{
		try {
			if($this->id_categoria_producto!==$newid_categoria_producto) {
				if($newid_categoria_producto===null && $newid_categoria_producto!='') {
					throw new Exception('producto:Valor nulo no permitido en columna id_categoria_producto');
				}

				if($newid_categoria_producto!==null && filter_var($newid_categoria_producto,FILTER_VALIDATE_INT)===false) {
					throw new Exception('producto:No es numero entero - id_categoria_producto='.$newid_categoria_producto);
				}

				$this->id_categoria_producto=$newid_categoria_producto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_categoria_producto_Descripcion(string $newid_categoria_producto_Descripcion)
	{
		try {
			if($this->id_categoria_producto_Descripcion!=$newid_categoria_producto_Descripcion) {
				if($newid_categoria_producto_Descripcion===null && $newid_categoria_producto_Descripcion!='') {
					throw new Exception('producto:Valor nulo no permitido en columna id_categoria_producto');
				}

				$this->id_categoria_producto_Descripcion=$newid_categoria_producto_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_sub_categoria_producto(?int $newid_sub_categoria_producto)
	{
		try {
			if($this->id_sub_categoria_producto!==$newid_sub_categoria_producto) {
				if($newid_sub_categoria_producto===null && $newid_sub_categoria_producto!='') {
					throw new Exception('producto:Valor nulo no permitido en columna id_sub_categoria_producto');
				}

				if($newid_sub_categoria_producto!==null && filter_var($newid_sub_categoria_producto,FILTER_VALIDATE_INT)===false) {
					throw new Exception('producto:No es numero entero - id_sub_categoria_producto='.$newid_sub_categoria_producto);
				}

				$this->id_sub_categoria_producto=$newid_sub_categoria_producto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_sub_categoria_producto_Descripcion(string $newid_sub_categoria_producto_Descripcion)
	{
		try {
			if($this->id_sub_categoria_producto_Descripcion!=$newid_sub_categoria_producto_Descripcion) {
				if($newid_sub_categoria_producto_Descripcion===null && $newid_sub_categoria_producto_Descripcion!='') {
					throw new Exception('producto:Valor nulo no permitido en columna id_sub_categoria_producto');
				}

				$this->id_sub_categoria_producto_Descripcion=$newid_sub_categoria_producto_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_bodega_defecto(?int $newid_bodega_defecto)
	{
		try {
			if($this->id_bodega_defecto!==$newid_bodega_defecto) {
				if($newid_bodega_defecto===null && $newid_bodega_defecto!='') {
					throw new Exception('producto:Valor nulo no permitido en columna id_bodega_defecto');
				}

				if($newid_bodega_defecto!==null && filter_var($newid_bodega_defecto,FILTER_VALIDATE_INT)===false) {
					throw new Exception('producto:No es numero entero - id_bodega_defecto='.$newid_bodega_defecto);
				}

				$this->id_bodega_defecto=$newid_bodega_defecto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_bodega_defecto_Descripcion(string $newid_bodega_defecto_Descripcion)
	{
		try {
			if($this->id_bodega_defecto_Descripcion!=$newid_bodega_defecto_Descripcion) {
				if($newid_bodega_defecto_Descripcion===null && $newid_bodega_defecto_Descripcion!='') {
					throw new Exception('producto:Valor nulo no permitido en columna id_bodega_defecto');
				}

				$this->id_bodega_defecto_Descripcion=$newid_bodega_defecto_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_unidad_compra(?int $newid_unidad_compra)
	{
		try {
			if($this->id_unidad_compra!==$newid_unidad_compra) {
				if($newid_unidad_compra===null && $newid_unidad_compra!='') {
					throw new Exception('producto:Valor nulo no permitido en columna id_unidad_compra');
				}

				if($newid_unidad_compra!==null && filter_var($newid_unidad_compra,FILTER_VALIDATE_INT)===false) {
					throw new Exception('producto:No es numero entero - id_unidad_compra='.$newid_unidad_compra);
				}

				$this->id_unidad_compra=$newid_unidad_compra;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_unidad_compra_Descripcion(string $newid_unidad_compra_Descripcion)
	{
		try {
			if($this->id_unidad_compra_Descripcion!=$newid_unidad_compra_Descripcion) {
				if($newid_unidad_compra_Descripcion===null && $newid_unidad_compra_Descripcion!='') {
					throw new Exception('producto:Valor nulo no permitido en columna id_unidad_compra');
				}

				$this->id_unidad_compra_Descripcion=$newid_unidad_compra_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setequivalencia_compra(?float $newequivalencia_compra)
	{
		try {
			if($this->equivalencia_compra!==$newequivalencia_compra) {
				if($newequivalencia_compra===null && $newequivalencia_compra!='') {
					throw new Exception('producto:Valor nulo no permitido en columna equivalencia_compra');
				}

				if($newequivalencia_compra!=0) {
					if($newequivalencia_compra!==null && filter_var($newequivalencia_compra,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('producto:No es numero decimal - equivalencia_compra='.$newequivalencia_compra);
					}
				}

				$this->equivalencia_compra=$newequivalencia_compra;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_unidad_venta(?int $newid_unidad_venta)
	{
		try {
			if($this->id_unidad_venta!==$newid_unidad_venta) {
				if($newid_unidad_venta===null && $newid_unidad_venta!='') {
					throw new Exception('producto:Valor nulo no permitido en columna id_unidad_venta');
				}

				if($newid_unidad_venta!==null && filter_var($newid_unidad_venta,FILTER_VALIDATE_INT)===false) {
					throw new Exception('producto:No es numero entero - id_unidad_venta='.$newid_unidad_venta);
				}

				$this->id_unidad_venta=$newid_unidad_venta;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_unidad_venta_Descripcion(string $newid_unidad_venta_Descripcion)
	{
		try {
			if($this->id_unidad_venta_Descripcion!=$newid_unidad_venta_Descripcion) {
				if($newid_unidad_venta_Descripcion===null && $newid_unidad_venta_Descripcion!='') {
					throw new Exception('producto:Valor nulo no permitido en columna id_unidad_venta');
				}

				$this->id_unidad_venta_Descripcion=$newid_unidad_venta_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setequivalencia_venta(?float $newequivalencia_venta)
	{
		try {
			if($this->equivalencia_venta!==$newequivalencia_venta) {
				if($newequivalencia_venta===null && $newequivalencia_venta!='') {
					throw new Exception('producto:Valor nulo no permitido en columna equivalencia_venta');
				}

				if($newequivalencia_venta!=0) {
					if($newequivalencia_venta!==null && filter_var($newequivalencia_venta,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('producto:No es numero decimal - equivalencia_venta='.$newequivalencia_venta);
					}
				}

				$this->equivalencia_venta=$newequivalencia_venta;
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
						throw new Exception('producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=descripcion en columna descripcion');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newdescripcion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('producto:Formato incorrecto en la columna descripcion='.$newdescripcion);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->descripcion=$newdescripcion;
			$this->setIsChanged(true);
		}
	}
    
	public function setimagen(?string $newimagen) {
		if($this->imagen!==$newimagen) {

				if(strlen($newimagen)>1000) {
					try {
						throw new Exception('producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=imagen en columna imagen');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newimagen,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('producto:Formato incorrecto en la columna imagen='.$newimagen);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->imagen=$newimagen;
			$this->setIsChanged(true);
		}
	}
    
	public function setobservacion(?string $newobservacion) {
		if($this->observacion!==$newobservacion) {

				if(strlen($newobservacion)>1000) {
					try {
						throw new Exception('producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=observacion en columna observacion');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newobservacion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('producto:Formato incorrecto en la columna observacion='.$newobservacion);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->observacion=$newobservacion;
			$this->setIsChanged(true);
		}
	}
    
	public function setcomenta_factura(?bool $newcomenta_factura)
	{
		try {
			if($this->comenta_factura!==$newcomenta_factura) {
				if($newcomenta_factura===null && $newcomenta_factura!='') {
					throw new Exception('producto:Valor nulo no permitido en columna comenta_factura');
				}

				if($newcomenta_factura!==null && filter_var($newcomenta_factura,FILTER_VALIDATE_BOOLEAN)===false && $newcomenta_factura!==0 && $newcomenta_factura!==false) {
					throw new Exception('producto:No es valor booleano - comenta_factura='.$newcomenta_factura);
				}

				$this->comenta_factura=$newcomenta_factura;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcodigo_fabricante(?string $newcodigo_fabricante) {
		if($this->codigo_fabricante!==$newcodigo_fabricante) {

				if(strlen($newcodigo_fabricante)>24) {
					try {
						throw new Exception('producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=codigo_fabricante en columna codigo_fabricante');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newcodigo_fabricante,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('producto:Formato incorrecto en la columna codigo_fabricante='.$newcodigo_fabricante);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->codigo_fabricante=$newcodigo_fabricante;
			$this->setIsChanged(true);
		}
	}
    
	public function setcantidad(?float $newcantidad) {
		if($this->cantidad!==$newcantidad) {

				if($newcantidad!==null && filter_var($newcantidad,FILTER_VALIDATE_FLOAT)===false) {
					throw new Exception('producto:No es numero decimal - cantidad');
				}

			$this->cantidad=$newcantidad;
			$this->setIsChanged(true);
		}
	}
    
	public function setcantidad_minima(?float $newcantidad_minima)
	{
		try {
			if($this->cantidad_minima!==$newcantidad_minima) {
				if($newcantidad_minima===null && $newcantidad_minima!='') {
					throw new Exception('producto:Valor nulo no permitido en columna cantidad_minima');
				}

				if($newcantidad_minima!=0) {
					if($newcantidad_minima!==null && filter_var($newcantidad_minima,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('producto:No es numero decimal - cantidad_minima='.$newcantidad_minima);
					}
				}

				$this->cantidad_minima=$newcantidad_minima;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcantidad_maxima(?float $newcantidad_maxima)
	{
		try {
			if($this->cantidad_maxima!==$newcantidad_maxima) {
				if($newcantidad_maxima===null && $newcantidad_maxima!='') {
					throw new Exception('producto:Valor nulo no permitido en columna cantidad_maxima');
				}

				if($newcantidad_maxima!=0) {
					if($newcantidad_maxima!==null && filter_var($newcantidad_maxima,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('producto:No es numero decimal - cantidad_maxima='.$newcantidad_maxima);
					}
				}

				$this->cantidad_maxima=$newcantidad_maxima;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setfactura_sin_stock(?bool $newfactura_sin_stock)
	{
		try {
			if($this->factura_sin_stock!==$newfactura_sin_stock) {
				if($newfactura_sin_stock===null && $newfactura_sin_stock!='') {
					throw new Exception('producto:Valor nulo no permitido en columna factura_sin_stock');
				}

				if($newfactura_sin_stock!==null && filter_var($newfactura_sin_stock,FILTER_VALIDATE_BOOLEAN)===false && $newfactura_sin_stock!==0 && $newfactura_sin_stock!==false) {
					throw new Exception('producto:No es valor booleano - factura_sin_stock='.$newfactura_sin_stock);
				}

				$this->factura_sin_stock=$newfactura_sin_stock;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setmostrar_componente(?bool $newmostrar_componente)
	{
		try {
			if($this->mostrar_componente!==$newmostrar_componente) {
				if($newmostrar_componente===null && $newmostrar_componente!='') {
					throw new Exception('producto:Valor nulo no permitido en columna mostrar_componente');
				}

				if($newmostrar_componente!==null && filter_var($newmostrar_componente,FILTER_VALIDATE_BOOLEAN)===false && $newmostrar_componente!==0 && $newmostrar_componente!==false) {
					throw new Exception('producto:No es valor booleano - mostrar_componente='.$newmostrar_componente);
				}

				$this->mostrar_componente=$newmostrar_componente;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setproducto_equivalente(?bool $newproducto_equivalente)
	{
		try {
			if($this->producto_equivalente!==$newproducto_equivalente) {
				if($newproducto_equivalente===null && $newproducto_equivalente!='') {
					throw new Exception('producto:Valor nulo no permitido en columna producto_equivalente');
				}

				if($newproducto_equivalente!==null && filter_var($newproducto_equivalente,FILTER_VALIDATE_BOOLEAN)===false && $newproducto_equivalente!==0 && $newproducto_equivalente!==false) {
					throw new Exception('producto:No es valor booleano - producto_equivalente='.$newproducto_equivalente);
				}

				$this->producto_equivalente=$newproducto_equivalente;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setavisa_expiracion(?bool $newavisa_expiracion)
	{
		try {
			if($this->avisa_expiracion!==$newavisa_expiracion) {
				if($newavisa_expiracion===null && $newavisa_expiracion!='') {
					throw new Exception('producto:Valor nulo no permitido en columna avisa_expiracion');
				}

				if($newavisa_expiracion!==null && filter_var($newavisa_expiracion,FILTER_VALIDATE_BOOLEAN)===false && $newavisa_expiracion!==0 && $newavisa_expiracion!==false) {
					throw new Exception('producto:No es valor booleano - avisa_expiracion='.$newavisa_expiracion);
				}

				$this->avisa_expiracion=$newavisa_expiracion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setrequiere_serie(?bool $newrequiere_serie)
	{
		try {
			if($this->requiere_serie!==$newrequiere_serie) {
				if($newrequiere_serie===null && $newrequiere_serie!='') {
					throw new Exception('producto:Valor nulo no permitido en columna requiere_serie');
				}

				if($newrequiere_serie!==null && filter_var($newrequiere_serie,FILTER_VALIDATE_BOOLEAN)===false && $newrequiere_serie!==0 && $newrequiere_serie!==false) {
					throw new Exception('producto:No es valor booleano - requiere_serie='.$newrequiere_serie);
				}

				$this->requiere_serie=$newrequiere_serie;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setacepta_lote(?bool $newacepta_lote)
	{
		try {
			if($this->acepta_lote!==$newacepta_lote) {
				if($newacepta_lote===null && $newacepta_lote!='') {
					throw new Exception('producto:Valor nulo no permitido en columna acepta_lote');
				}

				if($newacepta_lote!==null && filter_var($newacepta_lote,FILTER_VALIDATE_BOOLEAN)===false && $newacepta_lote!==0 && $newacepta_lote!==false) {
					throw new Exception('producto:No es valor booleano - acepta_lote='.$newacepta_lote);
				}

				$this->acepta_lote=$newacepta_lote;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_cuenta_venta(?int $newid_cuenta_venta) {
		if($this->id_cuenta_venta!==$newid_cuenta_venta) {

				if($newid_cuenta_venta!==null && filter_var($newid_cuenta_venta,FILTER_VALIDATE_INT)===false) {
					throw new Exception('producto:No es numero entero - id_cuenta_venta');
				}

			$this->id_cuenta_venta=$newid_cuenta_venta;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_cuenta_venta_Descripcion(string $newid_cuenta_venta_Descripcion) {
		if($this->id_cuenta_venta_Descripcion!=$newid_cuenta_venta_Descripcion) {

			$this->id_cuenta_venta_Descripcion=$newid_cuenta_venta_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function setid_cuenta_compra(?int $newid_cuenta_compra) {
		if($this->id_cuenta_compra!==$newid_cuenta_compra) {

				if($newid_cuenta_compra!==null && filter_var($newid_cuenta_compra,FILTER_VALIDATE_INT)===false) {
					throw new Exception('producto:No es numero entero - id_cuenta_compra');
				}

			$this->id_cuenta_compra=$newid_cuenta_compra;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_cuenta_compra_Descripcion(string $newid_cuenta_compra_Descripcion) {
		if($this->id_cuenta_compra_Descripcion!=$newid_cuenta_compra_Descripcion) {

			$this->id_cuenta_compra_Descripcion=$newid_cuenta_compra_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function setid_cuenta_costo(?int $newid_cuenta_costo) {
		if($this->id_cuenta_costo!==$newid_cuenta_costo) {

				if($newid_cuenta_costo!==null && filter_var($newid_cuenta_costo,FILTER_VALIDATE_INT)===false) {
					throw new Exception('producto:No es numero entero - id_cuenta_costo');
				}

			$this->id_cuenta_costo=$newid_cuenta_costo;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_cuenta_costo_Descripcion(string $newid_cuenta_costo_Descripcion) {
		if($this->id_cuenta_costo_Descripcion!=$newid_cuenta_costo_Descripcion) {

			$this->id_cuenta_costo_Descripcion=$newid_cuenta_costo_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function setvalor_inventario(?float $newvalor_inventario)
	{
		try {
			if($this->valor_inventario!==$newvalor_inventario) {
				if($newvalor_inventario===null && $newvalor_inventario!='') {
					throw new Exception('producto:Valor nulo no permitido en columna valor_inventario');
				}

				if($newvalor_inventario!=0) {
					if($newvalor_inventario!==null && filter_var($newvalor_inventario,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('producto:No es numero decimal - valor_inventario='.$newvalor_inventario);
					}
				}

				$this->valor_inventario=$newvalor_inventario;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setproducto_fisico(?int $newproducto_fisico)
	{
		try {
			if($this->producto_fisico!==$newproducto_fisico) {
				if($newproducto_fisico===null && $newproducto_fisico!='') {
					throw new Exception('producto:Valor nulo no permitido en columna producto_fisico');
				}

				if($newproducto_fisico!==null && filter_var($newproducto_fisico,FILTER_VALIDATE_INT)===false) {
					throw new Exception('producto:No es numero entero - producto_fisico='.$newproducto_fisico);
				}

				$this->producto_fisico=$newproducto_fisico;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setultima_venta(?string $newultima_venta)
	{
		try {
			if($this->ultima_venta!==$newultima_venta) {
				if($newultima_venta===null && $newultima_venta!='') {
					throw new Exception('producto:Valor nulo no permitido en columna ultima_venta');
				}

				if($newultima_venta!==null && filter_var($newultima_venta,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('producto:No es fecha - ultima_venta='.$newultima_venta);
				}

				$this->ultima_venta=$newultima_venta;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setprecio_actualizado(?string $newprecio_actualizado)
	{
		try {
			if($this->precio_actualizado!==$newprecio_actualizado) {
				if($newprecio_actualizado===null && $newprecio_actualizado!='') {
					throw new Exception('producto:Valor nulo no permitido en columna precio_actualizado');
				}

				if($newprecio_actualizado!==null && filter_var($newprecio_actualizado,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('producto:No es fecha - precio_actualizado='.$newprecio_actualizado);
				}

				$this->precio_actualizado=$newprecio_actualizado;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_retencion(?int $newid_retencion) {
		if($this->id_retencion!==$newid_retencion) {

				if($newid_retencion!==null && filter_var($newid_retencion,FILTER_VALIDATE_INT)===false) {
					throw new Exception('producto:No es numero entero - id_retencion');
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
    
	public function setretencion_ventas(?bool $newretencion_ventas)
	{
		try {
			if($this->retencion_ventas!==$newretencion_ventas) {
				if($newretencion_ventas===null && $newretencion_ventas!='') {
					throw new Exception('producto:Valor nulo no permitido en columna retencion_ventas');
				}

				if($newretencion_ventas!==null && filter_var($newretencion_ventas,FILTER_VALIDATE_BOOLEAN)===false && $newretencion_ventas!==0 && $newretencion_ventas!==false) {
					throw new Exception('producto:No es valor booleano - retencion_ventas='.$newretencion_ventas);
				}

				$this->retencion_ventas=$newretencion_ventas;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setretencion_compras(?bool $newretencion_compras)
	{
		try {
			if($this->retencion_compras!==$newretencion_compras) {
				if($newretencion_compras===null && $newretencion_compras!='') {
					throw new Exception('producto:Valor nulo no permitido en columna retencion_compras');
				}

				if($newretencion_compras!==null && filter_var($newretencion_compras,FILTER_VALIDATE_BOOLEAN)===false && $newretencion_compras!==0 && $newretencion_compras!==false) {
					throw new Exception('producto:No es valor booleano - retencion_compras='.$newretencion_compras);
				}

				$this->retencion_compras=$newretencion_compras;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setfactura_con_precio(?int $newfactura_con_precio)
	{
		try {
			if($this->factura_con_precio!==$newfactura_con_precio) {
				if($newfactura_con_precio===null && $newfactura_con_precio!='') {
					throw new Exception('producto:Valor nulo no permitido en columna factura_con_precio');
				}

				if($newfactura_con_precio!==null && filter_var($newfactura_con_precio,FILTER_VALIDATE_INT)===false) {
					throw new Exception('producto:No es numero entero - factura_con_precio='.$newfactura_con_precio);
				}

				$this->factura_con_precio=$newfactura_con_precio;
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

	public function getproveedor() : ?proveedor {
		return $this->proveedor;
	}

	public function gettipo_producto() : ?tipo_producto {
		return $this->tipo_producto;
	}

	public function getimpuesto() : ?impuesto {
		return $this->impuesto;
	}

	public function getotro_impuesto() : ?otro_impuesto {
		return $this->otro_impuesto;
	}

	public function getcategoria_producto() : ?categoria_producto {
		return $this->categoria_producto;
	}

	public function getsub_categoria_producto() : ?sub_categoria_producto {
		return $this->sub_categoria_producto;
	}

	public function getbodega_defecto() : ?bodega {
		return $this->bodega_defecto;
	}

	public function getunidad_compra() : ?unidad {
		return $this->unidad_compra;
	}

	public function getunidad_venta() : ?unidad {
		return $this->unidad_venta;
	}

	public function getcuenta_venta() : ?cuenta {
		return $this->cuenta_venta;
	}

	public function getcuenta_compra() : ?cuenta {
		return $this->cuenta_compra;
	}

	public function getcuenta_costo() : ?cuenta {
		return $this->cuenta_costo;
	}

	public function getretencion() : ?retencion {
		return $this->retencion;
	}

	
	
	public  function  setempresa(?empresa $empresa) {
		try {
			$this->empresa=$empresa;
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


	public  function  settipo_producto(?tipo_producto $tipo_producto) {
		try {
			$this->tipo_producto=$tipo_producto;
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


	public  function  setotro_impuesto(?otro_impuesto $otro_impuesto) {
		try {
			$this->otro_impuesto=$otro_impuesto;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setcategoria_producto(?categoria_producto $categoria_producto) {
		try {
			$this->categoria_producto=$categoria_producto;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setsub_categoria_producto(?sub_categoria_producto $sub_categoria_producto) {
		try {
			$this->sub_categoria_producto=$sub_categoria_producto;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setbodega_defecto(?bodega $bodega_defecto) {
		try {
			$this->bodega_defecto=$bodega_defecto;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setunidad_compra(?unidad $unidad_compra) {
		try {
			$this->unidad_compra=$unidad_compra;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setunidad_venta(?unidad $unidad_venta) {
		try {
			$this->unidad_venta=$unidad_venta;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setcuenta_venta(?cuenta $cuenta_venta) {
		try {
			$this->cuenta_venta=$cuenta_venta;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setcuenta_compra(?cuenta $cuenta_compra) {
		try {
			$this->cuenta_compra=$cuenta_compra;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setcuenta_costo(?cuenta $cuenta_costo) {
		try {
			$this->cuenta_costo=$cuenta_costo;
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

	
	
	/*RELACIONES*/
	
	public function getlista_precios() : array {
		return $this->listaprecios;
	}

	public function getproducto_bodegas() : array {
		return $this->productobodegas;
	}

	public function getotro_suplidors() : array {
		return $this->otrosuplidors;
	}

	public function getlista_clientes() : array {
		return $this->listaclientes;
	}

	public function getbodegas() : array {
		return $this->bodegas;
	}

	public function getimagen_productos() : array {
		return $this->imagenproductos;
	}

	public function getlista_productos() : array {
		return $this->listaproductos;
	}

	
	
	public  function  setlista_precios(array $listaprecios) {
		try {
			$this->listaprecios=$listaprecios;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setproducto_bodegas(array $productobodegas) {
		try {
			$this->productobodegas=$productobodegas;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setotro_suplidors(array $otrosuplidors) {
		try {
			$this->otrosuplidors=$otrosuplidors;
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

	public  function  setbodegas(array $bodegas) {
		try {
			$this->bodegas=$bodegas;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setimagen_productos(array $imagenproductos) {
		try {
			$this->imagenproductos=$imagenproductos;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setlista_productos(array $listaproductos) {
		try {
			$this->listaproductos=$listaproductos;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_productoValue(string $sKey,$oValue) {
		$this->map_producto[$sKey]=$oValue;
	}
	
	public function getMap_productoValue(string $sKey) {
		return $this->map_producto[$sKey];
	}
	
	public function getproducto_Original() : ?producto {
		return $this->producto_Original;
	}
	
	public function setproducto_Original(producto $producto) {
		try {
			$this->producto_Original=$producto;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_producto() : array {
		return $this->map_producto;
	}

	public function setMap_producto(array $map_producto) {
		$this->map_producto = $map_producto;
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
