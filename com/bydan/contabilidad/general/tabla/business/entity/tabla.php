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
namespace com\bydan\contabilidad\general\tabla\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;

class tabla extends GeneralEntity {

	/*GENERAL*/
	public static string $class='tabla';
	
	/*AUXILIARES*/
	public ?tabla $tabla_Original=null;	
	public ?GeneralEntity $tabla_Additional=null;
	public array $map_tabla=array();	
		
	/*CAMPOS*/
	public int $id_modulo = -1;
	public string $id_modulo_Descripcion = '';

	public string $codigo = '';
	public string $nombre = '';
	public string $descripcion = '';
	
	/*FKs*/
	
	public ?modulo $modulo = null;
	
	/*RELACIONES*/
	
	public array $costoproductos = array();
	public array $cuentacorrientedetalles = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->tabla_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_modulo=-1;
		$this->id_modulo_Descripcion='';

 		$this->codigo='';
 		$this->nombre='';
 		$this->descripcion='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->modulo=new modulo();
		}
		
		/*RELACIONES*/
		
		$this->costoproductos=array();
		$this->cuentacorrientedetalles=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->tabla_Additional=new tabla_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_tabla() {
		$this->map_tabla = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_modulo() : ?int {
		return $this->id_modulo;
	}
	
	public function  getid_modulo_Descripcion() : string {
		return $this->id_modulo_Descripcion;
	}
    
	public function  getcodigo() : ?string {
		return $this->codigo;
	}
    
	public function  getnombre() : ?string {
		return $this->nombre;
	}
    
	public function  getdescripcion() : ?string {
		return $this->descripcion;
	}
	
    
	public function setid_modulo(?int $newid_modulo)
	{
		try {
			if($this->id_modulo!==$newid_modulo) {
				if($newid_modulo===null && $newid_modulo!='') {
					throw new Exception('tabla:Valor nulo no permitido en columna id_modulo');
				}

				if($newid_modulo!==null && filter_var($newid_modulo,FILTER_VALIDATE_INT)===false) {
					throw new Exception('tabla:No es numero entero - id_modulo='.$newid_modulo);
				}

				$this->id_modulo=$newid_modulo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_modulo_Descripcion(string $newid_modulo_Descripcion)
	{
		try {
			if($this->id_modulo_Descripcion!=$newid_modulo_Descripcion) {
				if($newid_modulo_Descripcion===null && $newid_modulo_Descripcion!='') {
					throw new Exception('tabla:Valor nulo no permitido en columna id_modulo');
				}

				$this->id_modulo_Descripcion=$newid_modulo_Descripcion;
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
					throw new Exception('tabla:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>50) {
					throw new Exception('tabla:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('tabla:Formato incorrecto en columna codigo='.$newcodigo);
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
					throw new Exception('tabla:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>100) {
					throw new Exception('tabla:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=100 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('tabla:Formato incorrecto en columna nombre='.$newnombre);
				}

				$this->nombre=$newnombre;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdescripcion(?string $newdescripcion)
	{
		try {
			if($this->descripcion!==$newdescripcion) {
				if($newdescripcion===null && $newdescripcion!='') {
					throw new Exception('tabla:Valor nulo no permitido en columna descripcion');
				}

				if(strlen($newdescripcion)>200) {
					throw new Exception('tabla:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=200 en columna descripcion');
				}

				if(filter_var($newdescripcion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('tabla:Formato incorrecto en columna descripcion='.$newdescripcion);
				}

				$this->descripcion=$newdescripcion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	public function getmodulo() : ?modulo {
		return $this->modulo;
	}

	
	
	public  function  setmodulo(?modulo $modulo) {
		try {
			$this->modulo=$modulo;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	public function getcosto_productos() : array {
		return $this->costoproductos;
	}

	public function getcuenta_corriente_detalles() : array {
		return $this->cuentacorrientedetalles;
	}

	
	
	public  function  setcosto_productos(array $costoproductos) {
		try {
			$this->costoproductos=$costoproductos;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setcuenta_corriente_detalles(array $cuentacorrientedetalles) {
		try {
			$this->cuentacorrientedetalles=$cuentacorrientedetalles;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_tablaValue(string $sKey,$oValue) {
		$this->map_tabla[$sKey]=$oValue;
	}
	
	public function getMap_tablaValue(string $sKey) {
		return $this->map_tabla[$sKey];
	}
	
	public function gettabla_Original() : ?tabla {
		return $this->tabla_Original;
	}
	
	public function settabla_Original(tabla $tabla) {
		try {
			$this->tabla_Original=$tabla;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_tabla() : array {
		return $this->map_tabla;
	}

	public function setMap_tabla(array $map_tabla) {
		$this->map_tabla = $map_tabla;
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
