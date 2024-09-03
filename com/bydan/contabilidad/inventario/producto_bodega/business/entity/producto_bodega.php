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
namespace com\bydan\contabilidad\inventario\producto_bodega\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class producto_bodega extends GeneralEntity {

	/*GENERAL*/
	public static string $class='producto_bodega';
	
	/*AUXILIARES*/
	public ?producto_bodega $producto_bodega_Original=null;	
	public ?GeneralEntity $producto_bodega_Additional=null;
	public array $map_producto_bodega=array();	
		
	/*CAMPOS*/
	public int $id_bodega = -1;
	public string $id_bodega_Descripcion = '';

	public int $id_producto = -1;
	public string $id_producto_Descripcion = '';

	public float $cantidad = 0.0;
	public float $costo = 0.0;
	public string $ubicacion = '';
	
	/*FKs*/
	
	public ?bodega $bodega = null;
	public ?producto $producto = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->producto_bodega_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_bodega=-1;
		$this->id_bodega_Descripcion='';

 		$this->id_producto=-1;
		$this->id_producto_Descripcion='';

 		$this->cantidad=0.0;
 		$this->costo=0.0;
 		$this->ubicacion='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->bodega=new bodega();
			$this->producto=new producto();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->producto_bodega_Additional=new producto_bodega_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_producto_bodega() {
		$this->map_producto_bodega = array();
	}
	
	/*CAMPOS*/
    
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
    
	public function  getcantidad() : ?float {
		return $this->cantidad;
	}
    
	public function  getcosto() : ?float {
		return $this->costo;
	}
    
	public function  getubicacion() : ?string {
		return $this->ubicacion;
	}
	
    
	public function setid_bodega(?int $newid_bodega)
	{
		try {
			if($this->id_bodega!==$newid_bodega) {
				if($newid_bodega===null && $newid_bodega!='') {
					throw new Exception('producto_bodega:Valor nulo no permitido en columna id_bodega');
				}

				if($newid_bodega!==null && filter_var($newid_bodega,FILTER_VALIDATE_INT)===false) {
					throw new Exception('producto_bodega:No es numero entero - id_bodega='.$newid_bodega);
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
					throw new Exception('producto_bodega:Valor nulo no permitido en columna id_bodega');
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
					throw new Exception('producto_bodega:Valor nulo no permitido en columna id_producto');
				}

				if($newid_producto!==null && filter_var($newid_producto,FILTER_VALIDATE_INT)===false) {
					throw new Exception('producto_bodega:No es numero entero - id_producto='.$newid_producto);
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
					throw new Exception('producto_bodega:Valor nulo no permitido en columna id_producto');
				}

				$this->id_producto_Descripcion=$newid_producto_Descripcion;
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
					throw new Exception('producto_bodega:Valor nulo no permitido en columna cantidad');
				}

				if($newcantidad!=0) {
					if($newcantidad!==null && filter_var($newcantidad,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('producto_bodega:No es numero decimal - cantidad='.$newcantidad);
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
					throw new Exception('producto_bodega:Valor nulo no permitido en columna costo');
				}

				if($newcosto!=0) {
					if($newcosto!==null && filter_var($newcosto,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('producto_bodega:No es numero decimal - costo='.$newcosto);
					}
				}

				$this->costo=$newcosto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setubicacion(?string $newubicacion) {
		if($this->ubicacion!==$newubicacion) {

				if(strlen($newubicacion)>30) {
					try {
						throw new Exception('producto_bodega:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=ubicacion en columna ubicacion');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newubicacion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('producto_bodega:Formato incorrecto en la columna ubicacion='.$newubicacion);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->ubicacion=$newubicacion;
			$this->setIsChanged(true);
		}
	}
	
	/*FKs*/
	
	public function getbodega() : ?bodega {
		return $this->bodega;
	}

	public function getproducto() : ?producto {
		return $this->producto;
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

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_producto_bodegaValue(string $sKey,$oValue) {
		$this->map_producto_bodega[$sKey]=$oValue;
	}
	
	public function getMap_producto_bodegaValue(string $sKey) {
		return $this->map_producto_bodega[$sKey];
	}
	
	public function getproducto_bodega_Original() : ?producto_bodega {
		return $this->producto_bodega_Original;
	}
	
	public function setproducto_bodega_Original(producto_bodega $producto_bodega) {
		try {
			$this->producto_bodega_Original=$producto_bodega;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_producto_bodega() : array {
		return $this->map_producto_bodega;
	}

	public function setMap_producto_bodega(array $map_producto_bodega) {
		$this->map_producto_bodega = $map_producto_bodega;
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
