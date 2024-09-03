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

namespace com\bydan\contabilidad\general\empresa\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\general\empresa\business\entity\empresa;

use com\bydan\contabilidad\general\empresa\presentation\session\empresa_session;

class empresa_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?empresa $empresa = null;	
	public ?array $empresas = array();
	
	/*SESSION*/
	public ?empresa_session $empresa_session = null;
	
	/*FKs*/
	

	public bool $con_paissFK=false;
	public array $paissFK=array();
	public int $idpaisDefaultFK=-1;

	public bool $con_ciudadsFK=false;
	public array $ciudadsFK=array();
	public int $idciudadDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->empresas= array();
		$this->empresa= new empresa();
		
		/*SESSION*/
		$this->empresa_session=$this->Session->unserialize(empresa_util::$STR_SESSION_NAME);

		if($this->empresa_session==null) {
			$this->empresa_session=new empresa_session();
		}
		
		/*FKs*/
		

		$this->con_paissFK=false;
		$this->paissFK=array();
		$this->idpaisDefaultFK=-1;

		$this->con_ciudadsFK=false;
		$this->ciudadsFK=array();
		$this->idciudadDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getempresa() : empresa {	
		return $this->empresa;
	}
		
	public function setempresa(empresa $newempresa) {
		$this->empresa = $newempresa;
	}
	
	public function getempresas() : array {		
		return $this->empresas;
	}
	
	public function setempresas(array $newempresas) {
		$this->empresas = $newempresas;
	}
	
	/*SESSION*/
	public function getempresa_session() : empresa_session {	
		return $this->empresa_session;
	}
		
	public function setempresa_session(empresa_session $newempresa_session) {
		$this->empresa_session = $newempresa_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
