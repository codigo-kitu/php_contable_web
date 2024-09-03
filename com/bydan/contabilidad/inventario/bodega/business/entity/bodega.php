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
namespace com\bydan\contabilidad\inventario\bodega\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;

class bodega extends GeneralEntity {

	/*GENERAL*/
	public static string $class='bodega';
	
	/*AUXILIARES*/
	public ?bodega $bodega_Original=null;	
	public ?GeneralEntity $bodega_Additional=null;
	public array $map_bodega=array();	
		
	/*CAMPOS*/
	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public int $id_sucursal = -1;
	public string $id_sucursal_Descripcion = '';

	public string $codigo = '';
	public string $nombre = '';
	public string $direccion = '';
	public string $telefono = '';
	public int $numero_productos = 0;
	public bool $defecto = false;
	public bool $activo = false;
	public string $direccion2 = '';
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	public ?sucursal $sucursal = null;
	
	/*RELACIONES*/
	
	public array $producto_defectos = array();
	public array $productobodegas = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->bodega_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->id_sucursal=-1;
		$this->id_sucursal_Descripcion='';

 		$this->codigo='';
 		$this->nombre='';
 		$this->direccion='';
 		$this->telefono='';
 		$this->numero_productos=0;
 		$this->defecto=false;
 		$this->activo=false;
 		$this->direccion2='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
			$this->sucursal=new sucursal();
		}
		
		/*RELACIONES*/
		
		$this->producto_defectos=array();
		$this->productobodegas=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->bodega_Additional=new bodega_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_bodega() {
		$this->map_bodega = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_empresa() : ?int {
		return $this->id_empresa;
	}
	
	public function  getid_empresa_Descripcion() : string {
		return $this->id_empresa_Descripcion;
	}
    
	public function  getid_sucursal() : ?int {
		return $this->id_sucursal;
	}
	
	public function  getid_sucursal_Descripcion() : string {
		return $this->id_sucursal_Descripcion;
	}
    
	public function  getcodigo() : ?string {
		return $this->codigo;
	}
    
	public function  getnombre() : ?string {
		return $this->nombre;
	}
    
	public function  getdireccion() : ?string {
		return $this->direccion;
	}
    
	public function  gettelefono() : ?string {
		return $this->telefono;
	}
    
	public function  getnumero_productos() : ?int {
		return $this->numero_productos;
	}
    
	public function  getdefecto() : ?bool {
		return $this->defecto;
	}
    
	public function  getactivo() : ?bool {
		return $this->activo;
	}
    
	public function  getdireccion2() : ?string {
		return $this->direccion2;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('bodega:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('bodega:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('bodega:Valor nulo no permitido en columna id_empresa');
				}

				$this->id_empresa_Descripcion=$newid_empresa_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_sucursal(?int $newid_sucursal)
	{
		try {
			if($this->id_sucursal!==$newid_sucursal) {
				if($newid_sucursal===null && $newid_sucursal!='') {
					throw new Exception('bodega:Valor nulo no permitido en columna id_sucursal');
				}

				if($newid_sucursal!==null && filter_var($newid_sucursal,FILTER_VALIDATE_INT)===false) {
					throw new Exception('bodega:No es numero entero - id_sucursal='.$newid_sucursal);
				}

				$this->id_sucursal=$newid_sucursal;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_sucursal_Descripcion(string $newid_sucursal_Descripcion)
	{
		try {
			if($this->id_sucursal_Descripcion!=$newid_sucursal_Descripcion) {
				if($newid_sucursal_Descripcion===null && $newid_sucursal_Descripcion!='') {
					throw new Exception('bodega:Valor nulo no permitido en columna id_sucursal');
				}

				$this->id_sucursal_Descripcion=$newid_sucursal_Descripcion;
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
					throw new Exception('bodega:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>25) {
					throw new Exception('bodega:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=25 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('bodega:Formato incorrecto en columna codigo='.$newcodigo);
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
					throw new Exception('bodega:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>100) {
					throw new Exception('bodega:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=100 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('bodega:Formato incorrecto en columna nombre='.$newnombre);
				}

				$this->nombre=$newnombre;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdireccion(?string $newdireccion)
	{
		try {
			if($this->direccion!==$newdireccion) {
				if($newdireccion===null && $newdireccion!='') {
					throw new Exception('bodega:Valor nulo no permitido en columna direccion');
				}

				if(strlen($newdireccion)>250) {
					throw new Exception('bodega:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=250 en columna direccion');
				}

				if(filter_var($newdireccion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('bodega:Formato incorrecto en columna direccion='.$newdireccion);
				}

				$this->direccion=$newdireccion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function settelefono(?string $newtelefono) {
		if($this->telefono!==$newtelefono) {

				if(strlen($newtelefono)>30) {
					try {
						throw new Exception('bodega:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=telefono en columna telefono');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newtelefono,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_TELEFONO_GENERAL)))===false) {
					try {
						throw new Exception('bodega:Formato incorrecto en la columna telefono='.$newtelefono);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->telefono=$newtelefono;
			$this->setIsChanged(true);
		}
	}
    
	public function setnumero_productos(?int $newnumero_productos)
	{
		try {
			if($this->numero_productos!==$newnumero_productos) {
				if($newnumero_productos===null && $newnumero_productos!='') {
					throw new Exception('bodega:Valor nulo no permitido en columna numero_productos');
				}

				if($newnumero_productos!==null && filter_var($newnumero_productos,FILTER_VALIDATE_INT)===false) {
					throw new Exception('bodega:No es numero entero - numero_productos='.$newnumero_productos);
				}

				$this->numero_productos=$newnumero_productos;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdefecto(?bool $newdefecto)
	{
		try {
			if($this->defecto!==$newdefecto) {
				if($newdefecto===null && $newdefecto!='') {
					throw new Exception('bodega:Valor nulo no permitido en columna defecto');
				}

				if($newdefecto!==null && filter_var($newdefecto,FILTER_VALIDATE_BOOLEAN)===false && $newdefecto!==0 && $newdefecto!==false) {
					throw new Exception('bodega:No es valor booleano - defecto='.$newdefecto);
				}

				$this->defecto=$newdefecto;
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
					throw new Exception('bodega:Valor nulo no permitido en columna activo');
				}

				if($newactivo!==null && filter_var($newactivo,FILTER_VALIDATE_BOOLEAN)===false && $newactivo!==0 && $newactivo!==false) {
					throw new Exception('bodega:No es valor booleano - activo='.$newactivo);
				}

				$this->activo=$newactivo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdireccion2(?string $newdireccion2) {
		if($this->direccion2!==$newdireccion2) {

				if(strlen($newdireccion2)>100) {
					try {
						throw new Exception('bodega:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=direccion2 en columna direccion2');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newdireccion2,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('bodega:Formato incorrecto en la columna direccion2='.$newdireccion2);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->direccion2=$newdireccion2;
			$this->setIsChanged(true);
		}
	}
	
	/*FKs*/
	
	public function getempresa() : ?empresa {
		return $this->empresa;
	}

	public function getsucursal() : ?sucursal {
		return $this->sucursal;
	}

	
	
	public  function  setempresa(?empresa $empresa) {
		try {
			$this->empresa=$empresa;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setsucursal(?sucursal $sucursal) {
		try {
			$this->sucursal=$sucursal;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	public function getproducto_defectos() : array {
		return $this->producto_defectos;
	}

	public function getproducto_bodegas() : array {
		return $this->productobodegas;
	}

	
	
	public  function  setproducto_defectos(array $producto_defectos) {
		try {
			$this->producto_defectos=$producto_defectos;
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

	
	/*AUXILIARES*/
	public function setMap_bodegaValue(string $sKey,$oValue) {
		$this->map_bodega[$sKey]=$oValue;
	}
	
	public function getMap_bodegaValue(string $sKey) {
		return $this->map_bodega[$sKey];
	}
	
	public function getbodega_Original() : ?bodega {
		return $this->bodega_Original;
	}
	
	public function setbodega_Original(bodega $bodega) {
		try {
			$this->bodega_Original=$bodega;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_bodega() : array {
		return $this->map_bodega;
	}

	public function setMap_bodega(array $map_bodega) {
		$this->map_bodega = $map_bodega;
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
