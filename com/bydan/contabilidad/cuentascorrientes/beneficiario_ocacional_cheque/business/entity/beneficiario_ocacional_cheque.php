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
namespace com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class beneficiario_ocacional_cheque extends GeneralEntity {

	/*GENERAL*/
	public static string $class='beneficiario_ocacional_cheque';
	
	/*AUXILIARES*/
	public ?beneficiario_ocacional_cheque $beneficiario_ocacional_cheque_Original=null;	
	public ?GeneralEntity $beneficiario_ocacional_cheque_Additional=null;
	public array $map_beneficiario_ocacional_cheque=array();	
		
	/*CAMPOS*/
	public string $codigo = '';
	public string $nombre = '';
	public string $direccion_1 = '';
	public string $direccion_2 = '';
	public string $direccion_3 = '';
	public string $telefono = '';
	public string $telefono_movil = '';
	public string $email = '';
	public string $notas = '';
	public string $registro_ocacional = '';
	public string $registro_tributario = '';
	
	/*FKs*/
	
	
	/*RELACIONES*/
	
	public array $chequecuentacorrientes = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->beneficiario_ocacional_cheque_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->codigo='';
 		$this->nombre='';
 		$this->direccion_1='';
 		$this->direccion_2='';
 		$this->direccion_3='';
 		$this->telefono='';
 		$this->telefono_movil='';
 		$this->email='';
 		$this->notas='';
 		$this->registro_ocacional='';
 		$this->registro_tributario='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
		}
		
		/*RELACIONES*/
		
		$this->chequecuentacorrientes=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->beneficiario_ocacional_cheque_Additional=new beneficiario_ocacional_cheque_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_beneficiario_ocacional_cheque() {
		$this->map_beneficiario_ocacional_cheque = array();
	}
	
	/*CAMPOS*/
    
	public function  getcodigo() : ?string {
		return $this->codigo;
	}
    
	public function  getnombre() : ?string {
		return $this->nombre;
	}
    
	public function  getdireccion_1() : ?string {
		return $this->direccion_1;
	}
    
	public function  getdireccion_2() : ?string {
		return $this->direccion_2;
	}
    
	public function  getdireccion_3() : ?string {
		return $this->direccion_3;
	}
    
	public function  gettelefono() : ?string {
		return $this->telefono;
	}
    
	public function  gettelefono_movil() : ?string {
		return $this->telefono_movil;
	}
    
	public function  getemail() : ?string {
		return $this->email;
	}
    
	public function  getnotas() : ?string {
		return $this->notas;
	}
    
	public function  getregistro_ocacional() : ?string {
		return $this->registro_ocacional;
	}
    
	public function  getregistro_tributario() : ?string {
		return $this->registro_tributario;
	}
	
    
	public function setcodigo(?string $newcodigo)
	{
		try {
			if($this->codigo!==$newcodigo) {
				if($newcodigo===null && $newcodigo!='') {
					throw new Exception('beneficiario_ocacional_cheque:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>10) {
					throw new Exception('beneficiario_ocacional_cheque:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=10 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('beneficiario_ocacional_cheque:Formato incorrecto en columna codigo='.$newcodigo);
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
					throw new Exception('beneficiario_ocacional_cheque:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>60) {
					throw new Exception('beneficiario_ocacional_cheque:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=60 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('beneficiario_ocacional_cheque:Formato incorrecto en columna nombre='.$newnombre);
				}

				$this->nombre=$newnombre;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdireccion_1(?string $newdireccion_1)
	{
		try {
			if($this->direccion_1!==$newdireccion_1) {
				if($newdireccion_1===null && $newdireccion_1!='') {
					throw new Exception('beneficiario_ocacional_cheque:Valor nulo no permitido en columna direccion_1');
				}

				if(strlen($newdireccion_1)>60) {
					throw new Exception('beneficiario_ocacional_cheque:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=60 en columna direccion_1');
				}

				if(filter_var($newdireccion_1,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('beneficiario_ocacional_cheque:Formato incorrecto en columna direccion_1='.$newdireccion_1);
				}

				$this->direccion_1=$newdireccion_1;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdireccion_2(?string $newdireccion_2) {
		if($this->direccion_2!==$newdireccion_2) {

				if(strlen($newdireccion_2)>60) {
					try {
						throw new Exception('beneficiario_ocacional_cheque:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=direccion_2 en columna direccion_2');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newdireccion_2,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('beneficiario_ocacional_cheque:Formato incorrecto en la columna direccion_2='.$newdireccion_2);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->direccion_2=$newdireccion_2;
			$this->setIsChanged(true);
		}
	}
    
	public function setdireccion_3(?string $newdireccion_3) {
		if($this->direccion_3!==$newdireccion_3) {

				if(strlen($newdireccion_3)>60) {
					try {
						throw new Exception('beneficiario_ocacional_cheque:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=direccion_3 en columna direccion_3');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newdireccion_3,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('beneficiario_ocacional_cheque:Formato incorrecto en la columna direccion_3='.$newdireccion_3);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->direccion_3=$newdireccion_3;
			$this->setIsChanged(true);
		}
	}
    
	public function settelefono(?string $newtelefono) {
		if($this->telefono!==$newtelefono) {

				if(strlen($newtelefono)>15) {
					try {
						throw new Exception('beneficiario_ocacional_cheque:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=telefono en columna telefono');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newtelefono,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_TELEFONO_GENERAL)))===false) {
					try {
						throw new Exception('beneficiario_ocacional_cheque:Formato incorrecto en la columna telefono='.$newtelefono);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->telefono=$newtelefono;
			$this->setIsChanged(true);
		}
	}
    
	public function settelefono_movil(?string $newtelefono_movil)
	{
		try {
			if($this->telefono_movil!==$newtelefono_movil) {
				if($newtelefono_movil===null && $newtelefono_movil!='') {
					throw new Exception('beneficiario_ocacional_cheque:Valor nulo no permitido en columna telefono_movil');
				}

				if(strlen($newtelefono_movil)>20) {
					throw new Exception('beneficiario_ocacional_cheque:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=20 en columna telefono_movil');
				}

				if(filter_var($newtelefono_movil,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_TELEFONO_GENERAL)))===false) {
					throw new Exception('beneficiario_ocacional_cheque:Formato incorrecto en columna telefono_movil='.$newtelefono_movil);
				}

				$this->telefono_movil=$newtelefono_movil;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setemail(?string $newemail)
	{
		try {
			if($this->email!==$newemail) {
				if($newemail===null && $newemail!='') {
					throw new Exception('beneficiario_ocacional_cheque:Valor nulo no permitido en columna email');
				}

				if(strlen($newemail)>60) {
					throw new Exception('beneficiario_ocacional_cheque:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=60 en columna email');
				}

				if(!empty($newemail) && filter_var($newemail,FILTER_VALIDATE_EMAIL)===false) {
					throw new Exception('beneficiario_ocacional_cheque:Formato incorrecto en columna email='.$newemail);
				}

				$this->email=$newemail;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnotas(?string $newnotas) {
		if($this->notas!==$newnotas) {

				if(strlen($newnotas)>1000) {
					try {
						throw new Exception('beneficiario_ocacional_cheque:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=notas en columna notas');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newnotas,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('beneficiario_ocacional_cheque:Formato incorrecto en la columna notas='.$newnotas);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->notas=$newnotas;
			$this->setIsChanged(true);
		}
	}
    
	public function setregistro_ocacional(?string $newregistro_ocacional) {
		if($this->registro_ocacional!==$newregistro_ocacional) {

				if(strlen($newregistro_ocacional)>60) {
					try {
						throw new Exception('beneficiario_ocacional_cheque:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=registro_ocacional en columna registro_ocacional');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newregistro_ocacional,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('beneficiario_ocacional_cheque:Formato incorrecto en la columna registro_ocacional='.$newregistro_ocacional);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->registro_ocacional=$newregistro_ocacional;
			$this->setIsChanged(true);
		}
	}
    
	public function setregistro_tributario(?string $newregistro_tributario) {
		if($this->registro_tributario!==$newregistro_tributario) {

				if(strlen($newregistro_tributario)>30) {
					try {
						throw new Exception('beneficiario_ocacional_cheque:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=registro_tributario en columna registro_tributario');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newregistro_tributario,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('beneficiario_ocacional_cheque:Formato incorrecto en la columna registro_tributario='.$newregistro_tributario);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->registro_tributario=$newregistro_tributario;
			$this->setIsChanged(true);
		}
	}
	
	/*FKs*/
	
	
		
	
	/*RELACIONES*/
	
	public function getcheque_cuenta_corrientes() : array {
		return $this->chequecuentacorrientes;
	}

	
	
	public  function  setcheque_cuenta_corrientes(array $chequecuentacorrientes) {
		try {
			$this->chequecuentacorrientes=$chequecuentacorrientes;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_beneficiario_ocacional_chequeValue(string $sKey,$oValue) {
		$this->map_beneficiario_ocacional_cheque[$sKey]=$oValue;
	}
	
	public function getMap_beneficiario_ocacional_chequeValue(string $sKey) {
		return $this->map_beneficiario_ocacional_cheque[$sKey];
	}
	
	public function getbeneficiario_ocacional_cheque_Original() : ?beneficiario_ocacional_cheque {
		return $this->beneficiario_ocacional_cheque_Original;
	}
	
	public function setbeneficiario_ocacional_cheque_Original(beneficiario_ocacional_cheque $beneficiario_ocacional_cheque) {
		try {
			$this->beneficiario_ocacional_cheque_Original=$beneficiario_ocacional_cheque;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_beneficiario_ocacional_cheque() : array {
		return $this->map_beneficiario_ocacional_cheque;
	}

	public function setMap_beneficiario_ocacional_cheque(array $map_beneficiario_ocacional_cheque) {
		$this->map_beneficiario_ocacional_cheque = $map_beneficiario_ocacional_cheque;
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
