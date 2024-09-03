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
namespace com\bydan\contabilidad\estimados\imagen_estimado\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class imagen_estimado extends GeneralEntity {

	/*GENERAL*/
	public static string $class='imagen_estimado';
	
	/*AUXILIARES*/
	public ?imagen_estimado $imagen_estimado_Original=null;	
	public ?GeneralEntity $imagen_estimado_Additional=null;
	public array $map_imagen_estimado=array();	
		
	/*CAMPOS*/
	public int $id_estimado = -1;
	public string $id_estimado_Descripcion = '';

	public string $imagen = '';
	
	/*FKs*/
	
	public ?estimado $estimado = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->imagen_estimado_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_estimado=-1;
		$this->id_estimado_Descripcion='';

 		$this->imagen='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->estimado=new estimado();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->imagen_estimado_Additional=new imagen_estimado_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_imagen_estimado() {
		$this->map_imagen_estimado = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_estimado() : ?int {
		return $this->id_estimado;
	}
	
	public function  getid_estimado_Descripcion() : string {
		return $this->id_estimado_Descripcion;
	}
    
	public function  getimagen() : ?string {
		return $this->imagen;
	}
	
    
	public function setid_estimado(?int $newid_estimado)
	{
		try {
			if($this->id_estimado!==$newid_estimado) {
				if($newid_estimado===null && $newid_estimado!='') {
					throw new Exception('imagen_estimado:Valor nulo no permitido en columna id_estimado');
				}

				if($newid_estimado!==null && filter_var($newid_estimado,FILTER_VALIDATE_INT)===false) {
					throw new Exception('imagen_estimado:No es numero entero - id_estimado='.$newid_estimado);
				}

				$this->id_estimado=$newid_estimado;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_estimado_Descripcion(string $newid_estimado_Descripcion)
	{
		try {
			if($this->id_estimado_Descripcion!=$newid_estimado_Descripcion) {
				if($newid_estimado_Descripcion===null && $newid_estimado_Descripcion!='') {
					throw new Exception('imagen_estimado:Valor nulo no permitido en columna id_estimado');
				}

				$this->id_estimado_Descripcion=$newid_estimado_Descripcion;
				//$this->setIsChanged(true);
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
					throw new Exception('imagen_estimado:Valor nulo no permitido en columna imagen');
				}

				if(strlen($newimagen)>1000) {
					throw new Exception('imagen_estimado:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna imagen');
				}

				if(filter_var($newimagen,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('imagen_estimado:Formato incorrecto en columna imagen='.$newimagen);
				}

				$this->imagen=$newimagen;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	public function getestimado() : ?estimado {
		return $this->estimado;
	}

	
	
	public  function  setestimado(?estimado $estimado) {
		try {
			$this->estimado=$estimado;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_imagen_estimadoValue(string $sKey,$oValue) {
		$this->map_imagen_estimado[$sKey]=$oValue;
	}
	
	public function getMap_imagen_estimadoValue(string $sKey) {
		return $this->map_imagen_estimado[$sKey];
	}
	
	public function getimagen_estimado_Original() : ?imagen_estimado {
		return $this->imagen_estimado_Original;
	}
	
	public function setimagen_estimado_Original(imagen_estimado $imagen_estimado) {
		try {
			$this->imagen_estimado_Original=$imagen_estimado;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_imagen_estimado() : array {
		return $this->map_imagen_estimado;
	}

	public function setMap_imagen_estimado(array $map_imagen_estimado) {
		$this->map_imagen_estimado = $map_imagen_estimado;
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
