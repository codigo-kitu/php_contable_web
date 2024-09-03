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
namespace com\bydan\contabilidad\seguridad\auditoria\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class auditoria extends GeneralEntity {

	/*GENERAL*/
	public static string $class='auditoria';
	
	/*AUXILIARES*/
	public ?auditoria $auditoria_Original=null;	
	public ?GeneralEntity $auditoria_Additional=null;
	public array $map_auditoria=array();	
		
	/*CAMPOS*/
	public int $id_usuario = -1;
	public string $id_usuario_Descripcion = '';

	public string $nombre_tabla = '';
	public int $id_fila = 0;
	public string $accion = '';
	public string $proceso = '';
	public string $nombre_pc = '';
	public string $ip_pc = '';
	public string $usuario_pc = '';
	public string $fecha_hora = '';
	public string $observacion = '';
	
	/*FKs*/
	
	public ?usuario $usuario = null;
	
	/*RELACIONES*/
	
	public array $auditoriadetalles = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->auditoria_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_usuario=-1;
		$this->id_usuario_Descripcion='';

 		$this->nombre_tabla='';
 		$this->id_fila=0;
 		$this->accion='';
 		$this->proceso='';
 		$this->nombre_pc='';
 		$this->ip_pc='';
 		$this->usuario_pc='';
 		$this->fecha_hora=date('Y-m-d');
 		$this->observacion='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->usuario=new usuario();
		}
		
		/*RELACIONES*/
		
		$this->auditoriadetalles=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->auditoria_Additional=new auditoria_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_auditoria() {
		$this->map_auditoria = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_usuario() : ?int {
		return $this->id_usuario;
	}
	
	public function  getid_usuario_Descripcion() : string {
		return $this->id_usuario_Descripcion;
	}
    
	public function  getnombre_tabla() : ?string {
		return $this->nombre_tabla;
	}
    
	public function  getid_fila() : ?int {
		return $this->id_fila;
	}
    
	public function  getaccion() : ?string {
		return $this->accion;
	}
    
	public function  getproceso() : ?string {
		return $this->proceso;
	}
    
	public function  getnombre_pc() : ?string {
		return $this->nombre_pc;
	}
    
	public function  getip_pc() : ?string {
		return $this->ip_pc;
	}
    
	public function  getusuario_pc() : ?string {
		return $this->usuario_pc;
	}
    
	public function  getfecha_hora() : ?string {
		return $this->fecha_hora;
	}
    
	public function  getobservacion() : ?string {
		return $this->observacion;
	}
	
    
	public function setid_usuario(?int $newid_usuario)
	{
		try {
			if($this->id_usuario!==$newid_usuario) {
				if($newid_usuario===null && $newid_usuario!='') {
					throw new Exception('auditoria:Valor nulo no permitido en columna id_usuario');
				}

				if($newid_usuario!==null && filter_var($newid_usuario,FILTER_VALIDATE_INT)===false) {
					throw new Exception('auditoria:No es numero entero - id_usuario='.$newid_usuario);
				}

				$this->id_usuario=$newid_usuario;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_usuario_Descripcion(string $newid_usuario_Descripcion)
	{
		try {
			if($this->id_usuario_Descripcion!=$newid_usuario_Descripcion) {
				if($newid_usuario_Descripcion===null && $newid_usuario_Descripcion!='') {
					throw new Exception('auditoria:Valor nulo no permitido en columna id_usuario');
				}

				$this->id_usuario_Descripcion=$newid_usuario_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnombre_tabla(?string $newnombre_tabla)
	{
		try {
			if($this->nombre_tabla!==$newnombre_tabla) {
				if($newnombre_tabla===null && $newnombre_tabla!='') {
					throw new Exception('auditoria:Valor nulo no permitido en columna nombre_tabla');
				}

				if(strlen($newnombre_tabla)>150) {
					throw new Exception('auditoria:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=150 en columna nombre_tabla');
				}

				if(filter_var($newnombre_tabla,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('auditoria:Formato incorrecto en columna nombre_tabla='.$newnombre_tabla);
				}

				$this->nombre_tabla=$newnombre_tabla;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_fila(?int $newid_fila)
	{
		try {
			if($this->id_fila!==$newid_fila) {
				if($newid_fila===null && $newid_fila!='') {
					throw new Exception('auditoria:Valor nulo no permitido en columna id_fila');
				}

				if($newid_fila!==null && filter_var($newid_fila,FILTER_VALIDATE_INT)===false) {
					throw new Exception('auditoria:No es numero entero - id_fila='.$newid_fila);
				}

				$this->id_fila=$newid_fila;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setaccion(?string $newaccion)
	{
		try {
			if($this->accion!==$newaccion) {
				if($newaccion===null && $newaccion!='') {
					throw new Exception('auditoria:Valor nulo no permitido en columna accion');
				}

				if(strlen($newaccion)>15) {
					throw new Exception('auditoria:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=15 en columna accion');
				}

				if(filter_var($newaccion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('auditoria:Formato incorrecto en columna accion='.$newaccion);
				}

				$this->accion=$newaccion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setproceso(?string $newproceso)
	{
		try {
			if($this->proceso!==$newproceso) {
				if($newproceso===null && $newproceso!='') {
					throw new Exception('auditoria:Valor nulo no permitido en columna proceso');
				}

				if(strlen($newproceso)>150) {
					throw new Exception('auditoria:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=150 en columna proceso');
				}

				if(filter_var($newproceso,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('auditoria:Formato incorrecto en columna proceso='.$newproceso);
				}

				$this->proceso=$newproceso;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnombre_pc(?string $newnombre_pc)
	{
		try {
			if($this->nombre_pc!==$newnombre_pc) {
				if($newnombre_pc===null && $newnombre_pc!='') {
					throw new Exception('auditoria:Valor nulo no permitido en columna nombre_pc');
				}

				if(strlen($newnombre_pc)>50) {
					throw new Exception('auditoria:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna nombre_pc');
				}

				if(filter_var($newnombre_pc,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('auditoria:Formato incorrecto en columna nombre_pc='.$newnombre_pc);
				}

				$this->nombre_pc=$newnombre_pc;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setip_pc(?string $newip_pc)
	{
		try {
			if($this->ip_pc!==$newip_pc) {
				if($newip_pc===null && $newip_pc!='') {
					throw new Exception('auditoria:Valor nulo no permitido en columna ip_pc');
				}

				if(strlen($newip_pc)>20) {
					throw new Exception('auditoria:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=20 en columna ip_pc');
				}

				if(filter_var($newip_pc,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('auditoria:Formato incorrecto en columna ip_pc='.$newip_pc);
				}

				$this->ip_pc=$newip_pc;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setusuario_pc(?string $newusuario_pc)
	{
		try {
			if($this->usuario_pc!==$newusuario_pc) {
				if($newusuario_pc===null && $newusuario_pc!='') {
					throw new Exception('auditoria:Valor nulo no permitido en columna usuario_pc');
				}

				if(strlen($newusuario_pc)>50) {
					throw new Exception('auditoria:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna usuario_pc');
				}

				if(filter_var($newusuario_pc,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('auditoria:Formato incorrecto en columna usuario_pc='.$newusuario_pc);
				}

				$this->usuario_pc=$newusuario_pc;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setfecha_hora(?string $newfecha_hora)
	{
		try {
			if($this->fecha_hora!==$newfecha_hora) {
				if($newfecha_hora===null && $newfecha_hora!='') {
					throw new Exception('auditoria:Valor nulo no permitido en columna fecha_hora');
				}

				if($newfecha_hora!==null && filter_var($newfecha_hora,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('auditoria:No es fecha - fecha_hora='.$newfecha_hora);
				}

				$this->fecha_hora=$newfecha_hora;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setobservacion(?string $newobservacion)
	{
		try {
			if($this->observacion!==$newobservacion) {
				if($newobservacion===null && $newobservacion!='') {
					throw new Exception('auditoria:Valor nulo no permitido en columna observacion');
				}

				if(strlen($newobservacion)>200) {
					throw new Exception('auditoria:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=200 en columna observacion');
				}

				if(filter_var($newobservacion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('auditoria:Formato incorrecto en columna observacion='.$newobservacion);
				}

				$this->observacion=$newobservacion;
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

	
	
	public  function  setusuario(?usuario $usuario) {
		try {
			$this->usuario=$usuario;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	public function getauditoria_detalles() : array {
		return $this->auditoriadetalles;
	}

	
	
	public  function  setauditoria_detalles(array $auditoriadetalles) {
		try {
			$this->auditoriadetalles=$auditoriadetalles;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_auditoriaValue(string $sKey,$oValue) {
		$this->map_auditoria[$sKey]=$oValue;
	}
	
	public function getMap_auditoriaValue(string $sKey) {
		return $this->map_auditoria[$sKey];
	}
	
	public function getauditoria_Original() : ?auditoria {
		return $this->auditoria_Original;
	}
	
	public function setauditoria_Original(auditoria $auditoria) {
		try {
			$this->auditoria_Original=$auditoria;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_auditoria() : array {
		return $this->map_auditoria;
	}

	public function setMap_auditoria(array $map_auditoria) {
		$this->map_auditoria = $map_auditoria;
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
