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
namespace com\bydan\contabilidad\seguridad\usuario\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class usuario extends GeneralEntity {

	/*GENERAL*/
	public static string $class='usuario';
	
	/*AUXILIARES*/
	public ?usuario $usuario_Original=null;	
	public ?GeneralEntity $usuario_Additional=null;
	public array $map_usuario=array();	
		
	/*CAMPOS*/
	public string $user_name = '';
	public string $clave = '';
	public string $confirmar_clave = '';
	public string $nombre = '';
	public string $codigo_alterno = '';
	public bool $tipo = false;
	public bool $estado = false;
	
	/*FKs*/
	
	
	/*RELACIONES*/
	
	public array $historialcambioclaves = array();
	public array $resumenusuarios = array();
	public array $auditorias = array();
	public array $perfils = array();
	public ?parametro_general_usuario $parametrogeneralusuario=null;
	public array $perfilusuarios = array();
	public ?dato_general_usuario $datogeneralusuario=null;
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->usuario_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->user_name='';
 		$this->clave='';
 		$this->confirmar_clave='';
 		$this->nombre='';
 		$this->codigo_alterno='';
 		$this->tipo=false;
 		$this->estado=false;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
		}
		
		/*RELACIONES*/
		
		$this->historialcambioclaves=array();
		$this->resumenusuarios=array();
		$this->auditorias=array();
		$this->perfils=array();
		$this->perfilusuarios=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->usuario_Additional=new usuario_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_usuario() {
		$this->map_usuario = array();
	}
	
	/*CAMPOS*/
    
	public function  getuser_name() : ?string {
		return $this->user_name;
	}
    
	public function  getclave() : ?string {
		return $this->clave;
	}
    
	public function  getconfirmar_clave() : ?string {
		return $this->confirmar_clave;
	}
    
	public function  getnombre() : ?string {
		return $this->nombre;
	}
    
	public function  getcodigo_alterno() : ?string {
		return $this->codigo_alterno;
	}
    
	public function  gettipo() : ?bool {
		return $this->tipo;
	}
    
	public function  getestado() : ?bool {
		return $this->estado;
	}
	
    
	public function setuser_name(?string $newuser_name)
	{
		try {
			if($this->user_name!==$newuser_name) {
				if($newuser_name===null && $newuser_name!='') {
					throw new Exception('usuario:Valor nulo no permitido en columna user_name');
				}

				if(strlen($newuser_name)>50) {
					throw new Exception('usuario:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna user_name');
				}

				if(filter_var($newuser_name,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('usuario:Formato incorrecto en columna user_name='.$newuser_name);
				}

				$this->user_name=$newuser_name;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setclave(?string $newclave)
	{
		try {
			if($this->clave!==$newclave) {
				if($newclave===null && $newclave!='') {
					throw new Exception('usuario:Valor nulo no permitido en columna clave');
				}

				if(strlen($newclave)>500) {
					throw new Exception('usuario:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=500 en columna clave');
				}

				if(filter_var($newclave,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('usuario:Formato incorrecto en columna clave='.$newclave);
				}

				$this->clave=$newclave;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setconfirmar_clave(?string $newconfirmar_clave)
	{
		try {
			if($this->confirmar_clave!==$newconfirmar_clave) {
				if($newconfirmar_clave===null && $newconfirmar_clave!='') {
					throw new Exception('usuario:Valor nulo no permitido en columna confirmar_clave');
				}

				if(strlen($newconfirmar_clave)>500) {
					throw new Exception('usuario:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=500 en columna confirmar_clave');
				}

				if(filter_var($newconfirmar_clave,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('usuario:Formato incorrecto en columna confirmar_clave='.$newconfirmar_clave);
				}

				$this->confirmar_clave=$newconfirmar_clave;
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
					throw new Exception('usuario:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>100) {
					throw new Exception('usuario:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=100 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('usuario:Formato incorrecto en columna nombre='.$newnombre);
				}

				$this->nombre=$newnombre;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcodigo_alterno(?string $newcodigo_alterno)
	{
		try {
			if($this->codigo_alterno!==$newcodigo_alterno) {
				if($newcodigo_alterno===null && $newcodigo_alterno!='') {
					throw new Exception('usuario:Valor nulo no permitido en columna codigo_alterno');
				}

				if(strlen($newcodigo_alterno)>50) {
					throw new Exception('usuario:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna codigo_alterno');
				}

				if(filter_var($newcodigo_alterno,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('usuario:Formato incorrecto en columna codigo_alterno='.$newcodigo_alterno);
				}

				$this->codigo_alterno=$newcodigo_alterno;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function settipo(?bool $newtipo)
	{
		try {
			if($this->tipo!==$newtipo) {
				if($newtipo===null && $newtipo!='') {
					throw new Exception('usuario:Valor nulo no permitido en columna tipo');
				}

				if($newtipo!==null && filter_var($newtipo,FILTER_VALIDATE_BOOLEAN)===false && $newtipo!==0 && $newtipo!==false) {
					throw new Exception('usuario:No es valor booleano - tipo='.$newtipo);
				}

				$this->tipo=$newtipo;
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
					throw new Exception('usuario:Valor nulo no permitido en columna estado');
				}

				if($newestado!==null && filter_var($newestado,FILTER_VALIDATE_BOOLEAN)===false && $newestado!==0 && $newestado!==false) {
					throw new Exception('usuario:No es valor booleano - estado='.$newestado);
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
	
	public function gethistorial_cambio_claves() : array {
		return $this->historialcambioclaves;
	}

	public function getresumen_usuarios() : array {
		return $this->resumenusuarios;
	}

	public function getauditorias() : array {
		return $this->auditorias;
	}

	public function getperfils() : array {
		return $this->perfils;
	}

	public function getparametro_general_usuario() : parametro_general_usuario{
		return $this->parametrogeneralusuario;
	}

	public function getperfil_usuarios() : array {
		return $this->perfilusuarios;
	}

	public function getdato_general_usuario() : dato_general_usuario{
		return $this->datogeneralusuario;
	}

	
	
	public  function  sethistorial_cambio_claves(array $historialcambioclaves) {
		try {
			$this->historialcambioclaves=$historialcambioclaves;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setresumen_usuarios(array $resumenusuarios) {
		try {
			$this->resumenusuarios=$resumenusuarios;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setauditorias(array $auditorias) {
		try {
			$this->auditorias=$auditorias;
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

	public  function  setparametro_general_usuario(parametro_general_usuario $parametrogeneralusuario) {
	try {
			$this->parametrogeneralusuario=$parametrogeneralusuario;
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

	public  function  setdato_general_usuario(dato_general_usuario $datogeneralusuario) {
	try {
			$this->datogeneralusuario=$datogeneralusuario;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_usuarioValue(string $sKey,$oValue) {
		$this->map_usuario[$sKey]=$oValue;
	}
	
	public function getMap_usuarioValue(string $sKey) {
		return $this->map_usuario[$sKey];
	}
	
	public function getusuario_Original() : ?usuario {
		return $this->usuario_Original;
	}
	
	public function setusuario_Original(usuario $usuario) {
		try {
			$this->usuario_Original=$usuario;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_usuario() : array {
		return $this->map_usuario;
	}

	public function setMap_usuario(array $map_usuario) {
		$this->map_usuario = $map_usuario;
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
