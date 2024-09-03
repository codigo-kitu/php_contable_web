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

namespace com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\business\entity\credito_cuenta_pagar;

use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\presentation\session\credito_cuenta_pagar_session;

class credito_cuenta_pagar_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?credito_cuenta_pagar $credito_cuenta_pagar = null;	
	public ?array $credito_cuenta_pagars = array();
	
	/*SESSION*/
	public ?credito_cuenta_pagar_session $credito_cuenta_pagar_session = null;
	
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

	public bool $con_cuenta_pagarsFK=false;
	public array $cuenta_pagarsFK=array();
	public int $idcuenta_pagarDefaultFK=-1;

	public bool $con_termino_pago_proveedorsFK=false;
	public array $termino_pago_proveedorsFK=array();
	public int $idtermino_pago_proveedorDefaultFK=-1;

	public bool $con_estadosFK=false;
	public array $estadosFK=array();
	public int $idestadoDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->credito_cuenta_pagars= array();
		$this->credito_cuenta_pagar= new credito_cuenta_pagar();
		
		/*SESSION*/
		$this->credito_cuenta_pagar_session=$this->Session->unserialize(credito_cuenta_pagar_util::$STR_SESSION_NAME);

		if($this->credito_cuenta_pagar_session==null) {
			$this->credito_cuenta_pagar_session=new credito_cuenta_pagar_session();
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

		$this->con_cuenta_pagarsFK=false;
		$this->cuenta_pagarsFK=array();
		$this->idcuenta_pagarDefaultFK=-1;

		$this->con_termino_pago_proveedorsFK=false;
		$this->termino_pago_proveedorsFK=array();
		$this->idtermino_pago_proveedorDefaultFK=-1;

		$this->con_estadosFK=false;
		$this->estadosFK=array();
		$this->idestadoDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getcredito_cuenta_pagar() : credito_cuenta_pagar {	
		return $this->credito_cuenta_pagar;
	}
		
	public function setcredito_cuenta_pagar(credito_cuenta_pagar $newcredito_cuenta_pagar) {
		$this->credito_cuenta_pagar = $newcredito_cuenta_pagar;
	}
	
	public function getcredito_cuenta_pagars() : array {		
		return $this->credito_cuenta_pagars;
	}
	
	public function setcredito_cuenta_pagars(array $newcredito_cuenta_pagars) {
		$this->credito_cuenta_pagars = $newcredito_cuenta_pagars;
	}
	
	/*SESSION*/
	public function getcredito_cuenta_pagar_session() : credito_cuenta_pagar_session {	
		return $this->credito_cuenta_pagar_session;
	}
		
	public function setcredito_cuenta_pagar_session(credito_cuenta_pagar_session $newcredito_cuenta_pagar_session) {
		$this->credito_cuenta_pagar_session = $newcredito_cuenta_pagar_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
