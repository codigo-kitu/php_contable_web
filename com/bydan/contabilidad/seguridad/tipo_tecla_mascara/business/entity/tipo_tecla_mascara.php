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
namespace com\bydan\contabilidad\seguridad\tipo_tecla_mascara\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class tipo_tecla_mascara extends GeneralEntity {

	/*GENERAL*/
	public static string $class='tipo_tecla_mascara';
	
	/*AUXILIARES*/
	public ?tipo_tecla_mascara $tipo_tecla_mascara_Original=null;	
	public ?GeneralEntity $tipo_tecla_mascara_Additional=null;
	public array $map_tipo_tecla_mascara=array();	
		
	/*CAMPOS*/
	public string $codigo = '';
	public string $nombre = '';
	
	/*FKs*/
	
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(false);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->tipo_tecla_mascara_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->codigo='';
 		$this->nombre='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->tipo_tecla_mascara_Additional=new tipo_tecla_mascara_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_tipo_tecla_mascara() {
		$this->map_tipo_tecla_mascara = array();
	}
	
	/*CAMPOS*/
    
	public function  getcodigo() : ?string {
		return $this->codigo;
	}
    
	public function  getnombre() : ?string {
		return $this->nombre;
	}
	
    
	public function setcodigo(?string $newcodigo)
	{
		try {
			if($this->codigo!==$newcodigo) {
				if($newcodigo===null && $newcodigo!='') {
					throw new Exception('tipo_tecla_mascara:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>50) {
					throw new Exception('tipo_tecla_mascara:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('tipo_tecla_mascara:Formato incorrecto en columna codigo='.$newcodigo);
				}

				$this->codigo=$newcodigo;
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
					throw new Exception('tipo_tecla_mascara:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>150) {
					throw new Exception('tipo_tecla_mascara:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=150 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('tipo_tecla_mascara:Formato incorrecto en columna nombre='.$newnombre);
				}

				$this->nombre=$newnombre;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	
		
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_tipo_tecla_mascaraValue(string $sKey,$oValue) {
		$this->map_tipo_tecla_mascara[$sKey]=$oValue;
	}
	
	public function getMap_tipo_tecla_mascaraValue(string $sKey) {
		return $this->map_tipo_tecla_mascara[$sKey];
	}
	
	public function gettipo_tecla_mascara_Original() : ?tipo_tecla_mascara {
		return $this->tipo_tecla_mascara_Original;
	}
	
	public function settipo_tecla_mascara_Original(tipo_tecla_mascara $tipo_tecla_mascara) {
		try {
			$this->tipo_tecla_mascara_Original=$tipo_tecla_mascara;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_tipo_tecla_mascara() : array {
		return $this->map_tipo_tecla_mascara;
	}

	public function setMap_tipo_tecla_mascara(array $map_tipo_tecla_mascara) {
		$this->map_tipo_tecla_mascara = $map_tipo_tecla_mascara;
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
