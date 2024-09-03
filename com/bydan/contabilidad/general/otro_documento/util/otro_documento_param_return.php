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

namespace com\bydan\contabilidad\general\otro_documento\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\general\otro_documento\business\entity\otro_documento;

use com\bydan\contabilidad\general\otro_documento\presentation\session\otro_documento_session;

class otro_documento_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?otro_documento $otro_documento = null;	
	public ?array $otro_documentos = array();
	
	/*SESSION*/
	public ?otro_documento_session $otro_documento_session = null;
	
	/*FKs*/
	

	public bool $con_archivosFK=false;
	public array $archivosFK=array();
	public int $idarchivoDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->otro_documentos= array();
		$this->otro_documento= new otro_documento();
		
		/*SESSION*/
		$this->otro_documento_session=$this->Session->unserialize(otro_documento_util::$STR_SESSION_NAME);

		if($this->otro_documento_session==null) {
			$this->otro_documento_session=new otro_documento_session();
		}
		
		/*FKs*/
		

		$this->con_archivosFK=false;
		$this->archivosFK=array();
		$this->idarchivoDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getotro_documento() : otro_documento {	
		return $this->otro_documento;
	}
		
	public function setotro_documento(otro_documento $newotro_documento) {
		$this->otro_documento = $newotro_documento;
	}
	
	public function getotro_documentos() : array {		
		return $this->otro_documentos;
	}
	
	public function setotro_documentos(array $newotro_documentos) {
		$this->otro_documentos = $newotro_documentos;
	}
	
	/*SESSION*/
	public function getotro_documento_session() : otro_documento_session {	
		return $this->otro_documento_session;
	}
		
	public function setotro_documento_session(otro_documento_session $newotro_documento_session) {
		$this->otro_documento_session = $newotro_documento_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
