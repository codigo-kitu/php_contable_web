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

namespace com\bydan\contabilidad\contabilidad\parametro_contabilidad\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\contabilidad\parametro_contabilidad\business\entity\parametro_contabilidad;

use com\bydan\contabilidad\contabilidad\parametro_contabilidad\presentation\session\parametro_contabilidad_session;

class parametro_contabilidad_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?parametro_contabilidad $parametro_contabilidad = null;	
	public ?array $parametro_contabilidads = array();
	
	/*SESSION*/
	public ?parametro_contabilidad_session $parametro_contabilidad_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->parametro_contabilidads= array();
		$this->parametro_contabilidad= new parametro_contabilidad();
		
		/*SESSION*/
		$this->parametro_contabilidad_session=$this->Session->unserialize(parametro_contabilidad_util::$STR_SESSION_NAME);

		if($this->parametro_contabilidad_session==null) {
			$this->parametro_contabilidad_session=new parametro_contabilidad_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getparametro_contabilidad() : parametro_contabilidad {	
		return $this->parametro_contabilidad;
	}
		
	public function setparametro_contabilidad(parametro_contabilidad $newparametro_contabilidad) {
		$this->parametro_contabilidad = $newparametro_contabilidad;
	}
	
	public function getparametro_contabilidads() : array {		
		return $this->parametro_contabilidads;
	}
	
	public function setparametro_contabilidads(array $newparametro_contabilidads) {
		$this->parametro_contabilidads = $newparametro_contabilidads;
	}
	
	/*SESSION*/
	public function getparametro_contabilidad_session() : parametro_contabilidad_session {	
		return $this->parametro_contabilidad_session;
	}
		
	public function setparametro_contabilidad_session(parametro_contabilidad_session $newparametro_contabilidad_session) {
		$this->parametro_contabilidad_session = $newparametro_contabilidad_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
