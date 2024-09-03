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

namespace com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\business\entity\cuenta_corriente_detalle;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\presentation\session\cuenta_corriente_detalle_session;

class cuenta_corriente_detalle_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?cuenta_corriente_detalle $cuenta_corriente_detalle = null;	
	public ?array $cuenta_corriente_detalles = array();
	
	/*SESSION*/
	public ?cuenta_corriente_detalle_session $cuenta_corriente_detalle_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;

	public bool $con_ejerciciosFK=false;
	public array $ejerciciosFK=array();
	public int $idejercicioDefaultFK=-1;

	public bool $con_periodosFK=false;
	public array $periodosFK=array();
	public int $idperiodoDefaultFK=-1;

	public bool $con_usuariosFK=false;
	public array $usuariosFK=array();
	public int $idusuarioDefaultFK=-1;

	public bool $con_cuenta_corrientesFK=false;
	public array $cuenta_corrientesFK=array();
	public int $idcuenta_corrienteDefaultFK=-1;

	public bool $con_clientesFK=false;
	public array $clientesFK=array();
	public int $idclienteDefaultFK=-1;

	public bool $con_proveedorsFK=false;
	public array $proveedorsFK=array();
	public int $idproveedorDefaultFK=-1;

	public bool $con_tablasFK=false;
	public array $tablasFK=array();
	public int $idtablaDefaultFK=-1;

	public bool $con_estadosFK=false;
	public array $estadosFK=array();
	public int $idestadoDefaultFK=-1;

	public bool $con_asientosFK=false;
	public array $asientosFK=array();
	public int $idasientoDefaultFK=-1;

	public bool $con_cuenta_pagarsFK=false;
	public array $cuenta_pagarsFK=array();
	public int $idcuenta_pagarDefaultFK=-1;

	public bool $con_cuenta_cobrarsFK=false;
	public array $cuenta_cobrarsFK=array();
	public int $idcuenta_cobrarDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->cuenta_corriente_detalles= array();
		$this->cuenta_corriente_detalle= new cuenta_corriente_detalle();
		
		/*SESSION*/
		$this->cuenta_corriente_detalle_session=$this->Session->unserialize(cuenta_corriente_detalle_util::$STR_SESSION_NAME);

		if($this->cuenta_corriente_detalle_session==null) {
			$this->cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;

		$this->con_ejerciciosFK=false;
		$this->ejerciciosFK=array();
		$this->idejercicioDefaultFK=-1;

		$this->con_periodosFK=false;
		$this->periodosFK=array();
		$this->idperiodoDefaultFK=-1;

		$this->con_usuariosFK=false;
		$this->usuariosFK=array();
		$this->idusuarioDefaultFK=-1;

		$this->con_cuenta_corrientesFK=false;
		$this->cuenta_corrientesFK=array();
		$this->idcuenta_corrienteDefaultFK=-1;

		$this->con_clientesFK=false;
		$this->clientesFK=array();
		$this->idclienteDefaultFK=-1;

		$this->con_proveedorsFK=false;
		$this->proveedorsFK=array();
		$this->idproveedorDefaultFK=-1;

		$this->con_tablasFK=false;
		$this->tablasFK=array();
		$this->idtablaDefaultFK=-1;

		$this->con_estadosFK=false;
		$this->estadosFK=array();
		$this->idestadoDefaultFK=-1;

		$this->con_asientosFK=false;
		$this->asientosFK=array();
		$this->idasientoDefaultFK=-1;

		$this->con_cuenta_pagarsFK=false;
		$this->cuenta_pagarsFK=array();
		$this->idcuenta_pagarDefaultFK=-1;

		$this->con_cuenta_cobrarsFK=false;
		$this->cuenta_cobrarsFK=array();
		$this->idcuenta_cobrarDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getcuenta_corriente_detalle() : cuenta_corriente_detalle {	
		return $this->cuenta_corriente_detalle;
	}
		
	public function setcuenta_corriente_detalle(cuenta_corriente_detalle $newcuenta_corriente_detalle) {
		$this->cuenta_corriente_detalle = $newcuenta_corriente_detalle;
	}
	
	public function getcuenta_corriente_detalles() : array {		
		return $this->cuenta_corriente_detalles;
	}
	
	public function setcuenta_corriente_detalles(array $newcuenta_corriente_detalles) {
		$this->cuenta_corriente_detalles = $newcuenta_corriente_detalles;
	}
	
	/*SESSION*/
	public function getcuenta_corriente_detalle_session() : cuenta_corriente_detalle_session {	
		return $this->cuenta_corriente_detalle_session;
	}
		
	public function setcuenta_corriente_detalle_session(cuenta_corriente_detalle_session $newcuenta_corriente_detalle_session) {
		$this->cuenta_corriente_detalle_session = $newcuenta_corriente_detalle_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
