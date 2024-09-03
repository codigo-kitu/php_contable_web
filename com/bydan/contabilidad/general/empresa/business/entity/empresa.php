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
namespace com\bydan\contabilidad\general\empresa\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\seguridad\pais\business\entity\pais;
use com\bydan\contabilidad\seguridad\ciudad\business\entity\ciudad;

class empresa extends GeneralEntity {

	/*GENERAL*/
	public static string $class='empresa';
	
	/*AUXILIARES*/
	public ?empresa $empresa_Original=null;	
	public ?GeneralEntity $empresa_Additional=null;
	public array $map_empresa=array();	
		
	/*CAMPOS*/
	public int $id_pais = -1;
	public string $id_pais_Descripcion = '';

	public int $id_ciudad = -1;
	public string $id_ciudad_Descripcion = '';

	public string $ruc = '';
	public string $nombre = '';
	public string $nombre_comercial = '';
	public string $sector = '';
	public string $direccion1 = '';
	public string $direccion2 = '';
	public string $direccion3 = '';
	public string $telefono1 = '';
	public string $movil = '';
	public string $mail = '';
	public string $sitio_web = '';
	public string $codigo_postal = '';
	public string $fax = '';
	public string $logo = '';
	public string $icono = '';
	
	/*FKs*/
	
	public ?pais $pais = null;
	public ?ciudad $ciudad = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->empresa_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_pais=-1;
		$this->id_pais_Descripcion='';

 		$this->id_ciudad=-1;
		$this->id_ciudad_Descripcion='';

 		$this->ruc='';
 		$this->nombre='';
 		$this->nombre_comercial='';
 		$this->sector='';
 		$this->direccion1='';
 		$this->direccion2='';
 		$this->direccion3='';
 		$this->telefono1='';
 		$this->movil='';
 		$this->mail='';
 		$this->sitio_web='';
 		$this->codigo_postal='';
 		$this->fax='';
 		$this->logo='';
 		$this->icono='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->pais=new pais();
			$this->ciudad=new ciudad();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->empresa_Additional=new empresa_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_empresa() {
		$this->map_empresa = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_pais() : ?int {
		return $this->id_pais;
	}
	
	public function  getid_pais_Descripcion() : string {
		return $this->id_pais_Descripcion;
	}
    
	public function  getid_ciudad() : ?int {
		return $this->id_ciudad;
	}
	
	public function  getid_ciudad_Descripcion() : string {
		return $this->id_ciudad_Descripcion;
	}
    
	public function  getruc() : ?string {
		return $this->ruc;
	}
    
	public function  getnombre() : ?string {
		return $this->nombre;
	}
    
	public function  getnombre_comercial() : ?string {
		return $this->nombre_comercial;
	}
    
	public function  getsector() : ?string {
		return $this->sector;
	}
    
	public function  getdireccion1() : ?string {
		return $this->direccion1;
	}
    
	public function  getdireccion2() : ?string {
		return $this->direccion2;
	}
    
	public function  getdireccion3() : ?string {
		return $this->direccion3;
	}
    
	public function  gettelefono1() : ?string {
		return $this->telefono1;
	}
    
	public function  getmovil() : ?string {
		return $this->movil;
	}
    
	public function  getmail() : ?string {
		return $this->mail;
	}
    
	public function  getsitio_web() : ?string {
		return $this->sitio_web;
	}
    
	public function  getcodigo_postal() : ?string {
		return $this->codigo_postal;
	}
    
	public function  getfax() : ?string {
		return $this->fax;
	}
    
	public function  getlogo() : ?string {
		return $this->logo;
	}
    
	public function  geticono() : ?string {
		return $this->icono;
	}
	
    
	public function setid_pais(?int $newid_pais)
	{
		try {
			if($this->id_pais!==$newid_pais) {
				if($newid_pais===null && $newid_pais!='') {
					throw new Exception('empresa:Valor nulo no permitido en columna id_pais');
				}

				if($newid_pais!==null && filter_var($newid_pais,FILTER_VALIDATE_INT)===false) {
					throw new Exception('empresa:No es numero entero - id_pais='.$newid_pais);
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
					throw new Exception('empresa:Valor nulo no permitido en columna id_pais');
				}

				$this->id_pais_Descripcion=$newid_pais_Descripcion;
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
					throw new Exception('empresa:Valor nulo no permitido en columna id_ciudad');
				}

				if($newid_ciudad!==null && filter_var($newid_ciudad,FILTER_VALIDATE_INT)===false) {
					throw new Exception('empresa:No es numero entero - id_ciudad='.$newid_ciudad);
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
					throw new Exception('empresa:Valor nulo no permitido en columna id_ciudad');
				}

				$this->id_ciudad_Descripcion=$newid_ciudad_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setruc(?string $newruc)
	{
		try {
			if($this->ruc!==$newruc) {
				if($newruc===null && $newruc!='') {
					throw new Exception('empresa:Valor nulo no permitido en columna ruc');
				}

				if(strlen($newruc)>15) {
					throw new Exception('empresa:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=15 en columna ruc');
				}

				if(filter_var($newruc,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_DIGITS_GENERAL)))===false) {
					throw new Exception('empresa:Formato incorrecto en columna ruc='.$newruc);
				}

				$this->ruc=$newruc;
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
					throw new Exception('empresa:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>80) {
					throw new Exception('empresa:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=80 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('empresa:Formato incorrecto en columna nombre='.$newnombre);
				}

				$this->nombre=$newnombre;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnombre_comercial(?string $newnombre_comercial) {
		if($this->nombre_comercial!==$newnombre_comercial) {

				if(strlen($newnombre_comercial)>120) {
					try {
						throw new Exception('empresa:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=nombre_comercial en columna nombre_comercial');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newnombre_comercial,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('empresa:Formato incorrecto en la columna nombre_comercial='.$newnombre_comercial);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->nombre_comercial=$newnombre_comercial;
			$this->setIsChanged(true);
		}
	}
    
	public function setsector(?string $newsector) {
		if($this->sector!==$newsector) {

				if(strlen($newsector)>120) {
					try {
						throw new Exception('empresa:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=sector en columna sector');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newsector,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('empresa:Formato incorrecto en la columna sector='.$newsector);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->sector=$newsector;
			$this->setIsChanged(true);
		}
	}
    
	public function setdireccion1(?string $newdireccion1)
	{
		try {
			if($this->direccion1!==$newdireccion1) {
				if($newdireccion1===null && $newdireccion1!='') {
					throw new Exception('empresa:Valor nulo no permitido en columna direccion1');
				}

				if(strlen($newdireccion1)>120) {
					throw new Exception('empresa:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=120 en columna direccion1');
				}

				if(filter_var($newdireccion1,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('empresa:Formato incorrecto en columna direccion1='.$newdireccion1);
				}

				$this->direccion1=$newdireccion1;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdireccion2(?string $newdireccion2) {
		if($this->direccion2!==$newdireccion2) {

				if(strlen($newdireccion2)>120) {
					try {
						throw new Exception('empresa:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=direccion2 en columna direccion2');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newdireccion2,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('empresa:Formato incorrecto en la columna direccion2='.$newdireccion2);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->direccion2=$newdireccion2;
			$this->setIsChanged(true);
		}
	}
    
	public function setdireccion3(?string $newdireccion3) {
		if($this->direccion3!==$newdireccion3) {

				if(strlen($newdireccion3)>120) {
					try {
						throw new Exception('empresa:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=direccion3 en columna direccion3');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newdireccion3,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('empresa:Formato incorrecto en la columna direccion3='.$newdireccion3);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->direccion3=$newdireccion3;
			$this->setIsChanged(true);
		}
	}
    
	public function settelefono1(?string $newtelefono1)
	{
		try {
			if($this->telefono1!==$newtelefono1) {
				if($newtelefono1===null && $newtelefono1!='') {
					throw new Exception('empresa:Valor nulo no permitido en columna telefono1');
				}

				if(strlen($newtelefono1)>40) {
					throw new Exception('empresa:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=40 en columna telefono1');
				}

				if(filter_var($newtelefono1,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_TELEFONO_GENERAL)))===false) {
					throw new Exception('empresa:Formato incorrecto en columna telefono1='.$newtelefono1);
				}

				$this->telefono1=$newtelefono1;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setmovil(?string $newmovil) {
		if($this->movil!==$newmovil) {

				if(strlen($newmovil)>40) {
					try {
						throw new Exception('empresa:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=movil en columna movil');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newmovil,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_TELEFONO_GENERAL)))===false) {
					try {
						throw new Exception('empresa:Formato incorrecto en la columna movil='.$newmovil);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->movil=$newmovil;
			$this->setIsChanged(true);
		}
	}
    
	public function setmail(?string $newmail)
	{
		try {
			if($this->mail!==$newmail) {
				if($newmail===null && $newmail!='') {
					throw new Exception('empresa:Valor nulo no permitido en columna mail');
				}

				if(strlen($newmail)>120) {
					throw new Exception('empresa:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=120 en columna mail');
				}

				if(!empty($newmail) && filter_var($newmail,FILTER_VALIDATE_EMAIL)===false) {
					throw new Exception('empresa:Formato incorrecto en columna mail='.$newmail);
				}

				$this->mail=$newmail;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setsitio_web(?string $newsitio_web) {
		if($this->sitio_web!==$newsitio_web) {

				if(strlen($newsitio_web)>120) {
					try {
						throw new Exception('empresa:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=sitio_web en columna sitio_web');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newsitio_web,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('empresa:Formato incorrecto en la columna sitio_web='.$newsitio_web);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->sitio_web=$newsitio_web;
			$this->setIsChanged(true);
		}
	}
    
	public function setcodigo_postal(?string $newcodigo_postal) {
		if($this->codigo_postal!==$newcodigo_postal) {

				if(strlen($newcodigo_postal)>40) {
					try {
						throw new Exception('empresa:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=codigo_postal en columna codigo_postal');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newcodigo_postal,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_POSTAL_GENERAL)))===false) {
					try {
						throw new Exception('empresa:Formato incorrecto en la columna codigo_postal='.$newcodigo_postal);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->codigo_postal=$newcodigo_postal;
			$this->setIsChanged(true);
		}
	}
    
	public function setfax(?string $newfax) {
		if($this->fax!==$newfax) {

				if(strlen($newfax)>40) {
					try {
						throw new Exception('empresa:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=fax en columna fax');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newfax,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FAX_GENERAL)))===false) {
					try {
						throw new Exception('empresa:Formato incorrecto en la columna fax='.$newfax);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->fax=$newfax;
			$this->setIsChanged(true);
		}
	}
    
	public function setlogo(?string $newlogo) {
		if($this->logo!==$newlogo) {

				if(strlen($newlogo)>1000) {
					try {
						throw new Exception('empresa:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=logo en columna logo');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newlogo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('empresa:Formato incorrecto en la columna logo='.$newlogo);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->logo=$newlogo;
			$this->setIsChanged(true);
		}
	}
    
	public function seticono(?string $newicono) {
		if($this->icono!==$newicono) {

				if(strlen($newicono)>1000) {
					try {
						throw new Exception('empresa:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=icono en columna icono');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newicono,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('empresa:Formato incorrecto en la columna icono='.$newicono);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->icono=$newicono;
			$this->setIsChanged(true);
		}
	}
	
	/*FKs*/
	
	public function getpais() : ?pais {
		return $this->pais;
	}

	public function getciudad() : ?ciudad {
		return $this->ciudad;
	}

	
	
	public  function  setpais(?pais $pais) {
		try {
			$this->pais=$pais;
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
	public function setMap_empresaValue(string $sKey,$oValue) {
		$this->map_empresa[$sKey]=$oValue;
	}
	
	public function getMap_empresaValue(string $sKey) {
		return $this->map_empresa[$sKey];
	}
	
	public function getempresa_Original() : ?empresa {
		return $this->empresa_Original;
	}
	
	public function setempresa_Original(empresa $empresa) {
		try {
			$this->empresa_Original=$empresa;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_empresa() : array {
		return $this->map_empresa;
	}

	public function setMap_empresa(array $map_empresa) {
		$this->map_empresa = $map_empresa;
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
