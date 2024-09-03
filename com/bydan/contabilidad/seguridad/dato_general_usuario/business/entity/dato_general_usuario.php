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
namespace com\bydan\contabilidad\seguridad\dato_general_usuario\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntitySinIdGenerated;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class dato_general_usuario extends GeneralEntitySinIdGenerated {

	/*GENERAL*/
	public static string $class='dato_general_usuario';
	
	/*AUXILIARES*/
	public ?dato_general_usuario $dato_general_usuario_Original=null;	
	public ?GeneralEntitySinIdGenerated $dato_general_usuario_Additional=null;
	public array $map_dato_general_usuario=array();	
		
	/*CAMPOS*/
	public int $id_pais = -1;
	public string $id_pais_Descripcion = '';

	public int $id_provincia = -1;
	public string $id_provincia_Descripcion = '';

	public int $id_ciudad = -1;
	public string $id_ciudad_Descripcion = '';

	public string $cedula = '';
	public string $apellidos = '';
	public string $nombres = '';
	public string $telefono = '';
	public string $telefono_movil = '';
	public string $e_mail = '';
	public string $url = '';
	public string $fecha_nacimiento = '';
	public string $direccion = '';
	
	/*FKs*/
	
	public ?usuario $usuario = null;
	public ?pais $pais = null;
	public ?provincia $provincia = null;
	public ?ciudad $ciudad = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(false);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->dato_general_usuario_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_pais=-1;
		$this->id_pais_Descripcion='';

 		$this->id_provincia=-1;
		$this->id_provincia_Descripcion='';

 		$this->id_ciudad=-1;
		$this->id_ciudad_Descripcion='';

 		$this->cedula='';
 		$this->apellidos='';
 		$this->nombres='';
 		$this->telefono='';
 		$this->telefono_movil='';
 		$this->e_mail='';
 		$this->url='';
 		$this->fecha_nacimiento=date('Y-m-d');
 		$this->direccion='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->usuario=new usuario();
			$this->pais=new pais();
			$this->provincia=new provincia();
			$this->ciudad=new ciudad();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->dato_general_usuario_Additional=new dato_general_usuario_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_dato_general_usuario() {
		$this->map_dato_general_usuario = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_pais() : ?int {
		return $this->id_pais;
	}
	
	public function  getid_pais_Descripcion() : string {
		return $this->id_pais_Descripcion;
	}
    
	public function  getid_provincia() : ?int {
		return $this->id_provincia;
	}
	
	public function  getid_provincia_Descripcion() : string {
		return $this->id_provincia_Descripcion;
	}
    
	public function  getid_ciudad() : ?int {
		return $this->id_ciudad;
	}
	
	public function  getid_ciudad_Descripcion() : string {
		return $this->id_ciudad_Descripcion;
	}
    
	public function  getcedula() : ?string {
		return $this->cedula;
	}
    
	public function  getapellidos() : ?string {
		return $this->apellidos;
	}
    
	public function  getnombres() : ?string {
		return $this->nombres;
	}
    
	public function  gettelefono() : ?string {
		return $this->telefono;
	}
    
	public function  gettelefono_movil() : ?string {
		return $this->telefono_movil;
	}
    
	public function  gete_mail() : ?string {
		return $this->e_mail;
	}
    
	public function  geturl() : ?string {
		return $this->url;
	}
    
	public function  getfecha_nacimiento() : ?string {
		return $this->fecha_nacimiento;
	}
    
	public function  getdireccion() : ?string {
		return $this->direccion;
	}
	
    
	public function setid_pais(?int $newid_pais)
	{
		try {
			if($this->id_pais!==$newid_pais) {
				if($newid_pais===null && $newid_pais!='') {
					throw new Exception('dato_general_usuario:Valor nulo no permitido en columna id_pais');
				}

				if($newid_pais!==null && filter_var($newid_pais,FILTER_VALIDATE_INT)===false) {
					throw new Exception('dato_general_usuario:No es numero entero - id_pais='.$newid_pais);
				}

				$this->id_pais=$newid_pais;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_pais_Descripcion(string $newid_pais_Descripcion)
	{
		try {
			if($this->id_pais_Descripcion!=$newid_pais_Descripcion) {
				if($newid_pais_Descripcion===null && $newid_pais_Descripcion!='') {
					throw new Exception('dato_general_usuario:Valor nulo no permitido en columna id_pais');
				}

				$this->id_pais_Descripcion=$newid_pais_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_provincia(?int $newid_provincia)
	{
		try {
			if($this->id_provincia!==$newid_provincia) {
				if($newid_provincia===null && $newid_provincia!='') {
					throw new Exception('dato_general_usuario:Valor nulo no permitido en columna id_provincia');
				}

				if($newid_provincia!==null && filter_var($newid_provincia,FILTER_VALIDATE_INT)===false) {
					throw new Exception('dato_general_usuario:No es numero entero - id_provincia='.$newid_provincia);
				}

				$this->id_provincia=$newid_provincia;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_provincia_Descripcion(string $newid_provincia_Descripcion)
	{
		try {
			if($this->id_provincia_Descripcion!=$newid_provincia_Descripcion) {
				if($newid_provincia_Descripcion===null && $newid_provincia_Descripcion!='') {
					throw new Exception('dato_general_usuario:Valor nulo no permitido en columna id_provincia');
				}

				$this->id_provincia_Descripcion=$newid_provincia_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_ciudad(?int $newid_ciudad)
	{
		try {
			if($this->id_ciudad!==$newid_ciudad) {
				if($newid_ciudad===null && $newid_ciudad!='') {
					throw new Exception('dato_general_usuario:Valor nulo no permitido en columna id_ciudad');
				}

				if($newid_ciudad!==null && filter_var($newid_ciudad,FILTER_VALIDATE_INT)===false) {
					throw new Exception('dato_general_usuario:No es numero entero - id_ciudad='.$newid_ciudad);
				}

				$this->id_ciudad=$newid_ciudad;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_ciudad_Descripcion(string $newid_ciudad_Descripcion)
	{
		try {
			if($this->id_ciudad_Descripcion!=$newid_ciudad_Descripcion) {
				if($newid_ciudad_Descripcion===null && $newid_ciudad_Descripcion!='') {
					throw new Exception('dato_general_usuario:Valor nulo no permitido en columna id_ciudad');
				}

				$this->id_ciudad_Descripcion=$newid_ciudad_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcedula(?string $newcedula)
	{
		try {
			if($this->cedula!==$newcedula) {
				if($newcedula===null && $newcedula!='') {
					throw new Exception('dato_general_usuario:Valor nulo no permitido en columna cedula');
				}

				if(strlen($newcedula)>20) {
					throw new Exception('dato_general_usuario:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=20 en columna cedula');
				}

				if(filter_var($newcedula,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('dato_general_usuario:Formato incorrecto en columna cedula='.$newcedula);
				}

				$this->cedula=$newcedula;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setapellidos(?string $newapellidos)
	{
		try {
			if($this->apellidos!==$newapellidos) {
				if($newapellidos===null && $newapellidos!='') {
					throw new Exception('dato_general_usuario:Valor nulo no permitido en columna apellidos');
				}

				if(strlen($newapellidos)>200) {
					throw new Exception('dato_general_usuario:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=200 en columna apellidos');
				}

				if(filter_var($newapellidos,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('dato_general_usuario:Formato incorrecto en columna apellidos='.$newapellidos);
				}

				$this->apellidos=$newapellidos;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnombres(?string $newnombres)
	{
		try {
			if($this->nombres!==$newnombres) {
				if($newnombres===null && $newnombres!='') {
					throw new Exception('dato_general_usuario:Valor nulo no permitido en columna nombres');
				}

				if(strlen($newnombres)>200) {
					throw new Exception('dato_general_usuario:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=200 en columna nombres');
				}

				if(filter_var($newnombres,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('dato_general_usuario:Formato incorrecto en columna nombres='.$newnombres);
				}

				$this->nombres=$newnombres;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function settelefono(?string $newtelefono)
	{
		try {
			if($this->telefono!==$newtelefono) {
				if($newtelefono===null && $newtelefono!='') {
					throw new Exception('dato_general_usuario:Valor nulo no permitido en columna telefono');
				}

				if(strlen($newtelefono)>200) {
					throw new Exception('dato_general_usuario:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=200 en columna telefono');
				}

				if(filter_var($newtelefono,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_TELEFONO_GENERAL)))===false) {
					throw new Exception('dato_general_usuario:Formato incorrecto en columna telefono='.$newtelefono);
				}

				$this->telefono=$newtelefono;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function settelefono_movil(?string $newtelefono_movil)
	{
		try {
			if($this->telefono_movil!==$newtelefono_movil) {
				if($newtelefono_movil===null && $newtelefono_movil!='') {
					throw new Exception('dato_general_usuario:Valor nulo no permitido en columna telefono_movil');
				}

				if(strlen($newtelefono_movil)>200) {
					throw new Exception('dato_general_usuario:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=200 en columna telefono_movil');
				}

				if(filter_var($newtelefono_movil,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_TELEFONO_GENERAL)))===false) {
					throw new Exception('dato_general_usuario:Formato incorrecto en columna telefono_movil='.$newtelefono_movil);
				}

				$this->telefono_movil=$newtelefono_movil;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function sete_mail(?string $newe_mail)
	{
		try {
			if($this->e_mail!==$newe_mail) {
				if($newe_mail===null && $newe_mail!='') {
					throw new Exception('dato_general_usuario:Valor nulo no permitido en columna e_mail');
				}

				if(strlen($newe_mail)>200) {
					throw new Exception('dato_general_usuario:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=200 en columna e_mail');
				}

				if(!empty($newe_mail) && filter_var($newe_mail,FILTER_VALIDATE_EMAIL)===false) {
					throw new Exception('dato_general_usuario:Formato incorrecto en columna e_mail='.$newe_mail);
				}

				$this->e_mail=$newe_mail;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function seturl(?string $newurl)
	{
		try {
			if($this->url!==$newurl) {
				if($newurl===null && $newurl!='') {
					throw new Exception('dato_general_usuario:Valor nulo no permitido en columna url');
				}

				if(strlen($newurl)>200) {
					throw new Exception('dato_general_usuario:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=200 en columna url');
				}

				if(filter_var($newurl,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('dato_general_usuario:Formato incorrecto en columna url='.$newurl);
				}

				$this->url=$newurl;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setfecha_nacimiento(?string $newfecha_nacimiento)
	{
		try {
			if($this->fecha_nacimiento!==$newfecha_nacimiento) {
				if($newfecha_nacimiento===null && $newfecha_nacimiento!='') {
					throw new Exception('dato_general_usuario:Valor nulo no permitido en columna fecha_nacimiento');
				}

				if($newfecha_nacimiento!==null && filter_var($newfecha_nacimiento,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('dato_general_usuario:No es fecha - fecha_nacimiento='.$newfecha_nacimiento);
				}

				$this->fecha_nacimiento=$newfecha_nacimiento;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdireccion(?string $newdireccion)
	{
		try {
			if($this->direccion!==$newdireccion) {
				if($newdireccion===null && $newdireccion!='') {
					throw new Exception('dato_general_usuario:Valor nulo no permitido en columna direccion');
				}

				if(strlen($newdireccion)>250) {
					throw new Exception('dato_general_usuario:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=250 en columna direccion');
				}

				if(filter_var($newdireccion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('dato_general_usuario:Formato incorrecto en columna direccion='.$newdireccion);
				}

				$this->direccion=$newdireccion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	public function getusuario() : ?usuario {
		return $this->usuario;
	}

	public function getpais() : ?pais {
		return $this->pais;
	}

	public function getprovincia() : ?provincia {
		return $this->provincia;
	}

	public function getciudad() : ?ciudad {
		return $this->ciudad;
	}

	
	
	public  function  setusuario(?usuario $usuario) {
		try {
			$this->usuario=$usuario;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setpais(?pais $pais) {
		try {
			$this->pais=$pais;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setprovincia(?provincia $provincia) {
		try {
			$this->provincia=$provincia;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setciudad(?ciudad $ciudad) {
		try {
			$this->ciudad=$ciudad;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_dato_general_usuarioValue(string $sKey,$oValue) {
		$this->map_dato_general_usuario[$sKey]=$oValue;
	}
	
	public function getMap_dato_general_usuarioValue(string $sKey) {
		return $this->map_dato_general_usuario[$sKey];
	}
	
	public function getdato_general_usuario_Original() : ?dato_general_usuario {
		return $this->dato_general_usuario_Original;
	}
	
	public function setdato_general_usuario_Original(dato_general_usuario $dato_general_usuario) {
		try {
			$this->dato_general_usuario_Original=$dato_general_usuario;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_dato_general_usuario() : array {
		return $this->map_dato_general_usuario;
	}

	public function setMap_dato_general_usuario(array $map_dato_general_usuario) {
		$this->map_dato_general_usuario = $map_dato_general_usuario;
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
