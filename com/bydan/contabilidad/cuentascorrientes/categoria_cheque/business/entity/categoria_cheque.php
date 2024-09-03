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
namespace com\bydan\contabilidad\cuentascorrientes\categoria_cheque\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;

class categoria_cheque extends GeneralEntity {

	/*GENERAL*/
	public static string $class='categoria_cheque';
	
	/*AUXILIARES*/
	public ?categoria_cheque $categoria_cheque_Original=null;	
	public ?GeneralEntity $categoria_cheque_Additional=null;
	public array $map_categoria_cheque=array();	
		
	/*CAMPOS*/
	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public ?int $id_cuenta = null;
	public string $id_cuenta_Descripcion = '';

	public string $nombre = '';
	public string $cuenta_contable = '';
	public bool $predeterminado = false;
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	public ?cuenta $cuenta = null;
	
	/*RELACIONES*/
	
	public array $chequecuentacorrientes = array();
	public array $clasificacioncheques = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->categoria_cheque_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->id_cuenta=null;
		$this->id_cuenta_Descripcion='';

 		$this->nombre='';
 		$this->cuenta_contable='';
 		$this->predeterminado=false;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
			$this->cuenta=new cuenta();
		}
		
		/*RELACIONES*/
		
		$this->chequecuentacorrientes=array();
		$this->clasificacioncheques=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->categoria_cheque_Additional=new categoria_cheque_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_categoria_cheque() {
		$this->map_categoria_cheque = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_empresa() : ?int {
		return $this->id_empresa;
	}
	
	public function  getid_empresa_Descripcion() : string {
		return $this->id_empresa_Descripcion;
	}
    
	public function  getid_cuenta() : ?int {
		return $this->id_cuenta;
	}
	
	public function  getid_cuenta_Descripcion() : string {
		return $this->id_cuenta_Descripcion;
	}
    
	public function  getnombre() : ?string {
		return $this->nombre;
	}
    
	public function  getcuenta_contable() : ?string {
		return $this->cuenta_contable;
	}
    
	public function  getpredeterminado() : ?bool {
		return $this->predeterminado;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('categoria_cheque:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('categoria_cheque:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('categoria_cheque:Valor nulo no permitido en columna id_empresa');
				}

				$this->id_empresa_Descripcion=$newid_empresa_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_cuenta(?int $newid_cuenta) {
		if($this->id_cuenta!==$newid_cuenta) {

				if($newid_cuenta!==null && filter_var($newid_cuenta,FILTER_VALIDATE_INT)===false) {
					throw new Exception('categoria_cheque:No es numero entero - id_cuenta');
				}

			$this->id_cuenta=$newid_cuenta;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_cuenta_Descripcion(string $newid_cuenta_Descripcion) {
		if($this->id_cuenta_Descripcion!=$newid_cuenta_Descripcion) {

			$this->id_cuenta_Descripcion=$newid_cuenta_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function setnombre(?string $newnombre)
	{
		try {
			if($this->nombre!==$newnombre) {
				if($newnombre===null && $newnombre!='') {
					throw new Exception('categoria_cheque:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>100) {
					throw new Exception('categoria_cheque:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=100 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('categoria_cheque:Formato incorrecto en columna nombre='.$newnombre);
				}

				$this->nombre=$newnombre;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcuenta_contable(?string $newcuenta_contable) {
		if($this->cuenta_contable!==$newcuenta_contable) {

				if(strlen($newcuenta_contable)>20) {
					try {
						throw new Exception('categoria_cheque:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=cuenta_contable en columna cuenta_contable');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newcuenta_contable,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('categoria_cheque:Formato incorrecto en la columna cuenta_contable='.$newcuenta_contable);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->cuenta_contable=$newcuenta_contable;
			$this->setIsChanged(true);
		}
	}
    
	public function setpredeterminado(?bool $newpredeterminado)
	{
		try {
			if($this->predeterminado!==$newpredeterminado) {
				if($newpredeterminado===null && $newpredeterminado!='') {
					throw new Exception('categoria_cheque:Valor nulo no permitido en columna predeterminado');
				}

				if($newpredeterminado!==null && filter_var($newpredeterminado,FILTER_VALIDATE_BOOLEAN)===false && $newpredeterminado!==0 && $newpredeterminado!==false) {
					throw new Exception('categoria_cheque:No es valor booleano - predeterminado='.$newpredeterminado);
				}

				$this->predeterminado=$newpredeterminado;
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

	public function getcuenta() : ?cuenta {
		return $this->cuenta;
	}

	
	
	public  function  setempresa(?empresa $empresa) {
		try {
			$this->empresa=$empresa;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setcuenta(?cuenta $cuenta) {
		try {
			$this->cuenta=$cuenta;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	public function getcheque_cuenta_corrientes() : array {
		return $this->chequecuentacorrientes;
	}

	public function getclasificacion_cheques() : array {
		return $this->clasificacioncheques;
	}

	
	
	public  function  setcheque_cuenta_corrientes(array $chequecuentacorrientes) {
		try {
			$this->chequecuentacorrientes=$chequecuentacorrientes;
		} catch(Exception $e) {
			;
		}
	}

	public  function  setclasificacion_cheques(array $clasificacioncheques) {
		try {
			$this->clasificacioncheques=$clasificacioncheques;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_categoria_chequeValue(string $sKey,$oValue) {
		$this->map_categoria_cheque[$sKey]=$oValue;
	}
	
	public function getMap_categoria_chequeValue(string $sKey) {
		return $this->map_categoria_cheque[$sKey];
	}
	
	public function getcategoria_cheque_Original() : ?categoria_cheque {
		return $this->categoria_cheque_Original;
	}
	
	public function setcategoria_cheque_Original(categoria_cheque $categoria_cheque) {
		try {
			$this->categoria_cheque_Original=$categoria_cheque;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_categoria_cheque() : array {
		return $this->map_categoria_cheque;
	}

	public function setMap_categoria_cheque(array $map_categoria_cheque) {
		$this->map_categoria_cheque = $map_categoria_cheque;
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
