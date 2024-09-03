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

namespace com\bydan\contabilidad\facturacion\impuesto\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\facturacion\impuesto\business\entity\impuesto;

use com\bydan\contabilidad\facturacion\impuesto\presentation\session\impuesto_session;

class impuesto_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?impuesto $impuesto = null;	
	public ?array $impuestos = array();
	
	/*SESSION*/
	public ?impuesto_session $impuesto_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;

	public bool $con_cuenta_ventassFK=false;
	public array $cuenta_ventassFK=array();
	public int $idcuenta_ventasDefaultFK=-1;

	public bool $con_cuenta_comprassFK=false;
	public array $cuenta_comprassFK=array();
	public int $idcuenta_comprasDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->impuestos= array();
		$this->impuesto= new impuesto();
		
		/*SESSION*/
		$this->impuesto_session=$this->Session->unserialize(impuesto_util::$STR_SESSION_NAME);

		if($this->impuesto_session==null) {
			$this->impuesto_session=new impuesto_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;

		$this->con_cuenta_ventassFK=false;
		$this->cuenta_ventassFK=array();
		$this->idcuenta_ventasDefaultFK=-1;

		$this->con_cuenta_comprassFK=false;
		$this->cuenta_comprassFK=array();
		$this->idcuenta_comprasDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getimpuesto() : impuesto {	
		return $this->impuesto;
	}
		
	public function setimpuesto(impuesto $newimpuesto) {
		$this->impuesto = $newimpuesto;
	}
	
	public function getimpuestos() : array {		
		return $this->impuestos;
	}
	
	public function setimpuestos(array $newimpuestos) {
		$this->impuestos = $newimpuestos;
	}
	
	/*SESSION*/
	public function getimpuesto_session() : impuesto_session {	
		return $this->impuesto_session;
	}
		
	public function setimpuesto_session(impuesto_session $newimpuesto_session) {
		$this->impuesto_session = $newimpuesto_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
