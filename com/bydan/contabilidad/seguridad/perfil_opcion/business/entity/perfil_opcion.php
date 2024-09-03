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
namespace com\bydan\contabilidad\seguridad\perfil_opcion\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class perfil_opcion extends GeneralEntity {

	/*GENERAL*/
	public static string $class='perfil_opcion';
	
	/*AUXILIARES*/
	public ?perfil_opcion $perfil_opcion_Original=null;	
	public ?GeneralEntity $perfil_opcion_Additional=null;
	public array $map_perfil_opcion=array();	
		
	/*CAMPOS*/
	public int $id_perfil = -1;
	public string $id_perfil_Descripcion = '';

	public int $id_opcion = -1;
	public string $id_opcion_Descripcion = '';

	public bool $todo = false;
	public bool $ingreso = false;
	public bool $modificacion = false;
	public bool $eliminacion = false;
	public bool $consulta = false;
	public bool $busqueda = false;
	public bool $reporte = false;
	public bool $estado = false;
	
	/*FKs*/
	
	public ?perfil $perfil = null;
	public ?opcion $opcion = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->perfil_opcion_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_perfil=-1;
		$this->id_perfil_Descripcion='';

 		$this->id_opcion=-1;
		$this->id_opcion_Descripcion='';

 		$this->todo=false;
 		$this->ingreso=false;
 		$this->modificacion=false;
 		$this->eliminacion=false;
 		$this->consulta=false;
 		$this->busqueda=false;
 		$this->reporte=false;
 		$this->estado=false;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->perfil=new perfil();
			$this->opcion=new opcion();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->perfil_opcion_Additional=new perfil_opcion_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_perfil_opcion() {
		$this->map_perfil_opcion = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_perfil() : ?int {
		return $this->id_perfil;
	}
	
	public function  getid_perfil_Descripcion() : string {
		return $this->id_perfil_Descripcion;
	}
    
	public function  getid_opcion() : ?int {
		return $this->id_opcion;
	}
	
	public function  getid_opcion_Descripcion() : string {
		return $this->id_opcion_Descripcion;
	}
    
	public function  gettodo() : ?bool {
		return $this->todo;
	}
    
	public function  getingreso() : ?bool {
		return $this->ingreso;
	}
    
	public function  getmodificacion() : ?bool {
		return $this->modificacion;
	}
    
	public function  geteliminacion() : ?bool {
		return $this->eliminacion;
	}
    
	public function  getconsulta() : ?bool {
		return $this->consulta;
	}
    
	public function  getbusqueda() : ?bool {
		return $this->busqueda;
	}
    
	public function  getreporte() : ?bool {
		return $this->reporte;
	}
    
	public function  getestado() : ?bool {
		return $this->estado;
	}
	
    
	public function setid_perfil(?int $newid_perfil)
	{
		try {
			if($this->id_perfil!==$newid_perfil) {
				if($newid_perfil===null && $newid_perfil!='') {
					throw new Exception('perfil_opcion:Valor nulo no permitido en columna id_perfil');
				}

				if($newid_perfil!==null && filter_var($newid_perfil,FILTER_VALIDATE_INT)===false) {
					throw new Exception('perfil_opcion:No es numero entero - id_perfil='.$newid_perfil);
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
					throw new Exception('perfil_opcion:Valor nulo no permitido en columna id_perfil');
				}

				$this->id_perfil_Descripcion=$newid_perfil_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_opcion(?int $newid_opcion)
	{
		try {
			if($this->id_opcion!==$newid_opcion) {
				if($newid_opcion===null && $newid_opcion!='') {
					throw new Exception('perfil_opcion:Valor nulo no permitido en columna id_opcion');
				}

				if($newid_opcion!==null && filter_var($newid_opcion,FILTER_VALIDATE_INT)===false) {
					throw new Exception('perfil_opcion:No es numero entero - id_opcion='.$newid_opcion);
				}

				$this->id_opcion=$newid_opcion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_opcion_Descripcion(string $newid_opcion_Descripcion)
	{
		try {
			if($this->id_opcion_Descripcion!=$newid_opcion_Descripcion) {
				if($newid_opcion_Descripcion===null && $newid_opcion_Descripcion!='') {
					throw new Exception('perfil_opcion:Valor nulo no permitido en columna id_opcion');
				}

				$this->id_opcion_Descripcion=$newid_opcion_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function settodo(?bool $newtodo)
	{
		try {
			if($this->todo!==$newtodo) {
				if($newtodo===null && $newtodo!='') {
					throw new Exception('perfil_opcion:Valor nulo no permitido en columna todo');
				}

				if($newtodo!==null && filter_var($newtodo,FILTER_VALIDATE_BOOLEAN)===false && $newtodo!==0 && $newtodo!==false) {
					throw new Exception('perfil_opcion:No es valor booleano - todo='.$newtodo);
				}

				$this->todo=$newtodo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setingreso(?bool $newingreso)
	{
		try {
			if($this->ingreso!==$newingreso) {
				if($newingreso===null && $newingreso!='') {
					throw new Exception('perfil_opcion:Valor nulo no permitido en columna ingreso');
				}

				if($newingreso!==null && filter_var($newingreso,FILTER_VALIDATE_BOOLEAN)===false && $newingreso!==0 && $newingreso!==false) {
					throw new Exception('perfil_opcion:No es valor booleano - ingreso='.$newingreso);
				}

				$this->ingreso=$newingreso;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setmodificacion(?bool $newmodificacion)
	{
		try {
			if($this->modificacion!==$newmodificacion) {
				if($newmodificacion===null && $newmodificacion!='') {
					throw new Exception('perfil_opcion:Valor nulo no permitido en columna modificacion');
				}

				if($newmodificacion!==null && filter_var($newmodificacion,FILTER_VALIDATE_BOOLEAN)===false && $newmodificacion!==0 && $newmodificacion!==false) {
					throw new Exception('perfil_opcion:No es valor booleano - modificacion='.$newmodificacion);
				}

				$this->modificacion=$newmodificacion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function seteliminacion(?bool $neweliminacion)
	{
		try {
			if($this->eliminacion!==$neweliminacion) {
				if($neweliminacion===null && $neweliminacion!='') {
					throw new Exception('perfil_opcion:Valor nulo no permitido en columna eliminacion');
				}

				if($neweliminacion!==null && filter_var($neweliminacion,FILTER_VALIDATE_BOOLEAN)===false && $neweliminacion!==0 && $neweliminacion!==false) {
					throw new Exception('perfil_opcion:No es valor booleano - eliminacion='.$neweliminacion);
				}

				$this->eliminacion=$neweliminacion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setconsulta(?bool $newconsulta)
	{
		try {
			if($this->consulta!==$newconsulta) {
				if($newconsulta===null && $newconsulta!='') {
					throw new Exception('perfil_opcion:Valor nulo no permitido en columna consulta');
				}

				if($newconsulta!==null && filter_var($newconsulta,FILTER_VALIDATE_BOOLEAN)===false && $newconsulta!==0 && $newconsulta!==false) {
					throw new Exception('perfil_opcion:No es valor booleano - consulta='.$newconsulta);
				}

				$this->consulta=$newconsulta;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setbusqueda(?bool $newbusqueda)
	{
		try {
			if($this->busqueda!==$newbusqueda) {
				if($newbusqueda===null && $newbusqueda!='') {
					throw new Exception('perfil_opcion:Valor nulo no permitido en columna busqueda');
				}

				if($newbusqueda!==null && filter_var($newbusqueda,FILTER_VALIDATE_BOOLEAN)===false && $newbusqueda!==0 && $newbusqueda!==false) {
					throw new Exception('perfil_opcion:No es valor booleano - busqueda='.$newbusqueda);
				}

				$this->busqueda=$newbusqueda;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setreporte(?bool $newreporte)
	{
		try {
			if($this->reporte!==$newreporte) {
				if($newreporte===null && $newreporte!='') {
					throw new Exception('perfil_opcion:Valor nulo no permitido en columna reporte');
				}

				if($newreporte!==null && filter_var($newreporte,FILTER_VALIDATE_BOOLEAN)===false && $newreporte!==0 && $newreporte!==false) {
					throw new Exception('perfil_opcion:No es valor booleano - reporte='.$newreporte);
				}

				$this->reporte=$newreporte;
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
					throw new Exception('perfil_opcion:Valor nulo no permitido en columna estado');
				}

				if($newestado!==null && filter_var($newestado,FILTER_VALIDATE_BOOLEAN)===false && $newestado!==0 && $newestado!==false) {
					throw new Exception('perfil_opcion:No es valor booleano - estado='.$newestado);
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

	public function getopcion() : ?opcion {
		return $this->opcion;
	}

	
	
	public  function  setperfil(?perfil $perfil) {
		try {
			$this->perfil=$perfil;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setopcion(?opcion $opcion) {
		try {
			$this->opcion=$opcion;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_perfil_opcionValue(string $sKey,$oValue) {
		$this->map_perfil_opcion[$sKey]=$oValue;
	}
	
	public function getMap_perfil_opcionValue(string $sKey) {
		return $this->map_perfil_opcion[$sKey];
	}
	
	public function getperfil_opcion_Original() : ?perfil_opcion {
		return $this->perfil_opcion_Original;
	}
	
	public function setperfil_opcion_Original(perfil_opcion $perfil_opcion) {
		try {
			$this->perfil_opcion_Original=$perfil_opcion;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_perfil_opcion() : array {
		return $this->map_perfil_opcion;
	}

	public function setMap_perfil_opcion(array $map_perfil_opcion) {
		$this->map_perfil_opcion = $map_perfil_opcion;
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
