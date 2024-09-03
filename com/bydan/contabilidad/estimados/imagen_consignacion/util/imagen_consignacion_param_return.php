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

namespace com\bydan\contabilidad\estimados\imagen_consignacion\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\estimados\imagen_consignacion\business\entity\imagen_consignacion;

use com\bydan\contabilidad\estimados\imagen_consignacion\presentation\session\imagen_consignacion_session;

class imagen_consignacion_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?imagen_consignacion $imagen_consignacion = null;	
	public ?array $imagen_consignacions = array();
	
	/*SESSION*/
	public ?imagen_consignacion_session $imagen_consignacion_session = null;
	
	/*FKs*/
	

	public bool $con_consignacionsFK=false;
	public array $consignacionsFK=array();
	public int $idconsignacionDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->imagen_consignacions= array();
		$this->imagen_consignacion= new imagen_consignacion();
		
		/*SESSION*/
		$this->imagen_consignacion_session=$this->Session->unserialize(imagen_consignacion_util::$STR_SESSION_NAME);

		if($this->imagen_consignacion_session==null) {
			$this->imagen_consignacion_session=new imagen_consignacion_session();
		}
		
		/*FKs*/
		

		$this->con_consignacionsFK=false;
		$this->consignacionsFK=array();
		$this->idconsignacionDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getimagen_consignacion() : imagen_consignacion {	
		return $this->imagen_consignacion;
	}
		
	public function setimagen_consignacion(imagen_consignacion $newimagen_consignacion) {
		$this->imagen_consignacion = $newimagen_consignacion;
	}
	
	public function getimagen_consignacions() : array {		
		return $this->imagen_consignacions;
	}
	
	public function setimagen_consignacions(array $newimagen_consignacions) {
		$this->imagen_consignacions = $newimagen_consignacions;
	}
	
	/*SESSION*/
	public function getimagen_consignacion_session() : imagen_consignacion_session {	
		return $this->imagen_consignacion_session;
	}
		
	public function setimagen_consignacion_session(imagen_consignacion_session $newimagen_consignacion_session) {
		$this->imagen_consignacion_session = $newimagen_consignacion_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
