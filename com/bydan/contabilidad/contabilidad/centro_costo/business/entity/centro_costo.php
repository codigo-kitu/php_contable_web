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
namespace com\bydan\contabilidad\contabilidad\centro_costo\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;

class centro_costo extends GeneralEntity {

	/*GENERAL*/
	public static string $class='centro_costo';
	
	/*AUXILIARES*/
	public ?centro_costo $centro_costo_Original=null;	
	public ?GeneralEntity $centro_costo_Additional=null;
	public array $map_centro_costo=array();	
		
	/*CAMPOS*/
	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public string $codigo = '';
	public string $nombre = '';
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	
	/*RELACIONES*/
	
	public array $asientopredefinidos = array();
	public array $asientos = array();
	public array $asientoautomaticodetalles = array();
	public array $asientoautomaticos = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->centro_costo_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->codigo='';
 		$this->nombre='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
		}
		
		/*RELACIONES*/
		
		$this->asientopredefinidos=array();
		$this->asientos=array();
		$this->asientoautomaticodetalles=array();
		$this->asientoautomaticos=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->centro_costo_Additional=new centro_costo_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_centro_costo() {
		$this->map_centro_costo = array();
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
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('centro_costo:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('centro_costo:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('centro_costo:Valor nulo no permitido en columna id_empresa');
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
					throw new Exception('centro_costo:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>4) {
					throw new Exception('centro_costo:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=4 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('centro_costo:Formato incorrecto en columna codigo='.$newcodigo);
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
					throw new Exception('centro_costo:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>50) {
					throw new Exception('centro_costo:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('centro_costo:Formato incorrecto en columna nombre='.$newnombre);
				}

				$this->nombre=$newnombre;
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
	
	public function getasiento_predefinidos() : array {
		return $this->asientopredefinidos;
	}

	public function getasientos() : array {
		return $this->asientos;
	}

	public function getasiento_automatico_detalles() : array {
		return $this->asientoautomaticodetalles;
	}

	public function getasiento_automaticos() : array {
		return $this->asientoautomaticos;
	}

	
	
	public  function  setasiento_predefinidos(array $asientopredefinidos) {
		try {
			$this->asientopredefinidos=$asientopredefinidos;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setasientos(array $asientos) {
		try {
			$this->asientos=$asientos;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setasiento_automatico_detalles(array $asientoautomaticodetalles) {
		try {
			$this->asientoautomaticodetalles=$asientoautomaticodetalles;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setasiento_automaticos(array $asientoautomaticos) {
		try {
			$this->asientoautomaticos=$asientoautomaticos;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_centro_costoValue(string $sKey,$oValue) {
		$this->map_centro_costo[$sKey]=$oValue;
	}
	
	public function getMap_centro_costoValue(string $sKey) {
		return $this->map_centro_costo[$sKey];
	}
	
	public function getcentro_costo_Original() : ?centro_costo {
		return $this->centro_costo_Original;
	}
	
	public function setcentro_costo_Original(centro_costo $centro_costo) {
		try {
			$this->centro_costo_Original=$centro_costo;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_centro_costo() : array {
		return $this->map_centro_costo;
	}

	public function setMap_centro_costo(array $map_centro_costo) {
		$this->map_centro_costo = $map_centro_costo;
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
