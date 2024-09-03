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
namespace com\bydan\contabilidad\inventario\imagen_devolucion\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class imagen_devolucion extends GeneralEntity {

	/*GENERAL*/
	public static string $class='imagen_devolucion';
	
	/*AUXILIARES*/
	public ?imagen_devolucion $imagen_devolucion_Original=null;	
	public ?GeneralEntity $imagen_devolucion_Additional=null;
	public array $map_imagen_devolucion=array();	
		
	/*CAMPOS*/
	public string $imagen = '';
	public string $nro_devolucion = '';
	
	/*FKs*/
	
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->imagen_devolucion_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->imagen='';
 		$this->nro_devolucion='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->imagen_devolucion_Additional=new imagen_devolucion_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_imagen_devolucion() {
		$this->map_imagen_devolucion = array();
	}
	
	/*CAMPOS*/
    
	public function  getimagen() : ?string {
		return $this->imagen;
	}
    
	public function  getnro_devolucion() : ?string {
		return $this->nro_devolucion;
	}
	
    
	public function setimagen(?string $newimagen)
	{
		try {
			if($this->imagen!==$newimagen) {
				if($newimagen===null && $newimagen!='') {
					throw new Exception('imagen_devolucion:Valor nulo no permitido en columna imagen');
				}

				if(strlen($newimagen)>1000) {
					throw new Exception('imagen_devolucion:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna imagen');
				}

				if(filter_var($newimagen,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('imagen_devolucion:Formato incorrecto en columna imagen='.$newimagen);
				}

				$this->imagen=$newimagen;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnro_devolucion(?string $newnro_devolucion)
	{
		try {
			if($this->nro_devolucion!==$newnro_devolucion) {
				if($newnro_devolucion===null && $newnro_devolucion!='') {
					throw new Exception('imagen_devolucion:Valor nulo no permitido en columna nro_devolucion');
				}

				if(strlen($newnro_devolucion)>10) {
					throw new Exception('imagen_devolucion:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=10 en columna nro_devolucion');
				}

				if(filter_var($newnro_devolucion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('imagen_devolucion:Formato incorrecto en columna nro_devolucion='.$newnro_devolucion);
				}

				$this->nro_devolucion=$newnro_devolucion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	
		
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_imagen_devolucionValue(string $sKey,$oValue) {
		$this->map_imagen_devolucion[$sKey]=$oValue;
	}
	
	public function getMap_imagen_devolucionValue(string $sKey) {
		return $this->map_imagen_devolucion[$sKey];
	}
	
	public function getimagen_devolucion_Original() : ?imagen_devolucion {
		return $this->imagen_devolucion_Original;
	}
	
	public function setimagen_devolucion_Original(imagen_devolucion $imagen_devolucion) {
		try {
			$this->imagen_devolucion_Original=$imagen_devolucion;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_imagen_devolucion() : array {
		return $this->map_imagen_devolucion;
	}

	public function setMap_imagen_devolucion(array $map_imagen_devolucion) {
		$this->map_imagen_devolucion = $map_imagen_devolucion;
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
