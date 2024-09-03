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

namespace com\bydan\contabilidad\inventario\cotizacion\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\inventario\cotizacion\business\entity\cotizacion;

use com\bydan\contabilidad\inventario\cotizacion\presentation\session\cotizacion_session;

class cotizacion_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?cotizacion $cotizacion = null;	
	public ?array $cotizacions = array();
	
	/*SESSION*/
	public ?cotizacion_session $cotizacion_session = null;
	
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

	public bool $con_vendedorsFK=false;
	public array $vendedorsFK=array();
	public int $idvendedorDefaultFK=-1;

	public bool $con_termino_pago_proveedorsFK=false;
	public array $termino_pago_proveedorsFK=array();
	public int $idtermino_pago_proveedorDefaultFK=-1;

	public bool $con_monedasFK=false;
	public array $monedasFK=array();
	public int $idmonedaDefaultFK=-1;

	public bool $con_estadosFK=false;
	public array $estadosFK=array();
	public int $idestadoDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->cotizacions= array();
		$this->cotizacion= new cotizacion();
		
		/*SESSION*/
		$this->cotizacion_session=$this->Session->unserialize(cotizacion_util::$STR_SESSION_NAME);

		if($this->cotizacion_session==null) {
			$this->cotizacion_session=new cotizacion_session();
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

		$this->con_vendedorsFK=false;
		$this->vendedorsFK=array();
		$this->idvendedorDefaultFK=-1;

		$this->con_termino_pago_proveedorsFK=false;
		$this->termino_pago_proveedorsFK=array();
		$this->idtermino_pago_proveedorDefaultFK=-1;

		$this->con_monedasFK=false;
		$this->monedasFK=array();
		$this->idmonedaDefaultFK=-1;

		$this->con_estadosFK=false;
		$this->estadosFK=array();
		$this->idestadoDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getcotizacion() : cotizacion {	
		return $this->cotizacion;
	}
		
	public function setcotizacion(cotizacion $newcotizacion) {
		$this->cotizacion = $newcotizacion;
	}
	
	public function getcotizacions() : array {		
		return $this->cotizacions;
	}
	
	public function setcotizacions(array $newcotizacions) {
		$this->cotizacions = $newcotizacions;
	}
	
	/*SESSION*/
	public function getcotizacion_session() : cotizacion_session {	
		return $this->cotizacion_session;
	}
		
	public function setcotizacion_session(cotizacion_session $newcotizacion_session) {
		$this->cotizacion_session = $newcotizacion_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
