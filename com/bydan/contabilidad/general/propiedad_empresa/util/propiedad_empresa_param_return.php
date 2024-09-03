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

namespace com\bydan\contabilidad\general\propiedad_empresa\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\general\propiedad_empresa\business\entity\propiedad_empresa;

use com\bydan\contabilidad\general\propiedad_empresa\presentation\session\propiedad_empresa_session;

class propiedad_empresa_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?propiedad_empresa $propiedad_empresa = null;	
	public ?array $propiedad_empresas = array();
	
	/*SESSION*/
	public ?propiedad_empresa_session $propiedad_empresa_session = null;
	
	/*FKs*/
	
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->propiedad_empresas= array();
		$this->propiedad_empresa= new propiedad_empresa();
		
		/*SESSION*/
		$this->propiedad_empresa_session=$this->Session->unserialize(propiedad_empresa_util::$STR_SESSION_NAME);

		if($this->propiedad_empresa_session==null) {
			$this->propiedad_empresa_session=new propiedad_empresa_session();
		}
		
		/*FKs*/
		
	} 
	
	/*OBJETO LISTA*/
	public function getpropiedad_empresa() : propiedad_empresa {	
		return $this->propiedad_empresa;
	}
		
	public function setpropiedad_empresa(propiedad_empresa $newpropiedad_empresa) {
		$this->propiedad_empresa = $newpropiedad_empresa;
	}
	
	public function getpropiedad_empresas() : array {		
		return $this->propiedad_empresas;
	}
	
	public function setpropiedad_empresas(array $newpropiedad_empresas) {
		$this->propiedad_empresas = $newpropiedad_empresas;
	}
	
	/*SESSION*/
	public function getpropiedad_empresa_session() : propiedad_empresa_session {	
		return $this->propiedad_empresa_session;
	}
		
	public function setpropiedad_empresa_session(propiedad_empresa_session $newpropiedad_empresa_session) {
		$this->propiedad_empresa_session = $newpropiedad_empresa_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
