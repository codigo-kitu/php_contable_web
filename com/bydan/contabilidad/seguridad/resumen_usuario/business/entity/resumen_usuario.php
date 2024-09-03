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
namespace com\bydan\contabilidad\seguridad\resumen_usuario\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class resumen_usuario extends GeneralEntity {

	/*GENERAL*/
	public static string $class='resumen_usuario';
	
	/*AUXILIARES*/
	public ?resumen_usuario $resumen_usuario_Original=null;	
	public ?GeneralEntity $resumen_usuario_Additional=null;
	public array $map_resumen_usuario=array();	
		
	/*CAMPOS*/
	public int $id_usuario = -1;
	public string $id_usuario_Descripcion = '';

	public int $numero_ingresos = 0;
	public int $numero_error_ingreso = 0;
	public int $numero_intentos = 0;
	public int $numero_cierres = 0;
	public int $numero_reinicios = 0;
	public int $numero_ingreso_actual = 0;
	public string $fecha_ultimo_ingreso = '';
	public string $fecha_ultimo_error_ingreso = '';
	public string $fecha_ultimo_intento = '';
	public string $fecha_ultimo_cierre = '';
	
	/*FKs*/
	
	public ?usuario $usuario = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->resumen_usuario_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_usuario=-1;
		$this->id_usuario_Descripcion='';

 		$this->numero_ingresos=0;
 		$this->numero_error_ingreso=0;
 		$this->numero_intentos=0;
 		$this->numero_cierres=0;
 		$this->numero_reinicios=0;
 		$this->numero_ingreso_actual=0;
 		$this->fecha_ultimo_ingreso=date('Y-m-d');
 		$this->fecha_ultimo_error_ingreso=date('Y-m-d');
 		$this->fecha_ultimo_intento=date('Y-m-d');
 		$this->fecha_ultimo_cierre=date('Y-m-d');
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->usuario=new usuario();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->resumen_usuario_Additional=new resumen_usuario_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_resumen_usuario() {
		$this->map_resumen_usuario = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_usuario() : ?int {
		return $this->id_usuario;
	}
	
	public function  getid_usuario_Descripcion() : string {
		return $this->id_usuario_Descripcion;
	}
    
	public function  getnumero_ingresos() : ?int {
		return $this->numero_ingresos;
	}
    
	public function  getnumero_error_ingreso() : ?int {
		return $this->numero_error_ingreso;
	}
    
	public function  getnumero_intentos() : ?int {
		return $this->numero_intentos;
	}
    
	public function  getnumero_cierres() : ?int {
		return $this->numero_cierres;
	}
    
	public function  getnumero_reinicios() : ?int {
		return $this->numero_reinicios;
	}
    
	public function  getnumero_ingreso_actual() : ?int {
		return $this->numero_ingreso_actual;
	}
    
	public function  getfecha_ultimo_ingreso() : ?string {
		return $this->fecha_ultimo_ingreso;
	}
    
	public function  getfecha_ultimo_error_ingreso() : ?string {
		return $this->fecha_ultimo_error_ingreso;
	}
    
	public function  getfecha_ultimo_intento() : ?string {
		return $this->fecha_ultimo_intento;
	}
    
	public function  getfecha_ultimo_cierre() : ?string {
		return $this->fecha_ultimo_cierre;
	}
	
    
	public function setid_usuario(?int $newid_usuario)
	{
		try {
			if($this->id_usuario!==$newid_usuario) {
				if($newid_usuario===null && $newid_usuario!='') {
					throw new Exception('resumen_usuario:Valor nulo no permitido en columna id_usuario');
				}

				if($newid_usuario!==null && filter_var($newid_usuario,FILTER_VALIDATE_INT)===false) {
					throw new Exception('resumen_usuario:No es numero entero - id_usuario='.$newid_usuario);
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
					throw new Exception('resumen_usuario:Valor nulo no permitido en columna id_usuario');
				}

				$this->id_usuario_Descripcion=$newid_usuario_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnumero_ingresos(?int $newnumero_ingresos)
	{
		try {
			if($this->numero_ingresos!==$newnumero_ingresos) {
				if($newnumero_ingresos===null && $newnumero_ingresos!='') {
					throw new Exception('resumen_usuario:Valor nulo no permitido en columna numero_ingresos');
				}

				if($newnumero_ingresos!==null && filter_var($newnumero_ingresos,FILTER_VALIDATE_INT)===false) {
					throw new Exception('resumen_usuario:No es numero entero - numero_ingresos='.$newnumero_ingresos);
				}

				$this->numero_ingresos=$newnumero_ingresos;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnumero_error_ingreso(?int $newnumero_error_ingreso)
	{
		try {
			if($this->numero_error_ingreso!==$newnumero_error_ingreso) {
				if($newnumero_error_ingreso===null && $newnumero_error_ingreso!='') {
					throw new Exception('resumen_usuario:Valor nulo no permitido en columna numero_error_ingreso');
				}

				if($newnumero_error_ingreso!==null && filter_var($newnumero_error_ingreso,FILTER_VALIDATE_INT)===false) {
					throw new Exception('resumen_usuario:No es numero entero - numero_error_ingreso='.$newnumero_error_ingreso);
				}

				$this->numero_error_ingreso=$newnumero_error_ingreso;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnumero_intentos(?int $newnumero_intentos)
	{
		try {
			if($this->numero_intentos!==$newnumero_intentos) {
				if($newnumero_intentos===null && $newnumero_intentos!='') {
					throw new Exception('resumen_usuario:Valor nulo no permitido en columna numero_intentos');
				}

				if($newnumero_intentos!==null && filter_var($newnumero_intentos,FILTER_VALIDATE_INT)===false) {
					throw new Exception('resumen_usuario:No es numero entero - numero_intentos='.$newnumero_intentos);
				}

				$this->numero_intentos=$newnumero_intentos;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnumero_cierres(?int $newnumero_cierres)
	{
		try {
			if($this->numero_cierres!==$newnumero_cierres) {
				if($newnumero_cierres===null && $newnumero_cierres!='') {
					throw new Exception('resumen_usuario:Valor nulo no permitido en columna numero_cierres');
				}

				if($newnumero_cierres!==null && filter_var($newnumero_cierres,FILTER_VALIDATE_INT)===false) {
					throw new Exception('resumen_usuario:No es numero entero - numero_cierres='.$newnumero_cierres);
				}

				$this->numero_cierres=$newnumero_cierres;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnumero_reinicios(?int $newnumero_reinicios)
	{
		try {
			if($this->numero_reinicios!==$newnumero_reinicios) {
				if($newnumero_reinicios===null && $newnumero_reinicios!='') {
					throw new Exception('resumen_usuario:Valor nulo no permitido en columna numero_reinicios');
				}

				if($newnumero_reinicios!==null && filter_var($newnumero_reinicios,FILTER_VALIDATE_INT)===false) {
					throw new Exception('resumen_usuario:No es numero entero - numero_reinicios='.$newnumero_reinicios);
				}

				$this->numero_reinicios=$newnumero_reinicios;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnumero_ingreso_actual(?int $newnumero_ingreso_actual)
	{
		try {
			if($this->numero_ingreso_actual!==$newnumero_ingreso_actual) {
				if($newnumero_ingreso_actual===null && $newnumero_ingreso_actual!='') {
					throw new Exception('resumen_usuario:Valor nulo no permitido en columna numero_ingreso_actual');
				}

				if($newnumero_ingreso_actual!==null && filter_var($newnumero_ingreso_actual,FILTER_VALIDATE_INT)===false) {
					throw new Exception('resumen_usuario:No es numero entero - numero_ingreso_actual='.$newnumero_ingreso_actual);
				}

				$this->numero_ingreso_actual=$newnumero_ingreso_actual;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setfecha_ultimo_ingreso(?string $newfecha_ultimo_ingreso)
	{
		try {
			if($this->fecha_ultimo_ingreso!==$newfecha_ultimo_ingreso) {
				if($newfecha_ultimo_ingreso===null && $newfecha_ultimo_ingreso!='') {
					throw new Exception('resumen_usuario:Valor nulo no permitido en columna fecha_ultimo_ingreso');
				}

				if($newfecha_ultimo_ingreso!==null && filter_var($newfecha_ultimo_ingreso,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('resumen_usuario:No es fecha - fecha_ultimo_ingreso='.$newfecha_ultimo_ingreso);
				}

				$this->fecha_ultimo_ingreso=$newfecha_ultimo_ingreso;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setfecha_ultimo_error_ingreso(?string $newfecha_ultimo_error_ingreso)
	{
		try {
			if($this->fecha_ultimo_error_ingreso!==$newfecha_ultimo_error_ingreso) {
				if($newfecha_ultimo_error_ingreso===null && $newfecha_ultimo_error_ingreso!='') {
					throw new Exception('resumen_usuario:Valor nulo no permitido en columna fecha_ultimo_error_ingreso');
				}

				if($newfecha_ultimo_error_ingreso!==null && filter_var($newfecha_ultimo_error_ingreso,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('resumen_usuario:No es fecha - fecha_ultimo_error_ingreso='.$newfecha_ultimo_error_ingreso);
				}

				$this->fecha_ultimo_error_ingreso=$newfecha_ultimo_error_ingreso;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setfecha_ultimo_intento(?string $newfecha_ultimo_intento)
	{
		try {
			if($this->fecha_ultimo_intento!==$newfecha_ultimo_intento) {
				if($newfecha_ultimo_intento===null && $newfecha_ultimo_intento!='') {
					throw new Exception('resumen_usuario:Valor nulo no permitido en columna fecha_ultimo_intento');
				}

				if($newfecha_ultimo_intento!==null && filter_var($newfecha_ultimo_intento,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('resumen_usuario:No es fecha - fecha_ultimo_intento='.$newfecha_ultimo_intento);
				}

				$this->fecha_ultimo_intento=$newfecha_ultimo_intento;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setfecha_ultimo_cierre(?string $newfecha_ultimo_cierre)
	{
		try {
			if($this->fecha_ultimo_cierre!==$newfecha_ultimo_cierre) {
				if($newfecha_ultimo_cierre===null && $newfecha_ultimo_cierre!='') {
					throw new Exception('resumen_usuario:Valor nulo no permitido en columna fecha_ultimo_cierre');
				}

				if($newfecha_ultimo_cierre!==null && filter_var($newfecha_ultimo_cierre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('resumen_usuario:No es fecha - fecha_ultimo_cierre='.$newfecha_ultimo_cierre);
				}

				$this->fecha_ultimo_cierre=$newfecha_ultimo_cierre;
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
	public function setMap_resumen_usuarioValue(string $sKey,$oValue) {
		$this->map_resumen_usuario[$sKey]=$oValue;
	}
	
	public function getMap_resumen_usuarioValue(string $sKey) {
		return $this->map_resumen_usuario[$sKey];
	}
	
	public function getresumen_usuario_Original() : ?resumen_usuario {
		return $this->resumen_usuario_Original;
	}
	
	public function setresumen_usuario_Original(resumen_usuario $resumen_usuario) {
		try {
			$this->resumen_usuario_Original=$resumen_usuario;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_resumen_usuario() : array {
		return $this->map_resumen_usuario;
	}

	public function setMap_resumen_usuario(array $map_resumen_usuario) {
		$this->map_resumen_usuario = $map_resumen_usuario;
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
