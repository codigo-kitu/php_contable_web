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
namespace com\bydan\contabilidad\inventario\unidad\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;

class unidad extends GeneralEntity {

	/*GENERAL*/
	public static string $class='unidad';
	
	/*AUXILIARES*/
	public ?unidad $unidad_Original=null;	
	public ?GeneralEntity $unidad_Additional=null;
	public array $map_unidad=array();	
		
	/*CAMPOS*/
	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public string $codigo = '';
	public string $nombre = '';
	public bool $defecto_venta = false;
	public bool $defecto_compra = false;
	public int $numero_productos = 0;
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->unidad_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->codigo='';
 		$this->nombre='';
 		$this->defecto_venta=false;
 		$this->defecto_compra=false;
 		$this->numero_productos=0;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->unidad_Additional=new unidad_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_unidad() {
		$this->map_unidad = array();
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
    
	public function  getdefecto_venta() : ?bool {
		return $this->defecto_venta;
	}
    
	public function  getdefecto_compra() : ?bool {
		return $this->defecto_compra;
	}
    
	public function  getnumero_productos() : ?int {
		return $this->numero_productos;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('unidad:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('unidad:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('unidad:Valor nulo no permitido en columna id_empresa');
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
					throw new Exception('unidad:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>6) {
					throw new Exception('unidad:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=6 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('unidad:Formato incorrecto en columna codigo='.$newcodigo);
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
					throw new Exception('unidad:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>20) {
					throw new Exception('unidad:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=20 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('unidad:Formato incorrecto en columna nombre='.$newnombre);
				}

				$this->nombre=$newnombre;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdefecto_venta(?bool $newdefecto_venta)
	{
		try {
			if($this->defecto_venta!==$newdefecto_venta) {
				if($newdefecto_venta===null && $newdefecto_venta!='') {
					throw new Exception('unidad:Valor nulo no permitido en columna defecto_venta');
				}

				if($newdefecto_venta!==null && filter_var($newdefecto_venta,FILTER_VALIDATE_BOOLEAN)===false && $newdefecto_venta!==0 && $newdefecto_venta!==false) {
					throw new Exception('unidad:No es valor booleano - defecto_venta='.$newdefecto_venta);
				}

				$this->defecto_venta=$newdefecto_venta;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdefecto_compra(?bool $newdefecto_compra)
	{
		try {
			if($this->defecto_compra!==$newdefecto_compra) {
				if($newdefecto_compra===null && $newdefecto_compra!='') {
					throw new Exception('unidad:Valor nulo no permitido en columna defecto_compra');
				}

				if($newdefecto_compra!==null && filter_var($newdefecto_compra,FILTER_VALIDATE_BOOLEAN)===false && $newdefecto_compra!==0 && $newdefecto_compra!==false) {
					throw new Exception('unidad:No es valor booleano - defecto_compra='.$newdefecto_compra);
				}

				$this->defecto_compra=$newdefecto_compra;
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
					throw new Exception('unidad:Valor nulo no permitido en columna numero_productos');
				}

				if($newnumero_productos!==null && filter_var($newnumero_productos,FILTER_VALIDATE_INT)===false) {
					throw new Exception('unidad:No es numero entero - numero_productos='.$newnumero_productos);
				}

				$this->numero_productos=$newnumero_productos;
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

	
	
	public  function  setempresa(?empresa $empresa) {
		try {
			$this->empresa=$empresa;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_unidadValue(string $sKey,$oValue) {
		$this->map_unidad[$sKey]=$oValue;
	}
	
	public function getMap_unidadValue(string $sKey) {
		return $this->map_unidad[$sKey];
	}
	
	public function getunidad_Original() : ?unidad {
		return $this->unidad_Original;
	}
	
	public function setunidad_Original(unidad $unidad) {
		try {
			$this->unidad_Original=$unidad;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_unidad() : array {
		return $this->map_unidad;
	}

	public function setMap_unidad(array $map_unidad) {
		$this->map_unidad = $map_unidad;
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
