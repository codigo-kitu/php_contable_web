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
namespace com\bydan\contabilidad\general\otro_parametro\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class otro_parametro extends GeneralEntity {

	/*GENERAL*/
	public static string $class='otro_parametro';
	
	/*AUXILIARES*/
	public ?otro_parametro $otro_parametro_Original=null;	
	public ?GeneralEntity $otro_parametro_Additional=null;
	public array $map_otro_parametro=array();	
		
	/*CAMPOS*/
	public string $codigo = '';
	public string $codigo2 = '';
	public string $grupo = '';
	public string $descripcion = '';
	public string $texto1 = '';
	public int $orden = 0;
	public float $monto1 = 0.0;
	public bool $activo = false;
	
	/*FKs*/
	
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->otro_parametro_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->codigo='';
 		$this->codigo2='';
 		$this->grupo='';
 		$this->descripcion='';
 		$this->texto1='';
 		$this->orden=0;
 		$this->monto1=0.0;
 		$this->activo=false;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->otro_parametro_Additional=new otro_parametro_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_otro_parametro() {
		$this->map_otro_parametro = array();
	}
	
	/*CAMPOS*/
    
	public function  getcodigo() : ?string {
		return $this->codigo;
	}
    
	public function  getcodigo2() : ?string {
		return $this->codigo2;
	}
    
	public function  getgrupo() : ?string {
		return $this->grupo;
	}
    
	public function  getdescripcion() : ?string {
		return $this->descripcion;
	}
    
	public function  gettexto1() : ?string {
		return $this->texto1;
	}
    
	public function  getorden() : ?int {
		return $this->orden;
	}
    
	public function  getmonto1() : ?float {
		return $this->monto1;
	}
    
	public function  getactivo() : ?bool {
		return $this->activo;
	}
	
    
	public function setcodigo(?string $newcodigo)
	{
		try {
			if($this->codigo!==$newcodigo) {
				if($newcodigo===null && $newcodigo!='') {
					throw new Exception('otro_parametro:Valor nulo no permitido en columna codigo');
				}

				if(strlen($newcodigo)>10) {
					throw new Exception('otro_parametro:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=10 en columna codigo');
				}

				if(filter_var($newcodigo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('otro_parametro:Formato incorrecto en columna codigo='.$newcodigo);
				}

				$this->codigo=$newcodigo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcodigo2(?string $newcodigo2)
	{
		try {
			if($this->codigo2!==$newcodigo2) {
				if($newcodigo2===null && $newcodigo2!='') {
					throw new Exception('otro_parametro:Valor nulo no permitido en columna codigo2');
				}

				if(strlen($newcodigo2)>10) {
					throw new Exception('otro_parametro:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=10 en columna codigo2');
				}

				if(filter_var($newcodigo2,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('otro_parametro:Formato incorrecto en columna codigo2='.$newcodigo2);
				}

				$this->codigo2=$newcodigo2;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setgrupo(?string $newgrupo)
	{
		try {
			if($this->grupo!==$newgrupo) {
				if($newgrupo===null && $newgrupo!='') {
					throw new Exception('otro_parametro:Valor nulo no permitido en columna grupo');
				}

				if(strlen($newgrupo)>10) {
					throw new Exception('otro_parametro:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=10 en columna grupo');
				}

				if(filter_var($newgrupo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('otro_parametro:Formato incorrecto en columna grupo='.$newgrupo);
				}

				$this->grupo=$newgrupo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setdescripcion(?string $newdescripcion)
	{
		try {
			if($this->descripcion!==$newdescripcion) {
				if($newdescripcion===null && $newdescripcion!='') {
					throw new Exception('otro_parametro:Valor nulo no permitido en columna descripcion');
				}

				if(strlen($newdescripcion)>80) {
					throw new Exception('otro_parametro:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=80 en columna descripcion');
				}

				if(filter_var($newdescripcion,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('otro_parametro:Formato incorrecto en columna descripcion='.$newdescripcion);
				}

				$this->descripcion=$newdescripcion;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function settexto1(?string $newtexto1)
	{
		try {
			if($this->texto1!==$newtexto1) {
				if($newtexto1===null && $newtexto1!='') {
					throw new Exception('otro_parametro:Valor nulo no permitido en columna texto1');
				}

				if(strlen($newtexto1)>25) {
					throw new Exception('otro_parametro:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=25 en columna texto1');
				}

				if(filter_var($newtexto1,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('otro_parametro:Formato incorrecto en columna texto1='.$newtexto1);
				}

				$this->texto1=$newtexto1;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setorden(?int $neworden)
	{
		try {
			if($this->orden!==$neworden) {
				if($neworden===null && $neworden!='') {
					throw new Exception('otro_parametro:Valor nulo no permitido en columna orden');
				}

				if($neworden!==null && filter_var($neworden,FILTER_VALIDATE_INT)===false) {
					throw new Exception('otro_parametro:No es numero entero - orden='.$neworden);
				}

				$this->orden=$neworden;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setmonto1(?float $newmonto1)
	{
		try {
			if($this->monto1!==$newmonto1) {
				if($newmonto1===null && $newmonto1!='') {
					throw new Exception('otro_parametro:Valor nulo no permitido en columna monto1');
				}

				if($newmonto1!=0) {
					if($newmonto1!==null && filter_var($newmonto1,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('otro_parametro:No es numero decimal - monto1='.$newmonto1);
					}
				}

				$this->monto1=$newmonto1;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setactivo(?bool $newactivo)
	{
		try {
			if($this->activo!==$newactivo) {
				if($newactivo===null && $newactivo!='') {
					throw new Exception('otro_parametro:Valor nulo no permitido en columna activo');
				}

				if($newactivo!==null && filter_var($newactivo,FILTER_VALIDATE_BOOLEAN)===false && $newactivo!==0 && $newactivo!==false) {
					throw new Exception('otro_parametro:No es valor booleano - activo='.$newactivo);
				}

				$this->activo=$newactivo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	
		
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_otro_parametroValue(string $sKey,$oValue) {
		$this->map_otro_parametro[$sKey]=$oValue;
	}
	
	public function getMap_otro_parametroValue(string $sKey) {
		return $this->map_otro_parametro[$sKey];
	}
	
	public function getotro_parametro_Original() : ?otro_parametro {
		return $this->otro_parametro_Original;
	}
	
	public function setotro_parametro_Original(otro_parametro $otro_parametro) {
		try {
			$this->otro_parametro_Original=$otro_parametro;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_otro_parametro() : array {
		return $this->map_otro_parametro;
	}

	public function setMap_otro_parametro(array $map_otro_parametro) {
		$this->map_otro_parametro = $map_otro_parametro;
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
