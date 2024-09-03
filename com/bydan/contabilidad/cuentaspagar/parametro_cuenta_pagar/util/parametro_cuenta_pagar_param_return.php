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

namespace com\bydan\contabilidad\cuentaspagar\parametro_cuenta_pagar\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\cuentaspagar\parametro_cuenta_pagar\business\entity\parametro_cuenta_pagar;

use com\bydan\contabilidad\cuentaspagar\parametro_cuenta_pagar\presentation\session\parametro_cuenta_pagar_session;

class parametro_cuenta_pagar_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?parametro_cuenta_pagar $parametro_cuenta_pagar = null;	
	public ?array $parametro_cuenta_pagars = array();
	
	/*SESSION*/
	public ?parametro_cuenta_pagar_session $parametro_cuenta_pagar_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->parametro_cuenta_pagars= array();
		$this->parametro_cuenta_pagar= new parametro_cuenta_pagar();
		
		/*SESSION*/
		$this->parametro_cuenta_pagar_session=$this->Session->unserialize(parametro_cuenta_pagar_util::$STR_SESSION_NAME);

		if($this->parametro_cuenta_pagar_session==null) {
			$this->parametro_cuenta_pagar_session=new parametro_cuenta_pagar_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getparametro_cuenta_pagar() : parametro_cuenta_pagar {	
		return $this->parametro_cuenta_pagar;
	}
		
	public function setparametro_cuenta_pagar(parametro_cuenta_pagar $newparametro_cuenta_pagar) {
		$this->parametro_cuenta_pagar = $newparametro_cuenta_pagar;
	}
	
	public function getparametro_cuenta_pagars() : array {		
		return $this->parametro_cuenta_pagars;
	}
	
	public function setparametro_cuenta_pagars(array $newparametro_cuenta_pagars) {
		$this->parametro_cuenta_pagars = $newparametro_cuenta_pagars;
	}
	
	/*SESSION*/
	public function getparametro_cuenta_pagar_session() : parametro_cuenta_pagar_session {	
		return $this->parametro_cuenta_pagar_session;
	}
		
	public function setparametro_cuenta_pagar_session(parametro_cuenta_pagar_session $newparametro_cuenta_pagar_session) {
		$this->parametro_cuenta_pagar_session = $newparametro_cuenta_pagar_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
