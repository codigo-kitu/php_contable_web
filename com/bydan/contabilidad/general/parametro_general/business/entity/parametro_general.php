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
namespace com\bydan\contabilidad\general\parametro_general\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\seguridad\pais\business\entity\pais;
use com\bydan\contabilidad\contabilidad\moneda\business\entity\moneda;

class parametro_general extends GeneralEntity {

	/*GENERAL*/
	public static string $class='parametro_general';
	
	/*AUXILIARES*/
	public ?parametro_general $parametro_general_Original=null;	
	public ?GeneralEntity $parametro_general_Additional=null;
	public array $map_parametro_general=array();	
		
	/*CAMPOS*/
	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public int $id_pais = -1;
	public string $id_pais_Descripcion = '';

	public int $id_modena = -1;
	public string $id_modena_Descripcion = '';

	public string $simbolo_moneda = '';
	public int $numero_decimales = 0;
	public bool $con_formato_fecha_mda = false;
	public bool $con_formato_cantidad_coma = false;
	public float $iva_porciento = 0.0;
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	public ?pais $pais = null;
	public ?moneda $moneda = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->parametro_general_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->id_pais=-1;
		$this->id_pais_Descripcion='';

 		$this->id_modena=-1;
		$this->id_modena_Descripcion='';

 		$this->simbolo_moneda='';
 		$this->numero_decimales=0;
 		$this->con_formato_fecha_mda=false;
 		$this->con_formato_cantidad_coma=false;
 		$this->iva_porciento=0.0;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
			$this->pais=new pais();
			$this->moneda=new moneda();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->parametro_general_Additional=new parametro_general_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_parametro_general() {
		$this->map_parametro_general = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_empresa() : ?int {
		return $this->id_empresa;
	}
	
	public function  getid_empresa_Descripcion() : string {
		return $this->id_empresa_Descripcion;
	}
    
	public function  getid_pais() : ?int {
		return $this->id_pais;
	}
	
	public function  getid_pais_Descripcion() : string {
		return $this->id_pais_Descripcion;
	}
    
	public function  getid_modena() : ?int {
		return $this->id_modena;
	}
	
	public function  getid_modena_Descripcion() : string {
		return $this->id_modena_Descripcion;
	}
    
	public function  getsimbolo_moneda() : ?string {
		return $this->simbolo_moneda;
	}
    
	public function  getnumero_decimales() : ?int {
		return $this->numero_decimales;
	}
    
	public function  getcon_formato_fecha_mda() : ?bool {
		return $this->con_formato_fecha_mda;
	}
    
	public function  getcon_formato_cantidad_coma() : ?bool {
		return $this->con_formato_cantidad_coma;
	}
    
	public function  getiva_porciento() : ?float {
		return $this->iva_porciento;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('parametro_general:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_general:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('parametro_general:Valor nulo no permitido en columna id_empresa');
				}

				$this->id_empresa_Descripcion=$newid_empresa_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_pais(?int $newid_pais) {
		if($this->id_pais!==$newid_pais) {

				if($newid_pais!==null && filter_var($newid_pais,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_general:No es numero entero - id_pais');
				}

			$this->id_pais=$newid_pais;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_pais_Descripcion(string $newid_pais_Descripcion) {
		if($this->id_pais_Descripcion!=$newid_pais_Descripcion) {

			$this->id_pais_Descripcion=$newid_pais_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function setid_modena(?int $newid_modena)
	{
		try {
			if($this->id_modena!==$newid_modena) {
				if($newid_modena===null && $newid_modena!='') {
					throw new Exception('parametro_general:Valor nulo no permitido en columna id_modena');
				}

				if($newid_modena!==null && filter_var($newid_modena,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_general:No es numero entero - id_modena='.$newid_modena);
				}

				$this->id_modena=$newid_modena;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_modena_Descripcion(string $newid_modena_Descripcion)
	{
		try {
			if($this->id_modena_Descripcion!=$newid_modena_Descripcion) {
				if($newid_modena_Descripcion===null && $newid_modena_Descripcion!='') {
					throw new Exception('parametro_general:Valor nulo no permitido en columna id_modena');
				}

				$this->id_modena_Descripcion=$newid_modena_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setsimbolo_moneda(?string $newsimbolo_moneda)
	{
		try {
			if($this->simbolo_moneda!==$newsimbolo_moneda) {
				if($newsimbolo_moneda===null && $newsimbolo_moneda!='') {
					throw new Exception('parametro_general:Valor nulo no permitido en columna simbolo_moneda');
				}

				if(strlen($newsimbolo_moneda)>5) {
					throw new Exception('parametro_general:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=5 en columna simbolo_moneda');
				}

				if(filter_var($newsimbolo_moneda,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('parametro_general:Formato incorrecto en columna simbolo_moneda='.$newsimbolo_moneda);
				}

				$this->simbolo_moneda=$newsimbolo_moneda;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnumero_decimales(?int $newnumero_decimales)
	{
		try {
			if($this->numero_decimales!==$newnumero_decimales) {
				if($newnumero_decimales===null && $newnumero_decimales!='') {
					throw new Exception('parametro_general:Valor nulo no permitido en columna numero_decimales');
				}

				if($newnumero_decimales!==null && filter_var($newnumero_decimales,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_general:No es numero entero - numero_decimales='.$newnumero_decimales);
				}

				$this->numero_decimales=$newnumero_decimales;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcon_formato_fecha_mda(?bool $newcon_formato_fecha_mda)
	{
		try {
			if($this->con_formato_fecha_mda!==$newcon_formato_fecha_mda) {
				if($newcon_formato_fecha_mda===null && $newcon_formato_fecha_mda!='') {
					throw new Exception('parametro_general:Valor nulo no permitido en columna con_formato_fecha_mda');
				}

				if($newcon_formato_fecha_mda!==null && filter_var($newcon_formato_fecha_mda,FILTER_VALIDATE_BOOLEAN)===false && $newcon_formato_fecha_mda!==0 && $newcon_formato_fecha_mda!==false) {
					throw new Exception('parametro_general:No es valor booleano - con_formato_fecha_mda='.$newcon_formato_fecha_mda);
				}

				$this->con_formato_fecha_mda=$newcon_formato_fecha_mda;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcon_formato_cantidad_coma(?bool $newcon_formato_cantidad_coma)
	{
		try {
			if($this->con_formato_cantidad_coma!==$newcon_formato_cantidad_coma) {
				if($newcon_formato_cantidad_coma===null && $newcon_formato_cantidad_coma!='') {
					throw new Exception('parametro_general:Valor nulo no permitido en columna con_formato_cantidad_coma');
				}

				if($newcon_formato_cantidad_coma!==null && filter_var($newcon_formato_cantidad_coma,FILTER_VALIDATE_BOOLEAN)===false && $newcon_formato_cantidad_coma!==0 && $newcon_formato_cantidad_coma!==false) {
					throw new Exception('parametro_general:No es valor booleano - con_formato_cantidad_coma='.$newcon_formato_cantidad_coma);
				}

				$this->con_formato_cantidad_coma=$newcon_formato_cantidad_coma;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setiva_porciento(?float $newiva_porciento)
	{
		try {
			if($this->iva_porciento!==$newiva_porciento) {
				if($newiva_porciento===null && $newiva_porciento!='') {
					throw new Exception('parametro_general:Valor nulo no permitido en columna iva_porciento');
				}

				if($newiva_porciento!=0) {
					if($newiva_porciento!==null && filter_var($newiva_porciento,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('parametro_general:No es numero decimal - iva_porciento='.$newiva_porciento);
					}
				}

				$this->iva_porciento=$newiva_porciento;
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

	public function getpais() : ?pais {
		return $this->pais;
	}

	public function getmoneda() : ?moneda {
		return $this->moneda;
	}

	
	
	public  function  setempresa(?empresa $empresa) {
		try {
			$this->empresa=$empresa;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setpais(?pais $pais) {
		try {
			$this->pais=$pais;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setmoneda(?moneda $moneda) {
		try {
			$this->moneda=$moneda;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_parametro_generalValue(string $sKey,$oValue) {
		$this->map_parametro_general[$sKey]=$oValue;
	}
	
	public function getMap_parametro_generalValue(string $sKey) {
		return $this->map_parametro_general[$sKey];
	}
	
	public function getparametro_general_Original() : ?parametro_general {
		return $this->parametro_general_Original;
	}
	
	public function setparametro_general_Original(parametro_general $parametro_general) {
		try {
			$this->parametro_general_Original=$parametro_general;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_parametro_general() : array {
		return $this->map_parametro_general;
	}

	public function setMap_parametro_general(array $map_parametro_general) {
		$this->map_parametro_general = $map_parametro_general;
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
