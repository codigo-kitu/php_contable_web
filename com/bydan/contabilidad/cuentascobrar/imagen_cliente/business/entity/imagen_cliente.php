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
namespace com\bydan\contabilidad\cuentascobrar\imagen_cliente\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class imagen_cliente extends GeneralEntity {

	/*GENERAL*/
	public static string $class='imagen_cliente';
	
	/*AUXILIARES*/
	public ?imagen_cliente $imagen_cliente_Original=null;	
	public ?GeneralEntity $imagen_cliente_Additional=null;
	public array $map_imagen_cliente=array();	
		
	/*CAMPOS*/
	public int $id_imagen = 0;
	public int $id_cliente = -1;
	public string $id_cliente_Descripcion = '';

	public string $imagen = '';
	
	/*FKs*/
	
	public ?cliente $cliente = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->imagen_cliente_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_imagen=0;
 		$this->id_cliente=-1;
		$this->id_cliente_Descripcion='';

 		$this->imagen='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->cliente=new cliente();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->imagen_cliente_Additional=new imagen_cliente_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_imagen_cliente() {
		$this->map_imagen_cliente = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_imagen() : ?int {
		return $this->id_imagen;
	}
    
	public function  getid_cliente() : ?int {
		return $this->id_cliente;
	}
	
	public function  getid_cliente_Descripcion() : string {
		return $this->id_cliente_Descripcion;
	}
    
	public function  getimagen() : ?string {
		return $this->imagen;
	}
	
    
	public function setid_imagen(?int $newid_imagen)
	{
		try {
			if($this->id_imagen!==$newid_imagen) {
				if($newid_imagen===null && $newid_imagen!='') {
					throw new Exception('imagen_cliente:Valor nulo no permitido en columna id_imagen');
				}

				if($newid_imagen!==null && filter_var($newid_imagen,FILTER_VALIDATE_INT)===false) {
					throw new Exception('imagen_cliente:No es numero entero - id_imagen='.$newid_imagen);
				}

				$this->id_imagen=$newid_imagen;
				$this->setIsChanged(true);
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
					throw new Exception('imagen_cliente:Valor nulo no permitido en columna id_cliente');
				}

				if($newid_cliente!==null && filter_var($newid_cliente,FILTER_VALIDATE_INT)===false) {
					throw new Exception('imagen_cliente:No es numero entero - id_cliente='.$newid_cliente);
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
					throw new Exception('imagen_cliente:Valor nulo no permitido en columna id_cliente');
				}

				$this->id_cliente_Descripcion=$newid_cliente_Descripcion;
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
					throw new Exception('imagen_cliente:Valor nulo no permitido en columna imagen');
				}

				if(strlen($newimagen)>1000) {
					throw new Exception('imagen_cliente:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna imagen');
				}

				if(filter_var($newimagen,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('imagen_cliente:Formato incorrecto en columna imagen='.$newimagen);
				}

				$this->imagen=$newimagen;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	public function getcliente() : ?cliente {
		return $this->cliente;
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
	public function setMap_imagen_clienteValue(string $sKey,$oValue) {
		$this->map_imagen_cliente[$sKey]=$oValue;
	}
	
	public function getMap_imagen_clienteValue(string $sKey) {
		return $this->map_imagen_cliente[$sKey];
	}
	
	public function getimagen_cliente_Original() : ?imagen_cliente {
		return $this->imagen_cliente_Original;
	}
	
	public function setimagen_cliente_Original(imagen_cliente $imagen_cliente) {
		try {
			$this->imagen_cliente_Original=$imagen_cliente;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_imagen_cliente() : array {
		return $this->map_imagen_cliente;
	}

	public function setMap_imagen_cliente(array $map_imagen_cliente) {
		$this->map_imagen_cliente = $map_imagen_cliente;
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
