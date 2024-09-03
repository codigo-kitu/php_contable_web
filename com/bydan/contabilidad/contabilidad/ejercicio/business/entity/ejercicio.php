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
namespace com\bydan\contabilidad\contabilidad\ejercicio\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class ejercicio extends GeneralEntity {

	/*GENERAL*/
	public static string $class='ejercicio';
	
	/*AUXILIARES*/
	public ?ejercicio $ejercicio_Original=null;	
	public ?GeneralEntity $ejercicio_Additional=null;
	public array $map_ejercicio=array();	
		
	/*CAMPOS*/
	public string $fecha_inicio = '';
	public string $fecha_fin = '';
	public string $descripcion = '';
	public bool $activo = false;
	
	/*FKs*/
	
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(false);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->ejercicio_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->fecha_inicio=date('Y-m-d');
 		$this->fecha_fin=date('Y-m-d');
 		$this->descripcion='';
 		$this->activo=false;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->ejercicio_Additional=new ejercicio_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_ejercicio() {
		$this->map_ejercicio = array();
	}
	
	/*CAMPOS*/
    
	public function  getfecha_inicio() : ?string {
		return $this->fecha_inicio;
	}
    
	public function  getfecha_fin() : ?string {
		return $this->fecha_fin;
	}
    
	public function  getdescripcion() : ?string {
		return $this->descripcion;
	}
    
	public function  getactivo() : ?bool {
		return $this->activo;
	}
	
    
	public function setfecha_inicio(?string $newfecha_inicio)
	{
		try {
			if($this->fecha_inicio!==$newfecha_inicio) {
				if($newfecha_inicio===null && $newfecha_inicio!='') {
					throw new Exception('ejercicio:Valor nulo no permitido en columna fecha_inicio');
				}

				if($newfecha_inicio!==null && filter_var($newfecha_inicio,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('ejercicio:No es fecha - fecha_inicio='.$newfecha_inicio);
				}

				$this->fecha_inicio=$newfecha_inicio;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setfecha_fin(?string $newfecha_fin)
	{
		try {
			if($this->fecha_fin!==$newfecha_fin) {
				if($newfecha_fin===null && $newfecha_fin!='') {
					throw new Exception('ejercicio:Valor nulo no permitido en columna fecha_fin');
				}

				if($newfecha_fin!==null && filter_var($newfecha_fin,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('ejercicio:No es fecha - fecha_fin='.$newfecha_fin);
				}

				$this->fecha_fin=$newfecha_fin;
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
					throw new Exception('ejercicio:Valor nulo no permitido en columna descripcion');
				}

				if(strlen($newdescripcion)>100) {
					throw new Exception('ejercicio:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=100 en columna descripcion');
				}

				if(filter_var($newdescripcion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('ejercicio:Formato incorrecto en columna descripcion='.$newdescripcion);
				}

				$this->descripcion=$newdescripcion;
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
					throw new Exception('ejercicio:Valor nulo no permitido en columna activo');
				}

				if($newactivo!==null && filter_var($newactivo,FILTER_VALIDATE_BOOLEAN)===false && $newactivo!==0 && $newactivo!==false) {
					throw new Exception('ejercicio:No es valor booleano - activo='.$newactivo);
				}

				$this->activo=$newactivo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	
		
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_ejercicioValue(string $sKey,$oValue) {
		$this->map_ejercicio[$sKey]=$oValue;
	}
	
	public function getMap_ejercicioValue(string $sKey) {
		return $this->map_ejercicio[$sKey];
	}
	
	public function getejercicio_Original() : ?ejercicio {
		return $this->ejercicio_Original;
	}
	
	public function setejercicio_Original(ejercicio $ejercicio) {
		try {
			$this->ejercicio_Original=$ejercicio;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_ejercicio() : array {
		return $this->map_ejercicio;
	}

	public function setMap_ejercicio(array $map_ejercicio) {
		$this->map_ejercicio = $map_ejercicio;
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
