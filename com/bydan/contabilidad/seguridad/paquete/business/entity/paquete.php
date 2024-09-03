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
namespace com\bydan\contabilidad\seguridad\paquete\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class paquete extends GeneralEntity {

	/*GENERAL*/
	public static string $class='paquete';
	
	/*AUXILIARES*/
	public ?paquete $paquete_Original=null;	
	public ?GeneralEntity $paquete_Additional=null;
	public array $map_paquete=array();	
		
	/*CAMPOS*/
	public int $id_sistema = -1;
	public string $id_sistema_Descripcion = '';

	public string $nombre = '';
	public string $descripcion = '';
	
	/*FKs*/
	
	public ?sistema $sistema = null;
	
	/*RELACIONES*/
	
	public array $modulos = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->paquete_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_sistema=-1;
		$this->id_sistema_Descripcion='';

 		$this->nombre='';
 		$this->descripcion='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->sistema=new sistema();
		}
		
		/*RELACIONES*/
		
		$this->modulos=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->paquete_Additional=new paquete_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_paquete() {
		$this->map_paquete = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_sistema() : ?int {
		return $this->id_sistema;
	}
	
	public function  getid_sistema_Descripcion() : string {
		return $this->id_sistema_Descripcion;
	}
    
	public function  getnombre() : ?string {
		return $this->nombre;
	}
    
	public function  getdescripcion() : ?string {
		return $this->descripcion;
	}
	
    
	public function setid_sistema(?int $newid_sistema)
	{
		try {
			if($this->id_sistema!==$newid_sistema) {
				if($newid_sistema===null && $newid_sistema!='') {
					throw new Exception('paquete:Valor nulo no permitido en columna id_sistema');
				}

				if($newid_sistema!==null && filter_var($newid_sistema,FILTER_VALIDATE_INT)===false) {
					throw new Exception('paquete:No es numero entero - id_sistema='.$newid_sistema);
				}

				$this->id_sistema=$newid_sistema;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_sistema_Descripcion(string $newid_sistema_Descripcion)
	{
		try {
			if($this->id_sistema_Descripcion!=$newid_sistema_Descripcion) {
				if($newid_sistema_Descripcion===null && $newid_sistema_Descripcion!='') {
					throw new Exception('paquete:Valor nulo no permitido en columna id_sistema');
				}

				$this->id_sistema_Descripcion=$newid_sistema_Descripcion;
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
					throw new Exception('paquete:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>150) {
					throw new Exception('paquete:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=150 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('paquete:Formato incorrecto en columna nombre='.$newnombre);
				}

				$this->nombre=$newnombre;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdescripcion(?string $newdescripcion)
	{
		try {
			if($this->descripcion!==$newdescripcion) {
				if($newdescripcion===null && $newdescripcion!='') {
					throw new Exception('paquete:Valor nulo no permitido en columna descripcion');
				}

				if(strlen($newdescripcion)>200) {
					throw new Exception('paquete:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=200 en columna descripcion');
				}

				if(filter_var($newdescripcion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('paquete:Formato incorrecto en columna descripcion='.$newdescripcion);
				}

				$this->descripcion=$newdescripcion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	public function getsistema() : ?sistema {
		return $this->sistema;
	}

	
	
	public  function  setsistema(?sistema $sistema) {
		try {
			$this->sistema=$sistema;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	public function getmodulos() : array {
		return $this->modulos;
	}

	
	
	public  function  setmodulos(array $modulos) {
		try {
			$this->modulos=$modulos;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_paqueteValue(string $sKey,$oValue) {
		$this->map_paquete[$sKey]=$oValue;
	}
	
	public function getMap_paqueteValue(string $sKey) {
		return $this->map_paquete[$sKey];
	}
	
	public function getpaquete_Original() : ?paquete {
		return $this->paquete_Original;
	}
	
	public function setpaquete_Original(paquete $paquete) {
		try {
			$this->paquete_Original=$paquete;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_paquete() : array {
		return $this->map_paquete;
	}

	public function setMap_paquete(array $map_paquete) {
		$this->map_paquete = $map_paquete;
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
