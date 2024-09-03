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

namespace com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\business\entity\imagen_documento_cuenta_pagar;

use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\presentation\session\imagen_documento_cuenta_pagar_session;

class imagen_documento_cuenta_pagar_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?imagen_documento_cuenta_pagar $imagen_documento_cuenta_pagar = null;	
	public ?array $imagen_documento_cuenta_pagars = array();
	
	/*SESSION*/
	public ?imagen_documento_cuenta_pagar_session $imagen_documento_cuenta_pagar_session = null;
	
	/*FKs*/
	

	public bool $con_documento_cuenta_pagarsFK=false;
	public array $documento_cuenta_pagarsFK=array();
	public int $iddocumento_cuenta_pagarDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->imagen_documento_cuenta_pagars= array();
		$this->imagen_documento_cuenta_pagar= new imagen_documento_cuenta_pagar();
		
		/*SESSION*/
		$this->imagen_documento_cuenta_pagar_session=$this->Session->unserialize(imagen_documento_cuenta_pagar_util::$STR_SESSION_NAME);

		if($this->imagen_documento_cuenta_pagar_session==null) {
			$this->imagen_documento_cuenta_pagar_session=new imagen_documento_cuenta_pagar_session();
		}
		
		/*FKs*/
		

		$this->con_documento_cuenta_pagarsFK=false;
		$this->documento_cuenta_pagarsFK=array();
		$this->iddocumento_cuenta_pagarDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getimagen_documento_cuenta_pagar() : imagen_documento_cuenta_pagar {	
		return $this->imagen_documento_cuenta_pagar;
	}
		
	public function setimagen_documento_cuenta_pagar(imagen_documento_cuenta_pagar $newimagen_documento_cuenta_pagar) {
		$this->imagen_documento_cuenta_pagar = $newimagen_documento_cuenta_pagar;
	}
	
	public function getimagen_documento_cuenta_pagars() : array {		
		return $this->imagen_documento_cuenta_pagars;
	}
	
	public function setimagen_documento_cuenta_pagars(array $newimagen_documento_cuenta_pagars) {
		$this->imagen_documento_cuenta_pagars = $newimagen_documento_cuenta_pagars;
	}
	
	/*SESSION*/
	public function getimagen_documento_cuenta_pagar_session() : imagen_documento_cuenta_pagar_session {	
		return $this->imagen_documento_cuenta_pagar_session;
	}
		
	public function setimagen_documento_cuenta_pagar_session(imagen_documento_cuenta_pagar_session $newimagen_documento_cuenta_pagar_session) {
		$this->imagen_documento_cuenta_pagar_session = $newimagen_documento_cuenta_pagar_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
