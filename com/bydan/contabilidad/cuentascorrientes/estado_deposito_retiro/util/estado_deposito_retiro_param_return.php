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

namespace com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\business\entity\estado_deposito_retiro;

use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\presentation\session\estado_deposito_retiro_session;

class estado_deposito_retiro_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?estado_deposito_retiro $estado_deposito_retiro = null;	
	public ?array $estado_deposito_retiros = array();
	
	/*SESSION*/
	public ?estado_deposito_retiro_session $estado_deposito_retiro_session = null;
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->estado_deposito_retiros= array();
		$this->estado_deposito_retiro= new estado_deposito_retiro();
		
		/*SESSION*/
		$this->estado_deposito_retiro_session=$this->Session->unserialize(estado_deposito_retiro_util::$STR_SESSION_NAME);

		if($this->estado_deposito_retiro_session==null) {
			$this->estado_deposito_retiro_session=new estado_deposito_retiro_session();
		}
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function getestado_deposito_retiro() : estado_deposito_retiro {	
		return $this->estado_deposito_retiro;
	}
		
	public function setestado_deposito_retiro(estado_deposito_retiro $newestado_deposito_retiro) {
		$this->estado_deposito_retiro = $newestado_deposito_retiro;
	}
	
	public function getestado_deposito_retiros() : array {		
		return $this->estado_deposito_retiros;
	}
	
	public function setestado_deposito_retiros(array $newestado_deposito_retiros) {
		$this->estado_deposito_retiros = $newestado_deposito_retiros;
	}
	
	/*SESSION*/
	public function getestado_deposito_retiro_session() : estado_deposito_retiro_session {	
		return $this->estado_deposito_retiro_session;
	}
		
	public function setestado_deposito_retiro_session(estado_deposito_retiro_session $newestado_deposito_retiro_session) {
		$this->estado_deposito_retiro_session = $newestado_deposito_retiro_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
