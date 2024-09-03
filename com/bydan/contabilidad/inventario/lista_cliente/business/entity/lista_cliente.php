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
namespace com\bydan\contabilidad\inventario\lista_cliente\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;

class lista_cliente extends GeneralEntity {

	/*GENERAL*/
	public static string $class='lista_cliente';
	
	/*AUXILIARES*/
	public ?lista_cliente $lista_cliente_Original=null;	
	public ?GeneralEntity $lista_cliente_Additional=null;
	public array $map_lista_cliente=array();	
		
	/*CAMPOS*/
	public int $id_cliente = -1;
	public string $id_cliente_Descripcion = '';

	public int $id_producto = -1;
	public string $id_producto_Descripcion = '';

	public float $precio = 0.0;
	
	/*FKs*/
	
	public ?cliente $cliente = null;
	public ?producto $producto = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->lista_cliente_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_cliente=-1;
		$this->id_cliente_Descripcion='';

 		$this->id_producto=-1;
		$this->id_producto_Descripcion='';

 		$this->precio=0.0;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->cliente=new cliente();
			$this->producto=new producto();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->lista_cliente_Additional=new lista_cliente_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_lista_cliente() {
		$this->map_lista_cliente = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_cliente() : ?int {
		return $this->id_cliente;
	}
	
	public function  getid_cliente_Descripcion() : string {
		return $this->id_cliente_Descripcion;
	}
    
	public function  getid_producto() : ?int {
		return $this->id_producto;
	}
	
	public function  getid_producto_Descripcion() : string {
		return $this->id_producto_Descripcion;
	}
    
	public function  getprecio() : ?float {
		return $this->precio;
	}
	
    
	public function setid_cliente(?int $newid_cliente)
	{
		try {
			if($this->id_cliente!==$newid_cliente) {
				if($newid_cliente===null && $newid_cliente!='') {
					throw new Exception('lista_cliente:Valor nulo no permitido en columna id_cliente');
				}

				if($newid_cliente!==null && filter_var($newid_cliente,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lista_cliente:No es numero entero - id_cliente='.$newid_cliente);
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
					throw new Exception('lista_cliente:Valor nulo no permitido en columna id_cliente');
				}

				$this->id_cliente_Descripcion=$newid_cliente_Descripcion;
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
					throw new Exception('lista_cliente:Valor nulo no permitido en columna id_producto');
				}

				if($newid_producto!==null && filter_var($newid_producto,FILTER_VALIDATE_INT)===false) {
					throw new Exception('lista_cliente:No es numero entero - id_producto='.$newid_producto);
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
					throw new Exception('lista_cliente:Valor nulo no permitido en columna id_producto');
				}

				$this->id_producto_Descripcion=$newid_producto_Descripcion;
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
					throw new Exception('lista_cliente:Valor nulo no permitido en columna precio');
				}

				if($newprecio!=0) {
					if($newprecio!==null && filter_var($newprecio,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('lista_cliente:No es numero decimal - precio='.$newprecio);
					}
				}

				$this->precio=$newprecio;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	public function getcliente() : ?cliente {
		return $this->cliente;
	}

	public function getproducto() : ?producto {
		return $this->producto;
	}

	
	
	public  function  setcliente(?cliente $cliente) {
		try {
			$this->cliente=$cliente;
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
	public function setMap_lista_clienteValue(string $sKey,$oValue) {
		$this->map_lista_cliente[$sKey]=$oValue;
	}
	
	public function getMap_lista_clienteValue(string $sKey) {
		return $this->map_lista_cliente[$sKey];
	}
	
	public function getlista_cliente_Original() : ?lista_cliente {
		return $this->lista_cliente_Original;
	}
	
	public function setlista_cliente_Original(lista_cliente $lista_cliente) {
		try {
			$this->lista_cliente_Original=$lista_cliente;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_lista_cliente() : array {
		return $this->map_lista_cliente;
	}

	public function setMap_lista_cliente(array $map_lista_cliente) {
		$this->map_lista_cliente = $map_lista_cliente;
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
