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

namespace com\bydan\contabilidad\seguridad\campo\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\seguridad\campo\business\entity\campo;

use com\bydan\contabilidad\seguridad\campo\presentation\session\campo_session;

class campo_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?campo $campo = null;	
	public ?array $campos = array();
	
	/*SESSION*/
	public ?campo_session $campo_session = null;
	
	/*FKs*/
	

	public bool $con_opcionsFK=false;
	public array $opcionsFK=array();
	public int $idopcionDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->campos= array();
		$this->campo= new campo();
		
		/*SESSION*/
		$this->campo_session=$this->Session->unserialize(campo_util::$STR_SESSION_NAME);

		if($this->campo_session==null) {
			$this->campo_session=new campo_session();
		}
		
		/*FKs*/
		

		$this->con_opcionsFK=false;
		$this->opcionsFK=array();
		$this->idopcionDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getcampo() : campo {	
		return $this->campo;
	}
		
	public function setcampo(campo $newcampo) {
		$this->campo = $newcampo;
	}
	
	public function getcampos() : array {		
		return $this->campos;
	}
	
	public function setcampos(array $newcampos) {
		$this->campos = $newcampos;
	}
	
	/*SESSION*/
	public function getcampo_session() : campo_session {	
		return $this->campo_session;
	}
		
	public function setcampo_session(campo_session $newcampo_session) {
		$this->campo_session = $newcampo_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
