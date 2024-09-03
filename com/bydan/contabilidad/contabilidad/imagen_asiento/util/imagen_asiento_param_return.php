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

namespace com\bydan\contabilidad\contabilidad\imagen_asiento\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\contabilidad\imagen_asiento\business\entity\imagen_asiento;

use com\bydan\contabilidad\contabilidad\imagen_asiento\presentation\session\imagen_asiento_session;

class imagen_asiento_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?imagen_asiento $imagen_asiento = null;	
	public ?array $imagen_asientos = array();
	
	/*SESSION*/
	public ?imagen_asiento_session $imagen_asiento_session = null;
	
	/*FKs*/
	

	public bool $con_asientosFK=false;
	public array $asientosFK=array();
	public int $idasientoDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->imagen_asientos= array();
		$this->imagen_asiento= new imagen_asiento();
		
		/*SESSION*/
		$this->imagen_asiento_session=$this->Session->unserialize(imagen_asiento_util::$STR_SESSION_NAME);

		if($this->imagen_asiento_session==null) {
			$this->imagen_asiento_session=new imagen_asiento_session();
		}
		
		/*FKs*/
		

		$this->con_asientosFK=false;
		$this->asientosFK=array();
		$this->idasientoDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getimagen_asiento() : imagen_asiento {	
		return $this->imagen_asiento;
	}
		
	public function setimagen_asiento(imagen_asiento $newimagen_asiento) {
		$this->imagen_asiento = $newimagen_asiento;
	}
	
	public function getimagen_asientos() : array {		
		return $this->imagen_asientos;
	}
	
	public function setimagen_asientos(array $newimagen_asientos) {
		$this->imagen_asientos = $newimagen_asientos;
	}
	
	/*SESSION*/
	public function getimagen_asiento_session() : imagen_asiento_session {	
		return $this->imagen_asiento_session;
	}
		
	public function setimagen_asiento_session(imagen_asiento_session $newimagen_asiento_session) {
		$this->imagen_asiento_session = $newimagen_asiento_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
