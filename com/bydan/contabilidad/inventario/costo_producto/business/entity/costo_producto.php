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
namespace com\bydan\contabilidad\inventario\costo_producto\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;
use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
use com\bydan\contabilidad\general\tabla\business\entity\tabla;

class costo_producto extends GeneralEntity {

	/*GENERAL*/
	public static string $class='costo_producto';
	
	/*AUXILIARES*/
	public ?costo_producto $costo_producto_Original=null;	
	public ?GeneralEntity $costo_producto_Additional=null;
	public array $map_costo_producto=array();	
		
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

	public int $id_producto = -1;
	public string $id_producto_Descripcion = '';

	public int $id_tabla = -1;
	public string $id_tabla_Descripcion = '';

	public int $idn_origen = 0;
	public int $idn_detalle_origen = 0;
	public string $nro_documento = '';
	public string $fecha = '';
	public float $cantidad = 0.0;
	public float $costo_unitario = 0.0;
	public float $costo_total = 0.0;
	public float $cantidad_origen = 0.0;
	public float $costo_unitario_origen = 0.0;
	public float $costo_total_origen = 0.0;
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	public ?sucursal $sucursal = null;
	public ?ejercicio $ejercicio = null;
	public ?periodo $periodo = null;
	public ?usuario $usuario = null;
	public ?producto $producto = null;
	public ?tabla $tabla = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->costo_producto_Original=$this;
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

 		$this->id_producto=-1;
		$this->id_producto_Descripcion='';

 		$this->id_tabla=-1;
		$this->id_tabla_Descripcion='';

 		$this->idn_origen=0;
 		$this->idn_detalle_origen=0;
 		$this->nro_documento='';
 		$this->fecha=date('Y-m-d');
 		$this->cantidad=0.0;
 		$this->costo_unitario=0.0;
 		$this->costo_total=0.0;
 		$this->cantidad_origen=0.0;
 		$this->costo_unitario_origen=0.0;
 		$this->costo_total_origen=0.0;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
			$this->sucursal=new sucursal();
			$this->ejercicio=new ejercicio();
			$this->periodo=new periodo();
			$this->usuario=new usuario();
			$this->producto=new producto();
			$this->tabla=new tabla();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->costo_producto_Additional=new costo_producto_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_costo_producto() {
		$this->map_costo_producto = array();
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
    
	public function  getid_producto() : ?int {
		return $this->id_producto;
	}
	
	public function  getid_producto_Descripcion() : string {
		return $this->id_producto_Descripcion;
	}
    
	public function  getid_tabla() : ?int {
		return $this->id_tabla;
	}
	
	public function  getid_tabla_Descripcion() : string {
		return $this->id_tabla_Descripcion;
	}
    
	public function  getidn_origen() : ?int {
		return $this->idn_origen;
	}
    
	public function  getidn_detalle_origen() : ?int {
		return $this->idn_detalle_origen;
	}
    
	public function  getnro_documento() : ?string {
		return $this->nro_documento;
	}
    
	public function  getfecha() : ?string {
		return $this->fecha;
	}
    
	public function  getcantidad() : ?float {
		return $this->cantidad;
	}
    
	public function  getcosto_unitario() : ?float {
		return $this->costo_unitario;
	}
    
	public function  getcosto_total() : ?float {
		return $this->costo_total;
	}
    
	public function  getcantidad_origen() : ?float {
		return $this->cantidad_origen;
	}
    
	public function  getcosto_unitario_origen() : ?float {
		return $this->costo_unitario_origen;
	}
    
	public function  getcosto_total_origen() : ?float {
		return $this->costo_total_origen;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('costo_producto:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('costo_producto:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('costo_producto:Valor nulo no permitido en columna id_empresa');
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
					throw new Exception('costo_producto:Valor nulo no permitido en columna id_sucursal');
				}

				if($newid_sucursal!==null && filter_var($newid_sucursal,FILTER_VALIDATE_INT)===false) {
					throw new Exception('costo_producto:No es numero entero - id_sucursal='.$newid_sucursal);
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
					throw new Exception('costo_producto:Valor nulo no permitido en columna id_sucursal');
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
					throw new Exception('costo_producto:Valor nulo no permitido en columna id_ejercicio');
				}

				if($newid_ejercicio!==null && filter_var($newid_ejercicio,FILTER_VALIDATE_INT)===false) {
					throw new Exception('costo_producto:No es numero entero - id_ejercicio='.$newid_ejercicio);
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
					throw new Exception('costo_producto:Valor nulo no permitido en columna id_ejercicio');
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
					throw new Exception('costo_producto:Valor nulo no permitido en columna id_periodo');
				}

				if($newid_periodo!==null && filter_var($newid_periodo,FILTER_VALIDATE_INT)===false) {
					throw new Exception('costo_producto:No es numero entero - id_periodo='.$newid_periodo);
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
					throw new Exception('costo_producto:Valor nulo no permitido en columna id_periodo');
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
					throw new Exception('costo_producto:Valor nulo no permitido en columna id_usuario');
				}

				if($newid_usuario!==null && filter_var($newid_usuario,FILTER_VALIDATE_INT)===false) {
					throw new Exception('costo_producto:No es numero entero - id_usuario='.$newid_usuario);
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
					throw new Exception('costo_producto:Valor nulo no permitido en columna id_usuario');
				}

				$this->id_usuario_Descripcion=$newid_usuario_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_producto(?int $newid_producto)
	{
		try {
			if($this->id_producto!==$newid_producto) {
				if($newid_producto===null && $newid_producto!='') {
					throw new Exception('costo_producto:Valor nulo no permitido en columna id_producto');
				}

				if($newid_producto!==null && filter_var($newid_producto,FILTER_VALIDATE_INT)===false) {
					throw new Exception('costo_producto:No es numero entero - id_producto='.$newid_producto);
				}

				$this->id_producto=$newid_producto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_producto_Descripcion(string $newid_producto_Descripcion)
	{
		try {
			if($this->id_producto_Descripcion!=$newid_producto_Descripcion) {
				if($newid_producto_Descripcion===null && $newid_producto_Descripcion!='') {
					throw new Exception('costo_producto:Valor nulo no permitido en columna id_producto');
				}

				$this->id_producto_Descripcion=$newid_producto_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_tabla(?int $newid_tabla)
	{
		try {
			if($this->id_tabla!==$newid_tabla) {
				if($newid_tabla===null && $newid_tabla!='') {
					throw new Exception('costo_producto:Valor nulo no permitido en columna id_tabla');
				}

				if($newid_tabla!==null && filter_var($newid_tabla,FILTER_VALIDATE_INT)===false) {
					throw new Exception('costo_producto:No es numero entero - id_tabla='.$newid_tabla);
				}

				$this->id_tabla=$newid_tabla;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_tabla_Descripcion(string $newid_tabla_Descripcion)
	{
		try {
			if($this->id_tabla_Descripcion!=$newid_tabla_Descripcion) {
				if($newid_tabla_Descripcion===null && $newid_tabla_Descripcion!='') {
					throw new Exception('costo_producto:Valor nulo no permitido en columna id_tabla');
				}

				$this->id_tabla_Descripcion=$newid_tabla_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setidn_origen(?int $newidn_origen)
	{
		try {
			if($this->idn_origen!==$newidn_origen) {
				if($newidn_origen===null && $newidn_origen!='') {
					throw new Exception('costo_producto:Valor nulo no permitido en columna idn_origen');
				}

				if($newidn_origen!==null && filter_var($newidn_origen,FILTER_VALIDATE_INT)===false) {
					throw new Exception('costo_producto:No es numero entero - idn_origen='.$newidn_origen);
				}

				$this->idn_origen=$newidn_origen;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setidn_detalle_origen(?int $newidn_detalle_origen)
	{
		try {
			if($this->idn_detalle_origen!==$newidn_detalle_origen) {
				if($newidn_detalle_origen===null && $newidn_detalle_origen!='') {
					throw new Exception('costo_producto:Valor nulo no permitido en columna idn_detalle_origen');
				}

				if($newidn_detalle_origen!==null && filter_var($newidn_detalle_origen,FILTER_VALIDATE_INT)===false) {
					throw new Exception('costo_producto:No es numero entero - idn_detalle_origen='.$newidn_detalle_origen);
				}

				$this->idn_detalle_origen=$newidn_detalle_origen;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnro_documento(?string $newnro_documento)
	{
		try {
			if($this->nro_documento!==$newnro_documento) {
				if($newnro_documento===null && $newnro_documento!='') {
					throw new Exception('costo_producto:Valor nulo no permitido en columna nro_documento');
				}

				if(strlen($newnro_documento)>10) {
					throw new Exception('costo_producto:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=10 en columna nro_documento');
				}

				if(filter_var($newnro_documento,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('costo_producto:Formato incorrecto en columna nro_documento='.$newnro_documento);
				}

				$this->nro_documento=$newnro_documento;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setfecha(?string $newfecha)
	{
		try {
			if($this->fecha!==$newfecha) {
				if($newfecha===null && $newfecha!='') {
					throw new Exception('costo_producto:Valor nulo no permitido en columna fecha');
				}

				if($newfecha!==null && filter_var($newfecha,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('costo_producto:No es fecha - fecha='.$newfecha);
				}

				$this->fecha=$newfecha;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcantidad(?float $newcantidad)
	{
		try {
			if($this->cantidad!==$newcantidad) {
				if($newcantidad===null && $newcantidad!='') {
					throw new Exception('costo_producto:Valor nulo no permitido en columna cantidad');
				}

				if($newcantidad!=0) {
					if($newcantidad!==null && filter_var($newcantidad,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('costo_producto:No es numero decimal - cantidad='.$newcantidad);
					}
				}

				$this->cantidad=$newcantidad;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcosto_unitario(?float $newcosto_unitario)
	{
		try {
			if($this->costo_unitario!==$newcosto_unitario) {
				if($newcosto_unitario===null && $newcosto_unitario!='') {
					throw new Exception('costo_producto:Valor nulo no permitido en columna costo_unitario');
				}

				if($newcosto_unitario!=0) {
					if($newcosto_unitario!==null && filter_var($newcosto_unitario,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('costo_producto:No es numero decimal - costo_unitario='.$newcosto_unitario);
					}
				}

				$this->costo_unitario=$newcosto_unitario;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcosto_total(?float $newcosto_total)
	{
		try {
			if($this->costo_total!==$newcosto_total) {
				if($newcosto_total===null && $newcosto_total!='') {
					throw new Exception('costo_producto:Valor nulo no permitido en columna costo_total');
				}

				if($newcosto_total!=0) {
					if($newcosto_total!==null && filter_var($newcosto_total,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('costo_producto:No es numero decimal - costo_total='.$newcosto_total);
					}
				}

				$this->costo_total=$newcosto_total;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcantidad_origen(?float $newcantidad_origen)
	{
		try {
			if($this->cantidad_origen!==$newcantidad_origen) {
				if($newcantidad_origen===null && $newcantidad_origen!='') {
					throw new Exception('costo_producto:Valor nulo no permitido en columna cantidad_origen');
				}

				if($newcantidad_origen!=0) {
					if($newcantidad_origen!==null && filter_var($newcantidad_origen,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('costo_producto:No es numero decimal - cantidad_origen='.$newcantidad_origen);
					}
				}

				$this->cantidad_origen=$newcantidad_origen;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcosto_unitario_origen(?float $newcosto_unitario_origen)
	{
		try {
			if($this->costo_unitario_origen!==$newcosto_unitario_origen) {
				if($newcosto_unitario_origen===null && $newcosto_unitario_origen!='') {
					throw new Exception('costo_producto:Valor nulo no permitido en columna costo_unitario_origen');
				}

				if($newcosto_unitario_origen!=0) {
					if($newcosto_unitario_origen!==null && filter_var($newcosto_unitario_origen,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('costo_producto:No es numero decimal - costo_unitario_origen='.$newcosto_unitario_origen);
					}
				}

				$this->costo_unitario_origen=$newcosto_unitario_origen;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcosto_total_origen(?float $newcosto_total_origen)
	{
		try {
			if($this->costo_total_origen!==$newcosto_total_origen) {
				if($newcosto_total_origen===null && $newcosto_total_origen!='') {
					throw new Exception('costo_producto:Valor nulo no permitido en columna costo_total_origen');
				}

				if($newcosto_total_origen!=0) {
					if($newcosto_total_origen!==null && filter_var($newcosto_total_origen,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('costo_producto:No es numero decimal - costo_total_origen='.$newcosto_total_origen);
					}
				}

				$this->costo_total_origen=$newcosto_total_origen;
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

	public function getproducto() : ?producto {
		return $this->producto;
	}

	public function gettabla() : ?tabla {
		return $this->tabla;
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


	public  function  setproducto(?producto $producto) {
		try {
			$this->producto=$producto;
		} catch(Exception $e) {
			;
		}
	}


	public  function  settabla(?tabla $tabla) {
		try {
			$this->tabla=$tabla;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_costo_productoValue(string $sKey,$oValue) {
		$this->map_costo_producto[$sKey]=$oValue;
	}
	
	public function getMap_costo_productoValue(string $sKey) {
		return $this->map_costo_producto[$sKey];
	}
	
	public function getcosto_producto_Original() : ?costo_producto {
		return $this->costo_producto_Original;
	}
	
	public function setcosto_producto_Original(costo_producto $costo_producto) {
		try {
			$this->costo_producto_Original=$costo_producto;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_costo_producto() : array {
		return $this->map_costo_producto;
	}

	public function setMap_costo_producto(array $map_costo_producto) {
		$this->map_costo_producto = $map_costo_producto;
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
