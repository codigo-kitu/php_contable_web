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
namespace com\bydan\contabilidad\inventario\lista_producto\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\facturacion\impuesto\business\entity\impuesto;
use com\bydan\contabilidad\facturacion\otro_impuesto\business\entity\otro_impuesto;
use com\bydan\contabilidad\facturacion\retencion\business\entity\retencion;

class lista_producto extends GeneralEntity {

	/*GENERAL*/
	public static string $class='lista_producto';
	
	/*AUXILIARES*/
	public ?lista_producto $lista_producto_Original=null;	
	public ?GeneralEntity $lista_producto_Additional=null;
	public array $map_lista_producto=array();	
		
	/*CAMPOS*/
	public int $id_producto = -1;
	public string $id_producto_Descripcion = '';

	public string $codigo_producto = '';
	public string $descripcion_producto = '';
	public float $precio1 = 0.0;
	public float $precio2 = 0.0;
	public float $precio3 = 0.0;
	public float $precio4 = 0.0;
	public float $costo = 0.0;
	public int $id_unidad_compra = -1;
	public string $id_unidad_compra_Descripcion = '';

	public int $unidad_en_compra = 0;
	public float $equivalencia_en_compra = 0.0;
	public int $id_unidad_venta = -1;
	public string $id_unidad_venta_Descripcion = '';

	public int $unidad_en_venta = 0;
	public float $equivalencia_en_venta = 0.0;
	public float $cantidad_total = 0.0;
	public float $cantidad_minima = 0.0;
	public int $id_categoria_producto = -1;
	public string $id_categoria_producto_Descripcion = '';

	public int $id_sub_categoria_producto = -1;
	public string $id_sub_categoria_producto_Descripcion = '';

	public string $acepta_lote = '';
	public float $valor_inventario = 0.0;
	public string $imagen = '';
	public float $incremento1 = 0.0;
	public float $incremento2 = 0.0;
	public float $incremento3 = 0.0;
	public float $incremento4 = 0.0;
	public string $codigo_fabricante = '';
	public int $producto_fisico = 0;
	public int $situacion_producto = 0;
	public int $id_tipo_producto = -1;
	public string $id_tipo_producto_Descripcion = '';

	public string $tipo_producto_codigo = '';
	public int $id_bodega = -1;
	public string $id_bodega_Descripcion = '';

	public string $mostrar_componente = '';
	public string $factura_sin_stock = '';
	public string $avisa_expiracion = '';
	public int $factura_con_precio = 0;
	public string $producto_equivalente = '';
	public int $id_cuenta_compra = -1;
	public string $id_cuenta_compra_Descripcion = '';

	public int $id_cuenta_venta = -1;
	public string $id_cuenta_venta_Descripcion = '';

	public int $id_cuenta_inventario = -1;
	public string $id_cuenta_inventario_Descripcion = '';

	public string $cuenta_compra_codigo = '';
	public string $cuenta_venta_codigo = '';
	public string $cuenta_inventario_codigo = '';
	public int $id_otro_suplidor = -1;
	public string $id_otro_suplidor_Descripcion = '';

	public int $id_impuesto = -1;
	public string $id_impuesto_Descripcion = '';

	public int $id_impuesto_ventas = -1;
	public string $id_impuesto_ventas_Descripcion = '';

	public int $id_impuesto_compras = -1;
	public string $id_impuesto_compras_Descripcion = '';

	public string $impuesto1_en_ventas = '';
	public string $impuesto1_en_compras = '';
	public string $ultima_venta = '';
	public int $id_otro_impuesto = -1;
	public string $id_otro_impuesto_Descripcion = '';

	public int $id_otro_impuesto_ventas = -1;
	public string $id_otro_impuesto_ventas_Descripcion = '';

	public int $id_otro_impuesto_compras = -1;
	public string $id_otro_impuesto_compras_Descripcion = '';

	public string $otro_impuesto_ventas_codigo = '';
	public string $otro_impuesto_compras_codigo = '';
	public float $precio_de_compra_0 = 0.0;
	public string $precio_actualizado = '';
	public string $requiere_nro_serie = '';
	public float $costo_dolar = 0.0;
	public string $comentario = '';
	public string $comenta_factura = '';
	public int $id_retencion = -1;
	public string $id_retencion_Descripcion = '';

	public int $id_retencion_ventas = -1;
	public string $id_retencion_ventas_Descripcion = '';

	public int $id_retencion_compras = -1;
	public string $id_retencion_compras_Descripcion = '';

	public string $retencion_ventas_codigo = '';
	public string $retencion_compras_codigo = '';
	public string $notas = '';
	
	/*FKs*/
	
	public ?producto $producto = null;
	public ?unidad $unidad_compra = null;
	public ?unidad $unidad_venta = null;
	public ?categoria_producto $categoria_producto = null;
	public ?sub_categoria_producto $sub_categoria_producto = null;
	public ?tipo_producto $tipo_producto = null;
	public ?bodega $bodega = null;
	public ?cuenta $cuenta_compra = null;
	public ?cuenta $cuenta_venta = null;
	public ?cuenta $cuenta_inventario = null;
	public ?otro_suplidor $otro_suplidor = null;
	public ?impuesto $impuesto = null;
	public ?impuesto $impuesto_ventas = null;
	public ?impuesto $impuesto_compras = null;
	public ?otro_impuesto $otro_impuesto = null;
	public ?otro_impuesto $otro_impuesto_ventas = null;
	public ?otro_impuesto $otro_impuesto_compras = null;
	public ?retencion $retencion = null;
	public ?retencion $retencion_ventas = null;
	public ?retencion $retencion_compras = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->lista_producto_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_producto=-1;
		$this->id_producto_Descripcion='';

 		$this->codigo_producto='';
 		$this->descripcion_producto='';
 		$this->precio1=0.0;
 		$this->precio2=0.0;
 		$this->precio3=0.0;
 		$this->precio4=0.0;
 		$this->costo=0.0;
 		$this->id_unidad_compra=-1;
		$this->id_unidad_compra_Descripcion='';

 		$this->unidad_en_compra=0;
 		$this->equivalencia_en_compra=0.0;
 		$this->id_unidad_venta=-1;
		$this->id_unidad_venta_Descripcion='';

 		$this->unidad_en_venta=0;
 		$this->equivalencia_en_venta=0.0;
 		$this->cantidad_total=0.0;
 		$this->cantidad_minima=0.0;
 		$this->id_categoria_producto=-1;
		$this->id_categoria_producto_Descripcion='';

 		$this->id_sub_categoria_producto=-1;
		$this->id_sub_categoria_producto_Descripcion='';

 		$this->acepta_lote='';
 		$this->valor_inventario=0.0;
 		$this->imagen='';
 		$this->incremento1=0.0;
 		$this->incremento2=0.0;
 		$this->incremento3=0.0;
 		$this->incremento4=0.0;
 		$this->codigo_fabricante='';
 		$this->producto_fisico=0;
 		$this->situacion_producto=0;
 		$this->id_tipo_producto=-1;
		$this->id_tipo_producto_Descripcion='';

 		$this->tipo_producto_codigo='';
 		$this->id_bodega=-1;
		$this->id_bodega_Descripcion='';

 		$this->mostrar_componente='';
 		$this->factura_sin_stock='';
 		$this->avisa_expiracion='';
 		$this->factura_con_precio=0;
 		$this->producto_equivalente='';
 		$this->id_cuenta_compra=-1;
		$this->id_cuenta_compra_Descripcion='';

 		$this->id_cuenta_venta=-1;
		$this->id_cuenta_venta_Descripcion='';

 		$this->id_cuenta_inventario=-1;
		$this->id_cuenta_inventario_Descripcion='';

 		$this->cuenta_compra_codigo='';
 		$this->cuenta_venta_codigo='';
 		$this->cuenta_inventario_codigo='';
 		$this->id_otro_suplidor=-1;
		$this->id_otro_suplidor_Descripcion='';

 		$this->id_impuesto=-1;
		$this->id_impuesto_Descripcion='';

 		$this->id_impuesto_ventas=-1;
		$this->id_impuesto_ventas_Descripcion='';

 		$this->id_impuesto_compras=-1;
		$this->id_impuesto_compras_Descripcion='';

 		$this->impuesto1_en_ventas='';
 		$this->impuesto1_en_compras='';
 		$this->ultima_venta=date('Y-m-d');
 		$this->id_otro_impuesto=-1;
		$this->id_otro_impuesto_Descripcion='';

 		$this->id_otro_impuesto_ventas=-1;
		$this->id_otro_impuesto_ventas_Descripcion='';

 		$this->id_otro_impuesto_compras=-1;
		$this->id_otro_impuesto_compras_Descripcion='';

 		$this->otro_impuesto_ventas_codigo='';
 		$this->otro_impuesto_compras_codigo='';
 		$this->precio_de_compra_0=0.0;
 		$this->precio_actualizado=date('Y-m-d');
 		$this->requiere_nro_serie='';
 		$this->costo_dolar=0.0;
 		$this->comentario='';
 		$this->comenta_factura='';
 		$this->id_retencion=-1;
		$this->id_retencion_Descripcion='';

 		$this->id_retencion_ventas=-1;
		$this->id_retencion_ventas_Descripcion='';

 		$this->id_retencion_compras=-1;
		$this->id_retencion_compras_Descripcion='';

 		$this->retencion_ventas_codigo='';
 		$this->retencion_compras_codigo='';
 		$this->notas='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->producto=new producto();
			$this->unidad_compra=new unidad();
			$this->unidad_venta=new unidad();
			$this->categoria_producto=new categoria_producto();
			$this->sub_categoria_producto=new sub_categoria_producto();
			$this->tipo_producto=new tipo_producto();
			$this->bodega=new bodega();
			$this->cuenta_compra=new cuenta();
			$this->cuenta_venta=new cuenta();
			$this->cuenta_inventario=new cuenta();
			$this->otro_suplidor=new otro_suplidor();
			$this->impuesto=new impuesto();
			$this->impuesto_ventas=new impuesto();
			$this->impuesto_compras=new impuesto();
			$this->otro_impuesto=new otro_impuesto();
			$this->otro_impuesto_ventas=new otro_impuesto();
			$this->otro_impuesto_compras=new otro_impuesto();
			$this->retencion=new retencion();
			$this->retencion_ventas=new retencion();
			$this->retencion_compras=new retencion();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->lista_producto_Additional=new lista_producto_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_lista_producto() {
		$this->map_lista_producto = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_producto() : ?int {
		return $this->id_producto;
	}
	
	public function  getid_producto_Descripcion() : string {
		return $this->id_producto_Descripcion;
	}
    
	public function  getcodigo_producto() : ?string {
		return $this->codigo_producto;
	}
    
	public function  getdescripcion_producto() : ?string {
		return $this->descripcion_producto;
	}
    
	public function  getprecio1() : ?float {
		return $this->precio1;
	}
    
	public function  getprecio2() : ?float {
		return $this->precio2;
	}
    
	public function  getprecio3() : ?float {
		return $this->precio3;
	}
    
	public function  getprecio4() : ?float {
		return $this->precio4;
	}
    
	public function  getcosto() : ?float {
		return $this->costo;
	}
    
	public function  getid_unidad_compra() : ?int {
		return $this->id_unidad_compra;
	}
	
	public function  getid_unidad_compra_Descripcion() : string {
		return $this->id_unidad_compra_Descripcion;
	}
    
	public function  getunidad_en_compra() : ?int {
		return $this->unidad_en_compra;
	}
    
	public function  getequivalencia_en_compra() : ?float {
		return $this->equivalencia_en_compra;
	}
    
	public function  getid_unidad_venta() : ?int {
		return $this->id_unidad_venta;
	}
	
	public function  getid_unidad_venta_Descripcion() : string {
		return $this->id_unidad_venta_Descripcion;
	}
    
	public function  getunidad_en_venta() : ?int {
		return $this->unidad_en_venta;
	}
    
	public function  getequivalencia_en_venta() : ?float {
		return $this->equivalencia_en_venta;
	}
    
	public function  getcantidad_total() : ?float {
		return $this->cantidad_total;
	}
    
	public function  getcantidad_minima() : ?float {
		return $this->cantidad_minima;
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
    
	public function  getacepta_lote() : ?string {
		return $this->acepta_lote;
	}
    
	public function  getvalor_inventario() : ?float {
		return $this->valor_inventario;
	}
    
	public function  getimagen() : ?string {
		return $this->imagen;
	}
    
	public function  getincremento1() : ?float {
		return $this->incremento1;
	}
    
	public function  getincremento2() : ?float {
		return $this->incremento2;
	}
    
	public function  getincremento3() : ?float {
		return $this->incremento3;
	}
    
	public function  getincremento4() : ?float {
		return $this->incremento4;
	}
    
	public function  getcodigo_fabricante() : ?string {
		return $this->codigo_fabricante;
	}
    
	public function  getproducto_fisico() : ?int {
		return $this->producto_fisico;
	}
    
	public function  getsituacion_producto() : ?int {
		return $this->situacion_producto;
	}
    
	public function  getid_tipo_producto() : ?int {
		return $this->id_tipo_producto;
	}
	
	public function  getid_tipo_producto_Descripcion() : string {
		return $this->id_tipo_producto_Descripcion;
	}
    
	public function  gettipo_producto_codigo() : ?string {
		return $this->tipo_producto_codigo;
	}
    
	public function  getid_bodega() : ?int {
		return $this->id_bodega;
	}
	
	public function  getid_bodega_Descripcion() : string {
		return $this->id_bodega_Descripcion;
	}
    
	public function  getmostrar_componente() : ?string {
		return $this->mostrar_componente;
	}
    
	public function  getfactura_sin_stock() : ?string {
		return $this->factura_sin_stock;
	}
    
	public function  getavisa_expiracion() : ?string {
		return $this->avisa_expiracion;
	}
    
	public function  getfactura_con_precio() : ?int {
		return $this->factura_con_precio;
	}
    
	public function  getproducto_equivalente() : ?string {
		return $this->producto_equivalente;
	}
    
	public function  getid_cuenta_compra() : ?int {
		return $this->id_cuenta_compra;
	}
	
	public function  getid_cuenta_compra_Descripcion() : string {
		return $this->id_cuenta_compra_Descripcion;
	}
    
	public function  getid_cuenta_venta() : ?int {
		return $this->id_cuenta_venta;
	}
	
	public function  getid_cuenta_venta_Descripcion() : string {
		return $this->id_cuenta_venta_Descripcion;
	}
    
	public function  getid_cuenta_inventario() : ?int {
		return $this->id_cuenta_inventario;
	}
	
	public function  getid_cuenta_inventario_Descripcion() : string {
		return $this->id_cuenta_inventario_Descripcion;
	}
    
	public function  getcuenta_compra_codigo() : ?string {
		return $this->cuenta_compra_codigo;
	}
    
	public function  getcuenta_venta_codigo() : ?string {
		return $this->cuenta_venta_codigo;
	}
    
	public function  getcuenta_inventario_codigo() : ?string {
		return $this->cuenta_inventario_codigo;
	}
    
	public function  getid_otro_suplidor() : ?int {
		return $this->id_otro_suplidor;
	}
	
	public function  getid_otro_suplidor_Descripcion() : string {
		return $this->id_otro_suplidor_Descripcion;
	}
    
	public function  getid_impuesto() : ?int {
		return $this->id_impuesto;
	}
	
	public function  getid_impuesto_Descripcion() : string {
		return $this->id_impuesto_Descripcion;
	}
    
	public function  getid_impuesto_ventas() : ?int {
		return $this->id_impuesto_ventas;
	}
	
	public function  getid_impuesto_ventas_Descripcion() : string {
		return $this->id_impuesto_ventas_Descripcion;
	}
    
	public function  getid_impuesto_compras() : ?int {
		return $this->id_impuesto_compras;
	}
	
	public function  getid_impuesto_compras_Descripcion() : string {
		return $this->id_impuesto_compras_Descripcion;
	}
    
	public function  getimpuesto1_en_ventas() : ?string {
		return $this->impuesto1_en_ventas;
	}
    
	public function  getimpuesto1_en_compras() : ?string {
		return $this->impuesto1_en_compras;
	}
    
	public function  getultima_venta() : ?string {
		return $this->ultima_venta;
	}
    
	public function  getid_otro_impuesto() : ?int {
		return $this->id_otro_impuesto;
	}
	
	public function  getid_otro_impuesto_Descripcion() : string {
		return $this->id_otro_impuesto_Descripcion;
	}
    
	public function  getid_otro_impuesto_ventas() : ?int {
		return $this->id_otro_impuesto_ventas;
	}
	
	public function  getid_otro_impuesto_ventas_Descripcion() : string {
		return $this->id_otro_impuesto_ventas_Descripcion;
	}
    
	public function  getid_otro_impuesto_compras() : ?int {
		return $this->id_otro_impuesto_compras;
	}
	
	public function  getid_otro_impuesto_compras_Descripcion() : string {
		return $this->id_otro_impuesto_compras_Descripcion;
	}
    
	public function  getotro_impuesto_ventas_codigo() : ?string {
		return $this->otro_impuesto_ventas_codigo;
	}
    
	public function  getotro_impuesto_compras_codigo() : ?string {
		return $this->otro_impuesto_compras_codigo;
	}
    
	public function  getprecio_de_compra_0() : ?float {
		return $this->precio_de_compra_0;
	}
    
	public function  getprecio_actualizado() : ?string {
		return $this->precio_actualizado;
	}
    
	public function  getrequiere_nro_serie() : ?string {
		return $this->requiere_nro_serie;
	}
    
	public function  getcosto_dolar() : ?float {
		return $this->costo_dolar;
	}
    
	public function  getcomentario() : ?string {
		return $this->comentario;
	}
    
	public function  getcomenta_factura() : ?string {
		return $this->comenta_factura;
	}
    
	public function  getid_retencion() : ?int {
		return $this->id_retencion;
	}
	
	public function  getid_retencion_Descripcion() : string {
		return $this->id_retencion_Descripcion;
	}
    
	public function  getid_retencion_ventas() : ?int {
		return $this->id_retencion_ventas;
	}
	
	public function  getid_retencion_ventas_Descripcion() : string {
		return $this->id_retencion_ventas_Descripcion;
	}
    
	public function  getid_retencion_compras() : ?int {
		return $this->id_retencion_compras;
	}
	
	public function  getid_retencion_compras_Descripcion() : string {
		return $this->id_retencion_compras_Descripcion;
	}
    
	public function  getretencion_ventas_codigo() : ?string {
		return $this->retencion_ventas_codigo;
	}
    
	public function  getretencion_compras_codigo() : ?string {
		return $this->retencion_compras_codigo;
	}
    
	public function  getnotas() : ?string {
		return $this->notas;
	}
	
    
	public function setid_producto(?int $newid_producto)
	{
		try {
			if($this->id_producto!==$newid_producto) {
				if($newid_producto===null && $newid_producto!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna id_producto');
				}

				if($newid_producto!==null && filter_var($newid_producto,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lista_producto:No es numero entero - id_producto='.$newid_producto);
				}

				$this->id_producto=$newid_producto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_producto_Descripcion(string $newid_producto_Descripcion)
	{
		try {
			if($this->id_producto_Descripcion!=$newid_producto_Descripcion) {
				if($newid_producto_Descripcion===null && $newid_producto_Descripcion!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna id_producto');
				}

				$this->id_producto_Descripcion=$newid_producto_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcodigo_producto(?string $newcodigo_producto)
	{
		try {
			if($this->codigo_producto!==$newcodigo_producto) {
				if($newcodigo_producto===null && $newcodigo_producto!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna codigo_producto');
				}

				if(strlen($newcodigo_producto)>26) {
					throw new Exception('lista_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=26 en columna codigo_producto');
				}

				if(filter_var($newcodigo_producto,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('lista_producto:Formato incorrecto en columna codigo_producto='.$newcodigo_producto);
				}

				$this->codigo_producto=$newcodigo_producto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdescripcion_producto(?string $newdescripcion_producto)
	{
		try {
			if($this->descripcion_producto!==$newdescripcion_producto) {
				if($newdescripcion_producto===null && $newdescripcion_producto!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna descripcion_producto');
				}

				if(strlen($newdescripcion_producto)>70) {
					throw new Exception('lista_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=70 en columna descripcion_producto');
				}

				if(filter_var($newdescripcion_producto,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('lista_producto:Formato incorrecto en columna descripcion_producto='.$newdescripcion_producto);
				}

				$this->descripcion_producto=$newdescripcion_producto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setprecio1(?float $newprecio1)
	{
		try {
			if($this->precio1!==$newprecio1) {
				if($newprecio1===null && $newprecio1!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna precio1');
				}

				if($newprecio1!=0) {
					if($newprecio1!==null && filter_var($newprecio1,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('lista_producto:No es numero decimal - precio1='.$newprecio1);
					}
				}

				$this->precio1=$newprecio1;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setprecio2(?float $newprecio2)
	{
		try {
			if($this->precio2!==$newprecio2) {
				if($newprecio2===null && $newprecio2!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna precio2');
				}

				if($newprecio2!=0) {
					if($newprecio2!==null && filter_var($newprecio2,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('lista_producto:No es numero decimal - precio2='.$newprecio2);
					}
				}

				$this->precio2=$newprecio2;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setprecio3(?float $newprecio3)
	{
		try {
			if($this->precio3!==$newprecio3) {
				if($newprecio3===null && $newprecio3!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna precio3');
				}

				if($newprecio3!=0) {
					if($newprecio3!==null && filter_var($newprecio3,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('lista_producto:No es numero decimal - precio3='.$newprecio3);
					}
				}

				$this->precio3=$newprecio3;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setprecio4(?float $newprecio4)
	{
		try {
			if($this->precio4!==$newprecio4) {
				if($newprecio4===null && $newprecio4!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna precio4');
				}

				if($newprecio4!=0) {
					if($newprecio4!==null && filter_var($newprecio4,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('lista_producto:No es numero decimal - precio4='.$newprecio4);
					}
				}

				$this->precio4=$newprecio4;
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
					throw new Exception('lista_producto:Valor nulo no permitido en columna costo');
				}

				if($newcosto!=0) {
					if($newcosto!==null && filter_var($newcosto,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('lista_producto:No es numero decimal - costo='.$newcosto);
					}
				}

				$this->costo=$newcosto;
				$this->setIsChanged(true);
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
					throw new Exception('lista_producto:Valor nulo no permitido en columna id_unidad_compra');
				}

				if($newid_unidad_compra!==null && filter_var($newid_unidad_compra,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lista_producto:No es numero entero - id_unidad_compra='.$newid_unidad_compra);
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
					throw new Exception('lista_producto:Valor nulo no permitido en columna id_unidad_compra');
				}

				$this->id_unidad_compra_Descripcion=$newid_unidad_compra_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setunidad_en_compra(?int $newunidad_en_compra)
	{
		try {
			if($this->unidad_en_compra!==$newunidad_en_compra) {
				if($newunidad_en_compra===null && $newunidad_en_compra!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna unidad_en_compra');
				}

				if($newunidad_en_compra!==null && filter_var($newunidad_en_compra,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lista_producto:No es numero entero - unidad_en_compra='.$newunidad_en_compra);
				}

				$this->unidad_en_compra=$newunidad_en_compra;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setequivalencia_en_compra(?float $newequivalencia_en_compra)
	{
		try {
			if($this->equivalencia_en_compra!==$newequivalencia_en_compra) {
				if($newequivalencia_en_compra===null && $newequivalencia_en_compra!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna equivalencia_en_compra');
				}

				if($newequivalencia_en_compra!=0) {
					if($newequivalencia_en_compra!==null && filter_var($newequivalencia_en_compra,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('lista_producto:No es numero decimal - equivalencia_en_compra='.$newequivalencia_en_compra);
					}
				}

				$this->equivalencia_en_compra=$newequivalencia_en_compra;
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
					throw new Exception('lista_producto:Valor nulo no permitido en columna id_unidad_venta');
				}

				if($newid_unidad_venta!==null && filter_var($newid_unidad_venta,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lista_producto:No es numero entero - id_unidad_venta='.$newid_unidad_venta);
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
					throw new Exception('lista_producto:Valor nulo no permitido en columna id_unidad_venta');
				}

				$this->id_unidad_venta_Descripcion=$newid_unidad_venta_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setunidad_en_venta(?int $newunidad_en_venta)
	{
		try {
			if($this->unidad_en_venta!==$newunidad_en_venta) {
				if($newunidad_en_venta===null && $newunidad_en_venta!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna unidad_en_venta');
				}

				if($newunidad_en_venta!==null && filter_var($newunidad_en_venta,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lista_producto:No es numero entero - unidad_en_venta='.$newunidad_en_venta);
				}

				$this->unidad_en_venta=$newunidad_en_venta;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setequivalencia_en_venta(?float $newequivalencia_en_venta)
	{
		try {
			if($this->equivalencia_en_venta!==$newequivalencia_en_venta) {
				if($newequivalencia_en_venta===null && $newequivalencia_en_venta!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna equivalencia_en_venta');
				}

				if($newequivalencia_en_venta!=0) {
					if($newequivalencia_en_venta!==null && filter_var($newequivalencia_en_venta,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('lista_producto:No es numero decimal - equivalencia_en_venta='.$newequivalencia_en_venta);
					}
				}

				$this->equivalencia_en_venta=$newequivalencia_en_venta;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcantidad_total(?float $newcantidad_total)
	{
		try {
			if($this->cantidad_total!==$newcantidad_total) {
				if($newcantidad_total===null && $newcantidad_total!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna cantidad_total');
				}

				if($newcantidad_total!=0) {
					if($newcantidad_total!==null && filter_var($newcantidad_total,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('lista_producto:No es numero decimal - cantidad_total='.$newcantidad_total);
					}
				}

				$this->cantidad_total=$newcantidad_total;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcantidad_minima(?float $newcantidad_minima)
	{
		try {
			if($this->cantidad_minima!==$newcantidad_minima) {
				if($newcantidad_minima===null && $newcantidad_minima!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna cantidad_minima');
				}

				if($newcantidad_minima!=0) {
					if($newcantidad_minima!==null && filter_var($newcantidad_minima,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('lista_producto:No es numero decimal - cantidad_minima='.$newcantidad_minima);
					}
				}

				$this->cantidad_minima=$newcantidad_minima;
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
					throw new Exception('lista_producto:Valor nulo no permitido en columna id_categoria_producto');
				}

				if($newid_categoria_producto!==null && filter_var($newid_categoria_producto,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lista_producto:No es numero entero - id_categoria_producto='.$newid_categoria_producto);
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
					throw new Exception('lista_producto:Valor nulo no permitido en columna id_categoria_producto');
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
					throw new Exception('lista_producto:Valor nulo no permitido en columna id_sub_categoria_producto');
				}

				if($newid_sub_categoria_producto!==null && filter_var($newid_sub_categoria_producto,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lista_producto:No es numero entero - id_sub_categoria_producto='.$newid_sub_categoria_producto);
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
					throw new Exception('lista_producto:Valor nulo no permitido en columna id_sub_categoria_producto');
				}

				$this->id_sub_categoria_producto_Descripcion=$newid_sub_categoria_producto_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setacepta_lote(?string $newacepta_lote)
	{
		try {
			if($this->acepta_lote!==$newacepta_lote) {
				if($newacepta_lote===null && $newacepta_lote!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna acepta_lote');
				}

				if(strlen($newacepta_lote)>2) {
					throw new Exception('lista_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=2 en columna acepta_lote');
				}

				if(filter_var($newacepta_lote,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('lista_producto:Formato incorrecto en columna acepta_lote='.$newacepta_lote);
				}

				$this->acepta_lote=$newacepta_lote;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setvalor_inventario(?float $newvalor_inventario)
	{
		try {
			if($this->valor_inventario!==$newvalor_inventario) {
				if($newvalor_inventario===null && $newvalor_inventario!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna valor_inventario');
				}

				if($newvalor_inventario!=0) {
					if($newvalor_inventario!==null && filter_var($newvalor_inventario,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('lista_producto:No es numero decimal - valor_inventario='.$newvalor_inventario);
					}
				}

				$this->valor_inventario=$newvalor_inventario;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setimagen(?string $newimagen)
	{
		try {
			if($this->imagen!==$newimagen) {
				if($newimagen===null && $newimagen!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna imagen');
				}

				if(strlen($newimagen)>1000) {
					throw new Exception('lista_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna imagen');
				}

				if(filter_var($newimagen,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('lista_producto:Formato incorrecto en columna imagen='.$newimagen);
				}

				$this->imagen=$newimagen;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setincremento1(?float $newincremento1)
	{
		try {
			if($this->incremento1!==$newincremento1) {
				if($newincremento1===null && $newincremento1!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna incremento1');
				}

				if($newincremento1!=0) {
					if($newincremento1!==null && filter_var($newincremento1,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('lista_producto:No es numero decimal - incremento1='.$newincremento1);
					}
				}

				$this->incremento1=$newincremento1;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setincremento2(?float $newincremento2)
	{
		try {
			if($this->incremento2!==$newincremento2) {
				if($newincremento2===null && $newincremento2!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna incremento2');
				}

				if($newincremento2!=0) {
					if($newincremento2!==null && filter_var($newincremento2,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('lista_producto:No es numero decimal - incremento2='.$newincremento2);
					}
				}

				$this->incremento2=$newincremento2;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setincremento3(?float $newincremento3)
	{
		try {
			if($this->incremento3!==$newincremento3) {
				if($newincremento3===null && $newincremento3!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna incremento3');
				}

				if($newincremento3!=0) {
					if($newincremento3!==null && filter_var($newincremento3,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('lista_producto:No es numero decimal - incremento3='.$newincremento3);
					}
				}

				$this->incremento3=$newincremento3;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setincremento4(?float $newincremento4)
	{
		try {
			if($this->incremento4!==$newincremento4) {
				if($newincremento4===null && $newincremento4!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna incremento4');
				}

				if($newincremento4!=0) {
					if($newincremento4!==null && filter_var($newincremento4,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('lista_producto:No es numero decimal - incremento4='.$newincremento4);
					}
				}

				$this->incremento4=$newincremento4;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcodigo_fabricante(?string $newcodigo_fabricante)
	{
		try {
			if($this->codigo_fabricante!==$newcodigo_fabricante) {
				if($newcodigo_fabricante===null && $newcodigo_fabricante!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna codigo_fabricante');
				}

				if(strlen($newcodigo_fabricante)>24) {
					throw new Exception('lista_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=24 en columna codigo_fabricante');
				}

				if(filter_var($newcodigo_fabricante,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('lista_producto:Formato incorrecto en columna codigo_fabricante='.$newcodigo_fabricante);
				}

				$this->codigo_fabricante=$newcodigo_fabricante;
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
					throw new Exception('lista_producto:Valor nulo no permitido en columna producto_fisico');
				}

				if($newproducto_fisico!==null && filter_var($newproducto_fisico,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lista_producto:No es numero entero - producto_fisico='.$newproducto_fisico);
				}

				$this->producto_fisico=$newproducto_fisico;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setsituacion_producto(?int $newsituacion_producto)
	{
		try {
			if($this->situacion_producto!==$newsituacion_producto) {
				if($newsituacion_producto===null && $newsituacion_producto!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna situacion_producto');
				}

				if($newsituacion_producto!==null && filter_var($newsituacion_producto,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lista_producto:No es numero entero - situacion_producto='.$newsituacion_producto);
				}

				$this->situacion_producto=$newsituacion_producto;
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
					throw new Exception('lista_producto:Valor nulo no permitido en columna id_tipo_producto');
				}

				if($newid_tipo_producto!==null && filter_var($newid_tipo_producto,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lista_producto:No es numero entero - id_tipo_producto='.$newid_tipo_producto);
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
					throw new Exception('lista_producto:Valor nulo no permitido en columna id_tipo_producto');
				}

				$this->id_tipo_producto_Descripcion=$newid_tipo_producto_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function settipo_producto_codigo(?string $newtipo_producto_codigo)
	{
		try {
			if($this->tipo_producto_codigo!==$newtipo_producto_codigo) {
				if($newtipo_producto_codigo===null && $newtipo_producto_codigo!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna tipo_producto_codigo');
				}

				if(strlen($newtipo_producto_codigo)>1) {
					throw new Exception('lista_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1 en columna tipo_producto_codigo');
				}

				if(filter_var($newtipo_producto_codigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('lista_producto:Formato incorrecto en columna tipo_producto_codigo='.$newtipo_producto_codigo);
				}

				$this->tipo_producto_codigo=$newtipo_producto_codigo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_bodega(?int $newid_bodega)
	{
		try {
			if($this->id_bodega!==$newid_bodega) {
				if($newid_bodega===null && $newid_bodega!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna id_bodega');
				}

				if($newid_bodega!==null && filter_var($newid_bodega,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lista_producto:No es numero entero - id_bodega='.$newid_bodega);
				}

				$this->id_bodega=$newid_bodega;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_bodega_Descripcion(string $newid_bodega_Descripcion)
	{
		try {
			if($this->id_bodega_Descripcion!=$newid_bodega_Descripcion) {
				if($newid_bodega_Descripcion===null && $newid_bodega_Descripcion!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna id_bodega');
				}

				$this->id_bodega_Descripcion=$newid_bodega_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setmostrar_componente(?string $newmostrar_componente)
	{
		try {
			if($this->mostrar_componente!==$newmostrar_componente) {
				if($newmostrar_componente===null && $newmostrar_componente!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna mostrar_componente');
				}

				if(strlen($newmostrar_componente)>1) {
					throw new Exception('lista_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1 en columna mostrar_componente');
				}

				if(filter_var($newmostrar_componente,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('lista_producto:Formato incorrecto en columna mostrar_componente='.$newmostrar_componente);
				}

				$this->mostrar_componente=$newmostrar_componente;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setfactura_sin_stock(?string $newfactura_sin_stock)
	{
		try {
			if($this->factura_sin_stock!==$newfactura_sin_stock) {
				if($newfactura_sin_stock===null && $newfactura_sin_stock!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna factura_sin_stock');
				}

				if(strlen($newfactura_sin_stock)>2) {
					throw new Exception('lista_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=2 en columna factura_sin_stock');
				}

				if(filter_var($newfactura_sin_stock,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('lista_producto:Formato incorrecto en columna factura_sin_stock='.$newfactura_sin_stock);
				}

				$this->factura_sin_stock=$newfactura_sin_stock;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setavisa_expiracion(?string $newavisa_expiracion)
	{
		try {
			if($this->avisa_expiracion!==$newavisa_expiracion) {
				if($newavisa_expiracion===null && $newavisa_expiracion!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna avisa_expiracion');
				}

				if(strlen($newavisa_expiracion)>2) {
					throw new Exception('lista_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=2 en columna avisa_expiracion');
				}

				if(filter_var($newavisa_expiracion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('lista_producto:Formato incorrecto en columna avisa_expiracion='.$newavisa_expiracion);
				}

				$this->avisa_expiracion=$newavisa_expiracion;
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
					throw new Exception('lista_producto:Valor nulo no permitido en columna factura_con_precio');
				}

				if($newfactura_con_precio!==null && filter_var($newfactura_con_precio,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lista_producto:No es numero entero - factura_con_precio='.$newfactura_con_precio);
				}

				$this->factura_con_precio=$newfactura_con_precio;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setproducto_equivalente(?string $newproducto_equivalente)
	{
		try {
			if($this->producto_equivalente!==$newproducto_equivalente) {
				if($newproducto_equivalente===null && $newproducto_equivalente!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna producto_equivalente');
				}

				if(strlen($newproducto_equivalente)>2) {
					throw new Exception('lista_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=2 en columna producto_equivalente');
				}

				if(filter_var($newproducto_equivalente,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('lista_producto:Formato incorrecto en columna producto_equivalente='.$newproducto_equivalente);
				}

				$this->producto_equivalente=$newproducto_equivalente;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_cuenta_compra(?int $newid_cuenta_compra) {
		if($this->id_cuenta_compra!==$newid_cuenta_compra) {

				if($newid_cuenta_compra!==null && filter_var($newid_cuenta_compra,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lista_producto:No es numero entero - id_cuenta_compra');
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
    
	public function setid_cuenta_venta(?int $newid_cuenta_venta) {
		if($this->id_cuenta_venta!==$newid_cuenta_venta) {

				if($newid_cuenta_venta!==null && filter_var($newid_cuenta_venta,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lista_producto:No es numero entero - id_cuenta_venta');
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
    
	public function setid_cuenta_inventario(?int $newid_cuenta_inventario) {
		if($this->id_cuenta_inventario!==$newid_cuenta_inventario) {

				if($newid_cuenta_inventario!==null && filter_var($newid_cuenta_inventario,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lista_producto:No es numero entero - id_cuenta_inventario');
				}

			$this->id_cuenta_inventario=$newid_cuenta_inventario;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_cuenta_inventario_Descripcion(string $newid_cuenta_inventario_Descripcion) {
		if($this->id_cuenta_inventario_Descripcion!=$newid_cuenta_inventario_Descripcion) {

			$this->id_cuenta_inventario_Descripcion=$newid_cuenta_inventario_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function setcuenta_compra_codigo(?string $newcuenta_compra_codigo)
	{
		try {
			if($this->cuenta_compra_codigo!==$newcuenta_compra_codigo) {
				if($newcuenta_compra_codigo===null && $newcuenta_compra_codigo!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna cuenta_compra_codigo');
				}

				if(strlen($newcuenta_compra_codigo)>14) {
					throw new Exception('lista_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=14 en columna cuenta_compra_codigo');
				}

				if(filter_var($newcuenta_compra_codigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('lista_producto:Formato incorrecto en columna cuenta_compra_codigo='.$newcuenta_compra_codigo);
				}

				$this->cuenta_compra_codigo=$newcuenta_compra_codigo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcuenta_venta_codigo(?string $newcuenta_venta_codigo)
	{
		try {
			if($this->cuenta_venta_codigo!==$newcuenta_venta_codigo) {
				if($newcuenta_venta_codigo===null && $newcuenta_venta_codigo!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna cuenta_venta_codigo');
				}

				if(strlen($newcuenta_venta_codigo)>14) {
					throw new Exception('lista_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=14 en columna cuenta_venta_codigo');
				}

				if(filter_var($newcuenta_venta_codigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('lista_producto:Formato incorrecto en columna cuenta_venta_codigo='.$newcuenta_venta_codigo);
				}

				$this->cuenta_venta_codigo=$newcuenta_venta_codigo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcuenta_inventario_codigo(?string $newcuenta_inventario_codigo)
	{
		try {
			if($this->cuenta_inventario_codigo!==$newcuenta_inventario_codigo) {
				if($newcuenta_inventario_codigo===null && $newcuenta_inventario_codigo!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna cuenta_inventario_codigo');
				}

				if(strlen($newcuenta_inventario_codigo)>14) {
					throw new Exception('lista_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=14 en columna cuenta_inventario_codigo');
				}

				if(filter_var($newcuenta_inventario_codigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('lista_producto:Formato incorrecto en columna cuenta_inventario_codigo='.$newcuenta_inventario_codigo);
				}

				$this->cuenta_inventario_codigo=$newcuenta_inventario_codigo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_otro_suplidor(?int $newid_otro_suplidor)
	{
		try {
			if($this->id_otro_suplidor!==$newid_otro_suplidor) {
				if($newid_otro_suplidor===null && $newid_otro_suplidor!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna id_otro_suplidor');
				}

				if($newid_otro_suplidor!==null && filter_var($newid_otro_suplidor,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lista_producto:No es numero entero - id_otro_suplidor='.$newid_otro_suplidor);
				}

				$this->id_otro_suplidor=$newid_otro_suplidor;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_otro_suplidor_Descripcion(string $newid_otro_suplidor_Descripcion)
	{
		try {
			if($this->id_otro_suplidor_Descripcion!=$newid_otro_suplidor_Descripcion) {
				if($newid_otro_suplidor_Descripcion===null && $newid_otro_suplidor_Descripcion!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna id_otro_suplidor');
				}

				$this->id_otro_suplidor_Descripcion=$newid_otro_suplidor_Descripcion;
				//$this->setIsChanged(true);
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
					throw new Exception('lista_producto:Valor nulo no permitido en columna id_impuesto');
				}

				if($newid_impuesto!==null && filter_var($newid_impuesto,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lista_producto:No es numero entero - id_impuesto='.$newid_impuesto);
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
					throw new Exception('lista_producto:Valor nulo no permitido en columna id_impuesto');
				}

				$this->id_impuesto_Descripcion=$newid_impuesto_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_impuesto_ventas(?int $newid_impuesto_ventas) {
		if($this->id_impuesto_ventas!==$newid_impuesto_ventas) {

				if($newid_impuesto_ventas!==null && filter_var($newid_impuesto_ventas,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lista_producto:No es numero entero - id_impuesto_ventas');
				}

			$this->id_impuesto_ventas=$newid_impuesto_ventas;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_impuesto_ventas_Descripcion(string $newid_impuesto_ventas_Descripcion) {
		if($this->id_impuesto_ventas_Descripcion!=$newid_impuesto_ventas_Descripcion) {

			$this->id_impuesto_ventas_Descripcion=$newid_impuesto_ventas_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function setid_impuesto_compras(?int $newid_impuesto_compras) {
		if($this->id_impuesto_compras!==$newid_impuesto_compras) {

				if($newid_impuesto_compras!==null && filter_var($newid_impuesto_compras,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lista_producto:No es numero entero - id_impuesto_compras');
				}

			$this->id_impuesto_compras=$newid_impuesto_compras;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_impuesto_compras_Descripcion(string $newid_impuesto_compras_Descripcion) {
		if($this->id_impuesto_compras_Descripcion!=$newid_impuesto_compras_Descripcion) {

			$this->id_impuesto_compras_Descripcion=$newid_impuesto_compras_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function setimpuesto1_en_ventas(?string $newimpuesto1_en_ventas)
	{
		try {
			if($this->impuesto1_en_ventas!==$newimpuesto1_en_ventas) {
				if($newimpuesto1_en_ventas===null && $newimpuesto1_en_ventas!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna impuesto1_en_ventas');
				}

				if(strlen($newimpuesto1_en_ventas)>2) {
					throw new Exception('lista_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=2 en columna impuesto1_en_ventas');
				}

				if(filter_var($newimpuesto1_en_ventas,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('lista_producto:Formato incorrecto en columna impuesto1_en_ventas='.$newimpuesto1_en_ventas);
				}

				$this->impuesto1_en_ventas=$newimpuesto1_en_ventas;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setimpuesto1_en_compras(?string $newimpuesto1_en_compras)
	{
		try {
			if($this->impuesto1_en_compras!==$newimpuesto1_en_compras) {
				if($newimpuesto1_en_compras===null && $newimpuesto1_en_compras!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna impuesto1_en_compras');
				}

				if(strlen($newimpuesto1_en_compras)>2) {
					throw new Exception('lista_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=2 en columna impuesto1_en_compras');
				}

				if(filter_var($newimpuesto1_en_compras,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('lista_producto:Formato incorrecto en columna impuesto1_en_compras='.$newimpuesto1_en_compras);
				}

				$this->impuesto1_en_compras=$newimpuesto1_en_compras;
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
					throw new Exception('lista_producto:Valor nulo no permitido en columna ultima_venta');
				}

				if($newultima_venta!==null && filter_var($newultima_venta,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('lista_producto:No es fecha - ultima_venta='.$newultima_venta);
				}

				$this->ultima_venta=$newultima_venta;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_otro_impuesto(?int $newid_otro_impuesto)
	{
		try {
			if($this->id_otro_impuesto!==$newid_otro_impuesto) {
				if($newid_otro_impuesto===null && $newid_otro_impuesto!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna id_otro_impuesto');
				}

				if($newid_otro_impuesto!==null && filter_var($newid_otro_impuesto,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lista_producto:No es numero entero - id_otro_impuesto='.$newid_otro_impuesto);
				}

				$this->id_otro_impuesto=$newid_otro_impuesto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_otro_impuesto_Descripcion(string $newid_otro_impuesto_Descripcion)
	{
		try {
			if($this->id_otro_impuesto_Descripcion!=$newid_otro_impuesto_Descripcion) {
				if($newid_otro_impuesto_Descripcion===null && $newid_otro_impuesto_Descripcion!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna id_otro_impuesto');
				}

				$this->id_otro_impuesto_Descripcion=$newid_otro_impuesto_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_otro_impuesto_ventas(?int $newid_otro_impuesto_ventas) {
		if($this->id_otro_impuesto_ventas!==$newid_otro_impuesto_ventas) {

				if($newid_otro_impuesto_ventas!==null && filter_var($newid_otro_impuesto_ventas,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lista_producto:No es numero entero - id_otro_impuesto_ventas');
				}

			$this->id_otro_impuesto_ventas=$newid_otro_impuesto_ventas;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_otro_impuesto_ventas_Descripcion(string $newid_otro_impuesto_ventas_Descripcion) {
		if($this->id_otro_impuesto_ventas_Descripcion!=$newid_otro_impuesto_ventas_Descripcion) {

			$this->id_otro_impuesto_ventas_Descripcion=$newid_otro_impuesto_ventas_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function setid_otro_impuesto_compras(?int $newid_otro_impuesto_compras) {
		if($this->id_otro_impuesto_compras!==$newid_otro_impuesto_compras) {

				if($newid_otro_impuesto_compras!==null && filter_var($newid_otro_impuesto_compras,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lista_producto:No es numero entero - id_otro_impuesto_compras');
				}

			$this->id_otro_impuesto_compras=$newid_otro_impuesto_compras;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_otro_impuesto_compras_Descripcion(string $newid_otro_impuesto_compras_Descripcion) {
		if($this->id_otro_impuesto_compras_Descripcion!=$newid_otro_impuesto_compras_Descripcion) {

			$this->id_otro_impuesto_compras_Descripcion=$newid_otro_impuesto_compras_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function setotro_impuesto_ventas_codigo(?string $newotro_impuesto_ventas_codigo)
	{
		try {
			if($this->otro_impuesto_ventas_codigo!==$newotro_impuesto_ventas_codigo) {
				if($newotro_impuesto_ventas_codigo===null && $newotro_impuesto_ventas_codigo!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna otro_impuesto_ventas_codigo');
				}

				if(strlen($newotro_impuesto_ventas_codigo)>2) {
					throw new Exception('lista_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=2 en columna otro_impuesto_ventas_codigo');
				}

				if(filter_var($newotro_impuesto_ventas_codigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('lista_producto:Formato incorrecto en columna otro_impuesto_ventas_codigo='.$newotro_impuesto_ventas_codigo);
				}

				$this->otro_impuesto_ventas_codigo=$newotro_impuesto_ventas_codigo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setotro_impuesto_compras_codigo(?string $newotro_impuesto_compras_codigo)
	{
		try {
			if($this->otro_impuesto_compras_codigo!==$newotro_impuesto_compras_codigo) {
				if($newotro_impuesto_compras_codigo===null && $newotro_impuesto_compras_codigo!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna otro_impuesto_compras_codigo');
				}

				if(strlen($newotro_impuesto_compras_codigo)>2) {
					throw new Exception('lista_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=2 en columna otro_impuesto_compras_codigo');
				}

				if(filter_var($newotro_impuesto_compras_codigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('lista_producto:Formato incorrecto en columna otro_impuesto_compras_codigo='.$newotro_impuesto_compras_codigo);
				}

				$this->otro_impuesto_compras_codigo=$newotro_impuesto_compras_codigo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setprecio_de_compra_0(?float $newprecio_de_compra_0)
	{
		try {
			if($this->precio_de_compra_0!==$newprecio_de_compra_0) {
				if($newprecio_de_compra_0===null && $newprecio_de_compra_0!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna precio_de_compra_0');
				}

				if($newprecio_de_compra_0!=0) {
					if($newprecio_de_compra_0!==null && filter_var($newprecio_de_compra_0,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('lista_producto:No es numero decimal - precio_de_compra_0='.$newprecio_de_compra_0);
					}
				}

				$this->precio_de_compra_0=$newprecio_de_compra_0;
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
					throw new Exception('lista_producto:Valor nulo no permitido en columna precio_actualizado');
				}

				if($newprecio_actualizado!==null && filter_var($newprecio_actualizado,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('lista_producto:No es fecha - precio_actualizado='.$newprecio_actualizado);
				}

				$this->precio_actualizado=$newprecio_actualizado;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setrequiere_nro_serie(?string $newrequiere_nro_serie)
	{
		try {
			if($this->requiere_nro_serie!==$newrequiere_nro_serie) {
				if($newrequiere_nro_serie===null && $newrequiere_nro_serie!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna requiere_nro_serie');
				}

				if(strlen($newrequiere_nro_serie)>1) {
					throw new Exception('lista_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1 en columna requiere_nro_serie');
				}

				if(filter_var($newrequiere_nro_serie,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('lista_producto:Formato incorrecto en columna requiere_nro_serie='.$newrequiere_nro_serie);
				}

				$this->requiere_nro_serie=$newrequiere_nro_serie;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcosto_dolar(?float $newcosto_dolar)
	{
		try {
			if($this->costo_dolar!==$newcosto_dolar) {
				if($newcosto_dolar===null && $newcosto_dolar!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna costo_dolar');
				}

				if($newcosto_dolar!=0) {
					if($newcosto_dolar!==null && filter_var($newcosto_dolar,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('lista_producto:No es numero decimal - costo_dolar='.$newcosto_dolar);
					}
				}

				$this->costo_dolar=$newcosto_dolar;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcomentario(?string $newcomentario)
	{
		try {
			if($this->comentario!==$newcomentario) {
				if($newcomentario===null && $newcomentario!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna comentario');
				}

				if(strlen($newcomentario)>1000) {
					throw new Exception('lista_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna comentario');
				}

				if(filter_var($newcomentario,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('lista_producto:Formato incorrecto en columna comentario='.$newcomentario);
				}

				$this->comentario=$newcomentario;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcomenta_factura(?string $newcomenta_factura)
	{
		try {
			if($this->comenta_factura!==$newcomenta_factura) {
				if($newcomenta_factura===null && $newcomenta_factura!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna comenta_factura');
				}

				if(strlen($newcomenta_factura)>2) {
					throw new Exception('lista_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=2 en columna comenta_factura');
				}

				if(filter_var($newcomenta_factura,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('lista_producto:Formato incorrecto en columna comenta_factura='.$newcomenta_factura);
				}

				$this->comenta_factura=$newcomenta_factura;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_retencion(?int $newid_retencion)
	{
		try {
			if($this->id_retencion!==$newid_retencion) {
				if($newid_retencion===null && $newid_retencion!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna id_retencion');
				}

				if($newid_retencion!==null && filter_var($newid_retencion,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lista_producto:No es numero entero - id_retencion='.$newid_retencion);
				}

				$this->id_retencion=$newid_retencion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_retencion_Descripcion(string $newid_retencion_Descripcion)
	{
		try {
			if($this->id_retencion_Descripcion!=$newid_retencion_Descripcion) {
				if($newid_retencion_Descripcion===null && $newid_retencion_Descripcion!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna id_retencion');
				}

				$this->id_retencion_Descripcion=$newid_retencion_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_retencion_ventas(?int $newid_retencion_ventas) {
		if($this->id_retencion_ventas!==$newid_retencion_ventas) {

				if($newid_retencion_ventas!==null && filter_var($newid_retencion_ventas,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lista_producto:No es numero entero - id_retencion_ventas');
				}

			$this->id_retencion_ventas=$newid_retencion_ventas;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_retencion_ventas_Descripcion(string $newid_retencion_ventas_Descripcion) {
		if($this->id_retencion_ventas_Descripcion!=$newid_retencion_ventas_Descripcion) {

			$this->id_retencion_ventas_Descripcion=$newid_retencion_ventas_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function setid_retencion_compras(?int $newid_retencion_compras) {
		if($this->id_retencion_compras!==$newid_retencion_compras) {

				if($newid_retencion_compras!==null && filter_var($newid_retencion_compras,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lista_producto:No es numero entero - id_retencion_compras');
				}

			$this->id_retencion_compras=$newid_retencion_compras;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_retencion_compras_Descripcion(string $newid_retencion_compras_Descripcion) {
		if($this->id_retencion_compras_Descripcion!=$newid_retencion_compras_Descripcion) {

			$this->id_retencion_compras_Descripcion=$newid_retencion_compras_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function setretencion_ventas_codigo(?string $newretencion_ventas_codigo)
	{
		try {
			if($this->retencion_ventas_codigo!==$newretencion_ventas_codigo) {
				if($newretencion_ventas_codigo===null && $newretencion_ventas_codigo!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna retencion_ventas_codigo');
				}

				if(strlen($newretencion_ventas_codigo)>2) {
					throw new Exception('lista_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=2 en columna retencion_ventas_codigo');
				}

				if(filter_var($newretencion_ventas_codigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('lista_producto:Formato incorrecto en columna retencion_ventas_codigo='.$newretencion_ventas_codigo);
				}

				$this->retencion_ventas_codigo=$newretencion_ventas_codigo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setretencion_compras_codigo(?string $newretencion_compras_codigo)
	{
		try {
			if($this->retencion_compras_codigo!==$newretencion_compras_codigo) {
				if($newretencion_compras_codigo===null && $newretencion_compras_codigo!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna retencion_compras_codigo');
				}

				if(strlen($newretencion_compras_codigo)>2) {
					throw new Exception('lista_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=2 en columna retencion_compras_codigo');
				}

				if(filter_var($newretencion_compras_codigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('lista_producto:Formato incorrecto en columna retencion_compras_codigo='.$newretencion_compras_codigo);
				}

				$this->retencion_compras_codigo=$newretencion_compras_codigo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnotas(?string $newnotas)
	{
		try {
			if($this->notas!==$newnotas) {
				if($newnotas===null && $newnotas!='') {
					throw new Exception('lista_producto:Valor nulo no permitido en columna notas');
				}

				if(strlen($newnotas)>1000) {
					throw new Exception('lista_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna notas');
				}

				if(filter_var($newnotas,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('lista_producto:Formato incorrecto en columna notas='.$newnotas);
				}

				$this->notas=$newnotas;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	public function getproducto() : ?producto {
		return $this->producto;
	}

	public function getunidad_compra() : ?unidad {
		return $this->unidad_compra;
	}

	public function getunidad_venta() : ?unidad {
		return $this->unidad_venta;
	}

	public function getcategoria_producto() : ?categoria_producto {
		return $this->categoria_producto;
	}

	public function getsub_categoria_producto() : ?sub_categoria_producto {
		return $this->sub_categoria_producto;
	}

	public function gettipo_producto() : ?tipo_producto {
		return $this->tipo_producto;
	}

	public function getbodega() : ?bodega {
		return $this->bodega;
	}

	public function getcuenta_compra() : ?cuenta {
		return $this->cuenta_compra;
	}

	public function getcuenta_venta() : ?cuenta {
		return $this->cuenta_venta;
	}

	public function getcuenta_inventario() : ?cuenta {
		return $this->cuenta_inventario;
	}

	public function getotro_suplidor() : ?otro_suplidor {
		return $this->otro_suplidor;
	}

	public function getimpuesto() : ?impuesto {
		return $this->impuesto;
	}

	public function getimpuesto_ventas() : ?impuesto {
		return $this->impuesto_ventas;
	}

	public function getimpuesto_compras() : ?impuesto {
		return $this->impuesto_compras;
	}

	public function getotro_impuesto() : ?otro_impuesto {
		return $this->otro_impuesto;
	}

	public function getotro_impuesto_ventas() : ?otro_impuesto {
		return $this->otro_impuesto_ventas;
	}

	public function getotro_impuesto_compras() : ?otro_impuesto {
		return $this->otro_impuesto_compras;
	}

	public function getretencion() : ?retencion {
		return $this->retencion;
	}

	public function getretencion_ventas() : ?retencion {
		return $this->retencion_ventas;
	}

	public function getretencion_compras() : ?retencion {
		return $this->retencion_compras;
	}

	
	
	public  function  setproducto(?producto $producto) {
		try {
			$this->producto=$producto;
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


	public  function  settipo_producto(?tipo_producto $tipo_producto) {
		try {
			$this->tipo_producto=$tipo_producto;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setbodega(?bodega $bodega) {
		try {
			$this->bodega=$bodega;
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


	public  function  setcuenta_venta(?cuenta $cuenta_venta) {
		try {
			$this->cuenta_venta=$cuenta_venta;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setcuenta_inventario(?cuenta $cuenta_inventario) {
		try {
			$this->cuenta_inventario=$cuenta_inventario;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setotro_suplidor(?otro_suplidor $otro_suplidor) {
		try {
			$this->otro_suplidor=$otro_suplidor;
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


	public  function  setimpuesto_ventas(?impuesto $impuesto_ventas) {
		try {
			$this->impuesto_ventas=$impuesto_ventas;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setimpuesto_compras(?impuesto $impuesto_compras) {
		try {
			$this->impuesto_compras=$impuesto_compras;
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


	public  function  setotro_impuesto_ventas(?otro_impuesto $otro_impuesto_ventas) {
		try {
			$this->otro_impuesto_ventas=$otro_impuesto_ventas;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setotro_impuesto_compras(?otro_impuesto $otro_impuesto_compras) {
		try {
			$this->otro_impuesto_compras=$otro_impuesto_compras;
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


	public  function  setretencion_ventas(?retencion $retencion_ventas) {
		try {
			$this->retencion_ventas=$retencion_ventas;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setretencion_compras(?retencion $retencion_compras) {
		try {
			$this->retencion_compras=$retencion_compras;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_lista_productoValue(string $sKey,$oValue) {
		$this->map_lista_producto[$sKey]=$oValue;
	}
	
	public function getMap_lista_productoValue(string $sKey) {
		return $this->map_lista_producto[$sKey];
	}
	
	public function getlista_producto_Original() : ?lista_producto {
		return $this->lista_producto_Original;
	}
	
	public function setlista_producto_Original(lista_producto $lista_producto) {
		try {
			$this->lista_producto_Original=$lista_producto;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_lista_producto() : array {
		return $this->map_lista_producto;
	}

	public function setMap_lista_producto(array $map_lista_producto) {
		$this->map_lista_producto = $map_lista_producto;
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
