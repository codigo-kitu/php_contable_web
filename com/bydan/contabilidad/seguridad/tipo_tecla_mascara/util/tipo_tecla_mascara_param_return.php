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

namespace com\bydan\contabilidad\seguridad\tipo_tecla_mascara\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\business\entity\tipo_tecla_mascara;

use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\presentation\session\tipo_tecla_mascara_session;

class tipo_tecla_mascara_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?tipo_tecla_mascara $tipo_tecla_mascara = null;	
	public ?array $tipo_tecla_mascaras = array();
	
	/*SESSION*/
	public ?tipo_tecla_mascara_session $tipo_tecla_mascara_session = null;
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->tipo_tecla_mascaras= array();
		$this->tipo_tecla_mascara= new tipo_tecla_mascara();
		
		/*SESSION*/
		$this->tipo_tecla_mascara_session=$this->Session->unserialize(tipo_tecla_mascara_util::$STR_SESSION_NAME);

		if($this->tipo_tecla_mascara_session==null) {
			$this->tipo_tecla_mascara_session=new tipo_tecla_mascara_session();
		}
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function gettipo_tecla_mascara() : tipo_tecla_mascara {	
		return $this->tipo_tecla_mascara;
	}
		
	public function settipo_tecla_mascara(tipo_tecla_mascara $newtipo_tecla_mascara) {
		$this->tipo_tecla_mascara = $newtipo_tecla_mascara;
	}
	
	public function gettipo_tecla_mascaras() : array {		
		return $this->tipo_tecla_mascaras;
	}
	
	public function settipo_tecla_mascaras(array $newtipo_tecla_mascaras) {
		$this->tipo_tecla_mascaras = $newtipo_tecla_mascaras;
	}
	
	/*SESSION*/
	public function gettipo_tecla_mascara_session() : tipo_tecla_mascara_session {	
		return $this->tipo_tecla_mascara_session;
	}
		
	public function settipo_tecla_mascara_session(tipo_tecla_mascara_session $newtipo_tecla_mascara_session) {
		$this->tipo_tecla_mascara_session = $newtipo_tecla_mascara_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
