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
namespace com\bydan\contabilidad\general\comentario_documento\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class comentario_documento extends GeneralEntity {

	/*GENERAL*/
	public static string $class='comentario_documento';
	
	/*AUXILIARES*/
	public ?comentario_documento $comentario_documento_Original=null;	
	public ?GeneralEntity $comentario_documento_Additional=null;
	public array $map_comentario_documento=array();	
		
	/*CAMPOS*/
	public string $tipo_documento = '';
	public string $comentario = '';
	
	/*FKs*/
	
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->comentario_documento_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->tipo_documento='';
 		$this->comentario='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->comentario_documento_Additional=new comentario_documento_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_comentario_documento() {
		$this->map_comentario_documento = array();
	}
	
	/*CAMPOS*/
    
	public function  gettipo_documento() : ?string {
		return $this->tipo_documento;
	}
    
	public function  getcomentario() : ?string {
		return $this->comentario;
	}
	
    
	public function settipo_documento(?string $newtipo_documento)
	{
		try {
			if($this->tipo_documento!==$newtipo_documento) {
				if($newtipo_documento===null && $newtipo_documento!='') {
					throw new Exception('comentario_documento:Valor nulo no permitido en columna tipo_documento');
				}

				if(strlen($newtipo_documento)>2) {
					throw new Exception('comentario_documento:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=2 en columna tipo_documento');
				}

				if(filter_var($newtipo_documento,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('comentario_documento:Formato incorrecto en columna tipo_documento='.$newtipo_documento);
				}

				$this->tipo_documento=$newtipo_documento;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcomentario(?string $newcomentario)
	{
		try {
			if($this->comentario!==$newcomentario) {
				if($newcomentario===null && $newcomentario!='') {
					throw new Exception('comentario_documento:Valor nulo no permitido en columna comentario');
				}

				if(strlen($newcomentario)>1000) {
					throw new Exception('comentario_documento:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna comentario');
				}

				if(filter_var($newcomentario,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('comentario_documento:Formato incorrecto en columna comentario='.$newcomentario);
				}

				$this->comentario=$newcomentario;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	
		
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_comentario_documentoValue(string $sKey,$oValue) {
		$this->map_comentario_documento[$sKey]=$oValue;
	}
	
	public function getMap_comentario_documentoValue(string $sKey) {
		return $this->map_comentario_documento[$sKey];
	}
	
	public function getcomentario_documento_Original() : ?comentario_documento {
		return $this->comentario_documento_Original;
	}
	
	public function setcomentario_documento_Original(comentario_documento $comentario_documento) {
		try {
			$this->comentario_documento_Original=$comentario_documento;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_comentario_documento() : array {
		return $this->map_comentario_documento;
	}

	public function setMap_comentario_documento(array $map_comentario_documento) {
		$this->map_comentario_documento = $map_comentario_documento;
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
