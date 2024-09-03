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
namespace com\bydan\contabilidad\cuentascobrar\documento_cliente\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\cuentaspagar\documento_proveedor\business\entity\documento_proveedor;

class documento_cliente extends GeneralEntity {

	/*GENERAL*/
	public static string $class='documento_cliente';
	
	/*AUXILIARES*/
	public ?documento_cliente $documento_cliente_Original=null;	
	public ?GeneralEntity $documento_cliente_Additional=null;
	public array $map_documento_cliente=array();	
		
	/*CAMPOS*/
	public int $id_documento_proveedor = -1;
	public string $id_documento_proveedor_Descripcion = '';

	public int $id_cliente = -1;
	public string $id_cliente_Descripcion = '';

	public string $documento = '';
	
	/*FKs*/
	
	public ?documento_proveedor $documento_proveedor = null;
	public ?cliente $cliente = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->documento_cliente_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_documento_proveedor=-1;
		$this->id_documento_proveedor_Descripcion='';

 		$this->id_cliente=-1;
		$this->id_cliente_Descripcion='';

 		$this->documento='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->documento_proveedor=new documento_proveedor();
			$this->cliente=new cliente();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->documento_cliente_Additional=new documento_cliente_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_documento_cliente() {
		$this->map_documento_cliente = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_documento_proveedor() : ?int {
		return $this->id_documento_proveedor;
	}
	
	public function  getid_documento_proveedor_Descripcion() : string {
		return $this->id_documento_proveedor_Descripcion;
	}
    
	public function  getid_cliente() : ?int {
		return $this->id_cliente;
	}
	
	public function  getid_cliente_Descripcion() : string {
		return $this->id_cliente_Descripcion;
	}
    
	public function  getdocumento() : ?string {
		return $this->documento;
	}
	
    
	public function setid_documento_proveedor(?int $newid_documento_proveedor)
	{
		try {
			if($this->id_documento_proveedor!==$newid_documento_proveedor) {
				if($newid_documento_proveedor===null && $newid_documento_proveedor!='') {
					throw new Exception('documento_cliente:Valor nulo no permitido en columna id_documento_proveedor');
				}

				if($newid_documento_proveedor!==null && filter_var($newid_documento_proveedor,FILTER_VALIDATE_INT)===false) {
					throw new Exception('documento_cliente:No es numero entero - id_documento_proveedor='.$newid_documento_proveedor);
				}

				$this->id_documento_proveedor=$newid_documento_proveedor;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_documento_proveedor_Descripcion(string $newid_documento_proveedor_Descripcion)
	{
		try {
			if($this->id_documento_proveedor_Descripcion!=$newid_documento_proveedor_Descripcion) {
				if($newid_documento_proveedor_Descripcion===null && $newid_documento_proveedor_Descripcion!='') {
					throw new Exception('documento_cliente:Valor nulo no permitido en columna id_documento_proveedor');
				}

				$this->id_documento_proveedor_Descripcion=$newid_documento_proveedor_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_cliente(?int $newid_cliente)
	{
		try {
			if($this->id_cliente!==$newid_cliente) {
				if($newid_cliente===null && $newid_cliente!='') {
					throw new Exception('documento_cliente:Valor nulo no permitido en columna id_cliente');
				}

				if($newid_cliente!==null && filter_var($newid_cliente,FILTER_VALIDATE_INT)===false) {
					throw new Exception('documento_cliente:No es numero entero - id_cliente='.$newid_cliente);
				}

				$this->id_cliente=$newid_cliente;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_cliente_Descripcion(string $newid_cliente_Descripcion)
	{
		try {
			if($this->id_cliente_Descripcion!=$newid_cliente_Descripcion) {
				if($newid_cliente_Descripcion===null && $newid_cliente_Descripcion!='') {
					throw new Exception('documento_cliente:Valor nulo no permitido en columna id_cliente');
				}

				$this->id_cliente_Descripcion=$newid_cliente_Descripcion;
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
					throw new Exception('documento_cliente:Valor nulo no permitido en columna documento');
				}

				if(strlen($newdocumento)>1000) {
					throw new Exception('documento_cliente:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna documento');
				}

				if(filter_var($newdocumento,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('documento_cliente:Formato incorrecto en columna documento='.$newdocumento);
				}

				$this->documento=$newdocumento;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	public function getdocumento_proveedor() : ?documento_proveedor {
		return $this->documento_proveedor;
	}

	public function getcliente() : ?cliente {
		return $this->cliente;
	}

	
	
	public  function  setdocumento_proveedor(?documento_proveedor $documento_proveedor) {
		try {
			$this->documento_proveedor=$documento_proveedor;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setcliente(?cliente $cliente) {
		try {
			$this->cliente=$cliente;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_documento_clienteValue(string $sKey,$oValue) {
		$this->map_documento_cliente[$sKey]=$oValue;
	}
	
	public function getMap_documento_clienteValue(string $sKey) {
		return $this->map_documento_cliente[$sKey];
	}
	
	public function getdocumento_cliente_Original() : ?documento_cliente {
		return $this->documento_cliente_Original;
	}
	
	public function setdocumento_cliente_Original(documento_cliente $documento_cliente) {
		try {
			$this->documento_cliente_Original=$documento_cliente;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_documento_cliente() : array {
		return $this->map_documento_cliente;
	}

	public function setMap_documento_cliente(array $map_documento_cliente) {
		$this->map_documento_cliente = $map_documento_cliente;
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
