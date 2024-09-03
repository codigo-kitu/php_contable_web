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

namespace com\bydan\contabilidad\contabilidad\contador_auxiliar\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\contabilidad\contador_auxiliar\business\entity\contador_auxiliar;

use com\bydan\contabilidad\contabilidad\contador_auxiliar\presentation\session\contador_auxiliar_session;

class contador_auxiliar_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?contador_auxiliar $contador_auxiliar = null;	
	public ?array $contador_auxiliars = array();
	
	/*SESSION*/
	public ?contador_auxiliar_session $contador_auxiliar_session = null;
	
	/*FKs*/
	

	public bool $con_libro_auxiliarsFK=false;
	public array $libro_auxiliarsFK=array();
	public int $idlibro_auxiliarDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->contador_auxiliars= array();
		$this->contador_auxiliar= new contador_auxiliar();
		
		/*SESSION*/
		$this->contador_auxiliar_session=$this->Session->unserialize(contador_auxiliar_util::$STR_SESSION_NAME);

		if($this->contador_auxiliar_session==null) {
			$this->contador_auxiliar_session=new contador_auxiliar_session();
		}
		
		/*FKs*/
		

		$this->con_libro_auxiliarsFK=false;
		$this->libro_auxiliarsFK=array();
		$this->idlibro_auxiliarDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function getcontador_auxiliar() : contador_auxiliar {	
		return $this->contador_auxiliar;
	}
		
	public function setcontador_auxiliar(contador_auxiliar $newcontador_auxiliar) {
		$this->contador_auxiliar = $newcontador_auxiliar;
	}
	
	public function getcontador_auxiliars() : array {		
		return $this->contador_auxiliars;
	}
	
	public function setcontador_auxiliars(array $newcontador_auxiliars) {
		$this->contador_auxiliars = $newcontador_auxiliars;
	}
	
	/*SESSION*/
	public function getcontador_auxiliar_session() : contador_auxiliar_session {	
		return $this->contador_auxiliar_session;
	}
		
	public function setcontador_auxiliar_session(contador_auxiliar_session $newcontador_auxiliar_session) {
		$this->contador_auxiliar_session = $newcontador_auxiliar_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
