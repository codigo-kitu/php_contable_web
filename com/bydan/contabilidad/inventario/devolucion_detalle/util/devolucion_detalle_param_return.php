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

namespace com\bydan\contabilidad\inventario\devolucion_detalle\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\inventario\devolucion_detalle\business\entity\devolucion_detalle;

use com\bydan\contabilidad\inventario\devolucion_detalle\presentation\session\devolucion_detalle_session;

class devolucion_detalle_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?devolucion_detalle $devolucion_detalle = null;	
	public ?array $devolucion_detalles = array();
	
	/*SESSION*/
	public ?devolucion_detalle_session $devolucion_detalle_session = null;
	
	/*FKs*/
	

	public bool $con_devolucionsFK=false;
	public array $devolucionsFK=array();
	public int $iddevolucionDefaultFK=-1;

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
		$this->devolucion_detalles= array();
		$this->devolucion_detalle= new devolucion_detalle();
		
		/*SESSION*/
		$this->devolucion_detalle_session=$this->Session->unserialize(devolucion_detalle_util::$STR_SESSION_NAME);

		if($this->devolucion_detalle_session==null) {
			$this->devolucion_detalle_session=new devolucion_detalle_session();
		}
		
		/*FKs*/
		

		$this->con_devolucionsFK=false;
		$this->devolucionsFK=array();
		$this->iddevolucionDefaultFK=-1;

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
	public function getdevolucion_detalle() : devolucion_detalle {	
		return $this->devolucion_detalle;
	}
		
	public function setdevolucion_detalle(devolucion_detalle $newdevolucion_detalle) {
		$this->devolucion_detalle = $newdevolucion_detalle;
	}
	
	public function getdevolucion_detalles() : array {		
		return $this->devolucion_detalles;
	}
	
	public function setdevolucion_detalles(array $newdevolucion_detalles) {
		$this->devolucion_detalles = $newdevolucion_detalles;
	}
	
	/*SESSION*/
	public function getdevolucion_detalle_session() : devolucion_detalle_session {	
		return $this->devolucion_detalle_session;
	}
		
	public function setdevolucion_detalle_session(devolucion_detalle_session $newdevolucion_detalle_session) {
		$this->devolucion_detalle_session = $newdevolucion_detalle_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
