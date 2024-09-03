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
namespace com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\business\entity;

use Exception;

use com\bydan\framework\contabilidad\business\entity\GeneralEntity;

use com\bydan\framework\contabilidad\util\Constantes;

/*FK*/


class clasificacion_cheque extends GeneralEntity {

	/*GENERAL*/
	public static string $class='clasificacion_cheque';
	
	/*AUXILIARES*/
	public ?clasificacion_cheque $clasificacion_cheque_Original=null;	
	public ?GeneralEntity $clasificacion_cheque_Additional=null;
	public array $map_clasificacion_cheque=array();	
		
	/*CAMPOS*/
	public int $id_cuenta_corriente_detalle = -1;
	public string $id_cuenta_corriente_detalle_Descripcion = '';

	public int $id_categoria_cheque = -1;
	public string $id_categoria_cheque_Descripcion = '';

	public float $monto = 0.0;
	
	/*FKs*/
	
	public ?cuenta_corriente_detalle $cuenta_corriente_detalle = null;
	public ?categoria_cheque $categoria_cheque = null;
	
	/*RELACIONES*/
	
	
	function __construct () {
		parent::__construct();		
		
		/*GENERAL*/
		
		parent::setIsWithIdentity(true);
		
		/*SI SE DESCOMENTA, json_encode CAUSA RECURSIVIDAD, SE DEBE ASIGNAR MANUALMENTE
		$this->clasificacion_cheque_Original=$this;
		*/
		
		/*CAMPOS*/
 		$this->id_cuenta_corriente_detalle=-1;
		$this->id_cuenta_corriente_detalle_Descripcion='';

 		$this->id_categoria_cheque=-1;
		$this->id_categoria_cheque_Descripcion='';

 		$this->monto=0.0;
		
		/*FKs*/
		if(Constantes::$BIT_CONCARGA_INICIAL) {
		
			$this->cuenta_corriente_detalle=new cuenta_corriente_detalle();
			$this->categoria_cheque=new categoria_cheque();
		}
		
		/*RELACIONES*/
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->clasificacion_cheque_Additional=new clasificacion_cheque_Additional();*/
    } 
    
	function __clone() {
	
	}
	
	/*GENERAL*/
	
	public function inicializarMap_clasificacion_cheque() {
		$this->map_clasificacion_cheque = array();
	}
	
	/*CAMPOS*/
    
	public function  getid_cuenta_corriente_detalle() : ?int {
		return $this->id_cuenta_corriente_detalle;
	}
	
	public function  getid_cuenta_corriente_detalle_Descripcion() : string {
		return $this->id_cuenta_corriente_detalle_Descripcion;
	}
    
	public function  getid_categoria_cheque() : ?int {
		return $this->id_categoria_cheque;
	}
	
	public function  getid_categoria_cheque_Descripcion() : string {
		return $this->id_categoria_cheque_Descripcion;
	}
    
	public function  getmonto() : ?float {
		return $this->monto;
	}
	
    
	public function setid_cuenta_corriente_detalle(?int $newid_cuenta_corriente_detalle)
	{
		try {
			if($this->id_cuenta_corriente_detalle!==$newid_cuenta_corriente_detalle) {
				if($newid_cuenta_corriente_detalle===null && $newid_cuenta_corriente_detalle!='') {
					throw new Exception('clasificacion_cheque:Valor nulo no permitido en columna id_cuenta_corriente_detalle');
				}

				if($newid_cuenta_corriente_detalle!==null && filter_var($newid_cuenta_corriente_detalle,FILTER_VALIDATE_INT)===false) {
					throw new Exception('clasificacion_cheque:No es numero entero - id_cuenta_corriente_detalle='.$newid_cuenta_corriente_detalle);
				}

				$this->id_cuenta_corriente_detalle=$newid_cuenta_corriente_detalle;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_cuenta_corriente_detalle_Descripcion(string $newid_cuenta_corriente_detalle_Descripcion)
	{
		try {
			if($this->id_cuenta_corriente_detalle_Descripcion!=$newid_cuenta_corriente_detalle_Descripcion) {
				if($newid_cuenta_corriente_detalle_Descripcion===null && $newid_cuenta_corriente_detalle_Descripcion!='') {
					throw new Exception('clasificacion_cheque:Valor nulo no permitido en columna id_cuenta_corriente_detalle');
				}

				$this->id_cuenta_corriente_detalle_Descripcion=$newid_cuenta_corriente_detalle_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setid_categoria_cheque(?int $newid_categoria_cheque)
	{
		try {
			if($this->id_categoria_cheque!==$newid_categoria_cheque) {
				if($newid_categoria_cheque===null && $newid_categoria_cheque!='') {
					throw new Exception('clasificacion_cheque:Valor nulo no permitido en columna id_categoria_cheque');
				}

				if($newid_categoria_cheque!==null && filter_var($newid_categoria_cheque,FILTER_VALIDATE_INT)===false) {
					throw new Exception('clasificacion_cheque:No es numero entero - id_categoria_cheque='.$newid_categoria_cheque);
				}

				$this->id_categoria_cheque=$newid_categoria_cheque;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function setid_categoria_cheque_Descripcion(string $newid_categoria_cheque_Descripcion)
	{
		try {
			if($this->id_categoria_cheque_Descripcion!=$newid_categoria_cheque_Descripcion) {
				if($newid_categoria_cheque_Descripcion===null && $newid_categoria_cheque_Descripcion!='') {
					throw new Exception('clasificacion_cheque:Valor nulo no permitido en columna id_categoria_cheque');
				}

				$this->id_categoria_cheque_Descripcion=$newid_categoria_cheque_Descripcion;
				//$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
    
	public function setmonto(?float $newmonto)
	{
		try {
			if($this->monto!==$newmonto) {
				if($newmonto===null && $newmonto!='') {
					throw new Exception('clasificacion_cheque:Valor nulo no permitido en columna monto');
				}

				if($newmonto!=0) {
					if($newmonto!==null && filter_var($newmonto,FILTER_VALIDATE_FLOAT)===false) {
						throw new Exception('clasificacion_cheque:No es numero decimal - monto='.$newmonto);
					}
				}

				$this->monto=$newmonto;
				$this->setIsChanged(true);
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*FKs*/
	
	public function getcuenta_corriente_detalle() : ?cuenta_corriente_detalle {
		return $this->cuenta_corriente_detalle;
	}

	public function getcategoria_cheque() : ?categoria_cheque {
		return $this->categoria_cheque;
	}

	
	
	public  function  setcuenta_corriente_detalle(?cuenta_corriente_detalle $cuenta_corriente_detalle) {
		try {
			$this->cuenta_corriente_detalle=$cuenta_corriente_detalle;
		} catch(Exception $e) {
			;
		}
	}


	public  function  setcategoria_cheque(?categoria_cheque $categoria_cheque) {
		try {
			$this->categoria_cheque=$categoria_cheque;
		} catch(Exception $e) {
			;
		}
	}

	
	
	/*RELACIONES*/
	
	
	
	
	/*AUXILIARES*/
	public function setMap_clasificacion_chequeValue(string $sKey,$oValue) {
		$this->map_clasificacion_cheque[$sKey]=$oValue;
	}
	
	public function getMap_clasificacion_chequeValue(string $sKey) {
		return $this->map_clasificacion_cheque[$sKey];
	}
	
	public function getclasificacion_cheque_Original() : ?clasificacion_cheque {
		return $this->clasificacion_cheque_Original;
	}
	
	public function setclasificacion_cheque_Original(clasificacion_cheque $clasificacion_cheque) {
		try {
			$this->clasificacion_cheque_Original=$clasificacion_cheque;
		} catch(Exception $e) {
			;
		}
	}
	
	public function getMap_clasificacion_cheque() : array {
		return $this->map_clasificacion_cheque;
	}

	public function setMap_clasificacion_cheque(array $map_clasificacion_cheque) {
		$this->map_clasificacion_cheque = $map_clasificacion_cheque;
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
