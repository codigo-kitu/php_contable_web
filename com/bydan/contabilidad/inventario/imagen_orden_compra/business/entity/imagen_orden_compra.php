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
namespace com\bydan\contabilidad\inventario\imagen_orden_compra\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class imagen_orden_compra extends GeneralEntity {

	/*GENERAL*/
	public static string $class='imagen_orden_compra';
	
	/*AUXILIARES*/
	public ?imagen_orden_compra $imagen_orden_compra_Original=null;	
	public ?GeneralEntity $imagen_orden_compra_Additional=null;
	public array $map_imagen_orden_compra=array();	
		
	/*CAMPOS*/
	public string $imagen = '';
	public string $nro_compra = '';
	
	/*FKs*/
	
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->imagen_orden_compra_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->imagen='';
 		$this->nro_compra='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->imagen_orden_compra_Additional=new imagen_orden_compra_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_imagen_orden_compra() {
		$this->map_imagen_orden_compra = array();
	}
	
	/*CAMPOS*/
    
	public function  getimagen() : ?string {
		return $this->imagen;
	}
    
	public function  getnro_compra() : ?string {
		return $this->nro_compra;
	}
	
    
	public function setimagen(?string $newimagen)
	{
		try {
			if($this->imagen!==$newimagen) {
				if($newimagen===null && $newimagen!='') {
					throw new Exception('imagen_orden_compra:Valor nulo no permitido en columna imagen');
				}

				if(strlen($newimagen)>1000) {
					throw new Exception('imagen_orden_compra:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna imagen');
				}

				if(filter_var($newimagen,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('imagen_orden_compra:Formato incorrecto en columna imagen='.$newimagen);
				}

				$this->imagen=$newimagen;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnro_compra(?string $newnro_compra)
	{
		try {
			if($this->nro_compra!==$newnro_compra) {
				if($newnro_compra===null && $newnro_compra!='') {
					throw new Exception('imagen_orden_compra:Valor nulo no permitido en columna nro_compra');
				}

				if(strlen($newnro_compra)>10) {
					throw new Exception('imagen_orden_compra:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=10 en columna nro_compra');
				}

				if(filter_var($newnro_compra,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('imagen_orden_compra:Formato incorrecto en columna nro_compra='.$newnro_compra);
				}

				$this->nro_compra=$newnro_compra;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	
		
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_imagen_orden_compraValue(string $sKey,$oValue) {
		$this->map_imagen_orden_compra[$sKey]=$oValue;
	}
	
	public function getMap_imagen_orden_compraValue(string $sKey) {
		return $this->map_imagen_orden_compra[$sKey];
	}
	
	public function getimagen_orden_compra_Original() : ?imagen_orden_compra {
		return $this->imagen_orden_compra_Original;
	}
	
	public function setimagen_orden_compra_Original(imagen_orden_compra $imagen_orden_compra) {
		try {
			$this->imagen_orden_compra_Original=$imagen_orden_compra;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_imagen_orden_compra() : array {
		return $this->map_imagen_orden_compra;
	}

	public function setMap_imagen_orden_compra(array $map_imagen_orden_compra) {
		$this->map_imagen_orden_compra = $map_imagen_orden_compra;
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
