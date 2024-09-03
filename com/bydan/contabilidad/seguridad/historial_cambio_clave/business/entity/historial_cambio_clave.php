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
namespace com\bydan\contabilidad\seguridad\historial_cambio_clave\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class historial_cambio_clave extends GeneralEntity {

	/*GENERAL*/
	public static string $class='historial_cambio_clave';
	
	/*AUXILIARES*/
	public ?historial_cambio_clave $historial_cambio_clave_Original=null;	
	public ?GeneralEntity $historial_cambio_clave_Additional=null;
	public array $map_historial_cambio_clave=array();	
		
	/*CAMPOS*/
	public int $id_usuario = -1;
	public string $id_usuario_Descripcion = '';

	public string $nombre = '';
	public string $fecha_hora = '';
	public string $observacion = '';
	
	/*FKs*/
	
	public ?usuario $usuario = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->historial_cambio_clave_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_usuario=-1;
		$this->id_usuario_Descripcion='';

 		$this->nombre='';
 		$this->fecha_hora=date('Y-m-d');
 		$this->observacion='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->usuario=new usuario();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->historial_cambio_clave_Additional=new historial_cambio_clave_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_historial_cambio_clave() {
		$this->map_historial_cambio_clave = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_usuario() : ?int {
		return $this->id_usuario;
	}
	
	public function  getid_usuario_Descripcion() : string {
		return $this->id_usuario_Descripcion;
	}
    
	public function  getnombre() : ?string {
		return $this->nombre;
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
					throw new Exception('historial_cambio_clave:Valor nulo no permitido en columna id_usuario');
				}

				if($newid_usuario!==null && filter_var($newid_usuario,FILTER_VALIDATE_INT)===false) {
					throw new Exception('historial_cambio_clave:No es numero entero - id_usuario='.$newid_usuario);
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
					throw new Exception('historial_cambio_clave:Valor nulo no permitido en columna id_usuario');
				}

				$this->id_usuario_Descripcion=$newid_usuario_Descripcion;
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
					throw new Exception('historial_cambio_clave:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>50) {
					throw new Exception('historial_cambio_clave:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('historial_cambio_clave:Formato incorrecto en columna nombre='.$newnombre);
				}

				$this->nombre=$newnombre;
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
					throw new Exception('historial_cambio_clave:Valor nulo no permitido en columna fecha_hora');
				}

				if($newfecha_hora!==null && filter_var($newfecha_hora,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('historial_cambio_clave:No es fecha - fecha_hora='.$newfecha_hora);
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
					throw new Exception('historial_cambio_clave:Valor nulo no permitido en columna observacion');
				}

				if(strlen($newobservacion)>150) {
					throw new Exception('historial_cambio_clave:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=150 en columna observacion');
				}

				if(filter_var($newobservacion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('historial_cambio_clave:Formato incorrecto en columna observacion='.$newobservacion);
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
	
	
	
	
	/*AUXILIARES*/
	public function setMap_historial_cambio_claveValue(string $sKey,$oValue) {
		$this->map_historial_cambio_clave[$sKey]=$oValue;
	}
	
	public function getMap_historial_cambio_claveValue(string $sKey) {
		return $this->map_historial_cambio_clave[$sKey];
	}
	
	public function gethistorial_cambio_clave_Original() : ?historial_cambio_clave {
		return $this->historial_cambio_clave_Original;
	}
	
	public function sethistorial_cambio_clave_Original(historial_cambio_clave $historial_cambio_clave) {
		try {
			$this->historial_cambio_clave_Original=$historial_cambio_clave;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_historial_cambio_clave() : array {
		return $this->map_historial_cambio_clave;
	}

	public function setMap_historial_cambio_clave(array $map_historial_cambio_clave) {
		$this->map_historial_cambio_clave = $map_historial_cambio_clave;
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
