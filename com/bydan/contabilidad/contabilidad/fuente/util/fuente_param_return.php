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

namespace com\bydan\contabilidad\contabilidad\fuente\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\contabilidad\fuente\business\entity\fuente;

use com\bydan\contabilidad\contabilidad\fuente\presentation\session\fuente_session;

class fuente_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?fuente $fuente = null;	
	public ?array $fuentes = array();
	
	/*SESSION*/
	public ?fuente_session $fuente_session = null;
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->fuentes= array();
		$this->fuente= new fuente();
		
		/*SESSION*/
		$this->fuente_session=$this->Session->unserialize(fuente_util::$STR_SESSION_NAME);

		if($this->fuente_session==null) {
			$this->fuente_session=new fuente_session();
		}
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function getfuente() : fuente {	
		return $this->fuente;
	}
		
	public function setfuente(fuente $newfuente) {
		$this->fuente = $newfuente;
	}
	
	public function getfuentes() : array {		
		return $this->fuentes;
	}
	
	public function setfuentes(array $newfuentes) {
		$this->fuentes = $newfuentes;
	}
	
	/*SESSION*/
	public function getfuente_session() : fuente_session {	
		return $this->fuente_session;
	}
		
	public function setfuente_session(fuente_session $newfuente_session) {
		$this->fuente_session = $newfuente_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
