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
namespace com\bydan\contabilidad\facturacion\factura_modelo\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;

class factura_modelo extends GeneralEntity {

	/*GENERAL*/
	public static string $class='factura_modelo';
	
	/*AUXILIARES*/
	public ?factura_modelo $factura_modelo_Original=null;	
	public ?GeneralEntity $factura_modelo_Additional=null;
	public array $map_factura_modelo=array();	
		
	/*CAMPOS*/
	public int $id_factura_lote = -1;
	public string $id_factura_lote_Descripcion = '';

	public int $id_cliente = -1;
	public string $id_cliente_Descripcion = '';

	public bool $marcado = false;
	public string $ultimo = '';
	
	/*FKs*/
	
	public ?factura_lote $factura_lote = null;
	public ?cliente $cliente = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->factura_modelo_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_factura_lote=-1;
		$this->id_factura_lote_Descripcion='';

 		$this->id_cliente=-1;
		$this->id_cliente_Descripcion='';

 		$this->marcado=false;
 		$this->ultimo='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->factura_lote=new factura_lote();
			$this->cliente=new cliente();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->factura_modelo_Additional=new factura_modelo_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_factura_modelo() {
		$this->map_factura_modelo = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_factura_lote() : ?int {
		return $this->id_factura_lote;
	}
	
	public function  getid_factura_lote_Descripcion() : string {
		return $this->id_factura_lote_Descripcion;
	}
    
	public function  getid_cliente() : ?int {
		return $this->id_cliente;
	}
	
	public function  getid_cliente_Descripcion() : string {
		return $this->id_cliente_Descripcion;
	}
    
	public function  getmarcado() : ?bool {
		return $this->marcado;
	}
    
	public function  getultimo() : ?string {
		return $this->ultimo;
	}
	
    
	public function setid_factura_lote(?int $newid_factura_lote)
	{
		try {
			if($this->id_factura_lote!==$newid_factura_lote) {
				if($newid_factura_lote===null && $newid_factura_lote!='') {
					throw new Exception('factura_modelo:Valor nulo no permitido en columna id_factura_lote');
				}

				if($newid_factura_lote!==null && filter_var($newid_factura_lote,FILTER_VALIDATE_INT)===false) {
					throw new Exception('factura_modelo:No es numero entero - id_factura_lote='.$newid_factura_lote);
				}

				$this->id_factura_lote=$newid_factura_lote;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_factura_lote_Descripcion(string $newid_factura_lote_Descripcion)
	{
		try {
			if($this->id_factura_lote_Descripcion!=$newid_factura_lote_Descripcion) {
				if($newid_factura_lote_Descripcion===null && $newid_factura_lote_Descripcion!='') {
					throw new Exception('factura_modelo:Valor nulo no permitido en columna id_factura_lote');
				}

				$this->id_factura_lote_Descripcion=$newid_factura_lote_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_cliente(?int $newid_cliente)
	{
		try {
			if($this->id_cliente!==$newid_cliente) {
				if($newid_cliente===null && $newid_cliente!='') {
					throw new Exception('factura_modelo:Valor nulo no permitido en columna id_cliente');
				}

				if($newid_cliente!==null && filter_var($newid_cliente,FILTER_VALIDATE_INT)===false) {
					throw new Exception('factura_modelo:No es numero entero - id_cliente='.$newid_cliente);
				}

				$this->id_cliente=$newid_cliente;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_cliente_Descripcion(string $newid_cliente_Descripcion)
	{
		try {
			if($this->id_cliente_Descripcion!=$newid_cliente_Descripcion) {
				if($newid_cliente_Descripcion===null && $newid_cliente_Descripcion!='') {
					throw new Exception('factura_modelo:Valor nulo no permitido en columna id_cliente');
				}

				$this->id_cliente_Descripcion=$newid_cliente_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setmarcado(?bool $newmarcado)
	{
		try {
			if($this->marcado!==$newmarcado) {
				if($newmarcado===null && $newmarcado!='') {
					throw new Exception('factura_modelo:Valor nulo no permitido en columna marcado');
				}

				if($newmarcado!==null && filter_var($newmarcado,FILTER_VALIDATE_BOOLEAN)===false && $newmarcado!==0 && $newmarcado!==false) {
					throw new Exception('factura_modelo:No es valor booleano - marcado='.$newmarcado);
				}

				$this->marcado=$newmarcado;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setultimo(?string $newultimo) {
		if($this->ultimo!==$newultimo) {

				if(strlen($newultimo)>10) {
					try {
						throw new Exception('factura_modelo:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=ultimo en columna ultimo');
					} catch(Exception $e) {
						throw $e;
					}
				}

				if(filter_var($newultimo,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					try {
						throw new Exception('factura_modelo:Formato incorrecto en la columna ultimo='.$newultimo);
					} catch(Exception $e) {
						throw $e;
					}
				}

			$this->ultimo=$newultimo;
			$this->setIsChanged(true);
		}
	}
	
	/*FKs*/
	
	public function getfactura_lote() : ?factura_lote {
		return $this->factura_lote;
	}

	public function getcliente() : ?cliente {
		return $this->cliente;
	}

	
	
	public  function  setfactura_lote(?factura_lote $factura_lote) {
		try {
			$this->factura_lote=$factura_lote;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setcliente(?cliente $cliente) {
		try {
			$this->cliente=$cliente;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_factura_modeloValue(string $sKey,$oValue) {
		$this->map_factura_modelo[$sKey]=$oValue;
	}
	
	public function getMap_factura_modeloValue(string $sKey) {
		return $this->map_factura_modelo[$sKey];
	}
	
	public function getfactura_modelo_Original() : ?factura_modelo {
		return $this->factura_modelo_Original;
	}
	
	public function setfactura_modelo_Original(factura_modelo $factura_modelo) {
		try {
			$this->factura_modelo_Original=$factura_modelo;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_factura_modelo() : array {
		return $this->map_factura_modelo;
	}

	public function setMap_factura_modelo(array $map_factura_modelo) {
		$this->map_factura_modelo = $map_factura_modelo;
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
