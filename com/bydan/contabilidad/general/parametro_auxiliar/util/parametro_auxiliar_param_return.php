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

namespace com\bydan\contabilidad\general\parametro_auxiliar\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\general\parametro_auxiliar\business\entity\parametro_auxiliar;

use com\bydan\contabilidad\general\parametro_auxiliar\presentation\session\parametro_auxiliar_session;

class parametro_auxiliar_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?parametro_auxiliar $parametro_auxiliar = null;	
	public ?array $parametro_auxiliars = array();
	
	/*SESSION*/
	public ?parametro_auxiliar_session $parametro_auxiliar_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;

	public bool $con_tipo_costeo_kardexsFK=false;
	public array $tipo_costeo_kardexsFK=array();
	public int $idtipo_costeo_kardexDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->parametro_auxiliars= array();
		$this->parametro_auxiliar= new parametro_auxiliar();
		
		/*SESSION*/
		$this->parametro_auxiliar_session=$this->Session->unserialize(parametro_auxiliar_util::$STR_SESSION_NAME);

		if($this->parametro_auxiliar_session==null) {
			$this->parametro_auxiliar_session=new parametro_auxiliar_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;

		$this->con_tipo_costeo_kardexsFK=false;
		$this->tipo_costeo_kardexsFK=array();
		$this->idtipo_costeo_kardexDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getparametro_auxiliar() : parametro_auxiliar {	
		return $this->parametro_auxiliar;
	}
		
	public function setparametro_auxiliar(parametro_auxiliar $newparametro_auxiliar) {
		$this->parametro_auxiliar = $newparametro_auxiliar;
	}
	
	public function getparametro_auxiliars() : array {		
		return $this->parametro_auxiliars;
	}
	
	public function setparametro_auxiliars(array $newparametro_auxiliars) {
		$this->parametro_auxiliars = $newparametro_auxiliars;
	}
	
	/*SESSION*/
	public function getparametro_auxiliar_session() : parametro_auxiliar_session {	
		return $this->parametro_auxiliar_session;
	}
		
	public function setparametro_auxiliar_session(parametro_auxiliar_session $newparametro_auxiliar_session) {
		$this->parametro_auxiliar_session = $newparametro_auxiliar_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
