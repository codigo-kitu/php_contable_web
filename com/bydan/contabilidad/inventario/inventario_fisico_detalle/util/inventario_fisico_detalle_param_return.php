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

namespace com\bydan\contabilidad\inventario\inventario_fisico_detalle\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\inventario\inventario_fisico_detalle\business\entity\inventario_fisico_detalle;

use com\bydan\contabilidad\inventario\inventario_fisico_detalle\presentation\session\inventario_fisico_detalle_session;

class inventario_fisico_detalle_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?inventario_fisico_detalle $inventario_fisico_detalle = null;	
	public ?array $inventario_fisico_detalles = array();
	
	/*SESSION*/
	public ?inventario_fisico_detalle_session $inventario_fisico_detalle_session = null;
	
	/*FKs*/
	

	public bool $con_inventario_fisicosFK=false;
	public array $inventario_fisicosFK=array();
	public int $idinventario_fisicoDefaultFK=-1;

	public bool $con_productosFK=false;
	public array $productosFK=array();
	public int $idproductoDefaultFK=-1;

	public bool $con_bodegasFK=false;
	public array $bodegasFK=array();
	public int $idbodegaDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->inventario_fisico_detalles= array();
		$this->inventario_fisico_detalle= new inventario_fisico_detalle();
		
		/*SESSION*/
		$this->inventario_fisico_detalle_session=$this->Session->unserialize(inventario_fisico_detalle_util::$STR_SESSION_NAME);

		if($this->inventario_fisico_detalle_session==null) {
			$this->inventario_fisico_detalle_session=new inventario_fisico_detalle_session();
		}
		
		/*FKs*/
		

		$this->con_inventario_fisicosFK=false;
		$this->inventario_fisicosFK=array();
		$this->idinventario_fisicoDefaultFK=-1;

		$this->con_productosFK=false;
		$this->productosFK=array();
		$this->idproductoDefaultFK=-1;

		$this->con_bodegasFK=false;
		$this->bodegasFK=array();
		$this->idbodegaDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getinventario_fisico_detalle() : inventario_fisico_detalle {	
		return $this->inventario_fisico_detalle;
	}
		
	public function setinventario_fisico_detalle(inventario_fisico_detalle $newinventario_fisico_detalle) {
		$this->inventario_fisico_detalle = $newinventario_fisico_detalle;
	}
	
	public function getinventario_fisico_detalles() : array {		
		return $this->inventario_fisico_detalles;
	}
	
	public function setinventario_fisico_detalles(array $newinventario_fisico_detalles) {
		$this->inventario_fisico_detalles = $newinventario_fisico_detalles;
	}
	
	/*SESSION*/
	public function getinventario_fisico_detalle_session() : inventario_fisico_detalle_session {	
		return $this->inventario_fisico_detalle_session;
	}
		
	public function setinventario_fisico_detalle_session(inventario_fisico_detalle_session $newinventario_fisico_detalle_session) {
		$this->inventario_fisico_detalle_session = $newinventario_fisico_detalle_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
