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

namespace com\bydan\contabilidad\general\tabla\util;

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\general\tabla\business\entity\tabla;

use com\bydan\contabilidad\general\tabla\presentation\session\tabla_session;

class tabla_param_return extends GeneralEntityReturnGeneral {	
	/*GENERAL*/
	private static int $serialVersionUID=1;
	
	/*OBJETO LISTA*/
	public ?tabla $tabla = null;	
	public ?array $tablas = array();
	
	/*SESSION*/
	public ?tabla_session $tabla_session = null;
	
	/*FKs*/
	

	public bool $con_modulosFK=false;
	public array $modulosFK=array();
	public int $idmoduloDefaultFK=-1;
	
	function __construct () {
		parent::__construct();
		
		/*OBJETO LISTA*/
		$this->tablas= array();
		$this->tabla= new tabla();
		
		/*SESSION*/
		$this->tabla_session=$this->Session->unserialize(tabla_util::$STR_SESSION_NAME);

		if($this->tabla_session==null) {
			$this->tabla_session=new tabla_session();
		}
		
		/*FKs*/
		

		$this->con_modulosFK=false;
		$this->modulosFK=array();
		$this->idmoduloDefaultFK=-1;
	} 
	
	/*OBJETO LISTA*/
	public function gettabla() : tabla {	
		return $this->tabla;
	}
		
	public function settabla(tabla $newtabla) {
		$this->tabla = $newtabla;
	}
	
	public function gettablas() : array {		
		return $this->tablas;
	}
	
	public function settablas(array $newtablas) {
		$this->tablas = $newtablas;
	}
	
	/*SESSION*/
	public function gettabla_session() : tabla_session {	
		return $this->tabla_session;
	}
		
	public function settabla_session(tabla_session $newtabla_session) {
		$this->tabla_session = $newtabla_session;
	}

	/*
		FKs
		id_fk
		con_fk
	*/
}
?>
