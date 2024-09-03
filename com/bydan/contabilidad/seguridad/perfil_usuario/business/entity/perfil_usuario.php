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
namespace com\bydan\contabilidad\seguridad\perfil_usuario\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class perfil_usuario extends GeneralEntity {

	/*GENERAL*/
	public static string $class='perfil_usuario';
	
	/*AUXILIARES*/
	public ?perfil_usuario $perfil_usuario_Original=null;	
	public ?GeneralEntity $perfil_usuario_Additional=null;
	public array $map_perfil_usuario=array();	
		
	/*CAMPOS*/
	public int $id_perfil = -1;
	public string $id_perfil_Descripcion = '';

	public int $id_usuario = -1;
	public string $id_usuario_Descripcion = '';

	public bool $estado = false;
	
	/*FKs*/
	
	public ?perfil $perfil = null;
	public ?usuario $usuario = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->perfil_usuario_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_perfil=-1;
		$this->id_perfil_Descripcion='';

 		$this->id_usuario=-1;
		$this->id_usuario_Descripcion='';

 		$this->estado=false;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->perfil=new perfil();
			$this->usuario=new usuario();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->perfil_usuario_Additional=new perfil_usuario_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_perfil_usuario() {
		$this->map_perfil_usuario = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_perfil() : ?int {
		return $this->id_perfil;
	}
	
	public function  getid_perfil_Descripcion() : string {
		return $this->id_perfil_Descripcion;
	}
    
	public function  getid_usuario() : ?int {
		return $this->id_usuario;
	}
	
	public function  getid_usuario_Descripcion() : string {
		return $this->id_usuario_Descripcion;
	}
    
	public function  getestado() : ?bool {
		return $this->estado;
	}
	
    
	public function setid_perfil(?int $newid_perfil)
	{
		try {
			if($this->id_perfil!==$newid_perfil) {
				if($newid_perfil===null && $newid_perfil!='') {
					throw new Exception('perfil_usuario:Valor nulo no permitido en columna id_perfil');
				}

				if($newid_perfil!==null && filter_var($newid_perfil,FILTER_VALIDATE_INT)===false) {
					throw new Exception('perfil_usuario:No es numero entero - id_perfil='.$newid_perfil);
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
					throw new Exception('perfil_usuario:Valor nulo no permitido en columna id_perfil');
				}

				$this->id_perfil_Descripcion=$newid_perfil_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_usuario(?int $newid_usuario)
	{
		try {
			if($this->id_usuario!==$newid_usuario) {
				if($newid_usuario===null && $newid_usuario!='') {
					throw new Exception('perfil_usuario:Valor nulo no permitido en columna id_usuario');
				}

				if($newid_usuario!==null && filter_var($newid_usuario,FILTER_VALIDATE_INT)===false) {
					throw new Exception('perfil_usuario:No es numero entero - id_usuario='.$newid_usuario);
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
					throw new Exception('perfil_usuario:Valor nulo no permitido en columna id_usuario');
				}

				$this->id_usuario_Descripcion=$newid_usuario_Descripcion;
				//$this->setIsChanged(true);
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
					throw new Exception('perfil_usuario:Valor nulo no permitido en columna estado');
				}

				if($newestado!==null && filter_var($newestado,FILTER_VALIDATE_BOOLEAN)===false && $newestado!==0 && $newestado!==false) {
					throw new Exception('perfil_usuario:No es valor booleano - estado='.$newestado);
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

	public function getusuario() : ?usuario {
		return $this->usuario;
	}

	
	
	public  function  setperfil(?perfil $perfil) {
		try {
			$this->perfil=$perfil;
		} catch(Exception $e) {
			;
		}
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
	public function setMap_perfil_usuarioValue(string $sKey,$oValue) {
		$this->map_perfil_usuario[$sKey]=$oValue;
	}
	
	public function getMap_perfil_usuarioValue(string $sKey) {
		return $this->map_perfil_usuario[$sKey];
	}
	
	public function getperfil_usuario_Original() : ?perfil_usuario {
		return $this->perfil_usuario_Original;
	}
	
	public function setperfil_usuario_Original(perfil_usuario $perfil_usuario) {
		try {
			$this->perfil_usuario_Original=$perfil_usuario;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_perfil_usuario() : array {
		return $this->map_perfil_usuario;
	}

	public function setMap_perfil_usuario(array $map_perfil_usuario) {
		$this->map_perfil_usuario = $map_perfil_usuario;
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
