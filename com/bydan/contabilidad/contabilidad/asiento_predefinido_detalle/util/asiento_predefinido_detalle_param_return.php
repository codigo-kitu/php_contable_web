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

namespace com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\business\entity\asiento_predefinido_detalle;

use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\presentation\session\asiento_predefinido_detalle_session;

class asiento_predefinido_detalle_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?asiento_predefinido_detalle $asiento_predefinido_detalle = null;	
	public ?array $asiento_predefinido_detalles = array();
	
	/*SESSION*/
	public ?asiento_predefinido_detalle_session $asiento_predefinido_detalle_session = null;
	
	/*FKs*/
	

	public bool $con_asiento_predefinidosFK=false;
	public array $asiento_predefinidosFK=array();
	public int $idasiento_predefinidoDefaultFK=-1;

	public bool $con_cuentasFK=false;
	public array $cuentasFK=array();
	public int $idcuentaDefaultFK=-1;

	public bool $con_centro_costosFK=false;
	public array $centro_costosFK=array();
	public int $idcentro_costoDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->asiento_predefinido_detalles= array();
		$this->asiento_predefinido_detalle= new asiento_predefinido_detalle();
		
		/*SESSION*/
		$this->asiento_predefinido_detalle_session=$this->Session->unserialize(asiento_predefinido_detalle_util::$STR_SESSION_NAME);

		if($this->asiento_predefinido_detalle_session==null) {
			$this->asiento_predefinido_detalle_session=new asiento_predefinido_detalle_session();
		}
		
		/*FKs*/
		

		$this->con_asiento_predefinidosFK=false;
		$this->asiento_predefinidosFK=array();
		$this->idasiento_predefinidoDefaultFK=-1;

		$this->con_cuentasFK=false;
		$this->cuentasFK=array();
		$this->idcuentaDefaultFK=-1;

		$this->con_centro_costosFK=false;
		$this->centro_costosFK=array();
		$this->idcentro_costoDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getasiento_predefinido_detalle() : asiento_predefinido_detalle {	
		return $this->asiento_predefinido_detalle;
	}
		
	public function setasiento_predefinido_detalle(asiento_predefinido_detalle $newasiento_predefinido_detalle) {
		$this->asiento_predefinido_detalle = $newasiento_predefinido_detalle;
	}
	
	public function getasiento_predefinido_detalles() : array {		
		return $this->asiento_predefinido_detalles;
	}
	
	public function setasiento_predefinido_detalles(array $newasiento_predefinido_detalles) {
		$this->asiento_predefinido_detalles = $newasiento_predefinido_detalles;
	}
	
	/*SESSION*/
	public function getasiento_predefinido_detalle_session() : asiento_predefinido_detalle_session {	
		return $this->asiento_predefinido_detalle_session;
	}
		
	public function setasiento_predefinido_detalle_session(asiento_predefinido_detalle_session $newasiento_predefinido_detalle_session) {
		$this->asiento_predefinido_detalle_session = $newasiento_predefinido_detalle_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
