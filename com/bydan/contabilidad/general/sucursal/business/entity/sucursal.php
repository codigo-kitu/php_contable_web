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
namespace com\bydan\contabilidad\general\sucursal\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\seguridad\pais\business\entity\pais;
use com\bydan\contabilidad\seguridad\ciudad\business\entity\ciudad;

class sucursal extends GeneralEntity {

	/*GENERAL*/
	public static string $class='sucursal';
	
	/*AUXILIARES*/
	public ?sucursal $sucursal_Original=null;	
	public ?GeneralEntity $sucursal_Additional=null;
	public array $map_sucursal=array();	
		
	/*CAMPOS*/
	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public int $id_pais = -1;
	public string $id_pais_Descripcion = '';

	public int $id_ciudad = -1;
	public string $id_ciudad_Descripcion = '';

	public string $nombre = '';
	public string $registro_tributario = '';
	public string $registro_sucursalrial = '';
	public string $direccion1 = '';
	public string $direccion2 = '';
	public string $direccion3 = '';
	public string $telefono1 = '';
	public string $celular = '';
	public string $correo_electronico = '';
	public string $sitio_web = '';
	public string $codigo_postal = '';
	public string $fax = '';
	public string $barrio_distrito = '';
	public string $logo = '';
	public string $base_de_datos = '';
	public int $condicion = 0;
	public string $icono_asociado = '';
	public string $folder_sucursal = '';
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	public ?pais $pais = null;
	public ?ciudad $ciudad = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->sucursal_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->id_pais=-1;
		$this->id_pais_Descripcion='';

 		$this->id_ciudad=-1;
		$this->id_ciudad_Descripcion='';

 		$this->nombre='';
 		$this->registro_tributario='';
 		$this->registro_sucursalrial='';
 		$this->direccion1='';
 		$this->direccion2='';
 		$this->direccion3='';
 		$this->telefono1='';
 		$this->celular='';
 		$this->correo_electronico='';
 		$this->sitio_web='';
 		$this->codigo_postal='';
 		$this->fax='';
 		$this->barrio_distrito='';
 		$this->logo='';
 		$this->base_de_datos='';
 		$this->condicion=0;
 		$this->icono_asociado='';
 		$this->folder_sucursal='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
			$this->pais=new pais();
			$this->ciudad=new ciudad();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->sucursal_Additional=new sucursal_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_sucursal() {
		$this->map_sucursal = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_empresa() : ?int {
		return $this->id_empresa;
	}
	
	public function  getid_empresa_Descripcion() : string {
		return $this->id_empresa_Descripcion;
	}
    
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
    
	public function  getnombre() : ?string {
		return $this->nombre;
	}
    
	public function  getregistro_tributario() : ?string {
		return $this->registro_tributario;
	}
    
	public function  getregistro_sucursalrial() : ?string {
		return $this->registro_sucursalrial;
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
    
	public function  getcelular() : ?string {
		return $this->celular;
	}
    
	public function  getcorreo_electronico() : ?string {
		return $this->correo_electronico;
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
    
	public function  getbarrio_distrito() : ?string {
		return $this->barrio_distrito;
	}
    
	public function  getlogo() : ?string {
		return $this->logo;
	}
    
	public function  getbase_de_datos() : ?string {
		return $this->base_de_datos;
	}
    
	public function  getcondicion() : ?int {
		return $this->condicion;
	}
    
	public function  geticono_asociado() : ?string {
		return $this->icono_asociado;
	}
    
	public function  getfolder_sucursal() : ?string {
		return $this->folder_sucursal;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('sucursal:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('sucursal:No es numero entero - id_empresa='.$newid_empresa);
				}

				$this->id_empresa=$newid_empresa;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_empresa_Descripcion(string $newid_empresa_Descripcion)
	{
		try {
			if($this->id_empresa_Descripcion!=$newid_empresa_Descripcion) {
				if($newid_empresa_Descripcion===null && $newid_empresa_Descripcion!='') {
					throw new Exception('sucursal:Valor nulo no permitido en columna id_empresa');
				}

				$this->id_empresa_Descripcion=$newid_empresa_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_pais(?int $newid_pais)
	{
		try {
			if($this->id_pais!==$newid_pais) {
				if($newid_pais===null && $newid_pais!='') {
					throw new Exception('sucursal:Valor nulo no permitido en columna id_pais');
				}

				if($newid_pais!==null && filter_var($newid_pais,FILTER_VALIDATE_INT)===false) {
					throw new Exception('sucursal:No es numero entero - id_pais='.$newid_pais);
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
					throw new Exception('sucursal:Valor nulo no permitido en columna id_pais');
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
					throw new Exception('sucursal:Valor nulo no permitido en columna id_ciudad');
				}

				if($newid_ciudad!==null && filter_var($newid_ciudad,FILTER_VALIDATE_INT)===false) {
					throw new Exception('sucursal:No es numero entero - id_ciudad='.$newid_ciudad);
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
					throw new Exception('sucursal:Valor nulo no permitido en columna id_ciudad');
				}

				$this->id_ciudad_Descripcion=$newid_ciudad_Descripcion;
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
					throw new Exception('sucursal:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>80) {
					throw new Exception('sucursal:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=80 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('sucursal:Formato incorrecto en columna nombre='.$newnombre);
				}

				$this->nombre=$newnombre;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setregistro_tributario(?string $newregistro_tributario)
	{
		try {
			if($this->registro_tributario!==$newregistro_tributario) {
				if($newregistro_tributario===null && $newregistro_tributario!='') {
					throw new Exception('sucursal:Valor nulo no permitido en columna registro_tributario');
				}

				if(strlen($newregistro_tributario)>15) {
					throw new Exception('sucursal:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=15 en columna registro_tributario');
				}

				if(filter_var($newregistro_tributario,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('sucursal:Formato incorrecto en columna registro_tributario='.$newregistro_tributario);
				}

				$this->registro_tributario=$newregistro_tributario;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setregistro_sucursalrial(?string $newregistro_sucursalrial) {
		if($this->registro_sucursalrial!==$newregistro_sucursalrial) {

				if(strlen($newregistro_sucursalrial)>120) {
					try {
						throw new Exception('sucursal:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=registro_sucursalrial en columna registro_sucursalrial');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newregistro_sucursalrial,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('sucursal:Formato incorrecto en la columna registro_sucursalrial='.$newregistro_sucursalrial);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->registro_sucursalrial=$newregistro_sucursalrial;
			$this->setIsChanged(true);
		}
	}
    
	public function setdireccion1(?string $newdireccion1)
	{
		try {
			if($this->direccion1!==$newdireccion1) {
				if($newdireccion1===null && $newdireccion1!='') {
					throw new Exception('sucursal:Valor nulo no permitido en columna direccion1');
				}

				if(strlen($newdireccion1)>120) {
					throw new Exception('sucursal:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=120 en columna direccion1');
				}

				if(filter_var($newdireccion1,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('sucursal:Formato incorrecto en columna direccion1='.$newdireccion1);
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
						throw new Exception('sucursal:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=direccion2 en columna direccion2');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newdireccion2,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('sucursal:Formato incorrecto en la columna direccion2='.$newdireccion2);
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
						throw new Exception('sucursal:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=direccion3 en columna direccion3');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newdireccion3,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('sucursal:Formato incorrecto en la columna direccion3='.$newdireccion3);
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
					throw new Exception('sucursal:Valor nulo no permitido en columna telefono1');
				}

				if(strlen($newtelefono1)>40) {
					throw new Exception('sucursal:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=40 en columna telefono1');
				}

				if(filter_var($newtelefono1,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_TELEFONO_GENERAL)))===false) {
					throw new Exception('sucursal:Formato incorrecto en columna telefono1='.$newtelefono1);
				}

				$this->telefono1=$newtelefono1;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcelular(?string $newcelular) {
		if($this->celular!==$newcelular) {

				if(strlen($newcelular)>40) {
					try {
						throw new Exception('sucursal:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=celular en columna celular');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newcelular,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('sucursal:Formato incorrecto en la columna celular='.$newcelular);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->celular=$newcelular;
			$this->setIsChanged(true);
		}
	}
    
	public function setcorreo_electronico(?string $newcorreo_electronico)
	{
		try {
			if($this->correo_electronico!==$newcorreo_electronico) {
				if($newcorreo_electronico===null && $newcorreo_electronico!='') {
					throw new Exception('sucursal:Valor nulo no permitido en columna correo_electronico');
				}

				if(strlen($newcorreo_electronico)>120) {
					throw new Exception('sucursal:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=120 en columna correo_electronico');
				}

				if(filter_var($newcorreo_electronico,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('sucursal:Formato incorrecto en columna correo_electronico='.$newcorreo_electronico);
				}

				$this->correo_electronico=$newcorreo_electronico;
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
						throw new Exception('sucursal:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=sitio_web en columna sitio_web');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newsitio_web,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('sucursal:Formato incorrecto en la columna sitio_web='.$newsitio_web);
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
						throw new Exception('sucursal:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=codigo_postal en columna codigo_postal');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newcodigo_postal,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_POSTAL_GENERAL)))===false) {
					try {
						throw new Exception('sucursal:Formato incorrecto en la columna codigo_postal='.$newcodigo_postal);
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
						throw new Exception('sucursal:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=fax en columna fax');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newfax,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FAX_GENERAL)))===false) {
					try {
						throw new Exception('sucursal:Formato incorrecto en la columna fax='.$newfax);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->fax=$newfax;
			$this->setIsChanged(true);
		}
	}
    
	public function setbarrio_distrito(?string $newbarrio_distrito) {
		if($this->barrio_distrito!==$newbarrio_distrito) {

				if(strlen($newbarrio_distrito)>120) {
					try {
						throw new Exception('sucursal:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=barrio_distrito en columna barrio_distrito');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newbarrio_distrito,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('sucursal:Formato incorrecto en la columna barrio_distrito='.$newbarrio_distrito);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->barrio_distrito=$newbarrio_distrito;
			$this->setIsChanged(true);
		}
	}
    
	public function setlogo(?string $newlogo) {
		if($this->logo!==$newlogo) {

				if(strlen($newlogo)>1000) {
					try {
						throw new Exception('sucursal:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=logo en columna logo');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newlogo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('sucursal:Formato incorrecto en la columna logo='.$newlogo);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->logo=$newlogo;
			$this->setIsChanged(true);
		}
	}
    
	public function setbase_de_datos(?string $newbase_de_datos) {
		if($this->base_de_datos!==$newbase_de_datos) {

				if(strlen($newbase_de_datos)>20) {
					try {
						throw new Exception('sucursal:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=base_de_datos en columna base_de_datos');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newbase_de_datos,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('sucursal:Formato incorrecto en la columna base_de_datos='.$newbase_de_datos);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->base_de_datos=$newbase_de_datos;
			$this->setIsChanged(true);
		}
	}
    
	public function setcondicion(?int $newcondicion) {
		if($this->condicion!==$newcondicion) {

				if($newcondicion!==null && filter_var($newcondicion,FILTER_VALIDATE_INT)===false) {
					throw new Exception('sucursal:No es numero entero - condicion');
				}

			$this->condicion=$newcondicion;
			$this->setIsChanged(true);
		}
	}
    
	public function seticono_asociado(?string $newicono_asociado) {
		if($this->icono_asociado!==$newicono_asociado) {

				if(strlen($newicono_asociado)>1000) {
					try {
						throw new Exception('sucursal:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=icono_asociado en columna icono_asociado');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newicono_asociado,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('sucursal:Formato incorrecto en la columna icono_asociado='.$newicono_asociado);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->icono_asociado=$newicono_asociado;
			$this->setIsChanged(true);
		}
	}
    
	public function setfolder_sucursal(?string $newfolder_sucursal) {
		if($this->folder_sucursal!==$newfolder_sucursal) {

				if(strlen($newfolder_sucursal)>1000) {
					try {
						throw new Exception('sucursal:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=folder_sucursal en columna folder_sucursal');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newfolder_sucursal,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('sucursal:Formato incorrecto en la columna folder_sucursal='.$newfolder_sucursal);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->folder_sucursal=$newfolder_sucursal;
			$this->setIsChanged(true);
		}
	}
	
	/*FKs*/
	
	public function getempresa() : ?empresa {
		return $this->empresa;
	}

	public function getpais() : ?pais {
		return $this->pais;
	}

	public function getciudad() : ?ciudad {
		return $this->ciudad;
	}

	
	
	public  function  setempresa(?empresa $empresa) {
		try {
			$this->empresa=$empresa;
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


	public  function  setciudad(?ciudad $ciudad) {
		try {
			$this->ciudad=$ciudad;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_sucursalValue(string $sKey,$oValue) {
		$this->map_sucursal[$sKey]=$oValue;
	}
	
	public function getMap_sucursalValue(string $sKey) {
		return $this->map_sucursal[$sKey];
	}
	
	public function getsucursal_Original() : ?sucursal {
		return $this->sucursal_Original;
	}
	
	public function setsucursal_Original(sucursal $sucursal) {
		try {
			$this->sucursal_Original=$sucursal;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_sucursal() : array {
		return $this->map_sucursal;
	}

	public function setMap_sucursal(array $map_sucursal) {
		$this->map_sucursal = $map_sucursal;
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
