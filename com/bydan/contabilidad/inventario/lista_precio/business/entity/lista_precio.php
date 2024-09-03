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
namespace com\bydan\contabilidad\inventario\lista_precio\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;

class lista_precio extends GeneralEntity {

	/*GENERAL*/
	public static string $class='lista_precio';
	
	/*AUXILIARES*/
	public ?lista_precio $lista_precio_Original=null;	
	public ?GeneralEntity $lista_precio_Additional=null;
	public array $map_lista_precio=array();	
		
	/*CAMPOS*/
	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public int $id_bodega = -1;
	public string $id_bodega_Descripcion = '';

	public int $id_producto = -1;
	public string $id_producto_Descripcion = '';

	public int $id_proveedor = -1;
	public string $id_proveedor_Descripcion = '';

	public float $precio_compra = 0.0;
	public float $rango_inicial = 0.0;
	public float $rango_final = 0.0;
	public string $precio_dolar = '';
	public float $precio_compra2 = 0.0;
	public string $precio_dolar2 = '';
	public float $rango_inicial2 = 0.0;
	public float $rango_final2 = 0.0;
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	public ?bodega $bodega = null;
	public ?producto $producto = null;
	public ?proveedor $proveedor = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->lista_precio_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->id_bodega=-1;
		$this->id_bodega_Descripcion='';

 		$this->id_producto=-1;
		$this->id_producto_Descripcion='';

 		$this->id_proveedor=-1;
		$this->id_proveedor_Descripcion='';

 		$this->precio_compra=0.0;
 		$this->rango_inicial=0.0;
 		$this->rango_final=0.0;
 		$this->precio_dolar='';
 		$this->precio_compra2=0.0;
 		$this->precio_dolar2='';
 		$this->rango_inicial2=0.0;
 		$this->rango_final2=0.0;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
			$this->bodega=new bodega();
			$this->producto=new producto();
			$this->proveedor=new proveedor();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->lista_precio_Additional=new lista_precio_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_lista_precio() {
		$this->map_lista_precio = array();
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
    
	public function  getid_proveedor() : ?int {
		return $this->id_proveedor;
	}
	
	public function  getid_proveedor_Descripcion() : string {
		return $this->id_proveedor_Descripcion;
	}
    
	public function  getprecio_compra() : ?float {
		return $this->precio_compra;
	}
    
	public function  getrango_inicial() : ?float {
		return $this->rango_inicial;
	}
    
	public function  getrango_final() : ?float {
		return $this->rango_final;
	}
    
	public function  getprecio_dolar() : ?string {
		return $this->precio_dolar;
	}
    
	public function  getprecio_compra2() : ?float {
		return $this->precio_compra2;
	}
    
	public function  getprecio_dolar2() : ?string {
		return $this->precio_dolar2;
	}
    
	public function  getrango_inicial2() : ?float {
		return $this->rango_inicial2;
	}
    
	public function  getrango_final2() : ?float {
		return $this->rango_final2;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('lista_precio:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lista_precio:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('lista_precio:Valor nulo no permitido en columna id_empresa');
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
					throw new Exception('lista_precio:Valor nulo no permitido en columna id_bodega');
				}

				if($newid_bodega!==null && filter_var($newid_bodega,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lista_precio:No es numero entero - id_bodega='.$newid_bodega);
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
					throw new Exception('lista_precio:Valor nulo no permitido en columna id_bodega');
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
					throw new Exception('lista_precio:Valor nulo no permitido en columna id_producto');
				}

				if($newid_producto!==null && filter_var($newid_producto,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lista_precio:No es numero entero - id_producto='.$newid_producto);
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
					throw new Exception('lista_precio:Valor nulo no permitido en columna id_producto');
				}

				$this->id_producto_Descripcion=$newid_producto_Descripcion;
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
					throw new Exception('lista_precio:Valor nulo no permitido en columna id_proveedor');
				}

				if($newid_proveedor!==null && filter_var($newid_proveedor,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lista_precio:No es numero entero - id_proveedor='.$newid_proveedor);
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
					throw new Exception('lista_precio:Valor nulo no permitido en columna id_proveedor');
				}

				$this->id_proveedor_Descripcion=$newid_proveedor_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setprecio_compra(?float $newprecio_compra)
	{
		try {
			if($this->precio_compra!==$newprecio_compra) {
				if($newprecio_compra===null && $newprecio_compra!='') {
					throw new Exception('lista_precio:Valor nulo no permitido en columna precio_compra');
				}

				if($newprecio_compra!=0) {
					if($newprecio_compra!==null && filter_var($newprecio_compra,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('lista_precio:No es numero decimal - precio_compra='.$newprecio_compra);
					}
				}

				$this->precio_compra=$newprecio_compra;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setrango_inicial(?float $newrango_inicial)
	{
		try {
			if($this->rango_inicial!==$newrango_inicial) {
				if($newrango_inicial===null && $newrango_inicial!='') {
					throw new Exception('lista_precio:Valor nulo no permitido en columna rango_inicial');
				}

				if($newrango_inicial!=0) {
					if($newrango_inicial!==null && filter_var($newrango_inicial,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('lista_precio:No es numero decimal - rango_inicial='.$newrango_inicial);
					}
				}

				$this->rango_inicial=$newrango_inicial;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setrango_final(?float $newrango_final)
	{
		try {
			if($this->rango_final!==$newrango_final) {
				if($newrango_final===null && $newrango_final!='') {
					throw new Exception('lista_precio:Valor nulo no permitido en columna rango_final');
				}

				if($newrango_final!=0) {
					if($newrango_final!==null && filter_var($newrango_final,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('lista_precio:No es numero decimal - rango_final='.$newrango_final);
					}
				}

				$this->rango_final=$newrango_final;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setprecio_dolar(?string $newprecio_dolar)
	{
		try {
			if($this->precio_dolar!==$newprecio_dolar) {
				if($newprecio_dolar===null && $newprecio_dolar!='') {
					throw new Exception('lista_precio:Valor nulo no permitido en columna precio_dolar');
				}

				if(strlen($newprecio_dolar)>10) {
					throw new Exception('lista_precio:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=10 en columna precio_dolar');
				}

				if(filter_var($newprecio_dolar,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('lista_precio:Formato incorrecto en columna precio_dolar='.$newprecio_dolar);
				}

				$this->precio_dolar=$newprecio_dolar;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setprecio_compra2(?float $newprecio_compra2)
	{
		try {
			if($this->precio_compra2!==$newprecio_compra2) {
				if($newprecio_compra2===null && $newprecio_compra2!='') {
					throw new Exception('lista_precio:Valor nulo no permitido en columna precio_compra2');
				}

				if($newprecio_compra2!=0) {
					if($newprecio_compra2!==null && filter_var($newprecio_compra2,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('lista_precio:No es numero decimal - precio_compra2='.$newprecio_compra2);
					}
				}

				$this->precio_compra2=$newprecio_compra2;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setprecio_dolar2(?string $newprecio_dolar2)
	{
		try {
			if($this->precio_dolar2!==$newprecio_dolar2) {
				if($newprecio_dolar2===null && $newprecio_dolar2!='') {
					throw new Exception('lista_precio:Valor nulo no permitido en columna precio_dolar2');
				}

				if(strlen($newprecio_dolar2)>10) {
					throw new Exception('lista_precio:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=10 en columna precio_dolar2');
				}

				if(filter_var($newprecio_dolar2,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('lista_precio:Formato incorrecto en columna precio_dolar2='.$newprecio_dolar2);
				}

				$this->precio_dolar2=$newprecio_dolar2;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setrango_inicial2(?float $newrango_inicial2)
	{
		try {
			if($this->rango_inicial2!==$newrango_inicial2) {
				if($newrango_inicial2===null && $newrango_inicial2!='') {
					throw new Exception('lista_precio:Valor nulo no permitido en columna rango_inicial2');
				}

				if($newrango_inicial2!=0) {
					if($newrango_inicial2!==null && filter_var($newrango_inicial2,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('lista_precio:No es numero decimal - rango_inicial2='.$newrango_inicial2);
					}
				}

				$this->rango_inicial2=$newrango_inicial2;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setrango_final2(?float $newrango_final2)
	{
		try {
			if($this->rango_final2!==$newrango_final2) {
				if($newrango_final2===null && $newrango_final2!='') {
					throw new Exception('lista_precio:Valor nulo no permitido en columna rango_final2');
				}

				if($newrango_final2!=0) {
					if($newrango_final2!==null && filter_var($newrango_final2,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('lista_precio:No es numero decimal - rango_final2='.$newrango_final2);
					}
				}

				$this->rango_final2=$newrango_final2;
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

	public function getproveedor() : ?proveedor {
		return $this->proveedor;
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


	public  function  setproveedor(?proveedor $proveedor) {
		try {
			$this->proveedor=$proveedor;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_lista_precioValue(string $sKey,$oValue) {
		$this->map_lista_precio[$sKey]=$oValue;
	}
	
	public function getMap_lista_precioValue(string $sKey) {
		return $this->map_lista_precio[$sKey];
	}
	
	public function getlista_precio_Original() : ?lista_precio {
		return $this->lista_precio_Original;
	}
	
	public function setlista_precio_Original(lista_precio $lista_precio) {
		try {
			$this->lista_precio_Original=$lista_precio;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_lista_precio() : array {
		return $this->map_lista_precio;
	}

	public function setMap_lista_precio(array $map_lista_precio) {
		$this->map_lista_precio = $map_lista_precio;
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
