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
namespace com\bydan\contabilidad\inventario\kardex\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;
use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\general\estado\business\entity\estado;

class kardex extends GeneralEntity {

	/*GENERAL*/
	public static string $class='kardex';
	
	/*AUXILIARES*/
	public ?kardex $kardex_Original=null;	
	public ?GeneralEntity $kardex_Additional=null;
	public array $map_kardex=array();	
		
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

	public int $id_tipo_kardex = -1;
	public string $id_tipo_kardex_Descripcion = '';

	public string $numero = '';
	public string $numero_documento = '';
	public ?int $id_proveedor = null;
	public string $id_proveedor_Descripcion = '';

	public ?int $id_cliente = null;
	public string $id_cliente_Descripcion = '';

	public float $total = 0.0;
	public string $descripcion = '';
	public int $id_estado = -1;
	public string $id_estado_Descripcion = '';

	public float $costo = 0.0;
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	public ?sucursal $sucursal = null;
	public ?ejercicio $ejercicio = null;
	public ?periodo $periodo = null;
	public ?usuario $usuario = null;
	public ?modulo $modulo = null;
	public ?tipo_kardex $tipo_kardex = null;
	public ?proveedor $proveedor = null;
	public ?cliente $cliente = null;
	public ?estado $estado = null;
	
	/*RELACIONES*/
	
	public array $kardexdetalles = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->kardex_Original=$this;
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

 		$this->id_tipo_kardex=-1;
		$this->id_tipo_kardex_Descripcion='';

 		$this->numero='';
 		$this->numero_documento='';
 		$this->id_proveedor=null;
		$this->id_proveedor_Descripcion='';

 		$this->id_cliente=null;
		$this->id_cliente_Descripcion='';

 		$this->total=0.0;
 		$this->descripcion='';
 		$this->id_estado=-1;
		$this->id_estado_Descripcion='';

 		$this->costo=0.0;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
			$this->sucursal=new sucursal();
			$this->ejercicio=new ejercicio();
			$this->periodo=new periodo();
			$this->usuario=new usuario();
			$this->modulo=new modulo();
			$this->tipo_kardex=new tipo_kardex();
			$this->proveedor=new proveedor();
			$this->cliente=new cliente();
			$this->estado=new estado();
		}
		
		/*RELACIONES*/
		
		$this->kardexdetalles=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->kardex_Additional=new kardex_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_kardex() {
		$this->map_kardex = array();
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
    
	public function  getid_tipo_kardex() : ?int {
		return $this->id_tipo_kardex;
	}
	
	public function  getid_tipo_kardex_Descripcion() : string {
		return $this->id_tipo_kardex_Descripcion;
	}
    
	public function  getnumero() : ?string {
		return $this->numero;
	}
    
	public function  getnumero_documento() : ?string {
		return $this->numero_documento;
	}
    
	public function  getid_proveedor() : ?int {
		return $this->id_proveedor;
	}
	
	public function  getid_proveedor_Descripcion() : string {
		return $this->id_proveedor_Descripcion;
	}
    
	public function  getid_cliente() : ?int {
		return $this->id_cliente;
	}
	
	public function  getid_cliente_Descripcion() : string {
		return $this->id_cliente_Descripcion;
	}
    
	public function  gettotal() : ?float {
		return $this->total;
	}
    
	public function  getdescripcion() : ?string {
		return $this->descripcion;
	}
    
	public function  getid_estado() : ?int {
		return $this->id_estado;
	}
	
	public function  getid_estado_Descripcion() : string {
		return $this->id_estado_Descripcion;
	}
    
	public function  getcosto() : ?float {
		return $this->costo;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('kardex:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('kardex:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('kardex:Valor nulo no permitido en columna id_empresa');
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
					throw new Exception('kardex:Valor nulo no permitido en columna id_sucursal');
				}

				if($newid_sucursal!==null && filter_var($newid_sucursal,FILTER_VALIDATE_INT)===false) {
					throw new Exception('kardex:No es numero entero - id_sucursal='.$newid_sucursal);
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
					throw new Exception('kardex:Valor nulo no permitido en columna id_sucursal');
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
					throw new Exception('kardex:Valor nulo no permitido en columna id_ejercicio');
				}

				if($newid_ejercicio!==null && filter_var($newid_ejercicio,FILTER_VALIDATE_INT)===false) {
					throw new Exception('kardex:No es numero entero - id_ejercicio='.$newid_ejercicio);
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
					throw new Exception('kardex:Valor nulo no permitido en columna id_ejercicio');
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
					throw new Exception('kardex:Valor nulo no permitido en columna id_periodo');
				}

				if($newid_periodo!==null && filter_var($newid_periodo,FILTER_VALIDATE_INT)===false) {
					throw new Exception('kardex:No es numero entero - id_periodo='.$newid_periodo);
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
					throw new Exception('kardex:Valor nulo no permitido en columna id_periodo');
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
					throw new Exception('kardex:Valor nulo no permitido en columna id_usuario');
				}

				if($newid_usuario!==null && filter_var($newid_usuario,FILTER_VALIDATE_INT)===false) {
					throw new Exception('kardex:No es numero entero - id_usuario='.$newid_usuario);
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
					throw new Exception('kardex:Valor nulo no permitido en columna id_usuario');
				}

				$this->id_usuario_Descripcion=$newid_usuario_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_modulo(?int $newid_modulo) {
		if($this->id_modulo!==$newid_modulo) {

				if($newid_modulo!==null && filter_var($newid_modulo,FILTER_VALIDATE_INT)===false) {
					throw new Exception('kardex:No es numero entero - id_modulo');
				}

			$this->id_modulo=$newid_modulo;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_modulo_Descripcion(string $newid_modulo_Descripcion) {
		if($this->id_modulo_Descripcion!=$newid_modulo_Descripcion) {

			$this->id_modulo_Descripcion=$newid_modulo_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function setid_tipo_kardex(?int $newid_tipo_kardex)
	{
		try {
			if($this->id_tipo_kardex!==$newid_tipo_kardex) {
				if($newid_tipo_kardex===null && $newid_tipo_kardex!='') {
					throw new Exception('kardex:Valor nulo no permitido en columna id_tipo_kardex');
				}

				if($newid_tipo_kardex!==null && filter_var($newid_tipo_kardex,FILTER_VALIDATE_INT)===false) {
					throw new Exception('kardex:No es numero entero - id_tipo_kardex='.$newid_tipo_kardex);
				}

				$this->id_tipo_kardex=$newid_tipo_kardex;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_tipo_kardex_Descripcion(string $newid_tipo_kardex_Descripcion)
	{
		try {
			if($this->id_tipo_kardex_Descripcion!=$newid_tipo_kardex_Descripcion) {
				if($newid_tipo_kardex_Descripcion===null && $newid_tipo_kardex_Descripcion!='') {
					throw new Exception('kardex:Valor nulo no permitido en columna id_tipo_kardex');
				}

				$this->id_tipo_kardex_Descripcion=$newid_tipo_kardex_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnumero(?string $newnumero)
	{
		try {
			if($this->numero!==$newnumero) {
				if($newnumero===null && $newnumero!='') {
					throw new Exception('kardex:Valor nulo no permitido en columna numero');
				}

				if(strlen($newnumero)>10) {
					throw new Exception('kardex:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=10 en columna numero');
				}

				if(filter_var($newnumero,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('kardex:Formato incorrecto en columna numero='.$newnumero);
				}

				$this->numero=$newnumero;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnumero_documento(?string $newnumero_documento) {
		if($this->numero_documento!==$newnumero_documento) {

				if(strlen($newnumero_documento)>30) {
					try {
						throw new Exception('kardex:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=numero_documento en columna numero_documento');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newnumero_documento,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('kardex:Formato incorrecto en la columna numero_documento='.$newnumero_documento);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->numero_documento=$newnumero_documento;
			$this->setIsChanged(true);
		}
	}
    
	public function setid_proveedor(?int $newid_proveedor) {
		if($this->id_proveedor!==$newid_proveedor) {

				if($newid_proveedor!==null && filter_var($newid_proveedor,FILTER_VALIDATE_INT)===false) {
					throw new Exception('kardex:No es numero entero - id_proveedor');
				}

			$this->id_proveedor=$newid_proveedor;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_proveedor_Descripcion(string $newid_proveedor_Descripcion) {
		if($this->id_proveedor_Descripcion!=$newid_proveedor_Descripcion) {

			$this->id_proveedor_Descripcion=$newid_proveedor_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function setid_cliente(?int $newid_cliente) {
		if($this->id_cliente!==$newid_cliente) {

				if($newid_cliente!==null && filter_var($newid_cliente,FILTER_VALIDATE_INT)===false) {
					throw new Exception('kardex:No es numero entero - id_cliente');
				}

			$this->id_cliente=$newid_cliente;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_cliente_Descripcion(string $newid_cliente_Descripcion) {
		if($this->id_cliente_Descripcion!=$newid_cliente_Descripcion) {

			$this->id_cliente_Descripcion=$newid_cliente_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function settotal(?float $newtotal)
	{
		try {
			if($this->total!==$newtotal) {
				if($newtotal===null && $newtotal!='') {
					throw new Exception('kardex:Valor nulo no permitido en columna total');
				}

				if($newtotal!=0) {
					if($newtotal!==null && filter_var($newtotal,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('kardex:No es numero decimal - total='.$newtotal);
					}
				}

				$this->total=$newtotal;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdescripcion(?string $newdescripcion) {
		if($this->descripcion!==$newdescripcion) {

				if(strlen($newdescripcion)>200) {
					try {
						throw new Exception('kardex:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=descripcion en columna descripcion');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newdescripcion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('kardex:Formato incorrecto en la columna descripcion='.$newdescripcion);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->descripcion=$newdescripcion;
			$this->setIsChanged(true);
		}
	}
    
	public function setid_estado(?int $newid_estado)
	{
		try {
			if($this->id_estado!==$newid_estado) {
				if($newid_estado===null && $newid_estado!='') {
					throw new Exception('kardex:Valor nulo no permitido en columna id_estado');
				}

				if($newid_estado!==null && filter_var($newid_estado,FILTER_VALIDATE_INT)===false) {
					throw new Exception('kardex:No es numero entero - id_estado='.$newid_estado);
				}

				$this->id_estado=$newid_estado;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_estado_Descripcion(string $newid_estado_Descripcion)
	{
		try {
			if($this->id_estado_Descripcion!=$newid_estado_Descripcion) {
				if($newid_estado_Descripcion===null && $newid_estado_Descripcion!='') {
					throw new Exception('kardex:Valor nulo no permitido en columna id_estado');
				}

				$this->id_estado_Descripcion=$newid_estado_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcosto(?float $newcosto)
	{
		try {
			if($this->costo!==$newcosto) {
				if($newcosto===null && $newcosto!='') {
					throw new Exception('kardex:Valor nulo no permitido en columna costo');
				}

				if($newcosto!=0) {
					if($newcosto!==null && filter_var($newcosto,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('kardex:No es numero decimal - costo='.$newcosto);
					}
				}

				$this->costo=$newcosto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
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

	public function gettipo_kardex() : ?tipo_kardex {
		return $this->tipo_kardex;
	}

	public function getproveedor() : ?proveedor {
		return $this->proveedor;
	}

	public function getcliente() : ?cliente {
		return $this->cliente;
	}

	public function getestado() : ?estado {
		return $this->estado;
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


	public  function  settipo_kardex(?tipo_kardex $tipo_kardex) {
		try {
			$this->tipo_kardex=$tipo_kardex;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setproveedor(?proveedor $proveedor) {
		try {
			$this->proveedor=$proveedor;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setcliente(?cliente $cliente) {
		try {
			$this->cliente=$cliente;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setestado(?estado $estado) {
		try {
			$this->estado=$estado;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	public function getkardex_detalles() : array {
		return $this->kardexdetalles;
	}

	
	
	public  function  setkardex_detalles(array $kardexdetalles) {
		try {
			$this->kardexdetalles=$kardexdetalles;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_kardexValue(string $sKey,$oValue) {
		$this->map_kardex[$sKey]=$oValue;
	}
	
	public function getMap_kardexValue(string $sKey) {
		return $this->map_kardex[$sKey];
	}
	
	public function getkardex_Original() : ?kardex {
		return $this->kardex_Original;
	}
	
	public function setkardex_Original(kardex $kardex) {
		try {
			$this->kardex_Original=$kardex;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_kardex() : array {
		return $this->map_kardex;
	}

	public function setMap_kardex(array $map_kardex) {
		$this->map_kardex = $map_kardex;
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
