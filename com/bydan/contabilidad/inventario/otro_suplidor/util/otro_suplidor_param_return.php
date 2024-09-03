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

namespace com\bydan\contabilidad\inventario\otro_suplidor\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\inventario\otro_suplidor\business\entity\otro_suplidor;

use com\bydan\contabilidad\inventario\otro_suplidor\presentation\session\otro_suplidor_session;

class otro_suplidor_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?otro_suplidor $otro_suplidor = null;	
	public ?array $otro_suplidors = array();
	
	/*SESSION*/
	public ?otro_suplidor_session $otro_suplidor_session = null;
	
	/*FKs*/
	

	public bool $con_productosFK=false;
	public array $productosFK=array();
	public int $idproductoDefaultFK=-1;

	public bool $con_proveedorsFK=false;
	public array $proveedorsFK=array();
	public int $idproveedorDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->otro_suplidors= array();
		$this->otro_suplidor= new otro_suplidor();
		
		/*SESSION*/
		$this->otro_suplidor_session=$this->Session->unserialize(otro_suplidor_util::$STR_SESSION_NAME);

		if($this->otro_suplidor_session==null) {
			$this->otro_suplidor_session=new otro_suplidor_session();
		}
		
		/*FKs*/
		

		$this->con_productosFK=false;
		$this->productosFK=array();
		$this->idproductoDefaultFK=-1;

		$this->con_proveedorsFK=false;
		$this->proveedorsFK=array();
		$this->idproveedorDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getotro_suplidor() : otro_suplidor {	
		return $this->otro_suplidor;
	}
		
	public function setotro_suplidor(otro_suplidor $newotro_suplidor) {
		$this->otro_suplidor = $newotro_suplidor;
	}
	
	public function getotro_suplidors() : array {		
		return $this->otro_suplidors;
	}
	
	public function setotro_suplidors(array $newotro_suplidors) {
		$this->otro_suplidors = $newotro_suplidors;
	}
	
	/*SESSION*/
	public function getotro_suplidor_session() : otro_suplidor_session {	
		return $this->otro_suplidor_session;
	}
		
	public function setotro_suplidor_session(otro_suplidor_session $newotro_suplidor_session) {
		$this->otro_suplidor_session = $newotro_suplidor_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
