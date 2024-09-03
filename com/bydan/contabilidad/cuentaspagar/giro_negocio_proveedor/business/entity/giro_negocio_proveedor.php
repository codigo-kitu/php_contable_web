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
namespace com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class giro_negocio_proveedor extends GeneralEntity {

	/*GENERAL*/
	public static string $class='giro_negocio_proveedor';
	
	/*AUXILIARES*/
	public ?giro_negocio_proveedor $giro_negocio_proveedor_Original=null;	
	public ?GeneralEntity $giro_negocio_proveedor_Additional=null;
	public array $map_giro_negocio_proveedor=array();	
		
	/*CAMPOS*/
	public string $nombre = '';
	public bool $predeterminado = false;
	
	/*FKs*/
	
	
	/*RELACIONES*/
	
	public array $proveedors = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->giro_negocio_proveedor_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->nombre='';
 		$this->predeterminado=false;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
		}
		
		/*RELACIONES*/
		
		$this->proveedors=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->giro_negocio_proveedor_Additional=new giro_negocio_proveedor_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_giro_negocio_proveedor() {
		$this->map_giro_negocio_proveedor = array();
	}
	
	/*CAMPOS*/
    
	public function  getnombre() : ?string {
		return $this->nombre;
	}
    
	public function  getpredeterminado() : ?bool {
		return $this->predeterminado;
	}
	
    
	public function setnombre(?string $newnombre)
	{
		try {
			if($this->nombre!==$newnombre) {
				if($newnombre===null && $newnombre!='') {
					throw new Exception('giro_negocio_proveedor:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>100) {
					throw new Exception('giro_negocio_proveedor:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=100 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('giro_negocio_proveedor:Formato incorrecto en columna nombre='.$newnombre);
				}

				$this->nombre=$newnombre;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setpredeterminado(?bool $newpredeterminado)
	{
		try {
			if($this->predeterminado!==$newpredeterminado) {
				if($newpredeterminado===null && $newpredeterminado!='') {
					throw new Exception('giro_negocio_proveedor:Valor nulo no permitido en columna predeterminado');
				}

				if($newpredeterminado!==null && filter_var($newpredeterminado,FILTER_VALIDATE_BOOLEAN)===false && $newpredeterminado!==0 && $newpredeterminado!==false) {
					throw new Exception('giro_negocio_proveedor:No es valor booleano - predeterminado='.$newpredeterminado);
				}

				$this->predeterminado=$newpredeterminado;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	
		
	
	/*RELACIONES*/
	
	public function getproveedors() : array {
		return $this->proveedors;
	}

	
	
	public  function  setproveedors(array $proveedors) {
		try {
			$this->proveedors=$proveedors;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_giro_negocio_proveedorValue(string $sKey,$oValue) {
		$this->map_giro_negocio_proveedor[$sKey]=$oValue;
	}
	
	public function getMap_giro_negocio_proveedorValue(string $sKey) {
		return $this->map_giro_negocio_proveedor[$sKey];
	}
	
	public function getgiro_negocio_proveedor_Original() : ?giro_negocio_proveedor {
		return $this->giro_negocio_proveedor_Original;
	}
	
	public function setgiro_negocio_proveedor_Original(giro_negocio_proveedor $giro_negocio_proveedor) {
		try {
			$this->giro_negocio_proveedor_Original=$giro_negocio_proveedor;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_giro_negocio_proveedor() : array {
		return $this->map_giro_negocio_proveedor;
	}

	public function setMap_giro_negocio_proveedor(array $map_giro_negocio_proveedor) {
		$this->map_giro_negocio_proveedor = $map_giro_negocio_proveedor;
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
