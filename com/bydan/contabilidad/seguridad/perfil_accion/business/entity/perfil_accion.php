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
namespace com\bydan\contabilidad\seguridad\perfil_accion\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class perfil_accion extends GeneralEntity {

	/*GENERAL*/
	public static string $class='perfil_accion';
	
	/*AUXILIARES*/
	public ?perfil_accion $perfil_accion_Original=null;	
	public ?GeneralEntity $perfil_accion_Additional=null;
	public array $map_perfil_accion=array();	
		
	/*CAMPOS*/
	public int $id_perfil = -1;
	public string $id_perfil_Descripcion = '';

	public int $id_accion = -1;
	public string $id_accion_Descripcion = '';

	public bool $ejecusion = false;
	public bool $estado = false;
	
	/*FKs*/
	
	public ?perfil $perfil = null;
	public ?accion $accion = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->perfil_accion_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_perfil=-1;
		$this->id_perfil_Descripcion='';

 		$this->id_accion=-1;
		$this->id_accion_Descripcion='';

 		$this->ejecusion=false;
 		$this->estado=false;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->perfil=new perfil();
			$this->accion=new accion();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->perfil_accion_Additional=new perfil_accion_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_perfil_accion() {
		$this->map_perfil_accion = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_perfil() : ?int {
		return $this->id_perfil;
	}
	
	public function  getid_perfil_Descripcion() : string {
		return $this->id_perfil_Descripcion;
	}
    
	public function  getid_accion() : ?int {
		return $this->id_accion;
	}
	
	public function  getid_accion_Descripcion() : string {
		return $this->id_accion_Descripcion;
	}
    
	public function  getejecusion() : ?bool {
		return $this->ejecusion;
	}
    
	public function  getestado() : ?bool {
		return $this->estado;
	}
	
    
	public function setid_perfil(?int $newid_perfil)
	{
		try {
			if($this->id_perfil!==$newid_perfil) {
				if($newid_perfil===null && $newid_perfil!='') {
					throw new Exception('perfil_accion:Valor nulo no permitido en columna id_perfil');
				}

				if($newid_perfil!==null && filter_var($newid_perfil,FILTER_VALIDATE_INT)===false) {
					throw new Exception('perfil_accion:No es numero entero - id_perfil='.$newid_perfil);
				}

				$this->id_perfil=$newid_perfil;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_perfil_Descripcion(string $newid_perfil_Descripcion)
	{
		try {
			if($this->id_perfil_Descripcion!=$newid_perfil_Descripcion) {
				if($newid_perfil_Descripcion===null && $newid_perfil_Descripcion!='') {
					throw new Exception('perfil_accion:Valor nulo no permitido en columna id_perfil');
				}

				$this->id_perfil_Descripcion=$newid_perfil_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_accion(?int $newid_accion)
	{
		try {
			if($this->id_accion!==$newid_accion) {
				if($newid_accion===null && $newid_accion!='') {
					throw new Exception('perfil_accion:Valor nulo no permitido en columna id_accion');
				}

				if($newid_accion!==null && filter_var($newid_accion,FILTER_VALIDATE_INT)===false) {
					throw new Exception('perfil_accion:No es numero entero - id_accion='.$newid_accion);
				}

				$this->id_accion=$newid_accion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_accion_Descripcion(string $newid_accion_Descripcion)
	{
		try {
			if($this->id_accion_Descripcion!=$newid_accion_Descripcion) {
				if($newid_accion_Descripcion===null && $newid_accion_Descripcion!='') {
					throw new Exception('perfil_accion:Valor nulo no permitido en columna id_accion');
				}

				$this->id_accion_Descripcion=$newid_accion_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setejecusion(?bool $newejecusion)
	{
		try {
			if($this->ejecusion!==$newejecusion) {
				if($newejecusion===null && $newejecusion!='') {
					throw new Exception('perfil_accion:Valor nulo no permitido en columna ejecusion');
				}

				if($newejecusion!==null && filter_var($newejecusion,FILTER_VALIDATE_BOOLEAN)===false && $newejecusion!==0 && $newejecusion!==false) {
					throw new Exception('perfil_accion:No es valor booleano - ejecusion='.$newejecusion);
				}

				$this->ejecusion=$newejecusion;
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
					throw new Exception('perfil_accion:Valor nulo no permitido en columna estado');
				}

				if($newestado!==null && filter_var($newestado,FILTER_VALIDATE_BOOLEAN)===false && $newestado!==0 && $newestado!==false) {
					throw new Exception('perfil_accion:No es valor booleano - estado='.$newestado);
				}

				$this->estado=$newestado;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	public function getperfil() : ?perfil {
		return $this->perfil;
	}

	public function getaccion() : ?accion {
		return $this->accion;
	}

	
	
	public  function  setperfil(?perfil $perfil) {
		try {
			$this->perfil=$perfil;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setaccion(?accion $accion) {
		try {
			$this->accion=$accion;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_perfil_accionValue(string $sKey,$oValue) {
		$this->map_perfil_accion[$sKey]=$oValue;
	}
	
	public function getMap_perfil_accionValue(string $sKey) {
		return $this->map_perfil_accion[$sKey];
	}
	
	public function getperfil_accion_Original() : ?perfil_accion {
		return $this->perfil_accion_Original;
	}
	
	public function setperfil_accion_Original(perfil_accion $perfil_accion) {
		try {
			$this->perfil_accion_Original=$perfil_accion;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_perfil_accion() : array {
		return $this->map_perfil_accion;
	}

	public function setMap_perfil_accion(array $map_perfil_accion) {
		$this->map_perfil_accion = $map_perfil_accion;
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
