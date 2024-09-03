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
namespace com\bydan\contabilidad\inventario\kit_producto\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class kit_producto extends GeneralEntity {

	/*GENERAL*/
	public static string $class='kit_producto';
	
	/*AUXILIARES*/
	public ?kit_producto $kit_producto_Original=null;	
	public ?GeneralEntity $kit_producto_Additional=null;
	public array $map_kit_producto=array();	
		
	/*CAMPOS*/
	public int $id_padre = 0;
	public int $id_hijo = 0;
	public float $cantidad = 0.0;
	
	/*FKs*/
	
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->kit_producto_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_padre=0;
 		$this->id_hijo=0;
 		$this->cantidad=0.0;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->kit_producto_Additional=new kit_producto_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_kit_producto() {
		$this->map_kit_producto = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_padre() : ?int {
		return $this->id_padre;
	}
    
	public function  getid_hijo() : ?int {
		return $this->id_hijo;
	}
    
	public function  getcantidad() : ?float {
		return $this->cantidad;
	}
	
    
	public function setid_padre(?int $newid_padre)
	{
		try {
			if($this->id_padre!==$newid_padre) {
				if($newid_padre===null && $newid_padre!='') {
					throw new Exception('kit_producto:Valor nulo no permitido en columna id_padre');
				}

				if($newid_padre!==null && filter_var($newid_padre,FILTER_VALIDATE_INT)===false) {
					throw new Exception('kit_producto:No es numero entero - id_padre='.$newid_padre);
				}

				$this->id_padre=$newid_padre;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_hijo(?int $newid_hijo)
	{
		try {
			if($this->id_hijo!==$newid_hijo) {
				if($newid_hijo===null && $newid_hijo!='') {
					throw new Exception('kit_producto:Valor nulo no permitido en columna id_hijo');
				}

				if($newid_hijo!==null && filter_var($newid_hijo,FILTER_VALIDATE_INT)===false) {
					throw new Exception('kit_producto:No es numero entero - id_hijo='.$newid_hijo);
				}

				$this->id_hijo=$newid_hijo;
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
					throw new Exception('kit_producto:Valor nulo no permitido en columna cantidad');
				}

				if($newcantidad!=0) {
					if($newcantidad!==null && filter_var($newcantidad,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('kit_producto:No es numero decimal - cantidad='.$newcantidad);
					}
				}

				$this->cantidad=$newcantidad;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	
		
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_kit_productoValue(string $sKey,$oValue) {
		$this->map_kit_producto[$sKey]=$oValue;
	}
	
	public function getMap_kit_productoValue(string $sKey) {
		return $this->map_kit_producto[$sKey];
	}
	
	public function getkit_producto_Original() : ?kit_producto {
		return $this->kit_producto_Original;
	}
	
	public function setkit_producto_Original(kit_producto $kit_producto) {
		try {
			$this->kit_producto_Original=$kit_producto;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_kit_producto() : array {
		return $this->map_kit_producto;
	}

	public function setMap_kit_producto(array $map_kit_producto) {
		$this->map_kit_producto = $map_kit_producto;
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
