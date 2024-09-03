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
namespace com\bydan\contabilidad\facturacion\imagen_factura\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class imagen_factura extends GeneralEntity {

	/*GENERAL*/
	public static string $class='imagen_factura';
	
	/*AUXILIARES*/
	public ?imagen_factura $imagen_factura_Original=null;	
	public ?GeneralEntity $imagen_factura_Additional=null;
	public array $map_imagen_factura=array();	
		
	/*CAMPOS*/
	public int $id_factura = -1;
	public string $id_factura_Descripcion = '';

	public int $id_imagen = 0;
	public string $imagen = '';
	public string $nro_factura = '';
	
	/*FKs*/
	
	public ?factura $factura = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->imagen_factura_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_factura=-1;
		$this->id_factura_Descripcion='';

 		$this->id_imagen=0;
 		$this->imagen='';
 		$this->nro_factura='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->factura=new factura();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->imagen_factura_Additional=new imagen_factura_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_imagen_factura() {
		$this->map_imagen_factura = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_factura() : ?int {
		return $this->id_factura;
	}
	
	public function  getid_factura_Descripcion() : string {
		return $this->id_factura_Descripcion;
	}
    
	public function  getid_imagen() : ?int {
		return $this->id_imagen;
	}
    
	public function  getimagen() : ?string {
		return $this->imagen;
	}
    
	public function  getnro_factura() : ?string {
		return $this->nro_factura;
	}
	
    
	public function setid_factura(?int $newid_factura)
	{
		try {
			if($this->id_factura!==$newid_factura) {
				if($newid_factura===null && $newid_factura!='') {
					throw new Exception('imagen_factura:Valor nulo no permitido en columna id_factura');
				}

				if($newid_factura!==null && filter_var($newid_factura,FILTER_VALIDATE_INT)===false) {
					throw new Exception('imagen_factura:No es numero entero - id_factura='.$newid_factura);
				}

				$this->id_factura=$newid_factura;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_factura_Descripcion(string $newid_factura_Descripcion)
	{
		try {
			if($this->id_factura_Descripcion!=$newid_factura_Descripcion) {
				if($newid_factura_Descripcion===null && $newid_factura_Descripcion!='') {
					throw new Exception('imagen_factura:Valor nulo no permitido en columna id_factura');
				}

				$this->id_factura_Descripcion=$newid_factura_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_imagen(?int $newid_imagen)
	{
		try {
			if($this->id_imagen!==$newid_imagen) {
				if($newid_imagen===null && $newid_imagen!='') {
					throw new Exception('imagen_factura:Valor nulo no permitido en columna id_imagen');
				}

				if($newid_imagen!==null && filter_var($newid_imagen,FILTER_VALIDATE_INT)===false) {
					throw new Exception('imagen_factura:No es numero entero - id_imagen='.$newid_imagen);
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
					throw new Exception('imagen_factura:Valor nulo no permitido en columna imagen');
				}

				if(strlen($newimagen)>1000) {
					throw new Exception('imagen_factura:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=1000 en columna imagen');
				}

				if(filter_var($newimagen,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('imagen_factura:Formato incorrecto en columna imagen='.$newimagen);
				}

				$this->imagen=$newimagen;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnro_factura(?string $newnro_factura)
	{
		try {
			if($this->nro_factura!==$newnro_factura) {
				if($newnro_factura===null && $newnro_factura!='') {
					throw new Exception('imagen_factura:Valor nulo no permitido en columna nro_factura');
				}

				if(strlen($newnro_factura)>10) {
					throw new Exception('imagen_factura:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=10 en columna nro_factura');
				}

				if(filter_var($newnro_factura,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('imagen_factura:Formato incorrecto en columna nro_factura='.$newnro_factura);
				}

				$this->nro_factura=$newnro_factura;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	public function getfactura() : ?factura {
		return $this->factura;
	}

	
	
	public  function  setfactura(?factura $factura) {
		try {
			$this->factura=$factura;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_imagen_facturaValue(string $sKey,$oValue) {
		$this->map_imagen_factura[$sKey]=$oValue;
	}
	
	public function getMap_imagen_facturaValue(string $sKey) {
		return $this->map_imagen_factura[$sKey];
	}
	
	public function getimagen_factura_Original() : ?imagen_factura {
		return $this->imagen_factura_Original;
	}
	
	public function setimagen_factura_Original(imagen_factura $imagen_factura) {
		try {
			$this->imagen_factura_Original=$imagen_factura;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_imagen_factura() : array {
		return $this->map_imagen_factura;
	}

	public function setMap_imagen_factura(array $map_imagen_factura) {
		$this->map_imagen_factura = $map_imagen_factura;
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
