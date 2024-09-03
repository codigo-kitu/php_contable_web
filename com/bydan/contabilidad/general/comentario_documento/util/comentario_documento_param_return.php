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

namespace com\bydan\contabilidad\general\comentario_documento\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\general\comentario_documento\business\entity\comentario_documento;

use com\bydan\contabilidad\general\comentario_documento\presentation\session\comentario_documento_session;

class comentario_documento_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?comentario_documento $comentario_documento = null;	
	public ?array $comentario_documentos = array();
	
	/*SESSION*/
	public ?comentario_documento_session $comentario_documento_session = null;
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->comentario_documentos= array();
		$this->comentario_documento= new comentario_documento();
		
		/*SESSION*/
		$this->comentario_documento_session=$this->Session->unserialize(comentario_documento_util::$STR_SESSION_NAME);

		if($this->comentario_documento_session==null) {
			$this->comentario_documento_session=new comentario_documento_session();
		}
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function getcomentario_documento() : comentario_documento {	
		return $this->comentario_documento;
	}
		
	public function setcomentario_documento(comentario_documento $newcomentario_documento) {
		$this->comentario_documento = $newcomentario_documento;
	}
	
	public function getcomentario_documentos() : array {		
		return $this->comentario_documentos;
	}
	
	public function setcomentario_documentos(array $newcomentario_documentos) {
		$this->comentario_documentos = $newcomentario_documentos;
	}
	
	/*SESSION*/
	public function getcomentario_documento_session() : comentario_documento_session {	
		return $this->comentario_documento_session;
	}
		
	public function setcomentario_documento_session(comentario_documento_session $newcomentario_documento_session) {
		$this->comentario_documento_session = $newcomentario_documento_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
