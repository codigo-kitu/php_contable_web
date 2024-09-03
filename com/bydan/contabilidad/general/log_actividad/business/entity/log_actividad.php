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
namespace com\bydan\contabilidad\general\log_actividad\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class log_actividad extends GeneralEntity {

	/*GENERAL*/
	public static string $class='log_actividad';
	
	/*AUXILIARES*/
	public ?log_actividad $log_actividad_Original=null;	
	public ?GeneralEntity $log_actividad_Additional=null;
	public array $map_log_actividad=array();	
		
	/*CAMPOS*/
	public int $log_id = 0;
	public string $fecha = '';
	public string $hora = '';
	public string $computador = '';
	public string $usuario = '';
	public string $descripcion = '';
	public string $modulo = '';
	
	/*FKs*/
	
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->log_actividad_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->log_id=0;
 		$this->fecha=date('Y-m-d');
 		$this->hora=date('Y-m-d');
 		$this->computador='';
 		$this->usuario='';
 		$this->descripcion='';
 		$this->modulo='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->log_actividad_Additional=new log_actividad_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_log_actividad() {
		$this->map_log_actividad = array();
	}
	
	/*CAMPOS*/
    
	public function  getlog_id() : ?int {
		return $this->log_id;
	}
    
	public function  getfecha() : ?string {
		return $this->fecha;
	}
    
	public function  gethora() : ?string {
		return $this->hora;
	}
    
	public function  getcomputador() : ?string {
		return $this->computador;
	}
    
	public function  getusuario() : ?string {
		return $this->usuario;
	}
    
	public function  getdescripcion() : ?string {
		return $this->descripcion;
	}
    
	public function  getmodulo() : ?string {
		return $this->modulo;
	}
	
    
	public function setlog_id(?int $newlog_id)
	{
		try {
			if($this->log_id!==$newlog_id) {
				if($newlog_id===null && $newlog_id!='') {
					throw new Exception('log_actividad:Valor nulo no permitido en columna log_id');
				}

				if($newlog_id!==null && filter_var($newlog_id,FILTER_VALIDATE_INT)===false) {
					throw new Exception('log_actividad:No es numero entero - log_id='.$newlog_id);
				}

				$this->log_id=$newlog_id;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setfecha(?string $newfecha)
	{
		try {
			if($this->fecha!==$newfecha) {
				if($newfecha===null && $newfecha!='') {
					throw new Exception('log_actividad:Valor nulo no permitido en columna fecha');
				}

				if($newfecha!==null && filter_var($newfecha,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('log_actividad:No es fecha - fecha='.$newfecha);
				}

				$this->fecha=$newfecha;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function sethora(?string $newhora)
	{
		try {
			if($this->hora!==$newhora) {
				if($newhora===null && $newhora!='') {
					throw new Exception('log_actividad:Valor nulo no permitido en columna hora');
				}

				if($newhora!==null && filter_var($newhora,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('log_actividad:No es fecha - hora='.$newhora);
				}

				$this->hora=$newhora;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcomputador(?string $newcomputador)
	{
		try {
			if($this->computador!==$newcomputador) {
				if($newcomputador===null && $newcomputador!='') {
					throw new Exception('log_actividad:Valor nulo no permitido en columna computador');
				}

				if(strlen($newcomputador)>50) {
					throw new Exception('log_actividad:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna computador');
				}

				if(filter_var($newcomputador,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('log_actividad:Formato incorrecto en columna computador='.$newcomputador);
				}

				$this->computador=$newcomputador;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setusuario(?string $newusuario)
	{
		try {
			if($this->usuario!==$newusuario) {
				if($newusuario===null && $newusuario!='') {
					throw new Exception('log_actividad:Valor nulo no permitido en columna usuario');
				}

				if(strlen($newusuario)>30) {
					throw new Exception('log_actividad:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=30 en columna usuario');
				}

				if(filter_var($newusuario,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('log_actividad:Formato incorrecto en columna usuario='.$newusuario);
				}

				$this->usuario=$newusuario;
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
					throw new Exception('log_actividad:Valor nulo no permitido en columna descripcion');
				}

				if(strlen($newdescripcion)>200) {
					throw new Exception('log_actividad:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=200 en columna descripcion');
				}

				if(filter_var($newdescripcion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('log_actividad:Formato incorrecto en columna descripcion='.$newdescripcion);
				}

				$this->descripcion=$newdescripcion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setmodulo(?string $newmodulo)
	{
		try {
			if($this->modulo!==$newmodulo) {
				if($newmodulo===null && $newmodulo!='') {
					throw new Exception('log_actividad:Valor nulo no permitido en columna modulo');
				}

				if(strlen($newmodulo)>30) {
					throw new Exception('log_actividad:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=30 en columna modulo');
				}

				if(filter_var($newmodulo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('log_actividad:Formato incorrecto en columna modulo='.$newmodulo);
				}

				$this->modulo=$newmodulo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	
		
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_log_actividadValue(string $sKey,$oValue) {
		$this->map_log_actividad[$sKey]=$oValue;
	}
	
	public function getMap_log_actividadValue(string $sKey) {
		return $this->map_log_actividad[$sKey];
	}
	
	public function getlog_actividad_Original() : ?log_actividad {
		return $this->log_actividad_Original;
	}
	
	public function setlog_actividad_Original(log_actividad $log_actividad) {
		try {
			$this->log_actividad_Original=$log_actividad;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_log_actividad() : array {
		return $this->map_log_actividad;
	}

	public function setMap_log_actividad(array $map_log_actividad) {
		$this->map_log_actividad = $map_log_actividad;
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
