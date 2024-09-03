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

namespace com\bydan\contabilidad\contabilidad\asiento_detalle\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\contabilidad\asiento_detalle\business\entity\asiento_detalle;

use com\bydan\contabilidad\contabilidad\asiento_detalle\presentation\session\asiento_detalle_session;

class asiento_detalle_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?asiento_detalle $asiento_detalle = null;	
	public ?array $asiento_detalles = array();
	
	/*SESSION*/
	public ?asiento_detalle_session $asiento_detalle_session = null;
	
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

	public bool $con_asientosFK=false;
	public array $asientosFK=array();
	public int $idasientoDefaultFK=-1;

	public bool $con_cuentasFK=false;
	public array $cuentasFK=array();
	public int $idcuentaDefaultFK=-1;

	public bool $con_centro_costosFK=false;
	public array $centro_costosFK=array();
	public int $idcentro_costoDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->asiento_detalles= array();
		$this->asiento_detalle= new asiento_detalle();
		
		/*SESSION*/
		$this->asiento_detalle_session=$this->Session->unserialize(asiento_detalle_util::$STR_SESSION_NAME);

		if($this->asiento_detalle_session==null) {
			$this->asiento_detalle_session=new asiento_detalle_session();
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

		$this->con_asientosFK=false;
		$this->asientosFK=array();
		$this->idasientoDefaultFK=-1;

		$this->con_cuentasFK=false;
		$this->cuentasFK=array();
		$this->idcuentaDefaultFK=-1;

		$this->con_centro_costosFK=false;
		$this->centro_costosFK=array();
		$this->idcentro_costoDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getasiento_detalle() : asiento_detalle {	
		return $this->asiento_detalle;
	}
		
	public function setasiento_detalle(asiento_detalle $newasiento_detalle) {
		$this->asiento_detalle = $newasiento_detalle;
	}
	
	public function getasiento_detalles() : array {		
		return $this->asiento_detalles;
	}
	
	public function setasiento_detalles(array $newasiento_detalles) {
		$this->asiento_detalles = $newasiento_detalles;
	}
	
	/*SESSION*/
	public function getasiento_detalle_session() : asiento_detalle_session {	
		return $this->asiento_detalle_session;
	}
		
	public function setasiento_detalle_session(asiento_detalle_session $newasiento_detalle_session) {
		$this->asiento_detalle_session = $newasiento_detalle_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
