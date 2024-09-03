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
namespace com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;

class asiento_automatico_detalle extends GeneralEntity {

	/*GENERAL*/
	public static string $class='asiento_automatico_detalle';
	
	/*AUXILIARES*/
	public ?asiento_automatico_detalle $asiento_automatico_detalle_Original=null;	
	public ?GeneralEntity $asiento_automatico_detalle_Additional=null;
	public array $map_asiento_automatico_detalle=array();	
		
	/*CAMPOS*/
	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public int $id_asiento_automatico = -1;
	public string $id_asiento_automatico_Descripcion = '';

	public int $id_cuenta = -1;
	public string $id_cuenta_Descripcion = '';

	public int $id_centro_costo = -1;
	public string $id_centro_costo_Descripcion = '';

	public bool $es_credito = false;
	public string $cuenta_contable = '';
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	public ?asiento_automatico $asiento_automatico = null;
	public ?cuenta $cuenta = null;
	public ?centro_costo $centro_costo = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->asiento_automatico_detalle_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->id_asiento_automatico=-1;
		$this->id_asiento_automatico_Descripcion='';

 		$this->id_cuenta=-1;
		$this->id_cuenta_Descripcion='';

 		$this->id_centro_costo=-1;
		$this->id_centro_costo_Descripcion='';

 		$this->es_credito=false;
 		$this->cuenta_contable='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
			$this->asiento_automatico=new asiento_automatico();
			$this->cuenta=new cuenta();
			$this->centro_costo=new centro_costo();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->asiento_automatico_detalle_Additional=new asiento_automatico_detalle_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_asiento_automatico_detalle() {
		$this->map_asiento_automatico_detalle = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_empresa() : ?int {
		return $this->id_empresa;
	}
	
	public function  getid_empresa_Descripcion() : string {
		return $this->id_empresa_Descripcion;
	}
    
	public function  getid_asiento_automatico() : ?int {
		return $this->id_asiento_automatico;
	}
	
	public function  getid_asiento_automatico_Descripcion() : string {
		return $this->id_asiento_automatico_Descripcion;
	}
    
	public function  getid_cuenta() : ?int {
		return $this->id_cuenta;
	}
	
	public function  getid_cuenta_Descripcion() : string {
		return $this->id_cuenta_Descripcion;
	}
    
	public function  getid_centro_costo() : ?int {
		return $this->id_centro_costo;
	}
	
	public function  getid_centro_costo_Descripcion() : string {
		return $this->id_centro_costo_Descripcion;
	}
    
	public function  getes_credito() : ?bool {
		return $this->es_credito;
	}
    
	public function  getcuenta_contable() : ?string {
		return $this->cuenta_contable;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('asiento_automatico_detalle:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento_automatico_detalle:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('asiento_automatico_detalle:Valor nulo no permitido en columna id_empresa');
				}

				$this->id_empresa_Descripcion=$newid_empresa_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_asiento_automatico(?int $newid_asiento_automatico)
	{
		try {
			if($this->id_asiento_automatico!==$newid_asiento_automatico) {
				if($newid_asiento_automatico===null && $newid_asiento_automatico!='') {
					throw new Exception('asiento_automatico_detalle:Valor nulo no permitido en columna id_asiento_automatico');
				}

				if($newid_asiento_automatico!==null && filter_var($newid_asiento_automatico,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento_automatico_detalle:No es numero entero - id_asiento_automatico='.$newid_asiento_automatico);
				}

				$this->id_asiento_automatico=$newid_asiento_automatico;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_asiento_automatico_Descripcion(string $newid_asiento_automatico_Descripcion)
	{
		try {
			if($this->id_asiento_automatico_Descripcion!=$newid_asiento_automatico_Descripcion) {
				if($newid_asiento_automatico_Descripcion===null && $newid_asiento_automatico_Descripcion!='') {
					throw new Exception('asiento_automatico_detalle:Valor nulo no permitido en columna id_asiento_automatico');
				}

				$this->id_asiento_automatico_Descripcion=$newid_asiento_automatico_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_cuenta(?int $newid_cuenta)
	{
		try {
			if($this->id_cuenta!==$newid_cuenta) {
				if($newid_cuenta===null && $newid_cuenta!='') {
					throw new Exception('asiento_automatico_detalle:Valor nulo no permitido en columna id_cuenta');
				}

				if($newid_cuenta!==null && filter_var($newid_cuenta,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento_automatico_detalle:No es numero entero - id_cuenta='.$newid_cuenta);
				}

				$this->id_cuenta=$newid_cuenta;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_cuenta_Descripcion(string $newid_cuenta_Descripcion)
	{
		try {
			if($this->id_cuenta_Descripcion!=$newid_cuenta_Descripcion) {
				if($newid_cuenta_Descripcion===null && $newid_cuenta_Descripcion!='') {
					throw new Exception('asiento_automatico_detalle:Valor nulo no permitido en columna id_cuenta');
				}

				$this->id_cuenta_Descripcion=$newid_cuenta_Descripcion;
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
					throw new Exception('asiento_automatico_detalle:Valor nulo no permitido en columna id_centro_costo');
				}

				if($newid_centro_costo!==null && filter_var($newid_centro_costo,FILTER_VALIDATE_INT)===false) {
					throw new Exception('asiento_automatico_detalle:No es numero entero - id_centro_costo='.$newid_centro_costo);
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
					throw new Exception('asiento_automatico_detalle:Valor nulo no permitido en columna id_centro_costo');
				}

				$this->id_centro_costo_Descripcion=$newid_centro_costo_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setes_credito(?bool $newes_credito)
	{
		try {
			if($this->es_credito!==$newes_credito) {
				if($newes_credito===null && $newes_credito!='') {
					throw new Exception('asiento_automatico_detalle:Valor nulo no permitido en columna es_credito');
				}

				if($newes_credito!==null && filter_var($newes_credito,FILTER_VALIDATE_BOOLEAN)===false && $newes_credito!==0 && $newes_credito!==false) {
					throw new Exception('asiento_automatico_detalle:No es valor booleano - es_credito='.$newes_credito);
				}

				$this->es_credito=$newes_credito;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcuenta_contable(?string $newcuenta_contable) {
		if($this->cuenta_contable!==$newcuenta_contable) {

				if(strlen($newcuenta_contable)>20) {
					try {
						throw new Exception('asiento_automatico_detalle:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=cuenta_contable en columna cuenta_contable');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newcuenta_contable,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('asiento_automatico_detalle:Formato incorrecto en la columna cuenta_contable='.$newcuenta_contable);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->cuenta_contable=$newcuenta_contable;
			$this->setIsChanged(true);
		}
	}
	
	/*FKs*/
	
	public function getempresa() : ?empresa {
		return $this->empresa;
	}

	public function getasiento_automatico() : ?asiento_automatico {
		return $this->asiento_automatico;
	}

	public function getcuenta() : ?cuenta {
		return $this->cuenta;
	}

	public function getcentro_costo() : ?centro_costo {
		return $this->centro_costo;
	}

	
	
	public  function  setempresa(?empresa $empresa) {
		try {
			$this->empresa=$empresa;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setasiento_automatico(?asiento_automatico $asiento_automatico) {
		try {
			$this->asiento_automatico=$asiento_automatico;
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


	public  function  setcentro_costo(?centro_costo $centro_costo) {
		try {
			$this->centro_costo=$centro_costo;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_asiento_automatico_detalleValue(string $sKey,$oValue) {
		$this->map_asiento_automatico_detalle[$sKey]=$oValue;
	}
	
	public function getMap_asiento_automatico_detalleValue(string $sKey) {
		return $this->map_asiento_automatico_detalle[$sKey];
	}
	
	public function getasiento_automatico_detalle_Original() : ?asiento_automatico_detalle {
		return $this->asiento_automatico_detalle_Original;
	}
	
	public function setasiento_automatico_detalle_Original(asiento_automatico_detalle $asiento_automatico_detalle) {
		try {
			$this->asiento_automatico_detalle_Original=$asiento_automatico_detalle;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_asiento_automatico_detalle() : array {
		return $this->map_asiento_automatico_detalle;
	}

	public function setMap_asiento_automatico_detalle(array $map_asiento_automatico_detalle) {
		$this->map_asiento_automatico_detalle = $map_asiento_automatico_detalle;
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
