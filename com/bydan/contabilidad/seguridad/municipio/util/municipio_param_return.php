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

namespace com\bydan\contabilidad\seguridad\municipio\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\seguridad\municipio\business\entity\municipio;

use com\bydan\contabilidad\seguridad\municipio\presentation\session\municipio_session;

class municipio_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?municipio $municipio = null;	
	public ?array $municipios = array();
	
	/*SESSION*/
	public ?municipio_session $municipio_session = null;
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->municipios= array();
		$this->municipio= new municipio();
		
		/*SESSION*/
		$this->municipio_session=$this->Session->unserialize(municipio_util::$STR_SESSION_NAME);

		if($this->municipio_session==null) {
			$this->municipio_session=new municipio_session();
		}
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function getmunicipio() : municipio {	
		return $this->municipio;
	}
		
	public function setmunicipio(municipio $newmunicipio) {
		$this->municipio = $newmunicipio;
	}
	
	public function getmunicipios() : array {		
		return $this->municipios;
	}
	
	public function setmunicipios(array $newmunicipios) {
		$this->municipios = $newmunicipios;
	}
	
	/*SESSION*/
	public function getmunicipio_session() : municipio_session {	
		return $this->municipio_session;
	}
		
	public function setmunicipio_session(municipio_session $newmunicipio_session) {
		$this->municipio_session = $newmunicipio_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
