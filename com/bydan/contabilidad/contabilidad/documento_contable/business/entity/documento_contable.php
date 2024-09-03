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
namespace com\bydan\contabilidad\contabilidad\documento_contable\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;

class documento_contable extends GeneralEntity {

	/*GENERAL*/
	public static string $class='documento_contable';
	
	/*AUXILIARES*/
	public ?documento_contable $documento_contable_Original=null;	
	public ?GeneralEntity $documento_contable_Additional=null;
	public array $map_documento_contable=array();	
		
	/*CAMPOS*/
	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public string $codigo = '';
	public string $nombre = '';
	public float $secuencial = 0.0;
	public float $incremento = 0.0;
	public bool $reinicia_secuencial_mes = false;
	public int $generado_por = 0;
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	
	/*RELACIONES*/
	
	public array $asiento_origens = array();
	public array $asientopredefinidos = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->documento_contable_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->codigo='';
 		$this->nombre='';
 		$this->secuencial=0.0;
 		$this->incremento=0.0;
 		$this->reinicia_secuencial_mes=false;
 		$this->generado_por=0;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
		}
		
		/*RELACIONES*/
		
		$this->asiento_origens=array();
		$this->asientopredefinidos=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->documento_contable_Additional=new documento_contable_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_documento_contable() {
		$this->map_documento_contable = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_empresa() : ?int {
		return $this->id_empresa;
	}
	
	public function  getid_empresa_Descripcion() : string {
		return $this->id_empresa_Descripcion;
	}
    
	public function  getcodigo() : ?string {
		return $this->codigo;
	}
    
	public function  getnombre() : ?string {
		return $this->nombre;
	}
    
	public function  getsecuencial() : ?float {
		return $this->secuencial;
	}
    
	public function  getincremento() : ?float {
		return $this->incremento;
	}
    
	public function  getreinicia_secuencial_mes() : ?bool {
		return $this->reinicia_secuencial_mes;
	}
    
	public function  getgenerado_por() : ?int {
		return $this->generado_por;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('documento_contable:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('documento_contable:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('documento_contable:Valor nulo no permitido en columna id_empresa');
				}

				$this->id_empresa_Descripcion=$newid_empresa_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcodigo(?string $newcodigo)
	{
		try {
			if($this->codigo!==$newcodigo) {
				if($newcodigo===null && $newcodigo!='') {
					throw new Exception('documento_contable:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>4) {
					throw new Exception('documento_contable:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=4 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('documento_contable:Formato incorrecto en columna codigo='.$newcodigo);
				}

				$this->codigo=$newcodigo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnombre(?string $newnombre)
	{
		try {
			if($this->nombre!==$newnombre) {
				if($newnombre===null && $newnombre!='') {
					throw new Exception('documento_contable:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>60) {
					throw new Exception('documento_contable:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=60 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('documento_contable:Formato incorrecto en columna nombre='.$newnombre);
				}

				$this->nombre=$newnombre;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setsecuencial(?float $newsecuencial)
	{
		try {
			if($this->secuencial!==$newsecuencial) {
				if($newsecuencial===null && $newsecuencial!='') {
					throw new Exception('documento_contable:Valor nulo no permitido en columna secuencial');
				}

				if($newsecuencial!=0) {
					if($newsecuencial!==null && filter_var($newsecuencial,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('documento_contable:No es numero decimal - secuencial='.$newsecuencial);
					}
				}

				$this->secuencial=$newsecuencial;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setincremento(?float $newincremento)
	{
		try {
			if($this->incremento!==$newincremento) {
				if($newincremento===null && $newincremento!='') {
					throw new Exception('documento_contable:Valor nulo no permitido en columna incremento');
				}

				if($newincremento!=0) {
					if($newincremento!==null && filter_var($newincremento,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('documento_contable:No es numero decimal - incremento='.$newincremento);
					}
				}

				$this->incremento=$newincremento;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setreinicia_secuencial_mes(?bool $newreinicia_secuencial_mes)
	{
		try {
			if($this->reinicia_secuencial_mes!==$newreinicia_secuencial_mes) {
				if($newreinicia_secuencial_mes===null && $newreinicia_secuencial_mes!='') {
					throw new Exception('documento_contable:Valor nulo no permitido en columna reinicia_secuencial_mes');
				}

				if($newreinicia_secuencial_mes!==null && filter_var($newreinicia_secuencial_mes,FILTER_VALIDATE_BOOLEAN)===false && $newreinicia_secuencial_mes!==0 && $newreinicia_secuencial_mes!==false) {
					throw new Exception('documento_contable:No es valor booleano - reinicia_secuencial_mes='.$newreinicia_secuencial_mes);
				}

				$this->reinicia_secuencial_mes=$newreinicia_secuencial_mes;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setgenerado_por(?int $newgenerado_por)
	{
		try {
			if($this->generado_por!==$newgenerado_por) {
				if($newgenerado_por===null && $newgenerado_por!='') {
					throw new Exception('documento_contable:Valor nulo no permitido en columna generado_por');
				}

				if($newgenerado_por!==null && filter_var($newgenerado_por,FILTER_VALIDATE_INT)===false) {
					throw new Exception('documento_contable:No es numero entero - generado_por='.$newgenerado_por);
				}

				$this->generado_por=$newgenerado_por;
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
	
	public function getasiento_origens() : array {
		return $this->asiento_origens;
	}

	public function getasiento_predefinidos() : array {
		return $this->asientopredefinidos;
	}

	
	
	public  function  setasiento_origens(array $asiento_origens) {
		try {
			$this->asiento_origens=$asiento_origens;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setasiento_predefinidos(array $asientopredefinidos) {
		try {
			$this->asientopredefinidos=$asientopredefinidos;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_documento_contableValue(string $sKey,$oValue) {
		$this->map_documento_contable[$sKey]=$oValue;
	}
	
	public function getMap_documento_contableValue(string $sKey) {
		return $this->map_documento_contable[$sKey];
	}
	
	public function getdocumento_contable_Original() : ?documento_contable {
		return $this->documento_contable_Original;
	}
	
	public function setdocumento_contable_Original(documento_contable $documento_contable) {
		try {
			$this->documento_contable_Original=$documento_contable;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_documento_contable() : array {
		return $this->map_documento_contable;
	}

	public function setMap_documento_contable(array $map_documento_contable) {
		$this->map_documento_contable = $map_documento_contable;
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
