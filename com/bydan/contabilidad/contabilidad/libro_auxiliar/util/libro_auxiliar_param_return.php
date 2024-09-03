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

namespace com\bydan\contabilidad\contabilidad\libro_auxiliar\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\entity\libro_auxiliar;

use com\bydan\contabilidad\contabilidad\libro_auxiliar\presentation\session\libro_auxiliar_session;

class libro_auxiliar_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?libro_auxiliar $libro_auxiliar = null;	
	public ?array $libro_auxiliars = array();
	
	/*SESSION*/
	public ?libro_auxiliar_session $libro_auxiliar_session = null;
	
	/*FKs*/
	

	public bool $con_empresasFK=false;
	public array $empresasFK=array();
	public int $idempresaDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->libro_auxiliars= array();
		$this->libro_auxiliar= new libro_auxiliar();
		
		/*SESSION*/
		$this->libro_auxiliar_session=$this->Session->unserialize(libro_auxiliar_util::$STR_SESSION_NAME);

		if($this->libro_auxiliar_session==null) {
			$this->libro_auxiliar_session=new libro_auxiliar_session();
		}
		
		/*FKs*/
		

		$this->con_empresasFK=false;
		$this->empresasFK=array();
		$this->idempresaDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getlibro_auxiliar() : libro_auxiliar {	
		return $this->libro_auxiliar;
	}
		
	public function setlibro_auxiliar(libro_auxiliar $newlibro_auxiliar) {
		$this->libro_auxiliar = $newlibro_auxiliar;
	}
	
	public function getlibro_auxiliars() : array {		
		return $this->libro_auxiliars;
	}
	
	public function setlibro_auxiliars(array $newlibro_auxiliars) {
		$this->libro_auxiliars = $newlibro_auxiliars;
	}
	
	/*SESSION*/
	public function getlibro_auxiliar_session() : libro_auxiliar_session {	
		return $this->libro_auxiliar_session;
	}
		
	public function setlibro_auxiliar_session(libro_auxiliar_session $newlibro_auxiliar_session) {
		$this->libro_auxiliar_session = $newlibro_auxiliar_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
