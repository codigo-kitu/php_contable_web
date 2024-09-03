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
namespace com\bydan\contabilidad\contabilidad\parametro_contabilidad\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;

class parametro_contabilidad extends GeneralEntity {

	/*GENERAL*/
	public static string $class='parametro_contabilidad';
	
	/*AUXILIARES*/
	public ?parametro_contabilidad $parametro_contabilidad_Original=null;	
	public ?GeneralEntity $parametro_contabilidad_Additional=null;
	public array $map_parametro_contabilidad=array();	
		
	/*CAMPOS*/
	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public int $numero_asiento = 0;
	public bool $con_asiento_simple_facturacion = false;
	public bool $con_eliminacion_fisica_asiento = false;
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->parametro_contabilidad_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->numero_asiento=0;
 		$this->con_asiento_simple_facturacion=false;
 		$this->con_eliminacion_fisica_asiento=false;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->parametro_contabilidad_Additional=new parametro_contabilidad_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_parametro_contabilidad() {
		$this->map_parametro_contabilidad = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_empresa() : ?int {
		return $this->id_empresa;
	}
	
	public function  getid_empresa_Descripcion() : string {
		return $this->id_empresa_Descripcion;
	}
    
	public function  getnumero_asiento() : ?int {
		return $this->numero_asiento;
	}
    
	public function  getcon_asiento_simple_facturacion() : ?bool {
		return $this->con_asiento_simple_facturacion;
	}
    
	public function  getcon_eliminacion_fisica_asiento() : ?bool {
		return $this->con_eliminacion_fisica_asiento;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('parametro_contabilidad:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_contabilidad:No es numero entero - id_empresa='.$newid_empresa);
				}

				$this->id_empresa=$newid_empresa;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_empresa_Descripcion(string $newid_empresa_Descripcion)
	{
		try {
			if($this->id_empresa_Descripcion!=$newid_empresa_Descripcion) {
				if($newid_empresa_Descripcion===null && $newid_empresa_Descripcion!='') {
					throw new Exception('parametro_contabilidad:Valor nulo no permitido en columna id_empresa');
				}

				$this->id_empresa_Descripcion=$newid_empresa_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnumero_asiento(?int $newnumero_asiento)
	{
		try {
			if($this->numero_asiento!==$newnumero_asiento) {
				if($newnumero_asiento===null && $newnumero_asiento!='') {
					throw new Exception('parametro_contabilidad:Valor nulo no permitido en columna numero_asiento');
				}

				if($newnumero_asiento!==null && filter_var($newnumero_asiento,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_contabilidad:No es numero entero - numero_asiento='.$newnumero_asiento);
				}

				$this->numero_asiento=$newnumero_asiento;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcon_asiento_simple_facturacion(?bool $newcon_asiento_simple_facturacion)
	{
		try {
			if($this->con_asiento_simple_facturacion!==$newcon_asiento_simple_facturacion) {
				if($newcon_asiento_simple_facturacion===null && $newcon_asiento_simple_facturacion!='') {
					throw new Exception('parametro_contabilidad:Valor nulo no permitido en columna con_asiento_simple_facturacion');
				}

				if($newcon_asiento_simple_facturacion!==null && filter_var($newcon_asiento_simple_facturacion,FILTER_VALIDATE_BOOLEAN)===false && $newcon_asiento_simple_facturacion!==0 && $newcon_asiento_simple_facturacion!==false) {
					throw new Exception('parametro_contabilidad:No es valor booleano - con_asiento_simple_facturacion='.$newcon_asiento_simple_facturacion);
				}

				$this->con_asiento_simple_facturacion=$newcon_asiento_simple_facturacion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcon_eliminacion_fisica_asiento(?bool $newcon_eliminacion_fisica_asiento)
	{
		try {
			if($this->con_eliminacion_fisica_asiento!==$newcon_eliminacion_fisica_asiento) {
				if($newcon_eliminacion_fisica_asiento===null && $newcon_eliminacion_fisica_asiento!='') {
					throw new Exception('parametro_contabilidad:Valor nulo no permitido en columna con_eliminacion_fisica_asiento');
				}

				if($newcon_eliminacion_fisica_asiento!==null && filter_var($newcon_eliminacion_fisica_asiento,FILTER_VALIDATE_BOOLEAN)===false && $newcon_eliminacion_fisica_asiento!==0 && $newcon_eliminacion_fisica_asiento!==false) {
					throw new Exception('parametro_contabilidad:No es valor booleano - con_eliminacion_fisica_asiento='.$newcon_eliminacion_fisica_asiento);
				}

				$this->con_eliminacion_fisica_asiento=$newcon_eliminacion_fisica_asiento;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	public function getempresa() : ?empresa {
		return $this->empresa;
	}

	
	
	public  function  setempresa(?empresa $empresa) {
		try {
			$this->empresa=$empresa;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_parametro_contabilidadValue(string $sKey,$oValue) {
		$this->map_parametro_contabilidad[$sKey]=$oValue;
	}
	
	public function getMap_parametro_contabilidadValue(string $sKey) {
		return $this->map_parametro_contabilidad[$sKey];
	}
	
	public function getparametro_contabilidad_Original() : ?parametro_contabilidad {
		return $this->parametro_contabilidad_Original;
	}
	
	public function setparametro_contabilidad_Original(parametro_contabilidad $parametro_contabilidad) {
		try {
			$this->parametro_contabilidad_Original=$parametro_contabilidad;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_parametro_contabilidad() : array {
		return $this->map_parametro_contabilidad;
	}

	public function setMap_parametro_contabilidad(array $map_parametro_contabilidad) {
		$this->map_parametro_contabilidad = $map_parametro_contabilidad;
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
