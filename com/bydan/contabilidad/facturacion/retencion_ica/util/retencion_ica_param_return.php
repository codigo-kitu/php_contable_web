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

namespace com\bydan\contabilidad\facturacion\retencion_ica\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\facturacion\retencion_ica\business\entity\retencion_ica;

use com\bydan\contabilidad\facturacion\retencion_ica\presentation\session\retencion_ica_session;

class retencion_ica_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?retencion_ica $retencion_ica = null;	
	public ?array $retencion_icas = array();
	
	/*SESSION*/
	public ?retencion_ica_session $retencion_ica_session = null;
	
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
		$this->retencion_icas= array();
		$this->retencion_ica= new retencion_ica();
		
		/*SESSION*/
		$this->retencion_ica_session=$this->Session->unserialize(retencion_ica_util::$STR_SESSION_NAME);

		if($this->retencion_ica_session==null) {
			$this->retencion_ica_session=new retencion_ica_session();
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
	public function getretencion_ica() : retencion_ica {	
		return $this->retencion_ica;
	}
		
	public function setretencion_ica(retencion_ica $newretencion_ica) {
		$this->retencion_ica = $newretencion_ica;
	}
	
	public function getretencion_icas() : array {		
		return $this->retencion_icas;
	}
	
	public function setretencion_icas(array $newretencion_icas) {
		$this->retencion_icas = $newretencion_icas;
	}
	
	/*SESSION*/
	public function getretencion_ica_session() : retencion_ica_session {	
		return $this->retencion_ica_session;
	}
		
	public function setretencion_ica_session(retencion_ica_session $newretencion_ica_session) {
		$this->retencion_ica_session = $newretencion_ica_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
