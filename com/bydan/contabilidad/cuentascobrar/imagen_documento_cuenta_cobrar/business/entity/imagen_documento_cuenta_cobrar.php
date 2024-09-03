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
namespace com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class imagen_documento_cuenta_cobrar extends GeneralEntity {

	/*GENERAL*/
	public static string $class='imagen_documento_cuenta_cobrar';
	
	/*AUXILIARES*/
	public ?imagen_documento_cuenta_cobrar $imagen_documento_cuenta_cobrar_Original=null;	
	public ?GeneralEntity $imagen_documento_cuenta_cobrar_Additional=null;
	public array $map_imagen_documento_cuenta_cobrar=array();	
		
	/*CAMPOS*/
	public int $id_imagen = 0;
	public string $imagen = '';
	public int $id_documento_cuenta_cobrar = -1;
	public string $id_documento_cuenta_cobrar_Descripcion = '';

	public string $nro_documento = '';
	
	/*FKs*/
	
	public ?documento_cuenta_cobrar $documento_cuenta_cobrar = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->imagen_documento_cuenta_cobrar_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_imagen=0;
 		$this->imagen='';
 		$this->id_documento_cuenta_cobrar=-1;
		$this->id_documento_cuenta_cobrar_Descripcion='';

 		$this->nro_documento='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->documento_cuenta_cobrar=new documento_cuenta_cobrar();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->imagen_documento_cuenta_cobrar_Additional=new imagen_documento_cuenta_cobrar_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_imagen_documento_cuenta_cobrar() {
		$this->map_imagen_documento_cuenta_cobrar = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_imagen() : ?int {
		return $this->id_imagen;
	}
    
	public function  getimagen() : ?string {
		return $this->imagen;
	}
    
	public function  getid_documento_cuenta_cobrar() : ?int {
		return $this->id_documento_cuenta_cobrar;
	}
	
	public function  getid_documento_cuenta_cobrar_Descripcion() : string {
		return $this->id_documento_cuenta_cobrar_Descripcion;
	}
    
	public function  getnro_documento() : ?string {
		return $this->nro_documento;
	}
	
    
	public function setid_imagen(?int $newid_imagen)
	{
		try {
			if($this->id_imagen!==$newid_imagen) {
				if($newid_imagen===null && $newid_imagen!='') {
					throw new Exception('imagen_documento_cuenta_cobrar:Valor nulo no permitido en columna id_imagen');
				}

				if($newid_imagen!==null && filter_var($newid_imagen,FILTER_VALIDATE_INT)===false) {
					throw new Exception('imagen_documento_cuenta_cobrar:No es numero entero - id_imagen='.$newid_imagen);
				}

				$this->id_imagen=$newid_imagen;
				$this->setIsChanged(true);
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
					throw new Exception('imagen_documento_cuenta_cobrar:Valor nulo no permitido en columna imagen');
				}

				if(strlen($newimagen)>1000) {
					throw new Exception('imagen_documento_cuenta_cobrar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna imagen');
				}

				if(filter_var($newimagen,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('imagen_documento_cuenta_cobrar:Formato incorrecto en columna imagen='.$newimagen);
				}

				$this->imagen=$newimagen;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_documento_cuenta_cobrar(?int $newid_documento_cuenta_cobrar)
	{
		try {
			if($this->id_documento_cuenta_cobrar!==$newid_documento_cuenta_cobrar) {
				if($newid_documento_cuenta_cobrar===null && $newid_documento_cuenta_cobrar!='') {
					throw new Exception('imagen_documento_cuenta_cobrar:Valor nulo no permitido en columna id_documento_cuenta_cobrar');
				}

				if($newid_documento_cuenta_cobrar!==null && filter_var($newid_documento_cuenta_cobrar,FILTER_VALIDATE_INT)===false) {
					throw new Exception('imagen_documento_cuenta_cobrar:No es numero entero - id_documento_cuenta_cobrar='.$newid_documento_cuenta_cobrar);
				}

				$this->id_documento_cuenta_cobrar=$newid_documento_cuenta_cobrar;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_documento_cuenta_cobrar_Descripcion(string $newid_documento_cuenta_cobrar_Descripcion)
	{
		try {
			if($this->id_documento_cuenta_cobrar_Descripcion!=$newid_documento_cuenta_cobrar_Descripcion) {
				if($newid_documento_cuenta_cobrar_Descripcion===null && $newid_documento_cuenta_cobrar_Descripcion!='') {
					throw new Exception('imagen_documento_cuenta_cobrar:Valor nulo no permitido en columna id_documento_cuenta_cobrar');
				}

				$this->id_documento_cuenta_cobrar_Descripcion=$newid_documento_cuenta_cobrar_Descripcion;
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
					throw new Exception('imagen_documento_cuenta_cobrar:Valor nulo no permitido en columna nro_documento');
				}

				if(strlen($newnro_documento)>10) {
					throw new Exception('imagen_documento_cuenta_cobrar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=10 en columna nro_documento');
				}

				if(filter_var($newnro_documento,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('imagen_documento_cuenta_cobrar:Formato incorrecto en columna nro_documento='.$newnro_documento);
				}

				$this->nro_documento=$newnro_documento;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	public function getdocumento_cuenta_cobrar() : ?documento_cuenta_cobrar {
		return $this->documento_cuenta_cobrar;
	}

	
	
	public  function  setdocumento_cuenta_cobrar(?documento_cuenta_cobrar $documento_cuenta_cobrar) {
		try {
			$this->documento_cuenta_cobrar=$documento_cuenta_cobrar;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_imagen_documento_cuenta_cobrarValue(string $sKey,$oValue) {
		$this->map_imagen_documento_cuenta_cobrar[$sKey]=$oValue;
	}
	
	public function getMap_imagen_documento_cuenta_cobrarValue(string $sKey) {
		return $this->map_imagen_documento_cuenta_cobrar[$sKey];
	}
	
	public function getimagen_documento_cuenta_cobrar_Original() : ?imagen_documento_cuenta_cobrar {
		return $this->imagen_documento_cuenta_cobrar_Original;
	}
	
	public function setimagen_documento_cuenta_cobrar_Original(imagen_documento_cuenta_cobrar $imagen_documento_cuenta_cobrar) {
		try {
			$this->imagen_documento_cuenta_cobrar_Original=$imagen_documento_cuenta_cobrar;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_imagen_documento_cuenta_cobrar() : array {
		return $this->map_imagen_documento_cuenta_cobrar;
	}

	public function setMap_imagen_documento_cuenta_cobrar(array $map_imagen_documento_cuenta_cobrar) {
		$this->map_imagen_documento_cuenta_cobrar = $map_imagen_documento_cuenta_cobrar;
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
