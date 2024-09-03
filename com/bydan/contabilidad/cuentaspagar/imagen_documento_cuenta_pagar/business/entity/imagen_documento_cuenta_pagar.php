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
namespace com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class imagen_documento_cuenta_pagar extends GeneralEntity {

	/*GENERAL*/
	public static string $class='imagen_documento_cuenta_pagar';
	
	/*AUXILIARES*/
	public ?imagen_documento_cuenta_pagar $imagen_documento_cuenta_pagar_Original=null;	
	public ?GeneralEntity $imagen_documento_cuenta_pagar_Additional=null;
	public array $map_imagen_documento_cuenta_pagar=array();	
		
	/*CAMPOS*/
	public string $imagen = '';
	public int $id_documento_cuenta_pagar = -1;
	public string $id_documento_cuenta_pagar_Descripcion = '';

	public string $nro_documento = '';
	
	/*FKs*/
	
	public ?documento_cuenta_pagar $documento_cuenta_pagar = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->imagen_documento_cuenta_pagar_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->imagen='';
 		$this->id_documento_cuenta_pagar=-1;
		$this->id_documento_cuenta_pagar_Descripcion='';

 		$this->nro_documento='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->documento_cuenta_pagar=new documento_cuenta_pagar();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->imagen_documento_cuenta_pagar_Additional=new imagen_documento_cuenta_pagar_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_imagen_documento_cuenta_pagar() {
		$this->map_imagen_documento_cuenta_pagar = array();
	}
	
	/*CAMPOS*/
    
	public function  getimagen() : ?string {
		return $this->imagen;
	}
    
	public function  getid_documento_cuenta_pagar() : ?int {
		return $this->id_documento_cuenta_pagar;
	}
	
	public function  getid_documento_cuenta_pagar_Descripcion() : string {
		return $this->id_documento_cuenta_pagar_Descripcion;
	}
    
	public function  getnro_documento() : ?string {
		return $this->nro_documento;
	}
	
    
	public function setimagen(?string $newimagen)
	{
		try {
			if($this->imagen!==$newimagen) {
				if($newimagen===null && $newimagen!='') {
					throw new Exception('imagen_documento_cuenta_pagar:Valor nulo no permitido en columna imagen');
				}

				if(strlen($newimagen)>1000) {
					throw new Exception('imagen_documento_cuenta_pagar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna imagen');
				}

				if(filter_var($newimagen,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('imagen_documento_cuenta_pagar:Formato incorrecto en columna imagen='.$newimagen);
				}

				$this->imagen=$newimagen;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_documento_cuenta_pagar(?int $newid_documento_cuenta_pagar)
	{
		try {
			if($this->id_documento_cuenta_pagar!==$newid_documento_cuenta_pagar) {
				if($newid_documento_cuenta_pagar===null && $newid_documento_cuenta_pagar!='') {
					throw new Exception('imagen_documento_cuenta_pagar:Valor nulo no permitido en columna id_documento_cuenta_pagar');
				}

				if($newid_documento_cuenta_pagar!==null && filter_var($newid_documento_cuenta_pagar,FILTER_VALIDATE_INT)===false) {
					throw new Exception('imagen_documento_cuenta_pagar:No es numero entero - id_documento_cuenta_pagar='.$newid_documento_cuenta_pagar);
				}

				$this->id_documento_cuenta_pagar=$newid_documento_cuenta_pagar;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_documento_cuenta_pagar_Descripcion(string $newid_documento_cuenta_pagar_Descripcion)
	{
		try {
			if($this->id_documento_cuenta_pagar_Descripcion!=$newid_documento_cuenta_pagar_Descripcion) {
				if($newid_documento_cuenta_pagar_Descripcion===null && $newid_documento_cuenta_pagar_Descripcion!='') {
					throw new Exception('imagen_documento_cuenta_pagar:Valor nulo no permitido en columna id_documento_cuenta_pagar');
				}

				$this->id_documento_cuenta_pagar_Descripcion=$newid_documento_cuenta_pagar_Descripcion;
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
					throw new Exception('imagen_documento_cuenta_pagar:Valor nulo no permitido en columna nro_documento');
				}

				if(strlen($newnro_documento)>10) {
					throw new Exception('imagen_documento_cuenta_pagar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=10 en columna nro_documento');
				}

				if(filter_var($newnro_documento,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('imagen_documento_cuenta_pagar:Formato incorrecto en columna nro_documento='.$newnro_documento);
				}

				$this->nro_documento=$newnro_documento;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	public function getdocumento_cuenta_pagar() : ?documento_cuenta_pagar {
		return $this->documento_cuenta_pagar;
	}

	
	
	public  function  setdocumento_cuenta_pagar(?documento_cuenta_pagar $documento_cuenta_pagar) {
		try {
			$this->documento_cuenta_pagar=$documento_cuenta_pagar;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_imagen_documento_cuenta_pagarValue(string $sKey,$oValue) {
		$this->map_imagen_documento_cuenta_pagar[$sKey]=$oValue;
	}
	
	public function getMap_imagen_documento_cuenta_pagarValue(string $sKey) {
		return $this->map_imagen_documento_cuenta_pagar[$sKey];
	}
	
	public function getimagen_documento_cuenta_pagar_Original() : ?imagen_documento_cuenta_pagar {
		return $this->imagen_documento_cuenta_pagar_Original;
	}
	
	public function setimagen_documento_cuenta_pagar_Original(imagen_documento_cuenta_pagar $imagen_documento_cuenta_pagar) {
		try {
			$this->imagen_documento_cuenta_pagar_Original=$imagen_documento_cuenta_pagar;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_imagen_documento_cuenta_pagar() : array {
		return $this->map_imagen_documento_cuenta_pagar;
	}

	public function setMap_imagen_documento_cuenta_pagar(array $map_imagen_documento_cuenta_pagar) {
		$this->map_imagen_documento_cuenta_pagar = $map_imagen_documento_cuenta_pagar;
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
