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

namespace com\bydan\contabilidad\estimados\consignacion_detalle\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\estimados\consignacion_detalle\business\entity\consignacion_detalle;

use com\bydan\contabilidad\estimados\consignacion_detalle\presentation\session\consignacion_detalle_session;

class consignacion_detalle_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?consignacion_detalle $consignacion_detalle = null;	
	public ?array $consignacion_detalles = array();
	
	/*SESSION*/
	public ?consignacion_detalle_session $consignacion_detalle_session = null;
	
	/*FKs*/
	

	public bool $con_consignacionsFK=false;
	public array $consignacionsFK=array();
	public int $idconsignacionDefaultFK=-1;

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
		$this->consignacion_detalles= array();
		$this->consignacion_detalle= new consignacion_detalle();
		
		/*SESSION*/
		$this->consignacion_detalle_session=$this->Session->unserialize(consignacion_detalle_util::$STR_SESSION_NAME);

		if($this->consignacion_detalle_session==null) {
			$this->consignacion_detalle_session=new consignacion_detalle_session();
		}
		
		/*FKs*/
		

		$this->con_consignacionsFK=false;
		$this->consignacionsFK=array();
		$this->idconsignacionDefaultFK=-1;

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
	public function getconsignacion_detalle() : consignacion_detalle {	
		return $this->consignacion_detalle;
	}
		
	public function setconsignacion_detalle(consignacion_detalle $newconsignacion_detalle) {
		$this->consignacion_detalle = $newconsignacion_detalle;
	}
	
	public function getconsignacion_detalles() : array {		
		return $this->consignacion_detalles;
	}
	
	public function setconsignacion_detalles(array $newconsignacion_detalles) {
		$this->consignacion_detalles = $newconsignacion_detalles;
	}
	
	/*SESSION*/
	public function getconsignacion_detalle_session() : consignacion_detalle_session {	
		return $this->consignacion_detalle_session;
	}
		
	public function setconsignacion_detalle_session(consignacion_detalle_session $newconsignacion_detalle_session) {
		$this->consignacion_detalle_session = $newconsignacion_detalle_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
