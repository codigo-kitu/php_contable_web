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
namespace com\bydan\contabilidad\estimados\imagen_consignacion\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class imagen_consignacion extends GeneralEntity {

	/*GENERAL*/
	public static string $class='imagen_consignacion';
	
	/*AUXILIARES*/
	public ?imagen_consignacion $imagen_consignacion_Original=null;	
	public ?GeneralEntity $imagen_consignacion_Additional=null;
	public array $map_imagen_consignacion=array();	
		
	/*CAMPOS*/
	public int $id_consignacion = -1;
	public string $id_consignacion_Descripcion = '';

	public string $imagen = '';
	
	/*FKs*/
	
	public ?consignacion $consignacion = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->imagen_consignacion_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_consignacion=-1;
		$this->id_consignacion_Descripcion='';

 		$this->imagen='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->consignacion=new consignacion();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->imagen_consignacion_Additional=new imagen_consignacion_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_imagen_consignacion() {
		$this->map_imagen_consignacion = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_consignacion() : ?int {
		return $this->id_consignacion;
	}
	
	public function  getid_consignacion_Descripcion() : string {
		return $this->id_consignacion_Descripcion;
	}
    
	public function  getimagen() : ?string {
		return $this->imagen;
	}
	
    
	public function setid_consignacion(?int $newid_consignacion)
	{
		try {
			if($this->id_consignacion!==$newid_consignacion) {
				if($newid_consignacion===null && $newid_consignacion!='') {
					throw new Exception('imagen_consignacion:Valor nulo no permitido en columna id_consignacion');
				}

				if($newid_consignacion!==null && filter_var($newid_consignacion,FILTER_VALIDATE_INT)===false) {
					throw new Exception('imagen_consignacion:No es numero entero - id_consignacion='.$newid_consignacion);
				}

				$this->id_consignacion=$newid_consignacion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_consignacion_Descripcion(string $newid_consignacion_Descripcion)
	{
		try {
			if($this->id_consignacion_Descripcion!=$newid_consignacion_Descripcion) {
				if($newid_consignacion_Descripcion===null && $newid_consignacion_Descripcion!='') {
					throw new Exception('imagen_consignacion:Valor nulo no permitido en columna id_consignacion');
				}

				$this->id_consignacion_Descripcion=$newid_consignacion_Descripcion;
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
					throw new Exception('imagen_consignacion:Valor nulo no permitido en columna imagen');
				}

				if(strlen($newimagen)>1000) {
					throw new Exception('imagen_consignacion:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna imagen');
				}

				if(filter_var($newimagen,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('imagen_consignacion:Formato incorrecto en columna imagen='.$newimagen);
				}

				$this->imagen=$newimagen;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	public function getconsignacion() : ?consignacion {
		return $this->consignacion;
	}

	
	
	public  function  setconsignacion(?consignacion $consignacion) {
		try {
			$this->consignacion=$consignacion;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_imagen_consignacionValue(string $sKey,$oValue) {
		$this->map_imagen_consignacion[$sKey]=$oValue;
	}
	
	public function getMap_imagen_consignacionValue(string $sKey) {
		return $this->map_imagen_consignacion[$sKey];
	}
	
	public function getimagen_consignacion_Original() : ?imagen_consignacion {
		return $this->imagen_consignacion_Original;
	}
	
	public function setimagen_consignacion_Original(imagen_consignacion $imagen_consignacion) {
		try {
			$this->imagen_consignacion_Original=$imagen_consignacion;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_imagen_consignacion() : array {
		return $this->map_imagen_consignacion;
	}

	public function setMap_imagen_consignacion(array $map_imagen_consignacion) {
		$this->map_imagen_consignacion = $map_imagen_consignacion;
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
