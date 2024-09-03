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

namespace com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\business\entity\imagen_documento_cuenta_cobrar;

use com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\presentation\session\imagen_documento_cuenta_cobrar_session;

class imagen_documento_cuenta_cobrar_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?imagen_documento_cuenta_cobrar $imagen_documento_cuenta_cobrar = null;	
	public ?array $imagen_documento_cuenta_cobrars = array();
	
	/*SESSION*/
	public ?imagen_documento_cuenta_cobrar_session $imagen_documento_cuenta_cobrar_session = null;
	
	/*FKs*/
	

	public bool $con_documento_cuenta_cobrarsFK=false;
	public array $documento_cuenta_cobrarsFK=array();
	public int $iddocumento_cuenta_cobrarDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->imagen_documento_cuenta_cobrars= array();
		$this->imagen_documento_cuenta_cobrar= new imagen_documento_cuenta_cobrar();
		
		/*SESSION*/
		$this->imagen_documento_cuenta_cobrar_session=$this->Session->unserialize(imagen_documento_cuenta_cobrar_util::$STR_SESSION_NAME);

		if($this->imagen_documento_cuenta_cobrar_session==null) {
			$this->imagen_documento_cuenta_cobrar_session=new imagen_documento_cuenta_cobrar_session();
		}
		
		/*FKs*/
		

		$this->con_documento_cuenta_cobrarsFK=false;
		$this->documento_cuenta_cobrarsFK=array();
		$this->iddocumento_cuenta_cobrarDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getimagen_documento_cuenta_cobrar() : imagen_documento_cuenta_cobrar {	
		return $this->imagen_documento_cuenta_cobrar;
	}
		
	public function setimagen_documento_cuenta_cobrar(imagen_documento_cuenta_cobrar $newimagen_documento_cuenta_cobrar) {
		$this->imagen_documento_cuenta_cobrar = $newimagen_documento_cuenta_cobrar;
	}
	
	public function getimagen_documento_cuenta_cobrars() : array {		
		return $this->imagen_documento_cuenta_cobrars;
	}
	
	public function setimagen_documento_cuenta_cobrars(array $newimagen_documento_cuenta_cobrars) {
		$this->imagen_documento_cuenta_cobrars = $newimagen_documento_cuenta_cobrars;
	}
	
	/*SESSION*/
	public function getimagen_documento_cuenta_cobrar_session() : imagen_documento_cuenta_cobrar_session {	
		return $this->imagen_documento_cuenta_cobrar_session;
	}
		
	public function setimagen_documento_cuenta_cobrar_session(imagen_documento_cuenta_cobrar_session $newimagen_documento_cuenta_cobrar_session) {
		$this->imagen_documento_cuenta_cobrar_session = $newimagen_documento_cuenta_cobrar_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
