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
namespace com\bydan\contabilidad\contabilidad\imagen_asiento\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class imagen_asiento extends GeneralEntity {

	/*GENERAL*/
	public static string $class='imagen_asiento';
	
	/*AUXILIARES*/
	public ?imagen_asiento $imagen_asiento_Original=null;	
	public ?GeneralEntity $imagen_asiento_Additional=null;
	public array $map_imagen_asiento=array();	
		
	/*CAMPOS*/
	public int $id_asiento = -1;
	public string $id_asiento_Descripcion = '';

	public string $imagen = '';
	public int $nro_asiento = 0;
	
	/*FKs*/
	
	public ?asiento $asiento = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->imagen_asiento_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_asiento=-1;
		$this->id_asiento_Descripcion='';

 		$this->imagen='';
 		$this->nro_asiento=0;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->asiento=new asiento();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->imagen_asiento_Additional=new imagen_asiento_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_imagen_asiento() {
		$this->map_imagen_asiento = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_asiento() : ?int {
		return $this->id_asiento;
	}
	
	public function  getid_asiento_Descripcion() : string {
		return $this->id_asiento_Descripcion;
	}
    
	public function  getimagen() : ?string {
		return $this->imagen;
	}
    
	public function  getnro_asiento() : ?int {
		return $this->nro_asiento;
	}
	
    
	public function setid_asiento(?int $newid_asiento)
	{
		try {
			if($this->id_asiento!==$newid_asiento) {
				if($newid_asiento===null && $newid_asiento!='') {
					throw new Exception('imagen_asiento:Valor nulo no permitido en columna id_asiento');
				}

				if($newid_asiento!==null && filter_var($newid_asiento,FILTER_VALIDATE_INT)===false) {
					throw new Exception('imagen_asiento:No es numero entero - id_asiento='.$newid_asiento);
				}

				$this->id_asiento=$newid_asiento;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_asiento_Descripcion(string $newid_asiento_Descripcion)
	{
		try {
			if($this->id_asiento_Descripcion!=$newid_asiento_Descripcion) {
				if($newid_asiento_Descripcion===null && $newid_asiento_Descripcion!='') {
					throw new Exception('imagen_asiento:Valor nulo no permitido en columna id_asiento');
				}

				$this->id_asiento_Descripcion=$newid_asiento_Descripcion;
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
					throw new Exception('imagen_asiento:Valor nulo no permitido en columna imagen');
				}

				if(strlen($newimagen)>1000) {
					throw new Exception('imagen_asiento:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna imagen');
				}

				if(filter_var($newimagen,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('imagen_asiento:Formato incorrecto en columna imagen='.$newimagen);
				}

				$this->imagen=$newimagen;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnro_asiento(?int $newnro_asiento)
	{
		try {
			if($this->nro_asiento!==$newnro_asiento) {
				if($newnro_asiento===null && $newnro_asiento!='') {
					throw new Exception('imagen_asiento:Valor nulo no permitido en columna nro_asiento');
				}

				if($newnro_asiento!==null && filter_var($newnro_asiento,FILTER_VALIDATE_INT)===false) {
					throw new Exception('imagen_asiento:No es numero entero - nro_asiento='.$newnro_asiento);
				}

				$this->nro_asiento=$newnro_asiento;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	public function getasiento() : ?asiento {
		return $this->asiento;
	}

	
	
	public  function  setasiento(?asiento $asiento) {
		try {
			$this->asiento=$asiento;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_imagen_asientoValue(string $sKey,$oValue) {
		$this->map_imagen_asiento[$sKey]=$oValue;
	}
	
	public function getMap_imagen_asientoValue(string $sKey) {
		return $this->map_imagen_asiento[$sKey];
	}
	
	public function getimagen_asiento_Original() : ?imagen_asiento {
		return $this->imagen_asiento_Original;
	}
	
	public function setimagen_asiento_Original(imagen_asiento $imagen_asiento) {
		try {
			$this->imagen_asiento_Original=$imagen_asiento;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_imagen_asiento() : array {
		return $this->map_imagen_asiento;
	}

	public function setMap_imagen_asiento(array $map_imagen_asiento) {
		$this->map_imagen_asiento = $map_imagen_asiento;
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
