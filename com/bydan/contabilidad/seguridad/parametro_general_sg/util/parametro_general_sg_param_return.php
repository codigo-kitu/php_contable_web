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

namespace com\bydan\contabilidad\seguridad\parametro_general_sg\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\seguridad\parametro_general_sg\business\entity\parametro_general_sg;

use com\bydan\contabilidad\seguridad\parametro_general_sg\presentation\session\parametro_general_sg_session;

class parametro_general_sg_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?parametro_general_sg $parametro_general_sg = null;	
	public ?array $parametro_general_sgs = array();
	
	/*SESSION*/
	public ?parametro_general_sg_session $parametro_general_sg_session = null;
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->parametro_general_sgs= array();
		$this->parametro_general_sg= new parametro_general_sg();
		
		/*SESSION*/
		$this->parametro_general_sg_session=$this->Session->unserialize(parametro_general_sg_util::$STR_SESSION_NAME);

		if($this->parametro_general_sg_session==null) {
			$this->parametro_general_sg_session=new parametro_general_sg_session();
		}
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function getparametro_general_sg() : parametro_general_sg {	
		return $this->parametro_general_sg;
	}
		
	public function setparametro_general_sg(parametro_general_sg $newparametro_general_sg) {
		$this->parametro_general_sg = $newparametro_general_sg;
	}
	
	public function getparametro_general_sgs() : array {		
		return $this->parametro_general_sgs;
	}
	
	public function setparametro_general_sgs(array $newparametro_general_sgs) {
		$this->parametro_general_sgs = $newparametro_general_sgs;
	}
	
	/*SESSION*/
	public function getparametro_general_sg_session() : parametro_general_sg_session {	
		return $this->parametro_general_sg_session;
	}
		
	public function setparametro_general_sg_session(parametro_general_sg_session $newparametro_general_sg_session) {
		$this->parametro_general_sg_session = $newparametro_general_sg_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
