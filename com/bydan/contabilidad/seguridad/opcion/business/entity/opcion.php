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
namespace com\bydan\contabilidad\seguridad\opcion\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class opcion extends GeneralEntity {

	/*GENERAL*/
	public static string $class='opcion';
	
	/*AUXILIARES*/
	public ?opcion $opcion_Original=null;	
	public ?GeneralEntity $opcion_Additional=null;
	public array $map_opcion=array();	
		
	/*CAMPOS*/
	public int $id_sistema = -1;
	public string $id_sistema_Descripcion = '';

	public ?int $id_opcion = null;
	public string $id_opcion_Descripcion = '';

	public int $id_grupo_opcion = -1;
	public string $id_grupo_opcion_Descripcion = '';

	public int $id_modulo = -1;
	public string $id_modulo_Descripcion = '';

	public string $codigo = '';
	public string $nombre = '';
	public int $posicion = 0;
	public string $icon_name = '';
	public string $nombre_clase = '';
	public string $modulo0 = '';
	public string $sub_modulo = '';
	public string $paquete = '';
	public bool $es_para_menu = false;
	public bool $es_guardar_relaciones = false;
	public bool $con_mostrar_acciones_campo = false;
	public bool $estado = false;
	
	/*FKs*/
	
	public ?sistema $sistema = null;
	public ?opcion $opcion = null;
	public ?grupo_opcion $grupo_opcion = null;
	public ?modulo $modulo = null;
	
	/*RELACIONES*/
	
	public array $perfils = array();
	public array $opcions = array();
	public array $accions = array();
	public array $perfilopcions = array();
	public array $campos = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->opcion_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_sistema=-1;
		$this->id_sistema_Descripcion='';

 		$this->id_opcion=null;
		$this->id_opcion_Descripcion='';

 		$this->id_grupo_opcion=-1;
		$this->id_grupo_opcion_Descripcion='';

 		$this->id_modulo=-1;
		$this->id_modulo_Descripcion='';

 		$this->codigo='';
 		$this->nombre='';
 		$this->posicion=0;
 		$this->icon_name='';
 		$this->nombre_clase='';
 		$this->modulo0='';
 		$this->sub_modulo='';
 		$this->paquete='';
 		$this->es_para_menu=false;
 		$this->es_guardar_relaciones=false;
 		$this->con_mostrar_acciones_campo=false;
 		$this->estado=false;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->sistema=new sistema();
			$this->grupo_opcion=new grupo_opcion();
			$this->modulo=new modulo();
		}
		
		/*RELACIONES*/
		
		$this->perfils=array();
		$this->opcions=array();
		$this->accions=array();
		$this->perfilopcions=array();
		$this->campos=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->opcion_Additional=new opcion_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_opcion() {
		$this->map_opcion = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_sistema() : ?int {
		return $this->id_sistema;
	}
	
	public function  getid_sistema_Descripcion() : string {
		return $this->id_sistema_Descripcion;
	}
    
	public function  getid_opcion() : ?int {
		return $this->id_opcion;
	}
	
	public function  getid_opcion_Descripcion() : string {
		return $this->id_opcion_Descripcion;
	}
    
	public function  getid_grupo_opcion() : ?int {
		return $this->id_grupo_opcion;
	}
	
	public function  getid_grupo_opcion_Descripcion() : string {
		return $this->id_grupo_opcion_Descripcion;
	}
    
	public function  getid_modulo() : ?int {
		return $this->id_modulo;
	}
	
	public function  getid_modulo_Descripcion() : string {
		return $this->id_modulo_Descripcion;
	}
    
	public function  getcodigo() : ?string {
		return $this->codigo;
	}
    
	public function  getnombre() : ?string {
		return $this->nombre;
	}
    
	public function  getposicion() : ?int {
		return $this->posicion;
	}
    
	public function  geticon_name() : ?string {
		return $this->icon_name;
	}
    
	public function  getnombre_clase() : ?string {
		return $this->nombre_clase;
	}
    
	public function  getmodulo0() : ?string {
		return $this->modulo0;
	}
    
	public function  getsub_modulo() : ?string {
		return $this->sub_modulo;
	}
    
	public function  getpaquete() : ?string {
		return $this->paquete;
	}
    
	public function  getes_para_menu() : ?bool {
		return $this->es_para_menu;
	}
    
	public function  getes_guardar_relaciones() : ?bool {
		return $this->es_guardar_relaciones;
	}
    
	public function  getcon_mostrar_acciones_campo() : ?bool {
		return $this->con_mostrar_acciones_campo;
	}
    
	public function  getestado() : ?bool {
		return $this->estado;
	}
	
    
	public function setid_sistema(?int $newid_sistema)
	{
		try {
			if($this->id_sistema!==$newid_sistema) {
				if($newid_sistema===null && $newid_sistema!='') {
					throw new Exception('opcion:Valor nulo no permitido en columna id_sistema');
				}

				if($newid_sistema!==null && filter_var($newid_sistema,FILTER_VALIDATE_INT)===false) {
					throw new Exception('opcion:No es numero entero - id_sistema='.$newid_sistema);
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
					throw new Exception('opcion:Valor nulo no permitido en columna id_sistema');
				}

				$this->id_sistema_Descripcion=$newid_sistema_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_opcion(?int $newid_opcion) {
		if($this->id_opcion!==$newid_opcion) {

				if($newid_opcion!==null && filter_var($newid_opcion,FILTER_VALIDATE_INT)===false) {
					throw new Exception('opcion:No es numero entero - id_opcion');
				}

			$this->id_opcion=$newid_opcion;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_opcion_Descripcion(string $newid_opcion_Descripcion) {
		if($this->id_opcion_Descripcion!=$newid_opcion_Descripcion) {

			$this->id_opcion_Descripcion=$newid_opcion_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function setid_grupo_opcion(?int $newid_grupo_opcion)
	{
		try {
			if($this->id_grupo_opcion!==$newid_grupo_opcion) {
				if($newid_grupo_opcion===null && $newid_grupo_opcion!='') {
					throw new Exception('opcion:Valor nulo no permitido en columna id_grupo_opcion');
				}

				if($newid_grupo_opcion!==null && filter_var($newid_grupo_opcion,FILTER_VALIDATE_INT)===false) {
					throw new Exception('opcion:No es numero entero - id_grupo_opcion='.$newid_grupo_opcion);
				}

				$this->id_grupo_opcion=$newid_grupo_opcion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_grupo_opcion_Descripcion(string $newid_grupo_opcion_Descripcion)
	{
		try {
			if($this->id_grupo_opcion_Descripcion!=$newid_grupo_opcion_Descripcion) {
				if($newid_grupo_opcion_Descripcion===null && $newid_grupo_opcion_Descripcion!='') {
					throw new Exception('opcion:Valor nulo no permitido en columna id_grupo_opcion');
				}

				$this->id_grupo_opcion_Descripcion=$newid_grupo_opcion_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_modulo(?int $newid_modulo)
	{
		try {
			if($this->id_modulo!==$newid_modulo) {
				if($newid_modulo===null && $newid_modulo!='') {
					throw new Exception('opcion:Valor nulo no permitido en columna id_modulo');
				}

				if($newid_modulo!==null && filter_var($newid_modulo,FILTER_VALIDATE_INT)===false) {
					throw new Exception('opcion:No es numero entero - id_modulo='.$newid_modulo);
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
					throw new Exception('opcion:Valor nulo no permitido en columna id_modulo');
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
					throw new Exception('opcion:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>50) {
					throw new Exception('opcion:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('opcion:Formato incorrecto en columna codigo='.$newcodigo);
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
					throw new Exception('opcion:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>50) {
					throw new Exception('opcion:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('opcion:Formato incorrecto en columna nombre='.$newnombre);
				}

				$this->nombre=$newnombre;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setposicion(?int $newposicion)
	{
		try {
			if($this->posicion!==$newposicion) {
				if($newposicion===null && $newposicion!='') {
					throw new Exception('opcion:Valor nulo no permitido en columna posicion');
				}

				if($newposicion!==null && filter_var($newposicion,FILTER_VALIDATE_INT)===false) {
					throw new Exception('opcion:No es numero entero - posicion='.$newposicion);
				}

				$this->posicion=$newposicion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function seticon_name(?string $newicon_name)
	{
		try {
			if($this->icon_name!==$newicon_name) {
				if($newicon_name===null && $newicon_name!='') {
					throw new Exception('opcion:Valor nulo no permitido en columna icon_name');
				}

				if(strlen($newicon_name)>150) {
					throw new Exception('opcion:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=150 en columna icon_name');
				}

				if(filter_var($newicon_name,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('opcion:Formato incorrecto en columna icon_name='.$newicon_name);
				}

				$this->icon_name=$newicon_name;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnombre_clase(?string $newnombre_clase)
	{
		try {
			if($this->nombre_clase!==$newnombre_clase) {
				if($newnombre_clase===null && $newnombre_clase!='') {
					throw new Exception('opcion:Valor nulo no permitido en columna nombre_clase');
				}

				if(strlen($newnombre_clase)>100) {
					throw new Exception('opcion:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=100 en columna nombre_clase');
				}

				if(filter_var($newnombre_clase,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('opcion:Formato incorrecto en columna nombre_clase='.$newnombre_clase);
				}

				$this->nombre_clase=$newnombre_clase;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setmodulo0(?string $newmodulo0)
	{
		try {
			if($this->modulo0!==$newmodulo0) {
				if($newmodulo0===null && $newmodulo0!='') {
					throw new Exception('opcion:Valor nulo no permitido en columna modulo0');
				}

				if(strlen($newmodulo0)>50) {
					throw new Exception('opcion:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna modulo0');
				}

				if(filter_var($newmodulo0,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('opcion:Formato incorrecto en columna modulo0='.$newmodulo0);
				}

				$this->modulo0=$newmodulo0;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setsub_modulo(?string $newsub_modulo)
	{
		try {
			if($this->sub_modulo!==$newsub_modulo) {
				if($newsub_modulo===null && $newsub_modulo!='') {
					throw new Exception('opcion:Valor nulo no permitido en columna sub_modulo');
				}

				if(strlen($newsub_modulo)>50) {
					throw new Exception('opcion:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=50 en columna sub_modulo');
				}

				if(filter_var($newsub_modulo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('opcion:Formato incorrecto en columna sub_modulo='.$newsub_modulo);
				}

				$this->sub_modulo=$newsub_modulo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setpaquete(?string $newpaquete)
	{
		try {
			if($this->paquete!==$newpaquete) {
				if($newpaquete===null && $newpaquete!='') {
					throw new Exception('opcion:Valor nulo no permitido en columna paquete');
				}

				if(strlen($newpaquete)>200) {
					throw new Exception('opcion:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=200 en columna paquete');
				}

				if(filter_var($newpaquete,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('opcion:Formato incorrecto en columna paquete='.$newpaquete);
				}

				$this->paquete=$newpaquete;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setes_para_menu(?bool $newes_para_menu)
	{
		try {
			if($this->es_para_menu!==$newes_para_menu) {
				if($newes_para_menu===null && $newes_para_menu!='') {
					throw new Exception('opcion:Valor nulo no permitido en columna es_para_menu');
				}

				if($newes_para_menu!==null && filter_var($newes_para_menu,FILTER_VALIDATE_BOOLEAN)===false && $newes_para_menu!==0 && $newes_para_menu!==false) {
					throw new Exception('opcion:No es valor booleano - es_para_menu='.$newes_para_menu);
				}

				$this->es_para_menu=$newes_para_menu;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setes_guardar_relaciones(?bool $newes_guardar_relaciones)
	{
		try {
			if($this->es_guardar_relaciones!==$newes_guardar_relaciones) {
				if($newes_guardar_relaciones===null && $newes_guardar_relaciones!='') {
					throw new Exception('opcion:Valor nulo no permitido en columna es_guardar_relaciones');
				}

				if($newes_guardar_relaciones!==null && filter_var($newes_guardar_relaciones,FILTER_VALIDATE_BOOLEAN)===false && $newes_guardar_relaciones!==0 && $newes_guardar_relaciones!==false) {
					throw new Exception('opcion:No es valor booleano - es_guardar_relaciones='.$newes_guardar_relaciones);
				}

				$this->es_guardar_relaciones=$newes_guardar_relaciones;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcon_mostrar_acciones_campo(?bool $newcon_mostrar_acciones_campo)
	{
		try {
			if($this->con_mostrar_acciones_campo!==$newcon_mostrar_acciones_campo) {
				if($newcon_mostrar_acciones_campo===null && $newcon_mostrar_acciones_campo!='') {
					throw new Exception('opcion:Valor nulo no permitido en columna con_mostrar_acciones_campo');
				}

				if($newcon_mostrar_acciones_campo!==null && filter_var($newcon_mostrar_acciones_campo,FILTER_VALIDATE_BOOLEAN)===false && $newcon_mostrar_acciones_campo!==0 && $newcon_mostrar_acciones_campo!==false) {
					throw new Exception('opcion:No es valor booleano - con_mostrar_acciones_campo='.$newcon_mostrar_acciones_campo);
				}

				$this->con_mostrar_acciones_campo=$newcon_mostrar_acciones_campo;
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
					throw new Exception('opcion:Valor nulo no permitido en columna estado');
				}

				if($newestado!==null && filter_var($newestado,FILTER_VALIDATE_BOOLEAN)===false && $newestado!==0 && $newestado!==false) {
					throw new Exception('opcion:No es valor booleano - estado='.$newestado);
				}

				$this->estado=$newestado;
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

	public function getopcion() : ?opcion {
		return $this->opcion;
	}

	public function getgrupo_opcion() : ?grupo_opcion {
		return $this->grupo_opcion;
	}

	public function getmodulo() : ?modulo {
		return $this->modulo;
	}

	
	
	public  function  setsistema(?sistema $sistema) {
		try {
			$this->sistema=$sistema;
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


	public  function  setgrupo_opcion(?grupo_opcion $grupo_opcion) {
		try {
			$this->grupo_opcion=$grupo_opcion;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setmodulo(?modulo $modulo) {
		try {
			$this->modulo=$modulo;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	public function getperfils() : array {
		return $this->perfils;
	}

	public function getopcions() : array {
		return $this->opcions;
	}

	public function getaccions() : array {
		return $this->accions;
	}

	public function getperfil_opcions() : array {
		return $this->perfilopcions;
	}

	public function getcampos() : array {
		return $this->campos;
	}

	
	
	public  function  setperfils(array $perfils) {
		try {
			$this->perfils=$perfils;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setopcions(array $opcions) {
		try {
			$this->opcions=$opcions;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setaccions(array $accions) {
		try {
			$this->accions=$accions;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setperfil_opcions(array $perfilopcions) {
		try {
			$this->perfilopcions=$perfilopcions;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setcampos(array $campos) {
		try {
			$this->campos=$campos;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_opcionValue(string $sKey,$oValue) {
		$this->map_opcion[$sKey]=$oValue;
	}
	
	public function getMap_opcionValue(string $sKey) {
		return $this->map_opcion[$sKey];
	}
	
	public function getopcion_Original() : ?opcion {
		return $this->opcion_Original;
	}
	
	public function setopcion_Original(opcion $opcion) {
		try {
			$this->opcion_Original=$opcion;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_opcion() : array {
		return $this->map_opcion;
	}

	public function setMap_opcion(array $map_opcion) {
		$this->map_opcion = $map_opcion;
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
