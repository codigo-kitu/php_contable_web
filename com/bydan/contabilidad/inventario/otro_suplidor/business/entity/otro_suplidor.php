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
namespace com\bydan\contabilidad\inventario\otro_suplidor\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;

class otro_suplidor extends GeneralEntity {

	/*GENERAL*/
	public static string $class='otro_suplidor';
	
	/*AUXILIARES*/
	public ?otro_suplidor $otro_suplidor_Original=null;	
	public ?GeneralEntity $otro_suplidor_Additional=null;
	public array $map_otro_suplidor=array();	
		
	/*CAMPOS*/
	public int $id_producto = -1;
	public string $id_producto_Descripcion = '';

	public int $id_proveedor = -1;
	public string $id_proveedor_Descripcion = '';

	
	/*FKs*/
	
	public ?producto $producto = null;
	public ?proveedor $proveedor = null;
	
	/*RELACIONES*/
	
	public array $cotizaciondetalles = array();
	public array $listaproductos = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->otro_suplidor_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_producto=-1;
		$this->id_producto_Descripcion='';

 		$this->id_proveedor=-1;
		$this->id_proveedor_Descripcion='';

		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->producto=new producto();
			$this->proveedor=new proveedor();
		}
		
		/*RELACIONES*/
		
		$this->cotizaciondetalles=array();
		$this->listaproductos=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->otro_suplidor_Additional=new otro_suplidor_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_otro_suplidor() {
		$this->map_otro_suplidor = array();
	}
	
	/*CAMPOS*/
    
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
	
    
	public function setid_producto(?int $newid_producto)
	{
		try {
			if($this->id_producto!==$newid_producto) {
				if($newid_producto===null && $newid_producto!='') {
					throw new Exception('otro_suplidor:Valor nulo no permitido en columna id_producto');
				}

				if($newid_producto!==null && filter_var($newid_producto,FILTER_VALIDATE_INT)===false) {
					throw new Exception('otro_suplidor:No es numero entero - id_producto='.$newid_producto);
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
					throw new Exception('otro_suplidor:Valor nulo no permitido en columna id_producto');
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
					throw new Exception('otro_suplidor:Valor nulo no permitido en columna id_proveedor');
				}

				if($newid_proveedor!==null && filter_var($newid_proveedor,FILTER_VALIDATE_INT)===false) {
					throw new Exception('otro_suplidor:No es numero entero - id_proveedor='.$newid_proveedor);
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
					throw new Exception('otro_suplidor:Valor nulo no permitido en columna id_proveedor');
				}

				$this->id_proveedor_Descripcion=$newid_proveedor_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	public function getproducto() : ?producto {
		return $this->producto;
	}

	public function getproveedor() : ?proveedor {
		return $this->proveedor;
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
	
	public function getcotizacion_detalles() : array {
		return $this->cotizaciondetalles;
	}

	public function getlista_productos() : array {
		return $this->listaproductos;
	}

	
	
	public  function  setcotizacion_detalles(array $cotizaciondetalles) {
		try {
			$this->cotizaciondetalles=$cotizaciondetalles;
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
	public function setMap_otro_suplidorValue(string $sKey,$oValue) {
		$this->map_otro_suplidor[$sKey]=$oValue;
	}
	
	public function getMap_otro_suplidorValue(string $sKey) {
		return $this->map_otro_suplidor[$sKey];
	}
	
	public function getotro_suplidor_Original() : ?otro_suplidor {
		return $this->otro_suplidor_Original;
	}
	
	public function setotro_suplidor_Original(otro_suplidor $otro_suplidor) {
		try {
			$this->otro_suplidor_Original=$otro_suplidor;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_otro_suplidor() : array {
		return $this->map_otro_suplidor;
	}

	public function setMap_otro_suplidor(array $map_otro_suplidor) {
		$this->map_otro_suplidor = $map_otro_suplidor;
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
