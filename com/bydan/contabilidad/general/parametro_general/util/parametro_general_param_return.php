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

namespace com\bydan\contabilidad\general\parametro_general\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\general\parametro_general\business\entity\parametro_general;

use com\bydan\contabilidad\general\parametro_general\presentation\session\parametro_general_session;

class parametro_general_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?parametro_general $parametro_general = null;	
	public ?array $parametro_generals = array();
	
	/*SESSION*/
	public ?parametro_general_session $parametro_general_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;

	public bool $con_paissFK=false;
	public array $paissFK=array();
	public int $idpaisDefaultFK=-1;

	public bool $con_monedasFK=false;
	public array $monedasFK=array();
	public int $idmonedaDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->parametro_generals= array();
		$this->parametro_general= new parametro_general();
		
		/*SESSION*/
		$this->parametro_general_session=$this->Session->unserialize(parametro_general_util::$STR_SESSION_NAME);

		if($this->parametro_general_session==null) {
			$this->parametro_general_session=new parametro_general_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;

		$this->con_paissFK=false;
		$this->paissFK=array();
		$this->idpaisDefaultFK=-1;

		$this->con_monedasFK=false;
		$this->monedasFK=array();
		$this->idmonedaDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getparametro_general() : parametro_general {	
		return $this->parametro_general;
	}
		
	public function setparametro_general(parametro_general $newparametro_general) {
		$this->parametro_general = $newparametro_general;
	}
	
	public function getparametro_generals() : array {		
		return $this->parametro_generals;
	}
	
	public function setparametro_generals(array $newparametro_generals) {
		$this->parametro_generals = $newparametro_generals;
	}
	
	/*SESSION*/
	public function getparametro_general_session() : parametro_general_session {	
		return $this->parametro_general_session;
	}
		
	public function setparametro_general_session(parametro_general_session $newparametro_general_session) {
		$this->parametro_general_session = $newparametro_general_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
