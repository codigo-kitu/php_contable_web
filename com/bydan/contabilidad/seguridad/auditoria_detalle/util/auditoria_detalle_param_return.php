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

namespace com\bydan\contabilidad\seguridad\auditoria_detalle\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\seguridad\auditoria_detalle\business\entity\auditoria_detalle;

use com\bydan\contabilidad\seguridad\auditoria_detalle\presentation\session\auditoria_detalle_session;

class auditoria_detalle_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?auditoria_detalle $auditoria_detalle = null;	
	public ?array $auditoria_detalles = array();
	
	/*SESSION*/
	public ?auditoria_detalle_session $auditoria_detalle_session = null;
	
	/*FKs*/
	

	public bool $con_auditoriasFK=false;
	public array $auditoriasFK=array();
	public int $idauditoriaDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->auditoria_detalles= array();
		$this->auditoria_detalle= new auditoria_detalle();
		
		/*SESSION*/
		$this->auditoria_detalle_session=$this->Session->unserialize(auditoria_detalle_util::$STR_SESSION_NAME);

		if($this->auditoria_detalle_session==null) {
			$this->auditoria_detalle_session=new auditoria_detalle_session();
		}
		
		/*FKs*/
		

		$this->con_auditoriasFK=false;
		$this->auditoriasFK=array();
		$this->idauditoriaDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getauditoria_detalle() : auditoria_detalle {	
		return $this->auditoria_detalle;
	}
		
	public function setauditoria_detalle(auditoria_detalle $newauditoria_detalle) {
		$this->auditoria_detalle = $newauditoria_detalle;
	}
	
	public function getauditoria_detalles() : array {		
		return $this->auditoria_detalles;
	}
	
	public function setauditoria_detalles(array $newauditoria_detalles) {
		$this->auditoria_detalles = $newauditoria_detalles;
	}
	
	/*SESSION*/
	public function getauditoria_detalle_session() : auditoria_detalle_session {	
		return $this->auditoria_detalle_session;
	}
		
	public function setauditoria_detalle_session(auditoria_detalle_session $newauditoria_detalle_session) {
		$this->auditoria_detalle_session = $newauditoria_detalle_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
