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
namespace com\bydan\contabilidad\seguridad\campo\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class campo extends GeneralEntity {

	/*GENERAL*/
	public static string $class='campo';
	
	/*AUXILIARES*/
	public ?campo $campo_Original=null;	
	public ?GeneralEntity $campo_Additional=null;
	public array $map_campo=array();	
		
	/*CAMPOS*/
	public int $id_opcion = -1;
	public string $id_opcion_Descripcion = '';

	public string $codigo = '';
	public string $nombre = '';
	public string $descripcion = '';
	public bool $estado = false;
	
	/*FKs*/
	
	public ?opcion $opcion = null;
	
	/*RELACIONES*/
	
	public array $perfilcampos = array();
	public array $perfils = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->campo_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_opcion=-1;
		$this->id_opcion_Descripcion='';

 		$this->codigo='';
 		$this->nombre='';
 		$this->descripcion='';
 		$this->estado=false;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->opcion=new opcion();
		}
		
		/*RELACIONES*/
		
		$this->perfilcampos=array();
		$this->perfils=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->campo_Additional=new campo_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_campo() {
		$this->map_campo = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_opcion() : ?int {
		return $this->id_opcion;
	}
	
	public function  getid_opcion_Descripcion() : string {
		return $this->id_opcion_Descripcion;
	}
    
	public function  getcodigo() : ?string {
		return $this->codigo;
	}
    
	public function  getnombre() : ?string {
		return $this->nombre;
	}
    
	public function  getdescripcion() : ?string {
		return $this->descripcion;
	}
    
	public function  getestado() : ?bool {
		return $this->estado;
	}
	
    
	public function setid_opcion(?int $newid_opcion)
	{
		try {
			if($this->id_opcion!==$newid_opcion) {
				if($newid_opcion===null && $newid_opcion!='') {
					throw new Exception('campo:Valor nulo no permitido en columna id_opcion');
				}

				if($newid_opcion!==null && filter_var($newid_opcion,FILTER_VALIDATE_INT)===false) {
					throw new Exception('campo:No es numero entero - id_opcion='.$newid_opcion);
				}

				$this->id_opcion=$newid_opcion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_opcion_Descripcion(string $newid_opcion_Descripcion)
	{
		try {
			if($this->id_opcion_Descripcion!=$newid_opcion_Descripcion) {
				if($newid_opcion_Descripcion===null && $newid_opcion_Descripcion!='') {
					throw new Exception('campo:Valor nulo no permitido en columna id_opcion');
				}

				$this->id_opcion_Descripcion=$newid_opcion_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcodigo(?string $newcodigo)
	{
		try {
			if($this->codigo!==$newcodigo) {
				if($newcodigo===null && $newcodigo!='') {
					throw new Exception('campo:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>50) {
					throw new Exception('campo:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('campo:Formato incorrecto en columna codigo='.$newcodigo);
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
					throw new Exception('campo:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>150) {
					throw new Exception('campo:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=150 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('campo:Formato incorrecto en columna nombre='.$newnombre);
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
					throw new Exception('campo:Valor nulo no permitido en columna descripcion');
				}

				if(strlen($newdescripcion)>250) {
					throw new Exception('campo:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=250 en columna descripcion');
				}

				if(filter_var($newdescripcion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('campo:Formato incorrecto en columna descripcion='.$newdescripcion);
				}

				$this->descripcion=$newdescripcion;
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
					throw new Exception('campo:Valor nulo no permitido en columna estado');
				}

				if($newestado!==null && filter_var($newestado,FILTER_VALIDATE_BOOLEAN)===false && $newestado!==0 && $newestado!==false) {
					throw new Exception('campo:No es valor booleano - estado='.$newestado);
				}

				$this->estado=$newestado;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	public function getopcion() : ?opcion {
		return $this->opcion;
	}

	
	
	public  function  setopcion(?opcion $opcion) {
		try {
			$this->opcion=$opcion;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	public function getperfil_campos() : array {
		return $this->perfilcampos;
	}

	public function getperfils() : array {
		return $this->perfils;
	}

	
	
	public  function  setperfil_campos(array $perfilcampos) {
		try {
			$this->perfilcampos=$perfilcampos;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setperfils(array $perfils) {
		try {
			$this->perfils=$perfils;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_campoValue(string $sKey,$oValue) {
		$this->map_campo[$sKey]=$oValue;
	}
	
	public function getMap_campoValue(string $sKey) {
		return $this->map_campo[$sKey];
	}
	
	public function getcampo_Original() : ?campo {
		return $this->campo_Original;
	}
	
	public function setcampo_Original(campo $campo) {
		try {
			$this->campo_Original=$campo;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_campo() : array {
		return $this->map_campo;
	}

	public function setMap_campo(array $map_campo) {
		$this->map_campo = $map_campo;
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
