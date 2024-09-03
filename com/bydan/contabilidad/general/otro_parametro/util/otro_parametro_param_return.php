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

namespace com\bydan\contabilidad\general\otro_parametro\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\general\otro_parametro\business\entity\otro_parametro;

use com\bydan\contabilidad\general\otro_parametro\presentation\session\otro_parametro_session;

class otro_parametro_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?otro_parametro $otro_parametro = null;	
	public ?array $otro_parametros = array();
	
	/*SESSION*/
	public ?otro_parametro_session $otro_parametro_session = null;
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->otro_parametros= array();
		$this->otro_parametro= new otro_parametro();
		
		/*SESSION*/
		$this->otro_parametro_session=$this->Session->unserialize(otro_parametro_util::$STR_SESSION_NAME);

		if($this->otro_parametro_session==null) {
			$this->otro_parametro_session=new otro_parametro_session();
		}
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function getotro_parametro() : otro_parametro {	
		return $this->otro_parametro;
	}
		
	public function setotro_parametro(otro_parametro $newotro_parametro) {
		$this->otro_parametro = $newotro_parametro;
	}
	
	public function getotro_parametros() : array {		
		return $this->otro_parametros;
	}
	
	public function setotro_parametros(array $newotro_parametros) {
		$this->otro_parametros = $newotro_parametros;
	}
	
	/*SESSION*/
	public function getotro_parametro_session() : otro_parametro_session {	
		return $this->otro_parametro_session;
	}
		
	public function setotro_parametro_session(otro_parametro_session $newotro_parametro_session) {
		$this->otro_parametro_session = $newotro_parametro_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
