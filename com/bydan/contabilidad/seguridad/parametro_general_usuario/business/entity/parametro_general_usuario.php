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
namespace com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntitySinIdGenerated;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;
use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;

class parametro_general_usuario extends GeneralEntitySinIdGenerated {

	/*GENERAL*/
	public static string $class='parametro_general_usuario';
	
	/*AUXILIARES*/
	public ?parametro_general_usuario $parametro_general_usuario_Original=null;	
	public ?GeneralEntitySinIdGenerated $parametro_general_usuario_Additional=null;
	public array $map_parametro_general_usuario=array();	
		
	/*CAMPOS*/
	public int $id_tipo_fondo = -1;
	public string $id_tipo_fondo_Descripcion = '';

	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public int $id_sucursal = -1;
	public string $id_sucursal_Descripcion = '';

	public int $id_ejercicio = -1;
	public string $id_ejercicio_Descripcion = '';

	public int $id_periodo = -1;
	public string $id_periodo_Descripcion = '';

	public string $path_exportar = '';
	public bool $con_exportar_cabecera = false;
	public bool $con_exportar_campo_version = false;
	public bool $con_botones_tool_bar = false;
	public bool $con_cargar_por_parte = false;
	public bool $con_guardar_relaciones = false;
	public bool $con_mostrar_acciones_campo_general = false;
	public bool $con_mensaje_confirmacion = false;
	
	/*FKs*/
	
	public ?usuario $usuario = null;
	public ?tipo_fondo $tipo_fondo = null;
	public ?empresa $empresa = null;
	public ?sucursal $sucursal = null;
	public ?ejercicio $ejercicio = null;
	public ?periodo $periodo = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(false);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->parametro_general_usuario_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_tipo_fondo=-1;
		$this->id_tipo_fondo_Descripcion='';

 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->id_sucursal=-1;
		$this->id_sucursal_Descripcion='';

 		$this->id_ejercicio=-1;
		$this->id_ejercicio_Descripcion='';

 		$this->id_periodo=-1;
		$this->id_periodo_Descripcion='';

 		$this->path_exportar='';
 		$this->con_exportar_cabecera=false;
 		$this->con_exportar_campo_version=false;
 		$this->con_botones_tool_bar=false;
 		$this->con_cargar_por_parte=false;
 		$this->con_guardar_relaciones=false;
 		$this->con_mostrar_acciones_campo_general=false;
 		$this->con_mensaje_confirmacion=false;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->usuario=new usuario();
			$this->tipo_fondo=new tipo_fondo();
			$this->empresa=new empresa();
			$this->sucursal=new sucursal();
			$this->ejercicio=new ejercicio();
			$this->periodo=new periodo();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->parametro_general_usuario_Additional=new parametro_general_usuario_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_parametro_general_usuario() {
		$this->map_parametro_general_usuario = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_tipo_fondo() : ?int {
		return $this->id_tipo_fondo;
	}
	
	public function  getid_tipo_fondo_Descripcion() : string {
		return $this->id_tipo_fondo_Descripcion;
	}
    
	public function  getid_empresa() : ?int {
		return $this->id_empresa;
	}
	
	public function  getid_empresa_Descripcion() : string {
		return $this->id_empresa_Descripcion;
	}
    
	public function  getid_sucursal() : ?int {
		return $this->id_sucursal;
	}
	
	public function  getid_sucursal_Descripcion() : string {
		return $this->id_sucursal_Descripcion;
	}
    
	public function  getid_ejercicio() : ?int {
		return $this->id_ejercicio;
	}
	
	public function  getid_ejercicio_Descripcion() : string {
		return $this->id_ejercicio_Descripcion;
	}
    
	public function  getid_periodo() : ?int {
		return $this->id_periodo;
	}
	
	public function  getid_periodo_Descripcion() : string {
		return $this->id_periodo_Descripcion;
	}
    
	public function  getpath_exportar() : ?string {
		return $this->path_exportar;
	}
    
	public function  getcon_exportar_cabecera() : ?bool {
		return $this->con_exportar_cabecera;
	}
    
	public function  getcon_exportar_campo_version() : ?bool {
		return $this->con_exportar_campo_version;
	}
    
	public function  getcon_botones_tool_bar() : ?bool {
		return $this->con_botones_tool_bar;
	}
    
	public function  getcon_cargar_por_parte() : ?bool {
		return $this->con_cargar_por_parte;
	}
    
	public function  getcon_guardar_relaciones() : ?bool {
		return $this->con_guardar_relaciones;
	}
    
	public function  getcon_mostrar_acciones_campo_general() : ?bool {
		return $this->con_mostrar_acciones_campo_general;
	}
    
	public function  getcon_mensaje_confirmacion() : ?bool {
		return $this->con_mensaje_confirmacion;
	}
	
    
	public function setid_tipo_fondo(?int $newid_tipo_fondo)
	{
		try {
			if($this->id_tipo_fondo!==$newid_tipo_fondo) {
				if($newid_tipo_fondo===null && $newid_tipo_fondo!='') {
					throw new Exception('parametro_general_usuario:Valor nulo no permitido en columna id_tipo_fondo');
				}

				if($newid_tipo_fondo!==null && filter_var($newid_tipo_fondo,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_general_usuario:No es numero entero - id_tipo_fondo='.$newid_tipo_fondo);
				}

				$this->id_tipo_fondo=$newid_tipo_fondo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_tipo_fondo_Descripcion(string $newid_tipo_fondo_Descripcion)
	{
		try {
			if($this->id_tipo_fondo_Descripcion!=$newid_tipo_fondo_Descripcion) {
				if($newid_tipo_fondo_Descripcion===null && $newid_tipo_fondo_Descripcion!='') {
					throw new Exception('parametro_general_usuario:Valor nulo no permitido en columna id_tipo_fondo');
				}

				$this->id_tipo_fondo_Descripcion=$newid_tipo_fondo_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('parametro_general_usuario:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_general_usuario:No es numero entero - id_empresa='.$newid_empresa);
				}

				$this->id_empresa=$newid_empresa;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_empresa_Descripcion(string $newid_empresa_Descripcion)
	{
		try {
			if($this->id_empresa_Descripcion!=$newid_empresa_Descripcion) {
				if($newid_empresa_Descripcion===null && $newid_empresa_Descripcion!='') {
					throw new Exception('parametro_general_usuario:Valor nulo no permitido en columna id_empresa');
				}

				$this->id_empresa_Descripcion=$newid_empresa_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_sucursal(?int $newid_sucursal)
	{
		try {
			if($this->id_sucursal!==$newid_sucursal) {
				if($newid_sucursal===null && $newid_sucursal!='') {
					throw new Exception('parametro_general_usuario:Valor nulo no permitido en columna id_sucursal');
				}

				if($newid_sucursal!==null && filter_var($newid_sucursal,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_general_usuario:No es numero entero - id_sucursal='.$newid_sucursal);
				}

				$this->id_sucursal=$newid_sucursal;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_sucursal_Descripcion(string $newid_sucursal_Descripcion)
	{
		try {
			if($this->id_sucursal_Descripcion!=$newid_sucursal_Descripcion) {
				if($newid_sucursal_Descripcion===null && $newid_sucursal_Descripcion!='') {
					throw new Exception('parametro_general_usuario:Valor nulo no permitido en columna id_sucursal');
				}

				$this->id_sucursal_Descripcion=$newid_sucursal_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_ejercicio(?int $newid_ejercicio)
	{
		try {
			if($this->id_ejercicio!==$newid_ejercicio) {
				if($newid_ejercicio===null && $newid_ejercicio!='') {
					throw new Exception('parametro_general_usuario:Valor nulo no permitido en columna id_ejercicio');
				}

				if($newid_ejercicio!==null && filter_var($newid_ejercicio,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_general_usuario:No es numero entero - id_ejercicio='.$newid_ejercicio);
				}

				$this->id_ejercicio=$newid_ejercicio;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_ejercicio_Descripcion(string $newid_ejercicio_Descripcion)
	{
		try {
			if($this->id_ejercicio_Descripcion!=$newid_ejercicio_Descripcion) {
				if($newid_ejercicio_Descripcion===null && $newid_ejercicio_Descripcion!='') {
					throw new Exception('parametro_general_usuario:Valor nulo no permitido en columna id_ejercicio');
				}

				$this->id_ejercicio_Descripcion=$newid_ejercicio_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_periodo(?int $newid_periodo)
	{
		try {
			if($this->id_periodo!==$newid_periodo) {
				if($newid_periodo===null && $newid_periodo!='') {
					throw new Exception('parametro_general_usuario:Valor nulo no permitido en columna id_periodo');
				}

				if($newid_periodo!==null && filter_var($newid_periodo,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_general_usuario:No es numero entero - id_periodo='.$newid_periodo);
				}

				$this->id_periodo=$newid_periodo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_periodo_Descripcion(string $newid_periodo_Descripcion)
	{
		try {
			if($this->id_periodo_Descripcion!=$newid_periodo_Descripcion) {
				if($newid_periodo_Descripcion===null && $newid_periodo_Descripcion!='') {
					throw new Exception('parametro_general_usuario:Valor nulo no permitido en columna id_periodo');
				}

				$this->id_periodo_Descripcion=$newid_periodo_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setpath_exportar(?string $newpath_exportar)
	{
		try {
			if($this->path_exportar!==$newpath_exportar) {
				if($newpath_exportar===null && $newpath_exportar!='') {
					throw new Exception('parametro_general_usuario:Valor nulo no permitido en columna path_exportar');
				}

				if(strlen($newpath_exportar)>100) {
					throw new Exception('parametro_general_usuario:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=100 en columna path_exportar');
				}

				if(filter_var($newpath_exportar,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('parametro_general_usuario:Formato incorrecto en columna path_exportar='.$newpath_exportar);
				}

				$this->path_exportar=$newpath_exportar;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcon_exportar_cabecera(?bool $newcon_exportar_cabecera)
	{
		try {
			if($this->con_exportar_cabecera!==$newcon_exportar_cabecera) {
				if($newcon_exportar_cabecera===null && $newcon_exportar_cabecera!='') {
					throw new Exception('parametro_general_usuario:Valor nulo no permitido en columna con_exportar_cabecera');
				}

				if($newcon_exportar_cabecera!==null && filter_var($newcon_exportar_cabecera,FILTER_VALIDATE_BOOLEAN)===false && $newcon_exportar_cabecera!==0 && $newcon_exportar_cabecera!==false) {
					throw new Exception('parametro_general_usuario:No es valor booleano - con_exportar_cabecera='.$newcon_exportar_cabecera);
				}

				$this->con_exportar_cabecera=$newcon_exportar_cabecera;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcon_exportar_campo_version(?bool $newcon_exportar_campo_version)
	{
		try {
			if($this->con_exportar_campo_version!==$newcon_exportar_campo_version) {
				if($newcon_exportar_campo_version===null && $newcon_exportar_campo_version!='') {
					throw new Exception('parametro_general_usuario:Valor nulo no permitido en columna con_exportar_campo_version');
				}

				if($newcon_exportar_campo_version!==null && filter_var($newcon_exportar_campo_version,FILTER_VALIDATE_BOOLEAN)===false && $newcon_exportar_campo_version!==0 && $newcon_exportar_campo_version!==false) {
					throw new Exception('parametro_general_usuario:No es valor booleano - con_exportar_campo_version='.$newcon_exportar_campo_version);
				}

				$this->con_exportar_campo_version=$newcon_exportar_campo_version;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcon_botones_tool_bar(?bool $newcon_botones_tool_bar)
	{
		try {
			if($this->con_botones_tool_bar!==$newcon_botones_tool_bar) {
				if($newcon_botones_tool_bar===null && $newcon_botones_tool_bar!='') {
					throw new Exception('parametro_general_usuario:Valor nulo no permitido en columna con_botones_tool_bar');
				}

				if($newcon_botones_tool_bar!==null && filter_var($newcon_botones_tool_bar,FILTER_VALIDATE_BOOLEAN)===false && $newcon_botones_tool_bar!==0 && $newcon_botones_tool_bar!==false) {
					throw new Exception('parametro_general_usuario:No es valor booleano - con_botones_tool_bar='.$newcon_botones_tool_bar);
				}

				$this->con_botones_tool_bar=$newcon_botones_tool_bar;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcon_cargar_por_parte(?bool $newcon_cargar_por_parte)
	{
		try {
			if($this->con_cargar_por_parte!==$newcon_cargar_por_parte) {
				if($newcon_cargar_por_parte===null && $newcon_cargar_por_parte!='') {
					throw new Exception('parametro_general_usuario:Valor nulo no permitido en columna con_cargar_por_parte');
				}

				if($newcon_cargar_por_parte!==null && filter_var($newcon_cargar_por_parte,FILTER_VALIDATE_BOOLEAN)===false && $newcon_cargar_por_parte!==0 && $newcon_cargar_por_parte!==false) {
					throw new Exception('parametro_general_usuario:No es valor booleano - con_cargar_por_parte='.$newcon_cargar_por_parte);
				}

				$this->con_cargar_por_parte=$newcon_cargar_por_parte;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcon_guardar_relaciones(?bool $newcon_guardar_relaciones)
	{
		try {
			if($this->con_guardar_relaciones!==$newcon_guardar_relaciones) {
				if($newcon_guardar_relaciones===null && $newcon_guardar_relaciones!='') {
					throw new Exception('parametro_general_usuario:Valor nulo no permitido en columna con_guardar_relaciones');
				}

				if($newcon_guardar_relaciones!==null && filter_var($newcon_guardar_relaciones,FILTER_VALIDATE_BOOLEAN)===false && $newcon_guardar_relaciones!==0 && $newcon_guardar_relaciones!==false) {
					throw new Exception('parametro_general_usuario:No es valor booleano - con_guardar_relaciones='.$newcon_guardar_relaciones);
				}

				$this->con_guardar_relaciones=$newcon_guardar_relaciones;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcon_mostrar_acciones_campo_general(?bool $newcon_mostrar_acciones_campo_general)
	{
		try {
			if($this->con_mostrar_acciones_campo_general!==$newcon_mostrar_acciones_campo_general) {
				if($newcon_mostrar_acciones_campo_general===null && $newcon_mostrar_acciones_campo_general!='') {
					throw new Exception('parametro_general_usuario:Valor nulo no permitido en columna con_mostrar_acciones_campo_general');
				}

				if($newcon_mostrar_acciones_campo_general!==null && filter_var($newcon_mostrar_acciones_campo_general,FILTER_VALIDATE_BOOLEAN)===false && $newcon_mostrar_acciones_campo_general!==0 && $newcon_mostrar_acciones_campo_general!==false) {
					throw new Exception('parametro_general_usuario:No es valor booleano - con_mostrar_acciones_campo_general='.$newcon_mostrar_acciones_campo_general);
				}

				$this->con_mostrar_acciones_campo_general=$newcon_mostrar_acciones_campo_general;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcon_mensaje_confirmacion(?bool $newcon_mensaje_confirmacion)
	{
		try {
			if($this->con_mensaje_confirmacion!==$newcon_mensaje_confirmacion) {
				if($newcon_mensaje_confirmacion===null && $newcon_mensaje_confirmacion!='') {
					throw new Exception('parametro_general_usuario:Valor nulo no permitido en columna con_mensaje_confirmacion');
				}

				if($newcon_mensaje_confirmacion!==null && filter_var($newcon_mensaje_confirmacion,FILTER_VALIDATE_BOOLEAN)===false && $newcon_mensaje_confirmacion!==0 && $newcon_mensaje_confirmacion!==false) {
					throw new Exception('parametro_general_usuario:No es valor booleano - con_mensaje_confirmacion='.$newcon_mensaje_confirmacion);
				}

				$this->con_mensaje_confirmacion=$newcon_mensaje_confirmacion;
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

	public function gettipo_fondo() : ?tipo_fondo {
		return $this->tipo_fondo;
	}

	public function getempresa() : ?empresa {
		return $this->empresa;
	}

	public function getsucursal() : ?sucursal {
		return $this->sucursal;
	}

	public function getejercicio() : ?ejercicio {
		return $this->ejercicio;
	}

	public function getperiodo() : ?periodo {
		return $this->periodo;
	}

	
	
	public  function  setusuario(?usuario $usuario) {
		try {
			$this->usuario=$usuario;
		} catch(Exception $e) {
			;
		}
	}


	public  function  settipo_fondo(?tipo_fondo $tipo_fondo) {
		try {
			$this->tipo_fondo=$tipo_fondo;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setempresa(?empresa $empresa) {
		try {
			$this->empresa=$empresa;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setsucursal(?sucursal $sucursal) {
		try {
			$this->sucursal=$sucursal;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setejercicio(?ejercicio $ejercicio) {
		try {
			$this->ejercicio=$ejercicio;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setperiodo(?periodo $periodo) {
		try {
			$this->periodo=$periodo;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_parametro_general_usuarioValue(string $sKey,$oValue) {
		$this->map_parametro_general_usuario[$sKey]=$oValue;
	}
	
	public function getMap_parametro_general_usuarioValue(string $sKey) {
		return $this->map_parametro_general_usuario[$sKey];
	}
	
	public function getparametro_general_usuario_Original() : ?parametro_general_usuario {
		return $this->parametro_general_usuario_Original;
	}
	
	public function setparametro_general_usuario_Original(parametro_general_usuario $parametro_general_usuario) {
		try {
			$this->parametro_general_usuario_Original=$parametro_general_usuario;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_parametro_general_usuario() : array {
		return $this->map_parametro_general_usuario;
	}

	public function setMap_parametro_general_usuario(array $map_parametro_general_usuario) {
		$this->map_parametro_general_usuario = $map_parametro_general_usuario;
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
