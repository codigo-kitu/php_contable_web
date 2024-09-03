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
namespace com\bydan\contabilidad\cuentaspagar\documento_proveedor\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class documento_proveedor extends GeneralEntity {

	/*GENERAL*/
	public static string $class='documento_proveedor';
	
	/*AUXILIARES*/
	public ?documento_proveedor $documento_proveedor_Original=null;	
	public ?GeneralEntity $documento_proveedor_Additional=null;
	public array $map_documento_proveedor=array();	
		
	/*CAMPOS*/
	public int $id_proveedor = -1;
	public string $id_proveedor_Descripcion = '';

	public string $documento = '';
	
	/*FKs*/
	
	public ?proveedor $proveedor = null;
	
	/*RELACIONES*/
	
	public array $documentoclientes = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->documento_proveedor_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_proveedor=-1;
		$this->id_proveedor_Descripcion='';

 		$this->documento='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->proveedor=new proveedor();
		}
		
		/*RELACIONES*/
		
		$this->documentoclientes=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->documento_proveedor_Additional=new documento_proveedor_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_documento_proveedor() {
		$this->map_documento_proveedor = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_proveedor() : ?int {
		return $this->id_proveedor;
	}
	
	public function  getid_proveedor_Descripcion() : string {
		return $this->id_proveedor_Descripcion;
	}
    
	public function  getdocumento() : ?string {
		return $this->documento;
	}
	
    
	public function setid_proveedor(?int $newid_proveedor)
	{
		try {
			if($this->id_proveedor!==$newid_proveedor) {
				if($newid_proveedor===null && $newid_proveedor!='') {
					throw new Exception('documento_proveedor:Valor nulo no permitido en columna id_proveedor');
				}

				if($newid_proveedor!==null && filter_var($newid_proveedor,FILTER_VALIDATE_INT)===false) {
					throw new Exception('documento_proveedor:No es numero entero - id_proveedor='.$newid_proveedor);
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
					throw new Exception('documento_proveedor:Valor nulo no permitido en columna id_proveedor');
				}

				$this->id_proveedor_Descripcion=$newid_proveedor_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdocumento(?string $newdocumento)
	{
		try {
			if($this->documento!==$newdocumento) {
				if($newdocumento===null && $newdocumento!='') {
					throw new Exception('documento_proveedor:Valor nulo no permitido en columna documento');
				}

				if(strlen($newdocumento)>1000) {
					throw new Exception('documento_proveedor:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna documento');
				}

				if(filter_var($newdocumento,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('documento_proveedor:Formato incorrecto en columna documento='.$newdocumento);
				}

				$this->documento=$newdocumento;
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
	
	public function getdocumento_clientes() : array {
		return $this->documentoclientes;
	}

	
	
	public  function  setdocumento_clientes(array $documentoclientes) {
		try {
			$this->documentoclientes=$documentoclientes;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_documento_proveedorValue(string $sKey,$oValue) {
		$this->map_documento_proveedor[$sKey]=$oValue;
	}
	
	public function getMap_documento_proveedorValue(string $sKey) {
		return $this->map_documento_proveedor[$sKey];
	}
	
	public function getdocumento_proveedor_Original() : ?documento_proveedor {
		return $this->documento_proveedor_Original;
	}
	
	public function setdocumento_proveedor_Original(documento_proveedor $documento_proveedor) {
		try {
			$this->documento_proveedor_Original=$documento_proveedor;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_documento_proveedor() : array {
		return $this->map_documento_proveedor;
	}

	public function setMap_documento_proveedor(array $map_documento_proveedor) {
		$this->map_documento_proveedor = $map_documento_proveedor;
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
