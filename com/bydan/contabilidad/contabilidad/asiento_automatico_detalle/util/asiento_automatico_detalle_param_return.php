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

namespace com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\business\entity\asiento_automatico_detalle;

use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\presentation\session\asiento_automatico_detalle_session;

class asiento_automatico_detalle_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?asiento_automatico_detalle $asiento_automatico_detalle = null;	
	public ?array $asiento_automatico_detalles = array();
	
	/*SESSION*/
	public ?asiento_automatico_detalle_session $asiento_automatico_detalle_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;

	public bool $con_asiento_automaticosFK=false;
	public array $asiento_automaticosFK=array();
	public int $idasiento_automaticoDefaultFK=-1;

	public bool $con_cuentasFK=false;
	public array $cuentasFK=array();
	public int $idcuentaDefaultFK=-1;

	public bool $con_centro_costosFK=false;
	public array $centro_costosFK=array();
	public int $idcentro_costoDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->asiento_automatico_detalles= array();
		$this->asiento_automatico_detalle= new asiento_automatico_detalle();
		
		/*SESSION*/
		$this->asiento_automatico_detalle_session=$this->Session->unserialize(asiento_automatico_detalle_util::$STR_SESSION_NAME);

		if($this->asiento_automatico_detalle_session==null) {
			$this->asiento_automatico_detalle_session=new asiento_automatico_detalle_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;

		$this->con_asiento_automaticosFK=false;
		$this->asiento_automaticosFK=array();
		$this->idasiento_automaticoDefaultFK=-1;

		$this->con_cuentasFK=false;
		$this->cuentasFK=array();
		$this->idcuentaDefaultFK=-1;

		$this->con_centro_costosFK=false;
		$this->centro_costosFK=array();
		$this->idcentro_costoDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getasiento_automatico_detalle() : asiento_automatico_detalle {	
		return $this->asiento_automatico_detalle;
	}
		
	public function setasiento_automatico_detalle(asiento_automatico_detalle $newasiento_automatico_detalle) {
		$this->asiento_automatico_detalle = $newasiento_automatico_detalle;
	}
	
	public function getasiento_automatico_detalles() : array {		
		return $this->asiento_automatico_detalles;
	}
	
	public function setasiento_automatico_detalles(array $newasiento_automatico_detalles) {
		$this->asiento_automatico_detalles = $newasiento_automatico_detalles;
	}
	
	/*SESSION*/
	public function getasiento_automatico_detalle_session() : asiento_automatico_detalle_session {	
		return $this->asiento_automatico_detalle_session;
	}
		
	public function setasiento_automatico_detalle_session(asiento_automatico_detalle_session $newasiento_automatico_detalle_session) {
		$this->asiento_automatico_detalle_session = $newasiento_automatico_detalle_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
