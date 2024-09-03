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

namespace com\bydan\contabilidad\inventario\orden_compra_detalle\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\inventario\orden_compra_detalle\business\entity\orden_compra_detalle;

use com\bydan\contabilidad\inventario\orden_compra_detalle\presentation\session\orden_compra_detalle_session;

class orden_compra_detalle_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?orden_compra_detalle $orden_compra_detalle = null;	
	public ?array $orden_compra_detalles = array();
	
	/*SESSION*/
	public ?orden_compra_detalle_session $orden_compra_detalle_session = null;
	
	/*FKs*/
	

	public bool $con_orden_comprasFK=false;
	public array $orden_comprasFK=array();
	public int $idorden_compraDefaultFK=-1;

	public bool $con_bodegasFK=false;
	public array $bodegasFK=array();
	public int $idbodegaDefaultFK=-1;

	public bool $con_productosFK=false;
	public array $productosFK=array();
	public int $idproductoDefaultFK=-1;

	public bool $con_unidadsFK=false;
	public array $unidadsFK=array();
	public int $idunidadDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->orden_compra_detalles= array();
		$this->orden_compra_detalle= new orden_compra_detalle();
		
		/*SESSION*/
		$this->orden_compra_detalle_session=$this->Session->unserialize(orden_compra_detalle_util::$STR_SESSION_NAME);

		if($this->orden_compra_detalle_session==null) {
			$this->orden_compra_detalle_session=new orden_compra_detalle_session();
		}
		
		/*FKs*/
		

		$this->con_orden_comprasFK=false;
		$this->orden_comprasFK=array();
		$this->idorden_compraDefaultFK=-1;

		$this->con_bodegasFK=false;
		$this->bodegasFK=array();
		$this->idbodegaDefaultFK=-1;

		$this->con_productosFK=false;
		$this->productosFK=array();
		$this->idproductoDefaultFK=-1;

		$this->con_unidadsFK=false;
		$this->unidadsFK=array();
		$this->idunidadDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getorden_compra_detalle() : orden_compra_detalle {	
		return $this->orden_compra_detalle;
	}
		
	public function setorden_compra_detalle(orden_compra_detalle $neworden_compra_detalle) {
		$this->orden_compra_detalle = $neworden_compra_detalle;
	}
	
	public function getorden_compra_detalles() : array {		
		return $this->orden_compra_detalles;
	}
	
	public function setorden_compra_detalles(array $neworden_compra_detalles) {
		$this->orden_compra_detalles = $neworden_compra_detalles;
	}
	
	/*SESSION*/
	public function getorden_compra_detalle_session() : orden_compra_detalle_session {	
		return $this->orden_compra_detalle_session;
	}
		
	public function setorden_compra_detalle_session(orden_compra_detalle_session $neworden_compra_detalle_session) {
		$this->orden_compra_detalle_session = $neworden_compra_detalle_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
