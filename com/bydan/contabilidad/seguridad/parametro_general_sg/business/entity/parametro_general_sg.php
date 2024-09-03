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
namespace com\bydan\contabilidad\seguridad\parametro_general_sg\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class parametro_general_sg extends GeneralEntity {

	/*GENERAL*/
	public static string $class='parametro_general_sg';
	
	/*AUXILIARES*/
	public ?parametro_general_sg $parametro_general_sg_Original=null;	
	public ?GeneralEntity $parametro_general_sg_Additional=null;
	public array $map_parametro_general_sg=array();	
		
	/*CAMPOS*/
	public string $nombre_sistema = '';
	public string $nombre_simple_sistema = '';
	public string $nombre_empresa = '';
	public float $version_sistema = 0.0;
	public string $siglas_sistema = '';
	public string $mail_sistema = '';
	public string $telefono_sistema = '';
	public string $fax_sistema = '';
	public string $representante_nombre = '';
	public string $codigo_proceso_actualizacion = '';
	public bool $esta_activo = false;
	
	/*FKs*/
	
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->parametro_general_sg_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->nombre_sistema='';
 		$this->nombre_simple_sistema='';
 		$this->nombre_empresa='';
 		$this->version_sistema=0.0;
 		$this->siglas_sistema='';
 		$this->mail_sistema='';
 		$this->telefono_sistema='';
 		$this->fax_sistema='';
 		$this->representante_nombre='';
 		$this->codigo_proceso_actualizacion='';
 		$this->esta_activo=false;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->parametro_general_sg_Additional=new parametro_general_sg_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_parametro_general_sg() {
		$this->map_parametro_general_sg = array();
	}
	
	/*CAMPOS*/
    
	public function  getnombre_sistema() : ?string {
		return $this->nombre_sistema;
	}
    
	public function  getnombre_simple_sistema() : ?string {
		return $this->nombre_simple_sistema;
	}
    
	public function  getnombre_empresa() : ?string {
		return $this->nombre_empresa;
	}
    
	public function  getversion_sistema() : ?float {
		return $this->version_sistema;
	}
    
	public function  getsiglas_sistema() : ?string {
		return $this->siglas_sistema;
	}
    
	public function  getmail_sistema() : ?string {
		return $this->mail_sistema;
	}
    
	public function  gettelefono_sistema() : ?string {
		return $this->telefono_sistema;
	}
    
	public function  getfax_sistema() : ?string {
		return $this->fax_sistema;
	}
    
	public function  getrepresentante_nombre() : ?string {
		return $this->representante_nombre;
	}
    
	public function  getcodigo_proceso_actualizacion() : ?string {
		return $this->codigo_proceso_actualizacion;
	}
    
	public function  getesta_activo() : ?bool {
		return $this->esta_activo;
	}
	
    
	public function setnombre_sistema(?string $newnombre_sistema)
	{
		try {
			if($this->nombre_sistema!==$newnombre_sistema) {
				if($newnombre_sistema===null && $newnombre_sistema!='') {
					throw new Exception('parametro_general_sg:Valor nulo no permitido en columna nombre_sistema');
				}

				if(strlen($newnombre_sistema)>150) {
					throw new Exception('parametro_general_sg:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=150 en columna nombre_sistema');
				}

				if(filter_var($newnombre_sistema,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('parametro_general_sg:Formato incorrecto en columna nombre_sistema='.$newnombre_sistema);
				}

				$this->nombre_sistema=$newnombre_sistema;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnombre_simple_sistema(?string $newnombre_simple_sistema)
	{
		try {
			if($this->nombre_simple_sistema!==$newnombre_simple_sistema) {
				if($newnombre_simple_sistema===null && $newnombre_simple_sistema!='') {
					throw new Exception('parametro_general_sg:Valor nulo no permitido en columna nombre_simple_sistema');
				}

				if(strlen($newnombre_simple_sistema)>150) {
					throw new Exception('parametro_general_sg:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=150 en columna nombre_simple_sistema');
				}

				if(filter_var($newnombre_simple_sistema,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('parametro_general_sg:Formato incorrecto en columna nombre_simple_sistema='.$newnombre_simple_sistema);
				}

				$this->nombre_simple_sistema=$newnombre_simple_sistema;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnombre_empresa(?string $newnombre_empresa)
	{
		try {
			if($this->nombre_empresa!==$newnombre_empresa) {
				if($newnombre_empresa===null && $newnombre_empresa!='') {
					throw new Exception('parametro_general_sg:Valor nulo no permitido en columna nombre_empresa');
				}

				if(strlen($newnombre_empresa)>150) {
					throw new Exception('parametro_general_sg:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=150 en columna nombre_empresa');
				}

				if(filter_var($newnombre_empresa,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('parametro_general_sg:Formato incorrecto en columna nombre_empresa='.$newnombre_empresa);
				}

				$this->nombre_empresa=$newnombre_empresa;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setversion_sistema(?float $newversion_sistema)
	{
		try {
			if($this->version_sistema!==$newversion_sistema) {
				if($newversion_sistema===null && $newversion_sistema!='') {
					throw new Exception('parametro_general_sg:Valor nulo no permitido en columna version_sistema');
				}

				if($newversion_sistema!=0) {
					if($newversion_sistema!==null && filter_var($newversion_sistema,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('parametro_general_sg:No es numero decimal - version_sistema='.$newversion_sistema);
					}
				}

				$this->version_sistema=$newversion_sistema;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setsiglas_sistema(?string $newsiglas_sistema)
	{
		try {
			if($this->siglas_sistema!==$newsiglas_sistema) {
				if($newsiglas_sistema===null && $newsiglas_sistema!='') {
					throw new Exception('parametro_general_sg:Valor nulo no permitido en columna siglas_sistema');
				}

				if(strlen($newsiglas_sistema)>15) {
					throw new Exception('parametro_general_sg:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=15 en columna siglas_sistema');
				}

				if(filter_var($newsiglas_sistema,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('parametro_general_sg:Formato incorrecto en columna siglas_sistema='.$newsiglas_sistema);
				}

				$this->siglas_sistema=$newsiglas_sistema;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setmail_sistema(?string $newmail_sistema) {
		if($this->mail_sistema!==$newmail_sistema) {

				if(strlen($newmail_sistema)>100) {
					try {
						throw new Exception('parametro_general_sg:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=mail_sistema en columna mail_sistema');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(!empty($newmail_sistema) && filter_var($newmail_sistema,FILTER_VALIDATE_EMAIL)===false) {
					try {
						throw new Exception('parametro_general_sg:Formato incorrecto en la columna mail_sistema='.$newmail_sistema);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->mail_sistema=$newmail_sistema;
			$this->setIsChanged(true);
		}
	}
    
	public function settelefono_sistema(?string $newtelefono_sistema) {
		if($this->telefono_sistema!==$newtelefono_sistema) {

				if(strlen($newtelefono_sistema)>50) {
					try {
						throw new Exception('parametro_general_sg:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=telefono_sistema en columna telefono_sistema');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newtelefono_sistema,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_TELEFONO_GENERAL)))===false) {
					try {
						throw new Exception('parametro_general_sg:Formato incorrecto en la columna telefono_sistema='.$newtelefono_sistema);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->telefono_sistema=$newtelefono_sistema;
			$this->setIsChanged(true);
		}
	}
    
	public function setfax_sistema(?string $newfax_sistema) {
		if($this->fax_sistema!==$newfax_sistema) {

				if(strlen($newfax_sistema)>50) {
					try {
						throw new Exception('parametro_general_sg:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=fax_sistema en columna fax_sistema');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newfax_sistema,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FAX_GENERAL)))===false) {
					try {
						throw new Exception('parametro_general_sg:Formato incorrecto en la columna fax_sistema='.$newfax_sistema);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->fax_sistema=$newfax_sistema;
			$this->setIsChanged(true);
		}
	}
    
	public function setrepresentante_nombre(?string $newrepresentante_nombre) {
		if($this->representante_nombre!==$newrepresentante_nombre) {

				if(strlen($newrepresentante_nombre)>150) {
					try {
						throw new Exception('parametro_general_sg:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=representante_nombre en columna representante_nombre');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newrepresentante_nombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('parametro_general_sg:Formato incorrecto en la columna representante_nombre='.$newrepresentante_nombre);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->representante_nombre=$newrepresentante_nombre;
			$this->setIsChanged(true);
		}
	}
    
	public function setcodigo_proceso_actualizacion(?string $newcodigo_proceso_actualizacion)
	{
		try {
			if($this->codigo_proceso_actualizacion!==$newcodigo_proceso_actualizacion) {
				if($newcodigo_proceso_actualizacion===null && $newcodigo_proceso_actualizacion!='') {
					throw new Exception('parametro_general_sg:Valor nulo no permitido en columna codigo_proceso_actualizacion');
				}

				if(strlen($newcodigo_proceso_actualizacion)>50) {
					throw new Exception('parametro_general_sg:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna codigo_proceso_actualizacion');
				}

				if(filter_var($newcodigo_proceso_actualizacion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('parametro_general_sg:Formato incorrecto en columna codigo_proceso_actualizacion='.$newcodigo_proceso_actualizacion);
				}

				$this->codigo_proceso_actualizacion=$newcodigo_proceso_actualizacion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setesta_activo(?bool $newesta_activo)
	{
		try {
			if($this->esta_activo!==$newesta_activo) {
				if($newesta_activo===null && $newesta_activo!='') {
					throw new Exception('parametro_general_sg:Valor nulo no permitido en columna esta_activo');
				}

				if($newesta_activo!==null && filter_var($newesta_activo,FILTER_VALIDATE_BOOLEAN)===false && $newesta_activo!==0 && $newesta_activo!==false) {
					throw new Exception('parametro_general_sg:No es valor booleano - esta_activo='.$newesta_activo);
				}

				$this->esta_activo=$newesta_activo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	
		
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_parametro_general_sgValue(string $sKey,$oValue) {
		$this->map_parametro_general_sg[$sKey]=$oValue;
	}
	
	public function getMap_parametro_general_sgValue(string $sKey) {
		return $this->map_parametro_general_sg[$sKey];
	}
	
	public function getparametro_general_sg_Original() : ?parametro_general_sg {
		return $this->parametro_general_sg_Original;
	}
	
	public function setparametro_general_sg_Original(parametro_general_sg $parametro_general_sg) {
		try {
			$this->parametro_general_sg_Original=$parametro_general_sg;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_parametro_general_sg() : array {
		return $this->map_parametro_general_sg;
	}

	public function setMap_parametro_general_sg(array $map_parametro_general_sg) {
		$this->map_parametro_general_sg = $map_parametro_general_sg;
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
