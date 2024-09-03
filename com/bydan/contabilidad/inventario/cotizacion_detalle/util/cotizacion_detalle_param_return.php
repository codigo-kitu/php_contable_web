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

namespace com\bydan\contabilidad\inventario\cotizacion_detalle\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\inventario\cotizacion_detalle\business\entity\cotizacion_detalle;

use com\bydan\contabilidad\inventario\cotizacion_detalle\presentation\session\cotizacion_detalle_session;

class cotizacion_detalle_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?cotizacion_detalle $cotizacion_detalle = null;	
	public ?array $cotizacion_detalles = array();
	
	/*SESSION*/
	public ?cotizacion_detalle_session $cotizacion_detalle_session = null;
	
	/*FKs*/
	

	public bool $con_cotizacionsFK=false;
	public array $cotizacionsFK=array();
	public int $idcotizacionDefaultFK=-1;

	public bool $con_bodegasFK=false;
	public array $bodegasFK=array();
	public int $idbodegaDefaultFK=-1;

	public bool $con_productosFK=false;
	public array $productosFK=array();
	public int $idproductoDefaultFK=-1;

	public bool $con_unidadsFK=false;
	public array $unidadsFK=array();
	public int $idunidadDefaultFK=-1;

	public bool $con_otro_suplidorsFK=false;
	public array $otro_suplidorsFK=array();
	public int $idotro_suplidorDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->cotizacion_detalles= array();
		$this->cotizacion_detalle= new cotizacion_detalle();
		
		/*SESSION*/
		$this->cotizacion_detalle_session=$this->Session->unserialize(cotizacion_detalle_util::$STR_SESSION_NAME);

		if($this->cotizacion_detalle_session==null) {
			$this->cotizacion_detalle_session=new cotizacion_detalle_session();
		}
		
		/*FKs*/
		

		$this->con_cotizacionsFK=false;
		$this->cotizacionsFK=array();
		$this->idcotizacionDefaultFK=-1;

		$this->con_bodegasFK=false;
		$this->bodegasFK=array();
		$this->idbodegaDefaultFK=-1;

		$this->con_productosFK=false;
		$this->productosFK=array();
		$this->idproductoDefaultFK=-1;

		$this->con_unidadsFK=false;
		$this->unidadsFK=array();
		$this->idunidadDefaultFK=-1;

		$this->con_otro_suplidorsFK=false;
		$this->otro_suplidorsFK=array();
		$this->idotro_suplidorDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getcotizacion_detalle() : cotizacion_detalle {	
		return $this->cotizacion_detalle;
	}
		
	public function setcotizacion_detalle(cotizacion_detalle $newcotizacion_detalle) {
		$this->cotizacion_detalle = $newcotizacion_detalle;
	}
	
	public function getcotizacion_detalles() : array {		
		return $this->cotizacion_detalles;
	}
	
	public function setcotizacion_detalles(array $newcotizacion_detalles) {
		$this->cotizacion_detalles = $newcotizacion_detalles;
	}
	
	/*SESSION*/
	public function getcotizacion_detalle_session() : cotizacion_detalle_session {	
		return $this->cotizacion_detalle_session;
	}
		
	public function setcotizacion_detalle_session(cotizacion_detalle_session $newcotizacion_detalle_session) {
		$this->cotizacion_detalle_session = $newcotizacion_detalle_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
