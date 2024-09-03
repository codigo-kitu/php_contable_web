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
namespace com\bydan\contabilidad\inventario\imagen_cotizacion\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class imagen_cotizacion extends GeneralEntity {

	/*GENERAL*/
	public static string $class='imagen_cotizacion';
	
	/*AUXILIARES*/
	public ?imagen_cotizacion $imagen_cotizacion_Original=null;	
	public ?GeneralEntity $imagen_cotizacion_Additional=null;
	public array $map_imagen_cotizacion=array();	
		
	/*CAMPOS*/
	public string $imagen = '';
	public string $nro_cotizacion = '';
	
	/*FKs*/
	
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->imagen_cotizacion_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->imagen='';
 		$this->nro_cotizacion='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->imagen_cotizacion_Additional=new imagen_cotizacion_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_imagen_cotizacion() {
		$this->map_imagen_cotizacion = array();
	}
	
	/*CAMPOS*/
    
	public function  getimagen() : ?string {
		return $this->imagen;
	}
    
	public function  getnro_cotizacion() : ?string {
		return $this->nro_cotizacion;
	}
	
    
	public function setimagen(?string $newimagen)
	{
		try {
			if($this->imagen!==$newimagen) {
				if($newimagen===null && $newimagen!='') {
					throw new Exception('imagen_cotizacion:Valor nulo no permitido en columna imagen');
				}

				if(strlen($newimagen)>1000) {
					throw new Exception('imagen_cotizacion:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna imagen');
				}

				if(filter_var($newimagen,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('imagen_cotizacion:Formato incorrecto en columna imagen='.$newimagen);
				}

				$this->imagen=$newimagen;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnro_cotizacion(?string $newnro_cotizacion)
	{
		try {
			if($this->nro_cotizacion!==$newnro_cotizacion) {
				if($newnro_cotizacion===null && $newnro_cotizacion!='') {
					throw new Exception('imagen_cotizacion:Valor nulo no permitido en columna nro_cotizacion');
				}

				if(strlen($newnro_cotizacion)>10) {
					throw new Exception('imagen_cotizacion:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=10 en columna nro_cotizacion');
				}

				if(filter_var($newnro_cotizacion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('imagen_cotizacion:Formato incorrecto en columna nro_cotizacion='.$newnro_cotizacion);
				}

				$this->nro_cotizacion=$newnro_cotizacion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	
		
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_imagen_cotizacionValue(string $sKey,$oValue) {
		$this->map_imagen_cotizacion[$sKey]=$oValue;
	}
	
	public function getMap_imagen_cotizacionValue(string $sKey) {
		return $this->map_imagen_cotizacion[$sKey];
	}
	
	public function getimagen_cotizacion_Original() : ?imagen_cotizacion {
		return $this->imagen_cotizacion_Original;
	}
	
	public function setimagen_cotizacion_Original(imagen_cotizacion $imagen_cotizacion) {
		try {
			$this->imagen_cotizacion_Original=$imagen_cotizacion;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_imagen_cotizacion() : array {
		return $this->map_imagen_cotizacion;
	}

	public function setMap_imagen_cotizacion(array $map_imagen_cotizacion) {
		$this->map_imagen_cotizacion = $map_imagen_cotizacion;
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
