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

namespace com\bydan\contabilidad\seguridad\pais\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\seguridad\pais\business\entity\pais;

use com\bydan\contabilidad\seguridad\pais\presentation\session\pais_session;

class pais_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?pais $pais = null;	
	public ?array $paiss = array();
	
	/*SESSION*/
	public ?pais_session $pais_session = null;
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->paiss= array();
		$this->pais= new pais();
		
		/*SESSION*/
		$this->pais_session=$this->Session->unserialize(pais_util::$STR_SESSION_NAME);

		if($this->pais_session==null) {
			$this->pais_session=new pais_session();
		}
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function getpais() : pais {	
		return $this->pais;
	}
		
	public function setpais(pais $newpais) {
		$this->pais = $newpais;
	}
	
	public function getpaiss() : array {		
		return $this->paiss;
	}
	
	public function setpaiss(array $newpaiss) {
		$this->paiss = $newpaiss;
	}
	
	/*SESSION*/
	public function getpais_session() : pais_session {	
		return $this->pais_session;
	}
		
	public function setpais_session(pais_session $newpais_session) {
		$this->pais_session = $newpais_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
