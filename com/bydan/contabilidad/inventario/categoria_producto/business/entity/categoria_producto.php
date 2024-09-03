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
namespace com\bydan\contabilidad\inventario\categoria_producto\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;

class categoria_producto extends GeneralEntity {

	/*GENERAL*/
	public static string $class='categoria_producto';
	
	/*AUXILIARES*/
	public ?categoria_producto $categoria_producto_Original=null;	
	public ?GeneralEntity $categoria_producto_Additional=null;
	public array $map_categoria_producto=array();	
		
	/*CAMPOS*/
	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public string $codigo = '';
	public string $nombre = '';
	public bool $predeterminado = false;
	public int $numero_productos = 0;
	public string $imagen = '';
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	
	/*RELACIONES*/
	
	public array $productos = array();
	public array $subcategoriaproductos = array();
	public array $listaproductos = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->categoria_producto_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->codigo='';
 		$this->nombre='';
 		$this->predeterminado=false;
 		$this->numero_productos=0;
 		$this->imagen='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
		}
		
		/*RELACIONES*/
		
		$this->productos=array();
		$this->subcategoriaproductos=array();
		$this->listaproductos=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->categoria_producto_Additional=new categoria_producto_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_categoria_producto() {
		$this->map_categoria_producto = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_empresa() : ?int {
		return $this->id_empresa;
	}
	
	public function  getid_empresa_Descripcion() : string {
		return $this->id_empresa_Descripcion;
	}
    
	public function  getcodigo() : ?string {
		return $this->codigo;
	}
    
	public function  getnombre() : ?string {
		return $this->nombre;
	}
    
	public function  getpredeterminado() : ?bool {
		return $this->predeterminado;
	}
    
	public function  getnumero_productos() : ?int {
		return $this->numero_productos;
	}
    
	public function  getimagen() : ?string {
		return $this->imagen;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('categoria_producto:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('categoria_producto:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('categoria_producto:Valor nulo no permitido en columna id_empresa');
				}

				$this->id_empresa_Descripcion=$newid_empresa_Descripcion;
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
					throw new Exception('categoria_producto:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>10) {
					throw new Exception('categoria_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=10 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('categoria_producto:Formato incorrecto en columna codigo='.$newcodigo);
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
					throw new Exception('categoria_producto:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>40) {
					throw new Exception('categoria_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=40 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('categoria_producto:Formato incorrecto en columna nombre='.$newnombre);
				}

				$this->nombre=$newnombre;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setpredeterminado(?bool $newpredeterminado)
	{
		try {
			if($this->predeterminado!==$newpredeterminado) {
				if($newpredeterminado===null && $newpredeterminado!='') {
					throw new Exception('categoria_producto:Valor nulo no permitido en columna predeterminado');
				}

				if($newpredeterminado!==null && filter_var($newpredeterminado,FILTER_VALIDATE_BOOLEAN)===false && $newpredeterminado!==0 && $newpredeterminado!==false) {
					throw new Exception('categoria_producto:No es valor booleano - predeterminado='.$newpredeterminado);
				}

				$this->predeterminado=$newpredeterminado;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnumero_productos(?int $newnumero_productos)
	{
		try {
			if($this->numero_productos!==$newnumero_productos) {
				if($newnumero_productos===null && $newnumero_productos!='') {
					throw new Exception('categoria_producto:Valor nulo no permitido en columna numero_productos');
				}

				if($newnumero_productos!==null && filter_var($newnumero_productos,FILTER_VALIDATE_INT)===false) {
					throw new Exception('categoria_producto:No es numero entero - numero_productos='.$newnumero_productos);
				}

				$this->numero_productos=$newnumero_productos;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setimagen(?string $newimagen) {
		if($this->imagen!==$newimagen) {

				if(strlen($newimagen)>1000) {
					try {
						throw new Exception('categoria_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=imagen en columna imagen');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newimagen,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('categoria_producto:Formato incorrecto en la columna imagen='.$newimagen);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->imagen=$newimagen;
			$this->setIsChanged(true);
		}
	}
	
	/*FKs*/
	
	public function getempresa() : ?empresa {
		return $this->empresa;
	}

	
	
	public  function  setempresa(?empresa $empresa) {
		try {
			$this->empresa=$empresa;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	public function getproductos() : array {
		return $this->productos;
	}

	public function getsub_categoria_productos() : array {
		return $this->subcategoriaproductos;
	}

	public function getlista_productos() : array {
		return $this->listaproductos;
	}

	
	
	public  function  setproductos(array $productos) {
		try {
			$this->productos=$productos;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setsub_categoria_productos(array $subcategoriaproductos) {
		try {
			$this->subcategoriaproductos=$subcategoriaproductos;
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
	public function setMap_categoria_productoValue(string $sKey,$oValue) {
		$this->map_categoria_producto[$sKey]=$oValue;
	}
	
	public function getMap_categoria_productoValue(string $sKey) {
		return $this->map_categoria_producto[$sKey];
	}
	
	public function getcategoria_producto_Original() : ?categoria_producto {
		return $this->categoria_producto_Original;
	}
	
	public function setcategoria_producto_Original(categoria_producto $categoria_producto) {
		try {
			$this->categoria_producto_Original=$categoria_producto;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_categoria_producto() : array {
		return $this->map_categoria_producto;
	}

	public function setMap_categoria_producto(array $map_categoria_producto) {
		$this->map_categoria_producto = $map_categoria_producto;
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
