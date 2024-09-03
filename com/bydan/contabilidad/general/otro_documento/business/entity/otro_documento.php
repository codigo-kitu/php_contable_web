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
namespace com\bydan\contabilidad\general\otro_documento\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class otro_documento extends GeneralEntity {

	/*GENERAL*/
	public static string $class='otro_documento';
	
	/*AUXILIARES*/
	public ?otro_documento $otro_documento_Original=null;	
	public ?GeneralEntity $otro_documento_Additional=null;
	public array $map_otro_documento=array();	
		
	/*CAMPOS*/
	public int $id_archivo = -1;
	public string $id_archivo_Descripcion = '';

	public string $nombre = '';
	public string $data = '';
	public string $campo1 = '';
	public float $campo2 = 0.0;
	public string $campo3 = '';
	
	/*FKs*/
	
	public ?archivo $archivo = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->otro_documento_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_archivo=-1;
		$this->id_archivo_Descripcion='';

 		$this->nombre='';
 		$this->data='';
 		$this->campo1='';
 		$this->campo2=0.0;
 		$this->campo3='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->archivo=new archivo();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->otro_documento_Additional=new otro_documento_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_otro_documento() {
		$this->map_otro_documento = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_archivo() : ?int {
		return $this->id_archivo;
	}
	
	public function  getid_archivo_Descripcion() : string {
		return $this->id_archivo_Descripcion;
	}
    
	public function  getnombre() : ?string {
		return $this->nombre;
	}
    
	public function  getdata() : ?string {
		return $this->data;
	}
    
	public function  getcampo1() : ?string {
		return $this->campo1;
	}
    
	public function  getcampo2() : ?float {
		return $this->campo2;
	}
    
	public function  getcampo3() : ?string {
		return $this->campo3;
	}
	
    
	public function setid_archivo(?int $newid_archivo)
	{
		try {
			if($this->id_archivo!==$newid_archivo) {
				if($newid_archivo===null && $newid_archivo!='') {
					throw new Exception('otro_documento:Valor nulo no permitido en columna id_archivo');
				}

				if($newid_archivo!==null && filter_var($newid_archivo,FILTER_VALIDATE_INT)===false) {
					throw new Exception('otro_documento:No es numero entero - id_archivo='.$newid_archivo);
				}

				$this->id_archivo=$newid_archivo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_archivo_Descripcion(string $newid_archivo_Descripcion)
	{
		try {
			if($this->id_archivo_Descripcion!=$newid_archivo_Descripcion) {
				if($newid_archivo_Descripcion===null && $newid_archivo_Descripcion!='') {
					throw new Exception('otro_documento:Valor nulo no permitido en columna id_archivo');
				}

				$this->id_archivo_Descripcion=$newid_archivo_Descripcion;
				//$this->setIsChanged(true);
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
					throw new Exception('otro_documento:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>200) {
					throw new Exception('otro_documento:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=200 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('otro_documento:Formato incorrecto en columna nombre='.$newnombre);
				}

				$this->nombre=$newnombre;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdata(?string $newdata)
	{
		try {
			if($this->data!==$newdata) {
				if($newdata===null && $newdata!='') {
					throw new Exception('otro_documento:Valor nulo no permitido en columna data');
				}

				if(strlen($newdata)>1000) {
					throw new Exception('otro_documento:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna data');
				}

				if(filter_var($newdata,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('otro_documento:Formato incorrecto en columna data='.$newdata);
				}

				$this->data=$newdata;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcampo1(?string $newcampo1)
	{
		try {
			if($this->campo1!==$newcampo1) {
				if($newcampo1===null && $newcampo1!='') {
					throw new Exception('otro_documento:Valor nulo no permitido en columna campo1');
				}

				if(strlen($newcampo1)>1000) {
					throw new Exception('otro_documento:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna campo1');
				}

				if(filter_var($newcampo1,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('otro_documento:Formato incorrecto en columna campo1='.$newcampo1);
				}

				$this->campo1=$newcampo1;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcampo2(?float $newcampo2)
	{
		try {
			if($this->campo2!==$newcampo2) {
				if($newcampo2===null && $newcampo2!='') {
					throw new Exception('otro_documento:Valor nulo no permitido en columna campo2');
				}

				if($newcampo2!=0) {
					if($newcampo2!==null && filter_var($newcampo2,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('otro_documento:No es numero decimal - campo2='.$newcampo2);
					}
				}

				$this->campo2=$newcampo2;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcampo3(?string $newcampo3)
	{
		try {
			if($this->campo3!==$newcampo3) {
				if($newcampo3===null && $newcampo3!='') {
					throw new Exception('otro_documento:Valor nulo no permitido en columna campo3');
				}

				if(strlen($newcampo3)>1000) {
					throw new Exception('otro_documento:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna campo3');
				}

				if(filter_var($newcampo3,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('otro_documento:Formato incorrecto en columna campo3='.$newcampo3);
				}

				$this->campo3=$newcampo3;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	public function getarchivo() : ?archivo {
		return $this->archivo;
	}

	
	
	public  function  setarchivo(?archivo $archivo) {
		try {
			$this->archivo=$archivo;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_otro_documentoValue(string $sKey,$oValue) {
		$this->map_otro_documento[$sKey]=$oValue;
	}
	
	public function getMap_otro_documentoValue(string $sKey) {
		return $this->map_otro_documento[$sKey];
	}
	
	public function getotro_documento_Original() : ?otro_documento {
		return $this->otro_documento_Original;
	}
	
	public function setotro_documento_Original(otro_documento $otro_documento) {
		try {
			$this->otro_documento_Original=$otro_documento;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_otro_documento() : array {
		return $this->map_otro_documento;
	}

	public function setMap_otro_documento(array $map_otro_documento) {
		$this->map_otro_documento = $map_otro_documento;
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
