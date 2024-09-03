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

namespace com\bydan\contabilidad\general\reporte_monica\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\general\reporte_monica\business\entity\reporte_monica;

use com\bydan\contabilidad\general\reporte_monica\presentation\session\reporte_monica_session;

class reporte_monica_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?reporte_monica $reporte_monica = null;	
	public ?array $reporte_monicas = array();
	
	/*SESSION*/
	public ?reporte_monica_session $reporte_monica_session = null;
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->reporte_monicas= array();
		$this->reporte_monica= new reporte_monica();
		
		/*SESSION*/
		$this->reporte_monica_session=$this->Session->unserialize(reporte_monica_util::$STR_SESSION_NAME);

		if($this->reporte_monica_session==null) {
			$this->reporte_monica_session=new reporte_monica_session();
		}
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function getreporte_monica() : reporte_monica {	
		return $this->reporte_monica;
	}
		
	public function setreporte_monica(reporte_monica $newreporte_monica) {
		$this->reporte_monica = $newreporte_monica;
	}
	
	public function getreporte_monicas() : array {		
		return $this->reporte_monicas;
	}
	
	public function setreporte_monicas(array $newreporte_monicas) {
		$this->reporte_monicas = $newreporte_monicas;
	}
	
	/*SESSION*/
	public function getreporte_monica_session() : reporte_monica_session {	
		return $this->reporte_monica_session;
	}
		
	public function setreporte_monica_session(reporte_monica_session $newreporte_monica_session) {
		$this->reporte_monica_session = $newreporte_monica_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
