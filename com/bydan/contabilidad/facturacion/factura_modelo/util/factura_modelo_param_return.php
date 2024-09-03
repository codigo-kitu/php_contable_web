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

namespace com\bydan\contabilidad\facturacion\factura_modelo\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\facturacion\factura_modelo\business\entity\factura_modelo;

use com\bydan\contabilidad\facturacion\factura_modelo\presentation\session\factura_modelo_session;

class factura_modelo_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?factura_modelo $factura_modelo = null;	
	public ?array $factura_modelos = array();
	
	/*SESSION*/
	public ?factura_modelo_session $factura_modelo_session = null;
	
	/*FKs*/
	

	public bool $con_factura_lotesFK=false;
	public array $factura_lotesFK=array();
	public int $idfactura_loteDefaultFK=-1;

	public bool $con_clientesFK=false;
	public array $clientesFK=array();
	public int $idclienteDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->factura_modelos= array();
		$this->factura_modelo= new factura_modelo();
		
		/*SESSION*/
		$this->factura_modelo_session=$this->Session->unserialize(factura_modelo_util::$STR_SESSION_NAME);

		if($this->factura_modelo_session==null) {
			$this->factura_modelo_session=new factura_modelo_session();
		}
		
		/*FKs*/
		

		$this->con_factura_lotesFK=false;
		$this->factura_lotesFK=array();
		$this->idfactura_loteDefaultFK=-1;

		$this->con_clientesFK=false;
		$this->clientesFK=array();
		$this->idclienteDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getfactura_modelo() : factura_modelo {	
		return $this->factura_modelo;
	}
		
	public function setfactura_modelo(factura_modelo $newfactura_modelo) {
		$this->factura_modelo = $newfactura_modelo;
	}
	
	public function getfactura_modelos() : array {		
		return $this->factura_modelos;
	}
	
	public function setfactura_modelos(array $newfactura_modelos) {
		$this->factura_modelos = $newfactura_modelos;
	}
	
	/*SESSION*/
	public function getfactura_modelo_session() : factura_modelo_session {	
		return $this->factura_modelo_session;
	}
		
	public function setfactura_modelo_session(factura_modelo_session $newfactura_modelo_session) {
		$this->factura_modelo_session = $newfactura_modelo_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
