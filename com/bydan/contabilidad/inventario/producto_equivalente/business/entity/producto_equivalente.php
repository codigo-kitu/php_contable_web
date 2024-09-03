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
namespace com\bydan\contabilidad\inventario\producto_equivalente\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class producto_equivalente extends GeneralEntity {

	/*GENERAL*/
	public static string $class='producto_equivalente';
	
	/*AUXILIARES*/
	public ?producto_equivalente $producto_equivalente_Original=null;	
	public ?GeneralEntity $producto_equivalente_Additional=null;
	public array $map_producto_equivalente=array();	
		
	/*CAMPOS*/
	public int $id_producto_principal = -1;
	public string $id_producto_principal_Descripcion = '';

	public int $id_producto_equivalente = -1;
	public string $id_producto_equivalente_Descripcion = '';

	public int $producto_id_principal = 0;
	public int $producto_id_equivalente = 0;
	public string $comentario = '';
	
	/*FKs*/
	
	public ?producto $producto_principal = null;
	public ?producto_equivalente $producto_equivalente = null;
	
	/*RELACIONES*/
	
	public array $productoequivalentes = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->producto_equivalente_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_producto_principal=-1;
		$this->id_producto_principal_Descripcion='';

 		$this->id_producto_equivalente=-1;
		$this->id_producto_equivalente_Descripcion='';

 		$this->producto_id_principal=0;
 		$this->producto_id_equivalente=0;
 		$this->comentario='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->producto_principal=new producto();
		}
		
		/*RELACIONES*/
		
		$this->productoequivalentes=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->producto_equivalente_Additional=new producto_equivalente_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_producto_equivalente() {
		$this->map_producto_equivalente = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_producto_principal() : ?int {
		return $this->id_producto_principal;
	}
	
	public function  getid_producto_principal_Descripcion() : string {
		return $this->id_producto_principal_Descripcion;
	}
    
	public function  getid_producto_equivalente() : ?int {
		return $this->id_producto_equivalente;
	}
	
	public function  getid_producto_equivalente_Descripcion() : string {
		return $this->id_producto_equivalente_Descripcion;
	}
    
	public function  getproducto_id_principal() : ?int {
		return $this->producto_id_principal;
	}
    
	public function  getproducto_id_equivalente() : ?int {
		return $this->producto_id_equivalente;
	}
    
	public function  getcomentario() : ?string {
		return $this->comentario;
	}
	
    
	public function setid_producto_principal(?int $newid_producto_principal)
	{
		try {
			if($this->id_producto_principal!==$newid_producto_principal) {
				if($newid_producto_principal===null && $newid_producto_principal!='') {
					throw new Exception('producto_equivalente:Valor nulo no permitido en columna id_producto_principal');
				}

				if($newid_producto_principal!==null && filter_var($newid_producto_principal,FILTER_VALIDATE_INT)===false) {
					throw new Exception('producto_equivalente:No es numero entero - id_producto_principal='.$newid_producto_principal);
				}

				$this->id_producto_principal=$newid_producto_principal;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_producto_principal_Descripcion(string $newid_producto_principal_Descripcion)
	{
		try {
			if($this->id_producto_principal_Descripcion!=$newid_producto_principal_Descripcion) {
				if($newid_producto_principal_Descripcion===null && $newid_producto_principal_Descripcion!='') {
					throw new Exception('producto_equivalente:Valor nulo no permitido en columna id_producto_principal');
				}

				$this->id_producto_principal_Descripcion=$newid_producto_principal_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_producto_equivalente(?int $newid_producto_equivalente)
	{
		try {
			if($this->id_producto_equivalente!==$newid_producto_equivalente) {
				if($newid_producto_equivalente===null && $newid_producto_equivalente!='') {
					throw new Exception('producto_equivalente:Valor nulo no permitido en columna id_producto_equivalente');
				}

				if($newid_producto_equivalente!==null && filter_var($newid_producto_equivalente,FILTER_VALIDATE_INT)===false) {
					throw new Exception('producto_equivalente:No es numero entero - id_producto_equivalente='.$newid_producto_equivalente);
				}

				$this->id_producto_equivalente=$newid_producto_equivalente;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_producto_equivalente_Descripcion(string $newid_producto_equivalente_Descripcion)
	{
		try {
			if($this->id_producto_equivalente_Descripcion!=$newid_producto_equivalente_Descripcion) {
				if($newid_producto_equivalente_Descripcion===null && $newid_producto_equivalente_Descripcion!='') {
					throw new Exception('producto_equivalente:Valor nulo no permitido en columna id_producto_equivalente');
				}

				$this->id_producto_equivalente_Descripcion=$newid_producto_equivalente_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setproducto_id_principal(?int $newproducto_id_principal)
	{
		try {
			if($this->producto_id_principal!==$newproducto_id_principal) {
				if($newproducto_id_principal===null && $newproducto_id_principal!='') {
					throw new Exception('producto_equivalente:Valor nulo no permitido en columna producto_id_principal');
				}

				if($newproducto_id_principal!==null && filter_var($newproducto_id_principal,FILTER_VALIDATE_INT)===false) {
					throw new Exception('producto_equivalente:No es numero entero - producto_id_principal='.$newproducto_id_principal);
				}

				$this->producto_id_principal=$newproducto_id_principal;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setproducto_id_equivalente(?int $newproducto_id_equivalente)
	{
		try {
			if($this->producto_id_equivalente!==$newproducto_id_equivalente) {
				if($newproducto_id_equivalente===null && $newproducto_id_equivalente!='') {
					throw new Exception('producto_equivalente:Valor nulo no permitido en columna producto_id_equivalente');
				}

				if($newproducto_id_equivalente!==null && filter_var($newproducto_id_equivalente,FILTER_VALIDATE_INT)===false) {
					throw new Exception('producto_equivalente:No es numero entero - producto_id_equivalente='.$newproducto_id_equivalente);
				}

				$this->producto_id_equivalente=$newproducto_id_equivalente;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcomentario(?string $newcomentario)
	{
		try {
			if($this->comentario!==$newcomentario) {
				if($newcomentario===null && $newcomentario!='') {
					throw new Exception('producto_equivalente:Valor nulo no permitido en columna comentario');
				}

				if(strlen($newcomentario)>400) {
					throw new Exception('producto_equivalente:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=400 en columna comentario');
				}

				if(filter_var($newcomentario,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('producto_equivalente:Formato incorrecto en columna comentario='.$newcomentario);
				}

				$this->comentario=$newcomentario;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	public function getproducto_principal() : ?producto {
		return $this->producto_principal;
	}

	public function getproducto_equivalente() : ?producto_equivalente {
		return $this->producto_equivalente;
	}

	
	
	public  function  setproducto_principal(?producto $producto_principal) {
		try {
			$this->producto_principal=$producto_principal;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setproducto_equivalente(?producto_equivalente $producto_equivalente) {
		try {
			$this->producto_equivalente=$producto_equivalente;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	public function getproducto_equivalentes() : array {
		return $this->productoequivalentes;
	}

	
	
	public  function  setproducto_equivalentes(array $productoequivalentes) {
		try {
			$this->productoequivalentes=$productoequivalentes;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_producto_equivalenteValue(string $sKey,$oValue) {
		$this->map_producto_equivalente[$sKey]=$oValue;
	}
	
	public function getMap_producto_equivalenteValue(string $sKey) {
		return $this->map_producto_equivalente[$sKey];
	}
	
	public function getproducto_equivalente_Original() : ?producto_equivalente {
		return $this->producto_equivalente_Original;
	}
	
	public function setproducto_equivalente_Original(producto_equivalente $producto_equivalente) {
		try {
			$this->producto_equivalente_Original=$producto_equivalente;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_producto_equivalente() : array {
		return $this->map_producto_equivalente;
	}

	public function setMap_producto_equivalente(array $map_producto_equivalente) {
		$this->map_producto_equivalente = $map_producto_equivalente;
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
