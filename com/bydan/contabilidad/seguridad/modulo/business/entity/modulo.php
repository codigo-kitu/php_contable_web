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
namespace com\bydan\contabilidad\seguridad\modulo\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class modulo extends GeneralEntity {

	/*GENERAL*/
	public static string $class='modulo';
	
	/*AUXILIARES*/
	public ?modulo $modulo_Original=null;	
	public ?GeneralEntity $modulo_Additional=null;
	public array $map_modulo=array();	
		
	/*CAMPOS*/
	public int $id_sistema = -1;
	public string $id_sistema_Descripcion = '';

	public int $id_paquete = -1;
	public string $id_paquete_Descripcion = '';

	public string $codigo = '';
	public string $nombre = '';
	public int $id_tipo_tecla_mascara = -1;
	public string $id_tipo_tecla_mascara_Descripcion = '';

	public string $tecla = '';
	public bool $estado = false;
	public int $orden = 0;
	public string $descripcion = '';
	
	/*FKs*/
	
	public ?sistema $sistema = null;
	public ?paquete $paquete = null;
	public ?tipo_tecla_mascara $tipo_tecla_mascara = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(false);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->modulo_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_sistema=-1;
		$this->id_sistema_Descripcion='';

 		$this->id_paquete=-1;
		$this->id_paquete_Descripcion='';

 		$this->codigo='';
 		$this->nombre='';
 		$this->id_tipo_tecla_mascara=-1;
		$this->id_tipo_tecla_mascara_Descripcion='';

 		$this->tecla='';
 		$this->estado=false;
 		$this->orden=0;
 		$this->descripcion='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->sistema=new sistema();
			$this->paquete=new paquete();
			$this->tipo_tecla_mascara=new tipo_tecla_mascara();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->modulo_Additional=new modulo_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_modulo() {
		$this->map_modulo = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_sistema() : ?int {
		return $this->id_sistema;
	}
	
	public function  getid_sistema_Descripcion() : string {
		return $this->id_sistema_Descripcion;
	}
    
	public function  getid_paquete() : ?int {
		return $this->id_paquete;
	}
	
	public function  getid_paquete_Descripcion() : string {
		return $this->id_paquete_Descripcion;
	}
    
	public function  getcodigo() : ?string {
		return $this->codigo;
	}
    
	public function  getnombre() : ?string {
		return $this->nombre;
	}
    
	public function  getid_tipo_tecla_mascara() : ?int {
		return $this->id_tipo_tecla_mascara;
	}
	
	public function  getid_tipo_tecla_mascara_Descripcion() : string {
		return $this->id_tipo_tecla_mascara_Descripcion;
	}
    
	public function  gettecla() : ?string {
		return $this->tecla;
	}
    
	public function  getestado() : ?bool {
		return $this->estado;
	}
    
	public function  getorden() : ?int {
		return $this->orden;
	}
    
	public function  getdescripcion() : ?string {
		return $this->descripcion;
	}
	
    
	public function setid_sistema(?int $newid_sistema)
	{
		try {
			if($this->id_sistema!==$newid_sistema) {
				if($newid_sistema===null && $newid_sistema!='') {
					throw new Exception('modulo:Valor nulo no permitido en columna id_sistema');
				}

				if($newid_sistema!==null && filter_var($newid_sistema,FILTER_VALIDATE_INT)===false) {
					throw new Exception('modulo:No es numero entero - id_sistema='.$newid_sistema);
				}

				$this->id_sistema=$newid_sistema;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_sistema_Descripcion(string $newid_sistema_Descripcion)
	{
		try {
			if($this->id_sistema_Descripcion!=$newid_sistema_Descripcion) {
				if($newid_sistema_Descripcion===null && $newid_sistema_Descripcion!='') {
					throw new Exception('modulo:Valor nulo no permitido en columna id_sistema');
				}

				$this->id_sistema_Descripcion=$newid_sistema_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_paquete(?int $newid_paquete)
	{
		try {
			if($this->id_paquete!==$newid_paquete) {
				if($newid_paquete===null && $newid_paquete!='') {
					throw new Exception('modulo:Valor nulo no permitido en columna id_paquete');
				}

				if($newid_paquete!==null && filter_var($newid_paquete,FILTER_VALIDATE_INT)===false) {
					throw new Exception('modulo:No es numero entero - id_paquete='.$newid_paquete);
				}

				$this->id_paquete=$newid_paquete;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_paquete_Descripcion(string $newid_paquete_Descripcion)
	{
		try {
			if($this->id_paquete_Descripcion!=$newid_paquete_Descripcion) {
				if($newid_paquete_Descripcion===null && $newid_paquete_Descripcion!='') {
					throw new Exception('modulo:Valor nulo no permitido en columna id_paquete');
				}

				$this->id_paquete_Descripcion=$newid_paquete_Descripcion;
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
					throw new Exception('modulo:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>50) {
					throw new Exception('modulo:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('modulo:Formato incorrecto en columna codigo='.$newcodigo);
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
					throw new Exception('modulo:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>150) {
					throw new Exception('modulo:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=150 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('modulo:Formato incorrecto en columna nombre='.$newnombre);
				}

				$this->nombre=$newnombre;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_tipo_tecla_mascara(?int $newid_tipo_tecla_mascara)
	{
		try {
			if($this->id_tipo_tecla_mascara!==$newid_tipo_tecla_mascara) {
				if($newid_tipo_tecla_mascara===null && $newid_tipo_tecla_mascara!='') {
					throw new Exception('modulo:Valor nulo no permitido en columna id_tipo_tecla_mascara');
				}

				if($newid_tipo_tecla_mascara!==null && filter_var($newid_tipo_tecla_mascara,FILTER_VALIDATE_INT)===false) {
					throw new Exception('modulo:No es numero entero - id_tipo_tecla_mascara='.$newid_tipo_tecla_mascara);
				}

				$this->id_tipo_tecla_mascara=$newid_tipo_tecla_mascara;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_tipo_tecla_mascara_Descripcion(string $newid_tipo_tecla_mascara_Descripcion)
	{
		try {
			if($this->id_tipo_tecla_mascara_Descripcion!=$newid_tipo_tecla_mascara_Descripcion) {
				if($newid_tipo_tecla_mascara_Descripcion===null && $newid_tipo_tecla_mascara_Descripcion!='') {
					throw new Exception('modulo:Valor nulo no permitido en columna id_tipo_tecla_mascara');
				}

				$this->id_tipo_tecla_mascara_Descripcion=$newid_tipo_tecla_mascara_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function settecla(?string $newtecla)
	{
		try {
			if($this->tecla!==$newtecla) {
				if($newtecla===null && $newtecla!='') {
					throw new Exception('modulo:Valor nulo no permitido en columna tecla');
				}

				if(strlen($newtecla)>20) {
					throw new Exception('modulo:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=20 en columna tecla');
				}

				if(filter_var($newtecla,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('modulo:Formato incorrecto en columna tecla='.$newtecla);
				}

				$this->tecla=$newtecla;
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
					throw new Exception('modulo:Valor nulo no permitido en columna estado');
				}

				if($newestado!==null && filter_var($newestado,FILTER_VALIDATE_BOOLEAN)===false && $newestado!==0 && $newestado!==false) {
					throw new Exception('modulo:No es valor booleano - estado='.$newestado);
				}

				$this->estado=$newestado;
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
					throw new Exception('modulo:Valor nulo no permitido en columna orden');
				}

				if($neworden!==null && filter_var($neworden,FILTER_VALIDATE_INT)===false) {
					throw new Exception('modulo:No es numero entero - orden='.$neworden);
				}

				$this->orden=$neworden;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdescripcion(?string $newdescripcion)
	{
		try {
			if($this->descripcion!==$newdescripcion) {
				if($newdescripcion===null && $newdescripcion!='') {
					throw new Exception('modulo:Valor nulo no permitido en columna descripcion');
				}

				if(strlen($newdescripcion)>200) {
					throw new Exception('modulo:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=200 en columna descripcion');
				}

				if(filter_var($newdescripcion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('modulo:Formato incorrecto en columna descripcion='.$newdescripcion);
				}

				$this->descripcion=$newdescripcion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	public function getsistema() : ?sistema {
		return $this->sistema;
	}

	public function getpaquete() : ?paquete {
		return $this->paquete;
	}

	public function gettipo_tecla_mascara() : ?tipo_tecla_mascara {
		return $this->tipo_tecla_mascara;
	}

	
	
	public  function  setsistema(?sistema $sistema) {
		try {
			$this->sistema=$sistema;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setpaquete(?paquete $paquete) {
		try {
			$this->paquete=$paquete;
		} catch(Exception $e) {
			;
		}
	}


	public  function  settipo_tecla_mascara(?tipo_tecla_mascara $tipo_tecla_mascara) {
		try {
			$this->tipo_tecla_mascara=$tipo_tecla_mascara;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_moduloValue(string $sKey,$oValue) {
		$this->map_modulo[$sKey]=$oValue;
	}
	
	public function getMap_moduloValue(string $sKey) {
		return $this->map_modulo[$sKey];
	}
	
	public function getmodulo_Original() : ?modulo {
		return $this->modulo_Original;
	}
	
	public function setmodulo_Original(modulo $modulo) {
		try {
			$this->modulo_Original=$modulo;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_modulo() : array {
		return $this->map_modulo;
	}

	public function setMap_modulo(array $map_modulo) {
		$this->map_modulo = $map_modulo;
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
