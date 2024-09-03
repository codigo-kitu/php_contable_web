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
namespace com\bydan\contabilidad\seguridad\perfil\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class perfil extends GeneralEntity {

	/*GENERAL*/
	public static string $class='perfil';
	
	/*AUXILIARES*/
	public ?perfil $perfil_Original=null;	
	public ?GeneralEntity $perfil_Additional=null;
	public array $map_perfil=array();	
		
	/*CAMPOS*/
	public int $id_sistema = -1;
	public string $id_sistema_Descripcion = '';

	public string $codigo = '';
	public string $nombre = '';
	public string $nombre2 = '';
	public bool $estado = false;
	
	/*FKs*/
	
	public ?sistema $sistema = null;
	
	/*RELACIONES*/
	
	public array $perfilaccions = array();
	public array $perfilcampos = array();
	public array $accions = array();
	public array $perfilopcions = array();
	public array $perfilusuarios = array();
	public array $campos = array();
	public array $usuarios = array();
	public array $opcions = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->perfil_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_sistema=-1;
		$this->id_sistema_Descripcion='';

 		$this->codigo='';
 		$this->nombre='';
 		$this->nombre2='';
 		$this->estado=false;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->sistema=new sistema();
		}
		
		/*RELACIONES*/
		
		$this->perfilaccions=array();
		$this->perfilcampos=array();
		$this->accions=array();
		$this->perfilopcions=array();
		$this->perfilusuarios=array();
		$this->campos=array();
		$this->usuarios=array();
		$this->opcions=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->perfil_Additional=new perfil_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_perfil() {
		$this->map_perfil = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_sistema() : ?int {
		return $this->id_sistema;
	}
	
	public function  getid_sistema_Descripcion() : string {
		return $this->id_sistema_Descripcion;
	}
    
	public function  getcodigo() : ?string {
		return $this->codigo;
	}
    
	public function  getnombre() : ?string {
		return $this->nombre;
	}
    
	public function  getnombre2() : ?string {
		return $this->nombre2;
	}
    
	public function  getestado() : ?bool {
		return $this->estado;
	}
	
    
	public function setid_sistema(?int $newid_sistema)
	{
		try {
			if($this->id_sistema!==$newid_sistema) {
				if($newid_sistema===null && $newid_sistema!='') {
					throw new Exception('perfil:Valor nulo no permitido en columna id_sistema');
				}

				if($newid_sistema!==null && filter_var($newid_sistema,FILTER_VALIDATE_INT)===false) {
					throw new Exception('perfil:No es numero entero - id_sistema='.$newid_sistema);
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
					throw new Exception('perfil:Valor nulo no permitido en columna id_sistema');
				}

				$this->id_sistema_Descripcion=$newid_sistema_Descripcion;
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
					throw new Exception('perfil:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>50) {
					throw new Exception('perfil:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('perfil:Formato incorrecto en columna codigo='.$newcodigo);
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
					throw new Exception('perfil:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>50) {
					throw new Exception('perfil:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('perfil:Formato incorrecto en columna nombre='.$newnombre);
				}

				$this->nombre=$newnombre;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnombre2(?string $newnombre2)
	{
		try {
			if($this->nombre2!==$newnombre2) {
				if($newnombre2===null && $newnombre2!='') {
					throw new Exception('perfil:Valor nulo no permitido en columna nombre2');
				}

				if(strlen($newnombre2)>400) {
					throw new Exception('perfil:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=400 en columna nombre2');
				}

				if(filter_var($newnombre2,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('perfil:Formato incorrecto en columna nombre2='.$newnombre2);
				}

				$this->nombre2=$newnombre2;
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
					throw new Exception('perfil:Valor nulo no permitido en columna estado');
				}

				if($newestado!==null && filter_var($newestado,FILTER_VALIDATE_BOOLEAN)===false && $newestado!==0 && $newestado!==false) {
					throw new Exception('perfil:No es valor booleano - estado='.$newestado);
				}

				$this->estado=$newestado;
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
	
	public function getperfil_accions() : array {
		return $this->perfilaccions;
	}

	public function getperfil_campos() : array {
		return $this->perfilcampos;
	}

	public function getaccions() : array {
		return $this->accions;
	}

	public function getperfil_opcions() : array {
		return $this->perfilopcions;
	}

	public function getperfil_usuarios() : array {
		return $this->perfilusuarios;
	}

	public function getcampos() : array {
		return $this->campos;
	}

	public function getusuarios() : array {
		return $this->usuarios;
	}

	public function getopcions() : array {
		return $this->opcions;
	}

	
	
	public  function  setperfil_accions(array $perfilaccions) {
		try {
			$this->perfilaccions=$perfilaccions;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setperfil_campos(array $perfilcampos) {
		try {
			$this->perfilcampos=$perfilcampos;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setaccions(array $accions) {
		try {
			$this->accions=$accions;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setperfil_opcions(array $perfilopcions) {
		try {
			$this->perfilopcions=$perfilopcions;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setperfil_usuarios(array $perfilusuarios) {
		try {
			$this->perfilusuarios=$perfilusuarios;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setcampos(array $campos) {
		try {
			$this->campos=$campos;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setusuarios(array $usuarios) {
		try {
			$this->usuarios=$usuarios;
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

	
	/*AUXILIARES*/
	public function setMap_perfilValue(string $sKey,$oValue) {
		$this->map_perfil[$sKey]=$oValue;
	}
	
	public function getMap_perfilValue(string $sKey) {
		return $this->map_perfil[$sKey];
	}
	
	public function getperfil_Original() : ?perfil {
		return $this->perfil_Original;
	}
	
	public function setperfil_Original(perfil $perfil) {
		try {
			$this->perfil_Original=$perfil;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_perfil() : array {
		return $this->map_perfil;
	}

	public function setMap_perfil(array $map_perfil) {
		$this->map_perfil = $map_perfil;
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
