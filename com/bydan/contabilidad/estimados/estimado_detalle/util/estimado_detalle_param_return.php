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

namespace com\bydan\contabilidad\estimados\estimado_detalle\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\estimados\estimado_detalle\business\entity\estimado_detalle;

use com\bydan\contabilidad\estimados\estimado_detalle\presentation\session\estimado_detalle_session;

class estimado_detalle_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?estimado_detalle $estimado_detalle = null;	
	public ?array $estimado_detalles = array();
	
	/*SESSION*/
	public ?estimado_detalle_session $estimado_detalle_session = null;
	
	/*FKs*/
	

	public bool $con_estimadosFK=false;
	public array $estimadosFK=array();
	public int $idestimadoDefaultFK=-1;

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
		$this->estimado_detalles= array();
		$this->estimado_detalle= new estimado_detalle();
		
		/*SESSION*/
		$this->estimado_detalle_session=$this->Session->unserialize(estimado_detalle_util::$STR_SESSION_NAME);

		if($this->estimado_detalle_session==null) {
			$this->estimado_detalle_session=new estimado_detalle_session();
		}
		
		/*FKs*/
		

		$this->con_estimadosFK=false;
		$this->estimadosFK=array();
		$this->idestimadoDefaultFK=-1;

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
	public function getestimado_detalle() : estimado_detalle {	
		return $this->estimado_detalle;
	}
		
	public function setestimado_detalle(estimado_detalle $newestimado_detalle) {
		$this->estimado_detalle = $newestimado_detalle;
	}
	
	public function getestimado_detalles() : array {		
		return $this->estimado_detalles;
	}
	
	public function setestimado_detalles(array $newestimado_detalles) {
		$this->estimado_detalles = $newestimado_detalles;
	}
	
	/*SESSION*/
	public function getestimado_detalle_session() : estimado_detalle_session {	
		return $this->estimado_detalle_session;
	}
		
	public function setestimado_detalle_session(estimado_detalle_session $newestimado_detalle_session) {
		$this->estimado_detalle_session = $newestimado_detalle_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
