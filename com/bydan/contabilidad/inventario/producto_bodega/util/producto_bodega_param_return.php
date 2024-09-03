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

namespace com\bydan\contabilidad\inventario\producto_bodega\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\inventario\producto_bodega\business\entity\producto_bodega;

use com\bydan\contabilidad\inventario\producto_bodega\presentation\session\producto_bodega_session;

class producto_bodega_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?producto_bodega $producto_bodega = null;	
	public ?array $producto_bodegas = array();
	
	/*SESSION*/
	public ?producto_bodega_session $producto_bodega_session = null;
	
	/*FKs*/
	

	public bool $con_bodegasFK=false;
	public array $bodegasFK=array();
	public int $idbodegaDefaultFK=-1;

	public bool $con_productosFK=false;
	public array $productosFK=array();
	public int $idproductoDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->producto_bodegas= array();
		$this->producto_bodega= new producto_bodega();
		
		/*SESSION*/
		$this->producto_bodega_session=$this->Session->unserialize(producto_bodega_util::$STR_SESSION_NAME);

		if($this->producto_bodega_session==null) {
			$this->producto_bodega_session=new producto_bodega_session();
		}
		
		/*FKs*/
		

		$this->con_bodegasFK=false;
		$this->bodegasFK=array();
		$this->idbodegaDefaultFK=-1;

		$this->con_productosFK=false;
		$this->productosFK=array();
		$this->idproductoDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getproducto_bodega() : producto_bodega {	
		return $this->producto_bodega;
	}
		
	public function setproducto_bodega(producto_bodega $newproducto_bodega) {
		$this->producto_bodega = $newproducto_bodega;
	}
	
	public function getproducto_bodegas() : array {		
		return $this->producto_bodegas;
	}
	
	public function setproducto_bodegas(array $newproducto_bodegas) {
		$this->producto_bodegas = $newproducto_bodegas;
	}
	
	/*SESSION*/
	public function getproducto_bodega_session() : producto_bodega_session {	
		return $this->producto_bodega_session;
	}
		
	public function setproducto_bodega_session(producto_bodega_session $newproducto_bodega_session) {
		$this->producto_bodega_session = $newproducto_bodega_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
