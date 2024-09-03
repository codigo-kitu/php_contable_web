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

namespace com\bydan\contabilidad\seguridad\provincia\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\seguridad\provincia\business\entity\provincia;

use com\bydan\contabilidad\seguridad\provincia\presentation\session\provincia_session;

class provincia_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?provincia $provincia = null;	
	public ?array $provincias = array();
	
	/*SESSION*/
	public ?provincia_session $provincia_session = null;
	
	/*FKs*/
	

	public bool $con_paissFK=false;
	public array $paissFK=array();
	public int $idpaisDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->provincias= array();
		$this->provincia= new provincia();
		
		/*SESSION*/
		$this->provincia_session=$this->Session->unserialize(provincia_util::$STR_SESSION_NAME);

		if($this->provincia_session==null) {
			$this->provincia_session=new provincia_session();
		}
		
		/*FKs*/
		

		$this->con_paissFK=false;
		$this->paissFK=array();
		$this->idpaisDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getprovincia() : provincia {	
		return $this->provincia;
	}
		
	public function setprovincia(provincia $newprovincia) {
		$this->provincia = $newprovincia;
	}
	
	public function getprovincias() : array {		
		return $this->provincias;
	}
	
	public function setprovincias(array $newprovincias) {
		$this->provincias = $newprovincias;
	}
	
	/*SESSION*/
	public function getprovincia_session() : provincia_session {	
		return $this->provincia_session;
	}
		
	public function setprovincia_session(provincia_session $newprovincia_session) {
		$this->provincia_session = $newprovincia_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
