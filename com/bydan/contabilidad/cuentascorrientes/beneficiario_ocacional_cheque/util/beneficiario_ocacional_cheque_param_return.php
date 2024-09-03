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

namespace com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\business\entity\beneficiario_ocacional_cheque;

use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\presentation\session\beneficiario_ocacional_cheque_session;

class beneficiario_ocacional_cheque_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?beneficiario_ocacional_cheque $beneficiario_ocacional_cheque = null;	
	public ?array $beneficiario_ocacional_cheques = array();
	
	/*SESSION*/
	public ?beneficiario_ocacional_cheque_session $beneficiario_ocacional_cheque_session = null;
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->beneficiario_ocacional_cheques= array();
		$this->beneficiario_ocacional_cheque= new beneficiario_ocacional_cheque();
		
		/*SESSION*/
		$this->beneficiario_ocacional_cheque_session=$this->Session->unserialize(beneficiario_ocacional_cheque_util::$STR_SESSION_NAME);

		if($this->beneficiario_ocacional_cheque_session==null) {
			$this->beneficiario_ocacional_cheque_session=new beneficiario_ocacional_cheque_session();
		}
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function getbeneficiario_ocacional_cheque() : beneficiario_ocacional_cheque {	
		return $this->beneficiario_ocacional_cheque;
	}
		
	public function setbeneficiario_ocacional_cheque(beneficiario_ocacional_cheque $newbeneficiario_ocacional_cheque) {
		$this->beneficiario_ocacional_cheque = $newbeneficiario_ocacional_cheque;
	}
	
	public function getbeneficiario_ocacional_cheques() : array {		
		return $this->beneficiario_ocacional_cheques;
	}
	
	public function setbeneficiario_ocacional_cheques(array $newbeneficiario_ocacional_cheques) {
		$this->beneficiario_ocacional_cheques = $newbeneficiario_ocacional_cheques;
	}
	
	/*SESSION*/
	public function getbeneficiario_ocacional_cheque_session() : beneficiario_ocacional_cheque_session {	
		return $this->beneficiario_ocacional_cheque_session;
	}
		
	public function setbeneficiario_ocacional_cheque_session(beneficiario_ocacional_cheque_session $newbeneficiario_ocacional_cheque_session) {
		$this->beneficiario_ocacional_cheque_session = $newbeneficiario_ocacional_cheque_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
