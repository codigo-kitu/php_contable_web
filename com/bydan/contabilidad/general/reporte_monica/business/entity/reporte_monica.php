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
namespace com\bydan\contabilidad\general\reporte_monica\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class reporte_monica extends GeneralEntity {

	/*GENERAL*/
	public static string $class='reporte_monica';
	
	/*AUXILIARES*/
	public ?reporte_monica $reporte_monica_Original=null;	
	public ?GeneralEntity $reporte_monica_Additional=null;
	public array $map_reporte_monica=array();	
		
	/*CAMPOS*/
	public string $nombre = '';
	public string $descripcion = '';
	public int $estado = 0;
	public string $modulo = '';
	public string $sub_modulo = '';
	
	/*FKs*/
	
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->reporte_monica_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->nombre='';
 		$this->descripcion='';
 		$this->estado=0;
 		$this->modulo='';
 		$this->sub_modulo='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->reporte_monica_Additional=new reporte_monica_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_reporte_monica() {
		$this->map_reporte_monica = array();
	}
	
	/*CAMPOS*/
    
	public function  getnombre() : ?string {
		return $this->nombre;
	}
    
	public function  getdescripcion() : ?string {
		return $this->descripcion;
	}
    
	public function  getestado() : ?int {
		return $this->estado;
	}
    
	public function  getmodulo() : ?string {
		return $this->modulo;
	}
    
	public function  getsub_modulo() : ?string {
		return $this->sub_modulo;
	}
	
    
	public function setnombre(?string $newnombre)
	{
		try {
			if($this->nombre!==$newnombre) {
				if($newnombre===null && $newnombre!='') {
					throw new Exception('reporte_monica:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>40) {
					throw new Exception('reporte_monica:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=40 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('reporte_monica:Formato incorrecto en columna nombre='.$newnombre);
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
					throw new Exception('reporte_monica:Valor nulo no permitido en columna descripcion');
				}

				if(strlen($newdescripcion)>200) {
					throw new Exception('reporte_monica:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=200 en columna descripcion');
				}

				if(filter_var($newdescripcion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('reporte_monica:Formato incorrecto en columna descripcion='.$newdescripcion);
				}

				$this->descripcion=$newdescripcion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setestado(?int $newestado)
	{
		try {
			if($this->estado!==$newestado) {
				if($newestado===null && $newestado!='') {
					throw new Exception('reporte_monica:Valor nulo no permitido en columna estado');
				}

				if($newestado!==null && filter_var($newestado,FILTER_VALIDATE_INT)===false) {
					throw new Exception('reporte_monica:No es numero entero - estado='.$newestado);
				}

				$this->estado=$newestado;
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
					throw new Exception('reporte_monica:Valor nulo no permitido en columna modulo');
				}

				if(strlen($newmodulo)>20) {
					throw new Exception('reporte_monica:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=20 en columna modulo');
				}

				if(filter_var($newmodulo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('reporte_monica:Formato incorrecto en columna modulo='.$newmodulo);
				}

				$this->modulo=$newmodulo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setsub_modulo(?string $newsub_modulo)
	{
		try {
			if($this->sub_modulo!==$newsub_modulo) {
				if($newsub_modulo===null && $newsub_modulo!='') {
					throw new Exception('reporte_monica:Valor nulo no permitido en columna sub_modulo');
				}

				if(strlen($newsub_modulo)>40) {
					throw new Exception('reporte_monica:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=40 en columna sub_modulo');
				}

				if(filter_var($newsub_modulo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('reporte_monica:Formato incorrecto en columna sub_modulo='.$newsub_modulo);
				}

				$this->sub_modulo=$newsub_modulo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	
		
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_reporte_monicaValue(string $sKey,$oValue) {
		$this->map_reporte_monica[$sKey]=$oValue;
	}
	
	public function getMap_reporte_monicaValue(string $sKey) {
		return $this->map_reporte_monica[$sKey];
	}
	
	public function getreporte_monica_Original() : ?reporte_monica {
		return $this->reporte_monica_Original;
	}
	
	public function setreporte_monica_Original(reporte_monica $reporte_monica) {
		try {
			$this->reporte_monica_Original=$reporte_monica;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_reporte_monica() : array {
		return $this->map_reporte_monica;
	}

	public function setMap_reporte_monica(array $map_reporte_monica) {
		$this->map_reporte_monica = $map_reporte_monica;
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
