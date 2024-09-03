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

namespace com\bydan\contabilidad\estimados\consignacion\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\estimados\consignacion\business\entity\consignacion;

use com\bydan\contabilidad\estimados\consignacion\presentation\session\consignacion_session;

class consignacion_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?consignacion $consignacion = null;	
	public ?array $consignacions = array();
	
	/*SESSION*/
	public ?consignacion_session $consignacion_session = null;
	
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

	public bool $con_clientesFK=false;
	public array $clientesFK=array();
	public int $idclienteDefaultFK=-1;

	public bool $con_vendedorsFK=false;
	public array $vendedorsFK=array();
	public int $idvendedorDefaultFK=-1;

	public bool $con_termino_pago_clientesFK=false;
	public array $termino_pago_clientesFK=array();
	public int $idtermino_pago_clienteDefaultFK=-1;

	public bool $con_monedasFK=false;
	public array $monedasFK=array();
	public int $idmonedaDefaultFK=-1;

	public bool $con_estadosFK=false;
	public array $estadosFK=array();
	public int $idestadoDefaultFK=-1;

	public bool $con_kardexsFK=false;
	public array $kardexsFK=array();
	public int $idkardexDefaultFK=-1;

	public bool $con_asientosFK=false;
	public array $asientosFK=array();
	public int $idasientoDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->consignacions= array();
		$this->consignacion= new consignacion();
		
		/*SESSION*/
		$this->consignacion_session=$this->Session->unserialize(consignacion_util::$STR_SESSION_NAME);

		if($this->consignacion_session==null) {
			$this->consignacion_session=new consignacion_session();
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

		$this->con_clientesFK=false;
		$this->clientesFK=array();
		$this->idclienteDefaultFK=-1;

		$this->con_vendedorsFK=false;
		$this->vendedorsFK=array();
		$this->idvendedorDefaultFK=-1;

		$this->con_termino_pago_clientesFK=false;
		$this->termino_pago_clientesFK=array();
		$this->idtermino_pago_clienteDefaultFK=-1;

		$this->con_monedasFK=false;
		$this->monedasFK=array();
		$this->idmonedaDefaultFK=-1;

		$this->con_estadosFK=false;
		$this->estadosFK=array();
		$this->idestadoDefaultFK=-1;

		$this->con_kardexsFK=false;
		$this->kardexsFK=array();
		$this->idkardexDefaultFK=-1;

		$this->con_asientosFK=false;
		$this->asientosFK=array();
		$this->idasientoDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getconsignacion() : consignacion {	
		return $this->consignacion;
	}
		
	public function setconsignacion(consignacion $newconsignacion) {
		$this->consignacion = $newconsignacion;
	}
	
	public function getconsignacions() : array {		
		return $this->consignacions;
	}
	
	public function setconsignacions(array $newconsignacions) {
		$this->consignacions = $newconsignacions;
	}
	
	/*SESSION*/
	public function getconsignacion_session() : consignacion_session {	
		return $this->consignacion_session;
	}
		
	public function setconsignacion_session(consignacion_session $newconsignacion_session) {
		$this->consignacion_session = $newconsignacion_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
