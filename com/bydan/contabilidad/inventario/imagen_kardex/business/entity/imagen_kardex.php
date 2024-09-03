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
namespace com\bydan\contabilidad\inventario\imagen_kardex\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class imagen_kardex extends GeneralEntity {

	/*GENERAL*/
	public static string $class='imagen_kardex';
	
	/*AUXILIARES*/
	public ?imagen_kardex $imagen_kardex_Original=null;	
	public ?GeneralEntity $imagen_kardex_Additional=null;
	public array $map_imagen_kardex=array();	
		
	/*CAMPOS*/
	public string $nro_documento = '';
	public string $imagen = '';
	
	/*FKs*/
	
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->imagen_kardex_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->nro_documento='';
 		$this->imagen='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->imagen_kardex_Additional=new imagen_kardex_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_imagen_kardex() {
		$this->map_imagen_kardex = array();
	}
	
	/*CAMPOS*/
    
	public function  getnro_documento() : ?string {
		return $this->nro_documento;
	}
    
	public function  getimagen() : ?string {
		return $this->imagen;
	}
	
    
	public function setnro_documento(?string $newnro_documento)
	{
		try {
			if($this->nro_documento!==$newnro_documento) {
				if($newnro_documento===null && $newnro_documento!='') {
					throw new Exception('imagen_kardex:Valor nulo no permitido en columna nro_documento');
				}

				if(strlen($newnro_documento)>10) {
					throw new Exception('imagen_kardex:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=10 en columna nro_documento');
				}

				if(filter_var($newnro_documento,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('imagen_kardex:Formato incorrecto en columna nro_documento='.$newnro_documento);
				}

				$this->nro_documento=$newnro_documento;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setimagen(?string $newimagen)
	{
		try {
			if($this->imagen!==$newimagen) {
				if($newimagen===null && $newimagen!='') {
					throw new Exception('imagen_kardex:Valor nulo no permitido en columna imagen');
				}

				if(strlen($newimagen)>1000) {
					throw new Exception('imagen_kardex:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna imagen');
				}

				if(filter_var($newimagen,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('imagen_kardex:Formato incorrecto en columna imagen='.$newimagen);
				}

				$this->imagen=$newimagen;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	
		
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_imagen_kardexValue(string $sKey,$oValue) {
		$this->map_imagen_kardex[$sKey]=$oValue;
	}
	
	public function getMap_imagen_kardexValue(string $sKey) {
		return $this->map_imagen_kardex[$sKey];
	}
	
	public function getimagen_kardex_Original() : ?imagen_kardex {
		return $this->imagen_kardex_Original;
	}
	
	public function setimagen_kardex_Original(imagen_kardex $imagen_kardex) {
		try {
			$this->imagen_kardex_Original=$imagen_kardex;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_imagen_kardex() : array {
		return $this->map_imagen_kardex;
	}

	public function setMap_imagen_kardex(array $map_imagen_kardex) {
		$this->map_imagen_kardex = $map_imagen_kardex;
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
