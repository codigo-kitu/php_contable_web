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
namespace com\bydan\contabilidad\contabilidad\cambio_dolar\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class cambio_dolar extends GeneralEntity {

	/*GENERAL*/
	public static string $class='cambio_dolar';
	
	/*AUXILIARES*/
	public ?cambio_dolar $cambio_dolar_Original=null;	
	public ?GeneralEntity $cambio_dolar_Additional=null;
	public array $map_cambio_dolar=array();	
		
	/*CAMPOS*/
	public string $fecha_cambio = '';
	public float $dolar_compra = 0.0;
	public float $dolar_venta = 0.0;
	public string $origen = '';
	
	/*FKs*/
	
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->cambio_dolar_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->fecha_cambio=date('Y-m-d');
 		$this->dolar_compra=0.0;
 		$this->dolar_venta=0.0;
 		$this->origen='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cambio_dolar_Additional=new cambio_dolar_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_cambio_dolar() {
		$this->map_cambio_dolar = array();
	}
	
	/*CAMPOS*/
    
	public function  getfecha_cambio() : ?string {
		return $this->fecha_cambio;
	}
    
	public function  getdolar_compra() : ?float {
		return $this->dolar_compra;
	}
    
	public function  getdolar_venta() : ?float {
		return $this->dolar_venta;
	}
    
	public function  getorigen() : ?string {
		return $this->origen;
	}
	
    
	public function setfecha_cambio(?string $newfecha_cambio)
	{
		try {
			if($this->fecha_cambio!==$newfecha_cambio) {
				if($newfecha_cambio===null && $newfecha_cambio!='') {
					throw new Exception('cambio_dolar:Valor nulo no permitido en columna fecha_cambio');
				}

				if($newfecha_cambio!==null && filter_var($newfecha_cambio,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('cambio_dolar:No es fecha - fecha_cambio='.$newfecha_cambio);
				}

				$this->fecha_cambio=$newfecha_cambio;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdolar_compra(?float $newdolar_compra)
	{
		try {
			if($this->dolar_compra!==$newdolar_compra) {
				if($newdolar_compra===null && $newdolar_compra!='') {
					throw new Exception('cambio_dolar:Valor nulo no permitido en columna dolar_compra');
				}

				if($newdolar_compra!=0) {
					if($newdolar_compra!==null && filter_var($newdolar_compra,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('cambio_dolar:No es numero decimal - dolar_compra='.$newdolar_compra);
					}
				}

				$this->dolar_compra=$newdolar_compra;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdolar_venta(?float $newdolar_venta)
	{
		try {
			if($this->dolar_venta!==$newdolar_venta) {
				if($newdolar_venta===null && $newdolar_venta!='') {
					throw new Exception('cambio_dolar:Valor nulo no permitido en columna dolar_venta');
				}

				if($newdolar_venta!=0) {
					if($newdolar_venta!==null && filter_var($newdolar_venta,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('cambio_dolar:No es numero decimal - dolar_venta='.$newdolar_venta);
					}
				}

				$this->dolar_venta=$newdolar_venta;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setorigen(?string $neworigen)
	{
		try {
			if($this->origen!==$neworigen) {
				if($neworigen===null && $neworigen!='') {
					throw new Exception('cambio_dolar:Valor nulo no permitido en columna origen');
				}

				if(strlen($neworigen)>2) {
					throw new Exception('cambio_dolar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=2 en columna origen');
				}

				if(filter_var($neworigen,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('cambio_dolar:Formato incorrecto en columna origen='.$neworigen);
				}

				$this->origen=$neworigen;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	
		
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_cambio_dolarValue(string $sKey,$oValue) {
		$this->map_cambio_dolar[$sKey]=$oValue;
	}
	
	public function getMap_cambio_dolarValue(string $sKey) {
		return $this->map_cambio_dolar[$sKey];
	}
	
	public function getcambio_dolar_Original() : ?cambio_dolar {
		return $this->cambio_dolar_Original;
	}
	
	public function setcambio_dolar_Original(cambio_dolar $cambio_dolar) {
		try {
			$this->cambio_dolar_Original=$cambio_dolar;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_cambio_dolar() : array {
		return $this->map_cambio_dolar;
	}

	public function setMap_cambio_dolar(array $map_cambio_dolar) {
		$this->map_cambio_dolar = $map_cambio_dolar;
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
