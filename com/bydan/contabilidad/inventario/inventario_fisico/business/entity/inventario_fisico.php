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
namespace com\bydan\contabilidad\inventario\inventario_fisico\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class inventario_fisico extends GeneralEntity {

	/*GENERAL*/
	public static string $class='inventario_fisico';
	
	/*AUXILIARES*/
	public ?inventario_fisico $inventario_fisico_Original=null;	
	public ?GeneralEntity $inventario_fisico_Additional=null;
	public array $map_inventario_fisico=array();	
		
	/*CAMPOS*/
	public int $id_inventario_fisico = -1;
	public string $id_inventario_fisico_Descripcion = '';

	public int $id_bodega = -1;
	public string $id_bodega_Descripcion = '';

	public string $fecha = '';
	public string $descripcion = '';
	public int $id_almacen = 0;
	public float $prod_cont_almacen = 0.0;
	public float $total_productos_almacen = 0.0;
	public string $campo1 = '';
	public float $campo2 = 0.0;
	public string $campo3 = '';
	
	/*FKs*/
	
	public ?inventario_fisico $inventario_fisico = null;
	public ?bodega $bodega = null;
	
	/*RELACIONES*/
	
	public array $inventariofisicodetalles = array();
	public array $inventariofisicos = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->inventario_fisico_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_inventario_fisico=-1;
		$this->id_inventario_fisico_Descripcion='';

 		$this->id_bodega=-1;
		$this->id_bodega_Descripcion='';

 		$this->fecha=date('Y-m-d');
 		$this->descripcion='';
 		$this->id_almacen=0;
 		$this->prod_cont_almacen=0.0;
 		$this->total_productos_almacen=0.0;
 		$this->campo1='';
 		$this->campo2=0.0;
 		$this->campo3='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->bodega=new bodega();
		}
		
		/*RELACIONES*/
		
		$this->inventariofisicodetalles=array();
		$this->inventariofisicos=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->inventario_fisico_Additional=new inventario_fisico_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_inventario_fisico() {
		$this->map_inventario_fisico = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_inventario_fisico() : ?int {
		return $this->id_inventario_fisico;
	}
	
	public function  getid_inventario_fisico_Descripcion() : string {
		return $this->id_inventario_fisico_Descripcion;
	}
    
	public function  getid_bodega() : ?int {
		return $this->id_bodega;
	}
	
	public function  getid_bodega_Descripcion() : string {
		return $this->id_bodega_Descripcion;
	}
    
	public function  getfecha() : ?string {
		return $this->fecha;
	}
    
	public function  getdescripcion() : ?string {
		return $this->descripcion;
	}
    
	public function  getid_almacen() : ?int {
		return $this->id_almacen;
	}
    
	public function  getprod_cont_almacen() : ?float {
		return $this->prod_cont_almacen;
	}
    
	public function  gettotal_productos_almacen() : ?float {
		return $this->total_productos_almacen;
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
					throw new Exception('inventario_fisico:Valor nulo no permitido en columna id_inventario_fisico');
				}

				if($newid_inventario_fisico!==null && filter_var($newid_inventario_fisico,FILTER_VALIDATE_INT)===false) {
					throw new Exception('inventario_fisico:No es numero entero - id_inventario_fisico='.$newid_inventario_fisico);
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
					throw new Exception('inventario_fisico:Valor nulo no permitido en columna id_inventario_fisico');
				}

				$this->id_inventario_fisico_Descripcion=$newid_inventario_fisico_Descripcion;
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
					throw new Exception('inventario_fisico:Valor nulo no permitido en columna id_bodega');
				}

				if($newid_bodega!==null && filter_var($newid_bodega,FILTER_VALIDATE_INT)===false) {
					throw new Exception('inventario_fisico:No es numero entero - id_bodega='.$newid_bodega);
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
					throw new Exception('inventario_fisico:Valor nulo no permitido en columna id_bodega');
				}

				$this->id_bodega_Descripcion=$newid_bodega_Descripcion;
				//$this->setIsChanged(true);
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
					throw new Exception('inventario_fisico:Valor nulo no permitido en columna fecha');
				}

				if($newfecha!==null && filter_var($newfecha,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_FECHA)))===false) {
					throw new Exception('inventario_fisico:No es fecha - fecha='.$newfecha);
				}

				$this->fecha=$newfecha;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdescripcion(?string $newdescripcion)
	{
		try {
			if($this->descripcion!==$newdescripcion) {
				if($newdescripcion===null && $newdescripcion!='') {
					throw new Exception('inventario_fisico:Valor nulo no permitido en columna descripcion');
				}

				if(strlen($newdescripcion)>200) {
					throw new Exception('inventario_fisico:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=200 en columna descripcion');
				}

				if(filter_var($newdescripcion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('inventario_fisico:Formato incorrecto en columna descripcion='.$newdescripcion);
				}

				$this->descripcion=$newdescripcion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_almacen(?int $newid_almacen)
	{
		try {
			if($this->id_almacen!==$newid_almacen) {
				if($newid_almacen===null && $newid_almacen!='') {
					throw new Exception('inventario_fisico:Valor nulo no permitido en columna id_almacen');
				}

				if($newid_almacen!==null && filter_var($newid_almacen,FILTER_VALIDATE_INT)===false) {
					throw new Exception('inventario_fisico:No es numero entero - id_almacen='.$newid_almacen);
				}

				$this->id_almacen=$newid_almacen;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setprod_cont_almacen(?float $newprod_cont_almacen)
	{
		try {
			if($this->prod_cont_almacen!==$newprod_cont_almacen) {
				if($newprod_cont_almacen===null && $newprod_cont_almacen!='') {
					throw new Exception('inventario_fisico:Valor nulo no permitido en columna prod_cont_almacen');
				}

				if($newprod_cont_almacen!=0) {
					if($newprod_cont_almacen!==null && filter_var($newprod_cont_almacen,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('inventario_fisico:No es numero decimal - prod_cont_almacen='.$newprod_cont_almacen);
					}
				}

				$this->prod_cont_almacen=$newprod_cont_almacen;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function settotal_productos_almacen(?float $newtotal_productos_almacen)
	{
		try {
			if($this->total_productos_almacen!==$newtotal_productos_almacen) {
				if($newtotal_productos_almacen===null && $newtotal_productos_almacen!='') {
					throw new Exception('inventario_fisico:Valor nulo no permitido en columna total_productos_almacen');
				}

				if($newtotal_productos_almacen!=0) {
					if($newtotal_productos_almacen!==null && filter_var($newtotal_productos_almacen,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('inventario_fisico:No es numero decimal - total_productos_almacen='.$newtotal_productos_almacen);
					}
				}

				$this->total_productos_almacen=$newtotal_productos_almacen;
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
					throw new Exception('inventario_fisico:Valor nulo no permitido en columna campo1');
				}

				if(strlen($newcampo1)>100) {
					throw new Exception('inventario_fisico:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=100 en columna campo1');
				}

				if(filter_var($newcampo1,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('inventario_fisico:Formato incorrecto en columna campo1='.$newcampo1);
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
					throw new Exception('inventario_fisico:Valor nulo no permitido en columna campo2');
				}

				if($newcampo2!=0) {
					if($newcampo2!==null && filter_var($newcampo2,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('inventario_fisico:No es numero decimal - campo2='.$newcampo2);
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
					throw new Exception('inventario_fisico:Valor nulo no permitido en columna campo3');
				}

				if(strlen($newcampo3)>1000) {
					throw new Exception('inventario_fisico:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna campo3');
				}

				if(filter_var($newcampo3,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('inventario_fisico:Formato incorrecto en columna campo3='.$newcampo3);
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


	public  function  setbodega(?bodega $bodega) {
		try {
			$this->bodega=$bodega;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	public function getinventario_fisico_detalles() : array {
		return $this->inventariofisicodetalles;
	}

	public function getinventario_fisicos() : array {
		return $this->inventariofisicos;
	}

	
	
	public  function  setinventario_fisico_detalles(array $inventariofisicodetalles) {
		try {
			$this->inventariofisicodetalles=$inventariofisicodetalles;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setinventario_fisicos(array $inventariofisicos) {
		try {
			$this->inventariofisicos=$inventariofisicos;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_inventario_fisicoValue(string $sKey,$oValue) {
		$this->map_inventario_fisico[$sKey]=$oValue;
	}
	
	public function getMap_inventario_fisicoValue(string $sKey) {
		return $this->map_inventario_fisico[$sKey];
	}
	
	public function getinventario_fisico_Original() : ?inventario_fisico {
		return $this->inventario_fisico_Original;
	}
	
	public function setinventario_fisico_Original(inventario_fisico $inventario_fisico) {
		try {
			$this->inventario_fisico_Original=$inventario_fisico;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_inventario_fisico() : array {
		return $this->map_inventario_fisico;
	}

	public function setMap_inventario_fisico(array $map_inventario_fisico) {
		$this->map_inventario_fisico = $map_inventario_fisico;
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
