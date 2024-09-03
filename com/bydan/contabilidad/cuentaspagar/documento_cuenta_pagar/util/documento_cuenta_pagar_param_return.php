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

namespace com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\business\entity\documento_cuenta_pagar;

use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\presentation\session\documento_cuenta_pagar_session;

class documento_cuenta_pagar_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?documento_cuenta_pagar $documento_cuenta_pagar = null;	
	public ?array $documento_cuenta_pagars = array();
	
	/*SESSION*/
	public ?documento_cuenta_pagar_session $documento_cuenta_pagar_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;

	public bool $con_sucursalsFK=false;
	public array $sucursalsFK=array();
	public int $idsucursalDefaultFK=-1;

	public bool $con_ejerciciosFK=false;
	public array $ejerciciosFK=array();
	public int $idejercicioDefaultFK=-1;

	public bool $con_periodosFK=false;
	public array $periodosFK=array();
	public int $idperiodoDefaultFK=-1;

	public bool $con_usuariosFK=false;
	public array $usuariosFK=array();
	public int $idusuarioDefaultFK=-1;

	public bool $con_proveedorsFK=false;
	public array $proveedorsFK=array();
	public int $idproveedorDefaultFK=-1;

	public bool $con_forma_pago_proveedorsFK=false;
	public array $forma_pago_proveedorsFK=array();
	public int $idforma_pago_proveedorDefaultFK=-1;

	public bool $con_cuenta_corrientesFK=false;
	public array $cuenta_corrientesFK=array();
	public int $idcuenta_corrienteDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->documento_cuenta_pagars= array();
		$this->documento_cuenta_pagar= new documento_cuenta_pagar();
		
		/*SESSION*/
		$this->documento_cuenta_pagar_session=$this->Session->unserialize(documento_cuenta_pagar_util::$STR_SESSION_NAME);

		if($this->documento_cuenta_pagar_session==null) {
			$this->documento_cuenta_pagar_session=new documento_cuenta_pagar_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;

		$this->con_sucursalsFK=false;
		$this->sucursalsFK=array();
		$this->idsucursalDefaultFK=-1;

		$this->con_ejerciciosFK=false;
		$this->ejerciciosFK=array();
		$this->idejercicioDefaultFK=-1;

		$this->con_periodosFK=false;
		$this->periodosFK=array();
		$this->idperiodoDefaultFK=-1;

		$this->con_usuariosFK=false;
		$this->usuariosFK=array();
		$this->idusuarioDefaultFK=-1;

		$this->con_proveedorsFK=false;
		$this->proveedorsFK=array();
		$this->idproveedorDefaultFK=-1;

		$this->con_forma_pago_proveedorsFK=false;
		$this->forma_pago_proveedorsFK=array();
		$this->idforma_pago_proveedorDefaultFK=-1;

		$this->con_cuenta_corrientesFK=false;
		$this->cuenta_corrientesFK=array();
		$this->idcuenta_corrienteDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getdocumento_cuenta_pagar() : documento_cuenta_pagar {	
		return $this->documento_cuenta_pagar;
	}
		
	public function setdocumento_cuenta_pagar(documento_cuenta_pagar $newdocumento_cuenta_pagar) {
		$this->documento_cuenta_pagar = $newdocumento_cuenta_pagar;
	}
	
	public function getdocumento_cuenta_pagars() : array {		
		return $this->documento_cuenta_pagars;
	}
	
	public function setdocumento_cuenta_pagars(array $newdocumento_cuenta_pagars) {
		$this->documento_cuenta_pagars = $newdocumento_cuenta_pagars;
	}
	
	/*SESSION*/
	public function getdocumento_cuenta_pagar_session() : documento_cuenta_pagar_session {	
		return $this->documento_cuenta_pagar_session;
	}
		
	public function setdocumento_cuenta_pagar_session(documento_cuenta_pagar_session $newdocumento_cuenta_pagar_session) {
		$this->documento_cuenta_pagar_session = $newdocumento_cuenta_pagar_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
