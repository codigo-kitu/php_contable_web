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
namespace com\bydan\contabilidad\seguridad\auditoria_detalle\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class auditoria_detalle extends GeneralEntity {

	/*GENERAL*/
	public static string $class='auditoria_detalle';
	
	/*AUXILIARES*/
	public ?auditoria_detalle $auditoria_detalle_Original=null;	
	public ?GeneralEntity $auditoria_detalle_Additional=null;
	public array $map_auditoria_detalle=array();	
		
	/*CAMPOS*/
	public int $id_auditoria = -1;
	public string $id_auditoria_Descripcion = '';

	public string $nombre_campo = '';
	public string $valor_anterior = '';
	public string $valor_actual = '';
	
	/*FKs*/
	
	public ?auditoria $auditoria = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->auditoria_detalle_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_auditoria=-1;
		$this->id_auditoria_Descripcion='';

 		$this->nombre_campo='';
 		$this->valor_anterior='';
 		$this->valor_actual='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->auditoria=new auditoria();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->auditoria_detalle_Additional=new auditoria_detalle_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_auditoria_detalle() {
		$this->map_auditoria_detalle = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_auditoria() : ?int {
		return $this->id_auditoria;
	}
	
	public function  getid_auditoria_Descripcion() : string {
		return $this->id_auditoria_Descripcion;
	}
    
	public function  getnombre_campo() : ?string {
		return $this->nombre_campo;
	}
    
	public function  getvalor_anterior() : ?string {
		return $this->valor_anterior;
	}
    
	public function  getvalor_actual() : ?string {
		return $this->valor_actual;
	}
	
    
	public function setid_auditoria(?int $newid_auditoria)
	{
		try {
			if($this->id_auditoria!==$newid_auditoria) {
				if($newid_auditoria===null && $newid_auditoria!='') {
					throw new Exception('auditoria_detalle:Valor nulo no permitido en columna id_auditoria');
				}

				if($newid_auditoria!==null && filter_var($newid_auditoria,FILTER_VALIDATE_INT)===false) {
					throw new Exception('auditoria_detalle:No es numero entero - id_auditoria='.$newid_auditoria);
				}

				$this->id_auditoria=$newid_auditoria;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_auditoria_Descripcion(string $newid_auditoria_Descripcion)
	{
		try {
			if($this->id_auditoria_Descripcion!=$newid_auditoria_Descripcion) {
				if($newid_auditoria_Descripcion===null && $newid_auditoria_Descripcion!='') {
					throw new Exception('auditoria_detalle:Valor nulo no permitido en columna id_auditoria');
				}

				$this->id_auditoria_Descripcion=$newid_auditoria_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnombre_campo(?string $newnombre_campo)
	{
		try {
			if($this->nombre_campo!==$newnombre_campo) {
				if($newnombre_campo===null && $newnombre_campo!='') {
					throw new Exception('auditoria_detalle:Valor nulo no permitido en columna nombre_campo');
				}

				if(strlen($newnombre_campo)>150) {
					throw new Exception('auditoria_detalle:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=150 en columna nombre_campo');
				}

				if(filter_var($newnombre_campo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('auditoria_detalle:Formato incorrecto en columna nombre_campo='.$newnombre_campo);
				}

				$this->nombre_campo=$newnombre_campo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setvalor_anterior(?string $newvalor_anterior)
	{
		try {
			if($this->valor_anterior!==$newvalor_anterior) {
				if($newvalor_anterior===null && $newvalor_anterior!='') {
					throw new Exception('auditoria_detalle:Valor nulo no permitido en columna valor_anterior');
				}

				if(strlen($newvalor_anterior)>250) {
					throw new Exception('auditoria_detalle:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=250 en columna valor_anterior');
				}

				if(filter_var($newvalor_anterior,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('auditoria_detalle:Formato incorrecto en columna valor_anterior='.$newvalor_anterior);
				}

				$this->valor_anterior=$newvalor_anterior;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setvalor_actual(?string $newvalor_actual)
	{
		try {
			if($this->valor_actual!==$newvalor_actual) {
				if($newvalor_actual===null && $newvalor_actual!='') {
					throw new Exception('auditoria_detalle:Valor nulo no permitido en columna valor_actual');
				}

				if(strlen($newvalor_actual)>250) {
					throw new Exception('auditoria_detalle:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=250 en columna valor_actual');
				}

				if(filter_var($newvalor_actual,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('auditoria_detalle:Formato incorrecto en columna valor_actual='.$newvalor_actual);
				}

				$this->valor_actual=$newvalor_actual;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	public function getauditoria() : ?auditoria {
		return $this->auditoria;
	}

	
	
	public  function  setauditoria(?auditoria $auditoria) {
		try {
			$this->auditoria=$auditoria;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_auditoria_detalleValue(string $sKey,$oValue) {
		$this->map_auditoria_detalle[$sKey]=$oValue;
	}
	
	public function getMap_auditoria_detalleValue(string $sKey) {
		return $this->map_auditoria_detalle[$sKey];
	}
	
	public function getauditoria_detalle_Original() : ?auditoria_detalle {
		return $this->auditoria_detalle_Original;
	}
	
	public function setauditoria_detalle_Original(auditoria_detalle $auditoria_detalle) {
		try {
			$this->auditoria_detalle_Original=$auditoria_detalle;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_auditoria_detalle() : array {
		return $this->map_auditoria_detalle;
	}

	public function setMap_auditoria_detalle(array $map_auditoria_detalle) {
		$this->map_auditoria_detalle = $map_auditoria_detalle;
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
