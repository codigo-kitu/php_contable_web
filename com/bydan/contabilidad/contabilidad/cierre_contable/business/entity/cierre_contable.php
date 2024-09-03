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
namespace com\bydan\contabilidad\contabilidad\cierre_contable\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;

class cierre_contable extends GeneralEntity {

	/*GENERAL*/
	public static string $class='cierre_contable';
	
	/*AUXILIARES*/
	public ?cierre_contable $cierre_contable_Original=null;	
	public ?GeneralEntity $cierre_contable_Additional=null;
	public array $map_cierre_contable=array();	
		
	/*CAMPOS*/
	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public int $id_ejercicio = -1;
	public string $id_ejercicio_Descripcion = '';

	public int $id_periodo = -1;
	public string $id_periodo_Descripcion = '';

	public string $fecha_cierre = '';
	public float $gan_per = 0.0;
	public int $total_cuentas = 0;
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	public ?ejercicio $ejercicio = null;
	public ?periodo $periodo = null;
	
	/*RELACIONES*/
	
	public array $cierrecontabledetalles = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->cierre_contable_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->id_ejercicio=-1;
		$this->id_ejercicio_Descripcion='';

 		$this->id_periodo=-1;
		$this->id_periodo_Descripcion='';

 		$this->fecha_cierre=date('Y-m-d');
 		$this->gan_per=0.0;
 		$this->total_cuentas=0;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
			$this->ejercicio=new ejercicio();
			$this->periodo=new periodo();
		}
		
		/*RELACIONES*/
		
		$this->cierrecontabledetalles=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cierre_contable_Additional=new cierre_contable_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_cierre_contable() {
		$this->map_cierre_contable = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_empresa() : ?int {
		return $this->id_empresa;
	}
	
	public function  getid_empresa_Descripcion() : string {
		return $this->id_empresa_Descripcion;
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
    
	public function  getfecha_cierre() : ?string {
		return $this->fecha_cierre;
	}
    
	public function  getgan_per() : ?float {
		return $this->gan_per;
	}
    
	public function  gettotal_cuentas() : ?int {
		return $this->total_cuentas;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('cierre_contable:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cierre_contable:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('cierre_contable:Valor nulo no permitido en columna id_empresa');
				}

				$this->id_empresa_Descripcion=$newid_empresa_Descripcion;
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
					throw new Exception('cierre_contable:Valor nulo no permitido en columna id_ejercicio');
				}

				if($newid_ejercicio!==null && filter_var($newid_ejercicio,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cierre_contable:No es numero entero - id_ejercicio='.$newid_ejercicio);
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
					throw new Exception('cierre_contable:Valor nulo no permitido en columna id_ejercicio');
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
					throw new Exception('cierre_contable:Valor nulo no permitido en columna id_periodo');
				}

				if($newid_periodo!==null && filter_var($newid_periodo,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cierre_contable:No es numero entero - id_periodo='.$newid_periodo);
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
					throw new Exception('cierre_contable:Valor nulo no permitido en columna id_periodo');
				}

				$this->id_periodo_Descripcion=$newid_periodo_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setfecha_cierre(?string $newfecha_cierre)
	{
		try {
			if($this->fecha_cierre!==$newfecha_cierre) {
				if($newfecha_cierre===null && $newfecha_cierre!='') {
					throw new Exception('cierre_contable:Valor nulo no permitido en columna fecha_cierre');
				}

				if($newfecha_cierre!==null && filter_var($newfecha_cierre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('cierre_contable:No es fecha - fecha_cierre='.$newfecha_cierre);
				}

				$this->fecha_cierre=$newfecha_cierre;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setgan_per(?float $newgan_per)
	{
		try {
			if($this->gan_per!==$newgan_per) {
				if($newgan_per===null && $newgan_per!='') {
					throw new Exception('cierre_contable:Valor nulo no permitido en columna gan_per');
				}

				if($newgan_per!=0) {
					if($newgan_per!==null && filter_var($newgan_per,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('cierre_contable:No es numero decimal - gan_per='.$newgan_per);
					}
				}

				$this->gan_per=$newgan_per;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function settotal_cuentas(?int $newtotal_cuentas)
	{
		try {
			if($this->total_cuentas!==$newtotal_cuentas) {
				if($newtotal_cuentas===null && $newtotal_cuentas!='') {
					throw new Exception('cierre_contable:Valor nulo no permitido en columna total_cuentas');
				}

				if($newtotal_cuentas!==null && filter_var($newtotal_cuentas,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cierre_contable:No es numero entero - total_cuentas='.$newtotal_cuentas);
				}

				$this->total_cuentas=$newtotal_cuentas;
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

	public function getejercicio() : ?ejercicio {
		return $this->ejercicio;
	}

	public function getperiodo() : ?periodo {
		return $this->periodo;
	}

	
	
	public  function  setempresa(?empresa $empresa) {
		try {
			$this->empresa=$empresa;
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
	
	public function getcierre_contable_detalles() : array {
		return $this->cierrecontabledetalles;
	}

	
	
	public  function  setcierre_contable_detalles(array $cierrecontabledetalles) {
		try {
			$this->cierrecontabledetalles=$cierrecontabledetalles;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_cierre_contableValue(string $sKey,$oValue) {
		$this->map_cierre_contable[$sKey]=$oValue;
	}
	
	public function getMap_cierre_contableValue(string $sKey) {
		return $this->map_cierre_contable[$sKey];
	}
	
	public function getcierre_contable_Original() : ?cierre_contable {
		return $this->cierre_contable_Original;
	}
	
	public function setcierre_contable_Original(cierre_contable $cierre_contable) {
		try {
			$this->cierre_contable_Original=$cierre_contable;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_cierre_contable() : array {
		return $this->map_cierre_contable;
	}

	public function setMap_cierre_contable(array $map_cierre_contable) {
		$this->map_cierre_contable = $map_cierre_contable;
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
