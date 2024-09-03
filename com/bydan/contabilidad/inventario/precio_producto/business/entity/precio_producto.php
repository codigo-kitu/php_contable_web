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
namespace com\bydan\contabilidad\inventario\precio_producto\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;

class precio_producto extends GeneralEntity {

	/*GENERAL*/
	public static string $class='precio_producto';
	
	/*AUXILIARES*/
	public ?precio_producto $precio_producto_Original=null;	
	public ?GeneralEntity $precio_producto_Additional=null;
	public array $map_precio_producto=array();	
		
	/*CAMPOS*/
	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public int $id_bodega = -1;
	public string $id_bodega_Descripcion = '';

	public int $id_producto = -1;
	public string $id_producto_Descripcion = '';

	public int $id_tipo_precio = -1;
	public string $id_tipo_precio_Descripcion = '';

	public float $precio = 0.0;
	public float $descuento_porciento = 0.0;
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	public ?bodega $bodega = null;
	public ?producto $producto = null;
	public ?tipo_precio $tipo_precio = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->precio_producto_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->id_bodega=-1;
		$this->id_bodega_Descripcion='';

 		$this->id_producto=-1;
		$this->id_producto_Descripcion='';

 		$this->id_tipo_precio=-1;
		$this->id_tipo_precio_Descripcion='';

 		$this->precio=0.0;
 		$this->descuento_porciento=0.0;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
			$this->bodega=new bodega();
			$this->producto=new producto();
			$this->tipo_precio=new tipo_precio();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->precio_producto_Additional=new precio_producto_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_precio_producto() {
		$this->map_precio_producto = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_empresa() : ?int {
		return $this->id_empresa;
	}
	
	public function  getid_empresa_Descripcion() : string {
		return $this->id_empresa_Descripcion;
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
    
	public function  getid_tipo_precio() : ?int {
		return $this->id_tipo_precio;
	}
	
	public function  getid_tipo_precio_Descripcion() : string {
		return $this->id_tipo_precio_Descripcion;
	}
    
	public function  getprecio() : ?float {
		return $this->precio;
	}
    
	public function  getdescuento_porciento() : ?float {
		return $this->descuento_porciento;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('precio_producto:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('precio_producto:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('precio_producto:Valor nulo no permitido en columna id_empresa');
				}

				$this->id_empresa_Descripcion=$newid_empresa_Descripcion;
				//$this->setIsChanged(true);
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
					throw new Exception('precio_producto:Valor nulo no permitido en columna id_bodega');
				}

				if($newid_bodega!==null && filter_var($newid_bodega,FILTER_VALIDATE_INT)===false) {
					throw new Exception('precio_producto:No es numero entero - id_bodega='.$newid_bodega);
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
					throw new Exception('precio_producto:Valor nulo no permitido en columna id_bodega');
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
					throw new Exception('precio_producto:Valor nulo no permitido en columna id_producto');
				}

				if($newid_producto!==null && filter_var($newid_producto,FILTER_VALIDATE_INT)===false) {
					throw new Exception('precio_producto:No es numero entero - id_producto='.$newid_producto);
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
					throw new Exception('precio_producto:Valor nulo no permitido en columna id_producto');
				}

				$this->id_producto_Descripcion=$newid_producto_Descripcion;
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
					throw new Exception('precio_producto:Valor nulo no permitido en columna id_tipo_precio');
				}

				if($newid_tipo_precio!==null && filter_var($newid_tipo_precio,FILTER_VALIDATE_INT)===false) {
					throw new Exception('precio_producto:No es numero entero - id_tipo_precio='.$newid_tipo_precio);
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
					throw new Exception('precio_producto:Valor nulo no permitido en columna id_tipo_precio');
				}

				$this->id_tipo_precio_Descripcion=$newid_tipo_precio_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setprecio(?float $newprecio)
	{
		try {
			if($this->precio!==$newprecio) {
				if($newprecio===null && $newprecio!='') {
					throw new Exception('precio_producto:Valor nulo no permitido en columna precio');
				}

				if($newprecio!=0) {
					if($newprecio!==null && filter_var($newprecio,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('precio_producto:No es numero decimal - precio='.$newprecio);
					}
				}

				$this->precio=$newprecio;
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
					throw new Exception('precio_producto:Valor nulo no permitido en columna descuento_porciento');
				}

				if($newdescuento_porciento!=0) {
					if($newdescuento_porciento!==null && filter_var($newdescuento_porciento,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('precio_producto:No es numero decimal - descuento_porciento='.$newdescuento_porciento);
					}
				}

				$this->descuento_porciento=$newdescuento_porciento;
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

	public function getbodega() : ?bodega {
		return $this->bodega;
	}

	public function getproducto() : ?producto {
		return $this->producto;
	}

	public function gettipo_precio() : ?tipo_precio {
		return $this->tipo_precio;
	}

	
	
	public  function  setempresa(?empresa $empresa) {
		try {
			$this->empresa=$empresa;
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


	public  function  settipo_precio(?tipo_precio $tipo_precio) {
		try {
			$this->tipo_precio=$tipo_precio;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_precio_productoValue(string $sKey,$oValue) {
		$this->map_precio_producto[$sKey]=$oValue;
	}
	
	public function getMap_precio_productoValue(string $sKey) {
		return $this->map_precio_producto[$sKey];
	}
	
	public function getprecio_producto_Original() : ?precio_producto {
		return $this->precio_producto_Original;
	}
	
	public function setprecio_producto_Original(precio_producto $precio_producto) {
		try {
			$this->precio_producto_Original=$precio_producto;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_precio_producto() : array {
		return $this->map_precio_producto;
	}

	public function setMap_precio_producto(array $map_precio_producto) {
		$this->map_precio_producto = $map_precio_producto;
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
