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

namespace com\bydan\contabilidad\inventario\kardex_detalle\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\inventario\kardex_detalle\business\entity\kardex_detalle;

use com\bydan\contabilidad\inventario\kardex_detalle\presentation\session\kardex_detalle_session;

class kardex_detalle_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?kardex_detalle $kardex_detalle = null;	
	public ?array $kardex_detalles = array();
	
	/*SESSION*/
	public ?kardex_detalle_session $kardex_detalle_session = null;
	
	/*FKs*/
	

	public bool $con_kardexsFK=false;
	public array $kardexsFK=array();
	public int $idkardexDefaultFK=-1;

	public bool $con_bodegasFK=false;
	public array $bodegasFK=array();
	public int $idbodegaDefaultFK=-1;

	public bool $con_productosFK=false;
	public array $productosFK=array();
	public int $idproductoDefaultFK=-1;

	public bool $con_unidadsFK=false;
	public array $unidadsFK=array();
	public int $idunidadDefaultFK=-1;

	public bool $con_lote_productosFK=false;
	public array $lote_productosFK=array();
	public int $idlote_productoDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->kardex_detalles= array();
		$this->kardex_detalle= new kardex_detalle();
		
		/*SESSION*/
		$this->kardex_detalle_session=$this->Session->unserialize(kardex_detalle_util::$STR_SESSION_NAME);

		if($this->kardex_detalle_session==null) {
			$this->kardex_detalle_session=new kardex_detalle_session();
		}
		
		/*FKs*/
		

		$this->con_kardexsFK=false;
		$this->kardexsFK=array();
		$this->idkardexDefaultFK=-1;

		$this->con_bodegasFK=false;
		$this->bodegasFK=array();
		$this->idbodegaDefaultFK=-1;

		$this->con_productosFK=false;
		$this->productosFK=array();
		$this->idproductoDefaultFK=-1;

		$this->con_unidadsFK=false;
		$this->unidadsFK=array();
		$this->idunidadDefaultFK=-1;

		$this->con_lote_productosFK=false;
		$this->lote_productosFK=array();
		$this->idlote_productoDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getkardex_detalle() : kardex_detalle {	
		return $this->kardex_detalle;
	}
		
	public function setkardex_detalle(kardex_detalle $newkardex_detalle) {
		$this->kardex_detalle = $newkardex_detalle;
	}
	
	public function getkardex_detalles() : array {		
		return $this->kardex_detalles;
	}
	
	public function setkardex_detalles(array $newkardex_detalles) {
		$this->kardex_detalles = $newkardex_detalles;
	}
	
	/*SESSION*/
	public function getkardex_detalle_session() : kardex_detalle_session {	
		return $this->kardex_detalle_session;
	}
		
	public function setkardex_detalle_session(kardex_detalle_session $newkardex_detalle_session) {
		$this->kardex_detalle_session = $newkardex_detalle_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
