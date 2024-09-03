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
namespace com\bydan\contabilidad\contabilidad\contador_auxiliar\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class contador_auxiliar extends GeneralEntity {

	/*GENERAL*/
	public static string $class='contador_auxiliar';
	
	/*AUXILIARES*/
	public ?contador_auxiliar $contador_auxiliar_Original=null;	
	public ?GeneralEntity $contador_auxiliar_Additional=null;
	public array $map_contador_auxiliar=array();	
		
	/*CAMPOS*/
	public string $id_contador = '';
	public int $id_libro_auxiliar = -1;
	public string $id_libro_auxiliar_Descripcion = '';

	public int $periodo_anual = 0;
	public int $mes = 0;
	public int $contador = 0;
	
	/*FKs*/
	
	public ?libro_auxiliar $libro_auxiliar = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->contador_auxiliar_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_contador='';
 		$this->id_libro_auxiliar=-1;
		$this->id_libro_auxiliar_Descripcion='';

 		$this->periodo_anual=0;
 		$this->mes=0;
 		$this->contador=0;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->libro_auxiliar=new libro_auxiliar();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->contador_auxiliar_Additional=new contador_auxiliar_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_contador_auxiliar() {
		$this->map_contador_auxiliar = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_contador() : ?string {
		return $this->id_contador;
	}
    
	public function  getid_libro_auxiliar() : ?int {
		return $this->id_libro_auxiliar;
	}
	
	public function  getid_libro_auxiliar_Descripcion() : string {
		return $this->id_libro_auxiliar_Descripcion;
	}
    
	public function  getperiodo_anual() : ?int {
		return $this->periodo_anual;
	}
    
	public function  getmes() : ?int {
		return $this->mes;
	}
    
	public function  getcontador() : ?int {
		return $this->contador;
	}
	
    
	public function setid_contador(?string $newid_contador)
	{
		try {
			if($this->id_contador!==$newid_contador) {
				if($newid_contador===null && $newid_contador!='') {
					throw new Exception('contador_auxiliar:Valor nulo no permitido en columna id_contador');
				}

				if(strlen($newid_contador)>10) {
					throw new Exception('contador_auxiliar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=10 en columna id_contador');
				}

				if(filter_var($newid_contador,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('contador_auxiliar:Formato incorrecto en columna id_contador='.$newid_contador);
				}

				$this->id_contador=$newid_contador;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_libro_auxiliar(?int $newid_libro_auxiliar)
	{
		try {
			if($this->id_libro_auxiliar!==$newid_libro_auxiliar) {
				if($newid_libro_auxiliar===null && $newid_libro_auxiliar!='') {
					throw new Exception('contador_auxiliar:Valor nulo no permitido en columna id_libro_auxiliar');
				}

				if($newid_libro_auxiliar!==null && filter_var($newid_libro_auxiliar,FILTER_VALIDATE_INT)===false) {
					throw new Exception('contador_auxiliar:No es numero entero - id_libro_auxiliar='.$newid_libro_auxiliar);
				}

				$this->id_libro_auxiliar=$newid_libro_auxiliar;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_libro_auxiliar_Descripcion(string $newid_libro_auxiliar_Descripcion)
	{
		try {
			if($this->id_libro_auxiliar_Descripcion!=$newid_libro_auxiliar_Descripcion) {
				if($newid_libro_auxiliar_Descripcion===null && $newid_libro_auxiliar_Descripcion!='') {
					throw new Exception('contador_auxiliar:Valor nulo no permitido en columna id_libro_auxiliar');
				}

				$this->id_libro_auxiliar_Descripcion=$newid_libro_auxiliar_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setperiodo_anual(?int $newperiodo_anual)
	{
		try {
			if($this->periodo_anual!==$newperiodo_anual) {
				if($newperiodo_anual===null && $newperiodo_anual!='') {
					throw new Exception('contador_auxiliar:Valor nulo no permitido en columna periodo_anual');
				}

				if($newperiodo_anual!==null && filter_var($newperiodo_anual,FILTER_VALIDATE_INT)===false) {
					throw new Exception('contador_auxiliar:No es numero entero - periodo_anual='.$newperiodo_anual);
				}

				$this->periodo_anual=$newperiodo_anual;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setmes(?int $newmes)
	{
		try {
			if($this->mes!==$newmes) {
				if($newmes===null && $newmes!='') {
					throw new Exception('contador_auxiliar:Valor nulo no permitido en columna mes');
				}

				if($newmes!==null && filter_var($newmes,FILTER_VALIDATE_INT)===false) {
					throw new Exception('contador_auxiliar:No es numero entero - mes='.$newmes);
				}

				$this->mes=$newmes;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcontador(?int $newcontador)
	{
		try {
			if($this->contador!==$newcontador) {
				if($newcontador===null && $newcontador!='') {
					throw new Exception('contador_auxiliar:Valor nulo no permitido en columna contador');
				}

				if($newcontador!==null && filter_var($newcontador,FILTER_VALIDATE_INT)===false) {
					throw new Exception('contador_auxiliar:No es numero entero - contador='.$newcontador);
				}

				$this->contador=$newcontador;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	public function getlibro_auxiliar() : ?libro_auxiliar {
		return $this->libro_auxiliar;
	}

	
	
	public  function  setlibro_auxiliar(?libro_auxiliar $libro_auxiliar) {
		try {
			$this->libro_auxiliar=$libro_auxiliar;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_contador_auxiliarValue(string $sKey,$oValue) {
		$this->map_contador_auxiliar[$sKey]=$oValue;
	}
	
	public function getMap_contador_auxiliarValue(string $sKey) {
		return $this->map_contador_auxiliar[$sKey];
	}
	
	public function getcontador_auxiliar_Original() : ?contador_auxiliar {
		return $this->contador_auxiliar_Original;
	}
	
	public function setcontador_auxiliar_Original(contador_auxiliar $contador_auxiliar) {
		try {
			$this->contador_auxiliar_Original=$contador_auxiliar;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_contador_auxiliar() : array {
		return $this->map_contador_auxiliar;
	}

	public function setMap_contador_auxiliar(array $map_contador_auxiliar) {
		$this->map_contador_auxiliar = $map_contador_auxiliar;
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
