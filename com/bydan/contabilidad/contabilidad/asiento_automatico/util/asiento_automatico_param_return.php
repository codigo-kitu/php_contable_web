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

namespace com\bydan\contabilidad\contabilidad\asiento_automatico\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\contabilidad\asiento_automatico\business\entity\asiento_automatico;

use com\bydan\contabilidad\contabilidad\asiento_automatico\presentation\session\asiento_automatico_session;

class asiento_automatico_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?asiento_automatico $asiento_automatico = null;	
	public ?array $asiento_automaticos = array();
	
	/*SESSION*/
	public ?asiento_automatico_session $asiento_automatico_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;

	public bool $con_modulosFK=false;
	public array $modulosFK=array();
	public int $idmoduloDefaultFK=-1;

	public bool $con_fuentesFK=false;
	public array $fuentesFK=array();
	public int $idfuenteDefaultFK=-1;

	public bool $con_libro_auxiliarsFK=false;
	public array $libro_auxiliarsFK=array();
	public int $idlibro_auxiliarDefaultFK=-1;

	public bool $con_centro_costosFK=false;
	public array $centro_costosFK=array();
	public int $idcentro_costoDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->asiento_automaticos= array();
		$this->asiento_automatico= new asiento_automatico();
		
		/*SESSION*/
		$this->asiento_automatico_session=$this->Session->unserialize(asiento_automatico_util::$STR_SESSION_NAME);

		if($this->asiento_automatico_session==null) {
			$this->asiento_automatico_session=new asiento_automatico_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;

		$this->con_modulosFK=false;
		$this->modulosFK=array();
		$this->idmoduloDefaultFK=-1;

		$this->con_fuentesFK=false;
		$this->fuentesFK=array();
		$this->idfuenteDefaultFK=-1;

		$this->con_libro_auxiliarsFK=false;
		$this->libro_auxiliarsFK=array();
		$this->idlibro_auxiliarDefaultFK=-1;

		$this->con_centro_costosFK=false;
		$this->centro_costosFK=array();
		$this->idcentro_costoDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getasiento_automatico() : asiento_automatico {	
		return $this->asiento_automatico;
	}
		
	public function setasiento_automatico(asiento_automatico $newasiento_automatico) {
		$this->asiento_automatico = $newasiento_automatico;
	}
	
	public function getasiento_automaticos() : array {		
		return $this->asiento_automaticos;
	}
	
	public function setasiento_automaticos(array $newasiento_automaticos) {
		$this->asiento_automaticos = $newasiento_automaticos;
	}
	
	/*SESSION*/
	public function getasiento_automatico_session() : asiento_automatico_session {	
		return $this->asiento_automatico_session;
	}
		
	public function setasiento_automatico_session(asiento_automatico_session $newasiento_automatico_session) {
		$this->asiento_automatico_session = $newasiento_automatico_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
