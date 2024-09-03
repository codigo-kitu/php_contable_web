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

namespace com\bydan\contabilidad\inventario\orden_compra\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\inventario\orden_compra\business\entity\orden_compra;

use com\bydan\contabilidad\inventario\orden_compra\presentation\session\orden_compra_session;

class orden_compra_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?orden_compra $orden_compra = null;	
	public ?array $orden_compras = array();
	
	/*SESSION*/
	public ?orden_compra_session $orden_compra_session = null;
	
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

	public bool $con_asientosFK=false;
	public array $asientosFK=array();
	public int $idasientoDefaultFK=-1;

	public bool $con_documento_cuenta_pagarsFK=false;
	public array $documento_cuenta_pagarsFK=array();
	public int $iddocumento_cuenta_pagarDefaultFK=-1;

	public bool $con_kardexsFK=false;
	public array $kardexsFK=array();
	public int $idkardexDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->orden_compras= array();
		$this->orden_compra= new orden_compra();
		
		/*SESSION*/
		$this->orden_compra_session=$this->Session->unserialize(orden_compra_util::$STR_SESSION_NAME);

		if($this->orden_compra_session==null) {
			$this->orden_compra_session=new orden_compra_session();
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

		$this->con_asientosFK=false;
		$this->asientosFK=array();
		$this->idasientoDefaultFK=-1;

		$this->con_documento_cuenta_pagarsFK=false;
		$this->documento_cuenta_pagarsFK=array();
		$this->iddocumento_cuenta_pagarDefaultFK=-1;

		$this->con_kardexsFK=false;
		$this->kardexsFK=array();
		$this->idkardexDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getorden_compra() : orden_compra {	
		return $this->orden_compra;
	}
		
	public function setorden_compra(orden_compra $neworden_compra) {
		$this->orden_compra = $neworden_compra;
	}
	
	public function getorden_compras() : array {		
		return $this->orden_compras;
	}
	
	public function setorden_compras(array $neworden_compras) {
		$this->orden_compras = $neworden_compras;
	}
	
	/*SESSION*/
	public function getorden_compra_session() : orden_compra_session {	
		return $this->orden_compra_session;
	}
		
	public function setorden_compra_session(orden_compra_session $neworden_compra_session) {
		$this->orden_compra_session = $neworden_compra_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
