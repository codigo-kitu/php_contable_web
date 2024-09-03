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
namespace com\bydan\contabilidad\cuentascobrar\categoria_cliente\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class categoria_cliente extends GeneralEntity {

	/*GENERAL*/
	public static string $class='categoria_cliente';
	
	/*AUXILIARES*/
	public ?categoria_cliente $categoria_cliente_Original=null;	
	public ?GeneralEntity $categoria_cliente_Additional=null;
	public array $map_categoria_cliente=array();	
		
	/*CAMPOS*/
	public string $nombre = '';
	public bool $predeterminado = false;
	
	/*FKs*/
	
	
	/*RELACIONES*/
	
	public array $clientes = array();
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->categoria_cliente_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->nombre='';
 		$this->predeterminado=false;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
		}
		
		/*RELACIONES*/
		
		$this->clientes=array();
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->categoria_cliente_Additional=new categoria_cliente_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_categoria_cliente() {
		$this->map_categoria_cliente = array();
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
					throw new Exception('categoria_cliente:Valor nulo no permitido en columna nombre');
				}

				if(strlen($newnombre)>35) {
					throw new Exception('categoria_cliente:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=35 en columna nombre');
				}

				if(filter_var($newnombre,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('categoria_cliente:Formato incorrecto en columna nombre='.$newnombre);
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
					throw new Exception('categoria_cliente:Valor nulo no permitido en columna predeterminado');
				}

				if($newpredeterminado!==null && filter_var($newpredeterminado,FILTER_VALIDATE_BOOLEAN)===false && $newpredeterminado!==0 && $newpredeterminado!==false) {
					throw new Exception('categoria_cliente:No es valor booleano - predeterminado='.$newpredeterminado);
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
	
	public function getclientes() : array {
		return $this->clientes;
	}

	
	
	public  function  setclientes(array $clientes) {
		try {
			$this->clientes=$clientes;
		} catch(Exception $e) {
			;
		}
	}

	
	/*AUXILIARES*/
	public function setMap_categoria_clienteValue(string $sKey,$oValue) {
		$this->map_categoria_cliente[$sKey]=$oValue;
	}
	
	public function getMap_categoria_clienteValue(string $sKey) {
		return $this->map_categoria_cliente[$sKey];
	}
	
	public function getcategoria_cliente_Original() : ?categoria_cliente {
		return $this->categoria_cliente_Original;
	}
	
	public function setcategoria_cliente_Original(categoria_cliente $categoria_cliente) {
		try {
			$this->categoria_cliente_Original=$categoria_cliente;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_categoria_cliente() : array {
		return $this->map_categoria_cliente;
	}

	public function setMap_categoria_cliente(array $map_categoria_cliente) {
		$this->map_categoria_cliente = $map_categoria_cliente;
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
