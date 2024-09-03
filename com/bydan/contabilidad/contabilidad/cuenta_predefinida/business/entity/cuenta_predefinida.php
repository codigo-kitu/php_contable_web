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
namespace com\bydan\contabilidad\contabilidad\cuenta_predefinida\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;

class cuenta_predefinida extends GeneralEntity {

	/*GENERAL*/
	public static string $class='cuenta_predefinida';
	
	/*AUXILIARES*/
	public ?cuenta_predefinida $cuenta_predefinida_Original=null;	
	public ?GeneralEntity $cuenta_predefinida_Additional=null;
	public array $map_cuenta_predefinida=array();	
		
	/*CAMPOS*/
	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public int $id_tipo_cuenta_predefinida = -1;
	public string $id_tipo_cuenta_predefinida_Descripcion = '';

	public int $id_tipo_cuenta = -1;
	public string $id_tipo_cuenta_Descripcion = '';

	public int $id_tipo_nivel_cuenta = -1;
	public string $id_tipo_nivel_cuenta_Descripcion = '';

	public string $codigo_tabla = '';
	public string $codigo_cuenta = '';
	public string $nombre_cuenta = '';
	public float $monto_minimo = 0.0;
	public float $valor_retencion = 0.0;
	public float $balance = 0.0;
	public float $porcentaje_base = 0.0;
	public int $seleccionar = 0;
	public bool $centro_costos = false;
	public bool $retencion = false;
	public bool $usa_base = false;
	public bool $nit = false;
	public bool $modifica = false;
	public string $ultima_transaccion = '';
	public string $comenta1 = '';
	public string $comenta2 = '';
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	public ?tipo_cuenta_predefinida $tipo_cuenta_predefinida = null;
	public ?tipo_cuenta $tipo_cuenta = null;
	public ?tipo_nivel_cuenta $tipo_nivel_cuenta = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->cuenta_predefinida_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->id_tipo_cuenta_predefinida=-1;
		$this->id_tipo_cuenta_predefinida_Descripcion='';

 		$this->id_tipo_cuenta=-1;
		$this->id_tipo_cuenta_Descripcion='';

 		$this->id_tipo_nivel_cuenta=-1;
		$this->id_tipo_nivel_cuenta_Descripcion='';

 		$this->codigo_tabla='';
 		$this->codigo_cuenta='';
 		$this->nombre_cuenta='';
 		$this->monto_minimo=0.0;
 		$this->valor_retencion=0.0;
 		$this->balance=0.0;
 		$this->porcentaje_base=0.0;
 		$this->seleccionar=0;
 		$this->centro_costos=false;
 		$this->retencion=false;
 		$this->usa_base=false;
 		$this->nit=false;
 		$this->modifica=false;
 		$this->ultima_transaccion=date('Y-m-d');
 		$this->comenta1='';
 		$this->comenta2='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
			$this->tipo_cuenta_predefinida=new tipo_cuenta_predefinida();
			$this->tipo_cuenta=new tipo_cuenta();
			$this->tipo_nivel_cuenta=new tipo_nivel_cuenta();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cuenta_predefinida_Additional=new cuenta_predefinida_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_cuenta_predefinida() {
		$this->map_cuenta_predefinida = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_empresa() : ?int {
		return $this->id_empresa;
	}
	
	public function  getid_empresa_Descripcion() : string {
		return $this->id_empresa_Descripcion;
	}
    
	public function  getid_tipo_cuenta_predefinida() : ?int {
		return $this->id_tipo_cuenta_predefinida;
	}
	
	public function  getid_tipo_cuenta_predefinida_Descripcion() : string {
		return $this->id_tipo_cuenta_predefinida_Descripcion;
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
    
	public function  getcodigo_tabla() : ?string {
		return $this->codigo_tabla;
	}
    
	public function  getcodigo_cuenta() : ?string {
		return $this->codigo_cuenta;
	}
    
	public function  getnombre_cuenta() : ?string {
		return $this->nombre_cuenta;
	}
    
	public function  getmonto_minimo() : ?float {
		return $this->monto_minimo;
	}
    
	public function  getvalor_retencion() : ?float {
		return $this->valor_retencion;
	}
    
	public function  getbalance() : ?float {
		return $this->balance;
	}
    
	public function  getporcentaje_base() : ?float {
		return $this->porcentaje_base;
	}
    
	public function  getseleccionar() : ?int {
		return $this->seleccionar;
	}
    
	public function  getcentro_costos() : ?bool {
		return $this->centro_costos;
	}
    
	public function  getretencion() : ?bool {
		return $this->retencion;
	}
    
	public function  getusa_base() : ?bool {
		return $this->usa_base;
	}
    
	public function  getnit() : ?bool {
		return $this->nit;
	}
    
	public function  getmodifica() : ?bool {
		return $this->modifica;
	}
    
	public function  getultima_transaccion() : ?string {
		return $this->ultima_transaccion;
	}
    
	public function  getcomenta1() : ?string {
		return $this->comenta1;
	}
    
	public function  getcomenta2() : ?string {
		return $this->comenta2;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('cuenta_predefinida:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_predefinida:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('cuenta_predefinida:Valor nulo no permitido en columna id_empresa');
				}

				$this->id_empresa_Descripcion=$newid_empresa_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_tipo_cuenta_predefinida(?int $newid_tipo_cuenta_predefinida)
	{
		try {
			if($this->id_tipo_cuenta_predefinida!==$newid_tipo_cuenta_predefinida) {
				if($newid_tipo_cuenta_predefinida===null && $newid_tipo_cuenta_predefinida!='') {
					throw new Exception('cuenta_predefinida:Valor nulo no permitido en columna id_tipo_cuenta_predefinida');
				}

				if($newid_tipo_cuenta_predefinida!==null && filter_var($newid_tipo_cuenta_predefinida,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_predefinida:No es numero entero - id_tipo_cuenta_predefinida='.$newid_tipo_cuenta_predefinida);
				}

				$this->id_tipo_cuenta_predefinida=$newid_tipo_cuenta_predefinida;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_tipo_cuenta_predefinida_Descripcion(string $newid_tipo_cuenta_predefinida_Descripcion)
	{
		try {
			if($this->id_tipo_cuenta_predefinida_Descripcion!=$newid_tipo_cuenta_predefinida_Descripcion) {
				if($newid_tipo_cuenta_predefinida_Descripcion===null && $newid_tipo_cuenta_predefinida_Descripcion!='') {
					throw new Exception('cuenta_predefinida:Valor nulo no permitido en columna id_tipo_cuenta_predefinida');
				}

				$this->id_tipo_cuenta_predefinida_Descripcion=$newid_tipo_cuenta_predefinida_Descripcion;
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
					throw new Exception('cuenta_predefinida:Valor nulo no permitido en columna id_tipo_cuenta');
				}

				if($newid_tipo_cuenta!==null && filter_var($newid_tipo_cuenta,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_predefinida:No es numero entero - id_tipo_cuenta='.$newid_tipo_cuenta);
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
					throw new Exception('cuenta_predefinida:Valor nulo no permitido en columna id_tipo_cuenta');
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
					throw new Exception('cuenta_predefinida:Valor nulo no permitido en columna id_tipo_nivel_cuenta');
				}

				if($newid_tipo_nivel_cuenta!==null && filter_var($newid_tipo_nivel_cuenta,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_predefinida:No es numero entero - id_tipo_nivel_cuenta='.$newid_tipo_nivel_cuenta);
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
					throw new Exception('cuenta_predefinida:Valor nulo no permitido en columna id_tipo_nivel_cuenta');
				}

				$this->id_tipo_nivel_cuenta_Descripcion=$newid_tipo_nivel_cuenta_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcodigo_tabla(?string $newcodigo_tabla) {
		if($this->codigo_tabla!==$newcodigo_tabla) {

				if(strlen($newcodigo_tabla)>10) {
					try {
						throw new Exception('cuenta_predefinida:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=codigo_tabla en columna codigo_tabla');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newcodigo_tabla,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('cuenta_predefinida:Formato incorrecto en la columna codigo_tabla='.$newcodigo_tabla);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->codigo_tabla=$newcodigo_tabla;
			$this->setIsChanged(true);
		}
	}
    
	public function setcodigo_cuenta(?string $newcodigo_cuenta)
	{
		try {
			if($this->codigo_cuenta!==$newcodigo_cuenta) {
				if($newcodigo_cuenta===null && $newcodigo_cuenta!='') {
					throw new Exception('cuenta_predefinida:Valor nulo no permitido en columna codigo_cuenta');
				}

				if(strlen($newcodigo_cuenta)>20) {
					throw new Exception('cuenta_predefinida:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=20 en columna codigo_cuenta');
				}

				if(filter_var($newcodigo_cuenta,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('cuenta_predefinida:Formato incorrecto en columna codigo_cuenta='.$newcodigo_cuenta);
				}

				$this->codigo_cuenta=$newcodigo_cuenta;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnombre_cuenta(?string $newnombre_cuenta)
	{
		try {
			if($this->nombre_cuenta!==$newnombre_cuenta) {
				if($newnombre_cuenta===null && $newnombre_cuenta!='') {
					throw new Exception('cuenta_predefinida:Valor nulo no permitido en columna nombre_cuenta');
				}

				if(strlen($newnombre_cuenta)>60) {
					throw new Exception('cuenta_predefinida:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=60 en columna nombre_cuenta');
				}

				if(filter_var($newnombre_cuenta,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('cuenta_predefinida:Formato incorrecto en columna nombre_cuenta='.$newnombre_cuenta);
				}

				$this->nombre_cuenta=$newnombre_cuenta;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setmonto_minimo(?float $newmonto_minimo)
	{
		try {
			if($this->monto_minimo!==$newmonto_minimo) {
				if($newmonto_minimo===null && $newmonto_minimo!='') {
					throw new Exception('cuenta_predefinida:Valor nulo no permitido en columna monto_minimo');
				}

				if($newmonto_minimo!=0) {
					if($newmonto_minimo!==null && filter_var($newmonto_minimo,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('cuenta_predefinida:No es numero decimal - monto_minimo='.$newmonto_minimo);
					}
				}

				$this->monto_minimo=$newmonto_minimo;
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
					throw new Exception('cuenta_predefinida:Valor nulo no permitido en columna valor_retencion');
				}

				if($newvalor_retencion!=0) {
					if($newvalor_retencion!==null && filter_var($newvalor_retencion,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('cuenta_predefinida:No es numero decimal - valor_retencion='.$newvalor_retencion);
					}
				}

				$this->valor_retencion=$newvalor_retencion;
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
					throw new Exception('cuenta_predefinida:Valor nulo no permitido en columna balance');
				}

				if($newbalance!=0) {
					if($newbalance!==null && filter_var($newbalance,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('cuenta_predefinida:No es numero decimal - balance='.$newbalance);
					}
				}

				$this->balance=$newbalance;
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
					throw new Exception('cuenta_predefinida:Valor nulo no permitido en columna porcentaje_base');
				}

				if($newporcentaje_base!=0) {
					if($newporcentaje_base!==null && filter_var($newporcentaje_base,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('cuenta_predefinida:No es numero decimal - porcentaje_base='.$newporcentaje_base);
					}
				}

				$this->porcentaje_base=$newporcentaje_base;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setseleccionar(?int $newseleccionar)
	{
		try {
			if($this->seleccionar!==$newseleccionar) {
				if($newseleccionar===null && $newseleccionar!='') {
					throw new Exception('cuenta_predefinida:Valor nulo no permitido en columna seleccionar');
				}

				if($newseleccionar!==null && filter_var($newseleccionar,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cuenta_predefinida:No es numero entero - seleccionar='.$newseleccionar);
				}

				$this->seleccionar=$newseleccionar;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcentro_costos(?bool $newcentro_costos)
	{
		try {
			if($this->centro_costos!==$newcentro_costos) {
				if($newcentro_costos===null && $newcentro_costos!='') {
					throw new Exception('cuenta_predefinida:Valor nulo no permitido en columna centro_costos');
				}

				if($newcentro_costos!==null && filter_var($newcentro_costos,FILTER_VALIDATE_BOOLEAN)===false && $newcentro_costos!==0 && $newcentro_costos!==false) {
					throw new Exception('cuenta_predefinida:No es valor booleano - centro_costos='.$newcentro_costos);
				}

				$this->centro_costos=$newcentro_costos;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setretencion(?bool $newretencion)
	{
		try {
			if($this->retencion!==$newretencion) {
				if($newretencion===null && $newretencion!='') {
					throw new Exception('cuenta_predefinida:Valor nulo no permitido en columna retencion');
				}

				if($newretencion!==null && filter_var($newretencion,FILTER_VALIDATE_BOOLEAN)===false && $newretencion!==0 && $newretencion!==false) {
					throw new Exception('cuenta_predefinida:No es valor booleano - retencion='.$newretencion);
				}

				$this->retencion=$newretencion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setusa_base(?bool $newusa_base)
	{
		try {
			if($this->usa_base!==$newusa_base) {
				if($newusa_base===null && $newusa_base!='') {
					throw new Exception('cuenta_predefinida:Valor nulo no permitido en columna usa_base');
				}

				if($newusa_base!==null && filter_var($newusa_base,FILTER_VALIDATE_BOOLEAN)===false && $newusa_base!==0 && $newusa_base!==false) {
					throw new Exception('cuenta_predefinida:No es valor booleano - usa_base='.$newusa_base);
				}

				$this->usa_base=$newusa_base;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnit(?bool $newnit)
	{
		try {
			if($this->nit!==$newnit) {
				if($newnit===null && $newnit!='') {
					throw new Exception('cuenta_predefinida:Valor nulo no permitido en columna nit');
				}

				if($newnit!==null && filter_var($newnit,FILTER_VALIDATE_BOOLEAN)===false && $newnit!==0 && $newnit!==false) {
					throw new Exception('cuenta_predefinida:No es valor booleano - nit='.$newnit);
				}

				$this->nit=$newnit;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setmodifica(?bool $newmodifica)
	{
		try {
			if($this->modifica!==$newmodifica) {
				if($newmodifica===null && $newmodifica!='') {
					throw new Exception('cuenta_predefinida:Valor nulo no permitido en columna modifica');
				}

				if($newmodifica!==null && filter_var($newmodifica,FILTER_VALIDATE_BOOLEAN)===false && $newmodifica!==0 && $newmodifica!==false) {
					throw new Exception('cuenta_predefinida:No es valor booleano - modifica='.$newmodifica);
				}

				$this->modifica=$newmodifica;
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
					throw new Exception('cuenta_predefinida:Valor nulo no permitido en columna ultima_transaccion');
				}

				if($newultima_transaccion!==null && filter_var($newultima_transaccion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('cuenta_predefinida:No es fecha - ultima_transaccion='.$newultima_transaccion);
				}

				$this->ultima_transaccion=$newultima_transaccion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcomenta1(?string $newcomenta1) {
		if($this->comenta1!==$newcomenta1) {

				if(strlen($newcomenta1)>60) {
					try {
						throw new Exception('cuenta_predefinida:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=comenta1 en columna comenta1');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newcomenta1,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('cuenta_predefinida:Formato incorrecto en la columna comenta1='.$newcomenta1);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->comenta1=$newcomenta1;
			$this->setIsChanged(true);
		}
	}
    
	public function setcomenta2(?string $newcomenta2) {
		if($this->comenta2!==$newcomenta2) {

				if(strlen($newcomenta2)>60) {
					try {
						throw new Exception('cuenta_predefinida:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=comenta2 en columna comenta2');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newcomenta2,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('cuenta_predefinida:Formato incorrecto en la columna comenta2='.$newcomenta2);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->comenta2=$newcomenta2;
			$this->setIsChanged(true);
		}
	}
	
	/*FKs*/
	
	public function getempresa() : ?empresa {
		return $this->empresa;
	}

	public function gettipo_cuenta_predefinida() : ?tipo_cuenta_predefinida {
		return $this->tipo_cuenta_predefinida;
	}

	public function gettipo_cuenta() : ?tipo_cuenta {
		return $this->tipo_cuenta;
	}

	public function gettipo_nivel_cuenta() : ?tipo_nivel_cuenta {
		return $this->tipo_nivel_cuenta;
	}

	
	
	public  function  setempresa(?empresa $empresa) {
		try {
			$this->empresa=$empresa;
		} catch(Exception $e) {
			;
		}
	}


	public  function  settipo_cuenta_predefinida(?tipo_cuenta_predefinida $tipo_cuenta_predefinida) {
		try {
			$this->tipo_cuenta_predefinida=$tipo_cuenta_predefinida;
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

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_cuenta_predefinidaValue(string $sKey,$oValue) {
		$this->map_cuenta_predefinida[$sKey]=$oValue;
	}
	
	public function getMap_cuenta_predefinidaValue(string $sKey) {
		return $this->map_cuenta_predefinida[$sKey];
	}
	
	public function getcuenta_predefinida_Original() : ?cuenta_predefinida {
		return $this->cuenta_predefinida_Original;
	}
	
	public function setcuenta_predefinida_Original(cuenta_predefinida $cuenta_predefinida) {
		try {
			$this->cuenta_predefinida_Original=$cuenta_predefinida;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_cuenta_predefinida() : array {
		return $this->map_cuenta_predefinida;
	}

	public function setMap_cuenta_predefinida(array $map_cuenta_predefinida) {
		$this->map_cuenta_predefinida = $map_cuenta_predefinida;
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
