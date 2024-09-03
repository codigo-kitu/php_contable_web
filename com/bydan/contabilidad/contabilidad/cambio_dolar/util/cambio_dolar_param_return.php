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

namespace com\bydan\contabilidad\contabilidad\cambio_dolar\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\contabilidad\cambio_dolar\business\entity\cambio_dolar;

use com\bydan\contabilidad\contabilidad\cambio_dolar\presentation\session\cambio_dolar_session;

class cambio_dolar_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?cambio_dolar $cambio_dolar = null;	
	public ?array $cambio_dolars = array();
	
	/*SESSION*/
	public ?cambio_dolar_session $cambio_dolar_session = null;
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->cambio_dolars= array();
		$this->cambio_dolar= new cambio_dolar();
		
		/*SESSION*/
		$this->cambio_dolar_session=$this->Session->unserialize(cambio_dolar_util::$STR_SESSION_NAME);

		if($this->cambio_dolar_session==null) {
			$this->cambio_dolar_session=new cambio_dolar_session();
		}
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function getcambio_dolar() : cambio_dolar {	
		return $this->cambio_dolar;
	}
		
	public function setcambio_dolar(cambio_dolar $newcambio_dolar) {
		$this->cambio_dolar = $newcambio_dolar;
	}
	
	public function getcambio_dolars() : array {		
		return $this->cambio_dolars;
	}
	
	public function setcambio_dolars(array $newcambio_dolars) {
		$this->cambio_dolars = $newcambio_dolars;
	}
	
	/*SESSION*/
	public function getcambio_dolar_session() : cambio_dolar_session {	
		return $this->cambio_dolar_session;
	}
		
	public function setcambio_dolar_session(cambio_dolar_session $newcambio_dolar_session) {
		$this->cambio_dolar_session = $newcambio_dolar_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
