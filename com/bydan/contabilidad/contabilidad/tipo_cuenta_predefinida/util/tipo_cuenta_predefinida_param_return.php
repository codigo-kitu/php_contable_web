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

namespace com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\business\entity\tipo_cuenta_predefinida;

use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\presentation\session\tipo_cuenta_predefinida_session;

class tipo_cuenta_predefinida_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?tipo_cuenta_predefinida $tipo_cuenta_predefinida = null;	
	public ?array $tipo_cuenta_predefinidas = array();
	
	/*SESSION*/
	public ?tipo_cuenta_predefinida_session $tipo_cuenta_predefinida_session = null;
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->tipo_cuenta_predefinidas= array();
		$this->tipo_cuenta_predefinida= new tipo_cuenta_predefinida();
		
		/*SESSION*/
		$this->tipo_cuenta_predefinida_session=$this->Session->unserialize(tipo_cuenta_predefinida_util::$STR_SESSION_NAME);

		if($this->tipo_cuenta_predefinida_session==null) {
			$this->tipo_cuenta_predefinida_session=new tipo_cuenta_predefinida_session();
		}
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function gettipo_cuenta_predefinida() : tipo_cuenta_predefinida {	
		return $this->tipo_cuenta_predefinida;
	}
		
	public function settipo_cuenta_predefinida(tipo_cuenta_predefinida $newtipo_cuenta_predefinida) {
		$this->tipo_cuenta_predefinida = $newtipo_cuenta_predefinida;
	}
	
	public function gettipo_cuenta_predefinidas() : array {		
		return $this->tipo_cuenta_predefinidas;
	}
	
	public function settipo_cuenta_predefinidas(array $newtipo_cuenta_predefinidas) {
		$this->tipo_cuenta_predefinidas = $newtipo_cuenta_predefinidas;
	}
	
	/*SESSION*/
	public function gettipo_cuenta_predefinida_session() : tipo_cuenta_predefinida_session {	
		return $this->tipo_cuenta_predefinida_session;
	}
		
	public function settipo_cuenta_predefinida_session(tipo_cuenta_predefinida_session $newtipo_cuenta_predefinida_session) {
		$this->tipo_cuenta_predefinida_session = $newtipo_cuenta_predefinida_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
