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
namespace com\bydan\contabilidad\cuentaspagar\parametro_cuenta_pagar\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;

class parametro_cuenta_pagar extends GeneralEntity {

	/*GENERAL*/
	public static string $class='parametro_cuenta_pagar';
	
	/*AUXILIARES*/
	public ?parametro_cuenta_pagar $parametro_cuenta_pagar_Original=null;	
	public ?GeneralEntity $parametro_cuenta_pagar_Additional=null;
	public array $map_parametro_cuenta_pagar=array();	
		
	/*CAMPOS*/
	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public int $numero_cuenta_pagar = 0;
	public int $numero_credito = 0;
	public int $numero_debito = 0;
	public int $numero_pago = 0;
	public bool $mostrar_anulado = false;
	public int $numero_proveedor = 0;
	public bool $con_proveedor_inactivo = false;
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->parametro_cuenta_pagar_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->numero_cuenta_pagar=0;
 		$this->numero_credito=0;
 		$this->numero_debito=0;
 		$this->numero_pago=0;
 		$this->mostrar_anulado=false;
 		$this->numero_proveedor=0;
 		$this->con_proveedor_inactivo=false;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->parametro_cuenta_pagar_Additional=new parametro_cuenta_pagar_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_parametro_cuenta_pagar() {
		$this->map_parametro_cuenta_pagar = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_empresa() : ?int {
		return $this->id_empresa;
	}
	
	public function  getid_empresa_Descripcion() : string {
		return $this->id_empresa_Descripcion;
	}
    
	public function  getnumero_cuenta_pagar() : ?int {
		return $this->numero_cuenta_pagar;
	}
    
	public function  getnumero_credito() : ?int {
		return $this->numero_credito;
	}
    
	public function  getnumero_debito() : ?int {
		return $this->numero_debito;
	}
    
	public function  getnumero_pago() : ?int {
		return $this->numero_pago;
	}
    
	public function  getmostrar_anulado() : ?bool {
		return $this->mostrar_anulado;
	}
    
	public function  getnumero_proveedor() : ?int {
		return $this->numero_proveedor;
	}
    
	public function  getcon_proveedor_inactivo() : ?bool {
		return $this->con_proveedor_inactivo;
	}
	
    
	public function setid_empresa(?int $newid_empresa)
	{
		try {
			if($this->id_empresa!==$newid_empresa) {
				if($newid_empresa===null && $newid_empresa!='') {
					throw new Exception('parametro_cuenta_pagar:Valor nulo no permitido en columna id_empresa');
				}

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_cuenta_pagar:No es numero entero - id_empresa='.$newid_empresa);
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
					throw new Exception('parametro_cuenta_pagar:Valor nulo no permitido en columna id_empresa');
				}

				$this->id_empresa_Descripcion=$newid_empresa_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnumero_cuenta_pagar(?int $newnumero_cuenta_pagar)
	{
		try {
			if($this->numero_cuenta_pagar!==$newnumero_cuenta_pagar) {
				if($newnumero_cuenta_pagar===null && $newnumero_cuenta_pagar!='') {
					throw new Exception('parametro_cuenta_pagar:Valor nulo no permitido en columna numero_cuenta_pagar');
				}

				if($newnumero_cuenta_pagar!==null && filter_var($newnumero_cuenta_pagar,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_cuenta_pagar:No es numero entero - numero_cuenta_pagar='.$newnumero_cuenta_pagar);
				}

				$this->numero_cuenta_pagar=$newnumero_cuenta_pagar;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnumero_credito(?int $newnumero_credito)
	{
		try {
			if($this->numero_credito!==$newnumero_credito) {
				if($newnumero_credito===null && $newnumero_credito!='') {
					throw new Exception('parametro_cuenta_pagar:Valor nulo no permitido en columna numero_credito');
				}

				if($newnumero_credito!==null && filter_var($newnumero_credito,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_cuenta_pagar:No es numero entero - numero_credito='.$newnumero_credito);
				}

				$this->numero_credito=$newnumero_credito;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnumero_debito(?int $newnumero_debito)
	{
		try {
			if($this->numero_debito!==$newnumero_debito) {
				if($newnumero_debito===null && $newnumero_debito!='') {
					throw new Exception('parametro_cuenta_pagar:Valor nulo no permitido en columna numero_debito');
				}

				if($newnumero_debito!==null && filter_var($newnumero_debito,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_cuenta_pagar:No es numero entero - numero_debito='.$newnumero_debito);
				}

				$this->numero_debito=$newnumero_debito;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnumero_pago(?int $newnumero_pago)
	{
		try {
			if($this->numero_pago!==$newnumero_pago) {
				if($newnumero_pago===null && $newnumero_pago!='') {
					throw new Exception('parametro_cuenta_pagar:Valor nulo no permitido en columna numero_pago');
				}

				if($newnumero_pago!==null && filter_var($newnumero_pago,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_cuenta_pagar:No es numero entero - numero_pago='.$newnumero_pago);
				}

				$this->numero_pago=$newnumero_pago;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setmostrar_anulado(?bool $newmostrar_anulado)
	{
		try {
			if($this->mostrar_anulado!==$newmostrar_anulado) {
				if($newmostrar_anulado===null && $newmostrar_anulado!='') {
					throw new Exception('parametro_cuenta_pagar:Valor nulo no permitido en columna mostrar_anulado');
				}

				if($newmostrar_anulado!==null && filter_var($newmostrar_anulado,FILTER_VALIDATE_BOOLEAN)===false && $newmostrar_anulado!==0 && $newmostrar_anulado!==false) {
					throw new Exception('parametro_cuenta_pagar:No es valor booleano - mostrar_anulado='.$newmostrar_anulado);
				}

				$this->mostrar_anulado=$newmostrar_anulado;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnumero_proveedor(?int $newnumero_proveedor)
	{
		try {
			if($this->numero_proveedor!==$newnumero_proveedor) {
				if($newnumero_proveedor===null && $newnumero_proveedor!='') {
					throw new Exception('parametro_cuenta_pagar:Valor nulo no permitido en columna numero_proveedor');
				}

				if($newnumero_proveedor!==null && filter_var($newnumero_proveedor,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_cuenta_pagar:No es numero entero - numero_proveedor='.$newnumero_proveedor);
				}

				$this->numero_proveedor=$newnumero_proveedor;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcon_proveedor_inactivo(?bool $newcon_proveedor_inactivo)
	{
		try {
			if($this->con_proveedor_inactivo!==$newcon_proveedor_inactivo) {
				if($newcon_proveedor_inactivo===null && $newcon_proveedor_inactivo!='') {
					throw new Exception('parametro_cuenta_pagar:Valor nulo no permitido en columna con_proveedor_inactivo');
				}

				if($newcon_proveedor_inactivo!==null && filter_var($newcon_proveedor_inactivo,FILTER_VALIDATE_BOOLEAN)===false && $newcon_proveedor_inactivo!==0 && $newcon_proveedor_inactivo!==false) {
					throw new Exception('parametro_cuenta_pagar:No es valor booleano - con_proveedor_inactivo='.$newcon_proveedor_inactivo);
				}

				$this->con_proveedor_inactivo=$newcon_proveedor_inactivo;
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
	public function setMap_parametro_cuenta_pagarValue(string $sKey,$oValue) {
		$this->map_parametro_cuenta_pagar[$sKey]=$oValue;
	}
	
	public function getMap_parametro_cuenta_pagarValue(string $sKey) {
		return $this->map_parametro_cuenta_pagar[$sKey];
	}
	
	public function getparametro_cuenta_pagar_Original() : ?parametro_cuenta_pagar {
		return $this->parametro_cuenta_pagar_Original;
	}
	
	public function setparametro_cuenta_pagar_Original(parametro_cuenta_pagar $parametro_cuenta_pagar) {
		try {
			$this->parametro_cuenta_pagar_Original=$parametro_cuenta_pagar;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_parametro_cuenta_pagar() : array {
		return $this->map_parametro_cuenta_pagar;
	}

	public function setMap_parametro_cuenta_pagar(array $map_parametro_cuenta_pagar) {
		$this->map_parametro_cuenta_pagar = $map_parametro_cuenta_pagar;
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
