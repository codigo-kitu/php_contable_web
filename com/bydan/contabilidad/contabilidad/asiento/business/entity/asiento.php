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
namespace com\bydan\contabilidad\contabilidad\asiento\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;
use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
use com\bydan\contabilidad\general\estado\business\entity\estado;

class asiento extends GeneralEntity {

	/*GENERAL*/
	public static string $class='asiento';
	
	/*AUXILIARES*/
	public ?asiento $asiento_Original=null;	
	public ?GeneralEntity $asiento_Additional=null;
	public array $map_asiento=array();	
		
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

	public string $numero = '';
	public string $fecha = '';
	public ?int $id_asiento_predefinido = null;
	public string $id_asiento_predefinido_Descripcion = '';

	public int $id_documento_contable = -1;
	public string $id_documento_contable_Descripcion = '';

	public int $id_libro_auxiliar = -1;
	public string $id_libro_auxiliar_Descripcion = '';

	public int $id_fuente = -1;
	public string $id_fuente_Descripcion = '';

	public int $id_centro_costo = -1;
	public string $id_centro_costo_Descripcion = '';

	public string $descripcion = '';
	public float $total_debito = 0.0;
	public float $total_credito = 0.0;
	public float $diferencia = 0.0;
	public int $id_estado = -1;
	public string $id_estado_Descripcion = '';

	public ?int $id_documento_contable_origen = null;
	public string $id_documento_contable_origen_Descripcion = '';

	public float $valor = 0.0;
	public string $nro_nit = '';
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	public ?sucursal $sucursal = null;
	public ?ejercicio $ejercicio = null;
	public ?periodo $periodo = null;
	public ?usuario $usuario = null;
	public ?asiento_predefinido $asiento_predefinido = null;
	public ?documento_contable $documento_contable = null;
	public ?libro_auxiliar $libro_auxiliar = null;
	public ?fuente $fuente = null;
	public ?centro_costo $centro_costo = null;
	public ?estado $estado = null;
	public ?documento_contable $documento_contable_origen = null;
	
	/*RELACIONES*/
	
	public array $asientodetalles = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->asiento_Original=$this;
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

 		$this->numero='';
 		$this->fecha=date('Y-m-d');
 		$this->id_asiento_predefinido=null;
		$this->id_asiento_predefinido_Descripcion='';

 		$this->id_documento_contable=-1;
		$this->id_documento_contable_Descripcion='';

 		$this->id_libro_auxiliar=-1;
		$this->id_libro_auxiliar_Descripcion='';

 		$this->id_fuente=-1;
		$this->id_fuente_Descripcion='';

 		$this->id_centro_costo=-1;
		$this->id_centro_costo_Descripcion='';

 		$this->descripcion='';
 		$this->total_debito=0.0;
 		$this->total_credito=0.0;
 		$this->diferencia=0.0;
 		$this->id_estado=-1;
		$this->id_estado_Descripcion='';

 		$this->id_documento_contable_origen=null;
		$this->id_documento_contable_origen_Descripcion='';

 		$this->valor=0.0;
 		$this->nro_nit='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
			$this->sucursal=new sucursal();
			$this->ejercicio=new ejercicio();
			$this->periodo=new periodo();
			$this->usuario=new usuario();
			$this->asiento_predefinido=new asiento_predefinido();
			$this->documento_contable=new documento_contable();
			$this->libro_auxiliar=new libro_auxiliar();
			$this->fuente=new fuente();
			$this->centro_costo=new centro_costo();
			$this->estado=new estado();
			$this->documento_contable_origen=new documento_contable();
		}
		
		/*RELACIONES*/
		
		$this->asientodetalles=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->asiento_Additional=new asiento_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_asiento() {
		$this->map_asiento = array();
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
    
	public function  getnumero() : ?string {
		return $this->numero;
	}
    
	public function  getfecha() : ?string {
		return $this->fecha;
	}
    
	public function  getid_asiento_predefinido() : ?int {
		return $this->id_asiento_predefinido;
	}
	
	public function  getid_asiento_predefinido_Descripcion() : string {
		return $this->id_asiento_predefinido_Descripcion;
	}
    
	public function  getid_documento_contable() : ?int {
		return $this->id_documento_contable;
	}
	
	public function  getid_documento_contable_Descripcion() : string {
		return $this->id_documento_contable_Descripcion;
	}
    
	public function  getid_libro_auxiliar() : ?int {
		return $this->id_libro_auxiliar;
	}
	
	public function  getid_libro_auxiliar_Descripcion() : string {
		return $this->id_libro_auxiliar_Descripcion;
	}
    
	public function  getid_fuente() : ?int {
		return $this->id_fuente;
	}
	
	public function  getid_fuente_Descripcion() : string {
		return $this->id_fuente_Descripcion;
	}
    
	public function  getid_centro_costo() : ?int {
		return $this->id_centro_costo;
	}
	
	public function  getid_centro_costo_Descripcion() : string {
		return $this->id_centro_costo_Descripcion;
	}
    
	public function  getdescripcion() : ?string {
		return $this->descripcion;
	}
    
	public function  gettotal_debito() : ?float {
		return $this->total_debito;
	}
    
	public function  gettotal_credito() : ?float {
		return $this->total_credito;
	}
    
	public function  getdiferencia() : ?float {
		return $this->diferencia;
	}
    
	public function  getid_estado() : ?int {
		return $this->id_estado;
	}
	
	public function  getid_estado_Descripcion() : string {
		return $this->id_estado_Descripcion;
	}
    
	public function  getid_documento_contable_origen() : ?int {
		return $this->id_documento_contable_origen;
	}
	
	public function  getid_documento_contable_origen_Descripcion() : string {
		return $this->id_documento_contable_origen_Descripcion;
	}
    
	public function  getvalor() : ?float {
		return $this->valor;
	}
    
	public function  getnro_nit() : ?string {
		return $this->nro_nit;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('asiento:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('asiento:Valor nulo no permitido en columna id_empresa');
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
					throw new Exception('asiento:Valor nulo no permitido en columna id_sucursal');
				}

				if($newid_sucursal!==null && filter_var($newid_sucursal,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento:No es numero entero - id_sucursal='.$newid_sucursal);
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
					throw new Exception('asiento:Valor nulo no permitido en columna id_sucursal');
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
					throw new Exception('asiento:Valor nulo no permitido en columna id_ejercicio');
				}

				if($newid_ejercicio!==null && filter_var($newid_ejercicio,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento:No es numero entero - id_ejercicio='.$newid_ejercicio);
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
					throw new Exception('asiento:Valor nulo no permitido en columna id_ejercicio');
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
					throw new Exception('asiento:Valor nulo no permitido en columna id_periodo');
				}

				if($newid_periodo!==null && filter_var($newid_periodo,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento:No es numero entero - id_periodo='.$newid_periodo);
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
					throw new Exception('asiento:Valor nulo no permitido en columna id_periodo');
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
					throw new Exception('asiento:Valor nulo no permitido en columna id_usuario');
				}

				if($newid_usuario!==null && filter_var($newid_usuario,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento:No es numero entero - id_usuario='.$newid_usuario);
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
					throw new Exception('asiento:Valor nulo no permitido en columna id_usuario');
				}

				$this->id_usuario_Descripcion=$newid_usuario_Descripcion;
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
					throw new Exception('asiento:Valor nulo no permitido en columna numero');
				}

				if(strlen($newnumero)>10) {
					throw new Exception('asiento:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=10 en columna numero');
				}

				if(filter_var($newnumero,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('asiento:Formato incorrecto en columna numero='.$newnumero);
				}

				$this->numero=$newnumero;
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
					throw new Exception('asiento:Valor nulo no permitido en columna fecha');
				}

				if($newfecha!==null && filter_var($newfecha,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('asiento:No es fecha - fecha='.$newfecha);
				}

				$this->fecha=$newfecha;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_asiento_predefinido(?int $newid_asiento_predefinido) {
		if($this->id_asiento_predefinido!==$newid_asiento_predefinido) {

				if($newid_asiento_predefinido!==null && filter_var($newid_asiento_predefinido,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento:No es numero entero - id_asiento_predefinido');
				}

			$this->id_asiento_predefinido=$newid_asiento_predefinido;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_asiento_predefinido_Descripcion(string $newid_asiento_predefinido_Descripcion) {
		if($this->id_asiento_predefinido_Descripcion!=$newid_asiento_predefinido_Descripcion) {

			$this->id_asiento_predefinido_Descripcion=$newid_asiento_predefinido_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function setid_documento_contable(?int $newid_documento_contable)
	{
		try {
			if($this->id_documento_contable!==$newid_documento_contable) {
				if($newid_documento_contable===null && $newid_documento_contable!='') {
					throw new Exception('asiento:Valor nulo no permitido en columna id_documento_contable');
				}

				if($newid_documento_contable!==null && filter_var($newid_documento_contable,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento:No es numero entero - id_documento_contable='.$newid_documento_contable);
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
					throw new Exception('asiento:Valor nulo no permitido en columna id_documento_contable');
				}

				$this->id_documento_contable_Descripcion=$newid_documento_contable_Descripcion;
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
					throw new Exception('asiento:Valor nulo no permitido en columna id_libro_auxiliar');
				}

				if($newid_libro_auxiliar!==null && filter_var($newid_libro_auxiliar,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento:No es numero entero - id_libro_auxiliar='.$newid_libro_auxiliar);
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
					throw new Exception('asiento:Valor nulo no permitido en columna id_libro_auxiliar');
				}

				$this->id_libro_auxiliar_Descripcion=$newid_libro_auxiliar_Descripcion;
				//$this->setIsChanged(true);
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
					throw new Exception('asiento:Valor nulo no permitido en columna id_fuente');
				}

				if($newid_fuente!==null && filter_var($newid_fuente,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento:No es numero entero - id_fuente='.$newid_fuente);
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
					throw new Exception('asiento:Valor nulo no permitido en columna id_fuente');
				}

				$this->id_fuente_Descripcion=$newid_fuente_Descripcion;
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
					throw new Exception('asiento:Valor nulo no permitido en columna id_centro_costo');
				}

				if($newid_centro_costo!==null && filter_var($newid_centro_costo,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento:No es numero entero - id_centro_costo='.$newid_centro_costo);
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
					throw new Exception('asiento:Valor nulo no permitido en columna id_centro_costo');
				}

				$this->id_centro_costo_Descripcion=$newid_centro_costo_Descripcion;
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
						throw new Exception('asiento:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=descripcion en columna descripcion');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newdescripcion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('asiento:Formato incorrecto en la columna descripcion='.$newdescripcion);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->descripcion=$newdescripcion;
			$this->setIsChanged(true);
		}
	}
    
	public function settotal_debito(?float $newtotal_debito)
	{
		try {
			if($this->total_debito!==$newtotal_debito) {
				if($newtotal_debito===null && $newtotal_debito!='') {
					throw new Exception('asiento:Valor nulo no permitido en columna total_debito');
				}

				if($newtotal_debito!=0) {
					if($newtotal_debito!==null && filter_var($newtotal_debito,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('asiento:No es numero decimal - total_debito='.$newtotal_debito);
					}
				}

				$this->total_debito=$newtotal_debito;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function settotal_credito(?float $newtotal_credito)
	{
		try {
			if($this->total_credito!==$newtotal_credito) {
				if($newtotal_credito===null && $newtotal_credito!='') {
					throw new Exception('asiento:Valor nulo no permitido en columna total_credito');
				}

				if($newtotal_credito!=0) {
					if($newtotal_credito!==null && filter_var($newtotal_credito,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('asiento:No es numero decimal - total_credito='.$newtotal_credito);
					}
				}

				$this->total_credito=$newtotal_credito;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdiferencia(?float $newdiferencia)
	{
		try {
			if($this->diferencia!==$newdiferencia) {
				if($newdiferencia===null && $newdiferencia!='') {
					throw new Exception('asiento:Valor nulo no permitido en columna diferencia');
				}

				if($newdiferencia!=0) {
					if($newdiferencia!==null && filter_var($newdiferencia,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('asiento:No es numero decimal - diferencia='.$newdiferencia);
					}
				}

				$this->diferencia=$newdiferencia;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_estado(?int $newid_estado)
	{
		try {
			if($this->id_estado!==$newid_estado) {
				if($newid_estado===null && $newid_estado!='') {
					throw new Exception('asiento:Valor nulo no permitido en columna id_estado');
				}

				if($newid_estado!==null && filter_var($newid_estado,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento:No es numero entero - id_estado='.$newid_estado);
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
					throw new Exception('asiento:Valor nulo no permitido en columna id_estado');
				}

				$this->id_estado_Descripcion=$newid_estado_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_documento_contable_origen(?int $newid_documento_contable_origen) {
		if($this->id_documento_contable_origen!==$newid_documento_contable_origen) {

				if($newid_documento_contable_origen!==null && filter_var($newid_documento_contable_origen,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento:No es numero entero - id_documento_contable_origen');
				}

			$this->id_documento_contable_origen=$newid_documento_contable_origen;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_documento_contable_origen_Descripcion(string $newid_documento_contable_origen_Descripcion) {
		if($this->id_documento_contable_origen_Descripcion!=$newid_documento_contable_origen_Descripcion) {

			$this->id_documento_contable_origen_Descripcion=$newid_documento_contable_origen_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function setvalor(?float $newvalor)
	{
		try {
			if($this->valor!==$newvalor) {
				if($newvalor===null && $newvalor!='') {
					throw new Exception('asiento:Valor nulo no permitido en columna valor');
				}

				if($newvalor!=0) {
					if($newvalor!==null && filter_var($newvalor,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('asiento:No es numero decimal - valor='.$newvalor);
					}
				}

				$this->valor=$newvalor;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnro_nit(?string $newnro_nit) {
		if($this->nro_nit!==$newnro_nit) {

				if(strlen($newnro_nit)>30) {
					try {
						throw new Exception('asiento:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=nro_nit en columna nro_nit');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newnro_nit,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('asiento:Formato incorrecto en la columna nro_nit='.$newnro_nit);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->nro_nit=$newnro_nit;
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

	public function getasiento_predefinido() : ?asiento_predefinido {
		return $this->asiento_predefinido;
	}

	public function getdocumento_contable() : ?documento_contable {
		return $this->documento_contable;
	}

	public function getlibro_auxiliar() : ?libro_auxiliar {
		return $this->libro_auxiliar;
	}

	public function getfuente() : ?fuente {
		return $this->fuente;
	}

	public function getcentro_costo() : ?centro_costo {
		return $this->centro_costo;
	}

	public function getestado() : ?estado {
		return $this->estado;
	}

	public function getdocumento_contable_origen() : ?documento_contable {
		return $this->documento_contable_origen;
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


	public  function  setasiento_predefinido(?asiento_predefinido $asiento_predefinido) {
		try {
			$this->asiento_predefinido=$asiento_predefinido;
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


	public  function  setlibro_auxiliar(?libro_auxiliar $libro_auxiliar) {
		try {
			$this->libro_auxiliar=$libro_auxiliar;
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


	public  function  setcentro_costo(?centro_costo $centro_costo) {
		try {
			$this->centro_costo=$centro_costo;
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


	public  function  setdocumento_contable_origen(?documento_contable $documento_contable_origen) {
		try {
			$this->documento_contable_origen=$documento_contable_origen;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	public function getasiento_detalles() : array {
		return $this->asientodetalles;
	}

	
	
	public  function  setasiento_detalles(array $asientodetalles) {
		try {
			$this->asientodetalles=$asientodetalles;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_asientoValue(string $sKey,$oValue) {
		$this->map_asiento[$sKey]=$oValue;
	}
	
	public function getMap_asientoValue(string $sKey) {
		return $this->map_asiento[$sKey];
	}
	
	public function getasiento_Original() : ?asiento {
		return $this->asiento_Original;
	}
	
	public function setasiento_Original(asiento $asiento) {
		try {
			$this->asiento_Original=$asiento;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_asiento() : array {
		return $this->map_asiento;
	}

	public function setMap_asiento(array $map_asiento) {
		$this->map_asiento = $map_asiento;
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
