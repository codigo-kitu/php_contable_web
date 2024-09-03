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
namespace com\bydan\contabilidad\contabilidad\libro_auxiliar\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;

class libro_auxiliar extends GeneralEntity {

	/*GENERAL*/
	public static string $class='libro_auxiliar';
	
	/*AUXILIARES*/
	public ?libro_auxiliar $libro_auxiliar_Original=null;	
	public ?GeneralEntity $libro_auxiliar_Additional=null;
	public array $map_libro_auxiliar=array();	
		
	/*CAMPOS*/
	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public string $iniciales = '';
	public string $nombre = '';
	public int $secuencial = 0;
	public int $incremento = 0;
	public bool $reinicia_secuencial_mes = false;
	public int $generado_por = 0;
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	
	/*RELACIONES*/
	
	public array $contadorauxiliars = array();
	public array $asientopredefinidos = array();
	public array $asientoautomaticos = array();
	public array $asientos = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(false);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->libro_auxiliar_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->iniciales='';
 		$this->nombre='';
 		$this->secuencial=0;
 		$this->incremento=0;
 		$this->reinicia_secuencial_mes=false;
 		$this->generado_por=0;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
		}
		
		/*RELACIONES*/
		
		$this->contadorauxiliars=array();
		$this->asientopredefinidos=array();
		$this->asientoautomaticos=array();
		$this->asientos=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->libro_auxiliar_Additional=new libro_auxiliar_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_libro_auxiliar() {
		$this->map_libro_auxiliar = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_empresa() : ?int {
		return $this->id_empresa;
	}
	
	public function  getid_empresa_Descripcion() : string {
		return $this->id_empresa_Descripcion;
	}
    
	public function  getiniciales() : ?string {
		return $this->iniciales;
	}
    
	public function  getnombre() : ?string {
		return $this->nombre;
	}
    
	public function  getsecuencial() : ?int {
		return $this->secuencial;
	}
    
	public function  getincremento() : ?int {
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
					throw new Exception('libro_auxiliar:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('libro_auxiliar:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('libro_auxiliar:Valor nulo no permitido en columna id_empresa');
				}

				$this->id_empresa_Descripcion=$newid_empresa_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setiniciales(?string $newiniciales)
	{
		try {
			if($this->iniciales!==$newiniciales) {
				if($newiniciales===null && $newiniciales!='') {
					throw new Exception('libro_auxiliar:Valor nulo no permitido en columna iniciales');
				}

				if(strlen($newiniciales)>3) {
					throw new Exception('libro_auxiliar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=3 en columna iniciales');
				}

				if(filter_var($newiniciales,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('libro_auxiliar:Formato incorrecto en columna iniciales='.$newiniciales);
				}

				$this->iniciales=$newiniciales;
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
					throw new Exception('libro_auxiliar:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>80) {
					throw new Exception('libro_auxiliar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=80 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('libro_auxiliar:Formato incorrecto en columna nombre='.$newnombre);
				}

				$this->nombre=$newnombre;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setsecuencial(?int $newsecuencial)
	{
		try {
			if($this->secuencial!==$newsecuencial) {
				if($newsecuencial===null && $newsecuencial!='') {
					throw new Exception('libro_auxiliar:Valor nulo no permitido en columna secuencial');
				}

				if($newsecuencial!==null && filter_var($newsecuencial,FILTER_VALIDATE_INT)===false) {
					throw new Exception('libro_auxiliar:No es numero entero - secuencial='.$newsecuencial);
				}

				$this->secuencial=$newsecuencial;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setincremento(?int $newincremento)
	{
		try {
			if($this->incremento!==$newincremento) {
				if($newincremento===null && $newincremento!='') {
					throw new Exception('libro_auxiliar:Valor nulo no permitido en columna incremento');
				}

				if($newincremento!==null && filter_var($newincremento,FILTER_VALIDATE_INT)===false) {
					throw new Exception('libro_auxiliar:No es numero entero - incremento='.$newincremento);
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
					throw new Exception('libro_auxiliar:Valor nulo no permitido en columna reinicia_secuencial_mes');
				}

				if($newreinicia_secuencial_mes!==null && filter_var($newreinicia_secuencial_mes,FILTER_VALIDATE_BOOLEAN)===false && $newreinicia_secuencial_mes!==0 && $newreinicia_secuencial_mes!==false) {
					throw new Exception('libro_auxiliar:No es valor booleano - reinicia_secuencial_mes='.$newreinicia_secuencial_mes);
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
					throw new Exception('libro_auxiliar:Valor nulo no permitido en columna generado_por');
				}

				if($newgenerado_por!==null && filter_var($newgenerado_por,FILTER_VALIDATE_INT)===false) {
					throw new Exception('libro_auxiliar:No es numero entero - generado_por='.$newgenerado_por);
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
	
	public function getcontador_auxiliars() : array {
		return $this->contadorauxiliars;
	}

	public function getasiento_predefinidos() : array {
		return $this->asientopredefinidos;
	}

	public function getasiento_automaticos() : array {
		return $this->asientoautomaticos;
	}

	public function getasientos() : array {
		return $this->asientos;
	}

	
	
	public  function  setcontador_auxiliars(array $contadorauxiliars) {
		try {
			$this->contadorauxiliars=$contadorauxiliars;
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

	public  function  setasiento_automaticos(array $asientoautomaticos) {
		try {
			$this->asientoautomaticos=$asientoautomaticos;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setasientos(array $asientos) {
		try {
			$this->asientos=$asientos;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_libro_auxiliarValue(string $sKey,$oValue) {
		$this->map_libro_auxiliar[$sKey]=$oValue;
	}
	
	public function getMap_libro_auxiliarValue(string $sKey) {
		return $this->map_libro_auxiliar[$sKey];
	}
	
	public function getlibro_auxiliar_Original() : ?libro_auxiliar {
		return $this->libro_auxiliar_Original;
	}
	
	public function setlibro_auxiliar_Original(libro_auxiliar $libro_auxiliar) {
		try {
			$this->libro_auxiliar_Original=$libro_auxiliar;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_libro_auxiliar() : array {
		return $this->map_libro_auxiliar;
	}

	public function setMap_libro_auxiliar(array $map_libro_auxiliar) {
		$this->map_libro_auxiliar = $map_libro_auxiliar;
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
