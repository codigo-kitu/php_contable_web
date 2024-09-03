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
namespace com\bydan\contabilidad\contabilidad\asiento_automatico\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;

class asiento_automatico extends GeneralEntity {

	/*GENERAL*/
	public static string $class='asiento_automatico';
	
	/*AUXILIARES*/
	public ?asiento_automatico $asiento_automatico_Original=null;	
	public ?GeneralEntity $asiento_automatico_Additional=null;
	public array $map_asiento_automatico=array();	
		
	/*CAMPOS*/
	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public int $id_modulo = -1;
	public string $id_modulo_Descripcion = '';

	public string $codigo = '';
	public string $nombre = '';
	public int $id_fuente = -1;
	public string $id_fuente_Descripcion = '';

	public int $id_libro_auxiliar = -1;
	public string $id_libro_auxiliar_Descripcion = '';

	public int $id_centro_costo = -1;
	public string $id_centro_costo_Descripcion = '';

	public string $descripcion = '';
	public bool $activo = false;
	public string $asignada = '';
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	public ?modulo $modulo = null;
	public ?fuente $fuente = null;
	public ?libro_auxiliar $libro_auxiliar = null;
	public ?centro_costo $centro_costo = null;
	
	/*RELACIONES*/
	
	public array $asientoautomaticodetalles = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->asiento_automatico_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->id_modulo=-1;
		$this->id_modulo_Descripcion='';

 		$this->codigo='';
 		$this->nombre='';
 		$this->id_fuente=-1;
		$this->id_fuente_Descripcion='';

 		$this->id_libro_auxiliar=-1;
		$this->id_libro_auxiliar_Descripcion='';

 		$this->id_centro_costo=-1;
		$this->id_centro_costo_Descripcion='';

 		$this->descripcion='';
 		$this->activo=false;
 		$this->asignada='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
			$this->modulo=new modulo();
			$this->fuente=new fuente();
			$this->libro_auxiliar=new libro_auxiliar();
			$this->centro_costo=new centro_costo();
		}
		
		/*RELACIONES*/
		
		$this->asientoautomaticodetalles=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->asiento_automatico_Additional=new asiento_automatico_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_asiento_automatico() {
		$this->map_asiento_automatico = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_empresa() : ?int {
		return $this->id_empresa;
	}
	
	public function  getid_empresa_Descripcion() : string {
		return $this->id_empresa_Descripcion;
	}
    
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
    
	public function  getid_fuente() : ?int {
		return $this->id_fuente;
	}
	
	public function  getid_fuente_Descripcion() : string {
		return $this->id_fuente_Descripcion;
	}
    
	public function  getid_libro_auxiliar() : ?int {
		return $this->id_libro_auxiliar;
	}
	
	public function  getid_libro_auxiliar_Descripcion() : string {
		return $this->id_libro_auxiliar_Descripcion;
	}
    
	public function  getid_centro_costo() : ?int {
		return $this->id_centro_costo;
	}
	
	public function  getid_centro_costo_Descripcion() : string {
		return $this->id_centro_costo_Descripcion;
	}
    
	public function  getdescripcion() : ?string {
		return $this->descripcion;
	}
    
	public function  getactivo() : ?bool {
		return $this->activo;
	}
    
	public function  getasignada() : ?string {
		return $this->asignada;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('asiento_automatico:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento_automatico:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('asiento_automatico:Valor nulo no permitido en columna id_empresa');
				}

				$this->id_empresa_Descripcion=$newid_empresa_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_modulo(?int $newid_modulo)
	{
		try {
			if($this->id_modulo!==$newid_modulo) {
				if($newid_modulo===null && $newid_modulo!='') {
					throw new Exception('asiento_automatico:Valor nulo no permitido en columna id_modulo');
				}

				if($newid_modulo!==null && filter_var($newid_modulo,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento_automatico:No es numero entero - id_modulo='.$newid_modulo);
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
					throw new Exception('asiento_automatico:Valor nulo no permitido en columna id_modulo');
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
					throw new Exception('asiento_automatico:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>50) {
					throw new Exception('asiento_automatico:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('asiento_automatico:Formato incorrecto en columna codigo='.$newcodigo);
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
					throw new Exception('asiento_automatico:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>100) {
					throw new Exception('asiento_automatico:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=100 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('asiento_automatico:Formato incorrecto en columna nombre='.$newnombre);
				}

				$this->nombre=$newnombre;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_fuente(?int $newid_fuente)
	{
		try {
			if($this->id_fuente!==$newid_fuente) {
				if($newid_fuente===null && $newid_fuente!='') {
					throw new Exception('asiento_automatico:Valor nulo no permitido en columna id_fuente');
				}

				if($newid_fuente!==null && filter_var($newid_fuente,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento_automatico:No es numero entero - id_fuente='.$newid_fuente);
				}

				$this->id_fuente=$newid_fuente;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_fuente_Descripcion(string $newid_fuente_Descripcion)
	{
		try {
			if($this->id_fuente_Descripcion!=$newid_fuente_Descripcion) {
				if($newid_fuente_Descripcion===null && $newid_fuente_Descripcion!='') {
					throw new Exception('asiento_automatico:Valor nulo no permitido en columna id_fuente');
				}

				$this->id_fuente_Descripcion=$newid_fuente_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_libro_auxiliar(?int $newid_libro_auxiliar)
	{
		try {
			if($this->id_libro_auxiliar!==$newid_libro_auxiliar) {
				if($newid_libro_auxiliar===null && $newid_libro_auxiliar!='') {
					throw new Exception('asiento_automatico:Valor nulo no permitido en columna id_libro_auxiliar');
				}

				if($newid_libro_auxiliar!==null && filter_var($newid_libro_auxiliar,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento_automatico:No es numero entero - id_libro_auxiliar='.$newid_libro_auxiliar);
				}

				$this->id_libro_auxiliar=$newid_libro_auxiliar;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_libro_auxiliar_Descripcion(string $newid_libro_auxiliar_Descripcion)
	{
		try {
			if($this->id_libro_auxiliar_Descripcion!=$newid_libro_auxiliar_Descripcion) {
				if($newid_libro_auxiliar_Descripcion===null && $newid_libro_auxiliar_Descripcion!='') {
					throw new Exception('asiento_automatico:Valor nulo no permitido en columna id_libro_auxiliar');
				}

				$this->id_libro_auxiliar_Descripcion=$newid_libro_auxiliar_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_centro_costo(?int $newid_centro_costo)
	{
		try {
			if($this->id_centro_costo!==$newid_centro_costo) {
				if($newid_centro_costo===null && $newid_centro_costo!='') {
					throw new Exception('asiento_automatico:Valor nulo no permitido en columna id_centro_costo');
				}

				if($newid_centro_costo!==null && filter_var($newid_centro_costo,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento_automatico:No es numero entero - id_centro_costo='.$newid_centro_costo);
				}

				$this->id_centro_costo=$newid_centro_costo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_centro_costo_Descripcion(string $newid_centro_costo_Descripcion)
	{
		try {
			if($this->id_centro_costo_Descripcion!=$newid_centro_costo_Descripcion) {
				if($newid_centro_costo_Descripcion===null && $newid_centro_costo_Descripcion!='') {
					throw new Exception('asiento_automatico:Valor nulo no permitido en columna id_centro_costo');
				}

				$this->id_centro_costo_Descripcion=$newid_centro_costo_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdescripcion(?string $newdescripcion) {
		if($this->descripcion!==$newdescripcion) {

				if(strlen($newdescripcion)>80) {
					try {
						throw new Exception('asiento_automatico:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=descripcion en columna descipcion');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newdescripcion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('asiento_automatico:Formato incorrecto en la columna descipcion='.$newdescripcion);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->descripcion=$newdescripcion;
			$this->setIsChanged(true);
		}
	}
    
	public function setactivo(?bool $newactivo)
	{
		try {
			if($this->activo!==$newactivo) {
				if($newactivo===null && $newactivo!='') {
					throw new Exception('asiento_automatico:Valor nulo no permitido en columna activo');
				}

				if($newactivo!==null && filter_var($newactivo,FILTER_VALIDATE_BOOLEAN)===false && $newactivo!==0 && $newactivo!==false) {
					throw new Exception('asiento_automatico:No es valor booleano - activo='.$newactivo);
				}

				$this->activo=$newactivo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setasignada(?string $newasignada) {
		if($this->asignada!==$newasignada) {

				if(strlen($newasignada)>20) {
					try {
						throw new Exception('asiento_automatico:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=asignada en columna asignada');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newasignada,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('asiento_automatico:Formato incorrecto en la columna asignada='.$newasignada);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->asignada=$newasignada;
			$this->setIsChanged(true);
		}
	}
	
	/*FKs*/
	
	public function getempresa() : ?empresa {
		return $this->empresa;
	}

	public function getmodulo() : ?modulo {
		return $this->modulo;
	}

	public function getfuente() : ?fuente {
		return $this->fuente;
	}

	public function getlibro_auxiliar() : ?libro_auxiliar {
		return $this->libro_auxiliar;
	}

	public function getcentro_costo() : ?centro_costo {
		return $this->centro_costo;
	}

	
	
	public  function  setempresa(?empresa $empresa) {
		try {
			$this->empresa=$empresa;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setmodulo(?modulo $modulo) {
		try {
			$this->modulo=$modulo;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setfuente(?fuente $fuente) {
		try {
			$this->fuente=$fuente;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setlibro_auxiliar(?libro_auxiliar $libro_auxiliar) {
		try {
			$this->libro_auxiliar=$libro_auxiliar;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setcentro_costo(?centro_costo $centro_costo) {
		try {
			$this->centro_costo=$centro_costo;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	public function getasiento_automatico_detalles() : array {
		return $this->asientoautomaticodetalles;
	}

	
	
	public  function  setasiento_automatico_detalles(array $asientoautomaticodetalles) {
		try {
			$this->asientoautomaticodetalles=$asientoautomaticodetalles;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_asiento_automaticoValue(string $sKey,$oValue) {
		$this->map_asiento_automatico[$sKey]=$oValue;
	}
	
	public function getMap_asiento_automaticoValue(string $sKey) {
		return $this->map_asiento_automatico[$sKey];
	}
	
	public function getasiento_automatico_Original() : ?asiento_automatico {
		return $this->asiento_automatico_Original;
	}
	
	public function setasiento_automatico_Original(asiento_automatico $asiento_automatico) {
		try {
			$this->asiento_automatico_Original=$asiento_automatico;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_asiento_automatico() : array {
		return $this->map_asiento_automatico;
	}

	public function setMap_asiento_automatico(array $map_asiento_automatico) {
		$this->map_asiento_automatico = $map_asiento_automatico;
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
