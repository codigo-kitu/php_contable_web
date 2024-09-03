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
namespace com\bydan\contabilidad\cuentascobrar\parametro_cuenta_cobrar\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/

use com\bydan\contabilidad\general\empresa\business\entity\empresa;

class parametro_cuenta_cobrar extends GeneralEntity {

	/*GENERAL*/
	public static string $class='parametro_cuenta_cobrar';
	
	/*AUXILIARES*/
	public ?parametro_cuenta_cobrar $parametro_cuenta_cobrar_Original=null;	
	public ?GeneralEntity $parametro_cuenta_cobrar_Additional=null;
	public array $map_parametro_cuenta_cobrar=array();	
		
	/*CAMPOS*/
	public int $id_empresa = -1;
	public string $id_empresa_Descripcion = '';

	public int $numero_cuenta_cobrar = 0;
	public int $numero_debito = 0;
	public int $numero_credito = 0;
	public int $numero_pago = 0;
	public bool $mostrar_anulado = false;
	public int $numero_cliente = 0;
	public bool $con_cliente_inactivo = false;
	public string $nombre_registro_tributario = '';
	
	/*FKs*/
	
	public ?empresa $empresa = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->parametro_cuenta_cobrar_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_empresa=-1;
		$this->id_empresa_Descripcion='';

 		$this->numero_cuenta_cobrar=0;
 		$this->numero_debito=0;
 		$this->numero_credito=0;
 		$this->numero_pago=0;
 		$this->mostrar_anulado=false;
 		$this->numero_cliente=0;
 		$this->con_cliente_inactivo=false;
 		$this->nombre_registro_tributario='';
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->empresa=new empresa();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->parametro_cuenta_cobrar_Additional=new parametro_cuenta_cobrar_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_parametro_cuenta_cobrar() {
		$this->map_parametro_cuenta_cobrar = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_empresa() : ?int {
		return $this->id_empresa;
	}
	
	public function  getid_empresa_Descripcion() : string {
		return $this->id_empresa_Descripcion;
	}
    
	public function  getnumero_cuenta_cobrar() : ?int {
		return $this->numero_cuenta_cobrar;
	}
    
	public function  getnumero_debito() : ?int {
		return $this->numero_debito;
	}
    
	public function  getnumero_credito() : ?int {
		return $this->numero_credito;
	}
    
	public function  getnumero_pago() : ?int {
		return $this->numero_pago;
	}
    
	public function  getmostrar_anulado() : ?bool {
		return $this->mostrar_anulado;
	}
    
	public function  getnumero_cliente() : ?int {
		return $this->numero_cliente;
	}
    
	public function  getcon_cliente_inactivo() : ?bool {
		return $this->con_cliente_inactivo;
	}
    
	public function  getnombre_registro_tributario() : ?string {
		return $this->nombre_registro_tributario;
	}
	
    
	public function setid_empresa(?int $newid_empresa) {
		if($this->id_empresa!==$newid_empresa) {

				if($newid_empresa!==null && filter_var($newid_empresa,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_cuenta_cobrar:No es numero entero - id_empresa');
				}

			$this->id_empresa=$newid_empresa;
			$this->setIsChanged(true);
		}
	}

	
	public function setid_empresa_Descripcion(string $newid_empresa_Descripcion) {
		if($this->id_empresa_Descripcion!=$newid_empresa_Descripcion) {

			$this->id_empresa_Descripcion=$newid_empresa_Descripcion;
			//$this->setIsChanged(true);
		}
	}
    
	public function setnumero_cuenta_cobrar(?int $newnumero_cuenta_cobrar)
	{
		try {
			if($this->numero_cuenta_cobrar!==$newnumero_cuenta_cobrar) {
				if($newnumero_cuenta_cobrar===null && $newnumero_cuenta_cobrar!='') {
					throw new Exception('parametro_cuenta_cobrar:Valor nulo no permitido en columna numero_cuenta_cobrar');
				}

				if($newnumero_cuenta_cobrar!==null && filter_var($newnumero_cuenta_cobrar,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_cuenta_cobrar:No es numero entero - numero_cuenta_cobrar='.$newnumero_cuenta_cobrar);
				}

				$this->numero_cuenta_cobrar=$newnumero_cuenta_cobrar;
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
					throw new Exception('parametro_cuenta_cobrar:Valor nulo no permitido en columna numero_debito');
				}

				if($newnumero_debito!==null && filter_var($newnumero_debito,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_cuenta_cobrar:No es numero entero - numero_debito='.$newnumero_debito);
				}

				$this->numero_debito=$newnumero_debito;
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
					throw new Exception('parametro_cuenta_cobrar:Valor nulo no permitido en columna numero_credito');
				}

				if($newnumero_credito!==null && filter_var($newnumero_credito,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_cuenta_cobrar:No es numero entero - numero_credito='.$newnumero_credito);
				}

				$this->numero_credito=$newnumero_credito;
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
					throw new Exception('parametro_cuenta_cobrar:Valor nulo no permitido en columna numero_pago');
				}

				if($newnumero_pago!==null && filter_var($newnumero_pago,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_cuenta_cobrar:No es numero entero - numero_pago='.$newnumero_pago);
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
					throw new Exception('parametro_cuenta_cobrar:Valor nulo no permitido en columna mostrar_anulado');
				}

				if($newmostrar_anulado!==null && filter_var($newmostrar_anulado,FILTER_VALIDATE_BOOLEAN)===false && $newmostrar_anulado!==0 && $newmostrar_anulado!==false) {
					throw new Exception('parametro_cuenta_cobrar:No es valor booleano - mostrar_anulado='.$newmostrar_anulado);
				}

				$this->mostrar_anulado=$newmostrar_anulado;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnumero_cliente(?int $newnumero_cliente)
	{
		try {
			if($this->numero_cliente!==$newnumero_cliente) {
				if($newnumero_cliente===null && $newnumero_cliente!='') {
					throw new Exception('parametro_cuenta_cobrar:Valor nulo no permitido en columna numero_cliente');
				}

				if($newnumero_cliente!==null && filter_var($newnumero_cliente,FILTER_VALIDATE_INT)===false) {
					throw new Exception('parametro_cuenta_cobrar:No es numero entero - numero_cliente='.$newnumero_cliente);
				}

				$this->numero_cliente=$newnumero_cliente;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setcon_cliente_inactivo(?bool $newcon_cliente_inactivo)
	{
		try {
			if($this->con_cliente_inactivo!==$newcon_cliente_inactivo) {
				if($newcon_cliente_inactivo===null && $newcon_cliente_inactivo!='') {
					throw new Exception('parametro_cuenta_cobrar:Valor nulo no permitido en columna con_cliente_inactivo');
				}

				if($newcon_cliente_inactivo!==null && filter_var($newcon_cliente_inactivo,FILTER_VALIDATE_BOOLEAN)===false && $newcon_cliente_inactivo!==0 && $newcon_cliente_inactivo!==false) {
					throw new Exception('parametro_cuenta_cobrar:No es valor booleano - con_cliente_inactivo='.$newcon_cliente_inactivo);
				}

				$this->con_cliente_inactivo=$newcon_cliente_inactivo;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setnombre_registro_tributario(?string $newnombre_registro_tributario)
	{
		try {
			if($this->nombre_registro_tributario!==$newnombre_registro_tributario) {
				if($newnombre_registro_tributario===null && $newnombre_registro_tributario!='') {
					throw new Exception('parametro_cuenta_cobrar:Valor nulo no permitido en columna nombre_registro_tributario');
				}

				if(strlen($newnombre_registro_tributario)>30) {
					throw new Exception('parametro_cuenta_cobrar:Ha sobrepasado el numero maximo de caracteres permitidos,Maximo=30 en columna nombre_registro_tributario');
				}

				if(filter_var($newnombre_registro_tributario,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>Constantes::$S_REGEX_PHP_STRING_GENERAL)))===false) {
					throw new Exception('parametro_cuenta_cobrar:Formato incorrecto en columna nombre_registro_tributario='.$newnombre_registro_tributario);
				}

				$this->nombre_registro_tributario=$newnombre_registro_tributario;
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
	public function setMap_parametro_cuenta_cobrarValue(string $sKey,$oValue) {
		$this->map_parametro_cuenta_cobrar[$sKey]=$oValue;
	}
	
	public function getMap_parametro_cuenta_cobrarValue(string $sKey) {
		return $this->map_parametro_cuenta_cobrar[$sKey];
	}
	
	public function getparametro_cuenta_cobrar_Original() : ?parametro_cuenta_cobrar {
		return $this->parametro_cuenta_cobrar_Original;
	}
	
	public function setparametro_cuenta_cobrar_Original(parametro_cuenta_cobrar $parametro_cuenta_cobrar) {
		try {
			$this->parametro_cuenta_cobrar_Original=$parametro_cuenta_cobrar;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_parametro_cuenta_cobrar() : array {
		return $this->map_parametro_cuenta_cobrar;
	}

	public function setMap_parametro_cuenta_cobrar(array $map_parametro_cuenta_cobrar) {
		$this->map_parametro_cuenta_cobrar = $map_parametro_cuenta_cobrar;
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
