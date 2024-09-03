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

namespace com\bydan\contabilidad\general\parametro_generico\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\general\parametro_generico\business\entity\parametro_generico;

use com\bydan\contabilidad\general\parametro_generico\presentation\session\parametro_generico_session;

class parametro_generico_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?parametro_generico $parametro_generico = null;	
	public ?array $parametro_genericos = array();
	
	/*SESSION*/
	public ?parametro_generico_session $parametro_generico_session = null;
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->parametro_genericos= array();
		$this->parametro_generico= new parametro_generico();
		
		/*SESSION*/
		$this->parametro_generico_session=$this->Session->unserialize(parametro_generico_util::$STR_SESSION_NAME);

		if($this->parametro_generico_session==null) {
			$this->parametro_generico_session=new parametro_generico_session();
		}
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function getparametro_generico() : parametro_generico {	
		return $this->parametro_generico;
	}
		
	public function setparametro_generico(parametro_generico $newparametro_generico) {
		$this->parametro_generico = $newparametro_generico;
	}
	
	public function getparametro_genericos() : array {		
		return $this->parametro_genericos;
	}
	
	public function setparametro_genericos(array $newparametro_genericos) {
		$this->parametro_genericos = $newparametro_genericos;
	}
	
	/*SESSION*/
	public function getparametro_generico_session() : parametro_generico_session {	
		return $this->parametro_generico_session;
	}
		
	public function setparametro_generico_session(parametro_generico_session $newparametro_generico_session) {
		$this->parametro_generico_session = $newparametro_generico_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
