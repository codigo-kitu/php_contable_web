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
namespace com\bydan\contabilidad\inventario\inventario_fisico_detalle\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class inventario_fisico_detalle extends GeneralEntity {

	/*GENERAL*/
	public static string $class='inventario_fisico_detalle';
	
	/*AUXILIARES*/
	public ?inventario_fisico_detalle $inventario_fisico_detalle_Original=null;	
	public ?GeneralEntity $inventario_fisico_detalle_Additional=null;
	public array $map_inventario_fisico_detalle=array();	
		
	/*CAMPOS*/
	public int $id_inventario_fisico = -1;
	public string $id_inventario_fisico_Descripcion = '';

	public int $id_producto = -1;
	public string $id_producto_Descripcion = '';

	public int $id_bodega = -1;
	public string $id_bodega_Descripcion = '';

	public float $unidades_contadas = 0.0;
	public string $campo1 = '';
	public float $campo2 = 0.0;
	public string $campo3 = '';
	
	/*FKs*/
	
	public ?inventario_fisico $inventario_fisico = null;
	public ?producto $producto = null;
	public ?bodega $bodega = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->inventario_fisico_detalle_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_inventario_fisico=-1;
		$this->id_inventario_fisico_Descripcion='';

 		$this->id_producto=-1;
		$this->id_producto_Descripcion='';

 		$this->id_bodega=-1;
		$this->id_bodega_Descripcion='';

 		$this->unidades_contadas=0.0;
 		$this->campo1='';
 		$this->campo2=0.0;
 		$this->campo3='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->inventario_fisico=new inventario_fisico();
			$this->producto=new producto();
			$this->bodega=new bodega();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->inventario_fisico_detalle_Additional=new inventario_fisico_detalle_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_inventario_fisico_detalle() {
		$this->map_inventario_fisico_detalle = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_inventario_fisico() : ?int {
		return $this->id_inventario_fisico;
	}
	
	public function  getid_inventario_fisico_Descripcion() : string {
		return $this->id_inventario_fisico_Descripcion;
	}
    
	public function  getid_producto() : ?int {
		return $this->id_producto;
	}
	
	public function  getid_producto_Descripcion() : string {
		return $this->id_producto_Descripcion;
	}
    
	public function  getid_bodega() : ?int {
		return $this->id_bodega;
	}
	
	public function  getid_bodega_Descripcion() : string {
		return $this->id_bodega_Descripcion;
	}
    
	public function  getunidades_contadas() : ?float {
		return $this->unidades_contadas;
	}
    
	public function  getcampo1() : ?string {
		return $this->campo1;
	}
    
	public function  getcampo2() : ?float {
		return $this->campo2;
	}
    
	public function  getcampo3() : ?string {
		return $this->campo3;
	}
	
    
	public function setid_inventario_fisico(?int $newid_inventario_fisico)
	{
		try {
			if($this->id_inventario_fisico!==$newid_inventario_fisico) {
				if($newid_inventario_fisico===null && $newid_inventario_fisico!='') {
					throw new Exception('inventario_fisico_detalle:Valor nulo no permitido en columna id_inventario_fisico');
				}

				if($newid_inventario_fisico!==null && filter_var($newid_inventario_fisico,FILTER_VALIDATE_INT)===false) {
					throw new Exception('inventario_fisico_detalle:No es numero entero - id_inventario_fisico='.$newid_inventario_fisico);
				}

				$this->id_inventario_fisico=$newid_inventario_fisico;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_inventario_fisico_Descripcion(string $newid_inventario_fisico_Descripcion)
	{
		try {
			if($this->id_inventario_fisico_Descripcion!=$newid_inventario_fisico_Descripcion) {
				if($newid_inventario_fisico_Descripcion===null && $newid_inventario_fisico_Descripcion!='') {
					throw new Exception('inventario_fisico_detalle:Valor nulo no permitido en columna id_inventario_fisico');
				}

				$this->id_inventario_fisico_Descripcion=$newid_inventario_fisico_Descripcion;
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
					throw new Exception('inventario_fisico_detalle:Valor nulo no permitido en columna id_producto');
				}

				if($newid_producto!==null && filter_var($newid_producto,FILTER_VALIDATE_INT)===false) {
					throw new Exception('inventario_fisico_detalle:No es numero entero - id_producto='.$newid_producto);
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
					throw new Exception('inventario_fisico_detalle:Valor nulo no permitido en columna id_producto');
				}

				$this->id_producto_Descripcion=$newid_producto_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_bodega(?int $newid_bodega)
	{
		try {
			if($this->id_bodega!==$newid_bodega) {
				if($newid_bodega===null && $newid_bodega!='') {
					throw new Exception('inventario_fisico_detalle:Valor nulo no permitido en columna id_bodega');
				}

				if($newid_bodega!==null && filter_var($newid_bodega,FILTER_VALIDATE_INT)===false) {
					throw new Exception('inventario_fisico_detalle:No es numero entero - id_bodega='.$newid_bodega);
				}

				$this->id_bodega=$newid_bodega;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_bodega_Descripcion(string $newid_bodega_Descripcion)
	{
		try {
			if($this->id_bodega_Descripcion!=$newid_bodega_Descripcion) {
				if($newid_bodega_Descripcion===null && $newid_bodega_Descripcion!='') {
					throw new Exception('inventario_fisico_detalle:Valor nulo no permitido en columna id_bodega');
				}

				$this->id_bodega_Descripcion=$newid_bodega_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setunidades_contadas(?float $newunidades_contadas)
	{
		try {
			if($this->unidades_contadas!==$newunidades_contadas) {
				if($newunidades_contadas===null && $newunidades_contadas!='') {
					throw new Exception('inventario_fisico_detalle:Valor nulo no permitido en columna unidades_contadas');
				}

				if($newunidades_contadas!=0) {
					if($newunidades_contadas!==null && filter_var($newunidades_contadas,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('inventario_fisico_detalle:No es numero decimal - unidades_contadas='.$newunidades_contadas);
					}
				}

				$this->unidades_contadas=$newunidades_contadas;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcampo1(?string $newcampo1)
	{
		try {
			if($this->campo1!==$newcampo1) {
				if($newcampo1===null && $newcampo1!='') {
					throw new Exception('inventario_fisico_detalle:Valor nulo no permitido en columna campo1');
				}

				if(strlen($newcampo1)>100) {
					throw new Exception('inventario_fisico_detalle:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=100 en columna campo1');
				}

				if(filter_var($newcampo1,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('inventario_fisico_detalle:Formato incorrecto en columna campo1='.$newcampo1);
				}

				$this->campo1=$newcampo1;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcampo2(?float $newcampo2)
	{
		try {
			if($this->campo2!==$newcampo2) {
				if($newcampo2===null && $newcampo2!='') {
					throw new Exception('inventario_fisico_detalle:Valor nulo no permitido en columna campo2');
				}

				if($newcampo2!=0) {
					if($newcampo2!==null && filter_var($newcampo2,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('inventario_fisico_detalle:No es numero decimal - campo2='.$newcampo2);
					}
				}

				$this->campo2=$newcampo2;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcampo3(?string $newcampo3)
	{
		try {
			if($this->campo3!==$newcampo3) {
				if($newcampo3===null && $newcampo3!='') {
					throw new Exception('inventario_fisico_detalle:Valor nulo no permitido en columna campo3');
				}

				if(strlen($newcampo3)>1000) {
					throw new Exception('inventario_fisico_detalle:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna campo3');
				}

				if(filter_var($newcampo3,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('inventario_fisico_detalle:Formato incorrecto en columna campo3='.$newcampo3);
				}

				$this->campo3=$newcampo3;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	public function getinventario_fisico() : ?inventario_fisico {
		return $this->inventario_fisico;
	}

	public function getproducto() : ?producto {
		return $this->producto;
	}

	public function getbodega() : ?bodega {
		return $this->bodega;
	}

	
	
	public  function  setinventario_fisico(?inventario_fisico $inventario_fisico) {
		try {
			$this->inventario_fisico=$inventario_fisico;
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


	public  function  setbodega(?bodega $bodega) {
		try {
			$this->bodega=$bodega;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_inventario_fisico_detalleValue(string $sKey,$oValue) {
		$this->map_inventario_fisico_detalle[$sKey]=$oValue;
	}
	
	public function getMap_inventario_fisico_detalleValue(string $sKey) {
		return $this->map_inventario_fisico_detalle[$sKey];
	}
	
	public function getinventario_fisico_detalle_Original() : ?inventario_fisico_detalle {
		return $this->inventario_fisico_detalle_Original;
	}
	
	public function setinventario_fisico_detalle_Original(inventario_fisico_detalle $inventario_fisico_detalle) {
		try {
			$this->inventario_fisico_detalle_Original=$inventario_fisico_detalle;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_inventario_fisico_detalle() : array {
		return $this->map_inventario_fisico_detalle;
	}

	public function setMap_inventario_fisico_detalle(array $map_inventario_fisico_detalle) {
		$this->map_inventario_fisico_detalle = $map_inventario_fisico_detalle;
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
