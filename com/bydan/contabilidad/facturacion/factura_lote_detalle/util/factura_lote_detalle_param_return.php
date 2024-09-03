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

namespace com\bydan\contabilidad\facturacion\factura_lote_detalle\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\facturacion\factura_lote_detalle\business\entity\factura_lote_detalle;

use com\bydan\contabilidad\facturacion\factura_lote_detalle\presentation\session\factura_lote_detalle_session;

class factura_lote_detalle_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?factura_lote_detalle $factura_lote_detalle = null;	
	public ?array $factura_lote_detalles = array();
	
	/*SESSION*/
	public ?factura_lote_detalle_session $factura_lote_detalle_session = null;
	
	/*FKs*/
	

	public bool $con_factura_lotesFK=false;
	public array $factura_lotesFK=array();
	public int $idfactura_loteDefaultFK=-1;

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
		$this->factura_lote_detalles= array();
		$this->factura_lote_detalle= new factura_lote_detalle();
		
		/*SESSION*/
		$this->factura_lote_detalle_session=$this->Session->unserialize(factura_lote_detalle_util::$STR_SESSION_NAME);

		if($this->factura_lote_detalle_session==null) {
			$this->factura_lote_detalle_session=new factura_lote_detalle_session();
		}
		
		/*FKs*/
		

		$this->con_factura_lotesFK=false;
		$this->factura_lotesFK=array();
		$this->idfactura_loteDefaultFK=-1;

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
	public function getfactura_lote_detalle() : factura_lote_detalle {	
		return $this->factura_lote_detalle;
	}
		
	public function setfactura_lote_detalle(factura_lote_detalle $newfactura_lote_detalle) {
		$this->factura_lote_detalle = $newfactura_lote_detalle;
	}
	
	public function getfactura_lote_detalles() : array {		
		return $this->factura_lote_detalles;
	}
	
	public function setfactura_lote_detalles(array $newfactura_lote_detalles) {
		$this->factura_lote_detalles = $newfactura_lote_detalles;
	}
	
	/*SESSION*/
	public function getfactura_lote_detalle_session() : factura_lote_detalle_session {	
		return $this->factura_lote_detalle_session;
	}
		
	public function setfactura_lote_detalle_session(factura_lote_detalle_session $newfactura_lote_detalle_session) {
		$this->factura_lote_detalle_session = $newfactura_lote_detalle_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
