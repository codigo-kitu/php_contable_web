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

namespace com\bydan\contabilidad\facturacion\retencion_fuente\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\facturacion\retencion_fuente\business\entity\retencion_fuente;

use com\bydan\contabilidad\facturacion\retencion_fuente\presentation\session\retencion_fuente_session;

class retencion_fuente_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?retencion_fuente $retencion_fuente = null;	
	public ?array $retencion_fuentes = array();
	
	/*SESSION*/
	public ?retencion_fuente_session $retencion_fuente_session = null;
	
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
		$this->retencion_fuentes= array();
		$this->retencion_fuente= new retencion_fuente();
		
		/*SESSION*/
		$this->retencion_fuente_session=$this->Session->unserialize(retencion_fuente_util::$STR_SESSION_NAME);

		if($this->retencion_fuente_session==null) {
			$this->retencion_fuente_session=new retencion_fuente_session();
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
	public function getretencion_fuente() : retencion_fuente {	
		return $this->retencion_fuente;
	}
		
	public function setretencion_fuente(retencion_fuente $newretencion_fuente) {
		$this->retencion_fuente = $newretencion_fuente;
	}
	
	public function getretencion_fuentes() : array {		
		return $this->retencion_fuentes;
	}
	
	public function setretencion_fuentes(array $newretencion_fuentes) {
		$this->retencion_fuentes = $newretencion_fuentes;
	}
	
	/*SESSION*/
	public function getretencion_fuente_session() : retencion_fuente_session {	
		return $this->retencion_fuente_session;
	}
		
	public function setretencion_fuente_session(retencion_fuente_session $newretencion_fuente_session) {
		$this->retencion_fuente_session = $newretencion_fuente_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
