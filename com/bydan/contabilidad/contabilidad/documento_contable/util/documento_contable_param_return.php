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

namespace com\bydan\contabilidad\contabilidad\documento_contable\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\contabilidad\documento_contable\business\entity\documento_contable;

use com\bydan\contabilidad\contabilidad\documento_contable\presentation\session\documento_contable_session;

class documento_contable_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?documento_contable $documento_contable = null;	
	public ?array $documento_contables = array();
	
	/*SESSION*/
	public ?documento_contable_session $documento_contable_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->documento_contables= array();
		$this->documento_contable= new documento_contable();
		
		/*SESSION*/
		$this->documento_contable_session=$this->Session->unserialize(documento_contable_util::$STR_SESSION_NAME);

		if($this->documento_contable_session==null) {
			$this->documento_contable_session=new documento_contable_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getdocumento_contable() : documento_contable {	
		return $this->documento_contable;
	}
		
	public function setdocumento_contable(documento_contable $newdocumento_contable) {
		$this->documento_contable = $newdocumento_contable;
	}
	
	public function getdocumento_contables() : array {		
		return $this->documento_contables;
	}
	
	public function setdocumento_contables(array $newdocumento_contables) {
		$this->documento_contables = $newdocumento_contables;
	}
	
	/*SESSION*/
	public function getdocumento_contable_session() : documento_contable_session {	
		return $this->documento_contable_session;
	}
		
	public function setdocumento_contable_session(documento_contable_session $newdocumento_contable_session) {
		$this->documento_contable_session = $newdocumento_contable_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
