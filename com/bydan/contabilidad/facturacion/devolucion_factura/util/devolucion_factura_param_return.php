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

namespace com\bydan\contabilidad\facturacion\devolucion_factura\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\facturacion\devolucion_factura\business\entity\devolucion_factura;

use com\bydan\contabilidad\facturacion\devolucion_factura\presentation\session\devolucion_factura_session;

class devolucion_factura_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?devolucion_factura $devolucion_factura = null;	
	public ?array $devolucion_facturas = array();
	
	/*SESSION*/
	public ?devolucion_factura_session $devolucion_factura_session = null;
	
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

	public bool $con_asientosFK=false;
	public array $asientosFK=array();
	public int $idasientoDefaultFK=-1;

	public bool $con_documento_cuenta_cobrarsFK=false;
	public array $documento_cuenta_cobrarsFK=array();
	public int $iddocumento_cuenta_cobrarDefaultFK=-1;

	public bool $con_kardexsFK=false;
	public array $kardexsFK=array();
	public int $idkardexDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->devolucion_facturas= array();
		$this->devolucion_factura= new devolucion_factura();
		
		/*SESSION*/
		$this->devolucion_factura_session=$this->Session->unserialize(devolucion_factura_util::$STR_SESSION_NAME);

		if($this->devolucion_factura_session==null) {
			$this->devolucion_factura_session=new devolucion_factura_session();
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

		$this->con_asientosFK=false;
		$this->asientosFK=array();
		$this->idasientoDefaultFK=-1;

		$this->con_documento_cuenta_cobrarsFK=false;
		$this->documento_cuenta_cobrarsFK=array();
		$this->iddocumento_cuenta_cobrarDefaultFK=-1;

		$this->con_kardexsFK=false;
		$this->kardexsFK=array();
		$this->idkardexDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getdevolucion_factura() : devolucion_factura {	
		return $this->devolucion_factura;
	}
		
	public function setdevolucion_factura(devolucion_factura $newdevolucion_factura) {
		$this->devolucion_factura = $newdevolucion_factura;
	}
	
	public function getdevolucion_facturas() : array {		
		return $this->devolucion_facturas;
	}
	
	public function setdevolucion_facturas(array $newdevolucion_facturas) {
		$this->devolucion_facturas = $newdevolucion_facturas;
	}
	
	/*SESSION*/
	public function getdevolucion_factura_session() : devolucion_factura_session {	
		return $this->devolucion_factura_session;
	}
		
	public function setdevolucion_factura_session(devolucion_factura_session $newdevolucion_factura_session) {
		$this->devolucion_factura_session = $newdevolucion_factura_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
