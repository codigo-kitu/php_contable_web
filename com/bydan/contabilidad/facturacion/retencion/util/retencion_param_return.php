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

namespace com\bydan\contabilidad\facturacion\retencion\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\facturacion\retencion\business\entity\retencion;

use com\bydan\contabilidad\facturacion\retencion\presentation\session\retencion_session;

class retencion_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?retencion $retencion = null;	
	public ?array $retencions = array();
	
	/*SESSION*/
	public ?retencion_session $retencion_session = null;
	
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
		$this->retencions= array();
		$this->retencion= new retencion();
		
		/*SESSION*/
		$this->retencion_session=$this->Session->unserialize(retencion_util::$STR_SESSION_NAME);

		if($this->retencion_session==null) {
			$this->retencion_session=new retencion_session();
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
	public function getretencion() : retencion {	
		return $this->retencion;
	}
		
	public function setretencion(retencion $newretencion) {
		$this->retencion = $newretencion;
	}
	
	public function getretencions() : array {		
		return $this->retencions;
	}
	
	public function setretencions(array $newretencions) {
		$this->retencions = $newretencions;
	}
	
	/*SESSION*/
	public function getretencion_session() : retencion_session {	
		return $this->retencion_session;
	}
		
	public function setretencion_session(retencion_session $newretencion_session) {
		$this->retencion_session = $newretencion_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
