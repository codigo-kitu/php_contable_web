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
namespace com\bydan\contabilidad\contabilidad\asiento_predefinido\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;
use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;

class asiento_predefinido extends GeneralEntity {

	/*GENERAL*/
	public static string $class='asiento_predefinido';
	
	/*AUXILIARES*/
	public ?asiento_predefinido $asiento_predefinido_Original=null;	
	public ?GeneralEntity $asiento_predefinido_Additional=null;
	public array $map_asiento_predefinido=array();	
		
	/*CAMPOS*/
	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public int $id_sucursal = -1;
	public string $id_sucursal_Descripcion = '';

	public int $id_ejercicio = -1;
	public string $id_ejercicio_Descripcion = '';

	public int $id_periodo = -1;
	public string $id_periodo_Descripcion = '';

	public int $id_usuario = -1;
	public string $id_usuario_Descripcion = '';

	public int $id_modulo = -1;
	public string $id_modulo_Descripcion = '';

	public string $codigo = '';
	public string $nombre = '';
	public int $id_fuente = -1;
	public string $id_fuente_Descripcion = '';

	public int $id_libro_auxiliar = -1;
	public string $id_libro_auxiliar_Descripcion = '';

	public int $id_centro_costo = -1;
	public string $id_centro_costo_Descripcion = '';

	public int $id_documento_contable = -1;
	public string $id_documento_contable_Descripcion = '';

	public string $descripcion = '';
	public string $nro_nit = '';
	public string $referencia = '';
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	public ?sucursal $sucursal = null;
	public ?ejercicio $ejercicio = null;
	public ?periodo $periodo = null;
	public ?usuario $usuario = null;
	public ?modulo $modulo = null;
	public ?fuente $fuente = null;
	public ?libro_auxiliar $libro_auxiliar = null;
	public ?centro_costo $centro_costo = null;
	public ?documento_contable $documento_contable = null;
	
	/*RELACIONES*/
	
	public array $asientopredefinidodetalles = array();
	public array $asientos = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->asiento_predefinido_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->id_sucursal=-1;
		$this->id_sucursal_Descripcion='';

 		$this->id_ejercicio=-1;
		$this->id_ejercicio_Descripcion='';

 		$this->id_periodo=-1;
		$this->id_periodo_Descripcion='';

 		$this->id_usuario=-1;
		$this->id_usuario_Descripcion='';

 		$this->id_modulo=-1;
		$this->id_modulo_Descripcion='';

 		$this->codigo='';
 		$this->nombre='';
 		$this->id_fuente=-1;
		$this->id_fuente_Descripcion='';

 		$this->id_libro_auxiliar=-1;
		$this->id_libro_auxiliar_Descripcion='';

 		$this->id_centro_costo=-1;
		$this->id_centro_costo_Descripcion='';

 		$this->id_documento_contable=-1;
		$this->id_documento_contable_Descripcion='';

 		$this->descripcion='';
 		$this->nro_nit='';
 		$this->referencia='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
			$this->sucursal=new sucursal();
			$this->ejercicio=new ejercicio();
			$this->periodo=new periodo();
			$this->usuario=new usuario();
			$this->modulo=new modulo();
			$this->fuente=new fuente();
			$this->libro_auxiliar=new libro_auxiliar();
			$this->centro_costo=new centro_costo();
			$this->documento_contable=new documento_contable();
		}
		
		/*RELACIONES*/
		
		$this->asientopredefinidodetalles=array();
		$this->asientos=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->asiento_predefinido_Additional=new asiento_predefinido_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_asiento_predefinido() {
		$this->map_asiento_predefinido = array();
	}
	
	/*CAMPOS*/
    
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
    
	public function  getid_usuario() : ?int {
		return $this->id_usuario;
	}
	
	public function  getid_usuario_Descripcion() : string {
		return $this->id_usuario_Descripcion;
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
    
	public function  getid_fuente() : ?int {
		return $this->id_fuente;
	}
	
	public function  getid_fuente_Descripcion() : string {
		return $this->id_fuente_Descripcion;
	}
    
	public function  getid_libro_auxiliar() : ?int {
		return $this->id_libro_auxiliar;
	}
	
	public function  getid_libro_auxiliar_Descripcion() : string {
		return $this->id_libro_auxiliar_Descripcion;
	}
    
	public function  getid_centro_costo() : ?int {
		return $this->id_centro_costo;
	}
	
	public function  getid_centro_costo_Descripcion() : string {
		return $this->id_centro_costo_Descripcion;
	}
    
	public function  getid_documento_contable() : ?int {
		return $this->id_documento_contable;
	}
	
	public function  getid_documento_contable_Descripcion() : string {
		return $this->id_documento_contable_Descripcion;
	}
    
	public function  getdescripcion() : ?string {
		return $this->descripcion;
	}
    
	public function  getnro_nit() : ?string {
		return $this->nro_nit;
	}
    
	public function  getreferencia() : ?string {
		return $this->referencia;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('asiento_predefinido:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento_predefinido:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('asiento_predefinido:Valor nulo no permitido en columna id_empresa');
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
					throw new Exception('asiento_predefinido:Valor nulo no permitido en columna id_sucursal');
				}

				if($newid_sucursal!==null && filter_var($newid_sucursal,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento_predefinido:No es numero entero - id_sucursal='.$newid_sucursal);
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
					throw new Exception('asiento_predefinido:Valor nulo no permitido en columna id_sucursal');
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
					throw new Exception('asiento_predefinido:Valor nulo no permitido en columna id_ejercicio');
				}

				if($newid_ejercicio!==null && filter_var($newid_ejercicio,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento_predefinido:No es numero entero - id_ejercicio='.$newid_ejercicio);
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
					throw new Exception('asiento_predefinido:Valor nulo no permitido en columna id_ejercicio');
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
					throw new Exception('asiento_predefinido:Valor nulo no permitido en columna id_periodo');
				}

				if($newid_periodo!==null && filter_var($newid_periodo,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento_predefinido:No es numero entero - id_periodo='.$newid_periodo);
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
					throw new Exception('asiento_predefinido:Valor nulo no permitido en columna id_periodo');
				}

				$this->id_periodo_Descripcion=$newid_periodo_Descripcion;
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
					throw new Exception('asiento_predefinido:Valor nulo no permitido en columna id_usuario');
				}

				if($newid_usuario!==null && filter_var($newid_usuario,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento_predefinido:No es numero entero - id_usuario='.$newid_usuario);
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
					throw new Exception('asiento_predefinido:Valor nulo no permitido en columna id_usuario');
				}

				$this->id_usuario_Descripcion=$newid_usuario_Descripcion;
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
					throw new Exception('asiento_predefinido:Valor nulo no permitido en columna id_modulo');
				}

				if($newid_modulo!==null && filter_var($newid_modulo,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento_predefinido:No es numero entero - id_modulo='.$newid_modulo);
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
					throw new Exception('asiento_predefinido:Valor nulo no permitido en columna id_modulo');
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
					throw new Exception('asiento_predefinido:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>10) {
					throw new Exception('asiento_predefinido:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=10 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('asiento_predefinido:Formato incorrecto en columna codigo='.$newcodigo);
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
					throw new Exception('asiento_predefinido:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>100) {
					throw new Exception('asiento_predefinido:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=100 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('asiento_predefinido:Formato incorrecto en columna nombre='.$newnombre);
				}

				$this->nombre=$newnombre;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_fuente(?int $newid_fuente)
	{
		try {
			if($this->id_fuente!==$newid_fuente) {
				if($newid_fuente===null && $newid_fuente!='') {
					throw new Exception('asiento_predefinido:Valor nulo no permitido en columna id_fuente');
				}

				if($newid_fuente!==null && filter_var($newid_fuente,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento_predefinido:No es numero entero - id_fuente='.$newid_fuente);
				}

				$this->id_fuente=$newid_fuente;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_fuente_Descripcion(string $newid_fuente_Descripcion)
	{
		try {
			if($this->id_fuente_Descripcion!=$newid_fuente_Descripcion) {
				if($newid_fuente_Descripcion===null && $newid_fuente_Descripcion!='') {
					throw new Exception('asiento_predefinido:Valor nulo no permitido en columna id_fuente');
				}

				$this->id_fuente_Descripcion=$newid_fuente_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_libro_auxiliar(?int $newid_libro_auxiliar)
	{
		try {
			if($this->id_libro_auxiliar!==$newid_libro_auxiliar) {
				if($newid_libro_auxiliar===null && $newid_libro_auxiliar!='') {
					throw new Exception('asiento_predefinido:Valor nulo no permitido en columna id_libro_auxiliar');
				}

				if($newid_libro_auxiliar!==null && filter_var($newid_libro_auxiliar,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento_predefinido:No es numero entero - id_libro_auxiliar='.$newid_libro_auxiliar);
				}

				$this->id_libro_auxiliar=$newid_libro_auxiliar;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_libro_auxiliar_Descripcion(string $newid_libro_auxiliar_Descripcion)
	{
		try {
			if($this->id_libro_auxiliar_Descripcion!=$newid_libro_auxiliar_Descripcion) {
				if($newid_libro_auxiliar_Descripcion===null && $newid_libro_auxiliar_Descripcion!='') {
					throw new Exception('asiento_predefinido:Valor nulo no permitido en columna id_libro_auxiliar');
				}

				$this->id_libro_auxiliar_Descripcion=$newid_libro_auxiliar_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_centro_costo(?int $newid_centro_costo)
	{
		try {
			if($this->id_centro_costo!==$newid_centro_costo) {
				if($newid_centro_costo===null && $newid_centro_costo!='') {
					throw new Exception('asiento_predefinido:Valor nulo no permitido en columna id_centro_costo');
				}

				if($newid_centro_costo!==null && filter_var($newid_centro_costo,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento_predefinido:No es numero entero - id_centro_costo='.$newid_centro_costo);
				}

				$this->id_centro_costo=$newid_centro_costo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_centro_costo_Descripcion(string $newid_centro_costo_Descripcion)
	{
		try {
			if($this->id_centro_costo_Descripcion!=$newid_centro_costo_Descripcion) {
				if($newid_centro_costo_Descripcion===null && $newid_centro_costo_Descripcion!='') {
					throw new Exception('asiento_predefinido:Valor nulo no permitido en columna id_centro_costo');
				}

				$this->id_centro_costo_Descripcion=$newid_centro_costo_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_documento_contable(?int $newid_documento_contable)
	{
		try {
			if($this->id_documento_contable!==$newid_documento_contable) {
				if($newid_documento_contable===null && $newid_documento_contable!='') {
					throw new Exception('asiento_predefinido:Valor nulo no permitido en columna id_documento_contable');
				}

				if($newid_documento_contable!==null && filter_var($newid_documento_contable,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento_predefinido:No es numero entero - id_documento_contable='.$newid_documento_contable);
				}

				$this->id_documento_contable=$newid_documento_contable;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_documento_contable_Descripcion(string $newid_documento_contable_Descripcion)
	{
		try {
			if($this->id_documento_contable_Descripcion!=$newid_documento_contable_Descripcion) {
				if($newid_documento_contable_Descripcion===null && $newid_documento_contable_Descripcion!='') {
					throw new Exception('asiento_predefinido:Valor nulo no permitido en columna id_documento_contable');
				}

				$this->id_documento_contable_Descripcion=$newid_documento_contable_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdescripcion(?string $newdescripcion) {
		if($this->descripcion!==$newdescripcion) {

				if(strlen($newdescripcion)>100) {
					try {
						throw new Exception('asiento_predefinido:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=descripcion en columna descripcion');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newdescripcion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('asiento_predefinido:Formato incorrecto en la columna descripcion='.$newdescripcion);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->descripcion=$newdescripcion;
			$this->setIsChanged(true);
		}
	}
    
	public function setnro_nit(?string $newnro_nit) {
		if($this->nro_nit!==$newnro_nit) {

				if(strlen($newnro_nit)>30) {
					try {
						throw new Exception('asiento_predefinido:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=nro_nit en columna nro_nit');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newnro_nit,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('asiento_predefinido:Formato incorrecto en la columna nro_nit='.$newnro_nit);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->nro_nit=$newnro_nit;
			$this->setIsChanged(true);
		}
	}
    
	public function setreferencia(?string $newreferencia) {
		if($this->referencia!==$newreferencia) {

				if(strlen($newreferencia)>100) {
					try {
						throw new Exception('asiento_predefinido:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=referencia en columna referencia');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newreferencia,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('asiento_predefinido:Formato incorrecto en la columna referencia='.$newreferencia);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->referencia=$newreferencia;
			$this->setIsChanged(true);
		}
	}
	
	/*FKs*/
	
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

	public function getusuario() : ?usuario {
		return $this->usuario;
	}

	public function getmodulo() : ?modulo {
		return $this->modulo;
	}

	public function getfuente() : ?fuente {
		return $this->fuente;
	}

	public function getlibro_auxiliar() : ?libro_auxiliar {
		return $this->libro_auxiliar;
	}

	public function getcentro_costo() : ?centro_costo {
		return $this->centro_costo;
	}

	public function getdocumento_contable() : ?documento_contable {
		return $this->documento_contable;
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


	public  function  setusuario(?usuario $usuario) {
		try {
			$this->usuario=$usuario;
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


	public  function  setfuente(?fuente $fuente) {
		try {
			$this->fuente=$fuente;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setlibro_auxiliar(?libro_auxiliar $libro_auxiliar) {
		try {
			$this->libro_auxiliar=$libro_auxiliar;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setcentro_costo(?centro_costo $centro_costo) {
		try {
			$this->centro_costo=$centro_costo;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setdocumento_contable(?documento_contable $documento_contable) {
		try {
			$this->documento_contable=$documento_contable;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	public function getasiento_predefinido_detalles() : array {
		return $this->asientopredefinidodetalles;
	}

	public function getasientos() : array {
		return $this->asientos;
	}

	
	
	public  function  setasiento_predefinido_detalles(array $asientopredefinidodetalles) {
		try {
			$this->asientopredefinidodetalles=$asientopredefinidodetalles;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setasientos(array $asientos) {
		try {
			$this->asientos=$asientos;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_asiento_predefinidoValue(string $sKey,$oValue) {
		$this->map_asiento_predefinido[$sKey]=$oValue;
	}
	
	public function getMap_asiento_predefinidoValue(string $sKey) {
		return $this->map_asiento_predefinido[$sKey];
	}
	
	public function getasiento_predefinido_Original() : ?asiento_predefinido {
		return $this->asiento_predefinido_Original;
	}
	
	public function setasiento_predefinido_Original(asiento_predefinido $asiento_predefinido) {
		try {
			$this->asiento_predefinido_Original=$asiento_predefinido;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_asiento_predefinido() : array {
		return $this->map_asiento_predefinido;
	}

	public function setMap_asiento_predefinido(array $map_asiento_predefinido) {
		$this->map_asiento_predefinido = $map_asiento_predefinido;
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
