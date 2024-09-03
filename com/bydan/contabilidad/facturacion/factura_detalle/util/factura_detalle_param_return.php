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

namespace com\bydan\contabilidad\facturacion\factura_detalle\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\facturacion\factura_detalle\business\entity\factura_detalle;

use com\bydan\contabilidad\facturacion\factura_detalle\presentation\session\factura_detalle_session;

class factura_detalle_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?factura_detalle $factura_detalle = null;	
	public ?array $factura_detalles = array();
	
	/*SESSION*/
	public ?factura_detalle_session $factura_detalle_session = null;
	
	/*FKs*/
	

	public bool $con_facturasFK=false;
	public array $facturasFK=array();
	public int $idfacturaDefaultFK=-1;

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
		$this->factura_detalles= array();
		$this->factura_detalle= new factura_detalle();
		
		/*SESSION*/
		$this->factura_detalle_session=$this->Session->unserialize(factura_detalle_util::$STR_SESSION_NAME);

		if($this->factura_detalle_session==null) {
			$this->factura_detalle_session=new factura_detalle_session();
		}
		
		/*FKs*/
		

		$this->con_facturasFK=false;
		$this->facturasFK=array();
		$this->idfacturaDefaultFK=-1;

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
	public function getfactura_detalle() : factura_detalle {	
		return $this->factura_detalle;
	}
		
	public function setfactura_detalle(factura_detalle $newfactura_detalle) {
		$this->factura_detalle = $newfactura_detalle;
	}
	
	public function getfactura_detalles() : array {		
		return $this->factura_detalles;
	}
	
	public function setfactura_detalles(array $newfactura_detalles) {
		$this->factura_detalles = $newfactura_detalles;
	}
	
	/*SESSION*/
	public function getfactura_detalle_session() : factura_detalle_session {	
		return $this->factura_detalle_session;
	}
		
	public function setfactura_detalle_session(factura_detalle_session $newfactura_detalle_session) {
		$this->factura_detalle_session = $newfactura_detalle_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
