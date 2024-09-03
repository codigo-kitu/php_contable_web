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
namespace com\bydan\contabilidad\cuentaspagar\imagen_proveedor\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class imagen_proveedor extends GeneralEntity {

	/*GENERAL*/
	public static string $class='imagen_proveedor';
	
	/*AUXILIARES*/
	public ?imagen_proveedor $imagen_proveedor_Original=null;	
	public ?GeneralEntity $imagen_proveedor_Additional=null;
	public array $map_imagen_proveedor=array();	
		
	/*CAMPOS*/
	public int $id_proveedor = -1;
	public string $id_proveedor_Descripcion = '';

	public string $imagen = '';
	
	/*FKs*/
	
	public ?proveedor $proveedor = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->imagen_proveedor_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_proveedor=-1;
		$this->id_proveedor_Descripcion='';

 		$this->imagen='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->proveedor=new proveedor();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->imagen_proveedor_Additional=new imagen_proveedor_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_imagen_proveedor() {
		$this->map_imagen_proveedor = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_proveedor() : ?int {
		return $this->id_proveedor;
	}
	
	public function  getid_proveedor_Descripcion() : string {
		return $this->id_proveedor_Descripcion;
	}
    
	public function  getimagen() : ?string {
		return $this->imagen;
	}
	
    
	public function setid_proveedor(?int $newid_proveedor)
	{
		try {
			if($this->id_proveedor!==$newid_proveedor) {
				if($newid_proveedor===null && $newid_proveedor!='') {
					throw new Exception('imagen_proveedor:Valor nulo no permitido en columna id_proveedor');
				}

				if($newid_proveedor!==null && filter_var($newid_proveedor,FILTER_VALIDATE_INT)===false) {
					throw new Exception('imagen_proveedor:No es numero entero - id_proveedor='.$newid_proveedor);
				}

				$this->id_proveedor=$newid_proveedor;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_proveedor_Descripcion(string $newid_proveedor_Descripcion)
	{
		try {
			if($this->id_proveedor_Descripcion!=$newid_proveedor_Descripcion) {
				if($newid_proveedor_Descripcion===null && $newid_proveedor_Descripcion!='') {
					throw new Exception('imagen_proveedor:Valor nulo no permitido en columna id_proveedor');
				}

				$this->id_proveedor_Descripcion=$newid_proveedor_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setimagen(?string $newimagen)
	{
		try {
			if($this->imagen!==$newimagen) {
				if($newimagen===null && $newimagen!='') {
					throw new Exception('imagen_proveedor:Valor nulo no permitido en columna imagen');
				}

				if(strlen($newimagen)>1000) {
					throw new Exception('imagen_proveedor:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna imagen');
				}

				if(filter_var($newimagen,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('imagen_proveedor:Formato incorrecto en columna imagen='.$newimagen);
				}

				$this->imagen=$newimagen;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	public function getproveedor() : ?proveedor {
		return $this->proveedor;
	}

	
	
	public  function  setproveedor(?proveedor $proveedor) {
		try {
			$this->proveedor=$proveedor;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_imagen_proveedorValue(string $sKey,$oValue) {
		$this->map_imagen_proveedor[$sKey]=$oValue;
	}
	
	public function getMap_imagen_proveedorValue(string $sKey) {
		return $this->map_imagen_proveedor[$sKey];
	}
	
	public function getimagen_proveedor_Original() : ?imagen_proveedor {
		return $this->imagen_proveedor_Original;
	}
	
	public function setimagen_proveedor_Original(imagen_proveedor $imagen_proveedor) {
		try {
			$this->imagen_proveedor_Original=$imagen_proveedor;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_imagen_proveedor() : array {
		return $this->map_imagen_proveedor;
	}

	public function setMap_imagen_proveedor(array $map_imagen_proveedor) {
		$this->map_imagen_proveedor = $map_imagen_proveedor;
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
