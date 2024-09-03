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
namespace com\bydan\contabilidad\seguridad\grupo_opcion\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class grupo_opcion extends GeneralEntity {

	/*GENERAL*/
	public static string $class='grupo_opcion';
	
	/*AUXILIARES*/
	public ?grupo_opcion $grupo_opcion_Original=null;	
	public ?GeneralEntity $grupo_opcion_Additional=null;
	public array $map_grupo_opcion=array();	
		
	/*CAMPOS*/
	public int $id_modulo = -1;
	public string $id_modulo_Descripcion = '';

	public string $codigo = '';
	public string $nombre_principal = '';
	public int $orden = 0;
	public bool $estado = false;
	
	/*FKs*/
	
	public ?modulo $modulo = null;
	
	/*RELACIONES*/
	
	public array $opcions = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->grupo_opcion_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_modulo=-1;
		$this->id_modulo_Descripcion='';

 		$this->codigo='';
 		$this->nombre_principal='';
 		$this->orden=0;
 		$this->estado=false;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->modulo=new modulo();
		}
		
		/*RELACIONES*/
		
		$this->opcions=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->grupo_opcion_Additional=new grupo_opcion_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_grupo_opcion() {
		$this->map_grupo_opcion = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_modulo() : ?int {
		return $this->id_modulo;
	}
	
	public function  getid_modulo_Descripcion() : string {
		return $this->id_modulo_Descripcion;
	}
    
	public function  getcodigo() : ?string {
		return $this->codigo;
	}
    
	public function  getnombre_principal() : ?string {
		return $this->nombre_principal;
	}
    
	public function  getorden() : ?int {
		return $this->orden;
	}
    
	public function  getestado() : ?bool {
		return $this->estado;
	}
	
    
	public function setid_modulo(?int $newid_modulo)
	{
		try {
			if($this->id_modulo!==$newid_modulo) {
				if($newid_modulo===null && $newid_modulo!='') {
					throw new Exception('grupo_opcion:Valor nulo no permitido en columna id_modulo');
				}

				if($newid_modulo!==null && filter_var($newid_modulo,FILTER_VALIDATE_INT)===false) {
					throw new Exception('grupo_opcion:No es numero entero - id_modulo='.$newid_modulo);
				}

				$this->id_modulo=$newid_modulo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_modulo_Descripcion(string $newid_modulo_Descripcion)
	{
		try {
			if($this->id_modulo_Descripcion!=$newid_modulo_Descripcion) {
				if($newid_modulo_Descripcion===null && $newid_modulo_Descripcion!='') {
					throw new Exception('grupo_opcion:Valor nulo no permitido en columna id_modulo');
				}

				$this->id_modulo_Descripcion=$newid_modulo_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcodigo(?string $newcodigo)
	{
		try {
			if($this->codigo!==$newcodigo) {
				if($newcodigo===null && $newcodigo!='') {
					throw new Exception('grupo_opcion:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>50) {
					throw new Exception('grupo_opcion:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('grupo_opcion:Formato incorrecto en columna codigo='.$newcodigo);
				}

				$this->codigo=$newcodigo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnombre_principal(?string $newnombre_principal)
	{
		try {
			if($this->nombre_principal!==$newnombre_principal) {
				if($newnombre_principal===null && $newnombre_principal!='') {
					throw new Exception('grupo_opcion:Valor nulo no permitido en columna nombre_principal');
				}

				if(strlen($newnombre_principal)>100) {
					throw new Exception('grupo_opcion:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=100 en columna nombre_principal');
				}

				if(filter_var($newnombre_principal,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('grupo_opcion:Formato incorrecto en columna nombre_principal='.$newnombre_principal);
				}

				$this->nombre_principal=$newnombre_principal;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setorden(?int $neworden)
	{
		try {
			if($this->orden!==$neworden) {
				if($neworden===null && $neworden!='') {
					throw new Exception('grupo_opcion:Valor nulo no permitido en columna orden');
				}

				if($neworden!==null && filter_var($neworden,FILTER_VALIDATE_INT)===false) {
					throw new Exception('grupo_opcion:No es numero entero - orden='.$neworden);
				}

				$this->orden=$neworden;
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
					throw new Exception('grupo_opcion:Valor nulo no permitido en columna estado');
				}

				if($newestado!==null && filter_var($newestado,FILTER_VALIDATE_BOOLEAN)===false && $newestado!==0 && $newestado!==false) {
					throw new Exception('grupo_opcion:No es valor booleano - estado='.$newestado);
				}

				$this->estado=$newestado;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	public function getmodulo() : ?modulo {
		return $this->modulo;
	}

	
	
	public  function  setmodulo(?modulo $modulo) {
		try {
			$this->modulo=$modulo;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	public function getopcions() : array {
		return $this->opcions;
	}

	
	
	public  function  setopcions(array $opcions) {
		try {
			$this->opcions=$opcions;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_grupo_opcionValue(string $sKey,$oValue) {
		$this->map_grupo_opcion[$sKey]=$oValue;
	}
	
	public function getMap_grupo_opcionValue(string $sKey) {
		return $this->map_grupo_opcion[$sKey];
	}
	
	public function getgrupo_opcion_Original() : ?grupo_opcion {
		return $this->grupo_opcion_Original;
	}
	
	public function setgrupo_opcion_Original(grupo_opcion $grupo_opcion) {
		try {
			$this->grupo_opcion_Original=$grupo_opcion;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_grupo_opcion() : array {
		return $this->map_grupo_opcion;
	}

	public function setMap_grupo_opcion(array $map_grupo_opcion) {
		$this->map_grupo_opcion = $map_grupo_opcion;
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
