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
namespace com\bydan\contabilidad\inventario\serial_producto\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class serial_producto extends GeneralEntity {

	/*GENERAL*/
	public static string $class='serial_producto';
	
	/*AUXILIARES*/
	public ?serial_producto $serial_producto_Original=null;	
	public ?GeneralEntity $serial_producto_Additional=null;
	public array $map_serial_producto=array();	
		
	/*CAMPOS*/
	public int $id_producto = -1;
	public string $id_producto_Descripcion = '';

	public string $nro_serial = '';
	public string $ingresado = '';
	public int $proveedor_mid = 0;
	public string $modulo_ingreso = '';
	public string $nro_documento_ingreso = '';
	public string $salida = '';
	public int $cliente_mid = 0;
	public string $modulo_salida = '';
	public int $id_bodega = -1;
	public string $id_bodega_Descripcion = '';

	public int $nro_item = 0;
	public string $nro_documento_salida = '';
	public int $nro_items = 0;
	
	/*FKs*/
	
	public ?producto $producto = null;
	public ?bodega $bodega = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->serial_producto_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_producto=-1;
		$this->id_producto_Descripcion='';

 		$this->nro_serial='';
 		$this->ingresado=date('Y-m-d');
 		$this->proveedor_mid=0;
 		$this->modulo_ingreso='';
 		$this->nro_documento_ingreso='';
 		$this->salida=date('Y-m-d');
 		$this->cliente_mid=0;
 		$this->modulo_salida='';
 		$this->id_bodega=-1;
		$this->id_bodega_Descripcion='';

 		$this->nro_item=0;
 		$this->nro_documento_salida='';
 		$this->nro_items=0;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->producto=new producto();
			$this->bodega=new bodega();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->serial_producto_Additional=new serial_producto_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_serial_producto() {
		$this->map_serial_producto = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_producto() : ?int {
		return $this->id_producto;
	}
	
	public function  getid_producto_Descripcion() : string {
		return $this->id_producto_Descripcion;
	}
    
	public function  getnro_serial() : ?string {
		return $this->nro_serial;
	}
    
	public function  getingresado() : ?string {
		return $this->ingresado;
	}
    
	public function  getproveedor_mid() : ?int {
		return $this->proveedor_mid;
	}
    
	public function  getmodulo_ingreso() : ?string {
		return $this->modulo_ingreso;
	}
    
	public function  getnro_documento_ingreso() : ?string {
		return $this->nro_documento_ingreso;
	}
    
	public function  getsalida() : ?string {
		return $this->salida;
	}
    
	public function  getcliente_mid() : ?int {
		return $this->cliente_mid;
	}
    
	public function  getmodulo_salida() : ?string {
		return $this->modulo_salida;
	}
    
	public function  getid_bodega() : ?int {
		return $this->id_bodega;
	}
	
	public function  getid_bodega_Descripcion() : string {
		return $this->id_bodega_Descripcion;
	}
    
	public function  getnro_item() : ?int {
		return $this->nro_item;
	}
    
	public function  getnro_documento_salida() : ?string {
		return $this->nro_documento_salida;
	}
    
	public function  getnro_items() : ?int {
		return $this->nro_items;
	}
	
    
	public function setid_producto(?int $newid_producto)
	{
		try {
			if($this->id_producto!==$newid_producto) {
				if($newid_producto===null && $newid_producto!='') {
					throw new Exception('serial_producto:Valor nulo no permitido en columna id_producto');
				}

				if($newid_producto!==null && filter_var($newid_producto,FILTER_VALIDATE_INT)===false) {
					throw new Exception('serial_producto:No es numero entero - id_producto='.$newid_producto);
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
					throw new Exception('serial_producto:Valor nulo no permitido en columna id_producto');
				}

				$this->id_producto_Descripcion=$newid_producto_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnro_serial(?string $newnro_serial)
	{
		try {
			if($this->nro_serial!==$newnro_serial) {
				if($newnro_serial===null && $newnro_serial!='') {
					throw new Exception('serial_producto:Valor nulo no permitido en columna nro_serial');
				}

				if(strlen($newnro_serial)>1000) {
					throw new Exception('serial_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna nro_serial');
				}

				if(filter_var($newnro_serial,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('serial_producto:Formato incorrecto en columna nro_serial='.$newnro_serial);
				}

				$this->nro_serial=$newnro_serial;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setingresado(?string $newingresado)
	{
		try {
			if($this->ingresado!==$newingresado) {
				if($newingresado===null && $newingresado!='') {
					throw new Exception('serial_producto:Valor nulo no permitido en columna ingresado');
				}

				if($newingresado!==null && filter_var($newingresado,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('serial_producto:No es fecha - ingresado='.$newingresado);
				}

				$this->ingresado=$newingresado;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setproveedor_mid(?int $newproveedor_mid)
	{
		try {
			if($this->proveedor_mid!==$newproveedor_mid) {
				if($newproveedor_mid===null && $newproveedor_mid!='') {
					throw new Exception('serial_producto:Valor nulo no permitido en columna proveedor_mid');
				}

				if($newproveedor_mid!==null && filter_var($newproveedor_mid,FILTER_VALIDATE_INT)===false) {
					throw new Exception('serial_producto:No es numero entero - proveedor_mid='.$newproveedor_mid);
				}

				$this->proveedor_mid=$newproveedor_mid;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setmodulo_ingreso(?string $newmodulo_ingreso)
	{
		try {
			if($this->modulo_ingreso!==$newmodulo_ingreso) {
				if($newmodulo_ingreso===null && $newmodulo_ingreso!='') {
					throw new Exception('serial_producto:Valor nulo no permitido en columna modulo_ingreso');
				}

				if(strlen($newmodulo_ingreso)>3) {
					throw new Exception('serial_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=3 en columna modulo_ingreso');
				}

				if(filter_var($newmodulo_ingreso,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('serial_producto:Formato incorrecto en columna modulo_ingreso='.$newmodulo_ingreso);
				}

				$this->modulo_ingreso=$newmodulo_ingreso;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnro_documento_ingreso(?string $newnro_documento_ingreso)
	{
		try {
			if($this->nro_documento_ingreso!==$newnro_documento_ingreso) {
				if($newnro_documento_ingreso===null && $newnro_documento_ingreso!='') {
					throw new Exception('serial_producto:Valor nulo no permitido en columna nro_documento_ingreso');
				}

				if(strlen($newnro_documento_ingreso)>10) {
					throw new Exception('serial_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=10 en columna nro_documento_ingreso');
				}

				if(filter_var($newnro_documento_ingreso,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('serial_producto:Formato incorrecto en columna nro_documento_ingreso='.$newnro_documento_ingreso);
				}

				$this->nro_documento_ingreso=$newnro_documento_ingreso;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setsalida(?string $newsalida)
	{
		try {
			if($this->salida!==$newsalida) {
				if($newsalida===null && $newsalida!='') {
					throw new Exception('serial_producto:Valor nulo no permitido en columna salida');
				}

				if($newsalida!==null && filter_var($newsalida,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('serial_producto:No es fecha - salida='.$newsalida);
				}

				$this->salida=$newsalida;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcliente_mid(?int $newcliente_mid)
	{
		try {
			if($this->cliente_mid!==$newcliente_mid) {
				if($newcliente_mid===null && $newcliente_mid!='') {
					throw new Exception('serial_producto:Valor nulo no permitido en columna cliente_mid');
				}

				if($newcliente_mid!==null && filter_var($newcliente_mid,FILTER_VALIDATE_INT)===false) {
					throw new Exception('serial_producto:No es numero entero - cliente_mid='.$newcliente_mid);
				}

				$this->cliente_mid=$newcliente_mid;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setmodulo_salida(?string $newmodulo_salida)
	{
		try {
			if($this->modulo_salida!==$newmodulo_salida) {
				if($newmodulo_salida===null && $newmodulo_salida!='') {
					throw new Exception('serial_producto:Valor nulo no permitido en columna modulo_salida');
				}

				if(strlen($newmodulo_salida)>3) {
					throw new Exception('serial_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=3 en columna modulo_salida');
				}

				if(filter_var($newmodulo_salida,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('serial_producto:Formato incorrecto en columna modulo_salida='.$newmodulo_salida);
				}

				$this->modulo_salida=$newmodulo_salida;
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
					throw new Exception('serial_producto:Valor nulo no permitido en columna id_bodega');
				}

				if($newid_bodega!==null && filter_var($newid_bodega,FILTER_VALIDATE_INT)===false) {
					throw new Exception('serial_producto:No es numero entero - id_bodega='.$newid_bodega);
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
					throw new Exception('serial_producto:Valor nulo no permitido en columna id_bodega');
				}

				$this->id_bodega_Descripcion=$newid_bodega_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnro_item(?int $newnro_item)
	{
		try {
			if($this->nro_item!==$newnro_item) {
				if($newnro_item===null && $newnro_item!='') {
					throw new Exception('serial_producto:Valor nulo no permitido en columna nro_item');
				}

				if($newnro_item!==null && filter_var($newnro_item,FILTER_VALIDATE_INT)===false) {
					throw new Exception('serial_producto:No es numero entero - nro_item='.$newnro_item);
				}

				$this->nro_item=$newnro_item;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnro_documento_salida(?string $newnro_documento_salida)
	{
		try {
			if($this->nro_documento_salida!==$newnro_documento_salida) {
				if($newnro_documento_salida===null && $newnro_documento_salida!='') {
					throw new Exception('serial_producto:Valor nulo no permitido en columna nro_documento_salida');
				}

				if(strlen($newnro_documento_salida)>10) {
					throw new Exception('serial_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=10 en columna nro_documento_salida');
				}

				if(filter_var($newnro_documento_salida,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('serial_producto:Formato incorrecto en columna nro_documento_salida='.$newnro_documento_salida);
				}

				$this->nro_documento_salida=$newnro_documento_salida;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnro_items(?int $newnro_items)
	{
		try {
			if($this->nro_items!==$newnro_items) {
				if($newnro_items===null && $newnro_items!='') {
					throw new Exception('serial_producto:Valor nulo no permitido en columna nro_items');
				}

				if($newnro_items!==null && filter_var($newnro_items,FILTER_VALIDATE_INT)===false) {
					throw new Exception('serial_producto:No es numero entero - nro_items='.$newnro_items);
				}

				$this->nro_items=$newnro_items;
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

	public function getbodega() : ?bodega {
		return $this->bodega;
	}

	
	
	public  function  setproducto(?producto $producto) {
		try {
			$this->producto=$producto;
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

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_serial_productoValue(string $sKey,$oValue) {
		$this->map_serial_producto[$sKey]=$oValue;
	}
	
	public function getMap_serial_productoValue(string $sKey) {
		return $this->map_serial_producto[$sKey];
	}
	
	public function getserial_producto_Original() : ?serial_producto {
		return $this->serial_producto_Original;
	}
	
	public function setserial_producto_Original(serial_producto $serial_producto) {
		try {
			$this->serial_producto_Original=$serial_producto;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_serial_producto() : array {
		return $this->map_serial_producto;
	}

	public function setMap_serial_producto(array $map_serial_producto) {
		$this->map_serial_producto = $map_serial_producto;
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
