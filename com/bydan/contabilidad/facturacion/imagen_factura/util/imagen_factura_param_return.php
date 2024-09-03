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

namespace com\bydan\contabilidad\facturacion\imagen_factura\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\facturacion\imagen_factura\business\entity\imagen_factura;

use com\bydan\contabilidad\facturacion\imagen_factura\presentation\session\imagen_factura_session;

class imagen_factura_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?imagen_factura $imagen_factura = null;	
	public ?array $imagen_facturas = array();
	
	/*SESSION*/
	public ?imagen_factura_session $imagen_factura_session = null;
	
	/*FKs*/
	

	public bool $con_facturasFK=false;
	public array $facturasFK=array();
	public int $idfacturaDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->imagen_facturas= array();
		$this->imagen_factura= new imagen_factura();
		
		/*SESSION*/
		$this->imagen_factura_session=$this->Session->unserialize(imagen_factura_util::$STR_SESSION_NAME);

		if($this->imagen_factura_session==null) {
			$this->imagen_factura_session=new imagen_factura_session();
		}
		
		/*FKs*/
		

		$this->con_facturasFK=false;
		$this->facturasFK=array();
		$this->idfacturaDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getimagen_factura() : imagen_factura {	
		return $this->imagen_factura;
	}
		
	public function setimagen_factura(imagen_factura $newimagen_factura) {
		$this->imagen_factura = $newimagen_factura;
	}
	
	public function getimagen_facturas() : array {		
		return $this->imagen_facturas;
	}
	
	public function setimagen_facturas(array $newimagen_facturas) {
		$this->imagen_facturas = $newimagen_facturas;
	}
	
	/*SESSION*/
	public function getimagen_factura_session() : imagen_factura_session {	
		return $this->imagen_factura_session;
	}
		
	public function setimagen_factura_session(imagen_factura_session $newimagen_factura_session) {
		$this->imagen_factura_session = $newimagen_factura_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
