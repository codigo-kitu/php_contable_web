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
namespace com\bydan\contabilidad\contabilidad\periodo\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class periodo extends GeneralEntity {

	/*GENERAL*/
	public static string $class='periodo';
	
	/*AUXILIARES*/
	public ?periodo $periodo_Original=null;	
	public ?GeneralEntity $periodo_Additional=null;
	public array $map_periodo=array();	
		
	/*CAMPOS*/
	public string $nombre = '';
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
		$this->periodo_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->nombre='';
 		$this->fecha_inicio=date('Y-m-d');
 		$this->fecha_fin=date('Y-m-d');
 		$this->descripcion='';
 		$this->activo=false;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->periodo_Additional=new periodo_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_periodo() {
		$this->map_periodo = array();
	}
	
	/*CAMPOS*/
    
	public function  getnombre() : ?string {
		return $this->nombre;
	}
    
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
	
    
	public function setnombre(?string $newnombre)
	{
		try {
			if($this->nombre!==$newnombre) {
				if($newnombre===null && $newnombre!='') {
					throw new Exception('periodo:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>20) {
					throw new Exception('periodo:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=20 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('periodo:Formato incorrecto en columna nombre='.$newnombre);
				}

				$this->nombre=$newnombre;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setfecha_inicio(?string $newfecha_inicio)
	{
		try {
			if($this->fecha_inicio!==$newfecha_inicio) {
				if($newfecha_inicio===null && $newfecha_inicio!='') {
					throw new Exception('periodo:Valor nulo no permitido en columna fecha_inicio');
				}

				if($newfecha_inicio!==null && filter_var($newfecha_inicio,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('periodo:No es fecha - fecha_inicio='.$newfecha_inicio);
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
					throw new Exception('periodo:Valor nulo no permitido en columna fecha_fin');
				}

				if($newfecha_fin!==null && filter_var($newfecha_fin,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('periodo:No es fecha - fecha_fin='.$newfecha_fin);
				}

				$this->fecha_fin=$newfecha_fin;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdescripcion(?string $newdescripcion) {
		if($this->descripcion!==$newdescripcion) {

				if(strlen($newdescripcion)>100) {
					try {
						throw new Exception('periodo:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=descripcion en columna descripcion');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newdescripcion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('periodo:Formato incorrecto en la columna descripcion='.$newdescripcion);
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
					throw new Exception('periodo:Valor nulo no permitido en columna activo');
				}

				if($newactivo!==null && filter_var($newactivo,FILTER_VALIDATE_BOOLEAN)===false && $newactivo!==0 && $newactivo!==false) {
					throw new Exception('periodo:No es valor booleano - activo='.$newactivo);
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
	public function setMap_periodoValue(string $sKey,$oValue) {
		$this->map_periodo[$sKey]=$oValue;
	}
	
	public function getMap_periodoValue(string $sKey) {
		return $this->map_periodo[$sKey];
	}
	
	public function getperiodo_Original() : ?periodo {
		return $this->periodo_Original;
	}
	
	public function setperiodo_Original(periodo $periodo) {
		try {
			$this->periodo_Original=$periodo;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_periodo() : array {
		return $this->map_periodo;
	}

	public function setMap_periodo(array $map_periodo) {
		$this->map_periodo = $map_periodo;
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
