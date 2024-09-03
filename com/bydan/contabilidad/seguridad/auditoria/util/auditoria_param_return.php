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

namespace com\bydan\contabilidad\seguridad\auditoria\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\seguridad\auditoria\business\entity\auditoria;

use com\bydan\contabilidad\seguridad\auditoria\presentation\session\auditoria_session;

class auditoria_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?auditoria $auditoria = null;	
	public ?array $auditorias = array();
	
	/*SESSION*/
	public ?auditoria_session $auditoria_session = null;
	
	/*FKs*/
	

	public bool $con_usuariosFK=false;
	public array $usuariosFK=array();
	public int $idusuarioDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->auditorias= array();
		$this->auditoria= new auditoria();
		
		/*SESSION*/
		$this->auditoria_session=$this->Session->unserialize(auditoria_util::$STR_SESSION_NAME);

		if($this->auditoria_session==null) {
			$this->auditoria_session=new auditoria_session();
		}
		
		/*FKs*/
		

		$this->con_usuariosFK=false;
		$this->usuariosFK=array();
		$this->idusuarioDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getauditoria() : auditoria {	
		return $this->auditoria;
	}
		
	public function setauditoria(auditoria $newauditoria) {
		$this->auditoria = $newauditoria;
	}
	
	public function getauditorias() : array {		
		return $this->auditorias;
	}
	
	public function setauditorias(array $newauditorias) {
		$this->auditorias = $newauditorias;
	}
	
	/*SESSION*/
	public function getauditoria_session() : auditoria_session {	
		return $this->auditoria_session;
	}
		
	public function setauditoria_session(auditoria_session $newauditoria_session) {
		$this->auditoria_session = $newauditoria_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
