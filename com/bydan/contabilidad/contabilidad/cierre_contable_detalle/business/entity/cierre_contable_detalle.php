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
namespace com\bydan\contabilidad\contabilidad\cierre_contable_detalle\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class cierre_contable_detalle extends GeneralEntity {

	/*GENERAL*/
	public static string $class='cierre_contable_detalle';
	
	/*AUXILIARES*/
	public ?cierre_contable_detalle $cierre_contable_detalle_Original=null;	
	public ?GeneralEntity $cierre_contable_detalle_Additional=null;
	public array $map_cierre_contable_detalle=array();	
		
	/*CAMPOS*/
	public int $id_detalle = 0;
	public int $id_cierre_contable = -1;
	public string $id_cierre_contable_Descripcion = '';

	public string $nro_documento = '';
	public string $tipo_factura = '';
	public float $monto = 0.0;
	
	/*FKs*/
	
	public ?cierre_contable $cierre_contable = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->cierre_contable_detalle_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_detalle=0;
 		$this->id_cierre_contable=-1;
		$this->id_cierre_contable_Descripcion='';

 		$this->nro_documento='';
 		$this->tipo_factura='';
 		$this->monto=0.0;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->cierre_contable=new cierre_contable();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cierre_contable_detalle_Additional=new cierre_contable_detalle_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_cierre_contable_detalle() {
		$this->map_cierre_contable_detalle = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_detalle() : ?int {
		return $this->id_detalle;
	}
    
	public function  getid_cierre_contable() : ?int {
		return $this->id_cierre_contable;
	}
	
	public function  getid_cierre_contable_Descripcion() : string {
		return $this->id_cierre_contable_Descripcion;
	}
    
	public function  getnro_documento() : ?string {
		return $this->nro_documento;
	}
    
	public function  gettipo_factura() : ?string {
		return $this->tipo_factura;
	}
    
	public function  getmonto() : ?float {
		return $this->monto;
	}
	
    
	public function setid_detalle(?int $newid_detalle)
	{
		try {
			if($this->id_detalle!==$newid_detalle) {
				if($newid_detalle===null && $newid_detalle!='') {
					throw new Exception('cierre_contable_detalle:Valor nulo no permitido en columna id_detalle');
				}

				if($newid_detalle!==null && filter_var($newid_detalle,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cierre_contable_detalle:No es numero entero - id_detalle='.$newid_detalle);
				}

				$this->id_detalle=$newid_detalle;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_cierre_contable(?int $newid_cierre_contable)
	{
		try {
			if($this->id_cierre_contable!==$newid_cierre_contable) {
				if($newid_cierre_contable===null && $newid_cierre_contable!='') {
					throw new Exception('cierre_contable_detalle:Valor nulo no permitido en columna id_cierre_contable');
				}

				if($newid_cierre_contable!==null && filter_var($newid_cierre_contable,FILTER_VALIDATE_INT)===false) {
					throw new Exception('cierre_contable_detalle:No es numero entero - id_cierre_contable='.$newid_cierre_contable);
				}

				$this->id_cierre_contable=$newid_cierre_contable;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_cierre_contable_Descripcion(string $newid_cierre_contable_Descripcion)
	{
		try {
			if($this->id_cierre_contable_Descripcion!=$newid_cierre_contable_Descripcion) {
				if($newid_cierre_contable_Descripcion===null && $newid_cierre_contable_Descripcion!='') {
					throw new Exception('cierre_contable_detalle:Valor nulo no permitido en columna id_cierre_contable');
				}

				$this->id_cierre_contable_Descripcion=$newid_cierre_contable_Descripcion;
				//$this->setIsChanged(true);
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
					throw new Exception('cierre_contable_detalle:Valor nulo no permitido en columna nro_documento');
				}

				if(strlen($newnro_documento)>10) {
					throw new Exception('cierre_contable_detalle:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=10 en columna nro_documento');
				}

				if(filter_var($newnro_documento,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('cierre_contable_detalle:Formato incorrecto en columna nro_documento='.$newnro_documento);
				}

				$this->nro_documento=$newnro_documento;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function settipo_factura(?string $newtipo_factura)
	{
		try {
			if($this->tipo_factura!==$newtipo_factura) {
				if($newtipo_factura===null && $newtipo_factura!='') {
					throw new Exception('cierre_contable_detalle:Valor nulo no permitido en columna tipo_factura');
				}

				if(strlen($newtipo_factura)>10) {
					throw new Exception('cierre_contable_detalle:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=10 en columna tipo_factura');
				}

				if(filter_var($newtipo_factura,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('cierre_contable_detalle:Formato incorrecto en columna tipo_factura='.$newtipo_factura);
				}

				$this->tipo_factura=$newtipo_factura;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setmonto(?float $newmonto)
	{
		try {
			if($this->monto!==$newmonto) {
				if($newmonto===null && $newmonto!='') {
					throw new Exception('cierre_contable_detalle:Valor nulo no permitido en columna monto');
				}

				if($newmonto!=0) {
					if($newmonto!==null && filter_var($newmonto,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('cierre_contable_detalle:No es numero decimal - monto='.$newmonto);
					}
				}

				$this->monto=$newmonto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	public function getcierre_contable() : ?cierre_contable {
		return $this->cierre_contable;
	}

	
	
	public  function  setcierre_contable(?cierre_contable $cierre_contable) {
		try {
			$this->cierre_contable=$cierre_contable;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_cierre_contable_detalleValue(string $sKey,$oValue) {
		$this->map_cierre_contable_detalle[$sKey]=$oValue;
	}
	
	public function getMap_cierre_contable_detalleValue(string $sKey) {
		return $this->map_cierre_contable_detalle[$sKey];
	}
	
	public function getcierre_contable_detalle_Original() : ?cierre_contable_detalle {
		return $this->cierre_contable_detalle_Original;
	}
	
	public function setcierre_contable_detalle_Original(cierre_contable_detalle $cierre_contable_detalle) {
		try {
			$this->cierre_contable_detalle_Original=$cierre_contable_detalle;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_cierre_contable_detalle() : array {
		return $this->map_cierre_contable_detalle;
	}

	public function setMap_cierre_contable_detalle(array $map_cierre_contable_detalle) {
		$this->map_cierre_contable_detalle = $map_cierre_contable_detalle;
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
