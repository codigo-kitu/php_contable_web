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

namespace com\bydan\contabilidad\facturacion\otro_impuesto\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\facturacion\otro_impuesto\business\entity\otro_impuesto;

use com\bydan\contabilidad\facturacion\otro_impuesto\presentation\session\otro_impuesto_session;

class otro_impuesto_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?otro_impuesto $otro_impuesto = null;	
	public ?array $otro_impuestos = array();
	
	/*SESSION*/
	public ?otro_impuesto_session $otro_impuesto_session = null;
	
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
		$this->otro_impuestos= array();
		$this->otro_impuesto= new otro_impuesto();
		
		/*SESSION*/
		$this->otro_impuesto_session=$this->Session->unserialize(otro_impuesto_util::$STR_SESSION_NAME);

		if($this->otro_impuesto_session==null) {
			$this->otro_impuesto_session=new otro_impuesto_session();
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
	public function getotro_impuesto() : otro_impuesto {	
		return $this->otro_impuesto;
	}
		
	public function setotro_impuesto(otro_impuesto $newotro_impuesto) {
		$this->otro_impuesto = $newotro_impuesto;
	}
	
	public function getotro_impuestos() : array {		
		return $this->otro_impuestos;
	}
	
	public function setotro_impuestos(array $newotro_impuestos) {
		$this->otro_impuestos = $newotro_impuestos;
	}
	
	/*SESSION*/
	public function getotro_impuesto_session() : otro_impuesto_session {	
		return $this->otro_impuesto_session;
	}
		
	public function setotro_impuesto_session(otro_impuesto_session $newotro_impuesto_session) {
		$this->otro_impuesto_session = $newotro_impuesto_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
