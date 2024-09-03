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

namespace com\bydan\contabilidad\inventario\imagen_orden_compra\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\inventario\imagen_orden_compra\business\entity\imagen_orden_compra;

use com\bydan\contabilidad\inventario\imagen_orden_compra\presentation\session\imagen_orden_compra_session;

class imagen_orden_compra_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?imagen_orden_compra $imagen_orden_compra = null;	
	public ?array $imagen_orden_compras = array();
	
	/*SESSION*/
	public ?imagen_orden_compra_session $imagen_orden_compra_session = null;
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->imagen_orden_compras= array();
		$this->imagen_orden_compra= new imagen_orden_compra();
		
		/*SESSION*/
		$this->imagen_orden_compra_session=$this->Session->unserialize(imagen_orden_compra_util::$STR_SESSION_NAME);

		if($this->imagen_orden_compra_session==null) {
			$this->imagen_orden_compra_session=new imagen_orden_compra_session();
		}
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function getimagen_orden_compra() : imagen_orden_compra {	
		return $this->imagen_orden_compra;
	}
		
	public function setimagen_orden_compra(imagen_orden_compra $newimagen_orden_compra) {
		$this->imagen_orden_compra = $newimagen_orden_compra;
	}
	
	public function getimagen_orden_compras() : array {		
		return $this->imagen_orden_compras;
	}
	
	public function setimagen_orden_compras(array $newimagen_orden_compras) {
		$this->imagen_orden_compras = $newimagen_orden_compras;
	}
	
	/*SESSION*/
	public function getimagen_orden_compra_session() : imagen_orden_compra_session {	
		return $this->imagen_orden_compra_session;
	}
		
	public function setimagen_orden_compra_session(imagen_orden_compra_session $newimagen_orden_compra_session) {
		$this->imagen_orden_compra_session = $newimagen_orden_compra_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
