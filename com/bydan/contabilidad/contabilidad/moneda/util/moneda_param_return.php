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

namespace com\bydan\contabilidad\contabilidad\moneda\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\contabilidad\moneda\business\entity\moneda;

use com\bydan\contabilidad\contabilidad\moneda\presentation\session\moneda_session;

class moneda_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?moneda $moneda = null;	
	public ?array $monedas = array();
	
	/*SESSION*/
	public ?moneda_session $moneda_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->monedas= array();
		$this->moneda= new moneda();
		
		/*SESSION*/
		$this->moneda_session=$this->Session->unserialize(moneda_util::$STR_SESSION_NAME);

		if($this->moneda_session==null) {
			$this->moneda_session=new moneda_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getmoneda() : moneda {	
		return $this->moneda;
	}
		
	public function setmoneda(moneda $newmoneda) {
		$this->moneda = $newmoneda;
	}
	
	public function getmonedas() : array {		
		return $this->monedas;
	}
	
	public function setmonedas(array $newmonedas) {
		$this->monedas = $newmonedas;
	}
	
	/*SESSION*/
	public function getmoneda_session() : moneda_session {	
		return $this->moneda_session;
	}
		
	public function setmoneda_session(moneda_session $newmoneda_session) {
		$this->moneda_session = $newmoneda_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
