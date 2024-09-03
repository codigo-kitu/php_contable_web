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
namespace com\bydan\contabilidad\general\archivo\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class archivo extends GeneralEntity {

	/*GENERAL*/
	public static string $class='archivo';
	
	/*AUXILIARES*/
	public ?archivo $archivo_Original=null;	
	public ?GeneralEntity $archivo_Additional=null;
	public array $map_archivo=array();	
		
	/*CAMPOS*/
	public string $imagen = '';
	public string $nombre = '';
	public string $descripcion = '';
	public string $archivo = '';
	
	/*FKs*/
	
	
	/*RELACIONES*/
	
	public array $otrodocumentos = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->archivo_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->imagen='';
 		$this->nombre='';
 		$this->descripcion='';
 		$this->archivo='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
		}
		
		/*RELACIONES*/
		
		$this->otrodocumentos=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->archivo_Additional=new archivo_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_archivo() {
		$this->map_archivo = array();
	}
	
	/*CAMPOS*/
    
	public function  getimagen() : ?string {
		return $this->imagen;
	}
    
	public function  getnombre() : ?string {
		return $this->nombre;
	}
    
	public function  getdescripcion() : ?string {
		return $this->descripcion;
	}
    
	public function  getarchivo() : ?string {
		return $this->archivo;
	}
	
    
	public function setimagen(?string $newimagen)
	{
		try {
			if($this->imagen!==$newimagen) {
				if($newimagen===null && $newimagen!='') {
					throw new Exception('archivo:Valor nulo no permitido en columna imagen');
				}

				if(strlen($newimagen)>1000) {
					throw new Exception('archivo:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna imagen');
				}

				if(filter_var($newimagen,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('archivo:Formato incorrecto en columna imagen='.$newimagen);
				}

				$this->imagen=$newimagen;
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
					throw new Exception('archivo:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>40) {
					throw new Exception('archivo:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=40 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('archivo:Formato incorrecto en columna nombre='.$newnombre);
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
					throw new Exception('archivo:Valor nulo no permitido en columna descripcion');
				}

				if(strlen($newdescripcion)>200) {
					throw new Exception('archivo:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=200 en columna descripcion');
				}

				if(filter_var($newdescripcion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('archivo:Formato incorrecto en columna descripcion='.$newdescripcion);
				}

				$this->descripcion=$newdescripcion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setarchivo(?string $newarchivo)
	{
		try {
			if($this->archivo!==$newarchivo) {
				if($newarchivo===null && $newarchivo!='') {
					throw new Exception('archivo:Valor nulo no permitido en columna archivo');
				}

				if(strlen($newarchivo)>40) {
					throw new Exception('archivo:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=40 en columna archivo');
				}

				if(filter_var($newarchivo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('archivo:Formato incorrecto en columna archivo='.$newarchivo);
				}

				$this->archivo=$newarchivo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	
		
	
	/*RELACIONES*/
	
	public function getotro_documentos() : array {
		return $this->otrodocumentos;
	}

	
	
	public  function  setotro_documentos(array $otrodocumentos) {
		try {
			$this->otrodocumentos=$otrodocumentos;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_archivoValue(string $sKey,$oValue) {
		$this->map_archivo[$sKey]=$oValue;
	}
	
	public function getMap_archivoValue(string $sKey) {
		return $this->map_archivo[$sKey];
	}
	
	public function getarchivo_Original() : ?archivo {
		return $this->archivo_Original;
	}
	
	public function setarchivo_Original(archivo $archivo) {
		try {
			$this->archivo_Original=$archivo;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_archivo() : array {
		return $this->map_archivo;
	}

	public function setMap_archivo(array $map_archivo) {
		$this->map_archivo = $map_archivo;
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
