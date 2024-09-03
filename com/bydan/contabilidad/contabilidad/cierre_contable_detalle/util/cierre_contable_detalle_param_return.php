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

namespace com\bydan\contabilidad\contabilidad\cierre_contable_detalle\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\business\entity\cierre_contable_detalle;

use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\presentation\session\cierre_contable_detalle_session;

class cierre_contable_detalle_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?cierre_contable_detalle $cierre_contable_detalle = null;	
	public ?array $cierre_contable_detalles = array();
	
	/*SESSION*/
	public ?cierre_contable_detalle_session $cierre_contable_detalle_session = null;
	
	/*FKs*/
	

	public bool $con_cierre_contablesFK=false;
	public array $cierre_contablesFK=array();
	public int $idcierre_contableDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->cierre_contable_detalles= array();
		$this->cierre_contable_detalle= new cierre_contable_detalle();
		
		/*SESSION*/
		$this->cierre_contable_detalle_session=$this->Session->unserialize(cierre_contable_detalle_util::$STR_SESSION_NAME);

		if($this->cierre_contable_detalle_session==null) {
			$this->cierre_contable_detalle_session=new cierre_contable_detalle_session();
		}
		
		/*FKs*/
		

		$this->con_cierre_contablesFK=false;
		$this->cierre_contablesFK=array();
		$this->idcierre_contableDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getcierre_contable_detalle() : cierre_contable_detalle {	
		return $this->cierre_contable_detalle;
	}
		
	public function setcierre_contable_detalle(cierre_contable_detalle $newcierre_contable_detalle) {
		$this->cierre_contable_detalle = $newcierre_contable_detalle;
	}
	
	public function getcierre_contable_detalles() : array {		
		return $this->cierre_contable_detalles;
	}
	
	public function setcierre_contable_detalles(array $newcierre_contable_detalles) {
		$this->cierre_contable_detalles = $newcierre_contable_detalles;
	}
	
	/*SESSION*/
	public function getcierre_contable_detalle_session() : cierre_contable_detalle_session {	
		return $this->cierre_contable_detalle_session;
	}
		
	public function setcierre_contable_detalle_session(cierre_contable_detalle_session $newcierre_contable_detalle_session) {
		$this->cierre_contable_detalle_session = $newcierre_contable_detalle_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
