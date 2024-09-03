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
namespace com\bydan\contabilidad\inventario\kardex_detalle\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class kardex_detalle extends GeneralEntity {

	/*GENERAL*/
	public static string $class='kardex_detalle';
	
	/*AUXILIARES*/
	public ?kardex_detalle $kardex_detalle_Original=null;	
	public ?GeneralEntity $kardex_detalle_Additional=null;
	public array $map_kardex_detalle=array();	
		
	/*CAMPOS*/
	public ?int $id_kardex = null;
	public string $id_kardex_Descripcion = '';

	public int $numero_item = 0;
	public int $id_bodega = -1;
	public string $id_bodega_Descripcion = '';

	public int $id_producto = -1;
	public string $id_producto_Descripcion = '';

	public int $id_unidad = -1;
	public string $id_unidad_Descripcion = '';

	public float $cantidad = 0.0;
	public float $costo = 0.0;
	public float $total = 0.0;
	public ?int $id_lote_producto = null;
	public string $id_lote_producto_Descripcion = '';

	public string $descripcion = '';
	public float $cantidad_disponible = 0.0;
	public float $cantidad_disponible_total = 0.0;
	public float $costo_anterior = 0.0;
	
	/*FKs*/
	
	public ?kardex $kardex = null;
	public ?bodega $bodega = null;
	public ?producto $producto = null;
	public ?unidad $unidad = null;
	public ?lote_producto $lote_producto = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->kardex_detalle_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_kardex=null;
		$this->id_kardex_Descripcion='';

 		$this->numero_item=0;
 		$this->id_bodega=-1;
		$this->id_bodega_Descripcion='';

 		$this->id_producto=-1;
		$this->id_producto_Descripcion='';

 		$this->id_unidad=-1;
		$this->id_unidad_Descripcion='';

 		$this->cantidad=0.0;
 		$this->costo=0.0;
 		$this->total=0.0;
 		$this->id_lote_producto=null;
		$this->id_lote_producto_Descripcion='';

 		$this->descripcion='';
 		$this->cantidad_disponible=0.0;
 		$this->cantidad_disponible_total=0.0;
 		$this->costo_anterior=0.0;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->kardex=new kardex();
			$this->bodega=new bodega();
			$this->producto=new producto();
			$this->unidad=new unidad();
			$this->lote_producto=new lote_producto();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->kardex_detalle_Additional=new kardex_detalle_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_kardex_detalle() {
		$this->map_kardex_detalle = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_kardex() : ?int {
		return $this->id_kardex;
	}
	
	public function  getid_kardex_Descripcion() : string {
		return $this->id_kardex_Descripcion;
	}
    
	public function  getnumero_item() : ?int {
		return $this->numero_item;
	}
    
	public function  getid_bodega() : ?int {
		return $this->id_bodega;
	}
	
	public function  getid_bodega_Descripcion() : string {
		return $this->id_bodega_Descripcion;
	}
    
	public function  getid_producto() : ?int {
		return $this->id_producto;
	}
	
	public function  getid_producto_Descripcion() : string {
		return $this->id_producto_Descripcion;
	}
    
	public function  getid_unidad() : ?int {
		return $this->id_unidad;
	}
	
	public function  getid_unidad_Descripcion() : string {
		return $this->id_unidad_Descripcion;
	}
    
	public function  getcantidad() : ?float {
		return $this->cantidad;
	}
    
	public function  getcosto() : ?float {
		return $this->costo;
	}
    
	public function  gettotal() : ?float {
		return $this->total;
	}
    
	public function  getid_lote_producto() : ?int {
		return $this->id_lote_producto;
	}
	
	public function  getid_lote_producto_Descripcion() : string {
		return $this->id_lote_producto_Descripcion;
	}
    
	public function  getdescripcion() : ?string {
		return $this->descripcion;
	}
    
	public function  getcantidad_disponible() : ?float {
		return $this->cantidad_disponible;
	}
    
	public function  getcantidad_disponible_total() : ?float {
		return $this->cantidad_disponible_total;
	}
    
	public function  getcosto_anterior() : ?float {
		return $this->costo_anterior;
	}
	
    
	public function setid_kardex(?int $newid_kardex) {
		if($this->id_kardex!==$newid_kardex) {

				if($newid_kardex!==null && filter_var($newid_kardex,FILTER_VALIDATE_INT)===false) {
					throw new Exception('kardex_detalle:No es numero entero - id_kardex');
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
    
	public function setnumero_item(?int $newnumero_item)
	{
		try {
			if($this->numero_item!==$newnumero_item) {
				if($newnumero_item===null && $newnumero_item!='') {
					throw new Exception('kardex_detalle:Valor nulo no permitido en columna numero_item');
				}

				if($newnumero_item!==null && filter_var($newnumero_item,FILTER_VALIDATE_INT)===false) {
					throw new Exception('kardex_detalle:No es numero entero - numero_item='.$newnumero_item);
				}

				$this->numero_item=$newnumero_item;
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
					throw new Exception('kardex_detalle:Valor nulo no permitido en columna id_bodega');
				}

				if($newid_bodega!==null && filter_var($newid_bodega,FILTER_VALIDATE_INT)===false) {
					throw new Exception('kardex_detalle:No es numero entero - id_bodega='.$newid_bodega);
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
					throw new Exception('kardex_detalle:Valor nulo no permitido en columna id_bodega');
				}

				$this->id_bodega_Descripcion=$newid_bodega_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_producto(?int $newid_producto)
	{
		try {
			if($this->id_producto!==$newid_producto) {
				if($newid_producto===null && $newid_producto!='') {
					throw new Exception('kardex_detalle:Valor nulo no permitido en columna id_producto');
				}

				if($newid_producto!==null && filter_var($newid_producto,FILTER_VALIDATE_INT)===false) {
					throw new Exception('kardex_detalle:No es numero entero - id_producto='.$newid_producto);
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
					throw new Exception('kardex_detalle:Valor nulo no permitido en columna id_producto');
				}

				$this->id_producto_Descripcion=$newid_producto_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_unidad(?int $newid_unidad)
	{
		try {
			if($this->id_unidad!==$newid_unidad) {
				if($newid_unidad===null && $newid_unidad!='') {
					throw new Exception('kardex_detalle:Valor nulo no permitido en columna id_unidad');
				}

				if($newid_unidad!==null && filter_var($newid_unidad,FILTER_VALIDATE_INT)===false) {
					throw new Exception('kardex_detalle:No es numero entero - id_unidad='.$newid_unidad);
				}

				$this->id_unidad=$newid_unidad;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_unidad_Descripcion(string $newid_unidad_Descripcion)
	{
		try {
			if($this->id_unidad_Descripcion!=$newid_unidad_Descripcion) {
				if($newid_unidad_Descripcion===null && $newid_unidad_Descripcion!='') {
					throw new Exception('kardex_detalle:Valor nulo no permitido en columna id_unidad');
				}

				$this->id_unidad_Descripcion=$newid_unidad_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcantidad(?float $newcantidad)
	{
		try {
			if($this->cantidad!==$newcantidad) {
				if($newcantidad===null && $newcantidad!='') {
					throw new Exception('kardex_detalle:Valor nulo no permitido en columna cantidad');
				}

				if($newcantidad!=0) {
					if($newcantidad!==null && filter_var($newcantidad,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('kardex_detalle:No es numero decimal - cantidad='.$newcantidad);
					}
				}

				$this->cantidad=$newcantidad;
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
					throw new Exception('kardex_detalle:Valor nulo no permitido en columna costo');
				}

				if($newcosto!=0) {
					if($newcosto!==null && filter_var($newcosto,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('kardex_detalle:No es numero decimal - costo='.$newcosto);
					}
				}

				$this->costo=$newcosto;
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
					throw new Exception('kardex_detalle:Valor nulo no permitido en columna total');
				}

				if($newtotal!=0) {
					if($newtotal!==null && filter_var($newtotal,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('kardex_detalle:No es numero decimal - total='.$newtotal);
					}
				}

				$this->total=$newtotal;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_lote_producto(?int $newid_lote_producto) {
		if($this->id_lote_producto!==$newid_lote_producto) {

				if($newid_lote_producto!==null && filter_var($newid_lote_producto,FILTER_VALIDATE_INT)===false) {
					throw new Exception('kardex_detalle:No es numero entero - id_lote_producto');
				}

			$this->id_lote_producto=$newid_lote_producto;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_lote_producto_Descripcion(string $newid_lote_producto_Descripcion) {
		if($this->id_lote_producto_Descripcion!=$newid_lote_producto_Descripcion) {

			$this->id_lote_producto_Descripcion=$newid_lote_producto_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function setdescripcion(?string $newdescripcion) {
		if($this->descripcion!==$newdescripcion) {

				if(strlen($newdescripcion)>200) {
					try {
						throw new Exception('kardex_detalle:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=descripcion en columna descripcion');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newdescripcion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('kardex_detalle:Formato incorrecto en la columna descripcion='.$newdescripcion);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->descripcion=$newdescripcion;
			$this->setIsChanged(true);
		}
	}
    
	public function setcantidad_disponible(?float $newcantidad_disponible)
	{
		try {
			if($this->cantidad_disponible!==$newcantidad_disponible) {
				if($newcantidad_disponible===null && $newcantidad_disponible!='') {
					throw new Exception('kardex_detalle:Valor nulo no permitido en columna cantidad_disponible');
				}

				if($newcantidad_disponible!=0) {
					if($newcantidad_disponible!==null && filter_var($newcantidad_disponible,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('kardex_detalle:No es numero decimal - cantidad_disponible='.$newcantidad_disponible);
					}
				}

				$this->cantidad_disponible=$newcantidad_disponible;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcantidad_disponible_total(?float $newcantidad_disponible_total)
	{
		try {
			if($this->cantidad_disponible_total!==$newcantidad_disponible_total) {
				if($newcantidad_disponible_total===null && $newcantidad_disponible_total!='') {
					throw new Exception('kardex_detalle:Valor nulo no permitido en columna cantidad_disponible_total');
				}

				if($newcantidad_disponible_total!=0) {
					if($newcantidad_disponible_total!==null && filter_var($newcantidad_disponible_total,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('kardex_detalle:No es numero decimal - cantidad_disponible_total='.$newcantidad_disponible_total);
					}
				}

				$this->cantidad_disponible_total=$newcantidad_disponible_total;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcosto_anterior(?float $newcosto_anterior)
	{
		try {
			if($this->costo_anterior!==$newcosto_anterior) {
				if($newcosto_anterior===null && $newcosto_anterior!='') {
					throw new Exception('kardex_detalle:Valor nulo no permitido en columna costo_anterior');
				}

				if($newcosto_anterior!=0) {
					if($newcosto_anterior!==null && filter_var($newcosto_anterior,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('kardex_detalle:No es numero decimal - costo_anterior='.$newcosto_anterior);
					}
				}

				$this->costo_anterior=$newcosto_anterior;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	public function getkardex() : ?kardex {
		return $this->kardex;
	}

	public function getbodega() : ?bodega {
		return $this->bodega;
	}

	public function getproducto() : ?producto {
		return $this->producto;
	}

	public function getunidad() : ?unidad {
		return $this->unidad;
	}

	public function getlote_producto() : ?lote_producto {
		return $this->lote_producto;
	}

	
	
	public  function  setkardex(?kardex $kardex) {
		try {
			$this->kardex=$kardex;
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


	public  function  setproducto(?producto $producto) {
		try {
			$this->producto=$producto;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setunidad(?unidad $unidad) {
		try {
			$this->unidad=$unidad;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setlote_producto(?lote_producto $lote_producto) {
		try {
			$this->lote_producto=$lote_producto;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_kardex_detalleValue(string $sKey,$oValue) {
		$this->map_kardex_detalle[$sKey]=$oValue;
	}
	
	public function getMap_kardex_detalleValue(string $sKey) {
		return $this->map_kardex_detalle[$sKey];
	}
	
	public function getkardex_detalle_Original() : ?kardex_detalle {
		return $this->kardex_detalle_Original;
	}
	
	public function setkardex_detalle_Original(kardex_detalle $kardex_detalle) {
		try {
			$this->kardex_detalle_Original=$kardex_detalle;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_kardex_detalle() : array {
		return $this->map_kardex_detalle;
	}

	public function setMap_kardex_detalle(array $map_kardex_detalle) {
		$this->map_kardex_detalle = $map_kardex_detalle;
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
