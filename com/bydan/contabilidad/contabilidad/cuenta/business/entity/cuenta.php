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
namespace com\bydan\contabilidad\contabilidad\cuenta\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;

class cuenta extends GeneralEntity {

	/*GENERAL*/
	public static string $class='cuenta';
	
	/*AUXILIARES*/
	public ?cuenta $cuenta_Original=null;	
	public ?GeneralEntity $cuenta_Additional=null;
	public array $map_cuenta=array();	
		
	/*CAMPOS*/
	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public int $id_tipo_cuenta = -1;
	public string $id_tipo_cuenta_Descripcion = '';

	public int $id_tipo_nivel_cuenta = -1;
	public string $id_tipo_nivel_cuenta_Descripcion = '';

	public ?int $id_cuenta = null;
	public string $id_cuenta_Descripcion = '';

	public string $codigo = '';
	public string $nombre = '';
	public int $nivel_cuenta = 0;
	public bool $usa_monto_base = false;
	public float $monto_base = 0.0;
	public float $porcentaje_base = 0.0;
	public bool $con_centro_costos = false;
	public bool $con_ruc = false;
	public float $balance = 0.0;
	public string $descripcion = '';
	public bool $con_retencion = false;
	public float $valor_retencion = 0.0;
	public string $ultima_transaccion = '';
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	public ?tipo_cuenta $tipo_cuenta = null;
	public ?tipo_nivel_cuenta $tipo_nivel_cuenta = null;
	public ?cuenta $cuenta = null;
	
	/*RELACIONES*/
	
	public array $categoriacheques = array();
	public array $otroimpuesto_ventass = array();
	public array $impuesto_ventass = array();
	public array $cuentacorrientes = array();
	public array $producto_ventas = array();
	public array $instrumentopago_ventass = array();
	public array $listaproducto_ventas = array();
	public array $asientodetalles = array();
	public array $retencion_comprass = array();
	public array $retencionfuente_comprass = array();
	public array $cuentas = array();
	public array $proveedors = array();
	public array $formapagoclientes = array();
	public array $saldocuentas = array();
	public array $terminopagoproveedors = array();
	public array $retencionica_ventass = array();
	public array $asientopredefinidodetalles = array();
	public array $clientes = array();
	public array $asientoautomaticodetalles = array();
	public array $formapagoproveedors = array();
	public array $terminopagoclientes = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->cuenta_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->id_tipo_cuenta=-1;
		$this->id_tipo_cuenta_Descripcion='';

 		$this->id_tipo_nivel_cuenta=-1;
		$this->id_tipo_nivel_cuenta_Descripcion='';

 		$this->id_cuenta=null;
		$this->id_cuenta_Descripcion='';

 		$this->codigo='';
 		$this->nombre='';
 		$this->nivel_cuenta=0;
 		$this->usa_monto_base=false;
 		$this->monto_base=0.0;
 		$this->porcentaje_base=0.0;
 		$this->con_centro_costos=false;
 		$this->con_ruc=false;
 		$this->balance=0.0;
 		$this->descripcion='';
 		$this->con_retencion=false;
 		$this->valor_retencion=0.0;
 		$this->ultima_transaccion=date('Y-m-d');
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
			$this->tipo_cuenta=new tipo_cuenta();
			$this->tipo_nivel_cuenta=new tipo_nivel_cuenta();
		}
		
		/*RELACIONES*/
		
		$this->categoriacheques=array();
		$this->otroimpuesto_ventass=array();
		$this->impuesto_ventass=array();
		$this->cuentacorrientes=array();
		$this->producto_ventas=array();
		$this->instrumentopago_ventass=array();
		$this->listaproducto_ventas=array();
		$this->asientodetalles=array();
		$this->retencion_comprass=array();
		$this->retencionfuente_comprass=array();
		$this->cuentas=array();
		$this->proveedors=array();
		$this->formapagoclientes=array();
		$this->saldocuentas=array();
		$this->terminopagoproveedors=array();
		$this->retencionica_ventass=array();
		$this->asientopredefinidodetalles=array();
		$this->clientes=array();
		$this->asientoautomaticodetalles=array();
		$this->formapagoproveedors=array();
		$this->terminopagoclientes=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cuenta_Additional=new cuenta_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_cuenta() {
		$this->map_cuenta = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_empresa() : ?int {
		return $this->id_empresa;
	}
	
	public function  getid_empresa_Descripcion() : string {
		return $this->id_empresa_Descripcion;
	}
    
	public function  getid_tipo_cuenta() : ?int {
		return $this->id_tipo_cuenta;
	}
	
	public function  getid_tipo_cuenta_Descripcion() : string {
		return $this->id_tipo_cuenta_Descripcion;
	}
    
	public function  getid_tipo_nivel_cuenta() : ?int {
		return $this->id_tipo_nivel_cuenta;
	}
	
	public function  getid_tipo_nivel_cuenta_Descripcion() : string {
		return $this->id_tipo_nivel_cuenta_Descripcion;
	}
    
	public function  getid_cuenta() : ?int {
		return $this->id_cuenta;
	}
	
	public function  getid_cuenta_Descripcion() : string {
		return $this->id_cuenta_Descripcion;
	}
    
	public function  getcodigo() : ?string {
		return $this->codigo;
	}
    
	public function  getnombre() : ?string {
		return $this->nombre;
	}
    
	public function  getnivel_cuenta() : ?int {
		return $this->nivel_cuenta;
	}
    
	public function  getusa_monto_base() : ?bool {
		return $this->usa_monto_base;
	}
    
	public function  getmonto_base() : ?float {
		return $this->monto_base;
	}
    
	public function  getporcentaje_base() : ?float {
		return $this->porcentaje_base;
	}
    
	public function  getcon_centro_costos() : ?bool {
		return $this->con_centro_costos;
	}
    
	public function  getcon_ruc() : ?bool {
		return $this->con_ruc;
	}
    
	public function  getbalance() : ?float {
		return $this->balance;
	}
    
	public function  getdescripcion() : ?string {
		return $this->descripcion;
	}
    
	public function  getcon_retencion() : ?bool {
		return $this->con_retencion;
	}
    
	public function  getvalor_retencion() : ?float {
		return $this->valor_retencion;
	}
    
	public function  getultima_transaccion() : ?string {
		return $this->ultima_transaccion;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('cuenta:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('cuenta:Valor nulo no permitido en columna id_empresa');
				}

				$this->id_empresa_Descripcion=$newid_empresa_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_tipo_cuenta(?int $newid_tipo_cuenta)
	{
		try {
			if($this->id_tipo_cuenta!==$newid_tipo_cuenta) {
				if($newid_tipo_cuenta===null && $newid_tipo_cuenta!='') {
					throw new Exception('cuenta:Valor nulo no permitido en columna id_tipo_cuenta');
				}

				if($newid_tipo_cuenta!==null && filter_var($newid_tipo_cuenta,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta:No es numero entero - id_tipo_cuenta='.$newid_tipo_cuenta);
				}

				$this->id_tipo_cuenta=$newid_tipo_cuenta;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_tipo_cuenta_Descripcion(string $newid_tipo_cuenta_Descripcion)
	{
		try {
			if($this->id_tipo_cuenta_Descripcion!=$newid_tipo_cuenta_Descripcion) {
				if($newid_tipo_cuenta_Descripcion===null && $newid_tipo_cuenta_Descripcion!='') {
					throw new Exception('cuenta:Valor nulo no permitido en columna id_tipo_cuenta');
				}

				$this->id_tipo_cuenta_Descripcion=$newid_tipo_cuenta_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_tipo_nivel_cuenta(?int $newid_tipo_nivel_cuenta)
	{
		try {
			if($this->id_tipo_nivel_cuenta!==$newid_tipo_nivel_cuenta) {
				if($newid_tipo_nivel_cuenta===null && $newid_tipo_nivel_cuenta!='') {
					throw new Exception('cuenta:Valor nulo no permitido en columna id_tipo_nivel_cuenta');
				}

				if($newid_tipo_nivel_cuenta!==null && filter_var($newid_tipo_nivel_cuenta,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta:No es numero entero - id_tipo_nivel_cuenta='.$newid_tipo_nivel_cuenta);
				}

				$this->id_tipo_nivel_cuenta=$newid_tipo_nivel_cuenta;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_tipo_nivel_cuenta_Descripcion(string $newid_tipo_nivel_cuenta_Descripcion)
	{
		try {
			if($this->id_tipo_nivel_cuenta_Descripcion!=$newid_tipo_nivel_cuenta_Descripcion) {
				if($newid_tipo_nivel_cuenta_Descripcion===null && $newid_tipo_nivel_cuenta_Descripcion!='') {
					throw new Exception('cuenta:Valor nulo no permitido en columna id_tipo_nivel_cuenta');
				}

				$this->id_tipo_nivel_cuenta_Descripcion=$newid_tipo_nivel_cuenta_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_cuenta(?int $newid_cuenta) {
		if($this->id_cuenta!==$newid_cuenta) {

				if($newid_cuenta!==null && filter_var($newid_cuenta,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta:No es numero entero - id_cuenta');
				}

			$this->id_cuenta=$newid_cuenta;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_cuenta_Descripcion(string $newid_cuenta_Descripcion) {
		if($this->id_cuenta_Descripcion!=$newid_cuenta_Descripcion) {

			$this->id_cuenta_Descripcion=$newid_cuenta_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function setcodigo(?string $newcodigo)
	{
		try {
			if($this->codigo!==$newcodigo) {
				if($newcodigo===null && $newcodigo!='') {
					throw new Exception('cuenta:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>20) {
					throw new Exception('cuenta:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=20 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('cuenta:Formato incorrecto en columna codigo='.$newcodigo);
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
					throw new Exception('cuenta:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>60) {
					throw new Exception('cuenta:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=60 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('cuenta:Formato incorrecto en columna nombre='.$newnombre);
				}

				$this->nombre=$newnombre;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnivel_cuenta(?int $newnivel_cuenta)
	{
		try {
			if($this->nivel_cuenta!==$newnivel_cuenta) {
				if($newnivel_cuenta===null && $newnivel_cuenta!='') {
					throw new Exception('cuenta:Valor nulo no permitido en columna nivel_cuenta');
				}

				if($newnivel_cuenta!==null && filter_var($newnivel_cuenta,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta:No es numero entero - nivel_cuenta='.$newnivel_cuenta);
				}

				$this->nivel_cuenta=$newnivel_cuenta;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setusa_monto_base(?bool $newusa_monto_base)
	{
		try {
			if($this->usa_monto_base!==$newusa_monto_base) {
				if($newusa_monto_base===null && $newusa_monto_base!='') {
					throw new Exception('cuenta:Valor nulo no permitido en columna usa_monto_base');
				}

				if($newusa_monto_base!==null && filter_var($newusa_monto_base,FILTER_VALIDATE_BOOLEAN)===false && $newusa_monto_base!==0 && $newusa_monto_base!==false) {
					throw new Exception('cuenta:No es valor booleano - usa_monto_base='.$newusa_monto_base);
				}

				$this->usa_monto_base=$newusa_monto_base;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setmonto_base(?float $newmonto_base)
	{
		try {
			if($this->monto_base!==$newmonto_base) {
				if($newmonto_base===null && $newmonto_base!='') {
					throw new Exception('cuenta:Valor nulo no permitido en columna monto_base');
				}

				if($newmonto_base!=0) {
					if($newmonto_base!==null && filter_var($newmonto_base,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('cuenta:No es numero decimal - monto_base='.$newmonto_base);
					}
				}

				$this->monto_base=$newmonto_base;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setporcentaje_base(?float $newporcentaje_base)
	{
		try {
			if($this->porcentaje_base!==$newporcentaje_base) {
				if($newporcentaje_base===null && $newporcentaje_base!='') {
					throw new Exception('cuenta:Valor nulo no permitido en columna porcentaje_base');
				}

				if($newporcentaje_base!=0) {
					if($newporcentaje_base!==null && filter_var($newporcentaje_base,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('cuenta:No es numero decimal - porcentaje_base='.$newporcentaje_base);
					}
				}

				$this->porcentaje_base=$newporcentaje_base;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcon_centro_costos(?bool $newcon_centro_costos)
	{
		try {
			if($this->con_centro_costos!==$newcon_centro_costos) {
				if($newcon_centro_costos===null && $newcon_centro_costos!='') {
					throw new Exception('cuenta:Valor nulo no permitido en columna con_centro_costos');
				}

				if($newcon_centro_costos!==null && filter_var($newcon_centro_costos,FILTER_VALIDATE_BOOLEAN)===false && $newcon_centro_costos!==0 && $newcon_centro_costos!==false) {
					throw new Exception('cuenta:No es valor booleano - con_centro_costos='.$newcon_centro_costos);
				}

				$this->con_centro_costos=$newcon_centro_costos;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcon_ruc(?bool $newcon_ruc)
	{
		try {
			if($this->con_ruc!==$newcon_ruc) {
				if($newcon_ruc===null && $newcon_ruc!='') {
					throw new Exception('cuenta:Valor nulo no permitido en columna con_ruc');
				}

				if($newcon_ruc!==null && filter_var($newcon_ruc,FILTER_VALIDATE_BOOLEAN)===false && $newcon_ruc!==0 && $newcon_ruc!==false) {
					throw new Exception('cuenta:No es valor booleano - con_ruc='.$newcon_ruc);
				}

				$this->con_ruc=$newcon_ruc;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setbalance(?float $newbalance)
	{
		try {
			if($this->balance!==$newbalance) {
				if($newbalance===null && $newbalance!='') {
					throw new Exception('cuenta:Valor nulo no permitido en columna balance');
				}

				if($newbalance!=0) {
					if($newbalance!==null && filter_var($newbalance,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('cuenta:No es numero decimal - balance='.$newbalance);
					}
				}

				$this->balance=$newbalance;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdescripcion(?string $newdescripcion) {
		if($this->descripcion!==$newdescripcion) {

				if(strlen($newdescripcion)>150) {
					try {
						throw new Exception('cuenta:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=descripcion en columna descripcion');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newdescripcion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('cuenta:Formato incorrecto en la columna descripcion='.$newdescripcion);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->descripcion=$newdescripcion;
			$this->setIsChanged(true);
		}
	}
    
	public function setcon_retencion(?bool $newcon_retencion)
	{
		try {
			if($this->con_retencion!==$newcon_retencion) {
				if($newcon_retencion===null && $newcon_retencion!='') {
					throw new Exception('cuenta:Valor nulo no permitido en columna con_retencion');
				}

				if($newcon_retencion!==null && filter_var($newcon_retencion,FILTER_VALIDATE_BOOLEAN)===false && $newcon_retencion!==0 && $newcon_retencion!==false) {
					throw new Exception('cuenta:No es valor booleano - con_retencion='.$newcon_retencion);
				}

				$this->con_retencion=$newcon_retencion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setvalor_retencion(?float $newvalor_retencion)
	{
		try {
			if($this->valor_retencion!==$newvalor_retencion) {
				if($newvalor_retencion===null && $newvalor_retencion!='') {
					throw new Exception('cuenta:Valor nulo no permitido en columna valor_retencion');
				}

				if($newvalor_retencion!=0) {
					if($newvalor_retencion!==null && filter_var($newvalor_retencion,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('cuenta:No es numero decimal - valor_retencion='.$newvalor_retencion);
					}
				}

				$this->valor_retencion=$newvalor_retencion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setultima_transaccion(?string $newultima_transaccion)
	{
		try {
			if($this->ultima_transaccion!==$newultima_transaccion) {
				if($newultima_transaccion===null && $newultima_transaccion!='') {
					throw new Exception('cuenta:Valor nulo no permitido en columna ultima_transaccion');
				}

				if($newultima_transaccion!==null && filter_var($newultima_transaccion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('cuenta:No es fecha - ultima_transaccion='.$newultima_transaccion);
				}

				$this->ultima_transaccion=$newultima_transaccion;
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

	public function gettipo_cuenta() : ?tipo_cuenta {
		return $this->tipo_cuenta;
	}

	public function gettipo_nivel_cuenta() : ?tipo_nivel_cuenta {
		return $this->tipo_nivel_cuenta;
	}

	public function getcuenta() : ?cuenta {
		return $this->cuenta;
	}

	
	
	public  function  setempresa(?empresa $empresa) {
		try {
			$this->empresa=$empresa;
		} catch(Exception $e) {
			;
		}
	}


	public  function  settipo_cuenta(?tipo_cuenta $tipo_cuenta) {
		try {
			$this->tipo_cuenta=$tipo_cuenta;
		} catch(Exception $e) {
			;
		}
	}


	public  function  settipo_nivel_cuenta(?tipo_nivel_cuenta $tipo_nivel_cuenta) {
		try {
			$this->tipo_nivel_cuenta=$tipo_nivel_cuenta;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setcuenta(?cuenta $cuenta) {
		try {
			$this->cuenta=$cuenta;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	public function getcategoria_cheques() : array {
		return $this->categoriacheques;
	}

	public function getotro_impuesto_ventass() : array {
		return $this->otroimpuesto_ventass;
	}

	public function getimpuesto_ventass() : array {
		return $this->impuesto_ventass;
	}

	public function getcuenta_corrientes() : array {
		return $this->cuentacorrientes;
	}

	public function getproducto_ventas() : array {
		return $this->producto_ventas;
	}

	public function getinstrumento_pago_ventass() : array {
		return $this->instrumentopago_ventass;
	}

	public function getlista_producto_ventas() : array {
		return $this->listaproducto_ventas;
	}

	public function getasiento_detalles() : array {
		return $this->asientodetalles;
	}

	public function getretencion_comprass() : array {
		return $this->retencion_comprass;
	}

	public function getretencion_fuente_comprass() : array {
		return $this->retencionfuente_comprass;
	}

	public function getcuentas() : array {
		return $this->cuentas;
	}

	public function getproveedors() : array {
		return $this->proveedors;
	}

	public function getforma_pago_clientes() : array {
		return $this->formapagoclientes;
	}

	public function getsaldo_cuentas() : array {
		return $this->saldocuentas;
	}

	public function gettermino_pago_proveedors() : array {
		return $this->terminopagoproveedors;
	}

	public function getretencion_ica_ventass() : array {
		return $this->retencionica_ventass;
	}

	public function getasiento_predefinido_detalles() : array {
		return $this->asientopredefinidodetalles;
	}

	public function getclientes() : array {
		return $this->clientes;
	}

	public function getasiento_automatico_detalles() : array {
		return $this->asientoautomaticodetalles;
	}

	public function getforma_pago_proveedors() : array {
		return $this->formapagoproveedors;
	}

	public function gettermino_pago_clientes() : array {
		return $this->terminopagoclientes;
	}

	
	
	public  function  setcategoria_cheques(array $categoriacheques) {
		try {
			$this->categoriacheques=$categoriacheques;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setotro_impuesto_ventass(array $otroimpuesto_ventass) {
		try {
			$this->otroimpuesto_ventass=$otroimpuesto_ventass;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setimpuesto_ventass(array $impuesto_ventass) {
		try {
			$this->impuesto_ventass=$impuesto_ventass;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setcuenta_corrientes(array $cuentacorrientes) {
		try {
			$this->cuentacorrientes=$cuentacorrientes;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setproducto_ventas(array $producto_ventas) {
		try {
			$this->producto_ventas=$producto_ventas;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setinstrumento_pago_ventass(array $instrumentopago_ventass) {
		try {
			$this->instrumentopago_ventass=$instrumentopago_ventass;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setlista_producto_ventas(array $listaproducto_ventas) {
		try {
			$this->listaproducto_ventas=$listaproducto_ventas;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setasiento_detalles(array $asientodetalles) {
		try {
			$this->asientodetalles=$asientodetalles;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setretencion_comprass(array $retencion_comprass) {
		try {
			$this->retencion_comprass=$retencion_comprass;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setretencion_fuente_comprass(array $retencionfuente_comprass) {
		try {
			$this->retencionfuente_comprass=$retencionfuente_comprass;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setcuentas(array $cuentas) {
		try {
			$this->cuentas=$cuentas;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setproveedors(array $proveedors) {
		try {
			$this->proveedors=$proveedors;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setforma_pago_clientes(array $formapagoclientes) {
		try {
			$this->formapagoclientes=$formapagoclientes;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setsaldo_cuentas(array $saldocuentas) {
		try {
			$this->saldocuentas=$saldocuentas;
		} catch(Exception $e) {
			;
		}
	}

	public  function  settermino_pago_proveedors(array $terminopagoproveedors) {
		try {
			$this->terminopagoproveedors=$terminopagoproveedors;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setretencion_ica_ventass(array $retencionica_ventass) {
		try {
			$this->retencionica_ventass=$retencionica_ventass;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setasiento_predefinido_detalles(array $asientopredefinidodetalles) {
		try {
			$this->asientopredefinidodetalles=$asientopredefinidodetalles;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setclientes(array $clientes) {
		try {
			$this->clientes=$clientes;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setasiento_automatico_detalles(array $asientoautomaticodetalles) {
		try {
			$this->asientoautomaticodetalles=$asientoautomaticodetalles;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setforma_pago_proveedors(array $formapagoproveedors) {
		try {
			$this->formapagoproveedors=$formapagoproveedors;
		} catch(Exception $e) {
			;
		}
	}

	public  function  settermino_pago_clientes(array $terminopagoclientes) {
		try {
			$this->terminopagoclientes=$terminopagoclientes;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_cuentaValue(string $sKey,$oValue) {
		$this->map_cuenta[$sKey]=$oValue;
	}
	
	public function getMap_cuentaValue(string $sKey) {
		return $this->map_cuenta[$sKey];
	}
	
	public function getcuenta_Original() : ?cuenta {
		return $this->cuenta_Original;
	}
	
	public function setcuenta_Original(cuenta $cuenta) {
		try {
			$this->cuenta_Original=$cuenta;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_cuenta() : array {
		return $this->map_cuenta;
	}

	public function setMap_cuenta(array $map_cuenta) {
		$this->map_cuenta = $map_cuenta;
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
