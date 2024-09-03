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
namespace com\bydan\contabilidad\seguridad\sistema\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class sistema extends GeneralEntity {

	/*GENERAL*/
	public static string $class='sistema';
	
	/*AUXILIARES*/
	public ?sistema $sistema_Original=null;	
	public ?GeneralEntity $sistema_Additional=null;
	public array $map_sistema=array();	
		
	/*CAMPOS*/
	public string $codigo = '';
	public string $nombre_principal = '';
	public string $nombre_secundario = '';
	public bool $estado = false;
	
	/*FKs*/
	
	
	/*RELACIONES*/
	
	public array $perfils = array();
	public array $opcions = array();
	public array $paquetes = array();
	public array $modulos = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->sistema_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->codigo='';
 		$this->nombre_principal='';
 		$this->nombre_secundario='';
 		$this->estado=false;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
		}
		
		/*RELACIONES*/
		
		$this->perfils=array();
		$this->opcions=array();
		$this->paquetes=array();
		$this->modulos=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->sistema_Additional=new sistema_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_sistema() {
		$this->map_sistema = array();
	}
	
	/*CAMPOS*/
    
	public function  getcodigo() : ?string {
		return $this->codigo;
	}
    
	public function  getnombre_principal() : ?string {
		return $this->nombre_principal;
	}
    
	public function  getnombre_secundario() : ?string {
		return $this->nombre_secundario;
	}
    
	public function  getestado() : ?bool {
		return $this->estado;
	}
	
    
	public function setcodigo(?string $newcodigo)
	{
		try {
			if($this->codigo!==$newcodigo) {
				if($newcodigo===null && $newcodigo!='') {
					throw new Exception('sistema:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>50) {
					throw new Exception('sistema:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('sistema:Formato incorrecto en columna codigo='.$newcodigo);
				}

				$this->codigo=$newcodigo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnombre_principal(?string $newnombre_principal)
	{
		try {
			if($this->nombre_principal!==$newnombre_principal) {
				if($newnombre_principal===null && $newnombre_principal!='') {
					throw new Exception('sistema:Valor nulo no permitido en columna nombre_principal');
				}

				if(strlen($newnombre_principal)>100) {
					throw new Exception('sistema:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=100 en columna nombre_principal');
				}

				if(filter_var($newnombre_principal,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('sistema:Formato incorrecto en columna nombre_principal='.$newnombre_principal);
				}

				$this->nombre_principal=$newnombre_principal;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnombre_secundario(?string $newnombre_secundario)
	{
		try {
			if($this->nombre_secundario!==$newnombre_secundario) {
				if($newnombre_secundario===null && $newnombre_secundario!='') {
					throw new Exception('sistema:Valor nulo no permitido en columna nombre_secundario');
				}

				if(strlen($newnombre_secundario)>100) {
					throw new Exception('sistema:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=100 en columna nombre_secundario');
				}

				if(filter_var($newnombre_secundario,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('sistema:Formato incorrecto en columna nombre_secundario='.$newnombre_secundario);
				}

				$this->nombre_secundario=$newnombre_secundario;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setestado(?bool $newestado)
	{
		try {
			if($this->estado!==$newestado) {
				if($newestado===null && $newestado!='') {
					throw new Exception('sistema:Valor nulo no permitido en columna estado');
				}

				if($newestado!==null && filter_var($newestado,FILTER_VALIDATE_BOOLEAN)===false && $newestado!==0 && $newestado!==false) {
					throw new Exception('sistema:No es valor booleano - estado='.$newestado);
				}

				$this->estado=$newestado;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	
		
	
	/*RELACIONES*/
	
	public function getperfils() : array {
		return $this->perfils;
	}

	public function getopcions() : array {
		return $this->opcions;
	}

	public function getpaquetes() : array {
		return $this->paquetes;
	}

	public function getmodulos() : array {
		return $this->modulos;
	}

	
	
	public  function  setperfils(array $perfils) {
		try {
			$this->perfils=$perfils;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setopcions(array $opcions) {
		try {
			$this->opcions=$opcions;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setpaquetes(array $paquetes) {
		try {
			$this->paquetes=$paquetes;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setmodulos(array $modulos) {
		try {
			$this->modulos=$modulos;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_sistemaValue(string $sKey,$oValue) {
		$this->map_sistema[$sKey]=$oValue;
	}
	
	public function getMap_sistemaValue(string $sKey) {
		return $this->map_sistema[$sKey];
	}
	
	public function getsistema_Original() : ?sistema {
		return $this->sistema_Original;
	}
	
	public function setsistema_Original(sistema $sistema) {
		try {
			$this->sistema_Original=$sistema;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_sistema() : array {
		return $this->map_sistema;
	}

	public function setMap_sistema(array $map_sistema) {
		$this->map_sistema = $map_sistema;
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
